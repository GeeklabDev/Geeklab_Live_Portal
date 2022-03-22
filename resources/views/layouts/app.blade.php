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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @guest
                @else
                    <ul class="navbar-nav me-auto">
                        <li>
                            <a class="nav-link" href="{{asset('student/posts')}}">GEEKLAB</a>
                        </li>
                        @teacher
                        <li>
                            <a class="nav-link {{ (request()->is('group')) ? 'active' : '' }}" href="{{asset('group')}}">Add Group</a>
                        </li>
                        <li>
                            <a class="nav-link {{ (request()->is('lesson')) ? 'active' : '' }}" href="{{asset('lesson')}}">Add Lesson</a>
                        </li>
                        <li>
                            <a class="nav-link {{ (request()->is('groupUsers')) ? 'active' : '' }}" href="{{asset('groupUsers')}}">Add Student</a>
                        </li>
                        @endteacher
                        <li>
                            <a class="nav-link {{ (request()->is('user/groups')) ? 'active' : '' }}" href="{{asset('user/groups')}}">User Groups</a>
                        </li>
                    </ul>
                @endguest
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/profiles/student/{{Auth::id()}}">
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    })
</script>

</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
</html>
