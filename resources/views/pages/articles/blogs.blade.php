@extends('layouts.base')

@section('title', 'Advanced Search Page | De Archive')

@section('style')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style>
    .advanced-search {
        margin-top: 20px;
    }

    .advanced-search .form-control {
        margin-bottom: 10px;
    }

    .articles {
        margin-top: 40px;
    }

    .article-card {
        margin-bottom: 20px;
    }

    .search-inp {
        background-color: #0769B4 !important;
        color: white !important;
        border-radius: 10px !important;
    }

    .search-inp::placeholder {
        color: white !important;
    }

    .search-icon {
        position: absolute !important;
        color: white;
        width: 100px;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        z-index: 9;
    }

    .search-category {
        border-radius: 10px !important;
        background-color: #F5F7FA !important;
    }

    .form-group h5 {
        font-weight: 700 !important;
    }

    .form-group select {
        color: #0769B4 !important;
    }

    .wriper-in {
        margin: 0 auto;
        display: flex;
        justify-content: center;
    }

    .swiper-img {
        border-radius: 10px;
        width: 252px !important;
        position: relative;
    }

    .slider-dur {
        position: relative;
        width: auto;
        height: auto;
    }

    .slider-duration {
        position: absolute;
        bottom: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.596);
        color: white;
        padding: 5px 20px;
        border-radius: 0 10px;
        z-index: 99;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    .slider-duration i {
        font-size: 20px;
    }

    a {
        text-decoration: none;
        color: black;
    }
    .breadcrumb {
      background-color: transparent;
    }
</style>
@endsection

@section('content')
<div class="container">
    
    <div class="row mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Archive</a></li>
            <li class="breadcrumb-item active" aria-current="page">Articles</li>
            </ol>
        </nav>
        <h2 class="text-primary mb-4">Articles</h2>
        <div class="col-md-8 order-md-1 order-2">
            <div class="input-group mb-4 position-relative">
                <input type="text" class="form-control search-inp p-2 ps-5" placeholder="Search by word" aria-label="Search by word" aria-describedby="basic-addon2">
                <i class="bi bi-search search-icon"></i>
            </div>
            <div class="input-group mb-3 gap-2">
                <select class="form-select search-category" aria-label="Default select example">
                    <option selected>Select category</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <button class="btn btn-outline-primary" type="button" style="border-radius: 10px">Clear all</button>
            </div>
            <div class="my-5">
                <hr>
            </div>

            <div class="container mt-4">
                <div class="row">
                    @foreach ($articles as $article)
                    <div class="col-md-12 mb-4">
                        <div class="card article-card">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <a href="{{ route('articles.show', $article->id) }}">
                                        <img src="{{ asset('uploads/'.$article->image) }}" class="card-img-top" alt="Image 1">
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="card-body">
                                        <a href="{{ route('articles.show', $article->id) }}">
                                            <h5 class="card-title">{{ $article->title }}</h5>
                                        </a>
                                        <p class="card-text">{!! $article->truncated_description !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-4 order-md-2 order-1">
            <div class="contact-form">
                <div class="form-group">
                    <h5 class="text-primary">Topic</h5>
                    <select class="form-select mb-3" aria-label="Default select example">
                        <option selected>Select category</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="form-group">
                    <h5 class="text-primary">Region</h5>
                    <select class="form-select mb-3" aria-label="Default select example">
                        <option selected>Select category</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="form-group">
                    <h5 class="text-primary">Archive location</h5>
                    <select class="form-select mb-3" aria-label="Default select example">
                        <option selected>Select category</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="form-group">
                    <h5 class="text-primary">Period</h5>
                    <div class="row">
                        <div class="col-6">
                            <select class="form-select mb-3" aria-label="Default select example">
                                <option selected>Select category</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Select category</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endsection
