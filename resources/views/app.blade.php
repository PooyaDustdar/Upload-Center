<html class="">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{url('/')}}/css/styles.css"/>
    <link rel="stylesheet" href="{{url('/')}}/vendor/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css"/>
    <title>Upload Center</title>
</head>
<body>
<header>
    <h1>Upload Center</h1>
    <ul class="text-center nav navbar-nav">
        <li><a href="{{ url('/') }}">Home</a></li>
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else
            <li><a href="{{ url('/home') }}">Panel</a></li>
            <li><a href="{{ url('/logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout').submit();">Logout</a></li>
            <form id="logout" method="post" action="{{ url('/logout') }}">{{csrf_field()}}</form>
        @endif
    </ul>
</header>
@yield('content')
</body>
</html>