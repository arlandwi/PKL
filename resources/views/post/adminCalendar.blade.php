<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>DISKOMINFO SITUBONDO</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/parsley.min.css') }}">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap-theme.min.css" integrity="sha384-jzngWsPS6op3fgRCDTESqrEJwRKck+CILhJVO5VvaAZCq8JYf8HsR/HPpBOOPZfR" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" integrity="sha384-vhJnz1OVIdLktyixHY4Uk3OHEwdQqPppqYR8+5mjsauETgLOcEynD9oPHhhz18Nw" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <script src="{{ asset('js/app.js') }}"></script>
</head>

  <body>
    <div id="app">
      <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
          <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
            <!-- {{ config('app.name', 'Laravel') }} -->
              DISKOMINFO SITUBONDO
            </a>
          </div>

          <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">&nbsp;</ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
             <!-- Authentication Links -->
                          
              @guest
                <li><a href="{{ route('admin.login') }}">Login</a></li>
              @elseif ( Auth::user()->status === 'admin' )
              <li><a href="{{ route('admin.home') }}">Home</a></li>
              <li><a href="{{route('post.index.admin')}}">Project</a></li>
              <li><a href="{{route('post.admincalendar')}}">Calendar</a></li>
              <li><a href="{{ route('post.notification.admin')}}">Notification</a></li>
              <li><a href="{{ route('post.member.admin') }}">List Akun</a></li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

                <ul class="dropdown-menu">
                  <li><a href="{{ route('post.profil.admin') }}">Edit Profile</a></li>
                  <li><a href="" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </li>

              @else
                <li><a href="{{ route('admin.login') }}">Login</a></li>  
                <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
              @endguest                   
            </ul>
          </div>
        </div>
      </nav>
      <!-- Scripts -->
      <script src="http://code.jquery.com/jquery.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
      <section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Calendar</h2>
              <hr>
            </div> 
          </div>
          <div class="row">
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div class="panel panel-primary">
                    <div class="panel-heading">Calendar Task</div>
                    <div class="panel-body" >
                      {!! $calendar_details->script() !!}
                      {!! $calendar_details->calendar() !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </body>
</html>
<!-- footer -->
<footer>
  <div class="container text-center">
    <div class="row">
      <div class="col-sm-12">
        <p>&copy; copyright 2019 by Tim PKN UMM.</p>
      </div>
    </div>
  </div>
</footer>   
<!-- Akhir footer -->
