<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class GrantPermission extends Component
{
    use HasRoles;

    public $user_id, $results_user, $results_roles, $results_permissions;
    public $role, $permission;
    public function render()
    {
        return view('livewire.user.grant-permission');
    }
    public function mount($user_id)
    {
        $this->role = array();
        $this->permission = array();
        $this->user_id = $user_id;
        $this->results_user = User::find($this->user_id);
        $this->results_roles = Role::all();
        $this->results_permissions = Permission::getPermissionDefault();
    }
    public function addPermission()
    {
        if (!empty($this->role)) {
            foreach ($this->results_roles as $rol) {
                if ($this->results_user->hasRole($rol->name))
                    $this->results_user->removeRole($rol->name);
            }
            if (in_array('0', $this->role)) {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'success',
                    'message' => "Đã thu hồi nhóm quyền!"
                ]);
            } else {
                foreach ($this->role as $role_id) {
                    $rol = Role::find($role_id);
                    $this->results_user->assignRole($rol->name);
                }
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'success',
                    'message' => "Cấp thành công!"
                ]);
            }
        }
        if (!empty($this->permission)) {
            foreach ($this->results_permissions as $results_permission => $per) {
                if ($this->results_user->hasPermissionTo($per['name']))
                    $this->results_user->revokePermissionTo($per['name']);
            }
            if (in_array('0', $this->permission)) {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'success',
                    'message' => "Đã thu hồi quyền bổ sung!"
                ]);
            } else {
                foreach ($this->permission as $val) {
                    $this->results_user->givePermissionTo($val);
                }
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'success',
                    'message' => "Cấp thành công!"
                ]);
            }
        }
        if (!empty($this->role) && !empty($this->permission) && in_array('0', $this->permission) && in_array('0', $this->role)) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Đã thu hồi nhóm quyền và quyền bổ sung!"
            ]);
        }
        //$this->reset(['results_user', 'results_roles', 'results_permissions']);
    }
}
