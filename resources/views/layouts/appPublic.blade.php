<!doctype html>
<html lang="en">
<head>
    @yield('head')
    <title>@yield('title')</title>
</head>
<body>

<!-- navigation -->
@yield('navigation')

<!-- header -->
@yield('header')


<!-- Main Content -->

@yield('content')

<hr>

<!-- Footer -->

@yield('footer')


@yield('js')

</body>
</html>
