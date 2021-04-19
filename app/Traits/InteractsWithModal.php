<?php

namespace App\Traits;

use Illuminate\Auth\Access\Response;

trait InteractsWithModal
{
    protected function openModal(string $form, $params = [], ?string $modalSize = null)
    {
        $this->emitTo('components.modal', 'showModal', $form, $params, $modalSize);
    }

    protected function closeModal()
    {
        $this->emitTo('components.modal', 'closeModal');
    }

    protected function closeDeleteModal()
    {
        $this->emitTo('components.modal', 'closeModal');
    }
}
