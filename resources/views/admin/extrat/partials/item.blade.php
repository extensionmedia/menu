<div class="border border-2 rounded-lg shadow w-96 text-gray-600 relative">
    <div class="bg-blue-100 flex justify-center py-6">
        <img src="{{$extrat->image}}" alt="" class="h-16">
    </div>
    <div class="absolute top-0 right-0 h-4 w-4 m-2 rounded-full @if($extrat->is_active)bg-green-500 @else bg-red-500 @endif"></div>
    <div class="absolute top-0 left-0 h-4 w-4 m-2">
        <a href="{{route('extrat.edit',['extrat'=>$extrat->id])}}" class="text-gray-500 px-1 hover:bg-blue-600 hover:text-gray-50 rounded-lg">
            <i class="fas fa-wrench"></i>
        </a>
    </div>
    <div class="py-2 px-4">
        <div class="text-2xl">{{$extrat->name}}</div>
        <div class="text-xs font-bold">
            @if ($extrat->is_admin)
                <div class="text-green-600">
                    Admin
                </div>
            @else
                <div class="text-yellow-600">
                    Utilisateur
                </div>

            @endif
        </div>
    </div>
</div>
