@extends('moderator.layouts.app')
@section('title', 'Dashboard | Lara Admin')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg">
            <h3>Dashboard</h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="card">
                <div class="card-body">
                    <h3>Welcome</h3>
                    <a href="/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
