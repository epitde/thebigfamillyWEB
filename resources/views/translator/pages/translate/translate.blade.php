@extends('translator.layouts.app')

@section('title', 'Translation')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg">
            <h3>Translation : English to {{$language->name}}</h3>
        </div>
    </div>
</div>
<div class="container mt-2">
    <div class="row">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item mx-1">
                <a class="nav-link active" id="pills-general-tab" data-toggle="pill" href="#pills-general" role="tab"
                    aria-controls="pills-general" aria-selected="true">
                    <strong>General</strong>
                </a>
            </li>
            <li class="nav-item mx-1">
                <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="false">
                    <strong>Home</strong>
                </a>
            </li>
            <li class="nav-item mx-1">
                <a class="nav-link" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab"
                    aria-controls="pills-login" aria-selected="false">
                    <strong>Login</strong>
                </a>
            </li>
            <li class="nav-item mx-1">
                <a class="nav-link" id="pills-post-tab" data-toggle="pill" href="#pills-post" role="tab"
                    aria-controls="pills-post" aria-selected="false">
                    <strong>Post</strong>
                </a>
            </li>
        </ul>
    </div>
    <div class="row mt-3">
        <div class="col-lg-9">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-general" role="tabpanel"
                    aria-labelledby="pills-general-tab">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">STRING</th>
                                        <th scope="col" class="{{$language->short_code=="en"?'d-none':''}}">English
                                            VALUE</th>
                                        <th scope="col">{{$language->name}} VALUE</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($langData['GENERAL'] as $key => $general)
                                    <tr>
                                        <th scope="row">{{$key}}</th>
                                        <td class="{{$language->short_code=="en"?'d-none':''}}">
                                            {{$langDataEN['GENERAL'][$key]}}
                                        </td>
                                        <td>
                                            <input id="general_{{$key}}" type="text" class="form-control"
                                                value="{{$general}}">
                                        </td>
                                        <td>
                                            <a id="save_btn_{{$key}}GENERAL" class="btn btn-primary btn-sm"
                                                href="javascript:void(0)" data-toggle="tooltip" title="Update value"
                                                onclick="changeData('{{$key}}', 'general_{{$key}}', 'GENERAL')">
                                                Save
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">STRING</th>
                                        <th scope="col" class="{{$language->short_code=="en"?'d-none':''}}">English
                                            VALUE</th>
                                        <th scope="col">{{$language->name}} VALUE</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($langData['HOME'] as $key => $home)
                                    <tr>
                                        <th scope="row">{{$key}}</th>
                                        <td class="{{$language->short_code=="en"?'d-none':''}}">
                                            {{$langDataEN['HOME'][$key]}}
                                        </td>
                                        <td>
                                            <input id="home_{{$key}}" type="text" class="form-control"
                                                value="{{$home}}">
                                        </td>
                                        <td>
                                            <a id="save_btn_{{$key}}HOME" class="btn btn-primary btn-sm"
                                                href="javascript:void(0)" data-toggle="tooltip" title="Update value"
                                                onclick="changeData('{{$key}}', 'home_{{$key}}', 'HOME')">
                                                Save
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">STRING</th>
                                        <th scope="col" class="{{$language->short_code=="en"?'d-none':''}}">
                                            English VALUE</th>
                                        <th scope="col">{{$language->name}} VALUE</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($langData['LOGIN'] as $key => $login)
                                    <tr>
                                        <th scope="row">{{$key}}</th>
                                        <td class="{{$language->short_code=="en"?'d-none':''}}">
                                            {{$langDataEN['LOGIN'][$key]}}
                                        </td>
                                        <td>
                                            <input id="login_{{$key}}" type="text" class="form-control"
                                                value="{{$login}}">
                                        </td>
                                        <td>
                                            <a id="save_btn_{{$key}}LOGIN" class="btn btn-primary btn-sm"
                                                href="javascript:void(0)" data-toggle="tooltip" title="Update value"
                                                onclick="changeData('{{$key}}', 'login_{{$key}}', 'LOGIN')">
                                                Save
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-post" role="tabpanel" aria-labelledby="pills-post-tab">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">STRING</th>
                                        <th scope="col" class="{{$language->short_code=="en"?'d-none':''}}">English
                                            VALUE</th>
                                        <th scope="col">{{$language->name}} VALUE</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($langData['POST'] as $key => $post)
                                    <tr>
                                        <th scope="row">{{$key}}</th>
                                        <td class="{{$language->short_code=="en"?'d-none':''}}">
                                            {{$langDataEN['POST'][$key]}}
                                        </td>
                                        <td>
                                            <input id="post_{{$key}}" type="text" class="form-control"
                                                value="{{$post}}">
                                        </td>
                                        <td>
                                            <a id="save_btn_{{$key}}POST" class="btn btn-primary btn-sm"
                                                href="javascript:void(0)" data-toggle="tooltip" title="Update value"
                                                onclick="changeData('{{$key}}', 'post_{{$key}}', 'POST')">
                                                Save
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script>
    $(document).ready(function () {
        $('.table').DataTable();
    });

    function changeData(key, id, array_key) {

        value = $('#' + id).val();
        $.ajax({
            url: "{{ route('api.translate.edit') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            data: {
                'id': "{{$language->id}}",
                'key': key,
                'value': value,
                'array_key': array_key
            },
            success: function (response) {
                $('#save_btn_' + key + array_key).html("Saved").removeClass('btn-primary').addClass(
                    'btn-success');
                setTimeout(() => {
                    $('#save_btn_' + key + array_key).html("Save").removeClass('btn-success')
                        .addClass('btn-primary');
                }, 2000);
            }
        });
    }

</script>
@endsection
@section('css')
<style>
    .nav-link {
        color: #66615B;
        background: #fff;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background: #ef8157;
    }

    a:hover,
    a:focus {
        color: #ff9e66;
    }

</style>
@endsection
