<?php

namespace App\Http\Livewire\Management;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
class Bartending extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $doing = false;
    public $count_bar_no_complete, $count_bar_doing, $count_bar_complete;

    public function render()
    {
        return view('livewire.management.bartending', [
            'Bartending_no_complete' => Order::where('status_bartending', 0)->get(),
            'Bartending_doing' => Order::where('status_bartending', 1)->get(),
            'Bartending_complete' => Order::where('status_bartending', 2)->paginate(10)
        ]);
    }
    public function mount()
    {
        $this->count_bar_no_complete = Order::where('status_bartending', 0)->count();
        $this->count_bar_doing = Order::where('status_bartending', 1)->count();
        $this->count_bar_complete = Order::where('status_bartending', 2)->count();
    }
    public function doing($bar_id)
    {
        $this->doing = true;
        Order::find($bar_id)->update([
            'status_bartending' => 1
        ]);
        $this->count_bar_doing = Order::where('status_bartending', 1)->count();
    }
    public function success($bar_id)
    {
        $this->doing = false;
        Order::find($bar_id)->update([
            'status_bartending' => 2
        ]);
        $this->count_bar_complete = Order::where('status_bartending', 2)->count();
    }
    public function refuse($drinkOrderID)
    {
        $this->count_bar_no_complete = Order::where('status_bartending', 0)->count();
        Order::find($drinkOrderID)->delete();
    }
}
