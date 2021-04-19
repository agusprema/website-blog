<?php

namespace App\View\Components\Modals;

use Illuminate\View\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TagsInput extends Component
{
    public $model;
    public $typeData;
    public $permission;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $model, string $data = 'role')
    {
        $this->model = $model;
        $this->typeData = $data;
        if ($data == 'role') {
            $this->permission =  Role::all();
        }
        if ($data == 'permission') {
            $this->permission =  Permission::all();
        }
        if ($data == 'all') {
            $this->permission = Role::with('permissions')->get()->makeHidden(['guard_name', 'created_at', 'updated_at']);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.modals.tags-input');
    }
}
