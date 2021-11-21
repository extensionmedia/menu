<div data-id="{{$commande->id}}" class="show_ticket mb-4 rounded-lg m-1 border text-gray-600 flex items-center gap-2 py-2 px-2 hover:bg-gray-200 cursor-pointer">
    @if ($commande->is_active==1)
        <i class="fas fa-circle text-green-500"></i>
    @else
        @if ($commande->is_active==0)
            <i class="fas fa-circle text-gray-300"></i>
        @else
            <i class="fas fa-circle text-red-500"></i>
        @endif
    @endif

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
