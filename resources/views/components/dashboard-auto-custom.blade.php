@props(['name'])

<div class="flex flex-col md:flex-row md:items-center">
    <x-label for="{{ $name }}" class="w-full md:w-32">{{ \Str::of($name)->replace('_', ' ')->title() }}</x-label>
    {{ $slot }}
</div>