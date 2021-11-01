@extends('container.app')
@section('content')

    <div class="flex justify-center py-4">
        <div class="grid grid-cols-2 xl:grid-cols-5 md:grid-cols-4 gap-4">
            @foreach ($categories as $category)
                @include('category.partials.item')
            @endforeach
        </div>

    </div>

@endsection
