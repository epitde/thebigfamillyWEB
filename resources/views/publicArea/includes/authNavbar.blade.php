<!-- navbar-->
<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('dashboard/img/logo_translate_removebg.png')}}" alt="" width="210">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item px-1"><a class="nav-link link-scroll active"
                            href="{{route('public.home')}}#hero">Home
                            <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item px-1"><a class="nav-link link-scroll"
                            href="{{route('public.home')}}#about">About</a></li>
                    <li class="nav-item px-1"><a class="nav-link link-scroll"
                            href="{{route('public.home')}}#services">Services</a></li>
                    <li class="nav-item px-1"><a class="nav-link link-scroll"
                            href="{{route('public.home')}}#testimonials">Testimonials</a></li>
                    @if (Auth::user())
                    <li class="nav-item px-1">
                        @switch(Auth::user()->user_role)
                        @case(App\Models\User::USER_ROLES['ADMIN'])
                        <a class="nav-link link-scroll btn btn-outline-primary"
                            href="{{route('admin.home')}}">Dashboard</a>
                        @break
                        @case(App\Models\User::USER_ROLES['GENERAL'])
                        <a class="nav-link link-scroll btn btn-outline-primary"
                            href="{{route('general.home')}}">Dashboard</a>
                        @break
                        @case(App\Models\User::USER_ROLES['MODERATOR'])
                        <a class="nav-link link-scroll btn btn-outline-primary"
                            href="{{route('moderator.home')}}">Dashboard</a>
                        @break
                        @case(App\Models\User::USER_ROLES['TRANSLATOR'])
                        <a class="nav-link link-scroll btn btn-outline-primary"
                            href="{{route('translator.home')}}">Dashboard</a>
                        @break
                        @default
                        @endswitch
                    </li>
                    <li class="nav-item px-1">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link link-scroll btn btn-outline-primary" type="Submit">Logout</button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item px-2">
                        <a class="nav-link link-scroll btn btn-outline-primary" href="{{route('register')}}">Sign
                            Up</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link link-scroll btn btn-outline-primary" href="{{route('login')}}">Login</a>
                    </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
</header>
