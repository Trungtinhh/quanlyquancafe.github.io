<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeKeeping as TKP;
use Livewire\WithPagination;
use App\Models\User;

class ManagerTimekeeping extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $count_tkp, $count_edit, $info_TKP, $hour;
    public $statusView = false;

    public function render()
    {
        return view('livewire.management.manager-timekeeping', [
            Carbon::setLocale('vi'),
            'confirmTKP' => TKP::where('status', 2)->orderBy('time_end')->paginate(10),
            'confirmEdit' => TKP::where('status_edit', 1)->orderBy('time_end')->paginate(10),
            'user' => User::where('status', 1)->paginate(10),
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
        $this->statusView = true;
        $this->info_TKP = TKP::where('user_id', $user_id)->orderByDesc('time_start')->get();
        $TKP = TKP::where('user_id', Auth::user()->id)->where('status', 1)->first();
        if (!empty($TKP)) $this->hour = new Carbon($TKP->time_start, 'Asia/Ho_Chi_Minh');
        $this->dispatchBrowserEvent('show-detail');
    }
    public function closeDetail(){
        $this->statusView = false;
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
}
