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
                                        <i class="fa fa-check text-success icon"></i>
                                        @else
                                        <i class="fa fa-unlock text-gray icon"></i>
                                        @endif
                                    </div>
                                    <div class="col-lg-9 border-left">
                                        <h4 class="text-primary">Step 1</h5>
                                            <span>Fill out your verification application, click below to
                                                start</span><br>
                                            <a href="{{route('verification.form', $language->short_code)}}"
                                                class="btn btn-sm btn-primary py-0">
                                                Start
                                            </a>
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
                                        <i class="fa fa-check text-success icon"></i>
                                        @else
                                        <i class="fa fa-unlock text-gray icon"></i>
                                        @endif

                                        @else
                                        <i class="fa fa-lock text-gray icon"></i>
                                        @endif
                                    </div>
                                    <div class="col-lg-9 border-left">
                                        <h4 class="text-primary">Step 2</h5>
                                            <span>Upload your application</span><br>
                                            <button type="button" class="btn btn-sm btn-primary py-0"
                                                data-toggle="modal" data-target="#uploadFormModal"
                                                {{Auth::user()->generalProfile || Auth::user()->organizationProfile ? '' : 'disabled'}}>
                                                Upload
                                            </button>
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
