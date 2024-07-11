<?php

namespace App\Http\Controllers;

use App\Helpers\HtmlTruncate;
use App\Models\Article;
use App\Models\Photo;
use App\Models\PhotoArticle;
use App\Models\Video;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        foreach ($articles as $article) {
            $article->truncated_description = HtmlTruncate::truncate($article->description, 100);
        }
        return view("pages.articles.blogs", compact("articles"));
    }

    public function show(string $id)
    {
        $article = Article::findOrFail($id);

        return view('pages.articles.blog', compact('article'));
    }

    public function videos()
    {
        $articles = Video::all();
        foreach ($articles as $article) {
            $article->truncated_description = HtmlTruncate::truncate($article->description, 100);
        }
        return view("pages.articles.videos", compact("articles"));
    }

    public function video(string $id)
    {
        $article = Video::findOrFail($id);

        return view('pages.articles.video', compact('article'));
    }


    public function photos()
    {
        $articles = PhotoArticle::all();
        foreach ($articles as $article) {
            $article->truncated_description = HtmlTruncate::truncate($article->description, 100);
        }
        $photos_ = [];
        foreach ($articles as $photo) {
            if(Photo::find($photo->id)->exists()) {
                $photos_[$photo->id] = Photo::find($photo->id);
            }
        }
        return view("pages.articles.photos", compact("articles", 'photos_'));
    }

    public function photo(string $id)
    {
        $article = PhotoArticle::findOrFail($id);
        $photos_ = [];
        if(Photo::find($article->id)->exists()) {
            $photos_ = Photo::where('photoarticle_id', $article->id)->get();
        }
        return view('pages.articles.photo', compact('article', 'photos_'));
    }
}
