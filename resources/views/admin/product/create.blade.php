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
                            <h3 class="card-title">Create Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ url('product/postCreate') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input placeholder="Input name of the product" type="text" class="form-control"
                                           name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Categories</label>
                                    <select name="category" class="form-control">
                                        @foreach (App\Models\category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach (App\Models\brand::all() as $brand)
                                            <option name="brand" value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea placeholder="Input your product description here" rows="4"
                                              class="form-control" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="1">Available</option>
                                        <option value="2">Unavailable</option>
                                        <option value="3">Incoming</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input placeholder="$" type="text" min="1" class="form-control" name="price">
                                </div>
                                <div class="form-group">
                                    <label for="">Discount</label>
                                    <input placeholder="%" type="text" min="1" class="form-control" name="discount">
                                </div>
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="number" min="1" class="form-control" name="quantity">
                                </div>
                                <div class="form-group">
                                    <label for="">Tax</label>
                                    <input type="text" class="form-control" name="tax">
                                </div>
                                <div class="form-group">
                                    <label for="">Special Features</label>
                                    <textarea placeholder="Feature" rows="4" class="form-control"
                                              name="feature"></textarea>
                                </div>

                                <div>
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Suitability</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="txt-category">Tag</label>
                                                <select name="tag[]" id="" class="form-control" multiple="multiple">
                                                    @foreach (App\Models\tag::all() as $tag)
                                                        <option value="{{ $tag->id }}">{{ $tag->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <a href="{{ url('/product') }}" class="btn btn-danger">Cancel</a>
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
