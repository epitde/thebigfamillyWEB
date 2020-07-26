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
            <li class="{{$active_url=='admin.home'?'active':'' }}">
                <a href="{{route('admin.home')}}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{$active_url=='admin.users'?'active':'' }}">
                <a href="{{route('admin.users')}}">
                    <i class="fa fa-users"></i>
                    <p>Users</p>
                </a>
            </li>
            <li class="{{$active_url=='admin.languages'?'active':'' }}">
                <a href="{{route('admin.languages')}}">
                    <i class="fa fa-globe"></i>
                    <p>Languages</p>
                </a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fa fa-language"></i>
                    <span>Translations</span>
                </a>
                <div id="collapsePages" class="collapse {{$active_url=='api.translate'?'show':'' }}"
                    aria-labelledby="collapsePages">
                    <div class="bg-white py-2 pl-3 collapse-inner rounded">
                        <ul class="nav">
                            @foreach ($languages as $language)
                            <li class="{{$active_url_path_id==$language->id?'active':'' }}">
                                <a class="nav-link collapse-item" href="{{route('api.translate', $language->id)}}">
                                    <i class="fa fa-circle" style="font-size: 1rem;"></i>{{$language->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
