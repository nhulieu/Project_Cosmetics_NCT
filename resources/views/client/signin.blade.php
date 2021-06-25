@extends('layout.layout')
@section('title', 'Sign Up/ Sign In')
@section('content')
    <!-- Login Start -->
    <div class="my-account">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link" id="signup-nav active" data-toggle="pill" href="#signup-tab" role="tab"><i
                                class="fa fa-user"></i>Sign Up</a>
                        <a class="nav-link" id="signin-nav" data-toggle="pill" href="#signin-tab" role="tab"><i
                                class="fa fa-sign-in-alt"></i>Sign In</a>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="tab-content">
                        @if($isSignup)
                            <div class="tab-pane fade show active" id="signup-tab" role="tabpanel"
                                 aria-labelledby="signup-nav">
                                @else
                                    <div class="tab-pane fade" id="signup-tab" role="tabpanel"
                                         aria-labelledby="signup-nav">
                                        @endif

                                        <div class="register-form">
                                            <h4>Sign Up</h4>
                                            <form id="register-form" action="signup" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>First Name</label>
                                                        <input class="form-control" type="text"
                                                               placeholder="First Name" name="txtFirstName">
                                                        @if ($errors->has('txtFirstName'))
                                                            <span class="pull-right"
                                                                  style="color: red">{{ $errors->first('txtFirstName') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Last Name</label>
                                                        <input class="form-control" type="text"
                                                               placeholder="Last Name" name="txtLastName">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Username</label>
                                                        <input class="form-control" type="text"
                                                               placeholder="Username" name="txtUserName">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>E-mail</label>
                                                        <input class="form-control" type="email"
                                                               placeholder="E-mail" name="txtEmail">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>Mobile No</label>
                                                        <input class="form-control" type="tel"
                                                               placeholder="Mobile No" name="txtPhone">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>Address</label>
                                                        <input class="form-control" type="text"
                                                               placeholder="Address" name="txtAddress">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>Password</label>
                                                        <input id="password" class="form-control"
                                                               type="password" placeholder="Password"
                                                               name="txtAccountPass">

                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Retype Password</label>
                                                        <input id="confirm-password" class="form-control"
                                                               type="password" placeholder="Password"
                                                               name="txtAccountPassRepeat">
                                                    </div>
                                                    @switch($status)
                                                        @case(1)
                                                        <div class='alert alert-danger'><strong>Fail!</strong> The email
                                                            has been used.
                                                        </div>
                                                        @break
                                                        @case(2)
                                                        <div class='alert alert-success'><strong>Success!</strong> The
                                                            sign up has been completed.
                                                        </div>
                                                        @break
                                                        @default
                                                    @endswitch
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn" value="Sign Up"/>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    @if ($isSignup)
                                        <div class="tab-pane fade" id="signin-tab" role="tabpanel"
                                             aria-labelledby="signin-nav">
                                            @else
                                                <div class="tab-pane fade show active" id="signin-tab" role="tabpanel"
                                                     aria-labelledby="signin-nav">
                                                    @endif
                                                    <div class="login-form">
                                                        <h4>Sign In</h4>
                                                        <form action="/signin" method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input class="form-control" require type="text"
                                                                           placeholder="E-mail"
                                                                           name="txtLoginUser">
                                                                    @if ($errors->has('txtLoginUser'))
                                                                        <p class="text-right"
                                                                           style="color: red;">{{ $errors->first('txtLoginUser') }}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input class="form-control" require type="password"
                                                                           placeholder="Password"
                                                                           name="txtLoginPassword">

                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                               class="custom-control-input"
                                                                               id="newaccount" name="keepSignin">
                                                                        <label class="custom-control-label"
                                                                               for="newaccount">Keep me signed
                                                                            in</label>
                                                                    </div>
                                                                </div>
                                                                @switch($status)
                                                                    @case(3)
                                                                    <div class='alert alert-danger'>
                                                                        <strong>Fail!</strong> Wrong username or
                                                                        password.
                                                                    </div>
                                                                    @break
                                                                    @default
                                                                @endswitch
                                                                <div class="col-md-12">
                                                                    <button type="submit" class="btn">Sign In</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                        </div>
                            </div>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById("confirm-password").onkeyup = function (e) {
                    var pwd1 = document.getElementById("password");
                    var pwd2 = document.getElementById("confirm-password");
                    pwd2.setCustomValidity("");

                    if (pwd1.value != pwd2.value) {
                        document.getElementById("confirm-password").setCustomValidity("The passwords don't match"); //The document.getElementById("cnfrm-pw") selects the id, not the value
                    } else {
                        document.getElementById("confirm-password").setCustomValidity("");
                        //empty string means no validation error
                    }
                    e.preventDefault(); //would still work if this wasn't present
                }

                document.getElementById("password").onkeyup = document.getElementById("confirm-password").onkeyup;
            </script>
@endsection
