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
<a class="btn btn-primary btn-lg active float-right" href="/posts/create" role="button">Create Post <span class="sr-only">(current)</span></a>
                            <h3>Repositories</h3>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
