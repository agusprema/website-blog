<?php

namespace App\Traits;

use Illuminate\Auth\Access\Response;
use Illuminate\Support\Carbon;
use App\Models\User;

trait TraitModal
{
    public $editMode = false;
    public $addedMode = false;
    public $showModal = false;
    public $data_id;

    /**
     * cancel
     *
     * @return void
     */
    public function cancel()
    {
        $this->editMode = false;
        $this->addedMode = false;
        $this->showModal = false;
        $this->resetInputFields();
    }

    public function editMode()
    {
        $this->resetInputFields();
        $this->editMode = true;
        $this->addedMode = false;
        $this->showModal = true;
    }

    public function addedMode()
    {
        $this->resetInputFields();
        $this->editMode = false;
        $this->addedMode = true;
        $this->showModal = true;
    }

    /**
     * UpdateColumns
     *
     * @param  mixed $massage
     * @return void
     */
    public function UpdateColumns($massage)
    {
        $this->cancel();
        $this->alert($massage);
        $this->emit('UpdateColumns');
    }

    /**
     * alert
     *
     * @param  mixed $massage
     * @return void
     */
    public function alert($massage)
    {
        $this->dispatchBrowserEvent('swal', [
            'title' => $massage,
            'position' => 'bottom-end',
            'icon' => 'success',
            'showConfirmButton' => false,
            'timer' => 1500,
            'backdrop' => false,
            'toast' => true
        ]);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id = [])
    {
        if ($this->authorize_sweatalert('delete', $this->model)) {
            return;
        };

        $this->model::destroy(json_decode($id));
        $this->UpdateColumns('The ' . $this->modelName . ' has been removed');
    }

    /**
     * restore
     *
     * @param  mixed $id
     * @return void
     */
    public function restore($id = [])
    {
        if ($this->authorize_sweatalert('restore', $this->model)) {
            return;
        };

        $this->model::whereIn('id', json_decode($id))->restore();
        $this->UpdateColumns('The ' . $this->modelName . ' has been restore');
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id = [])
    {
        if ($this->authorize_sweatalert('forceDelete', $this->model)) {
            return;
        };
        $this->model::whereIn('id', json_decode($id))->forceDelete();
        $this->UpdateColumns('The ' . $this->modelName . ' has been force delete');
    }
}
