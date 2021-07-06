@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brand</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Brand</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-success btn-btn" href="{{ url('/brand/create') }}">
                                <i class="fas fa-plus"></i> Add
                            </a>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="brands" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slogan</th>
                                <th>Logo</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brand as $b)
                                <tr>
                                    <th scope="row">{{ $b->id }}</th>
                                    <td>{{ $b->name }}</td>
                                    <td>{{ $b->slogan }}</td>
                                    <td><img src="{{ asset($b->logo) }}" alt="{{ $b->name }}" style="width: 50px; height: 50px"></td>
                                    <td class="text-left">
                                        <a class="btn btn-info btn-sm"
                                           href="{{ url('/brand/update/'.$b->id) }}">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>

                                        <a class="btn btn-danger btn-sm"
                                           href="{{ url('/brand/delete/' . $b->id) }}">
                                            <i class="fas fa-trash"></i> Delete
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
            $('#brands').DataTable({
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
