<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use App\Models\Invoice;
use App\Models\ImportgoodsDrink;
use App\Models\ImportgoodsIngredent;
use App\Models\DrinkDetail;
use App\Models\IngredentDetail;
use App\Models\Order;
use Illuminate\Support\Carbon;

class Statistical extends Component
{
    public $revenue = 0, $order = 0, $importgoods = 0, $expired = 0;
    public $drink_sale = [], $date_revenue = [], $value_revenue = [];
    public $data_drink_sale = [], $value_drink_sale = [];
    public function render()
    {
        return view('livewire.management.statistical');
    }
    public function mount()
    {
        $this->date_revenue = [];
        $this->value_revenue = [];
        $invoice = Invoice::where('status', 1)->get()->groupBy(['time_out', 'table_id']);
        foreach ($invoice as $Invoi => $invoi) {
            $date = new Carbon($Invoi, 'Asia/Ho_Chi_Minh');
            if ($date->toDateString() == Carbon::now('Asia/Ho_Chi_Minh')->toDateString()) {
                foreach ($invoi as $in => $valu) {
                    foreach ($valu as $val) {
                        $money = $val->total;
                    }
                    $this->revenue += $money;
                }
                $this->value_revenue[] = $this->revenue;
                $this->date_revenue[] = $date->toTimeString();
            }
        }
        //dd($this->value_revenue, $this->date_revenue);
        foreach ($invoice as $Invoi => $invoi) {
            $date = new Carbon($Invoi, 'Asia/Ho_Chi_Minh');
            if ($date->toDateString() == Carbon::now('Asia/Ho_Chi_Minh')->toDateString()) {
                foreach ($invoi as $in => $valu) {
                    $this->order += 1;
                }
            }
        }
        $importgoodsDrink = ImportgoodsDrink::all();
        foreach ($importgoodsDrink as $im) {
            if ($im->date_add == Carbon::now('Asia/Ho_Chi_Minh')->toDateString()) {
                $this->importgoods++;
            }
        }
        $importgoodsIngredent = ImportgoodsIngredent::all();
        foreach ($importgoodsIngredent as $imIngredent) {
            if ($imIngredent->date_add == Carbon::now('Asia/Ho_Chi_Minh')->toDateString()) {
                $this->importgoods++;
            }
        }
        $drinkExpired = DrinkDetail::all();
        foreach ($drinkExpired as $drink) {
            if ($drink->drink->category == 1 && $drink->date_exp < Carbon::now('Asia/Ho_Chi_Minh')->day) {
                $this->expired++;
            }
        }
        $ingredentExpired = IngredentDetail::all();
        foreach ($ingredentExpired as $ingredent) {
            if ($ingredent->date_exp < Carbon::now('Asia/Ho_Chi_Minh')->day) {
                $this->expired++;
            }
        }
        $this->data_drink_sale = [];
        $this->value_drink_sale = [];
        $drink_sales = Order::where('status', 2)->get()->groupBy('drink_id');
        foreach ($drink_sales as $drink_sale_id => $drink) {
            $drink_amount_sale = 0;
            $drink_sale_name = '';
            foreach ($drink as $val) {
                $weekOfMonth = new Carbon($val->created_at, 'Asia/Ho_Chi_Minh');
                if ($weekOfMonth->weekOfMonth == Carbon::now()->weekOfMonth) {
                    $drink_amount_sale += $val->drink_amount;
                    $drink_sale_name = $val->drink->drink_name;
                }
            }
            $this->drink_sale[$drink_sale_name] = ($drink_amount_sale);
        }
        arsort($this->drink_sale);
        foreach ($this->drink_sale as $drink => $vl) {
            $this->data_drink_sale[] = $drink;
            $this->value_drink_sale[] = $vl;
        }
    }
}
