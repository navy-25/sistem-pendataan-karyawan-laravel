@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('pimpinan')}}">Pimpinan</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('pws')}}">Pengawasan</a> 
</li>
<li class="breadcrumb-item">
    Lihat Pengawasan
</li>
@endsection

<style>
    .lingkaran{
        width: 130px;
        height: 150px;
        background: #414141; 
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100%;
        margin-bottom : 20px;
        margin-top : 5px;
    }
</style>

@section('content')
<div class="card">
    <div class="card-body">       
     
        <div class="row">
            <div class="col-xl-3  col-md-4">
                <center> 
                    <img  src="{{$pws->getFoto()}}"style="margin-bottom:10px" class="lingkaran" alt="">   <br>
                </center>
            </div>
            <div class="col-xl-6  col-md-8">
                <dl class="row">
                    <dt class="col-xl-3 col-md-5 col-sm-12">Tgl Lapor </dt>
                    <dd class="col-xl-9 col-md-9 col-sm-12">{{$pws->tanggal}} - {{$pws->bulan}} - {{$pws->tahun}}</dd>

                    <dt class="col-xl-3 col-md-5 col-sm-12">Nama Pegawai </dt>
                    <dd class="col-xl-9 col-md-9 col-sm-12">{{$pws->nama_pegawai}} </dd>

                    <dt class="col-xl-3 col-md-5 col-sm-12">Jam Mulai </dt>
                    <dd class="col-xl-9 col-md-9 col-sm-12">{{$pws->jam_mulai}} : {{$pws->menit_mulai}} WIB</dd>

                    <dt class="col-xl-3 col-md-5 col-sm-12">Jam Selesai </dt>
                    <dd class="col-xl-9 col-md-9 col-sm-12">{{$pws->jam_selesai}} : {{$pws->menit_selesai}} WIB</dd>

                    <dt class="col-xl-3 col-md-5 col-sm-12">Kegiatan </dt>
                    <dd class="col-xl-9 col-md-9 col-sm-12">{{$pws->kegiatan}} </dd>

                    <dt class="col-xl-3 col-md-5 col-sm-12">Hasil Kegiatan </dt>
                    <dd class="col-xl-9 col-md-9 col-sm-12">{{$pws->hasil_kegiatan}}</dd>

                </dl>        
            </div>           
            <div class="col-xl-3 col-md-12">                
                @if(auth()->user()->is_admin != 'tamu')               
                <a href="/pimpinan/pws/{{$pws->id}}/edit" style="width:100%;margin-top:10px" class="btn btn-warning">
                    Edit
                </a>                    
                @endif
                <button type="button"  style="width:100%;margin-top:10px" class="btn btn-light"  data-toggle="modal" data-target="#modalfoto">Lihat Foto</button>
                <a href="{{route('pws')}}" style="width:100%;margin-top:10px" class="btn btn-light">
                    Kembali
                </a>                                    
            </div>       
        </div> 
    </div>              
</div>    
<!-- Modal -->
<div class="modal fade" id="modalfoto" tabindex="-1" role="dialog" aria-labelledby="modalfotoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalfotoLabel">Foto {{$pws->nama_deteni}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if($pws->foto == null)
            <img src="{{ url('images/default.png') }}" width="100%" alt="">        
        @else
            <img src="{{ $pws->getFoto() }}" width="100%" alt="">
        @endif
      </div>     
    </div>
  </div>
</div>
@endsection
