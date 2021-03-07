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
    <div class="card">
        <div class="card-body">
             @if (session('status'))            
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('status')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif    

            <div class="row">
                <div class="col">
                    <h3 style="margin-bottom:20px"><b>Edit Laporan Data Penghuni Blok</b></h3>                       
                </div>            
            </div>
            <form method="POST" action="/kamtib/dpb/{{$dpb->id}}/update" enctype="multipart/form-data">
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
                                <option value="{{$dpb->tanggal}}" selected>{{$dpb->tanggal}}</option>
                                <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
                                <option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
                                <option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
                                <option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
                                <option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
                                <option>26</option><option>27</option><option>28</option><option>29</option><option>30</option>
                                <option>31</option>
                            </select>
                            <select class="form-control" id="exampleFormControlSelect1" name="bulan">       
                                <option value="{{$dpb->bulan}}" selected>{{$dpb->bulan}}</option>
                                <option>Januari</option><option>Februari</option><option>Maret</option><option>April</option><option>Mei</option>
                                <option>Juni</option><option>Juli</option><option>Agustus</option><option>September</option><option>Oktober</option>
                                <option>November</option><option>Desember</option>
                            </select>
                            <select class="form-control" id="exampleFormControlSelect1" name="tahun">       
                                <option value="{{$dpb->tahun}}" selected>{{$dpb->tahun}}</option>                      
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
                            <input id="nama_deteni" type="text" value="{{$dpb->nama_deteni}}" placeholder="Nama Deteni, ex : Yadi nur cahya" class="form-control" name="nama_deteni" required autocomplete="nama_deteni">                       
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
                                <option value="{{$dpb->blok}}" selected>{{$dpb->blok}}</option>
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
                                <option value="{{$dpb->kasus}}" selected>{{$dpb->kasus}}</option>
                                <option>Deportasi</option><option>Proses</option>
                            </select>                           
                        </div>               
                    </div>                
                </div>                         
                <div class="form-group">        
                    <label for="exampleFormControlTextarea1">Deskripsikan Jenis Pelanggaran</label>
                    <textarea class="form-control" name="jenis_pelanggaran" id="exampleFormControlTextarea1" rows="2">{{$dpb->jenis_pelanggaran}}</textarea>
                </div>                           
                <div class="form-group">
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
                                    <input class="file-upload-input" type='file' onchange="readURL(this);" name="foto"/>
                                    <div class="drag-text">
                                    <h3>Tarik atau seret file kesini</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
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
                </div>                   
                    <div class="row">
                        <div class="col">
                            <a href="{{route('dpb')}}" class="btn btn-block btn-light">
                                Batal
                            </a>                                        
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-block btn-warning">
                                Simpan
                            </button>                    
                        </div>
                    </div>
                </div>
            </form>          
        </div>              
    </div>
@endsection
