<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeKeeping as TKP;
use Livewire\WithPagination;
use App\Models\User;

class TimeKeeping extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $start, $end, $temp, $hour, $count, $time_start, $time_end, $id_edit;
    public $statusEdit = false;
    protected $rules = [
        'time_start' => 'required',
        'time_end' => 'required|after:time_start',
    ];
    protected $messages = [
        'time_start.required' => 'Thời gian bắt đầu không được bỏ trống!',
        'time_end.required' => 'Thời gian kết thúc không được bỏ trống!',
        'time_end.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu!',
    ];
    public function render()
    {
        return view('livewire.management.time-keeping',[
            'tkp' => TKP::where('user_id', Auth::user()->id)->orderByDesc('time_start')->paginate(10),
        ]);
    }
    public function mount()
    {
        $this->start = 0;
        $this->end = 0;
        $this->count = TKP::where('user_id', Auth::user()->id)->count();
        $this->temp = TKP::where('user_id', Auth::user()->id)->where('status', 1)->first();
        if (!empty($this->temp)) $this->hour = new Carbon($this->temp->time_start, 'Asia/Ho_Chi_Minh');
    }
    public function resetTKP()
    {
        $this->temp = TKP::where('user_id', Auth::user()->id)->where('status', 1)->first();
        if (!empty($this->temp)) $this->hour = new Carbon($this->temp->time_start, 'Asia/Ho_Chi_Minh');
        $this->count = TKP::where('user_id', Auth::user()->id)->count();
    }
    public function start()
    {
        $this->start = Carbon::now('Asia/Ho_Chi_Minh');
        TKP::create([
            'user_id' => Auth::user()->id,
            'time_start' => $this->start,
            'status' => 1,
        ]);
        $this->resetTKP();
    }
    public function end()
    {
        Carbon::setLocale('vi');
        $this->end = Carbon::now('Asia/Ho_Chi_Minh');
        TKP::where('id', $this->temp->id)->update([
            'time_end' => $this->end,
            'status' => 2,
            'hour' => $this->hour->diffInMinutes(now('Asia/Ho_Chi_Minh')),
        ]);
        $this->resetTKP();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đang đợi xét duyệt!"
        ]);
    }
    public function delete($id)
    {
        TKP::where('id', $id)->delete();
        $this->resetTKP();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã xóa!"
        ]);
    }
    public function edit($id_edit)
    {
        $this->statusEdit = true;
        $this->id_edit = $id_edit;
        $this->dispatchBrowserEvent('show-edit');
    }
    public function storeEdit()
    {
        $this->validate();
        $timeEnd = new Carbon($this->time_end, 'Asia/Ho_Chi_Minh');
        $timeStart = new Carbon($this->time_start, 'Asia/Ho_Chi_Minh');
        if (TKP::where('id', $this->id_edit)->first()->status != 2) {
            TKP::where('id', $this->id_edit)->update([
                'time_start' => $this->time_start,
                'time_end' => $this->time_end,
                'hour' => $timeStart->diffInMinutes($timeEnd),
                'status_edit' => 1,
            ]);
        }
        else{
            TKP::where('id', $this->id_edit)->update([
                'time_start' => $this->time_start,
                'time_end' => $this->time_end,
                'hour' => $timeStart->diffInMinutes($timeEnd),
            ]);
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Sửa thành công! 
                        Đang đợi xét duyệt."
        ]);
    }
}
