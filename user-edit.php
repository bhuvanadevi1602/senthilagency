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

if(isset($_SESSION["id"]) == "")
{
    echo "<script>window.location='sign-up.php';</script>";
}

if(isset($_SESSION["id"])!=0 ){
    
    $u_id=$_SESSION["id"];
     $name=$_SESSION["name"];
     $email=$_SESSION["email"];
}

if(isset($_REQUEST['profile__submit']))
{
    $user_id=$_REQUEST['user_id'];
    $edit_name=$_REQUEST['edit_name'];
    $edit_email=$_REQUEST['edit_email'];
    $edit_mobile=$_REQUEST['edit_mobile'];
    
    $update_profile="update user_login set name='$edit_name', email='$edit_email', mobile='$edit_mobile' where id='$u_id' ";
    $update_profile_sql=mysqli_query($conn,$update_profile);
    echo "<script>window.location.href='profile.php';</script>";
    exit;

}

$sel_profile_det="select * from user_login where id='$u_id' ";
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
                        <p>Edit User Details</p>
                        <!--<h1>Register</h1>-->
                    </div>
                </div>
              <div class="contact-form contact-forms">                                                        
                        <form onsubmit="return validate_booking()" name="register_form" class="row conact-form" method="POST" style="justify-content: end;">
                            <input type="hidden" id="update_id" name="update_id" value="<?=$det['id']?>">  
                            <div class="col-md-12">
                                <p class="text-danger ml-5" id="p_name_error"></p>
                                <div class="single-personal-info">
                                    <label for="p_name">Name</label>
                                    <input type="text" id="update_p_name" name="edit_name" placeholder="Enter Name" value="<?=$fet['name']?>">                                         
                                </div>
                                <div class="single-personal-info">
                                    <label for="p_name">Email</label>
                                    <input type="text" id="update_p_name" name="edit_email" placeholder="Enter Email" value="<?=$fet['email']?>">                                         
                                </div>
                                <div class="single-personal-info">
                                    <label for="p_name">Mobile</label>
                                    <input type="text" id="update_p_name" name="edit_mobile" placeholder="Enter Mobile" value="<?=$fet['mobile']?>">                                         
                                </div>
                            </div>                            
                           
                            <div class="col-md-12 col-12 text-center">
                                <a href="profile.php" class="theme-btn btn-btn-danger">Cancel</a>
                               <button type="submit" class="theme-btn" name="profile__submit" id="profile__submit">Update Profile </button>
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
    //  function validate_booking()
	   // {
	       
	        
	   //     var from_pincode = document.forms['register_form']['update_from_pincode'].value;
	   //     var contact_pattern=/^\d{6}$/;
	        
	   //     if(from_pincode !=="")
	   //     {
	   //         document.getElementById('from_pincode_error').innerHTML='';
	   //     }
	   //     else
	   //     {
	   //         document.getElementById('from_pincode_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Pincode is Required..! ';
	   //         document.getElementById("update_from_pincode").focus();
	   //         return false;
	   //     }
	        
	   //     if(isNaN(from_pincode))
	   //     {
	   //         document.getElementById('from_pincode_error').innerHTML='<span  style="color:rgb(70,171,200) !important;">*</span>Pincode should be Digits';
	   //         document.getElementById("update_from_pincode").focus();
	   //         return false;
	   //     }
	   //     else
	   //     {
	   //         document.getElementById('from_pincode_error').innerHTML='';
	   //     }
	   //     if(from_pincode.match(contact_pattern))
	   //     {
	   //         document.getElementById('from_pincode_error').innerHTML='';
	   //     }
	   //     else
	   //     {
	   //         document.getElementById('from_pincode_error').innerHTML='<span style="color:rgb(70,171,200) !important;">*</span>Pincode should be 6 digit';
	   //         document.getElementById("update_from_pincode").focus();
	   //         return false;
	   //     }
	        
	   //      var reciver_pincode = document.forms['register_form']['update_reciver_pincode'].value;
	        
	   //     if(reciver_pincode !=="")
	   //     {
	   //         document.getElementById('reciver_pincode_error').innerHTML='';
	   //     }
	   //     else
	   //     {
	   //         document.getElementById('reciver_pincode_error').innerHTML='<span  style="color:rgb(70,171,200)  !important;">*</span>Pincode is Required..! ';
	   //         document.getElementById("update_reciver_pincode").focus();
	   //         return false;
	   //     }
	        
	   //     if(isNaN(reciver_pincode))
	   //     {
	   //         document.getElementById('reciver_pincode_error').innerHTML='<span  style="color:rgb(70,171,200) !important;">*</span>Pincode should be Digits';
	   //         document.getElementById("update_reciver_pincode").focus();
	   //         return false;
	   //     }
	   //     else
	   //     {
	   //         document.getElementById('reciver_pincode_error').innerHTML='';
	   //     }
	   //     if(reciver_pincode.match(contact_pattern))
	   //     {
	   //         document.getElementById('reciver_pincode_error').innerHTML='';
	   //     }
	   //     else
	   //     {
	   //         document.getElementById('reciver_pincode_error').innerHTML='<span style="color:rgb(70,171,200) !important;">*</span>Pincode should be 6 digit';
	   //         document.getElementById("update_reciver_pincode").focus();
	   //         return false;
	   //     }
	        
	   // }
	    
 </script>
