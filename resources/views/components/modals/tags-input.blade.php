{{-- <div>
    @foreach ($data2 as $dt)
        <label class="inline-flex items-center bg-green-300 mb-1 px-2 py-1">
            <input wire:model.defer="{{ $model }}" name="{{ $model }}[]" value="{{ $dt->name }}" type="checkbox" wire:loading.attr="disabled" class="form-checkbox h-5 w-5 text-orange-600 border border-gray-300"><span class="ml-2 text-gray-700">{{ $dt->name }}</span>
        </label>
    @endforeach
</div> --}}
@once
    @push('head')
        <style>
            .tags-input {
                display: flex;
                flex-wrap: wrap;
                background-color: #fff;
                border-width: 1px;
                border-radius: .25rem;
                padding-left: .5rem;
                padding-right: 1rem;
                padding-top: .5rem;
                padding-bottom: .25rem;
            }

            .tags-input-tag {
                display: inline-flex;
                line-height: 1;
                align-items: center;
                font-size: .875rem;
                background-color: #bcdefa;
                color: #1c3d5a;
                border-radius: .25rem;
                user-select: none;
                padding: .25rem;
                margin-right: .5rem;
                margin-bottom: .25rem;
            }

            .tags-input-tag:last-of-type {
                margin-right: 0;
            }

            .tags-input-remove {
                color: #2779bd;
                font-size: 1.125rem;
                line-height: 1;
            }

            .tags-input-remove:first-child {
                margin-right: .25rem;
            }

            .tags-input-remove:last-child {
                margin-left: .25rem;
            }

            .tags-input-remove:focus {
                outline: 0;
            }

            .tags-input-text {
                flex: 1;
                outline: 0;
                padding-top: .25rem;
                padding-bottom: .25rem;
                margin-left: .5rem;
                margin-bottom: .25rem;
                min-width: 10rem;
            }

        </style>
    @endpush

    @push('script')
        <script>
            function DropdownTag() {
                return {
                    tags: @entangle($model),
                    newTag: '',
                    dataTag: @json($permission),
                    openTag: false,
                    SetDropdownTag: async function(tag) {
                        this.tags.push(tag);
                        this.$wire.set('{{ $model }}', this.tags)
                        this.newTag = ''
                    },
                    EnterDropdownTag: async function() {
                        if (this.newTag.trim() !== '' && !this.tags.includes(this.newTag.trim())) {
                            this.SetDropdownTag(this.newTag.trim())
                        };
                    },
                    BackspaceDropdownTag: async function() {
                        if (this.newTag.trim() === '') {
                            this.tags.pop();
                            this.$wire.set('{{ $model }}', tags)
                        }
                    },
                    DeleteDropdownTag: async function(tag) {
                        this.tags = this.tags.filter(i => i !== tag);
                        this.$wire.set('{{ $model }}', this.tags)
                    },
                    ContainerDropdownTag: async function(tag) {
                        if (!this.tags.includes(tag)) {
                            this.SetDropdownTag(tag)
                        } else {
                            this.DeleteDropdownTag(tag)
                        }
                    }
                }
            }

        </script>
    @endpush
@endonce
<div x-data="DropdownTag()">
    <template x-for="tag in tags" :key="'dropdown-hidden-'+tag">
        <input type="hidden" :value="tag">
    </template>

    <div class="w-full relative" @click.away="openTag = false">
        <div class="tags-input">
            <template x-for="tag in tags" :key="'dropdown-button-' + tag">
                <span class="tags-input-tag">
                    <span x-text="tag"></span>
                    <button type="button" class="tags-input-remove" @click="DeleteDropdownTag(tag)">
                        &times;
                    </button>
                </span>
            </template>
            <input class="tags-input-text" placeholder="Add tag..." x-model="newTag" @focus="openTag = true;" @keydown.enter.prevent="EnterDropdownTag()" @keydown.backspace="BackspaceDropdownTag()">
        </div>
        <div x-show="openTag" class="absolute top-10 left-0 w-full z-50 bg-gray-50 overflow-y-scroll divide-y divide-gray-400" style="max-height: 200px;">
            <template x-for="(role, index) in dataTag" :key="'dropdown-role-' + index">
                <div class="divide-y divide-gray-400">
                    <div x-text="role.name" @click="ContainerDropdownTag(role.name)" x-bind:class="{ 'bg-blue-200': tags.includes(role.name) }" class="px-4 py-2 bg-gray-200 cursor-pointer hover:bg-blue-400"></div>
                    @if ($typeData == 'all')
                        <template x-for="(permission, index) in role.permissions">
                            <div>
                                <div x-text="permission.name" @click="ContainerDropdownTag(permission.name)" x-bind:class="{ 'bg-blue-100': tags.includes(permission.name) }" class="px-8 py-2 bg-gray-50 cursor-pointer hover:bg-blue-400"></div>
                            </div>
                        </template>
                    @endif
                </div>
            </template>
        </div>
    </div>
</div>
