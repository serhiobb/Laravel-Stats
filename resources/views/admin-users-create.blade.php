@extends('pragmarx/tracker::layout')

@section('page-contents')
    
    {!! Form::model(new User(), ['route' => ['user-admin.store'], 'role' => 'form', 'class' => 'container']) !!}
    	<legend class="row">Fill the fields</legend>
    	<div class="row">
            <div class="form-group col-sm-2">
                {!! Form::label('name', 'Name', ['class' => ' ']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm-2"> 
                {!! Form::label('password', 'Password', ['class' => '']) !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm-2">
                {!! Form::label('email', 'Email', ['class' => '']) !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm-2">
                {!! Form::label('is_admin', 'Is admin?', ['class' => '']) !!}<br>
                {!! Form::checkbox('is_admin', 0, ['class' => 'form-control']) !!}
            </div>
        </div>
            {!! Form::submit('Save', ['class' => 'btn btn-default']) !!}
    {!! Form::close() !!}
@stop;