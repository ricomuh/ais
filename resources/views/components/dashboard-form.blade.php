@props(['put' => false, 'route'])

<form class="flex flex-col md:flex-row gap-4" method="POST" action="{{ $route }}">
    @if ($put)
        @method('PUT')
    @endif
    @csrf
    {{ $slot }}
    <div class="">
        <x-button>{{ $put ? 'Save' : 'Create' }}</x-button>
    </div>
</form>