<?php

namespace App\Http\Livewire\Datatable;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionManagement extends LivewireDatatable
{
    public $model = Permission::class;
    public $hideable = false;
    public $hidePagination = true;
    public $trash;

    public function builder()
    {
        return Permission::query()->orderBy('id', 'desc');
    }

    public function columns()
    {
        return [
            Column::name('name')->label('Name'),
            Column::name('guard_name')->label('Guard'),
            Column::checkbox('id'),
            Column::callback(['id'], function ($id) {
                return view('components.partials.table-action', [
                    'model' => 'Role',
                    'id' => $id,
                    'edit' => true,
                    'show' => false,
                    'raw' => false,
                    'trash' => false,
                    'delete' => true
                ]);
            })->label('Action')
        ];
    }
}
