@extends('layouts.base')

@section('title', 'Article Page | De Archive')

@section('content')

<div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Archive</a></li>
            <li class="breadcrumb-item"><a href="{{ route('articles.videos') }}">Video</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
            </ol>
        </nav>
        <div class="row">
            @if ($article->video)
                <video src="{{ asset('uploads/'.$article->video) }}" controls></video>
            @elseif ($article->url)
            @if (strpos($article->url, 'youtube') !== false)
                @php
                    $url = explode("=", $article->url);
                    $code = $url[1];
                @endphp
                <iframe width="560" height="560" src="https://www.youtube.com/embed/{{ $code }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            @else
                <iframe src="{{ $article->url }}" allowfullscreen></iframe>
            @endif
            @endif
            <h2 class="text-primary my-4">{{ $article->title }}</h2>
            <p>{!! $article->description !!}</p>
        </div>
    </div>
@endsection