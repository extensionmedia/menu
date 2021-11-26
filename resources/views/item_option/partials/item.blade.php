<div class="text-xs flex justify-between items-center mb-2">
    @isset($item)
        @if($key = array_search($op->id, array_column($item->options->toArray(), 'item_option_id')) !== false)
            <label for="toggle_{{$op->id}}" class="flex gap-2 items-center cursor-pointer">
                <div class="relative">
                    <input value="{{$op->id}}" name="item_options[]" type="checkbox" @if($key = array_search($op->id, array_column($item->options->toArray(), 'item_option_id')) !== false) checked @else $key=false @endif id="toggle_{{$op->id}}" class="sr-only">
                    <div class="block bg-gray-300 w-10 h-6 rounded-full"></div>
                    <div class="dot absolute left-1 top-1 bg-gray-400 w-4 h-4 rounded-full transition"></div>
                </div>
                @php $_key = array_search($op->id, array_column($item->options->toArray(), 'item_option_id')) @endphp
                {{$op->name}}
            </label>
            <div class="flex gap-2">
                <input value="{{$op->id}}" name="item_options_is_default[]" type="checkbox" @if( $item->options->toArray()[$_key]["is_default"] ) checked @endif name="is_default" id="">
                <button data-id="{{$op->id}}" class="option_edit text-gray-400 hover:text-gray-600"><i class="fas fa-wrench"></i></button>
            </div>
        @else
            <label for="toggle_{{$op->id}}" class="flex gap-2 items-center cursor-pointer">
                <div class="relative">
                    <input value="{{$op->id}}" name="item_options[]" type="checkbox" id="toggle_{{$op->id}}" class="sr-only">
                    <div class="block bg-gray-300 w-10 h-6 rounded-full"></div>
                    <div class="dot absolute left-1 top-1 bg-gray-400 w-4 h-4 rounded-full transition"></div>
                </div>
                {{$op->name}}
            </label>
            <div class="flex gap-2">
                <input value="{{$op->id}}" name="item_options_is_default[]" type="checkbox" id="">
                <button data-id="{{$op->id}}" class="option_edit text-gray-400 hover:text-gray-600"><i class="fas fa-wrench"></i></button>
            </div>
        @endif
    @else
        <label for="toggle_{{$op->id}}" class="flex gap-2 items-center cursor-pointer">
            <div class="relative">
                <input value="{{$op->id}}" name="item_options[]" type="checkbox" id="toggle_{{$op->id}}" class="sr-only">
                <div class="block bg-gray-300 w-10 h-6 rounded-full"></div>
                <div class="dot absolute left-1 top-1 bg-gray-400 w-4 h-4 rounded-full transition"></div>
            </div>
            {{$op->name}}
        </label>
        <div class="flex gap-2">
            <input value="{{$op->id}}" name="item_options_is_default[]" type="checkbox" id="">
            <button data-id="{{$op->id}}" class="option_edit text-gray-400 hover:text-gray-600"><i class="fas fa-wrench"></i></button>
        </div>
    @endisset

</div>
