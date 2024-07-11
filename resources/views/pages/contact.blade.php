@extends('layouts.base')

@section('title', 'Contact Page | De Archive')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="text-primary mb-4">{{ __('contact.title') }}</h2>
            <div class="col-md-6 order-lg-2 order-md-2">
                <div class="illustration d-flex flex-column justify-content-center" style="position: relative;">
                    <img src="/assets/img/contact/contacts.f4cd78bd.svg" class="img-fluid" alt="Illustration">
                    <div class="suggest-sidebar mb-5">
                        <h6 class="text-primary">{{ __('contact.imgtext') }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center justify-content-between gap-4 flex-wrap flex-sm-nowrap">
                    <a href="mailto:de.archiv.kz2022@gmail.com"
                        class="contact-method w-100 w-sm-100 p-4 d-flex flex-column justify-content-center"
                        style="position: relative;">
                        <i class="bi bi-envelope-fill text-primary"
                            style="font-size: 30px; position: absolute; top: 20%; right: 10%;"></i>
                        <span class="text-primary">Write</span>
                        <h4>to email</h4>
                        <span class="text-primary">de.archiv.kz2022@gmail.com</span>
                    </a>
                    <a href="tel:77172429395" class="contact-method w-100 p-4 d-flex flex-column justify-content-center"
                        style="position: relative;">
                        <i class="bi bi-telephone text-primary"
                            style="font-size: 30px; position: absolute; top: 20%; right: 10%;"></i>
                        <span class="text-primary">Call</span>
                        <h4>by number</h4>
                        <span class="text-primary">+7 7172 429395</span>
                    </a>
                </div>
                <div class="form-container mt-4">
                    <h4 class="mb-3">Contact us by filling out the form below</h4>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif
                    <form class="contact-form" action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <i class="bi bi-person contact-form-icon"></i>
                            <input type="text" class="form-control mb-3 ps-5" id="name" name="name"
                                placeholder="Last and First name" required>
                        </div>
                        <div class="form-group">
                            <i class="bi bi-envelope contact-form-icon"></i>
                            <input type="email" class="form-control mb-3 ps-5" id="email" name="email"
                                placeholder="E-mail" required>
                        </div>
                        <div class="form-group">
                            <i class="bi bi-phone contact-form-icon"></i>
                            <input type="tel" class="form-control mb-3 ps-5" id="phone" name="phone"
                                placeholder="Phone number" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-3" id="message" name="message" placeholder="Write a message" rows="8" required></textarea>
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
                        <button type="submit" class="btn btn-primary btn-block w-100 p-2">Send →</button>
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
