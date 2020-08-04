@extends('publicArea.layouts.authApp')

@section('content')
<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-10">
                        <h3 class="text-primary">
                            {{$language_json['VERIFICATION']["welcome"]}}&nbsp;{{Auth::user()->name}}&nbsp;{{Auth::user()->surname}}
                        </h3>
                        <br>
                        <p>{{$language_json['VERIFICATION']["instruction_msg"]}}</p>
                    </div>
                    <div class="col-lg-2">
                        <label for="language_id">{{$language_json['VERIFICATION']["choose_lang"]}}</label>
                        <select class="form-control" id="language_id" onchange="languages()">
                            <option></option>
                            @foreach ($languages as $one_language)
                            <option value="{{ $one_language->short_code }}"
                                {{ $one_language->short_code==$language->short_code?'selected':'' }}>
                                {{ $one_language->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
                                        <h4 class="text-primary">{{$language_json['VERIFICATION']["step"]}} 1
                                        </h4>
                                        <span>
                                            {{$language_json['VERIFICATION']["step_1_instruction"]}}
                                        </span>
                                        <br>
                                        @if (Auth::user()->generalProfile || Auth::user()->organizationProfile)
                                        <a href="{{route('verification.form.preview', $language->short_code)}}"
                                            class="btn btn-orange">
                                            {{$language_json['VERIFICATION']["step_1_btn_1_text"]}}
                                        </a>
                                        @else
                                        <a href="{{route('verification.form', $language->short_code)}}"
                                            class="btn btn-orange">
                                            {{$language_json['VERIFICATION']["step_1_btn_2_text"]}}
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
                                        <h4 class="text-primary">{{$language_json['VERIFICATION']["step"]}} 2</h4>
                                        <span>
                                            {{$language_json['VERIFICATION']["step_2_instruction"]}}
                                        </span>
                                        <br>
                                        <a href="{{route('verification.form.upload.view', $language->short_code)}}"
                                            class="btn btn-orange
                                                {{Auth::user()->generalProfile || Auth::user()->organizationProfile ? '' : 'disabled'}}
                                                {{Auth::user()->generalProfile &&  Auth::user()->generalProfile->status|| Auth::user()->organizationProfile &&  Auth::user()->organizationProfile->status ? 'disabled' : ''}}">
                                            {{$language_json['VERIFICATION']["step_2_btn_1_text"]}}
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
                                        <h4 class="text-primary">{{$language_json['VERIFICATION']["step"]}} 3</h4>
                                        @if (Auth::user()->is_verified)
                                        <span>{{$language_json['VERIFICATION']["step_3_instruction_1"]}}</span><br>
                                        @switch(Auth::user()->user_role)
                                        @case(App\Models\User::USER_ROLES['ADMIN'])
                                        <a href="{{route('admin.home')}}" class="btn btn-orange">
                                            {{$language_json['VERIFICATION']["step_3_btn_1_text"]}}
                                        </a>
                                        @break
                                        @case(App\Models\User::USER_ROLES['GENERAL'])
                                        <a href="{{route('general.home')}}" class="btn btn-orange">
                                            {{$language_json['VERIFICATION']["step_3_btn_1_text"]}}
                                        </a>
                                        @break
                                        @case(App\Models\User::USER_ROLES['MODERATOR'])
                                        <a href="{{route('moderator.home')}}" class="btn btn-orange">
                                            {{$language_json['VERIFICATION']["step_3_btn_1_text"]}}
                                        </a>
                                        @break
                                        @case(App\Models\User::USER_ROLES['TRANSLATOR'])
                                        <a href="{{route('translator.home')}}" class="btn btn-orange">
                                            {{$language_json['VERIFICATION']["step_3_instruction_2"]}}
                                        </a>
                                        @break
                                        @default
                                        @endswitch
                                        @else
                                        <span>{{$language_json['VERIFICATION']["step_3_btn_1_text"]}}</span><br>
                                        <a href="{{route('public.home', $language->short_code)}}"
                                            class="btn btn-orange
                                                {{Auth::user()->generalProfile &&  Auth::user()->generalProfile->status|| Auth::user()->organizationProfile &&  Auth::user()->organizationProfile->status ? '' : 'disabled'}}">
                                            {{$language_json['VERIFICATION']["step_3_btn_2_text"]}}
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

    select.form-control:not([size]):not([multiple]) {
        height: calc(1.5em + .75rem + 2px);
        font-size: 0.1rem;
    }

</style>

@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('select').select2({
            theme: 'bootstrap',
            placeholder: ''
        });
    });

    //get language
    function languages() {
        window.location.href = '{{ url("/verification/") }}/' + $('#language_id').val();
    }

</script>
@endsection
