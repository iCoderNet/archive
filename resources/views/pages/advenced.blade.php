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
        top: 10px;
        left: 15px;
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

    .slider-dur{
        position: relative;
        width: auto;
        height: auto;
    }

    .slider-duration{
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

    .slider-duration i{
        font-size: 20px;
    }

    a{
        text-decoration: none;
        color: black;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row mt-5">
        <h2 class="text-primary mb-4">Advanced search</h2>
        <div class="col-md-8">
            <div class="input-group mb-4 position-relative">
                <input type="text" class="form-control search-inp p-2 ps-5" placeholder="Search by word" aria-label="Search by word" aria-describedby="basic-addon2">
                <i class="bi bi-search search-icon position-absolute" style="left: 15px; top: 50%; transform: translateY(-50%);"></i>
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
        </div>

        <div class="col-md-4">
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

<!-- ARTICLES -->
<div class="container mt-5 position-relative">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Articles</h2>
        <a href="{{ route('articles.index') }}" class="btn btn-primary watch-all-btn">Watch all</a>
    </div>
    <div class="swiper-container first-swiper">
        <div class="swiper-wrapper">
            @foreach ($articles as $article)
                <div class="swiper-slide">
                <a href="{{ route('articles.show', $article->id) }}">
                    <img src="{{ asset('uploads/' . $article->image) }}" class="img-fluid swiper-img" alt="{{ $article->title }}">
                    <p class="lead">{{ $article->title }}</p>
                </a>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next custom-next"><i class="bi bi-arrow-right-circle"></i></div>
        <div class="swiper-button-prev custom-prev"><i class="bi bi-arrow-left-circle"></i></div>
    </div>
</div>
<div class="container my-5"><hr></div>


<!-- VIDEOS -->
<div class="container mt-5 position-relative">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Videos</h2>
        <a href="{{ route('articles.videos') }}" class="btn btn-primary watch-all-btn">Watch all</a>
    </div>
    <div class="swiper-container second-swiper">
        <div class="swiper-wrapper">
            @foreach ($videos as $video)
                <div class="swiper-slide">
                    <div class="slider-dur">
                        <a href="{{ route('articles.video', $article->id) }}">
                            <img src="{{ $video->cover ? asset('uploads/' . $video->cover) : "/assets/img/podcast.svg" }}" class="img-fluid swiper-img" alt="{{ $video->title }}">
                            <div class="slider-duration"> <i class="bi bi-play"></i> <span>{{$video->duration}}</span></div>
                        </a>
                    </div>
                    <p class="lead">{{ $video->title }}</p>
                </div>  
            @endforeach

        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next custom-next"><i class="bi bi-arrow-right-circle"></i></div>
        <div class="swiper-button-prev custom-prev"><i class="bi bi-arrow-left-circle"></i></div>
    </div>
</div>
<div class="container my-5"><hr></div>


<!-- PHOTOSs -->
<div class="container mt-5 position-relative">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Photos</h2>
        <a href="{{ route('articles.photos') }}" class="btn btn-primary watch-all-btn">Watch all</a>
    </div>
    <div class="swiper-container third-swiper">
        <div class="swiper-wrapper">
            @foreach ($photos as $photo)
                <div class="swiper-slide">
                    <img src="{{ asset('uploads/' . $photos_[$photo->id]->image) }}" class="img-fluid swiper-img" alt="{{ $photo->title }}">
                    <p class="lead">{{ $photo->title }} {{$photo->photos}}</p>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next custom-next"><i class="bi bi-arrow-right-circle"></i></div>
        <div class="swiper-button-prev custom-prev"><i class="bi bi-arrow-left-circle"></i></div>
    </div>
</div>
<div class="container my-5"><hr></div>


<!-- PODCASTS -->
<div class="container mt-5 position-relative">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Podcasts and interviews</h2>
        <a href="#" class="btn btn-primary watch-all-btn">Watch all</a>
    </div>
    <div class="swiper-container third-swiper">
        <div class="swiper-wrapper">
            @foreach ($audios as $audio)
                <div class="swiper-slide">
                    <div class="slider-dur">
                        <img src="/assets/img/podcast.svg" class="img-fluid swiper-img" alt="{{ $audio->title }}">
                        <div class="slider-duration"> <i class="bi bi-play"></i> <span>{{$audio->duration}}</span></div>
                    </div>
                    <p class="lead">{{ $audio->title }}</p>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next custom-next"><i class="bi bi-arrow-right-circle"></i></div>
        <div class="swiper-button-prev custom-prev"><i class="bi bi-arrow-left-circle"></i></div>
    </div>
</div>
<div class="container my-5"><hr></div>

@endsection

@section('script')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<style>
.swiper-container {
    width: 100%;
    overflow: hidden;
}

.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
}

.swiper-button-next,
.swiper-button-prev {
  background: none;
  border: none;
}

.swiper-button-next::after,
.swiper-button-prev::after {
  display: none;
}

.swiper-button-next.custom-next i,
.swiper-button-prev.custom-prev i {
  font-size: clamp(35px, 2.5vw, 45px);
  color: #0769B4;
  background-color: #F5F7FA;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
}

</style>

<script>
var firstSwiper = new Swiper('.first-swiper', {
    slidesPerView: 5,
    spaceBetween: 20,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next.custom-next',
      prevEl: '.swiper-button-prev.custom-prev',
    },
    breakpoints: {
        200: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        400: {
            slidesPerView: 2,
            spaceBetween: 8
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 20
        },
        1440: {
            slidesPerView: 5,
            spaceBetween: 15
        },
        1920: {
            slidesPerView: 5,
            spaceBetween: 20
        }
    }
});

var firstSwiper = new Swiper('.second-swiper', {
    slidesPerView: 5,
    spaceBetween: 20,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next.custom-next',
      prevEl: '.swiper-button-prev.custom-prev',
    },
    breakpoints: {
        200: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        400: {
            slidesPerView: 2,
            spaceBetween: 8
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 20
        },
        1440: {
            slidesPerView: 5,
            spaceBetween: 15
        },
        1920: {
            slidesPerView: 5,
            spaceBetween: 20
        }
    }
});

var firstSwiper = new Swiper('.third-swiper', {
    slidesPerView: 5,
    spaceBetween: 20,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next.custom-next',
      prevEl: '.swiper-button-prev.custom-prev',
    },
    breakpoints: {
        200: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        400: {
            slidesPerView: 2,
            spaceBetween: 8
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 20
        },
        1440: {
            slidesPerView: 5,
            spaceBetween: 15
        },
        1920: {
            slidesPerView: 5,
            spaceBetween: 20
        }
    }
});

</script>

@endsection
