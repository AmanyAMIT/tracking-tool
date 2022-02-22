@extends('layouts.admin')
@section('title') - Add Client @endsection
@section('content')
<!DOCTYPE html>
<html>

<head>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ URL::asset('AdminPanel/vendors/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ URL::asset('AdminPanel/vendors/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ URL::asset('AdminPanel/vendors/images/favicon-16x16.png') }}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('AdminPanel/vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('AdminPanel/vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('AdminPanel/src/plugins/jquery-steps/jquery.steps.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('AdminPanel/vendors/styles/style.css') }}">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');

    </script>
</head>

<body>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Form Wizards</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Wizards</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown">
                                    January 2018
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Export List</a>
                                    <a class="dropdown-item" href="#">Policies</a>
                                    <a class="dropdown-item" href="#">View Assets</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <h4 class="text-blue h4">Step wizard vertical</h4>
                        <p class="mb-30">jQuery Step wizard</p>
                    </div>
                    <div class="wizard-content">
                        <form action="{{ route('clients.store') }}"
                            class="tab-wizard wizard-circle wizard vertical" method="POST">
                            @csrf
                            <h5>Client Information</h5>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cliet Name :</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email :</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <input type="submit" value="Add Client" class="btn btn-primary btn-wide mt-5 ml-3">
                            <!-- Step 2 -->
                            <form action="{{ route('StoreClientDiploma') }}" method="POST">
                                @csrf
                                <h5>Assign Diploma</h5>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Diploma</label>
                                                <select class="form-control" name="diploma_id">
                                                    @foreach($diplomas as $diploma)
                                                        <option value="{{ $diploma->id }}">{{ $diploma->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="hidden" name="client_id" id="" value="{{ $last }}">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <input type="submit" value="Assign Diploma" class="btn btn-primary btn-wide mt-5 ml-3">
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- js -->
        <script src="{{ URL::asset('AdminPanel/vendors/scripts/core.js') }}"></script>
        <script src="{{ URL::asset('AdminPanel/vendors/scripts/script.min.js') }}"></script>
        <script src="{{ URL::asset('AdminPanel/vendors/scripts/process.js') }}"></script>
        <script src="{{ URL::asset('AdminPanel/vendors/scripts/layout-settings.js') }}">
        </script>
        <script
            src="{{ URL::asset('AdminPanel/src/plugins/jquery-steps/jquery.steps.js') }}">
        </script>
        <script src="{{ URL::asset('AdminPanel/vendors/scripts/steps-setting.js') }}">
        </script>
</body>

</html>
@endsection
