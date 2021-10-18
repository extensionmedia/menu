@extends('container.app')
@section('content')


    <div class="flex justify-center items-center py-4">
        <a href="{{route('home')}}" class="py-2 w-32 text-center rounded-full bg-green-600 bg-opacity-30 hover:bg-opacity-40 cursor-pointer">
            <i class="fas fa-arrow-left"></i>
            {{$category->name}}
        </a>
    </div>
    <div class="py-4">

        @foreach ($items as $item)
            <div class="w-full bg-white md:flex border rounded-lg mb-4 overflow-hidden cursor-pointer hover:shadow hover:border-blue-200">
                <div class="w-full md:w-60 max-h-36 overflow-hidden relative">
                    <img class="w-full object-none object-center" src="{{$item->image}}">
                </div>
                <div class="flex-1 py-3 px-4">
                    <div class="flex flex-col justify-between h-full">
                        <div class="">
                            <div class="flex justify-between items-center mb-1">
                                <p class="text-xl text-gray-800 font-bold">
                                    {{$item->name}}
                                </p>
                                <p class="bg-yellow-600 text-white rounded-full px-2">
                                    {{$item->price}} MAD
                                </p>
                            </div>
                            <div class="text-md text-gray-600 py-2">
                                {{$item->description}}
                            </div>
                        </div>
                        <div class="">
                            <form method="POST" action="{{route('commande.item.store')}}" class="flex justify-between items-end">
                                @csrf
                                <input type="hidden" name="item_id" value="{{$item->id}}">
                                <button class="py-2 px-4 bg-green-800 text-white rounded border border-green-700">Ajouter à ma commande</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach

    </div>

@endsection
