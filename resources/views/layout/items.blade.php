<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!--CSS Plugins-->
    <link rel="stylesheet" href="{{asset('css/plugin.css')}}">
    <!-- Default CSS-->
    <link rel="stylesheet" href="{{asset('css/default.css')}}">
    <!--Custom CSS-->
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">


    <!--FontAwesome CSS-->
    <link rel="stylesheet" href="{{asset('icons/font-awesome.min.css')}}">


</head>
<body>
<!--Header Section start-->
<header class="main_header_area position-absolute w-100">

    <div class="header-content text-white">
        <div class="container">
            <div class="header-content-inner py-2">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="social-links ">
                            <ul class="m-0 p-0">
                                <li class="d-inline">
                                    <a href="https://www.facebook.com/profile.php?id=100034892641133">
                                        <i class="fa fa-facebook border-social rounded-circle text-center"></i>
                                    </a>
                                </li>
                                <li class="d-inline">
                                    <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox">
                                        <i class="fa fa-google border-social rounded-circle text-center"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header-event-info text-end">
                            <ul class="m-0 p-0">
                                <li class="px-2 border-end border-red-orange border-opacity-50 d-inline">
                                    <i class="fa fa-phone pe-1"></i>
                                    <small>0904186901</small></li>
                                <li class=" px-2 border-end d-inline border-red-orange border-opacity-50">
                                    <i class="fa fa-envelope-o pe-1"></i>
                                    <small>ngoc22003@gmail.com</small></li>
                                <li class=" px-2 d-inline ">
                                    <i class="fa fa-clock-o pe-1"></i>
                                    <small>Mon - Fri: 9:00 - 18:30</small></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Bar -->
    <div class="header_menu " id="header_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg py-2">
                <div class="row">
                    <div class="col-lg-2 col-md-6">
                        <div class="navbar-brand m-0">
                            <img src="{{asset('images/logo/1.png')}}" alt="Logo" class="w-100">
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-6">
                        <div class="collapse navbar-collapse justify-content-between ms-8 "
                             id="bs-example-navbar-collapse-1">
                            <ul class="navbar-nav align-items-center" id="responsive-menu">
                                <li class="nav-item ">
                                    <a class="nav-link px-2 my-4 py-0 text-white" aria-current="page" href="{{route('store.index')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2 my-4 py-0 text-white" href="{{route('stores.about')}}">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2 my-4 py-0 text-white" href="{{route('news.product')}}" >
                                        New Title
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2 my-4 py-0 text-white" href="{{route('stores.contact')}}">Contact</a>
                                </li>
                            </ul>
                            <div class="menu-search">
                                <a href="#search1" class="mt_search">
                                    <i class="fa fa-search fa-lg me-5 text-white"></i>
                                </a>
                                <a class="btn btn3" href="{{route('stores.order')}}">Order Food<i
                                        class="fa fa-long-arrow-right ms-4"></i></a>
                            </div>
                        </div>
                    </div>
                    <div id="slicknav-mobile"></div>
                </div>
            </nav>
        </div>
        <div id="search1">
            <button type="button" class="close">×</button>
            <form action="{{ route('stores.search') }}" method="GET" class="d-flex" role="search">
                <input class="form-control form-control-lg rounded text-white" type="search" name="search" placeholder="Search">
            </form>
            <button type="button" class="btn"><i class="fa fa-search text-white" aria-hidden="true"></i></button>
        </div>

    </div>
    <!-- Navigation Bar Ends -->
</header>
<!-- Header section ends -->
@yield('banner')
<!-- Bannner section starts -->
@yield('subscribe')

<!--Footer Section start-->
<footer class="pt-9 text-center text-white position-relative z-1">
    <div class="overlay z-n1 start-0"></div>
    <div class="container">
        <div class="footer-content w-lg-50 m-auto">
            <div class="footer-logo mb-4 pt-1">
                <a href="{{route('store.index')}}"><img src="{{asset('images/logo/1.png')}}" class="w-50" alt="footer-logo"></a>
            </div>
            <div class="footer-disciption border-bottom border-white border-opacity-25 m-auto mb-6">
                <p class=" mb-6">There's nothing interesting here </p>
                <div class="footer-socials pb-6">
                    <ul class="m-0 p-0">
                        <li class="d-inline me-2">
                            <a href="https://www.facebook.com/profile.php?id=100034892641133" class="d-inline-block rounded-circle bg-white  bg-opacity-25">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="d-inline me-2">
                            <a href="https://www.youtube.com/results?search_query=black+myth+wukong" class="d-inline-block rounded-circle bg-white  bg-opacity-25">
                                <i class="fa fa-youtube-play"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-menu pb-9">
                <ul class="p-0 m-0">
                    <li class="d-inline mx-2"><a href="{{route('stores.about')}}"><small>About Us</small></a></li>
                    <li class="d-inline mx-2"><a href="{{route('stores.contact')}}"><small>Contact Us</small></a></li>
                    <li class="d-inline mx-2"><a href="{{route('comment.index')}}"><small>Comment</small></a></li>
                </ul>
            </div>
        </div>
        <div class="copyright pb-6 pt-1">
            <small>Copyright &#169;2024 Eventen. All Rights Reserved Copyright</small>
        </div>
    </div>
</footer>
<!--Footer Section end-->


<!--Bacl-to-top Button start-->
<div id="back-to-top">
    <a href="#" class="bg-red-orange position-relative align-items-center rounded-circle d-block"></a>
</div>
<!--Bacl-to-top Button end-->
<script src="{{asset('js/jquery-3.7.1.min.j')}}s"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/custom-nav.js')}}"></script>
<script src="{{asset('js/plugin.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
