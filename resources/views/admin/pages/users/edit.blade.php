@extends('admin.layouts.app')
@section('title', 'Users | Lara Admin')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-lg">
            <h3>User Profile</h3>
        </div>
        <div class="col-lg text-right">
            <a class="btn {{$user->is_verified?'btn-danger':'btn-success'}}"
                href="{{route('admin.users.change-verifcation', $user->id)}}">
                {{$user->is_verified?'Unverfiy User':'Verfiy User'}}
            </a>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="nav-wrapper mx-5">
                <ul class="nav nav-pills nav-fill flex-column" id="tabs-icons-text" role="tablist">
                    <li class="nav-item mb-2">
                        <a class="nav-link active" id="tabs-icons-text-1-tab" data-toggle="tab"
                            href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                            User Details
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link " id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2"
                            role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                            User Documents
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('admin.users.update') }}" method="POST">
                            <div class="row justify-content-center">
                                @csrf
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{$user->name}}" required>
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Surname</label>
                                        <input type="text" class="form-control" id="surname" name="surname"
                                            value="{{$user->surname}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{$user->email}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">User Role</label>
                                        <select class="form-control" name="user_role" id="user_role" required>
                                            <option></option>
                                            <option value="{{ \app\Models\User::USER_ROLES['ADMIN'] }}"
                                                {{$user->user_role == \app\Models\User::USER_ROLES['ADMIN'] ? 'selected':'' }}>
                                                Admin
                                            </option>
                                            <option value="{{ \app\Models\User::USER_ROLES['GENERAL'] }}"
                                                {{$user->user_role == \app\Models\User::USER_ROLES['GENERAL'] ? 'selected':'' }}>
                                                General
                                            </option>
                                            <option value="{{ \app\Models\User::USER_ROLES['MODERATOR'] }}"
                                                {{$user->user_role == \app\Models\User::USER_ROLES['MODERATOR'] ? 'selected':'' }}>
                                                Moderator
                                            </option>
                                            <option value="{{ \app\Models\User::USER_ROLES['TRANSLATOR'] }}"
                                                {{$user->user_role == \app\Models\User::USER_ROLES['TRANSLATOR'] ? 'selected':'' }}>
                                                Translator
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Password</label>&nbsp;
                                        <a href="javascript:void(0)" onclick="generatePassword()"><small>Generate
                                                Password</small></a>
                                        <input type="password" class="form-control" id="password" name="new_password">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Confirm Password</label>
                                        <input onkeyup="checkPasswords()" type="password" class="form-control"
                                            id="conf_password" name="conf_password">
                                        <span id="conf_password_msg" style="display:block;">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-5 text-center">
                                    <div class="form-group">
                                        <button id="submit_btn" class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="docs" class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Document</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($user->user_document as $key=> $user_document)

                                    <tr>
                                        <td>{{$key+1}}</td>

                                        <td>
                                            @switch($user_document->type)
                                            @case(\App\Models\UserDocument::TYPE['VERIFICATION'])
                                            <span class="badge">Verification Document</span>
                                            @break
                                            @case(\App\Models\UserDocument::TYPE['GOVT'])
                                            <span class="badge">Government Issued Document</span>
                                            @break
                                            @default
                                            <span class="badge">Other Document</span>
                                            @endswitch
                                        </td>

                                        <td>
                                            <a target="_blank"
                                                href="{{asset('uploads/files/'.$user_document->name)}}">Click
                                                to view
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
        $('#user_role').select2({
            theme: 'bootstrap',
            placeholder: 'Select User role'
        });
    });

    var pwd_valid = false;

    function generatePassword() {
        var pass = Math.random().toString(36).slice(-8);
        $('#password').val(pass);
        $('#conf_password').val(pass);

        checkPasswords();
    }

    function checkPasswords() {
        password = $('#password');
        password2 = $('#conf_password');

        if (((password.val() != password2.val()))) {
            $('#conf_password').addClass("is-invalid").removeClass("is-valid");
            $('#conf_password_msg').removeClass("text-success").addClass("text-danger");
            $('#conf_password_msg').html("<strong>Password Mismatch</strong>");
            pwd_valid = false;
        } else if (password.val() == password2.val()) {
            $('#password-confirm').addClass("is-valid").removeClass("is-invalid");
            $('#conf_password_msg').removeClass("text-danger").addClass("text-success");
            $('#conf_password_msg').html("<strong>Password Matched</strong>");
            pwd_valid = true;
        }

        checkFormValidation();
    }

    function checkFormValidation() {
        if (pwd_valid === true) {
            $('#submit_btn').prop('disabled', false);
        } else {
            $('#submit_btn').prop('disabled', true);
        }
    }

</script>
@endsection

@section('css')
<style>
    .fade {
        display: none;
    }

    .show {
        display: inherit !important;
    }

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
