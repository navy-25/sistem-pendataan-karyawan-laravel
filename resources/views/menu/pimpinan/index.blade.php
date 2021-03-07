@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('pimpinan')}}">Pimpinan</a> 
</li>
@endsection

@section('content')
<h3 style="margin-bottom:20px">Pimpinan</h3>
<div class="row">
    <div class="col-sm-6 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('tk')}}" style="width:100%;height:170px;" class="btn btn-linkedin">
            <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:80%;padding:5px">
                <img src="{{asset('/asset/icon/tk.png')}}" alt="logo" height="100%">
            </div>
            <div style="width:100%;height:15%">
                <h5>Target Kinerja</h5>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('ptk')}}" style="width:100%;height:170px;" class="btn btn-linkedin">
            <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:80%;padding:5px">
                <img src="{{asset('/asset/icon/ptk.png')}}" alt="logo" height="100%">
            </div>
            <div style="width:100%;height:15%">
                <h5>Protokoler</h5>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('pws')}}" style="width:100%;height:170px;" class="btn btn-linkedin">
            <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:80%;padding:5px">
                <img src="{{asset('/asset/icon/pws.png')}}" alt="logo" height="100%">
            </div>
            <div style="width:100%;height:15%">
                <h5>Pengawasan</h5>
            </div>
        </a>
    </div>        
</div>        
@endsection
