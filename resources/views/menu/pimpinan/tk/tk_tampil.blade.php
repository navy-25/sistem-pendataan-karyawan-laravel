@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('kamtib')}}">Keamanan & Ketertiban</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('tk')}}">Edit Target Kinerja</a> 
</li>
<li class="breadcrumb-item">
    Lihat Target Kinerja
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">              
        <div class="row">           
            <div class="col-xl-5  col-md-8">
            
                <dl class="row">
                    <dt class="col-sm-5">Tgl. Pengawalan </dt>
                    <dd class="col-sm-7"> {{$tk->tanggal}}-{{$tk->bulan}}-{{$tk->tahun}}</dd>

                    <dt class="col-sm-5">Nama Petugas</dt>
                    <dd class="col-sm-7"> {{$tk->nama_kegiatan}} </dd>

                    <dt class="col-sm-5">Tempat Pelaksanaan</dt>
                    <dd class="col-sm-7"> {{$tk->tempat}} </dd>

                    <dt class="col-sm-5">Status</dt>
                    <dd class="col-sm-7"> 
                        @if($tk->status=='Selesai')
                            <div class="btn btn-success btn-sm" style="width:100px;font-size:10px">                    
                                {{$tk->status}} 
                            </div>
                        @elseif($tk->status=="Proses")
                            <div class="btn btn-warning btn-sm" style="width:100px;font-size:10px">                    
                                {{$tk->status}} 
                            </div>
                        @endif
                    </dd>

                    <dt class="col-sm-5">Dibuat pada</dt>
                    <dd class="col-sm-7"> {{$tk->created_at}} </dd>

                    <dt class="col-sm-5">Diupdate pada</dt>
                    <dd class="col-sm-7"> {{$tk->updated_at}} </dd>

                </dl>       
            </div>     
            <div class="col-xl-4  col-md-4">
                <dl class="row">
                    <dt class="col-sm-12">Konsep  </dt>
                    <dd class="col-sm-12">{{$tk->konsep}}</dd>

                    <dt class="col-sm-12">Dasar  </dt>
                    <dd class="col-sm-12">{{$tk->dasar}}</dd>
                </dl>       
            </div>      
            <div class="col-xl-3 col-md-12">   
                @if(auth()->user()->is_admin != 'tamu')                            
                <a href="/pimpinan/tk/{{$tk->id}}/edit" style="width:100%;margin-top:10px" class="btn btn-warning">
                    Edit
                </a>                    
                @endif
                <a href="{{route('tk')}}" style="width:100%;margin-top:10px" class="btn btn-light">
                    Kembali
                </a>                                    
            </div>       
        </div> 
    </div>              
</div>    
@endsection
