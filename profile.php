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

?>

<?php
include_once('header.php');

if(isset($_REQUEST['profile__submit']))
{
    $user_id=$_REQUEST['user_id'];
    $edit_name=$_REQUEST['edit_name'];
    $edit_email=$_REQUEST['edit_email'];
    $edit_mobile=$_REQUEST['edit_mobile'];
    
    $update_profile="update user_login set name='$edit_name', email='$edit_email', mobile='$edit_mobile' where id='$user_id' ";
    $update_profile_sql=mysqli_query($conn,$update_profile);
    if($update_profile_sql)
    {
        echo "<script type='text/javascript'>
    
                         $(document).ready(function() {
                                  Swal.fire({
                                  icon: 'success',
                                  title: '',
                                  text: 'Profile Updated....!',
                                      
                                  }).then(function(){
                                    window.location.href='profile.php';
                                  });
                                });
    
                    </script> ";
    }else{
         echo "<script type='text/javascript'>
    
                         $(document).ready(function() {
                                  Swal.fire({
                                  icon: 'error',
                                  title: '',
                                  text: 'Failed To Update Profile..!',
                                      
                                  });
                                });
    
                    </script>
                    ";
    }
    
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

                      <div class="col-lg-8">
                        <!--<p>Cards...</p>-->
                        <div class="card p-3">
                            <div class="row">
                                <div class="row col-lg-12">
                                    <div class="col-lg-8">
                                    <p class="mb-1">Profile Details</p>
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <a href="user-edit.php"><button type="submit" class="theme-btn p-3" name="Change_pass_submit" id="Change_pass_submit">Edit<i class="fa fa-pencil"></i></button></a>
                                  </div>
                                </div>
                            </div>
                                   <hr class="mt-3">
                               
                           <div class="row mt-4">
                               <div class="col-lg-6">
                                   <p>Name</p>
                               </div>
                               <div class="col-lg-6">
                                   <p><?=$fet['name']?></p>
                               </div>
                               <div class="col-lg-6">
                                   <p>Email</p>
                               </div>
                               <div class="col-lg-6">
                                   <p><?=$fet['email']?></p>
                               </div>
                               <div class="col-lg-6">
                                   <p>Mobile</p>
                               </div>
                               <div class="col-lg-6">
                                   <p><?=$fet['mobile']?></p>
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

</div>
</div>
</body>

</html>



 <?php
  include 'footer.php';
 ?> 
 