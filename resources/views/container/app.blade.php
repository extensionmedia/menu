<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('includes')

    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <style>
        .blobs-container {
            display: flex;
        }

        .blob {
        background: rgba(51, 217, 178, 0.9);
        border-radius: 50%;
        box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
        transform: scale(1);
        animation: pulse-green 2s infinite;
        }

        @keyframes pulse-green {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(51, 217, 178, 0.7);
            }

            70% {
                transform: scale(1);
                box-shadow: 0 0 0 10px rgba(51, 217, 178, 0);
            }

            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(51, 217, 178, 0);
            }
        }

    </style>
</head>
<body>
    <div class="relative content w-screen h-screen bg-no-repeat overflow-auto" style="background-image: url({{asset('img/background_04.jpg')}})">
        <div class="w-full xl:w-10/12 xl:mx-auto pb-8">
            @include('container.common.top')
            <div class="px-4 xl:px-0 text-white">
                @yield('content')
            </div>
        </div>

        <a href="{{route('commande.index')}}" class="blob green border-2 border-green-400 fixed right-0 bottom-0 h-16 w-16 rounded-full text-white text-center m-4 items-center text-2xl pt-4">
            <i class="fas fa-utensils"></i>
        </a>

        <div class="fixed left-0 bottom-0 m-4 items-center flex gap-4">
            <a href="{{route('category.create')}}" class="border  h-16 w-16 rounded-full text-white text-center text-2xl pt-4">
                <i class="fas fa-plus"></i>
            </a>
            <a href="{{route('item.create')}}" class="border text-red-600 h-16 w-16 rounded-full text-white text-center text-2xl pt-4">
                <i class="fas fa-plus"></i>
            </a>
        </div>


    </div>
</body>
</html>
