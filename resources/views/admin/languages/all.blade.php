@extends('adminlte::page')
@section('title', 'Languages | Lara Admin')
@section('content_header')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg">
            <h1>Languages</h1>
        </div>
        <div class="col-lg text-right">
            <a class="btn btn-primary" href="{{route('admin.languages.add')}}">Add Language</a>
        </div>
    </div>
</div>
@stop

@section('content')
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
                                </td>

                                <td class="text-left">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            {{-- <a class="dropdown-item"
                                                href="{{route('admin-view-signal',$signal->id)}}"><i
                                                class="fas fa-user-astronaut text-info"></i>&nbsp; View</a>
                                            <a class="dropdown-item" onclick=""
                                                href="{{route('admin-edit-signal',$signal->id)}}"><i
                                                    class="fas fa-user-edit text-warning"></i>Edit</a>
                                            <a class="dropdown-item delete-todaysignal {{$signal->closed?'':(in_array(\App\UserSignal::MAKE_PLAYED['PLAYED'], $signal->UserSignalPlayedArr()) ? 'disabled':'')}}"
                                                data-id="{{ $signal->id }}" href="javascript:void(0)"><i
                                                    class="fas fa-user-times text-danger"></i>Delete</a>
                                            <a class="dropdown-item {{$signal->closed?'disabled':''}}"
                                                href="{{route('admin-close-signal',$signal->id)}}">
                                                <i class="fas fa-times"></i>&nbsp;&nbsp;Close
                                            </a> --}}
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
@stop
