@extends('layout.items')
@section('title','Food Page')
@section('banner')
    <section class="banner page-banner position-relative pb-0">
        <div class="overlay">
        </div>
        <div class="container">
            <div class="page-title text-center position-relative py-11">
                <h2 class="text-white">Food Shop</h2>
            </div>
        </div>
    </section>
    <!--Banner Section end-->

    <!--Product List Section start-->
    <section class="shop">
        <div class="container">
            <div class="shop-inner">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-list me-6 m-md-0 pb-6">
                            <div class="product-left text-center">
                                <div class="row gy-4">
                                    @foreach($recipe as $list)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="product-box p-3 pb-4 box-shadow rounded me-1 m-md-0">
                                                <div class="product-img mb-5">
                                                    <a href="{{ route('store.show', $list->id) }}"><img
                                                            src="{{asset('images/product/picture1.jpg')}}"
                                                            alt="Bamboo Bucket"
                                                            class="w-100 rounded"></a>
                                                </div>
                                                <div class="product-info mb-3">
                                                    <h6 class="pb-2"><a href="{{ route('store.show', $list->id) }}"
                                                                        class="yellow">{{$list->food_name}}</a></h6>
                                                    <span class="red-orange fw-semibold">${{$list->price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <br>
                            <br>
                            {{$recipe->appends(request()->all())->links()}}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product-right ms-6 m-md-0">
                            <div class="keyword-search p-6 box-shadow rounded mb-6">
                                <h6 class="mb-2">Search Keywords</h6>
                                <div class="sperator mb-5 w-20 border-bottom border-2 border-yellow"></div>
                                <div class="searchbar d-flex">
                                    <form action="{{ route('stores.search') }}" method="GET" class="d-flex w-100">
                                        <input type="search" id="form1" name="search"
                                               class="bg-lightgrey border-0 p-3 text-grey w-80 rounded-end-0 m-0 form-control form-control-lg"
                                               placeholder="Search...">
                                        <button type="submit" class="btn rounded-start-0">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="product-gallery p-6 box-shadow rounded mb-6">
                                <h6 class="mb-2">Product Gallery</h6>
                                <div class="sperator m-0 mb-5 w-20 border-bottom border-2 border-yellow"></div>
                                <div class="product-gallery-inner ">
                                    <div id="selector1" class="row g-3 ">
                                        <div class="item col-lg-6 col-md-6 position-relative"
                                             data-src="images/product/picture1.jpg">
                                            <a>
                                                <div class="image-overlay rounded mx-1"></div>
                                                <img src="{{asset('images/product/picture1.jpg')}}" class="w-100 rounded position-relative"
                                                     alt="Margherita Pizza">
                                            </a>
                                        </div>
                                        <div class="item  col-lg-6 col-md-6 position-relative"
                                             data-src="images/product/picture2.jpg">
                                            <a>
                                                <div class="image-overlay rounded mx-1 "></div>
                                                <img src="{{asset('images/product/picture2.jpg')}}" class="w-100 rounded position-relative"
                                                     alt="Pepperoni Pizza">
                                            </a>
                                        </div>
                                        <div class="item col-lg-6 col-md-6 position-relative"
                                             data-src="images/product/picture3.jpg">
                                            <a>
                                                <div class="image-overlay rounded mx-1"></div>
                                                <img src="{{asset('images/product/picture3.jpg')}}" class="w-100 rounded position-relative"
                                                     alt="BBQ Chicken Pizza">
                                            </a>
                                        </div>
                                        <div class="item  col-lg-6 col-md-6 position-relative"
                                             data-src="images/product/picture4.jpg">
                                            <a>
                                                <div class="image-overlay rounded mx-1"></div>
                                                <img src="{{asset('images/product/picture4.jpg')}}" class="w-100 rounded position-relative"
                                                     alt="Hawaiian Pizza">
                                            </a>
                                        </div>
                                        <div class="item  col-lg-6 col-md-6 position-relative"
                                             data-src="images/product/picture5.jpg">
                                            <a>
                                                <div class="image-overlay rounded mx-1"></div>
                                                <img src="{{asset('images/product/picture5.jpg')}}" class="w-100 rounded position-relative"
                                                     alt="Veggie Pizza">
                                            </a>
                                        </div>
                                        <div class="item  col-lg-6 col-md-6 position-relative"
                                             data-src="images/product/picture6.jpg">
                                            <a>
                                                <div class="image-overlay rounded mx-1"></div>
                                                <img src="{{asset('images/product/picture6.jpg')}}" class="w-100 rounded position-relative"
                                                     alt="Buffalo Wings">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-product-box p-6 pb-2 box-shadow rounded mb-6">
                                <h6 class="mb-2">Recent Products</h6>
                                <div class="sperator m-0 mb-5 w-20 border-bottom border-2 border-yellow"></div>
                                <div class="recent-product-list">
                                    <div class="row">

                                        @foreach($recipe->slice(0,5) as $lists)

                                        <div class="col-lg-12 col-md-6">
                                            <div class="recent-product d-flex align-items-center  mb-3">
                                                <div class="product-img">
                                                    <a href="{{ route('store.show', $lists->id) }}"><img src="{{asset('images/product/picture2.jpg')}}"
                                                                                       alt=""
                                                                                       class="rounded me-3"></a>
                                                </div>
                                                <div class="product-detail">
                                                    <a href="{{ route('store.show', $lists->id) }}"
                                                       class="yellow fw-semibold text-uppercase">{{$lists->food_name}}</a>
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
    <!--Product List Section end-->
@endsection
