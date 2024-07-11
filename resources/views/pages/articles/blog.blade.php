@extends('layouts.base')

@section('title', 'Article Page | De Archive')

@section('content')

<div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Archive</a></li>
            <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Articles</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
            </ol>
        </nav>
        <div class="row">
            <img src="{{ asset('uploads/'.$article->image) }}" class="img-fluid" alt="{{ $article->title }}">
            <h2 class="text-primary my-4">{{ $article->title }}</h2>
            <p>{!! $article->description !!}</p>
        </div>
    </div>
@endsection