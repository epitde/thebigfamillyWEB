@extends('admin.layouts.app')
@section('title', 'Users | Lara Admin')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-lg">
            <h3>Edit User</h3>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
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
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{$user->email}}" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
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
