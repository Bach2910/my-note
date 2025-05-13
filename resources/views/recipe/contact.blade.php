@extends('layout.items')
@section('title','Contact')
@section('banner')
    <section class="banner page-banner position-relative pb-0">
        <div class="overlay">
        </div>
        <div class="container">
            <div class="page-title text-center position-relative py-11">
                <h2 class="text-white">Conact Us</h2>
            </div>
        </div>
    </section>
    <!--Contact Section end-->
    <section class="contact">
        <div class="container">
            <div class="contact-inner text-center text-md-start">
                <div class="row g-md-5 gy-5 align-items-center" style="background-color: #fd7e14">
                    <div class="col-lg-4 col-md-5">
                        <div class="contact-event-info p-8 text-white h-100 rounded bg-pink">
                            <div class="address pb-5">
                                <h5 class="text-white pb-2">ADDRESS:</h5>
                                <p class="m-0">You will never find me</p>
                            </div>
                            <div class="reception-info pb-5">
                                <h5 class="text-white pb-2">RECEPTION INFO:</h5>
                                <p class="m-0">Food Order: (+62) 1919-2020</p>
                                <p class="m-0">Email: ngoc22003@mail.com</p>
                            </div>
                            <div class="direction-link">
                                <a>Get Directions</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="contact-form">
                            <div class="form-title mb-4">
                                <h2 class="mb-1">Drop your <span class="pink">Opinion</span></h2>
                                <p>Please give your opinion</p>
                            </div>
                            <div class="form">
                                <form id="opinion-form">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" id="full-name" placeholder="Name" class="mb-3" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="email" id="email" placeholder="Email" class="mb-3" required>
                                        </div>
                                    </div>
                                    <div class="phone-no">
                                        <input type="tel" id="phone" placeholder="Phone No." class="mb-3">
                                    </div>
                                    <div class="message">
                                        <textarea id="message" placeholder="Message" rows="4" class="mb-3"></textarea>
                                    </div>
                                    <button  class="btn" id="sub-btn">Book Now</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="map-direction mt-5">
                    <iframe height="400" class="rounded w-100" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=10.771453, 106.697308&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                </div>
            </div>
        </div>
    </section>
    <script src={{asset('js/contact.js')}}></script>
@endsection
