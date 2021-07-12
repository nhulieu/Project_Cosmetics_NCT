@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tag</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Tag</li>
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
                            <a class="btn btn-success btn-btn" href="{{ url('admin/tag/create') }}">
                                <i class="fas fa-plus"></i> Add
                            </a>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tag" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Label</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <th scope="row">{{ $tag->id }}</th>
                                    <td>{{ $tag->label }}</td>
                                    <td>{{ $tag->description }}</td>
                                    <td class="text-left">
                                        <a class="btn btn-info btn-sm"
                                           href="{{ url('admin/tag/update/'.$tag->id) }}">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>

                                        <a class="btn btn-danger btn-sm"
                                           href="">
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
            $('#tag').DataTable({
                pageLength: 10,
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
