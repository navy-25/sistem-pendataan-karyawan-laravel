
<button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
    <span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="{{route('home')}}">
    <h2 class="navbar-brand-full">si<b>Pidat </b></h2>
    <h2 class="navbar-brand-minimized"> <b> S</b>ip</h2>    
</a>
<button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
    <span class="navbar-toggler-icon"></span>
</button>      
<ul class="nav navbar-nav ml-auto">                                           
    <li class="c-header-nav-item dropdown show">
        <a class="c-header-nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
            <div class="c-avatar">
                <?php
                    if(Auth::user()->foto==null){
                        $url = "/images/default.png";                
                    }else{
                        $url = "/images/foto_profil/".Auth::user()->foto;                
                    }
                ?>
                <img class="c-avatar-img" src="{{$url}}" alt="" width="30px" height="30px" style="border-radius: 100%;margin-right:25px">
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right pt-0">
            <div class="dropdown-header bg-light py-2">
                <strong>Account</strong>            
            </div>
            <a class="dropdown-item" href="{{ route('akun') }}">
                <i class="cui cui-user" style="color:#383C40"></i>
                Akun
            </a>
            <a class="dropdown-item" href="{{ route('gantiPass') }}">
                <i class="cui cui-lock-locked" style="color:#383C40"></i>
                Ubah Password
            </a>
            <a class="dropdown-item" style="color:#5e5e5e;font-size:11px" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit(); ">
                <i class="cui cui-power-standby" style="color:#383C40"></i>
                Log Out
            </a>        
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
</ul>     
