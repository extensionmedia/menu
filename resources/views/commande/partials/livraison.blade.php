<div class="md:w-3/5 mx-1 md:mx-auto py-4">
    <div class="flex items-center gap-4 my-4">
        <label class="flex items-center space-x-3">
            <input checked type="checkbox" name="livraison_id" value="1" class="unique form-tick appearance-none h-6 w-6 border border-gray-300 rounded-md checked:bg-blue-600 checked:border-transparent focus:outline-none">
            <span class="text-gray-900 font-medium text-md">Sur Place</span>
        </label>
    </div>
    <div class="flex items-center gap-4 my-4">
        <label class="flex items-center space-x-3">
            <input type="checkbox" name="livraison_id" value="2" class="unique form-tick appearance-none h-6 w-6 border border-gray-300 rounded-md checked:bg-blue-600 checked:border-transparent focus:outline-none">
            <span class="text-gray-900 font-medium text-md">Emporté</span>
        </label>
    </div>
</div>

<div class="details hidden bg-white md:w-3/5 mx-1 md:mx-auto rounded-lg overflow-hidden shadow-lg text-gray-600 px-4 py-4 border-4 border-dashed border-green-300">
    <div class="mb-4">
        <label for="client_name" class="block">
            Votre Nom (*)
        </label>
        <input class="border rounded-lg py-1 px-2 bg-white text-gray-800 w-full" type="text" id="client_name" name="client_name" placeholder="votre nom">
    </div>

    <div class="mb-4">
        <label for="client_telephone" class="block">
            Votre Téléphone (*)
        </label>
        <input class="border rounded-lg py-1 px-2 bg-white text-gray-800 w-full" type="text" id="client_telephone" name="client_telephone" placeholder="0666666666">
    </div>

    <div class="mb-4">
        <label for="livraison_time" class="block">
            Heure de récupération (*)
        </label>
        <select class="border rounded-lg py-1 px-2 bg-white text-gray-800 w-full" id="livraison_time" name="livraison_time">
            <option value="15min">15 Minutes</option>
            <option value="30min">30 Minutes</option>
            <option value="1h">1 Heure</option>
            <option value="1h30min">1 Heure est 30 Minutes</option>
            <option value="2h">2 Heures</option>
        </select>
    </div>

</div>








<script>
    $(document).ready(function(){
        $('.unique').change(function(){
            var that = $(this);
            $('.unique').each(function(){
                $(this).prop( "checked", false );
            });
            that.prop( "checked", true );

            if(that.val() == 2){
                $('.details').removeClass('hidden')
            }else{
                $('.details').addClass('hidden')
            }
        });
    })
</script>
