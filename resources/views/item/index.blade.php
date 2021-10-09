@extends('container.app')
@section('content')


    <div class="flex justify-center">
            <a href="{{route('home')}}" class="py-2 w-32 text-center rounded-full bg-green-600 bg-opacity-30 hover:bg-opacity-40 cursor-pointer">
                <i class="fas fa-arrow-left"></i>
            </a>
    </div>
    <div class="flex justify-center py-4">
        <div class="grid grid-cols-2 xl:grid-cols-5 md:grid-cols-4 gap-4">
            @foreach ($items as $item)
                <a href="{{route('items', $item)}}" class="h-32 md:h-36 w-32 md:w-36 bg-red-500 rounded text-center rounded-xl overflow-hidden cursor-pointer border-2 boder-white hover:border-red-500">
                    <img class="inline object-cover h-full" src="{{$item->image}}" alt="">
                </a>
            @endforeach

        </div>
    </div>

@endsection
