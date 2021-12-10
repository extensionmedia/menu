<div class="border border-2 rounded-lg shadow w-96 text-gray-600 relative">
    <div class="bg-gray-100 flex justify-center py-6">
        <img src="https://cdn-icons-png.flaticon.com/512/219/219983.png" alt="" class="h-16">
    </div>
    <div class="absolute top-0 right-0 h-4 w-4 m-2 rounded-full bg-green-600"></div>
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
