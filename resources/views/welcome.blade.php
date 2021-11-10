@extends('container.app')
@section('content')

    <div class="flex justify-center py-4">
        <div class="grid grid-cols-2 xl:grid-cols-5 md:grid-cols-4 gap-4">
            @foreach ($categories as $category)
                @include('category.partials.item')
            @endforeach
        </div>

    </div>

    <script>
        $(document).ready(function(){
            $('.is_active').change(function(){
                let id = $(this).data('id')
                let that = $(this);
                that.parent().parent().parent().find('.loading').removeClass('hidden');
                $.ajax({
                    url: "{{ route('category.activate') }}",
                    data: {
                        id: id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'POST',
                    type: 'POST',
                    success: function(data){
                        that.parent().parent().parent().find('.loading').toggleClass('hidden');
                    }
                })
            })
        });
    </script>

@endsection
