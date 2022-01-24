@extends('header')

@section('navbar_content')

{{-- <header> --}}
    <nav class="navbar navbar-expand-lg navbar-light" style="background:#D76D77"><a class="navbar-brand" href="/">MX
            Store Candidate Coding Challenge</a><button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">@if(Session::get('user')) <a class="nav-item nav-link" href="/list">List</a><a
                    class="nav-item nav-link" href="/add">Add</a>@endif </div>
            <div class="navbar-nav ml-auto">@if(Session::get('user')) <a class="nav-item nav-link" href="#">Welcome,
                    {
                    {
                    Session: :get('user')
                    }
                    }

                </a><a class="nav-item nav-link" href="/logout">Logout</a>@else <a class="nav-item nav-link active"
                    href="/login">Login</a><a class="nav-item nav-link active" href="/register">Register</a>@endif
            </div>
        </div>
    </nav>
    {{--
</header> --}}

@endsection