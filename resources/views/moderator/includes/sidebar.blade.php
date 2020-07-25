@php
$languages = services\facade\LanguageFacade::getAllLanguages();
@endphp

<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{asset('dashboard/img/logo-small.png')}}">
            </div>
            <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{$active_url=='moderator.home'?'active':'' }}">
                <a href="{{route('moderator.home')}}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
        </ul>
    </div>
</div>
