@extends('container.app')
@section('content')
    <div class="border rounded-lg overflow-hidden my-4">
        <div class="bg-gray-100 py-2 px-4 text-gray-800 text-sm">
            <i class="fas fa-plus"></i> Liste des commandes
        </div>
        <div class="bg-white flex">
            <div class="w-64 p-4 overflow-y-auto h-96">
                @foreach ($commandes as $commande)
                    @if ($commande->is_active)
                        <div data-id="{{$commande->id}}" class="show_ticket border mb-4 rounded-lg m-1 text-gray-600 flex items-center gap-2 py-2 px-2 hover:bg-gray-200 cursor-pointer">
                            <i class="fas fa-circle text-green-500"></i>
                            <div class="flex-1">
                                <div class="flex justify-between items-center">
                                    <div class="text-xs">
                                        <div class="text-lg"># {{$commande->id}}</div>
                                        @if ($commande->livraison_id == 1)
                                            <div class="bg-blue-600 text-white px-4 inline text-xs rounded">
                                                Sur Place
                                            </div>
                                        @else
                                            <div class="bg-pink-600 text-white px-4 inline text-xs rounded">
                                                EMPORTE
                                            </div>
                                        @endif
                                    </div>
                                    <span class="text-xs">
                                        {{$commande->created_at->diffForHumans()}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div data-id="{{$commande->id}}" class="show_ticket mb-4 rounded-lg m-1 border text-gray-600 flex items-center gap-2 py-2 px-2 hover:bg-gray-200 cursor-pointer">
                            <i class="fas fa-circle text-red-500"></i>
                            <div class="flex-1">
                                <div class="flex justify-between items-center">
                                    <div class="text-xs">
                                        <div class="text-lg"># {{$commande->id}}</div>
                                        @if ($commande->livraison_id == 1)
                                            <div class="bg-blue-600 text-white px-4 inline text-xs rounded">
                                                Sur Place
                                            </div>
                                        @else
                                            <div class="bg-pink-600 text-white px-4 inline text-xs rounded">
                                                EMPORTE
                                            </div>
                                        @endif
                                    </div>
                                    <span class="text-xs">
                                        {{$commande->created_at->diffForHumans()}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="flex-1 bg-blue-100 ticket relative">
                {{-- @include('commande.ticket') --}}
            </div>
        </div>


    </div>

    <script>
        $(document).ready(function(){
            $('.show_ticket').click(function(){
                var id = $(this).data('id');
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
        });
    </script>



@endsection
