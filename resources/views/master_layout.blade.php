<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!-- CSFR token for ajax call -->
    <meta name="_token" content="{{ csrf_token() }}" />
    <title>MX Coding Challenge</title>


    <!-- jQuery 3.2.1-->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> --}}


    <!-- jQuery 3.6.0  Please Note:  jQuery must ALWAYS be declared before Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <!-- jQuery timeago plugin 1.6.3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.6.3/jquery.timeago.js"></script>


    <!-- Bootstrap v3.3.5 CSS and Javascript-->
    {{--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js">
    </script> --}}


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Bootstrap v4.0.0 CSS and Javascript-->
    {{--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> --}}



    <!-- Bootstrap v5.0.2 CSS and Javascript-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <!-- popper.js 1.12.9-->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script> --}}


    <!--toastr notifications -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!--icheck checkboxes -->


    <!--icheck checkboxes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/yellow.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="/assets/fonts/googlefonts.Material+Design.css" rel="stylesheet">
    <link href="/assets/fonts/googlefonts.PT+Sans.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <!-- MX Project css  -  Please Note:  Always load your custom css LAST!  -->
    <link rel="stylesheet" href="/assets/css/main.css">


    <style>
        body {
            font-family: PT Sans, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            font-size: 14px;
            background-color: #e8eaed;
        }
    </style>


    <!-- Delay table load until everything else is loaded -->
    <script>
        $(window).on('load', function () {
            $('#postTable').removeAttr('style');
        })
        // $(window).load(function () {
        //         $('#postTable').removeAttr('style');
        //     })
        // Add a New User
        $(document).on('click', '.addNewUserModal', function () {
            // $('.modal-title').text('Show');
            // $('#id_show').val($(this).data('id'));
            // $('#title_show').val($(this).data('title'));
            // $('#content_show').val($(this).data('content'));
            $('#userLoginModal').modal('hide');
            $('#userRegisterModal').modal('show');
        });
        $(document).on('click', '.showUserLoginModal', function () {
            // $('.modal-title').text('Show');
            // $('#id_show').val($(this).data('id'));
            // $('#title_show').val($(this).data('title'));
            // $('#content_show').val($(this).data('content'));
            $('#userRegisterModal').modal('hide');
            $('#userLoginModal').modal('show');
        });
        $(document).ready(function() {
            $("span.timeago").timeago();
        });


    </script>


</head>

<body>
    <header>
        @if ( 3 < 2 ) <nav class="navbar navbar-expand-lg navbar-dark navbar-fixed-top"
            style="background:#3b5998; display: none;">
            <div class="container-fluid">
                <a class="navbar-brand nav-link" href="/"><strong>MX Store Coding Challenge</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Link</a>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Velodata
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="https://velodata.org">The Velodata Cyber
                                        Security System</a></li>
                                <li><a class="dropdown-item"
                                        href="https://velodata.org/velodata-cyber-security-installation-guide/">The
                                        Velodata Installation Guide</a></li>
                                <li><a class="dropdown-item"
                                        href="https://velodata.org/velodata-cyber-security-fine-tuning-guide/">The
                                        Velodata Fine Tuning Guide</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item"
                                        href="https://velodata.org/velodata-cyber-security-fine-tuning-guide/">Blackhole
                                        Configuration Examples</a></li>
                                <li><a class="dropdown-item"
                                        href="https://velodata.org/velodata-conditional-scanning-logic/">Blackhole
                                        Triggering and Processing Logic</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <div class="navbar-nav ml-auto">
                        @if(Session::get('user'))
                        <a class="nav-item nav-link navbar-title" href="/account">Welcome, {{
                            Session::get('user') }}</a>
                        <a class="nav-item nav-link " href="/logout">Logout</a>
                        @else
                        {{-- <a class="nav-item nav-link navbar-brand active" href="/login">Login</a> --}}
                        {{-- <a class="nav-item nav-link navbar-brand active" href="/register">Register</a> --}}
                        <a class="nav-item nav-link active showUserLoginModal" href="javascript:void(0)">Login</a>
                        <a class="nav-item nav-link active addNewUserModal" href="javascript:void(0)">Register</a>
                        @endif
                    </div>
                </div>
            </div>
            </nav>
            @endif



            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand nav-link" href="/"><strong>MX Store Coding Challenge</strong>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item active dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Velodata
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="https://velodata.org">The Velodata Cyber
                                            Security System</a></li>
                                    <li><a class="dropdown-item"
                                            href="https://velodata.org/velodata-cyber-security-installation-guide/">The
                                            Velodata Installation Guide</a></li>
                                    <li><a class="dropdown-item"
                                            href="https://velodata.org/velodata-cyber-security-fine-tuning-guide/">The
                                            Velodata Fine Tuning Guide</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="https://velodata.org/velodata-cyber-security-fine-tuning-guide/">Blackhole
                                            Configuration Examples</a></li>
                                    <li><a class="dropdown-item"
                                            href="https://velodata.org/velodata-conditional-scanning-logic/">Blackhole
                                            Triggering and Processing Logic</a></li>
                                </ul>
                            </li>

                            {{-- <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                            </li> --}}
                        </ul>
                        <div class="navbar-nav ml-auto">
                            @if(Session::get('user'))
                            <a class="nav-item nav-link active" href="/account"><strong>{{
                                    Session::get('user') }}</strong></a>
                            <a class="nav-item nav-link active" href="/logout">Logout</a>
                            @else
                            {{-- <a class="nav-item nav-link navbar-brand active" href="/login">Login</a> --}}
                            {{-- <a class="nav-item nav-link navbar-brand active" href="/register">Register</a> --}}
                            <a class="nav-item nav-link active showUserLoginModal" href="javascript:void(0)">Login</a>
                            <a class="nav-item nav-link active addNewUserModal" href="javascript:void(0)">Register</a>
                            @endif
                        </div>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
            <!-- Navbar -->
    </header>



    @include('partials.modal_user_login')

    @include('partials.modal_user_register')

    @yield('content')











    <footer class="container"></footer>
</body>