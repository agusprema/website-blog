<?php

namespace App\Http\Livewire\Admins;

use Livewire\Component;
use App\Models\Menu;

class MenuManagement extends Component
{
    public $model = Menu::class;
    public $menus;

    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {
        $this->menus = $this->model::orderBy('sort_id', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.admins.menu-management')->layout('layouts.admin');
    }

    public function updateMenuOrder($menus)
    {
        foreach ($menus as $menu) {
            $this->model::where('id', $menu['value'])->update(['sort_id' => $menu['order']]);
        }
        $this->mount();
    }

    public function updateMenuParentsOrder($menus)
    {
        foreach ($menus as $menu) {
            $this->model::where('id', $menu['value'])->update(['sort_id' => $menu['order']]);
            foreach ($menu['items'] as $parent) {
                $this->model::where('id', $parent['value'])->update(['sort_id' => $parent['order'], 'parent_id' => $menu['value']]);
            }
        }
        $this->mount();
    }
}
