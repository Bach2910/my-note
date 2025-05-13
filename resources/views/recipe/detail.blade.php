@extends('layout.items')
@section('title','List Product')
@section('banner')
<!-- Bannner section starts -->
<section class="banner page-banner position-relative pb-0">
    <div class="overlay">
    </div>
    <div class="container">
        <div class="page-title text-center position-relative py-11">
            <h2 class="text-white">Food: {{$currentRecipe->food_name}}</h2>
        </div>
    </div>
</section>
<!--Banner Section end-->

<!--Main product Section start-->
<section class="main-product pb-0">
    <div class="container">
        <div class="main-product-inner ">
            <div class="row gx-md-5">
                <div class="col-lg-5">
                    <div class="main-product-left mb-4">
                        <div class="">
                            <div class="slider slider-for pb-1">
                                <div class="product-img">
                                    <img src="{{ asset('images/product/picture1.jpg') }}" alt="" class=" w-100 rounded">
                                </div>
                                <div class="product-img">
                                    <img src="{{ asset('images/product/picture2.jpg') }}" alt="" class=" w-100 rounded">
                                </div>
                                <div class="product-img">
                                    <img src="{{ asset('images/product/picture3.jpg') }}" alt="" class=" w-100 rounded">
                                </div>
                                <div class="product-img">
                                    <img src="{{ asset('images/product/picture4.jpg') }}" alt="" class=" w-100 rounded">
                                </div>
                            </div>
                            <div class="slider slider-nav justify-content-md-center justify-content-start">
                                <div class="product-img-nav me-1">
                                    <img src="{{ asset('images/product/picture1.jpg') }}" alt="" class="rounded opacity-50">
                                </div>
                                <div class="product-img-nav me-1">
                                    <img src="{{ asset('images/product/picture2.jpg') }}" alt="" class="rounded opacity-50">
                                </div>
                                <div class="product-img-nav me-1">
                                    <img src="{{ asset('images/product/picture3.jpg') }}" alt="" class="rounded opacity-50">
                                </div>
                                <div class="product-img-nav me-1">
                                    <img src="{{ asset('images/product/picture4.jpg') }}" alt="" class="rounded opacity-50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="main-product-right text-center text-lg-start">
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb mb-4 justify-content-lg-start justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('store.index')}}" class="pink" style="color: #fd7e14"><small>Home</small></a></li>
                                <li class="breadcrumb-item"><a href="{{route('store.show', $currentRecipe->id)}}" class="pink" style="color: #fd7e14"><small>Food</small></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><small>{{$currentRecipe->food_name}}</small></li>
                            </ol>
                        </nav>
                        <div class="product-detail">
                            <p id="detail">{{$currentRecipe->detail}}</p>
                            <div class="price">
                                <h6 class="pink mb-4">${{$currentRecipe->price}}</h6>
                                <input type="number" value="1" class="border border-1 border-grey rounded-4 p-3 text-grey bg-white pe-1" min="1">
                                <a class="btn ms-2">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Main product Section end-->
@endsection
@section('subscribe')
<!--Related product Section start-->
<section class="related-product pb-9">
    <div class="container">
        <div class="related-product-inner text-center text-lg-start">
            <div class="row gx-md-5">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="related-product-list text-center pb-5">
                        <h5 class="mb-4 text-lg-start">Releated Products</h5>
                        <div class="row gx-md-5 gy-5">
                            <!-- Hiển thị các sản phẩm tiếp theo -->
                            @if($nextRecipe->isNotEmpty())
                                @foreach($nextRecipe as $recipe)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="product-box p-4 pb-4 box-shadow rounded ms-1 m-md-0">
                                            <div class="product-img mb-5 position-relative">
                                                <a href="{{ route('store.show', $recipe->id) }}">
                                                    <img src="{{ asset('images/product/picture3.jpg') }}" alt="{{ $recipe->food_name }}" class="w-100 rounded">
                                                </a>
                                            </div>
                                            <div class="product-info mb-3">
                                                <h6 class="pb-2">
                                                    <a href="{{ route('store.show', $recipe->id) }}" class="black">{{ $recipe->food_name }}</a>
                                                </h6>
                                                <p class="pink fw-semibold">
                                                    <span>${{ $recipe->price }}</span>
                                                </p>
                                            </div>
                                            <div class="add-to-cart-btn">
                                                <a class="btn">Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>No next recipes available.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="related-product-info">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active fw-semibold text-uppercase  py-2 px-4 ms-2 text-grey border border-1 border-grey border-opacity-75 bg-lightgrey" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
                                <button class="nav-link fw-semibold text-uppercase py-2 px-4 text-grey border border-1 border-grey border-opacity-75 bg-lightgrey" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews (0)</button>
                            </div>
                        </nav>
                        <div class="tab-content text-start" id="nav-tabContent">
                            <div class="tab-pane fade show active p-4 pb-5" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                <p class="pink fw-semibold text-uppercase mt-1">Description</p>
                                <p>{{$currentRecipe->detail}}</p>
                            </div>
                            <div class="tab-pane fade p-4 pb-5" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                <p class="pink fw-semibold text-uppercase mt-1">Reviews</p>
                                <p>There are no reviews yet.</p>
                                <p>Be the first to review {{$currentRecipe->food_name}} <br> Your email address will not be published. Required fields are marked *</p>
                                <div class="review-form ">
                                    <form action="{{route('comment.store')}}" method="POST">
                                        @csrf
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                        <label for="comment">Comment*</label>
                                        <textarea  id="comment" name="comment" rows="8" class="mb-3"></textarea>
                                        <label for="name">Name*</label>
                                        <input type="text" id="name" name="name" class="mb-3">
                                        <label for="email">Email*</label>
                                        <input type="email" id="email" name="email" class="mb-3">
                                        <button class="btn" id="sub-btn"><small>Comment</small></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Related product Section end-->
@endsection
