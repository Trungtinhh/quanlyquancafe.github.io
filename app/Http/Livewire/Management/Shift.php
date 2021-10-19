<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Shift as SH;

class Shift extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $shift, $count, $time_start, $time_end, $shift_name, $color, $noti;
    public $shift_edit;
    public $statusEditShift = false;
    protected $rules = [
        'shift_name' => 'required',
        'time_start' => 'required',
        'time_end' => 'required',
        'color' => 'required',
    ];
    protected $messages = [
        'shift_name.required' => 'Tên ca không được bỏ trống',
        'time_start.required' => 'Thời gian bắt đầu không được bỏ trống!',
        'time_end.required' => 'Thời gian kết thúc không được bỏ trống!',
        'color.required' => 'Vui lòng chọn màu đại diện',
    ];

    public function render()
    {
        return view('livewire.management.shift');
    }
    public function mount()
    {
        $this->noti = '';
        $this->shift = SH::all();
        $this->count = SH::all()->count();
    }
    public function resetAll()
    {
        $this->shift = SH::all();
        $this->count = SH::all()->count();
        $this->shift_name = '';
        $this->time_start = '';
        $this->time_end = '';
    }
    public function addShift()
    {
        $this->validate();
        if (!SH::where('name', $this->shift_name)->exists()) {
            SH::create([
                'name' => $this->shift_name,
                'time_start' => $this->time_start,
                'time_end' => $this->time_end,
                'color' => $this->color,
            ]);
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Thêm thành công!"
            ]);
            $this->resetAll();
            $this->closeAdd();
        }else{
            $this->noti = 'Tên ca đã có';
        }
    }
    public function closeAdd()
    {
        $this->noti = '';
        $this->resetValidation();
    }
    public function deleteShift($shift_id)
    {
        SH::where('id', $shift_id)->delete();
        $this->resetAll();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã xóa!"
        ]);
    }
    public function editShift(SH $shift)
    {
        $this->resetValidation();
        $this->statusEditShift = true;
        $this->shift_edit = $shift;
        $this->dispatchBrowserEvent('show-edit');
    }
    public function storeEditShift()
    {
        $this->validate();
        SH::where('id', $this->shift_edit['id'])->update([
            'name' => $this->shift_name,
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
            'color' => $this->color,
        ]);
        $this->resetAll();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Cập nhật thành công!"
        ]);
    }
    public function closeEdit()
    {
        $this->statusEditShift = false;
        $this->resetValidation();
    }
}
