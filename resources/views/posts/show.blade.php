@extends('layouts.app')

            @section('content')
                    <a href="/posts" class="btn btn btn-light">Go Back</a>
                    <h1>{{$post->title}}</h1>
                    <img class="figure-img img-fluid rounded" src="/storage/cover_images/{{$post->cover_image}}" width="100%" alt="Card image cap">
                    <hr>     
                    <div>
                        {!!$post->body!!}
                    </div>
                    <hr>
                    <small class="badge badge-pill badge-primary">Written on: {{$post->created_at}}</small>
               @if(!Auth::guest())     
                    @if(Auth::user()->id==$post->user_id)
                        <a class="btn btn-success btn-lg active float-right ml-2" href="/posts/{{$post->id}}/edit" role="button">Edit <span class="sr-only">(current)</span></a>
                        {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete', ['class'=>'btn btn-danger btn-lg active float-right'])}}
                        {!!Form::close()!!}
                     @endif   
                @endif
            @endsection


            