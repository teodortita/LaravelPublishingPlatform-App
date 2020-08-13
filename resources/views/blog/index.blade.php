@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
        @if (\Request::is('user/*'))
            <h1 class="text-center font-weight-light">
                Articles by {{ $user->name }}
                <hr>
            </h1>
        @elseif (\Request::is('tag/*'))
            <h1 class="text-center font-weight-light">
                Section '{{ $tag_name }}'
                <hr>
            </h1>
        @else
            <h1 class="text-center font-weight-light">
                General Overview
                <hr>
            </h1>
        @endif
        </div>
    </div>
    <div class="row slideBottom">
        @if (count($posts))
            @foreach($posts as $post)  
                <div class="col-md-6 mt-3">
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
                                        <br><br>
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
                            Published {{ now()->diffInDays($post->created_at) ? now()->diffInDays($post->created_at).' days ago' : 'Today' }}
                            <br>
                            {{ count($post->likes) ? count($post->likes) : '0' }} Claps
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-8 offset-md-2 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        @else
            <div class="col-md-8 offset-md-2 mt-3">
                <div class="card rounded bg-light border-dark mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Oops!</h2>
                        <hr class="bg-secondary">
                        <p>No articles yet.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection