<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use App\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public $results_permissions, $role, $permission;
    public $message ='';
    protected $rules = [
        'role' => 'required',
        'permission' => 'required',
    ];
    public function render()
    {
        return view('livewire.role.create-role');
    }
    public function mount()
    {
        $this->permission = array();
        $this->results_permissions = Permission::getPermissionDefault();
    }

    public function addRole()
    {   
        $this->validate();
        if(!empty(Role::where('name', $this->role))) $this->message = 'Role đã tồn tại !';
        $role1 = Role::create(['name' => $this->role]); 
        foreach ($this->permission as $val) {
            $role1->givePermissionTo($val);
        }
        $this->message = 'Đã thêm !';
    }
}
