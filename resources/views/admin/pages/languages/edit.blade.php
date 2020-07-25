@extends('admin.layouts.app')
@section('title', 'Languages | Lara Admin')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-lg">
            <h3>Edit Language</h3>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('admin.languages.update') }}" method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                            @csrf
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="name">Name of Language</label>
                                    <input type="hidden" name="id" value="{{$language->id}}">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{$language->name}}" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="name">Short Code</label>
                                    <input type="text" class="form-control" id="short_code" name="short_code"
                                        value="{{$language->short_code}}" required readonly>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Default Translator</label>
                                    <select class="form-control" name="user_id" id="user_id" required>
                                        <option></option>
                                        @foreach ($users as $key => $user)
                                        <option {{$language->user_id==$user->id?'selected':'' }}
                                            value="{{ $user->id }}">
                                            {{ $user->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" accept="image/*" id="image"
                                            name="image" onchange="readImageURL(this);">
                                        <label class="custom-file-label" for="image">Choose flag</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 cropping-elements">
                                <h6 class="text-center">Original Image</h6>
                                <hr>
                                <div class="image_container">
                                    <img id="inp_image_pre"
                                        src="{{$language->flag?asset('uploads/'.$language->flag):''}}"
                                        style="width:100%" alt="your image" />
                                </div>
                            </div>
                            <div class="col-lg-5 text-center mt-5">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#user_id').select2({
            theme: 'bootstrap',
            placeholder: 'Select Default Translator'
        });

    });

    function readImageURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#inp_image_pre').attr('src', e.target.result)
                initCropper();
            };
            reader.readAsDataURL(input.files[0]);
        }
        $('.cropping-elements').removeClass('d-none');
    }

    function initCropper() {
        var $image = $('#inp_image_pre');
        $image.cropper('destroy');
        $image.cropper({
            aspectRatio: 6 / 4
        });
        var cropper = $image.data('cropper');
    }

    function destroye() {
        $currentCropper = $('#inp_image_pre').data('cropper');
        if ($currentCropper) {
            $currentCropper.destroy();
        }
    }

</script>
@endsection
