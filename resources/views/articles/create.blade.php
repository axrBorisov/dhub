@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
@endsection

@section('content')

    <div id="page" class="container">
        <form method="POST" action="/articles">
            @csrf
            <div class="field">
                <label class="label" for="title">Title</label>
                <div class="control">
                    {{--<input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title" id="title">--}}
                    <input class="input @error('title') is-danger @enderror" type="text" name="title" id="title"
                           value="{{ old('title') }}">

                    {{--@if($errors->has('title'))--}}
                    @error('title')
                    <p class="help is-danger">{{ $errors->first('title') }}</p>
                    {{--@endif--}}
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>
                <div class="control">
                    <textarea class="textarea" name="excerpt" id="excerpt" required></textarea>
                </div>
            </div>
            <div class="field">
                <label class="label" for="body">Body</label>
                <div class="control">
                    <textarea class="textarea" name="body" id="body" required></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label" for="body">Tag</label>
                <div class="select is-multiple control">
                    <select name="tags[]" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @error('tags')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
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
