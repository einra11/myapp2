@extends('layouts.app')

@section('content')
       @guest 
        <div class="jumbotron text-center">
                <h1>{{$title}}</h1>
                <p>You may save your projects here!</p>
                <p class="form-signin">
                                <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">{{ __('Login') }}</a>
                                <a class="btn btn-success btn-primary btn-lg" href="{{ route('register') }}" role="button">{{ __('Sign up') }}</a>
                </p>
        </div>
        @else
        <div class="jumbotron text-center">
                <h1>{{$title}}</h1>
                <p>You may save your projects here!</p>
        </p>
        @endguest
@endsection

