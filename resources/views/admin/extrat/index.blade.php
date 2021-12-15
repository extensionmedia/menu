@extends('container.app')
@section('content')
<style>
    input:checked ~ .dot {
      transform: translateX(100%);
      background-color: #48bb78;
    }
    </style>
    <div class="border rounded-lg overflow-hidden my-4">
        <div class="bg-gray-100 py-2 px-4 text-gray-800 text-sm flex justify-between">
            <div class="">
                <i class="fas fa-user"></i> Liste des extras
            </div>
            <div class="">
                <a href="{{route('extrat.create')}}" class="text-gray-400 hover:text-green-600">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="bg-white flex gap-4 p-4 pb-16">
            @foreach ($extrats as $extrat)
                @include('admin.extrat.partials.item')
            @endforeach
        </div>


    </div>

    <script>
        $(document).ready(function(){


        });

    </script>



@endsection
