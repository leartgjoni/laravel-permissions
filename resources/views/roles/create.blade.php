@extends('layouts.main')

@section('title','Create role')

@section('content')

<div class="container class-container">
     <div class="jumbotron create-role">
        <div class="row">
            
            <h2 class="create-title"> Create new role</h2>
            <hr class="hr-form">
            <br/>
    
            <div class="col-md-10">
                <div class="col-md-8 col-md-offset-3">   
                    
                    
                        {!! Form::open(['route' => 'role.store']) !!}

                        {{ Form::label('name','Name*:')}}
                        {{ Form::text('name',null, ["class"=>'form-control'])}}<br/><br/>


                        <div class="col-md-5 col-md-offset-2">
                        <a href="{{route('role.index')}}" class="btn btn-sm btn-primary">Return back</a>
                        </div>

                        <div class="col-md-4">
                            {!! Form::submit('Save', ['class' => 'btn btn-success btn-sm btn-xs']) !!}
                        </div>
                            {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection