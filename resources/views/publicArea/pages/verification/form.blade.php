@extends('publicArea.layouts.authApp')

@section('content')
<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('verification.form.submit', $language->short_code)}}" method="post"
                            id="verificationForm">
                            @csrf
                            <div id="jquery-steps">
                                <h3>{{$language_json['VERIFICATION']["profile_section"]}}</h3>
                                <section>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="form-group m-4">
                                                <span class="mb-5" style="font-size: 1.4rem;">
                                                    <strong>
                                                        {{$language_json['VERIFICATION']["profile_type"]}}
                                                    </strong>
                                                </span>
                                                <br><br>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="gen_prof" name="profile_type"
                                                        class="custom-control-input"
                                                        value="{{\App\Models\User::PROFILE_TYPE['GENERAL']}}"
                                                        {{Auth::user()->profile_type == \App\Models\User::PROFILE_TYPE['GENERAL']?'checked' :''}}
                                                        {{$profile ? 'disabled':''}}>
                                                    <label class="custom-control-label" for="gen_prof">
                                                        {{$language_json['VERIFICATION']["profile_type_1"]}}
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="org_prof" name="profile_type"
                                                        class="custom-control-input"
                                                        value="{{\App\Models\User::PROFILE_TYPE['ORGANIZATIONAL']}}"
                                                        {{Auth::user()->profile_type == \App\Models\User::PROFILE_TYPE['ORGANIZATIONAL']?'checked' :''}}
                                                        {{$profile ? 'disabled':''}}>
                                                    <label class="custom-control-label" for="org_prof">
                                                        {{$language_json['VERIFICATION']["profile_type_2"]}}
                                                    </label>
                                                </div>
                                                <small class="type_err text-danger"></small>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>{{$language_json['VERIFICATION']["personal_details"]}}</h3>
                                <section>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="my-input">{{$language_json['VERIFICATION']["name"]}}</label>
                                                <input class="form-control" type="text" name="first_name"
                                                    value="{{Auth::user()->name}}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label
                                                    for="my-input">{{$language_json['VERIFICATION']["last_name"]}}</label>
                                                <input class="form-control" type="text" name="last_name"
                                                    value="{{Auth::user()->surname}}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <label for="my-input">{{$language_json['VERIFICATION']["dob"]}}</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for=""><b>{{$language_json['VERIFICATION']["year"]}}</b>
                                                        </label>
                                                        <select class="form-control" name="birth_year" id="birth_year">
                                                            <option></option>
                                                            @foreach($dates->getPastYears(90,\Carbon\Carbon::now()->subYears(16)->format('Y'))
                                                            as $year_id=> $year_name)
                                                            <option
                                                                {{ $profile ? $profile->birth_year==$year_id?'selected':'':''}}
                                                                value="{{ $year_id }}">{{ $year_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label
                                                            for="signal_text"><b>{{$language_json['VERIFICATION']["month"]}}</b>
                                                        </label>
                                                        <select class="form-control" name="birth_month"
                                                            id="birth_month">
                                                            <option></option>
                                                            @foreach ($dates->getMonths() as $month_id => $month_name)
                                                            <option
                                                                {{ $profile ? $profile->birth_month==$month_id?'selected':'':''}}
                                                                value="{{ $month_id }}">{{ $month_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label
                                                            for="signal_text "><b>{{$language_json['VERIFICATION']["day"]}}</b>
                                                        </label>
                                                        <select class="form-control" name="birth_day" id="birth_day">
                                                            <option></option>
                                                            @foreach ($dates->getDays() as $day_id => $day_name)
                                                            <option
                                                                {{ $profile ? $profile->birth_day==$day_name?'selected':'':''}}
                                                                value="{{ $day_id }}">{{ $day_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: -16px;">
                                                <div class="col-md">
                                                    <small class="date_err text-danger"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-3">
                                            <div class="form-group">
                                                <label
                                                    for="my-input">{{$language_json['VERIFICATION']["profession"]}}</label>
                                                <input class="form-control" type="text" name="profession"
                                                    value="{{ $profile ? $profile->profession:''}}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-3">
                                            <div class="form-group">
                                                <label
                                                    for="my-input">{{$language_json['VERIFICATION']["govt_id_number"]}}</label>
                                                <input class="form-control" type="text" name="govt_identification"
                                                    value="{{ $profile ? $profile->govt_identification:''}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>{{$language_json['VERIFICATION']["contact_details"]}}</h3>
                                <section>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label
                                                    for="my-input">{{$language_json['VERIFICATION']["street"]}}</label>
                                                <input class="form-control" type="text" name="main_address"
                                                    value="{{$profile ? $profile->main_address:''}}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="my-input">{{$language_json['VERIFICATION']["city"]}}</label>
                                                <input class="form-control" type="text" name="city"
                                                    value="{{$profile ? $profile->city:''}}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label
                                                    for="my-input">{{$language_json['VERIFICATION']["country"]}}</label>
                                                <input class="form-control" type="text" name="country"
                                                    value="{{$profile ? $profile->country:''}}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label
                                                    for="my-input">{{$language_json['VERIFICATION']["mobile_phone"]}}</label>
                                                <input class="form-control" type="text" name="mobile_phone"
                                                    value="{{$profile ? $profile->mobile_phone:''}}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label
                                                    for="my-input">{{$language_json['VERIFICATION']["home_phone"]}}<small>({{$language_json['VERIFICATION']["optional"]}})</small>
                                                </label>
                                                <input class="form-control" type="text" name="main_phone"
                                                    value="{{$profile ? $profile->main_phone:''}}">
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('css')

@include('publicArea.pages.verification.assets.css')

@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('select').select2({
            theme: 'bootstrap',
            placeholder: ''
        });
    });
    var form = $("#verificationForm");

    $('#jquery-steps').steps({
        headerTag: "h3",
        bodyTag: "section",
        onStepChanging: function (event, currentIndex, newIndex) {
            if (newIndex < currentIndex) {
                return true;
            }
            if (currentIndex == 0) {
                $('.type_err').html('');
                let value = $('input[name="profile_type"]:checked').val();

                if (!value) {
                    $('.type_err').html("{{$language_json['VERIFICATION']['profile_selection_err']}}");
                    return false;
                }
            }

            if (currentIndex == 1) {
                $('.date_err').html('');
                let birth_year = $('#birth_year :selected').text();
                let birth_month = $('#birth_month :selected').text();
                let birth_day = $('#birth_day :selected').text();

                if (birth_year == '' || birth_month == '' || birth_day == '') {
                    $('.date_err').html("{{$language_json['VERIFICATION']['required_err_msg']}}");
                    if (form.length == 1) {
                        form.validate().settings.ignore = ":disabled,:hidden";
                        return form.valid();
                    }
                    return false;
                }
            }

            if (form.length == 1) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            }
            return true;
        },
        onFinishing: function (event, currentIndex) {
            if (form.length == 1) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            }
            return true;
        },
        onFinished: function (event, currentIndex) {
            $("#verificationForm").submit();
        }
    });

</script>
@endsection
