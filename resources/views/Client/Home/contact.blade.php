@extends('layout.client')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
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
                <div class="col-lg-7 col-sm-12">
                    <div class="contact-form">
                        <div class="contact-form-info">
                            <div class="contact-title">
                                <h3>TELL US YOUR PROJECT</h3>
                            </div>
                            <form id="contact-form" action="https://htmldemo.net/boyka/boyka/email.php" method="POST">
                                <div class="contact-page-form">
                                    <div class="contact-input">
                                        <div class="contact-inner">
                                            <input name="name" type="text" placeholder="First Name *" id="first-name">
                                        </div>
                                        <div class="contact-inner">
                                            <input name="lastname" type="text" placeholder="Last Name *" id="last-name">
                                        </div>
                                        <div class="contact-inner">
                                            <input type="text" placeholder="Email *" id="email" name="email">
                                        </div>
                                        <div class="contact-inner">
                                            <input name="subject" type="text" placeholder="Subject *" id="subject">
                                        </div>
                                        <div class="contact-inner contact-message">
                                            <textarea name="message" placeholder="Message *"></textarea>
                                        </div>
                                    </div>
                                    <div class="contact-submit-btn">
                                        <button class="submit-btn" type="submit">Send Email</button>
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <div class="contact-infor">
                        <div class="contact-title">
                            <h3>CONTACT US</h3>
                        </div>
                        <div class="contact-dec">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam nam ex odio expedita, officia
                                temporibus ipsum, placeat magni quibusdam sint, atque distinctio </p>
                        </div>
                        <div class="contact-address">
                            <ul>
                                <li><i class="fa fa-fax"> </i> Address : No 40 Baria Sreet 133/2 NewYork City</li>
                                <li><i class="fa fa-phone">&nbsp;</i> Infor@chairman.com</li>
                                <li><i class="fa fa-envelope-o">&nbsp;</i> 0(1234) 567 890</li>
                            </ul>
                        </div>
                        <div class="work-hours">
                            <h3><strong>Working hours</strong></h3>
                            <p><strong>Monday &ndash; Saturday</strong>: &nbsp;08AM &ndash; 22PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
@endsection
