@props(['name', 'value' => ''])

<x-input type="text" name="{{ $name }}" id="{{ $name }}" placeholder="{{ \Str::of($name)->replace('_', ' ')->title() }}..." value="{{ $value }}" />