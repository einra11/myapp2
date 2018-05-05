@extends('layouts.app')

            @section('content')
            <div class="container mt-5"></div>
            <a class="btn btn-primary btn-lg active float-right mb-3" href="/posts/create" role="button">Create Post <span class="sr-only">(current)</span></a>
                           <h1>Posts</h1>
                           <div class="card-rows m-3" style="height:600px;">
                                @if(count($posts)>0)
                                @foreach($posts as $post)
                                    {{-- 
                                            <div class="container">
                                                    <div class="column">
                                                    <img style="width:500px; height:400px;" class="card-img-top" src="/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">
                                                            <div class="card card-body bg-light">
                                                                <h2 class=""><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                                                                <p class="">{!!$post->body!!}</p>
                                                                <small class="p-4">Posted on:{{$post->created_at}} by {{$post->user->name}}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                
                                        <div class="card" style="width: 28rem;">
                                                <img class="img-thumbnail" src="/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">
                                                <div class="card-body">
                                                <h5 class="card-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h5>
                                                <p class="card-text">{{ Str::words($post->body, 20)}}</p>
                                                <small class="p-4">Posted on:{{$post->created_at}} by {{$post->user->name}}</small>
                                                </div>
                                            </div>
                                    @endforeach
                                    {{$posts->links()}}
                                @else
                                    <h3>No post found....</h3>
                                @endif
                        </div>    
            </div>
            @endsection


            