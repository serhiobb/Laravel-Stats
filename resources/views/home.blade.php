@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">

                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{ url('/page1') }}">Page 1</a>
                        <a href="{{ url('/page2') }}">Page 2</a>
                        <a href="{{ url('/page3') }}">Page 3</a>

                        @if (!Auth::check())
                            <a href="{{ url('/login') }}">Login</a>
                            <a href="{{ url('/register') }}">Register</a>
                        @endif
                    </div>
                @endif

                <div class="content">
                    <div class="title m-b-md">
                        Home
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection