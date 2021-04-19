<?php

namespace App\Http\Livewire\Modals\Permission;

use App\Traits\AuthorizesRequests;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Add extends Component
{
    use AuthorizesRequests;
    public $name;
    public $guard_name = 'web';
    public $modalAddPermission = false;

    protected $listeners = ['DestroyPermission' => 'destroy'];

    protected $rules = [
        'name' => 'required|unique:permissions,name',
        'guard_name' => 'required',
    ];

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.modals.permission.add');
    }

    /**
     * resetInputFields
     *
     * @return void
     */
    private function resetInputFields()
    {
        $this->reset(['name', 'guard_name']);
    }

    /**
     * submit
     *
     * @return void
     */
    public function submitAddPermission()
    {
        if ($this->authorize_sweatalert('create', Permission::class)) {
            return;
        };

        $this->validate();
        Permission::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name
        ]);
        $this->modalAddPermission = false;
        $this->resetInputFields();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Permission has been added',
            'position' => 'bottom-end',
            'icon' => 'success',
            'showConfirmButton' => false,
            'timer' => 1500,
            'backdrop' => false,
            'toast' => true
        ]);
        $this->emit('UpdateColumns');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        if ($this->authorize_sweatalert('delete', Permission::class)) {
            return;
        };

        Permission::destroy($id);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'The permission has been removed',
            'position' => 'bottom-end',
            'icon' => 'success',
            'showConfirmButton' => false,
            'timer' => 1500,
            'backdrop' => false,
            'toast' => true
        ]);
        $this->emit('UpdateColumns');
    }
}
