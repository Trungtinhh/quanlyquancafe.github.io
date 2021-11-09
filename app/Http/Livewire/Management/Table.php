<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use App\Models\Table as tb;
use App\Models\Area;
class Table extends Component
{
    public $count;
    public function render()
    {
        return view('livewire.management.table', [
            'table' => tb::all(),
            'area' => Area::all(),]);
    }
    public function mount(){
        $this->count = tb::all()->count();
    }
}
