<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use App\Models\Drink;
use App\Models\Ingredent;
use App\Models\DrinkDetail;
use App\Models\IngredentDetail;

class Storehouse extends Component
{
    public function render()
    {
        return view('livewire.management.storehouse',[
            'drink' => DrinkDetail::orderBy('drink_name')->get(),
            'ingredent' => IngredentDetail::orderBy('ingredent_name')->get()
        ]);
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
