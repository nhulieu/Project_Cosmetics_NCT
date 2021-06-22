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
                            <h3 class="card-title">View {{ $product->name }}</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input readonly value="{{ $product->name }}" type="text" id="name"
                                           class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <textarea readonly rows="2" id="category" class="form-control"
                                              name="category">{{ $product->getCategory() }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Brand</label>
                                    <textarea readonly rows="2" id="brand" class="form-control"
                                              name="brand">{{ $product->getBrand() }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea readonly rows="4" id="description" class="form-control"
                                              name="description">{{ $product->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Special Features</label>
                                    <textarea readonly rows="2" id="feature" class="form-control"
                                              name="feature">{{ $product->feature }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="txt-status">Status</label>
                                    <select readonly name="status" id="status" class="form-control">
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
                                    <input readonly value="{{ $product->price }}" placeholder="$" type="number" min="1"
                                           id="price" class="form-control" name="price">
                                </div>
                                <div class="form-group">
                                    <label for="txt-sale">Discount</label>
                                    <input readonly value="{{ $product->discount }}" placeholder="%" type="number"
                                           min="1" id="discount" class="form-control" name="discount">
                                </div>
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input readonly value="{{ $product->quantity }}" type="number" id="quantity"
                                           class="form-control" name="quantity">
                                </div>
                                <div class="form-group">
                                    <label for="">Tax</label>
                                    <input readonly value="{{ $product->tax }}" type="tel" id="tax" class="form-control"
                                           name="tax">
                                </div>
                                <div>
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Suitability</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="txt-os">Tag</label>
{{--                                                <select readonly name="tag" id="tag" class="form-control">--}}
{{--                                                    @foreach (App\Models\tag::all() as $tag)--}}
{{--                                                        <option @if ($product->OS == $tag->id) selected--}}
{{--                                                                @endif value="{{ $tag->id }}">{{ $tag->label }}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-danger btn-btn" onclick="history.back()">
                                    <font color="white"><i class="fas fa-arrow-left"></i> Back</font>
                                </a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
@stop
