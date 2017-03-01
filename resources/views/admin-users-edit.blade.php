@extends('pragmarx/tracker::layout')

@section('page-contents')
    {!! Form::model(
        $user, ['route' => ['user-admin.update', 'user' => $user],
        'method' => 'patch', 'role' => 'form', 'class' => 'container']
    ) !!}
    <legend class="row">Fill the fields</legend>
    {{ Form::hidden('id', $user->id) }}
    <div class="row">
        <div class="form-group col-sm-2">
            {!! Form::label('name', 'Name', ['class' => ' ']) !!}
            {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('password', 'Password', ['class' => '']) !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'setup new password']) !!}
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('email', 'Email', ['class' => '']) !!}
            {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('is_admin', 'Is admin?', ['class' => '']) !!}<br>
            {!! Form::checkbox('is_admin', $user->is_admin, ['class' => 'form-control']) !!}
        </div>
    </div>
    {!! Form::submit('Save', ['class' => 'btn btn-default']) !!}
    {!! Form::close() !!}
@stop;