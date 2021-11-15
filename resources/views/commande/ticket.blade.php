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
                <b> Plats : </b>{{5}}
            </div>
            <div class="">
                <b> Total : </b>{{$total}} DH
            </div>
        </div>
    </div>

</div>
