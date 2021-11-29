<div class="py-4 border rounded-lg bg-white shadow mb-4 px-2">
    <div class="mb-4">
        <label class="block" for="option_name">Option :</label>
        <input class="w-full border rounded py-1 px-2 text-sm" type="text" name="option_name" id="option_name">
    </div>
    <div class="mb-4">
        <label class="block" for="option_price">Prix :</label>
        <input class="w-44 border rounded py-1 px-2 text-sm text-center" type="number" placeholder="0.00" value="0.00" name="option_price" id="option_price">
    </div>
    <label for="is_checked" class="flex gap-2 items-center cursor-pointer mb-4">
        <div class="relative">
            <input checked type="checkbox" id="is_checked" class="sr-only">
            <div class="block bg-gray-300 w-10 h-6 rounded-full"></div>
            <div class="dot absolute left-1 top-1 bg-gray-400 w-4 h-4 rounded-full transition"></div>
        </div>
        Activé
    </label>
    <div class="flex justify-between items-center">
        <button class="option_create bg-green-600 hover:bg-green-800 text-white px-4 py-1 rounded-lg text-xs"><i class="far fa-save"></i> Save</button>
        <button class="option_destroy bg-gray-600 hover:bg-gray-800 text-white px-4 py-1 rounded-lg text-xs"> Annuler</button>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.option_create').click(function(e){
            e.preventDefault();
            var option_name = $('#option_name').val()
            var option_price = $('#option_price').val()
            var is_checked = $('#is_checked').prop('checked')
            if(option_name == ""){
                $('#option_name').addClass("border-red-500 bg-red-50")
                $('#option_name').select()
                return false
            }
            if(option_price == ""){
                $('#option_price').addClass("border-red-500 bg-red-50")
                $('#option_price').select()
                return false
            }
            $.ajax({
                url:"{{ route('item.option.store') }}",
                data:{
                    _token:         $('meta[name="csrf-token"]').attr('content'),
                    option_name:     option_name,
                    is_checked:      is_checked,
                    option_price:   option_price
                },
                method: 'POST',
                success: function(response){
                    $('.option_container').html("")
                    $('.option_refresh').trigger('click');
                    //$('.reload').trigger('click');
                }
            });
        })
        $('.option_destroy').click(function(e){
            e.preventDefault();
            $('.option_container').html("")
        })
    })
</script>
