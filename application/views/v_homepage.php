<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title><?php echo $title; ?></title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>resources/front/new-assets/logo.png" rel="icon" />
    <link href="<?php echo base_url(); ?>resources/front/assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(); ?>resources/front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>resources/front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>resources/front/assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>resources/front/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>resources/front/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url(); ?>resources/front/assets/css/main.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: Yummy - v1.3.0
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <img src="<?php echo base_url(); ?>resources/front/new-assets/Medicine.png" alt="logo" />
                <h1>KapsulSehat<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#review">Article</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#why-us">About</a></li>
                </ul>
            </nav>
            <!-- .navbar -->
            <!-- 
      <a class="btn-book-a-table" href="#book-a-table">Book a Table</a> -->
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up">Innovate Xpress</h2>
                    <p data-aos="fade-up" data-aos-delay="100">
                        Always inspiring and informative
                    </p>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center">
                    <img src="<?php echo base_url(); ?>resources/front/new-assets/For homepage.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main">
        <!-- ======= about us Section ======= -->
        <section id="why-us" class="why-us d-flex align-items-center">
            <div class="container" data-aos="fade-up">
                <div class="row gy-5 justify-content-between">
                    <div class="col-lg-5 order-1 order-lg-1 text-center">
                        <img src="<?php echo base_url(); ?>resources/front/new-assets/About Us.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300" />
                    </div>

                    <div class="col-lg-5 order-2 order-lg-2 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
                            <h3>Why Choose Our Coffee?</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Duis aute irure dolor in reprehenderit Asperiores dolores sed
                                et. Tenetur quia eos. Autem tempore quibusdam vel
                                necessitatibus optio ad corporis.
                            </p>
                        </div>
                    </div>
                    <!-- End Why Box -->

                </div>
            </div>
        </section>
        <!-- End about us Section -->

        <!-- ======= Artikel Section ======= -->
        <section id="artikel" class="artikel section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Artikel</h2>
                </div>

                <div class="row  d-flex align-items-stretch">
                    <?php foreach ($article as $list_artikel) { ?>
                        <div class="col-lg-6 artikel-item" data-aos="fade-up">
                            <h4><a href="<?php echo base_url() . 'artikel/' . $list_artikel['id']; ?>"><?php echo $list_artikel['title'] ?> </a></h4>
                            <p><?php echo $list_artikel['deskripsi_singkat'] ?></p>
                        </div>
                    <?php
                    } ?>
                </div>

                <div class="seeMore">
                    <a href="<?php echo base_url() . 'Artikel' ?>" target="_blank"><button class="btn-effect-bg btn-seeMore">Lihat Semua</button></a>
                </div>
            </div>
        </section><!-- End Artikel Section -->


        <!--Coba section reviews-->

        <!-- <section id="review" class="text-black pt-5 section-bg">
            <div class="container py-3 review" data-aos="fade-up">
                <div class="section-header">
                    <h2>Review</h2>
                    <p>Review <span>Customers</span></p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-3 col-sm-3 box py-3">
                        <span class="quote-icon top-left">"</span>
                        <p class="comment text-center"> This is a review comment. It's quite good!</p>
                        <span class="quote-icon">"</span>
                    </div>

                    <div class="col-md-3 col-sm-3 box py-3">
                        <span class="quote-icon top-left">"</span>
                        <p class="comment text-center"> This is another review comment. It's great!</p>
                        <span class="quote-icon">"</span>
                    </div>

                    <div class="col-md-3 col-sm-3 box py-3">
                        <span class="quote-icon" top-left>"</span>
                        <p class="comment text-center"> This is yet another review comment. It's amazing!</p>
                        <span class="quote-icon">"</span>
                    </div>

                </div>
            </div>
        </section> -->

        <!-- End -->

        <!-- ======= Contact Section ======= -->
        <!-- <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Contact</h2>
                    <p>Need Help? <span>Contact Us</span></p>
                </div>

                <div class="row gy-5 justify-content-between">
                    <div class="col-lg-5 order-1 order-lg-1 text-center">
                        <img src="new-assets/For homepage.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300" />
                    </div>

                    <div class="col-lg-5 order-2 order-lg-2 d-flex flex-column justify-content-center">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
                            <div class="row">
                                <div class="col-xl-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required />
                                </div>
                                <div class="col-xl-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    Your message has been sent. Thank you!
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div> -->

        <!-- <div class="row">
        <iframe style="border: 0; width: 100%; height: 350px" title="maps"
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
          allowfullscreen></iframe>
        </div> -->


        <!-- <div class="row gy-5">
                    <div class="container-footer">
                        <div class="col-md-6">
                            <div class="footer-links d-flex align-items-center">
                                <i class="bi bi-telephone icon flex-shrink-0"></i>
                                <div>
                                    <h4>Call Us</h4>
                                    <p>+1 5589 55488 55</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="footer-links d-flex align-items-center">
                                <i class="bi bi-envelope icon flex-shrink-0"></i>
                                <div>
                                    <h4>Email Us</h4>
                                    <p>contact@example.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="footer-links d-flex align-items-center">
                                <i class="bi bi-clock icon flex-shrink-0"></i>
                                <div>
                                    <h4>Opening Hours</h4>
                                    <p>
                                        <strong>Mon-Sat: 11AM</strong> - 23PM<br />
                                        Sunday: Closed
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section> -->
        <!-- End Contact Section -->

        <section class="pricing section">
            <div class="container">
                <div class="pricing-inner section-inner has-top-divider">
                    <div class="pricing-tables-wrap">


                        <div class="pricing-table">
                            <div class="pricing-table-inner">
                                <div class="pricing-table-main">




                                    <div class="">
                                        <div class="footer-links d-flex align-items-center">
                                            <i class="bi bi-telephone icon flex-shrink-0"></i>
                                            <div>
                                                <h4>Call Us</h4>
                                                <p>+1 5589 55488 55</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="footer-links d-flex align-items-center">
                                            <i class="bi bi-envelope icon flex-shrink-0"></i>
                                            <div>
                                                <h4>Email Us</h4>
                                                <p>contact@example.com</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Yummy</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url(); ?>resources/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>resources/front/assets/vendor/aos/aos.js"></script>
    <script src="<?php echo base_url(); ?>resources/front/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url(); ?>resources/front/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?php echo base_url(); ?>resources/front/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>resources/front/assets/vendor/php-email-form/validate.js"></script>


    <!-- Template Main JS File -->
    <script src="<?php echo base_url(); ?>resources/front/assets/js/main.js"></script>
</body>

</html>