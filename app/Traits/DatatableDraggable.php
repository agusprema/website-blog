<?php

namespace App\Traits;

use Mediconesystems\LivewireDatatables\Column;

trait DatatableDraggable
{
    public $draggable = true;

    public static function draggable($attribute = 'id')
    {
        return Column::name($attribute . ' as draggable_attribute')->setType('draggable');
    }
}
