
<a
    href="{{route('items', $category)}}"
    class="relative h-32 md:h-36 w-32 md:w-36 bg-red-500 rounded text-center rounded-xl overflow-hidden cursor-pointer border-2 @if ($category->commande) border-green-600 border-4 @endif hover:border-red-500"
>
    <img class="inline object-cover h-full" src="{{$category->image}}" alt="">
    <div class="absolute bottom-0 left-0 right-0 bg-red-600 bg-opacity-80 text-white py-2 text-center text-xs">
        {{$category->name}}
    </div>
    @if ($category->commande)
        <div class="absolute top-0 right-0 -m-1 h-8 w-8 flex items-center bg-yellow-400 text-gray-900 justify-center rounded-full border-green-600 border-4 shadow-lg">
            {{$category->commande}}
        </div>
    @endif

</a>
