<?php

namespace App\Http\Livewire\Modals\Role;

use App\Traits\AuthorizesRequests;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Add extends Component
{
    use AuthorizesRequests;
    public $name;
    public $guard_name = 'web';
    public $modalAddRole = false;

    protected $listeners = ['DestroyRole' => 'destroy'];

    protected $rules = [
        'name' => 'required|unique:roles,name',
        'guard_name' => 'required',
    ];

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.modals.role.add');
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
    public function submitAddRole()
    {
        if ($this->authorize_sweatalert('create', Role::class)) {
            return;
        };

        $this->validate();
        Role::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ]);
        $this->modalAddRole = false;
        $this->resetInputFields();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Role has been added',
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
        if ($this->authorize_sweatalert('delete', Role::class)) {
            return;
        };

        Role::destroy($id);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'The role has been removed',
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
