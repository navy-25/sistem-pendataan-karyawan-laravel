@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('perkes')}}">Perawatan & Kesehatan</a> 
</li>
@endsection

@section('content')
<h3 style="margin-bottom:20px">Perawatan & Kesehatan</h3>
<div class="row">
    <div class="col-sm-12 col-xl-3 col-md-6" style="margin-bottom:20px">           
        <a href="{{route('ko')}}" style="width:100%;height:170px;" class="btn btn-linkedin">
            <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:80%;padding:5px">
                <img src="{{asset('/asset/icon/ko.png')}}" alt="logo" height="100%">
            </div>
            <div style="width:100%;height:15%">
                <h5> Ketersediaan Obat </h5>
            </div>
        </a>
    </div>
    <div class="col-sm-12 col-xl-3 col-md-6" style="margin-bottom:20px">                  
        <a href="{{route('kd')}}" style="width:100%;height:170px;" class="btn btn-linkedin">
            <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:80%;padding:5px">
                <img src="{{asset('/asset/icon/kd.png')}}" alt="logo"  height="100%">
            </div>
            <div style="width:100%;height:15%">
                <h5> Kebutuhan Deteni </h5>
            </div>
        </a>
    </div>
    <div class="col-sm-12 col-xl-3 col-md-6" style="margin-bottom:20px">           
        <a href="{{route('ad-p')}}" style="width:100%;height:170px;" class="btn btn-linkedin">
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
