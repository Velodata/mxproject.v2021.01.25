<div id="userLoginModal" class="modal xxfade" role="dialog">
    <div class="modal-dialog " style="max-width: 500px;">
        <div class="modal-content rounded-5 shadow-5-strong p-5" style="font-size: 16px;">
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
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
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
                        <i class="bi-box-arrow-in-right"></i> Login
                    </button>
                    <button type="button" class="btn btn-warning btn-block" data-bs-dismiss="modal">
                        <i class="bi-x-octagon"></i> Close
                    </button>
                    <p class="successMessage text-center hidden">Successful Login. Please stand by....</p>
                    <div class="card-footer d-inline-block">
                        <p class="float-right mt-2"> Don't have an account?
                            <a class="active addNewUserModal" href="javascript:void(0)"> Register</a>

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