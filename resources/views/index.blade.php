<!DOCTYPE html>
<html>
<head>
    <title>@yield('tittle')</title>
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
</head>

<body>
<div class="container">

    <!-- Navigation Menu -->
    <nav class="navbar navbar-inverse">
        <a class="navbar-brand" href="#">REST API</a>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('missions') }}">Missions</a></li>
            <li><a href="{{ URL::to('missions/create') }}">Create a mission</a></li>
        </ul>
    </nav>

    <h2> @yield('tittle') </h2>

    <!-- Message Block -->
    @if(Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

                <!-- Main Content -->
        <div class="content">
            @yield('content')
        </div>
</div>
</body>
</html>