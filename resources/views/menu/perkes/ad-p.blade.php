@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('perkes')}}">Perawatan & Kesehatan</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('ad-p')}}">Arsip Digital</a> 
</li>
@endsection

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
            <div class="col-xl-3 col-md-5 col-sm-12 ">
                <h3 style="margin-bottom:20px"><b>Arsip Digital Perkes</b> </h3>                       
            </div>            
            <div class="col-xl-6 col-md-3  col-sm-12">
                @if(auth()->user()->is_admin != 'tamu')               
                <button type="button" class="btn btn-dark" style="margin-bottom:10px" data-toggle="modal" data-target="#exampleModalLong">
                <i class="cui cui-plus"></i>
                    Tambah Arsip
                </button>       
                @endif                   
            </div>     
            <form class="col-xl-3 col-md-3  col-sm-12">
                <input type="text" name="cari"  class="form-control" placeholder="Cari Nama File"> <a class="srh-btn"><i class="ti-search"></i></a>
                <!-- <button type="submit" class="btn btn-primary">
                    Cari
                </button>  -->
            </form>
        </div>        
        <table class="table table-hover table-striped table-responsive-md">
            <thead>
                <tr class="teks">
                <th scope="col" style="width:5%">
                    <center>
                        No
                    </center>
                    </th>
                    <th scope="col" style="width:30%">Nama File</th>
                    <th scope="col" style="width:30%">Ukuran</th>                            
                    <th scope="col" style="width:20%">Tgl. Upload</th>                             
                    <th scope="col" style="width:10%">
                    <center>
                        Action                    
                    </center>
                    </th>                                                 
                </tr>
            </thead>
            <tbody>
            <?php
                $no =count($ad);
            ?>              
                @foreach($ad as $du)                         
                <tr class="teks">
                    <th>
                    <center>                        
                        {{$no--}}                 
                    </center>
                    </th>
                    <td><h6>{{$du->nama}}</h6></td>
                    <td><h6>{{$du->ukuran}}</h6></td>
                    <td><h6>{{$du->created_at}}</h6></td>
                    <td>                                                                   
                        <center>
                        <a href="{{$du->getFiles()}}"  style="margin:2px" target="_blank" class="btn btn-brand btn-twitter btn-sm">
                            <i class="cui cui-data-transfer-down" ></i>
                        </a>
                        @if(auth()->user()->is_admin != 'tamu')               
                        <a href="/perkes/adp/{{$du->id}}/hapus" style="margin:2px" class="btn btn-brand btn-html5 btn-sm" onclick="return confirm('Apakah anda yakin ?')">
                            <i class="cui cui-trash" ></i>
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

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <form method="POST" action="{{route('store_foto_adp')}}" enctype="multipart/form-data">
        @csrf                                                              
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">             
                    <div class="input-file-container" style="margin-bottom:20px">  
                        <input id="nama" type="text" placeholder="Nama file tidak boleh sama" class="form-control" name="nama" required autocomplete="nama">                       
                    </div>                           
                    <div class="input-file-container">  
                        <input class="input-file" name="file" id="my-file" type="file">
                        <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary  btn-sm" data-dismiss="modal">Tutup</button>
                    <button type="submit" style="width:50px" class="btn btn-block btn-success btn-sm">
                        Ok
                    </button>                    
                </div>
            </div>
        </div>
    </form>    
</div>
@endsection
