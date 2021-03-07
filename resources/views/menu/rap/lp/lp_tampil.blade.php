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
                <h3 style="margin-bottom:20px"><b>Absen Pengungsi</b> </h3>                                          
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
            <div class="col-xl-6 col-md-6 col-sm-12 ">
                <form >
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
                    <div class="input-group">
                        <label for="inputPassword" class="col-xl-4 col-md-4  col-sm-12 form-label" style="margin-bottom:10px">Hari Absen</label>
                        <div class="col-xl-8 col-md-8 col-sm-12" style="margin-bottom:10px">
                            <input type="text" placeholder="Hari" class="form-control"  value="{{ $newHari}}" readonly>                                              
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="inputPassword" class="col-xl-4 col-md-4  col-sm-12 form-label" style="margin-bottom:10px">Tanggal Absen</label>
                        <div class="col-xl-8 col-md-8 col-sm-12" style="margin-bottom:10px">
                            <input type="text" placeholder="Tanggal" class="form-control" value="{{ $newTanggal}}" required autocomplete="tanggal" readonly>
                        </div>                       
                    </div>    
                    <div class="input-group">
                        <label for="inputPassword" class="col-xl-4 col-md-4  col-sm-12 form-label" style="margin-bottom:10px">Batas Absen</label>
                        <div class="col-xl-8 col-md-8 col-sm-12" style="margin-bottom:10px">
                            <input type="text" placeholder="Hari" class="form-control"  value="{{ $newHari}}, {{$due}}, 23:59:59 WIB" readonly>                                              
                        </div>
                    </div>                    
                </form>    
            </div>      
            <div class="col-xl-6 col-md-6 col-sm-12 ">
                <div class="row"> 
                  <form action="{{route('store_absen')}}" method="POST">
                      @csrf
                      <div class="input-group mb-3">
                          <label for="inputPassword" class="col-xl-3 col-md-12  col-sm-12 form-label" style="margin-bottom:10px">Kode Pengungsi :</label>
                          <div class="col-xl-5 col-md-6  col-sm-12" style="margin-bottom:10px">
                              <input type="text" placeholder="Kode Barcode" value="{{ old('code') }}"class="form-control  @error('code') is-invalid @enderror" name="code">                                
                              @error('code')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>Pengungsi Sudah diabsen !</strong>
                                  </span>
                              @enderror              
                          </div>
                          <div class="col-xl-4 col-md-6 col-sm-12" style="margin-bottom:10px">
                            <form class="col-xl-3 col-md-4  col-sm-12" >
                              <button type="submit" class="btn btn-block btn-warning"  style=";width:100%">
                                  {{ __('Absen Sekarang') }}
                              </button>
                            </form>
                          </div>
                      </div>      
                  </form>
                </div>
                <div class="row" style="margin-bottom:20px"> 
                    <?php
                        $dp = \App\dp_rap::all();
                        $dpm = \App\dpm_rap::all();
                        $count_dp = count($dp);
                        $count_dpm = count($dpm);
                        $jumlah = $count_dp + $count_dpm;
                        $absen = count($lp);
                        $sisa = $jumlah - $absen;
                    ?>
                    @if($sisa == 0)
                        <div class="col-12">
                            <div class="alert alert-success">
                                <center>
                                    <i class="cui cui-check" style="margin-right:10px;width:100%"></i>Pengungsi Lengkap (Total : {{$jumlah}} Pengungsi)
                                </center>
                            </div>
                        </div>
                    @else
                        <div class="col-4">
                            <small>Jumlah Pengungsi : {{$jumlah}}</small>
                        </div>
                        <div class="col-4">
                            <small>Sudah Absen : {{$absen}}</small>
                        </div>
                        <div class="col-4">
                            <small>Belum Absen : {{$sisa}}</small>
                            <!-- <a href="{{route('belum_absen')}}" class="btn btn-primary btn-small">
                                lihat
                            </a> -->


                        </div>
                    @endif
                </div>
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
              
            <?php 
                $no = count($lp);
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
                        <center>
                            @if($du->status == 'Pengungsi Mandiri')
                                <button class="btn btn-warning btn-sm" style="width:100%">
                                    {{$du->status}}
                                </button>
                            @elseif($du->status == 'Pengungsi')
                                <button class="btn btn-dark btn-sm" style="width:100%">
                                    {{$du->status}}
                                </button>
                            @endif
                        </center>
                    </td>      
                    <td>                
                        @if(auth()->user()->is_admin != 'tamu')    
                          @if($du->lapor =='Sudah')                            
                              <button class="btn btn-success btn-sm">
                                  <i class="cui cui-check"  style="margin-right:5px"></i>Diterima
                              </button>                           
                          @endif
                        @endif
                    </td>
                    <td>
                        <a href="/rap/lp/{{$du->id}}/hapus" class="btn btn-danger btn-sm">                        
                            <i class="cui cui-trash" style="margin-right:5px"></i>Batal
                        </a>
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
