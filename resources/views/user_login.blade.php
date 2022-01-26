@extends('master_layout')

@section('content')

@if(! Session::get('user'))
<div class="mx-auto xxcol-md-8 xxcol-md-offset-2" style="max-width: 1300px; padding: 2rem;">
    <h1>Sorry, but you're not logged in.</h1>
    <h5><i>Only logged in users can access their Account Administration Page.</i></h5>
    <div class="card-footer d-inline-block">
        <p class="float-right mt-2"> Not logged in?
            <a class="active showUserLoginModal" href="javascript:void(0)"><span style="font-weight: 600;">Login</span>
            </a>
        </p>
    </div>
    @if(Session::get('register_status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('register_status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif

</div>
@endif {{-- // User is NOT logged in --}}


@endsection