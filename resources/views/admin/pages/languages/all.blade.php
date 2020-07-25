@extends('admin.layouts.app')
@section('title', 'Languages | Lara Admin')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg">
            <h3>Languages</h3>
        </div>
        <div class="col-lg text-right">
            <a class="btn btn-primary" href="{{route('admin.languages.add')}}">Add Language</a>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body table-responsive">
                    <table id="languages" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Short Code</th>
                                <th>Flag</th>
                                <th>Default Translator</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($languages as $key=> $language)

                            <tr>
                                <td>{{$key+1}}</td>

                                <td>{{$language->name}}</td>

                                <td>{{$language->short_code}}</td>

                                <td>
                                    <img src="{{asset('uploads/'.$language->flag)}}" style="max-width:23%">
                                </td>
                                <td>{{$language->user->name}}&nbsp;{{$language->user->surname}}</td>
                                <td class="text-left">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-light btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" onclick="" href="">
                                                <i class="fa fa-pencil-square-o"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="fa fa-trash"></i>
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
        $('#languages').DataTable();
    });

</script>
@endsection
