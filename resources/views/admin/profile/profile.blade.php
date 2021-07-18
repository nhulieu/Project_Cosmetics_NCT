@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h3 class="text-center">Profile {{ $profile->username }}</h3>
        <form action="{{ url('admin/updateProfile') }}" method="post">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Name</span>
                        <input readonly type="text" class="form-control"
                               value="{{ $profile->fname }} {{ $profile->lname }}">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Email</span>
                        <input readonly type="text" class="form-control" value="{{ $profile->email }}">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Username</span>
                        <input readonly type="text" class="form-control" value="{{ $profile->username }}">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Address</span>
                        <input readonly type="text" class="form-control" value="{{ $profile->address }}">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Phone</span>
                        <input readonly type="text" class="form-control" value="{{ $profile->phone }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Password</span>
                            <input name="password" type="password" id="password" class="form-control"
                                   placeholder="password">
                        </div>

                        @error('password')
                        <div class="text-sm text-red">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <input name="confirmPassword" type="password" id="confirmPassword" class="form-control"
                                   placeholder="confirm password">
                        </div>

                        @error('confirmPassword')
                        <div class="text-sm text-red">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                </div>
            </div>
        </form>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
    </div>
@stop

@section('js')
@stop

@section('footer')
    @include('admin.footer')
@stop
