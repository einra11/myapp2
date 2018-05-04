@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="panel-body">
<a class="btn btn-primary btn-lg active float-right mb-3" href="/posts/create" role="button">Create Post <span class="sr-only">(current)</span></a>
                            <h3>Repositories</h3>
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($posts as $post)
                                    <tr>
                                        <th>{{$post->title}}</th>
                                    <th><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></th>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
