<div x-data="{ open: @entangle($entangle) }">
    @if (isset($button))
        <button wire:click="addedMode">
            <div class="px-3 py-2 text-white bg-primary flex items-center rounded-lg text-sm h-10">{{ $button }}</div>
        </button>
    @endif

    <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full z-50" style="background-color: rgba(0,0,0,.5); display: none;" x-show="open">
        <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-2xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false" id="modal">
            <div class="text-center sm:text-left">
                <div class="flex">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 flex flex-grow">
                        {{ $title }}
                    </h3>
                    <button wire:click="cancel" class="transform rotate-45 hover:opacity-50 flex items-center" wire:loading.attr="disabled">
                        <div wire:loading.remove>
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <div wire:loading>
                            <i class="fas fa-spinner fa-pulse"></i>
                        </div>
                    </button>
                </div>

                {{ $slot }}
            </div>
        </div>
    </div>
</div>
