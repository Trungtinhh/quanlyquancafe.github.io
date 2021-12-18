<?php

namespace App\Http\Livewire\Management;

use App\Models\Table;
use App\Models\Area;
use App\Models\Order as Od;
use App\Models\OrderDetail;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Drink;
use App\Models\DrinkDetail;
use App\Models\Statistical;
use PDF;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

use Livewire\Component;

class Order extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $table_order, $order_id, $drinkSelected, $order, $drink_amount = 1, $table_move_id, $table_move_to_id;
    public $search = '', $searchDrink;
    public $statusOrder = false;
    public $statusMoveTable = false;
    public $statusShowInvoice = false;
    public $invoice_table, $invoice_detail;
    public $ID, $table_in, $area_in, $user, $total, $percen = 0;
    public function render()
    {
        return view('livewire.management.order', [
            'table' => Table::get(),
            'table_move' => Table::paginate(12),
            'Drink' => Drink::paginate(5),
            'Invoice' => Invoice::all()->groupBy(['time_in', 'table_id']),
            'area' => Area::all(),
            'search_table' => Table::where('table_name', 'like', '%' . $this->search . '%')
                ->get()->take(10)->toArray(),
            'search_drink' => DrinkDetail::where('drink_name', 'like', '%' . $this->searchDrink . '%')
                ->get()->take(10),
        ]);
    }
    public function showOrder($table_id_order)
    {
        $this->statusOrder = true;
        $this->table_order = Table::where('id', $table_id_order)->first()->toArray();
        $this->dispatchBrowserEvent('show-order');
        $this->resetOrder();
    }
    public function addDrinkToOrder($drinkIDSelected)
    {
        $temp = DrinkDetail::where('drink_id', $drinkIDSelected)->first();
        if ($this->drink_amount > 0) {
            $drinkSelected = Od::where('drink_id', $drinkIDSelected)
                ->where('status', 0)
                ->where('table_id', $this->table_order['id'])
                ->first();
            if (!Od::where('drink_id', $drinkIDSelected)->where('status', 0)->where('table_id', $this->table_order['id'])->exists()) {
                $drink_all = DrinkDetail::where('drink_id', $drinkIDSelected)->first();
                if ($drink_all->drink->category == 1) {
                    if ($drink_all->amount > 0) {
                        if ($this->drink_amount <= $drink_all->amount) {
                            $order = Od::create([
                                'table_id' => $this->table_order['id'],
                                'user_id' => Auth::user()->id,
                                'drink_id' => $drinkIDSelected,
                                'drink_amount' => $this->drink_amount,
                                'status' => 0
                            ]);
                            OrderDetail::create([
                                'order_id' => $order->getKey(),
                                'table_name' => $order->table->table_name,
                                'user_name' => Auth::user()->name,
                                'drink_name' => $order->drink->drink_name,
                                'drink_amount' => $this->drink_amount,
                                'price' => $order->drink->drinkDetail->price->price_cost,
                                'status' => 0
                            ]);
                            $invoice = Invoice::create([
                                'order_id' => $order->getKey(),
                                'table_id' => $this->table_order['id'],
                                'user_id' => Auth::user()->id,
                                'status' => 0
                            ]);
                            InvoiceDetail::create([
                                'invoice_id' => $invoice->getKey(),
                                'drink_name' => $invoice->order->drink->drink_name,
                                'table_name' => $invoice->order->table->table_name,
                                'user_name' => Auth::user()->name,
                                'status' => 0
                            ]);
                            DrinkDetail::where('drink_id', $drinkIDSelected)->update([
                                'amount' => $drink_all->amount - $this->drink_amount
                            ]);
                            $this->drink_amount = 1;
                        } else {
                            $this->dispatchBrowserEvent('alert', [
                                'type' => 'warning',
                                'message' => "Số lượng không hợp lý!"
                            ]);
                        }
                    } else {
                        $this->dispatchBrowserEvent('alert', [
                            'type' => 'warning',
                            'message' => "Thức uống đã hết!"
                        ]);
                    }
                } else {
                    $order = Od::create([
                        'table_id' => $this->table_order['id'],
                        'user_id' => Auth::user()->id,
                        'drink_id' => $drinkIDSelected,
                        'drink_amount' => $this->drink_amount,
                        'status' => 0
                    ]);
                    OrderDetail::create([
                        'order_id' => $order->getKey(),
                        'table_name' => $order->table->table_name,
                        'user_name' => Auth::user()->name,
                        'drink_name' => $order->drink->drink_name,
                        'drink_amount' => $this->drink_amount,
                        'price' => $order->drink->drinkDetail->price->price_cost,
                        'status' => 0
                    ]);
                    $invoice = Invoice::create([
                        'order_id' => $order->getKey(),
                        'table_id' => $this->table_order['id'],
                        'user_id' => Auth::user()->id,
                        'status' => 0
                    ]);
                    InvoiceDetail::create([
                        'invoice_id' => $invoice->getKey(),
                        'drink_name' => $invoice->order->drink->drink_name,
                        'table_name' => $invoice->order->table->table_name,
                        'user_name' => Auth::user()->name,
                        'status' => 0
                    ]);
                    $this->drink_amount = 1;
                }
            } else {
                Od::where('drink_id', $drinkIDSelected)
                    ->where('status', 0)
                    ->where('table_id', $this->table_order['id'])
                    ->update([
                        'drink_amount' => $drinkSelected->drink_amount + $this->drink_amount
                    ]);
                OrderDetail::where('order_id', $drinkSelected->id)->update([
                    'drink_amount' => $drinkSelected->drink_amount + $this->drink_amount
                ]);
                $amount_of_drink = DrinkDetail::where('drink_id', $drinkIDSelected)->first();
                if ($amount_of_drink->drink->category == 1) {
                    DrinkDetail::where('drink_id', $drinkIDSelected)->update([
                        'amount' => $amount_of_drink->amount - $this->drink_amount
                    ]);
                }
                $this->drink_amount = 1;
            }
            $this->order = Od::where('status', 0)
                ->where('table_id', $this->table_order['id'])
                ->where('user_id', Auth::user()->id)->get();
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => "Số lượng không hợp lý!"
            ]);
        }
    }
    public function resetOrder()
    {
        $this->order = '';
        $this->searchDrink = '';
        $od = Od::where('status', 0)
            ->where('table_id', $this->table_order['id'])
            ->where('user_id', Auth::user()->id)->get();
        foreach ($od as $o) {
            $drink_order = Od::find($o->id)->first();
            $amount_of_drink = DrinkDetail::where('drink_id', $o->drink_id)->first();
            if ($amount_of_drink->drink->category == 1) {
                DrinkDetail::where('drink_id', $o->drink_id)->update([
                    'amount' => $amount_of_drink->amount + $drink_order->drink_amount
                ]);
            }
        }
        Od::where('status', 0)
            ->where('table_id', $this->table_order['id'])
            ->where('user_id', Auth::user()->id)->delete();
    }
    public function addOrder()
    {
        if (Od::where('status', 0)->where('table_id', $this->table_order['id'])->exists()) {
            Od::where('status', 0)
                ->where('table_id', $this->table_order['id'])
                ->update([
                    'status' => 1
                ]);
            $order_bartending = Od::where('status', 1)->where('table_id', $this->table_order['id'])->get();
            foreach ($order_bartending as $bar) {
                if ($bar->drink->category === 2) {
                    Od::find($bar->id)->update([
                        'status_bartending' => 0
                    ]);
                }
            }
            Table::where('id', $this->table_order['id'])->update([
                'status' => 1
            ]);
            $total = 0;
            $order =  Od::where('table_id', $this->table_order['id'])->where('status', 1)->get();
            foreach ($order as $value) {
                $total += $value->drink_amount * $value->drink->drinkDetail->price->price_cost;
            }
            Invoice::where('table_id', $this->table_order['id'])->where('status', 0)->update([
                'total' => $total,
                'time_in' => Carbon::now('Asia/Ho_Chi_Minh')
            ]);
            $invoice = Invoice::where('table_id', $this->table_order['id'])->where('status', 0)->get();
            foreach ($invoice as $in) {
                InvoiceDetail::where('invoice_id', $in->id)->update([
                    'total' => $total,
                    'time_in' => Carbon::now('Asia/Ho_Chi_Minh')
                ]);
            }
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Xong!"
            ]);
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => "Chưa chọn món!"
            ]);
        }
    }
    public function deleteDrinkOrder($drinkOrderID)
    {
        $drink_order = Od::find($drinkOrderID)->first();
        $amount_of_drink = DrinkDetail::where('drink_id', $drink_order->drink_id)->first();
        if ($amount_of_drink->drink->category == 1) {
            DrinkDetail::where('drink_id', $drink_order->drink_id)->update([
                'amount' => $amount_of_drink->amount + $drink_order->drink_amount
            ]);
        }
        Od::find($drinkOrderID)->delete();
        $this->order = Od::where('status', 0)
            ->where('table_id', $this->table_order['id'])
            ->where('user_id', Auth::user()->id)->get();

        $this->order_id = '';
    }
    public function showMoveTable($table_move_id)
    {
        $this->statusMoveTable = true;
        $this->table_move_id = $table_move_id;
        $this->dispatchBrowserEvent('show-move-table');
    }
    public function moveTable()
    {

        if (!empty($this->table_move_to_id)) {
            if ($this->table_move_id != $this->table_move_to_id) {
                Od::where('table_id', $this->table_move_id)->update([
                    'table_id' => $this->table_move_to_id
                ]);
                $order = Od::where('table_id', $this->table_move_to_id)->get();
                foreach ($order as $o) {
                    OrderDetail::where('order_id', $o->id)->update([
                        'table_name' => $o->table->table_name
                    ]);
                }
                Invoice::where('table_id', $this->table_move_id)->update([
                    'table_id' => $this->table_move_to_id
                ]);
                $invoive = Invoice::where('table_id', $this->table_move_to_id)->get();
                foreach ($invoive as $i) {
                    InvoiceDetail::where('invoice_id', $i->id)->update([
                        'table_name' => $i->table->table_name
                    ]);
                }
                Table::where('id', $this->table_move_id)->update([
                    'status' => 0
                ]);
                Table::where('id', $this->table_move_to_id)->update([
                    'status' => 1
                ]);
                $this->table_move_id = '';
                $this->table_move_to_id = '';
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'success',
                    'message' => "Đã chuyển!"
                ]);
            } else {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'warning',
                    'message' => "Bạn đang chọn bàn hiện tại!"
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => "Chưa chọn bàn chuyển đến!"
            ]);
        }
        $this->statusMoveTable = false;
    }
    public function showInvoice($invoice_table)
    {
        $this->invoice_table = $invoice_table;
        $this->invoice_detail = Invoice::where('table_id', $this->invoice_table)->where('status', 0)->get();
        foreach ($this->invoice_detail as $in) {
            $this->ID = $in->id;
            $this->table_in = $in->invoiceDetail->table_name;
            $this->area_in = $in->table->area->sub_name;
            $this->user = $in->invoiceDetail->user_name;
            $this->total = $in->total;
        }
        $this->statusShowInvoice = true;
        $this->dispatchBrowserEvent('show-invoice');
    }
    public function payInvoice()
    {
        $turnover = 0;
        $pay = Invoice::where('table_id', $this->invoice_table)->where('status', 0)->get();
        foreach ($pay as $value) {
            InvoiceDetail::where('invoice_id', $value->id)->update([
                'time_out' => Carbon::now('Asia/Ho_Chi_Minh'),
                'status' => 1,
            ]);
            $turnover += $value->total;
        }
        Invoice::where('table_id', $this->invoice_table)->where('status', 0)->update([
            'status' => 1,
            'time_out' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        Table::where('id', $this->invoice_table)->update([
            'status' => 0
        ]);
        Od::where('table_id', $this->invoice_table)->update([
            'status' => 2
        ]);
        if (!Statistical::where('date', Carbon::now('Asia/Ho_Chi_Minh')->toDateString())->exists()) {
            Statistical::create([
                'date' => Carbon::now('Asia/Ho_Chi_Minh')->toDateString(),
                'turnover' => $turnover,
                'total_order' => 1
            ]);
        }else{
            $statistical_update = Statistical::where('date', Carbon::now('Asia/Ho_Chi_Minh')->toDateString())->first();
            Statistical::where('date', Carbon::now('Asia/Ho_Chi_Minh')->toDateString())->update([
                'turnover' => $statistical_update->turnover + $turnover,
                'total_order' => $statistical_update->total_order += 1
            ]);
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Thanh toán thành công!"
        ]);
    }
    public function print($ID, $user, $table_in, $total, $percen)
    {
        $invoice_detail = $this->invoice_detail;
        $pdf = PDF::loadView('livewire.management.invoice_print-p-d-f', compact('ID', 'user', 'table_in', 'total', 'percen', 'invoice_detail'))->output(); //
        return response()->streamDownload(
            fn () => print($pdf),
            'Hoa_don.pdf'
        );
    }
}
