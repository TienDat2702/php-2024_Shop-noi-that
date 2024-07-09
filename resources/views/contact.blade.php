@extends('layoutPage')
@section('title', 'Liên hệ')
@section('titlePage', 'Liên hệ')
@section('content')
<div class="section-contact">
        <div class="section-map">
            <div class="container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.4441623916387!2d106.62348197508975!3d10.853782889299744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b6c59ba4c97%3A0x535e784068f1558b!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1711032705927!5m2!1svi!2s"
                    width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="form-contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-details-wrapper" data-aos="fade-up" data-aos-delay="0">
                            <div class="contact-details">

                                <div class="contact-details-item">
                                    <div class="contact-details-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="contact-details-content contact-phone">
                                        <a href="tel:+0123456789">0123456789</a>
                                        <a href="tel:+0123456789">0123456789</a>
                                    </div>
                                </div>

                                <div class="contact-details-item">
                                    <div class="contact-details-icon">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="contact-details-content contact-phone">
                                        <a href="mailto:demo@example.com">demo@example.com</a>
                                        <a href="https://www.example.com">www.example.com</a>
                                    </div>
                                </div>

                                <div class="contact-details-item">
                                    <div class="contact-details-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="contact-details-content contact-phone">
                                        <span>Your address goes here.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-social">
                                <h4>Follow Us</h4>
                                <ul>
                                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fa fa-youtube"></i></a></li>
                                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href=""><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form">
                            <h5 class="fw-bold p-0 mb-5">THÔNG TIN LIÊN LẠC</h5>
                            <form class="row g-3">
                                <div class="col-md-6">
                                    <label for="inputHoten" class="form-label">Họ và tên</label>
                                    <input type="text" class="form-control" id="inputHoten">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Nội dung</label>
                                    <input type="text" class="form-control" id="inputEmail4">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Ghi chú</label>
                                    <textarea class="form-control" name="message" id="contact-message" cols="30" rows="10"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-dark px-4 py-2">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
@endsection
