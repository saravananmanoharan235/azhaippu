<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/favicon.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>{{ config('app.name', 'Work Smart') }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">  


    <!--  Social tags      -->
    <meta name="keywords" content="">

    <meta name="description" content="">

    <!-- Bootstrap core CSS     -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="{{ url('assets/css/material-dashboard98f3.css?v=1.3.0') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project   -->
    <link href="{{ url('assets/css/demo.css') }}" rel="stylesheet" />
    
    <!--     Fonts and icons     -->
    <link href="{{ url('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    <script type="text/javascript">
        var base_url = 'http://localhost/azhaippu/public';
        //var base_url = 'http://aegham.com/azhaippu/public';
    </script>

</head>


<body >

    <div class="wrapper">
    @include('layouts.admin.sidebar')

    @include('layouts.admin.header')
                    
    @yield('content')

    @include('layouts.admin.footer')

            