@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('rap')}}">Registrasi Administrasi & Pelaporan</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('lp')}}">Lapor Pengungsi</a> 
</li>
<li class="breadcrumb-item">
    Lihat Riwayat Laporan
</li>
@endsection

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

<div class="card">
    <div class="card-body">        
        <div class="row" style="margin-top:10px">
            <div class="col-xl-8 col-md-7 col-sm-12 ">
            <h3 style="margin-bottom:10px"><b>Riwayat Lapor Hari {{$lp_Master->nama}}, {{$lp_Master->tanggal}}</b> </h3>                       
            </div>                       
            <form class="col-xl-4 col-md-5  col-sm-12">
                <input type="text" style="margin-bottom:10px" name="cari"  class="form-control" placeholder="Cari Berdasarkan : Tgl/Bln/Thn"> <a class="srh-btn"><i class="ti-search"></i></a>
            </form>                            
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
                    @if(auth()->user()->is_admin != 'tamu')    
                    <th scope="col" style="width:60%">
                        Status
                    </th>
                    @endif
            </thead>
            <tbody>

              
            <?php $no = count($lp);
            ?>
                @foreach($lp as $du)                         
                <tr class="teks" >
                    <th>
                        <center>                    
                            {{$no--}}
                        </center>
                    </th>                  
                    <td>
                    <?php
                        // dd($du->id);
                        if($du->dp_rap_id == null){
                            $id = $du->dpm_rap_id;
                            $cek = 1;
                        }elseif($du->dpm_rap_id == null){
                            $id = $du->dp_rap_id;
                            $cek = 2;
                        }
                        // dd($id);
                    ?>
                    @if($cek==1)
                        <a href="/rap/dpm/{{$id}}/lihat">                
                    @elseif($cek==2)
                        <a href="/rap/dp/{{$id}}/lihat">                
                    @endif
                    <i class="cui cui-people"  style="margin-right:10px"></i>{{$du->nama_pengungsi}}</td>         
                    </a>
                    <td><i class="cui cui-calendar"  style="margin-right:10px"></i>{{$du->tanggal}}</td>                   
                    <td>                
                        @if(auth()->user()->is_admin != 'tamu')    
                          @if($du->lapor =='Sudah')                            
                              <button class="btn btn-success btn-sm">
                                  <i class="cui cui-check"  style="margin-right:5px"></i>Sudah Absen
                              </button>                           
                          @else  
                          @endif
                        @endif
                    </td>
                   
                </tr>
                @endforeach  

            </tbody>
        </table>    
        @if(auth()->user()->is_admin != 'tamu')     
        @endif
    </div>
</div>
@endsection
