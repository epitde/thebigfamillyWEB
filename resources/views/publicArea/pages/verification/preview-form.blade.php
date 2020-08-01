@extends('publicArea.layouts.authApp')

@section('content')
<section>
    <div id="target" class="container mt-5">
        @include('publicArea.pages.verification.assets.form-content')

        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="row mt-3">
                    <div class="col-lg-6 text-center">
                        <a class="btn btn-dark {{Auth::user()->generalProfile &&  Auth::user()->generalProfile->status|| Auth::user()->organizationProfile &&  Auth::user()->organizationProfile->status ? 'd-none' : ''}}"
                            href="{{route('verification.form', $language->short_code)}}">
                            <i class="fa fa-arrow-left"></i>
                            Edit Details
                        </a>
                    </div>
                    <div class="col-lg-6 text-center">
                        <a class="btn btn-success" href="javascript:void(0)"
                            onclick="downloadPdf({{Auth::user()->id}}, '{{$language->short_code}}')">
                            <i class="fa fa-arrow-down"></i>
                            Download Form
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('css')
<style>
    .hidden {
        visibility: hidden;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #fff;
    }

</style>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script>
    let count = 0;
    $(document).ready(function () {
        $('select').select2({
            theme: 'bootstrap',
            placeholder: ''
        });
    });

    function addSignField() {
        let value = $('#signing-field-control').val();
        $('#signing-field-err').html('')
        if (value) {
            count++;
            $('#remove-field').removeClass('d-none');

            let html = '<div class="field' + count + '"><input class="form-control" type="text">' +
                '<label for="my-input">' + value + '</label></div>'

            $('.extra-field').append(html);
            $('#signing-field-control').val('');
            if (count == 2) {
                $('#add-field').addClass('d-none');
                $('#signing-field-control').addClass('d-none');
            }
        } else {
            $('#signing-field-err').html('<small class="text-danger">Field Cannot be empty</small><br>')
        }
    }

    function removeSignField() {
        $('#signing-field-control').removeClass('d-none');
        $('#add-field').removeClass('d-none');

        $('.field' + count).html('');
        count--;
        if (count == 0) {
            $('#remove-field').addClass('d-none');
        }
    }

    function downloadPdf(user_id, short_code) {
        $('#add-field').addClass('d-none');
        $('#remove-field').addClass('d-none');
        $('#signing-field-control').removeClass('d-none');

        domtoimage.toPng(document.getElementById('form-pdf'))
            .then(function (blob) {
                var pdf = new jsPDF('l', 'pt', [$('#form-pdf').width(), $('#target').height()]);

                pdf.addImage(blob, 'PNG', 0, 0, $('#form-pdf').width(), $('#target').height());
                pdf.save("verification_form.pdf");
            });
    }

</script>
@endsection
