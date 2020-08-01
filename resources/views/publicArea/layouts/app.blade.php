<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Family App | landing</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    @include('publicArea.includes.css')
</head>

<body>
    @include('publicArea.includes.navbar')

    @yield('content')
    <a class="scropll-top-btn" id="scrollTop" href="#"><i class="fas fa-long-arrow-alt-up"></i></a>

    @include('publicArea.includes.footer')

    @include('publicArea.includes.js')
</body>

</html>
