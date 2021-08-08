@props(['name', 'value' => '', 'full' => false, 'rows' => 1, 'placeholder' => ''])

<textarea name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50  transition duration-300 {{ $full ? 'w-full' : '' }}" cols="60" rows="{{ $rows }}">{{ $value }}</textarea>