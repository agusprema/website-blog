<?php

namespace App\Http\Livewire\Admins;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionManagement extends Component
{
    public $roles;
    public $permissions;
    public $targetRole;
    public $selected = [];

    protected $listeners = ['ChangePermission', 'UpdateColumns' => 'mount'];

    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
        $this->ChangePermission();
    }

    /**
     * ChangePermission
     *
     * @param  mixed $role
     * @return void
     */
    public function ChangePermission($role = '')
    {
        $this->targetRole = $role ? $role : $this->roles->first()->pluck('name')[0];
        $this->selected = Role::whereName($this->targetRole)->with('permissions')->get()[0]->permissions->pluck('name');
    }

    /**
     * giveRolePermission
     *
     * @return void
     */
    public function giveRolePermission()
    {
        $role = Role::where('name', $this->targetRole)->first();
        $role->syncPermissions($this->selected);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Give role permission has sucesfull',
            'position' => 'bottom-end',
            'icon' => 'success',
            'showConfirmButton' => false,
            'timer' => 1500,
            'backdrop' => false,
            'toast' => true
        ]);
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.admins.role-permission-management');
    }
}
