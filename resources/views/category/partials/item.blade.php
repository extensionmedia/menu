<style>
input:checked ~ .dot {
  transform: translateX(100%);
  background-color: #48bb78;
}
</style>
@php
    $show = false
@endphp

@auth
    <div class="bg-gray-100 rounded-lg overflow-hidden">
        <div class="flex justify-between items-center py-1 px-1">
            <a href="{{route('category.edit', $category)}}" class="text-gray-500 px-1 hover:bg-blue-600 hover:text-gray-50 rounded-lg"><i class="fas fa-wrench"></i></a>
            <div class="flex items-center">
                <div class="loading hidden px-1 text-green-500 text-sm">
                    <i class="fas fa-sync fa-spin"></i>
                </div>
                <label for="toggle_{{$category->id}}" class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" @if($category->is_active) checked @endif id="toggle_{{$category->id}}" data-id="{{$category->id}}" class="is_active sr-only">
                        <div class="block bg-gray-600 w-10 h-6 rounded-full"></div>
                        <div class="dot absolute left-1 top-1 bg-red-500 w-4 h-4 rounded-full transition"></div>
                    </div>
                </label>
            </div>
        </div>
        <div class="relative border-2 rounded-lg h-40 w-40 overflow-hidden">
            <a href="{{route('items', $category)}}">
                <img class="h-full" src="{{$category->image}}" alt="">
            </a>
            <div class="absolute bottom-0 left-0 right-0 bg-red-600 bg-opacity-80 text-white py-2 text-center text-xs">
                {{$category->name}}
            </div>
        </div>
    </div>
@else
    @if($category->is_active)
        <div class="border-2 rounded-lg h-40 w-40 overflow-hidden hover:border-red-500 relative @if ($category->commande) border-green-600 border-4 @endif">
            <a href="{{route('items', $category)}}">
                <img class="h-full" src="{{$category->image}}" alt="">
            </a>
            <div class="absolute bottom-0 left-0 right-0 bg-red-600 bg-opacity-80 text-white py-2 text-center text-xs">
                {{$category->name}}
            </div>
            @if ($category->commande)
                <div class="absolute top-0 right-0 -m-1 h-8 w-8 flex items-center bg-yellow-400 text-gray-900 justify-center rounded-full border-green-600 border-4 shadow-lg">
                    {{$category->commande}}
                </div>
            @endif
        </div>
    @endif

@endif



{{-- <div class="w-32 md:w-36 border-2">
    <div class="">header</div>
    <a
        href="{{route('items', $category)}}"
        class="relative w-full h-full bg-red-500 text-center rounded-xl overflow-hidden cursor-pointer border-2 @if ($category->commande) border-green-600 border-4 @endif hover:border-red-500"
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
</div> --}}


