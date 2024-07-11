@extends('layouts.base')

@section('title', 'FAQ Page | De Archive')

@section('top_script')
    <script src="/assets/js/map/mapdata.js"></script>
    <script src="/assets/js/map/countrymap.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="text-primary mb-4">FAQ</h2>
            <div class="col-md-8">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          Question 1 ?
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Question 2 ?
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Question 3 ?
                        </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-4 order-lg-1">
                <div class="form-container mt-4">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif
                    <div class="illustration d-flex flex-column justify-content-center" style="position: relative;">
                        <img src="/assets/img/contact/faq-sidebar.bb0c8f35.svg" class="img-fluid" alt="Illustration">
                        <!-- <p class="mt-3 text-primary text-center" style="">You can contact us in a way that is convenient for you</p> -->
                        <div class="suggest-sidebar">
                            <h6 class="text-primary">Didn't find the answer to the question?  <br>  Ask us directly </h6>
                        </div>
                    </div>
                    
                    <form class="contact-form mt-4"  action="{{ route('faq.submit') }}" method="POST">
                        @csrf  
                        <div class="form-group">
                            <i class="bi bi-person contact-form-icon"></i>
                            <input type="text" class="form-control mb-3 ps-5" id="name" name="name" placeholder="Last and First name" required>
                        </div>
                        <div class="form-group">
                            <i class="bi bi-envelope contact-form-icon"></i>
                            <input type="email" class="form-control mb-3 ps-5" id="email" name="email" placeholder="E-mail" required>
                        </div>
                        <div class="form-group">
                            <i class="bi bi-phone contact-form-icon"></i>
                            <input type="tel" class="form-control mb-3 ps-5" id="phone" name="phone" placeholder="Phone number" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-3" id="message" placeholder="Question" name="message" rows="5" required></textarea>
                        </div>
                        @if($errors->any())
                            <div>
                                <ul>
                                    @foreach($errors->all() as $error)
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