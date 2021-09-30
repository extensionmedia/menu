@extends('container.app')
@section('content')
@php
    $images = [
        "https://img.freepik.com/photos-gratuite/vue-dessus-pizza-au-pepperoni-coupee-six-tranches_141793-2157.jpg?size=626&ext=jpg",
        "https://assets.myfoodandfamily.com/adaptivemedia/rendition/id_3566926e794027c9fd994bec11ad21db96b38868/ht_650/wd_1004/name_./grilled-mexican-panini",
        "https://cdn.bioalaune.com/img/article/thumb/900x500/36524-etiquetage-alimentaire-trompeur-industriels.png",
        "https://img.cuisineaz.com/660x660/2019/04/17/i146583-tacos-poulet-curry.webp",
        "https://media.istockphoto.com/photos/hamburger-with-cheese-and-french-fries-picture-id1188412964?k=20&m=1188412964&s=612x612&w=0&h=Ow-uMeygg90_1sxoCz-vh60SQDssmjP06uGXcZ2MzPY=",
        "https://media.istockphoto.com/photos/orange-juice-splash-picture-id537837754?k=20&m=537837754&s=612x612&w=0&h=D69GxC3Mlw--eqvtIk7kBTjC6tqG-dWdcvRl5Aoq49w=",
        "https://assets.bwbx.io/images/users/iqjWHBFdfxIU/iSOeWv5_Qtrw/v1/1000x-1.jpg",
        "https://media.istockphoto.com/photos/group-of-plastic-drink-water-bottles-picture-id623194392",
        "https://st3.depositphotos.com/4380809/14529/i/1600/depositphotos_145299015-stock-photo-cup-of-cofe-on-the.jpg",
        "https://www.dunesdeserts.com/wp-content/uploads/2019/03/THE-A-LA-MENTHE-MAROC-12.5.jpg",
        "https://img.etimg.com/thumb/msid-84939728,width-1200,height-900,imgsize-381352,resizemode-8,quality-100/magazines/panache/from-the-us-russia-to-india-an-ice-cream-bowl-has-a-long-political-history.jpg",
        "https://health.clevelandclinic.org/wp-content/uploads/sites/3/2015/07/fruitSalad-98841227-770x533-1.jpg"
    ]
@endphp
    <div class="flex justify-center py-8">
        <div class="grid grid-cols-2 xl:grid-cols-4 md:grid-cols-3 gap-4">
            @foreach ($images as $img)
                <div class="h-64 w-64 bg-red-500 rounded text-center rounded-xl overflow-hidden cursor-pointer border-2 boder-white hover:border-red-500">
                    <img class="inline object-cover h-full" src="{{$img}}" alt="">
                </div>
            @endforeach

        </div>
    </div>
@endsection
