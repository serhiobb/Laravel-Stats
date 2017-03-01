<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CRUD extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle($args)
    {
$index = '
    @extends(\'pragmarx/tracker::layout\')

    @section(\'page-contents\')
        {{ $sessionNewMessages = array_shift(Session::get(\'_flash\')[\'new\'])}}
        @foreach($sessionNewMessages as $message)
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismissr="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{ $message }}</strong>
            </div>
        @endforeach;
        <div class="row">
            <a class="btn btn-default" href="/admin/users/create">New</a>
        </div>
        <br><br>
        <table id="table_div" class="display table table-striped" cellspacing="0" width="100%">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created | Updated</th>
                <th>Is Admin</th>
                <th>Actions</th>
            </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}} | {{$user->updated_at}}</td>
                <td>{{ $user->is_admin ? \'yep\' : \'nope\' }}</td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-default" href="/admin/users/{{$user->id}}/edit">Edit</a>
                        <a class="btn btn-default" href="/admin/users/{{$user->id}}/delete">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@stop';

$create = '
    @extends(\'pragmarx/tracker::layout\')
    @section(\'page-contents\')
    {!! Form::model(new User(), [\'route\' => [\'user-admin.store\'], \'role\' => \'form\', \'class\' => \'container\']) !!}
            <legend class="row">Fill the fields</legend>
            <div class="row">
                <div class="form-group col-sm-2">
                    {!! Form::label(\'name\', \'Name\', [\'class\' => \' \']) !!}
                    {!! Form::text(\'name\', null, [\'class\' => \'form-control\']) !!}
                </div>
                <div class="form-group col-sm-2">
                    {!! Form::label(\'password\', \'Password\', [\'class\' => \'\']) !!}
                    {!! Form::password(\'password\', [\'class\' => \'form-control\']) !!}
                </div>
                <div class="form-group col-sm-2">
                    {!! Form::label(\'email\', \'Email\', [\'class\' => \'\']) !!}
                    {!! Form::email(\'email\', null, [\'class\' => \'form-control\']) !!}
                </div>
                <div class="form-group col-sm-2">
                    {!! Form::label(\'is_admin\', \'Is admin?\', [\'class\' => \'\']) !!}<br>
                    {!! Form::checkbox(\'is_admin\', 0, [\'class\' => \'form-control\']) !!}
                </div>
            </div>
                {!! Form::submit(\'Save\', [\'class\' => \'btn btn-default\']) !!}
        {!! Form::close() !!}
    @stop';

$update = '
@extends(\'pragmarx/tracker::layout\')

@section(\'page-contents\')
    {!! Form::model(
        $user, [\'route\' => [\'user-admin.update\', \'user\' => $user],
        \'method\' => \'patch\', \'role\' => \'form\', \'class\' => \'container\']
    ) !!}
    <legend class="row">Fill the fields</legend>
    {{ Form::hidden(\'id\', $user->id) }}
    <div class="row">
        <div class="form-group col-sm-2">
            {!! Form::label(\'name\', \'Name\', [\'class\' => \' \']) !!}
            {!! Form::text(\'name\', $user->name, [\'class\' => \'form-control\']) !!}
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label(\'password\', \'Password\', [\'class\' => \'\']) !!}
            {!! Form::password(\'password\', [\'class\' => \'form-control\', \'placeholder\' => \'setup new password\']) !!}
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label(\'email\', \'Email\', [\'class\' => \'\']) !!}
            {!! Form::email(\'email\', $user->email, [\'class\' => \'form-control\']) !!}
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label(\'is_admin\', \'Is admin?\', [\'class\' => \'\']) !!}<br>
            {!! Form::checkbox(\'is_admin\', $user->is_admin, [\'class\' => \'form-control\']) !!}
        </div>
    </div>
    {!! Form::submit(\'Save\', [\'class\' => \'btn btn-default\']) !!}
    {!! Form::close() !!}
@stop';



        printf($index, );
        printf($create, );
        printf($update, );

        $tmpl = $this->getTemplateDraft();
        $tmpls = $this->createTemplates($tmpl);
        $this->saveTemplates($tmpls);
    }
}
