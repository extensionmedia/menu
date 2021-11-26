<div class="flex justify-between items-center border-b mb-4">
    <div class="text-lg font-bold py-4">
        Options
    </div>
    <div class="hidden option_refresh text-xl text-gray-400 cursor-pointer hover:text-gray-600">
        <i class="fas fa-sync"></i>
    </div>
    <div class="option_add text-xl text-green-400 cursor-pointer hover:text-green-600">
        <i class="fas fa-plus"></i>
    </div>
</div>
<div class="option_container">
    {{-- @include('item_option.add') --}}
</div>
<div class="option_list relative">
    @foreach ($options as $op)
        @include('item_option.partials.item')
    @endforeach
    <div class="loader hidden absolute top-0 left-0 w-full h-full bg-black bg-opacity-30">
        <div class="text-center w-16 mx-auto text-2xl text-white py-8">
            <i class="fas fa-sync fa-spin"></i>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.option_add').click(function(e){
            e.preventDefault();
            var loader = `
            <div class="loader absolute top-0 left-0 w-full h-full bg-black bg-opacity-30">
                <div class="text-center w-16 mx-auto text-2xl text-white py-8">
                    <i class="fas fa-sync fa-spin"></i>
                </div>
            </div>
            `;
            $('.option_list').append(loader);
            $.ajax({
                url:"{{ route('item.option.create') }}",
                method: 'GET',
                success: function(response){
                    $('.option_container').html(response)
                    $('.loader').addClass('hidden')
                }
            });
        });

        $(document).on('click', '.option_edit', function(e){
            e.preventDefault();
            var loader = `
            <div class="loader absolute top-0 left-0 w-full h-full bg-black bg-opacity-30">
                <div class="text-center w-16 mx-auto text-2xl text-white py-8">
                    <i class="fas fa-sync fa-spin"></i>
                </div>
            </div>
            `;
            $('.option_list').append(loader);
            var id = $(this).data("id");
            $.ajax({
                url:"{{ route('item.option.edit') }}",
                data: {
                    'id':id
                },
                method: 'GET',
                success: function(response){
                    $('.option_container').html(response)
                    $('.loader').addClass('hidden')
                }
            });
        });

        $('.option_refresh').click(function(e){
            e.preventDefault();
            var loader = `
            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-30">
                <div class="text-center w-16 mx-auto text-2xl text-white py-8">
                    <i class="fas fa-sync fa-spin"></i>
                </div>
            </div>
            `;
            $('.option_list').append(loader);
            $.ajax({
                url:"{{ route('item.option.list') }}",
                data:{
                    'id':   {{$item->id}}
                },
                method: 'GET',
                success: function(response){
                    $('.option_list').html(response)
                }
            });
        })
    })
</script>
