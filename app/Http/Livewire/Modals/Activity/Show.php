<?php

namespace App\Http\Livewire\Modals\Activity;

use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class Show extends Component
{
    public $data;
    public $show = false;
    public $log_name;

    protected $listeners = ['ShowData' => 'show'];

    public function render()
    {
        return view('livewire.modals.activity.show');
    }

    public function show($id)
    {
        $this->show = true;
        $this->data = Activity::where('id', $id)->get()[0];
        $this->log_name = $this->data->properties;
    }
}
