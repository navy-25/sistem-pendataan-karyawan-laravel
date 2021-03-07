@if(auth()->user()->is_admin == 'user' || auth()->user()->is_admin == 'admin' || auth()->user()->is_admin == 'tamu' )
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="nav-icon cui-home"></i>Beranda
        <!-- <span class="badge badge-primary">NEW</span> -->
    </a>
</li>
@endif

@if(auth()->user()->is_admin == 'user')
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="{{route('kamtib')}}">
    <i class="nav-icon nav-icon cui-shield-alt"></i> Kamtib</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item">
            <a class="nav-link" href="{{route('lpj')}}">
            <small>
                <i class="nav-icon cui-circle"></i>Lapor Petugas Jaga</a>
            </small>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dpb')}}">
            <small>
                <i class="nav-icon cui-circle"></i>Data Penghuni Blok</a>
            </small>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dtp')}}">
            <small>
                <i class="nav-icon cui-circle"></i>Daftar Tugas Pengawalan</a>
            </small>
        </li>        
        <li class="nav-item">
            <a class="nav-link" href="{{route('ad-k')}}">
            <small>
                <i class="nav-icon cui-circle"></i>Arsip Digital</a>
            </small>
        </li>  
    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="{{route('perkes')}}">
    <i class="nav-icon nav-icon cui-medical-cross"></i>Perkes</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item">
            <a class="nav-link" href="{{route('ko')}}">
            <small>
                <i class="nav-icon cui-circle"></i>Ketersediaan Obat</a>
            </small>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('kd')}}">
            <small>
                <i class="nav-icon cui-circle"></i>Kebutuhan Deteni</a>
            </small>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('ad-p')}}">
            <small>
                <i class="nav-icon cui-circle"></i>Arsip Digital</a>
            </small>
        </li>        
    </ul>
</li>
@endif
@if(auth()->user()->is_admin == 'tamu' || auth()->user()->is_admin == 'user'  )
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="{{route('rap')}}">
    <i class="nav-icon nav-icon cui-calendar-check"></i>RAP</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item">
            <a class="nav-link" href="{{route('dp')}}">
            <small>
                <i class="nav-icon cui-circle"></i>Data Pengungsi</a>
            </small>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dpm')}}">
            <small>
                <i class="nav-icon cui-circle"></i>Data Pengungsi Mandiri</a>
            </small>
        </li>
        @if( auth()->user()->is_admin == 'user' )
        <li class="nav-item">
            <a class="nav-link" href="{{route('dd')}}">
            <small>
                <i class="nav-icon cui-circle"></i>Data Deteni</a>
            </small>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{route('lp')}}">
            <small>
                <i class="nav-icon cui-circle"></i>Lapor Pengungsi</a>
            </small>
        </li>       
        @if( auth()->user()->is_admin == 'user' )
        <li class="nav-item">
            <a class="nav-link" href="{{route('ad-rap')}}">
            <small>
                <i class="nav-icon cui-circle"></i>Arsip Digital</a>
            </small>
        </li>        
        @endif
    </ul>
</li>
@endif
@if( auth()->user()->is_admin == 'user' )
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="{{route('pimpinan')}}">
    <i class="nav-icon nav-icon cui-school"></i>Pimpinan</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item">
            <a class="nav-link" href="{{route('tk')}}">
            <small>
                <i class="nav-icon cui-circle"></i>Target Kinerja</a>
            </small>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('ptk')}}">
            <small>
                <i class="nav-icon cui-circle"></i>Protokoler</a>
            </small>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('pws')}}">
            <small>
                <i class="nav-icon cui-circle"></i>Pengawasan</a>
            </small>
        </li>               
    </ul>
</li>
@endif
@if(auth()->user()->is_admin == 'admin' ||auth()->user()->is_admin == 'user'  )
<li class="nav-item">
    <a class="nav-link" href="{{ route('users') }}">
    @if(auth()->user()->is_admin == 'admin')
        <i class="nav-icon cui-user"></i>Pengguna
    @elseif(auth()->user()->is_admin == 'user')
        <i class="nav-icon cui-user"></i>Akun Tamu
    @endif
    </a>              
</li>         
@endif
<li class="nav-item">
    <a class="nav-link" href="{{ route('akun') }}">
        <i class="nav-icon cui-settings"></i>Akun
    </a>              
</li> 