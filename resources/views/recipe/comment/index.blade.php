@extends('layout.items')
@section('title','Comment')
@section('banner')
    <section class="banner page-banner position-relative pb-0">
        <div class="overlay">
        </div>
        <div class="container">
            <div class="page-title text-center position-relative py-11">
                <h2 class="text-white">Comment</h2>
            </div>
        </div>
    </section>
    <!--Banner Section end-->

    <!--Testimonial Section start-->
    <div class="testimonial py-10">
        <div class="container">
            <div class="testimonial-inner">
                <div class="row g-md-4 g-lg-5 gy-3">
                    @foreach($comments as $lists)
                        <div class="col-lg-4 col-md-6">
                            <div class="box1 rounded bg-white text-center border border-1 px-4 py-6">
                                <div class="testimonial-bio">
                                    <img src="images/team/3.jpg" alt="testimonial-image"
                                         class="bio-img mb-1 rounded-circle">
                                    <div>
                                        <p class="mb-0 fw-semibold pink text-uppercase">{{$lists->email}}</p>
                                        <small>{{$lists->name}}</small>
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <i class="fa fa-quote-left mb-2" aria-hidden="true"></i>
                                    <p class="m-auto mb-4">{{$lists->comment}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

