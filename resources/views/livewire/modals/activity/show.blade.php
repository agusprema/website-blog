<div x-data="{ open: @entangle('show') }">
    <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full z-50" style="background-color: rgba(0,0,0,.5); display: none;" x-show="open">
        <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-2xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false" id="modal-show">
            <div class="text-center sm:text-left">
                <div class="flex">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 flex flex-grow">
                        Edit Tabel Menu
                    </h3>
                    <button @click="open = false" class="transform rotate-45 hover:opacity-50 flex items-center">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                </div>
                <pre>@dump($log_name)</pre>
            </div>
        </div>
    </div>
</div>
