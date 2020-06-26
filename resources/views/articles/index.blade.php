@extends('layout')

@section('content')
    <div id="page" class="container">
        <div id="content">
            @forelse($articles as $article)
                <div class="title">
                    {{--<h2><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h2>--}}
                    <h2><a href="{{ $article->path() }}">{{ $article->title }}</a></h2>
                    <p>{!! $article->excerpt !!}</p>
                </div>
            @empty
                <p>No relevant articles here.</p>
            @endforelse
        </div>
    </div>
@endsection
