<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <link rel="apple-touch-icon" href="{{ asset("/assets/images/apple-touch-icon.png") }}") }}">
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">

        <link rel="stylesheet" href="{{ asset("/global/vendor/asscrollable/asScrollable.css") }}">
        <link rel="stylesheet" href="{{ asset("/assets/examples/css/dashboard/team.css") }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset("/global/fonts/web-icons/web-icons.min.css") }}">
        <link rel="stylesheet" href="{{ asset("/global/fonts/brand-icons/brand-icons.min.css") }}">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
         <!-- toastr notifications -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">



        
          <script src="{{ asset("/global/vendor/jquery/jquery.js") }}"></script>
        <!--<script src="https://code.highcharts.com/highcharts.js"></script>-->
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/stock/highstock.js"></script>
        <script src="https://code.highcharts.com/stock/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
        <!--[if lt IE 9]>
        <script src="https://code.highcharts.com/modules/oldie.js"></script>
        <![endif]-->
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
    </head>
    <body class="animsition site-navbar-small page-aside-left">
        <!--[if lt IE 8]>
              <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->
        @include('layouts.header')

        <!-- Page -->
        <div class="page">
            @include('layouts.leftmenumachine')

            @yield('content')

        </div>
        <!-- End Page -->
        <!-- Footer -->
        @include('layouts.footer');
        <!-- Core  -->
      
        <script src="{{ asset("/global/vendor/babel-external-helpers/babel-external-helpers.js") }}"></script>

        <script src="{{ asset("/global/vendor/tether/tether.js") }}"></script>
        
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
        <script src="https://momentjs.com/downloads/moment.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>       
        
            <!-- toastr notifications -->
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
        <script src="{{ asset("/global/vendor/bootstrap/bootstrap.js") }}"></script>
               
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
        
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
        <!-- Config -->
        <script src="{{ asset("/global/js/config/colors.js") }}"></script>
        <script src="{{ asset("/assets/js/config/tour.js") }}"></script>
        <script>
            Config.set('assets', '../assets');</script>
        <!-- Page -->
        <script src="{{ asset("/assets/js/Site.js") }}"></script>
        <script src="{{ asset("/global/js/Plugin/asscrollable.js") }}"></script>
        <script src="{{ asset("/global/js/Plugin/slidepanel.js") }}"></script>
        <script src="{{ asset("/global/js/Plugin/switchery.js") }}"></script>

        
        <script src="{{asset('js/custom-script.js')}}"></script>
        
        <script src="{{ asset("/assets/js/select2.js") }}"></script>
        

        <script>
            (function (document, window, $) {
                'use strict';
                var Site = window.Site;
                $(document).ready(function () {
                    Site.run();
                });
            })(document, window, jQuery);
        </script>

        <!--CustomStyle-->
        <link rel="stylesheet" href="{{ asset("/global/css/custom.css") }}">

    </body>
</html> 