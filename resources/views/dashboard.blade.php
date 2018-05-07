@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <example-component></example-component>
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
                                </tr>
                                @foreach($posts as $post)
                                    <tr>
                                        <th><a href="/posts/{{$post->id}}">{{$post->title}}</a></th>
                                    <th>
                                        {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right ml-2'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete', ['class'=>'btn btn-danger btn-lg active float-right'])}}
                                        {!!Form::close()!!}
                                    <a class="btn btn-success btn-lg active float-right" href="/posts/{{$post->id}}/edit" role="button">Edit <span class="sr-only">(current)</span></a>
                                    </th>
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
