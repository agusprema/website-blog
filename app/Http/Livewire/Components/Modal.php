<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Modal extends Component
{
    public bool $isopen = false;
    public $opacity = '0';
    public string $type = '';
    public array $params = [];
    public string $modalSize = 'md:max-w-xl';

    protected $listeners = [
        'showModal' => 'open',
        'closeModal' => 'close'
    ];

    public function render()
    {
        return view('livewire.components.modal');
    }

    public function open(string $type, $params = [], ?string $modalSize = null)
    {
        $this->isopen = true;
        $this->type = $type;
        $this->params = $params;
        $this->opacity = '100';

        if($modalSize){
            $this->modalSize = $modalSize;
        }
    }

    public function close()
    {
        $this->isopen = false;
        $this->opacity = '0';
    }
}
