<?php
  include 'header.php';
?>



<style>
 
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap');


.navigation {
  position: absolute;
    top: 20px;
  right: 20px;
  width: 120px;
  height: 60px;
  display: flex;
  justify-content: space-between;
  border-radius: 5px;
  background: var(--white);
  box-shadow: 0 25px 35px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transition: height 0.5s, width 0.5s;
  transition-delay: 0s, 0.75s;
}

.navigation .user-box {
  position: relative;
  width: 60px;
  height: 60px;
  display: flex;
  align-items: center;
  overflow: hidden;
  transition: 0.5s;
  transition-delay: 0.5s;
}

.navigation .user-box .username {
  font-size: 1.2rem;
  white-space: nowrap;
  color: var(--gray);
}

.navigation .user-box .image-box {
  position: relative;
  min-width: 60px;
  height: 60px;
  background: var(--white);
  border-radius: 50%;
  overflow: hidden;
  border: 10px solid var(--white);

}

.navigation .user-box .image-box img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.navigation .menu-toggle {
  position: relative;
  width: 60px;
  height: 60px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}

.navigation .menu-toggle::before {
  content: "";
  position: absolute;
  width: 32px;
  height: 2px;
  background: var(--gray);
  transform: translateY(-10px);
  box-shadow: 0 10px var(--gray);
  transition: 0.5s;
}

.navigation .menu-toggle::after {
  content: "";
  position: absolute;
  width: 32px;
  height: 2px;
  background: var(--gray);
  transform: translateY(10px);
  transition: 0.5s;
}

.menu {
  position: absolute;
  width: 100%;
  height: calc(100% - 60px);
  margin-top: 60px;
  padding: 20px;
  border-top: 1px solid rgba(0, 0, 0, 0.1);
}

.menu li {
  list-style: none;
}

.menu li a {
  display: flex;
  align-items: center;
  gap: 10px;
  margin: 20px 0;
  font-size: 1rem;
  text-decoration: none;
  color: var(--gray);
}

.menu li a ion-icon {
  font-size: 1.5rem;
}

.menu li a:hover {
  color: var(--purple);
}

.navigation.active .menu-toggle::before {
  transform: translateY(0px) rotate(45deg);
  box-shadow: none;
}

.navigation.active .menu-toggle::after {
  transform: translateY(0px) rotate(-45deg);
}

.navigation.active {
  width: 300px;
  height: 350px;
  transition: width 0.5s, height 0.5s;
  transition-delay: 0s, 0.75s;
}

.navigation.active .user-box {
  width: calc(100% - 60px);
  transition-delay: 0s;
}


.table-design-box {
    /* border: 1px solid white; */
    padding: 10px;
    box-shadow: 0 10px 50px 0px rgb(99 119 238 / 20%);
    background-color: rgba(103,117,214,0.0);
    border-radius: 20px;
    /* height: 200px; */
}

.navs {
    display: block !important;
}
.no-borders {
    font-family: 'Poppins', sans-serif !important;
    border: none !important;
    border-top-left-radius: 22px !important;
    border-top-right-radius: 22px !important;
}
.table-padding {
    border-radius: 20px;
    /* padding: 10px; */
    background-color: #f3f8ff !important;
}
.nav-tabs .nav-item {
    margin-bottom: -1px;
}
.table-padding p {
    padding: 15px;
}
.text-centers {
    text-align: -webkit-center;
}
.no-active .nav-link.active {
    background-color: transparent !important;
}

.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #495057;
    background-color: #fff;
    border-color: #ddd #ddd #fff;
}
.nav-tabs .nav-link {
    border-radius: 20px;
}

.footer-2::before {
    position: absolute;
    width: 100%;
    height: 140px;
    bottom: 0 !important;
}

.inner-box {
    box-shadow: 0 0 10px rgb(175 175 175 / 23%);
}

.dashboard-box {
    width: 100%;
    display: inline-block;
    padding: 10px;
    border-bottom: 1px solid #eaedef;
}
.dashboard-box .dashbord-title {
    margin: 0;
    float: left;
    color: #363b4d;
    font-size: 20px;
    font-weight: 500;
    line-height: 20px;
   padding: 15px 0 15px 12px;
}

.dashboard-wrapper {
    padding: 10px 15px;
}
h2 {
  
    letter-spacing: 0px;
}

.owl-stage-outer{
    height:300px !important;
}

.dashboardtable thead tr th {
    color: #333;
    font-size: 14px;
    font-weight: 700;
    line-height: 20px;
    text-align: left;
      padding: 13px 58px;
    background: 0 0;
    vertical-align: middle;
    border-bottom: none;
}

 @media (max-width: 992px) {
.header-btn-cta{
    display:none;
}
.mobile-nav-wrap{
     display:none;
}
.wrap{
        display: contents;
        padding-top:100px;
           
}
.table-design-box{
        width: -webkit-fill-available;
}
}

@media (max-width: 1200px){
header.header-2 .main-header-wraper {
    padding: 28px;
}
}
</style>

 
    

 <?php
//   include 'header.php';
  
  if(isset($_REQUEST['registration_submit']))
  {
     $name=$_REQUEST['fname'];
     $email=$_REQUEST['email'];
     $password=base64_encode($_REQUEST['password']);
     $mobile_no=$_REQUEST['phone'];
     
     $query = "INSERT INTO user_login (name,email,password,mobile,active_status)VALUES ('$name', '$email', '$password','$mobile_no','1')";
     $query_sql=mysqli_query($conn,$query);
     $last_ins_id=$conn->insert_id;
     if($last_ins_id)
     {
           $select_query="select * from user_login where id='$last_ins_id'";
           $select_query_sql=mysqli_query($conn,$select_query);
        $rec_001= $select_query_sql->fetch_assoc();
        $_SESSION['id']=$rec_001['id'];
        $_SESSION['name']=$rec_001['name'];
        $_SESSION['email']=$rec_001['email'];
         
         echo "<script type='text/javascript'>
    
                         $(document).ready(function() {
                                  Swal.fire({
                                  icon: 'success',
                                  title: '',
                                  text: 'Registration successful....!',
                                      
                                  }).then(function(){
                                    window.location.href='data-table.php';
                                  });
                                });
    
                    </script>
                    ";
     }else{
          echo "<script type='text/javascript'>
    
                         $(document).ready(function() {
                                  Swal.fire({
                                  icon: 'error',
                                  title: '',
                                  text: 'Register Failed..!',
                                      
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

    <section class="contact-page-wrap section-padding pt-5">
        <div class="container">
      

            <div class="row">
                 <div class="col-12 text-center mb-20">
                    <div class="section-title">
                        <p>Register</p>
                        <!--<h1>Register</h1>-->
                    </div>
                </div>
                <div class="col-xl-6 col-md-10 col-lg-6 pl-xl-5 col-12 mt-5 mt-xl-0">
                    <div class="about-thum">
                        <div class="item top-image text-right">
                            <img src="assets/img/about-big-thumb-1.jpg" alt="rrdevs">
                        </div>
                        <div class="item bottom-image">
                            <img src="assets/img/about-big-thumb-2.jpg" alt="rrdevs">
                        </div>
                    </div>
                </div>
                 <div class="col-lg-6 col-xl-6">
                     <div class="contact-form contact-forms">                                                        
                        <form onsubmit="return validate()" name="register_form" class="row conact-form" method="POST" style="justify-content: end;">
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="name_error"></p>
                                <div class="single-personal-info">
                                    <label for="fname">Full Name</label>
                                    <input type="text" id="fname" name="fname" placeholder="Enter Name">                                         
                                </div>
                            </div>                            
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="email_error"></p>
                                <div class="single-personal-info">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" placeholder="Enter Email Address">                                         
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="password_error"></p>
                                <div class="single-personal-info">
                                    <label for="phone">Password</label>
                                    <input type="password" id="password" name="password" placeholder="Enter Password">                                         
                                </div>
                            </div>  
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="passwords_error"></p>
                                <div class="single-personal-info">
                                    <label for="phone">Confirm Password</label>
                                    <input type="password" id="cpassword" name="cpassword" placeholder="Enter Password">                                         
                                </div>
                            </div>  
                             <div class="col-md-12">
                                 <p class="text-danger ml-5" id="contact_error"></p>
                                <div class="single-personal-info">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" id="phone" name="phone" placeholder="Enter Number">                                         
                                </div>
                            </div>  
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
                                <button type="submit" class="theme-btn" name="registration_submit" id="registration_submit">send  message <i class="fas fa-arrow-right"></i></button>
                            </div>     
                            <div class="text-right">
                                <a href="login.php">Back to Login?</a>
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
    
    <!--<section class="cta-banner">-->
    <!--    <div class="container-fluid bg-cover section-bg" style="background-image: url('assets/img/cta_bg1.png')">-->
    <!--        <div class="cta-content">-->
    <!--            <div class="row align-items-center">-->
    <!--                <div class="col-xl-7 text-white col-12 text-center text-xl-left">-->
    <!--                    <h1>Ready To Get Free Consulations For <br> Any Kind Of It Solutions ? </h1>-->
    <!--                </div>-->
    <!--                <div class="col-xl-5 col-12 text-center text-xl-right">-->
    <!--                    <a href="contact.html" class="theme-btn mt-4 mt-xl-0">Get a quote <i class="fas fa-arrow-right"></i></a>-->
    <!--                    <a href="services-details.html" class="ml-sm-3 mt-4 mt-xl-0 theme-btn minimal-btn">read more <i class="fas fa-arrow-right"></i></a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section> -->

    <?php
    include('footer.php');
    ?>

<script>
        function validate()
	    {
	        var name=document.forms['register_form']['fname'].value;
	        var name_pattern=/^[a-zA-Z\s]+$/;
	        
	        if(name_pattern.test(name))
	        {
	            document.getElementById('name_error').innerHTML='';
	        }
	        else
	        {
	            
	            document.getElementById('name_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Name should contain only alphabets ';
	            document.getElementById("fname").focus();
	            return false;
	        }
	        
	        var email=document.forms['register_form']['email'].value;
	        var email_pattern=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	        
	        if(email_pattern.test(email))
	        {
	            document.getElementById('email_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('email_error').innerHTML='<span  style="color:rgb(70,171,200) !important;">*</span>Leave valid email address';
	            document.getElementById("email").focus();
	            return false;
	        }
	        
	        var password = document.forms['register_form']['password'].value;
	        
	        if(password !=="")
	        {
	            document.getElementById('password_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('password_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Create Your Password ';
	            document.getElementById("password").focus();
	            return false;
	        }
	        
	        var password=document.forms['register_form']['password'].value;
	        var confirm_password=document.forms['register_form']['cpassword'].value;
	        
	        if(password==confirm_password)
	        {
	            
	            document.getElementById('passwords_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('passwords_error').innerHTML='<span  style="color:rgb(70,171,200) !important;">*</span>Password and confirm password should be same';
	            document.getElementById("cpassword").focus();
	            return false;
	        }
	        
	        var contact=document.forms['register_form']['phone'].value;
	        var contact_pattern=/^\d{10}$/;
	        
	        if(isNaN(contact))
	        {
	            document.getElementById('contact_error').innerHTML='<span  style="color:rgb(70,171,200) !important;">*</span>Mobile number should be Digits';
	            document.getElementById("phone").focus();
	            return false;
	        }
	        else
	        {
	            document.getElementById('contact_error').innerHTML='';
	        }
	        if(contact.match(contact_pattern))
	        {
	            document.getElementById('contact_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('contact_error').innerHTML='<span style="color:rgb(70,171,200) !important;">*</span>Mobile number should be 10 digit';
	            document.getElementById("phone").focus();
	            return false;
	        }
	        
	        
	    }
    </script>