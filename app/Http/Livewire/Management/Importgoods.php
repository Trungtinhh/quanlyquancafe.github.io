<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use App\Models\ImportgoodsDrink;
use App\Models\ImportgoodsIngredent;
use Livewire\WithPagination;

class Importgoods extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.management.importgoods',[
            'drink' => ImportgoodsDrink::paginate(10),
            'ingredent' => ImportgoodsIngredent::paginate(10)
        ]);
    }
}
