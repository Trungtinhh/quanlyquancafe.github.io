<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use App\Models\Table;
use App\Models\Area;

class TableEmpty extends Component
{
    public $count;
    public $search = '';
    public function render()
    {
        return view('livewire.management.table-empty',[
            'tableEmpty' => Table::where('status', 0)->get(),
            'area' => Area::all(),
            'search_table' => Table::where('status', 0)->where('table_name', 'like', '%' . $this->search . '%')
            ->get()->take(10)->toArray(),
    ]);
    }
    public function mount(){
        $this->count = Table::where('status', 0)->count();
    }
    public function deleteTable($table_id){
        Table::where('id', $table_id)->delete();
        $this->count = Table::where('status', 0)->count();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Xóa thành công!"
        ]);
    }
    public function order($table_id)
    {
        return redirect()->route('dashboard',['table_id' => $table_id]);
    }
}
