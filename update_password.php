 <?php
  include 'header.php';
  
  if(isset($_REQUEST['login_submit']))
  {
      $email=$_REQUEST['email'];
      $password=base64_encode($_REQUEST['password']);
      $query = "select * from user_login where email='$email' and password='$password' ";
     $query_sql=mysqli_query($conn,$query);
     $row_count=mysqli_num_rows($query_sql);
     if($row_count > 0)
     {
        $row=$query_sql->fetch_assoc();
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
        $_SESSION['email']=$row['email']; 
        
          echo "<script>swal({
  title: 'Password Updated Success!',
  text: 'Go To login Please',
  type: 'success',
  timer: 1000,
  showConfirmButton: false
}, function(){
      window.location.href = 'login.php';
}) </script>";
     } else {
          echo "<script>swal({
  title: 'Password Updated Failure!',
  text: 'Please Try Again',
  type: 'success',
  timer: 1000,
  showConfirmButton: false
}, function(){
      window.location.href = 'forgot_password.php';
}) </script>";
     }
    
  }
  
if(isset($_POST['update_password']))
{
    $new_password=base64_encode($_POST['password']);
    $confirm_password=base64_encode($_POST['cpassword']);
    $user_id=$_GET['user_id'];
    
    if($new_password==$confirm_password)
    {
        $sql="update user_login set password='$new_password' where id=$user_id";
        // $result=$connect->prepare($sql);
        // $result->execute();
        $result=mysqli_query($conn,$sql);
        
        if($result)
        {
            echo "<script type='text/javascript'>
    
                         $(document).ready(function() {
                                  Swal.fire({
                                  icon: 'success',
                                  title: '',
                                  text: 'New password updated!',
                                      
                                  }).then(function(){
                                    window.location.href='login.php';
                                  });
                                });
    
                    </script>
                    ";
        }
        else
        {
            echo "<script type='text/javascript'>
    
                         $(document).ready(function() {
                                  Swal.fire({
                                  icon: 'error',
                                  title: '',
                                  text: 'Please try again!',
                                      
                                  });
                                });
    
                    </script>
                    ";
        }
    }
    else
    {
        echo "<script type='text/javascript'>
    
                         $(document).ready(function() {
                                  Swal.fire({
                                  icon: 'error',
                                  title: '',
                                  text: 'Password and confirm password doesn\'t matched',
                                      
                                  });
                                });
    
                    </script>
                    ";
    }
}
  
 ?> 
 <style>
     .contact-forms{
    border-radius: 20px;
    box-shadow: 0 0 10px rgb(175 175 175 / 23%) !important;
    border: 1px solid rgb(175 175 175 / 23%) !important;
    padding: 40px;
}
 </style>
    <!--<section class="page-banner-wrap bg-cover" style="background-image: url('assets/img/page-banner.jpg')">-->
    <!--    <div class="container">-->
    <!--        <div class="row align-items-center">-->
    <!--            <div class="col-md-8">-->
    <!--                <div class="page-heading text-white">-->
    <!--                    <div class="sub-title">-->
    <!--                        <h4><strong>Our Mission:</strong> Food, Education, Medicine</h4>-->
    <!--                    </div>-->
    <!--                    <div class="page-title">-->
    <!--                        <h1>Contact Us</h1>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-4">-->
    <!--                <nav aria-label="breadcrumb">-->
    <!--                    <ol class="breadcrumb">-->
    <!--                      <li class="breadcrumb-item"><a href="index.html">Home</a></li>-->
    <!--                      <li class="breadcrumb-item active" aria-current="page">contact</li>-->
    <!--                    </ol>-->
    <!--                </nav>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <section class="contact-page-wrap section-padding pt-5">
        <div class="container">
            <!--<div class="row">-->
            <!--    <div class="col-lg-4 col-md-6 col-12">-->
            <!--        <div class="single-contact-card card1">-->
            <!--            <div class="top-part">-->
            <!--                <div class="icon">-->
            <!--                    <i class="fal fa-envelope"></i>-->
            <!--                </div>-->
            <!--                <div class="title">-->
            <!--                    <h4>Email Address</h4>-->
            <!--                    <span>Sent mail asap anytime</span>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="bottom-part">                            -->
            <!--                <div class="info">-->
            <!--                    <p>info@example.com</p>-->
            <!--                    <p>jobs@example.com</p>-->
            <!--                </div>-->
            <!--                <div class="icon">-->
            <!--                    <i class="fal fa-arrow-right"></i>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class="col-lg-4 col-md-6 col-12">-->
            <!--        <div class="single-contact-card card2">-->
            <!--            <div class="top-part">-->
            <!--                <div class="icon">-->
            <!--                    <i class="fal fa-phone"></i>-->
            <!--                </div>-->
            <!--                <div class="title">-->
            <!--                    <h4>Phone Number</h4>-->
            <!--                    <span>call us asap anytime</span>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="bottom-part">                            -->
            <!--                <div class="info">-->
            <!--                    <p>098-098-098-09</p>-->
            <!--                    <p>+(098) 098-098-765</p>-->
            <!--                </div>-->
            <!--                <div class="icon">-->
            <!--                    <i class="fal fa-arrow-right"></i>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class="col-lg-4 col-md-6 col-12">-->
            <!--        <div class="single-contact-card card3">-->
            <!--            <div class="top-part">-->
            <!--                <div class="icon">-->
            <!--                    <i class="fal fa-map-marker-alt"></i>-->
            <!--                </div>-->
            <!--                <div class="title">-->
            <!--                    <h4>Office Address</h4>-->
            <!--                    <span>Sent mail asap anytime</span>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="bottom-part">                            -->
            <!--                <div class="info">-->
            <!--                    <p>B2, Miranda City Tower</p>-->
            <!--                    <p>New York, US</p>-->
            <!--                </div>-->
            <!--                <div class="icon">-->
            <!--                    <i class="fal fa-arrow-right"></i>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <div class="row">
                 <div class="col-12 text-center mb-20">
                    <div class="section-title">
                        <p>Update Password</p>
                        <!--<h1>Register</h1>-->
                    </div>
                </div>
                <!--<div class="col-xl-6 col-md-10 col-lg-6 pl-xl-5 col-12 mt-5 mt-xl-0">-->
                <!--    <div class="about-thum">-->
                <!--        <div class="item top-image text-right">-->
                <!--            <img src="assets/img/about-big-thumb-1.jpg" alt="rrdevs">-->
                <!--        </div>-->
                <!--        <div class="item bottom-image">-->
                <!--            <img src="assets/img/about-big-thumb-2.jpg" alt="rrdevs">-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                 <div class="col-lg-6 pl-lg-5 col-12">
                    <span class="dot-circle"></span>
                    <div class="about-us-img" style="background-image: url('assets/img/case/4.jpg');background-repeat:no-repeat;background-size:cover;">
                    </div>
                    <span class="triangle-bottom-right"></span>
                </div>
                 <div class="col-lg-6 col-xl-6">
                     <div class="contact-form contact-forms">                                                        
                        <form onsubmit="return validate()" name="register_form" method="post" class="row conact-form">
                            <!--<div class="col-md-12">-->
                            <!--    <div class="single-personal-info">-->
                            <!--        <label for="fname">Full Name</label>-->
                            <!--        <input type="text" id="fname" placeholder="Enter Name">                                         -->
                            <!--    </div>-->
                            <!--</div>                            -->
                            <!--<div class="col-md-12">-->
                            <!--    <p class="text-danger ml-5" id="oldpass_error"></p>-->
                            <!--    <div class="single-personal-info">-->
                            <!--        <label for="email">Old Password</label>-->
                            <!--        <input type="password" id="old_password" name="old_password" placeholder="Enter Old Password">                                         -->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="oldpass_error"></p>
                                <div class="single-personal-info">
                                    <label for="phone">New Password</label>
                                    <input type="password" id="password" name="password" placeholder="Enter New Password">                                         
                                </div>
                            </div>  
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="passwords_error"></p>
                                <div class="single-personal-info">
                                    <label for="phone">Confirm Password</label>
                                    <input type="password" id="cpassword" name="cpassword" placeholder="Enter Conform Password">                                         
                                </div>
                            </div>  
                            <!-- <div class="col-md-12">-->
                            <!--    <div class="single-personal-info">-->
                            <!--        <label for="phone">Phone Number</label>-->
                            <!--        <input type="text" id="phone" placeholder="Enter Number">                                         -->
                            <!--    </div>-->
                            <!--</div>  -->
                            <!-- <div class="col-md-12">-->
                            <!--    <div class="single-personal-info">-->
                            <!--        <label for="phone">Phone Number</label>-->
                            <!--        <input type="text" id="phone" placeholder="Enter Number">                                         -->
                            <!--    </div>-->
                            <!--</div>  -->
                            <!--<div class="col-md-6 col-12">-->
                            <!--    <div class="single-personal-info">-->
                            <!--        <label for="subject">Subject</label>-->
                            <!--        <input type="text" id="subject" placeholder="Enter Subject">                                         -->
                            <!--    </div>-->
                            <!--</div>                                      -->
                            <!--<div class="col-md-12 col-12">-->
                            <!--    <div class="single-personal-info">-->
                            <!--        <label for="subject">Enter Message</label>-->
                            <!--        <textarea id="subject" placeholder="Enter message"></textarea>                                        -->
                            <!--    </div>-->
                            <!--</div>                                      -->
                            <div class="col-md-12 col-12 text-center">
                                <button type="submit" class="theme-btn" name="update_password">Submit <i class="fas fa-arrow-right"></i></button>
                            </div>                                      
                        </form>
                    </div>
                    <!--<div class="consultations-form style-2 bg-cover" style="background-image: url('assets/img/cs-form-bg.jpg')">-->
                    <!--    <p>let’s talk with us</p>-->
                    <!--    <h1>Free Consultations</h1>-->
                    <!--    <form action="#">-->
                    <!--        <input type="text" placeholder="Full Name Here">-->
                    <!--        <input type="email" placeholder="Email Address">-->
                    <!--        <textarea placeholder="Write Message"></textarea>-->
                    <!--        <button class="theme-btn" type="submit">Get Free Quote <i class="fas fa-arrow-right"></i></button>-->
                    <!--    </form>-->
                    <!--</div>-->
                </div>
                <!--<div class="col-12 col-lg-12">-->
                <!--    <div class="contact-map-wrap">-->
                <!--        <div id="map">-->
                <!--            <iframe src="../maps/embed.html?pb=!1m18!1m12!1m3!1d5457.875323165521!2d144.90402300269133!3d-37.792722838344716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sbd!4v1612018663424!5m2!1sen!2sbd" frameborder="0" style="border:0; width:100%" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>

            <!--<div class="row section-padding pb-0">-->
            <!--    <div class="col-12 text-center mb-20">-->
            <!--        <div class="section-title">-->
            <!--            <p>send us  message</p>-->
            <!--            <h1>Don’t Hesited To Contact Us <br> Say Hello or Message</h1>-->
            <!--        </div>-->
            <!--    </div>-->

            <!--    <div class="col-12 col-lg-12">-->
            <!--        <div class="contact-form">                                                        -->
            <!--            <form action="" class="row conact-form">-->
            <!--                <div class="col-md-6 col-12">-->
            <!--                    <div class="single-personal-info">-->
            <!--                        <label for="fname">Full Name</label>-->
            <!--                        <input type="text" id="fname" placeholder="Enter Name">                                         -->
            <!--                    </div>-->
            <!--                </div>                            -->
            <!--                <div class="col-md-6 col-12">-->
            <!--                    <div class="single-personal-info">-->
            <!--                        <label for="email">Email Address</label>-->
            <!--                        <input type="email" id="email" placeholder="Enter Email Address">                                         -->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-md-6 col-12">-->
            <!--                    <div class="single-personal-info">-->
            <!--                        <label for="phone">Phone Number</label>-->
            <!--                        <input type="text" id="phone" placeholder="Enter Number">                                         -->
            <!--                    </div>-->
            <!--                </div>                                      -->
            <!--                <div class="col-md-6 col-12">-->
            <!--                    <div class="single-personal-info">-->
            <!--                        <label for="subject">Subject</label>-->
            <!--                        <input type="text" id="subject" placeholder="Enter Subject">                                         -->
            <!--                    </div>-->
            <!--                </div>                                      -->
            <!--                <div class="col-md-12 col-12">-->
            <!--                    <div class="single-personal-info">-->
            <!--                        <label for="subject">Enter Message</label>-->
            <!--                        <textarea id="subject" placeholder="Enter message"></textarea>                                        -->
            <!--                    </div>-->
            <!--                </div>                                      -->
            <!--                <div class="col-md-12 col-12 text-center">-->
            <!--                    <button type="submit" class="theme-btn">send  message <i class="fas fa-arrow-right"></i></button>-->
            <!--                </div>                                      -->
            <!--            </form>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </section>
    
    <section class="cta-banner">
        <div class="container-fluid bg-cover section-bg" style="background-image: url('assets/img/cta_bg1.png')">
            <div class="cta-content">
                <div class="row align-items-center">
                    <div class="col-xl-7 text-white col-12 text-center text-xl-left">
                        <h1>Ready To Get Free Consulations For <br> Any Kind Of It Solutions ? </h1>
                    </div>
                    <div class="col-xl-5 col-12 text-center text-xl-right">
                        <a href="contact.html" class="theme-btn mt-4 mt-xl-0">Get a quote <i class="fas fa-arrow-right"></i></a>
                        <a href="services-details.html" class="ml-sm-3 mt-4 mt-xl-0 theme-btn minimal-btn">read more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <?php
    include_once('footer.php');
    ?>

<!--    <footer class="footer-2 footer-wrap">-->
<!--        <div class="footer-widgets">            -->
<!--            <div class="container">-->
<!--                <div class="row justify-content-between">-->
<!--                    <div class="col-md-6 col-xl-3 col-12 pr-xl-4">-->
<!--                        <div class="single-footer-wid site_footer_widget">-->
<!--                            <a href="index.html">-->
<!--                                <img src="assets/img/logo.png" alt="">-->
<!--                            </a>-->
<!--                            <p class="mt-4">Sed ut perspiciatis unde omnis natus voluptatem accusa ntiumy doloremque laudantium.omnis natus voluptatem accusa ntiumy doloremque laudantium</p>-->
<!--                            <div class="social-link mt-30">-->
<!--                                <a href="#"><i class="fab fa-facebook-f"></i></a>-->
<!--                                <a href="#"><i class="fab fa-twitter"></i></a>-->
<!--                                <a href="#"><i class="fab fa-behance"></i></a>-->
<!--                                <a href="#"><i class="fab fa-youtube"></i></a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div> <!-- /.col-lg-3 - single-footer-wid -->-->
<!--                    <div class="col-md-6 col-xl-2 col-12">                        -->
<!--                        <div class="single-footer-wid">-->
<!--                            <div class="wid-title">-->
<!--                                <h4>Company</h4>-->
<!--                            </div>-->
<!--                            <ul>-->
<!--                                <li><a href="about.html">About Us</a></li>-->
<!--                                <li><a href="about.html">Company History</a></li>-->
<!--                                <li><a href="contact.html">Need a Career</a></li>-->
<!--                                <li><a href="project-details.html">Working Process</a></li>-->
<!--                                <li><a href="news.html">Blog Post</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div> <!-- /.col-lg-3 - single-footer-wid -->-->
<!--                    <div class="col-md-6 col-xl-2 col-12">                        -->
<!--                        <div class="single-footer-wid">-->
<!--                            <div class="wid-title">-->
<!--                                <h4>Company</h4>-->
<!--                            </div>-->
<!--                            <ul>-->
<!--                                <li><a href="about.html">About Us</a></li>-->
<!--                                <li><a href="about.html">Company History</a></li>-->
<!--                                <li><a href="contact.html">Need a Career</a></li>-->
<!--                                <li><a href="project-details.html">Working Process</a></li>-->
<!--                                <li><a href="news.html">Blog Post</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div> <!-- /.col-lg-3 - single-footer-wid -->-->
<!--                    <div class="col-md-6 col-xl-3 col-12">-->
<!--                        <div class="single-footer-wid recent_post_widget">-->
<!--                            <div class="wid-title">-->
<!--                                <h4>News News</h4>-->
<!--                            </div>-->
<!--                            <div class="recent-post-list">-->
<!--                                <div class="single-recent-post">-->
<!--                                    <div class="thumb bg-cover" style="background-image: url('assets/img/blog/b1.jpg');"></div>-->
<!--                                    <div class="post-data">-->
<!--                                        <span><i class="fal fa-calendar-alt"></i>24th Nov 2020</span>-->
<!--                                        <h5><a href="news-details.html">User’s Perspes Using Story Structure</a></h5>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="single-recent-post">-->
<!--                                    <div class="thumb bg-cover" style="background-image: url('assets/img/blog/b2.jpg');"></div>-->
<!--                                    <div class="post-data">-->
<!--                                        <span><i class="fal fa-calendar-alt"></i>15th July 2021</span>-->
<!--                                        <h5><a href="news-details.html">Optimiz For Assistive Technology Users</a></h5>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div> <!-- /.col-lg-3 - single-footer-wid -->-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="footer-bottom">-->
<!--            <div class="container text-center">-->
<!--                <div class="footer-bottom-content">-->
<!--                    © 2021 Techex All Rights Reserved, Share By <a href="https://nullphpscript.com/category/html/">HTML Templates</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </footer>-->

    <!--  ALl JS Plugins
<!--    ====================================== -->-->
<!--    <script src="assets/js/jquery.min.js"></script>-->
<!--    <script src="assets/js/modernizr.min.js"></script>-->
<!--    <script src="assets/js/jquery.easing.js"></script>-->
<!--    <script src="assets/js/popper.min.js"></script>-->
<!--    <script src="assets/js/bootstrap.min.js"></script>-->
<!--    <script src="assets/js/isotope.pkgd.min.js"></script>-->
<!--    <script src="assets/js/imageload.min.js"></script>-->
<!--    <script src="assets/js/scrollUp.min.js"></script>-->
<!--    <script src="assets/js/owl.carousel.min.js"></script>-->
<!--    <script src="assets/js/magnific-popup.min.js"></script>-->
<!--    <script src="assets/js/waypoint.js"></script>-->
<!--    <script src="assets/js/easypiechart.min.js"></script>-->
<!--    <script src="assets/js/counterup.min.js"></script>-->
<!--    <script src="assets/js/wow.min.js"></script>-->
<!--    <script src="assets/js/metismenu.js"></script>-->
<!--    <script src="assets/js/timeline.min.js"></script>-->
<!--    <script src="assets/js/ajax-mail.js"></script>-->
<!--    <script src="assets/js/active.js"></script>-->
<!--</body>-->

<!--</html>-->

<script>
        function validate()
	    {
	        
	        var name=document.forms['register_form']['password'].value;
	        var name_pattern=/^[a-zA-Z\s]+$/;
	        
	        if(name !== "")
	        {
	            document.getElementById('oldpass_error').innerHTML='';
	        }
	        else
	        {
	            
	            document.getElementById('oldpass_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Enter Your Old Password...! ';
	            document.getElementById("password").focus();
	            return false;
	        }
	        
	        var password = document.forms['register_form']['cpassword'].value;
	        
	        if(password !== "")
	        {
	            document.getElementById('passwords_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('passwords_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Enter New Password ';
	            document.getElementById("cpassword").focus();
	            return false;
	        }
	        
	        
	        
	        
	    }
    </script>