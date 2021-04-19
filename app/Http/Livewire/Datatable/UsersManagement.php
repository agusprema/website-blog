<?php

namespace App\Http\Livewire\Datatable;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use App\Traits\AuthorizesRequests;

class UsersManagement extends LivewireDatatable
{
    use AuthorizesRequests;
    public $model = User::class;
    public $hideable = 'select';
    public $trash = false;
    public $ban = false;

    protected $listeners = [
        'UpdateColumns' => 'columns',
        'ResetSelected' => 'resetSelected',
        'ToggleTrash' => 'trash',
        'ToggleBan' => 'ban',
    ];

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function builder()
    {
        $model = User::query()->orderBy('id', 'desc')->whereNotIn('email', ['agusprema@gmail.com']);
        return $this->trash ? $model->onlyTrashed() : ($this->ban ? $model->onlyBanned() : $model->withoutBanned());
    }

    public function trash($trash)
    {
        $this->ban = false;
        return $this->trash = $trash;
    }

    public function ban($ban)
    {
        $this->trash = false;
        return $this->ban = $ban;
    }

    public function columns()
    {
        // if ($this->authorize_sweatalert('view', $this->model)) {
        //     return [];
        // }

        return [
            Column::checkbox('id'),
            Column::name('name')->label('Name')->searchable(),
            Column::name('email')->label('Email')->searchable(),
            BooleanColumn::name('email_verified_at')->label('Verified')->filterable(),
            Column::callback(['id'], function ($id) {
                return view('components.partials.table-user-action', [
                    'model' => 'Menu',
                    'id' => $id,
                    'raw' => $this->selected,
                    'trash' => $this->trash,
                    'ban' => $this->ban,
                    'edit' => true,
                    'delete' => true
                ]);
            })->label('Action')
        ];
    }
}
