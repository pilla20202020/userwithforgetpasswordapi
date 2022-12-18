<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        {{-- <link href="assets/libs/metrojs/release/MetroJs.Full/MetroJs.min.css" rel="stylesheet" type="text/css" /> --}}
        <link href="{{asset('css/MetroJs.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        {{-- <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}
        <link href="{{asset('css/bootstrap.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

        <!-- Icons Css -->
        {{-- <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" /> --}}
        <link href="{{asset('css/icons.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

        <!-- App Css-->
        {{-- <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" /> --}}
        <link href="{{asset('css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

        <!-- Sweet Alert-->
        <link href="{{asset('css/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Select2-->
        <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />

        <!-- style-->
        <link href="{{asset('css/style.css')}}" rel="stylesheet" />

        <link href="{{ asset('css/dropify.min.css') }}" rel="styleshet">

        <!-- Toastr-->
        <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

        @yield('page-specific-styles')

    </head>
    <body>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="text-center font-weight-bolder" style="font-size: 7.3rem; poition:relative;">404</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-center font-weight-bolder text-uppercase" style="font-size: 2.5rem; margin-top: -20px;">Forbidden</h4>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-12 text-center">
                                <h6 class="text-center text-uppercase" style="font-size: 1.3rem;">Sorry, You are not allowed to perform this action.</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-center">
                                <a href="{{route('dashboard')}}" class="btn btn-primary btn-lg" style="margin-left: 15px;"><i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back To Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
