<?php
include('include/config.php');
if(isset($_SESSION["id"]) == "")
{
    echo "<script>window.location='sign-up.php';</script>";
}

if(isset($_SESSION["id"])!=0 ){
    
    $u_id=$_SESSION["id"];
     $name=$_SESSION["name"];
     $email=$_SESSION["email"];
}


include_once('header.php');

?>
   <section class="hero-slide-wrapper hero-1">
        <div class="hero-slider-active owl-carousel">
            <div class="single-slide bg-cover">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-xl-8 col-lg-10">
                            <div class="hero-contents">
                                <h2>We deliver</h2>
                                <h1 class="fs-lg">goods safely</h1>
                                <p>We Have 15 Years Of Experience In Courier Service</p>
                                <?php
                                if($u_id=="") { ?>
                                <a href="login.php" class="theme-btn">Service we provide <i class="fas fa-arrow-right"></i></a>
                                <?php } else { ?>
                                <a href="data-table.php" class="theme-btn">Service we provide <i class="fas fa-arrow-right"></i></a>
                                 <?php } ?>
                                <a href="#about" class="theme-btn minimal-btn">learn more <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-top-img d-none d-lg-block bg-overlay bg-cover" style="background-image: url('assets/img/home1/delivery_package_verified_icon_3d_render_illustration1.jpg')"></div>
                <div class="slide-bottom-img d-none d-xl-block bg-overlay bg-cover" style="background-image: url('assets/img/home1/shopping_011.jpg')"></div>
            </div>
        </div>
    </section>

 

    <section class="about-us-wrapper section-padding" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 pr-lg-5 order-2 order-lg-1 mt-5 mt-lg-0">
                    <div class="section-title mb-30">
                        <p>About Company</p>
                        <h1>Making the world a better place, one delivery at a time.</h1>
                    </div>

                    <p class="pr-5">Our Enterprise is proud to have a can-do attitude backed up by 16years of experience. Embarking on a journey in 2005. We are providing Excellent Customer Services to deal with any Queries / Problems that may arises delivery time or Packaging time</p>
                    <p class="pr-5">As a growing Enterprise, we dependable and deliver packages and cargo on time, As a company we offer Coverage in the areas where you need it.</p>
                    <div class="about-icon-box">
                        <div class="icon">
                            <i class="fal fa-users"></i>
                        </div>
                        <div class="content">
                            <h3>Professinoal Consultants</h3>
                            <p>Reputation of an enterprise, as a customer you can check the customer's feed back on the company reliability, customer services and overall performance of an enterprise </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 pl-lg-5 col-12 order-1 order-lg-2">
                    <span class="dot-circle"></span>
                    <div class="about-us-img" style="background-image: url('assets/img/home1/two-removal-company-workers-are-loading-boxes-into-minibus.jpg');background-size: cover;">
                    </div>
                    <span class="triangle-bottom-right"></span>
                </div>
            </div>
        </div>
    </section>  

    <section class="services-wrapper service-1 section-padding section-bg" id="service">
        <div class="container">
            <div class="row mb-4 mb-lg-5">
                <div class="col-12 col-lg-12">
                    <div class="section-title text-white text-center">
                        <p>Popular services</p>
                        <h1>Best Courier Services</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-3 col-12">
                    <div class="single-service-item">
                        <div class="icon">
                            <img src="assets/img/icon/sicon1.png" alt="service">
                        </div>
                        <h4>Cargo Storage</h4>
                        <p></p>
                      
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 col-12">
                    <div class="single-service-item">
                        <div class="icon">
                            <img src="assets/img/icon/sicon2.png" alt="service">
                        </div>
                        <h4>Air Freight</h4>
                        <p></p>
               
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 col-12">
                    <div class="single-service-item">
                        <div class="icon">
                            <img src="assets/img/icon/sicon3.png" alt="service">
                        </div>
                        <h4>Ocean Freight</h4>
              
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 col-12">
                    <div class="single-service-item">
                        <div class="icon">
                            <img src="assets/img/icon/sicon4.png" alt="service">
                        </div>
                        <h4>Land Transport</h4>
             
                    </div>
                </div>
            </div>
        </div>
    </section> 
        <section class="work-process-wrapper section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <div class="section-title style-3 mb-40">
                        <span>process</span>
                        <p>working process</p>
                        <h1>How Does We Works</h1>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-12">
                    <div class="work-process-grid">
                        <div class="single-work-process">
                            <div class="icon">
                                <i class="fal fa-mug-hot"></i>
                            </div>
                            <div class="content">
                                <h3>providing</h3>
                                <p>We are providing Domestic, Cargo and International Services for Documents and Non Documents Consignments, As we are providing an adequate Security Measures to ensure the safe delivery for your products, this would be includes Tracking, Insurance,Secure packing and handling Practices</p>
                                <span>01</span>
                            </div>
                        </div>
                        <div class="single-work-process">
                            <div class="icon">
                                <i class="fal fa-comments-alt"></i>
                            </div>
                            <div class="content">
                                <h3>Cost</h3>
                                <p>While on cost view it should not be the sole factor when selecting a courier and cargo services of company, That we provides competitive rates and offer packages that meet your budget</p>
                                <span>02</span>
                            </div>
                        </div>
                        <div class="single-work-process">
                            <div class="icon">
                                <i class="fal fa-analytics"></i>
                            </div>
                            <div class="content">
                                <h3>Delivery</h3>
                                <p>We are providing various delivery options and speeds and be able to provide express delivery services for urgent packages as well.</p>
                                <span>03</span>
                            </div>
                        </div>
                        <div class="single-work-process">
                            <div class="icon">
                                <i class="fal fa-trophy-alt"></i>
                            </div>
                            <div class="content">
                                <h3>Customer solution</h3>
                                <p>In future, we believe in mutual growth and take necessary steps to understand the customer needs before offering a solutions</p>
                                <span>04</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  



<?php
include('footer.php');
?>