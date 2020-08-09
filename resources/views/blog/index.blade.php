@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
            @if (\Request::is('user/*'))
                <h1 class="text-center font-weight-light">
                    Articole de {{ $user->name }}
                    <hr>
                </h1>
            @elseif (\Request::is('tag/*'))
                <h1 class="text-center font-weight-light">
                    Sectiunea '{{ $tag_name }}'
                    <hr>
                </h1>
            @else
                <h1 class="text-center font-weight-light">
                    Prezentare Generala
                    <hr>
                </h1>
            @endif
            </div>
        </div>
        <div class="row">
            @if (count($posts))
                @foreach($posts as $post)  
                    <div class="col-md-8 offset-md-2 mt-3">
                        <div class="card rounded bg-light border-dark mb-4">
                            <div class="card-body">
                                <h2 class="card-title">
                                    <a href="{{ route('blog.post', ['id' => $post->id]) }}" class="blackTitle">{{ $post->title }}</a>
                                    <p class="lead">de 
                                            <a href="{{ route('blog.userPosts', ['id' => $post->user->id]) }}">
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
                                <a href="{{ route('blog.post', ['id' => $post->id]) }}">Citeste mai mult...</a>
                            </div>
                            <div class="card-footer text-muted">
                                {{ count($post->likes) ? count($post->likes) : '0' }} Aplauze
                                <br>
                                Publicat {{ now()->diffInDays($post->created_at) ? 'acum '.now()->diffInDays($post->created_at).' zile' : 'Azi' }}
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
                            <h2 class="card-title">Ne scuzati!</h2>
                            <hr class="bg-secondary">
                            <p>Nu exista continut.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection