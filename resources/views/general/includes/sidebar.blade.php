@php
$languages = services\facade\LanguageFacade::getAllLanguages();
@endphp

<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo1 mt-1">
        <a href="{{route('public.home')}}" class="simple-text logo-mini logo-normal" style="min-width: 80%">
            {{-- <div> --}}
            <img src="{{asset('dashboard/img/logo_translate.png')}}">
            {{-- </div> --}}
            <!-- <p>CT</p> -->
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{$active_url=='general.home'?'active':'' }}">
                <a href="{{route('general.home')}}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
        </ul>
    </div>
</div>
