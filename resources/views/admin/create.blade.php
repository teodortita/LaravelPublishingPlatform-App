@extends('layouts.master')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center font-weight-light">
                Creare Articol Nou
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-3">
            <div class="card rounded bg-light border-dark mb-4">
                <div class="card-body">
                    <form action="{{ route('admin.create') }}" method="post">
                        <div class="form-group">
                            <label for="title">Titlu</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ? old('title') : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="content">Continut</label>
                            <input type="text" class="form-control" id="content" name="content" value="{{ old('content') ? old('content') : '' }}">
                        </div>
                        @foreach($tags as $tag)
                            <div class="checkbox form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="tags[]" value="{{ $tag->id }}">
                                        {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-block btn-lg btn-primary mt-4">Trimite</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection