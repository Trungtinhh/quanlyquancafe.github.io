<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use App\Models\Table;
use App\Models\Area;

class TableEmpty extends Component
{
    public $count;
    public function render()
    {
        return view('livewire.management.table-empty',[
            'tableEmpty' => Table::where('status', 0)->get(),
            'area' => Area::all(),
    ]);
    }
    public function mount(){
        $this->count = Table::where('status', 0)->count();
    }
}
