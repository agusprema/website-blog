<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Traits\AuthorizesRequests;
use App\Traits\TraitModal;

class Roles extends Component
{
    use AuthorizesRequests, TraitModal;
    public $model = Menu::class;
    public $modelName = 'menu';
    public $name;
    public $guard_name;

    protected $listeners = ['Destroy' => 'destroy', 'Restore' => 'restore', 'Delete' => 'delete', 'EditData' => 'edit'];

    protected $rules = [
        'name' => 'required',
        'guard_name' => 'required',
    ];

    /**
     * resetInputFields
     *
     * @return void
     */
    private function resetInputFields()
    {
        $this->reset(['name', 'guard_name']);
    }

    public function render()
    {
        return view('livewire.modals.roles');
    }

    public function store()
    {
        if ($this->authorize_sweatalert('create', $this->model)) {
            return;
        };
        $this->validate();

        $this->model::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name
        ]);

        $this->UpdateColumns($this->modelName . ' has been added');
    }

    public function update()
    {
        if ($this->authorize_sweatalert('create', $this->model)) {
            return;
        };
        $this->validate();

        $this->model::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name
        ]);

        $this->UpdateColumns($this->modelName . ' has been added');
    }
}
