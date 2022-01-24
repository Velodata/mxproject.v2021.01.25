@extends('master_layout')

@section('content')


@if(Session::get('user'))


<section class="mx-auto row" style="max-width: 1600px;">
    <h1 class="text-center page-title" style="font-size: 3vw; margin-top: 20px;">Welcome to your Admin dashboard {{
        Session::get('user') }}</h1>
    <h4 class="text-center" style="font-size: 1.2vw; margin-bottom: 1rem;">You may edit fields which aren't disabled and
        you can add as
        many addresses as you
        would like.</h4>

    <div class="col-lg-5 panel" style="padding: 2rem;">
        <h2 class="text-center" style="margin-top: 0pxrem;">Your Personal Information</h2>
        {{-- @if(Session::get('register_status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('register_status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif --}}
        <div class="mx-auto updateForm panel" style="max-width: 500px; padding: 2rem;">
            <div class="alert alert-danger alert-dismissible errorMessage hidden" role="alert">
                We've received a 500 (Internal Server Error). Check your console log for more information.
            </div>
            <form class="" action="updateUser" method="post" return="false">
                <div class="row form-group mb-2">
                    <div class="col-sm-6">
                        <label class="userRegister ">First Name
                            <input type="text" name="firstname" value="{{ $user->firstname }}" class="form-control"
                                placeholder="First Name" required id="firstname_update">
                        </label>
                        <p class="errorFirstName xxtext-center alert alert-danger hidden"></p>
                    </div>
                    <div class="col-sm-6">
                        <label class="userRegister">Second Name
                            <input type="text" name="secondname" value="{{ $user->secondname }}" class="form-control"
                                placeholder="Second Name" required id="secondname_update">
                        </label>
                        <p class="errorSecondName xxtext-center alert alert-danger hidden"></p>
                    </div>
                </div>

                @csrf
                <div class="form-group mb-2">
                    <label class="userRegister">Email
                        <input type="text" name="" value="{{ $user->email }}" class="form-control" disabled
                            placeholder="Enter Email" required>
                    </label>
                    <label class="userRegister hidden">Email
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control"
                            placeholder="Enter Email" required>
                    </label>
                </div>

                <div class="form-group mb-2">
                    <label class="userRegister">Password
                        <input type="password" name="" value="********" class="form-control" disabled
                            placeholder="Enter Password" required></label>
                    <label class="userRegister hidden">Password
                        <input type="password" name="password" value="********" class="form-control"
                            placeholder="Enter Password" required></label>
                </div>

                <div class="form-group mb-2">
                    <label class="userRegister">Mobile</label>
                    <input type="number" name="mobile" value="{{ $user->mobile }}" class="form-control"
                        placeholder="Enter Mobile Number" required id="mobile_update">
                    <p class="errorMobile xxtext-center alert alert-danger hidden"></p>
                </div>

                {{-- <button type="submit" class="btn btn-primary">Update</button> --}}
            </form>
            <div class="card-footer d-inline-block">
                <button type="button" class="btn btn-primary buttonUpdateUser">
                    <span id="" class='glyphicon glyphicon-check'><i class="bi-cloud-upload"></i> Update
                </button>
                <span class="" style="font-size: 11px; padding-left: 10px"><i>Last updated
                        <span class="timeago page-updated-at" title="{{ $user->updated_at }}"></span></i>
                </span>

            </div>
            <p class="successMessage text-center hidden">Successfully Updated....</p>
        </div>
    </div>
    <script>
        $('.updateForm').on('click', '.buttonUpdateUser', function () {
            $('.errorFirstName').addClass('hidden');
            $('.errorSecondName').addClass('hidden');
            $('.errorEmail').addClass('hidden');
            $('.errorPassword').addClass('hidden');
            $('.errorConfirmPassword').addClass('hidden');
            $('.errorMobile').addClass('hidden');
            $.ajax({
                type: 'POST',
                url: 'updateUser',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'firstname': $('#firstname_update').val(),
                    'secondname': $('#secondname_update').val(),
                    'mobile': $('#mobile_update').val(),
                },
                error: function (data) {
                    if ((data.status == 500 && data.responseJSON)) {
                        toastr.error('Server Error!' + data.message, 'Error Alert', {timeOut: 5000});
                        console.log('Hmmmmm...  we should not be here....');
                        console.log(data); 
                        console.log(data.responseJSON);
                        $('.errorMessage').removeClass('hidden');
                        $('.errorMessage').text("We've received a 500 (Internal Server Error).  Check your console log for more information.");
                    }
                },
                success: function (data) {
                    if ((data.errors)) {
                        toastr.error('Validation error!', 'Error Alert', {timeOut: 10000});
                        console.log(data.responseJSON);
                        if (data.errors.firstname) {
                            $('.errorFirstName').removeClass('hidden');
                            $('.errorFirstName').text(data.errors.firstname);
                        }
                        if (data.errors.secondname) {
                            $('.errorSecondName').removeClass('hidden');
                            $('.errorSecondName').text(data.errors.secondname);
                        }
                        if (data.errors.mobile) {
                            $('.errorMobile').removeClass('hidden');
                            $('.errorMobile').text(data.errors.mobile);
                        }
                    } else {
                        console.log(data);
                        // toastr.success('Successfully Updated. Reloading page in 2 seconds...', 'Congratulations!', {timeOut: 5000});
                        $('.successMessage').removeClass('hidden');
                        $('.page-title').text("Welcome to your Admin dashboard " + data.name);
                        $('.page-updated-at').prop('title', data.just_now);
                        $('.navbar-title').text("Welcome, " + data.name);
                        setTimeout(function() {
                            $('.successMessage').addClass('hidden');
                            $(".timeago").timeago();
                            // window.location.href = '/account';
                        }, 2000);
                    }
                },
            });
        });
    </script>



    <div class="mx-auto col-lg-7 panel" style="max-width: 1300px; padding: 2rem;">
        <h2 class="text-center" style="margin-top: 0pxrem;">Manage Your Addresses</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul>
                    <li><i class="fa fa-file-text-o"></i> Your Current Addresses</li>
                    <li><i class="fa fa-file-text-o"></i>
                        <a href="../" class="">
                            Home Page</a>
                    </li>
                    <a href="#" class="add-modal">
                        <li>Add a New Address</li>
                    </a>
                </ul>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="postTable"
                    style="visibility: hidden;">
                    <thead>
                        <tr>
                            {{-- <th style='valign: middle;'>User ID</th> --}}
                            <th class="minwidth150">Address</th>
                            <th>Last updated</th>
                            <th>Actions</th>
                        </tr>
                        {{ csrf_field() }}
                    </thead>
                    <tbody>
                        @foreach($addresses as $address)
                        <tr class="item{{$address->id}} @if($address->is_published) warning @endif">
                            {{-- <td>{{ $address->id }}</td> --}}
                            <td><strong>{{ $address->address1 }}</strong><br>{{ $address->suburb }}, {{
                                $address->postcode }}</td>
                            {{-- <td>
                                {{ App\Models\Post::getExcerpt($post->content) }}
                            </td> --}}
                            {{-- <td class="text-center">
                                <input type="checkbox" class="published" data-id="{{$post->id}}"
                                    @if($post->is_published)
                                checked
                                @endif>
                            </td> --}}
                            {{-- <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                                $post->updated_at)->diffForHumans()
                                }}
                            </td> --}}
                            <td>{{ $address->updated_at }}
                            </td>
                            <td>
                                <button class="show-modal btn btn-success" data-id="{{$address->id}}"
                                    data-title="{{$address->address1}}" data-title="{{$address->address2}}"
                                    data-content="{{$address->suburb}}" data-content="{{$address->state}}"
                                    data-content="{{$address->postcode}}" data-content="{{$address->postcode}}">
                                    <span class="glyphicon glyphicon-eye-open"></span> Show</button>
                                <button class="edit-modal btn btn-info" data-id="{{$address->id}}"
                                    data-title="{{$address->address1}}" data-content="{{$address->suburb}}">
                                    <span class="glyphicon glyphicon-edit"></span> Edit</button>
                                <button class="delete-modal btn btn-danger" data-id="{{$address->id}}"
                                    data-title="{{$address->address1}}" data-content="{{$address->suburb}}">
                                    <span class="glyphicon glyphicon-trash"></span> Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.panel-body -->
        </div><!-- /.panel panel-default -->
    </div><!-- /.col-md-8 -->
</section>


































<!-- Modal form to add a new address -->
<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content rounded-5 shadow-5-strong">
            <div class="modal-header" style="display: block;">
                {{-- <button type="button" class="close" data-dismiss="modal">×</button> --}}
                <h2 class="modal-title"></h2>
                <h5>All fields are mandatory except Address Line 2</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible errorMessage hidden" role="alert">
                    We received a 500 (Internal Server Error). Check your console log for more information.
                </div>
                <form class="form-horizontal" role="form" style="font-size: 16px;">
                    @csrf
                    <div class="form-outline mb-4">
                        <input type="text" id="formAddress1" class="form-control" />
                        <label class="form-label" for="formAddress1">Address1</label>
                        {{-- <small>Max: 45, only alphanumeric text</small> --}}
                        <p class="errorAddress1 text-center alert alert-danger hidden"></p>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="formAddress2" class="form-control" />
                        <label class="form-label" for="formAddress2">Address2</label>
                        {{-- <small>Max: 45, only alphanumeric text, not mandatory</small> --}}
                        <p class="errorAddress2 text-center alert alert-danger hidden"></p>
                    </div>

                    <div class="row">
                        <div class="form-outline col-sm-6">
                            <input type="text" id="formSuburb" class="form-control">
                            <label class="form-label" for="formSuburb">Suburb/City</label>
                            {{-- <small>Min: 2, Max: 45, only text</small> --}}
                            <p class="errorSuburb text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="form-outline col-sm-6">
                            <select id="formState" class="form-select form-control">
                                <option selected></option>
                                <option>ACT</option>
                                <option>NSW</option>
                                <option>QLD</option>
                                <option>SA</option>
                                <option>VIC</option>
                                <option>WA</option>
                            </select>
                            <label class="form-label" for="formState">State</label>
                            {{-- <small>Min: 2, Max: 45, only text</small> --}}
                            <p class="errorState text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-outline col-md-4">

                        </div>
                    </div>

                    <div class="row" style="">
                        <div class="form-outline col-sm-6">
                            <input type="number" id="formPostcode" class="form-control">
                            <label class="form-label" for="formPostcode">Post Code</label>
                            {{-- <small>Min: 2, Max: 45, only text</small> --}}
                            <p class="errorPostcode text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="form-outline col-sm-6">
                            <select id="formCountry" class="form-select form-control">
                                <option selected></option>
                                <option>Australia</option>
                                <option>New Zealand</option>
                            </select>
                            <label class="form-label" for="formCountry">State</label>
                            {{-- <small>Min: 2, Max: 45, only text</small> --}}
                            <p class="errorCountry text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary add" data-dismiss="modal">
                        <span id="" class='glyphicon glyphicon-check'></span><i class="bi-plus-circle"></i> Add
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'><i class="bi-x-square"></i></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $(document).on('blur', '#formAddress1', function () {
            if($(this).val() !='' ) {
                $(this).addClass('active');
            }else{
                $(this).removeClass('active');
            }  
        });
        $(document).on('blur', '#formAddress2', function () {
            if($(this).val() !='' ) {
                $(this).addClass('active');
            }else{
                $(this).removeClass('active');
            }  
        });
        $(document).on('blur', '#formSuburb', function () {
            if($(this).val() !='' ) {
                $(this).addClass('active');
            }else{
                $(this).removeClass('active');
            }  
        });
        $(document).on('blur', '#formState', function () {
            if($(this).val() !='' ) {
                $(this).addClass('active');
            }else{
                $(this).removeClass('active');
            }  
        });
        $(document).on('blur', '#formPostcode', function () {
            if($(this).val() !='' ) {
                $(this).addClass('active');
            }else{
                $(this).removeClass('active');
            }  
        });
        $(document).on('blur', '#formCountry', function () {
            if($(this).val() !='' ) {
                $(this).addClass('active');
            }else{
                $(this).removeClass('active');
            }  
        });
        $(document).on('blur', '#inputState', function () {
            if($(this).val() !='' ) {
                $(this).addClass('active');
            }else{
                $(this).removeClass('active');
            }  
        });
    });

    // add a new address
    $(document).on('click', '.add-modal', function () {
        $('.modal-title').text('Add a New Address to your Account');
        $('#addModal').modal('show');
    });
    $('.modal-footer').on('click', '.add', function () {
        $('.errorAddress1').addClass('hidden');
        $('.errorAddress2').addClass('hidden');
        $('.errorSuburb').addClass('hidden');
        $('.errorState').addClass('hidden');
        $('.errorPostcode').addClass('hidden');
        $('.errorCountry').addClass('hidden');
        $.ajax({
            type: 'POST',
            url: 'addNewAddress',
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': "{{ Session::get('user_id') }}",
                'address1': $('#formAddress1').val(),
                'address2': $('#formAddress2').val(),
                'suburb': $('#formSuburb').val(),
                'state': $('#formState').val(),
                'postcode': $('#formPostcode').val(),
                'country': $('#formCountry').val(),
            },
            error: function (data) {
                if ((data.status == 500 )) {
                    toastr.error('Server Error!' + data.message, 'Error Alert', {timeOut: 5000});
                    console.log('Hmmmmm...  we should not be here....');
                    console.log(data); 
                    console.log(data.responseJSON);
                    $('.errorMessage').removeClass('hidden');
                    $('.errorMessage').text("We received a 500 (Internal Server Error).  Check your console log for more information.");
                }
            },
            success: function (data) {
                $('.errorAddress1').addClass('hidden');
                $('.errorAddress2').addClass('hidden');
                $('.errorSuburb').addClass('hidden');
                $('.errorState').addClass('hidden');
                $('.errorPostcode').addClass('hidden');
                $('.errorCountry').addClass('hidden');
                if ((data.errors)) {
                    setTimeout(function () {
                        $('#addModal').modal('show');
                        toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                    }, 500);
                    if (data.errors.address1) {
                        $('.errorAddress1').removeClass('hidden');
                        $('.errorAddress1').text(data.errors.address1);
                    }
                    if (data.errors.address2) {
                        $('.errorAddress2').removeClass('hidden');
                        $('.errorAddress2').text(data.errors.address2);
                    }
                    if (data.errors.suburb) {
                        $('.errorSuburb').removeClass('hidden');
                        $('.errorSuburb').text(data.errors.suburb);
                    }
                    if (data.errors.state) {
                        $('.errorState').removeClass('hidden');
                        $('.errorState').text(data.errors.state);
                    }
                    if (data.errors.postcode) {
                        $('.errorPostcode').removeClass('hidden');
                        $('.errorPostcode').text(data.errors.postcode);
                    }
                    if (data.errors.country) {
                        $('.errorCountry').removeClass('hidden');
                        $('.errorCountry').text(data.errors.country);
                    }
                } else {
                    toastr.success('You successfully added a new Address', 'Congratulations!', {timeOut: 5000});
                    // $('#postTable').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.title + "</td><td>" + data.content + "</td><td class='text-center'><input type='checkbox' class='new_published' data-id='" + data.id + " '></td><td>Right now</td><td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphiconglyphicon-eye-open'></span> Show</button><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphiconglyphicon-edit'></span> Edit</button><button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphiconglyphicon-trash'></span> Delete</button></td></tr>");
                    // $('.new_published').iCheck({
                    //     checkboxClass: 'icheckbox_square-yellow',
                    //     radioClass: 'iradio_square-yellow',
                    //     increaseArea: '20%'
                    // });
                    // $('.new_published').on('ifToggled', function (event) {
                    //     $(this).closest('tr').toggleClass('warning');
                    //     });
                    // $('.new_published').on('ifChanged', function (event) {
                    //     id = $(this).data('id');
                    //     $.ajax({
                    //         type: 'POST',
                    //         url: "{{ URL::route('changeStatus') }}",
                    //         data: {
                    //             '_token': $('input[name=_token]').val(),
                    //             'id': id
                    //         },
                    //         success: function (data) {
                    //             // empty
                    //         },
                    //     });
                    // });
                    setTimeout(function() {
                        $('#addModal').modal('hide');
                        window.location.href = '/account';
                    }, 5000);

                }
            },
        });
    });
</script>












@endif {{-- // User is logged in --}}


@if(! Session::get('user'))
<div class="mx-auto xxcol-md-8 xxcol-md-offset-2" style="max-width: 1300px; padding: 0 2rem;">
    <h1>Sorry, but you're not logged.</h1>
    <h4>Only logged in users can access their Account Administration Page.</h4>
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