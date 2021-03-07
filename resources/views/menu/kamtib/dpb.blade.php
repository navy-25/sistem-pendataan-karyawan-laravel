@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('kamtib')}}">Keamanan & Ketertiban</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('dpb')}}">Data Penghuni Blok</a> 
</li>
@endsection

<style>
    .lingkaran{
        width: 70px;
        height: 80px;
        background: #414141; 
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
</style>

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
                <h3 style="margin-bottom:20px"><b>Buat Laporan Data Penghuni Blok</b> </h3>                       
            </div>                       
            <form class="col-xl-2 col-md-3  col-sm-12">
                <button class="btn btn-dark" style="width:100%" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="cui cui-plus"></i>
                    Buat Laporan
                </button> 
            </form>
        </div>               
        <div class="collapse" id="collapseExample">
            <form method="POST" action="{{ route('store_dpb') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <small> 
                                        Tanggal Masuk &nbsp
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
                                <option>2020</option><option>2019</option><option>2018</option><option>2017</option><option>2018</option>
                                <option>2017</option><option>2016</option><option>2015</option><option>2014</option><option>2013</option>
                                <option>2012</option><option>2011</option><option>2010</option><option>2009</option><option>2008</option>
                                <option>2007</option><option>2006</option><option>2005</option><option>2004</option><option>2003</option>
                                <option>2002</option><option>2001</option><option>2000</option><option>1999</option><option>1998</option>
                            </select>
                        </div>          
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <small> 
                                        Nama Deteni &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </small> 
                                </span>
                            </div>
                            <input id="nama_deteni" type="text" placeholder="Nama Deteni, ex : Yadi nur cahya" class="form-control" name="nama_deteni" required autocomplete="nama_deteni">                       
                        </div>    
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">                               
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <small> 
                                Blok Domisili   &nbsp;&nbsp;&nbsp;
                                </small> 
                                </span>
                            </div>
                            <select class="form-control" id="exampleFormControlSelect1" name="blok">         
                                <option>A1</option><option>A2</option><option>A3</option>
                                <option>B1</option><option>B2</option><option>B3</option>
                                <option>C1</option><option>C2</option><option>C3</option>
                            </select>                           
                        </div>    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <small> 
                                Status Kasus   &nbsp;
                                </small> 
                                </span>
                            </div>
                            <select class="form-control" id="exampleFormControlSelect1" name="kasus">         
                                <option>Deportasi</option><option>Proses</option>
                            </select>                           
                        </div>               
                    </div>                
                </div>                         
                <div class="form-group">        
                    <label for="exampleFormControlTextarea1">Deskripsikan Jenis Pelanggaran</label>
                    <textarea class="form-control" name="jenis_pelanggaran" id="exampleFormControlTextarea1" rows="2"></textarea>
                </div>                           
                <div class="form-group">
                    <div class="row">
                        <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                        <script>
                            function readURL(input) {
                                if (input.files && input.files[0]) {

                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                    $('.image-upload-wrap').hide();

                                    $('.file-upload-image').attr('src', e.target.result);
                                    $('.file-upload-content').show();

                                    $('.image-title').html(input.files[0].name);
                                    };

                                    reader.readAsDataURL(input.files[0]);

                                } else {
                                    removeUpload();
                                }
                            }

                            function removeUpload() {
                            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
                            $('.file-upload-content').hide();
                            $('.image-upload-wrap').show();
                            }
                            $('.image-upload-wrap').bind('dragover', function () {
                                    $('.image-upload-wrap').addClass('image-dropping');
                                });
                                $('.image-upload-wrap').bind('dragleave', function () {
                                    $('.image-upload-wrap').removeClass('image-dropping');
                            });
                        </script>
                            <div class="col-xl-9 col-md-9 col-sm-12">
                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="foto"/>
                                    <div class="drag-text">
                                    <h3>Tarik atau seret file kesini</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Hapus <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>                            
                            </div>
                            <div class="col-xl-3 col-md-3 col-sm-12">
                                <div class="file-upload">
                                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Upload Foto</button>                             
                                </div>                            
                            </div>
                                          
                        </div>
                 
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="{{route('kamtib')}}" class="btn btn-block btn-light">
                                Kembali
                            </a>                                        
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-block btn-success">
                                Tambah
                            </button>                    
                        </div>
                    </div>                    
                </div>
            </form>  
        </div>
    </div>    
    @endif          
<div class="card">
    <div class="card-body">        
        <div class="row" style="margin-top:10px">
            <div class="col-xl-9 col-md-8 col-sm-12 ">
                <h3 style="margin-bottom:20px"><b>Rekapitulasi Data Penghuni Blok</b> </h3>                       
            </div>                       
            <form class="col-xl-3 col-md-4  col-sm-12">
                <input type="text"  style="margin-bottom:20px" name="cari"  class="form-control" placeholder="Cari Nama Deteni"> <a class="srh-btn"><i class="ti-search"></i></a>
            </form>
            <!-- <div  class="col-xl-2 col-md-3 col-sm-12 ">      
                <a href="{{route('export_excel_dpb')}}" class="btn btn-success btn-small" style="width:100%;margin-bottom:20px" target="_blank">Backup to Excel</a>            
            </div> -->
        </div>
        <table class="table table-hover table-striped table-responsive-md">
            <thead>

                <tr class="teks">
                    <th scope="col" style="width:5%">
                    <center>
                        No
                    </center>
                    </th>
                    <th scope="col" style="width:15%">Foto Deteni</th>
                    <th scope="col" style="width:25%">Nama Deteni</th>                            
                    <th scope="col" style="width:15%">Status Kasus</th>   
                    <th scope="col" style="width:25%">Dibuat</th>   
                    <th scope="col" style="width:15%">
                    <center>
                    Action
                    </center>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
                $no =count($dpb);
            ?>
                @foreach($dpb as $du)                         
                <tr class="teks">
                     <th>
                        <center>
                        {{$no--}}
                        </center>      
                    </th>
                    <th>
                        <img  src="{{$du->getDokumentasi()}}" class="lingkaran" alt="">                                    
                    </th>
                    <td>{{$du->nama_deteni}}</td>     
                    <td>{{$du->kasus}}</td>     
                    <td>{{$du->created_at}}</td>
                    <td>                
                        
                        <center>                
                        <a href="/kamtib/dpb/{{$du->id}}/lihat" style="margin:2px" class="btn btn-brand btn-tumblr btn-sm">
                            <i class="cui cui-user"></i>
                        </a>
                        @if(auth()->user()->is_admin != 'tamu')               
                        <a href="/kamtib/dpb/{{$du->id}}/edit"  style="margin:2px" class="btn btn-brand btn-twitter btn-sm">
                            <i class="cui cui-pencil"></i>
                        </a>
                        <a href="/kamtib/dpb/{{$du->id}}/hapus" style="margin:2px"  class="btn btn-brand btn-html5 btn-sm" onclick="return confirm('Apakah anda yakin ?')">
                            <i class="cui cui-trash"></i>
                        </a>
                        @endif
                    </center>
                    </td>
                </tr>
                @endforeach            
            </tbody>
        </table>               
        @if(auth()->user()->is_admin == 'user')
        @endif
    </div>
</div>
@endsection
