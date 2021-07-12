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
                            <h3 class="card-title">Update {{ $product->name }}</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form role="form" action="{{ url('admin/product/postUpdate/' .$product->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="txt-name">Name</label>
                                    <input value="{{ $product->name }}" placeholder="Input name of the product"
                                           type="text"
                                           id="name" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="category" class="form-control">
                                        @foreach (App\Models\category::all() as $category)
                                            <option @if ($product->category_id == $category->id) selected
                                                    @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach (App\Models\brand::all() as $brand)
                                            <option @if ($product->brand_id == $brand->id) selected
                                                    @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea placeholder="Input your description here" rows="4" id=""
                                              class="form-control"
                                              name="description">{{ $product->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option @if ($product->status == "1") selected @endif value="1">Available
                                        </option>
                                        <option @if ($product->status == "2") selected @endif value="2">Unavailable
                                        </option>
                                        <option @if ($product->status == "3") selected @endif value="3">Incoming
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input value="{{ $product->price }}" placeholder="$" type="text" min="1" id=""
                                           class="form-control" name="price">
                                </div>
                                <div class="form-group">
                                    <label for="">Discount</label>
                                    <input value="{{ $product->discount }}" placeholder="%" type="text" min="1"
                                           id="" class="form-control" name="discount">
                                </div>
                                <div class="form-group">
                                    <label for="">Tax</label>
                                    <input value="{{ $product->tax }}" placeholder="%" type="text" min="1"
                                           id="" class="form-control" name="tax">
                                </div>
                                <div class="form-group">
                                    <label for="">Special Features</label>
                                    <textarea placeholder="feature" rows="4"
                                              class="form-control" name="feature">{{ $product->feature }}</textarea>
                                </div>
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h3 class="card-title">Suitability</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="txt-category">Tag</label>
                                            <select name="tag[]" class="form-control" multiple="multiple">
                                                @foreach (App\Models\tag::all() as $tag)
                                                    <option
                                                        @if ($product->getTagId()->contains($tag->id))
                                                        selected
                                                        @endif
                                                        value="{{ $tag->id }}">{{ $tag->label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url('admin/product/') }}" class="btn btn-danger">Cancel</a>
                                </div>
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
