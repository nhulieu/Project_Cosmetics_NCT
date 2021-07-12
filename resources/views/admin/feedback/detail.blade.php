@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detail feedback of <a href="">{{ $contents->email }}</a></h1>
@stop

@section('content')
    <div style="margin-left: 50px;">
        <h2 style="text-transform: uppercase;">{{ $contents->subject }}</h2>
        <p><strong>{{ $contents->name }}</strong> {{'<'.$contents->email.'>'}}</p>
        <p>{{ $contents->message }}</p>
        <hr>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Reply
        </button>
        <input type="text" id="success" value="{{ (Session::has('success'))?(Session::get('success')):'false'}}" hidden>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{ url('admin/feedback/reply') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="text" name="email" value="{{ $contents->email }}" class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="">Subject:</label>
                                <input type="text" value="Mail form NCT cosmetic" name="subject" class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Message:</label>
                                <textarea name="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    @include('admin.footer')
@stop
