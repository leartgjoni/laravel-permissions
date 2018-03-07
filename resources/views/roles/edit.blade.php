@extends('layouts.main')

@section('title','Role edit')
    
@section('content')

<div class="container class-container">
    <div class="jumbotron edit-role">
        <div class="row">
            <h2 class="edit-title">Edit role</h2>
            <hr class="hr-form">
            <br/>
            
            <div class="col-md-12">
                {{ Form::model($role,['route' =>['role.update',$role->id],'method'=>'PUT']) }}
                <div class="col-md-2"></div>
                <div class="col-md-8">
                {{ Form::label('name','Name*:')}}
                
                {{ Form::text('name',$role->name, ["class"=>'form-control'])}}<br/>
                
                
                <div class="col-md-5 col-md-offset-2">
                <a href="{{route('role.index')}}" class="btn btn-primary btn-sm">Return back</a>
                </div>

                <div class="col-md-4">
                {{ Form::submit('Save', ['class' => 'btn btn-success btn-sm']) }}
                </div>
                
                </div>
                <div class="col-md-2"></div>
            </div>
                {{Form::close()}}
        </div>
    </div>
</div>
@endsection 

@section('additional_javascript')
<script>
$(document).ready(function() {
       
    flatpickr("#flatpickr",{
        enableTime: true,
        time_24hr: true
    });

    var d = $('#comments-list');
    d.scrollTop(d.prop("scrollHeight"));

    });
 
  

</script>
@endsection