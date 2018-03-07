@extends('layouts.main')

@section('title','All roles')

@section('content')


<div class="container class-container">
    <div class="row">
        <div class="col-md-12">
          
        <a href="{{route('role.create')}}" class="btn btn-sm btn-new-user">Create new role</a>
        <br/><br/><br/>
        <div>
            <table class="table table-striped" id="table_id">
            
            <thead>
                <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                @if($role->id != 1)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>
                    <a href="{{route('role.edit',$role->id)}}" class="btn btn-default btn-sm edit-btn">Edit</a>
                    <a href="{{route('role.getPermissions',$role->id)}}" class="btn btn-success btn-sm permissions-btn">Permissions</a>
                    {{ Form::open([
                                    'method'=>'DELETE',
                                    'url' => route('role.destroy', $role->id),
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