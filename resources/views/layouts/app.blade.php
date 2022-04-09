<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="{{asset('css.lightbox.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('plugin/ckeditor.js') }}"></script>
    <script src="{{ asset('plugin/js/sample.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('plugin/css/samples.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/toolbarconfigurator/lib/codemirror/neo.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body id="body-pd">
<div id="app">
   <div class="last-header">
       <header class="header" id="header">
           <div class="header_toggle"><i class='bx bx-menu' id="header-toggle"></i></div>
           <div class="header_img"><img src="https://i.imgur.com/hczKIze.jpg" alt=""></div>
       </header>
       <div class="l-navbar" id="nav-bar">
           <nav class="nav">
               <div><a href="/home" class="nav_logo"> <i class="fa fa-home" style="font-size:24px"></i><span class="nav_logo-name">Գլխավոր</span>
                   </a>
                   <div class="nav_list">
                       <ul class="navbar-nav ms-auto">
                           <!-- Authentication Links -->
                           @guest
                               @if (Route::has('login'))
                                       <a href="{{ route('login') }}" class="nav_link active"> <i class='bx bx-log-in'></i> <span class="nav_name">Մուտք</span> </a>
                               @endif

                               @if (Route::has('register'))
                                       <a href="{{ route('register') }}" class="nav_link active"> <i class='bx bxs-registered'></i> <span class="nav_name">Գրանցվել</span> </a>
                               @endif
                           @else
                               <a href="{{asset('student/posts')}}" class="nav_link {{ (request()->is('student/posts')) ? 'active' : '' }}"> <i class='bx bx-street-view' ></i> <span class="nav_name">Պոստեր</span> </a>
                               @teacher
                               <a href="{{asset('group')}}" class="nav_link {{ (request()->is('group')) ? 'active' : '' }}"> <i class='bx bxs-group' ></i> <span class="nav_name">Խմբեր</span> </a>
                               <a href="{{asset('lesson')}}" class="nav_link {{ (request()->is('lesson')) ? 'active' : '' }}"> <i class='bx bxs-book' ></i> <span class="nav_name">Դասընթացներ</span> </a>
                               <a href="{{asset('groupUsers')}}" class="nav_link {{ (request()->is('groupUsers')) ? 'active' : '' }}"> <i class='bx bx-user-plus' ></i> <span class="nav_name">Ավելացնել ուսանող</span> </a>
                               <a href="{{asset('users')}}" class="nav_link {{ (request()->is('users')) ? 'active' : '' }}"> <i class='bx bx-user-plus' ></i> <span class="nav_name">Ուսանողները</span> </a>
                               <a href="{{asset('homeworks')}}" class="nav_link {{ (request()->is('homeworks')) ? 'active' : '' }}"> <i class='bx bx-user-plus' ></i> <span class="nav_name">Տնային աշխատանքներ</span> </a>
                               <a href="{{asset('employment')}}" class="nav_link {{ (request()->is('employment')) ? 'active' : '' }}"> <i class='bx bx-user-plus' ></i> <span class="nav_name">Պլանավորում</span> </a>
                               @endteacher
                               <a href="{{asset('profiles/student/'.Auth::id())}}" class="nav_link {{ (request()->is('profiles/student/')) ? 'active' : '' }}"> <i class='bx bx-user' ></i> <span class="nav_name">Պրոֆիլի էջ</span> </a>
                               <a href="{{asset('user/groups')}}" class="nav_link {{ (request()->is('user/groups')) ? 'active' : '' }}"> <i class='bx bx-book-open' ></i> <span class="nav_name">Իմ խմբերը</span> </a>

                       @endguest

                   </div>
               </div>
               @guest
               @else
               <a class="nav_link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                   <i class='bx bx-log-out nav_icon'></i>
                   {{ __('Logout') }}
               </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
               </form>

               @endguest
           </nav>
       </div>
   </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        @yield('content')
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
