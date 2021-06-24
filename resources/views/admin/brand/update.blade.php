@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Update {{$brand->name}}</h1>
@stop

@section('content')
    <form action="{{ url('/brand/postUpdate/'.$brand->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="txt-name">Id</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ $brand->id }}" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="txt-name">Brand Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}">
            </div>
            <div class="form-group">
                <label for="txt-name">Slogan</label>
                <input type="text" class="form-control" id="slogan" name="slogan" value="{{ $brand->slogan }}">
            </div>
            <div class="form-group">
                <label for="txt-name">Logo</label>
                <input type="file" id="image" name="image">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url('/brand/') }}" class="btn btn-danger">Cancel</a>
        </div>
    </form>
@stop

@section('footer')
    @include('admin.footer')
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@stop
