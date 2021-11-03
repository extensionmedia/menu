<style>
    input:checked ~ .dot {
      transform: translateX(100%);
      background-color: #48bb78;
    }
</style>

<div class="w-full bg-white md:flex border rounded-lg mb-4 overflow-hidden cursor-pointer hover:shadow hover:border-blue-200">
    <div class="w-full md:w-60 overflow-hidden relative">
        <img class="w-60 h-60 mx-auto" src="{{$item->image}}">
        <a href="{{route('item.edit', $item)}}" class="bg-white bg-opacity-10 absolute top-0 right-0 m-4 text-gray-500 px-1 hover:bg-blue-600 hover:text-gray-50 rounded-lg"><i class="fas fa-wrench"></i></a>
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
            <div class="flex justify-between">
                <form method="POST" action="{{route('commande.item.store')}}" class="flex justify-between items-end">
                    @csrf
                    <input type="hidden" name="item_id" value="{{$item->id}}">
                    <button class="py-2 px-4 bg-green-800 text-white rounded border border-green-700">Ajouter à ma commande</button>
                </form>
                <div class="flex items-center">
                    <div class="loading hidden px-1 text-green-500 text-sm">
                        <i class="fas fa-sync fa-spin"></i>
                    </div>
                    <label for="toggle_{{$item->id}}" class="flex items-center cursor-pointer">
                        <div class="relative">
                            <input type="checkbox" @if($item->is_active) checked @endif id="toggle_{{$item->id}}" data-id="{{$item->id}}" class="is_active sr-only">
                            <div class="block bg-gray-600 w-10 h-6 rounded-full"></div>
                            <div class="dot absolute left-1 top-1 bg-red-500 w-4 h-4 rounded-full transition"></div>
                        </div>
                    </label>
                </div>
            </div>
        </div>

    </div>
</div>
