@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card rounded bg-light border-dark mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}
                        <p class="lead">de 
                            <a href="{{ route('blog.userPosts', ['id' => $post->user->id]) }}">
                                {{ $post->user->name }}
                            </a>
                        </p>
                        <hr>
                        <p class="lead">
                            @foreach($post->tags as $tag)
                            <a href="{{ route('blog.tag', ['name' => strtolower($tag->name)]) }}" class="text-dark">
                                <span class="rounded p-1 m-1 {{ $tag->name }}">
                                    &bull; {{ $tag->name }} &bull;
                                </span>
                            </a>
                            @endforeach
                            <br><br>
                            Publicat {{ now()->diffInDays($post->created_at) ? 'acum '.now()->diffInDays($post->created_at).' zile' : 'Azi' }}
                        </p>
                        <hr>
                    </h2>
                    <p class="card-text">
                        {{ $post->content }}
                    </p>
                </div>
                <div class="card-footer text-muted">
                    {{ count($post->likes) ? count($post->likes) : '0' }} Aplauze | 
                    <a href="{{ route('blog.post.like', ['id' => $post->id])}}">
                        <i class="fas fa-sign-language"></i> Aplauda
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection