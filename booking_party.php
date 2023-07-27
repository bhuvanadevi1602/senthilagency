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
     $username=$_SESSION['username'];
      $role=$_SESSION['role'];
}

if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
}else{
    $id="";
}


$fet_details="select * from booking_from where id='$id'";
$fet_details_sql=$conn->query($fet_details);
$det=$fet_details_sql->fetch_assoc();
$cx=$det['from_cx_id'];

include_once('header.php');

if(isset($_REQUEST['update_booking_submit']))
{
    //geting all values
  
 if($id!=""){
     
    $product_name=$_POST['product_name'];
  $consignee_name=$_POST['consignee_name'];
  $branch=$_POST['branch'];
  $length=$_POST['length'];
 $breadth=$_POST['breadth'];
   $height=$_POST['height'];
  $width=$_POST['width'];
   $container=$_POST['container'];
  $volume=$_POST['volume'];
  $amount=$_POST['amount'];
   $paid_viya=$_POST['paid_viya'];
 $courier_mode=$_POST['courier_mode'];
  $document_type=$_POST['document_type'];
   $booking_mode=$_POST['booking_mode'];
 
  $from_name=$_POST['from_name'];
  $from_address=$_POST['from_address'];
  $from_contact=$_POST['from_contact'];
   $from_pincode=$_POST['from_pincode'];
   $amount=$_POST['amount'];
   $to_name=$_POST['to_name'];
   $to_contact=$_POST['to_contact'];
 $to_address=$_POST['to_address'];
  $to_pincode=$_POST['to_pincode'];
   $booking_number=$_POST['booking_number']; 
   $destination=$_POST['destination'];
  $update_date = date("Y-m-d");
  $vol_weight=$_POST['vol_weight'];
  $risk_charge=$_POST['risk_charge'];
  $product_id=$_POST['product_id'];
  $product_value=$_POST['product_value'];
  
    $update_date = date("Y-m-d");
    
    $update_booking="UPDATE booking_from set username='$product_name',consignee_name='$consignee_name',branch='$branch',length='$length',breadth='$breadth',width='$width',height='$height',container='$container',volume_weight='$volume',amount='$amount',paid_viya='$paid_viya',courier_mode='$courier_mode',document_type='$document_type',booking_mode='$booking_mode',from_address='$from_address',from_contact='$from_contact',from_pincode='$from_pincode',to_name='$to_name',to_address='$to_address',to_pincode='$to_pincode',to_contact='$to_contact',booking_number='$booking_number',destination='$destination',updatedAt='$update_date',risk_charge='$risk_charge',product_id='$product_id',product_value='$product_value' where id='$id' ";
    // print_r($update_booking);die();
    $update_booking_sql=mysqli_query($conn,$update_booking);
  
    $update_booking="UPDATE base set username='$product_name',consignee_name='$consignee_name',branch='$branch',length='$length',breadth='$breadth',height='$height',container='$container',volume_weight='$volume',total='$amount',paid_viya='$paid_viya',courier_mode='$courier_mode',document_type='$document_type',booking_mode='$booking_mode',from_address='$from_address',from_contact='$from_contact',from_pincode='$from_pincode',to_name='$to_name',to_address='$to_address',to_pincode='$to_pincode',to_contact='$to_contact',booking_number='$booking_number',destination='$destination',updatedAt='$update_date',risk_charge='$risk_charge',product_value='$product_value' where consignee_name='$consignee_name' ";
    // print_r($update_booking);die();
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
                                   text: 'Update Failed..!',
                               
                                                             type: 'danger',
  timer: 1000,
  showConfirmButton: false
}, function(){
              window.location.href='data-table.php';
                        }) </script>";
      
    }
 }
 else{
    //  $sqlbook="select * from booking_from order by id desc limit 1";
    //  $exebook=mysqli_query($con,$sqlbook);
    //  $bookval=mysqli_fetch_assoc($exebook);
     
    //  $booking_id="Booking_P_Id";
    //  $books_id=$bookval['id']+1;
    //  $book_id=$booking_id.$books_id;
    
  $user_id=$u_id;

  $product_name=$_POST['product_name'];
  $consignee_name=$_POST['consignee_name'];
  $branch=$_POST['branch'];
  $length=$_POST['length'];
 $breadth=$_POST['breadth'];
   $height=$_POST['height'];
  $width=$_POST['width'];
   $container=$_POST['container'];
  $volume=$_POST['volume'];
  $amount=$_POST['amount'];
   $paid_viya=$_POST['paid_viya'];
 $courier_mode=$_POST['courier_mode'];
  $document_type=$_POST['document_type'];
   $booking_mode=$_POST['booking_mode'];
 
  $from_name=$_POST['from_name'];
  $from_address=$_POST['from_address'];
  $from_contact=$_POST['from_contact'];
   $from_pincode=$_POST['from_pincode'];
   $amount=$_POST['amount'];
   $to_name=$_POST['to_name'];
   $to_contact=$_POST['to_contact'];
 $to_address=$_POST['to_address'];
  $to_pincode=$_POST['to_pincode'];
   $booking_number=$_POST['booking_number']; 
   $destination=$_POST['destination'];
  $update_date = date("Y-m-d");
  $vol_weight=$_POST['vol_weight'];
  $risk_charge=$_POST['risk_charge'];
  $product_id=$_POST['product_id'];
  $product_value=$_POST['product_value'];
  $month_name=date('Y-m');
  
      $insert_booking="insert into booking_from (user_id,username,consignee_name,branch,length,breadth,height,width,container,weight,amount,paid_viya,courier_mode,document_type,booking_mode,from_name,from_address,from_contact,from_pincode,customer_type,to_name,to_contact,to_address,to_pincode,status,createdAt,delete_status,booking_number,destination,volume_weight,risk_charge,product_id,product_value,from_cx_id,updated_by) values ('$user_id','$product_name','$consignee_name','$branch','$length','$breadth','$height','$width','$container','$volume','$amount','$paid_viya','$courier_mode','$document_type','$booking_mode','$name','$from_address','$from_contact','$from_pincode','Company','$to_name','$to_contact','$to_address','$to_pincode',0,'$update_date','0','$booking_number','$destination','$vol_weight','$risk_charge','$product_id','$product_value','$cx','User') ";
    $insert_booking_sql=mysqli_query($conn,$insert_booking);


      $insert_booking="insert into base (user_id,username,consignee_name,length,breadth,height,container,weight,total,paid_viya,courier_mode,document_type,booking_mode,from_name,from_address,from_contact,from_pincode,customer_type,to_name,to_contact,to_address,to_pincode,status,createdAt,booking_number,destination,volume_weight,risk_charge,product_value,from_cx_id,updated_by,month_name) values ('$user_id','$product_name','$consignee_name','$length','$breadth','$height','$container','$volume','$amount','$paid_viya','$courier_mode','$document_type','$booking_mode','$name','$from_address','$from_contact','$from_pincode','Company','$to_name','$to_contact','$to_address','$to_pincode',0,'$update_date','$booking_number','$destination','$vol_weight','$risk_charge','$product_value','$cx','User','$month_name') ";
    $insert_booking_sql=mysqli_query($conn,$insert_booking);


//  print_r($insert_booking);die();
    if($insert_booking_sql)
    {
        echo "<script>swal({
        title: 'Thank you For Your Booking',
   text: 'Our Team will Contact You shortly...',
                                 type: 'success',
  timer: 1000,
  showConfirmButton: false
}, function(){
              window.location.href='data-table.php';
                        }) </script>";
    } else{
         echo "<script>swal({
        title: 'Thank you For Your Booking',
      text: 'Booking Failed..!',
                                                             type: 'danger',
  timer: 1000,
  showConfirmButton: false
}, function(){
             window.location.href='data-table.php';
                        }) </script>";
    }
 }
}

?>
<style>

select {
    width: 100%;
    background: #f8f8f8;
    line-height: 1;
    padding: 25px 30px;
    border: 0px;
    border-radius: 7px;
}
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
                                <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="p_name">Product Name</label>
                                    <input type="text" id="product_name" name="product_name" placeholder="Enter Product Name" value="<?=isset($det['username'])?$det['username']:""?>">                                         
                                </div>
                            </div>       
                              <div class="col-md-12">
                                <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="p_name">Consignee Name</label>
                                    <input type="text" id="consignee_name" name="consignee_name" placeholder="Enter Consignee Name" value="<?=isset($det['consignee_name'])?$det['consignee_name']:""?>">                                         
                                </div>
                            </div>  
                             <div class="col-md-6">
                                <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="p_name">Branch</label>
                                    <input type="text" id="branch" name="branch" placeholder="Enter Branch" value="<?=isset($det['branch'])?$det['branch']:""?>">                                         
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <p class="text-danger ml-5" id="volume_error"></p>
                                <div class="single-personal-info">
                                    <label for="volume">Length</label>
                                    <input type="text" id="length" name="length" placeholder="Enter Length" value="<?=isset($det['length'])?$det['length']:""?>">                                         
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="width">Breadth</label>
                                    <input type="text" id="breadth" name="breadth" placeholder="Enter Breadth" value="<?=isset($det['breadth'])?$det['breadth']:""?>">                                         
                                </div>
                            </div>   
                          <div class="col-md-6">
                                <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="height">Height</label>
                                    <input type="text" id="height" name="height" placeholder="Enter Height" value="<?=isset($det['height'])?$det['height']:""?>">                                         
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="height">Width</label>
                                    <input type="text" id="width" name="width" placeholder="Enter Width" value="<?=isset($det['width'])?$det['width']:""?>">                                         
                                </div>
                            </div> 
                               <div class="col-md-6">
                                <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="height">Container</label>
                                    <input type="text" id="container" name="container" placeholder="Enter Container" value="<?=isset($det['container'])?$det['container']:""?>">                                         
                                </div>
                            </div> 
                        <div class="col-md-6">
                                <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="volume">Volume Weight</label>
                                    <input type="text" id="volume" name="volume" placeholder="Enter Volume weight" value="<?=isset($det['weight'])?$det['weight']:""?>">                                         
                                </div>
                            </div>
                         
                                <div class="col-md-6">
                                 <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="app_prize">Approximate Prize</label>
                                    <input type="text" id="amount" name="amount" placeholder="Enter Price" value="<?=isset($det['amount'])?$det['amount']:""?>">                                         
                                </div>
                            </div>    
                             <div class="col-md-6">
                                 <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="app_prize">Paid Viya</label>
                                    <input type="text" id="paid_viya" name="paid_viya" placeholder="Enter Paid Viya" value="<?=isset($det['paid_viya'])?$det['paid_viya']:""?>">                                         
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="height">Courier Mode</label>
                          <select name="courier_mode">
                              <option value="Delivery">Delivery</option>
                              <option value="DTDC">DTDC</option>
                         <option value="Maruti">Maruti</option>
                         <option value="Professional">Professional</option>
                         <option value="Speed">Speed Post</option>
                         <option value="ST">ST Courier</option>
                         <option value="Blue Dart">Blue Dart</option>
                         <!--<option value="International">International</option>-->
                          </select>
                                </div>
                            </div> 
                              <div class="col-md-6">
                                <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="height">Document Type</label>
                          <select name="document_type">
                              <option value="Document">Document</option>
                              <option value="Non Document">Non Document</option>
                          </select>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="volume">Booking Mode</label>
                                <select name="booking_mode">
                              <option value="ST Office booking">ST Office booking</option>
                              <option value="DTDC Office">DTDC Office</option>
                         <option value="Maruti Office">Maruti Office</option>
                         <option value="GST Billing">GST Billing</option>
                         <option value="Cash Booking">Cash Booking</option>
                          </select>
                                </div>  
                                </div>
                             
                            <!--  <div class="col-md-12">-->
                            <!--    <p class="text-danger ml-5" id=""></p>-->
                            <!--    <div class="single-personal-info">-->
                            <!--        <label for="from_address">From Name</label>-->
                            <!--        <input type="text" id="from_name" name="from_name" placeholder="Enter From Name" value="<?=isset($det['from_name'])?$det['from_name']:""?>">                                         -->
                                   <!--<textarea id="from_name" name="from_name" placeholder="Enter From Name"><?=isset($det['from_name'])?$det['from_name']:""?></textarea>-->
                                    <!--<input type="text" id="cpassword" name="cpassword" placeholder="Enter Address">                                         -->
                            <!--    </div>-->
                            <!--</div>  -->
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="from_address">From Address</label>
                                    <textarea id="from_address" name="from_address" placeholder="Enter From Address"><?=isset($det['from_address'])?$det['from_address']:""?></textarea>
                                    <!--<input type="text" id="cpassword" name="cpassword" placeholder="Enter Address">                                         -->
                                </div>
                            </div>  
                             <div class="col-md-6">
                                 <p class="text-danger ml-5" id="from_pincode_error"></p>
                                <div class="single-personal-info">
                                    <label for="from_pincode">From Pincode</label>
                                    <input type="text" id="from_pincode" name="from_pincode" maxlength="6" placeholder="Enter From Pincode" value="<?=isset($det['from_pincode'])?$det['from_pincode']:""?>">                                         
                                </div>
                            </div>  
                              <div class="col-md-6">
                                 <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="from_contact">From Contact</label>
                                    <input type="text" id="from_contact" name="from_contact" maxlength="10" placeholder="Enter From Contact" value="<?=isset($det['from_contact'])?$det['from_contact']:""?>">                                         
                                </div>
                            </div>  
                             
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="reciver_name">Receiver Name</label>
                                    <input type="text" id="to_name" name="to_name" placeholder="Enter Receiver Name" value="<?=isset($det['to_name'])?$det['to_name']:""?>">                                         
                                </div>
                            </div>                                      
                            <div class="col-md-12 col-12">
                                <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="reciver_address">Receiver Address</label>
                                    <textarea id="to_pincode" name="to_address" placeholder="Enter Address"><?=isset($det['to_address'])?$det['to_address']:""?></textarea>
                                     <!--<input type="text" id="subject" placeholder="Enter Receiver Address">                                     -->
                                </div>
                            </div> 
                             <div class="col-md-6 col-12">
                                 <p class="text-danger ml-5" id="reciver_pincode_error"></p>
                                <div class="single-personal-info">
                                    <label for="reciver_pincode">Receiver Pincode</label>
                                     <input type="text" id="to_pincode" name="to_pincode" maxlength="6" placeholder="Enter Pincode" value="<?=isset($det['to_pincode'])?$det['to_pincode']:""?>">                                     
                                </div>
                            </div> 
                              <div class="col-md-6 col-12">
                                 <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="reciver_pincode">Receiver Contact</label>
                                     <input type="text" id="to_contact" name="to_contact" maxlength="10" placeholder="Enter Contact Number" value="<?=isset($det['to_contact'])?$det['to_contact']:""?>">                                     
                                </div>
                            </div> 
                              <div class="col-md-6 col-12">
                                 <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="reciver_pincode">Booking Number</label>
                                     <input type="text" id="booking_number" name="booking_number" placeholder="Enter Booking Number" value="<?=isset($det['booking_number'])?$det['booking_number']:""?>">                                     
                                </div>
                            </div> 
                            <!--  <div class="col-md-6 col-12">-->
                            <!--     <p class="text-danger ml-5" id=""></p>-->
                            <!--    <div class="single-personal-info">-->
                            <!--        <label for="reciver_pincode">Volume Weight</label>-->
                            <!--         <input type="text" id="vol_weight" name="vol_weight" placeholder="Enter Volume Weight" value="<?=isset($det['volume_weight'])?$det['volume_weight']:""?>">                                     -->
                            <!--    </div>-->
                            <!--</div> -->
                            <div class="col-md-6 col-12">
                                 <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="reciver_pincode">Risk Charge</label>
                                     <input type="text" id="risk_charge" name="risk_charge" placeholder="Enter Risk Charge" value="<?=isset($det['risk_charge'])?$det['risk_charge']:""?>">                                     
                                </div>
                            </div> 
                             <div class="col-md-6 col-12">
                                 <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="reciver_pincode">Product Id</label>
                                     <input type="text" id="product_id" name="product_id" placeholder="Enter Product Id" value="<?=isset($det['product_id'])?$det['product_id']:""?>">                                     
                                </div>
                            </div> 
                            <div class="col-md-6 col-12">
                                 <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="reciver_pincode">Product Value</label>
                                     <input type="text" id="product_value" name="product_value" placeholder="Enter Product Value" value="<?=isset($det['product_value'])?$det['product_value']:""?>">                                     
                                </div>
                            </div> 
                              <div class="col-md-12 col-12">
                                 <p class="text-danger ml-5" id=""></p>
                                <div class="single-personal-info">
                                    <label for="reciver_pincode">Destination</label>
                                     <input type="text" id="destination" name="destination" placeholder="Enter Destination" value="<?=isset($det['destination'])?$det['destination']:""?>">                                     
                                </div>
                            </div> 
                            <?php 
                            if($id=="") {
                            ?>
                            <div class="col-md-12 col-12 text-center">
                                 <a href="data-table.php" class="theme-btn btn-btn-danger">Cancel</a>
                              <button type="submit" class="theme-btn" name="update_booking_submit" id="update_booking_submit">Add Booking <i class="fas fa-arrow-right"></i></button>
                            </div>
                            <?php } else { ?>
                              <div class="col-md-12 col-12 text-center">
                                 <a href="data-table.php" class="theme-btn btn-btn-danger">Cancel</a>
                              <button type="submit" class="theme-btn" name="update_booking_submit" id="update_booking_submit">Update Booking <i class="fas fa-arrow-right"></i></button>
                            </div>
                            <?php } ?>
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
