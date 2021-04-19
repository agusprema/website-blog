<?php

namespace App\Http\Livewire\Modals\Permission;

use App\Traits\AuthorizesRequests;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{
    use AuthorizesRequests;
    public $data_id;
    public $name;
    public $guard_name;
    public $modalEditPermission = false;

    protected $listeners = ['EditDataPermission' => 'edit'];

    protected $rules = [
        'name' => 'required',
        'guard_name' => 'required',
    ];

    private function resetInputFields()
    {
        $this->reset(['name', 'guard_name']);
    }

    public function render()
    {
        return view('livewire.modals.permission.edit');
    }

    public function edit($id)
    {
        $this->data_id = $id;
        $this->modalEditPermission = true;
        $this->resetInputFields();
        $data = Permission::find($id);
        $this->name = $data->name;
        $this->guard_name = $data->guard_name;
    }

    public function submitEditPermission()
    {
        if ($this->authorize_sweatalert('update', Permission::class)) {
            return;
        };

        $this->validate();
        Permission::findOrFail($this->data_id)->update([
            'name' => $this->name,
            'guard_name' => $this->guard_name
        ]);
        $this->modalEditPermission = false;
        $this->dispatchBrowserEvent('swal', [
            'title' => 'The permission has been updated',
            'position' => 'bottom-end',
            'icon' => 'success',
            'title' => 'Your work has been saved',
            'showConfirmButton' => false,
            'timer' => 1500,
            'backdrop' => false,
            'toast' => true
        ]);
        $this->emit('UpdateColumns');
        $this->resetInputFields();
    }
}
