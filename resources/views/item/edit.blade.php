@extends('container.app')
@section('content')
<style>
    input:checked ~ .dot {
      transform: translateX(100%);
      background-color: #48bb78;
    }
</style>

    <div class="text-center py-4">
        <a href="{{route('items', ['category'=>$item->category_id])}}" class="py-2 px-4 w-40 text-center rounded-full bg-green-600 bg-opacity-30 hover:bg-opacity-40 cursor-pointer">
            <i class="fas fa-arrow-left"></i>
            Retour
        </a>
    </div>
    <div class="border rounded-lg overflow-hidden my-4">
        <div class="bg-gray-100 py-2 px-4 text-gray-800 text-sm">
            <i class="fas fa-plus"></i> Modifier une Plat
            @php
                $folder = 'items/'.$UID
            @endphp
        </div>
        <form method="POST" action="{{route('item.update', ['item'=>$item])}}" class="bg-white py-8 px-4">
            @csrf
            @method('PUT')
            <div class="flex gap-4">
                <div class="flex-1">
                    <div class="text-gray-600 text-xs flex items-center mb-4">
                        <div class="w-32">Categorie</div>
                        <select class="border rounded py-1 px-2 text-sm flex-1" name="category_id" id="">
                            @foreach ($categories as $cat)
                                <option @if($cat->id == $item->category_id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-gray-600 text-xs flex items-center mb-4">
                        <div class="w-32">Plat</div>
                        <input value="{{$item->name}}" required class="border rounded py-1 px-2 text-sm flex-1" type="text" name="name" placeholder="Plat...">
                    </div>
                    <div class="text-gray-600 text-xs flex items-center mb-4">
                        <div class="w-32">Description</div>
                        <textarea class="border rounded py-1 px-2 text-sm flex-1" name="description" required id="" rows="5">{{$item->description}}</textarea>
                    </div>
                    <div class="text-gray-600 text-xs flex items-center mb-4">
                        <div class="w-32">Prix</div>
                        <input value="{{$item->price}}" required class="border rounded py-1 px-2 text-sm flex-1 bg-green-50 text-right" type="number" min="1" name="price" placeholder="0.00">
                    </div>
                    <div class="text-gray-600 text-xs flex items-center mb-4">
                        <div class="w-32">Niveau</div>
                        <input value="{{$item->level}}" required class="border rounded py-1 px-2 text-sm flex-1" type="number" min="1" name="level" placeholder="0">
                    </div>
                    <div class="text-gray-600 text-xs flex items-center mb-4">
                        <div class="w-32">Visible</div>
                        <input @if($item->is_active) checked @endif type="checkbox" name="is_active">
                    </div>
                    <div class="text-gray-600 text-xs flex mb-20">
                        <div class="w-32">Image</div>
                        <div class="relative">
                            <div class="images rounded-lg h-40 w-40 overflow-hidden border-2 hover:border-blue-700 cursor-pointer">
                                <img class="bg-cover h-40 w-40" src="{{$item->image}}" alt="">
                            </div>
                            <div class="reload hidden">reload</div>
                            <input name="file" id="poster" type="file" class="hidden">
                            <input type="hidden" name="filename" id="filename" value="{{$item->image}}">
                            <div class="new_image btn p-2 mr-2 text-gray-400 cursor-pointer hover:text-green-600 text-center">
                                <i class="fas fa-cloud-upload-alt"></i> changer
                            </div>
                        </div>
        
                    </div>
                </div>
                <div class="w-72 bg-blue-50 px-2 text-gray-600">
                    <div class="text-lg font-bold py-4">
                        Options
                    </div>
                    @foreach ($options as $op)
                        <div class="text-xs flex justify-between items-center">
                            <label for="toggle_{{$item->id}}" class="flex gap-2 items-center cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" @if($item->is_active) checked @endif id="toggle_{{$item->id}}" data-id="{{$item->id}}" class="is_active sr-only">
                                    <div class="block bg-gray-300 w-10 h-6 rounded-full"></div>
                                    <div class="dot absolute left-1 top-1 bg-red-500 w-4 h-4 rounded-full transition"></div>
                                </div>
                                {{$op->name}}
                            </label>
                            <input type="checkbox" name="is_default" id="">
                        </div>
                    @endforeach
                </div>
            </div>


            <div class="text-gray-600 text-xs flex items-center mb-4">
                <div class="w-32"></div>
                <button class="bg-green-600 text-white py-2 px-4 rounded-lg">Enregistrer</button>
            </div>

        </form>

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
                                url:"{{ route('file.destroy') }}",
                                data:{
                                    _token:     $('meta[name="csrf-token"]').attr('content'),
                                    folder:     "{{$folder}}",
                                    file:       that.data('file')
                                },
                                method: 'POST',
                                success: function(response){
                                    $('.reload').trigger('click');
                                }
                            });
                        }
                    });
                });

                $('.new_image').on('click', function(){
                    $('#poster').trigger('click');
                });

                $('#poster').on('change', function(){
                    var data = new FormData();
                    jQuery.each(jQuery('#poster')[0].files, function(i, file) {
                        data.append('file', file);
                    });
                    data.append( '_token', $('meta[name="csrf-token"]').attr('content') );
                    data.append( 'folder', "{{$folder}}" );

                    var loader = `
                        <div class="loader absolute bottom-0 top-0 left-0 right-0 bg-red-100 bg-opacity-40">
                            <div class="w-24 mx-auto mt-24 text-center">
                                <i class="fas fa-sync fa-spin"></i>
                            </div>
                        </div>
                    `;
                    $('.images').html(loader);

                    jQuery.ajax({
                        url: "{{ route('file.upload') }}",
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        method: 'POST',
                        type: 'POST', // For jQuery < 1.9
                        success: function(data){
                            $('#filename').val(data.file);
                            $('.loader').remove();
                            $('.reload').trigger('click');
                        }
                    });
                });

                $('.reload').on('click', function(){
                    var loader = `
                        <div class="loader absolute bottom-0 top-0 left-0 right-0 bg-red-100 bg-opacity-40">
                            <div class="w-24 mx-auto mt-24 text-center">
                                <i class="fas fa-sync fa-spin"></i>
                            </div>
                        </div>
                    `;
                    $('.images').html(loader);
                    var image = '';
                    $.ajax({
                        url:"{{ route('file.read') }}",
                        data:{
                            _token:     $('meta[name="csrf-token"]').attr('content'),
                            folder:     "{{$folder}}"
                        },
                        method: 'POST',
                        success: function(response){
                            var empty = `<img class="bg-cover h-40 w-40" src="{{asset('img/upload_image.jpg')}}" alt="">`;
                            for (let i = 0; i < response.length; i++) {
                                var image = `
                                <div class="relative">
                                    <a href="` + response[i] + `">
                                        <img class="border-2 bg-contain bg-center max-h-40 my-2 mr-4" src="` + response[i] + `">
                                    </a>
                                    <button data-file="` + response[i] + `" class="destroy_image absolute top-0 right-0 m-1 mr-2 bg-red-500 text-white rounded-full p-1 text-xs">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>`;
                                if(i==0){
                                    $('.images').html(image);
                                }else{
                                    $('.images').append(image);
                                }
                            }
                            if(response.length==0){
                                $('.images').html(empty);
                                $('.loader').remove();
                            }
                        }
                    });
                });
            });
            </script>


    </div>

@endsection
