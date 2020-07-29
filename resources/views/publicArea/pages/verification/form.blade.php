@extends('publicArea.layouts.authApp')

@section('content')
<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" id="configurationform">
                            @csrf
                            <div id="jquery-steps">
                                <h3>Profile Selection</h3>
                                <section>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="form-group m-4">
                                                <span class="mb-5" style="font-size: 1.4rem;"><strong>Select your
                                                        profile
                                                        type</strong></span><br><br>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="gen_prof" name="prof_type"
                                                        class="custom-control-input" value="gen">
                                                    <label class="custom-control-label" for="gen_prof">
                                                        General Profile
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="org_prof" name="prof_type"
                                                        class="custom-control-input" value="org">
                                                    <label class="custom-control-label" for="org_prof">
                                                        Organizational Profile
                                                    </label>
                                                </div>
                                                <small class="type_err text-danger"></small>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>Fill Details</h3>
                                <section>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="my-input">Name</label>
                                                <input class="form-control" type="text" name="name"
                                                    value="{{Auth::user()->name}}&nbsp;{{Auth::user()->surname}}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            {{-- <label for="my-input">Date of Birth</label> --}}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for=""><b>Year</b> </label>
                                                        <select class="form-control" name="birth_year" id="birth_year"
                                                            required>
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="signal_text"><b>Month</b> </label>
                                                        <select class="form-control" name="birth_month"
                                                            id="birth_month">
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="signal_text "><b>Day</b> </label>
                                                        <select class="form-control" name="birth_day" id="birth_day">
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <span class="text-danger"><small id="end_date_err"></small></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>Preview Details</h3>
                                <section>
                                    <div class="form-group m-4">
                                        <div class="form-group">
                                            <label for="my-input" class="mb-4 mt-3"><b> Please select your monthly
                                                    withdrawal
                                                    amount:
                                                    <i class="fa fa-question-circle" data-toggle="tooltip"
                                                        data-placement="right"
                                                        title="This is the portion of your winnings that will be recommended for withdrawal every month. The lower amount you withdraw, the more capital you have for each subsequent month. Recommended withdrawal amount is highlighted in green.">
                                                    </i></b></label>
                                            <input id="monthly_withdrawal" type="text" name="monthly_withdrawal_amount"
                                                required>
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
    var form = $("#configurationform");

    $('#jquery-steps').steps({
        headerTag: "h3",
        bodyTag: "section",
        onStepChanging: function (event, currentIndex, newIndex) {
            if (newIndex < currentIndex) {
                return true;
            }
            if (currentIndex == 0) {
                $('.type_err').html('');
                let value = $('input[name="prof_type"]:checked').val();

                if (!value) {
                    $('.type_err').html('Select one of the above');
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
                return
                form.valid();
            }
            return true;
        },
        onFinished: function (event, currentIndex) {
            $("#configurationform").submit();
        }
    });

</script>
@endsection
