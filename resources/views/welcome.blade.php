<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <!-- <style>
            html, body {
               /* background-image: url(../img/hack.jpg );*/
               background: white;
                color: black;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 65px;
            }

            .links > a {
                color: white;
                padding: 10px 50px;
                font-size: 15px;
                border: solid white 1px;
                font-weight: 1000;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style> -->

        <!-- Latest compiled and minified CSS -->
       <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous"> -->

        <!-- Optional theme -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap-theme.min.css" integrity="sha384-jzngWsPS6op3fgRCDTESqrEJwRKck+CILhJVO5VvaAZCq8JYf8HsR/HPpBOOPZfR" crossorigin="anonymous"> -->

        <!-- Latest compiled and minified JavaScript -->
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" integrity="sha384-vhJnz1OVIdLktyixHY4Uk3OHEwdQqPppqYR8+5mjsauETgLOcEynD9oPHhhz18Nw" crossorigin="anonymous"></script> -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    </head>
    <body cz-shortcut-listen="true" style="background-image: url(../img/bg.jpg );">

        <div class="site-wrapper" style="text-align: center;margin-top: 280px;font-family: 'Raleway', sans-serif;color: white;">
            <div class="site-wrapper-inner">
                <div class="cover-container">
                    <div class="inner-cover col-md-6" style="margin-left: 25%;">
                        <h1 class="cover-heading">
                           <b> APLIKASI LAPORAN MANAJEMEN PROYEK </b>
                        </h1>
                        <hr style="border-color: white;height: 4px;">
                        <p class="lead">
                            @if (Route::has('login'))
                                    @auth
                                        <a href="{{ url('/home') }}" class="btn btn-outline-primary btn-lg">Home</a>
                                    @else
                                        <a href="{{ route('skpd.home') }}" class="btn btn-primary btn-lg">SKPD</a>

                                        <a href="{{ route('home') }}" class="btn btn-success btn-lg">Member</a>

                                        <a href="{{ route('kepala.home') }}" class="btn btn-warning btn-lg" style="color: white;">Kepala</a>
                                    @endauth
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="intro-header">
            <div class="container">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h3>APLIKASI LAPORAN MANAJEMEN PROYEK</h3>
                        <hr class="intro-divider">
                        <ul>
                            @if (Route::has('login'))
                                    @auth
                                    <li>
                                        <a href="{{ url('/home') }}">Home</a></li>
                                    @else
                                    <li>
                                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg ">Login</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}" class="btn btn-success btn-lg">Register</a>
                                    </li>
                                    @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>     -->
        <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <h5>APLIKASI LAPORAN MANAGEMENT PROYEK</h5>
                </div>

                <div class="links">
                    <!-- <a href="https://laravel.com/docs">Documentation</a> -->
                    <!-- <a href="https://laracasts.com">Laracasts</a> -->
                    <!-- <a href="https://laravel-news.com">News</a> -->
                    <!-- <a href="https://forge.laravel.com">Forge</a> -->
                    <!-- <a href="https://github.com/laravel/laravel">GitHub</a> -->
           <!--      </div>
            </div>
        </div>  -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    </body>
</html>
