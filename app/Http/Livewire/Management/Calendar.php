<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use App\Models\Shift;
use App\Models\User;
use Livewire\WithPagination;
use App\Models\Calendar as CLD;
use Carbon\Carbon;

class Calendar extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $user, $noti, $Calendar_week, $week;
    public $date_work, $shift_work, $user_work;

    protected $rules = [
        'date_work' => 'required',
        'shift_work' => 'required',
        'user_work' => 'required',
    ];

    protected $messages = [
        'date_work.required' => 'Ngày làm không được bỏ trống',
        'shift_work.required' => 'Ca làm không được bỏ trống!',
        'user_work.required' => 'Người làm không được bỏ trống!',
    ];

    public function render()
    {
        return view('livewire.management.calendar', [
            'shift' => Shift::all(),
            'calendar' => CLD::where('date', now('Asia/Ho_Chi_Minh')->toDateString())->get(),
            'dayOfWeek' => CLD::orderBy('date', 'desc')->get()->groupBy('date')->take(7),
            'fullCalendar' => CLD::orderBy('date', 'desc')->get()->groupBy('date'),
        ]);
    }
    public function mount()
    {
        $this->noti = '';
        $this->Calendar_week = CLD::orderBy('date', 'desc')->get()->groupBy('date')->take(7)->toArray();
        $this->week = array_reverse($this->Calendar_week);
        $this->user = User::all();
        $this->user_work = array();
    }
    public function addCalendar()
    {
        $this->validate();
        if (!CLD::where('date', $this->date_work)->where('shift_id', $this->shift_work)->exists()) {
            foreach ($this->user_work as $value) {
                CLD::create([
                    'date' => $this->date_work,
                    'shift_id' => $this->shift_work,
                    'user_id' => $value,
                ]);
            }
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Đã xếp!"
            ]);
            $this->closeAdd();
        } else {
            $this->noti = 'Ca làm đã được xếp trong ngày hiện tại';
        }
    }
    public function closeAdd()
    {
        $this->noti = '';
        $this->resetValidation();
    }
    public function deleteCalendar($date_delete, $shift_delete)
    {
        if (!empty($date_delete) && !empty($shift_delete)) {
            CLD::where('date', $date_delete)->where('shift_id', $shift_delete)->delete();
        }
    }
    public function deleteAllCalendar()
    {
        $allWeek = CLD::orderBy('date', 'desc')->get()->groupBy('date')->take(7);
        foreach ($allWeek as $all => $week) {
            foreach ($week as $val) {
                CLD::where('id', $val->id)->delete();
            }
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đặt lại thành công!"
        ]);
    }
}
