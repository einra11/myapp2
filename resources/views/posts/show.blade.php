@extends('layouts.app')

            @section('content')
                    <a href="/posts" class="btn btn btn-light">Go Back</a>
                    <h1>{{$post->title}}</h1>     
                    <div>
                        {!!$post->body!!}
                    </div>
                    <hr>
                    <small>Written on: {{$post->created_at}}</small> 
                <a class="btn btn-success btn-lg active float-right" href="/posts/{{$post->id}}/edit" role="button">Edit <span class="sr-only">(current)</span></a>

                {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete', ['class'=>'btn btn-danger btn-lg active float-right'])}}
                {!!Form::close()!!}
            @endsection


            