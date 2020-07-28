@extends('publicArea.layouts.app')

@section('content')
<!-- Hero Section-->
<section class="hero bg-top" id="hero"
    style="background: url({{asset('publicArea/img/banner-4.png')}}) no-repeat; background-size: 100% 80%">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-5 py-5">
                <h1 class="font-weight-bold">Download your best app landing</h1>
                <p class="my-4 text-muted">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                    eirmod.
                </p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mb-2 mb-lg-0"><a class="btn btn-primary btn-lg px-4" href="#"> <i
                                class="fab fa-google-play mr-3"></i>Google Play</a></li>
                    <li class="list-inline-item"><a class="btn btn-primary btn-lg px-4" href="#"> <i
                                class="fab fa-app-store mr-3"></i>App Store</a></li>
                </ul>
            </div>
            <div class="col-lg-6 ml-auto">
                <div class="device-wrapper mx-auto">
                    <div class="device shadow" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                        <div class="screen">
                            <img class="img-fluid" src="{{asset('publicArea/img/mobile.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-center py-0" id="about" style="background: url({{asset('publicArea/img/service-bg.svg')}}) no-repeat; background-size:
    cover">
    <section class="about py-0">
        <div class="container">
            <p class="h6 text-uppercase text-primary">Services</p>
            <h2 class="mb-5">Make your own success</h2>
            <div class="row pb-5">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <!-- Services Item-->
                    <div class="card border-0 shadow rounded-lg py-4 text-left">
                        <div class="card-body p-5">
                            <svg class="svg-icon svg-icon-light" style="width:60px;height:60px;color:#ff904e">
                                <use xlink:href="#document-saved-1"> </use>
                            </svg>
                            <h3 class="font-weight-normal h4 my-4">Online Marketing</h3>
                            <p class="text-small mb-0">Lorem ipsum dolor amet consectetur adipisicing sed do eiusmod
                                tempor
                                incididunt ut labore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <!-- Services Item-->
                    <div class="card border-0 shadow rounded-lg py-4 text-left">
                        <div class="card-body p-5">
                            <svg class="svg-icon svg-icon-light" style="width:60px;height:60px;color:#39f8d2">
                                <use xlink:href="#map-marker-1"> </use>
                            </svg>
                            <h3 class="font-weight-normal h4 my-4">Track your move </h3>
                            <p class="text-small mb-0">Lorem ipsum dolor amet consectetur adipisicing sed do eiusmod
                                tempor
                                incididunt ut labore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <!-- Services Item-->
                    <div class="card border-0 shadow rounded-lg py-4 text-left">
                        <div class="card-body p-5">
                            <svg class="svg-icon svg-icon-light" style="width:60px;height:60px;color:#8190ff">
                                <use xlink:href="#arrow-target-1"> </use>
                            </svg>
                            <h3 class="font-weight-normal h4 my-4">Market analysis</h3>
                            <p class="text-small mb-0">Lorem ipsum dolor amet consectetur adipisicing sed do eiusmod
                                tempor
                                incididunt ut labore.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="with-pattern-1" id="services">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img class="img-fluid w-100 px-lg-5" src="{{asset('publicArea/img/objects.svg')}}" alt="">
                </div>
                <div class="col-lg-6">
                    <h2>The Best Business Solutions Guide for You</h2>
                    <p class="text-muted">Dolor sit amet consectetur elit sed do eiusmod tempor incididunt labore
                        dolore magna
                        aliqua enim ad minim veniam quis nostrud exercitation.</p>
                    <button class="btn btn-primary js-modal-btn" data-video-id="B6uuIHpFkuo"><i
                            class="fas fa-play-circle mr-2"></i>Play video</button>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h2>Make your own success as simple you clap</h2>
                    <p class="text-muted">Dolor sit amet consectetur elit sed do eiusmod tempor incididunt labore
                        dolore magna
                        aliqua enim ad minim veniam quis nostrud exercitation.</p>
                    <ul class="list-check">
                        <li class="text-muted mb-2">Various Analysis Options</li>
                        <li class="text-muted mb-2">Page Load Details (time, size, number of requests)</li>
                        <li class="text-muted mb-2">Waterfall, Video and Report History</li>
                    </ul>
                    <button class="btn btn-primary js-modal-btn" data-video-id="B6uuIHpFkuo"><i
                            class="fas fa-play-circle mr-2"></i>Play video</button>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 mb-4">
                            <!-- Services Item-->
                            <div class="card border-0 shadow rounded-lg text-left px-2">
                                <div class="card-body px py-5">
                                    <svg class="svg-icon" style="width:40px;height:40px;color:#ff904e">
                                        <use xlink:href="#document-saved-1"> </use>
                                    </svg>
                                    <h3 class="h5 font-weight-normal h4 my-3">Online Marketing</h3>
                                    <p class="text-small mb-0 text-muted">Lorem ipsum dolor amet consectetur
                                        adipisicing.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 mb-4">
                            <!-- Services Item-->
                            <div class="card border-0 shadow rounded-lg text-left px-2">
                                <div class="card-body px py-5">
                                    <svg class="svg-icon" style="width:40px;height:40px;color:#39f8d2">
                                        <use xlink:href="#map-marker-1"> </use>
                                    </svg>
                                    <h3 class="h5 font-weight-normal h4 my-3">Track your move </h3>
                                    <p class="text-small mb-0 text-muted">Lorem ipsum dolor amet consectetur
                                        adipisicing.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 mb-4">
                            <!-- Services Item-->
                            <div class="card border-0 shadow rounded-lg text-left px-2">
                                <div class="card-body px py-5">
                                    <svg class="svg-icon" style="width:40px;height:40px;color:#8190ff">
                                        <use xlink:href="#arrow-target-1"> </use>
                                    </svg>
                                    <h3 class="h5 font-weight-normal h4 my-3">Market analysis</h3>
                                    <p class="text-small mb-0 text-muted">Lorem ipsum dolor amet consectetur
                                        adipisicing.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <!-- Services Item-->
                            <div class="card border-0 shadow rounded-lg text-left px-2">
                                <div class="card-body px py-5">
                                    <svg class="svg-icon" style="width:40px;height:40px;color:#ff634b">
                                        <use xlink:href="#sorting-1"> </use>
                                    </svg>
                                    <h3 class="h5 font-weight-normal h4 my-3">Full Settings</h3>
                                    <p class="text-small mb-0 text-muted">Lorem ipsum dolor amet consectetur
                                        adipisicing.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<section class="p-0" id="testimonials" style="background: url({{asset('publicArea/img/testimonials-bg.png')}}) no-repeat;
    background-size: 40% 100%; background-position: left center">
    <div class="container text-center">
        <p class="h6 text-uppercase text-primary">Testimonials</p>
        <h2 class="mb-5">What Our Clients Says?</h2>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="owl-carousel owl-theme testimonials-slider">
                    <div class="mx-3 mx-lg-5 my-5 pt-3">
                        <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                            <div class="card-body index-forward pt-5 rounded-lg">
                                <div class="testimonial-img">
                                    <img class="rounded-circle" src="{{asset('publicArea/img/avatar-1.jpg')}}" alt="" />
                                </div>
                                <p class="lead text-muted mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam.</p>
                                <h5 class="font-weight-bold mb-0">Sarah Hudson</h5>
                                <p class="text-primary mb-0 text-small">Tech Developer</p>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 mx-lg-5 my-5 pt-3">
                        <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                            <div class="card-body index-forward pt-5 rounded-lg">
                                <div class="testimonial-img">
                                    <img class="rounded-circle" src="{{asset('publicArea/img/avatar-2.png')}}" alt="" />
                                </div>
                                <p class="lead text-muted mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam.</p>
                                <h5 class="font-weight-bold mb-0">Frank Smith</h5>
                                <p class="text-primary mb-0 text-small">Tech Developer</p>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 mx-lg-5 my-5 pt-3">
                        <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                            <div class="card-body index-forward pt-5 rounded-lg">
                                <div class="testimonial-img">
                                    <img class="rounded-circle" src="{{asset('publicArea/img/avatar-1.jpg')}}" alt="" />
                                </div>
                                <p class="lead text-muted mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam.</p>
                                <h5 class="font-weight-bold mb-0">Sarah Hudson</h5>
                                <p class="text-primary mb-0 text-small">Tech Developer</p>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 mx-lg-5 my-5 pt-3">
                        <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                            <div class="card-body index-forward pt-5 rounded-lg">
                                <div class="testimonial-img">
                                    <img class="rounded-circle" src="{{asset('publicArea/img/avatar-2.png')}}" alt="" />
                                </div>
                                <p class="lead text-muted mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam.</p>
                                <h5 class="font-weight-bold mb-0">Frank Smith</h5>
                                <p class="text-primary mb-0 text-small">Tech Developer</p>
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
    .list-inline-item :hover {
        color: #fff !important;
        background-color: #1c7f79 !important;
        border-color: #1c7f79 !important;
    }

    .nav-link .link-scroll .btn .btn-primary :hover {
        color: #1c7f79 !important;
        background-color: #1c7f79 !important;
        border-color: #1c7f79 !important
    }

    .js-modal-btn :hover {
        color: #fff !important;
        background-color: #1c7f79 !important;
        border-color: #1c7f79 !important;
    }

</style>

@endsection

@section('js')
<script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite -
    //   see more here
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function (e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
        }
    }
    // this is set to BootstrapTemple website as you cannot
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

</script>
@endsection
