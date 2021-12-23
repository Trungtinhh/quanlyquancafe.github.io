<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use App\Models\Statistical as Statis;
use App\Models\Invoice;
use App\Models\ImportgoodsDrink;
use App\Models\ImportgoodsIngredent;
use App\Models\DrinkDetail;
use App\Models\IngredentDetail;
use App\Models\Order;
use App\Models\Drink;
use App\Models\Ingredent;
use Illuminate\Support\Carbon;

class Statistical extends Component
{
    public $revenue = 0, $order = 0, $importgoods = 0, $expired = 0,
        $importgoodsIngredent = [], $importgoodsDrink = [],
        $expired_drink = [], $expired_ingredent = [];

    public $drink_sale = [], $date_revenue = [], $value_revenue = [], $date_revenue_week, $value_revenue_week;
    public $data_revenue_all = [], $value_revenue_all = [];
    public $data_drink_sale = [], $value_drink_sale = [];
    public $filter = '', $data_filter = [], $value_filter = [];
    public function render()
    {
        return view('livewire.management.statistical');
    }
    public function mount()
    {
        $money = 0;
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
                $this->value_revenue[] = $money;
                $this->date_revenue[] = $date->toTimeString();
            }
        }
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $week = Statis::whereBetween('date', [$sub7days, $now])->get();
        foreach ($week as $invoi) {
            $this->value_revenue_week[] = $invoi->turnover;
            $this->date_revenue_week[] = $invoi->date;
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
                $this->importgoodsDrink[] = $im;
            }
        }
        $importgoodsIngredent = ImportgoodsIngredent::all();
        foreach ($importgoodsIngredent as $imIngredent) {
            if ($imIngredent->date_add == Carbon::now('Asia/Ho_Chi_Minh')->toDateString()) {
                $this->importgoods++;
                $this->importgoodsIngredent[] = $imIngredent;
            }
        }
        $drinkExpired = DrinkDetail::all();
        foreach ($drinkExpired as $drink) {
            $day = new Carbon($drink->date_exp, 'Asia/Ho_Chi_Minh');
            if ($drink->drink->category == 1 && $day->lessThan(Carbon::now('Asia/Ho_Chi_Minh'))) {
                $this->expired++;
                $this->expired_drink[] = $drink;
            }
        }
        $ingredentExpired = IngredentDetail::all();
        foreach ($ingredentExpired as $ingredent) {
            $day = new Carbon($ingredent->date_exp, 'Asia/Ho_Chi_Minh');
            if ($day->lessThan(Carbon::now('Asia/Ho_Chi_Minh'))) {
                $this->expired++;
                $this->expired_ingredent[] = $ingredent;
            }
        }
        $this->data_drink_sale = [];
        $this->value_drink_sale = [];
        $drink_sales = Order::where('status', 2)->get()->groupBy('drink_id');
        foreach ($drink_sales as $drink_sale_id => $drink) {
            $drink_amount_sale = 0;
            $drink_sale_name = '';
            foreach ($drink as $val) {
                $drink_amount_sale += $val->drink_amount;
                $drink_sale_name = $val->drink->drink_name;
            }
            if ($drink_amount_sale != 0) {
                $this->drink_sale[$drink_sale_name] = ($drink_amount_sale);
            }
        }
        arsort($this->drink_sale);
        foreach ($this->drink_sale as $drink => $vl) {
            $this->data_drink_sale[] = $drink;
            $this->value_drink_sale[] = $vl;
        }
    }
    public function deleteDrink($drink_id)
    {
        Drink::where('drink_id', $drink_id)->delete();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã xóa!"
        ]);
    }
    public function deleteIngredent($ingredent_id)
    {
        Ingredent::where('ingredent_id', $ingredent_id)->delete();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã xóa!"
        ]);
    }
}
