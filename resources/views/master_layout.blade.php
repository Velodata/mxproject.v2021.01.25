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
    <title>Laravel Coding Challenge</title>


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
                        <a class="nav-item nav-link navbar-brand navbar-title" href="/account">Welcome, {{
                            Session::get('user') }}</a>
                        <a class="nav-item nav-link navbar-brand" href="/logout">Logout</a>
                        @else
                        {{-- <a class="nav-item nav-link navbar-brand active" href="/login">Login</a> --}}
                        {{-- <a class="nav-item nav-link navbar-brand active" href="/register">Register</a> --}}
                        <a class="nav-item nav-link navbar-brand active showUserLoginModal"
                            href="javascript:void(0)">Login</a>
                        <a class="nav-item nav-link navbar-brand active addNewUserModal"
                            href="javascript:void(0)">Register</a>
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
                            <a class="nav-item nav-link navbar-brand navbar-title" href="/account">Welcome, {{
                                Session::get('user') }}</a>
                            <a class="nav-item nav-link navbar-brand" href="/logout">Logout</a>
                            @else
                            {{-- <a class="nav-item nav-link navbar-brand active" href="/login">Login</a> --}}
                            {{-- <a class="nav-item nav-link navbar-brand active" href="/register">Register</a> --}}
                            <a class="nav-item nav-link navbar-brand active showUserLoginModal"
                                href="javascript:void(0)">Login</a>
                            <a class="nav-item nav-link navbar-brand active addNewUserModal"
                                href="javascript:void(0)">Register</a>
                            @endif
                        </div>
                        {{-- <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form> --}}
                    </div>
                </div>
            </nav>
            <!-- Navbar -->


            @if ( 3 < 2 ) <!-- Background image -->
                <div id="intro" class="bg-image shadow-2-strong">
                    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-5 col-md-8" style="max-width: 500px;">
                                    <form class="bg-white  rounded-5 shadow-5-strong p-5" style="font-size: 16px;">
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <input type="email" id="form1Example1" class="form-control" />
                                            <label class="form-label" for="form1Example1">Email address</label>
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <input type="password" id="form1Example2" class="form-control" />
                                            <label class="form-label" for="form1Example2">Password</label>
                                        </div>

                                        <!-- 2 column grid layout for inline styling -->
                                        <div class="row mb-4">
                                            <div class="col d-flex justify-content-center">
                                                <!-- Checkbox -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="form1Example3" checked />
                                                    <label class="form-check-label" for="form1Example3">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col text-center">
                                                <!-- Simple link -->
                                                <a href="#!">Forgot password?</a>
                                            </div>
                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(function () {
                $(document).on('blur', '#form1Example1', function () {
                    if($('#form1Example1').val() !='' ) {
                        $('#form1Example1').addClass('active');
                    }else{
                        $('#form1Example1').removeClass('active');
                    }  
                });
                $(document).on('blur', '#form1Example2', function () {
                    if($('#form1Example2').val() !='' ) {
                        $('#form1Example2').addClass('active');
                    }else{
                        $('#form1Example@').removeClass('active');
                    }  
                });
            });
                </script>
                <!-- Background image -->
                @endif




    </header>


    {{-- <section class="content d-flex justify-content-center"> --}}
        @yield('content')
        {{-- </section> --}}


    <div id="userRegisterModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="max-width: 500px; font-size: 16px;">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <button type="button" class="close" data-bs-dismiss="modal">
                        Close
                    </button> --}}
                    <h1>Sign Up</h1>
                    <h5>It's quick and easy</h5>
                </div>
                <div class="modal-body">
                    <form action="addNewUser" method="post" return="false">
                        <div class="row form-group">
                            <div class="col-sm-6 form-outline mb-4">
                                <input type="email" id="firstname_add" class="form-control" />
                                <label class="form-label" for="firstname_add">First Name</label>
                                <p class="errorFirstName xxtext-center alert alert-danger hidden"></p>
                            </div>
                            <div class="col-sm-6 form-outline mb-4">
                                <input type="email" id="secondname_add" class="form-control" />
                                <label class="form-label" for="secondname_add">Second Name</label>
                                <p class="errorSecondName xxtext-center alert alert-danger hidden"></p>
                            </div>
                        </div>

                        @csrf

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email_add" class="form-control" />
                            <label class="form-label" for="email_add">Email address</label>
                            <p class="errorEmail text-center alert alert-danger hidden"></p>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="password_add" class="form-control" />
                            <label class="form-label" for="password_add">Password</label>
                            <p class="errorPassword text-center alert alert-danger hidden"></p>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" id="confirm_password_add" class="form-control" />
                            <label class="form-label" for="confirm_password_add">Confirm Password</label>
                        </div>

                        {{-- <div class="row form-group">
                            <div class="col-sm-12"> <label class="userRegister">Mobile</label>
                                <input type="number" name="mobile" value="{{ old('mobile') }}" class="form-control"
                                    id="mobile_add" placeholder="Enter Mobile Number" required>
                                <p class="errorMobile text-center alert alert-danger hidden"></p>
                                </label>
                            </div>
                        </div> --}}

                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success buttonAddUser btn-block">
                            <span id="" class='glyphicon glyphicon-check'></span> Sign Up!
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                        <div class="card-footer d-inline-block">
                            <p class="float-right mt-2"> Already have an account?
                                <a class="active showUserLoginModal" href="javascript:void(0)">Login</a>
                                {{-- <a href="{{ url('user-login')}}" class="text-success"> Login </a> --}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.modal-footer').on('click', '.buttonAddUser', function () {
            $('.errorFirstName').addClass('hidden');
            $('.errorSecondName').addClass('hidden');
            $('.errorEmail').addClass('hidden');
            $('.errorPassword').addClass('hidden');
            $('.errorConfirmPassword').addClass('hidden');
            // $('.errorMobile').addClass('hidden'); 
            $('#userLoginModal').modal('hide');
            $.ajax({
                type: 'POST',
                url: 'addNewUser',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'firstname': $('#firstname_add').val(),
                    'secondname': $('#secondname_add').val(),
                    'email': $('#email_add').val(),
                    'password': $('#password_add').val(),
                    'confirm_password': $('#confirm_password_add').val(),
                    // 'mobile': $('#mobile_add').val(),
                },

                error: function (data) {
                    if ((data.status = 500 && data.responseJSON)) {
                        $('#addModal').modal('show');
                        toastr.error('Validation error!' + data.message, 'Error Alert', {timeOut: 5000});
                        console.log(data.responseJSON);                    
                        $('.errorEmail').removeClass('hidden');
                        $('.errorEmail').text("We've received a 500 (Internal Server Error).  Check your console log for more information.");
                    }
                },

                success: function (data) {
                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 10000});
                        }, 500);
                        if (data.errors.firstname) {
                            $('.errorFirstName').removeClass('hidden');
                            $('.errorFirstName').text(data.errors.firstname);
                        }
                        if (data.errors.secondname) {
                            $('.errorSecondName').removeClass('hidden');
                            $('.errorSecondName').text(data.errors.secondname);
                        }
                        if (data.errors.email) {
                            $('.errorEmail').removeClass('hidden');
                            $('.errorEmail').text(data.errors.email);
                        }
                        if (data.errors.password) {
                            $('.errorPassword').removeClass('hidden');
                            $('.errorPassword').text(data.errors.password);
                            }
                        if (data.errors.confirm_password) {
                            $('.errorConfirmPassword').removeClass('hidden');
                            $('.errorConfirmPassword').text(data.errors.confirm_password);
                            }
                        if (data.errors.mobile) {
                            $('.errorMobile').removeClass('hidden');
                            $('.errorMobile').text(data.errors.mobile);
                        }
                    } else {
                        toastr.success('You have successfully added a new user to the system! ' + 
                                       'Please log in with your email and password.' + 
                                       '', 'Congratulations!', {timeOut: 10000});
                        $('#userRegisterModal').modal('hide');
                        setTimeout(function() {
                            $('#userLoginModal').modal('show');
                        }, 2000); 
                    }
                },
            });
        });
    </script>










    <div id="userLoginModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="max-width: 500px;">
            <div class="modal-content" style="font-size: 16px;">
                <div class="modal-header">
                    {{-- <button type="button" class="close" data-dismiss="modal">×</button> --}}
                    <h1>Login to the System</h1>
                    <h5>It's quick and easy</h5>
                </div>
                <div class="modal-body">
                    <form method="post">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email_login" class="form-control" />
                            <label class="form-label" for="email_login">Email address</label>
                            <p class="errorEmail text-center alert alert-danger hidden"></p>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="password_login" class="form-control" />
                            <label class="form-label" for="password_login">Password</label>
                            <p class="errorPassword text-center alert alert-danger hidden"></p>
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3"
                                        checked />
                                    <label class="form-check-label" for="form1Example3">
                                        Remember me
                                    </label>
                                </div>
                            </div>

                            <div class="col text-center">
                                <!-- Simple link -->
                                <a href="#!" style="text-decoration: unset;">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        {{-- <button type="button" class="btn btn-primary btn-block buttonLoginUser">Sign in</button>
                        --}}
                        {{-- <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                id="email_login" placeholder="Enter Email" required>
                            <p class="errorEmail text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" id="password_login"
                                placeholder="Enter Password" required>
                            <p class="errorPassword text-center alert alert-danger hidden"></p>
                        </div> --}}
                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary buttonLoginUser btn-block">
                            <i class="bi-box-arrow-in-right"></i></i> Login
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'><i class="bi-x-square"></i></span> Close
                        </button>
                        <p class="successMessage text-center hidden">Successful Login. Please stand by....</p>
                        <div class="card-footer d-inline-block">
                            <p class="float-right mt-2"> Don't have an account?
                                <a class="active addNewUserModal" href="javascript:void(0)"> Register</a>
                                {{-- <a href="{{ url('user-registration')}}" class="text-success">
                                    Register </a> --}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('blur', '.form-control', function () {
            if($(this).val() !='' ) {
                $(this).addClass('active');
            }else{
                $(this).removeClass('active');
            }  
        });

        $('.modal-footer').on('click', '.buttonLoginUser', function () {
            $('.errorEmail').addClass('hidden');
            $('.errorPassword').addClass('hidden');
            $.ajax({
                type: 'POST',
                url: 'loginUser',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'email': $('#email_login').val(),
                    'password': $('#password_login').val(),
                },
                error: function (data) {
                    if ((data.status = 500 && data.responseJSON)) {
                        $('#addModal').modal('show');
                        toastr.error('Validation error!' + data.message, 'Error Alert', {timeOut: 5000});
                        console.log(data.responseJSON);                    
                        $('.errorEmail').removeClass('hidden');
                        $('.errorEmail').text("We've received a 500 (Internal Server Error).  Check your console log for more information.");
                    }
                },
                success: function (data) {
                    
                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);
                        if (data.errors.email) {
                            $('.errorEmail').removeClass('hidden');
                            $('.errorEmail').text(data.errors.email);
                        }
                        if (data.errors.password) {
                            $('.errorPassword').removeClass('hidden');
                            $('.errorPassword').text(data.errors.password);
                            }
                        return;
                    } 
                    toastr.success('You have Successfully logged in as ' + data.name + 
                                    "", 'Congratulations!', {timeOut: 5000});
                    $('.successMessage').removeClass('hidden');
                    setTimeout(function() {
                        $('#userLoginModal').modal('hide');
                        window.location.href = '/account';
                    }, 5000);
                },
            });
        });
    </script>














    <footer class="container"></footer>
</body>