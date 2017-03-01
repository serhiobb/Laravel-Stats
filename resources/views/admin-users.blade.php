@extends('pragmarx/tracker::layout')

@section('page-contents')
    {{--{{  $unreadMessages = [] }}--}}
    {{--{{  $unreadMessages = array_shift(Session::get('_flash')['new']) }}--}}
    {{--@foreach( $unreadMessages as $message)--}}
        {{--<div class="alert alert-success alert-dismissible" role="alert">--}}
            {{--<button type="button" class="close" data-dismissr="alert">--}}
                {{--<span aria-hidden="true">&times;</span>--}}
                {{--<span class="sr-only">Close</span>--}}
            {{--</button>--}}
            {{--<strong>{{ $message }}</strong>--}}
        {{--</div>--}}
    {{--@endforeach;--}}
    <a class="btn btn-default" href="/admin/users/create">New</a>
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
                <td>{{ $user->is_admin ? 'yep' : 'nope' }}</td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-default" href="/admin/users/{{$user->id}}/edit">Edit</a>
                        <a class="btn btn-default" href="/admin/users/{{$user->id}}/delete">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@stop