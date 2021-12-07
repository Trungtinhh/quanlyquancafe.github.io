<?php

namespace App\Http\Livewire;

use App\Models\Table;
use App\Models\Area;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Drink;
use App\Models\DrinkDetail;
use PDF;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

use Livewire\Component;

class Home extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $table_order, $order_id, $drinkSelected, $order, $drink_amount = 1, $table_move_id, $table_move_to_id;
    public $search = '', $searchDrink;
    public $statusOrder = false;
    public $statusMoveTable = false;
    public $statusShowInvoice = false;
    public $invoice_table, $invoice_detail;
    public $ID, $table_in, $user, $total, $percen = 0;
    public function render()
    {
        return view('livewire.home', [
            'table' => Table::paginate(12),
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
        $drinkSelected = Order::where('drink_id', $drinkIDSelected)
            ->where('status', 0)
            ->where('table_id', $this->table_order['id'])
            ->first();
        if (!Order::where('drink_id', $drinkIDSelected)->where('status', 0)->where('table_id', $this->table_order['id'])->exists()) {

            $order = Order::create([
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
            $amount_of_drink = DrinkDetail::where('drink_id', $drinkIDSelected)->first();
            if ($amount_of_drink->drink->category == 1) {
                DrinkDetail::where('drink_id', $drinkIDSelected)->update([
                    'amount' => $amount_of_drink->amount - $this->drink_amount
                ]);
            }
            $this->drink_amount = 1;
        } else {
            Order::where('drink_id', $drinkIDSelected)
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
        $this->order = Order::where('status', 0)
            ->where('table_id', $this->table_order['id'])
            ->where('user_id', Auth::user()->id)->get();
    }
    public function resetOrder()
    {
        $this->order = '';
        $this->searchDrink = '';
        Order::where('status', 0)
            ->where('table_id', $this->table_order['id'])
            ->where('user_id', Auth::user()->id)->delete();
    }
    public function addOrder()
    {
        if (Order::where('status', 0)->where('table_id', $this->table_order['id'])->exists()) {
            Order::where('status', 0)
                ->where('table_id', $this->table_order['id'])
                ->update([
                    'status' => 1
                ]);
            $order_bartending = Order::where('status', 1)->where('table_id', $this->table_order['id'])->get();
            foreach ($order_bartending as $bar) {
                if ($bar->drink->category === 2) {
                    Order::find($bar->id)->update([
                        'status_bartending' => 0
                    ]);
                }
            }
            Table::where('id', $this->table_order['id'])->update([
                'status' => 1
            ]);
            $total = 0;
            $order =  Order::where('table_id', $this->table_order['id'])->where('status', 1)->get();
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
        $drink_order = Order::find($drinkOrderID)->first();
        $amount_of_drink = DrinkDetail::where('drink_id', $drinkOrderID)->first();
        if ($amount_of_drink->drink->category == 1) {
            DrinkDetail::where('drink_id', $drinkOrderID)->update([
                'amount' => $amount_of_drink->amount + $drink_order->drink_amount
            ]);
        }
        Order::find($drinkOrderID)->delete();
        $this->order = Order::where('status', 0)
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
                Order::where('table_id', $this->table_move_id)->update([
                    'table_id' => $this->table_move_to_id
                ]);
                $order = Order::where('table_id', $this->table_move_to_id)->get();
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
            $this->user = $in->invoiceDetail->user_name;
            $this->total = $in->total;
        }
        $this->statusShowInvoice = true;
    }
    public function payInvoice()
    {
        Invoice::where('table_id', $this->invoice_table)->where('status', 0)->update([
            'status' => 1,
            'time_out' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        $pay = Invoice::where('table_id', $this->invoice_table)->where('status', 0)->get();
        foreach ($pay as $value) {
            InvoiceDetail::where('invoice_id', $value->id)->update([
                'status' => 1,
                'time_out' => Carbon::now('Asia/Ho_Chi_Minh')
            ]);
        }
        Table::where('id', $this->invoice_table)->update([
            'status' => 0
        ]);
        Order::where('table_id', $this->invoice_table)->update([
            'status' => 2
        ]);
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Thanh toán thành công!"
        ]);
        $this->statusShowInvoice = false;
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
