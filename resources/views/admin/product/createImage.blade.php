@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-6 mt-5">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Image</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ url('admin/product/postCreateImage/'.$id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Image </label>
                                    <input type="file" id="image" name="image" accept="image/*"
                                           required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="txt-cover">Use as the Cover </label>
                                    <div class="form-control">
                                        Yes <input type="radio" id="txt-cover" name="cover" value="1" required>
                                        No <input type="radio" id="txt-cover" name="cover" value="0" required>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-danger" href="{{ url("admin/product/image/".$id) }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop
@section('footer')
    @include('admin.footer')
@stop
