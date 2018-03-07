@extends('layouts.main')

@section('title','Create user')
 

@section('content')

<div class="container class-container">


    <div class="jumbotron edit-user">
        <div class="row">
            <h2 class="edit-title"> Create new user</h2>
            <hr class="hr-form">
            <br/>
    
    <div class="col-md-10">
        
        <div class="col-md-8 col-md-offset-3">           
        
        {!! Form::open(['route' => 'user.store']) !!}
	
	{{ Form::label('name','Name*:')}}
	{{ Form::text('name',null, ["class"=>'form-control'])}}<br/><br/>
        
            
	{{ Form::label('email','Email*:')}}
	{{ Form::text('email',null, ["class"=>'form-control'])}}<br/><br/>
        
        
	{{ Form::label('password','Password*:')}}
	{{ Form::password('password',["class"=>'form-control'])}}<br/><br/>
        
        
        {{ Form::label('role','Role*:')}}
        <select name="role_id" class="form-control">
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
        
        <br/>
        
        <div class="col-md-5 col-md-offset-2">
        <a href="{{route('user.index')}}" class="btn btn-primary btn-sm">Return back</a>
        </div>

        <div class="col-md-4">
        {{ Form::submit('Save', ['class' => 'btn btn-success btn-sm']) }}
        </div>
        {!! Form::close() !!}
       </div>
        
             
            </div>
        </div>
    </div> 
</div>
@endsection