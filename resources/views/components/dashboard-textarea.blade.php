@props(['name', 'value' => ''])

<textarea name="{{ $name }}" id="{{ $name }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" cols="60" rows="2">{{ $value }}</textarea>