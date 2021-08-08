@props(['name','value'])

<div class="flex flex-col divide-y divide-gray-200">
    <div class="font-bold text-lg text-primary">{{ $name }}</div>
    <div class="text-gray-800">{{ $value ?? $slot }}</div>
</div>