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
                            <li><a href="{{ route('admin.login') }}">Login</a></li>
                        @elseif ( Auth::user()->status === 'admin' )
                            <li><a href="{{ route('admin.home') }}">Home</a></li>
                            <li><a href="{{route('post.index.admin')}}">Project</a></li>
                            <li><a href="{{ route('post.notification.admin')}}">Notification</a></li>
                            <li><a href="{{ route('post.member.admin') }}">List Akun</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('post.profil.admin') }}">Edit Profile</a>
                                    </li>
                                    <li>
                                        <a href=""
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

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
        @include('layouts.partials._alerts')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/parsley.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>

     <script type="text/javascript">
        $('.select2-multi').select2();
      </script>

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

//Modal Edit Task->
        $('#edittask').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var judul = button.data('judul') 
          var isi = button.data('isi')
          var mulai = button.data('mulai') 
          var deadline = button.data('deadline')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #judul').val(judul);
          modal.find('.modal-body #isi').val(isi);
          modal.find('.modal-body #mulai').val(mulai);
          modal.find('.modal-body #deadline').val(deadline);
        })
//End//

//modal hapus komen
        $('#hapuskomen').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })

//modal hapus task
        $('#hapustask').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })

//modal edit projects
        $('#editproject').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var title = button.data('title')
          var content = button.data('content')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #title').val(title);
          modal.find('.modal-body #content').val(content);
        })

//modal hapus project
        $('#hapusproject').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })

//modal hapus notif
        $('#hapusnotif').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          }) 

//lihat detail
        $('#lihat').on('show.bs.modal', function (event){
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })


//modal ubah status
        $('#ubahstatus').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var status = button.data('status')  
          var modal = $(this)
          if (status === "Belum Di Proses") {
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #status').val(status);    
            modal.find('.modal-body #status1').val("Sedang Di Proses");  
          }else if (status === "Sedang Di Proses"){
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #status').val(status);    
            modal.find('.modal-body #status1').val("Selesai");  
          }
        })

//modal edit member
        $('#edit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var name = button.data('name')
          var email = button.data('email')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #name').val(name);
          modal.find('.modal-body #email').val(email);
        })

//modal hapus member
        $('#hapus').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })

//modal edit skpd
        $('#editskpd').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var name = button.data('name')
          var email = button.data('email')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #name').val(name);
          modal.find('.modal-body #email').val(email);
        })

//modal hapus skpd
        $('#hapusskpd').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })

//modal edit kepala
        $('#editkepala').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var name = button.data('name')
          var email = button.data('email')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #name').val(name);
          modal.find('.modal-body #email').val(email);
        })

//modal hapus kepala
        $('#hapuskepala').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })
    </script>
</body>
</html>
