<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
      <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
  
  <link rel="apple-touch-icon" href="{{ asset("/assets/images/apple-touch-icon.png") }}">
  <link rel="shortcut icon" href="{{ asset("/assets/images/favicon.ico") }}">
                          
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset("/global/css/bootstrap.min.css") }}">
  <link rel="stylesheet" href="{{ asset("/global/css/bootstrap-extend.min.css") }}">
  <link rel="stylesheet" href="{{ asset("/assets/css/site.min.css") }}">
  <!-- Plugins -->
  <link rel="stylesheet" href="{{ asset("/global/vendor/animsition/animsition.css") }}">
  <link rel="stylesheet" href="{{ asset("/global/vendor/asscrollable/asScrollable.css") }}">
  <link rel="stylesheet" href="{{ asset("/global/vendor/switchery/switchery.css") }}">
  <link rel="stylesheet" href="{{ asset("/global/vendor/intro-js/introjs.css") }}">
  <link rel="stylesheet" href="{{ asset("/global/vendor/slidepanel/slidePanel.css") }}">
  <link rel="stylesheet" href="{{ asset("/global/vendor/flag-icon-css/flag-icon.css") }}">
  <link rel="stylesheet" href="{{ asset("/assets/examples/css/pages/login.css") }}">
  <!-- Fonts -->
  <link rel="stylesheet" href="{{ asset("/global/fonts/web-icons/web-icons.min.css") }}">
  <link rel="stylesheet" href="{{ asset("/global/fonts/brand-icons/brand-icons.min.css") }}">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
  <!--[if lt IE 9]>
    <script src="{{ asset("/global/vendor/html5shiv/html5shiv.min.js") }}"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <script src="{{ asset("/global/vendor/media-match/media.match.min.js") }}"></script>
    <script src="{{ asset("/global/vendor/respond/respond.min.js") }}"></script>
    <![endif]-->
  <!-- Scripts -->
  <script src="{{ asset("/global/vendor/breakpoints/breakpoints.js") }}"></script>
  <script>
  Breakpoints();
  </script>
</head>
<body class="animsition page-login layout-full page-dark">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <!-- Page -->
  <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
      <div class="brand">
        <img class="brand-img" src="{{ asset("/assets/images/logo.png") }}"> 
        <h2 class="brand-text">CoinOpMachines</h2>
      </div>
      <p>Reset Via Email</p>

      
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="E-Mail Address">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                        </div>
                    </form>

      <p>Have account already? Please go to <a href="{{ route('login') }}">Sign In</a></p>

      <footer class="page-copyright page-copyright-inverse">
        <p>CoinOpSolutions Inc</p>
        <p>© 2017. All RIGHT RESERVED.</p>
      </footer>
    </div>
  </div>
  <!-- End Page -->
  <!-- Core  -->
  <script src="{{ asset ("/global/vendor/babel-external-helpers/babel-external-helpers.js") }}"></script>
  <script src="{{ asset("/global/vendor/jquery/jquery.js") }}"></script>
  <script src="{{ asset("/global/vendor/tether/tether.js") }}"></script>
  <script src="{{ asset("/global/vendor/bootstrap/bootstrap.js") }}"></script>
  <script src="{{ asset("/global/vendor/animsition/animsition.js") }}"></script>
  <script src="{{ asset("/global/vendor/mousewheel/jquery.mousewheel.js") }}"></script>
  <script src="{{ asset("/global/vendor/asscrollbar/jquery-asScrollbar.js") }}"></script>
  <script src="{{ asset("/global/vendor/asscrollable/jquery-asScrollable.js") }}"></script>
  <!-- Plugins -->
  <script src="{{ asset("/global/vendor/switchery/switchery.min.js") }}"></script>
  <script src="{{ asset("/global/vendor/intro-js/intro.js") }}"></script>
  <script src="{{ asset("/global/vendor/screenfull/screenfull.js") }}"></script>
  <script src="{{ asset("/global/vendor/slidepanel/jquery-slidePanel.js") }}"></script>
  <script src="{{ asset("/global/vendor/jquery-placeholder/jquery.placeholder.js") }}"></script>
  <!-- Scripts -->
  <script src="{{ asset("/global/js/State.js") }}"></script>
  <script src="{{ asset("/global/js/Component.js") }}"></script>
  <script src="{{ asset("/global/js/Plugin.js") }}"></script>
  <script src="{{ asset("/global/js/Base.js") }}"></script>
  <script src="{{ asset("/global/js/Config.js") }}"></script>
  <script src="{{ asset("/assets/js/Section/Menubar.js") }}"></script>
  <script src="{{ asset("/assets/js/Section/Sidebar.js") }}"></script>
  <script src="{{ asset("/assets/js/Section/PageAside.js") }}"></script>
  <script src="{{ asset("/assets/js/Plugin/menu.js") }}"></script>
  <!-- Config -->
  <script src="{{ asset("/global/js/config/colors.js") }}"></script>
  <script src="{{ asset("/assets/js/config/tour.js") }}"></script>
  <script>
  Config.set('assets', '../../assets');
  </script>
  <!-- Page -->
  <script src="{{ asset("/assets/js/Site.js") }}"></script>
  <script src="{{ asset("/global/js/Plugin/asscrollable.js") }}"></script>
  <script src="{{ asset("/global/js/Plugin/slidepanel.js") }}"></script>
  <script src="{{ asset("/global/js/Plugin/switchery.js") }}"></script>
  <script src="{{ asset("/global/js/Plugin/jquery-placeholder.js") }}"></script>
  <script>
  (function(document, window, $) {
    'use strict';
    var Site = window.Site;
    $(document).ready(function() {
      Site.run();
    });
  })(document, window, jQuery);
  </script>
</body>
</html>

