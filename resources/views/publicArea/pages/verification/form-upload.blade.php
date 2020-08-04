@extends('publicArea.layouts.authApp')

@section('content')
<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center py-2">
                            {{$language_json['VERIFICATION']["upload_your_documents"]}}</h3>
                        <hr>
                        <form action="{{ route('verification.forms.upload', $language->short_code) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="pb-2" style="max-width: max-content;">
                                        <h6>{{$language_json['VERIFICATION']["verification_form"]}}</h6>
                                        <hr>
                                    </div>
                                    <input type="file" accept="application/pdf" id="verification" name="verification"
                                        required>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <div class="pb-2" style="max-width: max-content;">
                                        <h6>{{$language_json['VERIFICATION']["govt_doc"]}}</h6>
                                        <hr>
                                    </div>
                                    <input type="file" accept="application/pdf" id="govt" name="govt" required>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <div class="pb-2" style="max-width: max-content;">
                                        <h6>{{$language_json['VERIFICATION']["other_document"]}}</h6>
                                        <hr>
                                    </div>
                                    <input type="file" accept="application/pdf" id="other" name="other[]">
                                    <div id="more-docs">

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <a id="add-field" class="btn btn-info mt-1" href="javascript:void(0)"
                                        onclick="addDocs()"
                                        title="{{$language_json['VERIFICATION']["add_more_documents"]}}">
                                        <i class="fa fa-plus" style="font-size: 1rem"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center mt-4">
                                    <div class="form-group">
                                        <button class="btn btn-info"
                                            type="submit">{{$language_json['VERIFICATION']["upload"]}}</button>
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
