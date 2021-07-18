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
                            <h3 class="card-title">
                                Order Detail
                                #{{ $item->first()->order_id." ".$item->first()->cart()->getNameOfUser()." ".$item->first()->cart()->order_date }}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <a class="btn btn-success btn-btn" onclick="history.back()">
                                <font color="white"><i class="fas fa-arrow-left"></i> Back</font>
                            </a>
                            <table id="product" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Quantity</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($item as $item)
                                    <tr>
                                        <td>{{ $item->products()->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#product').DataTable({
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
