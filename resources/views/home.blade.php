@extends('container.app')
@section('content')

    <div class="flex justify-center py-4">
        <div class="grid grid-cols-2 xl:grid-cols-5 md:grid-cols-4 gap-4">
            @foreach ($categories as $category)
                <a href="{{route('items', $category)}}" class="relative h-32 md:h-36 w-32 md:w-36 bg-red-500 rounded text-center rounded-xl overflow-hidden cursor-pointer border-2 boder-white hover:border-red-500">
                    <img class="inline object-cover h-full" src="{{$category->image}}" alt="">
                    <div class="absolute bottom-0 left-0 right-0 bg-red-600 bg-opacity-80 text-white py-2 text-center text-xs">
                        {{$category->name}}
                    </div>
                </a>
            @endforeach

        </div>
    </div>

@endsection
