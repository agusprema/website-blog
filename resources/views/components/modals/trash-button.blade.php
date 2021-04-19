<button x-data="{trash: false}" @click="trash = trash == false ? true : false; Livewire.emit('ToggleTrash', trash)" class="mr-2">
    <div class="px-3 py-1 text-white bg-primary flex items-center rounded-lg text-sm h-10"><i x-bind:class="trash ? 'fas fa-table' : '{{ $icon ? $icon : 'fas fa-trash-alt' }}'"></i></div>
</button>
