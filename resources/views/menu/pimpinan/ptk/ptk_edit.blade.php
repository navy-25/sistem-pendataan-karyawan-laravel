@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('pimpinan')}}">Pimpinan</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('ptk')}}">Protokoler</a> 
</li>
<li class="breadcrumb-item">
    Edit Protokoler
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
                <h3 style="margin-bottom:20px"><b>Edit Protokoler</b></h3>                       
            </div>           
        </div>
        <form method="POST" action="/pimpinan/ptk/{{$ptk->id}}/update">
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
                            <option selected>{{$ptk->tanggal}}</option>
                            <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
                            <option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
                            <option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
                            <option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
                            <option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
                            <option>26</option><option>27</option><option>28</option><option>29</option><option>30</option>
                            <option>31</option>
                        </select>
                        <select class="form-control" id="exampleFormControlSelect1" name="bulan">       
                            <option selected >{{$ptk->bulan}}</option>             
                            <option>Januari</option><option>Februari</option><option>Maret</option><option>April</option><option>Mei</option>
                            <option>Juni</option><option>Juli</option><option>Agustus</option><option>September</option><option>Oktober</option>
                            <option>November</option><option>Desember</option>
                        </select>
                        <select class="form-control" id="exampleFormControlSelect1" name="tahun">       
                            <option selected >{{$ptk->tahun}}</option>                                         
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
                                Nama Kegiatan
                                </small> 
                            </span>
                        </div>
                        <input id="nama_kegiatan" type="text" value="{{$ptk->nama_kegiatan}}" placeholder="Nama Kegiatan " class="form-control" name="nama_kegiatan" required autocomplete="nama_kegiatan">                       
                    </div>    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <small> 
                                Tempat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </small> 
                            </span>
                        </div>
                        <input id="tempat" type="text" placeholder="Tempat Pelaksanaan" value="{{$ptk->tempat}}" class="form-control" name="tempat" required autocomplete="tempat">                       
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
                            <option selected >{{$ptk->status}}</option>
                            <option>Proses</option><option>Selesai</option>
                        </select>
                    </div>       
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <small> 
                                Penanggung Jawab
                                </small> 
                            </span>
                        </div>
                        <input id="penanggung_jawab" value="{{$ptk->penanggung_jawab}}" type="text" placeholder="Penanggung Jawab" class="form-control" name="penanggung_jawab" required autocomplete="penanggung_jawab">                       
                    </div>    
                    <div class="form-group">            
                        <label for="exampleFormControlTextarea1">Persiapan</label>
                        <textarea class="form-control" name="persiapan" id="exampleFormControlTextarea1" rows="2">{{$ptk->persiapan}}</textarea>
                    </div>                                
                </div>
            </div>                         
                                    
            <div class="row">
                <div class="col">
                    <a href="{{route('ptk')}}" class="btn btn-block btn-light">
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
