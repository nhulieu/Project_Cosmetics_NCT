@extends('layout.layout')
@section('title', 'Contact')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Contact</li>
            </ul>
        </div>
    </div>

    <!-- Breadcrumb End -->

    <!-- Contact Start -->
    <div class="contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h2>Our Office</h2>
                        <h3><i class="fa fa-map-marker"></i>590 Cach Mang Thang Tam, Ward 11, District 3, Ho Chi Minh
                            City</h3>
                        <h3><i class="fa fa-envelope"></i>cangtvts2006017@fpt.edu.vn</h3>
                        <h3><i class="fa fa-phone"></i>+84962382911</h3>
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h2>Our Store</h2>
                        <h3><i class="fa fa-map-marker"></i>590 Cach Mang Thang Tam, Ward 11, District 3, Ho Chi Minh
                            City</h3>
                        <h3><i class="fa fa-envelope"></i>cangtvts2006017@fpt.edu.vn</h3>
                        <h3><i class="fa fa-phone"></i>+84962382911</h3>
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-form">
                        <form action="{{ route('postContact') }}" method="post">
                            @csrf
                            <input id='message' value="{{(Session::has('success'))?(Session::get('success')):'false'}}"
                                   hidden>
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="name" type="text" class="form-control" placeholder="Your Name" required/>
                                </div>
                                <div class="col-md-6">
                                    <input name="email" type="email" class="form-control" placeholder="Your Email" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="subject" type="text" class="form-control" placeholder="Subject" required/>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div>
                                <button class="btn" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="contact-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15677.2773997461!2d106.6662743!3d10.7868348!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd2ecb62e0d050fe9!2sFPT-Aptech%20Computer%20Education%20HCM!5e0!3m2!1sen!2s!4v1624126830792!5m2!1sen!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <script>
        window.onload = function () {
            var message = document.getElementById('message').value;
            if (message != 'false') {
                alertify.success(message);
            }
        }
    </script>
@endsection


