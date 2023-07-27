<?php
include_once('dist/config.php');
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
    <title>Senthil Agency - Courier Service</title>
    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets/img/icon-senthil.png">
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
    <!----Datatable Style---->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="body-wrapper">    
    
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">                
            </div>
                <div class="txt-loading">
                    <span data-text-preloader="S" class="letters-loading">
                        S
                    </span>
                    <span data-text-preloader="E" class="letters-loading">
                        E
                    </span>
                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                    <span data-text-preloader="T" class="letters-loading">
                        T
                    </span>
                    <span data-text-preloader="H" class="letters-loading">
                        H
                    </span>
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                       <span data-text-preloader="L" class="letters-loading">
                        L
                    </span>
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    <span data-text-preloader="G" class="letters-loading">
                        G
                    </span>
                    <span data-text-preloader="E" class="letters-loading">
                        E
                    </span>
                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                    <span data-text-preloader="C" class="letters-loading">
                        C
                    </span>
                     <span data-text-preloader="Y" class="letters-loading">
                        Y
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
                                  <a href="mailto:support@gmail.com"><i class="fal fa-envelope"></i> reachsenthilagency@gmail.com</a>
                                </li>
                                <li>
                                  <a href="tel:+8801700080702"><i class="fal fa-phone"></i> +91 93801 10982</a>
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
                                <img src="assets/img/senthil-logo-final.png" alt="logo" class="header-logo">
                            </a>
                        </div>
                    </div>
                    <div class="header-menu d-none d-xl-block">
                        <div class="main-menu">
                            <ul>
                                <li><a href="index.php">Home </a>
                                    <!--<ul class="sub-menu">-->
                                    <!--    <li><a href="index.html">home 1</a></li>-->
                                    <!--    <li><a href="index-2.html">home 2</a></li>-->
                                    <!--    <li><a href="index-3.html">home 3</a></li>-->
                                    <!--</ul>-->
                                </li>
                                <li><a href="index.php#about">About</a> </li>
                                <li><a href="index.php#service">Services</a></li>
                                <li><a href="index.php#footer">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-right position-relative d-flex align-items-center">
                        <?php
                        if(isset($_SESSION["id"]) == ""){
                        ?>
                          <div class="header-btn-cta">
                            <a href="login.php" class="theme-btn">Login Here <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <?php
                        }else{
                        ?>
                          <div class="navigation">
    <div class="user-box">
      <div class="image-box">
        <img id="click-profile" src="https://i.pravatar.cc/150?img=49" alt="avatar">
        
      </div>
      <p class="username mt-1"><?php if(isset($name) !==""){ echo $name; } else{ echo ""; } ?></p>
    </div>
    <div class="menu-toggle "></div>
    
</div>
<ul id="oo" class="menu cc1">
        <li><a href="data-table.php"><ion-icon name="cog-outline"></ion-icon></ion-icon>Dashboard</a></li>
      <li><a href="change_password.php"><ion-icon name="cog-outline"></ion-icon></ion-icon>Change Password</a></li>
  <li><a href="sign-up.php"><ion-icon name="log-out-outline"></ion-icon>Logout</a></li>
  </ul>
<?php
}
?>
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
                                            </li>
                                            <li><a href="#about">about</a></li>
                                            <li><a href="#services">services</a></li>
                                           
                                            <li><a href="#contact">Contact</a></li>
                                        </ul>
                                    </nav>
        
                                    <div class="action-bar">
                                        <a href="mailto:reachsenthilagency@gmail.com"><i class="fal fa-envelope-open-text"></i>reachsenthilagency@gmail.com</a>
                                        <a href="tel:9380110982"><i class="fal fa-phone"></i>+91 93801 10982</a>
                                        <a href="login.php" class="d-btn theme-btn black">Login</a>
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
    