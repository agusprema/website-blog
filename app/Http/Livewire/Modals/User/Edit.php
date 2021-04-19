<?php

namespace App\Http\Livewire\Modals\User;

use App\Traits\AuthorizesRequests;
use Livewire\Component;
use App\Models\User;

class Edit extends Component
{
    use AuthorizesRequests;
    protected $listeners = [
        'ResetSelected' => 'resetSelected',
        'Destroy' => 'destroy',
        'Delete' => 'delete',
        'Restore' => 'restore',
    ];

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function render()
    {
        return view('livewire.modals.user.edit');
    }

    public function delete($id = [])
    {
        dump($id);
    }

    public function destroy($id = [])
    {
        // if ($this->authorize_sweatalert('delete', Menu::class)) {
        //     return;
        // };

        User::destroy(json_decode($id));
        $this->dispatchBrowserEvent('swal', [
            'title' => 'The menu has been removed',
            'position' => 'bottom-end',
            'icon' => 'success',
            'showConfirmButton' => false,
            'timer' => 1500,
            'backdrop' => false,
            'toast' => true
        ]);
        $this->reset(['selected']);
        $this->emit('UpdateColumns');
    }

    public function restore($id = [])
    {
        dump($id);
    }
}
