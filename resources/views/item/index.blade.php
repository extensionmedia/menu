@extends('container.app')
@section('content')

    @if (Session::has('message'))
        <div class="flash animate__animated animate__rubberBand rounded-lg absolute top-0 right-0 m-6 bg-green-500 text-white text-sm py-1 px-4 border border-green-600">
            <i class="far fa-thumbs-up"></i> {{ Session::get('message') }}
        </div>
    @endif

    <div class="flex justify-center items-center py-4">
        <a href="{{route('home')}}" class="py-3 w-full md:px-6 md:w-auto text-center text-xl rounded-full bg-green-600 bg-opacity-30 hover:bg-opacity-40 cursor-pointer">
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

                $('.price_change').change(function(){
                    let plus = $(this).data('price')
                    let item = $(this).data('item')
                    let id = $(this).attr('id')
                    let plus_container = $(this).parent().parent().parent().parent().parent().find('.price')
                    let newPrice = 0
                    if(!$(this).prop('checked')){
                        // Option is unchecked and should be removed from commande
                        $(this).parent().parent().parent().parent().parent().parent().find('form').find("#"+id).remove()
                        newPrice = parseFloat(plus_container.html()) - parseFloat(plus)
                        $(this).parent().parent().removeClass('bg-green-300 border-green-400 shadow-lg')
                    }else{
                        // Option is checked and add to commande
                        var input = '<input value="'+item+'" name="item_options[]" type="hidden" id="'+id+'">'
                        $(this).parent().parent().parent().parent().parent().parent().find('form').append(input)
                        $(this).parent().parent().addClass('bg-green-300 border-green-400 shadow-lg')
                        newPrice = parseFloat(plus_container.html()) + parseFloat(plus)
                    }
                    plus_container.html(newPrice.toFixed(2))
                    plus_container.parent().addClass('animate__animated animate__rubberBand')
                    plus_container.parent().one("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){
                        plus_container.parent().removeClass('animate__animated animate__rubberBand')
                    });
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

                $('.show_loader').click(function(){
                    $(this).find('i').remove();
                    $(this).html('<i class="fas fa-sync fa-spin"></i> En cours...');
                    $(this).prop('disabled', true).closest( "form" ).submit();
                })

            });
    </script>

    </div>

@endsection
