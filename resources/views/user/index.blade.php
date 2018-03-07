@extends('layouts.main')

@section('title','All users')

@section('content')
<div class="container class-container">
    <div class="row">
        <div class="col-md-12">
          
        <a href="{{route('user.create')}}" class="btn btn-sm btn-new-user">Create new user</a>
        <br/><br/><br/>
        <div>
            <table class="table" id="table_id">
            
            <thead>
                <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                @if($user->id != 1)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>
                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-default btn-sm edit-btn">Edit</a>
                        <a href="{{route('user.getPermissions',$user->id)}}" class="btn btn-success btn-sm permissions-btn">Permissions</a>
                        {{ Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('user.destroy', $user->id),
                                        'style' => 'display:inline']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger delete-confirm', 'onclick' => "return confirm('Are you sure you want to permanently delete this user?');"]) }}
                        {{Form::close()}}
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div> 
</div>
@endsection

@section('additional_javascript')
    <script>
        $(document).ready(function() {
            var table = $('#table_id').DataTable();
        });
    </script>
@endsection