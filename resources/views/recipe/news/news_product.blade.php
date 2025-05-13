@extends('layout.items')
@section('title','Content details')
@section('banner')
    <section class="banner page-banner position-relative pb-0">
        <div class="overlay">
        </div>
        <div class="container">
            <div class="page-title position-relative py-10 text-center">
                <div class="banner-title position-relative w-lg-50 m-auto mb-1">
                    <h2 class="text-white p-0">{{$currentRecipe->title}}</h2>
                </div>
            </div>
        </div>
    </section>
    <!--Banner Section end-->

    <!--News Archive Section start-->
    <section class="news-single">
        <div class="container">
            <div class="news-single-inner">
                <div class="row gx-lg-5 gy-5">
                    <div class="col-lg-8">
                        <div class="news-left">
                            <div class="news-img mb-4">
                                <img style="height: 350px" src="{{asset('images/group/1.jpg')}}" alt="blog-image"
                                     class="w-100 rounded">
                            </div>
                            <div class="news-description pb-4">
                                <h4 class="mb-4">{{$currentRecipe->title}}</h4>
                                <p>{{$currentRecipe->content}}</p>
                            </div>
                            <br>
                            <div class="comment-form mb-6">
                                <h2 class="mb-4 text-blue">Leave a reply</h2>
                                <form action="{{route('comment.store')}}" method="POST">
                                    @csrf
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                    <label for="comment">Comment*</label>
                                    <textarea id="comment" name="comment" rows="8" class="mb-3"></textarea>
                                    <label for="name">Name*</label>
                                    <input type="text" id="name" name="name" class="mb-3">
                                    <label for="email">Email*</label>
                                    <input type="email" id="email" name="email" class="mb-3">
                                    <button class="btn" id="sub-btn"><small>Post Comment</small></button>
                                </form>
                            </div>
                            <script src="{{asset('js/comment.js')}}"></script>
                            <div class="post-navigation">
                                <div class="row">
                                    @foreach($nextRecipe1 as $lists)
                                        <div class="col-6 border-end">
                                            <div class="navigation">
                                                <a class="d-flex align-items-center"
                                                   href="{{route('news.show',$lists->id)}}">
                                                    <div class="navigation-icon">
                                                        <i class="fa fa-chevron-left pink pe-3" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="navigating-post overflow-hidden">
                                                        <p class="mb-0 text-grey"><small>Prevoius</small></p>
                                                        <h6 class="post-title mb-0 text-nowrap">
                                                            <small>{{$lists->title}}</small></h6>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach($nextRecipe2 as $lists)
                                        <div class="col-6">
                                            <div class="navigation text-end ">
                                                <a href="{{route('news.show',$lists->id)}}"
                                                   class="d-flex align-items-center">
                                                    <div class="navigating-post pe-3 overflow-hidden ">
                                                        <p class="mb-0 text-grey"><small>Next</small></p>
                                                        <h6 class="post-title mb-0 text-nowrap">
                                                            <small>{{$lists->title}}</small></h6>
                                                    </div>
                                                    <div class="navigation-icon">
                                                        <i class="fa fa-chevron-right pink" aria-hidden="true"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="news-right">
                            <div class="recent-post-box p-6 box-shadow rounded mb-6">
                                <h6 class="mb-2">Recent Posts</h6>
                                <div class="sperator w-20 border-bottom border-2 border-pink mb-5"></div>
                                <div class="recent-post-list">
                                    <div class="row">
                                        @foreach($nextRecipe as $lists)
                                            <div class="col-lg-12 col-md-6">
                                                <div class="recent-post d-flex align-items-center  mb-4">
                                                    <div class="post-img">
                                                        <a href="{{route('news.show',$lists->id)}}"><img
                                                                    src="{{asset('images/group/1.jpg')}}" alt=""
                                                                    class="me-3"></a>
                                                    </div>
                                                    <div class="post-detail">
                                                        <a href="{{route('news.show',$lists->id)}}"
                                                           class="black fw-bold text-uppercase">{{$lists->title}}</a>
                                                        <p class="mb-0"><small>{{$lists->time_day}}</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

