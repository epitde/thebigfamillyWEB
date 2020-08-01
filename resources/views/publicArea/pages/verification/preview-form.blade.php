@extends('publicArea.layouts.authApp')

@section('content')
<section>
    <div id="target" class="container mt-5">
        @include('publicArea.pages.verification.assets.form-content')

        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="row mt-3">
                    <div class="col-lg-6 text-center">
                        <a class="btn btn-dark" href="{{route('verification.form', $language->short_code)}}">
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
    let count = 1;
    $(document).ready(function () {
        $('select').select2({
            theme: 'bootstrap',
            placeholder: ''
        });
    });

    function addSignField() {
        $('#add-field').addClass('d-none');
        $('#remove-field').removeClass('d-none');

        let html = '<input class="form-control" type="text">' +
            '<label for="my-input">Orgnization name 2</label>'

        $('.extra-field').html(html);
        count++;
    }

    function removeSignField() {
        $('#remove-field').addClass('d-none');
        $('#add-field').removeClass('d-none');

        $('.extra-field').html('');
        count--;
    }

    function downloadPdf(user_id, short_code) {
        $('#add-field').addClass('d-none');
        $('#remove-field').addClass('d-none');

        domtoimage.toPng(document.getElementById('form-pdf'))
            .then(function (blob) {
                var pdf = new jsPDF('l', 'pt', [$('#form-pdf').width(), $('#target').height()]);

                pdf.addImage(blob, 'PNG', 0, 0, $('#form-pdf').width(), $('#target').height());
                pdf.save("verification_form.pdf");
            });
        // window.location.href = '{{ url("verification/download/form") }}/' + user_id + '/' + short_code + '/' + count;
    }

</script>
@endsection
