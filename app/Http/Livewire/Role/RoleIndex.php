<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\Permission;
use Livewire\WithPagination;

class RoleIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $permission, $new, $role, $per;
    public $message1;
    protected $rules = [
        'role' => 'required',
        'per' => 'required',
    ];
    protected $messages = [
        'role.required' => 'Tên nhóm người dùng không được bỏ trống!',
        'per.required' => 'Quyền của nhóm không được bỏ trống!',
    ];
    public function render()
    {
        return view('livewire.role.role-index', ['roles' => Role::paginate(10)]);
    }
    public function mount()
    {
        $this->per = array();
        $this->message1 = '';
        $this->new  = Role::all()->count();
        $this->permission = Permission::getPermissionDefault();
    }
    public function deleteRole($role_id)
    {
        Role::where('id', $role_id)->delete();
        $this->new  = Role::all()->count();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã xóa!"
        ]);
    }
    public function addRole()
    {
        $this->validate();
        if (Role::where('name', $this->role)->doesntExist()) {
            $role1 = Role::create(['name' => $this->role]);
            foreach ($this->per as $val) {
                $role1->givePermissionTo($val);
            }
            $this->new  = Role::all()->count();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Thêm thành công!"
            ]);

        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Tên nhóm người dùng đã tồn tại!"
            ]);
        }
    }
}
