@extends('layouts.dashboard')

@section('breadcump')
@if(auth()->user()->is_admin == 'user')
<li class="breadcrumb-item">
    <a href="{{route('kamtib')}}">Keamanan & Ketertiban</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('lpj')}}">Lapor Petugas Jaga</a> 
</li>
<li class="breadcrumb-item">
    Lihat Laporan
</li>
@elseif(auth()->user()->is_admin == 'admin' )
<li class="breadcrumb-item">
    <a href="{{route('home')}}">Beranda</a> 
</li>
<li class="breadcrumb-item">
    Lihat Laporan Petugas Jaga
</li>
@endif
@endsection

@section('content')
<div class="card">
    <div class="card-body">              
        <div class="row">           
            <div class="col-xl-4  col-md-8">
            
                <dl class="row">
                    <dt class="col-sm-5">Tgl. Pengawalan </dt>
                    <dd class="col-sm-7"> {{$lpj->tanggal}}-{{$lpj->bulan}}-{{$lpj->tahun}}</dd>

                    <dt class="col-sm-5">Nama Petugas</dt>
                    <dd class="col-sm-7"> {{$lpj->nama_petugas}} </dd>

                    <dt class="col-sm-5">Waktu Jaga</dt>
                    <dd class="col-sm-7"> 
                        <?php
                            $a = $lpj->jam_mulai;
                            $b = $lpj->menit_mulai;
                            $c = $lpj->jam_selesai;
                            $d = $lpj->menit_selesai;
                            if($a>=0 && $b>=0 && $c>=0 && $d>=0 ){
                                if($a<=$c){
                                    $jam = $c - $a;
                                    $menit = $d - $b;
                                    $jumlah = ($jam * 60) + $menit;
                                }else if($a>=$c){
                                    $jam_over_a = 24 - $a;
                                    $menit = $d - $b;
                                    $jumlah = ($jam_over_a * 60) + $menit + ($c * 60) ;
                                }                                
                            }else{
                                $jumlah = "Error !";
                            }
                        ?>                     
                        {{$lpj->jam_mulai}}:{{$lpj->menit_mulai}} WIB s/d {{$lpj->jam_selesai}}:{{$lpj->menit_selesai}} WIB <br>Durasi Jaga : {{$jumlah}} Menit
                    </dd>

                    <dt class="col-sm-5">Dibuat pada</dt>
                    <dd class="col-sm-7"> {{$lpj->created_at}} </dd>

                    <dt class="col-sm-5">Diupdate pada</dt>
                    <dd class="col-sm-7"> {{$lpj->updated_at}} </dd>

                </dl>       
            </div>     
            <div class="col-xl-5  col-md-4">
                <dl class="row">
                    <dt class="col-sm-12">Deskripsi  </dt>
                    <dd class="col-sm-12">{{$lpj->deskripsi}}</dd>
                    
                    <dt class="col-sm-12">Catatan  </dt>
                    <dd class="col-sm-12">{{$lpj->catatan}}</dd>
                </dl>       
            </div>      
            <div class="col-xl-3 col-md-12">                
                @if(auth()->user()->is_admin == 'user')               
                    <a href="/kamtib/lpj/{{$lpj->id}}/edit" style="width:100%;margin-top:10px" class="btn btn-warning">
                        Edit
                    </a>                    
                @endif
                @if(auth()->user()->is_admin != 'admin')               
                    <a href="{{route('lpj')}}" style="width:100%;margin-top:10px" class="btn btn-light">
                        Kembali
                    </a>       
                @endif            
                @if(auth()->user()->is_admin == 'admin')               
                    <a href="{{route('home')}}" style="width:100%;margin-top:10px" class="btn btn-light">
                        Kembali
                    </a>       
                    <a href="/home/{{$lpj->id}}/catatan_admin" style="width:100%;margin-top:10px" class="btn btn-warning">
                        Buat Catatan
                    </a>
                @endif                         
            </div>       
        </div> 
    </div>              
</div>    
@endsection
