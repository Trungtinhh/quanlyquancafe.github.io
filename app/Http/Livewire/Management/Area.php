<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use App\Models\Area as Are;
use App\Models\Table;

class Area extends Component
{
    public $count, $table_id, $area_name, $sub_id;
    public $noti;
    protected $rules = [
        'area_name' => 'required',
        'table_id' => 'required'
    ];
    protected $messages = [
        'area_name.required' => 'Tên khu vực không được bỏ trống',
        'table_id.required' => 'Vui lòng chọn bàn cho khu vực',
    ];
    public function render()
    {
        return view('livewire.management.area', [
            'area' => Are::all(),
            'table' => Table::all(),
        ]);
    }
    public function mount()
    {
        $this->count = Are::all()->count();
        $this->area_name = '';
        $this->table_id = [];
        $this->noti = '';
    }
    public function addArea()
    {
        $this->validate();
        if (empty(Are::where('sub_name', $this->area_name)->first())) {
            $sub = Are::create([
                'sub_name' => $this->area_name
            ]);
            if (!empty($this->table_id) && !in_array(-1, $this->table_id)) {
                foreach ($this->table_id as $id) {
                    Table::where('id', $id)->update([
                        'sub_id' => $sub->getKey(),
                    ]);
                }
            }
            $this->mount();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Thêm thành công!"
            ]);
        } else {
            $this->noti = 'Khu vực này đã có';
        }
    }
    public function closeAdd()
    {
        $this->noti = '';
        $this->resetValidation();
    }
    public function deleteArea($sub_id)
    {
        Table::where('sub_id', $sub_id)->update([
                'sub_id' => null
            ]);
        Are::where('id', $sub_id)->delete();
        $this->mount();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã xóa!"
        ]);
    }
    public function addTable($sub_id)
    {
        $this->sub_id = $sub_id;
        $this->dispatchBrowserEvent('show-add-table');
    }
    public function storeTable()
    {
        if (!empty($this->table_id)) {
            foreach ($this->table_id as $id) {
                Table::where('id', $id)->update([
                    'sub_id' => $this->sub_id,
                ]);
            }
            $this->mount();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Thêm thành công!"
            ]);
        } else {
            $this->noti = 'Vui lòng chọn bàn';
        }
    }
    public function detailArea($sub_id)
    {
        $this->sub_id = $sub_id;
        $this->dispatchBrowserEvent('show-detail-area');
    }
    public function deleteTableInArea($table_id_in_area)
    {
        $table_update = Table::where('id', $table_id_in_area)->first();
        if ($table_update->status != 1) {
            Table::where('id', $table_id_in_area)->update([
                'sub_id' => null
            ]);
        }else{
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => "Bàn đang có người không thể xóa!"
            ]);
        }
    }
}
