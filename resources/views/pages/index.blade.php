@extends('layouts.app')

@section('content')
        <div class="jumbotron text-center">
                <h1>{{$title}}</h1>
                <p>You may save your projects here!</p>
                <p class="form-signin">
                                
                                <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
                                <a class="btn btn-success btn-primary btn-lg" href="/register" role="button">Sign up</a>
                </p>
        </div>
@endsection

