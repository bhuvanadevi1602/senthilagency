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
/*@media (min-width:993px)  {*/
/*    .table-design-box {*/
/*        margin-top: 80px !important;*/
/*    }*/
/*}*/
.nav-link{
    padding: 20px !important;
}
.cc {
    background: #fff;
    border: 1px solid #fff;
    border-radius: 15px;
}
</style>
    

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
/*input {*/
/*    border:1px solid !important;*/
/*}*/
.mt-5s {
    margin-top: 25px;
}
.fa-edit {
    color: #cccc00;
}
.fa-trash {
    color: #ff8080;
}
.sample a{
    color: #1a66ff;
}
.budge {
    border-radius: 7px;
    padding: 8px;
    background-color: #cff4dc;
    color: #00B441 !important;
}
.bg {
    background-color: #fff;
}
.table-design-box {
    border: 1px solid aliceblue;
    border-radius: 12px;
    padding: 10px;
    background: aliceblue;
}
.dataTables_filter, .dataTables_length {
    margin-bottom: 1rem!important;
}

</style>
<?php
$sql="select * from add_user where name='$name'";
$exe=mysqli_query($conn,$sql);
$valexe=mysqli_fetch_array($exe);
// print_r($valexe);die();
?>

        <div class="table-padding cc nav nav-tabs no-borders justify-content-center" role="tablist">
		                    <ul class="nav nav-tabs" role="tablist">
                             
                              <li class="nav-item">
                               <a class="nav-link text-center" href="profile.php" role="tab"><i class="fas fa-user"></i> Profile</a>
                              </li>
                              <li class="nav-item">
                                <!--<a class="nav-link text-center" href="dashboard-1.php" role="tab">Dashboard</a>-->
                              </li>
                              <?php if($valexe['role']=="user") { ?>
                              <li class="nav-item">
                                 <a class="nav-link text-center" href="booking.php" role="tab"><i class="fa fa-box"></i> Booking</a>
                              </li>
                              <?php } else { ?>
                              <li class="nav-item">
                                 <a class="nav-link text-center" href="booking_party.php" role="tab"><i class="fa fa-box"></i> Booking</a>
                              </li>
                               <?php } ?>
                               <li class="nav-item">
                                <a class="nav-link active text-center" href="data-table.php" role="tab"><i class="fas fa-info-circle"></i> Booking Details</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link text-center" href="change_password.php" role="tab"><i class="fa fa-key"></i> Change Password</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link text-center" href="sign-up.php" role="tab"><i class="fa fa-sign-out"></i> Logout</a>
                              </li>
                            </ul>
                            </ul>
		                    <!--<div class="nav-item">-->
    		                <!--    <p class="text-centers"><a class="nav-link no-borders active" href="#profile" role="tab" data-toggle="tab">Data Table</a></p>-->
    		                <!--</div>-->
    		                
    		                <!--<div class="nav-item">-->
    		                <!--  <p class="text-centers"><a class="nav-link" href="#profile_dashboard" role="tab" data-toggle="tab" style="min-width: 136px !important;">Profile</a></p>-->
    		                <!--</div>-->
    		                
    		                <!--<div class="nav-item">-->
    		                <!--  <p class="text-centers"><a class="nav-link" href="#buzz" role="tab" data-toggle="tab" style="min-width: 136px !important;">Change Password</a></p>-->
    		                <!--</div>-->
    		                
    		                <!--<div class="nav-item">-->
    		                <!--  <p class="text-centers p-0"><a href="sign-up.php" class="nav-link" style="min-width: 136px !important;">Logout</a></p>-->
    		                <!--</div>-->
    		                
    		            </div>