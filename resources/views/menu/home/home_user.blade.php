<h3 style="margin-bottom:20px">Pintasan Cepat</h3>
<div class="row">
    @if(auth()->user()->is_admin != 'tamu')
    <div class="col-sm-12 col-xl-6 col-md-6" style="margin-bottom:35px">           
        <a href="{{route('users')}}" style="width:100%;height:100px;" class="btn btn-linkedin">
            <div style="width:100%">            
                <div class="row">
                    <div class="col-xl-4 col-md-4 col-sm">
                        <img src="{{asset('/asset/icon/ptk.png')}}" alt="logo" width="60px" style="margin-top:10px">
                    </div>
                    <div class="col-xl-8 col-md-8 col-sm">
                        <h5 style="margin-top:30px">Akun Tamu</h5>                
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    <div class="col-sm-12 col-xl-6 col-md-6" style="margin-bottom:20px">                  
        <a href="{{route('lp')}}" style="width:100%;height:100px;" class="btn btn-linkedin">
            <div style="width:100%">
                <div class="row">
                    <div class="col-xl-4 col-md-4 col-sm-4">
                        <img src="{{asset('/asset/icon/lp.png')}}" alt="logo" width="60px" style="margin-top:10px">
                    </div>
                    <div class="col-xl-8 col-md-8 col-sm-8">
                        <h5 style="margin-top:30px">Lapor Pengungsi</h5>                
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<h3 style="margin-bottom:20px;margin-top:15px">Main Menu</h3>
<div class="row">
    @if(auth()->user()->is_admin != 'tamu')
    <div class="col-sm-6 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('kamtib')}}" style="width:100%;height:220px;" class="btn btn-linkedin">
            <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:65%">
                <img src="{{asset('/asset/kamtib.png')}}" alt="logo">
            </div>
            <div style="width:100%;height:15%">
                <h2>KAMTIB</h2>
            </div>
            <div style="width:100%;height:10%">
                <p>Keamanan & Ketertiban</p>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('perkes')}}" style="width:100%;height:220px;" class="btn btn-linkedin">
            <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:65%">
                <img src="{{asset('/asset/perkes.png')}}" alt="logo">
            </div>
            <div style="width:100%;height:15%">
                <h2>PERKES</h2>
            </div>
            <div style="width:100%;height:10%">
                <p>Perawatan & Kesehatan</p>
            </div>
        </a>
    </div>
    @endif
    <div class="col-sm-6 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('rap')}}" style="width:100%;height:220px;" class="btn btn-linkedin">
            <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:65%">
                <img src="{{asset('/asset/rap.png')}}" alt="logo">
            </div>
            <div style="width:100%;height:15%">
                <h2>RAP</h2>
            </div>
            <div style="width:100%;height:10%">
                <p>Registrasi Administrasi & Pelaporan</p>
            </div>
        </a>
    </div>
    @if(auth()->user()->is_admin != 'tamu')
    <div class="col-sm-6 col-xl-3 col-md-6" style="margin-bottom:20px">            
        <a href="{{route('pimpinan')}}" style="width:100%;height:220px;" class="btn btn-linkedin">
            <div style="width:100%;height:5%">
            </div>
            <div style="width:100%;height:65%">
                <img src="{{asset('/asset/pimpinan.png')}}" alt="logo">
            </div>
            <div style="width:100%;height:15%">
                <h2>PIMPINAN</h2>
            </div>
            <div style="width:100%;height:10%">
                <p>Pimpinan</p>
            </div>
        </a>
    </div>     
    @endif   
</div>