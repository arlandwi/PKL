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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap-theme.min.css" integrity="sha384-jzngWsPS6op3fgRCDTESqrEJwRKck+CILhJVO5VvaAZCq8JYf8HsR/HPpBOOPZfR" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" integrity="sha384-vhJnz1OVIdLktyixHY4Uk3OHEwdQqPppqYR8+5mjsauETgLOcEynD9oPHhhz18Nw" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css">

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
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>

                        @else
                            <li><a href="{{ route('home') }}">Home</a></li>
                             <li><a href="{{route('post.calendar')}}">Calendar</a></li>
                            <li><a href="{{route('post.notifuser')}}">Notification</a></li>
                            <li><a href="{{route('post.portfolio')}}">Portfolio</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{route('post.profil.user')}}">Edit Profile</a>
                                    </li>
                                    <li>
                                        <a href=""
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('user.logout') }}" method="GET" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @include('layouts.partials._alerts')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    

     <script>
        $('#myModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var name = button.data('name') 
          var email = button.data('email') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #name').val(name);
          modal.find('.modal-body #email').val(email);
        })

        $('#lihatuser').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var project = button.data('project') 
          var judul = button.data('judul')
          var deadline = button.data('deadline')
          var isi = button.data('isi') 
          var modal = $(this)
          modal.find('.modal-body #project').val(project);
          modal.find('.modal-body #judul').val(judul);
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #deadline').val(deadline);
          modal.find('.modal-body #isi').val(isi);
        })

        //modal ubah status
        $('#ubahstatustask').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var status = button.data('status')  
          var modal = $(this)
          if (status === "Belum Dikerjakan") {
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #status').val(status);    
            modal.find('.modal-body #status1').val("Sedang Dikerjakan");  
          }else if (status === "Sedang Dikerjakan"){
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #status').val(status);    
            modal.find('.modal-body #status1').val("Selesai");  
          }
        })

    </script>

     <!-- Scripts -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js">
    </script>
     <!-- Scripts -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
</body>
</html>
