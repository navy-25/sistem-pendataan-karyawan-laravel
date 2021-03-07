@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('users')}}">Users</a> 
</li>    
<li class="breadcrumb-item">
    Edit Akun Pengguna
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
<div class="card">
    <div class="card-body">   
        <div class="row">           
            <div class="col-xl-12 col-md-12 col-sm-12 ">
                <h3 style="margin-bottom:20px"><b>Data Akun Pengguna</b> </h3>                       
            </div>                                  
        </div>        
        <form method="POST" action="/users/{{$users->id}}/update">
            @csrf
            <div class="row">
                <div class="col-xl-6">
                    <label for="" style="color:#555">Data Identitas</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="cui-smile"></i>
                        </span>
                        </div>
                        <input id="name" type="text" placeholder="Nama Lengkap" value="{{$users->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>      
                    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="cui-bookmark"></i>
                        </span>
                        </div>
                        <input id="jabatan" type="jabatan" placeholder="Jabatan" value="{{$users->jabatan}}" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan') }}" required autocomplete="jabatan">
                        @error('jabatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="cui-star"></i>
                            </span>
                        </div>
                        <select class="form-control" id="exampleFormControlSelect1" name="is_admin">    
                            <?php
                                if($users->is_admin == 'user'){
                                    $new = 'User';
                                }else if($users->is_admin == 'tamu'){
                                    $new = 'Tamu';
                                }

                            ?>
                            <option>{{$new}}</option>
                            @if(auth()->user()->is_admin == 'admin')
                                <option value="user">User</option>                            
                            @endif
                            <option value="tamu">Tamu</option>
                        </select>
                    </div> 
                </div>
                <div class="col-xl-6">
                    <label for="" style="color:#555">Data Akun</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="cui-user"></i>
                        </span>
                        </div>
                        <input id="username" type="username" placeholder="NIP (Nomor Induk Pegawai)" value="{{$users->username}}" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="cui-lock-locked"></i>
                        </span>
                        </div>
                        <input id="password" type="password" placeholder="Password" value="{{$users->username}}" class="form-control" >
                            
                    </div>
                  
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{ route('users') }}" class="btn btn-block btn-light" >Kembali</a>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-block btn-success">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>  
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
           
                </div>
        </div>
    </div>
</div>
@endsection
