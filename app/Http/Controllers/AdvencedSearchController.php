<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Audio;
use App\Models\Photo;
use App\Models\PhotoArticle;
use App\Models\Video;
use Illuminate\Http\Request;

class AdvencedSearchController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::all()->take(10);
        $photos = PhotoArticle::all()->take(10);
        $photos_ = [];
        foreach ($photos as $photo) {
            if(Photo::find($photo->id)->exists()) {
                $photos_[$photo->id] = Photo::find($photo->id);
            }
        }
        $videos = Video::all()->take(10);
        $audios = Audio::all()->take(10);

        return view('pages.advenced', compact('articles', 'photos', 'photos_', 'videos', 'audios'));
    }
}
