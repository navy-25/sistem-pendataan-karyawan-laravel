@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('pimpinan')}}">Pimpinan</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('tk')}}">Target Kinerja</a> 
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
@if(auth()->user()->is_admin != 'tamu')               
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xl-10 col-md-9 col-sm-12 ">
                <h3 style="margin-bottom:20px"><b>Buat Laporan Target Kinerja</b> </h3>                       
            </div>                       
            <form class="col-xl-2 col-md-3  col-sm-12" >
                <button class="btn btn-dark" style="width:100%" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="cui cui-plus"></i>
                    Buat Laporan
                </button> 
            </form>
        </div>        
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form method="POST" action="{{ route('store_tk') }}">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                                                                    
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <small> 
                                        Tgl. Rencana &nbsp;&nbsp;
                                        </small> 
                                    </span>
                                </div>
                                <select class="form-control" id="exampleFormControlSelect1" name="tanggal" >                    
                                    <!-- <option selected value=0>Tanggal</option> -->
                                    <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
                                    <option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
                                    <option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
                                    <option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
                                    <option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
                                    <option>26</option><option>27</option><option>28</option><option>29</option><option>30</option>
                                    <option>31</option>
                                </select>
                                <select class="form-control" id="exampleFormControlSelect1" name="bulan">       
                                    <!-- <option selected value=0>Bulan</option>              -->
                                    <option>Januari</option><option>Februari</option><option>Maret</option><option>April</option><option>Mei</option>
                                    <option>Juni</option><option>Juli</option><option>Agustus</option><option>September</option><option>Oktober</option>
                                    <option>November</option><option>Desember</option>
                                </select>
                                <select class="form-control" id="exampleFormControlSelect1" name="tahun">       
                                    <!-- <option selected value=0>Bulan</option>              -->                            
                                    <option>2020</option><option>2019</option><option>2018</option><option>2017</option><option>2018</option>
                                    <option>2017</option><option>2016</option><option>2015</option><option>2014</option><option>2013</option>
                                    <option>2012</option><option>2011</option><option>2010</option><option>2009</option><option>2008</option>
                                    <option>2007</option><option>2006</option><option>2005</option><option>2004</option><option>2003</option>
                                    <option>2002</option><option>2001</option><option>2000</option><option>1999</option><option>1998</option>
                                </select>
                                <!-- <input id="tahun" type="text" placeholder="Tahun" class="form-control" name="tahun" required autocomplete="tahun">                        -->
                            </div>          
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <small> 
                                        Nama Kegiatan
                                        </small> 
                                    </span>
                                </div>
                                <input id="nama_kegiatan" type="text" placeholder="Nama Kegiatan " class="form-control" name="nama_kegiatan" required autocomplete="nama_kegiatan">                       
                            </div>    
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <small> 
                                        Tempat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </small> 
                                    </span>
                                </div>
                                <input id="tempat" type="text" placeholder="Tempat Pelaksanaan" class="form-control" name="tempat" required autocomplete="tempat">                       
                            </div>    
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <small> 
                                        Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </small> 
                                    </span>
                                </div>
                                <select class="form-control" id="exampleFormControlSelect1" name="status" >                    
                                    <!-- <option selected value=0>Tanggal</option> -->
                                    <option>Proses</option><option>Selesai</option>
                                </select>
                            </div>       
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="form-group">            
                                <label for="exampleFormControlTextarea1">Konsep</label>
                                <textarea class="form-control" name="konsep" id="exampleFormControlTextarea1" rows="2"></textarea>
                            </div>    
                            <div class="form-group">            
                                <label for="exampleFormControlTextarea1">Dasar</label>
                                <textarea class="form-control" name="dasar" id="exampleFormControlTextarea1" rows="1"></textarea>
                            </div>     
                        </div>
                    </div>                         
                                         
                    <div class="row">
                        <div class="col">
                            <a href="{{route('pimpinan')}}" class="btn btn-block btn-light">
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
            <div class="col-xl-9 col-md-8 col-sm-12 ">
            <h3 style="margin-bottom:20px"><b>Rekapitulasi Target Kinerja</b> </h3>                       
            </div>                       
            <form class="col-xl-3 col-md-4  col-sm-12">
                <input type="text" style="margin-bottom:20px" name="cari"  class="form-control" placeholder="Cari Nama Kegiatan"> <a class="srh-btn"><i class="ti-search"></i></a>
            </form>
            <!-- <div  class="col-xl-2 col-md-3 col-sm-12 ">      
                <a href="/pimpinan/export_excel_tk" class="btn btn-success btn-small" style="width:100%;margin-bottom:20px" target="_blank">Backup to Excel</a>            
            </div>             -->
        </div>
        <table class="table table-hover  table-striped table-responsive-md">
            <thead>
                <tr class="teks" >
                    <th scope="col" style="width:5%">
                    <center>
                        No
                    </center>
                    </th>
                    <th scope="col" style="width:30%">Nama Kegiatan</th>
                    <th scope="col" style="width:20%">Tempat</th>
                    <th scope="col" style="width:30%">  
                    <center>
                        Status
                    </center></th>
                    <th scope="col" style="width:15%">
                    <center>
                        Action
                    </center>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php $no = count($tk);?>
                @foreach($tk as $du)                         
            
                <tr class="teks" >
                    <th>
                        <center>
                            {{$no--}} 
                        </center>                       
                    </th>
                    <td>{{$du->nama_kegiatan}}</td>
                    <td>{{$du->tempat}}</td>
                    <td> 
                    <center>
                        @if($du->status=='Selesai')
                            <div class="btn btn-success btn-sm" style="width:100px;font-size:10px">                    
                                {{$du->status}} 
                            </div>
                        @elseif($du->status=="Proses")
                            <div class="btn btn-warning btn-sm" style="width:100px;font-size:10px">                    
                                {{$du->status}} 
                            </div>
                        @endif</td>                    
                    </center>
                    <td>                
                    <center>                
                        <a href="/pimpinan/tk/{{$du->id}}/lihat" style="margin:2px" class="btn btn-brand btn-tumblr btn-sm">
                            <i class="cui cui-user"></i>
                        </a>
                        @if(auth()->user()->is_admin != 'tamu')               
                        <a href="/pimpinan/tk/{{$du->id}}/edit"  style="margin:2px" class="btn btn-brand btn-twitter btn-sm">
                            <i class="cui cui-pencil"></i>
                        </a>
                        <a href="/pimpinan/tk/{{$du->id}}/hapus" style="margin:2px"  class="btn btn-brand btn-html5 btn-sm" onclick="return confirm('Apakah anda yakin ?')">
                            <i class="cui cui-trash"></i>
                        </a>
                        @endif
                    </center>
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
