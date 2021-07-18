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
                            <h3 class="card-title">Review</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <a class="btn btn-danger btn-btn" onclick="history.back()">
                                <font color="white"><i class="fas fa-arrow-left"></i> Back</font>
                            </a>
                            <br><br>
                            <table id="games" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">User</th>
                                    <th class="text-center">Content</th>
                                    <th class="text-center">RATING</th>
                                    <th class="text-center">ACTIONS</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>{{ $review->id }}</td>
                                        <td>{{ $review->UserName() }}</td>
                                        <td>{{ $review->content }}</td>
                                        <td>{{ $review->mark }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-danger btn-sm" title="Delete" onclick="removeNotify()"
                                               href="{{ url("product/deleteComment/".$review->id) }}">
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

@section('js')

@stop

@section('footer')
    @include('admin.footer')
@stop
