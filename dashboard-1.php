<?php
include_once('header.php');


?>
<style>
    .nav {
        display: block !important;
    }
    .tab-content>.active {
    display: contents !important;
}
.nav-tabs .nav-link.active {
    border: none!important;
    background-color: transparent !important;
}
.nav-tabs .nav-link {
    border: none !important;
}
 .contact-forms{
    border-radius: 20px;
    box-shadow: 0 0 10px rgb(175 175 175 / 23%) !important;
    border: 1px solid rgb(175 175 175 / 23%) !important;
    padding: 40px;
}

</style>

 <section class="hero-slide-wrapper hero-1">
        <div class="hero-slider-active owl-carousel">
            <div class="single-slide bg-cover">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-xl-8 col-lg-10">
                            <div class="hero-contents">
                                <h2>Dashboard</h2>
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="slide-top-img d-none d-lg-block bg-overlay bg-cover" style="background-image: url('assets/img/home1/hero1.jpg')"></div>-->
                <!--<div class="slide-bottom-img d-none d-xl-block bg-overlay bg-cover" style="background-image: url('assets/img/home1/hero2.jpg')"></div>-->
            </div>
        </div>
    </section>

 <body>    
<div class="container mt-5 mb-5">
    <div class="row">
    <div class="col-4 wrap">
        <div class="table-design-box">
            <?php include_once('sidebar.php'); ?>
		                <!--<div class="table-padding nav nav-tabs no-borders justify-content-center" role="tablist">-->
		                <!--    <ul class="nav nav-tabs" role="tablist">-->
                  <!--            <li class="nav-item">-->
                  <!--              <a class="nav-link active text-center" href="#profile" role="tab" data-toggle="tab">Data Table</a>-->
                  <!--            </li>-->
                  <!--            <li class="nav-item">-->
                  <!--              <a class="nav-link text-center" href="#buzz" role="tab" data-toggle="tab">Profile</a>-->
                  <!--            </li>-->
                  <!--            <li class="nav-item">-->
                  <!--              <a class="nav-link text-center" href="#dash" role="tab" data-toggle="tab">Dashboard</a>-->
                  <!--            </li>-->
                  <!--            <li class="nav-item">-->
                  <!--               <a class="nav-link text-center" href="#booking" role="tab" data-toggle="tab">Booking</a>-->
                  <!--            </li>-->
                  <!--            <li class="nav-item">-->
                  <!--              <a class="nav-link text-center" href="#references" role="tab" data-toggle="tab">Change Password</a>-->
                  <!--            </li>-->
                  <!--          </ul>-->
		                    <!--<div class="nav-item">-->
    		                <!--    <p class="text-centers"><a class="nav-link no-borders active" href="#profile" role="tab" data-toggle="tab">Data Table</a></p>-->
    		                <!--</div>-->
    		                
    		                <!--<div class="nav-item">-->
    		                <!--  <p class="text-centers"><a class="nav-link" href="#profile_dashboard" role="tab" data-toggle="tab" style="min-width: 136px !important;">Profile</a></p>-->
    		                <!--</div>-->
    		                
    		                <!--<div class="nav-item">-->
    		                <!--  <p class="text-centers"><a class="nav-link" href="#buzz" role="tab" data-toggle="tab" style="min-width: 136px !important;">Change Password</a></p>-->
    		                <!--</div>-->
    		                
    		            <!--    <div class="nav-item">-->
    		            <!--      <a href="sign-up.php"><p class="text-centers p-0"><a class="nav-link" style="min-width: 136px !important;">Logout</a></p></a>-->
    		            <!--    </div>-->
    		                
    		            <!--</div>      -->
		            </div>
</div>
<div class="col-lg-8 col-sm-12 mt-5">
    <div class="tab-content">
          <div role="tabpanel" id="profile" class="tab-pane fade in active page-content" style="height:auto;">
    <div class="inner-box">
     <div class="dashboard-box">
         <h2 class="dashbord-title">Dasboard..</h2>
     </div>
<!--       <div class="dashboard-wrapper">-->
<!--            <table class="table table-responsive dashboardtable tablemyads">-->
<!--<thead>-->
<!--<tr>-->

<!--<th>S.No</th>-->
<!--<th>Checkout ID</th>-->
<!--<th>Date&amp;Time</th>-->
<!--<th>View Product</th>-->

<!--</tr>-->
<!--</thead>-->
<!--<tbody>-->
<!--</tbody>-->
<!--</table>-->
<!--       </div>-->
   </div>
</div>
          <!--<div role="tabpanel" id="dash" class="tab-pane fade">-->
          <!--    <p>Dashboard..</p>-->
          <!--</div>-->
          <!--<div role="tabpanel" id="references" class="tab-pane fade">-->
          <!--    <div class="col-12 text-center mb-20">-->
          <!--          <div class="section-title">-->
          <!--              <p>Change Password</p>-->
                        <!--<h1>Register</h1>-->
          <!--          </div>-->
          <!--      </div>-->
          <!--    <div class="contact-form contact-forms" id="forms">                                                        -->
          <!--              <form onsubmit="return validate()" name="register_form" class="row conact-form" method="POST" style="justify-content: end;">-->
                            <!--<div class="col-md-12">-->
                            <!--    <p class="text-danger ml-5" id="name_error"></p>-->
                            <!--    <div class="single-personal-info">-->
                            <!--        <label for="fname">Full Name</label>-->
                            <!--        <input type="text" id="fname" name="fname" placeholder="Enter Name">                                         -->
                            <!--    </div>-->
                            <!--</div>                            -->
                            <!--<div class="col-md-12">-->
                            <!--    <p class="text-danger ml-5" id="email_error"></p>-->
                            <!--    <div class="single-personal-info">-->
                            <!--        <label for="email">Email Address</label>-->
                            <!--        <input type="email" id="email" name="email" placeholder="Enter Email Address">                                         -->
                            <!--    </div>-->
                            <!--</div>-->
          <!--                  <div class="col-md-12">-->
          <!--                      <p class="text-danger ml-5" id="password_error"></p>-->
          <!--                      <div class="single-personal-info">-->
          <!--                          <label for="phone">New Password</label>-->
          <!--                          <input type="password" id="new_password" name="new_password" placeholder="Enter Password">                                         -->
          <!--                      </div>-->
          <!--                  </div>  -->
          <!--                  <div class="col-md-12">-->
          <!--                      <p class="text-danger ml-5" id="passwords_error"></p>-->
          <!--                      <div class="single-personal-info">-->
          <!--                          <label for="phone">Confirm Password</label>-->
          <!--                          <input type="password" id="cpassword" name="cpassword" placeholder="Enter Password">                                         -->
          <!--                      </div>-->
          <!--                  </div>  -->
                            <!-- <div class="col-md-12">-->
                            <!--     <p class="text-danger ml-5" id="contact_error"></p>-->
                            <!--    <div class="single-personal-info">-->
                            <!--        <label for="phone">Phone Number</label>-->
                            <!--        <input type="text" id="phone" name="phone" placeholder="Enter Number">                                         -->
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
          <!--                  <div class="col-md-12 col-12 text-center">-->
          <!--                      <a href="user-dashboard.php#forms"><button type="submit" class="theme-btn" name="Change_pass_submit" id="Change_pass_submit">send  message<i class="fas fa-arrow-right"></i></button></a>-->
          <!--                  </div>     -->
                            <!--<div class="text-right">-->
                            <!--    <a href="login.php">Back to Login?</a>-->
                            <!--</div>-->
          <!--              </form>-->
          <!--          </div>-->
          <!--</div>-->
          <!--<div role="tabpanel" id="buzz" class="tab-pane fade">-->
          <!--    <p>Profile..</p>-->
          <!--</div>-->
          <!--<div role="tabpanel" id="booking" class="tab-pane fade">-->
          <!--    <div class="col-12 text-center mb-20">-->
          <!--          <div class="section-title">-->
          <!--              <p>Booking Form</p>-->
                        <!--<h1>Register</h1>-->
          <!--          </div>-->
          <!--      </div>-->
          <!--    <div class="contact-form contact-forms">                                                        -->
          <!--              <form onsubmit="return validate()" name="register_form" class="row conact-form" method="POST" style="justify-content: end;">-->
          <!--                  <div class="col-md-12">-->
          <!--                      <p class="text-danger ml-5" id="name_error"></p>-->
          <!--                      <div class="single-personal-info">-->
          <!--                          <label for="fname">Product Name</label>-->
          <!--                          <input type="text" id="fname" name="fname" placeholder="Enter Product Name">                                         -->
          <!--                      </div>-->
          <!--                  </div>                            -->
          <!--                  <div class="col-md-6">-->
          <!--                      <p class="text-danger ml-5" id="email_error"></p>-->
          <!--                      <div class="single-personal-info">-->
          <!--                          <label for="email">Volume</label>-->
          <!--                          <input type="text" id="Volume" name="Volume" placeholder="Enter Volume">                                         -->
          <!--                      </div>-->
          <!--                  </div>-->
          <!--                  <div class="col-md-6">-->
          <!--                      <p class="text-danger ml-5" id="email_error"></p>-->
          <!--                      <div class="single-personal-info">-->
          <!--                          <label for="email">Weight</label>-->
          <!--                          <input type="text" id="Weight" name="Weight" placeholder="Enter Weight">                                         -->
          <!--                      </div>-->
          <!--                  </div>-->
          <!--                  <div class="col-md-6">-->
          <!--                      <p class="text-danger ml-5" id="password_error"></p>-->
          <!--                      <div class="single-personal-info">-->
          <!--                          <label for="phone">Height</label>-->
          <!--                          <input type="text" id="Height" name="Height" placeholder="Enter Height">                                         -->
          <!--                      </div>-->
          <!--                  </div> -->
          <!--                   <div class="col-md-6">-->
          <!--                      <p class="text-danger ml-5" id="password_error"></p>-->
          <!--                      <div class="single-personal-info">-->
          <!--                          <label for="phone">Width</label>-->
          <!--                          <input type="text" id="Weight" name="Weight" placeholder="Enter Weight">                                         -->
          <!--                      </div>-->
          <!--                  </div> -->
          <!--                  <div class="col-md-12">-->
          <!--                      <p class="text-danger ml-5" id="passwords_error"></p>-->
          <!--                      <div class="single-personal-info">-->
          <!--                          <label for="phone">Address</label>-->
          <!--                          <input type="text" id="cpassword" name="cpassword" placeholder="Enter Address">                                         -->
          <!--                      </div>-->
          <!--                  </div>  -->
          <!--                   <div class="col-md-12">-->
          <!--                       <p class="text-danger ml-5" id="contact_error"></p>-->
          <!--                      <div class="single-personal-info">-->
          <!--                          <label for="phone">Pincode</label>-->
          <!--                          <input type="text" id="phone" name="phone" placeholder="Enter Pincode">                                         -->
          <!--                      </div>-->
          <!--                  </div>  -->
          <!--                   <div class="col-md-12">-->
          <!--                      <div class="single-personal-info">-->
          <!--                          <label for="phone">Approcimate Prize</label>-->
          <!--                          <input type="text" id="phone" placeholder="Enter Approcimate Prize">                                         -->
          <!--                      </div>-->
          <!--                  </div>  -->
          <!--                  <div class="col-md-12">-->
          <!--                      <div class="single-personal-info">-->
          <!--                          <label for="subject">Receiver Name</label>-->
          <!--                          <input type="text" id="subject" placeholder="Enter Receiver Name">                                         -->
          <!--                      </div>-->
          <!--                  </div>                                      -->
          <!--                  <div class="col-md-12 col-12">-->
          <!--                      <div class="single-personal-info">-->
          <!--                          <label for="subject">Receiver Address</label>-->
          <!--                           <input type="text" id="subject" placeholder="Enter Receiver Address">                                     -->
          <!--                      </div>-->
          <!--                  </div> -->
          <!--                   <div class="col-md-12 col-12">-->
          <!--                      <div class="single-personal-info">-->
          <!--                          <label for="subject">Pincode</label>-->
          <!--                           <input type="text" id="subject" placeholder="Enter Pincode">                                     -->
          <!--                      </div>-->
          <!--                  </div> -->
          <!--                  <div class="col-md-12 col-12 text-center">-->
          <!--                      <button type="submit" class="theme-btn" name="registration_submit" id="registration_submit">send  message <i class="fas fa-arrow-right"></i></button>-->
          <!--                  </div>     -->
                            <!--<div class="text-right">-->
                            <!--    <a href="login.php">Back to Login?</a>-->
                            <!--</div>-->
          <!--              </form>-->
          <!--          </div>-->
          <!--</div>-->
    </div>
    
    
    </div>
</div>
</div>
<!-- Bootstrap CSS -->
<!-- jQuery first, then Bootstrap JS. -->
<!-- Nav tabs -->

<!--<ul class="nav nav-tabs" role="tablist">-->
<!--  <li class="nav-item">-->
<!--    <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">profile</a>-->
<!--  </li>-->
<!--  <li class="nav-item">-->
<!--    <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">buzz</a>-->
<!--  </li>-->
<!--  <li class="nav-item">-->
<!--    <a class="nav-link" href="#references" role="tab" data-toggle="tab">references</a>-->
<!--  </li>-->
<!--</ul>-->

<!-- Tab panes -->
<!--<div class="tab-content">-->
<!--  <div role="tabpanel" class="tab-pane fade in active" id="profile">...</div>-->
<!--  <div role="tabpanel" class="tab-pane fade" id="buzz">bbb</div>-->
<!--  <div role="tabpanel" class="tab-pane fade" id="references">ccc</div>-->
<!--</div>-->

</body>

</html>



 <?php
  include 'footer.php';
 ?> 
 
 <script>
     function validate()
	    {
	         var password = document.forms['register_form']['new_password'].value;
	        
	        if(password !=="")
	        {
	            document.getElementById('password_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('password_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Create Your Password ';
	            document.getElementById("new_password").focus();
	            return false;
	        }
	        
	        var password=document.forms['register_form']['new_password'].value;
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
	    }
 </script>
