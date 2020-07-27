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
                                <th style="width: 120px;">Flag</th>
                                <th>Default Translator</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($languages as $key=> $language)

                            <tr>
                                <td>{{$key+1}}</td>

                                <td>{{$language->name}}</td>

                                <td>{{$language->short_code}}</td>

                                <td style="width: 120px;">
                                    <img src="{{$language->flag?asset('uploads/'.$language->flag):''}}"
                                        style="max-width:100%">
                                </td>
                                <td>
                                    {{$language->user?$language->user->name:''}}&nbsp;{{$language->user?$language->user->surname:''}}
                                </td>
                                <td>
                                    @switch($language->status)
                                    @case(App\Models\Language::STATUS['ACTIVE'])
                                    <span class="badge badge-success">Active</span>
                                    @break
                                    @case(App\Models\Language::STATUS['INACTIVE'])
                                    <span class="badge badge-danger">Inactive</span>
                                    @break
                                    @default
                                    @endswitch
                                </td>
                                <td class="text-left">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-light btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" onclick=""
                                                href="{{route('admin.languages.edit', $language->id)}}">
                                                <i class="fa fa-pencil-square-o text-primary"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item"
                                                href="{{route('admin.languages.delete', $language->id)}}">
                                                <i class="fa fa-trash text-danger"></i>
                                                Delete
                                            </a>
                                            <a class="dropdown-item"
                                                href="{{route('admin.languages.change-status', $language->id)}}">
                                                @if($language->status == App\Models\Language::STATUS['INACTIVE'])
                                                <i class="fa fa-check text-success"></i>
                                                Activate
                                                @else
                                                <i class="fa fa-times text-warning"></i>
                                                Deactivate
                                                @endif
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
