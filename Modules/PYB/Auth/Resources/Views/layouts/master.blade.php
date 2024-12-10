<!DOCTYPE html>
<html lang="en">

<head>
    @include('Auth::section.meta');
    {{--  load meta --}}
    <title>@yield('title') | {{ Config('app.name') }}</title>

    @include('Auth::section.css');
    {{--  load css --}}
</head>

<body class="authentication-bg">

    <div class="home-btn d-none d-sm-block">
        <a href="{{ route('home.index') }}"><i class="fas fa-home h2 text-dark"></i></a>
    </div>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            @yield('content')
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    @include('Auth::section.js');     {{--  load JS --}}


</body>

</html>
