@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Create Tag</h1>
@stop

@section('content')
    <form action="{{ route('createTag') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="">Tag Label</label>
                <input type="text" class="form-control" id="label" name="label" placeholder="Input Tag">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Description">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url('/tag/') }}" class="btn btn-danger">Cancel</a>
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
