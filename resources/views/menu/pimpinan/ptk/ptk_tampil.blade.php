@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('pimpinan')}}">Pimpinan</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('ptk')}}">Protokoler</a> 
</li>
<li class="breadcrumb-item">
    Lihat Protokoler
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">              
        <div class="row">           
            <div class="col-xl-5  col-md-8">
            
                <dl class="row">
                    <dt class="col-sm-5">Tgl. Pengawalan </dt>
                    <dd class="col-sm-7"> {{$ptk->tanggal}}-{{$ptk->bulan}}-{{$ptk->tahun}}</dd>

                    <dt class="col-sm-5">Nama Petugas</dt>
                    <dd class="col-sm-7"> {{$ptk->nama_kegiatan}} </dd>

                    <dt class="col-sm-5">Tempat Pelaksanaan</dt>
                    <dd class="col-sm-7"> {{$ptk->tempat}} </dd>

                    <dt class="col-sm-5">Penanggung Jawab</dt>
                    <dd class="col-sm-7"> {{$ptk->penanggung_jawab}} </dd>

                    <dt class="col-sm-5">Status</dt>
                    <dd class="col-sm-7"> 
                        @if($ptk->status=='Selesai')
                            <div class="btn btn-success btn-sm" style="width:100px;font-size:10px">                    
                                {{$ptk->status}} 
                            </div>
                        @elseif($ptk->status=="Proses")
                            <div class="btn btn-warning btn-sm" style="width:100px;font-size:10px">                    
                                {{$ptk->status}} 
                            </div>
                        @endif
                    </dd>

                    <dt class="col-sm-5">Dibuat pada</dt>
                    <dd class="col-sm-7"> {{$ptk->created_at}} </dd>

                    <dt class="col-sm-5">Diupdate pada</dt>
                    <dd class="col-sm-7"> {{$ptk->updated_at}} </dd>

                </dl>       
            </div>     
            <div class="col-xl-4  col-md-4">
                <dl class="row">
                    <dt class="col-sm-12">Persiapan  </dt>
                    <dd class="col-sm-12">{{$ptk->persiapan}}</dd>
                </dl>       
            </div>      
            <div class="col-xl-3 col-md-12">    
                @if(auth()->user()->is_admin != 'tamu')                           
                <a href="/pimpinan/ptk/{{$ptk->id}}/edit" style="width:100%;margin-top:10px" class="btn btn-warning">
                    Edit
                </a>                    
                @endif
                <a href="{{route('ptk')}}" style="width:100%;margin-top:10px" class="btn btn-light">
                    Kembali
                </a>                                    
            </div>       
        </div> 
    </div>              
</div>    
@endsection
