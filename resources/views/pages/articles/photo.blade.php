@extends('layouts.base')

@section('title', 'Article Page | De Archive')

@section('content')

<div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Archive</a></li>
            <li class="breadcrumb-item"><a href="{{ route('articles.photos') }}">Photos</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
            </ol>
        </nav>
        <div class="row">
            <h2 class="text-primary my-4">{{ $article->title }}</h2>
            <div class="row">
                @foreach ($photos_ as $photo)
                    <div class="col-3">
                        <img src="{{ asset('uploads/'.$photo->image) }}" class="img-fluid" alt="" data-bs-toggle="modal" data-bs-target="#pictureModal-{{ $photo->id }}">
                    </div>
                @endforeach
            </div>
        </div>
</div>

@foreach ($photos_ as $photo)
<div class="modal fade" id="pictureModal-{{ $photo->id }}" tabindex="-1" aria-labelledby="pictureModalLabel-{{ $photo->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-fullscreen">
    <div class="modal-content" style="margin: 20% 10%; height: auto;">
      <div class="modal-header" style="position: relative;">
        <h5 class="modal-title text-primary" style="text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-weight: 700;" id="pictureModalLabel">{{ $article->title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="{{ asset('uploads/'.$photo->image) }}" class="img-fluid" style="border-radius: 10px;" alt="" data-bs-toggle="modal" data-bs-target="#pictureModal">
            </div>
            <div class="col p-3">
                <h4>In the photo:</h4>
                {!! $photo->description !!}
            </div>
        </div>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
@endforeach





@endsection