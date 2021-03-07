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
<div class="card">
    <div class="card-body">       
        <div class="row">
            <div class="col">
                <h3 style="margin-bottom:20px"><b>Edit Data Pengungsi Mandiri</b></h3>                       
            </div>           
        </div>
        <form method="POST" action="/rap/dpm/{{$dp->id}}/update" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <small> 
                                No Unchcr &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </small> 
                            </span>
                        </div>
                    <input id="no_unchcr" value="{{$dp->no_unchcr}}" type="text" placeholder="No Unchcr" class="form-control" name="no_unchcr" required autocomplete="no_unchcr">                       
                    </div>                      
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <small> 
                                Tahun Regis &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </small> 
                            </span>
                        </div>
                        <input id="tahun_registrasi" value="{{$dp->tahun_registrasi}}" type="text" placeholder="Tahun Registrasi" class="form-control" name="tahun_registrasi" required autocomplete="tahun_registrasi">                       
                    </div>                           
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <small> 
                                Nama Pengungsi &nbsp; 
                                </small> 
                            </span>
                        </div>
                        <input id="nama_pengungsi" type="text" value="{{$dp->nama_pengungsi}}" placeholder="Nama Pengungsi" class="form-control" name="nama_pengungsi" required autocomplete="nama_pengungsi">                       
                    </div>                      
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <small> 
                                Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                </small> 
                            </span>
                        </div>
                        <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin" >                    
                            <option selected>{{$dp->jenis_kelamin}}</option>
                            <option>Laki - laki</option><option>Perempuan</option>
                        </select>
                    </div>   
                                                        
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">                    
                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <small> 
                            Alamat Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </small> 
                            </span>
                        </div>
                        <input id="alamat" type="text" value="{{$dp->alamat}}" placeholder="Alamat Lengkap" class="form-control" name="alamat" required autocomplete="alamat">                       
                    </div>   
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <small> 
                            Kewarganegaraan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </small> 
                            </span>
                        </div>
                        <select class="form-control" id="exampleFormControlSelect1" name="kewarganegaraan">         
                            <option selected >{{$dp->kewarganegaraan}} </option>           
                            <option>Afganistan</option><option>Iran</option><option>Irak</option><option>Suriah</option><option>Palestina</option><option>Myanmar</option>
                            <option>Eritrea</option><option>Sudan</option><option>Pakistan</option><option>Srilanka</option><option>Somalia</option>
                            <option>Ethiopia</option>
                        </select>                                
                    </div>                                         
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <small> 
                                Tanggal Masuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </small> 
                            </span>
                        </div>
                        <input id="tanggal" type="date" placeholder="Tanggal" class="form-control" name="tanggal" value="{{$dp->tanggal}}" required autocomplete="tangaal">                       
                        <!-- <select class="form-control" id="exampleFormControlSelect1" name="tanggal" >                    
                            <option selected > {{$dp->tanggal}} </option>
                            <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
                            <option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
                            <option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
                            <option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
                            <option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
                            <option>26</option><option>27</option><option>28</option><option>29</option><option>30</option>
                            <option>31</option>
                        </select>
                        <select class="form-control" id="exampleFormControlSelect1" name="bulan">       
                            <option selected> {{$dp->bulan}}</option>             
                            <option>Januari</option><option>Februari</option><option>Maret</option><option>April</option><option>Mei</option>
                            <option>Juni</option><option>Juli</option><option>Agustus</option><option>September</option><option>Oktober</option>
                            <option>November</option><option>Desember</option>
                        </select>
                        <select class="form-control" id="exampleFormControlSelect1" name="tahun">       
                            <option selected > {{$dp->tahun}}</option>                                         
                            <option>2020</option><option>2019</option><option>2018</option><option>2017</option><option>2018</option>
                            <option>2017</option><option>2016</option><option>2015</option><option>2014</option><option>2013</option>
                            <option>2012</option><option>2011</option><option>2010</option><option>2009</option><option>2008</option>
                            <option>2007</option><option>2006</option><option>2005</option><option>2004</option><option>2003</option>
                            <option>2002</option><option>2001</option><option>2000</option><option>1999</option><option>1998</option>
                        </select> -->
                    </div>   
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-file-container">  
                                <input class="input-file" name="foto" id="my-file" type="file">
                                <label tabindex="0" for="my-file" class="input-file-trigger">Upload Foto Pengungsi</label>
                            </div>
                        </div>                            
                    </div>                          
                </div>
            </div>                                                         
            <div class="row" >
                <div class="col">
                    <a href="{{route('dpm')}}" class="btn btn-block btn-light">
                        Kembali
                    </a>                                        
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-block btn-warning">
                        Simpan
                    </button>                    
                </div>
            </div>          
        </form>               
    </div>              
</div>   
@endsection
