<?php

namespace App\Http\Livewire\Modals\Role;

use App\Traits\AuthorizesRequests;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    use AuthorizesRequests;
    public $data_id;
    public $name;
    public $guard_name;
    public $modalEditRole = false;

    protected $listeners = ['EditDataRole' => 'edit'];

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
        return view('livewire.modals.role.edit');
    }

    public function edit($id)
    {
        $this->data_id = $id;
        $this->modalEditRole = true;
        $this->resetInputFields();
        $data = Role::find($id);
        $this->name = $data->name;
        $this->guard_name = $data->guard_name;
    }

    public function submitEditRole()
    {
        if ($this->authorize_sweatalert('update', Role::class)) {
            return;
        };

        $this->validate();
        Role::findOrFail($this->data_id)->update([
            'name' => $this->name,
            'guard_name' => $this->guard_name
        ]);
        $this->modalEditRole = false;
        $this->dispatchBrowserEvent('swal', [
            'title' => 'The role has been updated',
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
