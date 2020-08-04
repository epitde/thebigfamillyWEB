<div id="form-pdf" class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center py-2">
                    {{$language_json['VERIFICATION']["your_verification_form"]}}
                </h3>
                <hr>
                <form action="">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pb-2" style="max-width: max-content;">
                                <h4>
                                    {{$language_json['VERIFICATION']["personal_details"]}}
                                </h4>
                                <hr>
                            </div>
                            <div class="form-group my-2">
                                <div class="row">
                                    <div class="col-lg-auto">
                                        <label for="my-input">{{$language_json['VERIFICATION']["full_name"]}}:</label>
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" type="text" id="first_name"
                                            value="{{$profile->name}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group my-2">
                                <div class="row">
                                    <div class="col-lg-auto">
                                        <label for="my-input">{{$language_json['VERIFICATION']["dob"]}}:</label>
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" type="text" id="dob"
                                            value="{{$profile->birth_day}}/{{$profile->birth_month}}/{{$profile->birth_year}}"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group my-2">
                                <div class="row">
                                    <div class="col-lg-auto">
                                        <label for="my-input">{{$language_json['VERIFICATION']["profession"]}}:</label>
                                    </div>
                                    <div class="col-lg">
                                        <input id="profession" class="form-control" type="text"
                                            value="{{$profile->profession}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group my-2">
                                <div class="row">
                                    <div class="col-lg-auto">
                                        <label for="my-input">{{$language_json['VERIFICATION']["id_number"]}}:</label>
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" type="text" name="first_name"
                                            value="{{$profile->govt_identification}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="pb-2" style="max-width: max-content;">
                                <h4>{{$language_json['VERIFICATION']["contact_details"]}}</h4>
                                <hr>
                            </div>
                            <div class="form-group my-2">
                                <div class="row">
                                    <div class="col-lg-auto">
                                        <label for="my-input">{{$language_json['VERIFICATION']["street"]}}:</label>
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" type="text" name="first_name"
                                            value="{{$profile->main_address}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group my-2">
                                <div class="row">
                                    <div class="col-lg-auto">
                                        <label for="my-input">{{$language_json['VERIFICATION']["city"]}}:</label>
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" type="text" value="{{$profile->city}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group my-2">
                                <div class="row">
                                    <div class="col-lg-auto">
                                        <label for="my-input">{{$language_json['VERIFICATION']["country"]}}:</label>
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" type="text" value="{{$profile->country}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group my-2">
                                <div class="row">
                                    <div class="col-lg-auto">
                                        <label
                                            for="my-input">{{$language_json['VERIFICATION']["mobile_phone"]}}:</label>
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" type="text" name="first_name"
                                            value="{{$profile->mobile_phone}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group my-2">
                                <div class="row">
                                    <div class="col-lg-auto">
                                        <label for="my-input">{{$language_json['VERIFICATION']["home_phone"]}}:</label>
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" type="text" name="first_name"
                                            value="{{$profile->main_phone?$profile->main_phone:'-'}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-lg-6 text-left mt-5 pt-3 pr-5
                                            {{Auth::user()->profile_type == app\Models\User::PROFILE_TYPE['GENERAL']?'hidden':''}}">
                            <div class="form-group text-center">
                                <div class="extra-field">
                                </div>
                                <input id="signing-field-control" class="form-control" type="text">
                                <span id="signing-field-err"></span>
                                <a id="add-field" class="btn btn-sm btn-info py-0 mt-1" href="javascript:void(0)"
                                    onclick="addSignField()"
                                    title="{{$language_json['VERIFICATION']["adding_btn_tooltip"]}}">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <a id="remove-field" class="btn btn-sm btn-info py-0 mt-1 d-none"
                                    href="javascript:void(0)" onclick="removeSignField()"
                                    title="{{$language_json['VERIFICATION']["remove_btn_tooltip"]}}">
                                    <i class="fa fa-minus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right mt-5 pt-3 pl-5">
                            <div class="form-group text-center">
                                <input class="form-control" type="text" name="first_name">
                                <label for="my-input">{{$profile->name}}</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .hidden {
        visibility: hidden;
    }

</style>
