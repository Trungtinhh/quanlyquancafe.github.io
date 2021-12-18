<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeKeeping as TKP;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Wage;

class ManagerTimekeeping extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $count_tkp, $count_edit, $info_TKP, $hour;
    public $wage_money = 0, $wage = 0, $hour_wage = 0, $user_id, $insertWage;
    public $statusView = false;

    public function render()
    {
        return view('livewire.management.manager-timekeeping', [
            Carbon::setLocale('vi'),
            'confirmTKP' => TKP::where('status', 2)->orderBy('time_end')->paginate(10),
            'confirmEdit' => TKP::where('status_edit', 1)->orderBy('time_end')->get(),
            'user' => User::where('status', 1)->get(),
        ]);
    }
    public function mount()
    {
        $this->count_tkp = TKP::where('status', 2)->count();
        $this->count_edit = TKP::where('status_edit', 1)->count();
    }
    public function resetTKP()
    {
        $this->count_tkp = TKP::where('status', 2)->count();
        $this->count_edit = TKP::where('status_edit', 1)->count();
    }
    public function confirm($id_tkp)
    {
        TKP::where('id', $id_tkp)->update([
            'status' => 3,
        ]);
        $this->resetTKP();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Xác nhận thành công!"
        ]);
    }
    public function confirmEdit($id_edit)
    {
        TKP::where('id', $id_edit)->update([
            'status_edit' => 3,
        ]);
        $this->resetTKP();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Xác nhận thành công!"
        ]);
    }
    public function detail($user_id)
    {
        $this->closeDetail();
        $this->statusView = true;
        $this->user_id = $user_id;
        $this->info_TKP = TKP::where('user_id', $user_id)->orderByDesc('time_start')->get();
        foreach ($this->info_TKP as $val) {
            $date = new Carbon($val->time_start, 'Asia/Ho_Chi_minh');
            $dt = Carbon::now('Asia/Ho_Chi_minh');
            if ($date->diffInDays($dt) <= $dt->daysInMonth) {
                $this->hour_wage += $val->hour;
            }
        }
        $this->hour_wage /= 60;
        $TKP = TKP::where('user_id', Auth::user()->id)->where('status', 1)->first();
        if (!empty($TKP)) $this->hour = new Carbon($TKP->time_start, 'Asia/Ho_Chi_Minh');
        $this->dispatchBrowserEvent('show-detail');
    }
    public function closeDetail()
    {
        $this->statusView = false;
        $this->wage_money = 0;
        $this->wage = 0;
        $this->hour_wage = 0;
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
    public function wage()
    {
        $this->wage = $this->hour_wage * $this->wage_money;
    }
    public function undoWage()
    {
        $this->wage_money = 0;
        $this->wage = 0;
    }
    public function insertWage()
    {
        if ($this->wage != 0) {
            if (!Wage::where('wage', $this->wage)->where('user_id', $this->user_id)->where('date', Carbon::now()->toDateString())->exists()) {
                $this->insertWage = Wage::create([
                    'wage' => $this->wage,
                    'user_id' => $this->user_id,
                    'date' => Carbon::now()->toDateString(),
                ]);
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'success',
                    'message' => "Đã lưu lại!"
                ]);
            } else {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'warning',
                    'message' => "Đã thêm lương tháng này!"
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => "Chưa có lương!"
            ]);
        }
    }
}
