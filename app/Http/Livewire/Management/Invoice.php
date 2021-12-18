<?php

namespace App\Http\Livewire\Management;

use App\Models\Table;
use App\Models\Order as Od;
use App\Models\Invoice as Iv;
use App\Models\Statistical;
use App\Models\InvoiceDetail;
use PDF;
use Illuminate\Support\Carbon;

use Livewire\WithPagination;

use Livewire\Component;

class Invoice extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $statusShowInvoice = false;
    public $invoice_table, $invoice_detail;
    public $ID, $table_in, $area_in, $user, $total, $percen = 0;
    public function render()
    {
        return view('livewire.management.invoice', [
            'Invoice' => Iv::all()->groupBy(['time_in', 'table_id']),
        ]);
    }
    public function showInvoice($invoice_table)
    {
        $this->invoice_table = $invoice_table;
        $this->invoice_detail = Iv::where('table_id', $this->invoice_table)->where('status', 0)->get();
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
        $pay = Iv::where('table_id', $this->invoice_table)->where('status', 0)->get();
        foreach ($pay as $value) {
            InvoiceDetail::where('invoice_id', $value->id)->update([
                'time_out' => Carbon::now('Asia/Ho_Chi_Minh'),
                'status' => 1,
            ]);
            $turnover += $value->total;
        }
        Iv::where('table_id', $this->invoice_table)->where('status', 0)->update([
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
    public function printInvoicePayed($table_id, $time)
    {

        $invoice_detail = Iv::where('table_id', $table_id)->where('time_in', $time)->get();
        foreach ($invoice_detail as $in) {
            $ID = $in->id;
            $table_in = $in->invoiceDetail->table_name;
            $area_in = $in->table->area->sub_name;
            $user = $in->invoiceDetail->user_name;
            $total = $in->total;
        }
        //dd($this->invoice_detail);
        $percen = 0;
        $status = 'Đã thanh toán';
        $pdf = PDF::loadView('livewire.management.invoice_print-p-d-f', compact('ID', 'user', 'table_in', 'area_in', 'total', 'percen', 'status', 'invoice_detail'))->output(); //
        return response()->streamDownload(
            fn () => print($pdf),
            'Hoa_don.pdf'
        );
    }
    public function print($ID, $user, $table_in, $area_in, $total, $percen)
    {
        $invoice_detail = $this->invoice_detail;
        $status = 'Chưa thanh toán';
        $pdf = PDF::loadView('livewire.management.invoice_print-p-d-f', compact('ID', 'user', 'table_in', 'area_in', 'total', 'percen', 'status', 'invoice_detail'))->output(); //
        return response()->streamDownload(
            fn () => print($pdf),
            'Hoa_don.pdf'
        );
    }
}
