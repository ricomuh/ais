@section('title', $staff->name)
@section('description', 'Aqobah International Staff as ' . $staff->structural_role)
@section('image', asset('img/staff/' . $staff->photo))
<x-page-layout :title="$staff->name">
    <div class="mb-8">
        <a href="{{ route('staff.index') }}" class="text-lg font-bold text-primary hover:text-primary-light"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <div class="flex flex-col md:flex-row gap-8">
        <div class="w-full md:w-1/4 animate flex justify-center" data-animate="animate-from-left">
            <img src="{{ asset('img/staff/' . $staff->photo) }}" alt="" class="md:w-48 md:h-48 object-cover rounded-full shadow-md border-4 border-secondary">
        </div>
        <div class="w-full md:flex-shrink flex flex-col space-y-4 animate" data-animate="animate-from-right">
            @foreach (
            collect($staff)->filter(
                function($value, $key){
                    return ($key !== 'id' && $key !== 'photo' && $key !== 'created_at' && $key !== 'updated_at');
                }
            ) as $name => $value)
                <x-detail-item :name="\Str::of($name)->replace('_',' ')->title()" :value="$value" />
            @endforeach
        </div>
    </div>
</x-page-layout>