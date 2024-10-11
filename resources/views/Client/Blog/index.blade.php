@extends('layout.client')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->


    <!-- content-wraper start -->
    <div class="content-wraper" style="margin-bottom:100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- blog-wrapper start -->
                    <div class="blog-wrapper">

                        <!-- blog-wrap start -->
                        <div class="row blog-wrap-col-3">
                            <div class="col-lg-6">
                                <!-- single-blog-area start -->
                                <div class="single-blog-area mb--40">
                                    <div class="blog-image">
                                        <a href="{{ route('blog.show') }}"><img src="{{ asset('assets/client/images/blog/blog-bg-1.jpg')}}"
                                                alt=""></a>
                                    </div>
                                    <div class="blog-contend">
                                        <h3><a href="#">Blog image post</a></h3>
                                        <div class="blog-date-categori">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> Comments </a></li>
                                            </ul>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor
                                            incididunt labore et dolore magna aliqua. </p>
                                        <div class="mt-30 blog-more-area">
                                            <a href="{{ route('blog.show') }}" class="blog-btn btn">Read more</a>
                                            <ul class="social-icons">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-blog-area end -->
                            </div>
                            <div class="col-lg-6">
                                <!-- single-blog-area start -->
                                <div class="single-blog-area mb--40">
                                    <div class="blog-image-slider">
                                        <a href="{{ route('blog.show') }}"><img src="{{ asset('assets/client/images/blog/blog-bg-2.jpg')}}"
                                                alt=""></a>
                                        <a href="{{ route('blog.show') }}"><img src="{{ asset('assets/client/images/blog/blog-bg-1.jpg')}}"
                                                alt=""></a>
                                    </div>
                                    <div class="blog-contend">
                                        <h3><a href="#">Post with Gallery </a></h3>
                                        <div class="blog-date-categori">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> Comments </a></li>
                                            </ul>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor
                                            incididunt labore et dolore magna aliqua. </p>
                                        <div class="mt-30 blog-more-area">
                                            <a href="{{ route('blog.show') }}" class="blog-btn btn">Read more</a>
                                            <ul class="social-icons">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-blog-area end -->
                            </div>
                            <div class="col-lg-6">
                                <!-- single-blog-area start -->
                                <div class="single-blog-area mb--40">
                                    <div class="blog-image">
                                        <div class="blog-audio embed-responsive embed-responsive-16by9">
                                            <iframe
                                                src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/244702956&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
                                        </div>
                                    </div>
                                    <div class="blog-contend">
                                        <h3><a href="#">Post With Audio</a></h3>
                                        <div class="blog-date-categori">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> Comments </a></li>
                                            </ul>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor
                                            incididunt labore et dolore magna aliqua. </p>
                                        <div class="mt-30 blog-more-area">
                                            <a href="{{ route('blog.show') }}" class="blog-btn btn">Read more</a>
                                            <ul class="social-icons">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-blog-area end -->
                            </div>
                            <div class="col-lg-6">
                                <!-- single-blog-area start -->
                                <div class="single-blog-area mb--40">
                                    <div class="blog-image">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe width="600" height="400" frameborder="0" allowfullscreen="true"
                                                src="https://www.youtube.com/embed/5T-_dYz8Uvw"></iframe>
                                        </div>
                                    </div>
                                    <div class="blog-contend">
                                        <h3><a href="#">Post with Video</a></h3>
                                        <div class="blog-date-categori">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> Comments </a></li>
                                            </ul>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor
                                            incididunt labore et dolore magna aliqua. </p>
                                        <div class="mt-30 blog-more-area">
                                            <a href="{{ route('blog.show') }}" class="blog-btn btn">Read more</a>
                                            <ul class="social-icons">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-blog-area end -->
                            </div>
                            <div class="col-lg-6">
                                <!-- single-blog-area start -->
                                <div class="single-blog-area mb--40">
                                    <div class="blog-image">
                                        <a href="{{ route('blog.show') }}"><img src="{{ asset('assets/client/images/blog/blog-bg-3.jpg')}}"
                                                alt=""></a>
                                    </div>
                                    <div class="blog-contend">
                                        <h3><a href="#">What is Bootstrap?</a></h3>
                                        <div class="blog-date-categori">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> Comments </a></li>
                                            </ul>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor
                                            incididunt labore et dolore magna aliqua. </p>
                                        <div class="mt-30 blog-more-area">
                                            <a href="{{ route('blog.show') }}" class="blog-btn btn">Read more</a>
                                            <ul class="social-icons">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-blog-area end -->
                            </div>
                            <div class="col-lg-6">
                                <!-- single-blog-area start -->
                                <div class="single-blog-area mb--40">
                                    <div class="blog-image">
                                        <a href="{{ route('blog.show') }}"><img src="{{ asset('assets/client/images/blog/blog-bg-4.jpg')}}"
                                                alt=""></a>
                                    </div>
                                    <div class="blog-contend">
                                        <h3><a href="#">Go to New Horizonts</a></h3>
                                        <div class="blog-date-categori">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> Comments </a></li>
                                            </ul>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor
                                            incididunt labore et dolore magna aliqua. </p>
                                        <div class="mt-30 blog-more-area">
                                            <a href="{{ route('blog.show') }}" class="blog-btn btn">Read more</a>
                                            <ul class="social-icons">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-blog-area end -->
                            </div>
                            <div class="col-lg-6">
                                <!-- single-blog-area start -->
                                <div class="single-blog-area mb--40">
                                    <div class="blog-image-slider">
                                        <a href="{{ route('blog.show') }}"><img src="{{ asset('assets/client/images/blog/blog-bg-5.jpg')}}"
                                                alt=""></a>
                                        <a href="{{ route('blog.show') }}"><img src="{{ asset('assets/client/images/blog/blog-bg-1.jpg')}}"
                                                alt=""></a>
                                    </div>
                                    <div class="blog-contend">
                                        <h3><a href="#">Post with Gallery </a></h3>
                                        <div class="blog-date-categori">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> Comments </a></li>
                                            </ul>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor
                                            incididunt labore et dolore magna aliqua. </p>
                                        <div class="mt-30 blog-more-area">
                                            <a href="{{ route('blog.show') }}" class="blog-btn btn">Read more</a>
                                            <ul class="social-icons">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-blog-area end -->
                            </div>
                            <div class="col-lg-6">
                                <!-- single-blog-area start -->
                                <div class="single-blog-area mb--40">
                                    <div class="blog-image">
                                        <a href="{{ route('blog.show') }}"><img src="{{ asset('assets/client/images/blog/blog-bg-6.jpg')}}"
                                                alt=""></a>
                                    </div>
                                    <div class="blog-contend">
                                        <h3><a href="#">work with Bootstrap</a></h3>
                                        <div class="blog-date-categori">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> Comments </a></li>
                                            </ul>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor
                                            incididunt labore et dolore magna aliqua. </p>
                                        <div class="mt-30 blog-more-area">
                                            <a href="{{ route('blog.show') }}" class="blog-btn btn">Read more</a>
                                            <ul class="social-icons">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-blog-area end -->
                            </div>
                        </div>
                        <!-- blog-wrap end -->

                        <!-- paginatoin-area start -->
                        <div class="paginatoin-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <p>Showing 10-13 of 13 item(s) </p>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul class="pagination-box">
                                        <li><a class="Previous" href="#">Previous</a>
                                        </li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li>
                                            <a class="Next" href="#"> Next </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- paginatoin-area end -->
                    </div>
                    <!-- blog-wrapper end -->
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
@endsection
