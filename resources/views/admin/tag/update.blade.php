@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Update {{ $tag->label}}</h1>
@stop

@section('content')
    <form action="{{ url('admin/tag/postUpdate/'.$tag->id) }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="txt-name">Id</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ $tag->id }}" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="txt-name">Label Name</label>
                <input type="text" class="form-control" id="label" name="label" value="{{ $tag->label }}">
            </div>
            <div class="form-group">
                <label for="txt-name">Description</label>
                <input type="text" class="form-control" id="description" name="description"
                       value="{{ $tag->description }}">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url('/admin/tag') }}" class="btn btn-danger">Cancel</a>
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
