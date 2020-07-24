@extends('adminlte::page')
@section('title', 'Translation : English')
@section('content_header')
<h3>Translation : English</h3>
@stop
@section('content')
<div class="row">
    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h5 class="language-inactive">General</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STRING</th>
                            <th scope="col">EN VALUE</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($langDataEN['GENERAL'] as $key => $general)
                        <tr>
                            <th scope="row">{{$key}}</th>
                            <td>
                                <input id="general_{{$key}}" type="text" class="form-control" value="{{$general}}">
                            </td>
                            <td>
                                <a id="en_save_btn_{{$key}}GENERAL" class="btn btn-primary btn-sm"
                                    href="javascript:void(0)" data-toggle="tooltip" title="Update EN value"
                                    onclick="changeData('{{$key}}', 'general_{{$key}}', 'GENERAL')">
                                    Save
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
              
                <h5 class="language-inactive">Home</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STRING</th>
                            <th scope="col">EN VALUE</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($langDataEN['HOME'] as $key => $home)
                        <tr>
                            <th scope="row">{{$key}}</th>
                            <td>
                                <input id="home_{{$key}}" type="text" class="form-control" value="{{$home}}">
                            </td>
                            <td>
                                <a id="en_save_btn_{{$key}}HOME" class="btn btn-primary btn-sm"
                                    href="javascript:void(0)" data-toggle="tooltip" title="Update EN value"
                                    onclick="changeData('{{$key}}', 'home_{{$key}}', 'HOME')">
                                    Save
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                
                <h5 class="language-inactive">Login</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STRING</th>
                            <th scope="col">EN VALUE</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($langDataEN['LOGIN'] as $key => $login)
                        <tr>
                            <th scope="row">{{$key}}</th>
                            <td>
                                <input id="login_{{$key}}" type="text" class="form-control" value="{{$login}}">
                            </td>
                            <td>
                                <a id="en_save_btn_{{$key}}LOGIN" class="btn btn-primary btn-sm"
                                    href="javascript:void(0)" data-toggle="tooltip" title="Update EN value"
                                    onclick="changeData('{{$key}}', 'login_{{$key}}', 'LOGIN')">
                                    Save
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>


                <h5 class="language-inactive">Post</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STRING</th>
                            <th scope="col">EN VALUE</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($langDataEN['POST'] as $key => $post)
                        <tr>
                            <th scope="row">{{$key}}</th>
                            <td>
                                <input id="post_{{$key}}" type="text" class="form-control" value="{{$post}}">
                            </td>
                            <td>
                                <a id="en_save_btn_{{$key}}POST" class="btn btn-primary btn-sm"
                                    href="javascript:void(0)" data-toggle="tooltip" title="Update EN value"
                                    onclick="changeData('{{$key}}', 'post_{{$key}}', 'POST')">
                                    Save
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
        </div>
    </div>
</div>

@section('js')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.table').DataTable();
    });

    function changeData(key, id, array_key) {
        value = $('#' + id).val();
        $.ajax({
            url: "{{ route('change-data-en') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            data: {
                'key': key,
                'value': value,
                'array_key': array_key
            },
            success: function (response) {
                $('#en_save_btn_' + key + array_key).html("Saved").removeClass('btn-primary').addClass('btn-success');
                setTimeout(() => {
                    $('#en_save_btn_' + key + array_key).html("Save").removeClass('btn-success').addClass('btn-primary');
                }, 2000);
            }
        });
    }

</script>
@endsection

@stop
