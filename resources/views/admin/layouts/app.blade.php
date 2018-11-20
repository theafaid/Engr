<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }} Dashboard
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{auth()->user()->image()}}" class="rounded-circle" width="40" height="35">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        My Profile
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class='container'>
            <div class='row'>
                @auth
                <div class='col-lg-4'>
                    <ul class='list-group'>
                        <li class='list-group-item'>
                            <a href="{{ route('home') }}">Home Page</a >
                        </li>

                        @admin
                            <li class='list-group-item'>
                            <a href="{{ route('users.index') }}">Users</a >
                        </li>

                        <li class='list-group-item'>
                            <a href="{{ route('categories.index') }}">Categories</a >
                        </li>

                        <li class='list-group-item'>
                            <a href="{{ route('tags.index') }}">Tags</a >
                        </li>
                        @endadmin


                        <li class='list-group-item'>
                            <a href="{{ route('posts.index') }}">Posts</a >
                        </li>

                        

                        <li class='list-group-item'>
                            <a href="{{ route('posts.trashed') }}">Trashed Posts</a >
                        </li>

                        <li class='list-group-item'>
                            <a href="{{ route('posts.create') }}">Create New Post</a >
                        </li>

                        @admin
                        <li class='list-group-item'>
                            <a href="{{ route('users.create') }}">Create New User</a >
                        </li>

                         <li class='list-group-item'>
                            <a href="{{ route('categories.create') }}">Create New Category</a >
                        </li>

                        <li class='list-group-item'>
                            <a href="{{ route('tags.create') }}">Create New Tag</a >
                        </li>

                        <li class='list-group-item'>
                            <a href="{{ route('settings') }}">Site Settings</a >
                        </li>
                        @endadmin
                    </ul>
                </div>
                @endauth
                <div class='col-lg-8'>
                    @include('admin.layouts.message')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('/js/app.js')}}"></script>

    @stack('js')

</body>
</html>
