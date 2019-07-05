@extends('layouts.front')

@section('content')

<body class="off-canvas-sidebar">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{url('/')}}">{{ config('app.name', 'Work Smart') }}</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class= "">
                    <a href="{{url('register')}}">
                        <i class="material-icons">person_add</i>
                        Register
                    </a>
                </li>
                <li class= " active ">
                    <a href="{{url('login')}}">
                        <i class="material-icons">fingerprint</i>
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <div class="wrapper wrapper-full-page">
            <div class="full-page login-page" filter-color="black" data-image="{{ url('assets/img/lock.jpg') }}">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">




                </div>
            </div>
        </div>
        <footer class="footer">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="#">
                         Home 
                    </a>
                </li>
                <li>
                    <a href="#">
                         Company 
                    </a>
                </li>
                <li>
                    <a href="#">
                          Portofolio 
                    </a>
                </li>
                <li>
                    <a href="#">
                        Blog 
                    </a>
                </li>
            </ul>
        </nav>
        <p class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com/"> {{ config('app.name', 'Work Smart') }} </a>,  made with love for a better web 
        </p>
    </div>
</footer>

    </div>

    </div>
</body>
@endsection 
