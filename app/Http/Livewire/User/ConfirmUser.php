<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class ConfirmUser extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $users, $new;

    public function render()
    {
        return view('livewire.user.confirm-user', ['link' => User::where('status', 0)->paginate(10)]);
    }
    public function mount()
    {
        $this->new  = User::where('status', '0')->count();
    }
    public function confirmUser($user_id)
    {
        User::where('id', $user_id)->update(['status' => 1]);
        $this->new  = User::where('status', '0')->count();
        $this->users = User::all();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Xong!"
        ]);
    }
    public function refuseUser($user_id)
    {
        User::where('id', $user_id)->delete();
        $this->new  = User::where('status', '0')->count();
        $this->users = User::all();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã xóa!"
        ]);
    }
}
