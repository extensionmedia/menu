<div class="relative flex items-center justify-center py-2 px-4 md:px-2 shadow">
    <a href="{{route('home')}}" class="flex gap-2 items-center">
        <div class="text-white text-xl">
            <img class="h-16" src="{{asset('img/logo.png')}}" alt="">
        </div>
        <div class="">
            <div class="text-yellow-500 text-xs">
                Menu {{config('app.version')}}
            </div>
            <div class="text-red-500 text-lg font-bold">
                {{config('app.name')}}
            </div>
            <div class="text-gray-500 text-xs">
                Commande : <span class="numero_commande"></span>
            </div>
        </div>
    </a>

    @auth
        <a href="{{route('commande.all')}}" class="absolute top-0 right-0 mx-4 my-3 text-gray-800 hover:text-gray-600">
            <i class="fas fa-bars"></i>
        </a>
    @else
        <a href="{{route('login')}}" class="absolute top-0 right-0 mx-4 my-3 text-gray-800 hover:text-gray-600">
            <i class="fas fa-user-alt"></i>
        </a>
    @endauth

    <script>
        $(document).ready(function(){
            $('.numero_commande').html('<i class="fas fa-sync fa-spin"></i>')
            $.ajax({
                url : "{{route('commande.number')}}",
                methode : 'GET',
                success : function(r){
                    $('.numero_commande').html(r)
                }
            })
        });
    </script>

</div>
