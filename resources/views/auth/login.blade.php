<!DOCTYPE html>

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Portal Masuk Sipidat</title>
    <!-- Icons-->
    <link href="{{asset('/core-ui-master/src/css/free.min.css')}}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{asset('/core-ui-master/src/css/style.css')}}" rel="stylesheet">
    <link href="vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app flex-row align-items-center" style="background-image: url('/core-ui-master/src/img/xxx.jpg');background-repeat: no-repeat;background-position: center;">    
    <div class="container">
      <div class="row" style="margin-bottom:20px">
        <div class="col-xl-5 col-md-4 col-sm-1"></div>
        <div class="col-xl-2 col-md-4 col-sm-10">
          <img src="{{asset('/asset/logo-imigrasi.png')}}"  width="70px" height="70px" alt="Logo Imigrasi">
          <img src="{{asset('/asset/logo-pengayoman.png')}}"  width="70px" height="70px" alt="Logo Imigrasi">
        </div>
        <div class="col-xl-5 col-md-4 col-sm-1"></div>
      </div>
      <div class="row">
        <div class="col-xl-3 col-md-2"></div>
        <div class="col-xl-6 col-md-8" >
          <h3 style="color:white">
            <center>          
              <b>
              Sistem Pengelolaan Informasi dan Administrasi Terpadu
              </b>
            </center>
          </h3>
          <h5 style="color:white">
            <center>          
              Rudenim Surabaya
            </center>
          </h5>
        </div>
        <div class="col-xl-3 col-md-2"></div>
      </div>
      <div class="row justify-content-center">
        <div class="col-xl-5 col-md-8"style="background-color: transparent;border-style:none;">
          <div class="card-group" style="background-color: transparent;border-style:none;">
            <div class="card p-4"style="background-color: transparent;border-style:none;">
              <div class="card-body" style="background-color: transparent;border-style:none;">
                @guest              
                  <form method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="cui-user"></i>
                              </span>
                          </div>
                          <input id="username" type="username" placeholder="NIP (Nomor Induk Pegawai)" class="form-control @error('username') is-invalid @enderror" name="username"  value="{{ old('username') }}" required autocomplete="username" autofocus>
                          
                          @error('username')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="input-group mb-4">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i class="cui-lock-locked"></i>
                              </span>
                          </div>
                          <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="row">
                          <div class="col-12">
                              <button type="submit"  style="width:100%;color:white;margin-top:20px" class="btn btn-facebook px-4">
                                  {{ __('Masuk') }}
                              </button>
                          </div>
                      </div>
                  </form>
                @else
                  <div class="card-body text-center">
                    <div>
                      <h2 style="color:white">Selamat Datang {{ Auth::user()->name }} !</h2>                      
                      <a href="{{ route('home') }}" class="btn btn-primary active mt-3" style="width:100%" >Menuju Beranda</a>
                      <br>
                      <a href="{{ route('change') }}" class="btn btn-danger active mt-3" style="width:100%" >Ganti Akun</a>
                    </div>
                  </div>                    
                @endguest                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <h5 style="color:white;font-size:10px">
            <center>
              <br> <br> SISTEM PENGELOLAAN INFORMASI & ADMINISTRASI TERPADU <br>
              RUDENIM SURABAYA <br> <br> <br>
              Developed By <a href="https://www.instagram.com/n_vi25">VI</a>  <span>&copy; 2019</span> All Rigth Reserved          
            </center>
          </h5>
        </div>
      </div>          
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>

  </body>
</html>
