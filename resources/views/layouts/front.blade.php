<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <head>
    
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/favicon.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>{{ config('app.name', 'Work Smart') }}</title>

    <!-- Bootstrap core CSS     -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ url('assets/css/material-dashboard98f3.css?v=1.3.0') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ url('assets/css/demo.css') }}" rel="stylesheet" />

    
    <!--     Fonts and icons     -->
    <link href="{{ url('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>

    @yield('content')

    <!--   Core JS Files   -->
<script src="{{ url('assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/js/material.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="{{ url('assets/js/core.js') }}"></script>

<!-- Library for adding dinamically elements -->
<script src="{{ url('assets/js/arrive.min.js') }}" type="text/javascript"></script>

<!-- Forms Validations Plugin -->
<script src="{{ url('assets/js/jquery.validate.min.js') }}"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ url('assets/js/moment.min.js') }}"></script>

<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="{{ url('assets/js/chartist.min.js') }}"></script>

<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{ url('assets/js/jquery.bootstrap-wizard.js') }}"></script>

<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{ url('assets/js/bootstrap-notify.js') }}"></script>

<!--   Sharrre Library    -->
<script src="{{ url('assets/js/jquery.sharrre.js') }}"></script>

<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{ url('assets/js/bootstrap-datetimepicker.js') }}"></script>

<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{ url('assets/js/jquery-jvectormap.js') }}"></script>

<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="{{ url('assets/js/nouislider.min.js') }}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1_8C5Xz9RpEeJSaJ3E_DeBv8i7j_p6Aw"></script>

<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ url('assets/js/jquery.select-bootstrap.js') }}"></script>

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{ url('assets/js/jquery.datatables.js') }}"></script>

<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="{{ url('assets/js/sweetalert2.js') }}"></script>

<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ url('assets/js/jasny-bootstrap.min.js') }}"></script>

<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{ url('assets/js/fullcalendar.min.js') }}"></script>

<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ url('assets/js/jquery.tagsinput.js') }}"></script>

<!-- Material Dashboard javascript methods -->
<script src="{{ url('assets/js/material-dashboard98f3.js?v=1.3.0') }}"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ url('assets/js/demo.js') }}"></script>



<script type="text/javascript">
    $().ready(function(){
        demo.checkFullPageBackgroundImage();

        setTimeout(function(){
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>
