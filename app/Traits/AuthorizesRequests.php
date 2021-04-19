<?php

namespace App\Traits;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests as OriginalAuthorizesRequests;
use Illuminate\Support\Facades\Gate;

trait AuthorizesRequests
{
    use OriginalAuthorizesRequests;

    /**
     * authorize_sweatalert
     *
     * @param  mixed $ability
     * @param  mixed $arguments
     * @return void
     */
    public function authorize_sweatalert($ability, $arguments = [])
    {
        if (!Gate::inspect($ability, $arguments)->allowed()) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'You dont have access',
                'position' => 'bottom-end',
                'icon' => 'error',
                'showConfirmButton' => false,
                'timer' => 2000,
                'backdrop' => false,
                'toast' => true
            ]);
            return true;
        }
        return false;
    }
}
