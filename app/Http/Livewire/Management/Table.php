<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use App\Models\Table as tb;
use App\Models\Area;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $count, $table_name;
    public $search = '';
    protected $messages = [
        'table_name.required' => 'Nhập tên bàn',
        'table_name.unique' => 'Bàn đã có',
    ];

    public function render()
    {
        return view('livewire.management.table', [
            'table' => tb::all(),
            'all_table' => tb::paginate(10),
            'area' => Area::all(),
            'search_table' => tb::where('table_name', 'like', '%' . $this->search . '%')
            ->get()->take(10)->toArray(),
        ]);
    }
    public function mount(){
        $this->count = tb::all()->count();
    }
    public function allTable(){
        $this->dispatchBrowserEvent('show-all-table');
    }
    public function addTable()
    {
        $this->validate([
            'table_name' => 'required|unique:tables',
        ]);
        tb::create([
            'table_name' => $this->table_name,
            'status' => 0
        ]);
        $this->count = tb::all()->count();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã thêm!"
        ]);
    }
    public function deleteTable($table_id){
        tb::where('id', $table_id)->delete();
        $this->count = tb::all()->count();
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
