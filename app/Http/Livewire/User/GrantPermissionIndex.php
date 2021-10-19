<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
class GrantPermissionIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $new;
    public function render()
    {
        return view('livewire.user.grant-permission-index',['link'=>User::where('status',1)->paginate(10)]);
    }
    public function mount(){
        $this->new  = User::where('status', '1')->count();
    }
    public function grantPermission($user_id){
        return redirect()->route('user.grant_permission', ['user_id' => $user_id]);
    }
}