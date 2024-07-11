@extends('layouts.base')

@section('title', 'Suggest Page | De Archive')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="text-primary mb-4">{{ __('suggest.title') }}</h2>
            <div class="col-md-6 order-lg-2 order-md-2">
                <div class="illustration d-flex flex-column justify-content-center" style="position: relative;">
                    <img src="/assets/img/contact/suggest.2a72daac.svg" class="img-fluid" alt="Illustration">
                    <!-- <p class="mt-3 text-primary text-center" style="">You can contact us in a way that is convenient for you</p> -->
                    <div class="suggest-sidebar mb-5">
                        <h6 class="text-primary">{{ __('suggest.bigtitle') }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6 order-lg-1">
                <div class="form-container mt-4">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif
                    <form class="contact-form" action="{{ route('suggest.submit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <i class="bi bi-person contact-form-icon"></i>
                            <input type="text" class="form-control mb-3 ps-5" id="name" name="name"
                                placeholder="{{ __('suggest.placeh1') }}" required>
                        </div>
                        <div class="form-group">
                            <i class="bi bi-envelope contact-form-icon"></i>
                            <input type="email" class="form-control mb-3 ps-5" id="email" name="email"
                                placeholder="E-mail" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-3" id="message" name="message" placeholder="{{ __('suggest.placeh2') }}"
                                rows="8" required></textarea>
                        </div>
                        @if ($errors->any())
                            <div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="color: red">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary btn-block w-100 p-2">{{ __('suggest.send') }}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        // jQuery code to change icon color on input focus
        $('.contact-form input, .contact-form textarea').focus(function() {
            $(this).siblings('.contact-form-icon').css('color', '#007BFF');
        }).blur(function() {
            $(this).siblings('.contact-form-icon').css('color', '#CCCCCC');
        });
    </script>
@endsection
