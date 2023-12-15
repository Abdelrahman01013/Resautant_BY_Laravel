<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Restaurant</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ URL::asset('assets_templet/img/favicon.png') }} " rel="icon">
    <link href=" {{ URL::asset('assets_templet/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ URL::asset('assets_templet/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets_templet/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets_templet/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets_templet/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets_templet/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ URL::asset('assets_templet/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Yummy
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="home.blade.php" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                {{-- <img src="{{ URL::asset('assets_templet/img/logo.png')}}" alt=""> --> --}}
                <h1>Yummy<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#events">Events</a></li>
                    <li><a href="#chefs">Chefs</a></li>
                    <li><a href="#gallery">Gallery</a></li>

                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav><!-- .navbar -->

            <a class="btn-book-a-table" href="#book-a-table">Book a Table</a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <div
                    class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up">
                        @if (isset($about->title))
                            {{ $about->title }}
                        @endif
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="100">
                        @isset($about->body_head)
                            {{ $about->body_head }}
                        @endisset




                    </p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="#book-a-table" class="btn-book-a-table">Book a Table</a>
                        @isset($about->video_head)
                            <a href="{{ 'assets_templet/img/home/video/' . $about->video_head }}"
                                class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle"></i><span>Watch Video</span></a>
                        @endisset


                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <img src="{{ 'assets_templet/img/home/photo/' . $about->photo_head }}" class="img-fluid"
                        alt="" data-aos="zoom-out" data-aos-delay="300">
                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>About Us</h2>
                    <p>Learn More <span>About Us</span></p>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-7 position-relative about-img"
                        style="background-image: url({{ URL::asset('assets_templet/img/about.jpg') }})"
                        data-aos="fade-up" data-aos-delay="150">
                        <div class="call-us position-absolute">
                            <h4>Book a Table</h4>
                            <p>{{ $about->phone }}</p>
                        </div>
                    </div>
                    <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                        <div class="content ps-0 ps-lg-5">
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore
                                magna aliqua.
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</li>
                                <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate
                                    velit.</li>
                                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                                    storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                            </ul>
                            <p>
                                {{ $about->body_footer }}
                            </p>

                            <div class="position-relative mt-4">
                                <img src="{{ URL::asset('assets_templet/img/about-2.jpg') }}" class="img-fluid"
                                    alt="">
                                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section><!-- End About Section -->


        <!-- ======= Stats Counter Section ======= -->
        <section id="stats-counter" class="stats-counter">
            <div class="container" data-aos="zoom-out">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $number_chefs }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Chefs</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-4 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0"
                                data-purecounter-end="
                            @isset($about->workers)
                            {{ $about->workers }}
                        @endisset "
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>workers</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-4 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0"
                                data-purecounter-end="
                            @isset($about->hours_of_support)
                            {{ $about->hours_of_support }}
                        @endisset "
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Hours Of Support</p>
                        </div>
                    </div><!-- End Stats Item -->


                </div>

            </div>
        </section><!-- End Stats Counter Section -->

        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Our Menu</h2>
                    <p>Check Our <span>Yummy Menu</span></p>
                </div>

                <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($sections as $section)
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#{{ $section->id }}">
                                <h4>{{ $section->name }}</h4>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                    @foreach ($sections as $section)
                        <div class="tab-pane fade" id="{{ $section->id }}">
                            <div class="tab-header text-center">
                                <p>Menu</p>
                                <h3>{{ $section->name }}</h3>
                            </div>

                            <div class="row gy-5">
                                @foreach ($section->meals as $meal)
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ URL::asset('assets_templet/img/menu/') . $meal->photo }}"
                                            class="glightbox">
                                            <img src="{{ 'assets_templet/img/menu/' . $meal->photo }}"
                                                class="menu-img img-fluid" alt="">
                                        </a>
                                        <h4>{{ $meal->name }}</h4>
                                        <p class="ingredients">
                                            {{ $meal->components }}
                                        </p>
                                        <p class="price">
                                            {{ $meal->price }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Menu Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">


                <div class="swiper-wrapper">
                    <div class="container">

                    </div>


                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            We are happy for your comment

                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3></h3>
                                        <h4></h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="assets/img/testimonials/testimonials-1.jpg"
                                        class="img-fluid testimonial-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($comments as $comment)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="row gy-4 justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="testimonial-content">
                                            <p>
                                                <i class="bi bi-quote quote-icon-left"></i>
                                                {{ $comment->comment }}
                                                <i class="bi bi-quote quote-icon-right"></i>
                                            </p>
                                            <h3> {{ $comment->name }}</h3>
                                            <h4> {{ $comment->created_at }}</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 text-center">
                                        @if (empty($comment->photo))
                                            <?php
                                            $path = 'assets_templet/img/customer/user.jpg';
                                            ?>
                                        @else
                                            <?php
                                            $path = 'assets_templet/img/customer/' . $comment->photo;
                                            ?>
                                        @endif
                                        <img src="{{ $path }}" class="img-fluid testimonial-img"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End testimonial item -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="text-center">





                <button type="button" class="btn btn-outline-info " data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    Add Comment
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Thanks </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="formData" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            aria-describedby="helpId" placeholder="Enter Name" value="User" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Comment</label>
                                        <textarea class="form-control" name="comment" rows="3"></textarea>

                                        <p class="text-danger" id="error_comment"> </p>
                                    </div>

                                    <label for="photo">


                                        <span class="material-symbols-outlined" style="font-size: 30px">
                                            add_a_photo
                                        </span>
                                        <P>Upload Photo </P>


                                    </label>
                                    <p class="text-danger" id="error_photo"> </p>
                                    <input type="file" name="photo" hidden id="photo">


                                </div>
                                <p class="text-success" id="sucess" style="display: none">Success Comment </p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" id="craete">Add
                                        Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </section>


        <!-- End Testimonials Section -->

        <!-- ======= Events Section ======= -->
        <section id="events" class="events">
            <div class="container-fluid" data-aos="fade-up">

                <div class="section-header">
                    <h2>Events</h2>
                    <p>Share <span>Your Moments</span> In Our Restaurant</p>
                </div>

                <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        @foreach ($events as $event)
                            <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                                style="background-image: url(assets_templet/img/events/{{ $event->photo }})">
                                <h3>{{ $event->title }}</h3>
                                <div class="price align-self-start">${{ $event->price }}</div>
                                <p class="description">
                                    {{ $event->description }}
                                </p>
                            </div>
                        @endforeach
                        <!-- End Event item -->



                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Events Section -->

        <!-- ======= Chefs Section ======= -->
        <section id="chefs" class="chefs section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Chefs</h2>
                    <p>Our <span>Proffesional</span> Chefs</p>
                </div>

                <div class="row gy-4">
                    @foreach ($chefs as $chef)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                            data-aos-delay="100">
                            <div class="chef-member">
                                <div class="member-img">
                                    <img src="{{ 'assets_templet/img/chefs/' . $chef->photo }}" class="img-fluid"
                                        alt="{{ $chef->name }}">
                                    <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4>{{ $chef->name }}</h4>
                                    <span>{{ $chef->job }}</span>
                                    <p>
                                        {{ $chef->description }}

                                    </p>
                                </div>
                            </div>
                        </div><!-- End Chefs Member -->
                    @endforeach
                </div>

            </div>
        </section><!-- End Chefs Section -->

        <!-- ======= Book A Table Section ======= -->
        <section id="book-a-table" class="book-a-table">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Book A Table</h2>
                    <p>Book <span>Your Stay</span> With Us</p>
                </div>

                <div class="row g-0">

                    <div class="col-lg-4 reservation-img"
                        style="background-image: url({{ URL::asset('assets_templet/img/reservation.jpg') }})"
                        data-aos="zoom-out" data-aos-delay="200"></div>



                    <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                        <form role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100"
                            id="order_data">
                            @csrf
                            @method('POST')



                            <div class="row gy-4">

                                <div class="col-lg-4 col-md-6">

                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" data-rule="minlen:4">
                                    <p class="text-danger" id="error_name"> </p>


                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" data-rule="email">
                                    <p class="text-danger" id="error_email"> </p>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="Your Phone" data-rule="minlen:4">
                                    <p class="text-danger" id="error_phone"> </p>

                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <input type="date" name="date" class="form-control" id="date"
                                        placeholder="Date" data-rule="minlen:4">
                                    <p class="text-danger" id="error_data"> </p>

                                </div>
                                <div class="col-lg-4 col-md-6">

                                    <input type="time" class="form-control" name="time" id="time"
                                        placeholder="Time" data-rule="minlen:4">
                                    <p class="text-danger" id="error_time"> </p>

                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <input type="number" class="form-control" name="number_people" id="people"
                                        placeholder="# of people" data-rule="minlen:1"
                                        data-msg="Please enter at least 1 chars">
                                    <p class="text-danger" id="error_number_people"></p>

                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                                <p class="text-danger" id="error_message"> </p>

                            </div>
                            <div class="mb-3">

                            </div>
                            <div class="alert alert-success text-center text-success" id="success_alert_order"
                                style="display:none">
                                The Request Success

                            </div>
                            <div class="alert alert-danger text-danger text-center" id="error_alert_order"
                                style="display:none">
                                Error In Request

                            </div>
                            <div class="text-center"><button id="create_order" class="btn btn-outline-primary">Book a
                                    Table</button></div>

                        </form>

                    </div><!-- End Reservation Form -->

                </div>

            </div>
        </section><!-- End Book A Table Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>gallery</h2>
                    <p>Check <span>Our Gallery</span></p>
                </div>

                <div class="gallery-slider swiper">
                    <div class="swiper-wrapper align-items-center">

                        @foreach ($galleries as $gallery)
                            <div class="swiper-slide">
                                <a class="glightbox" data-gallery="images-gallery"
                                    href="{{ 'assets_templet/img/gallery/' . $gallery->gallery }}"><img
                                        src="{{ 'assets_templet/img/gallery/' . $gallery->gallery }}"
                                        class="img-fluid" alt="">
                                </a>
                            </div>
                        @endforeach


                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Gallery Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Contact</h2>
                    <p>Need Help OR Complaint? <span>Contact Us</span></p>
                </div>



                <div class="row gy-4">

                    <div class="col-md-6">
                        <div class="info-item  d-flex align-items-center">
                            <i class="icon bi bi-map flex-shrink-0"></i>
                            <div>
                                <h3>Our Address</h3>
                                <p>
                                    @isset($about->address)
                                        {{ $about->address }}
                                    @endisset


                                </p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item d-flex align-items-center">
                            <i class="icon bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p> @isset($about->email)
                                        {{ $about->email }}
                                    @endisset


                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item  d-flex align-items-center">
                            <i class="icon bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>
                                    @isset($about->phone)
                                        {{ $about->phone }}
                                    @endisset
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item  d-flex align-items-center">
                            <i class="icon bi bi-share flex-shrink-0"></i>
                            <div>
                                <h3>Opening Hours</h3>
                                <div><strong>
                                        @isset($about->opening_hours)
                                            {{ $about->opening_hours }}
                                        @endisset



                                    </strong>

                                </div>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                </div>


                <form id="Customer_order" class="php-email-form p-3 p-md-4">
                    @csrf
                    @method('post')

                    <div class="row">
                        <div class="col-xl-6 form-group">
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Your Name">

                            <p class="text-danger" id="error_name"> </p>
                        </div>

                        <div class="col-xl-6 form-group">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Your Email">
                            <p class="text-danger" id="error_email"> </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="complaint" rows="5" placeholder="Message"></textarea>
                    </div>
                    <p class="text-danger" id="error_complaint"> </p>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <p class="text-success" id="success_alert" style="display:none">Success Massage </p>
                    <p class="text-danger" id="error_alert" style="display:none">Error</p>
                    <div class="text-center"><button id="craete_ocomplaint" class="btn btn-outline-danger">Send
                            Message</button></div>
                </form>
                <!--End Contact Form -->

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Address</h4>
                        <p>
                            @isset($about->address)
                                {{ $about->address }}
                            @endisset
                        </p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Reservations</h4>
                        <p>
                            <strong>Phone:</strong> @isset($about->phone)
                                {{ $about->phone }}
                            @endisset

                            <br>
                            <strong>Email:</strong>
                            @isset($about->email)
                                {{ $about->email }}
                            @endisset

                            <br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>
                                @isset($about->opening_hours)
                                    {{ $about->opening_hours }}
                                @endisset
                            </strong>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">



                        @isset($about->x)
                            <a href="{{ $about->x }}" class="twitter"><i class="bi bi-twitter"></i></a>
                        @endisset

                        @isset($about->facebook)
                            <a href="{{ $about->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
                        @endisset
                        @isset($about->insta)
                            <a href="{{ $about->insta }}" class="instagram"><i class="bi bi-instagram"></i></a>
                        @endisset
                        @isset($about->linked_in)
                            <a href="{{ $about->linked_in }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        @endisset




                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; BY: <strong><span>Abdelrahman Ahmed</span></strong>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('assets_templet/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets_templet/vendor/aos/aos.js') }}"></script>
    <script src="{{ URL::asset('assets_templet/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('assets_templet/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ URL::asset('assets_templet/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets_templet/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ URL::asset('assets_templet/js/main.js') }}"></script>

    <script>
        $(document).on('click', '#craete', function(e) {
            e.preventDefault();
            var formData = new FormData($('#formData')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('comment.store') }}",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
                success: function(data) {
                    if (data.msg == "error") {
                        $.each(data.data, function(key, value) {
                            if (value) {
                                $('#error_' + key).text(value).show();
                            }
                        });
                    }

                    if (data.msg == "success") {
                        $('#sucess').show();
                        $('.text-danger').hide();


                        $.get(window.location.href + " #testimonials", function(newContent) {
                            $('#testimonials').replaceWith($(newContent).find('#testimonials'));
                        });


                        $('#staticBackdrop').modal('hide');

                        setInterval(() => {
                            $('#sucess').fadeOut('slow');
                        }, 3000);
                    }
                },
            });
        });






        $(document).on('click', '#craete_ocomplaint', function(e) {
            e.preventDefault();
            var formData = new FormData($('#Customer_order')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('complaints.store') }}",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
                success: function(data) {
                    if (data.msg == "error") {
                        $('#error_alert').show();
                        $('#success_alert').hide();
                        $('.text-danger').hide();
                        setInterval(() => {
                            $('#error_alert').fadeOut('slow');

                        }, 3000);

                        $.each(data.data, function(key, value) {
                            if (value) {

                                $('#error_' + key).text(value).show();
                            }
                        });


                    }

                    if (data.msg == "success") {
                        $('#error_alert').hide();
                        $('#success_alert').show();
                        $('.text-danger').hide();
                        setInterval(() => {
                            $('#success_alert').fadeOut('slow');

                        }, 3000);
                    }


                },
                error: function(error) {
                    $('#error_alert').show();
                    $('#success_alert').hide();
                    setInterval(() => {
                            $("#error_alert").fadeOut('slow')

                        },
                        3000)

                }
            });



        });

        $(document).on('click', '#create_order', function(e) {
            e.preventDefault();
            var formData = new FormData($('#order_data')[0]);
            $.ajax({
                type: "POST",

                url: "{{ route('orders.store') }}",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
                success: function(data) {
                    if (data.msg == "error") {
                        $('#error_alert_order').show();
                        $('#success_alert_order').hide();
                        $('.text-danger').hide();
                        setInterval(() => {
                            $('#error_alert_order').fadeOut('slow');

                        }, 4000);

                        $.each(data.data, function(key, value) {
                            if (value) {

                                $('#error_' + key).text(value).show();
                            }
                        });


                    }

                    if (data.msg == "success") {
                        $('#error_alert_order').hide();
                        $('#success_alert_order').show();
                        $('.text-danger').hide();
                        setInterval(() => {
                            $('#success_alert_order').fadeOut('slow');

                        }, 4000);
                    }


                },
                error: function(error) {
                    $('#error_alert_order').show();
                    $('#success_alert_order').hide();
                    setInterval(() => {
                            $("#error_alert_order").fadeOut('slow')

                        },
                        4000)

                }
            });



        });
    </script>


</body>

</html>
