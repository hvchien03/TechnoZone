@extends('layout.client')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->


    <!-- content-wraper start -->
    <div class="content-wraper">
        <div class="container">
            <div class="row single-product-area">
                <div class="col-lg-5 col-md-6">
                    <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-lg-image-1">
                            <div class="lg-image">
                                <a href="{{ asset('assets/client/images/product/1.jpg') }}" class="img-poppu"><img
                                        src="{{ asset('assets/client/images/product/1.jpg') }}" alt="product image"></a>
                            </div>
                            <div class="lg-image">
                                <a href="{{ asset('assets/client/images/product/2.jpg') }}" class="img-poppu"><img
                                        src="{{ asset('assets/client/images/product/2.jpg') }}" alt="product image"></a>
                            </div>
                            <div class="lg-image">
                                <a href="{{ asset('assets/client/images/product/3.jpg') }}" class="img-poppu"><img
                                        src="{{ asset('assets/client/images/product/3.jpg') }}" alt="product image"></a>
                            </div>
                            <div class="lg-image">
                                <a href="{{ asset('assets/client/images/product/4.jpg') }}" class="img-poppu"><img
                                        src="{{ asset('assets/client/images/product/4.jpg') }}" alt="product image"></a>
                            </div>
                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">
                            <div class="sm-image"><img src="{{ asset('assets/client/images/product/1.jpg') }}"
                                    alt="product image thumb"></div>
                            <div class="sm-image"><img src="{{ asset('assets/client/images/product/2.jpg') }}"
                                    alt="product image thumb"></div>
                            <div class="sm-image"><img src="{{ asset('assets/client/images/product/3.jpg') }}"
                                    alt="product image thumb"></div>
                            <div class="sm-image"><img src="{{ asset('assets/client/images/product/4.jpg') }}"
                                    alt="product image thumb"></div>
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content">
                        <div class="product-info">
                            <h2>Healthy Melt</h2>
                            <div class="price-box">
                                <span class="old-price">$70.00</span>
                                <span class="new-price">$76.00</span>
                                <span class="discount discount-percentage">Save 5%</span>
                            </div>
                            <p>100% cotton double printed dress. Black and white striped top and orange high waisted skater
                                skirt bottom. Lorem ipsum dolor sit amet, consectetur adipisicing elit. quibusdam corporis,
                                earum facilis et nostrum dolorum accusamus similique eveniet quia pariatur.</p>
                            <div class="product-variants">
                                <div class="produt-variants-size">
                                    <label>Size</label>
                                    <select class="form-control-select">
                                        <option value="1" title="S" selected="selected">S</option>
                                        <option value="2" title="M">M</option>
                                        <option value="3" title="L">L</option>
                                    </select>
                                </div>
                                <div class="produt-variants-color">
                                    <label>Color</label>
                                    <ul class="color-list">
                                        <li><a href="#" class="orange-color active"></a></li>
                                        <li><a href="#" class="paste-color"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single-add-to-cart">
                                <form action="#" class="cart-quantity">
                                    <div class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <button class="add-to-cart" type="submit">Add to cart</button>
                                </form>
                            </div>
                            <div class="product-availability">
                                <i class="fa fa-check"></i> In stock
                            </div>
                            <div class="product-social-sharing">
                                <label>Share</label>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                            <div class="block-reassurance">
                                <ul>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-check-square-o"></i>
                                            </div>
                                            <p>Security policy (edit with Customer reassurance module)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-truck"></i>
                                            </div>
                                            <p>Delivery policy (edit with Customer reassurance module)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-exchange"></i>
                                            </div>
                                            <p> Return policy (edit with Customer reassurance module)</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-details-tab mt--60">
                        <ul role="tablist" class="mb--50 nav">
                            <li class="active" role="presentation">
                                <a data-bs-toggle="tab" role="tab" href="#description"
                                    class="active">Description</a>
                            </li>
                            <li role="presentation">
                                <a data-bs-toggle="tab" role="tab" href="#sheet">Product Details</a>
                            </li>
                            <li role="presentation">
                                <a data-bs-toggle="tab" role="tab" href="#reviews">Reviews</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="product_details_tab_content tab-content">
                        <!-- Start Single Content -->
                        <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                            <div class="product_description_wrap">
                                <div class="product_desc mb--30">
                                    <h2 class="title_3">Details</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis noexercit
                                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                        mollit anim id.</p>
                                </div>
                                <div class="pro_feature">
                                    <h2 class="title_3">Features</h2>
                                    <ul class="feature_list">
                                        <li><a href="#"><i class="fa fa-play"></i>Duis aute irure dolor in
                                                reprehenderit in voluptate velit esse</a></li>
                                        <li><a href="#"><i class="fa fa-play"></i>Irure dolor in reprehenderit in
                                                voluptate velit esse</a></li>
                                        <li><a href="#"><i class="fa fa-play"></i>Sed do eiusmod tempor incididunt
                                                ut labore et </a></li>
                                        <li><a href="#"><i class="fa fa-play"></i>Nisi ut aliquip ex ea commodo
                                                consequat.</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div class="product_tab_content tab-pane" id="sheet" role="tabpanel">
                            <div class="pro_feature">
                                <h2 class="title_3">Data sheet</h2>
                                <ul class="feature_list">
                                    <li><a href="#"><i class="fa fa-play"></i>Duis aute irure dolor in reprehenderit
                                            in voluptate velit esse</a></li>
                                    <li><a href="#"><i class="fa fa-play"></i>Irure dolor in reprehenderit in
                                            voluptate velit esse</a></li>
                                    <li><a href="#"><i class="fa fa-play"></i>Irure dolor in reprehenderit in
                                            voluptate velit esse</a></li>
                                    <li><a href="#"><i class="fa fa-play"></i>Sed do eiusmod tempor incididunt ut
                                            labore et </a></li>
                                    <li><a href="#"><i class="fa fa-play"></i>Sed do eiusmod tempor incididunt ut
                                            labore et </a></li>
                                    <li><a href="#"><i class="fa fa-play"></i>Nisi ut aliquip ex ea commodo
                                            consequat.</a></li>
                                    <li><a href="#"><i class="fa fa-play"></i>Nisi ut aliquip ex ea commodo
                                            consequat.</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                            <div class="review_address_inner">
                                <!-- Start Single Review -->
                                <div class="pro_review">
                                    <div class="review_thumb">
                                        <img alt="review images" src="{{ asset('assets/client/images/review/1.jpg') }}">
                                    </div>
                                    <div class="review_details">
                                        <div class="review_info">
                                            <h4><a href="#">Gerald Barnes</a></h4>
                                            <ul class="product-rating d-flex">
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                            </ul>
                                            <div class="rating_send">
                                                <a href="#"><i class="fa fa-reply"></i></a>
                                            </div>
                                        </div>
                                        <div class="review_date">
                                            <span>27 Jun, 2023 at 3:30pm</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas
                                            elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent
                                            et messages in con sectetur posuere dolor non.</p>
                                    </div>
                                </div>
                                <!-- End Single Review -->
                                <!-- Start Single Review -->
                                <div class="pro_review ans">
                                    <div class="review_thumb">
                                        <img alt="review images" src="{{ asset('assets/client/images/review/2.jpg') }}">
                                    </div>
                                    <div class="review_details">
                                        <div class="review_info">
                                            <h4><a href="#">Gerald Barnes</a></h4>
                                            <ul class="product-rating d-flex">
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                            </ul>
                                            <div class="rating_send">
                                                <a href="#"><i class="fa fa-reply"></i></a>
                                            </div>
                                        </div>
                                        <div class="review_date">
                                            <span>27 Jun, 2023 at 4:32pm</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas
                                            elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent
                                            et messages in con sectetur posuere dolor non.</p>
                                    </div>
                                </div>
                                <!-- End Single Review -->
                            </div>
                            <!-- Start RAting Area -->
                            <div class="rating_wrap">
                                <h2 class="rating-title">Write A review</h2>
                                <h4 class="rating-title-2">Your Rating</h4>
                                <div class="rating_list">
                                    <ul class="product-rating d-flex">
                                        <li><span class="fa fa-star"></span></li>
                                        <li><span class="fa fa-star"></span></li>
                                        <li><span class="fa fa-star"></span></li>
                                        <li><span class="fa fa-star"></span></li>
                                        <li><span class="fa fa-star"></span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End RAting Area -->
                            <div class="comments-area comments-reply-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="#" class="comment-form-area">
                                            <div class="comment-input">
                                                <p class="comment-form-author">
                                                    <label>Name <span class="required">*</span></label>
                                                    <input type="text" required="required" name="Name">
                                                </p>
                                                <p class="comment-form-email">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input type="text" required="required" name="email">
                                                </p>
                                            </div>
                                            <p class="comment-form-comment">
                                                <label>Comment</label>
                                                <textarea class="comment-notes" required="required"></textarea>
                                            </p>
                                            <div class="comment-form-submit">
                                                <input type="submit" value="Post Comment" class="comment-submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->


    <!-- Product Area Start -->
    <div class="product-area section-pt" style="margin-bottom:100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section-title start -->
                    <div class="section-title section-bg-2">
                        <h2>Other Products</h2>
                        <p>Most Trendy 2023 Clother</p>
                    </div>
                    <!-- section-title end -->
                </div>
            </div>
            <!-- product-wrapper start -->
            <div class="product-wrapper">
                <div class="row product-slider">
                    <div class="col-12">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="{{ route('product.show') }}"><img
                                        src="{{ asset('assets/client/images/product/9.jpg') }}" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-9%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('product.show') }}">Fusce nec facilisi</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$53.27</span>
                                    <span class="old-price">$58.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to
                                        cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-wrap end -->
                    </div>
                    <div class="col-12">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="{{ route('product.show') }}"><img
                                        src="{{ asset('assets/client/images/product/4.jpg') }}" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-7%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('product.show') }}">Sprite Yoga Straps1</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$57.27</span>
                                    <span class="old-price">$52.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to
                                        cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-wrap end -->
                    </div>
                    <div class="col-12">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="{{ route('product.show') }}"><img
                                        src="{{ asset('assets/client/images/product/5.jpg') }}" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-7%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('product.show') }}">Wrinted Summer Dress</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$51.27</span>
                                    <span class="old-price">$54.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to
                                        cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-wrap end -->
                    </div>
                    <div class="col-12">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="{{ route('product.show') }}"><img
                                        src="{{ asset('assets/client/images/product/6.jpg') }}" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-4%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('product.show') }}">Printed Dress</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$91.27</span>
                                    <span class="old-price">$84.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to
                                        cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-wrap end -->
                    </div>
                    <div class="col-12">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="{{ route('product.show') }}"><img
                                        src="{{ asset('assets/client/images/product/7.jpg') }}" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-7%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('product.show') }}">Printed Summer Dress</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$51.27</span>
                                    <span class="old-price">$54.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to
                                        cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-wrap end -->
                    </div>
                </div>
            </div>
            <!-- product-wrapper end -->
        </div>
    </div>
    <!-- Product Area End -->
@endsection
