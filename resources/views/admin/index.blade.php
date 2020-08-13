@extends('layouts.master')

@section('content')
    @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12 mt-3">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif
    @if(Session::has('danger'))
        <div class="row">
            <div class="col-md-12 mt-3">
                <p class="alert alert-danger">{{ Session::get('danger') }}</p>
            </div>
        </div>
    @endif
    <div class="row">
        @if(Auth::user()->avatar)
            <!--<div class="col-7 offset-5 col-md-4 offset-md-0 mt-3">
                <h2>
                    <img src={{ Auth::user()->avatar }} class="img-fluid border border-info rounded w-25">
                </h2>
            </div>-->
        @endif
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center font-weight-light">
                Your Dashboard
                <hr>
            </h1>
        </div>
    </div>
    <div class="row slideBottom">
    @if(!count($posts))
        <div class="col-md-8 offset-md-2 mt-3">
            <div class="card bg-light mb-4">
                <div class="card-body">
                    <h2 class="card-title">Oops!</h2>
                    <hr class="bg-secondary">
                    <p>No articles yet.</p>
                </div>
            </div>
        </div>
    @else
        @foreach($posts as $post)
            <div class="col-md-6 mt-3">
                    <div class="card bg-light mb-4">
                        <div class="card-header">
                            <a href="{{ route('blog.post', ['id' => $post->id]) }}" class="lead text-dark">{{ $post->title }}</a>
                        </div>
                        <div class="card-body">
                            <h2 class="card-title">
                                <p class="lead">
                                        @foreach($post->tags as $tag)
                                        <a href="{{ route('blog.tag', ['name' => strtolower($tag->name)]) }}" class="text-dark">
                                            <span class="rounded p-1 m-1 {{ $tag->name }}">
                                                &bull; {{ $tag->name }} &bull;
                                            </span>
                                        </a>
                                        @endforeach
                                </p>
                            </h2>
                            <p class="card-text">
                                {!! \Illuminate\Support\Str::limit($post->content, 240) !!}
                            </p>
                            <a href="{{ route('blog.post', ['id' => $post->id]) }}" class="themeColor">Read more...</a>
                        </div>
                        <div class="card-footer text-muted">
                            <a href="{{ route('admin.edit', ['id' => $post->id]) }}" class="col-5 offset-1 btn btn-warning">Edit</a>
                            <a href="{{ route('admin.delete', ['id' => $post->id]) }}" class="col-5 btn btn-danger">Delete</a>
                        </div>
                    </div>
            </div>
        @endforeach
    @endif
    </div>
@endsection