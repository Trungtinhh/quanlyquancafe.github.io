<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $a;
    
    public function render()
    {
        return view('livewire.test');
    }
    public function mount()
    {
        $this->a = 9;
    }
    public function cong()
    {
       $this->a++;
    }
    public function tru()
    {
        $this->a--;
    }
}
