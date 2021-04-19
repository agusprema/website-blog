<?php

namespace App\Http\Livewire\Datatable;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Spatie\Activitylog\Models\Activity;
use App\Models\User;

class ActivityLog extends LivewireDatatable
{
    public $model = Activity::class;
    public $hideable = 'select';
    public $trash;

    public function builder()
    {
        return Activity::query()->orderBy('id', 'desc');
    }

    public function columns()
    {
        return [
            Column::name('log_name')->label('Name')->searchable(),
            Column::name('description')->label('Description')->searchable(),
            // Column::callback(['causer_id'], function ($id) {
            //     return User::where('id', $id)->get()->pluck('email')[0];
            // })->label('User'),
            Column::callback(['id'], function ($id) {
                return view('components.partials.table-action', [
                    'model' => 'Activity',
                    'id' => $id,
                    'edit' => false,
                    'show' => 'modal',
                    'raw' => $this->selected,
                    'trash' => false,
                    'delete' => false
                ]);
            })->label('Action')
        ];
    }
}
