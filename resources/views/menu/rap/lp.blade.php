@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('rap')}}">Registrasi Administrasi & Pelaporan</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('lp')}}">Lapor Pengungsi</a> 
</li>
@endsection

<style>
    .lingkaran{
        width: 42px;
        height: 50px;
        background: white; 
        /* border-radius: 100%; */
        /* background-image : url("/core-ui-master/src/img/avatars/5.jpg"); */
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100%;
    }
    /* upload image */
    .file-upload {
    background-color: #ffffff;
    width: 100%;
    margin: 0 auto;
    padding-top:  20px;
    }

    .file-upload-btn {
    width: 100%;
    height: 105px;
    margin: 0;
    color: #fff;
    background: #1FB264;
    border: none;
    padding: 3px;
    border-radius: 4px;
    /* border-bottom: 4px solid #15824B; */
    transition: all .2s ease;
    outline: none;
    /* text-transform: uppercase; */
    font-weight: 400;
    }

    .file-upload-btn:hover {
    background: #1AA059;
    color: #ffffff;
    transition: all .2s ease;
    cursor: pointer;
    }

    .file-upload-btn:active {
    border: 0;
    transition: all .2s ease;
    }

    .file-upload-content {
    display: none;
    text-align: center;
    }

    .file-upload-input {
    position: absolute;
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    outline: none;
    opacity: 0;
    cursor: pointer;
    }

    .image-upload-wrap {
    margin-top: 20px;
    border: 3px dashed #1FB264;
    position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {
    background-color: #1FB264;
    border: 3px dashed #ffffff;
    }

    .image-title-wrap {
    padding: 0 5px 5px 5px;
    color: #222;
    }

    .drag-text {
    text-align: center;
    }

    .drag-text h3 {
    font-weight: 50;
    /* text-transform: uppercase; */
    color: #15824B;
    padding: 30px 0;
    }

    .file-upload-image {
    max-height: 200px;
    max-width: 200px;
    margin: auto;
    padding: 10px;
    }

    .remove-image {
    width: 200px;
    margin: 0;
    color: #fff;
    background: #cd4535;
    border: none;
    padding: 4px;
    border-radius: 4px;
    border-bottom: 4px solid #b02818;
    transition: all .2s ease;
    outline: none;
    /* text-transform: uppercase; */
    font-weight: 300;
    }

    .remove-image:hover {
    background: #c13b2a;
    color: #ffffff;
    transition: all .2s ease;
    cursor: pointer;
    }

    .remove-image:active {
    border: 0;
    transition: all .2s ease;
    }

    /* pop hover image */
    .thumbnail{
    position: relative;
    z-index: 0;
    }
    .thumbnail:hover{
    background-color: transparent;
    z-index: 50;
    }
    .thumbnail span{
    position: absolute;
    background-color: #fff;
    left: -1000px;
    border: 5px solid #ccc;
    visibility: hidden;
    color: black;
    text-decoration: none;
    }
    .thumbnail span img{
    border-width: 0;
    padding: 5px;
    }
    .thumbnail:hover span{
    visibility: visible;
    top: -200px;
    left: 20px;
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
<div class="alert alert-success" role="alert">
    {{session('gagal')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> 
</div> 
@endif 
<?php
    date_default_timezone_set('Asia/Jakarta');    
    $tanggal= mktime(date("m"),date("d"),date("Y"));
    $newTanggal = date("d-M-Y", $tanggal);
    $due = date("d F", $tanggal);
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
?>                  
@if(auth()->user()->is_admin != 'tamu')     
<div class="card">
    <div class="card-body">     
        <div class="row" style="margin-top:10px">
            <div class="col-xl-8 col-md-8 col-sm-12 ">
                <h3 style="margin-bottom:20px"><b>Lapor Pengungsi</b> </h3>                                          
            </div>
            <div class="col-xl-4 col-md-4 col-sm-12 ">
                <div class="alert alert-danger">
                    <center>
                        <i class="cui cui-alarm"></i> <span  id="waktu"></span>                
                    </center>
                </div>
                <script>
                    // var Hari = new Date().getDay();
                    var Tanggal = new Date().getDate();
                    var Bulan = new Date().getMonth();
                    var Tahun = new Date().getFullYear();                
                    if(Bulan == 0){Bulan = "Jan";
                    }else if(Bulan == 1){Bulan = "Feb";
                    }else if(Bulan == 2){Bulan = "Mar";
                    }else if(Bulan == 3){Bulan = "Apr";
                    }else if(Bulan == 4){Bulan = "May";
                    }else if(Bulan == 5){Bulan = "Jun";
                    }else if(Bulan == 6){Bulan = "Jul";
                    }else if(Bulan == 7){Bulan = "Aug";
                    }else if(Bulan == 8){Bulan = "Sep";
                    }else if(Bulan == 9){Bulan = "Oct";
                    }else if(Bulan == 10){Bulan = "Nov";
                    }else if(Bulan == 11){Bulan = "Dec";
                    }         
                    var countDownDate = new Date(Bulan+" "+Tanggal+", "+Tahun+" 23:59:59").getTime();
                    var x = setInterval(function() {
                        var now = new Date().getTime();                
                        var distance = countDownDate - now;                
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        document.getElementById("waktu").innerHTML ="Due : " 
                        // + days + "Hari " 
                        + hours + "Jam "+ minutes + "Menit " + seconds + "Detik ";                
                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementById("waktu").innerHTML = "Waktu Absen Habis !";
                        }
                    }, 1000);
                </script>
            </div>
        </div>
        <div class="row" style="margin-top:10px">
            <div class="col-xl-6 col-md-7 col-sm-12 ">
                <form method="POST" action="{{ route('store_lp') }}">
                    @csrf
                    
                    <div class="input-group">
                        <label for="inputPassword" class="col-xl-4 col-md-4  col-sm-12 form-label" style="margin-bottom:10px">Hari Absen</label>
                        <div class="col-xl-8 col-md-8 col-sm-12" style="margin-bottom:10px">
                            <input type="text" placeholder="Hari" class="form-control" name="nama" value="{{ $newHari}}" readonly>                                              
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="inputPassword" class="col-xl-4 col-md-4  col-sm-12 form-label" style="margin-bottom:10px">Tanggal Absen</label>
                        <div class="col-xl-8 col-md-8 col-sm-12" style="margin-bottom:10px">
                            <input id="tanggal" type="text" placeholder="Tanggal" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ $newTanggal}}" required autocomplete="tanggal" readonly>
                            @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Absensi Sudah Sibuka !</strong>
                                </span>
                            @enderror                        
                        </div>                       
                    </div>    
                    <div class="input-group">
                        <label for="inputPassword" class="col-xl-4 col-md-4  col-sm-12 form-label" style="margin-bottom:10px">Batas Absen</label>
                        <div class="col-xl-8 col-md-8 col-sm-12" style="margin-bottom:10px">
                            <input type="text" placeholder="Hari" class="form-control"  value="{{ $newHari}}, {{$due}}, 23:59:59 WIB" readonly>                                              
                        </div>
                    </div>  
                    <div class="input-group">
                        <div class="col-xl-4 col-md-4 col-sm-12" style="margin-bottom:10px">
                            <button type="submit" class="btn btn-block btn-success" style="width:100%">
                                <i class="cui cui-https"></i> Buka Absen
                            </button>
                        </div>  
                    </div>  
                </form>    
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
            $jam=date("H:i:s");
            $jam;
        ?>                  
    </div>
</div>
@endif
<div class="card">
    <div class="card-body">        
        <div class="row" style="margin-top:10px">
            <div class="col-xl-8 col-md-7 col-sm-12 ">
            <h3 style="margin-bottom:10px"><b>Riwayat Lapor Harian</b> </h3>                       
            </div>                       
            <form class="col-xl-4 col-md-5  col-sm-12">
                <input type="text" style="margin-bottom:10px" name="cari"  class="form-control" placeholder="Cari Berdasarkan : Tgl/Bln/Thn"> <a class="srh-btn"><i class="ti-search"></i></a>
            </form>                            
        </div>
        <table class="table table-hover table-striped table-responsive-md">
            <thead>
                <tr class="teks" >
                    <th scope="col" style="width:5%">
                    <center>
                        No
                    </center>
                    </th>                  
                    <th scope="col" style="width:15%">Hari
                    <th scope="col" style="width:15%">Tanggal
                    <th scope="col" style="width:10%">Status
                    <th scope="col" style="width:55%">Action
                </tr>
            </thead>
            <tbody>
            <?php $no = count($lp);?>
                @foreach($lp as $du)                         
                <tr class="teks" >
                    <td>
                        <center>                    
                            {{$no--}}
                        </center>
                    </td>                    
                    <td>
                        <i class="cui cui-flower"  style="margin-right:10px"></i>{{$du->nama}} 
                    </td>
                    <td>
                        <i class="cui cui-calendar"  style="margin-right:10px"></i>{{$du->tanggal}} 
                    </td>
                    <td>
                        @if(auth()->user()->is_admin != 'tamu')     
                            @if($du->tanggal == $newTanggal)
                                <a href="/rap/lp/{{$du->id}}/lihat"class="btn btn-success btn-sm" style="width:100%">                        
                                    <i class="cui cui-pencil" style="margin-right:5px"></i>Edit
                                </a>
                            @elseif($du->tanggal != $newTanggal)
                                <button class="btn btn-danger btn-sm" style="width:100%">                        
                                    <i class="cui cui-x" style="margin-right:5px"></i>Kadaluarsa
                                </button>
                            @endif
                        @elseif(auth()->user()->is_admin == 'tamu')     
                            @if($du->tanggal == $newTanggal)
                                <button class="btn btn-success btn-sm" style="width:100%">                        
                                    <i class="cui cui-pencil" style="margin-right:5px"></i>Proses
                                </button>
                            @elseif($du->tanggal != $newTanggal)
                                <button class="btn btn-danger btn-sm" style="width:100%">                        
                                    <i class="cui cui-x" style="margin-right:5px"></i>Kadaluarsa
                                </button>
                            @endif
                        @endif
                    </td>
                    <td>
                        <a href="/rap/lp/{{$du->id}}/lihat_riwayat" class="btn btn-primary btn-sm">                        
                            <i class="cui cui-calendar-check" style="margin-right:5px"></i>Lihat
                        </a>
                    </td>
                </tr>
                @endforeach                           
            </tbody>
        </table>    
        
    </div>
</div>
@endsection
