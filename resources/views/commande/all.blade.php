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
                <i class="fas fa-plus"></i> Liste des commandes
            </div>
            <div class="">
                <button class="text-gray-400 hover:text-green-600">
                    <i class="fas fa-sync"></i>
                </button>
            </div>
        </div>
        <div class="bg-white flex">
            <div class="w-72 p-4 overflow-y-auto" style="height: 600px">
                <div class="flex items-center justify-between text-gray-800 px-1 pb-4">
                    <div class="">Filtrer</div>
                    <select class="livraison_id_change py-1 text-xs rounded border border-gray-300" name="livraison_id" id="livraison_id">
                        <option value="2">Emporté</option>
                        <option value="1">Sur place</option>
                        <option selected value="0">Tous</option>
                    </select>
                </div>
                <div class="all_container">
                    @foreach ($commandes as $commande)
                        @include('commande.partials.left_item')
                    @endforeach
                </div>

                <div class="px-1 pt-4">
                    <label for="toggle" class="flex items-center cursor-pointer">
                        <div class="relative">
                            <input type="checkbox" id="toggle" class="show_all sr-only">
                            <div class="block bg-gray-200 w-10 h-6 rounded-full"></div>
                            <div class="dot absolute left-1 top-1 bg-gray-500 w-4 h-4 rounded-full transition"></div>
                        </div>
                        <div class="text-gray-600 text-xs pl-2">
                            Afficher autres tickets
                        </div>
                    </label>
                </div>

                <div class="show_all_container py-4">

                </div>
            </div>
            <div class="flex-1 bg-blue-100 ticket relative">
                {{-- @include('commande.ticket') --}}
            </div>
        </div>


    </div>

    <script>
        $(document).ready(function(){
            $(document).on('click', '.show_ticket', function(){
                var id = $(this).data('id');
                parent.location.hash = "ticket_"+id;
                $('.show_ticket').removeClass('border-2 border-green-500 shadow-lg bg-gray-200');
                $(this).addClass('border-2 border-green-500 shadow-lg bg-gray-200');
                var loader = `
                        <div class="loader absolute bottom-0 top-0 left-0 right-0 bg-red-100 bg-opacity-40">
                            <div class="w-24 mx-auto mt-24 text-center">
                                <i class="fas fa-sync fa-spin"></i>
                            </div>
                        </div>
                    `;
                $('.ticket').append(loader);
                $.ajax({
                    url: "{{ route('commande.ticket') }}",
                    data: {
                        id: id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'POST',
                    type: 'POST',
                    success: function(data){
                        $('.ticket').html(data);
                        $('.loader').remove()
                    },
                    error: function(){
                        $('.loader').remove()
                    }
                })

            })

            $(document).on('click', '.close_ticket', function(){
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ route('commande.ticket.close') }}",
                    data: {
                        id: id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'POST',
                    type: 'POST',
                    success: function(data){
                        $('.show_ticket.border-green-500').trigger('click');
                    }
                })
            })

            $('.show_all').on('change', function(){
                if(!$(this).prop("checked")){
                    $('.show_all_container').html("");
                }else{
                    var loader = `
                        <div class="loader text-center text-gray-600">
                            <i class="fas fa-sync fa-spin"></i>
                        </div>
                        `;
                    $('.show_all_container').html(loader);

                    $.ajax({
                        url: "{{ route('commande.closed') }}",
                        method: 'GET',
                        type: 'GET',
                        success: function(data){
                            $('.show_all_container').html(data);
                            $('.loader').remove()
                        },
                        error: function(){
                            $('.loader').remove()
                        }
                    })
                }
            })

            $('.livraison_id_change').on('change', function(){
                var livraison_id = $(this).val();
                var loader = `
                        <div class="loader text-center text-gray-600">
                            <i class="fas fa-sync fa-spin"></i>
                        </div>
                        `;
                    $('.all_container').html(loader);

                $.ajax({
                    url: "{{ route('commande.getBy') }}",
                    data: {
                        'livraison_id'  :   livraison_id
                    },
                    method: 'GET',
                    type: 'GET',
                    success: function(data){
                        $('.all_container').html(data);
                        $('.loader').remove()
                    },
                    error: function(){
                        $('.loader').remove()
                    }
                })
            });

            var processing_queue = false;

            var timer = setInterval(() => {
                if(!processing_queue){
                    processing_queue = true;
                    $.ajax({
                        url: "{{ route('commande.queue') }}",
                        method: 'GET',
                        type: 'GET',
                        success: function(data){
                            processing_queue = false;
                            if(data.length > 0){
                                $('.livraison_id_change').trigger('change');
                                Push.create("Nouvelle Commande", {
                                    body: "Vous avez une nouvelle commande, Click pour visualiser",
                                    icon: '/img/logo.png',
                                    requireInteraction: true,
                                    onClick: function () {
                                        window.open('http://www.menu.soukexpress.ma/commande/all#ticket_'+data[0].commande_id, '_blank');
                                    }
                                });
                                console.log(data);
                            }
                        }
                    });
                }

            }, 2000);

            $(document).on('click', '.destroy_commande', function(e){
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
                                url:"{{route('commande.destroy')}}",
                                data:{
                                    _token:     $('meta[name="csrf-token"]').attr('content'),
                                    commande:         that.data('commande')
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

        $(window).on('load', function() {
            var ticket = window.location.hash.substr(1);
            if(ticket !== ""){
                $('.show_ticket').each(function(){
                    var id = "ticket_"+$(this).data('id')
                    if(ticket == id){
                        $(this).trigger('click')
                    }
                })
            }

        });
    </script>



@endsection
