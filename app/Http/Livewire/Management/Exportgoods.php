<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use App\Models\Drink;
use App\Models\Ingredent;
use App\Models\DrinkDetail;
use App\Models\IngredentDetail;

class Exportgoods extends Component
{
    public $amount_export_drink, $amount_export_ingredent, $drink_id, $ingredent_id;
    protected $messages = [
        'amount_export_drink.required' => 'Vui lòng nhập số lượng',
        'amount_export_ingredent.required' => 'Vui lòng nhập số lượng',
    ];

    public function render()
    {
        return view('livewire.management.exportgoods', [
            'drink' => DrinkDetail::orderBy('drink_name')->get(),
            'ingredent' => IngredentDetail::orderBy('ingredent_name')->get()
        ]);
    }
    public function showExportDrink($drink_id)
    {
        $this->resetValidation();
        $this->drink_id = $drink_id;
        $this->dispatchBrowserEvent('show-export-drink');
    }
    public function showExportIngredent($ingredent_id)
    {
        $this->resetValidation();
        $this->ingredent_id = $ingredent_id;
        $this->dispatchBrowserEvent('show-export-ingredent');
    }
    public function exportDrink()
    {
        $temp = DrinkDetail::where('drink_id', $this->drink_id)->first();
        if ($this->amount_export_drink > 0 && $this->amount_export_drink <= $temp->amount) {
            $this->validate([
                'amount_export_drink' => 'required'
            ]);

            $dri = DrinkDetail::where('drink_id', $this->drink_id)->first();
            DrinkDetail::where('drink_id', $this->drink_id)->update([
                'amount' => $dri->amount - $this->amount_export_drink
            ]);
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Đã trừ đi " . $this->amount_export_drink . " sản phẩm!"
            ]);
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => "Số lượng không hợp lý!"
            ]);
        }
    }
    public function exportIngredent()
    {
        $temp = IngredentDetail::where('ingredent_id', $this->ingredent_id)->first();
        if ($this->amount_export_ingredent > 0 && $this->amount_export_ingredent <= $temp->amount) {
            $this->validate([
                'amount_export_ingredent' => 'required'
            ]);
            $in = IngredentDetail::where('ingredent_id', $this->ingredent_id)->first();
            IngredentDetail::where('ingredent_id', $this->ingredent_id)->update([
                'amount' => $in->amount - $this->amount_export_ingredent
            ]);
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Đã trừ đi " . $this->amount_export_ingredent . " sản phẩm!"
            ]);
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => "Số lượng không hợp lý!"
            ]);
        }
    }
}
