@extends('pragmarx/tracker::layout')

@section('page-contents')
    <table id="table_div" class="display" cellspacing="0" width="100%">
        @foreach($users as $user)

        @endforeach;
    </table>
@stop
