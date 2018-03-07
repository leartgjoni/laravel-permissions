@extends('layouts.main')
@section('title', 'Role permissions')

@section('additional_css')
<link href="{{url('css/sumoselect.min.css')}}" rel="stylesheet" />
<style>
    .SumoSelect .select-all{
        height: 35px;
    }
</style>
@endsection

@section('content')

<div class="container class-container">
    <div class="row">
            <h2 class="permissions-title">Give permissions to roles</h2>
            <hr class="hr-form">
            <br/>
        {{Form::open(['url'=>route('role.update', $role->id), 'method'=>'PATCH'])}}
        <div class="col-md-12">
            @foreach($actions as $action => $subactions)
                <div class="col-md-4">
                    <mark class="permission-mark">{{$action}}  </mark>
                <select name="permissions[]" class="select" multiple="multiple">
                    @foreach($subactions as $subaction)
                        <option value="{{$action.'.'.$subaction}}" {{($role->hasAccess($action.'.'.$subaction)) ? 'selected' : ''}}>
                            <br/>{{trans('permissions.'.$action.'_'.$subaction)}}<br/>
                        </option>
                    @endforeach
                </select>
                </div>
            @endforeach
        </div>
        <div class="col-md-12 text-center"><br/>
            {{ Form::submit('Submit', ['class' => 'btn btn-sm btn-success']) }}
        </div>
        {{Form::close()}}
    </div>
</div>
@endsection


@section('additional_javascript')

<script src="{{url('js/jquery.sumoselect.min.js')}}"></script>
<script type="text/javascript">
    $('.select').SumoSelect({ selectAll: true, placeholder: 'Nothing selected' });
</script>

@endsection