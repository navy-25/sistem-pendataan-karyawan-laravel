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
    <title>Sipidat</title>
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

  <style>
    h3,dt,dl,dd{
      color:#353535;
    }
    .teks{
      color:#353535;
      font-size:13px;
      font-family:Roboto,sans-serif;
    }    
  </style>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar" style="background-color: #383C40;background-image: url('/core-ui-master/src/img/xxx2.png');border-color: #383C40;background-repeat: no-repeat;background-position: center;">    
      @include('includes.header')     
    </header>
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav" style="background-image: url('/core-ui-master/src/img/xxx2.png');background-repeat: no-repeat;background-position: center;background-size: 100%;">    
          <ul class="nav">            
            @include('includes.nav-item')     
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
      <main class="main" style="background-color: #f3f4f5 ; font-family: Roboto,sans-serif ;font-color:#424242;background-image: url('/core-ui-master/src/img/xxx.png');background-repeat: no-repeat;background-position: center">
        <!-- Breadcrumb -->
         <ol class="breadcrumb">
           @include('includes.breadcump')     
        </ol>
        <div class="container-fluid">
            @yield('content')   
          </div>
        </div>
      </main>
      <aside class="aside-menu">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">
              <i class="icon-list"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
              <i class="icon-speech"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
              <i class="icon-settings"></i>
            </a>
          </li>
        </ul>
      </aside>
    </div>
    <footer class="app-footer">
      @include('includes.footer')    
    </footer>
    <!-- CoreUI and necessary plugins-->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- <script src="{{asset('/core-ui-master/src/js/charts.js')}}"></script>
    <script src="{{asset('/core-ui-master/src/js/colors.js')}}"></script>
    <script src="{{asset('/core-ui-master/src/js/main.js')}}"></script>
    <script src="{{asset('/core-ui-master/src/js/popovers.js')}}"></script>
    <script src="{{asset('/core-ui-master/src/js/tooltips.js')}}"></script>
    <script src="{{asset('/core-ui-master/src/js/widget.js')}}"></script> -->

    <!-- <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/pace-progress/pace.min.js"></script>
    <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="node_modules/@coreui/coreui/dist/js/coreui.min.js"></script> -->
  </body>
</html>
