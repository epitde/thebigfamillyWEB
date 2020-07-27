<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />

    {{-- Load CSS files --}}
    @include('translator.includes.css')

    {{-- get the current url --}}
    @php
    $active_url = Route::currentRouteName();
    $active_url_path_id = "";

    if ($active_url == 'api.translate') {
    $active_url_path_id = Route::getCurrentRoute()->parameters['short_code'];
    }
    @endphp
</head>

<body>
    <div class="wrapper ">

        {{-- Load Sidebar --}}
        @include('translator.includes.sidebar')

        <div class="main-panel">

            {{-- Load Navbar --}}
            @include('translator.includes.navbar')

            <div class="content" style="min-height:80vh;">
                {{-- Fetch Content --}}
                @yield('content')
            </div>

            {{-- Load Foooter --}}
            @include('translator.includes.footer')

        </div>

    </div>

    {{-- Load JS files --}}
    @include('translator.includes.js')

</body>

</html>
