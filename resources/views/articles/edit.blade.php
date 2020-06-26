@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
@endsection

@section('content')

    <div id="page" class="container">
        <h1>Update Article {{ $article->title }}</h1>
        <form method="POST" action="/articles/{{ $article->id }}">
            @csrf
            @method('PUT')
            <div class="field">
                <label class="label" for="title">Title</label>
                <div class="control">
                    <input class="input" type="text" name="title" id="title" value="{{ $article->title }}" required>
                </div>
            </div>
            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>
                <div class="control">
                    <textarea class="textarea" name="excerpt" id="excerpt" required>{{ $article->excerpt }}</textarea>
                </div>
            </div>
            <div class="field">
                <label class="label" for="body">Body</label>
                <div class="control">
                    <textarea class="textarea" name="body" id="body" required>{{ $article->body }}</textarea>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="button" type="submit">
                </div>
            </div>
        </form>
    </div>



@endsection
