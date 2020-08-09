@extends('layouts.master')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center font-weight-light">
                Modificare Articol
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-3">
            <div class="card rounded bg-light border-dark mb-4">
                <div class="card-body">
                    <form action="{{ route('admin.update') }}" method="post">
                        <div class="form-group">
                            <label for="title">Titlu</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="title" 
                                name="title" 
                                value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="content">Continut</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="content" 
                                name="content" 
                                value="{{ $post->content }}">
                        </div>
                        @foreach($tags as $tag)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                        {{ $post->tags->contains($tag->id) ? 'checked' : ''}}>
                                        {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $postId }}">
                        <button type="submit" class="btn btn-block btn-lg btn-primary mt-4">Trimite</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection