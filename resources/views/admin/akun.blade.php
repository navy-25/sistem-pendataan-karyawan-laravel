<style>
    .lingkaran{
        width: 200px;
        height: 200px;
        background: white; 
        border-radius: 100%;
        /* background-image : url("/core-ui-master/src/img/avatars/5.jpg"); */
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100%;
        margin:20px
    }
    .lingkaran2{
        width: 50px;
        height: 50px;
        background: white; 
        border-radius: 100%;     
        margin-top:-50px;       
    }
    .bg-status{
        width: 125px;
        height: 26px;
        background: #373B3F;            
        margin:10px;
        padding-top:3px;
        border-radius: 20px;
        color:white;
        margin-bottom:20px;
    }

     /* upload image */
     .file-upload {
        background-color: #ffffff;
        width: 100%;
        margin: 0 auto;
        padding: 20px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #1FB264;
        border: none;
        padding: 3px;
        border-radius: 4px;
        /* border-bottom: 4px solid #15824B; */
        transition: all .2s ease;
        outline: none;
        /* text-transform: uppercase; */
        font-weight: 400;
    }

    .file-upload-btn:hover {
        background: #1AA059;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        border: 3px dashed #1FB264;
        position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: #1FB264;
        border: 3px dashed #ffffff;
    }

    .image-title-wrap {
        padding: 0 5px 5px 5px;
        color: #222;
    }

    .drag-text {
       text-align: center;
    }

    .drag-text h3 {
        font-weight: 50;
        /* text-transform: uppercase; */
        color: #15824B;
        padding: 30px 0;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 10px;
    }

    .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 4px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        /* text-transform: uppercase; */
        font-weight: 300;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }
</style>
@extends('layouts.dashboard')
@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('akun')}}" >Akun</a> 
</li>
@endsection
@section('content')
@if (session('status'))            
<script> 
    window.setTimeout(function() { 
        $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ 
            $(this).remove(); 
        }); 
    }, 3000); 
</script> 

<div class="alert alert-success" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> 
</div> 
@endif  
<div class="row">
    <div class="col-xl-4">
        <div class="card">
           
            <div class="card-body">   
                <center>
                    <img  src="{{$data_user->getDokumentasi()}}" class="lingkaran" alt="">     
                    <div class="lingkaran2" style="margin-top:-40px">                                                
                        <button type="button" class="btn btn-brand btn-tumblr" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="cui-camera"></i>
                        </button>
                        
                    </div>  
                    <h3 style="margin-bottom:0px"><b>{{auth()->user()->username}}</b></h3>
                    @if(auth()->user()->is_admin == 'user')
                        <h6>No. ID : {{auth()->user()->id}}</h6>
                    @endif
                    <div class="bg-status">
                        <h5 style="font-size:14px">Status : {{auth()->user()->is_admin}}</h5>
                    </div>          

                </center>
            </div>    
        </div>        
    </div>
    
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">       
                <form>
                    <h5 for=""> <b>DATA IDENTITAS </b> </h5>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor Induk Pegawai</label>
                        <input value="{{auth()->user()->username}}" class="form-control" type="text" placeholder="Readonly input here…" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Lengkap</label>
                        <input value="{{auth()->user()->name}}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap" readonly>
                    </div>
                    <div class="form-group">
                        <?php
                            $jabatan = auth()->user()->jabatan;
                            if(auth()->user()->is_admin == 'admin'){
                                $jabatan = 'Admin Sipidat';
                            }
                        ?>
                        <label for="exampleFormControlInput1">Jabatan</label>
                        <input value="{{ $jabatan}}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jabatan" readonly>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">    
            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card">
                    <a  style="width:100%;height:40px" class="btn btn-light" href="{{ route('gantiPass') }}">
                        <p style="margin-top:2px">
                            {{ __('Ubah Password') }}
                        </p>    
                    </a>         
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card">
                    <a  style="width:100%;height:40px" class="btn btn-youtube" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <p style="margin-top:2px">
                            {{ __('Logout') }}
                        </p>
                    </a>        
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <form method="POST" action="{{ route('store_foto') }}" enctype="multipart/form-data">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Foto Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf                                  
                    <div class="form-group" style="margin-top:0px">
                        <div class="row">
                            <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                            <script>
                                function readURL(input) {
                                    if (input.files && input.files[0]) {

                                        var reader = new FileReader();

                                        reader.onload = function(e) {
                                        $('.image-upload-wrap').hide();

                                        $('.file-upload-image').attr('src', e.target.result);
                                        $('.file-upload-content').show();

                                        $('.image-title').html(input.files[0].name);
                                        };

                                        reader.readAsDataURL(input.files[0]);

                                    } else {
                                        removeUpload();
                                    }
                                }

                                function removeUpload() {
                                $('.file-upload-input').replaceWith($('.file-upload-input').clone());
                                $('.file-upload-content').hide();
                                $('.image-upload-wrap').show();
                                }
                                $('.image-upload-wrap').bind('dragover', function () {
                                        $('.image-upload-wrap').addClass('image-dropping');
                                    });
                                    $('.image-upload-wrap').bind('dragleave', function () {
                                        $('.image-upload-wrap').removeClass('image-dropping');
                                });
                            </script>
                                <div class="file-upload">
                                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Upload Foto</button>

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="foto"/>
                                    <div class="drag-text">
                                    <h3>Tarik atau seret file kesini</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                            </div>
                                             
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary  btn-sm" data-dismiss="modal">Tutup</button>
                    <button type="submit" style="width:50px" class="btn btn-block btn-success btn-sm">
                        Ok
                    </button>                    
                </div>
            </div>
        </form>    
    </div>
</div>
@endsection

