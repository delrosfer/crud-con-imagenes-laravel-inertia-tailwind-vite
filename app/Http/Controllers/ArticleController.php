<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use Inertia\Inertia;

class ArticleController extends Controller
{
    public $image = null;

    public function index()
    {
        return Inertia::render('Articles/Index', [
            'articles' => Article::all()->map(function ($article) {
                return [
                    'id' => $article->id,
                    'name' => $article->name,
                    'description' => $article->description,
                    'price' => $article->price,
                    'quantity' => $article->quantity,
                    'image' => asset('storage/' . $article->image)
                ];
            })
        ]);
    }

    public function create()
    {
        return Inertia::render('Articles/Create');
    }

    public function store()
    {
        //if(!empty($this->image)){
        //    $image = Request::file('image')->store('public', 'articles');
        //}else{
        //    $image = null;
        //}
        $image = Request::file('image')->store('articles', 'public');
        Article::create([
            'name' => Request::input('name'),
            'description' => Request::input('description'),
            'price' => Request::input('price'),
            'quantity' => Request::input('quantity'),
            'image' => $image
        ]);

        return Redirect::route('articles.index');
    }

    public function edit(Article $article)
    {
        return Inertia::render('Articles/Edit', [
            'article' => $article,
            'image' => asset('storage/' . $article->image)
        ]);
    }

    public function update(Article $article)
    {
        $image = $article->image;
        if (Request::file('image')) {
            Storage::delete('public/'. $article->image);
            $image = Request::file('image')->store('articles', 'public');
        }
        $article->update([
            'name' => Request::input('name'),
            'description' => Request::input('description'),
            'price' => Request::input('price'),
            'quantity' => Request::input('quantity'),
            'image' => $image
        ]);
        return Redirect::route('articles.index');
    }

    public function destroy(Article $article)
    {
        Storage::delete('public/'. $article->image);
        $article->delete();
        return Redirect::route('articles.index');
    }
}
