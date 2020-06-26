<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->paginate(10);
        }

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
//        $article->title = request('title');
//        $article->excerpt = request('excerpt');
//        $article->body = request('body');
//        $article->save();

        Article::update($this->validateArticle());

        return redirect($article->path());
    }

    public function store()
    {
        $this->validateArticle();

        $article = new Article(request(['title', 'excerpt', 'body']));

        $article->user_id = 1; //todo auth()->id()
        $article->save();

        if (request()->has('tags')) { // not necessary
            $article->tags()->attach(request('tags')); // if tags == null then nothing will be attached.
        }

//        Article::create($this->validateArticle());

        return redirect(route('articles.index'));
    }

    public function delete()
    {

    }

    public function validateArticle()
    {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id',
        ]);
    }
}
