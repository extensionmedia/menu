<div class="w-96 mx-auto bg-white border my-4 rounded-lg px-2 py-4 text-gray-600">
    <div class="flex justify-between items-center border-gray-400 pb-1">
        <div class="">
            <b> Tiket : </b>{{$commande->id}}
        </div>
        @if ($commande->is_active)
            <i class="fas fa-circle text-green-500"></i>
        @else
            <i class="fas fa-circle text-red-500"></i>
        @endif
    </div>

    <div class="flex justify-between items-center border-gray-400 border-dashed border-b-2 pb-2 mb-4">
        <div class="">
            <b> Date : </b>{{$commande->created_at}}
        </div>
    </div>
    @php
        $total = 0
    @endphp
    @foreach ($commande->details as $detail)
        <div class="border-b border-dashed py-1 flex justify-between items-center">
            <div class="">
                [{{$detail->qte}}] {{$detail->item->name}}
            </div>
            <div class="">
                {{$detail->item->price * $detail->qte}} DH
            </div>
        </div>
        @php
            $total += $detail->item->price * $detail->qte
        @endphp
    @endforeach

    <div class="flex justify-between items-center border-gray-400 pb-6 mt-4">
        <div class=""></div>
        <div class="">
            <div class="">
                <b> Plats : </b>{{$detail->sum('qte')}}
            </div>
            <div class="">
                <b> Total : </b>{{$total}} DH
            </div>
        </div>
    </div>

    @if ($commande->livraison_id == 1)
    <div class="bg-blue-600 text-white rounded-lg py-1 px-4 inline text-xs">
        Commande sur place
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

    @if ($commande->is_active)
        <div class="py-4 text-center">
            <button data-id="{{$commande->id}}" class="close_ticket bg-green-500 py-2 w-32 text-white text-sm hover:bg-green-600 cursor-pointer border border-green-600 rounded-lg">Fermer Ticket</button>
        </div>

    @endif

</div>
