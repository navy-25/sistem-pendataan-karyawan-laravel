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
        margin:20px;
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
        border-radius: 20px;
        color:white;
        margin-bottom:20px;
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
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
<div class="row">
    <div class="col-xl-2 col-md-3 col-sm-0"></div>
    <div class="col-xl-7 col-md-7 col-sm-12">
        <div class="card">
            <div class="card-body">     
                <h2 style="margin-bottom:30px"> <b> Ubah Password </b></h2>  
                <form method="POST" action="{{ route('ganti_password') }}">
                    @csrf                    
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
                        <!-- <input class="form-control" type="password" placeholder="Password"> -->
                    </div>
                    <div class="input-group mb-4">
                        
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="cui-lock-locked"></i>
                        </span>
                        </div>
                        <input id="password-confirm" type="password" placeholder="Konfirmasi password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <!-- <input class="form-control" type="password" placeholder="Repeat password"> -->
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('akun') }}" class="btn btn-block btn-light" >Batal</a>
                            <!-- <button class="btn btn-block btn-success" type="button">Create Account</button> -->                        
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-block btn-success">
                                {{ __('Konfirmasi') }}
                            </button>                        
                        </div>                    
                    </div>
                </form>             
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-3 col-sm-0"></div>
</div>
@endsection
