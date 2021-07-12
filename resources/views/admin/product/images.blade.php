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
                            <h3 class="card-title">Images</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <a class="btn btn-danger btn-btn" href="{{ url('/admin/product/') }}">
                                <font color="white"><i class="fas fa-arrow-left"></i> Back</font>
                            </a>
                            <br><br>
                            <a class="btn btn-success btn-btn" href="{{ url('/admin/product/createImage/'.$id)}}">
                                <i class="fas fa-plus"></i> Add
                            </a>
                            <table id="games" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">IMAGE</th>
                                    <th class="text-center">USE AS COVER</th>
                                    <th class="text-center">ACTIONS</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($images as $img)
                                    <tr>
                                        <td class="text-center">{{ $img->id }}</td>
                                        <td class="text-center">
                                            <img height="130px" width="100px" src="{{ asset($img->path) }}" alt="">
                                        </td>
                                        <td class="text-center">{{ $img->cover==1 ? 'Yes' : 'No' }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-sm" title="Edit"
                                               href="{{ url('admin/product/updateImage/'.$img->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" title="Delete" onclick="removeNotify()"
                                               href="{{ url("admin/product/deleteImage/".$img->id) }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
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

@section('footer')
    @include('admin.footer')
@stop

