<?php
include_once('dist/config.php');

if(isset($_SESSION["id"])!=0 ){

    $u_id=$_SESSION["id"];
     $name=$_SESSION["name"];
     $email=$_SESSION["name"];
 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="modinatheme">
    <!-- ======== Page title ============ -->
    <title>Techex - Information & Technology HTML Template</title>
    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <!-- ===========  All Stylesheet ================= -->
    <!--  Icon css plugins -->
    <link rel="stylesheet" href="assets/css/icons.css">
    <!--  animate css plugins -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!--  magnific-popup css plugins -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--  owl carosuel css plugins -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!-- metis menu css file -->
    <link rel="stylesheet" href="assets/css/metismenu.css">
    <!--  owl theme css plugins -->
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    <!--  Bootstrap css plugins -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--  main style css file -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- template main style css file -->
    <link rel="stylesheet" href="style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
     <!-- jquery cdn -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    
    <!-- Sweet Alert -->
<link href="assets/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css">
<link href="assets/sweet-alert/animate.min.css" rel="stylesheet" type="text/css">
</head>

<body class="body-wrapper">    
    
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">                
            </div>
                <div class="txt-loading">
                    <span data-text-preloader="T" class="letters-loading">
                        T
                    </span>
                    <span data-text-preloader="E" class="letters-loading">
                        E
                    </span>
                    <span data-text-preloader="C" class="letters-loading">
                        C
                    </span>
                    <span data-text-preloader="H" class="letters-loading">
                        H
                    </span>
                    <span data-text-preloader="E" class="letters-loading">
                        E
                    </span>
                    <span data-text-preloader="X" class="letters-loading">
                        X
                    </span>
                </div>
            <p class="text-center">Loading</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- welcome content start from here -->

    <header class="header-wrap header-2">
        <div class="top-header d-none d-md-block">
            <div class="container-flud">
                <div class="row">
                    <div class="col-md-7 pr-md-0 col-12">
                        <div class="header-cta">
                            <ul>
                                <li>
                                  <a href="mailto:support@gmail.com"><i class="fal fa-envelope"></i> support@gmail.com</a>
                                </li>
                                <li>
                                  <a href="tel:+8801700080702"><i class="fal fa-phone"></i> +012 (345) 67 89</a>
                                </li>
                              </ul>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="header-right-cta d-flex justify-content-end">
                            <div class="social-profile mr-30">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                            |
                            <div class="lan-select ml-30">
                                <form>
                                    <select id="lan">
                                        <option>English</option>
                                        <option>China</option>
                                        <option>Bangla</option>
                                        <option>Hindi</option>
                                        <option><?=$name?></option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-header-wraper">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-between">
                    <div class="header-logo">
                        <div class="logo">
                            <a href="index.php">
                                <img src="assets/img/logo-2.png" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="header-menu d-none d-xl-block">
                        <div class="main-menu">
                            <ul>
                                <li><a href="index.php">Home <i class="fas fa-angle-down"></i></a>
                                    <!--<ul class="sub-menu">-->
                                    <!--    <li><a href="index.html">home 1</a></li>-->
                                    <!--    <li><a href="index-2.html">home 2</a></li>-->
                                    <!--    <li><a href="index-3.html">home 3</a></li>-->
                                    <!--</ul>-->
                                </li>
                                <li><a href="about.php">About</a> </li>
                                <li><a href="services.php">Services</a></li>
                                <li><a href="cases-grid.php">Case Study</a></li>
                                <li><a href="news.php">News</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-right d-flex align-items-center">
                        <div class="header-btn-cta">
                            <a href="register.php" class="theme-btn">Register Here <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <div class="mobile-nav-bar d-block ml-3 ml-sm-5 d-xl-none">
                            <div class="mobile-nav-wrap">                    
                                <div id="hamburger">
                                    <i class="fal fa-bars"></i>
                                </div>
                                <!-- mobile menu - responsive menu  -->
                                <div class="mobile-nav">
                                    <button type="button" class="close-nav">
                                        <i class="fal fa-times-circle"></i>
                                    </button>
                                    <nav class="sidebar-nav">
                                        <ul class="metismenu" id="mobile-menu">
                                            <li><a class="has-arrow" href="index.php">Homes</a>
                                                <!--<ul class="sub-menu">-->
                                                <!--    <li><a href="index.php">Homepage 1</a></li>-->
                                                <!--    <li><a href="index-2.html">Homepage 2</a></li>-->
                                                <!--    <li><a href="index-3.html">Homepage 3</a></li>-->
                                                <!--</ul>-->
                                            </li>
                                            <li><a href="about.php">about</a></li>
                                            <li><a href="services.php">services</a></li>
                                            <!--<li>-->
                                            <!--    <a class="has-arrow" href="#">Pages</a>-->
                                            <!--    <ul class="sub-menu">-->
                                            <!--        <li><a href="faq.html">faq</a></li>-->
                                            <!--        <li><a href="services-details.html">services details</a></li>-->
                                            <!--        <li><a href="team.html">Team</a></li>-->
                                            <!--        <li><a href="cases-grid.html">Case Grid</a></li>-->
                                            <!--        <li><a href="case-2.html">Case Grid 2</a></li>-->
                                            <!--    </ul>-->
                                            <!--</li>-->
                                            <li><a href="news.php">News</a></li>
                                            <li><a href="contact.php">Contact</a></li>
                                        </ul>
                                    </nav>
        
                                    <div class="action-bar">
                                        <a href="mailto:modinatheme@gmail.com"><i class="fal fa-envelope-open-text"></i>info@webmail.com</a>
                                        <a href="tel:123-456-7890"><i class="fal fa-phone"></i>987-098-098-09</a>
                                        <a href="contact.html" class="d-btn theme-btn black">Consultancy</a>
                                    </div>
                                </div>                            
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>