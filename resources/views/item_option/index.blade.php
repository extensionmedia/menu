<div class="flex justify-between items-center border-b mb-4">
    <div class="text-lg font-bold py-4">
        Options
    </div>
    <div class="text-xl text-green-400 cursor-pointer hover:text-green-600">
        <i class="fas fa-plus"></i>
    </div>
</div>
<div class="option_container">
    @include('item.partials.option.add')
</div>
@foreach ($options as $op)
    @include('item.partials.option.partials.item')
@endforeach