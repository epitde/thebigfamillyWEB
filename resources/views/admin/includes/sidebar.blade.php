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
                            <li class="{{$active_url_path_id==$language->short_code?'active':'' }}">
                                <a class="nav-link collapse-item"
                                    href="{{route('api.translate', $language->short_code)}}">
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
