@extends('container.app')
@section('content')

<div class="border rounded-lg overflow-hidden my-4">
    <div class="bg-gray-100 py-2 px-4 text-gray-800 text-sm">
        <i class="fas fa-utensils"></i> Ma commande
    </div>
    <div class="bg-blue-100 py-8">
        @if ($commande)
            @if ($commande->details->count())
                <div class="md:w-3/5 mx-1 pb-4 md:mx-auto flex items-center justify-between text-gray-800">
                    <div class="text-sm text-gray-900">
                        Commande N : {{$commande->id}}
                    </div>
                    <div class="text-xs text-gray-400">
                        {{$commande->created_at->diffForHumans()}}
                    </div>
                </div>
                <div class="bg-white md:w-3/5 mx-1 md:mx-auto rounded-lg overflow-hidden shadow-lg">
                    @php
                        $total = 0
                    @endphp
                    @foreach ($commande->details as $detail)
                        @php
                            $total += $detail->qte * $detail->item->price
                        @endphp
                        @include('commande.partials.item')
                    @endforeach
                    <div class="px-4 border-dashed border-t-2 text-gray-800 text-right bg-gray-100">
                        <div class="flex justify-between items-center py-4">
                            <div class="text-lg text-gray-900">
                                Element(s) : {{$commande->details->sum('qte')}}
                            </div>
                            <div class="text-xl text-black">
                                Total : {{$total}} DH
                            </div>
                        </div>
                    </div>
                </div>

                    @include('commande.partials.livraison')

                <div class="md:w-3/5 mx-1 md:mx-auto mt-8">
                    <button class="w-full md:w-64 bg-green-600 text-white py-2 px-12 rounded-lg">Passer Ma Commande</button>
                </div>
            @else
                <div class="bg-white md:w-3/5 mx-4 py-8 md:mx-auto rounded-lg overflow-hidden shadow-lg">
                    @include('commande.partials.empty')
                </div>
            @endif
        @else
            <div class="bg-white md:w-3/5 mx-4 py-8 md:mx-auto rounded-lg overflow-hidden shadow-lg">
                @include('commande.partials.empty')
            </div>
        @endif
    </div>
</div>

    <script>
        $(document).ready(function(){
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
                            url:"{{route('commande.item.destroy')}}",
                            data:{
                                _token:     $('meta[name="csrf-token"]').attr('content'),
                                id:         that.data('id')
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



@endsection
