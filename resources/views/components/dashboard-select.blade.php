@props(['name', 'defaultId' => 0, 'collection', 'itemName' => 'name'])

<x-select id="{{ $name }}" name="{{ $name }}">
    @isset($slot)
        {{ $slot }}
    @endisset
    @foreach ($collection as $item)
        <option {{ ($defaultId == $item->id)? 'selected' : '' }}  value="{{ $item->id }}">{{ collect($item)->get($itemName) }}</option>
    @endforeach
</x-select>