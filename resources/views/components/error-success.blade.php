@if (session('message'))
    <div class="bg-green-100 border border-green-500 p-5 my-3 rounded-md">
        <span class="text-sm text-green-500">{{ session('message') }}</span>
    </div>
@endif
@if ($errors->count())
    <ul class="bg-red-100 border border-red-500 p-5 my-3 rounded-md">
        @foreach ($errors->all() as $error)
            <li class="text-red-500 list-disc list-inside">{{ $error }}</li>
        @endforeach
    </ul>
@endif