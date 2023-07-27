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

if(isset($_REQUEST['update_booking_submit']))
{
    //geting all values
    $update_id=$_REQUEST['update_id'];
    $update_p_name=$_REQUEST['update_p_name'];
    $update_volume=$_REQUEST['update_volume'];
    $update_height=$_REQUEST['update_height'];
    $update_width=$_REQUEST['update_width'];
    $update_from_address=$_REQUEST['update_from_address'];
    $update_from_pincode=$_REQUEST['update_from_pincode'];
    $update_app_prize=$_REQUEST['update_app_prize'];
    $update_reciver_name=$_REQUEST['update_reciver_name'];
    $update_reciver_address=$_REQUEST['update_reciver_address'];
    $update_reciver_pincode=$_REQUEST['update_reciver_pincode'];
    
    $update_date = date("Y-m-d");
    
    // $update_booking="UPDATE user_booking set product_name='$update_p_name',volume='$update_volume',height='$update_height',width='$update_width',address='$update_from_address',pincode='$update_from_pincode',approximate_prize='$update_app_prize',
    // receiver_name='$update_reciver_name',receiver_address='$update_reciver_address',receiver_pincode='$update_reciver_pincode',update_date='$update_date' where id='$update_id' ";
        //  $insert_booking="insert into booking_from (user_id,username,volume_weight,height,width,from_address,from_pincode,amount,to_name,to_contact,to_address,to_pincode,status,createdAt,delete_status,updatedBy,customer_type) values ('$user_id','$product_name','$volume','$height','$width','$f_address','$f_pincode','$app_price','$r_name','$phone','$r_address','$r_pincode',0,'$date','0','Customer') ";
        $update_booking="update booking_from set username='$update_p_name',volume_weight='$update_volume',height='$update_height',width='$update_width',from_address='$update_from_address',from_pincode='$update_from_pincode',amount='$update_app_prize',to_name='$update_reciver_name',to_contact='$update_reciver_address',to_address='$update_reciver_address',to_pincode='$update_reciver_pincode',updatedAt='$update_date' where id='$update_id' ";
     $update_booking_sql=mysqli_query($conn,$update_booking);
    if($update_booking_sql)
    {
            echo "<script>swal({
   title: 'Thankyou',
                                  text: 'Booking Details Updated...',
                        type: 'success',
  timer: 1000,
  showConfirmButton: false
}, function(){
              window.location.href='data-table.php';
                        }) </script>";
                        } else{
               echo "<script>swal({
   title: 'Thankyou',
                                  text: 'Booking Details Update Failure',
                        type: 'danger',
  timer: 1000,
  showConfirmButton: false
}, function(){
              window.location.href='data-table.php';
                        }) </script>";
    }
}

if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
}else{
    $id="";
}

// $fet_details="select * from user_booking where id='$id'";
// $fet_details_sql=$conn->query($fet_details);
// $det=$fet_details_sql->fetch_assoc();

$fet_details="select * from booking_from where id='$id'";
$fet_details_sql=$conn->query($fet_details);
$det=$fet_details_sql->fetch_assoc();

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
               
            </div>
        </div>
    </section>

 <body>    
<div class="container mt-5 mb-5">
    <div class="row">
    <div class="col-4 wrap">
        <div class="table-design-box">
            <?php include_once('sidebar.php'); ?>
		               
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
                        <p>Edit Booking Details</p>
                        <!--<h1>Register</h1>-->
                    </div>
                </div>
              <div class="contact-form contact-forms">                                                        
                        <form onsubmit="return validate_booking()" name="register_form" class="row conact-form" method="POST" style="justify-content: end;">
                            <input type="hidden" id="update_id" name="update_id" value="<?=$det['id']?>">  
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="p_name_error"></p>
                                <div class="single-personal-info">
                                    <label for="p_name">Product Name</label>
                                    <input type="text" id="update_p_name" name="update_p_name" placeholder="Enter Product Name" value="<?=$det['username']?>">                                         
                                </div>
                            </div>                            
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="volume_error"></p>
                                <div class="single-personal-info">
                                    <label for="volume">Volume Weight</label>
                                    <input type="text" id="update_volume" name="update_volume" placeholder="Enter Volume weight" value="<?=$det['volume_weight']?>">                                         
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="text-danger ml-5" id="height_error"></p>
                                <div class="single-personal-info">
                                    <label for="height">Height</label>
                                    <input type="text" id="update_height" name="update_height" placeholder="Enter Height" value="<?=$det['height']?>">                                         
                                </div>
                            </div> 
                             <div class="col-md-6">
                                <p class="text-danger ml-5" id="width_error"></p>
                                <div class="single-personal-info">
                                    <label for="width">Width</label>
                                    <input type="text" id="update_width" name="update_width" placeholder="Enter Weight" value="<?=$det['width']?>">                                         
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="from_address_error"></p>
                                <div class="single-personal-info">
                                    <label for="from_address">Address</label>
                                    <textarea id="update_from_address" name="update_from_address" placeholder="Enter Address"><?=$det['from_address']?></textarea>
                                    <!--<input type="text" id="cpassword" name="cpassword" placeholder="Enter Address">                                         -->
                                </div>
                            </div>  
                             <div class="col-md-12">
                                 <p class="text-danger ml-5" id="from_pincode_error"></p>
                                <div class="single-personal-info">
                                    <label for="from_pincode">Pincode</label>
                                    <input type="text" id="update_from_pincode" name="update_from_pincode" maxlength="6" placeholder="Enter Pincode" value="<?=$det['from_pincode']?>">                                         
                                </div>
                            </div>  
                             <div class="col-md-12">
                                 <p class="text-danger ml-5" id="app_prize_error"></p>
                                <div class="single-personal-info">
                                    <label for="app_prize">Approximate Prize</label>
                                    <input type="text" id="update_app_prize" name="update_app_prize" placeholder="Enter Approximate Prize" value="<?=$det['amount']?>">                                         
                                </div>
                            </div>  
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="reciver_name_error"></p>
                                <div class="single-personal-info">
                                    <label for="reciver_name">Receiver Name</label>
                                    <input type="text" id="update_reciver_name" name="update_reciver_name" placeholder="Enter Receiver Name" value="<?=$det['to_name']?>">                                         
                                </div>
                            </div>                                      
                            <div class="col-md-12 col-12">
                                <p class="text-danger ml-5" id="reciver_address_error"></p>
                                <div class="single-personal-info">
                                    <label for="reciver_address">Receiver Address</label>
                                    <textarea id="update_reciver_address" name="update_reciver_address" placeholder="Enter Address"><?=$det['to_address']?></textarea>
                                     <!--<input type="text" id="subject" placeholder="Enter Receiver Address">                                     -->
                                </div>
                            </div> 
                             <div class="col-md-12 col-12">
                                 <p class="text-danger ml-5" id="reciver_pincode_error"></p>
                                <div class="single-personal-info">
                                    <label for="reciver_pincode">Receiver Pincode</label>
                                     <input type="text" id="update_reciver_pincode" name="update_reciver_pincode" maxlength="6" placeholder="Enter Pincode" value="<?=$det['to_pincode']?>">                                     
                                </div>
                            </div> 
                            <div class="col-md-12 col-12 text-center">
                                 <a href="data-table.php" class="theme-btn btn-btn-danger">Cancel</a>
                              <button type="submit" class="theme-btn" name="update_booking_submit" id="update_booking_submit">Update Booking <i class="fas fa-arrow-right"></i></button>
                            </div>     
                            
                        </form>
                    </div>
          </div>
     </div>

   </div>
</div>
         
    </div>
    
    
    </div>
</div>
</div>


</body>

</html>



 <?php
  include 'footer.php';
 ?> 
 
 <script>
     function validate_booking()
	    {
	       
	        
	        var from_pincode = document.forms['register_form']['update_from_pincode'].value;
	        var contact_pattern=/^\d{6}$/;
	        
	        if(from_pincode !=="")
	        {
	            document.getElementById('from_pincode_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('from_pincode_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Pincode is Required..! ';
	            document.getElementById("update_from_pincode").focus();
	            return false;
	        }
	        
	        if(isNaN(from_pincode))
	        {
	            document.getElementById('from_pincode_error').innerHTML='<span  style="color:rgb(70,171,200) !important;">*</span>Pincode should be Digits';
	            document.getElementById("update_from_pincode").focus();
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
	            document.getElementById("update_from_pincode").focus();
	            return false;
	        }
	        
	         var reciver_pincode = document.forms['register_form']['update_reciver_pincode'].value;
	        
	        if(reciver_pincode !=="")
	        {
	            document.getElementById('reciver_pincode_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('reciver_pincode_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Pincode is Required..! ';
	            document.getElementById("update_reciver_pincode").focus();
	            return false;
	        }
	        
	        if(isNaN(reciver_pincode))
	        {
	            document.getElementById('reciver_pincode_error').innerHTML='<span  style="color:rgb(70,171,200) !important;">*</span>Pincode should be Digits';
	            document.getElementById("update_reciver_pincode").focus();
	            return false;
	        }
	        else
	        {
	            document.getElementById('reciver_pincode_error').innerHTML='';
	        }
	        if(reciver_pincode.match(contact_pattern))
	        {
	            document.getElementById('reciver_pincode_error').innerHTML='';
	        }
	        else
	        {
	            document.getElementById('reciver_pincode_error').innerHTML='<span style="color:rgb(70,171,200) !important;">*</span>Pincode should be 6 digit';
	            document.getElementById("update_reciver_pincode").focus();
	            return false;
	        }
	        
	    }
 </script>
