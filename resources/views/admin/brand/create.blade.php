@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Create Brand</h1>
@stop

@section('content')
    <form action="{{ route('createBrand') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="txt-name">Brand Name</label>
                <input type="text" class="form-control" id="txt-name" name="name" placeholder="Brand Name">
            </div>
            <div class="form-group">
                <label for="txt-name">Slogan</label>
                <input type="text" class="form-control" id="txt-name" name="slogan" placeholder="Slogan">
            </div>
            <div class="form-group">
                <label for="txt-name">Logo :</label>
                <input type="file" id="image" name="image" placeholder="logo">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url('/brand') }}" class="btn btn-danger">Cancel</a>
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
