<style>
    input:checked ~ .dot {
      transform: translateX(100%);
      background-color: #48bb78;
    }
</style>

<div class="relative w-full md:flex @if ($item->commande > 0) border-4 border-green-600 bg-green-100 @else border border-white bg-white @endif rounded-lg mb-4 overflow-hidden hover:shadow hover:border-blue-200">
    @if ($item->commande > 0)
        <div class="absolute top-0 left-0 m-2 h-8 w-8 z-10 rounded-full bg-green-600 text-white text-center text-lg">
            {{$item->commande}}
        </div>
    @endif

    <div class="w-full md:w-60 overflow-hidden relative">
        <img class="w-60 h-60 mx-auto" src="{{$item->image}}">
        @auth
            <a href="{{route('item.edit', $item)}}" class="bg-white bg-opacity-10 absolute top-0 right-0 m-4 text-gray-500 px-1 hover:bg-blue-600 hover:text-gray-50 rounded-lg"><i class="fas fa-wrench"></i></a>
            <a action="#" data-item="{{$item->id}}" class="destroy_item bg-white bg-opacity-10 absolute top-0 left-0 m-4 text-red-500 px-1 hover:bg-red-600 hover:text-red-50 rounded-lg"><i class="fas fa-minus-circle"></i></a>
        @endauth
    </div>
    <div class="flex-1 py-3 px-4">
        <div class="flex flex-col justify-between h-full">
            <div class="">
                <div class="flex justify-between items-center mb-1">
                    <p class="text-xl text-gray-800 font-bold">
                        {{$item->name}}
                    </p>
                    <p class="bg-yellow-600 text-white text-center rounded-full px-2 w-24">
                        <span class="price">{{number_format($item->price,2)}}</span> DH
                    </p>
                </div>
                <div class="text-md text-gray-600 py-2">
                    {{$item->description}}
                </div>
                <div class="py-4">
                    @foreach ($item->options as $op)

                        @php
                            $checked = false
                        @endphp

                        @if($item->commande_options)
                            @if($key = array_search($op->item_option_id, array_column($item->commande_options, 'item_option_id')) !== false)
                                @php $checked = true @endphp
                            @else
                                @php $checked = false @endphp
                            @endif
                        @else
                            @if ($item->commande > 0)
                                @php $checked = false @endphp
                            @else
                                @if($op->is_default)
                                    @php $checked = true @endphp
                                @endif
                            @endif
                        @endif

                        <div class="inline-block">
                            <label for="toggle_{{$op->id}}" class="flex gap-1 items-center rounded-xl cursor-pointer pr-2 @if($checked) bg-green-300 border-2 border-green-400 shadow-lg @else border border-gray-400 @endif">
                                <div class="relative">

                                    <input @if($checked) checked @endif value="{{$op->id}}" name="item_options[]" type="checkbox" id="toggle_{{$op->id}}" class="price_change sr-only" data-item="{{$op->option->id}}" data-price="{{$op->option->price}}">

                                    <div class="block bg-gray-300 w-10 h-6 rounded-full"></div>
                                    <div class="dot absolute left-1 top-1 bg-gray-400 w-4 h-4 rounded-full transition"></div>
                                </div>
                                <div class="text-gray-600 font-bold text-xs">
                                    @if ($op->option->price>0)
                                        {{$op->option->name}} <span class="bg-green-500 text-white px-1 rounded" style="font-size:10px">{{ number_format($op->option->price,2)}} Dh</span>
                                    @else
                                        {{$op->option->name}}
                                    @endif
                                </div>
                            </label>
                        </div>

                    @endforeach
                </div>
            </div>
            <div class="flex justify-between">
                <form id="add_to_commande" method="POST" action="{{route('commande.item.store')}}" class="flex justify-between items-end">
                    @csrf
                    <input type="hidden" name="item_id" value="{{$item->id}}">
                    @foreach ($item->options as $op)
                        @php
                            $checked = false
                        @endphp

                        @if($item->commande_options)
                            @if($key = array_search($op->item_option_id, array_column($item->commande_options, 'item_option_id')) !== false)
                                @php $checked = true @endphp
                            @else
                                @php $checked = false @endphp
                            @endif
                        @else
                            @if ($item->commande > 0)
                                @php $checked = false @endphp
                            @else
                                @if($op->is_default)
                                    @php $checked = true @endphp
                                @endif
                            @endif
                        @endif


                        @if($checked)
                            <input value="{{$op->option->id}}" name="item_options[]" type="hidden" id="toggle_{{$op->id}}">
                        @endif
                    @endforeach
                    <button class="show_loader py-2 px-4 bg-green-400 text-gray-900 rounded-full border-2 border-green-500 hover:bg-green-500"><i class="fas fa-plus"></i> Ajouter à ma commande</button>
                </form>
                @auth
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
                @endauth
            </div>
        </div>

    </div>
</div>
