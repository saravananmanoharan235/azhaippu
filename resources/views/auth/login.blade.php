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
                <!-- <li class= "">
                    <a href="{{url('register')}}">
                        <i class="material-icons">person_add</i>
                        Register
                    </a>
                </li> -->
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
        <!-- data-image="{{ url('assets/img/login.jpg') }}" -->
            <div class="full-page login-page" filter-color="black" >
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                            <div class="card card-login card-hidden">
                                <div class="card-header text-center" data-background-color="rose">
                                    <h4 class="card-title">Login</h4>
                                    <div class="social-line">
                                        <a href="#btn" class="btn btn-just-icon btn-simple">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-just-icon btn-simple">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#eugen" class="btn btn-just-icon btn-simple">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <p class="category text-center">
                                    Or Be Classical
                                </p>
                                <div class="card-content">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>

                                        <div class="form-group label-floating">
                                            <label class="control-label">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Let's go</button>

                                </div>
                            </div>
                        </form>
                    </div>
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
            &copy; <script>document.write(new Date().getFullYear())</script> <a href="{{url('/')}}"> {{ config('app.name', 'Najez') }} </a>
        </p>
    </div>
</footer>

    </div>

    </div>
</body>


@endsection 
