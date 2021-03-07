@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('perkes')}}">Perawatan & Kesehatan</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('ko')}}">Ketersediaan Obat</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('ko_out')}}">Obat Keluar</a> 
</li>
@endsection

@section('content')
@if (session('status'))            
<script> 
    window.setTimeout(function() { 
        $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ 
            $(this).remove(); 
        }); 
    }, 3000); 
</script> 

<div class="alert alert-success" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> 
</div> 
@endif      
<h3 style="margin-bottom:20px">Ketersedian Obat</h3>
<div class="row">
    <div class="col-sm-12 col-xl-6 col-md-6" style="margin-bottom:20px">           
        <a href="{{route('ko')}}" style="width:100%;height:50px;" class="btn btn-success">           
            <div style="width:100%">
            
                <h5 style="margin-top:5px"><i class="cui cui-arrow-thick-from-bottom" style="margin-right:10px"></i>Lihat Obat Masuk</h5>
            </div>
        </a>
    </div>
    <div class="col-sm-12 col-xl-6 col-md-6" style="margin-bottom:20px">                  
        <a href="{{route('ko_out')}}" style="width:100%;height:50px;" class="btn btn-danger">          
            <div style="width:100%">
                <h5 style="margin-top:5px"><i class="cui cui-arrow-thick-from-top" style="margin-right:10px"></i>Lihat Obat Keluar</h5>
            </div>
        </a>
    </div>
</div>
@if(auth()->user()->is_admin == 'user')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xl-10 col-md-9 col-sm-12 ">
                <h3 style="margin-bottom:20px"><b>Tambah Riwayat Obat Keluar</b> </h3>                       
            </div>                       
            <form class="col-xl-2 col-md-3  col-sm-12" >
                <button class="btn btn-dark" style="width:100%" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="cui cui-plus"></i>
                    Tambah Data
                </button> 
            </form>
        </div>        
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form method="POST" action="{{route('store_ko_out')}}">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-12">                           
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <small> 
                                        Nama Obat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </small> 
                                    </span>
                                </div>
                                <select class="form-control" id="exampleFormControlSelect1" name="nama_obat" >                    
                                @foreach($ko as $du)         
                                    <option value="{{$du->id}}">{{$du->nama_obat}}</option>
                                @endforeach           
                                </select>
                            </div>                                              
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <small> 
                                        Tgl. Obat Keluar
                                        </small> 
                                    </span>
                                </div>
                                <select class="form-control" id="exampleFormControlSelect1" name="tanggal" >                    
                                    <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
                                    <option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
                                    <option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
                                    <option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
                                    <option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
                                    <option>26</option><option>27</option><option>28</option><option>29</option><option>30</option>
                                    <option>31</option>
                                </select>
                                <select class="form-control" id="exampleFormControlSelect1" name="bulan">       
                                    <option>Januari</option><option>Februari</option><option>Maret</option><option>April</option><option>Mei</option>
                                    <option>Juni</option><option>Juli</option><option>Agustus</option><option>September</option><option>Oktober</option>
                                    <option>November</option><option>Desember</option>
                                </select>
                                <select class="form-control" id="exampleFormControlSelect1" name="tahun">       
                                    <option>2025</option><option>2024</option><option>2013</option><option>2021</option><option>2021</option>
                                    <option>2020</option><option>2019</option><option>2018</option><option>2017</option><option>2018</option>
                                    <option>2017</option><option>2016</option><option>2015</option><option>2014</option><option>2013</option>
                                    <option>2012</option><option>2011</option><option>2010</option><option>2009</option><option>2008</option>
                                    <option>2007</option><option>2006</option><option>2005</option><option>2004</option><option>2003</option>
                                    <option>2002</option><option>2001</option><option>2000</option><option>1999</option><option>1998</option>
                                </select>
                            </div>        
                            <div class="input-group mb-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <small> 
                                        Kuantitas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </small> 
                                        </span>
                                    </div>
                                    <input id="kuantitas" type="text" placeholder="Kuantitas" class="form-control" name="kuantitas" required autocomplete="kuantitas" autofocus>                                          
                                </div>    
                            </div>                             
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="4"></textarea>
                            </div>                                                                        
                        </div>
                    </div>                         
                    <div class="row">
                        <div class="col">
                            <a href="{{route('perkes')}}" class="btn btn-block btn-light">
                                Kembali
                            </a>                                        
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-block btn-success">
                                Tambah
                            </button>                    
                        </div>
                    </div>          
                </form>    
            </div>
        </div>                       
        
    </div>              
</div>   
@endif 
<div class="card">
    <div class="card-body">        
        <div class="row" style="margin-top:10px">
            <div class="col-xl-7 col-md-6 col-sm-12 ">
                <h3 style="margin-bottom:20px"><b>Riwayat Obat Keluar</b> </h3>                       
            </div>                       
            <form class="col-xl-3 col-md-3  col-sm-12">
                <input type="text"  style="margin-bottom:20px" name="cari"  class="form-control" placeholder="Cari Nama Obat"> <a class="srh-btn"><i class="ti-search"></i></a>
            </form>
            <div  class="col-xl-2 col-md-3 col-sm-12 ">      
                <a href="{{route('export_excel_ko_out')}}" class="btn btn-success btn-small" style="width:100%;margin-bottom:20px" target="_blank">Rekab</a>            
            </div>
        </div>
        <table class="table table-hover table-striped table-responsive-md">
            <thead>
                <tr class="teks">
                <th scope="col" style="width:5%">
                    <center>
                        No
                    </center>
                    </th>
                    <th scope="col" style="width:30%">Nama Obat</th>
                    <th scope="col" style="width:25%">Tgl. Obat Keluar</th>
                    <th scope="col" style="width:20%">Kuantitas</th>
                    <th scope="col" style="width:20%">Dibuat</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
                $no =count($ko_out);
            ?>               
                @foreach($ko_out as $du)                         
                <tr class="teks">
                    <th>
                    <center>                        
                        {{$no--}}                 
                    </center>
                    </th>
                    <td>                  
                    {{$du->nama_obat}}                    
                    </td>
                    <td>{{$du->tanggal}}/{{$du->bulan}}/{{$du->tahun}}</td>
                    <td>{{$du->kuantitas}} Buah</td>
                    <td>{{$du->created_at}}</td>
                   
                </tr>
                @endforeach            
            </tbody>
        </table>    
        @if(auth()->user()->is_admin == 'user')
        @endif
    </div>
</div>
@endsection
