<div class="flex flex-wrap space-y-2 space-x-2">
    <div></div>
    @foreach ($permissions as $permission)
        <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full">{{ $permission }}</div>
    @endforeach
</div>
