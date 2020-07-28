@extends('publicArea.layouts.authApp')

@section('content')
<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h3 class="text-primary">
                    Welcome {{Auth::user()->name}}&nbsp;{{Auth::user()->surname}}
                </h3>
                <br>
                <p>Please complete this verification process to access your account.</p>
                <div class="row ml-3">
                    <div class="col-lg-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Title</h5>
                                <p class="card-text">Content</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
<style>
    .main-card {
        background: #eafffe;
    }

</style>
@endsection
