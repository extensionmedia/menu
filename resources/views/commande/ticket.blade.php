@if (Session::has('message'))
<div class="flash animate__animated animate__rubberBand rounded-lg absolute top-0 right-0 m-6 bg-green-500 text-white text-sm py-1 px-4 border border-green-600">
    <i class="far fa-thumbs-up"></i> {{ Session::get('message') }}
</div>
@endif
<div class="w-3/5 mx-auto flex justify-end py-4">
    <button data-commande="{{$commande->id}}" class="destroy_commande bg-red-600 text-white px-2 py-1 rounded-lg text-xs">
        <i class="far fa-trash-alt"></i> Supprimer
    </button>
</div>
<div class="w-3/5 mx-auto bg-white border my-4 rounded-lg px-2 py-4 text-gray-600">

    <div class="flex justify-between items-center border-gray-400 pb-1">
        <div class="">
            <b> Tiket : </b>{{$commande->id}}
        </div>
        @if ($commande->is_active == 1)
            <i class="fas fa-circle text-green-500"></i>
        @else
            @if ($commande->is_active == 0)
                <i class="fas fa-circle text-gray-300"></i>
            @else
                <i class="fas fa-circle text-red-500"></i>
            @endif
        @endif
    </div>

    <div class="flex justify-between items-center border-gray-400 border-dashed border-b-2 pb-2 mb-4">
        <div class="">
            <b> Date : </b>{{$commande->created_at}}
        </div>
    </div>
    @php
        $total = 0;
        $qte = 0;
        $options_total = 0;
    @endphp
    @foreach ($commande->details as $detail)

        @php $options_total = 0 @endphp

        <div class="border-b border-dashed py-1">
            <div class="flex justify-between items-center">
                <div class="">
                    [{{$detail->qte}}] {{$detail->item->name}}
                    <div class="">
                        @if($detail->options->count())
                            @foreach ($detail->options as $op)
                                <div class="px-2 text-xs text-green-600">
                                    <i class="fas fa-check"></i> {{$op->item_option->name}}
                                    @php
                                        $options_total += $op->item_option->price
                                    @endphp
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="">
                    {{ ($detail->item->price + $options_total) * $detail->qte}} DH
                </div>
            </div>


        </div>
        @php
            $total += ($detail->item->price + $options_total) * $detail->qte;
            $qte += $detail->qte;
        @endphp
    @endforeach

    <div class="flex justify-between items-center border-gray-400 pb-6 mt-4">
        <div class=""></div>
        <div class="">
            <div class="">
                <b> Plats : </b>{{$qte}}
            </div>
            <div class="">
                <b> Total : </b>{{$total}} DH
            </div>
        </div>
    </div>

    @if ($commande->livraison_id == 1)
        <div class="bg-blue-600 text-white py-1 px-4 inline text-lg">
            Commande sur place
        </div>
        <div class="border-b bg-blue-600 text-white border-dashed py-1 px-4 flex justify-between items-center">
            <div class="">
                Client :
            </div>
            <div class="">
                {{$commande->client_name}}
            </div>
        </div>
        <div class="border-b bg-blue-600 text-white border-dashed py-1 px-4 flex justify-between items-center">
            <div class="">
                Téléphone :
            </div>
            <div class="">
                {{$commande->client_telephone}}
            </div>
        </div>
        <div class="border-b bg-blue-600 text-white border-dashed py-1 px-4 flex justify-between items-center">
            <div class="">
                Récupération dans :
            </div>
            <div class="">
                {{$commande->livraison_time}}
            </div>
        </div>
    @else
        <div class="bg-pink-600 text-white py-1 px-4 inline text-lg">
            Commande EMPORTE
        </div>
        <div class="border-b bg-pink-600 text-white border-dashed py-1 px-4 flex justify-between items-center">
            <div class="">
                Client :
            </div>
            <div class="">
                {{$commande->client_name}}
            </div>
        </div>
        <div class="border-b bg-pink-600 text-white border-dashed py-1 px-4 flex justify-between items-center">
            <div class="">
                Téléphone :
            </div>
            <div class="">
                {{$commande->client_telephone}}
            </div>
        </div>
        <div class="border-b bg-pink-600 text-white border-dashed py-1 px-4 flex justify-between items-center">
            <div class="">
                Récupération dans :
            </div>
            <div class="">
                {{$commande->livraison_time}}
            </div>
        </div>
    @endif

    @if ($commande->is_active == 1)
        <div class="py-4 text-center">
            <button data-id="{{$commande->id}}" class="close_ticket bg-green-500 py-2 w-32 text-white text-sm hover:bg-green-600 cursor-pointer border border-green-600 rounded-lg">Fermer Ticket</button>
        </div>

    @endif

</div>
