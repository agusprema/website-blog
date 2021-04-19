<?php

namespace App\Http\Livewire\Datatable;

use App\Models\Menu;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use App\Traits\AuthorizesRequests;
use App\Traits\DatatableDraggable;

class MenuManagement extends LivewireDatatable
{
    use AuthorizesRequests; //, DatatableDraggable;
    public $model = Menu::class;
    public $trash = false;

    protected $listeners = ['UpdateColumns' => 'columns', 'ToggleTrash' => 'trash', 'ResetSelected' => 'resetSelected'];

    public function builder()
    {
        return Menu::query()->orderBy('id', 'desc')->when($this->trash, function ($query, $trash) {
            return $query->onlyTrashed();
        });
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function trash($trash)
    {
        return $this->trash = $trash;
    }

    public function columns()
    {
        if ($this->authorize_sweatalert('viewAny', $this->model)) {
            return [];
        }

        return [
            // static::draggable('id'),
            Column::checkbox('id'),
            Column::name('menu_name')->label('Name')->searchable(),
            Column::name('menu_type')->label('Type')->filterable(['group', 'basic', 'dropdown']),
            Column::callback(['menu_icon'], function ($icon) {
                return "<div class='text-center'><i class='$icon text-2xl' ></i></div>";
            })->label('Icon'),
            Column::callback(['parent_id'], function ($parentId) {
                return $parentId > 0 ? Menu::where('id', $parentId)->pluck('menu_name')->first() : 'none';
            })->label('Parent'),
            BooleanColumn::name('menu_active')->label('Status')->filterable(),
            Column::callback(['menu_permission'], function ($menupPermissions) {
                return view('components.partials.show-tag', [
                    'permissions' => explode('|', $menupPermissions)
                ]);
            })->label('Role & Permissions'),
            Column::callback(['id'], function ($id) {
                return view('components.partials.table-action', [
                    'view' => 'modals.menus.edit',
                    'model' => 'Menu',
                    'id' => $id,
                    'raw' => $this->selected,
                    'edit' => true,
                    'show' => false,
                    'trash' => $this->trash,
                    'delete' => true
                ]);
            })->label('Action')
        ];
    }
}
