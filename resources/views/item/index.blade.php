@extends('container.app')
@section('content')

    @if (Session::has('message'))
        <div class="flash animate__animated animate__rubberBand rounded-lg absolute top-0 right-0 m-6 bg-green-500 text-white text-sm py-1 px-4 border border-green-600">
            <i class="far fa-thumbs-up"></i> {{ Session::get('message') }}
        </div>
    @endif

    <div class="flex justify-center items-center py-4">
        <a href="{{route('home')}}" class="py-2 w-32 text-center rounded-full bg-green-600 bg-opacity-30 hover:bg-opacity-40 cursor-pointer">
            <i class="fas fa-arrow-left"></i>
            {{$category->name}}
        </a>
    </div>
    <div class="py-4">

        @foreach ($items as $item)
            @auth
                @include('item.partials.item')
            @else
                @if($item->is_active)
                    @include('item.partials.item')
                @endif
            @endauth
        @endforeach
        <script>
            $(document).ready(function(){

                $('.is_active').change(function(){
                    let id = $(this).data('id')
                    let that = $(this);
                    that.parent().parent().parent().find('.loading').removeClass('hidden');
                    $.ajax({
                        url: "{{ route('item.activate') }}",
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

                $(document).on('click', '.destroy_item', function(e){
                    e.preventDefault();
                    var that = $(this);
                    new Swal({
                        title: 'Supprimer?',
                        icon: 'warning',
                        showDenyButton: true,
                        showCancelButton: false,
                        confirmButtonText: `Supprimer`,
                        denyButtonText: `Annuler`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url:"{{route('item.destroy')}}",
                                data:{
                                    _token:     $('meta[name="csrf-token"]').attr('content'),
                                    item:         that.data('item')
                                },
                                method: 'POST',
                                success: function(response){
                                    location.reload();
                                    console.log(response)
                                }
                            });
                        }
                    });
                });

                if($('.flash').length > 0){
                    var timer = setTimeout(() => {
                        $('.flash').remove();
                    }, 4000);
                }


            });
    </script>

    </div>

@endsection
