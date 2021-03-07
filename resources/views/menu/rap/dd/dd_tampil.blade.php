@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('rap')}}">Registrasi Administrasi & Pelaporan</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('dd')}}">Data Pengungsi</a> 
</li>
<li class="breadcrumb-item">
    Lihat Laporan
</li>
@endsection

<style>
    .lingkaran{
        width: 130px;
        height: 160px;
        background: #414141; 
        /* border-radius: 100%; */
        /* background-image : url("/core-ui-master/src/img/avatars/5.jpg"); */
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100%;
    }
</style>

@section('content')
<div class="card">
    <div class="card-body">       
        <!-- <div class="row">
            <div class="col">
                <p class="btn btn-success btn-sm">Nomor : {{$dd->no}}</p>
            </div>            
        </div> -->
        <div class="row">
            <div class="col-xl-3  col-md-4">
                <center>
                    <img  src="{{$dd->getFoto()}}"style="margin-bottom:20px" class="lingkaran" alt="">   <br>
                    <p class="btn btn-success btn-sm"  style="margin-bottom:20px;font-size:10px">Nomor : {{$dd->no_identitas}}</p>                        
                </center>
            </div>
            <div class="col-xl-6  col-md-8">
                <dl class="row">
                    <dt class="col-xl-5 col-md-4">Tanggal Masuk </dt>
                    <dd class="col-xl-7 col-md-8">{{$dd->tanggal}}-{{$dd->bulan}}-{{$dd->tahun}}</dd>

                    <dt class="col-xl-5 col-md-4">Nomor Identitas</dt>
                    <dd class="col-xl-7  col-md-8">{{$dd->no_identitas}} </dd>

                    <dt class="col-xl-5 col-md-4">Nama Deteni</dt>
                    <dd class="col-xl-7  col-md-8">{{$dd->nama_deteni}} </dd>

                    <dt class="col-xl-5 col-md-4">Jenis Kelamin </dt>
                    <dd class="col-xl-7  col-md-8">{{$dd->jenis_kelamin }} 
                    ( 
                    <?php
                        if($dd->jenis_kelamin=="Laki - laki"){
                            $lk = 'L';                    
                        }else if($dd->jenis_kelamin=="Perempuan"){
                            $lk = 'P';                    
                        }else{
                            $lk = '-';                    
                        }
                    ?>
                        {{$lk}}
                    ) </dd>

                    <dt class="col-xl-5 col-md-4">Blok Tinggal</dt>
                    <dd class="col-xl-7  col-md-8">{{$dd->blok}} </dd>                

                    <dt class="col-xl-5 col-md-4">Kewarganegaraan</dt>
                    <dd class="col-xl-7  col-md-8">{{$dd->kewarganegaraan}} </dd>
                    
                    <dt class="col-xl-5 col-md-4">Asal Kiriman</dt>
                    <dd class="col-xl-7  col-md-8">{{$dd->asal_kiriman}} </dd>

                    <dt class="col-xl-5 col-md-4">Jenis Pelanggaran</dt>
                    <dd class="col-xl-7  col-md-8">{{$dd->jenis_pelanggaran}} </dd>

                    <dt class="col-xl-5 col-md-4">Dibuat pada</dt>
                    <dd class="col-xl-7  col-md-8">{{$dd->created_at}} </dd>

                    <dt class="col-xl-5 col-md-4">Diupdate pada</dt>
                    <dd class="col-xl-7 col-md-8">{{$dd->updated_at}} </dd>

                </dl>        
            </div>           
            <div class="col-xl-3 col-md-12">     
                @if(auth()->user()->is_admin != 'tamu')               
                <a href="/rap/dd/{{$dd->id}}/edit" style="width:100%;margin-top:10px" class="btn btn-warning">
                    Edit
                </a>                    
                @endif
                <button type="button"  style="width:100%;margin-top:10px" class="btn btn-light"  data-toggle="modal" data-target="#modalfoto">Lihat Foto</button>
                <a href="{{route('dd')}}" style="width:100%;margin-top:10px" class="btn btn-block btn-light">
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
        <h5 class="modal-title" id="modalfotoLabel">Foto {{$dd->nama_deteni}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @if($dd->foto == null)
            <img src="{{ url('images/default.png') }}" width="100%" alt="">        
        @else
            <img src="{{$dd->getFoto()}}" width="100%" alt="">
        @endif
      </div>     
    </div>
  </div>
</div>

@endsection
