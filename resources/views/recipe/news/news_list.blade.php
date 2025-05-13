@extends('layout.items')
@section('title','New List')
@section('banner')
    <section class="banner page-banner position-relative pb-0">
        <div class="overlay">
        </div>
        <div class="container">
            <div class="page-title text-center position-relative py-11">
                <h2 class="text-white">New Title</h2>
            </div>
        </div>
    </section>
    <!--Banner Section end-->

    <!--News Archive Section start-->
    <section class="news-archive">
        <div class="container">
            <div class="news-archive-inner">
                <div class="row gy-5">
                    <div class="col-lg-8">
                        <div class="news-left me-4 m-md-0">
                            <div class="row g-md-5 gy-5">
                                @foreach($news as $lists)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="blog-box border border-1 rounded pb-2 text-center">
                                            <div class="blog-img">
                                                <a href="{{route('news.show',$lists->id)}}">
                                                    <img class="blog-img rounded-top w-100 h-auto"
                                                         src="{{asset('images/group/3.jpg')}}" alt="blog-img">
                                                </a>
                                            </div>
                                            <div class="blog-info border-bottom p-4">
                                                <h5 class="mb-2"><a href="{{route('news.show',$lists->id)}}"
                                                                    class="black">{{$lists->title}}</a></h5>
                                                <P class="mb-2">{{$lists->short_content}}</P>
                                                <a class="text-uppercase black" href="{{route('news.show',$lists->id)}}"><small>Continue
                                                        reading</small></a>
                                            </div>
                                            <div class="pt-2 blog-data">
                                                <span
                                                    class="px-4  border-end "><small>{{$lists->time_day}}</small></span><span
                                                    class="px-4"><small>No Comments</small> </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <br>
                            <br>
                            {{$news->appends(request()->all())->links()}}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="news-right ms-4 m-md-0">
                        </div>
                        <div class="recent-post-box p-6 box-shadow rounded mb-6">
                            <h6 class="mb-2">Recent Posts</h6>
                            <div class="sperator w-20 border-bottom border-2 border-pink mb-5"></div>
                            <div class="recent-post-list">
                                <div class="row">
                                    @foreach($news as $lists)
                                    <div class="col-lg-12 col-md-6">
                                        <div class="recent-post d-flex align-items-center  mb-4">
                                            <div class="post-img">
                                                <a href="{{route('news.show',$lists->id)}}"><img src="{{asset('images/group/3.jpg')}}"
                                                                                alt="Blog Image" class="me-3"></a>
                                            </div>
                                            <div class="post-detail">
                                                <a href="{{route('news.show',$lists->id)}}" class="black fw-bold text-uppercase">{{$lists->title}}</a>
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
    </section>
    <!--News Archive Section end-->

@endsection
