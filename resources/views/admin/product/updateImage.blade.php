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
                            <h3 class="card-title">Update Image</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ url('product/postUpdateImage/' . $image->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Old Image </label>
                                    <input readonly type="text" value="{{ $image->ImageName() }}" class="form-control"
                                           id="txt-image" accept="image/*" required>
                                    <label>New Image </label>
                                    <input type="file" id="txt-image" name="image" accept="image/*">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="txt-cover">Use as the Cover </label>
                                    <div class="form-control">
                                        Yes <input type="radio" @if($image->cover == 1) checked @endif id="txt-cover"
                                                   name="cover" value="1" required>
                                        No <input type="radio" @if($image->cover == 0) checked @endif id="txt-cover"
                                                  name="cover" value="0" required>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-danger"
                                   href="{{ url("product/image/".$image->product_id) }}">Cancel</a>
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
