@extends('container.app')
@section('content')

@foreach ($groupes as $groupe)

    <div class="py-1 bg-gray-100 bg-opacity-20 text-center text-2xl rounded-lg">
        {{$groupe->name}}
    </div>
    <div class="flex justify-center py-4">
        <div class="grid grid-cols-2 xl:grid-cols-5 md:grid-cols-4 gap-4">
            @foreach ($groupe->categories as $category)
                <div class="h-32 md:h-36 w-32 md:w-36 bg-red-500 rounded text-center rounded-xl overflow-hidden cursor-pointer border-2 boder-white hover:border-red-500">
                    <img class="inline object-cover h-full" src="{{$category->image}}" alt="">
                </div>
            @endforeach

        </div>
    </div>

@endforeach

@endsection
