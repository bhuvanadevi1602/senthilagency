<?php
include('include/config.php');

if(isset($_SESSION["id"]) == "")
{
    echo "<script>window.location='sign-up.php';</script>";
}
if(isset($_SESSION["id"])!="" ){
    
    $u_id=$_SESSION["id"];
     $name=$_SESSION["name"];
     $email=$_SESSION["email"];
      $username=$_SESSION['username'];
      $role=$_SESSION['role'];
}

?>

<?php
include_once('header.php');

if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
}else{
    $id="";
}

if(isset($_REQUEST['action']))
{
    $action=$_REQUEST['action'];
}else{
    $action="";
}

if($action == "deletes")
{
    $soft_delete="update user_booking set delete_status='1' where id='$id'";
    $soft_delete_sql=$conn->query($soft_delete);
    if($soft_delete_sql)
    {
        echo "<script>swal({
  title: 'Deleted Success!',
  text: 'Thank You',
  type: 'success',
  timer: 1000,
  showConfirmButton: false
}, function(){
      window.location.href = 'data-table.php';
}) </script>";
    } else{
        
    }
}
//deletes
if(isset($_POST['delete_booking']))
{
    $delid=$_POST['delid'];
    $soft_delete="update booking_from set delete_status='1' where id='$delid'";
//   print_r($soft_delete);die();
     $soft_delete_sql=$conn->query($soft_delete);
    if($soft_delete_sql)
    {
        echo "<script>swal({
  title: 'Deleted Success!',
  text: 'Thank You',
  type: 'success',
  timer: 1000,
  showConfirmButton: false
}, function(){
      window.location.href = 'data-table.php';
}) </script>";
    }else{
        
    }
}
?>
<style>
    .dataTables_wrapper .dataTables_info {
    clear: both;
    float: left;
    padding-top:3em;
}

.dataTables_wrapper .dataTables_paginate {
    float: right;
    text-align: right;
    padding-top: 3em;
}
</style>
 <section class="hero-slide-wrapper hero-1">
        <div class="hero-slider-active owl-carousel">
            <div class="single-slide bg-cover">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hero-contents text-center">
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
<section class="bg">  
<div class="container mt-5 mb-5">
    <div class="row">
    <div class="col-lg-3 wrap">
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
<div class="col-lg-9 col-sm-12 mt-5s">
    <div class="tab-content">
          <div role="tabpanel" id="profile" class="tab-pane fade in active page-content" style="height:auto;">
    <div class="inner-box">
     <div class="dashboard-box">
         <h2 class="dashbord-title mb-3">Booking Details</h2>
     </div>
       <div class="dashboard-wrapper table-responsive">
           <!--class="table table-responsive dashboardtable tablemyads"-->
                    <?php
                    
                        $fet_query1="select * from add_user where user_id='$u_id'";
                    $fet_query_sql1=mysqli_query($conn,$fet_query1);
                    $row1=$fet_query_sql1->fetch_assoc();
                 $role=$row1['role'];
                 $cx=$row1['from_cx_id'];
                  $name=$_SESSION['name'];
                $namel=strtolower($name);
                   $nameu=strtoupper($name);
                   $namec=ucwords($names);
                   
              
                 if($role=='user') {
                    //  $fet_query="select * from user_booking where delete_status='0' and user_id='$u_id'";
                     $fet_query="select * from booking_from where delete_status='0' and (consignee_name='$namec' or consignee_name='$namel' or consignee_name='$nameu')";
                    // print_r($fet_query);die();
                    $fet_query_sql=mysqli_query($conn,$fet_query);
                    $no='1';
                 ?>
                   <table id="myTable" class="display" style="width:100%">
                <thead>
                    <tr>
                    
                    <th>S.No</th>
                        <th>Date</th>
                     <th>Name</th>
                    <th>Amount</th>
               <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
          <?php 
          while($row=$fet_query_sql->fetch_assoc())
                    {
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$row['createdAt']?></td>
                        <td class="sample"><a href="cards.php?bookingid=<?=$row['id']?>"><?=$row['username']?></a></td>
                        <td><?=$row['amount']?></td>
                       <td class="text-center"><span class="budge">Booked</span></td>
                         <!--<td><span class="budge"><?=$row['status']?></span></td>-->
                        <td><div class="row justify-content-start"><a href="customer_bill.php?id=<?=$row['id']?>" target="_blank"><i class="fa fa-file mr-2"></i></a><a href="edit_booking.php?id=<?=$row['id']?>"><i class="fa fa-edit mr-2"> </i> </a> <a class="deletes_booking" delete_id="<?=$row['id']?>"><i class="fa fa-trash mr-2"> </i> </a> </div></div></td>
                    </tr>
                    <?php
                    } ?>
                    </tbody>
                    </table>
              <?php    }
                 else{
                     $names=strtolower($name);
                     $namec=ucwords($names);
                     
                    $fet_query1="select * from booking_from where delete_status='0' and (consignee_name='$namec' or consignee_name='$namel' or consignee_name='$nameu')";
                        // print_r($fet_query1);die();
                    $fet_query_sql1=mysqli_query($conn,$fet_query1);
                    $no='1';
                   ?>
                    <table id="myTable" class="display" style="width:100%">
                <thead>
                    <tr>
                    
                    <th>S.No</th>
                    <th>Date</th>
                    <th>Booking ID</th>
                    <th>Product Name</th>
                    <th>Approximate Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=$fet_query_sql1->fetch_assoc())
                    {
                    ?>
                    <tr>
                        <td class="text-center"><?=$no++?></td>
                         <td class="text-center"><?=$row['createdAt']?></td>
                       <td class="text-center"><a class="text text-primary" href="delivery.php?bookingid=<?=$row['id']?>"><?=$row['booking_number']?></a></td>
                        <td class="sample text-center"><?=$row['username']?></td>
                        <td class="text-center"><?=$row['product_value']?></td>
                        <?php if($row['status']==0) { 
                        $stat="New Requst";
                         } else if($row['status']==1) { 
                        $stat="Delivered";
                         } else if($row['out_status']==1) { 
                        $stat="Out Of Delivery";
                         }  else if($row['In_transit']==1) { 
                        $stat="In Transit";
                         }  else if($row['rto_status']==1) { 
                        $stat="RTO";
                         } else if($row['notdev_status']==1) { 
                        $stat="Not Delivery";
                         } else if($row['des_status']==1) { 
                        $stat="Reached Destination";
                         }?>
                        <td class="text-center"><span class="budge"><?=$stat?></span></td>
                        <!--<?=$row['status']?>-->
                        <td class="text-center"><div class="row col-md-12"><a href="customer_bill.php?id=<?=$row['id']?>" target="_blank"><i class="fa fa-file mr-2"></i></a>&nbsp;<a href="booking_party.php?id=<?=$row['id']?>"><i class="fa fa-edit mr-2"> </i> </a> <form action="" method="POST"><input type="hidden" name="delid" value="<?= $row['id'] ?>"/><button type="submit" name="delete_booking" style="background:none" onclick="return confirm('Are you sure you want to delete this item')"><i class="fa fa-trash mr-2"> </i> </button></form> </div></div></td>
                        </tr>
                     <?php
                 }
                 ?>
                    </tbody>
                    </table>
                    <?php
                 }
                    ?>
                </tbody>
            </table>
       </div>
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
              <!--<div class="contact-form contact-forms" id="forms">                                                        -->
              <!--          <form onsubmit="return validate()" name="register_form" class="row conact-form" method="POST" style="justify-content: end;">-->
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
              <!--              <div class="col-md-12">-->
              <!--                  <p class="text-danger ml-5" id="password_error"></p>-->
              <!--                  <div class="single-personal-info">-->
              <!--                      <label for="phone">New Password</label>-->
              <!--                      <input type="password" id="new_password" name="new_password" placeholder="Enter Password">                                         -->
              <!--                  </div>-->
              <!--              </div>  -->
              <!--              <div class="col-md-12">-->
              <!--                  <p class="text-danger ml-5" id="passwords_error"></p>-->
              <!--                  <div class="single-personal-info">-->
              <!--                      <label for="phone">Confirm Password</label>-->
              <!--                      <input type="password" id="cpassword" name="cpassword" placeholder="Enter Password">                                         -->
              <!--                  </div>-->
              <!--              </div>  -->
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
              <!--              <div class="col-md-12 col-12 text-center">-->
              <!--                  <a href="user-dashboard.php#forms"><button type="submit" class="theme-btn" name="Change_pass_submit" id="Change_pass_submit">send  message<i class="fas fa-arrow-right"></i></button></a>-->
              <!--              </div>     -->
                            <!--<div class="text-right">-->
                            <!--    <a href="login.php">Back to Login?</a>-->
                            <!--</div>-->
              <!--          </form>-->
              <!--      </div>-->
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
</section>  
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
 <!-- data table-->
 <!--<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">-->
 <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
 
<script>

    $(document).ready( function () {
    $('#myTable').DataTable();
    });
    
    $('#myTable').on('click','.deletes_booking',function(){
       var delete_id=$(this).attr("delete_id");
    //   alert(delete_id)
    swal({
        title: "Are you sure want to Delete?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
      }).then(function(e){
          if(e.value)
          {
              window.location = "data-table.php?action=deletes&id="+delete_id;
          }
          else
          {
                swal.fire("Cancelled", "Your data is safe :)", "error");
          }
      });
    });
    
    //deletes_booking
        
    // $('#myTable').on('click','.delete_booking',function(){
    //   var delete_id=$(this).attr("delete_id");
    //  swal({
    //     title: "Are you sure want to Delete?",
    //     icon: "warning",
    //     buttons: true,
    //     dangerMode: true,
    //     showCancelButton: true,
    //     confirmButtonColor: "#DD6B55",
    //     confirmButtonText: "Confirm",
    //     cancelButtonText: "Cancel",
    //     closeOnConfirm: false,
    //     closeOnCancel: false
    //   }).then(function(e){
    //       alert(e.id)
    //       if(e.value)
    //       {
              window.location = "data-table.php?action=delete&id="+delete_id;
    //       }
    //       else
    //       {
    //             swal.fire("Cancelled", "Your data is safe :)", "error");
    //       }
    //   });
    // });
</script>
 
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
