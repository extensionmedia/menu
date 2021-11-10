<div class="relative flex items-center justify-center py-2 px-4 md:px-2 bg-gray-50 bg-opacity-10 shadow">
    <a href="{{route('home')}}" class="flex gap-2 items-center">
        <div class="text-white text-xl">
            <img class="h-8" src="{{asset('img/logo.png')}}" alt="">
        </div>
        <div class="text-gray-100 text-lg">{{config('app.name')}}</div>
    </a>

    @auth
        <form method="POST" action="{{route('logout')}}" class="absolute top-0 right-0 mx-4 my-3 text-gray-800 hover:text-gray-600">
            @csrf
            <button>
                <i class="fas fa-user-alt-slash"></i>
            </button>
        </form>
        @else
        <a href="{{route('login')}}" class="absolute top-0 right-0 mx-4 my-3 text-gray-800 hover:text-gray-600">
            <i class="fas fa-user-alt"></i>
        </a>
    @endauth


</div>
