@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Update {{$category->label}}</h1>
@stop

@section('content')
    <form action="{{ url('/category/postUpdate/'.$category->id) }}" method="post" >
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="txt-name">Id</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ $category->id }}" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="txt-name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
            </div>
            <div class="form-group">
                <label for="txt-name">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $category->description }}">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button class="btn btn-danger" onclick="">Cancel</button>
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
