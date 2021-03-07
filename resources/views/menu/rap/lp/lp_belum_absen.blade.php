@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
  <a href="{{route('rap')}}">Registrasi Administrasi & Pelaporan</a> 
</li>
<li class="breadcrumb-item">
  <a href="{{route('lp')}}">Lapor Pengungsi</a> 
</li>
<li class="breadcrumb-item">
  Absen
</li>
@endsection

<style>
     .lingkaran{
        width: 40px;
        height: 50px;
        background: #414141; 
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100%;
    }
  }
</style>

@section('content')       
@if (session('status'))            
<div class="alert alert-success" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> 
</div> 
@elseif (session('gagal'))            
<div class="alert alert-danger" role="alert">
    {{session('gagal')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> 
</div> 
@endif   
<div class="card">
    <div class="card-body">     
        <div class="row" style="margin-top:10px">
            <div class="col-xl-8 col-md-8 col-sm-12 ">
                <h4 style="margin-bottom:20px"><b>Data Pengungsi yang belum Absen</b> </h4>                                          
            </div>
       
        </div>               
        <?php
            date_default_timezone_set('Asia/Jakarta');
            $hari = date("l");
            if($hari=="Sunday"){
                $newHari = "Minggu";
            }else if($hari=="Monday"){
                $newHari = "Senin";
            }else if($hari=="Tuesday"){
                $newHari = "Selasa";
            }else if($hari=="Wednesday"){
                $newHari = "Rabu";
            }else if($hari=="Thursday"){
                $newHari = "Kamis";
            }else if($hari=="Friday"){
                $newHari = "Jum'at";
            }else if($hari=="Saturday"){
                $newHari = "Minggu";
            }else{
                $newHari = $hari;
            }
            $tanggal= mktime(date("m"),date("d"),date("Y"));
            $newTanggal = date("d-M-Y", $tanggal);
            
        ?>                  
      <table class="table table-hover table-striped table-responsive-md">
            <thead>
                <tr class="teks" >
                    <th scope="col" style="width:5%">
                    <center>
                        No
                    </center>
                    </th>
                    <th scope="col" style="width:20%">Nama Pengungsi</th>
                    <th scope="col" style="width:15%">
                        Tanggal Absen
                    </th>
                    <th scope="col" style="width:15%">
                        <center>
                            Status
                        </center>
                    </th>
                    <th scope="col" style="width:10%">
                        <center>
                            Absen
                        </center>
                    </th>
                    <th scope="col" style="width:35%">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
              
         
            </tbody>
        </table>    
        <?php
            
            $dp = $dp->id;
        ?>
        {{$riwayat_lapor->tanggal}}
        @if(auth()->user()->is_admin != 'tamu')     
        @endif
    </div>
</div>
@endsection
