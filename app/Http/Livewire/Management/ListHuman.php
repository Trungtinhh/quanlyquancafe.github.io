<?php

namespace App\Http\Livewire\Management;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use PDF;
class ListHuman extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $new, $role;
    public $detail ='';
    public $showDetail;
    public function render()
    {
        return view('livewire.management.list-human', ['link' => User::where('status', 1)->paginate(10)]);
    }
    public function mount()
    {
        $this->showDetail = false;
        $this->new = User::where('status', 1)->count();
        $this->role = Role::all();
    }
    public function detail(User $detail)
    {
        $this->showDetail = true;
        $this->dispatchBrowserEvent('show-detail');
        $this->detail = $detail;
    }
    public function resetDetail(){
        $this->detail = '';
    }
    public function print(User $detail)
    {  
        $role = $this->role;
        $pdf = PDF::loadView('livewire.profile.print-p-d-f',compact('role', 'detail'))->output(); //
        return response()->streamDownload(
            fn() => print($pdf), 'Thong_tin_nhan_su.pdf'
        );
    }
}
