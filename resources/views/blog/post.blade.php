@extends('layouts.master')

@section('content')
    <div class="row slideBottom">
        <div class="col-md-12 mt-3">
            <div class="card bg-light mb-4">
                        <div class="card-header">
                            <a href="{{ route('blog.post', ['id' => $post->id]) }}" class="lead text-dark">{{ $post->title }}</a>
                        </div>
                        <div class="card-body">
                            <h2 class="card-title">
                                <p class="lead">by 
                            <a href="{{ route('blog.userPosts', ['id' => $post->user->id]) }}" class="themeColor">
                                {{ $post->user->name }}
                            </a>
                        </p>
                        <hr>
                        <p class="lead mt-4">
                            @foreach($post->tags as $tag)
                            <a href="{{ route('blog.tag', ['name' => strtolower($tag->name)]) }}" class="text-dark">
                                <span class="rounded p-1 m-1 {{ $tag->name }}">
                                    &bull; {{ $tag->name }} &bull;
                                </span>
                            </a>
                            @endforeach
                            <br><br>
                            Published {{ now()->diffInDays($post->created_at) ? now()->diffInDays($post->created_at).' days ago' : 'Today' }}
                        </p>
                        <hr>
                    </h2>
                    <p class="card-text">
                        {!! html_entity_decode($post->content) !!}
                    </p>
                </div>
                <div class="card-footer text-muted">
                    {{ count($post->likes) ? count($post->likes) : 'No' }} Claps | 
                    <a href="{{ route('blog.post.like', ['id' => $post->id])}}" class="themeColor">
                        <i class="fas fa-sign-language"></i> Clap
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection