@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('rap')}}">Registrasi Administrasi & Pelaporan</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('dpm')}}">Data Pengungsi Mandiri</a> 
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
        /* background-image : url("/core-ui-master/src/img/avatars/5.jpg"); */
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100%;
    }
</style>

@section('content')
<div class="card">
    <div class="card-body">       
      
        <div class="row">
            <div class="col-xl-3  col-md-4">
                <center>
                    <img  src="{{$dp->getFoto()}}"style="margin-bottom:10px" class="lingkaran" alt="">   <br>
                    <p class="btn btn-success btn-sm"  style="margin-bottom:20px;font-size:10px">Nomor Register : {{$dp->nomor_register}}</p>                        
                </center>
            </div>
            <div class="col-xl-6  col-md-8">
                <dl class="row">
                    <dt class="col-xl-5 col-md-4">Nama Pengungsi</dt>
                    <dd class="col-xl-7  col-md-8">{{$dp->nama_pengungsi}} </dd>

                    <dt class="col-xl-5 col-md-4">Tanggal Lahir</dt>
                      <?php
                          $tanggal = $dp->tanggal;
                          $newtanggal = date('d F Y', strtotime($tanggal));
                          // dd($new);
                      ?>
                      <dd class="col-xl-7 col-md-8">{{$newtanggal}}</dd>
                      <dt class="col-xl-5 col-md-4">Tahun Registrasi</dt>
                    <dd class="col-xl-7  col-md-8">{{$dp->tahun_registrasi}} </dd>
                    <dt class="col-xl-5 col-md-4">Jenis Kelamin </dt>
                    <dd class="col-xl-7  col-md-8">{{$dp->jenis_kelamin }} 
                    ( 
                    <?php
                        if($dp->jenis_kelamin=="Laki - laki"){
                            $lk = 'L';                    
                        }else if($dp->jenis_kelamin=="Perempuan"){
                            $lk = 'P';                    
                        }else{
                          $lk = '-';                    
                        }
                    ?>
                        {{$lk}}
                    ) </dd>
                                    
                    <dt class="col-xl-5 col-md-4">Alamat</dt>
                    <dd class="col-xl-7  col-md-8">{{$dp->alamat}} </dd>

                    <dt class="col-xl-5 col-md-4">Kewarganegaraan</dt>
                    <dd class="col-xl-7  col-md-8">{{$dp->kewarganegaraan}} </dd>

                    <dt class="col-xl-5 col-md-4">Dibuat pada</dt>
                    <dd class="col-xl-7  col-md-8">{{$dp->cre ated_at}} </dd>

                    <dt class="col-xl-5 col-md-4">Diupdate pada</dt>
                    <dd class="col-xl-7 col-md-8">{{$dp->updated_at}} </dd>

                </dl>        
            </div>           
            <div class="col-xl-3 col-md-12">    
                @if(auth()->user()->is_admin != 'tamu')                           
                <a href="/rap/dpm/{{$dp->id}}/edit" style="width:100%;margin-top:10px" class="btn btn-warning">
                    Edit
                </a>                    
                @endif
                <button type="button"  style="width:100%;margin-top:10px" class="btn btn-light"  data-toggle="modal" data-target="#modalfoto">Lihat Foto</button>
                <button type="button"  style="width:100%;margin-top:10px" class="btn btn-light"  data-toggle="modal" data-target="#modalbarcode">Lihat Barcode</button>
                <!-- <a href="{{route('dpm')}}" style="width:100%;margin-top:10px" class="btn btn-light">
                    Kembali
                </a>                                     -->
            </div>       
        </div> 
    </div>              
</div>    

<!-- Modal -->
<div class="modal fade" id="modalfoto" tabindex="-1" role="dialog" aria-labelledby="modalfotoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalfotoLabel">Foto {{$dp->nama_pengungsi}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if($dp->foto == null)
            <img src="{{ url('images/default.png') }}" width="100%" alt="">        
        @else
            <img src="{{$dp->getFoto()}}" width="100%" alt="">
        @endif
      </div>     
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalbarcode" tabindex="-1" role="dialog" aria-labelledby="modalbarcodeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalbarcodeLabel">Barcode {{$dp->nama_pengungsi}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
          @if($dp->barcode == null)
              <img src="{{ url('images/empty_barcode.png') }}" width="100%" alt="">        
          @else
              <img src="{{$dp->getBarcode()}}" width="100%" alt="">
              <!-- {!! QrCode::size(350)->generate($dp->nomor_register); !!} -->
          @endif
          <small> <br> Gunakan aplikasi untuk scan barcode <br> Rekomendasi : Aplikasi Android <b> Barcode Scanner</b> </small>
        </center>
      </div>     
    </div>
  </div>
</div>

@endsection
