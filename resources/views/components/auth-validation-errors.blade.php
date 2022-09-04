@props(['errors'])

@if ($errors->any())
<div x-data="{ showw: true }" x-show="showw" x-init="setTimeout(() => showw = false, 3000)"
    class="bg-red-700 w-3/4 lg:w-1/4  p-3 absolute top-1/4 left-1/2 -translate-y-1/2 -translate-x-1/2 flex items-center justify-center rounded-lg dir1">
    <ul class=" list-disc list-inside text-base text-white">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
