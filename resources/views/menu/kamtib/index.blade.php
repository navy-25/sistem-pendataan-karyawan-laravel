@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('kamtib')}}">Keamanan & Ketertiban</a> 
</li>
@endsection

@section('content')     
<h3 style="margin-bottom:20px">Keamanan & Ketertiban</h3>
<div class="row">
    <div class="col-sm-12 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('lpj')}}" style="width:100%;height:170px;" class="btn btn-linkedin">
            <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:80%;padding:5px">
                <img src="{{asset('/asset/icon/lpj.png')}}" alt="logo" height="100%">
            </div>
            <div style="width:100%;height:15%">
                <h5>Laporan Petugas Jaga </h5>
            </div>
        </a>
    </div>
    <div class="col-sm-12 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('dpb')}}" style="width:100%;height:170px;" class="btn btn-linkedin">
        <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:80%;padding:5px">
                <img src="{{asset('/asset/icon/dpb.png')}}" alt="logo" height="100%">
            </div>
            <div style="width:100%;height:15%">
                <h5> Data Penghuni Blok </h5>
            </div>
        </a>
    </div>
    <div class="col-sm-12 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('dtp')}}" style="width:100%;height:170px;" class="btn btn-linkedin">
        <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:80%;padding:5px">
                <img src="{{asset('/asset/icon/dtp.png')}}" alt="logo" height="100%">
            </div>
            <div style="width:100%;height:15%">
                <h5> Daftar Tugas Pengawalan </h5>
            </div>
        </a>
    </div>
    <div class="col-sm-12 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('ad-k')}}" style="width:100%;height:170px;" class="btn btn-linkedin">
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
</div>
@endsection
