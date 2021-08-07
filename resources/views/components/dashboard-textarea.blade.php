@props(['name', 'value' => ''])

<textarea name="{{ $name }}" id="{{ $name }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50  transition duration-300" cols="60" rows="1">{{ $value }}</textarea>