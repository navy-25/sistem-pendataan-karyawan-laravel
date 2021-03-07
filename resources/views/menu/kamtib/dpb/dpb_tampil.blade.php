@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('kamtib')}}">Keamanan & Ketertiban</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('dpb')}}">Data Penghuni Blok</a> 
</li>
<li class="breadcrumb-item">
    Lihat Laporan
</li>
@endsection

<style>
    .lingkaran{
        width: 130px;
        height: 150px;
        background: #414141; 
        /* border-radius: 100%; */
        /* background-image : url("/core-ui-master/src/img/avatars/5.jpg"); */
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
                    <img  src="{{$dpb->getDokumentasi()}}"style="margin-bottom:10px" class="lingkaran" alt="">   <br>
                </center>
            </div>
            <div class="col-xl-6  col-md-8">
                <dl class="row">
                    <dt class="col-xl-3 col-md-5 col-sm-12">Tgl Lapor </dt>
                    <dd class="col-xl-9 col-md-9 col-sm-12">{{$dpb->tanggal}} - {{$dpb->bulan}} - {{$dpb->tahun}}</dd>

                    <dt class="col-xl-3 col-md-5 col-sm-12">Nama Deteni </dt>
                    <dd class="col-xl-9 col-md-9 col-sm-12">{{$dpb->nama_deteni}} </dd>

                    <dt class="col-xl-3 col-md-5 col-sm-12">Blok tinggal </dt>
                    <dd class="col-xl-9 col-md-9 col-sm-12">{{$dpb->blok}} </dd>

                    <dt class="col-xl-3 col-md-5 col-sm-12">Status </dt>
                    <dd class="col-xl-9 col-md-9 col-sm-12">{{$dpb->kasus}} </dd>

                    <dt class="col-xl-3 col-md-5 col-sm-12">Deskripsi  </dt>
                    <dd class="col-xl-9 col-md-9 col-sm-12">{{$dpb->jenis_pelanggaran}}</dd>

                </dl>        
            </div>           
            <div class="col-xl-3 col-md-12">   
                @if(auth()->user()->is_admin != 'tamu')                            
                <a href="/kamtib/dpb/{{$dpb->id}}/edit" style="width:100%;margin-top:10px" class="btn btn-warning">
                    Edit
                </a>                    
                @endif
                <button type="button"  style="width:100%;margin-top:10px" class="btn btn-light"  data-toggle="modal" data-target="#modalfoto">Lihat Foto</button>
                <a href="{{route('dpb')}}" style="width:100%;margin-top:10px" class="btn btn-light">
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
        <h5 class="modal-title" id="modalfotoLabel">Foto {{$dpb->nama_deteni}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if($dpb->foto == null)
            <img src="{{ url('images/default.png') }}" width="100%" alt="">        
        @else
            <img src="{{$dpb->getDokumentasi()}}" width="100%" alt="">
        @endif
      </div>     
    </div>
  </div>
</div>
@endsection
