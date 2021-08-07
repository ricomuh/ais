@props(['name', 'value' => ''])

<div class="flex flex-col md:flex-row md:items-center">
    <x-label for="{{ $name }}" class="w-full md:w-32">{{ \Str::of($name)->replace('_', ' ')->title() }}</x-label>
    <x-input type="text" id="{{ $name }}" name="{{ $name }}" class="flex-grow" placeholder="{{ \Str::of($name)->replace('_', ' ')->title() }}..." value="{{ $value ?? old('title') }}" />
</div>