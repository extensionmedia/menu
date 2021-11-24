<div class="py-4 border rounded-lg bg-white shadow mb-4 px-2">
    <div class="mb-4">
        <label class="block" for="option_name">Option :</label>
        <input class="w-full border rounded py-1 px-2 text-sm" type="text" name="option_name" id="option_name">
    </div>
    <label for="is_checked" class="flex gap-2 items-center cursor-pointer mb-4">
        <div class="relative">
            <input type="checkbox" id="is_checked" class="sr-only">
            <div class="block bg-gray-300 w-10 h-6 rounded-full"></div>
            <div class="dot absolute left-1 top-1 bg-gray-400 w-4 h-4 rounded-full transition"></div>
        </div>
        Cauché par défaut
    </label>
    <div class="flex justify-between items-center">
        <button class="option_add bg-green-600 hover:bg-green-800 text-white px-4 py-1 rounded-lg text-xs"><i class="far fa-save"></i> Save</button>
        <button class="option_destroy bg-red-600 hover:bg-red-800 text-white px-4 py-1 rounded-lg text-xs"><i class="far fa-trash-alt"></i> Delete</button>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.option_add').click(function(e){
            e.preventDefault();
            var option_name = $('#option_name').val()
            var is_checked = $('#is_checked').val()

            alert('hello')
        })
        $('.option_destroy').click(function(e){
            e.preventDefault();
            alert('hello')
        })
    })
</script>
