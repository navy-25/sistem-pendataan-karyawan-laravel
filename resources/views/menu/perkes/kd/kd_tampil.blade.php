@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('kamtib')}}">Keamanan & Ketertiban</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('kd')}}">Kebutuhan Deteni</a> 
</li>
<li class="breadcrumb-item">
    Lihat Laporan
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">              
        <div class="row">           
            <div class="col-xl-4  col-md-8"> 
                <dl class="row">
                <dt class="col-sm-5">Tanggal Lapor</dt>
                <dd class="col-sm-7"> {{$kd->tanggal}}-{{$kd->bulan}}-{{$kd->tahun}}</dd>

                <dt class="col-sm-5">Nama Penerima</dt>
                <dd class="col-sm-7"> {{$kd->nama_penerima}} </dd>

                <dt class="col-sm-5">Jenis Kebutuhan </dt>
                <dd class="col-sm-7"> {{$kd->jenis_kebutuhan}} </dd>

                <dt class="col-sm-5">Dibuat pada</dt>
                <dd class="col-sm-7"> {{$kd->created_at}} </dd>

                <dt class="col-sm-5">Diupdate pada</dt>
                <dd class="col-sm-7"> {{$kd->updated_at}} </dd>
                </dl>       
            </div>     
            <div class="col-xl-5  col-md-4">
                <dl class="row">
                <dt class="col-sm-12">Deskripsi  </dt>
                 <dd class="col-sm-12">{{$kd->deskripsi}}</dd>
                </dl>       
            </div>      
            <div class="col-xl-3 col-md-12">      
                @if(auth()->user()->is_admin != 'tamu')                         
                <a href="/perkes/kd/{{$kd->id}}/edit" style="width:100%;margin-top:10px" class="btn btn-warning">
                    Edit
                </a>                    
                @endif
                <a href="{{route('kd')}}" style="width:100%;margin-top:10px" class="btn btn-light">
                    Kembali
                </a>                                    
            </div>       
        </div> 
    </div>              
</div>    
@endsection
