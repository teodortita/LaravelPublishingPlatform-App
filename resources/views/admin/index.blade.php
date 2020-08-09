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
            <div class="col-7 offset-5 col-md-4 offset-md-0 mt-3">
                <h2>
                    <img src={{ Auth::user()->avatar }} class="img-fluid border border-info rounded" style="width: 25%">
                </h2>
            </div>
        @endif
        <div class="col-8 offset-2 col-md-4 offset-md-0 mt-3 align-self-center">
            <a href="{{ route('admin.create') }}" class="btn btn-block btn-lg btn-success">
                <i class="fas fa-plus-circle"></i> Publicatie Noua
            </a>
        </div>
    </div>
    <hr class="bg-info">
    <div class="row">
    @if(!count($posts))
        <div class="col-md-8 offset-md-2 mt-3">
            <div class="card rounded bg-light border-dark mb-4">
                <div class="card-body">
                    <h2 class="card-title">Ne scuzati!</h2>
                    <hr class="bg-secondary">
                    <p>Nu exista continut.</p>
                </div>
            </div>
        </div>
    @else
        @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card rounded bg-light border-dark mb-4">
                    <div class="card-body">
                        <h2 class="card-title">
                            <a href="{{ route('blog.post', ['id' => $post->id]) }}" class="text-dark">
                                {{ $post->title }}
                            </a>
                        </h2> 
                        <p>De 
                            <a href="{{ route('blog.userPosts', ['id' => $post->user->id]) }}">
                                {{ $post->user->name }}
                            </a>
                        </p>
                        <div class="card-footer text-muted">
                            <a href="{{ route('admin.edit', ['id' => $post->id]) }}" class="col-5 offset-1 btn btn-warning">Modifica</a>
                            <a href="{{ route('admin.delete', ['id' => $post->id]) }}" class="col-5 btn btn-danger">Sterge</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    </div>
@endsection