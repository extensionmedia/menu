@extends('container.app')
@section('content')


    <div class="flex justify-center items-center py-4">
        <a href="{{route('home')}}" class="py-2 w-32 text-center rounded-full bg-green-600 bg-opacity-30 hover:bg-opacity-40 cursor-pointer">
            <i class="fas fa-arrow-left"></i>
            {{$category->name}}
        </a>
    </div>
    <div class="py-4">

        @foreach ($items as $item)
            @include('item.partials.item')
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
            });
    </script>

    </div>

@endsection
