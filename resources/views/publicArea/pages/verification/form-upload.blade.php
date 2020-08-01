@extends('publicArea.layouts.authApp')

@section('content')
<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center py-2">Upload Your Documents</h3>
                        <hr>
                        <form action="{{ route('verification.forms.upload', $language->short_code) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="pb-2" style="max-width: max-content;">
                                        <h6>Verification Form</h6>
                                        <hr>
                                    </div>
                                    <input type="file" accept="application/pdf" id="verification" name="verification"
                                        required>
                                    {{-- <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" accept="application/pdf"
                                                id="verification" name="verification_doc" required>
                                            <label class="custom-file-label" for="verification">Choose Verification
                                                Form</label>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <div class="pb-2" style="max-width: max-content;">
                                        <h6>Government Issued Identification Document</h6>
                                        <hr>
                                    </div>
                                    <input type="file" accept="application/pdf" id="govt" name="govt" required>
                                    {{-- <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" accept="application/pdf"
                                                id="" name="govt_doc" required>
                                            <label class="custom-file-label" for="govt">Choose Government
                                                Document</label>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <div class="pb-2" style="max-width: max-content;">
                                        <h6>Other Documents</h6>
                                        <hr>
                                    </div>
                                    <input type="file" accept="application/pdf" id="other" name="other[]">
                                    {{-- <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" accept="application/pdf"
                                                id="other" name="other_doc">
                                            <label class="custom-file-label" for="other">Choose other Document</label>
                                        </div>
                                    </div> --}}
                                    <div id="more-docs">

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <a id="add-field" class="btn btn-info mt-1" href="javascript:void(0)"
                                        onclick="addDocs()" title="Add More Documents">
                                        <i class="fa fa-plus" style="font-size: 1rem"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center mt-4">
                                    <div class="form-group">
                                        <button class="btn btn-info" type="submit">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection



@section('js')
<script>
    function addDocs() {
        let html = '<input type="file" class="my-3" accept="application/pdf" name="other[]">';

        $('#more-docs').append(html);
    }

</script>
@endsection
