@extends('layouts.app')

            @section('content')
            <div class="container"></div>
                           <h1>Posts</h1>
                                @if(count($posts)>0)
                                    @foreach($posts as $post)
                                            {{-- <div class="card-group mt-4">
                                            <h2 class=""><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                                                    <p class="">{{$post->body}}</p>
                                                    <small class="p-4">Posted on:{{$post->created_at}}</small>
                                            </div> --}}
                                            <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-5 my-5">
                                                            <div class="card card-body bg-light">
                                                            <h2 class=""><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                                                            <p class="">{{$post->body}}</p>
                                                            <small class="p-4">Posted on:{{$post->created_at}}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    @endforeach
                                    {{$posts->links()}}
                                @else
                                    <h3>No post found....</h3>
                                @endif
            </div>
            @endsection


            