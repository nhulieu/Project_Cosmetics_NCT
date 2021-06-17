@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Create Category</h1>
@stop

@section('content')
    <form action="{{ route('createCategory') }}" method="post" >
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="txt-name">Category Name</label>
                <input type="text" class="form-control" id="txt-name" name="label" placeholder="Input Category">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url('/category') }}" class="btn btn-danger">Cancel</a>
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
