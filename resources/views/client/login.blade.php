@extends('layout.layout')
@section('title', 'Login')

@section('content')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Login & Register</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Login Start -->
    <div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="register-form">
                        <form action="{{ route('postRegister') }}" method="post">
                            <div class="row">
                                @csrf
                                <div class="col-md-12">
                                    <h2><label style="text-align: center">Join with us</label></h2>
                                </div>
                                <div class="col-md-12">
                                    @if ($errors->has('firstName'))
                                        <span class="pull-right"
                                              style="color: red">{{ $errors->first('firstName') }}</span>
                                    @endif
                                    <input class="form-control" name="firstName" type="text" placeholder="First Name">
                                </div>
                                <div class="col-md-12">
                                    @if ($errors->has('lastName'))
                                        <span class="pull-right"
                                              style="color: red">{{ $errors->first('firstName') }}</span>
                                    @endif
                                    <input class="form-control" name="lastName" type="text" placeholder="Last Name">
                                </div>
                                <div class="col-md-12">
                                    @if ($errors->has('username'))
                                        <span class="pull-right"
                                              style="color: red">{{ $errors->first('firstName') }}</span>
                                    @endif
                                    <input class="form-control" name="username" type="text" placeholder="Username">
                                </div>
                                <div class="col-md-12">
                                    @if ($errors->has('address'))
                                        <span class="pull-right"
                                              style="color: red">{{ $errors->first('firstName') }}</span>
                                    @endif
                                    <input class="form-control" name="address" type="text" placeholder="Address">
                                </div>
                                <div class="col-md-12">
                                    @if ($errors->has('email'))
                                        <span class="pull-right"
                                              style="color: red">{{ $errors->first('firstName') }}</span>
                                    @endif
                                    <input class="form-control" name="email" type="email" placeholder="E-mail">
                                </div>
                                <div class="col-md-12">
                                    @if ($errors->has('password'))
                                        <span class="pull-right"
                                              style="color: red">{{ $errors->first('firstName') }}</span>
                                    @endif
                                    <input class="form-control" name="password" type="password"
                                           placeholder="Password">
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" name="confirmPassword" type="password"
                                           placeholder="Confirm Password">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn">Submit</button>
                                    <button type="reset" class="btn">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login-form">
                        <form action="{{ url('checkLogin') }}" method="post">
                            <div class="row">
                                @csrf
                                <div class="col-md-12">
                                    <h2><label style="text-align: center">Login</label></h2>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-group-lg rounded-0">
                                        <input name="emailLogin" class="form-control form-control-lg rounded-0"
                                               type="text"
                                               placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-group-lg rounded-0">
                                        <div class="input-group">
                                            <input name="passwordLogin" class="form-control form-control-lg rounded-0"
                                                   type="password"
                                                   placeholder="Password" data-toggle="password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fas fa-eye" id="icon" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <span>{{ $message }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newaccount">
                                        <label class="custom-control-label" for="newaccount">Keep me signed
                                            in</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->

    <script src="{{ asset('/js/bootstrap-show-password.js') }}">

    </script>

@endsection
