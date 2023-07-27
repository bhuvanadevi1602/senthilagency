<?php
include('header.php');
include('config.php');

$date = date("Y-m-d h:i:s");

$username = $_SESSION['user_name'];
$branch = $_SESSION['courier_mode'];
$userId = $_SESSION['user_id'];

if (isset($_POST['register'])) {
    if($_POST["from_names"]!=""){
    	$from_name = isset($_POST["from_names"])?$_POST["from_names"]:"";
    }
    else if(isset($_POST["from_namec"])){
     	$from_name = isset($_POST["from_namec"])?$_POST["from_namec"]:"";
    }
     else if(isset($_POST["from_name1"])){
      	$from_name = isset($_POST["from_name1"])?$_POST["from_name1"]:"";
     }
     
     if($_POST["from_contacts"]!=""){ 
    	$from_contact = isset($_POST["from_contacts"])?$_POST["from_contacts"]:"";
    }
    else if(isset($_POST["from_contactc"])){
     	$from_contact = isset($_POST["from_contactc"])?$_POST["from_contactc"]:"";
        
    }
     else if(isset($_POST["from_contact1"])){
     	$from_contact = isset($_POST["from_contact1"])?$_POST["from_contact1"]:"";
        
    }
    
     if($_POST["from_addresss"]!=""){
    	$from_address = isset($_POST["from_addresss"])?$_POST["from_addresss"]:"";
    }
    else if(isset($_POST["from_addressc"])){
     	$from_address = isset($_POST["from_addressc"])?$_POST["from_addressc"]:"";
        
    }
    else if(isset($_POST["from_address1"])){
     	$from_address = isset($_POST["from_address1"])?$_POST["from_address1"]:"";
        
    }
   
   
    if($_POST["from_cx_ids"]!=""){
   	$from_cx_id = $_POST["from_cx_ids"];
 }
  
//   print_r($_POST);die();
  
    // 	$from_address = $_POST["from_addresss"];
// print_r($from_name.$from_contact.$from_address);die();
	$document_type = $_POST["document_type"];
	$booking_mode = $_POST["booking_mode"];
	$courier_mode = $_POST["courier_mode"];
	$createdAt = $_POST["createdAt"];
	$customer_type = $_POST["customer_type"];
	$consignee_name = $_POST["consignee_name"];
    $booking_name=$_POST['booking_name'];
	$from_active = $_POST["from_active"];
// 	$from_address = $_POST["from_address"];
// 	$from_contact = $_POST["from_contacts"];
// 	$from_name1 = $_POST["from_name1"];
// 	$from_address1 = $_POST["from_address1"];
// 	$from_contact1 = $_POST["from_contact1"];

	$to_name = $_POST["to_name"];
	$to_address = $_POST["to_address"];
	$to_contact = $_POST["to_contact"];

	$booking_number = $_POST["booking_number"];
	$customer_id = $_POST["customer_id"];
	$destination = $_POST["destination"];
	$length = $_POST["length"];
	$breadth = $_POST["breadth"];
	$height = $_POST["height"];
	$container= $_POST["container"];
	$weight = $_POST["weight"];
	$volume_weight = $_POST["volume_weight"];
	$risk_charge = $_POST["risk_charge"];
	$amount = $_POST["amount"];
	$product_value = $_POST["product_value"];
	$paid_viya = $_POST["paid_viya"];
		$from_pincode = $_POST["from_pincode"];#
		$to_pincode = $_POST["to_pincode"];
// print_r($_POST);die();

	$time = 30 * 60;
	$end_time = date('Y-m-d h:i:s', time() + $time);
	$month_name = date("Y-m");
	if ($customer_type=="Customer") {
		$insert = "INSERT into booking_from (username,branch,consignee_name,user_id,document_type,booking_mode,courier_mode,createdAt,customer_type,from_active,from_cx_id,from_name,from_address,
		from_contact,from_pincode,to_name,to_address,to_contact,to_pincode,booking_number,customer_id,destination,length,breadth,height,container,weight,volume_weight,risk_charge,amount,product_value,createddate,ending_date,month_name,
		balanceadd,balance,balance2,repayment_date,repayment,paid_viya,updated_by)  
                   values('$booking_name','$branch','$consignee_name','$userId','$document_type','$booking_mode','$courier_mode','$createdAt','$customer_type','$from_active','$from_cx_id','$from_name',
                   '$from_address','$from_contact','$from_pincode','$to_name','$to_address','$to_contact','$to_pincode','$booking_number','$customer_id','$destination','$length','$breadth','$height','$container','$weight','$volume_weight','$risk_charge','$amount','$product_value','$createdAt','$end_time','$month_name',
                   '$amount',0,'$amount','$repay_date','$repayment','$paid_viya','Admin') ";
  	}
  	else if ($customer_type == "Company" || $customer_type == "Party") {
	$insert = "INSERT into base (username,branch,consignee_name,user_id,document_type,booking_mode,courier_mode,createdAt,customer_type,company_name,from_active,from_cx_id,from_name,from_address,
		from_contact,from_pincode,to_name,to_address,to_contact,to_pincode,booking_number,customer_id,destination,length,breadth,height,container,weight,volume_weight,risk_charge,bill_amount,product_value,createddate,ending_date,month_name,
		balanceadd1,balance,balance2,repayment_date,repayment,paid_viya,updated_by,total,subtotal)  
                   values('$booking_name','$branch','$consignee_name','$userId','$document_type','$booking_mode','$courier_mode','$createdAt','$customer_type','$from_name','$from_active','$from_cx_id','$from_name',
                   '$from_address','$from_contact','$from_pincode','$to_name','$to_address','$to_contact','$to_pincode','$booking_number','$customer_id','$destination','$length','$breadth','$height','$container','$weight','$volume_weight','$risk_charge','$amount','$product_value','$createdAt','$end_time','$month_name',
                   '$amount',0,'$amount','$repay_date','$repayment','$paid_viya','Admin','$amount','$amount') ";
   }
                // print_r($insert);die();
	$result = mysqli_query($conn, $insert);
	if ($result) {
		echo "<script type='text/javascript'>

                     $(document).ready(function() {
                      Swal.fire({
                  
                  text: 'New Booking Form Created!',
                  icon: 'success',
                  confirmButtonColor: '#1BC5BD',
                  button: 'Dashboard!',
                            }).then(function() {
    window.location = 'bookingdb.php';
                            })    
                     });

                </script>";
	} else {
		echo "<script type='text/javascript'>

                     $(document).ready(function() {
                      Swal.fire({
                  
                  text: 'Something went wrong try again!',
                  icon: 'error',
                  confirmButtonColor: '#1BC5BD',
                  button: 'Dashboard!',
                            }).then(function() {
    window.location = 'bookingdb.php';
                            })    
                     });

                </script>";
	}
}
?>

<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

	<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

		<div class="subheader py-3 py-lg-8  subheader-transparent " id="kt_subheader">
			<div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
				<div class="d-flex align-items-center flex-wrap mr-1">
					<div class="d-flex align-items-baseline flex-wrap mr-5">
						<h2>
							Booking Form
						</h2>
						<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
						</ul>
					</div>
				</div>
				<div class="d-flex align-items-center">
				</div>
			</div>
		</div>

		<div class="d-flex flex-column-fluid">
			<div class=" container ">
				<div class="row">

					<?php
					if ($_SESSION['role'] == "super_admin") {
					?>

						<div class="col-lg-12">
							<form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
								<div class="row">

									<div class="col-lg-6">
										<div class="card card-custom  example-compact">
											<div class="card-header">
												<h3 class="card-title" style="color:#086ad7">
													<b>Booking</b>
												</h3>
											</div>
											<div class="card-body">
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Document Type <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="document_type" id="document_type" required>
															<option selected disabled>Select</option>
															<option value="Non document">Non document</option>
															<option value="Document">Document</option>
														</select>
													</div>
												</div>
													<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Consignee Name</label>
													<!--<span style="color:red">*</span>-->
													<div class="col-lg-9 col-md-9 col-sm-12">
													<input type="text" value="<?php echo $consignee_name ?>" class="form-control" name="consignee_name" id="consignee_name" placeholder="Enter Consignee Name"  />
												</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Booking Mode<span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="booking_mode" id="booking_mode" required>
															<option selected disabled>Select</option>
															<option value="ST Office booking">ST Office booking</option>
															<option value="DTDC Office">DTDC Office</option>
															<option value="Maruti Office">Maruti Office</option>
															<option value="GST Billing">GST Billing</option>
															<option value="Cash Booking">Cash Booking</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Courier Mode <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="courier_mode" id="courier_mode" required>
															<option selected disabled>Select</option>
															<option value="Delivery">Delivery</option>
															<option value="DTDC">DTDC</option>
															<option value="Maruti">Maruti</option>
															<option value="Professional">Professional</option>
															<option value="Speed Post">Speed Post</option>
															<option value="ST Courier">ST Courier</option>
															<option value="Blue Dart">Blue Dart</option>
															<option value="International">International</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Date <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="datetime-local" value="<?php echo $date ?>" class="form-control" name="createdAt" id="createdAt" placeholder="Enter your LR No" required />
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Customer Type <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="customer_type" id="customer_type" required>
															<option selected disabled>Select</option>
															<option value="Party">Party</option>
															<option value="Customer">Customer</option>
															<option value="Company">Company</option>
														</select>
													</div>
												</div>
											</div>

											<div class="card-header">
												<h3 class="card-title" style="color:#086ad7">
													<b>From</b>
												</h3>
											</div>
											<div class="card-body" id="optClass49">
												<?php
												$sql = "select * from customer where user_id=$userId";
												$result = mysqli_query($conn, $sql);
												$rec = mysqli_fetch_assoc($result);
												$auto_id = $rec['from_cx_id'];
												$auto_active = $rec['from_active'];
												$auto_name = $rec['from_name'];
												$auto_address = $rec['from_address'];
													$consignee_name = $_POST["consignee_name"];

												$auto_contact = $rec['from_contact'];
												?>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_detail">
														<input type="text" class="form-control" name="from_names" id="from_names" list="myCompanies" placeholder="Enter your Name" />
														<datalist id="myCompanies">

														</datalist>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_address_detail">
														<input type="text" class="form-control" name="from_addresss" id="from_address1" placeholder="Enter your Address" />
													</div>
												</div>
													<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Pincode </label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_address_detail">
														<input type="text" class="form-control" name="from_pincode" id="from_pincode" placeholder="Enter your pincode" />
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_contact_detail">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<!--<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="from_contact" id="from_contact" list="contact" placeholder="Enter Contact No" required />-->
															<input type="text" class="form-control" name="from_contacts" list="contact" id="from_contact1" placeholder="Enter Contact No" />
														</div>
													</div>
												</div>
												<div class="form-group row" >
												     <!--style="display:none"-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">customer Id<span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_id">
														<input type="text" readonly class="form-control" name="from_cx_ids" id="from_cx_id" placeholder="Enter your id" />
													</div>
												</div>
												<div class="form-group row" style="display:none"> 
													<label class="col-form-label text-right col-lg-3 col-sm-12">Active<span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_acts">
														<input type="text" class="form-control" name="from_active" id="from_active" id="from_active" placeholder="Enter your id" />
													</div>
												</div>
											</div>


											<div class="card-body" id="optClass39" style="display:none">
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="from_name1" id="from_name1" placeholder="Enter your Name" />
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="from_address" id="from_address1" placeholder="Enter your Address" />
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="from_contact1" id="from_contact1" list="contact" placeholder="Enter Contact No" />
															<!--<input type="text" class="form-control" name="from_contact" id="from_contact" placeholder="Enter Contact No" />-->
														</div>
													</div>
												</div>
											</div>

		<div class="card-body" id="optClass59"  style="display:none">
												<?php
												$sql = "select * from customer where user_id=$userId";
												$result = mysqli_query($conn, $sql);
												$rec = mysqli_fetch_assoc($result);
												$auto_id = $rec['from_cx_id'];
												$auto_active = $rec['from_active'];
												$auto_name = $rec['from_name'];
												$auto_address = $rec['from_address'];
													$consignee_name = $_POST["consignee_name"];

												$auto_contact = $rec['from_contact'];
												?>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_detail">
														<input type="text" class="form-control" name="from_namec" id="from_namec" list="myCompanied" placeholder="Enter your Name" />
														<datalist id="myCompanied">

														</datalist>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_address_detail">
														<input type="text" class="form-control" name="from_addressc" id="from_addressc" placeholder="Enter your Address" />
													</div>
												</div>
													<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Pincode </label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_address_detail">
														<input type="text" class="form-control" name="from_pincode" id="from_pincode" placeholder="Enter your pincode" />
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_contact_detail">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<!--<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="from_contact" id="from_contact" list="contact" placeholder="Enter Contact No" required />-->
															<input type="text" class="form-control" name="from_contactc" list="contact" id="from_contactc" placeholder="Enter Contact No" />
														</div>
													</div>
												</div>
												<div class="form-group row" style="display:none">
													<label class="col-form-label text-right col-lg-3 col-sm-12">customer Id<span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_id">
														<input type="text" class="form-control" name="from_cx_id" id="from_cx_id" id="from_cx_id" placeholder="Enter your id" />
													</div>
												</div>
												<div class="form-group row" style="display:none">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Active<span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_acts">
														<input type="text" class="form-control" name="from_active" id="from_active" id="from_active" placeholder="Enter your id" />
													</div>
												</div>
											</div>


											<div class="card-header">
												<h3 class="card-title" style="color:#086ad7">
													<b>To</b>
												</h3>
											</div>
											<div class="card-body">
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="to_name" id="to_name" placeholder="Enter your Name" required />
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="to_address" id="to_address" placeholder="Enter your Address" />
													</div>
												</div>
											<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Pincode </label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_address_detail">
														<input type="text" class="form-control" name="to_pincode" id="to_pincode" placeholder="Enter your pincode" />
													</div>
												</div>	<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="to_contact" id="to_contact" placeholder="Enter Contact No" required />
														</div>
													</div>
												</div>
													
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="card card-custom example-compact">
											<div class="card-header">
												<h3 class="card-title" style="color:#086ad7">
													<b>Detail</b>
												</h3>
											</div>
											<div class="card-body">
											<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Booking Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="booking_name" id="booking_name" placeholder="Enter Booking Name" required />
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Booking number <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="booking_number" id="booking_number" placeholder="Enter Booking number" required />
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Customer ID <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="customer_id" id="customer_id" placeholder="Enter Customer ID " required />
														</div>
													</div>
												</div>
													<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name" required />
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Destination <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="destination" id="destination" placeholder="Enter Destination" required />
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Length</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="length" id="length" placeholder="Enter Length" >
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Breadth</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="breadth" id="breadth" placeholder="Enter Breadth" >
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Height</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="height" id="height" placeholder="Enter Height" >
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Container</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="container" id="container" placeholder="Enter container" >
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Weight <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="weight" id="weight" placeholder="Enter Weight" required />
														</div>
													</div>
												</div>
												<div class="form-group row" id="optClass12" style="display:none">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Volume weight</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="volume_weight" id="volume_weight" placeholder="Enter Volume weight" >
														</div>
													</div>
												</div>
												<div class="form-group row" id="optClass13" style="display:none">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Risk charge</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="risk_charge" id="risk_charge" placeholder="Enter Risk charge" >
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Amount <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Amount" required />
													</div>
												</div>
												<div class="form-group row" id="optClass14" style="display:none">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Product value</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="product_value" id="product_value" placeholder="Enter Product value" >
													</div>
												</div>
													<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Paid Viya <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<!--<input type="text" class="form-control" name="paid_viya" id="paid_viya" placeholder="Enter Paid Viya" required />-->
											               <select class="form-control" name="paid_viya" id="paid_viya" required>
                                                                <option value="">Select Payment Mode</option>
                                                                <option value="cash">Cash</option>
                                                                <option value="cheque">Cheque</option>
                                                                <option value="upi">UPI</option>
                                                                <option value="neft">NEFT</option>
                                                                <option value="rtgs">RTGS</option>
                                                            </select>
                                                            </div>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<div class="row">
												<div class="col-lg-12">
													<button type="submit" class="btn btn-primary font-weight-bold mr-2" name="register" id="submit">Submit</button>
												</div>
											</div>
										</div>
									</div>

								</div>
							</form>
						</div>

					<?php
					} elseif ($_SESSION['role'] == "user") {
					    
					?>

						<div class="col-lg-12">
							<form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
								<div class="row">

									<div class="col-lg-6">
										<div class="card card-custom  example-compact">
											<div class="card-header">
												<h3 class="card-title" style="color:#086ad7">
													<b>Booking</b>
												</h3>
											</div>
											<div class="card-body">
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Document Type <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="document_type" id="document_type" required>
															<option selected disabled>Select</option>
															<option value="Non document">Non document</option>
															<option value="Document">Document</option>
														</select>
												</div>
												</div>
													<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Booking Mode<span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12"> 
														<select class="form-control" name="booking_mode" id="booking_mode" required>
															<option selected disabled>Select</option>
															<option value="ST Office booking">ST Office booking</option>
															<option value="DTDC Office">DTDC Office</option>
															<option value="Maruti Office">Maruti Office</option>
															<option value="GST Billing">GST Billing</option>
															<option value="Cash Booking">Cash Booking</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Courier Mode <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="courier_mode" id="courier_mode" required>
															<option selected disabled>Select</option>
															<option value="Delivery">Delivery</option>
															<option value="DTDC">DTDC</option>
															<option value="Maruti">Maruti</option>
															<option value="Professional">Professional</option>
															<option value="Speed Post">Speed Post</option>
															<option value="ST Courier">ST Courier</option>
															<option value="Blue Dart">Blue Dart</option>
															<option value="International">International</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Date <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="datetime-local" value="<?php echo $date ?>" class="form-control" name="createdAt" id="createdAt" placeholder="Enter your LR No" required />
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Customer Type <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="customer_type" id="customer_type" required>
															<option selected disabled>Select</option>
															<option value="Party">Party</option>
															<option value="Customer">Customer</option>
															<option value="Company">Company</option>
														</select>
													</div>
												</div>
												
											</div>

											<div class="card-header">
												<h3 class="card-title" style="color:#086ad7">
													<b>From</b>
												</h3>
											</div>

											<div class="card-body" id="optClass49">
												<?php
												$sql = "select * from customer where user_id=$userId";
												$result = mysqli_query($conn, $sql);
												$rec = mysqli_fetch_assoc($result);
												$auto_id = $rec['from_cx_id'];
												$auto_active = $rec['from_active'];
												$auto_name = $rec['from_name'];
												$auto_address = $rec['from_address'];
												$auto_contact = $rec['from_contact'];
												?>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_detail1">
														<input type="text" class="form-control" name="from_name" id="from_name" list="myCompanies2" placeholder="Enter your Name" />
														<datalist id="myCompanies2">

														</datalist>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_address_detail1">
														<input type="text" class="form-control" name="from_address" id="from_address" placeholder="Enter your Address" />
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_contact_detail1">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<!--<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="from_contact" id="from_contact" list="contact" placeholder="Enter Contact No" required />-->
															<input type="text" class="form-control" name="from_contact" list="contact" id="from_contact" placeholder="Enter Contact No" />
														</div>
													</div>
												</div>
												<div class="form-group row" style="display:none">
													<label class="col-form-label text-right col-lg-3 col-sm-12">customer Id<span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_id1">
														<input type="text" class="form-control" name="from_cx_id" id="from_cx_id" id="from_cx_id" placeholder="Enter your id" />
													</div>
												</div>
												<div class="form-group row" style="display:none">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Status<span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_acts1">
														<input type="text" class="form-control" name="from_active" id="from_active" id="from_active" placeholder="Enter your id" />
													</div>
												</div>
											</div>

											<div class="card-body" id="optClass39" style="display:none">
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="from_name1" id="from_name1" placeholder="Enter your Name" />
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="from_address1" id="from_address1" placeholder="Enter your Address" />
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="from_contact1" id="from_contact1" list="contact" placeholder="Enter Contact No" />
															<!--<input type="text" class="form-control" name="from_contact" id="from_contact" placeholder="Enter Contact No" />-->
														</div>
													</div>
												</div>
											</div>

							<div class="card-body" id="optClass59" style="display:none">
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="from_name1" id="from_name1" placeholder="Enter your Name" />
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="from_address1" id="from_address1" placeholder="Enter your Address" />
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="from_contact1" id="from_contact1" list="contact" placeholder="Enter Contact No" />
															<!--<input type="text" class="form-control" name="from_contact" id="from_contact" placeholder="Enter Contact No" />-->
														</div>
													</div>
												</div>
											</div>


<div class="card-header">
												<h3 class="card-title" style="color:#086ad7">
													<b>To</b>
												</h3>
											</div>
											<div class="card-body">
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="to_name" id="to_name" placeholder="Enter your Name" required />
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="to_address" id="to_address" placeholder="Enter your Address" />
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="to_contact" id="to_contact" placeholder="Enter Contact No" required />
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="card card-custom example-compact">
											<div class="card-header">
												<h3 class="card-title" style="color:#086ad7">
													<b>Detail</b>
												</h3>
											</div>
											<div class="card-body">
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Booking number <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="booking_number" id="booking_number" placeholder="Enter Booking number" required />
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Customer ID <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="customer_id" id="customer_id" placeholder="Enter Customer ID " required />
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Destination <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="destination" id="destination" placeholder="Enter Destination" required />
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Length</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="length" id="length" placeholder="Enter Length" >
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Breadth</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="breadth" id="breadth" placeholder="Enter Breadth" >
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Height</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="height" id="height" placeholder="Enter Height" >
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Container</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="container" id="container" placeholder="Enter container" >
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Weight <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="weight" id="weight" placeholder="Enter Weight" required />
														</div>
													</div>
												</div>
												<div class="form-group row" id="optClass12" style="display:none">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Volume weight</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<input type="text" class="form-control" name="volume_weight" id="volume_weight" placeholder="Enter Volume weight">
														</div>
													</div>
												</div>
												<div class="form-group row" id="optClass13" style="display:none">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Risk charge</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="risk_charge" id="risk_charge" placeholder="Enter Risk charge">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Amount <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Amount" required />
													</div>
												</div>
												<div class="form-group row" id="optClass14" style="display:none">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Product value</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="product_value" id="product_value" placeholder="Enter Product value">
													</div>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<div class="row">
												<div class="col-lg-12">
													<button type="submit" class="btn btn-primary font-weight-bold mr-2" name="register" id="submit">Submit</button>
												</div>
											</div>
										</div>
									</div>

								</div>
							</form>
						</div>

					<?php
					}
					?>

				</div>
			</div>
		</div>
	</div>

	<!--begin::Footer-->
	<?php
	include('footer.php');
	?>
	<!--end::Footer-->
</div>
<!--end::Wrapper-->

<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<script src="assets/js/pages/crud/forms/validation/form-controls.js"></script>

<script>
	$(document).ready(function() {
		$("#customer_type").change(function() {
			var customer_type = $(this).val();
			if (customer_type == "Customer") {
				$('#optClass39').show();
			} else {
				$('#optClass39').hide();
			}
		});
	});

	$(document).ready(function() {
		$("#customer_type").change(function() {
			var customer_type = $(this).val();
			if (customer_type == "Party") {
				$('#optClass49').show();
			} else {
				$('#optClass49').hide();
			}
		});
	});
	
		$(document).ready(function() {
		$("#customer_type").change(function() {
			var customer_type = $(this).val();
			if (customer_type == "Company") {
				$('#optClass59').show();
			} else {
				$('#optClass59').hide();
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		$("#document_type").change(function() {
			var document_type = $(this).val();
			if (document_type == "Non document") {
				$('#optClass12').show();
				$('#optClass13').show();
				$('#optClass14').show();
			}else {
			    $('#optClass12').hide();
			    $('#optClass13').hide();
			    $('#optClass14').hide();
			}
		});
	});
	
	$(document).ready(function() {
		$("#document_type").change(function() {
			var document_type = $(this).val();
			if (document_type == "Document") {
			    $('#optClass12').hide();
			    $('#optClass13').hide();
			    $('#optClass14').hide();
			}else {
				$('#optClass12').show();
				$('#optClass13').show();
				$('#optClass14').show();
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		$('#customer_type').on('change', function() {

			var cus_type = $(this).val();
			if (cus_type == "Party") {
				$.ajax({
					url: "ajax_request.php",
					type: "POST",
					dataType: "json",
					data: {
						"action": "search_from_name"
					},
					success: function(result_job) {
						if (result_job.status == 1) {
							var length = result_job.data.length;

							for (var i = 0; i < length; i++) {
								$('#myCompanies').append('<option value="' + result_job.data[i].from_name + '">' + result_job.data[i].from_name + '</option>');
							}
						}



					}
				});
				
							$('#from_names').on('input', function() {
			var from_name = $(this).val();
// alert(from_name)
			$.ajax({
				url: 'ajax_request.php',
				type: 'POST',
				dataType: 'json',
				data: {
					"action": "search_from_address",
					"from_name": from_name
				},
				success: function(result_job) {
					// alert('test')
					if (result_job.status == 1) {
						$('#from_address1').val(result_job.data[0].from_address);
						$('#from_contact1').val(result_job.data[0].from_contact);
						$('#from_cx_id').val(result_job.data[0].from_cx_id);
						$('#from_active').val(result_job.data[0].from_active);
					}
				}
			});

		});
			}

else if(cus_type == "Company"){
    	$.ajax({
					url: "ajax_request.php",
					type: "POST",
					dataType: "json",
					data: {
						"action": "search_from_name1"
					},
					success: function(result_job) {
						if (result_job.status == 1) {
							var length = result_job.data.length;

							for (var i = 0; i < length; i++) {
								$('#myCompanied').append('<option value="' + result_job.data[i].company_name + '">' + result_job.data[i].company_name + '</option>');
							}


						}

					}
				});
				
		$('#from_namec').on('input', function() {
			var from_name = $(this).val();
// alert(from_name)
			$.ajax({
				url: 'ajax_request.php',
				type: 'POST',
				dataType: 'json',
				data: {
					"action": "search_from_address",
					"from_name": from_name
				},
				success: function(result_job) {
					// alert('test')
					if (result_job.status == 1) {
						$('#from_addressc').val(result_job.data[0].from_address);
						$('#from_contactc').val(result_job.data[0].from_contact);
					}
				}
			});

		});
}

		});

	
	});

// 	$(document).ready(function() {
// 		$('#customer_type').on('change', function() {
		    
// 			var cus_type = $(this).val();
			
// 			if (cus_type == "Party") {
// 				$.ajax({
// 					url: "ajax_request.php?branch=<?= $branch ?>&&username=<?= $username ?>",
// 					type: "POST",
// 					dataType: "json",
// 					data: {
// 						"action": "search_from_name2"
// 					},
// 					success: function(result_job) {
// 						if (result_job.status == 1) {
// 							var length = result_job.data.length;

// 							for (var i = 0; i < length; i++) {

// 								$('#myCompanies2').append('<option value="' + result_job.data[i].from_name + '">' + result_job.data[i].from_name + '</option>');
// 							}


// 						}

// 					}
// 				});
// 			}

// 		});

// 		$('#from_name1').on('input', function() {
// 			var from_name = $(this).val();

// 			$.ajax({
// 				url: 'ajax_request.php',
// 				type: 'POST',
// 				dataType: 'json',
// 				data: {
// 					"action": "search_from_address2",
// 					"from_name": from_name
// 				},
// 				success: function(result_job) {
// 					// alert('test')
// 					if (result_job.status == 1) {
// 						$('#from_address').val(result_job.data[0].from_address);
// 						$('#from_contact').val(result_job.data[0].from_contact);
// 						$('#from_cx_id').val(result_job.data[0].from_cx_id);
// 						$('#from_active').val(result_job.data[0].from_active);
// 					}
// 				}
// 			});

// 		});
// 	});

// 	$("#customer_type").on('change', function() {
// 		$.ajax({
// 			url: 'ajax_request.php',
// 			type: 'POST',
// 			dataType: 'json',
// 			data: {
// 				"action": "search_from_address"
// 			},
// 			success: function(result_job) {
// 				if (result_jon.status == 1) {
// 					$('#from_address').val(result_job.data[0].from_address);
// 					$('#from_contact').val(result_job.data[0].from_contact);
// 				}
// 			}
// 		});

// 	});
</script>