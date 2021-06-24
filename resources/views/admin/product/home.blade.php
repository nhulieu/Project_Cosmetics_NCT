@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="card-body">
        <a class="btn btn-success btn-btn" href="{{ url('/product/create') }}">
            <i class="fas fa-plus"></i> Add
        </a>
        <table id="products" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Actions</th>
                <th class="text-center">Name</th>
                <th class="text-center">Category</th>
                <th class="text-center">Brand</th>
                <th class="text-center">Tag</th>
                <th class="text-center">Description</th>
                <th class="text-center">Status</th>
                <th class="text-center">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        <div class="row">
                            <a class="btn btn-warning btn-sm" title="Detail"
                               href="{{ url('/product/view/'. $product->id) }}">
                                <font style="color: white"><i class="fas fa-eye"></i></font>
                            </a>
                            <a class="btn btn-info btn-sm" title="Edit"
                               href="{{ url('/product/update/' .$product->id) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" title="Delete" onclick="removeNotify()" href="">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                        <div class="row">
                            <a class="btn btn-primary btn-sm" title="Image" onclick=""
                               href="{{ url('/product/image/' . $product->id) }}">
                                <i class="fa fa-image" aria-hidden="true"></i>
                            </a>
                            <a class="btn btn-dark btn-sm" title="Review" onclick=""
                               href="{{ url('product/review/' . $product->id) }}">
                                <i class="fas fa-comments" aria-hidden="true"></i>
                            </a>
                        </div>
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->getCategory() }}</td>
                    <td>{{ $product->getBrand() }}</td>
                    <td>{{ $product->getTag() }}</td>
                    <td title="{{ $product->description }}">{{ $product->description }}</td>
                    <td>{{ $product->getStatus() }}</td>
                    <td>{{ $product->price." $"}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop


@section('js')
    <script>
        function removeNotify() {
            alertify.success('Success Remove');
        }

        $(document).ready(function () {
            $('#products').DataTable({
                pageLength: 5,
                paging: true,
                lengthChange: false,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: true,
                // sScrollX: "300%",
                bScrollCollapse: true,
            });
        });
    </script>
@stop

@section('footer')
    @include('admin.footer')
@stop
