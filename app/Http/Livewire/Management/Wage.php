<?php

namespace App\Http\Livewire\Management;

use App\Models\Wage as ModelsWage;
use Livewire\Component;
use Livewire\WithPagination;
class Wage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.management.wage',[
            'wage' => ModelsWage::paginate(10)
        ]);
    }
}
