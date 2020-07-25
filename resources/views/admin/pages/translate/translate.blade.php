@extends('admin.layouts.app')

@section('title', 'Translation')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg">
            <h3>Translation : English to {{$language->name}}</h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @if ($langDataEN)
        <div class="col-lg-6 col-xs-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="language-inactive">General</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STRING</th>
                                <th scope="col">EN VALUE</th>
                                <th scope="col" style="display:none">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($langDataEN['GENERAL'] as $key => $general)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>
                                    <input id="en_general_{{$key}}" type="text" class="form-control"
                                        value="{{$general}}" readonly>
                                </td>
                                <td>
                                    <a class="d-none" href="javascript:void(0)" data-toggle="tooltip"
                                        title="Update EN value"
                                        onclick="changeData('{{$key}}', 'en_general_{{$key}}', 'GENERAL')">
                                        <i class="fa fa-edit text-dark"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="language-inactive">Home</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STRING</th>
                                <th scope="col">EN VALUE</th>
                                <th scope="col" style="display:none">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($langDataEN['HOME'] as $key => $home)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>
                                    <input id="en_home_{{$key}}" type="text" class="form-control" value="{{$home}}"
                                        readonly>
                                </td>
                                <td>
                                    <a class="d-none" href="javascript:void(0)" data-toggle="tooltip"
                                        title="Update EN value" onclick="changeData('{{$key}}', 'en_home_{{$key}}',
                                        'HOME')">
                                        <i class="fa fa-edit text-dark"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="language-inactive">Login</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STRING</th>
                                <th scope="col">EN VALUE</th>
                                <th scope="col" style="display:none">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($langDataEN['LOGIN'] as $key => $login)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>
                                    <input id="en_login_{{$key}}" type="text" class="form-control" value="{{$login}}"
                                        readonly>
                                </td>
                                <td>
                                    <a class="d-none" href="javascript:void(0)" data-toggle="tooltip"
                                        title="Update EN value" onclick="changeData('{{$key}}', 'en_login_{{$key}}',
                                        'LOGIN')">
                                        <i class="fa fa-edit text-dark"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="language-inactive">POST</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STRING</th>
                                <th scope="col">EN VALUE</th>
                                <th scope="col" style="display:none">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($langDataEN['POST'] as $key => $post)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>
                                    <input id="en_post_{{$key}}" type="text" class="form-control" value="{{$post}}"
                                        readonly>
                                </td>
                                <td>
                                    <a class="d-none" href="javascript:void(0)" data-toggle="tooltip"
                                        title="Update EN value"
                                        onclick="changeData('{{$key}}', 'de_general_{{$key}}', 'GENERAL')">
                                        <i class="fa fa-edit text-dark"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
        <div class="col-lg-6 col-xs-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="language-header">General</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="display:none">STRING</th>
                                <th scope="col">{{$language->short_code}} VALUE</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($langData['GENERAL'] as $key => $general)
                            <tr>
                                <th scope="row" style="display:none">{{$key}}</th>
                                <td>
                                    <input id="general_{{$key}}" type="text" class="form-control" value="{{$general}}">
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
            <div class="card">
                <div class="card-body">
                    <h5 class="language-header">Home</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="display:none">STRING</th>
                                <th scope="col">{{$language->short_code}} VALUE</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($langData['HOME'] as $key => $home)
                            <tr>
                                <th scope="row" style="display:none">{{$key}}</th>
                                <td>
                                    <input id="home_{{$key}}" type="text" class="form-control" value="{{$home}}">
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
            <div class="card">
                <div class="card-body">

                    <h5 class="language-header">Login</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="display:none">STRING</th>
                                <th scope="col">{{$language->short_code}} VALUE</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($langData['LOGIN'] as $key => $login)
                            <tr>
                                <th scope="row" style="display:none">{{$key}}</th>
                                <td>
                                    <input id="login_{{$key}}" type="text" class="form-control" value="{{$login}}">
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
            <div class="card">
                <div class="card-body">
                    <h5 class="language-header">Post</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="display:none">STRING</th>
                                <th scope="col">{{$language->short_code}} VALUE</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($langData['POST'] as $key => $post)
                            <tr>
                                <th scope="row" style="display:none">{{$key}}</th>
                                <td>
                                    <input id="post_{{$key}}" type="text" class="form-control" value="{{$post}}">
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
