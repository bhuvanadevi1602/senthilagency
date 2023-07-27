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


include('header.php');
if(isset($_REQUEST['booking_submit']))
{
    //generate booking Id 
    $gen_book_id="select id from user_booking order by id desc limit 1";
    $gen_book_id_sql=mysqli_query($conn,$gen_book_id);
    $fet=$gen_book_id_sql->fetch_assoc();
    $last_id=$fet['id']+1;
    $booking_id="Booking_Id_0".$last_id;
    
    //geting all values
    $product_name=$_REQUEST['p_name'];
    $consignee_name=$_REQUEST['c_name'];
   $volume=$_REQUEST['volume'];
    // $weight=$_REQUEST['weight'];
    $height=$_REQUEST['height'];
    $width=$_REQUEST['width'];
    $f_address=$_REQUEST['from_address'];
    $f_pincode=$_REQUEST['from_pincode'];
    $app_price=$_REQUEST['app_prize'];
    $r_name=$_REQUEST['reciver_name'];
    $r_address=$_REQUEST['reciver_address'];
    $r_pincode=$_REQUEST['reciver_pincode'];
    $phone=$_REQUEST['phone'];
    $user_id=$_REQUEST['user_id'];
    
    $date = date("Y-m-d");
    
    // $insert_booking="insert into user_booking (booking_id,user_id,product_name,volume,height,width,address,pincode,approximate_prize,receiver_name,receiver_mobile,receiver_address,receiver_pincode,status,date_only,delete_status) 
    // values ('$booking_id','$user_id','$product_name','$volume','$height','$width','$f_address','$f_pincode','$app_price','$r_name','$phone','$r_address','$r_pincode','Booked','$date','0') ";
    //   $insert_booking="insert into booking_from (user_id,username,consignee_name,branch,length,breadth,height,width,container,weight,amount,paid_viya,courier_mode,document_type,booking_mode,from_name,from_address,from_contact,from_pincode,customer_type,to_name,to_contact,to_address,to_pincode,status,createdAt,delete_status,booking_number,destination,volume_weight,risk_charge,product_id,product_value,from_cx_id,updated_by) values ('$user_id','$product_name','$consignee_name','$branch','$length','$breadth','$height','$width','$container','$volume','$amount','$paid_viya','$courier_mode','$document_type','$booking_mode','$name','$from_address','$from_contact','$from_pincode','party','$to_name','$to_contact','$to_address','$to_pincode',0,'$update_date','0','$booking_number','$destination','$vol_weight','$risk_charge','$product_id','$product_value','$cx','User') ";
      $insert_booking="insert into booking_from (user_id,username,consignee_name,volume_weight,height,width,from_address,from_pincode,amount,to_name,to_contact,to_address,to_pincode,status,createdAt,delete_status,updated_by,customer_type) values ('$user_id','$product_name','$consignee_name','$volume','$height','$width','$f_address','$f_pincode','$app_price','$r_name','$phone','$r_address','$r_pincode',0,'$date','0','User','Customer') ";
    //   print_r($insert_booking);die();
    $insert_booking_sql=mysqli_query($conn,$insert_booking);
    if($insert_booking_sql)
    {
      echo "<script>swal({
         title: 'Thankyou For Your Booking',
                                  text: 'Our Team will Contact You shortly...',
                                
                                                             type: 'success',
  timer: 1000,
  showConfirmButton: false
}, function(){
              window.location.href='data-table.php';
                        }) </script>";
      
    }else{
          echo "<script>swal({
              text: 'Booking Failed..!',
                              type: 'success',
  timer: 1000,
  showConfirmButton: false
}, function(){
              window.location.href='data-table.php';
                        }) </script>";
      
      
       echo "<script type='text/javascript'>
    
                         $(document).ready(function() {
                                  Swal.fire({
                                  icon: 'error',
                                  title: '',
                                  text: 'Booking Failed..!',
                                      
                                  });
                                });
    
                    </script>
                    ";
    }
}

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
    <div class="inner-boxs">
     <div class="dashboard-boxs">
         <div role="tabpanel" id="booking" class="tab-pane">
              <div class="col-12 text-center mb-20">
                    <div class="section-title">
                        <p>Booking Form</p>
                        <!--<h1>Register</h1>-->
                    </div>
                </div>
              <div class="contact-form contact-forms">                                                        
                        <form onsubmit="return validate_booking()" name="register_form" class="row conact-form" method="POST" style="justify-content: end;">
                            <input type="hidden" id="user_id" name="user_id" value="<?=$u_id?>">
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="p_name_error"></p>
                                <div class="single-personal-info">
                                    <label for="p_name">Product Name</label>
                                    <input type="text" id="p_name" name="p_name" placeholder="Enter Product Name">                                         
                                </div>
                            </div>    
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="p_name_error"></p>
                                <div class="single-personal-info">
                                    <label for="c_name">Consignee Name</label>
                                    <input type="text" id="c_name" name="c_name" placeholder="Enter Consignee Name">                                         
                                </div>
                            </div>    
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="volume_error"></p>
                                <div class="single-personal-info">
                                    <label for="volume">Volume Weight</label>
                                    <input type="text" id="volume" name="volume" placeholder="Enter Volume weight">                                         
                                </div>
                            </div>
                            <!--<div class="col-md-6">-->
                            <!--    <p class="text-danger ml-5" id="weight_error"></p>-->
                            <!--    <div class="single-personal-info">-->
                            <!--        <label for="weight">Weight</label>-->
                            <!--        <input type="text" id="weight" name="weight" placeholder="Enter Weight">                                         -->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-md-6">
                                <p class="text-danger ml-5" id="height_error"></p>
                                <div class="single-personal-info">
                                    <label for="height">Height</label>
                                    <input type="text" id="height" name="height" placeholder="Enter Height">                                         
                                </div>
                            </div> 
                             <div class="col-md-6">
                                <p class="text-danger ml-5" id="width_error"></p>
                                <div class="single-personal-info">
                                    <label for="width">Width</label>
                                    <input type="text" id="width" name="width" placeholder="Enter Weight">                                         
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="from_address_error"></p>
                                <div class="single-personal-info">
                                    <label for="from_address">Address</label>
                                    <textarea id="from_address" name="from_address" placeholder="Enter Address"></textarea>
                                    <!--<input type="text" id="cpassword" name="cpassword" placeholder="Enter Address">                                         -->
                                </div>
                            </div>  
                             <div class="col-md-12">
                                 <p class="text-danger ml-5" id="from_pincode_error"></p>
                                <div class="single-personal-info">
                                    <label for="from_pincode">Pincode</label>
                                    <input type="text" id="from_pincode" name="from_pincode" maxlength="6" placeholder="Enter Pincode">                                         
                                </div>
                            </div>  
                             <div class="col-md-12">
                                 <p class="text-danger ml-5" id="app_prize_error"></p>
                                <div class="single-personal-info">
                                    <label for="app_prize">Approximate Prize</label>
                                    <input type="text" id="app_prize" name="app_prize" placeholder="Enter Approximate Prize">                                         
                                </div>
                            </div>  
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="reciver_name_error"></p>
                                <div class="single-personal-info">
                                    <label for="reciver_name">Receiver Name</label>
                                    <input type="text" id="reciver_name" name="reciver_name" placeholder="Enter Receiver Name">                                         
                                </div>
                            </div> 
                            
                            <div class="col-md-12">
                                 <p class="text-danger ml-5" id="contact_error"></p>
                                <div class="single-personal-info">
                                    <label for="phone">Receiver Mobile Number</label>
                                    <input type="text" id="phone" name="phone" maxlength="10" placeholder="Enter Receiver Number">                                         
                                </div>
                            </div>  
                            
                            <div class="col-md-12 col-12">
                                <p class="text-danger ml-5" id="reciver_address_error"></p>
                                <div class="single-personal-info">
                                    <label for="reciver_address">Receiver Address</label>
                                    <textarea id="reciver_address" name="reciver_address" placeholder="Enter Address"></textarea>
                                     <!--<input type="text" id="subject" placeholder="Enter Receiver Address">                                     -->
                                </div>
                            </div> 
                             <div class="col-md-12 col-12">
                                 <p class="text-danger ml-5" id="reciver_pincode_error"></p>
                                <div class="single-personal-info">
                                    <label for="reciver_pincode">Receiver Pincode</label>
                                     <input type="text" id="reciver_pincode" name="reciver_pincode" maxlength="6" placeholder="Enter Pincode">                                     
                                </div>
                            </div> 
                            <div class="col-md-12 col-12 text-center">
                               <a href="data-table.php" class="theme-btn btn-btn-danger">Cancel</a>
                                 <button type="submit" class="theme-btn" name="booking_submit" id="booking_submit">Save <i class="fas fa-arrow-right"></i></button>
                            </div>     
                            <!--<div class="text-right">-->
                            <!--    <a href="login.php">Back to Login?</a>-->
                            <!--</div>-->
                        </form>
                    </div>
          </div>
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
     function validate_booking()
	    {
	         var p_name = document.forms['register_form']['p_name'].value;
	        
	        if(p_name !=="")
	        {
	            document.getElementById('p_name_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('p_name_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Product Name is Required..! ';
	            document.getElementById("p_name").focus();
	            return false;
	        }
	        
	        var volume = document.forms['register_form']['volume'].value;
	        
	        if(volume !=="")
	        {
	            document.getElementById('volume_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('volume_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Volume Weight is Required..! ';
	            document.getElementById("volume").focus();
	            return false;
	        }
	        
	       // var weight = document.forms['register_form']['weight'].value;
	        
	       // if(weight !=="")
	       // {
	       //     document.getElementById('weight_error').innerHTML='';
	       // }
	       // else
	       // {
	       //     document.getElementById('weight_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Weight is Required..! ';
	       //     document.getElementById("weight").focus();
	       //     return false;
	       // }
	        
	        var height = document.forms['register_form']['height'].value;
	        
	        if(height !=="")
	        {
	            document.getElementById('height_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('height_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Height is Required..! ';
	            document.getElementById("height").focus();
	            return false;
	        }
	        
	        var width = document.forms['register_form']['width'].value;
	        
	        if(width !=="")
	        {
	            document.getElementById('width_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('width_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Width is Required..! ';
	            document.getElementById("width").focus();
	            return false;
	        }
	        
	        var from_address = document.forms['register_form']['from_address'].value;
	        
	        if(from_address !=="")
	        {
	            document.getElementById('from_address_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('from_address_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Address is Required..! ';
	            document.getElementById("from_address").focus();
	            return false;
	        }
	        
	        var from_pincode = document.forms['register_form']['from_pincode'].value;
	        var contact_pattern_pincode=/^\d{6}$/;
	        
	        if(from_pincode !=="")
	        {
	            document.getElementById('from_pincode_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('from_pincode_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Pincode is Required..! ';
	            document.getElementById("from_pincode").focus();
	            return false;
	        }
	        
	        if(isNaN(from_pincode))
	        {
	            document.getElementById('from_pincode_error').innerHTML='<span  style="color:rgb(70,171,200) !important;">*</span>Pincode should be Digits';
	            document.getElementById("from_pincode").focus();
	            return false;
	        }
	        else
	        {
	            document.getElementById('from_pincode_error').innerHTML='';
	        }
	        if(from_pincode.match(contact_pattern))
	        {
	            document.getElementById('from_pincode_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('from_pincode_error').innerHTML='<span style="color:rgb(70,171,200) !important;">*</span>Pincode should be 6 digit';
	            document.getElementById("from_pincode").focus();
	            return false;
	        }
	        
	        var app_prize = document.forms['register_form']['app_prize'].value;
	        
	        if(app_prize !=="")
	        {
	            document.getElementById('app_prize_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('app_prize_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Give Approximate Prize..! ';
	            document.getElementById("app_prize").focus();
	            return false;
	        }
	        
	        var reciver_name = document.forms['register_form']['reciver_name'].value;
	        
	        if(reciver_name !=="")
	        {
	            document.getElementById('reciver_name_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('reciver_name_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Reciver Name is Required..! ';
	            document.getElementById("reciver_name").focus();
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
	        
	        var reciver_address = document.forms['register_form']['reciver_address'].value;
	        
	        if(reciver_address !=="")
	        {
	            document.getElementById('reciver_address_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('reciver_address_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Reciver Address is Required..! ';
	            document.getElementById("reciver_address").focus();
	            return false;
	        }
	        
	         var reciver_pincode = document.forms['register_form']['reciver_pincode'].value;
	        
	        if(reciver_pincode !=="")
	        {
	            document.getElementById('reciver_pincode_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('reciver_pincode_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Pincode is Required..! ';
	            document.getElementById("reciver_pincode").focus();
	            return false;
	        }
	        
	        if(isNaN(reciver_pincode))
	        {
	            document.getElementById('reciver_pincode_error').innerHTML='<span  style="color:rgb(70,171,200) !important;">*</span>Pincode should be Digits';
	            document.getElementById("reciver_pincode").focus();
	            return false;
	        }
	        else
	        {
	            document.getElementById('reciver_pincode_error').innerHTML='';
	        }
	        if(reciver_pincode.match(contact_pattern_pincode))
	        {
	            document.getElementById('reciver_pincode_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('reciver_pincode_error').innerHTML='<span style="color:rgb(70,171,200) !important;">*</span>Pincode should be 6 digit';
	            document.getElementById("reciver_pincode").focus();
	            return false;
	        }
	        
	    }
 </script>
