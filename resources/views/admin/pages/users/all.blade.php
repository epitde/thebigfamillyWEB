@extends('admin.layouts.app')
@section('title', 'Users | Lara Admin')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg">
            <h3>Users</h3>
        </div>
        <div class="col-lg text-right">
            <a class="btn btn-primary" href="{{route('admin.users.add')}}">Add User</a>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body table-responsive">
                    <table id="users" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Full name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Joined At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($users as $key=> $user)

                            <tr>
                                <td>{{$key+1}}</td>

                                <td>{{$user->name}}&nbsp;{{$user->surname}}</td>

                                <td>{{$user->email}}</td>

                                <td>
                                    @switch($user->user_role)
                                    @case(App\Models\User::USER_ROLES['ADMIN'])
                                    <span class="badge">Admin</span>
                                    @break
                                    @case(App\Models\User::USER_ROLES['GENERAL'])
                                    <span class="badge">General</span>
                                    @break
                                    @case(App\Models\User::USER_ROLES['MODERATOR'])
                                    <span class="badge">Moderator</span>
                                    @break
                                    @case(App\Models\User::USER_ROLES['TRANSLATOR'])
                                    <span class="badge">Translator</span>
                                    @break
                                    @default

                                    @endswitch
                                </td>

                                <td>{{$user->created_at}}</td>

                                <td class="text-left">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-light btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" onclick=""
                                                href="{{route('admin.users.edit', $user->id)}}">
                                                <i class="fa fa-pencil-square-o text-primary"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" href="{{route('admin.users.delete', $user->id)}}">
                                                <i class="fa fa-trash text-danger"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>
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
        $('#users').DataTable();
    });

</script>
@endsection
