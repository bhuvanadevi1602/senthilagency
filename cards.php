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

if(isset($_REQUEST['bookingid']))
{
    $book_id=$_REQUEST['bookingid'];
}else{
    $book_id="";
}

// $sel_profile_det="select * from user_booking where id='$book_id' ";
// $sel_profile_det_sql=mysqli_query($conn,$sel_profile_det);
// $fet=$sel_profile_det_sql->fetch_assoc();


$sel_profile_det="select * from booking_from where id='$book_id' ";
$sel_profile_det_sql=mysqli_query($conn,$sel_profile_det);
$fet=$sel_profile_det_sql->fetch_assoc();
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
.card p{
    font-size: 15px;
    padding: 8px;
}
.is-complete svg {
    width: 17px;
    height: 17px;
    position: relative;
    bottom: 2px;
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
                        <p>Booking Details</p>
                        <!--<h1>Register</h1>-->
                    </div>
                    
                     <div class="container">
                        <div class="row">
						<div class="col-12 col-md-12 hh-grayBox pt45 pb20">
							<div class="row justify-content-between">
								<div id="myDIV" class="order-tracking"> <!-- completed -->
									<span class="is-complete"></span>
									<p>Booked<br><span><?php 
								// 	echo $fet['date_time']; 
									$val_009=str_split($fet['createdAt'],10);
									$date_only=$val_009[0];
									$explode=explode('-',$date_only);
									$implode=implode('-',$explode);
									echo $last_date=$explode[2]."-".$explode[1]."-".$explode[0];
									$sss=explode(' ',$fet['date_time']);
									echo "<br>";
									echo $sss[1];
									?></span></p>
								</div>
								<div id="in-transit" class="order-tracking">
									<span class="is-complete"></span>
									<p>In Transit<br><span id="trans_id"><?php if($fet['delivery_date'] !== ""){ echo $fet['delivery_date']; }else { echo ""; } ?></span></p>
								</div>
								<div id="rto" class="order-tracking">
									<span class="is-complete"></span>
									<p>RTO<br><span id="rto_id"><?php if($fet['delivery_date'] !== ""){ echo $fet['delivery_date']; }else { echo ""; } ?></span></p>
								</div>
								<div id="ofd" class="order-tracking">
									<span class="is-complete"></span>
									<p>Out Of Delivered<br><span id="ofd_id"><?php if($fet['delivery_date'] !== ""){ echo $fet['delivery_date']; }else { echo ""; } ?></span></p>
								</div>
								<div id="rd" class="order-tracking">
									<span class="is-complete"></span>
									<p>Reached Destination<br><span id="rd_id"><?php if($fet['delivery_date'] !== ""){ echo $fet['delivery_date']; }else { echo ""; } ?></span></p>
								</div>
								<div id="delivered" class="order-tracking">
									<span class="is-complete"></span>
									<p>Delivered<br><span id="delivered_id"><?php if($fet['delivery_date'] !== ""){ echo $fet['delivery_date']; }else { echo ""; } ?></span></p>
								</div>
								<div id="nd" class="order-tracking not-delivered">
								    <!--<i class="fa-solid fa-xmark"></i>-->
									<span class="is-complete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></span>
									<p>Not Delivered<br><span id="nd_id"><?php if($fet['delivery_date'] !== ""){ echo $fet['delivery_date']; }else { echo ""; } ?></span></p>
								</div>
							</div>
						</div>
					</div>
                     </div>
            <?php         
                   if($fet['status'] == 1)
                    {
                        echo "<script> 
                        var element_1 = document.getElementById('myDIV');
                        element_1.classList.add('completed');
                        var element_6 = document.getElementById('nd');
                        element_6.style.display = 'none';
                        </script>";
                    }else if($fet['In_transit'] == 1){
                        echo "<script> 
                        var element_1 = document.getElementById('myDIV');
                        element_1.classList.add('completed');
                        var element_2 = document.getElementById('in-transit');
                        element_2.classList.add('completed');
                        var element_6 = document.getElementById('nd');
                        element_6.style.display = 'none';

                        var element_001 = document.getElementById('rto_id');
                        element_001.style.display = 'none';
                        var element_002 = document.getElementById('ofd_id');
                        element_002.style.display = 'none';
                        var element_003 = document.getElementById('rd_id');
                        element_003.style.display = 'none';
                        var element_004 = document.getElementById('delivered_id');
                        element_004.style.display = 'none';

                        </script>";
                    }else if($fet['rto_status'] == 1){
                        echo "<script> 
                        var element_1 = document.getElementById('myDIV');
                        element_1.classList.add('completed');
                        var element_2 = document.getElementById('in-transit');
                        element_2.classList.add('completed');
                        var element_3 = document.getElementById('rto');
                        element_3.classList.add('completed');
                        var element_6 = document.getElementById('nd');
                        element_6.style.display = 'none';
                        
                        var element_002 = document.getElementById('ofd_id');
                        element_002.style.display = 'none';
                        var element_003 = document.getElementById('rd_id');
                        element_003.style.display = 'none';
                        var element_004 = document.getElementById('delivered_id');
                        element_004.style.display = 'none';
                        </script>";
                    }else if($fet['out_status'] == 1){
                        echo "<script> 
                        var element_1 = document.getElementById('myDIV');
                        element_1.classList.add('completed');
                        var element_2 = document.getElementById('in-transit');
                        element_2.classList.add('completed');
                        var element_3 = document.getElementById('rto');
                        element_3.classList.add('completed');
                        var element_4 = document.getElementById('ofd');
                        element_4.classList.add('completed');
                        var element_6 = document.getElementById('nd');
                        element_6.style.display = 'none';
                        
                        var element_003 = document.getElementById('rd_id');
                        element_003.style.display = 'none';
                        var element_004 = document.getElementById('delivered_id');
                        element_004.style.display = 'none';
                        
                        </script>";
                    }else if($fet['des_status'] == 1){
                        echo "<script> 
                        var element_1 = document.getElementById('myDIV');
                        element_1.classList.add('completed');
                        var element_2 = document.getElementById('in-transit');
                        element_2.classList.add('completed');
                        var element_3 = document.getElementById('rto');
                        element_3.classList.add('completed');
                        var element_4 = document.getElementById('ofd');
                        element_4.classList.add('completed');
                        var element = document.getElementById('rd');
                        element.classList.add('completed');
                        var element_6 = document.getElementById('nd');
                        element_6.style.display = 'none';
                        
                        var element_004 = document.getElementById('delivered_id');
                        element_004.style.display = 'none';
                        </script>";
                    }else if($fet['notdev_status'] == 1){
                        echo "<script> 
                        var element_1 = document.getElementById('myDIV');
                        element_1.classList.add('completed');
                        var element_2 = document.getElementById('in-transit');
                        element_2.classList.add('completed');
                        var element_3 = document.getElementById('rto');
                        element_3.classList.add('completed');
                        var element_4 = document.getElementById('ofd');
                        element_4.classList.add('completed');
                        var element = document.getElementById('rd');
                        element.classList.add('completed');
                        var element_5 = document.getElementById('delivered');
                        element_5.classList.add('completed');
                        var element_6 = document.getElementById('nd');
                        element_6.style.display = 'block';
                        </script>";
                    }
                    else{
                        // echo "<script> 
                        // var element_1 = document.getElementById('myDIV');
                        // element_1.classList.add('completed');
                        // var element_2 = document.getElementById('in-transit');
                        // element_2.classList.add('completed');
                        // var element_3 = document.getElementById('rto');
                        // element_3.classList.add('completed');
                        // var element_4 = document.getElementById('ofd');
                        // element_4.classList.add('completed');
                        // var element = document.getElementById('rd');
                        // element.classList.add('completed');
                        // var element_5 = document.getElementById('delivered');
                        // element_5.classList.add('completed');
                        // </script>";
                         echo "<script> 
                        var element_1 = document.getElementById('myDIV');
                        element_1.classList.add('completed');
                        var element_6 = document.getElementById('nd');
                        element_6.style.display = 'none';
                        </script>";
                    }
                    
                    ?>
                </div>
                
                <div class="container">
                    <div class="row">
                      <div class="col-lg-6">
                        <!--<p>Cards...</p>-->
                        <div class="card p-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="mb-1">Booking</p>
                                     <hr>
                                </div>
                            </div>
                           <div class="row mt-2">
                               <div class="col-lg-6">
                                   <p>Product Name</p>
                               </div>
                               <div class="col-lg-6">
                                   <p><?=$fet['username']?></p>
                               </div>
                               <div class="col-lg-6">
                                   <p>Volume Weight</p>
                               </div>
                               <div class="col-lg-6">
                                   <p><?=$fet['volume_weight']?></p>
                               </div>
                               <div class="col-lg-6">
                                   <p>Height</p>
                               </div>
                               <div class="col-lg-6">
                                   <p><?=$fet['height']?></p>
                               </div>
                               <div class="col-lg-6">
                                   <p>Width</p>
                               </div>
                               <div class="col-lg-6">
                                   <p><?=$fet['width']?></p>
                               </div>
                               <div class="col-lg-6">
                                   <p>Approximate Prize</p>
                               </div>
                               <div class="col-lg-6">
                                   <p><?=$fet['amount']?></p>
                               </div>
                               <!--<div class="col-lg-6">-->
                               <!--    <p>Invoice No</p>-->
                               <!--</div>-->
                               <!--<div class="col-lg-6">-->
                               <!--    <p>paid</p>-->
                               <!--</div>-->
                           </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="card p-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="mb-1">To</p>
                                     <hr>
                                </div>
                            </div>
                           <div class="row mt-2">
                               <div class="col-lg-5">
                                   <p>Name</p>
                               </div>
                               <div class="col-lg-7">
                                   <p><?=$fet['from_name']?></p>
                               </div>
                               <div class="col-lg-5">
                                   <p>Address</p>
                               </div>
                               <div class="col-lg-7">
                                   <p><?=$fet['from_address']?></p>
                               </div>
                               <!--<div class="col-lg-5">-->
                               <!--    <p>Contact No</p>-->
                               <!--</div>-->
                               <!--<div class="col-lg-7">-->
                               <!--    <p><?//=$fet['receiver_pincode']?></p>-->
                               <!--</div>-->
                               
                               <div class="col-lg-5">
                                   <p>Pincode</p>
                               </div>
                               <div class="col-lg-7">
                                   <p><?=$fet['from_pincode']?></p>
                               </div>
                               
                               <div class="col-lg-5">
                                   <p>Contact No</p>
                               </div>
                               <div class="col-lg-7">
                                   <p><?=$fet['from_contact']?></p>
                               </div>
                               
                           </div>
                        </div>
                        <div class="card p-3 mt-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="mb-1">From</p>
                                     <hr>
                                </div>
                            </div>
                           <div class="row mt-2">
                               <div class="col-lg-5">
                                   <p>Name</p>
                               </div>
                               <div class="col-lg-7">
                                   <p><?=$name?></p>
                               </div>
                               <div class="col-lg-5">
                                   <p>Address</p>
                               </div>
                               <div class="col-lg-7">
                                   <p><?=$fet['to_address']?></p>
                               </div>
                               
                                <div class="col-lg-5">
                                   <p>Pincode</p>
                               </div>
                               <div class="col-lg-7">
                                   <p><?=$fet['to_pincode']?></p>
                               </div>
                               
                               <div class="col-lg-5">
                                   <p>Contact No</p>
                               </div>
                               <div class="col-lg-7">
                                  <p><?=$fet['to_contact']?></p>
                              
                               </div>
                               
                           </div>
                        </div>
                      </div>
                      <!--<div class="offset-lg-6 col-lg-6">-->
                       
                      <!--  <div class="card p-3">-->
                      <!--      <div class="row">-->
                      <!--          <div class="col-lg-12">-->
                      <!--              <p class="mb-1">From</p>-->
                      <!--               <hr>-->
                      <!--          </div>-->
                      <!--      </div>-->
                      <!--     <div class="row mt-2">-->
                      <!--         <div class="col-lg-5">-->
                      <!--             <p>Name</p>-->
                      <!--         </div>-->
                      <!--         <div class="col-lg-7">-->
                      <!--             <p>CHANDRA MOHAN</p>-->
                      <!--         </div>-->
                      <!--         <div class="col-lg-5">-->
                      <!--             <p>Address</p>-->
                      <!--         </div>-->
                      <!--         <div class="col-lg-7">-->
                      <!--             <p>MAS</p>-->
                      <!--         </div>-->
                      <!--         <div class="col-lg-5">-->
                      <!--             <p>Contact No</p>-->
                      <!--         </div>-->
                      <!--         <div class="col-lg-7">-->
                      <!--             <p>9940599316</p>-->
                      <!--         </div>-->
                               
                      <!--     </div>-->
                      <!--  </div>-->
                      <!--</div>-->
                    </div>  
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


</body>

</html>



 <?php
  include 'footer.php';
 ?> 
 