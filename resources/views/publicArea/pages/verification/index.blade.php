@extends('publicArea.layouts.authApp')

@section('content')
<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h3 class="text-primary">
                    Welcome {{Auth::user()->name}}&nbsp;{{Auth::user()->surname}}
                </h3>
                <br>
                <p>Please complete this verification process to access your account.</p>
                <div class="row mx-3">
                    <div class="col-lg-8 mt-3">
                        <div class="card py-4 box">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-lg-3 text-center">
                                        @if (Auth::user()->generalProfile || Auth::user()->organizationProfile)
                                        <i class="fa fa-check text-success icon  pt-3"></i>
                                        @else
                                        <i class="fa fa-unlock text-gray icon  pt-3"></i>
                                        @endif
                                    </div>
                                    <div class="col-lg-9 border-left">
                                        <h4 class="text-primary">Step 1</h5>
                                            <span>Click below to fill out your verification application
                                            </span><br>
                                            @if (Auth::user()->generalProfile || Auth::user()->organizationProfile)
                                            <a href="{{route('verification.form.preview', $language->short_code)}}"
                                                class="btn btn-orange">
                                                View Application
                                            </a>
                                            @else
                                            <a href="{{route('verification.form', $language->short_code)}}"
                                                class="btn btn-orange">
                                                Get Started
                                            </a>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card py-4
                            {{Auth::user()->generalProfile || Auth::user()->organizationProfile ? 'box' : 'blur'}}">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-lg-3 text-center">
                                        @if (Auth::user()->generalProfile || Auth::user()->organizationProfile)

                                        @if ((Auth::user()->generalProfile && Auth::user()->generalProfile->status) ||
                                        Auth::user()->organizationProfile && Auth::user()->organizationProfile->status)
                                        <i class="fa fa-check text-success icon  pt-3"></i>
                                        @else
                                        <i class="fa fa-unlock text-gray icon  pt-3"></i>
                                        @endif

                                        @else
                                        <i class="fa fa-lock text-gray icon  pt-3"></i>
                                        @endif
                                    </div>
                                    <div class="col-lg-9 border-left">
                                        <h4 class="text-primary">Step 2</h5>
                                            <span>Upload your application and other documents</span><br>
                                            <a href="{{route('verification.form.upload.view', $language->short_code)}}"
                                                class="btn btn-orange
                                                {{Auth::user()->generalProfile || Auth::user()->organizationProfile ? '' : 'disabled'}}
                                                {{Auth::user()->generalProfile &&  Auth::user()->generalProfile->status|| Auth::user()->organizationProfile &&  Auth::user()->organizationProfile->status ? 'disabled' : ''}}">
                                                Upload Documents
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="card py-4
                            {{Auth::user()->generalProfile &&  Auth::user()->generalProfile->status|| Auth::user()->organizationProfile &&  Auth::user()->organizationProfile->status ? 'box' : 'blur'}}">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-lg-3 text-center">
                                        @if (Auth::user()->generalProfile && Auth::user()->generalProfile->status||
                                        Auth::user()->organizationProfile && Auth::user()->organizationProfile->status)

                                        @if (Auth::user()->is_verified)
                                        <i class="fa fa-check text-success icon  pt-3"></i>
                                        @else
                                        <i class="fa fa-spinner text-gray icon  pt-3"></i>
                                        @endif

                                        @else
                                        <i class="fa fa-lock text-gray icon  pt-3"></i>
                                        @endif
                                    </div>
                                    <div class="col-lg-9 border-left">
                                        <h4 class="text-primary">Step 3</h5>
                                            @if (Auth::user()->is_verified)
                                            <span>Congratulations!! You have been verified </span><br>
                                            @switch(Auth::user()->user_role)
                                            @case(App\Models\User::USER_ROLES['ADMIN'])
                                            <a href="{{route('admin.home')}}" class="btn btn-orange">
                                                Go to Dashboard
                                            </a>
                                            @break
                                            @case(App\Models\User::USER_ROLES['GENERAL'])
                                            <a href="{{route('general.home')}}" class="btn btn-orange">
                                                Go to Dashboard
                                            </a>
                                            @break
                                            @case(App\Models\User::USER_ROLES['MODERATOR'])
                                            <a href="{{route('moderator.home')}}" class="btn btn-orange">
                                                Go to Dashboard
                                            </a>
                                            @break
                                            @case(App\Models\User::USER_ROLES['TRANSLATOR'])
                                            <a href="{{route('translator.home')}}" class="btn btn-orange">
                                                Go to Dashboard
                                            </a>
                                            @break
                                            @default
                                            @endswitch
                                            @else
                                            <span>Your application is under review</span><br>
                                            <a href="{{route('public.home', $language->short_code)}}"
                                                class="btn btn-orange">
                                                Go to Home
                                            </a>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('css')
<style>
    .btn-orange {
        color: #fff;
        background-color: #ff9421;
        border-color: #ff9421;
    }

    .icon {
        font-size: 4rem;
    }

    .blur {
        filter: blur(2px);
        -webkit-filter: blur(2px);

    }

    .box {
        transition: box-shadow .3s;
        cursor: pointer;
    }

    .box:hover {
        box-shadow: 0 0 15px rgba(33, 33, 33, .2);
    }

</style>

@endsection

@section('js')

@endsection
