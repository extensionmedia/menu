@extends('container.app')
@section('content')

    <div class="bg-white py-8 px-4 text-gray-600">
        @if ($commande->details->count())
            @php
                $total = 0
            @endphp
            @foreach ($commande->details as $c_d)
                @if ($c_d->item)
                    <div class="border-b bg-gray-50 py-1 px-4 flex items-center">
                        <div class="w-48">
                            <img class="h-14 rounded-full" src="{{$c_d->item->image}}" alt="">
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between">
                                <div class="">
                                    <div class="font-bold text-gray-800">{{ $c_d->item->name }}</div>
                                    <div class="text-sm">{{ $c_d->item->description }}</div>

                                </div>
                                <div class="flex items-center gap-8">
                                    <div class="flex flex-1 gap-8">
                                        <div class="text-pink-600">
                                            <input class="w-14 border text-center" min="1" type="number" value="{{$c_d->qte}}">
                                        </div>
                                        <div class="">{{ $c_d->item->price }} MAD</div>
                                        @php
                                            $total += $c_d->item->price
                                        @endphp
                                    </div>
                                    <a href="" data-id="{{$c_d->id}}" class="destroy_image w-14 text-center text-red-500">
                                        <i class="far fa-trash-alt"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach
                <div class="bg-green-50 border boder-green-100 text-green-800 text-right py-4 px-4 rounded text-2xl mt-4">
                    Total : {{$total}} MAD
                </div>
        @else
            <div class="bg-red-50 border border-red-100 text-red-800 rounded py-4 px-4 text-center">
                Menu khawi
            </div>
        @endif




    </div>

    <script>
        $(document).ready(function(){
            $(document).on('click', '.destroy_image', function(e){
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
