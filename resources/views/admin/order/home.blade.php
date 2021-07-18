@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order List</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="order" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Order Date</th>
                                <th>Paid</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->getNameOfUser() }}</td>
                                    <td>{{ $order->getEmailOfUser() }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td class="text-left">
                                        <a class="btn btn-info btn-sm" href="{{ url('admin/cart/detail/'.$order->id) }}">
                                            <i class="fas fa-pencil-alt"></i> View Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#order').DataTable({
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
