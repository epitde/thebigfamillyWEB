<div id="form-pdf" class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center py-2">Your Verfication Form</h3>
                <hr>
                <form action="">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pb-2" style="max-width: max-content;">
                                <h4>Personal Information</h4>
                                <hr>
                            </div>
                            <div class="form-group my-2">
                                <div class="row">
                                    <div class="col-lg-auto">
                                        <label for="my-input">Full Name:</label>
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
                                        <label for="my-input">Date of Birth:</label>
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
                                        <label for="my-input">Profession:</label>
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
                                        <label for="my-input">Identification Number:</label>
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
                                <h4>Contact Information</h4>
                                <hr>
                            </div>
                            <div class="form-group my-2">
                                <div class="row">
                                    <div class="col-lg-auto">
                                        <label for="my-input">Street:</label>
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
                                        <label for="my-input">City:</label>
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
                                        <label for="my-input">Country:</label>
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
                                        <label for="my-input">Mobile Number:</label>
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
                                        <label for="my-input">Home Number:</label>
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
                                <input class="form-control" type="text" name="first_name">
                                <label class="mb-5" for="my-input">Orgnization name 1</label>
                                <div class="extra-field">
                                </div>
                                <a id="add-field" class="btn btn-sm btn-info py-0 mt-1" href="javascript:void(0)"
                                    onclick="addSignField()" title="Add Extra Signing Field">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <a id="remove-field" class="btn btn-sm btn-info py-0 mt-1 d-none"
                                    href="javascript:void(0)" onclick="removeSignField()"
                                    title="Remove Extra Signing Field">
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
