@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('rap')}}">Registrasi Administrasi & Pelaporan</a> 
</li>
@endsection

@section('content')     
<h3 style="margin-bottom:20px">Registrasi Administrasi & Pelaporan</h3>
<div class="row">
    <div class="col-sm-12 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('dp')}}" style="width:100%;height:170px;" class="btn btn-linkedin">
            <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:80%;padding:5px">
                <img src="{{asset('/asset/icon/dp.png')}}" alt="logo" height="100%">
            </div>
            <div style="width:100%;height:15%">
                <h5>Data Pengungsi</h5>
            </div>
        </a>
    </div>
    <div class="col-sm-12 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('dpm')}}" style="width:100%;height:170px;" class="btn btn-linkedin">
        <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:80%;padding:5px">
                <img src="{{asset('/asset/icon/dpm.png')}}" alt="logo" height="100%">
            </div>
            <div style="width:100%;height:15%">
                <h5> Data Pengungsi Mandiri</h5>
            </div>
        </a>
    </div>
@if(auth()->user()->is_admin != 'tamu')
    <div class="col-sm-12 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('dd')}}" style="width:100%;height:170px;" class="btn btn-linkedin">
        <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:80%;padding:5px">
                <img src="{{asset('/asset/icon/dd.png')}}" alt="logo" height="100%">
            </div>
            <div style="width:100%;height:15%">
                <h5> Data Deteni </h5>
            </div>
        </a>
    </div>
@endif
    <div class="col-sm-12 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('lp')}}" style="width:100%;height:170px;" class="btn btn-linkedin">
        <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:80%;padding:5px">
                <img src="{{asset('/asset/icon/lp.png')}}" alt="logo" height="100%">
            </div>
            <div style="width:100%;height:15%">
                <h5> Lapor Pengungsi </h5>
            </div>
        </a>
    </div>       
    @if(auth()->user()->is_admin != 'tamu')
    <div class="col-sm-12 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('ad-rap')}}" style="width:100%;height:170px;" class="btn btn-linkedin">
        <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:80%;padding:5px">
                <img src="{{asset('/asset/icon/ad.png')}}" alt="logo" height="100%">
            </div>
            <div style="width:100%;height:15%">
                <h5> Arsip Digital </h5>
            </div>
        </a>
    </div>  
    @endif     
</div>
@endsection
