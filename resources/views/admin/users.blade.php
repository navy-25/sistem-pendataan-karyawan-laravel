@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('users')}}">Users</a> 
</li>    
@endsection

<style>
    .lingkaran{
        width: 70px;
        height: 80px;
        background: #414141; 
        /* border-radius: 100%; */
        /* background-image : url("/core-ui-master/src/img/avatars/5.jpg"); */
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100%;
    }
</style>
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
        <div class="row" style="margin-bottom:20px">
            <div class="col-xl-7 col-md-6 col-sm-12 ">
                <h3 style="margin-bottom:20px"><b>Data Akun Pengguna</b> </h3>                       
            </div>                       
            <div  class="col-xl-2 col-md-3 col-sm-12 ">      
                <button class="btn btn-facebook" type="button" style="width:100%;margin-bottom:20px"  data-toggle="modal" data-target="#exampleModal">
                Tambah
                </a>
            </div>        
            <form class="col-xl-3 col-md-3  col-sm-12">
                <input type="text"  style="margin-bottom:20px" name="cari"  class="form-control" placeholder="Cari Akun"> <a class="srh-btn"><i class="ti-search"></i></a>
            </form>
        </div>        
        <table class="table table-hover table-striped table-responsive-md">
            <thead>
                <tr class="teks">
                    <th scope="col"  style="width:5%">ID</th>
                    <th scope="col"  style="width:15%">
                    <center>
                        Foto
                    </center></th>
                    <th scope="col"  style="width:25%">Nama Lengkap</th>
                    <th scope="col"  style="width:25%">Username</th>
                    <th scope="col " style="width:15%">
                    <center>
                        Status
                    </center></th>
                    <th scope="col"  style="width:15%">                    
                    <center>
                        Action
                    </center>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_user as $du)                         
                <tr class="teks">
                    <th>{{$du->id}}</th>
                    <td>
                    <center>
                        <img  src="{{$du->getDokumentasi()}}" class="lingkaran" alt="">        
                    </center>
                    </td>
                    <td>{{$du->name}}</td>
                    <td>{{$du->username}}</td>
                    <td>
                    <center>                    
                        <?php
                            if($du->is_admin == 'user'){
                                $new = 'User';
                            }else if($du->is_admin == 'tamu'){
                                $new = 'Tamu';
                            }
                        ?>
                        @if($du->is_admin=='user')
                            <button class="btn btn-warning btn-sm" style="width:50px;font-size:10px;color:black">
                                {{$new}}                        
                            </button>
                        @elseif($du->is_admin=='tamu')
                            <button class="btn btn-success btn-sm" style="width:50px;font-size:10px;color:black">
                                {{$new}}                        
                            </button>
                        @endif
                    </center>
                    </td>
                    <td>                
                        <center>
                            <a href="/users/{{$du->id}}/edit" style="margin:2px" class="btn btn-brand btn-twitter btn-sm">
                                <i class="cui cui-pencil"></i>
                            </a>
                            <a href="/akun/{{$du->id}}/destroy"  style="margin:2px" class="btn btn-brand btn-html5 btn-sm" onclick="return confirm('Apakah anda yakin ?')">
                                <i class="cui cui-trash"></i>
                            </a>                        
                        </center>
                    </td>
                </tr>
                @endforeach            
            </tbody>
        </table>
        {{ $data_user->links() }}    
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
            <form method="POST" action="{{ route('store_users') }}">
                    @csrf
                    <label for="" style="color:#555">Data Identitas</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="cui-smile"></i>
                        </span>
                        </div>
                        <input id="name" type="text" placeholder="Nama Lengkap" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                        <input id="jabatan" type="jabatan" placeholder="Jabatan" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan') }}" required autocomplete="jabatan">
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
                            @if(auth()->user()->is_admin == 'admin')
                                <option value="user">User</option>                            
                            @endif
                            <option value="tamu">Tamu</option>
                        </select>
                    </div> 
                    <label for="" style="color:#555">Data Akun</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="cui-user"></i>
                        </span>
                        </div>
                        <input id="username" type="username" placeholder="NIP (Nomor Induk Pegawai)" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
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
                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror           
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="cui-lock-locked"></i>
                        </span>
                        </div>
                        <input id="password-confirm" type="password" placeholder="Konfirmasi password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>                
                    @if(auth()->user()->is_admin == 'admin')
                        <button type="submit" class="btn btn-block btn-facebook">
                            {{ __('Register') }}
                        </button>
                    @else
                        <button type="submit" class="btn btn-block btn-facebook">
                            {{ __('Buat Akun') }}
                        </button>
                    @endif
                </form>  
            </div>
        </div>
    </div>
</div>
@endsection
