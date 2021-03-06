<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
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
        <link rel="stylesheet" href="{{ asset("/global/vendor/aspieprogress/asPieProgress.css") }}">
        <link rel="stylesheet" href="{{ asset("/global/vendor/jquery-selective/jquery-selective.css") }}">
        <link rel="stylesheet" href="{{ asset("/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css") }}">
        <link rel="stylesheet" href="{{ asset("/global/vendor/asscrollable/asScrollable.css") }}">
        <link rel="stylesheet" href="{{ asset("/assets/examples/css/dashboard/team.css") }}">
        <link rel="stylesheet" href="{{ asset("/assets/css/select2.css") }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset("/global/fonts/web-icons/web-icons.min.css") }}">
        <link rel="stylesheet" href="{{ asset("/global/fonts/brand-icons/brand-icons.min.css") }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <!-- Core  -->
        <script src="{{ asset("/global/vendor/babel-external-helpers/babel-external-helpers.js") }}"></script>
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
        <script src="{{ asset("/global/vendor/aspieprogress/jquery-asPieProgress.js") }}"></script>
        <script src="{{ asset("/global/vendor/matchheight/jquery.matchHeight-min.js") }}"></script>
        <script src="{{ asset("/global/vendor/jquery-selective/jquery-selective.min.js") }}"></script>
        <script src="{{ asset("/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js") }}"></script>
        <script src="{{ asset("/global/vendor/peity/jquery.peity.min.js") }}"></script>
        <!--test dataables-->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
        
       
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
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
        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
            ]) !!}
            ;
        </script>

        <style>
            .blink_me {
                animation: blinker 1s linear infinite;
            }

            @keyframes blinker {  
                50% { opacity: 0; }
            }
        </style>
    </head>
    <body class="animsition site-navbar-small dashboard">
        <!--[if lt IE 8]>
              <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->
        @include('layouts.header')

        <!-- Page -->
        <div class="page">
            <div class="page-content container-fluid">
                @yield('content')
            </div>
            <div class="site-footer-legal">© 2017 <a href="#">CoinOpSolutions Inc.</a></div>
        </div>
        <!-- End Page -->
        <script src="{{asset('js/chartist.js')}}"></script>  
        <script src="{{asset('js/d3.min.js')}}"></script>
        <script src="{{asset('js/c3.min.js')}}"></script>     
        <script src="{{asset('js/custom.js')}}"></script>
        <script src="{{asset('js/custom-script.js')}}"></script>
        <script src="{{asset('js/Config.js')}}"></script>

        
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
        <script src="{{ asset("/assets/js/Plugin/bootbox.js") }}"></script>
        <script src="{{ asset("/assets/js/Plugin/bootstrap-sweetalert.js") }}"></script>
        <script src="{{ asset("/assets/js/select2.js") }}"></script>
        <!-- Config -->
        <script src="{{ asset("/global/js/config/colors.js") }}"></script>
        <script src="{{ asset("/assets/js/config/tour.js") }}"></script>
        <script>
            Config.set('assets', '../assets');
        </script>
        <!-- Page -->
        <script src="{{ asset("/assets/js/Site.js") }}"></script>
        <script src="{{ asset("/global/js/Plugin/asscrollable.js") }}"></script>
        <script src="{{ asset("/global/js/Plugin/slidepanel.js") }}"></script>
        <script src="{{ asset("/global/js/Plugin/switchery.js") }}"></script>
        <script src="{{ asset("/global/js/Plugin/matchheight.js") }}"></script>
        <script src="{{ asset("/global/js/Plugin/aspieprogress.js") }}"></script>
        <script src="{{ asset("/global/js/Plugin/bootstrap-datepicker.js") }}"></script>
        <script src="{{ asset("/global/js/Plugin/asscrollable.js") }}"></script>
        <!--<script src="{{ asset("/assets/examples/js/dashboard/team.js") }}"></script>-->
        <script src="{{ asset("/global/js/Plugin/bootbox.js") }}"></script>
        <script src="{{ asset("/global/js/Plugin/sweetalert.js") }}"></script>
                


        <script src="{{ asset("/global/js/Plugin/asselectable.js") }}"></script>
        <script src="{{ asset("/global/js/Plugin/selectable.js") }}"></script>
        <script src="{{ asset("/global/js/Plugin/table.js") }}"></script>
        <script src="{{ asset("/global/js/Plugin/asscrollable.js") }}"></script>


        <script src="{{ asset("/global/js/Plugin/peity.js") }}"></script>
        <script src="{{ asset("/assets/examples/js/charts/peity.js") }}"></script>
        <script src="{{ asset("/assets/examples/js/advanced/bootbox-sweetalert.js") }}"></script>
        
            <script src="{{ asset("/global/js/Plugin/responsive-tabs.js") }}"></script>
  <script src="{{ asset("/global/js/Plugin/closeable-tabs.js") }}"></script>
  <script src="{{ asset("/global/js/Plugin/tabs.js") }}"></script>

        <!--AngularJS-->
        <script src="{{asset('js/table2excel.js')}}"></script>
        
         
        <!--CustomStyle-->
        <link rel="stylesheet" href="{{ asset("/global/css/custom.css") }}">
        <link rel="stylesheet" href="{{ asset("/global/css/dataTables.bootstrap4.css") }}">
        <link rel="stylesheet" href="{{ asset("/global/css/dataTables.fixedcolumns.bootstrap4.min.css") }}">
        <link rel="stylesheet" href="{{ asset("/global/css/dataTables.fixedheader.bootstrap4.min.css") }}">
        <link rel="stylesheet" href="{{ asset("/global/css/dataTables.buttons.bootstrap4.min.css") }}">
        <link rel="stylesheet" href="{{ asset("/global/css/c3.css") }}">

    </body>
</html>