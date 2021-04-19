<?php

namespace App\Http\Livewire\Modals\User;

use App\Traits\AuthorizesRequests;
use Livewire\Component;
use App\Models\User;

class BanUser extends Component
{
    use AuthorizesRequests;
    public $modalBan = false;
    public $comment;
    public $expired_at;
    public $permanent = false;
    public $data_id;

    protected $listeners = [
        'BanUser' => 'BanUserModal',
        'UnBanUser' => 'unbanuser'
    ];

    protected $rules = [
        'comment' => 'string',
        'expired_at' => 'date',
    ];

    /**
     * resetInputFields
     *
     * @return void
     */
    private function resetInputFields()
    {
        $this->reset(['comment', 'expired_at']);
    }

    public function render()
    {
        return view('livewire.modals.user.ban-user');
    }

    public function BanUserModal($id = [])
    {
        $this->modalBan = true;
        $this->data_id = $id;
    }

    public function banuser()
    {
        $users = User::whereIn('id', json_decode($this->data_id))->get();
        foreach ($users as $user) {
            $user->ban([
                'comment' => $this->comment,
                'expired_at' => $this->permanent ? Null : $this->expired_at,
            ]);
        }
        $this->dispatchBrowserEvent('swal', [
            'title' => 'The menu has been removed',
            'position' => 'bottom-end',
            'icon' => 'success',
            'showConfirmButton' => false,
            'timer' => 1500,
            'backdrop' => false,
            'toast' => true
        ]);
        $this->modalBan = false;
        $this->resetInputFields();
        $this->emit('UpdateColumns');
    }

    public function unbanuser($id = [])
    {
        $users = User::whereIn('id', json_decode($id))->get();
        foreach ($users as $user) {
            $user->unban();
        }
        $this->dispatchBrowserEvent('swal', [
            'title' => 'The menu has been removed',
            'position' => 'bottom-end',
            'icon' => 'success',
            'showConfirmButton' => false,
            'timer' => 1500,
            'backdrop' => false,
            'toast' => true
        ]);
        $this->emit('UpdateColumns');
    }
}
