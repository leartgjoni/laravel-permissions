@extends('layouts.main')

@section('title','User edit')

@section('content')
<div class="container class-container">
    <div class="jumbotron">
        <div class="row">
            <h2 class="edit-title">Edit user</h2>
            <hr class="hr-form">
            <br/>
            
            <div class="col-md-10">
                {{ Form::model($user,['route' =>['user.update',$user->id],'method'=>'PUT']) }}
                
                <div class="col-md-8 col-md-offset-3">
                {{ Form::label('name','Name*:')}}
                {{ Form::text('name',$user->name, ["class"=>'form-control'])}}<br/>
                
                {{ Form::label('email','Email*:')}}
                {{ Form::text('email',$user->email, ["class"=>'form-control'])}}<br/>
                
                {{ Form::label('password','Password*:')}}
                {{ Form::password('password',["class"=>'form-control'])}}<br/>
                
                {{ Form::label('role','Role*:')}}
                <select name="role_id" class="select form-control">
                @foreach($roles as $role)
                <option value="{{$role->id}}" {{($user->role_id == $role->id) ? 'selected' : ''}}>{{$role->name}}</option>
                @endforeach
                </select>
                
                <br/>
                
                <div class="col-md-5 col-md-offset-2">
                <a href="{{route('user.index')}}" class="btn btn-primary btn-sm">Return back</a>
                </div>
                
                <div class="col-md-4">
                {{ Form::submit('Save', ['class' => 'btn btn-success btn-sm']) }}
                </div>
                </div>
                {{Form::close()}}
                </div>
        </div>
    </div>
</div>
@endsection 