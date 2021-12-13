<div class="border border-2 rounded-lg shadow w-96 text-gray-600 relative">
    <div class="@if ($user->is_admin)bg-green-100 @else bg-blue-100 @endif flex justify-center py-6">
        <img src="{{$user->image}}" alt="" class="h-16">
    </div>
    <div class="absolute top-0 right-0 h-4 w-4 m-2 rounded-full @if($user->is_active)bg-green-500 @else bg-red-500 @endif"></div>
    <div class="absolute top-0 left-0 h-4 w-4 m-2">
        <a href="http://127.0.0.1:8000/user/edit/{{$user->id}}" class="text-gray-500 px-1 hover:bg-blue-600 hover:text-gray-50 rounded-lg">
            <i class="fas fa-wrench"></i>
        </a>
    </div>
    <div class="py-2 px-4">
        <div class="text-2xl">{{$user->name}}</div>
        <div class="text-xs font-bold">
            @if ($user->is_admin)
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
