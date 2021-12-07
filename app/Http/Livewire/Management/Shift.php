<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Shift as SH;

class Shift extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $count, $time_start, $time_end, $shift_name, $color, $noti, $mess;
    public $shift_edit;
    public $statusEditShift = false;
    protected $messages = [
        'shift_name.required' => 'Tên ca không được bỏ trống',
        'time_start.required' => 'Thời gian bắt đầu không được bỏ trống!',
        'time_end.required' => 'Thời gian kết thúc không được bỏ trống!',
        'color.required' => 'Vui lòng chọn màu đại diện',
    ];

    public function render()
    {
        return view('livewire.management.shift', ['shift' => SH::all()->toArray()]);
    }
    public function mount()
    {
        $this->noti = '';
        $this->mess = '';
        $this->count = SH::all()->count();
    }
    public function resetAll()
    {
        $this->count = SH::all()->count();
        $this->shift_name = '';
        $this->time_start = '';
        $this->time_end = '';
    }
    public function showAdd()
    {
        $this->closeAdd();
        if (SH::orderBy('id', 'DESC')->first() != null) {
            $last_shift = SH::orderBy('id', 'DESC')->first();
            $this->time_start = $last_shift->time_end;
        }
        $this->dispatchBrowserEvent('show-add');
    }
    public function addShift()
    {
        $this->validate([
            'shift_name' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'color' => 'required',
        ]);
        if (!SH::where('name', $this->shift_name)->exists()) {
            if ($this->time_end <= $this->time_start) {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'warning',
                    'message' => "Ca làm không hợp lệ!"
                ]);
            } else{
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
            }
            $this->resetAll();
            $this->closeAdd();
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => "Tên ca đã có!"
            ]);
        }
    }
    public function closeAdd()
    {
        $this->noti = '';
        $this->mess = '';
        $this->resetValidation();
    }
    public function deleteShift()
    {
        SH::query()->delete();
        $this->resetAll();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã đặt lại!"
        ]);
    }
    public function editShift($shift)
    {
        $this->resetValidation();
        $this->statusEditShift = true;
        $this->shift_edit = SH::where('id', $shift)->first()->toArray();
        $this->dispatchBrowserEvent('show-edit');
    }
    public function storeEditShift()
    {
        $this->validate();
        if ($this->time_end < $this->time_start) {
            SH::where('id', $this->shift_edit['id'])->update([
                'name' => $this->shift_name,
                'time_start' => $this->time_start,
                'time_end' => $this->time_end . ' hôm sau',
                'color' => $this->color,
            ]);
            $this->resetAll();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Cập nhật thành công!"
            ]);
        } else {
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
    }
    public function closeEdit()
    {
        $this->statusEditShift = false;
        $this->resetValidation();
    }
}
