<div class="flex items-center bg-white justify-between text-gray-600 px-4 py-2 border-b border-dashed hover:bg-gray-50 cursor-pointer">
    <div class="">
        <div class="text-gray-500 text-sm font-bold">{{$detail->item->category->name}}</div>
        <div class="text-gray-500">{{$detail->item->name}}</div>
    </div>
    <div class="flex gap-4">
        <div class="">
            [ {{$detail->qte}} ] <b> x </b> {{$detail->item->price}} DH
        </div>
        <div class="">
            <button data-id="{{$detail->id}}" class="destroy_item text-red-500 hover:text-red-700">
                <i class="far fa-times-circle"></i>
            </button>
        </div>
    </div>
</div>
