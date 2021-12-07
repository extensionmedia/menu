<div class="md:flex mb-3 items-center bg-white justify-between text-gray-600 px-4 py-2 border-2 border-dashed hover:bg-gray-50 shadow-lg">
    <div class="">
        <div class="text-gray-500 text-sm font-bold">{{$detail->item->category->name}}</div>
        <div class="text-gray-500 text-xl">{{$detail->item->name}}</div>
        <div class="">
            @if($detail->options->count())
                @foreach ($detail->options as $op)
                    <div class="px-2 text-xs text-green-600">
                        <i class="fas fa-check"></i> {{$op->item_option->name}}
                    </div>
                @endforeach
            @endif
        </div>
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
