@extends('container.app')
@section('content')
    <div class="text-center py-4">
        <a href="{{route('user.index')}}" class="py-2 px-4 w-40 text-center rounded-full bg-green-600 bg-opacity-30 hover:bg-opacity-40 cursor-pointer">
            <i class="fas fa-arrow-left"></i>
            Retour
        </a>
    </div>
    <div class="border rounded-lg overflow-hidden my-4">
        <div class="bg-gray-100 py-2 px-4 text-gray-800 text-sm">
            <i class="fas fa-plus"></i> Modifier un compte {{$user->name}}
            @php
                $folder = 'users/'.$UID
            @endphp
        </div>
        <form method="POST" action="{{route('user.update', ['user'=>$user])}}" class="bg-white py-8 px-4">
            @if($errors->any())
                {!! implode('', $errors->all('<div class="text-red-500 text-xs">:message</div>')) !!}
            @endif
            @csrf
            @method('PUT')
            <div class="text-gray-600 text-xs flex items-center mb-4">
                <div class="w-32">Nom Utilisateur</div>
                <input value="{{$user->name}}" required class="border rounded py-1 px-2 text-sm flex-1" type="text" name="name" placeholder="Nom...">
            </div>
            <div class="text-gray-600 text-xs flex items-center mb-4">
                <div class="w-32">Email</div>
                <div class="flex flex-1 gap-1 items-center">
                    <input value="{{$user->email}}" disabled required class="border rounded py-1 px-2 text-sm flex-1" type="email" id="email" name="email" placeholder="email">
                    <button class="change_email py-1 px-3 bg-blue-100 rounded border border-blue-200 text-gray-900 w-32">Changer Email</button>
                </div>
            </div>
            <div class="text-gray-600 text-xs flex items-center mb-4">
                <div class="w-32">Password</div>
                <div class="flex flex-1 gap-1 items-center">
                    <input value="" required disabled class="border rounded py-1 px-2 text-sm flex-1" type="password" id="password" name="password" placeholder="******">
                    <button class="change_password py-1 px-3 bg-blue-100 rounded border border-blue-200 text-gray-900 w-32">Password</button>
                </div>
            </div>

            <div class="text-gray-600 text-xs flex items-center mb-4">
                <div class="w-32">Activ??</div>
                <input type="checkbox" @if($user->is_active) checked @endif name="is_active">
            </div>

            <div class="text-gray-600 text-xs flex items-center mb-4">
                <div class="w-32">Administrateur</div>
                <input @if(Auth::user()->is_admin) disabled @endif type="checkbox" @if($user->is_admin) checked @endif name="is_admin">
            </div>

            <div class="text-gray-600 text-xs flex mb-20">
                <div class="w-32">Image</div>
                <div class="relative">
                    <div class="images rounded-lg h-40 w-40 overflow-hidden border-2 hover:border-blue-700 cursor-pointer">
                        <img class="bg-cover h-40 w-40" src="{{$user->image}}" alt="">
                    </div>
                    <div class="reload hidden">reload</div>
                    <input name="file" id="poster" type="file" class="hidden">
                    <input type="hidden" name="filename" id="filename" value="{{$user->image}}">
                    <div class="new_image btn p-2 mr-2 text-gray-400 cursor-pointer hover:text-green-600 text-center">
                        <i class="fas fa-cloud-upload-alt"></i> changer
                    </div>
                </div>

            </div>
            <div class="text-gray-600 text-xs flex items-center mb-4">
                <div class="w-32"></div>
                <button class="w-full md:w-64 py-2 px-4 bg-green-400 text-gray-900 rounded-full border-2 border-green-500 hover:bg-green-500">Enregistrer</button>
            </div>

        </form>

        <script>
            $(document).ready(function(){

                $('.change_email').on('click', function(e){
                    e.preventDefault()
                    $('#email').prop('disabled', false).focus()
                })

                $('.change_password').on('click', function(e){
                    e.preventDefault()
                    $('#password').prop('disabled', false).focus()
                })

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

                // $('.images').magnificPopup({
                //     delegate: 'a', // child items selector, by clicking on it popup will open
                //     type: 'image',
                //     gallery: {
                //         enabled: true,
                //     },
                //     zoom: {
                //         enabled: true,
                //     }
                //     // other options
                // });
            });
            </script>


    </div>

@endsection
