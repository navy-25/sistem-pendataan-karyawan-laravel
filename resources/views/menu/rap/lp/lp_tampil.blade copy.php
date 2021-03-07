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
        /* border-radius: 100%; */
        /* background-image : url("/core-ui-master/src/img/avatars/5.jpg"); */
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100%;
    }
    /* upload image */
  }
</style>

@section('content')       
<div class="card">
    <div class="card-body">     
        <div class="row" style="margin-top:10px">
            <div class="col-xl-8 col-md-8 col-sm-12 ">
                <h3 style="margin-bottom:20px"><b>Absen Pengungsi</b> </h3>                                          
            </div>
            <div class="col-xl-4 col-md-4 col-sm-12 ">
                <div class="alert alert-danger" role="alert">
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
                <form >
                    <div class="input-group mb-3">
                        <label for="inputPassword" class="col-xl-3 col-md-12  col-sm-12 form-label" style="margin-bottom:10px">Kode Pengungsi :</label>
                        <div class="col-xl-5 col-md-6  col-sm-12" style="margin-bottom:10px">
                            <input type="text" placeholder="Kode Barcode"value="{{ old('cari') }}"class="form-control" name="cari">                                
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-12" style="margin-bottom:10px">
                          <form class="col-xl-3 col-md-4  col-sm-12">
                            <button type="submit" class="btn btn-block btn-warning"  style=";width:100%">
                                {{ __('Cari Pengungsi') }}
                            </button>
                          </form>
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
      <table class="table table-hover table-striped table-responsive-md">
            <thead>
                <tr class="teks" >
                    <th scope="col" style="width:5%">
                    <center>
                        No
                    </center>
                    </th>
                    <th scope="col" style="width:10%">
                    <center>
                        Foto
                    </center></th>
                    <th scope="col" style="width:15%">Nama Pengungsi</th>
                    <th scope="col" style="width:50%">
                        L/P
                    </th>
                    <th scope="col" style="width:20%">
                        <center>                    
                            Action
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php $no = count($dp);?>
                @foreach($dp as $du)                         
                <tr class="teks" >
                    <th>
                        <center>                    
                            {{$no--}}
                        </center>
                    </th>
                    <th>
                        <center>
                            <img  src="{{$du->getFoto()}}" class="lingkaran" alt="">                                    
                        </center>
                    </th>
                    <td>{{$du->nama_pengungsi}}</td>                   
                    <td>
                        <?php
                            $jk_old = $du->jenis_kelamin;
                            if($jk_old=='Laki - laki'){
                                $jk = 'L';
                            }else if($jk_old=='Perempuan'){
                                $jk = 'P';
                            }
                        ?>  
                        {{$jk}}
                    </td>     
                    <td>                
                        <center>                                                    
                            @if(auth()->user()->is_admin != 'tamu')    
                              @foreach( $du->lapor as $lapor)      
                                                 
                                @if( $lapor->lapor !='Sudah')
                                  <form method="POST" action="/rap/lp/{{$du->id}}/absen">
                                    @csrf
                                    <button type="submit" style="margin:1px"class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ?')"> 
                                        Absen Sekarang
                                    </button>   
                                  </form>          
                                @elseif( $lapor->lapor =='Sudah')
                                  <button style="margin:1px"class="btn btn-success btn-sm">
                                      <i class="cui cui-check"></i>Sudah Absen
                                  </button>                           
                                @endif
                              @endforeach

                            @endif
                        </center>                     
                    </td>
                </tr>
                @endforeach  
            </tbody>
        </table>    
        @if(auth()->user()->is_admin != 'tamu')     
        {{$dp->links()}}            
        @endif
    </div>
</div>
@endsection
