<?php

namespace App\Http\Livewire\Modals;

use App\Traits\AuthorizesRequests;
use App\Traits\TraitModal;
use Livewire\Component;
use App\Models\Menu;

class Menus extends Component
{
    use AuthorizesRequests, TraitModal;
    public $model = Menu::class;
    public $modelName = 'menu';
    public $modelComponent = '';
    public $menu_name;
    public $menu_url;
    public $menu_type;
    public $menu_icon;
    public $parent_id;
    public $menu_permission = [];
    public $menu_active;

    protected $listeners = ['Destroy' => 'destroy', 'Restore' => 'restore', 'Delete' => 'delete', 'EditData' => 'edit'];

    protected $rules = [
        'menu_name' => 'required',
        'menu_url' => 'nullable',
        'menu_type' => 'required',
        'menu_icon' => 'required',
        'parent_id' => 'required',
        'menu_permission' => 'required',
        'menu_active' => 'boolean',
    ];

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.modals.menus');
    }

    /**
     * resetInputFields
     *
     * @return void
     */
    private function resetInputFields()
    {
        $this->reset(['menu_name', 'menu_url', 'menu_type', 'menu_icon', 'parent_id', 'menu_permission', 'menu_active']);
    }

    /**
     * store
     *
     * @return void
     */
    public function store()
    {
        if ($this->authorize_sweatalert('create', $this->model)) {
            return;
        };
        $this->validate();

        $this->model::create([
            'menu_name' => $this->menu_name,
            'menu_url' => $this->menu_url,
            'menu_type' => $this->menu_type,
            'menu_icon' => $this->menu_icon,
            'parent_id' => $this->parent_id,
            'menu_permission' => implode("|", $this->menu_permission),
            'menu_active' => $this->menu_active
        ]);
        $this->UpdateColumns($this->modelName . ' has been added');
    }

    public function edit($id)
    {
        $this->editMode();
        $data = $this->model::find($id);
        $this->data_id = $data->id;

        $this->menu_name = $data->menu_name;
        $this->menu_url = $data->menu_url;
        $this->menu_type = $data->menu_type;
        $this->menu_icon = $data->menu_icon;
        $this->parent_id = $data->parent_id;
        $this->menu_permission = explode("|", $data->menu_permission);
        $this->menu_active = $data->menu_active;
    }

    public function update()
    {
        if ($this->authorize_sweatalert('update', $this->model)) {
            return;
        };

        $this->validate();
        $this->model::findOrFail($this->data_id)->update([
            'menu_name' => $this->menu_name,
            'menu_url' => $this->menu_url,
            'menu_type' => $this->menu_type,
            'menu_icon' => $this->menu_icon,
            'parent_id' => $this->parent_id,
            'menu_permission' => is_array($this->menu_permission) ? implode("|", $this->menu_permission) : $this->menu_permission,
            'menu_active' => $this->menu_active
        ]);
        $this->UpdateColumns('The ' . $this->modelName . ' has been updated');
    }
}
