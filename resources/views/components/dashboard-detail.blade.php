@props(['title'])

<div class="flex flex-col col-span-1">
    <div class="font-bold text-gray-600 text-sm">{{ $title }}</div>
    <div class="text-gray-800">{{ $slot }}</div>
</div>