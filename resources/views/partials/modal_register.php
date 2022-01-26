


<div id="userRegisterModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 500px; font-size: 16px;">
        <div class="modal-content">
            <div class="modal-header">
                
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

                    <!-- <div class="row form-group">
                        <div class="col-sm-12"> <label class="userRegister">Mobile</label>
                            <input type="number" name="mobile" value="{{ old('mobile') }}" class="form-control"
                                id="mobile_add" placeholder="Enter Mobile Number" required>
                            <p class="errorMobile text-center alert alert-danger hidden"></p>
                            </label>
                        </div>
                    </div>  -->

                    <!-- {{-- <button type="submit" class="btn btn-primary">Submit</button> --}} -->
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
                            <!-- {{-- <a href="{{ url('user-login')}}" class="text-success"> Login </a> --}} -->
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




