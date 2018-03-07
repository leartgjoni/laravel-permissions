@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <a href="{{ route('welcome.admin') }}">Admin</a><br>
                        <a href="{{ route('welcome.client') }}">Client</a><br>
                        <a href="{{ route('welcome.user') }}">User</a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
