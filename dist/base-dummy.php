<?php
include('header.php');
include('config.php');


$username = $_SESSION['user_name'];
$branch = $_SESSION['branch'];
$userId = $_SESSION['user_id'];

$sql1 = "SELECT * FROM add_user WHERE user_name = '$username'";
$result1 = $conn->query($sql1);
$userTable  = $result1->fetch_assoc();
$userBranch = $userTable['branch'];

// session_start();

if (isset($_POST['register'])) {
	$customer_type = $_POST["customer_type"];
	$booking_type = $_POST["booking_type"];
	$lr_no = $_POST["lr_no"];
	// 	$railway_no = $_POST["railway_no"];
	$consignment_type = $_POST["consignment_type"];

	$company_name = $_POST["company_name"];
	$invoice_no = $_POST["invoice_no"];
	$vehicle_halting = $_POST["vehicle_halting"];
	$unloading_charge = $_POST["unloading_charge"];
	$itc = $_POST["itc"];
	$ideal = $_POST["ideal"];
	$ff = $_POST["ff"];
	$link = $_POST["link"];
	$mark = $_POST["mark"];

	$invoice_type = $_POST["invoice_type"];
	// $mode_transport = $_POST["mode_transport"];
	// $lorry_no = $_POST["lorry_no"];
	// $train_type = $_POST["train_type"];
	// $RR_No = $_POST["RR_No"];
	// $train_No = $_POST["train_No"];
	// $flight_no = $_POST["flight_no"];
	$internal_info = $_POST["internal_info"];
	$eway_bill = $_POST["eway_bill"];
	//   $no_stop = $_POST["no_stop"];
	//   $destination = $_POST["destination"];
	$material_name = $_POST["material_name"];
	$quantity_kg = $_POST["quantity_kg"];
	$quantity_nos = $_POST["quantity_nos"];
	$rate = $_POST["rate"];
	$docket_charge = $_POST["docket_charge"];
	// 	$cd_charge = $_POST["cd_charge"];
	$gst = $_POST["gst"];
	$gstamount = $_POST["gstamount"];

	// 	$cgst = $_POST["cgst"];
	// 	$sgst = $_POST["sgst"];
	// 	$igst = $_POST["igst"];
	$agent_commission = $_POST["agent_commission"];
	$to_name = $_POST["to_name"];
	$to_address = $_POST["to_address"];
	$to_contact = $_POST["to_contact"];
	
	$from_cx_id = $_POST["from_cx_id"];
	$from_name = $_POST["from_name"];
	$from_address = $_POST["from_address"];
	$from_contact = $_POST["from_contact"];
	
	$from_name1 = $_POST["from_name1"];
	$from_address1 = $_POST["from_address1"];
	$from_contact1 = $_POST["from_contact1"];
	
// 	$from_name = $from_name = $from_name1;
// 	$from_address = $from_address;
// 	$from_contact = $from_contact;
	
	$agent = $_POST["agent"];
	$agent_name = $_POST["agent_name"];
	$agent_contact = $_POST["agent_contact"];
	$agent_city = $_POST["agent_city"];
	$delivery_message = $_POST["delivery_message"];
	$time = 30 * 60;
	$end_time = date('Y-m-d h:i:s', time() + $time);
	$month_name = date("Y-m");

	$bill_amount = $_POST["bill_amount"];
	$subtotal = $_POST["subtotal"];
	$gstamount_value = $_POST["gstamount_value"];
	$total = $_POST["total"];
    $created_at = date("Y-m-d h:i:s");
    $createdat = date("Y-m-d");
	// 	$sgst_value = $_POST["sgst_value"];
	// 	$igst_value = $_POST["igst_value"];

	// $bill = $quantity_kg * $rate;
	// $subtotal = $bill + $docket_charge + $cd_charge;
	// echo $cgst_value = $subtotal/100 * $cgst;
	// $sgst_value = $subtotal/100 * $sgst;
	// $igst_value = $subtotal/100 * $igst;
	// $total=$subtotal + $cgst_value + $sgst_value + $agent_commission;

	$count = $_POST["no_stop"];
	$repay_date = $_POST["advance_date"];
	$repayment = $_POST["repayment"];

	if ($agent_contact == '') {
		$apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
		$from_number = $from_contact;

		$sender = 'sender';
		$receiver = 'receiver';

		if ($sender == 'sender') {


			$stext =  rawurlencode("Dear $from_name,Your consignment bearing LR No. $lr_no is booked successfully. For more details contact us on 93825 86897.Regards,APS Cargo Movers");
			$sender = urlencode('APSCAR');

			$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

			$postData = array("messages" => $sms_template);
			$type_msg = rawurlencode($postData["messages"]);
			$postData = array("template_id" => $template_id_sms);

			$msg_template = rawurlencode($postData["template_id"]);

			$data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

			$url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $from_number . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166235847772632';

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
			$response0 = $response;
			$result0 = json_decode($response0, true);
			$msg_id = $result0["MessageData"][0]['MessageId'];
			$ErrorMessage = $result0["ErrorMessage"];
			$JobId = $result0["JobId"];
		}

		if ($receiver == 'receiver') {
			$stext =  rawurlencode("Dear $to_name, Your consignment bearing LR No. $lr_no is booked successfully. For more details contact us on 93825 86897. Regards, APS Cargo Movers");

			$sender = urlencode('APSCAR');

			$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

			$postData = array("messages" => $sms_template);
			$type_msg = rawurlencode($postData["messages"]);
			$postData = array("template_id" => $template_id_sms);

			$msg_template = rawurlencode($postData["template_id"]);

			$data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

			$url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $to_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166235847772632';

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
			$response0 = $response;
			$result0 = json_decode($response0, true);
			$msg_id = $result0["MessageData"][0]['MessageId'];
			$ErrorMessage = $result0["ErrorMessage"];
			$JobId = $result0["JobId"];
		}
	} else {
		$from = "from_name";
		$agents = "agent_name";
		$to = "receiver";

		if ($from == "from_name") {
			$apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
			$from_numbers = $from_contact;

			$stext =  rawurlencode("Dear $from_name,Your consignment bearing LR No. $lr_no is booked successfully. For more details contact us on 93825 86897.Regards,APS Cargo Movers");
			$sender = urlencode('APSCAR');

			$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

			$postData = array("messages" => $sms_template);
			$type_msg = rawurlencode($postData["messages"]);
			$postData = array("template_id" => $template_id_sms);

			$msg_template = rawurlencode($postData["template_id"]);

			$data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

			$url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $from_numbers . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166235847772632';

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
			$response0 = $response;
			$result0 = json_decode($response0, true);
			$msg_id = $result0["MessageData"][0]['MessageId'];
			$ErrorMessage = $result0["ErrorMessage"];
			$JobId = $result0["JobId"];
		}
		if ($to == "receiver") {
			$apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
			$stext =  rawurlencode("Dear $to_name, Your consignment bearing LR No. $lr_no is booked successfully. For more details contact us on 93825 86897. Regards, APS Cargo Movers");

			$sender = urlencode('APSCAR');

			$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

			$postData = array("messages" => $sms_template);
			$type_msg = rawurlencode($postData["messages"]);
			$postData = array("template_id" => $template_id_sms);

			$msg_template = rawurlencode($postData["template_id"]);

			$data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

			$url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $to_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166235847772632';

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
			$response0 = $response;
			$result0 = json_decode($response0, true);
			$msg_id = $result0["MessageData"][0]['MessageId'];
			$ErrorMessage = $result0["ErrorMessage"];
			$JobId = $result0["JobId"];
		}
		if ($agents == "agent_name") {
			$apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
			$stext =  rawurlencode("Dear $agent_name, Your consignment bearing LR No. $lr_no is booked successfully. For more details contact us on 93825 86897. Regards, APS Cargo Movers");

			$sender = urlencode('APSCAR');

			$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

			$postData = array("messages" => $sms_template);
			$type_msg = rawurlencode($postData["messages"]);
			$postData = array("template_id" => $template_id_sms);

			$msg_template = rawurlencode($postData["template_id"]);

			$data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

			$url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $agent_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166235847772632';

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
			$response0 = $response;
			$result0 = json_decode($response0, true);
			$msg_id = $result0["MessageData"][0]['MessageId'];
			$ErrorMessage = $result0["ErrorMessage"];
			$JobId = $result0["JobId"];
		}
	}


// 	$sql19 = "select * from company where company_name='$company_name' and invoice_no='$invoice_no' and vehicle_halting='$vehicle_halting' and unloading_charge='$unloading_charge' ";
// 	$result19 = mysqli_query($conn, $sql19);
// 	if (mysqli_num_rows($result19) == 0) {
// 		$insert_customer_query = "insert into company(company_name,invoice_no,vehicle_halting,unloading_charge) values('$company_name','$invoice_no','$vehicle_halting','$unloading_charge')";
// 		$res = mysqli_query($conn, $insert_customer_query);
// 	}

if($from_name != "" && $consignment_type == "paid")
{
	$insert1 = "INSERT into base (username,branch,user_id,customer_type,booking_type,lr_no,consignment_type,invoice_type,
                internal_info,eway_bill,
                        material_name,quantity_kg,quantity_nos,rate,docket_charge,gst,gstamount,agent_commission,
                        to_name,to_address,to_contact,from_cx_id,from_name,
                        from_address,from_contact,agent,agent_name,agent_contact,agent_city,delivery_message,
                        company_name,invoice_no,vehicle_halting,unloading_charge,
                        gstamount_value,total,subtotal,balanceadd,balance,balance2,bill_amount,
                        repayment_date,repayment,createdAt,createddate,ending_date,month_name
                        ) 
                    values('$username','$branch','$userId','$customer_type','$booking_type','$lr_no','$consignment_type','$invoice_type',
                   '$internal_info','$eway_bill',
                    '$material_name','$quantity_kg','$quantity_nos','$rate','$docket_charge','$gst','$gstamount','$agent_commission'
                    ,'$to_name','$to_address','$to_contact','$from_cx_id','$from_name',
                    '$from_address','$from_contact','$agent','$agent_name','$agent_contact','$agent_city','$delivery_message',
                    '$company_name','$invoice_no','$vehicle_halting','$unloading_charge',
                    '$gstamount_value','$total','$subtotal','$total',0,'$total','$bill_amount',
                    '$repay_date','$repayment','$created_at','$createdat','$end_time','$month_name'
                    ) ";
}else if($from_name1 != ""  && $consignment_type == "paid")
{
    $insert1 = "INSERT into base (username,branch,user_id,customer_type,booking_type,lr_no,consignment_type,invoice_type,
                internal_info,eway_bill,
                        material_name,quantity_kg,quantity_nos,rate,docket_charge,gst,gstamount,agent_commission,
                        to_name,to_address,to_contact,from_cx_id,from_name,
                        from_address,from_contact,agent,agent_name,agent_contact,agent_city,delivery_message,
                        company_name,invoice_no,vehicle_halting,unloading_charge,
                        gstamount_value,total,subtotal,balanceadd,balance,balance2,bill_amount,
                        repayment_date,repayment,createdAt,createddate,ending_date,month_name
                        ) 
                    values('$username','$branch','$userId','$customer_type','$booking_type','$lr_no','$consignment_type','$invoice_type',
                   '$internal_info','$eway_bill',
                    '$material_name','$quantity_kg','$quantity_nos','$rate','$docket_charge','$gst','$gstamount','$agent_commission'
                    ,'$to_name','$to_address','$to_contact','$from_cx_id','$from_name1',
                    '$from_address1','$from_contact1','$agent','$agent_name','$agent_contact','$agent_city','$delivery_message',
                    '$company_name','$invoice_no','$vehicle_halting','$unloading_charge',
                    '$gstamount_value','$total','$subtotal','$total',0,'$total','$bill_amount',
                    '$repay_date','$repayment','$created_at','$createdat','$end_time','$month_name'
                    ) "; 
}else if($from_name != "" && $consignment_type != "paid")
{
    $insert1 = "INSERT into base (username,branch,user_id,customer_type,booking_type,lr_no,consignment_type,invoice_type,
                internal_info,eway_bill,
                        material_name,quantity_kg,quantity_nos,rate,docket_charge,gst,gstamount,agent_commission,
                        to_name,to_address,to_contact,from_cx_id,from_name,
                        from_address,from_contact,agent,agent_name,agent_contact,agent_city,delivery_message,
                        company_name,invoice_no,vehicle_halting,unloading_charge,
                        gstamount_value,total,subtotal,balance2,bill_amount,
                        repayment_date,repayment,createdAt,createddate,ending_date,month_name
                        ) 
                    values('$username','$branch','$userId','$customer_type','$booking_type','$lr_no','$consignment_type','$invoice_type',
                   '$internal_info','$eway_bill',
                    '$material_name','$quantity_kg','$quantity_nos','$rate','$docket_charge','$gst','$gstamount','$agent_commission'
                    ,'$to_name','$to_address','$to_contact','$from_cx_id','$from_name',
                    '$from_address','$from_contact','$agent','$agent_name','$agent_contact','$agent_city','$delivery_message',
                    '$company_name','$invoice_no','$vehicle_halting','$unloading_charge',
                    '$gstamount_value','$total','$subtotal','$total','$bill_amount',
                    '$repay_date','$repayment','$created_at','$createdat','$end_time','$month_name'
                    ) ";
}else if($from_name1 != "" && $consignment_type != "paid")
{
    $insert1 = "INSERT into base (username,branch,user_id,customer_type,booking_type,lr_no,consignment_type,invoice_type,
                internal_info,eway_bill,
                        material_name,quantity_kg,quantity_nos,rate,docket_charge,gst,gstamount,agent_commission,
                        to_name,to_address,to_contact,from_cx_id,from_name,
                        from_address,from_contact,agent,agent_name,agent_contact,agent_city,delivery_message,
                        company_name,invoice_no,vehicle_halting,unloading_charge,
                        gstamount_value,total,subtotal,balance2,bill_amount,
                        repayment_date,repayment,createdAt,createddate,ending_date,month_name
                        ) 
                    values('$username','$branch','$userId','$customer_type','$booking_type','$lr_no','$consignment_type','$invoice_type',
                   '$internal_info','$eway_bill',
                    '$material_name','$quantity_kg','$quantity_nos','$rate','$docket_charge','$gst','$gstamount','$agent_commission'
                    ,'$to_name','$to_address','$to_contact','$from_cx_id','$from_name1',
                    '$from_address1','$from_contact1','$agent','$agent_name','$agent_contact','$agent_city','$delivery_message',
                    '$company_name','$invoice_no','$vehicle_halting','$unloading_charge',
                    '$gstamount_value','$total','$subtotal','$total','$bill_amount',
                    '$repay_date','$repayment','$created_at','$createdat','$end_time','$month_name'
                    ) "; 
}
    if (mysqli_query($conn, $insert1)) {                
//     $exp_qry = "SELECT * FROM customer where from_cx_id='$from_cx_id'";
// 	$result = $conn->query($exp_qry);
// 	$branchTable = $result->fetch_assoc();
// 	$from_name=$branchTable['from_name'];
// 	$from_contact=$branchTable['from_contact'];
// 	$from_address=$branchTable['from_address'];

// 	$sql = "Update into base from_name='$from_name',from_contact='$from_contact',from_address='$from_address' where from_cx_id='$from_cx_id'";
// 	$result = mysqli_query($conn, $sql);
// 	if (mysqli_num_rows($result) == 0) {
// // 		$insert_customer_query = "insert into customer(from_cx_id,from_name,from_address,from_contact) values('$from_cx_id','$from_name','$from_address','$from_contact')";
// // 		$res = mysqli_query($conn, $insert_customer_query);
// 	}
	
	// $result = mysqli_query($conn, $insert1);
	//     echo $id= $result["id"];
	// for ($i = 0; $i < $count; $i++) {
	//     //  $exp_qry2 = "SELECT * FROM base WHERE id='$id'";
	//     //     $exp_sql2 = mysqli_query($conn, $exp_qry2);
	//     //     $row21 = $exp_sql2->fetch_assoc();


	//     echo $id = $result["id"];
	//     $repay_date = $_POST["advance_date$i"];
	//     $repayment = $_POST["repayment$i"];

	//     echo $insert = "INSERT into tracking (id,repayment_date,repayment) 
	//         values('$id',$repay_date','$repayment') ";
	
	
		if ($consignment_type == "paid") {
		    
		    $sql2 = "UPDATE add_branch SET branch_balance = (branch_balance+'$total') WHERE branch_name= '$branch'";
				if ($conn->query($sql2)) {
		   $sql21 = "SELECT branch_id,branch_balance FROM add_branch WHERE branch_name= '$branch' ORDER BY branch_id DESC LIMIT 1";
					$result2 = $conn->query($sql21);
					$branchTable = $result2->fetch_assoc();
					$branch_balance1 = $branchTable['branch_balance'];
					$branch_id = $branchTable['branch_id'];
		 $sql2 = "INSERT into transaction_history (branch_name,user_id,employee_name,category,amount,credit,debit,balance) 
		values('$branch','$userId','$username','$consignment_type','$total','$total',0,'$branch_balance1')";
			if ($conn->query($sql2)) {
// 			  $sql21 = "update base set balance='$total'";
// 			if ($conn->query($sql21)) {
				// header("location: base.php");
				// echo "<script>alert('Data Save Successfully')</script>";
				echo "<script type='text/javascript'>

                     $(document).ready(function() {
                      Swal.fire({
                  
                  text: 'New LR Form Created',
                  icon: 'success',
                  confirmButtonColor: '#1BC5BD',
                  button: 'Dashboard!',
                            })
                            
                     });

                </script>";
			} else {
				echo mysqli_error($conn);
// 			}
			}
				}
		} else {
			//  	echo "<script>alert('Data Save Successfully')</script>";
			echo "<script type='text/javascript'>

                     $(document).ready(function() {
                      Swal.fire({
                  
                  text: 'New LR Form Created',
                  icon: 'success',
                  confirmButtonColor: '#1BC5BD',
                  button: 'Dashboard!',
                            })
                            
                     });

                </script>";
		}
	}
}
?>
<style>
    .card.card-custom > .card-body {
        padding: 10px !important;
    }
    .form-group .form-text {
        font-size: 9px !important;
    }
    .form-group label {
        font-size: 12px !important;
    }
    .text-muted {
        color: #000 !important;
    }
    .form-group {
        margin-bottom:0px !important;
    }
</style>
<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
	<!--begin::Content-->
	<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Subheader-->
		<div class="subheader py-3 py-lg-2  subheader-transparent " id="kt_subheader">
			<div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
				<!--begin::Info-->
				<div class="d-flex align-items-center flex-wrap mr-1">

					<!--begin::Page Heading-->
					<div class="d-flex align-items-baseline flex-wrap mr-5">
						<!--begin::Page Title-->
						<h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">
							LR Form
						</h2>
						<!--end::Page Title-->

						<!--begin::Breadcrumb-->
						<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
							<!--<li class="breadcrumb-item">-->
							<!--       <a href="" class="text-muted">-->
							<!--              Forms </a>-->
							<!--</li>-->
							<!--<li class="breadcrumb-item">-->
							<!--	<a href="" class="text-muted">-->
							<!--		Form Validation </a>-->
							<!--</li>-->
							<!--<li class="breadcrumb-item">-->
							<!--	<a href="" class="text-muted">-->
							<!--		LR Form </a>-->
							<!--</li>-->
						</ul>
						<!--end::Breadcrumb-->
					</div>
					<!--end::Page Heading-->
				</div>
				<!--end::Info-->

				<!--begin::Toolbar-->
				<div class="d-flex align-items-center">
					<!--begin::Button-->
					<!--<a href="#" class="btn btn-fixed-height btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">-->
					<!--    <span class="svg-icon svg-icon-success svg-icon-lg">-->
					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<!--            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
						<!--                <polygon points="0 0 24 0 24 24 0 24" />-->
						<!--                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />-->
						<!--                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />-->
						<!--            </g>-->
						<!--        </svg>-->
						<!--end::Svg Icon-->
						<!--    </span> New Member-->
						<!--</a>-->
						<!--end::Button-->

						<!--begin::Dropdown-->
						<!--<div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">-->
						<!--    <a href="#" class="btn btn-fixed-height btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
						<!--        <span class="svg-icon svg-icon-success svg-icon-lg">-->
						<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<!--                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
							<!--                    <polygon points="0 0 24 0 24 24 0 24" />-->
							<!--                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />-->
							<!--                    <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1" />-->
							<!--                    <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1" />-->
							<!--                </g>-->
							<!--            </svg>-->
							<!--end::Svg Icon-->
							<!--        </span> New Report-->
							<!--    </a>-->
							<!--    <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">-->
							<!--begin::Navigation-->
							<!--        <ul class="navi navi-hover">-->
							<!--            <li class="navi-header font-weight-bold py-4">-->
							<!--                <span class="font-size-lg">Choose Label:</span>-->
							<!--                <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>-->
							<!--            </li>-->
							<!--            <li class="navi-separator mb-3 opacity-70"></li>-->
							<!--            <li class="navi-item">-->
							<!--                <a href="#" class="navi-link">-->
							<!--                    <span class="navi-text">-->
							<!--                        <span class="label label-xl label-inline label-light-success">Customer</span>-->
							<!--                    </span>-->
							<!--                </a>-->
							<!--            </li>-->
							<!--            <li class="navi-item">-->
							<!--                <a href="#" class="navi-link">-->
							<!--                    <span class="navi-text">-->
							<!--                        <span class="label label-xl label-inline label-light-danger">Partner</span>-->
							<!--                    </span>-->
							<!--                </a>-->
							<!--            </li>-->
							<!--            <li class="navi-item">-->
							<!--                <a href="#" class="navi-link">-->
							<!--                    <span class="navi-text">-->
							<!--                        <span class="label label-xl label-inline label-light-warning">Suplier</span>-->
							<!--                    </span>-->
							<!--                </a>-->
							<!--            </li>-->
							<!--            <li class="navi-item">-->
							<!--                <a href="#" class="navi-link">-->
							<!--                    <span class="navi-text">-->
							<!--                        <span class="label label-xl label-inline label-light-primary">Member</span>-->
							<!--                    </span>-->
							<!--                </a>-->
							<!--            </li>-->
							<!--            <li class="navi-item">-->
							<!--                <a href="#" class="navi-link">-->
							<!--                    <span class="navi-text">-->
							<!--                        <span class="label label-xl label-inline label-light-dark">Staff</span>-->
							<!--                    </span>-->
							<!--                </a>-->
							<!--            </li>-->
							<!--            <li class="navi-separator mt-3 opacity-70"></li>-->
							<!--            <li class="navi-footer py-4">-->
							<!--                <a class="btn btn-clean font-weight-bold btn-sm" href="#">-->
							<!--                    <i class="ki ki-plus icon-sm"></i>-->
							<!--                    Add new-->
							<!--                </a>-->
							<!--            </li>-->
							<!--        </ul>-->
							<!--end::Navigation-->
							<!--    </div>-->
							<!--</div>-->
							<!--end::Dropdown-->

							<!--begin::Button-->
							<!--<a href="#" class="btn btn-success btn-icon font-weight-bold" data-toggle="modal" data-target="#kt_chat_modal">-->
							<!--    <span class="svg-icon svg-icon-lg">-->
							<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<!--            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
								<!--                <rect x="0" y="0" width="24" height="24" />-->
								<!--                <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />-->
								<!--                <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />-->
								<!--            </g>-->
								<!--        </svg>-->
								<!--end::Svg Icon-->
								<!--    </span> </a>-->
								<!--end::Button-->
				</div>
				<!--end::Toolbar-->
			</div>
		</div>
		<!--end::Subheader-->

		<!--begin::Entry-->
		<div class="d-flex flex-column-fluid">
			<!--begin::Container-->
			<div class=" container-fluid">
				<!--begin::Notice-->
				<!--<div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">-->
				<!--       <div class="alert-icon"><span class="svg-icon svg-icon-primary svg-icon-xl">-->
				<!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<!--                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
					<!--                                   <rect x="0" y="0" width="24" height="24" />-->
					<!--                                   <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />-->
					<!--                                   <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />-->
					<!--                            </g>-->
					<!--                     </svg>-->
					<!--end::Svg Icon-->
					<!--              </span></div>-->
					<!--       <div class="alert-text">-->
					<!--              Metronic fully integrates FormValidation, the best Premium From Validation Library for JavaScript. Zero dependencies!-->
					<!--              <br />-->
					<!--              For more info please visit <a class="font-weight-bold" href="https://formvalidation.io/" target="_blank">FormValidation Home</a>-->
					<!--       </div>-->
					<!--</div>-->
					<!--end::Notice-->

					<!--begin::Card-->
					<div class="row">

						<div class="col-lg-12">
							<form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
								<!--begin::Card-->
								
								<?php
						if ($_SESSION['role'] == "super_admin") {
						?>
						
								<div class="row">
									<div class="col-lg-6">
										<div class="card card-custom  example-compact">

											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>Booking</b>
												</h3>

											</div>
											<div class="card-body">
												<!--begin: Code-->


												<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
													<div class="alert-icon"><i class="flaticon2-information"></i></div>
													<div class="alert-text  font-weight-bold">
														Oh snap! Change a few things up and try submitting again.
													</div>
													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span><i class="ki ki-close "></i></span>
														</button>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Customer type <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<select class="form-control" name="customer_type" id="customer_type" required>
															<option selected disabled>Select</option>
															<option value="party">Party</option>
															<option value="customer">Customer</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												<!--</div>-->
												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Booking type <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<select class="form-control" name="booking_type" id="booking_type" required>
															<option selected disabled>Select</option>
															<option value="booking">Booking</option>
															<option value="lease">Lease</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												<!--</div>-->
												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">LR No <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<input type="text" class="form-control" name="lr_no" id="lr_no" placeholder="Enter your LR No" required />
														<span class="form-text text-muted">We'll never share your LR No with anyone else.</span>
													</div>
												<!--</div>-->
												<!--<div class="form-group row">-->
												<!--	<label class="col-form-label text-right col-lg-3 col-sm-12">Railway no </label>-->
												<!--	<div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--		<input type="text" class="form-control" name="railway_no" id="railway_no" placeholder="Enter your Railway No" required />-->
												<!--		<span class="form-text text-muted">We'll never share your Railway no with anyone else.</span>-->
												<!--	</div>-->
												<!--</div>-->
												
												<!--<div class="form-group row" id="optClass99">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Consignment Type <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<select class="form-control" name="consignment_type" id="consignment_type" required>
															<option selected disabled>Select</option>
															<option value="tbb">TBB</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												<!--</div>-->
												
												<!--<div class="form-group row" id="optClass109" style="display:none;">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Consignment Type <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<select class="form-control" name="consignment_type" id="consignment_type" required>
															<option selected disabled>Select</option>
															<option value="tbb">TBB</option>
															<option value="pay">To Pay</option>
															<option value="month">Month</option>
															<option value="paid">Paid</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												<!--</div>-->
												<!--<div class="form-group row" id="optClass19" style="display:none;">-->
												<!--	
												<!--	$sql = "select * from company";-->
												<!--	$result = mysqli_query($conn, $sql);-->
												<!--	$com = mysqli_fetch_assoc($result);-->

												<!--	$auto_company_name = $com['company_name'];-->
												<!--	?>-->

												<!--	<label class="col-form-label text-right col-lg-3 col-sm-12">Company Name</label>-->
												<!--	<div class="col-lg-9 col-md-9 col-sm-12" id="from_companyname">-->
												<!--		<input type="text" class="form-control" name="company_name" list="brow1" id="company_name" placeholder="Company Name" />-->
												<!--	</div><br><br>-->

													<!--<label class="col-form-label text-right col-lg-3 col-sm-12">Vehicle Halting Charge </label>-->
													<!--<div class="col-lg-9 col-md-9 col-sm-12">-->
													<!--	<input type="text" class="form-control" name="vehicle_halting" id="vehicle_halting" placeholder="Enter your Vehicle Halting No" />-->
													<!--</div>-->

													<!--<label class="col-form-label text-right col-lg-3 col-sm-12">Unloading Charge </label>-->
													<!--<div class="col-lg-9 col-md-9 col-sm-12">-->
													<!--	<input type="text" class="form-control" name="unloading_charge" id="unloading_charge" placeholder="Enter your Unloading Charge " />-->
													<!--</div>-->
												<!--</div>-->
<!--<div class="form-group row" id="browser" style="display:none;">-->
    <label class="col-form-label text-right col-lg-3 col-sm-12">Company Name</label>
    <div class="col-lg-3 col-md-3 col-sm-12" >
	     <input class="form-control" list="browsers" name="company_name" id="company_name">
												<datalist id="browsers" >
												    <option value="">choose name</option>
												    <?php 
												    $sql = "select distinct company_name from company";
													$result = $conn->query($sql);
													while ($allfilter = $result->FETCH_ASSOC()) {
													 echo'<option>'.$allfilter["company_name"].'</option>';
													}
												    ?>
												    </div><br><br>
												</datalist>
												
												
													<label class="col-form-label text-right col-lg-3 col-sm-12">Invoice No </label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<input type="text" class="form-control" name="invoice_no" id="invoice_no" placeholder="Enter your Invoice No" />
													</div><br><br>
												<!--</div>-->
												
												<!--<div class="form-group row" onchange="status11(this)">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Invoice Type <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<select class="form-control" name="invoice_type" id="invoice_type" required>
															<option selected disabled>Select</option>
															<option value="binvoice">B - Invoice</option>
															<option value="vestimate">V - Estimate</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												<!--</div>-->

												<!--<div class="form-group row" onchange="status2(this);">-->
												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">Mode of Transport <span style="color:red">*</span></label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <select class="form-control" name="mode_transport" id="mode_transport" required>-->
												<!--            <option selected disabled>Select</option>-->
												<!--            <option value="road">Road</option>-->
												<!--            <option value="train">Train</option>-->
												<!--            <option value="air">Air</option>-->
												<!--        </select>-->
												<!--        <span class="form-text text-muted">Please select an option.</span>-->
												<!--    </div>-->
												<!--</div>-->
												<!--<div class="form-group row" id="productoptClass" style="display:none;">-->
												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">Lorry No </label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <input type="text" class="form-control" name="lorry_no" id="lorry_no" placeholder="Enter your Lorry No" />-->
												<!--        <span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
												<!--    </div>-->
												<!--</div>-->
												<!--<div class="form-group row" id="productoptClass1" style="display:none;">-->
												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">Train Type </label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <select class="form-control" name="train_type" id="train_type">-->
												<!--            <option selected disabled>Select</option>-->
												<!--            <option value="rear">Rear</option>-->
												<!--            <option value="front">Front</option>-->
												<!--        </select>-->
												<!--        <span class="form-text text-muted">Please select an option.</span>-->
												<!--    </div>-->

												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">RR No </label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <input type="text" class="form-control" name="RR_No" id="RR_No" placeholder="Enter your Lorry No" />-->
												<!--        <span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
												<!--    </div>-->

												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">Train No </label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <input type="text" class="form-control" name="train_No" id="train_No" placeholder="Enter your Train No" />-->
												<!--        <span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
												<!--    </div>-->
												<!--</div>-->
												<!--<div class="form-group row" id="productoptClass2" style="display:none;">-->
												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">Flight No </label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <input type="text" class="form-control" name="flight_no" id="flight_no" placeholder="Enter your Flight No" />-->
												<!--        <span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
												<!--    </div>-->
												<!--</div>-->

												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Internal Info </label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<input type="text" class="form-control" name="internal_info" id="internal_info" placeholder="Enter your Internal Info" />
														<span class="form-text text-muted">We'll never share your Internal Info with anyone else.</span>
													</div>
												<!--</div>-->
												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Eway Bill No </label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<input type="text" class="form-control" name="eway_bill" id="eway_bill" placeholder="Enter your Eway Bill" />
														<span class="form-text text-muted">We'll never share your Eway Bill No with anyone else.</span>
													</div>
												</div>

											</div>



											<!--<div class="card-header">-->
											<!--    <h3 class="card-title">-->
											<!--        Tracking-->
											<!--    </h3>-->

											<!--</div>-->


											<!--<div class="card-body">-->
											<!--begin: Code-->


											<!--    <div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">-->
											<!--        <div class="alert-icon"><i class="flaticon2-information"></i></div>-->

											<!--        <div class="alert-close">-->
											<!--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
											<!--                <span><i class="ki ki-close "></i></span>-->
											<!--            </button>-->
											<!--        </div>-->
											<!--    </div>-->

											<!--    <div class="form-group row">-->
											<!--        <label class="col-form-label text-right col-lg-3 col-sm-12">No of Stop <span style="color:red">*</span></label>-->
											<!--        <div class="col-lg-9 col-md-9 col-sm-12">-->
											<!--            <select class="form-control" aria-label="Default select example" id="no_stop" name="no_stop" required>-->
											<!--                <option selected disabled>Select</option>-->
											<!--            </select>-->
											<!--        </div>-->
											<!--    </div>-->
											<!--    <div class="row mb-3">-->
											<!--        <div id="emi_list_disp"></div>-->
											<!--    </div>-->

											<!--<div class="form-group row">-->
											<!--       <label class="col-form-label text-right col-lg-3 col-sm-12">No of Stop <span style="color:red">*</span></label>-->
											<!--       <div class="col-lg-9 col-md-9 col-sm-12">-->
											<!--              <select class="form-control" name="no_stop" id="no_stop" required>-->
											<!--                     <option selected disabled>Select</option>-->
											<!--                     <option value="1">1</option>-->
											<!--                     <option value="2">2</option>-->
											<!--                     <option value="3">3</option>-->


											<!--              </select>-->
											<!--              <span class="form-text text-muted">Please select an option.</span>-->
											<!--       </div>-->
											<!--</div>-->
											<!--<div class="form-group row">-->
											<!--       <label class="col-form-label text-right col-lg-3 col-sm-12">Destination <span style="color:red">*</span></label>-->
											<!--       <div class="col-lg-4 col-md-4 col-sm-12">-->
											<!--              <input type="text" class="form-control" name="destination" id="destination" placeholder="Enter your Destination" />-->
											<!--       </div>-->
											<!--       <div class="col-lg-4 col-md-4 col-sm-12">-->
											<!--              <div class="input-group input-group-solid date" id="kt_datetimepicker_3" data-target-input="nearest">-->
											<!--                     <input type="text" class="form-control form-control-solid datetimepicker-input" placeholder="Select date & time" data-target="#kt_datetimepicker_3" />-->
											<!--                     <div class="input-group-append" data-target="#kt_datetimepicker_3" data-toggle="datetimepicker">-->
											<!--                            <span class="input-group-text">-->
											<!--                                   <i class="ki ki-calendar"></i>-->
											<!--                            </span>-->
											<!--                     </div>-->
											<!--              </div>-->
											<!--       </div>-->
											<!--</div>-->




											<!--</div>-->


											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>Values</b>
												</h3>

											</div>
											<div class="card-body">
												<!--begin: Code-->


												<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
													<div class="alert-icon"><i class="flaticon2-information"></i></div>

													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span><i class="ki ki-close"></i></span>
														</button>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Material Name</label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="material_name" id="material_name" placeholder="Enter Material Name" />
														</div>
														<span class="form-text text-muted">Please enter Name</span>
													</div>
												<!--</div>-->

												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Quantity in KG <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="quantity_kg" id="quantity_kg" placeholder="Enter Quantity in KG" required />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												<!--</div>-->

												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Quantity in Nos <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="quantity_nos" id="quantity_nos" placeholder="Enter Quantity in Nos" required />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												<!--</div>-->


												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Rate per unit <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="rate" id="rate" placeholder="Enter Rate per unit" required />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												<!--</div>-->
                                                	<div class="col-lg-3 col-md-3 col-sm-12">
        												<!--&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;-->
        												<input type="radio" id="quantity_kg_radio" name="quantitynos_radio" value="quantity_kg" required>
        												<label for="quantity_kg">Quantity in KG</label>
        									    	</div>
        									    	<div class="col-lg-3 col-md-3 col-sm-12">
        												<!--&ensp;&ensp;&ensp;&ensp;&ensp;-->
        												<input type="radio" id="quantity_nos_radio" name="quantitynos_radio" value="quantity_nos" required>
        												<label for="quantity_nos">Quantity Nos</label>
        										    </div>


												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Docket Charge</label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="docket_charge" id="docket_charge" placeholder="Enter Docket Charge" />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												</div>
												<!--<div class="form-group row">-->
												<!--	<label class="col-form-label text-right col-lg-3 col-sm-12">CD Charge</label>-->
												<!--	<div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--		<div class="input-group">-->
												<!--			<div class="input-group-prepend">-->
												<!--				<span class="input-group-text"><i class="flaticon2-browser"></i></span>-->
												<!--			</div>-->
												<!--			<input type="text" class="form-control" name="cd_charge" id="cd_charge" placeholder="Enter CD Charge" />-->
												<!--		</div>-->
												<!--		<span class="form-text text-muted">Please enter only digits</span>-->
												<!--	</div>-->
												<!--</div>-->

												<!--<div class="form-group row" id="optClass" style="display:none;" onchange="status1(this)">-->
												<!--    <label class="col-3 col-form-label">GST</label>-->
												<!--    <div class="col-9 col-form-label">-->
												<!--        <div class="radio-inline">-->
												<!--            <label class="radio radio-success">-->
												<!--                <input type="radio" name="gst" />-->
												<!--                <span></span>-->
												<!--                State-->
												<!--            </label>-->
												<!--            <label class="radio radio-success">-->
												<!--                <input type="radio" name="gst" checked="checked" />-->
												<!--                <span></span>-->
												<!--                Inter State-->
												<!--            </label>-->

												<!--        </div>-->
												<!--        <span class="form-text text-muted">Some help text goes here</span>-->
												<!--    </div>-->
												<!--</div>-->

												<!--<div class="form-group row" id="optClass" style="display:none;" onchange="status1(this);">-->
												<!--	<label class="col-form-label text-right col-lg-3 col-sm-12">GST</label>-->
												<!--	<div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--		<select class="form-control" name="gst" id="gst">-->
												<!--			<option selected disabled>Select</option>-->
												<!--			<option value="state">State</option>-->
												<!--			<option value="interstate">Inter State</option>-->
												<!--		</select>-->
												<!--	</div>-->
												<!--</div>-->

												<div class="form-group row" id="optClass" style="display:none;" onchange="status1(this);">
													<label class="col-form-label text-right col-lg-3 col-sm-12">GST</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="gst" id="gst">
															<option selected disabled>Select</option>
															<option value="yes">Yes</option>
															<option value="no">No</option>
														</select>
													</div>
												</div>


												<div class="form-group row" id="gstoptClass1" style="display:none;">
													<label class="col-form-label text-right col-lg-3 col-sm-12">GST% <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="gstamount" id="gstamount" placeholder="Enter GST Amount" />
														</div>
													</div>
													<!--<label class="col-form-label text-right col-lg-3 col-sm-12">SGST% <span style="color:red">*</span></label>-->
													<!--<div class="col-lg-9 col-md-9 col-sm-12">-->
													<!--	<div class="input-group">-->
													<!--		<div class="input-group-prepend">-->
													<!--			<span class="input-group-text"><i class="flaticon2-browser"></i></span>-->
													<!--		</div>-->
													<!--		<input type="text" class="form-control" name="sgst" id="sgst" placeholder="Enter SGST" />-->
													<!--	</div>-->
													<!--	<span class="form-text text-muted">Please enter only digits</span>-->
													<!--</div>-->
												</div>
												<!--<div class="form-group row" id="gstoptClass2" style="display:none;">-->
												<!--	<label class="col-form-label text-right col-lg-3 col-sm-12">IGST% <span style="color:red">*</span></label>-->
												<!--	<div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--		<div class="input-group">-->
												<!--			<div class="input-group-prepend">-->
												<!--				<span class="input-group-text"><i class="flaticon2-browser"></i></span>-->
												<!--			</div>-->
												<!--			<input type="text" class="form-control" name="igst" id="igst" placeholder="Enter IGST" />-->
												<!--		</div>-->
												<!--		<span class="form-text text-muted">Please enter only digits</span>-->
												<!--	</div>-->
												<!--</div>-->

												<div class="form-group row" id="optClass29">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Agent's Commission</label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="agent_commission" id="agent_commission" placeholder="Enter Agent's Commission" />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												</div>
												
<div class="form-group row" id="optClass59" style="display:none;">
    <label class="col-form-label text-right col-lg-3 col-sm-12">Vehicle Halting Charge </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="vehicle_halting" id="vehicle_halting" placeholder="Enter your Vehicle Halting No" />
													</div>

													<label class="col-form-label text-right col-lg-3 col-sm-12">Unloading Charge </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="unloading_charge" id="unloading_charge" placeholder="Enter your Unloading Charge " />
													</div>
												</div>

											</div>


											<!--end::Form-->
										</div>
									</div>
									<div class="col-lg-6">
										<div class="card card-custom example-compact">

											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>From</b>
												</h3>
											</div>

											<div class="card-body" id="optClass49">
												<?php
												$sql = "select * from customer where user_id=$userId";
												$result = mysqli_query($conn, $sql);
												$rec = mysqli_fetch_assoc($result);
												$auto_id = $rec['from_cx_id'];
												$auto_name = $rec['from_name'];
												$auto_address = $rec['from_address'];
												$auto_contact = $rec['from_contact'];
												?>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12" id="from_detail">
														<input type="text" class="form-control" name="from_name" id="from_name"  list="myCompanies" placeholder="Enter your Name"  />
														<datalist id="myCompanies">  
   
                                                        </datalist>
													
														<span class="form-text text-muted">We'll never share your name No with anyone else.</span>
													</div>
												<!--</div>-->
												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-3 col-md-3 col-sm-12" id="from_address_detail">
														<input type="text" class="form-control" name="from_address" id="from_address" placeholder="Enter your Address" />
														<span class="form-text text-muted">We'll never share your Address with anyone else.</span>
													</div>
												<!--</div>-->
												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12" id="from_contact_detail">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<!--<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="from_contact" id="from_contact" list="contact" placeholder="Enter Contact No" required />-->
															<input type="text" class="form-control" name="from_contact" list="contact" id="from_contact" placeholder="Enter Contact No"  />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												</div>
												<div class="form-group row" style="display:none">
													<label class="col-form-label text-right col-lg-3 col-sm-12">customer Id<span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12" id="from_id">
														<input type="text" class="form-control" name="from_cx_id" id="from_cx_id" id="from_cx_id" placeholder="Enter your id"  />
														<span class="form-text text-muted">We'll never share your name No with anyone else.</span>
													</div>
												</div>
											</div>


											<div class="card-body" id="optClass39" style="display:none">
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<input type="text" class="form-control" name="from_name1" id="from_name1" placeholder="Enter your Name" />
														<span class="form-text text-muted">We'll never share your name No with anyone else.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<input type="text" class="form-control" name="from_address1" id="from_address1" placeholder="Enter your Address" />
														<span class="form-text text-muted">We'll never share your Address with anyone else.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="from_contact1" id="from_contact1" list="contact" placeholder="Enter Contact No"  />
															<!--<input type="text" class="form-control" name="from_contact" id="from_contact" placeholder="Enter Contact No" />-->
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												</div>
											</div>



											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>To</b>
												</h3>

											</div>
											<div class="card-body">
												<!--begin: Code-->


												<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
													<div class="alert-icon"><i class="flaticon2-information"></i></div>
													<div class="alert-text  font-weight-bold">
														Oh snap! Change a few things up and try submitting again.
													</div>
													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span><i class="ki ki-close "></i></span>
														</button>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<input type="text" class="form-control" name="to_name" id="to_name" placeholder="Enter your Name" required />
														<span class="form-text text-muted">We'll never share your name No with anyone else.</span>
													</div>
												<!--</div>-->
												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<input type="text" class="form-control" name="to_address" id="to_address" placeholder="Enter your Address" />
														<span class="form-text text-muted">We'll never share your address with anyone else.</span>
													</div>
												<!--</div>-->
												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<!--<input type="text" class="form-control" name="to_contact" id="to_contact" placeholder="Enter Contact No" required />-->
															<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="to_contact" id="to_contact" placeholder="Enter Contact No" required />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												</div>


											</div>

											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>Agent</b>
												</h3>

											</div>

											<div class="card-body">
												<!--begin: Code-->


												<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
													<div class="alert-icon"><i class="flaticon2-information"></i></div>
													<div class="alert-text  font-weight-bold">
														Oh snap! Change a few things up and try submitting again.
													</div>
													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span><i class="ki ki-close "></i></span>
														</button>
													</div>
												</div>
												<div class="form-group row" onchange="status2(this)">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Agent <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<select class="form-control" name="agent" id="agent" required>
															<option selected disabled>Select</option>
															<option value="yes">Yes</option>
															<option value="no">No</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												</div>
												<div class="form-group row" id="agentoptClass" >
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<input type="text" class="form-control" name="agent_name" id="agent_name" placeholder="Enter your Name" />
														<span class="form-text text-muted">We'll never share your name No with anyone else.</span>
													</div>
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<!--<input type="text" class="form-control" name="agent_contact" id="agent_contact" placeholder="Enter Contact No" />-->
															<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="agent_contact" id="agent_contact" placeholder="Enter Contact No" />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
													<label class="col-form-label text-right col-lg-3 col-sm-12">City </label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<input type="text" class="form-control" name="agent_city" id="agent_city" placeholder="Enter your City" />
														<span class="form-text text-muted">We'll never share your address with anyone else.</span>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Delivery Message </label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<input type="text" class="form-control" name="delivery_message" id="delivery_message" placeholder="Enter your Delivery Message" />
														<span class="form-text text-muted">We'll never share your delivery message with anyone else.</span>
													</div>
												</div>

											</div>


											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>Auto Values</b>
												</h3>

											</div>

											<div class="card-body">
												<!--begin: Code-->


												<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
													<div class="alert-icon"><i class="flaticon2-information"></i></div>
													<div class="alert-text  font-weight-bold">
														Oh snap! Change a few things up and try submitting again.
													</div>
													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span><i class="ki ki-close "></i></span>
														</button>
													</div>
												</div>
												<div class="row">
												    <div class="col-lg-3 col-md-3 col-sm-12 form-group">
													<label>Bill amount</label>
													<input type="text" id="bill_amount" name="bill_amount" class="form-control" readonly placeholder="Disabled input" />
												</div>
												<div class="col-lg-3 col-md-3 col-sm-12 form-group">
													<label>Sub Total</label>
													<input type="text" id="subtotal" name="subtotal" class="form-control" readonly placeholder="Disabled input" />
												</div>
												<div class="col-lg-3 col-md-3 col-sm-12 form-group">
													<label>GST</label>
													<input type="text" id="gstamount_value" name="gstamount_value" class="form-control" readonly placeholder="Disabled input" />
												</div>
												<div class="col-lg-3 col-md-3 col-sm-12 form-group">
													<label>Total</label>
													<input type="text" id="total" name="total" class="form-control" readonly placeholder="Disabled input" />
												</div>
												</div>
												

											</div>




											<!--end::Form-->
										</div>
										<div class="card-footer">
											<div class="row">
												<div class="col-lg-12">
													<button type="submit" class="btn btn-primary font-weight-bold mr-2" name="register" id="submit">Submit</button>
													<!--<button type="reset" class="btn btn-light-primary font-weight-bold">Cancel</button>-->
												</div>
											</div>
										</div>
									</div>

								</div>
								<!--end::Card-->
							</form>
						</div>
						
						<?php
						} elseif ($_SESSION['role'] == "admin") {
						?>
						
							<div class="row">
									<div class="col-lg-6">
										<div class="card card-custom  example-compact">

											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>Booking</b>
												</h3>

											</div>
											<div class="card-body">
												<!--begin: Code-->


												<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
													<div class="alert-icon"><i class="flaticon2-information"></i></div>
													<div class="alert-text  font-weight-bold">
														Oh snap! Change a few things up and try submitting again.
													</div>
													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span><i class="ki ki-close "></i></span>
														</button>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Customer type <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="customer_type" id="customer_type" required>
															<option selected disabled>Select</option>
															<option value="party">Party</option>
															<option value="customer">Customer</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Booking type <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="booking_type" id="booking_type" required>
															<option selected disabled>Select</option>
															<option value="booking">Booking</option>
															<option value="lease">Lease</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">LR No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="lr_no" id="lr_no" placeholder="Enter your LR No" required />
														<span class="form-text text-muted">We'll never share your LR No with anyone else.</span>
													</div>
												</div>
												<!--<div class="form-group row">-->
												<!--	<label class="col-form-label text-right col-lg-3 col-sm-12">Railway no </label>-->
												<!--	<div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--		<input type="text" class="form-control" name="railway_no" id="railway_no" placeholder="Enter your Railway No" required />-->
												<!--		<span class="form-text text-muted">We'll never share your Railway no with anyone else.</span>-->
												<!--	</div>-->
												<!--</div>-->
												<div class="form-group row" id="optClass99">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Consignment Type <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="consignment_type" id="consignment_type" required>
															<option selected disabled>Select</option>
															<option value="tbb">TBB</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												</div>
												
												<div class="form-group row" id="optClass109" style="display:none;">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Consignment Type <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="consignment_type" id="consignment_type" required>
															<option selected disabled>Select</option>
															<option value="tbb">TBB</option>
															<option value="pay">To Pay</option>
															<option value="month">Month</option>
															<option value="paid">Paid</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												</div>

												<!--<div class="form-group row" id="optClass19" style="display:none;">-->
												<!--	
												<!--	$sql = "select * from company";-->
												<!--	$result = mysqli_query($conn, $sql);-->
												<!--	$com = mysqli_fetch_assoc($result);-->

												<!--	$auto_company_name = $com['company_name'];-->
												<!--	?>-->

												<!--	<label class="col-form-label text-right col-lg-3 col-sm-12">Company Name</label>-->
												<!--	<div class="col-lg-9 col-md-9 col-sm-12" id="from_companyname">-->
												<!--		<input type="text" class="form-control" name="company_name" list="brow1" id="company_name" placeholder="Company Name" />-->
												<!--	</div><br><br>-->

													<!--<label class="col-form-label text-right col-lg-3 col-sm-12">Vehicle Halting Charge </label>-->
													<!--<div class="col-lg-9 col-md-9 col-sm-12">-->
													<!--	<input type="text" class="form-control" name="vehicle_halting" id="vehicle_halting" placeholder="Enter your Vehicle Halting No" />-->
													<!--</div>-->

													<!--<label class="col-form-label text-right col-lg-3 col-sm-12">Unloading Charge </label>-->
													<!--<div class="col-lg-9 col-md-9 col-sm-12">-->
													<!--	<input type="text" class="form-control" name="unloading_charge" id="unloading_charge" placeholder="Enter your Unloading Charge " />-->
													<!--</div>-->
												<!--</div>-->
<div class="form-group row" id="browser" style="display:none;">
    <label class="col-form-label text-right col-lg-3 col-sm-12">Company Name</label>
    <div class="col-lg-9 col-md-9 col-sm-12" >
	     <input class="form-control" list="browsers" name="company_name" id="company_name">
												<datalist id="browsers" >
												    <option value="">choose name</option>
												    <?php 
												    $sql = "select distinct company_name from company where branch='$branch'";
													$result = $conn->query($sql);
													while ($allfilter = $result->FETCH_ASSOC()) {
													 echo'<option>'.$allfilter["company_name"].'</option>';
													}
												    ?>
												    </div><br><br>
												</datalist>
												
												
													<label class="col-form-label text-right col-lg-3 col-sm-12">Invoice No </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="invoice_no" id="invoice_no" placeholder="Enter your Invoice No" />
													</div><br><br>
												</div>
												
												<div class="form-group row" onchange="status11(this)">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Invoice Type <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="invoice_type" id="invoice_type" required>
															<option selected disabled>Select</option>
															<option value="binvoice">B - Invoice</option>
															<option value="vestimate">V - Estimate</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												</div>

												<!--<div class="form-group row" onchange="status2(this);">-->
												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">Mode of Transport <span style="color:red">*</span></label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <select class="form-control" name="mode_transport" id="mode_transport" required>-->
												<!--            <option selected disabled>Select</option>-->
												<!--            <option value="road">Road</option>-->
												<!--            <option value="train">Train</option>-->
												<!--            <option value="air">Air</option>-->
												<!--        </select>-->
												<!--        <span class="form-text text-muted">Please select an option.</span>-->
												<!--    </div>-->
												<!--</div>-->
												<!--<div class="form-group row" id="productoptClass" style="display:none;">-->
												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">Lorry No </label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <input type="text" class="form-control" name="lorry_no" id="lorry_no" placeholder="Enter your Lorry No" />-->
												<!--        <span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
												<!--    </div>-->
												<!--</div>-->
												<!--<div class="form-group row" id="productoptClass1" style="display:none;">-->
												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">Train Type </label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <select class="form-control" name="train_type" id="train_type">-->
												<!--            <option selected disabled>Select</option>-->
												<!--            <option value="rear">Rear</option>-->
												<!--            <option value="front">Front</option>-->
												<!--        </select>-->
												<!--        <span class="form-text text-muted">Please select an option.</span>-->
												<!--    </div>-->

												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">RR No </label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <input type="text" class="form-control" name="RR_No" id="RR_No" placeholder="Enter your Lorry No" />-->
												<!--        <span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
												<!--    </div>-->

												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">Train No </label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <input type="text" class="form-control" name="train_No" id="train_No" placeholder="Enter your Train No" />-->
												<!--        <span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
												<!--    </div>-->
												<!--</div>-->
												<!--<div class="form-group row" id="productoptClass2" style="display:none;">-->
												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">Flight No </label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <input type="text" class="form-control" name="flight_no" id="flight_no" placeholder="Enter your Flight No" />-->
												<!--        <span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
												<!--    </div>-->
												<!--</div>-->

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Internal Info </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="internal_info" id="internal_info" placeholder="Enter your Internal Info" />
														<span class="form-text text-muted">We'll never share your Internal Info with anyone else.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Eway Bill No </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="eway_bill" id="eway_bill" placeholder="Enter your Eway Bill" />
														<span class="form-text text-muted">We'll never share your Eway Bill No with anyone else.</span>
													</div>
												</div>

											</div>



											<!--<div class="card-header">-->
											<!--    <h3 class="card-title">-->
											<!--        Tracking-->
											<!--    </h3>-->

											<!--</div>-->


											<!--<div class="card-body">-->
											<!--begin: Code-->


											<!--    <div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">-->
											<!--        <div class="alert-icon"><i class="flaticon2-information"></i></div>-->

											<!--        <div class="alert-close">-->
											<!--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
											<!--                <span><i class="ki ki-close "></i></span>-->
											<!--            </button>-->
											<!--        </div>-->
											<!--    </div>-->

											<!--    <div class="form-group row">-->
											<!--        <label class="col-form-label text-right col-lg-3 col-sm-12">No of Stop <span style="color:red">*</span></label>-->
											<!--        <div class="col-lg-9 col-md-9 col-sm-12">-->
											<!--            <select class="form-control" aria-label="Default select example" id="no_stop" name="no_stop" required>-->
											<!--                <option selected disabled>Select</option>-->
											<!--            </select>-->
											<!--        </div>-->
											<!--    </div>-->
											<!--    <div class="row mb-3">-->
											<!--        <div id="emi_list_disp"></div>-->
											<!--    </div>-->

											<!--<div class="form-group row">-->
											<!--       <label class="col-form-label text-right col-lg-3 col-sm-12">No of Stop <span style="color:red">*</span></label>-->
											<!--       <div class="col-lg-9 col-md-9 col-sm-12">-->
											<!--              <select class="form-control" name="no_stop" id="no_stop" required>-->
											<!--                     <option selected disabled>Select</option>-->
											<!--                     <option value="1">1</option>-->
											<!--                     <option value="2">2</option>-->
											<!--                     <option value="3">3</option>-->


											<!--              </select>-->
											<!--              <span class="form-text text-muted">Please select an option.</span>-->
											<!--       </div>-->
											<!--</div>-->
											<!--<div class="form-group row">-->
											<!--       <label class="col-form-label text-right col-lg-3 col-sm-12">Destination <span style="color:red">*</span></label>-->
											<!--       <div class="col-lg-4 col-md-4 col-sm-12">-->
											<!--              <input type="text" class="form-control" name="destination" id="destination" placeholder="Enter your Destination" />-->
											<!--       </div>-->
											<!--       <div class="col-lg-4 col-md-4 col-sm-12">-->
											<!--              <div class="input-group input-group-solid date" id="kt_datetimepicker_3" data-target-input="nearest">-->
											<!--                     <input type="text" class="form-control form-control-solid datetimepicker-input" placeholder="Select date & time" data-target="#kt_datetimepicker_3" />-->
											<!--                     <div class="input-group-append" data-target="#kt_datetimepicker_3" data-toggle="datetimepicker">-->
											<!--                            <span class="input-group-text">-->
											<!--                                   <i class="ki ki-calendar"></i>-->
											<!--                            </span>-->
											<!--                     </div>-->
											<!--              </div>-->
											<!--       </div>-->
											<!--</div>-->




											<!--</div>-->


											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>Values</b>
												</h3>

											</div>
											<div class="card-body">
												<!--begin: Code-->


												<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
													<div class="alert-icon"><i class="flaticon2-information"></i></div>

													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span><i class="ki ki-close"></i></span>
														</button>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Material Name</label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="material_name" id="material_name" placeholder="Enter Material Name" />
														</div>
														<span class="form-text text-muted">Please enter Name</span>
													</div>
												<!--</div>-->

												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Quantity in KG <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="quantity_kg" id="quantity_kg" placeholder="Enter Quantity in KG" required />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												<!--</div>-->

												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Quantity in Nos <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="quantity_nos" id="quantity_nos" placeholder="Enter Quantity in Nos" required />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												<!--</div>-->


												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Rate per unit <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="rate" id="rate" placeholder="Enter Rate per unit" required />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												<!--</div>-->

												&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
												<input type="radio" id="quantity_kg_radio" name="quantitynos_radio" value="quantity_kg" required>
												<label for="quantity_kg">Quantity in KG</label>&ensp;&ensp;&ensp;&ensp;&ensp;
												<input type="radio" id="quantity_nos_radio" name="quantitynos_radio" value="quantity_nos" required>
												<label for="quantity_nos">Quantity Nos</label><br><br>


												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Docket Charge</label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="docket_charge" id="docket_charge" placeholder="Enter Docket Charge" />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												</div>
												<!--<div class="form-group row">-->
												<!--	<label class="col-form-label text-right col-lg-3 col-sm-12">CD Charge</label>-->
												<!--	<div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--		<div class="input-group">-->
												<!--			<div class="input-group-prepend">-->
												<!--				<span class="input-group-text"><i class="flaticon2-browser"></i></span>-->
												<!--			</div>-->
												<!--			<input type="text" class="form-control" name="cd_charge" id="cd_charge" placeholder="Enter CD Charge" />-->
												<!--		</div>-->
												<!--		<span class="form-text text-muted">Please enter only digits</span>-->
												<!--	</div>-->
												<!--</div>-->

												<!--<div class="form-group row" id="optClass" style="display:none;" onchange="status1(this)">-->
												<!--    <label class="col-3 col-form-label">GST</label>-->
												<!--    <div class="col-9 col-form-label">-->
												<!--        <div class="radio-inline">-->
												<!--            <label class="radio radio-success">-->
												<!--                <input type="radio" name="gst" />-->
												<!--                <span></span>-->
												<!--                State-->
												<!--            </label>-->
												<!--            <label class="radio radio-success">-->
												<!--                <input type="radio" name="gst" checked="checked" />-->
												<!--                <span></span>-->
												<!--                Inter State-->
												<!--            </label>-->

												<!--        </div>-->
												<!--        <span class="form-text text-muted">Some help text goes here</span>-->
												<!--    </div>-->
												<!--</div>-->

												<!--<div class="form-group row" id="optClass" style="display:none;" onchange="status1(this);">-->
												<!--	<label class="col-form-label text-right col-lg-3 col-sm-12">GST</label>-->
												<!--	<div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--		<select class="form-control" name="gst" id="gst">-->
												<!--			<option selected disabled>Select</option>-->
												<!--			<option value="state">State</option>-->
												<!--			<option value="interstate">Inter State</option>-->
												<!--		</select>-->
												<!--	</div>-->
												<!--</div>-->

												<div class="form-group row" id="optClass" style="display:none;" onchange="status1(this);">
													<label class="col-form-label text-right col-lg-3 col-sm-12">GST</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="gst" id="gst">
															<option selected disabled>Select</option>
															<option value="yes">Yes</option>
															<option value="no">No</option>
														</select>
													</div>
												</div>


												<div class="form-group row" id="gstoptClass1" style="display:none;">
													<label class="col-form-label text-right col-lg-3 col-sm-12">GST% <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="gstamount" id="gstamount" placeholder="Enter GST Amount" />
														</div>
													</div>
													<!--<label class="col-form-label text-right col-lg-3 col-sm-12">SGST% <span style="color:red">*</span></label>-->
													<!--<div class="col-lg-9 col-md-9 col-sm-12">-->
													<!--	<div class="input-group">-->
													<!--		<div class="input-group-prepend">-->
													<!--			<span class="input-group-text"><i class="flaticon2-browser"></i></span>-->
													<!--		</div>-->
													<!--		<input type="text" class="form-control" name="sgst" id="sgst" placeholder="Enter SGST" />-->
													<!--	</div>-->
													<!--	<span class="form-text text-muted">Please enter only digits</span>-->
													<!--</div>-->
												</div>
												<!--<div class="form-group row" id="gstoptClass2" style="display:none;">-->
												<!--	<label class="col-form-label text-right col-lg-3 col-sm-12">IGST% <span style="color:red">*</span></label>-->
												<!--	<div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--		<div class="input-group">-->
												<!--			<div class="input-group-prepend">-->
												<!--				<span class="input-group-text"><i class="flaticon2-browser"></i></span>-->
												<!--			</div>-->
												<!--			<input type="text" class="form-control" name="igst" id="igst" placeholder="Enter IGST" />-->
												<!--		</div>-->
												<!--		<span class="form-text text-muted">Please enter only digits</span>-->
												<!--	</div>-->
												<!--</div>-->

												<div class="form-group row" id="optClass29">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Agent's Commission</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="agent_commission" id="agent_commission" placeholder="Enter Agent's Commission" />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												</div>
												
<div class="form-group row" id="optClass59" style="display:none;">
    <label class="col-form-label text-right col-lg-3 col-sm-12">Vehicle Halting Charge </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="vehicle_halting" id="vehicle_halting" placeholder="Enter your Vehicle Halting No" />
													</div>

													<label class="col-form-label text-right col-lg-3 col-sm-12">Unloading Charge </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="unloading_charge" id="unloading_charge" placeholder="Enter your Unloading Charge " />
													</div>
												</div>

											</div>


											<!--end::Form-->
										</div>
									</div>
									<div class="col-lg-6">
										<div class="card card-custom example-compact">

											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>From</b>
												</h3>
											</div>

											<div class="card-body" id="optClass49">
												<?php
												$sql = "select * from customer where user_id=$userId";
												$result = mysqli_query($conn, $sql);
												$rec = mysqli_fetch_assoc($result);
												$auto_id = $rec['from_cx_id'];
												$auto_name = $rec['from_name'];
												$auto_address = $rec['from_address'];
												$auto_contact = $rec['from_contact'];
												?>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_detail1">
														<input type="text" class="form-control" name="from_name" id="from_name"  list="myCompanies1" placeholder="Enter your Name"  />
														<datalist id="myCompanies1">  
   
                                                        </datalist>
													
														<span class="form-text text-muted">We'll never share your name No with anyone else.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_address_detail1">
														<input type="text" class="form-control" name="from_address" id="from_address" placeholder="Enter your Address" />
														<span class="form-text text-muted">We'll never share your Address with anyone else.</span>
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
															<input type="text" class="form-control" name="from_contact" list="contact" id="from_contact" placeholder="Enter Contact No"  />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												</div>
												<div class="form-group row" style="display:none">
													<label class="col-form-label text-right col-lg-3 col-sm-12">customer Id<span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_id1">
														<input type="text" class="form-control" name="from_cx_id" id="from_cx_id" id="from_cx_id" placeholder="Enter your id"  />
														<span class="form-text text-muted">We'll never share your name No with anyone else.</span>
													</div>
												</div>
											</div>

											<div class="card-body" id="optClass39" style="display:none;">
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="from_name1" id="from_name1" placeholder="Enter your Name" />
														<span class="form-text text-muted">We'll never share your name No with anyone else.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="from_address1" id="from_address1" placeholder="Enter your Address" />
														<span class="form-text text-muted">We'll never share your Address with anyone else.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="from_contact1" id="from_contact1" list="contact" placeholder="Enter Contact No"  />
															<!--<input type="text" class="form-control" name="from_contact" id="from_contact" placeholder="Enter Contact No" />-->
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												</div>
											</div>



											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>To</b>
												</h3>

											</div>
											<div class="card-body">
												<!--begin: Code-->


												<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
													<div class="alert-icon"><i class="flaticon2-information"></i></div>
													<div class="alert-text  font-weight-bold">
														Oh snap! Change a few things up and try submitting again.
													</div>
													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span><i class="ki ki-close "></i></span>
														</button>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="to_name" id="to_name" placeholder="Enter your Name" required />
														<span class="form-text text-muted">We'll never share your name No with anyone else.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="to_address" id="to_address" placeholder="Enter your Address" />
														<span class="form-text text-muted">We'll never share your address with anyone else.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<!--<input type="text" class="form-control" name="to_contact" id="to_contact" placeholder="Enter Contact No" required />-->
															<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="to_contact" id="to_contact" placeholder="Enter Contact No" required />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												</div>


											</div>

											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>Agent</b>
												</h3>

											</div>

											<div class="card-body">
												<!--begin: Code-->


												<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
													<div class="alert-icon"><i class="flaticon2-information"></i></div>
													<div class="alert-text  font-weight-bold">
														Oh snap! Change a few things up and try submitting again.
													</div>
													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span><i class="ki ki-close "></i></span>
														</button>
													</div>
												</div>
												<div class="form-group row" onchange="status2(this)">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Agent <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="agent" id="agent" required>
															<option selected disabled>Select</option>
															<option value="yes">Yes</option>
															<option value="no">No</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												</div>
												<div class="form-group row" id="agentoptClass" >
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="agent_name" id="agent_name" placeholder="Enter your Name" />
														<span class="form-text text-muted">We'll never share your name No with anyone else.</span>
													</div>
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<!--<input type="text" class="form-control" name="agent_contact" id="agent_contact" placeholder="Enter Contact No" />-->
															<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="agent_contact" id="agent_contact" placeholder="Enter Contact No" />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
													<label class="col-form-label text-right col-lg-3 col-sm-12">City </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="agent_city" id="agent_city" placeholder="Enter your City" />
														<span class="form-text text-muted">We'll never share your address with anyone else.</span>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Delivery Message </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="delivery_message" id="delivery_message" placeholder="Enter your Delivery Message" />
														<span class="form-text text-muted">We'll never share your delivery message with anyone else.</span>
													</div>
												</div>

											</div>


											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>Auto Values</b>
												</h3>

											</div>

											<div class="card-body">
												<!--begin: Code-->


												<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
													<div class="alert-icon"><i class="flaticon2-information"></i></div>
													<div class="alert-text  font-weight-bold">
														Oh snap! Change a few things up and try submitting again.
													</div>
													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span><i class="ki ki-close "></i></span>
														</button>
													</div>
												</div>
												<div class="form-group">
													<label>Bill amount</label>
													<input type="text" id="bill_amount" name="bill_amount" class="form-control" readonly placeholder="Disabled input" />
												</div>
												<div class="form-group">
													<label>Sub Total</label>
													<input type="text" id="subtotal" name="subtotal" class="form-control" readonly placeholder="Disabled input" />
												</div>
												<div class="form-group">
													<label>GST</label>
													<input type="text" id="gstamount_value" name="gstamount_value" class="form-control" readonly placeholder="Disabled input" />
												</div>
												<div class="form-group">
													<label>Total</label>
													<input type="text" id="total" name="total" class="form-control" readonly placeholder="Disabled input" />
												</div>

											</div>




											<!--end::Form-->
										</div>
										<div class="card-footer">
											<div class="row">
												<div class="col-lg-12">
													<button type="submit" class="btn btn-primary font-weight-bold mr-2" name="register" id="submit">Submit</button>
													<!--<button type="reset" class="btn btn-light-primary font-weight-bold">Cancel</button>-->
												</div>
											</div>
										</div>
									</div>

								</div>
								<!--end::Card-->
							</form>
						</div>
						
						<?php

						} elseif ($_SESSION['role'] == "user") {
						?>
						
	<div class="row">
									<div class="col-lg-6">
										<div class="card card-custom  example-compact">

											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>Booking</b>
												</h3>

											</div>
											<div class="card-body">
												<!--begin: Code-->


												<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
													<div class="alert-icon"><i class="flaticon2-information"></i></div>
													<div class="alert-text  font-weight-bold">
														Oh snap! Change a few things up and try submitting again.
													</div>
													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span><i class="ki ki-close "></i></span>
														</button>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Customer type <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="customer_type" id="customer_type" required>
															<option selected disabled>Select</option>
															<option value="party">Party</option>
															<option value="customer">Customer</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Booking type <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="booking_type" id="booking_type" required>
															<option selected disabled>Select</option>
															<option value="booking">Booking</option>
															<option value="lease">Lease</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">LR No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="lr_no" id="lr_no" placeholder="Enter your LR No" required />
														<span class="form-text text-muted">We'll never share your LR No with anyone else.</span>
													</div>
												</div>
												<!--<div class="form-group row">-->
												<!--	<label class="col-form-label text-right col-lg-3 col-sm-12">Railway no </label>-->
												<!--	<div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--		<input type="text" class="form-control" name="railway_no" id="railway_no" placeholder="Enter your Railway No" required />-->
												<!--		<span class="form-text text-muted">We'll never share your Railway no with anyone else.</span>-->
												<!--	</div>-->
												<!--</div>-->
												<div class="form-group row" onchange="status19(this)">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Consignment Type <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="consignment_type" id="consignment_type" required>
															<option selected disabled>Select</option>
															<option value="tbb">TBB</option>
															<option value="pay">To Pay</option>
															<option value="month">Month</option>
															<option value="paid">Paid</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												</div>

												<!--<div class="form-group row" id="optClass19" style="display:none;">-->
												<!--	
												<!--	$sql = "select * from company";-->
												<!--	$result = mysqli_query($conn, $sql);-->
												<!--	$com = mysqli_fetch_assoc($result);-->

												<!--	$auto_company_name = $com['company_name'];-->
												<!--	?>-->

												<!--	<label class="col-form-label text-right col-lg-3 col-sm-12">Company Name</label>-->
												<!--	<div class="col-lg-9 col-md-9 col-sm-12" id="from_companyname">-->
												<!--		<input type="text" class="form-control" name="company_name" list="brow1" id="company_name" placeholder="Company Name" />-->
												<!--	</div><br><br>-->

													<!--<label class="col-form-label text-right col-lg-3 col-sm-12">Vehicle Halting Charge </label>-->
													<!--<div class="col-lg-9 col-md-9 col-sm-12">-->
													<!--	<input type="text" class="form-control" name="vehicle_halting" id="vehicle_halting" placeholder="Enter your Vehicle Halting No" />-->
													<!--</div>-->

													<!--<label class="col-form-label text-right col-lg-3 col-sm-12">Unloading Charge </label>-->
													<!--<div class="col-lg-9 col-md-9 col-sm-12">-->
													<!--	<input type="text" class="form-control" name="unloading_charge" id="unloading_charge" placeholder="Enter your Unloading Charge " />-->
													<!--</div>-->
												<!--</div>-->
<div class="form-group row" id="browser" style="display:none;">
    <label class="col-form-label text-right col-lg-3 col-sm-12">Company Name</label>
    <div class="col-lg-9 col-md-9 col-sm-12" >
	     <input class="form-control" list="browsers" name="company_name" id="company_name">
												<datalist id="browsers" >
												    <option value="">choose name</option>
												    <?php 
												    $sql = "select distinct company_name from company where username='$username' && branch='$branch'";
													$result = $conn->query($sql);
													while ($allfilter = $result->FETCH_ASSOC()) {
													 echo'<option>'.$allfilter["company_name"].'</option>';
													}
												    ?>
												    </div><br><br>
												</datalist>
												
												
													<label class="col-form-label text-right col-lg-3 col-sm-12">Invoice No </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="invoice_no" id="invoice_no" placeholder="Enter your Invoice No" />
													</div><br><br>
												</div>
												
												<div class="form-group row" onchange="status11(this)">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Invoice Type <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="invoice_type" id="invoice_type" required>
															<option selected disabled>Select</option>
															<option value="binvoice">B - Invoice</option>
															<option value="vestimate">V - Estimate</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												</div>

												<!--<div class="form-group row" onchange="status2(this);">-->
												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">Mode of Transport <span style="color:red">*</span></label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <select class="form-control" name="mode_transport" id="mode_transport" required>-->
												<!--            <option selected disabled>Select</option>-->
												<!--            <option value="road">Road</option>-->
												<!--            <option value="train">Train</option>-->
												<!--            <option value="air">Air</option>-->
												<!--        </select>-->
												<!--        <span class="form-text text-muted">Please select an option.</span>-->
												<!--    </div>-->
												<!--</div>-->
												<!--<div class="form-group row" id="productoptClass" style="display:none;">-->
												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">Lorry No </label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <input type="text" class="form-control" name="lorry_no" id="lorry_no" placeholder="Enter your Lorry No" />-->
												<!--        <span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
												<!--    </div>-->
												<!--</div>-->
												<!--<div class="form-group row" id="productoptClass1" style="display:none;">-->
												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">Train Type </label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <select class="form-control" name="train_type" id="train_type">-->
												<!--            <option selected disabled>Select</option>-->
												<!--            <option value="rear">Rear</option>-->
												<!--            <option value="front">Front</option>-->
												<!--        </select>-->
												<!--        <span class="form-text text-muted">Please select an option.</span>-->
												<!--    </div>-->

												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">RR No </label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <input type="text" class="form-control" name="RR_No" id="RR_No" placeholder="Enter your Lorry No" />-->
												<!--        <span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
												<!--    </div>-->

												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">Train No </label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <input type="text" class="form-control" name="train_No" id="train_No" placeholder="Enter your Train No" />-->
												<!--        <span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
												<!--    </div>-->
												<!--</div>-->
												<!--<div class="form-group row" id="productoptClass2" style="display:none;">-->
												<!--    <label class="col-form-label text-right col-lg-3 col-sm-12">Flight No </label>-->
												<!--    <div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--        <input type="text" class="form-control" name="flight_no" id="flight_no" placeholder="Enter your Flight No" />-->
												<!--        <span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
												<!--    </div>-->
												<!--</div>-->

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Internal Info </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="internal_info" id="internal_info" placeholder="Enter your Internal Info" />
														<span class="form-text text-muted">We'll never share your Internal Info with anyone else.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Eway Bill No </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="eway_bill" id="eway_bill" placeholder="Enter your Eway Bill" />
														<span class="form-text text-muted">We'll never share your Eway Bill No with anyone else.</span>
													</div>
												</div>

											</div>



											<!--<div class="card-header">-->
											<!--    <h3 class="card-title">-->
											<!--        Tracking-->
											<!--    </h3>-->

											<!--</div>-->


											<!--<div class="card-body">-->
											<!--begin: Code-->


											<!--    <div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">-->
											<!--        <div class="alert-icon"><i class="flaticon2-information"></i></div>-->

											<!--        <div class="alert-close">-->
											<!--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
											<!--                <span><i class="ki ki-close "></i></span>-->
											<!--            </button>-->
											<!--        </div>-->
											<!--    </div>-->

											<!--    <div class="form-group row">-->
											<!--        <label class="col-form-label text-right col-lg-3 col-sm-12">No of Stop <span style="color:red">*</span></label>-->
											<!--        <div class="col-lg-9 col-md-9 col-sm-12">-->
											<!--            <select class="form-control" aria-label="Default select example" id="no_stop" name="no_stop" required>-->
											<!--                <option selected disabled>Select</option>-->
											<!--            </select>-->
											<!--        </div>-->
											<!--    </div>-->
											<!--    <div class="row mb-3">-->
											<!--        <div id="emi_list_disp"></div>-->
											<!--    </div>-->

											<!--<div class="form-group row">-->
											<!--       <label class="col-form-label text-right col-lg-3 col-sm-12">No of Stop <span style="color:red">*</span></label>-->
											<!--       <div class="col-lg-9 col-md-9 col-sm-12">-->
											<!--              <select class="form-control" name="no_stop" id="no_stop" required>-->
											<!--                     <option selected disabled>Select</option>-->
											<!--                     <option value="1">1</option>-->
											<!--                     <option value="2">2</option>-->
											<!--                     <option value="3">3</option>-->


											<!--              </select>-->
											<!--              <span class="form-text text-muted">Please select an option.</span>-->
											<!--       </div>-->
											<!--</div>-->
											<!--<div class="form-group row">-->
											<!--       <label class="col-form-label text-right col-lg-3 col-sm-12">Destination <span style="color:red">*</span></label>-->
											<!--       <div class="col-lg-4 col-md-4 col-sm-12">-->
											<!--              <input type="text" class="form-control" name="destination" id="destination" placeholder="Enter your Destination" />-->
											<!--       </div>-->
											<!--       <div class="col-lg-4 col-md-4 col-sm-12">-->
											<!--              <div class="input-group input-group-solid date" id="kt_datetimepicker_3" data-target-input="nearest">-->
											<!--                     <input type="text" class="form-control form-control-solid datetimepicker-input" placeholder="Select date & time" data-target="#kt_datetimepicker_3" />-->
											<!--                     <div class="input-group-append" data-target="#kt_datetimepicker_3" data-toggle="datetimepicker">-->
											<!--                            <span class="input-group-text">-->
											<!--                                   <i class="ki ki-calendar"></i>-->
											<!--                            </span>-->
											<!--                     </div>-->
											<!--              </div>-->
											<!--       </div>-->
											<!--</div>-->




											<!--</div>-->


											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>Values</b>
												</h3>

											</div>
											<div class="card-body">
												<!--begin: Code-->


												<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
													<div class="alert-icon"><i class="flaticon2-information"></i></div>

													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span><i class="ki ki-close"></i></span>
														</button>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Material Name</label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="material_name" id="material_name" placeholder="Enter Material Name" />
														</div>
														<span class="form-text text-muted">Please enter Name</span>
													</div>
												<!--</div>-->

												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Quantity in KG <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="quantity_kg" id="quantity_kg" placeholder="Enter Quantity in KG" required />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												<!--</div>-->

												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Quantity in Nos <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="quantity_nos" id="quantity_nos" placeholder="Enter Quantity in Nos" required />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												<!--</div>-->


												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Rate per unit <span style="color:red">*</span></label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="rate" id="rate" placeholder="Enter Rate per unit" required />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												<!--</div>-->

												&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
												<input type="radio" id="quantity_kg_radio" name="quantitynos_radio" value="quantity_kg" required>
												<label for="quantity_kg">Quantity in KG</label>&ensp;&ensp;&ensp;&ensp;&ensp;
												<input type="radio" id="quantity_nos_radio" name="quantitynos_radio" value="quantity_nos" required>
												<label for="quantity_nos">Quantity Nos</label><br><br>


												<!--<div class="form-group row">-->
													<label class="col-form-label text-right col-lg-3 col-sm-12">Docket Charge</label>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="docket_charge" id="docket_charge" placeholder="Enter Docket Charge" />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												</div>
												<!--<div class="form-group row">-->
												<!--	<label class="col-form-label text-right col-lg-3 col-sm-12">CD Charge</label>-->
												<!--	<div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--		<div class="input-group">-->
												<!--			<div class="input-group-prepend">-->
												<!--				<span class="input-group-text"><i class="flaticon2-browser"></i></span>-->
												<!--			</div>-->
												<!--			<input type="text" class="form-control" name="cd_charge" id="cd_charge" placeholder="Enter CD Charge" />-->
												<!--		</div>-->
												<!--		<span class="form-text text-muted">Please enter only digits</span>-->
												<!--	</div>-->
												<!--</div>-->

												<!--<div class="form-group row" id="optClass" style="display:none;" onchange="status1(this)">-->
												<!--    <label class="col-3 col-form-label">GST</label>-->
												<!--    <div class="col-9 col-form-label">-->
												<!--        <div class="radio-inline">-->
												<!--            <label class="radio radio-success">-->
												<!--                <input type="radio" name="gst" />-->
												<!--                <span></span>-->
												<!--                State-->
												<!--            </label>-->
												<!--            <label class="radio radio-success">-->
												<!--                <input type="radio" name="gst" checked="checked" />-->
												<!--                <span></span>-->
												<!--                Inter State-->
												<!--            </label>-->

												<!--        </div>-->
												<!--        <span class="form-text text-muted">Some help text goes here</span>-->
												<!--    </div>-->
												<!--</div>-->

												<!--<div class="form-group row" id="optClass" style="display:none;" onchange="status1(this);">-->
												<!--	<label class="col-form-label text-right col-lg-3 col-sm-12">GST</label>-->
												<!--	<div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--		<select class="form-control" name="gst" id="gst">-->
												<!--			<option selected disabled>Select</option>-->
												<!--			<option value="state">State</option>-->
												<!--			<option value="interstate">Inter State</option>-->
												<!--		</select>-->
												<!--	</div>-->
												<!--</div>-->

												<div class="form-group row" id="optClass" style="display:none;" onchange="status1(this);">
													<label class="col-form-label text-right col-lg-3 col-sm-12">GST</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="gst" id="gst">
															<option selected disabled>Select</option>
															<option value="yes">Yes</option>
															<option value="no">No</option>
														</select>
													</div>
												</div>


												<div class="form-group row" id="gstoptClass1" style="display:none;">
													<label class="col-form-label text-right col-lg-3 col-sm-12">GST% <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="gstamount" id="gstamount" placeholder="Enter GST Amount" />
														</div>
													</div>
													<!--<label class="col-form-label text-right col-lg-3 col-sm-12">SGST% <span style="color:red">*</span></label>-->
													<!--<div class="col-lg-9 col-md-9 col-sm-12">-->
													<!--	<div class="input-group">-->
													<!--		<div class="input-group-prepend">-->
													<!--			<span class="input-group-text"><i class="flaticon2-browser"></i></span>-->
													<!--		</div>-->
													<!--		<input type="text" class="form-control" name="sgst" id="sgst" placeholder="Enter SGST" />-->
													<!--	</div>-->
													<!--	<span class="form-text text-muted">Please enter only digits</span>-->
													<!--</div>-->
												</div>
												<!--<div class="form-group row" id="gstoptClass2" style="display:none;">-->
												<!--	<label class="col-form-label text-right col-lg-3 col-sm-12">IGST% <span style="color:red">*</span></label>-->
												<!--	<div class="col-lg-9 col-md-9 col-sm-12">-->
												<!--		<div class="input-group">-->
												<!--			<div class="input-group-prepend">-->
												<!--				<span class="input-group-text"><i class="flaticon2-browser"></i></span>-->
												<!--			</div>-->
												<!--			<input type="text" class="form-control" name="igst" id="igst" placeholder="Enter IGST" />-->
												<!--		</div>-->
												<!--		<span class="form-text text-muted">Please enter only digits</span>-->
												<!--	</div>-->
												<!--</div>-->

												<div class="form-group row" id="optClass29">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Agent's Commission</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" name="agent_commission" id="agent_commission" placeholder="Enter Agent's Commission" />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												</div>
												
<div class="form-group row" id="optClass59" style="display:none;">
    <label class="col-form-label text-right col-lg-3 col-sm-12">Vehicle Halting Charge </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="vehicle_halting" id="vehicle_halting" placeholder="Enter your Vehicle Halting No" />
													</div>

													<label class="col-form-label text-right col-lg-3 col-sm-12">Unloading Charge </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="unloading_charge" id="unloading_charge" placeholder="Enter your Unloading Charge " />
													</div>
												</div>

											</div>


											<!--end::Form-->
										</div>
									</div>
									<div class="col-lg-6">
										<div class="card card-custom example-compact">

											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>From</b>
												</h3>
											</div>

											<div class="card-body" id="optClass49">
												<?php
												$sql = "select * from customer where user_id=$userId";
												$result = mysqli_query($conn, $sql);
												$rec = mysqli_fetch_assoc($result);
												$auto_id = $rec['from_cx_id'];
												$auto_name = $rec['from_name'];
												$auto_address = $rec['from_address'];
												$auto_contact = $rec['from_contact'];
												?>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_detail2">
														<input type="text" class="form-control" name="from_name" id="from_name"  list="myCompanies2" placeholder="Enter your Name"  />
														<datalist id="myCompanies2">  
   
                                                        </datalist>
													
														<span class="form-text text-muted">We'll never share your name No with anyone else.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_address_detail2">
														<input type="text" class="form-control" name="from_address" id="from_address" placeholder="Enter your Address" />
														<span class="form-text text-muted">We'll never share your Address with anyone else.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_contact_detail2">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<!--<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="from_contact" id="from_contact" list="contact" placeholder="Enter Contact No" required />-->
															<input type="text" class="form-control" name="from_contact" list="contact" id="from_contact" placeholder="Enter Contact No"  />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												</div>
												<div class="form-group row" style="display:none">
													<label class="col-form-label text-right col-lg-3 col-sm-12">customer Id<span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12" id="from_id2">
														<input type="text" class="form-control" name="from_cx_id" id="from_cx_id" id="from_cx_id" placeholder="Enter your id"  />
														<span class="form-text text-muted">We'll never share your name No with anyone else.</span>
													</div>
												</div>
											</div>

											<div class="card-body" id="optClass39" style="display:none">
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="from_name1" id="from_name1" placeholder="Enter your Name" />
														<span class="form-text text-muted">We'll never share your name No with anyone else.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="from_address1" id="from_address1" placeholder="Enter your Address" />
														<span class="form-text text-muted">We'll never share your Address with anyone else.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="from_contact1" id="from_contact1" list="contact" placeholder="Enter Contact No"  />
															<!--<input type="text" class="form-control" name="from_contact" id="from_contact" placeholder="Enter Contact No" />-->
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												</div>
											</div>



											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>To</b>
												</h3>

											</div>
											<div class="card-body">
												<!--begin: Code-->


												<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
													<div class="alert-icon"><i class="flaticon2-information"></i></div>
													<div class="alert-text  font-weight-bold">
														Oh snap! Change a few things up and try submitting again.
													</div>
													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span><i class="ki ki-close "></i></span>
														</button>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="to_name" id="to_name" placeholder="Enter your Name" required />
														<span class="form-text text-muted">We'll never share your name No with anyone else.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="to_address" id="to_address" placeholder="Enter your Address" />
														<span class="form-text text-muted">We'll never share your address with anyone else.</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<!--<input type="text" class="form-control" name="to_contact" id="to_contact" placeholder="Enter Contact No" required />-->
															<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="to_contact" id="to_contact" placeholder="Enter Contact No" required />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
												</div>


											</div>

											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>Agent</b>
												</h3>

											</div>

											<div class="card-body">
												<!--begin: Code-->


												<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
													<div class="alert-icon"><i class="flaticon2-information"></i></div>
													<div class="alert-text  font-weight-bold">
														Oh snap! Change a few things up and try submitting again.
													</div>
													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span><i class="ki ki-close "></i></span>
														</button>
													</div>
												</div>
												<div class="form-group row" onchange="status2(this)">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Agent <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="agent" id="agent" required>
															<option selected disabled>Select</option>
															<option value="yes">Yes</option>
															<option value="no">No</option>
														</select>
														<span class="form-text text-muted">Please select an option.</span>
													</div>
												</div>
												<div class="form-group row" id="agentoptClass">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Name <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="agent_name" id="agent_name" placeholder="Enter your Name" />
														<span class="form-text text-muted">We'll never share your name No with anyone else.</span>
													</div>
													<label class="col-form-label text-right col-lg-3 col-sm-12">Contact No <span style="color:red">*</span></label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="flaticon2-browser"></i></span>
															</div>
															<!--<input type="text" class="form-control" name="agent_contact" id="agent_contact" placeholder="Enter Contact No" />-->
															<input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="agent_contact" id="agent_contact" placeholder="Enter Contact No" />
														</div>
														<span class="form-text text-muted">Please enter only digits</span>
													</div>
													<label class="col-form-label text-right col-lg-3 col-sm-12">City </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="agent_city" id="agent_city" placeholder="Enter your City" />
														<span class="form-text text-muted">We'll never share your address with anyone else.</span>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Delivery Message </label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<input type="text" class="form-control" name="delivery_message" id="delivery_message" placeholder="Enter your Delivery Message" />
														<span class="form-text text-muted">We'll never share your delivery message with anyone else.</span>
													</div>
												</div>

											</div>


											<div class="card-header">
												<h3 class="card-title" style="color: #1BC5BD;">
													<b>Auto Values</b>
												</h3>

											</div>

											<div class="card-body">
												<!--begin: Code-->


												<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
													<div class="alert-icon"><i class="flaticon2-information"></i></div>
													<div class="alert-text  font-weight-bold">
														Oh snap! Change a few things up and try submitting again.
													</div>
													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span><i class="ki ki-close "></i></span>
														</button>
													</div>
												</div>
												<div class="form-group">
													<label>Bill amount</label>
													<input type="text" id="bill_amount" name="bill_amount" class="form-control" readonly placeholder="Disabled input" />
												</div>
												<div class="form-group">
													<label>Sub Total</label>
													<input type="text" id="subtotal" name="subtotal" class="form-control" readonly placeholder="Disabled input" />
												</div>
												<div class="form-group">
													<label>GST</label>
													<input type="text" id="gstamount_value" name="gstamount_value" class="form-control" readonly placeholder="Disabled input" />
												</div>
												<div class="form-group">
													<label>Total</label>
													<input type="text" id="total" name="total" class="form-control" readonly placeholder="Disabled input" />
												</div>

											</div>




											<!--end::Form-->
										</div>
										<div class="card-footer">
											<div class="row">
												<div class="col-lg-12">
													<button type="submit" class="btn btn-primary font-weight-bold mr-2" name="register" id="submit">Submit</button>
													<!--<button type="reset" class="btn btn-light-primary font-weight-bold">Cancel</button>-->
												</div>
											</div>
										</div>
									</div>

								</div>
								<!--end::Card-->
							</form>
						</div>
<?php
						}
						?>
						<!--end::Card-->
					</div>
			</div>
		</div>
		<!--end::Container-->

		<!--begin::Footer-->
		<!--doc: add "bg-white" class to have footer with solod background color-->
		<div class="footer py-4 d-flex flex-lg-column " id="kt_footer">
			<!--begin::Container-->
			<div class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
				<!--begin::Copyright-->
				<div class="text-dark order-2 order-md-1">
					<span class="text-muted font-weight-bold mr-2">2020&copy;</span>
					<a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">APS</a>
				</div>
				<!--end::Copyright-->

				<!--begin::Nav-->
				<!--<div class="nav nav-dark order-1 order-md-2">-->
				<!--	<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pr-3 pl-0">About</a>-->
				<!--	<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link px-3">Team</a>-->
				<!--	<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-3 pr-0">Contact</a>-->
				<!--</div>-->
				<!--end::Nav-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Footer-->
	</div>
	<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Main-->




<!--begin::Quick Actions Panel-->
<div id="kt_quick_actions" class="offcanvas offcanvas-left p-10">
	<!--begin::Header-->
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-10">
		<h3 class="font-weight-bold m-0">
			Quick Actions
			<small class="text-muted font-size-sm ml-2">finance & reports</small>
		</h3>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_actions_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>
	<!--end::Header-->

	<!--begin::Content-->
	<div class="offcanvas-content pr-5 mr-n5">
		<div class="row gutter-b">
			<!--begin::Item-->
			<div class="col-6">
				<a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
					<span class="svg-icon svg-icon-3x svg-icon-primary m-0">
						<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Euro.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z" fill="#000000" opacity="0.3" />
								<path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z" fill="#000000" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span> <span class="d-block font-weight-bold font-size-h6 mt-2">Accounting</span>
				</a>
			</div>
			<!--end::Item-->

			<!--begin::Item-->
			<div class="col-6">
				<a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
					<span class="svg-icon svg-icon-3x svg-icon-primary m-0">
						<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-attachment.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<path d="M14.8571499,13 C14.9499122,12.7223297 15,12.4263059 15,12.1190476 L15,6.88095238 C15,5.28984632 13.6568542,4 12,4 L11.7272727,4 C10.2210416,4 9,5.17258756 9,6.61904762 L10.0909091,6.61904762 C10.0909091,5.75117158 10.823534,5.04761905 11.7272727,5.04761905 L12,5.04761905 C13.0543618,5.04761905 13.9090909,5.86843034 13.9090909,6.88095238 L13.9090909,12.1190476 C13.9090909,12.4383379 13.8240964,12.7385644 13.6746497,13 L10.3253503,13 C10.1759036,12.7385644 10.0909091,12.4383379 10.0909091,12.1190476 L10.0909091,9.5 C10.0909091,9.06606198 10.4572216,8.71428571 10.9090909,8.71428571 C11.3609602,8.71428571 11.7272727,9.06606198 11.7272727,9.5 L11.7272727,11.3333333 L12.8181818,11.3333333 L12.8181818,9.5 C12.8181818,8.48747796 11.9634527,7.66666667 10.9090909,7.66666667 C9.85472911,7.66666667 9,8.48747796 9,9.5 L9,12.1190476 C9,12.4263059 9.0500878,12.7223297 9.14285008,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L14.8571499,13 Z" fill="#000000" opacity="0.3" />
								<path d="M9,10.3333333 L9,12.1190476 C9,13.7101537 10.3431458,15 12,15 C13.6568542,15 15,13.7101537 15,12.1190476 L15,10.3333333 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9,10.3333333 Z M10.0909091,11.1212121 L12,12.5 L13.9090909,11.1212121 L13.9090909,12.1190476 C13.9090909,13.1315697 13.0543618,13.952381 12,13.952381 C10.9456382,13.952381 10.0909091,13.1315697 10.0909091,12.1190476 L10.0909091,11.1212121 Z" fill="#000000" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span> <span class="d-block font-weight-bold font-size-h6 mt-2">Members</span>
				</a>
			</div>
			<!--end::Item-->
		</div>
		<div class="row gutter-b">
			<!--begin::Item-->
			<div class="col-6">
				<a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
					<span class="svg-icon svg-icon-3x svg-icon-primary m-0">
						<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Box2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000" />
								<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span> <span class="d-block font-weight-bold font-size-h6 mt-2">Projects</span>
				</a>
			</div>
			<!--end::Item-->

			<!--begin::Item-->
			<div class="col-6">
				<a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
					<span class="svg-icon svg-icon-3x svg-icon-primary m-0">
						<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span> <span class="d-block font-weight-bold font-size-h6 mt-2">Customers</span>
				</a>
			</div>
			<!--end::Item-->
		</div>
		<div class="row gutter-b">
			<!--begin::Item-->
			<div class="col-6">
				<a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
					<span class="svg-icon svg-icon-3x svg-icon-primary m-0">
						<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Chart-bar1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5" />
								<rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5" />
								<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero" />
								<rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span> <span class="d-block font-weight-bold font-size-h6 mt-2">Email</span>
				</a>
			</div>
			<!--end::Item-->

			<!--begin::Item-->
			<div class="col-6">
				<a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
					<span class="svg-icon svg-icon-3x svg-icon-primary m-0">
						<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Color-profile.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<path d="M12,10.9996338 C12.8356605,10.3719448 13.8743941,10 15,10 C17.7614237,10 20,12.2385763 20,15 C20,17.7614237 17.7614237,20 15,20 C13.8743941,20 12.8356605,19.6280552 12,19.0003662 C11.1643395,19.6280552 10.1256059,20 9,20 C6.23857625,20 4,17.7614237 4,15 C4,12.2385763 6.23857625,10 9,10 C10.1256059,10 11.1643395,10.3719448 12,10.9996338 Z M13.3336047,12.504354 C13.757474,13.2388026 14,14.0910788 14,15 C14,15.9088933 13.7574889,16.761145 13.3336438,17.4955783 C13.8188886,17.8206693 14.3938466,18 15,18 C16.6568542,18 18,16.6568542 18,15 C18,13.3431458 16.6568542,12 15,12 C14.3930587,12 13.8175971,12.18044 13.3336047,12.504354 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<circle fill="#000000" cx="12" cy="9" r="5" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span> <span class="d-block font-weight-bold font-size-h6 mt-2">Settings</span>
				</a>
			</div>
			<!--end::Item-->
		</div>
		<div class="row">
			<!--begin::Item-->
			<div class="col-6">
				<a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
					<span class="svg-icon svg-icon-3x svg-icon-primary m-0">
						<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Euro.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z" fill="#000000" opacity="0.3" />
								<path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z" fill="#000000" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span> <span class="d-block font-weight-bold font-size-h6 mt-2">Orders</span>
				</a>
			</div>
			<!--end::Item-->
		</div>
	</div>
	<!--end::Content-->
</div>
<!--end::Quick Actions Panel-->

<!-- begin::User Panel-->
<div id="kt_quick_user" class="offcanvas offcanvas-left p-10">
	<!--begin::Header-->
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
		<h3 class="font-weight-bold m-0">
			User Profile
			<!--<small class="text-muted font-size-sm ml-2">12 messages</small>-->
		</h3>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>
	<!--end::Header-->

	<!--begin::Content-->
	<div class="offcanvas-content pr-5 mr-n5">
		<!--begin::Header-->
		<div class="d-flex align-items-center mt-5">
			<div class="symbol symbol-100 mr-5">
				<div class="symbol-label" style="background-image:url('assets/media/users/300_21.jpg')"></div>
				<i class="symbol-badge bg-success"></i>
			</div>
			<div class="d-flex flex-column">
				<a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
					<?php echo $_SESSION['name']; ?>
				</a>
				<div class="text-muted mt-1">
					<?php echo $_SESSION['role']; ?>
				</div>
				<div class="navi mt-2">
					<a href="#" class="navi-item">
						<span class="navi-link p-0 pb-2">
							<span class="navi-icon mr-1">
								<span class="svg-icon svg-icon-lg svg-icon-primary">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
									<!--<svg-->
									<!--    xmlns="http://www.w3.org/2000/svg"-->
									<!--    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"-->
									<!--    viewBox="0 0 24 24" version="1.1">-->
									<!--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
									<!--        <rect x="0" y="0" width="24" height="24" />-->
									<!--        <path-->
									<!--            d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"-->
									<!--            fill="#000000" />-->
									<!--        <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />-->
									<!--    </g>-->
									<!--</svg>-->
									<!--end::Svg Icon-->
								</span> </span>
							<!--<span class="navi-text text-muted text-hover-primary">jm@softplus.com</span>-->
						</span>
					</a>
					<a href="logout.php" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
				</div>
			</div>
		</div>
		<!--end::Header-->

		<!--begin::Separator-->
		<div class="separator separator-dashed mt-8 mb-5"></div>
		<!--end::Separator-->

		<!--begin::Nav-->
		<div class="navi navi-spacer-x-0 p-0">
			<!--begin::Item-->
			<!--<a href="custom/apps/user/profile-1/personal-information.html" class="navi-item">-->
			<!--    <div class="navi-link">-->
			<!--        <div class="symbol symbol-40 bg-light mr-3">-->
			<!--            <div class="symbol-label">-->
			<!--                <span class="svg-icon svg-icon-md svg-icon-success">-->
			<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg--><svg <!-- xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" -->
				<!--                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
				<!--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
				<!--                            <rect x="0" y="0" width="24" height="24" />-->
				<!--                            <path-->
				<!--                                d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"-->
				<!--                                fill="#000000" />-->
				<!--                            <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />-->
				<!--                        </g>-->
				<!--                    </svg>-->
				<!--end::Svg Icon-->
				<!--                </span>-->
				<!--            </div>-->
				<!--        </div>-->
				<!--        <div class="navi-text">-->
				<!--            <div class="font-weight-bold">-->
				<!--                My Profile-->
				<!--            </div>-->
				<!--            <div class="text-muted">-->
				<!--                Account settings and more-->
				<!--                <span class="label label-light-danger label-inline font-weight-bold">update</span>-->
				<!--            </div>-->
				<!--        </div>-->
				<!--    </div>-->
				<!--</a>-->
				<!--end:Item-->

				<!--begin::Item-->
				<!--<a href="custom/apps/user/profile-3.html" class="navi-item">-->
				<!--    <div class="navi-link">-->
				<!--        <div class="symbol symbol-40 bg-light mr-3">-->
				<!--            <div class="symbol-label">-->
				<!--                <span class="svg-icon svg-icon-md svg-icon-warning">-->
				<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Chart-bar1.svg--><svg <!-- xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" -->
					<!--                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
					<!--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
					<!--                            <rect x="0" y="0" width="24" height="24" />-->
					<!--                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13"-->
					<!--                                rx="1.5" />-->
					<!--                            <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8"-->
					<!--                                rx="1.5" />-->
					<!--                            <path-->
					<!--                                d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"-->
					<!--                                fill="#000000" fill-rule="nonzero" />-->
					<!--                            <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5" />-->
					<!--                        </g>-->
					<!--                    </svg>-->
					<!--end::Svg Icon-->
					<!--                </span>-->
					<!--            </div>-->
					<!--        </div>-->
					<!--        <div class="navi-text">-->
					<!--            <div class="font-weight-bold">-->
					<!--                My Messages-->
					<!--            </div>-->
					<!--            <div class="text-muted">-->
					<!--                Inbox and tasks-->
					<!--            </div>-->
					<!--        </div>-->
					<!--    </div>-->
					<!--</a>-->
					<!--end:Item-->

					<!--begin::Item-->
					<!--<a href="custom/apps/user/profile-2.html" class="navi-item">-->
					<!--    <div class="navi-link">-->
					<!--        <div class="symbol symbol-40 bg-light mr-3">-->
					<!--            <div class="symbol-label">-->
					<!--                <span class="svg-icon svg-icon-md svg-icon-danger">-->
					<!--begin::Svg Icon | path:assets/media/svg/icons/Files/Selected-file.svg--><svg <!-- xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" -->
						<!--                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
						<!--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
						<!--                            <polygon points="0 0 24 0 24 24 0 24" />-->
						<!--                            <path-->
						<!--                                d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"-->
						<!--                                fill="#000000" fill-rule="nonzero" opacity="0.3" />-->
						<!--                            <path-->
						<!--                                d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"-->
						<!--                                fill="#000000" fill-rule="nonzero" />-->
						<!--                        </g>-->
						<!--                    </svg>-->
						<!--end::Svg Icon-->
						<!--                </span>-->
						<!--            </div>-->
						<!--        </div>-->
						<!--        <div class="navi-text">-->
						<!--            <div class="font-weight-bold">-->
						<!--                My Activities-->
						<!--            </div>-->
						<!--            <div class="text-muted">-->
						<!--                Logs and notifications-->
						<!--            </div>-->
						<!--        </div>-->
						<!--    </div>-->
						<!--</a>-->
						<!--end:Item-->

						<!--begin::Item-->
						<!--<a href="custom/apps/userprofile-1/overview.html" class="navi-item">-->
						<!--    <div class="navi-link">-->
						<!--        <div class="symbol symbol-40 bg-light mr-3">-->
						<!--            <div class="symbol-label">-->
						<!--                <span class="svg-icon svg-icon-md svg-icon-primary">-->
						<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg--><svg <!-- xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" -->
							<!--                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
							<!--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
							<!--                            <rect x="0" y="0" width="24" height="24" />-->
							<!--                            <path-->
							<!--                                d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z"-->
							<!--                                fill="#000000" opacity="0.3" />-->
							<!--                            <path-->
							<!--                                d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z"-->
							<!--                                fill="#000000" />-->
							<!--                        </g>-->
							<!--                    </svg>-->
							<!--end::Svg Icon-->
							<!--                </span>-->
							<!--            </div>-->
							<!--        </div>-->
							<!--        <div class="navi-text">-->
							<!--            <div class="font-weight-bold">-->
							<!--                My Tasks-->
							<!--            </div>-->
							<!--            <div class="text-muted">-->
							<!--                latest tasks and projects-->
							<!--            </div>-->
							<!--        </div>-->
							<!--    </div>-->
							<!--</a>-->
							<!--end:Item-->
		</div>
		<!--end::Nav-->

		<!--begin::Separator-->
		<!--<div class="separator separator-dashed my-7"></div>-->
		<!--end::Separator-->

		<!--begin::Notifications-->
		<div>
			<!--begin:Heading-->
			<!--<h5 class="mb-5">-->
			<!--    Recent Notifications-->
			<!--</h5>-->
			<!--end:Heading-->

			<!--begin::Item-->
			<!--<div class="d-flex align-items-center bg-light-warning rounded p-5 gutter-b">-->
			<!--    <span class="svg-icon svg-icon-warning mr-5">-->
			<!--        <span class="svg-icon svg-icon-lg">-->
			<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg--><svg <!-- xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" -->
				<!--                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
				<!--                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
				<!--                    <rect x="0" y="0" width="24" height="24" />-->
				<!--                    <path-->
				<!--                        d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"-->
				<!--                        fill="#000000" />-->
				<!--                    <rect fill="#000000" opacity="0.3"-->
				<!--                        transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) "-->
				<!--                        x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />-->
				<!--                </g>-->
				<!--            </svg>-->
				<!--end::Svg Icon-->
				<!--        </span> </span>-->

				<!--    <div class="d-flex flex-column flex-grow-1 mr-2">-->
				<!--        <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Another-->
				<!--            purpose persuade</a>-->
				<!--        <span class="text-muted font-size-sm">Due in 2 Days</span>-->
				<!--    </div>-->

				<!--    <span class="font-weight-bolder text-warning py-1 font-size-lg">+28%</span>-->
				<!--</div>-->
				<!--end::Item-->

				<!--begin::Item-->
				<!--<div class="d-flex align-items-center bg-light-success rounded p-5 gutter-b">-->
				<!--    <span class="svg-icon svg-icon-success mr-5">-->
				<!--        <span class="svg-icon svg-icon-lg">-->
				<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg--><svg <!-- xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" -->
					<!--                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
					<!--                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
					<!--                    <rect x="0" y="0" width="24" height="24" />-->
					<!--                    <path-->
					<!--                        d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"-->
					<!--                        fill="#000000" fill-rule="nonzero"-->
					<!--                        transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) " />-->
					<!--                    <path-->
					<!--                        d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"-->
					<!--                        fill="#000000" fill-rule="nonzero" opacity="0.3" />-->
					<!--                </g>-->
					<!--            </svg>-->
					<!--end::Svg Icon-->
					<!--        </span> </span>-->
					<!--    <div class="d-flex flex-column flex-grow-1 mr-2">-->
					<!--        <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Would-->
					<!--            be to people</a>-->
					<!--        <span class="text-muted font-size-sm">Due in 2 Days</span>-->
					<!--    </div>-->

					<!--    <span class="font-weight-bolder text-success py-1 font-size-lg">+50%</span>-->
					<!--</div>-->
					<!--end::Item-->

					<!--begin::Item-->
					<!--<div class="d-flex align-items-center bg-light-danger rounded p-5 gutter-b">-->
					<!--    <span class="svg-icon svg-icon-danger mr-5">-->
					<!--        <span class="svg-icon svg-icon-lg">-->
					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg--><svg <!-- xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" -->
						<!--                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
						<!--                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
						<!--                    <rect x="0" y="0" width="24" height="24" />-->
						<!--                    <path-->
						<!--                        d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"-->
						<!--                        fill="#000000" />-->
						<!--                    <path-->
						<!--                        d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"-->
						<!--                        fill="#000000" opacity="0.3" />-->
						<!--                </g>-->
						<!--            </svg>-->
						<!--end::Svg Icon-->
						<!--        </span> </span>-->
						<!--    <div class="d-flex flex-column flex-grow-1 mr-2">-->
						<!--        <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">Purpose-->
						<!--            would be to persuade</a>-->
						<!--        <span class="text-muted font-size-sm">Due in 2 Days</span>-->
						<!--    </div>-->

						<!--    <span class="font-weight-bolder text-danger py-1 font-size-lg">-27%</span>-->
						<!--</div>-->
						<!--end::Item-->

						<!--begin::Item-->
						<!--<div class="d-flex align-items-center bg-light-info rounded p-5">-->
						<!--    <span class="svg-icon svg-icon-info mr-5">-->
						<!--        <span class="svg-icon svg-icon-lg">-->
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/Attachment2.svg--><svg <!-- xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" -->
							<!--                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
							<!--                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
							<!--                    <rect x="0" y="0" width="24" height="24" />-->
							<!--                    <path-->
							<!--                        d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z"-->
							<!--                        fill="#000000" opacity="0.3"-->
							<!--                        transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641) " />-->
							<!--                    <path-->
							<!--                        d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z"-->
							<!--                        fill="#000000"-->
							<!--                        transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359) " />-->
							<!--                    <path-->
							<!--                        d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z"-->
							<!--                        fill="#000000" opacity="0.3"-->
							<!--                        transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146) " />-->
							<!--                    <path-->
							<!--                        d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z"-->
							<!--                        fill="#000000" opacity="0.3"-->
							<!--                        transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961) " />-->
							<!--                </g>-->
							<!--            </svg>-->
							<!--end::Svg Icon-->
							<!--        </span> </span>-->

							<!--    <div class="d-flex flex-column flex-grow-1 mr-2">-->
							<!--        <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">The-->
							<!--            best product</a>-->
							<!--        <span class="text-muted font-size-sm">Due in 2 Days</span>-->
							<!--    </div>-->

							<!--    <span class="font-weight-bolder text-info py-1 font-size-lg">+8%</span>-->
							<!--</div>-->
							<!--end::Item-->
		</div>
		<!--end::Notifications-->
	</div>
	<!--end::Content-->
</div>
<!-- end::User Panel-->


<!--begin::Quick Panel-->
<div id="kt_quick_panel" class="offcanvas offcanvas-left pt-5 pb-10">
	<!--begin::Header-->
	<div class="offcanvas-header offcanvas-header-navs d-flex align-items-center justify-content-between mb-5">
		<ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary flex-grow-1 px-10" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_logs">Audit Logs</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#kt_quick_panel_notifications">Notifications</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#kt_quick_panel_settings">Settings</a>
			</li>
		</ul>
		<div class="offcanvas-close mt-n1 pr-5">
			<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_panel_close">
				<i class="ki ki-close icon-xs text-muted"></i>
			</a>
		</div>
	</div>
	<!--end::Header-->

	<!--begin::Content-->
	<div class="offcanvas-content px-10">
		<div class="tab-content">
			<!--begin::Tabpane-->
			<div class="tab-pane fade show pt-3 pr-5 mr-n5 active" id="kt_quick_panel_logs" role="tabpanel">
				<!--begin::Section-->
				<div class="mb-15">
					<h5 class="font-weight-bold mb-5">System Messages</h5>
					<!--begin: Item-->
					<div class="d-flex align-items-center flex-wrap mb-5">
						<div class="symbol symbol-50 symbol-light mr-5">
							<span class="symbol-label">
								<img src="assets/media/svg/misc/006-plurk.svg" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<div class="d-flex flex-column flex-grow-1 mr-2">
							<a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">Top Authors</a>
							<span class="text-muted font-weight-bold">Most Successful Fellas</span>
						</div>
						<span class="btn btn-sm btn-light font-weight-bolder py-1 my-lg-0 my-2 text-dark-50">+82$</span>
					</div>
					<!--end: Item-->

					<!--begin: Item-->
					<div class="d-flex align-items-center flex-wrap mb-5">
						<div class="symbol symbol-50 symbol-light mr-5">
							<span class="symbol-label">
								<img src="assets/media/svg/misc/015-telegram.svg" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<div class="d-flex flex-column flex-grow-1 mr-2">
							<a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">Popular Authors</a>
							<span class="text-muted font-weight-bold">Most Successful Fellas</span>
						</div>
						<span class="btn btn-sm btn-light font-weight-bolder  my-lg-0 my-2 py-1 text-dark-50">+280$</span>
					</div>
					<!--end: Item-->

					<!--begin: Item-->
					<div class="d-flex align-items-center flex-wrap mb-5">
						<div class="symbol symbol-50 symbol-light mr-5">
							<span class="symbol-label">
								<img src="assets/media/svg/misc/003-puzzle.svg" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<div class="d-flex flex-column flex-grow-1 mr-2">
							<a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">New Users</a>
							<span class="text-muted font-weight-bold">Most Successful Fellas</span>
						</div>
						<span class="btn btn-sm btn-light font-weight-bolder  my-lg-0 my-2 py-1 text-dark-50">+4500$</span>
					</div>
					<!--end: Item-->

					<!--begin: Item-->
					<div class="d-flex align-items-center flex-wrap mb-5">
						<div class="symbol symbol-50 symbol-light mr-5">
							<span class="symbol-label">
								<img src="assets/media/svg/misc/005-bebo.svg" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<div class="d-flex flex-column flex-grow-1 mr-2">
							<a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">Active Customers</a>
							<span class="text-muted font-weight-bold">Most Successful Fellas</span>
						</div>
						<span class="btn btn-sm btn-light font-weight-bolder my-lg-0 my-2 py-1 text-dark-50">+4500$</span>
					</div>
					<!--end: Item-->

					<!--begin: Item-->
					<div class="d-flex align-items-center flex-wrap">
						<div class="symbol symbol-50 symbol-light mr-5">
							<span class="symbol-label">
								<img src="assets/media/svg/misc/014-kickstarter.svg" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<div class="d-flex flex-column flex-grow-1 mr-2">
							<a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">Bestseller Theme</a>
							<span class="text-muted font-weight-bold">Most Successful Fellas</span>
						</div>
						<span class="btn btn-sm btn-light font-weight-bolder my-lg-0 my-2 py-1 text-dark-50">+4500$</span>
					</div>
					<!--end: Item-->
				</div>
				<!--end::Section-->

				<!--begin::Section-->
				<div class="mb-5">
					<h5 class="font-weight-bold mb-5">Notifications</h5>

					<!--begin: Item-->
					<div class="d-flex align-items-center bg-light-warning rounded p-5 mb-5">
						<span class="svg-icon svg-icon-warning mr-5">
							<span class="svg-icon svg-icon-lg">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
										<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span> </span>

						<div class="d-flex flex-column flex-grow-1 mr-2">
							<a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Another purpose persuade</a>
							<span class="text-muted font-size-sm">Due in 2 Days</span>
						</div>

						<span class="font-weight-bolder text-warning py-1 font-size-lg">+28%</span>
					</div>
					<!--end: Item-->

					<!--begin: Item-->
					<div class="d-flex align-items-center bg-light-success rounded p-5 mb-5">
						<span class="svg-icon svg-icon-success mr-5">
							<span class="svg-icon svg-icon-lg">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) " />
										<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span> </span>
						<div class="d-flex flex-column flex-grow-1 mr-2">
							<a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Would be to people</a>
							<span class="text-muted font-size-sm">Due in 2 Days</span>
						</div>

						<span class="font-weight-bolder text-success py-1 font-size-lg">+50%</span>
					</div>
					<!--end: Item-->

					<!--begin: Item-->
					<div class="d-flex align-items-center bg-light-danger rounded p-5 mb-5">
						<span class="svg-icon svg-icon-danger mr-5">
							<span class="svg-icon svg-icon-lg">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
										<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span> </span>
						<div class="d-flex flex-column flex-grow-1 mr-2">
							<a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">Purpose would be to persuade</a>
							<span class="text-muted font-size-sm">Due in 2 Days</span>
						</div>

						<span class="font-weight-bolder text-danger py-1 font-size-lg">-27%</span>
					</div>
					<!--end: Item-->

					<!--begin: Item-->
					<div class="d-flex align-items-center bg-light-info rounded p-5">
						<span class="svg-icon svg-icon-info mr-5">
							<span class="svg-icon svg-icon-lg">
								<!--begin::Svg Icon | path:assets/media/svg/icons/General/Attachment2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z" fill="#000000" opacity="0.3" transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641) " />
										<path d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z" fill="#000000" transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359) " />
										<path d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z" fill="#000000" opacity="0.3" transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146) " />
										<path d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z" fill="#000000" opacity="0.3" transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961) " />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span> </span>

						<div class="d-flex flex-column flex-grow-1 mr-2">
							<a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">The best product</a>
							<span class="text-muted font-size-sm">Due in 2 Days</span>
						</div>

						<span class="font-weight-bolder text-info py-1 font-size-lg">+8%</span>
					</div>
					<!--end: Item-->
				</div>

				<!--end::Section-->
			</div>
			<!--end::Tabpane-->

			<!--begin::Tabpane-->
			<div class="tab-pane fade pt-2 pr-5 mr-n5" id="kt_quick_panel_notifications" role="tabpanel">
				<!--begin::Nav-->
				<div class="navi navi-icon-circle navi-spacer-x-0">
					<!--begin::Item-->
					<a href="#" class="navi-item">
						<div class="navi-link rounded">
							<div class="symbol symbol-50 mr-3">
								<div class="symbol-label"><i class="flaticon-bell text-success icon-lg"></i></div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold font-size-lg">
									5 new user generated report
								</div>
								<div class="text-muted">
									Reports based on sales
								</div>
							</div>
						</div>
					</a>
					<!--end::Item-->
					<!--begin::Item-->
					<a href="#" class="navi-item">
						<div class="navi-link rounded">
							<div class="symbol symbol-50 mr-3">
								<div class="symbol-label"><i class="flaticon2-box text-danger icon-lg"></i></div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold  font-size-lg">
									2 new items submited
								</div>
								<div class="text-muted">
									by Grog John
								</div>
							</div>
						</div>
					</a>
					<!--end::Item-->
					<!--begin::Item-->
					<a href="#" class="navi-item">
						<div class="navi-link rounded">
							<div class="symbol symbol-50 mr-3">
								<div class="symbol-label"><i class="flaticon-psd text-primary icon-lg"></i></div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold  font-size-lg">
									79 PSD files generated
								</div>
								<div class="text-muted">
									Reports based on sales
								</div>
							</div>
						</div>
					</a>
					<!--end::Item-->
					<!--begin::Item-->
					<a href="#" class="navi-item">
						<div class="navi-link rounded">
							<div class="symbol symbol-50 mr-3">
								<div class="symbol-label"><i class="flaticon2-supermarket text-warning icon-lg"></i></div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold  font-size-lg">
									$2900 worth producucts sold
								</div>
								<div class="text-muted">
									Total 234 items
								</div>
							</div>
						</div>
					</a>
					<!--end::Item-->
					<!--begin::Item-->
					<a href="#" class="navi-item">
						<div class="navi-link rounded">
							<div class="symbol symbol-50 mr-3">
								<div class="symbol-label"><i class="flaticon-paper-plane-1 text-success icon-lg"></i></div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold  font-size-lg">
									4.5h-avarage response time
								</div>
								<div class="text-muted">
									Fostest is Barry
								</div>
							</div>
						</div>
					</a>
					<!--end::Item-->
					<!--begin::Item-->
					<a href="#" class="navi-item">
						<div class="navi-link rounded">
							<div class="symbol symbol-50 mr-3">
								<div class="symbol-label"><i class="flaticon-safe-shield-protection text-danger icon-lg"></i></div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold  font-size-lg">
									3 Defence alerts
								</div>
								<div class="text-muted">
									40% less alerts thar last week
								</div>
							</div>
						</div>
					</a>
					<!--end::Item-->
					<!--begin::Item-->
					<a href="#" class="navi-item">
						<div class="navi-link rounded">
							<div class="symbol symbol-50 mr-3">
								<div class="symbol-label"><i class="flaticon-notepad text-primary icon-lg"></i></div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold  font-size-lg">
									Avarage 4 blog posts per author
								</div>
								<div class="text-muted">
									Most posted 12 time
								</div>
							</div>
						</div>
					</a>
					<!--end::Item-->
					<!--begin::Item-->
					<a href="#" class="navi-item">
						<div class="navi-link rounded">
							<div class="symbol symbol-50 mr-3">
								<div class="symbol-label"><i class="flaticon-users-1 text-warning icon-lg"></i></div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold  font-size-lg">
									16 authors joined last week
								</div>
								<div class="text-muted">
									9 photodrapehrs, 7 designer
								</div>
							</div>
						</div>
					</a>
					<!--end::Item-->
					<!--begin::Item-->
					<a href="#" class="navi-item">
						<div class="navi-link rounded">
							<div class="symbol symbol-50 mr-3">
								<div class="symbol-label"><i class="flaticon2-box text-info icon-lg"></i></div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold  font-size-lg">
									2 new items have been submited
								</div>
								<div class="text-muted">
									by Grog John
								</div>
							</div>
						</div>
					</a>
					<!--end::Item-->
					<!--begin::Item-->
					<a href="#" class="navi-item">
						<div class="navi-link rounded">
							<div class="symbol symbol-50 mr-3">
								<div class="symbol-label"><i class="flaticon2-download text-success icon-lg"></i></div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold  font-size-lg">
									2.8 GB-total downloads size
								</div>
								<div class="text-muted">
									Mostly PSD end AL concepts
								</div>
							</div>
						</div>
					</a>
					<!--end::Item-->
					<!--begin::Item-->
					<a href="#" class="navi-item">
						<div class="navi-link rounded">
							<div class="symbol symbol-50 mr-3">
								<div class="symbol-label"><i class="flaticon2-supermarket text-danger icon-lg"></i></div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold  font-size-lg">
									$2900 worth producucts sold
								</div>
								<div class="text-muted">
									Total 234 items
								</div>
							</div>
						</div>
					</a>
					<!--end::Item-->
					<!--begin::Item-->
					<a href="#" class="navi-item">
						<div class="navi-link rounded">
							<div class="symbol symbol-50 mr-3">
								<div class="symbol-label"><i class="flaticon-bell text-primary icon-lg"></i></div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold  font-size-lg">
									7 new user generated report
								</div>
								<div class="text-muted">
									Reports based on sales
								</div>
							</div>
						</div>
					</a>
					<!--end::Item-->
					<!--begin::Item-->
					<a href="#" class="navi-item">
						<div class="navi-link rounded">
							<div class="symbol symbol-50 mr-3">
								<div class="symbol-label"><i class="flaticon-paper-plane-1 text-success icon-lg"></i></div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold  font-size-lg">
									4.5h-avarage response time
								</div>
								<div class="text-muted">
									Fostest is Barry
								</div>
							</div>
						</div>
					</a>
					<!--end::Item-->
				</div>
				<!--end::Nav-->
			</div>
			<!--end::Tabpane-->

			<!--begin::Tabpane-->
			<div class="tab-pane fade pt-3 pr-5 mr-n5" id="kt_quick_panel_settings" role="tabpanel">
				<form class="form">
					<!--begin::Section-->
					<div>
						<h5 class="font-weight-bold mb-3">Customer Care</h5>
						<div class="form-group mb-0 row align-items-center">
							<label class="col-8 col-form-label">Enable Notifications:</label>
							<div class="col-4 d-flex justify-content-end">
								<span class="switch switch-success switch-sm">
									<label>
										<input type="checkbox" checked="checked" name="select" />
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="form-group mb-0 row align-items-center">
							<label class="col-8 col-form-label">Enable Case Tracking:</label>
							<div class="col-4 d-flex justify-content-end">
								<span class="switch switch-success switch-sm">
									<label>
										<input type="checkbox" name="quick_panel_notifications_2" />
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="form-group mb-0 row align-items-center">
							<label class="col-8 col-form-label">Support Portal:</label>
							<div class="col-4 d-flex justify-content-end">
								<span class="switch switch-success switch-sm">
									<label>
										<input type="checkbox" checked="checked" name="select" />
										<span></span>
									</label>
								</span>
							</div>
						</div>
					</div>
					<!--end::Section-->

					<div class="separator separator-dashed my-6"></div>

					<!--begin::Section-->
					<div class="pt-2">
						<h5 class="font-weight-bold mb-3">Reports</h5>
						<div class="form-group mb-0 row align-items-center">
							<label class="col-8 col-form-label">Generate Reports:</label>
							<div class="col-4 d-flex justify-content-end">
								<span class="switch switch-sm switch-danger">
									<label>
										<input type="checkbox" checked="checked" name="select" />
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="form-group mb-0 row align-items-center">
							<label class="col-8 col-form-label">Enable Report Export:</label>
							<div class="col-4 d-flex justify-content-end">
								<span class="switch switch-sm switch-danger">
									<label>
										<input type="checkbox" name="select" />
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="form-group mb-0 row align-items-center">
							<label class="col-8 col-form-label">Allow Data Collection:</label>
							<div class="col-4 d-flex justify-content-end">
								<span class="switch switch-sm switch-danger">
									<label>
										<input type="checkbox" checked="checked" name="select" />
										<span></span>
									</label>
								</span>
							</div>
						</div>
					</div>
					<!--end::Section-->

					<div class="separator separator-dashed my-6"></div>

					<!--begin::Section-->
					<div class="pt-2">
						<h5 class="font-weight-bold mb-3">Memebers</h5>
						<div class="form-group mb-0 row align-items-center">
							<label class="col-8 col-form-label">Enable Member singup:</label>
							<div class="col-4 d-flex justify-content-end">
								<span class="switch switch-sm switch-primary">
									<label>
										<input type="checkbox" checked="checked" name="select" />
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="form-group mb-0 row align-items-center">
							<label class="col-8 col-form-label">Allow User Feedbacks:</label>
							<div class="col-4 d-flex justify-content-end">
								<span class="switch switch-sm switch-primary">
									<label>
										<input type="checkbox" name="select" />
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="form-group mb-0 row align-items-center">
							<label class="col-8 col-form-label">Enable Customer Portal:</label>
							<div class="col-4 d-flex justify-content-end">
								<span class="switch switch-sm switch-primary">
									<label>
										<input type="checkbox" checked="checked" name="select" />
										<span></span>
									</label>
								</span>
							</div>
						</div>
					</div>
					<!--end::Section-->
				</form>
			</div>
			<!--end::Tabpane-->
		</div>
	</div>
	<!--end::Content-->
</div>
<!--end::Quick Panel-->

<!--begin::Chat Panel-->
<div class="modal modal-sticky modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!--begin::Card-->
			<div class="card card-custom">
				<!--begin::Header-->
				<div class="card-header align-items-center px-4 py-3">
					<div class="text-left flex-grow-1">
						<!--begin::Dropdown Menu-->
						<div class="dropdown dropdown-inline">
							<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="svg-icon svg-icon-lg">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span> </button>
							<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-md">
								<!--begin::Navigation-->
								<ul class="navi navi-hover py-5">
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon"><i class="flaticon2-drop"></i></span>
											<span class="navi-text">New Group</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon"><i class="flaticon2-list-3"></i></span>
											<span class="navi-text">Contacts</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon"><i class="flaticon2-rocket-1"></i></span>
											<span class="navi-text">Groups</span>
											<span class="navi-link-badge">
												<span class="label label-light-primary label-inline font-weight-bold">new</span>
											</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon"><i class="flaticon2-bell-2"></i></span>
											<span class="navi-text">Calls</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon"><i class="flaticon2-gear"></i></span>
											<span class="navi-text">Settings</span>
										</a>
									</li>

									<li class="navi-separator my-3"></li>

									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon"><i class="flaticon2-magnifier-tool"></i></span>
											<span class="navi-text">Help</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon"><i class="flaticon2-bell-2"></i></span>
											<span class="navi-text">Privacy</span>
											<span class="navi-link-badge">
												<span class="label label-light-danger label-rounded font-weight-bold">5</span>
											</span>
										</a>
									</li>
								</ul>
								<!--end::Navigation-->
							</div>
						</div>
						<!--end::Dropdown Menu-->
					</div>
					<div class="text-center flex-grow-1">
						<div class="text-dark-75 font-weight-bold font-size-h5">Matt Pears</div>
						<div>
							<span class="label label-dot label-success"></span>
							<span class="font-weight-bold text-muted font-size-sm">Active</span>
						</div>
					</div>
					<div class="text-right flex-grow-1">
						<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-dismiss="modal">
							<i class="ki ki-close icon-1x"></i>
						</button>
					</div>
				</div>
				<!--end::Header-->

				<!--begin::Body-->
				<div class="card-body">
					<!--begin::Scroll-->
					<div class="scroll scroll-pull" data-height="375" data-mobile-height="300">
						<!--begin::Messages-->
						<div class="messages">
							<!--begin::Message In-->
							<div class="d-flex flex-column mb-5 align-items-start">
								<div class="d-flex align-items-center">
									<div class="symbol symbol-circle symbol-40 mr-3">
										<img alt="Pic" src="assets/media/users/300_12.jpg" />
									</div>
									<div>
										<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
										<span class="text-muted font-size-sm">2 Hours</span>
									</div>
								</div>
								<div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
									How likely are you to recommend our company
									to your friends and family?
								</div>
							</div>
							<!--end::Message In-->

							<!--begin::Message Out-->
							<div class="d-flex flex-column mb-5 align-items-end">
								<div class="d-flex align-items-center">
									<div>
										<span class="text-muted font-size-sm">3 minutes</span>
										<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
									</div>
									<div class="symbol symbol-circle symbol-40 ml-3">
										<img alt="Pic" src="assets/media/users/300_21.jpg" />
									</div>
								</div>
								<div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
									Hey there, we’re just writing to let you know
									that you’ve been subscribed to a repository on GitHub.
								</div>
							</div>
							<!--end::Message Out-->

							<!--begin::Message In-->
							<div class="d-flex flex-column mb-5 align-items-start">
								<div class="d-flex align-items-center">
									<div class="symbol symbol-circle symbol-40 mr-3">
										<img alt="Pic" src="assets/media/users/300_21.jpg" />
									</div>
									<div>
										<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
										<span class="text-muted font-size-sm">40 seconds</span>
									</div>
								</div>
								<div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
									Ok, Understood!
								</div>
							</div>
							<!--end::Message In-->

							<!--begin::Message Out-->
							<div class="d-flex flex-column mb-5 align-items-end">
								<div class="d-flex align-items-center">
									<div>
										<span class="text-muted font-size-sm">Just now</span>
										<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
									</div>
									<div class="symbol symbol-circle symbol-40 ml-3">
										<img alt="Pic" src="assets/media/users/300_21.jpg" />
									</div>
								</div>
								<div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
									You’ll receive notifications for all issues, pull requests!
								</div>
							</div>
							<!--end::Message Out-->

							<!--begin::Message In-->
							<div class="d-flex flex-column mb-5 align-items-start">
								<div class="d-flex align-items-center">
									<div class="symbol symbol-circle symbol-40 mr-3">
										<img alt="Pic" src="assets/media/users/300_12.jpg" />
									</div>
									<div>
										<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
										<span class="text-muted font-size-sm">40 seconds</span>
									</div>
								</div>
								<div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
									You can unwatch this repository immediately by clicking here: <a href="#">https://github.com</a>
								</div>
							</div>
							<!--end::Message In-->

							<!--begin::Message Out-->
							<div class="d-flex flex-column mb-5 align-items-end">
								<div class="d-flex align-items-center">
									<div>
										<span class="text-muted font-size-sm">Just now</span>
										<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
									</div>
									<div class="symbol symbol-circle symbol-40 ml-3">
										<img alt="Pic" src="assets/media/users/300_21.jpg" />
									</div>
								</div>
								<div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
									Discover what students who viewed Learn Figma - UI/UX Design. Essential Training also viewed
								</div>
							</div>
							<!--end::Message Out-->

							<!--begin::Message In-->
							<div class="d-flex flex-column mb-5 align-items-start">
								<div class="d-flex align-items-center">
									<div class="symbol symbol-circle symbol-40 mr-3">
										<img alt="Pic" src="assets/media/users/300_12.jpg" />
									</div>
									<div>
										<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
										<span class="text-muted font-size-sm">40 seconds</span>
									</div>
								</div>
								<div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
									Most purchased Business courses during this sale!
								</div>
							</div>
							<!--end::Message In-->

							<!--begin::Message Out-->
							<div class="d-flex flex-column mb-5 align-items-end">
								<div class="d-flex align-items-center">
									<div>
										<span class="text-muted font-size-sm">Just now</span>
										<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
									</div>
									<div class="symbol symbol-circle symbol-40 ml-3">
										<img alt="Pic" src="assets/media/users/300_21.jpg" />
									</div>
								</div>
								<div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
									Company BBQ to celebrate the last quater achievements and goals. Food and drinks provided
								</div>
							</div>
							<!--end::Message Out-->
						</div>
						<!--end::Messages-->
					</div>
					<!--end::Scroll-->
				</div>
				<!--end::Body-->

				<!--begin::Footer-->
				<div class="card-footer align-items-center">
					<!--begin::Compose-->
					<textarea class="form-control border-0 p-0" rows="2" placeholder="Type a message"></textarea>
					<div class="d-flex align-items-center justify-content-between mt-5">
						<div class="mr-3">
							<a href="#" class="btn btn-clean btn-icon btn-md mr-1"><i class="flaticon2-photograph icon-lg"></i></a>
							<a href="#" class="btn btn-clean btn-icon btn-md"><i class="flaticon2-photo-camera  icon-lg"></i></a>
						</div>
						<div>
							<button type="button" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">Send</button>
						</div>
					</div>
					<!--begin::Compose-->
				</div>
				<!--end::Footer-->
			</div>
			<!--end::Card-->
		</div>
	</div>
</div>
<!--end::Chat Panel-->

<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
	<span class="svg-icon">
		<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				<polygon points="0 0 24 0 24 24 0 24" />
				<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
				<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
			</g>
		</svg>
		<!--end::Svg Icon-->
	</span>
</div>
<!--end::Scrolltop-->

<!--begin::Sticky Toolbar-->
<!--<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">-->
<!--begin::Item-->
<!--	<li class="nav-item mb-2" id="kt_demo_panel_toggle" data-toggle="tooltip" title="Check out more demos" data-placement="right">-->
<!--		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-success" href="#">-->
<!--			<i class="flaticon2-drop"></i>-->
<!--		</a>-->
<!--	</li>-->
<!--end::Item-->

<!--begin::Item-->
<!--	<li class="nav-item mb-2" data-toggle="tooltip" title="Layout Builder" data-placement="left">-->
<!--		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary" href="https://preview.keenthemes.com/metronic/preview/demo3/builder.html" target="_blank">-->
<!--			<i class="flaticon2-gear"></i>-->
<!--		</a>-->
<!--	</li>-->
<!--end::Item-->

<!--begin::Item-->
<!--	<li class="nav-item mb-2" data-toggle="tooltip" title="Documentation" data-placement="left">-->
<!--		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-warning btn-hover-warning" href="https://keenthemes.com/metronic/?page=docs" target="_blank">-->
<!--			<i class="flaticon2-telegram-logo"></i>-->
<!--		</a>-->
<!--	</li>-->
<!--end::Item-->

<!--begin::Item-->
<!--	<li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="Chat Example" data-placement="left">-->
<!--		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-danger btn-hover-danger" href="#" data-toggle="modal" data-target="#kt_chat_modal">-->
<!--			<i class="flaticon2-chat-1"></i>-->
<!--		</a>-->
<!--	</li>-->
<!--end::Item-->
<!--</ul>-->
<!--end::Sticky Toolbar-->
<!--begin::Demo Panel-->
<div id="kt_demo_panel" class="offcanvas offcanvas-right p-10">
	<!--begin::Header-->
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
		<h4 class="font-weight-bold m-0">
			Select A Demo
		</h4>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_demo_panel_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>
	<!--end::Header-->

	<!--begin::Content-->
	<div class="offcanvas-content">
		<!--begin::Wrapper-->
		<div class="offcanvas-wrapper mb-5 scroll-pull">
			<h5 class="font-weight-bold mb-4 text-center">Demo 1</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo1.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="https://preview.keenthemes.com/metronicdemo1/index.html" class="btn font-weight-bold btn-primary btn-shadow " target="_blank">Default</a>
					<a href="https://preview.keenthemes.com/metronicdemo1/rtl/index.html" class="btn btn-light btn-shadow" target="_blank">RTL Version</a>
				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 2</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo2.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="https://preview.keenthemes.com/metronicdemo2/index.html" class="btn font-weight-bold btn-primary btn-shadow " target="_blank">Default</a>
					<a href="https://preview.keenthemes.com/metronicdemo2/rtl/index.html" class="btn btn-light btn-shadow" target="_blank">RTL Version</a>
				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 3</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo offcanvas-demo-active">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo3.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="https://preview.keenthemes.com/metronicdemo3/index.html" class="btn font-weight-bold btn-primary btn-shadow " target="_blank">Default</a>
					<a href="https://preview.keenthemes.com/metronicdemo3/rtl/index.html" class="btn btn-light btn-shadow" target="_blank">RTL Version</a>
				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 4</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo4.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="https://preview.keenthemes.com/metronicdemo4/index.html" class="btn font-weight-bold btn-primary btn-shadow " target="_blank">Default</a>
					<a href="https://preview.keenthemes.com/metronicdemo4/rtl/index.html" class="btn btn-light btn-shadow" target="_blank">RTL Version</a>
				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 5</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo5.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="https://preview.keenthemes.com/metronicdemo5/index.html" class="btn font-weight-bold btn-primary btn-shadow " target="_blank">Default</a>
					<a href="https://preview.keenthemes.com/metronicdemo5/rtl/index.html" class="btn btn-light btn-shadow" target="_blank">RTL Version</a>
				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 6</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo6.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="https://preview.keenthemes.com/metronicdemo6/index.html" class="btn font-weight-bold btn-primary btn-shadow " target="_blank">Default</a>
					<a href="https://preview.keenthemes.com/metronicdemo6/rtl/index.html" class="btn btn-light btn-shadow" target="_blank">RTL Version</a>
				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 7</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo7.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="https://preview.keenthemes.com/metronicdemo7/index.html" class="btn font-weight-bold btn-primary btn-shadow " target="_blank">Default</a>
					<a href="https://preview.keenthemes.com/metronicdemo7/rtl/index.html" class="btn btn-light btn-shadow" target="_blank">RTL Version</a>
				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 8</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo8.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="https://preview.keenthemes.com/metronicdemo8/index.html" class="btn font-weight-bold btn-primary btn-shadow " target="_blank">Default</a>
					<a href="https://preview.keenthemes.com/metronicdemo8/rtl/index.html" class="btn btn-light btn-shadow" target="_blank">RTL Version</a>
				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 9</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo9.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="https://preview.keenthemes.com/metronicdemo9/index.html" class="btn font-weight-bold btn-primary btn-shadow " target="_blank">Default</a>
					<a href="https://preview.keenthemes.com/metronicdemo9/rtl/index.html" class="btn btn-light btn-shadow" target="_blank">RTL Version</a>
				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 10</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo10.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="https://preview.keenthemes.com/metronicdemo10/index.html" class="btn font-weight-bold btn-primary btn-shadow " target="_blank">Default</a>
					<a href="https://preview.keenthemes.com/metronicdemo10/rtl/index.html" class="btn btn-light btn-shadow" target="_blank">RTL Version</a>
				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 11</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo11.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="https://preview.keenthemes.com/metronicdemo11/index.html" class="btn font-weight-bold btn-primary btn-shadow " target="_blank">Default</a>
					<a href="https://preview.keenthemes.com/metronicdemo11/rtl/index.html" class="btn btn-light btn-shadow" target="_blank">RTL Version</a>
				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 12</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo12.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="https://preview.keenthemes.com/metronicdemo12/index.html" class="btn font-weight-bold btn-primary btn-shadow " target="_blank">Default</a>
					<a href="https://preview.keenthemes.com/metronicdemo12/rtl/index.html" class="btn btn-light btn-shadow" target="_blank">RTL Version</a>
				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 13</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo13.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="https://preview.keenthemes.com/metronicdemo13/index.html" class="btn font-weight-bold btn-primary btn-shadow " target="_blank">Default</a>
					<a href="https://preview.keenthemes.com/metronicdemo13/rtl/index.html" class="btn btn-light btn-shadow" target="_blank">RTL Version</a>
				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 14</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo14.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 15</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo15.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 16</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo16.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 17</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo17.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 18</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo18.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 19</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo19.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 20</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo20.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 21</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo21.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 22</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo22.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 23</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo23.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 24</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo24.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 25</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo25.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 26</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo26.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 27</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo27.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 28</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo28.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 29</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo29.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
			<h5 class="font-weight-bold mb-4 text-center">Demo 30</h5>
			<div class="overlay rounded-lg mb-8 offcanvas-demo ">
				<div class="overlay-wrapper rounded-lg">
					<img src="assets/../../../../../doc/assets/img/demos/demo30.png" alt="" class="w-100" />
				</div>
				<div class="overlay-layer">
					<a href="#" class="btn font-weight-bold btn-primary btn-shadow disabled">Coming soon</a>

				</div>
			</div>
		</div>
		<!--end::Wrapper-->

		<!--begin::Purchase-->
		<div class="offcanvas-footer">
			<a href="https://1.envato.market/EA4JP" target="_blank" class="btn btn-block btn-danger btn-shadow font-weight-bolder text-uppercase">
				Buy Metronic Now!
			</a>
		</div>
		<!--end::Purchase-->
	</div>
	<!--end::Content-->
</div>
<!--end::Demo Panel-->

<script>
	var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>
	var KTAppSettings = {
		"breakpoints": {
			"sm": 576,
			"md": 768,
			"lg": 992,
			"xl": 1200,
			"xxl": 1200
		},
		"colors": {
			"theme": {
				"base": {
					"white": "#ffffff",
					"primary": "#1BC5BD",
					"secondary": "#E5EAEE",
					"success": "#1BC5BD",
					"info": "#6993FF",
					"warning": "#FFA800",
					"danger": "#F64E60",
					"light": "#F3F6F9",
					"dark": "#212121"
				},
				"light": {
					"white": "#ffffff",
					"primary": "#1BC5BD",
					"secondary": "#ECF0F3",
					"success": "#C9F7F5",
					"info": "#E1E9FF",
					"warning": "#FFF4DE",
					"danger": "#FFE2E5",
					"light": "#F3F6F9",
					"dark": "#D6D6E0"
				},
				"inverse": {
					"white": "#ffffff",
					"primary": "#ffffff",
					"secondary": "#212121",
					"success": "#ffffff",
					"info": "#ffffff",
					"warning": "#ffffff",
					"danger": "#ffffff",
					"light": "#464E5F",
					"dark": "#ffffff"
				}
			},
			"gray": {
				"gray-100": "#F3F6F9",
				"gray-200": "#ECF0F3",
				"gray-300": "#E5EAEE",
				"gray-400": "#D6D6E0",
				"gray-500": "#B5B5C3",
				"gray-600": "#80808F",
				"gray-700": "#464E5F",
				"gray-800": "#1B283F",
				"gray-900": "#212121"
			}
		},
		"font-family": "Poppins"
	};
</script>
<!--end::Global Config-->

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Theme Bundle-->


<!--begin::Page Scripts(used by this page)-->
<script src="assets/js/pages/crud/forms/validation/form-controls.js"></script>
<!--end::Page Scripts-->
<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        $("#mode_transport").change(function() {-->
<!--            var mode_transport = $(this).val();-->
<!--            if (mode_transport == "road") {-->
<!--                $('#productoptClass').show();-->
<!--            } else {-->
<!--                $('#productoptClass').hide();-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--</script>-->
<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        $("#mode_transport").change(function() {-->
<!--            var mode_transport = $(this).val();-->
<!--            if (mode_transport == "train") {-->
<!--                $('#productoptClass1').show();-->
<!--            } else {-->
<!--                $('#productoptClass1').hide();-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--</script>-->
<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        $("#mode_transport").change(function() {-->
<!--            var mode_transport = $(this).val();-->
<!--            if (mode_transport == "air") {-->
<!--                $('#productoptClass2').show();-->
<!--            } else {-->
<!--                $('#productoptClass2').hide();-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--</script>-->

<script>
	$(document).ready(function() {
		$("#agent").change(function() {
			var agent = $(this).val();
			if (agent == "yes") {
				$('#agentoptClass').show();
			} else {
				$('#agentoptClass').hide();
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$("#gst").change(function() {
			var gst = $(this).val();
			if (gst == "yes") {
				$('#gstoptClass1').show();
			} else {
				$('#gstoptClass1').hide();
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		$("#gst").change(function() {
			var gst = $(this).val();
			if (gst == "interstate") {
				$('#gstoptClass2').show();
			} else {
				$('#gstoptClass2').hide();
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		$("#invoice_type").change(function() {
			var invoice_type = $(this).val();
			if (invoice_type == "binvoice") {
				$('#optClass').show();
			} else {
				$('#optClass').hide();
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		$("#consignment_type").change(function() {
			var consignment_type = $(this).val();
			if (consignment_type == "month") {
				$('#browser').show();
				$('#optClass59').show();
			} else {
				$('#browser').hide();
				$('#optClass59').hide();
			}
		});
	});

	$(document).ready(function() {
		$("#consignment_type").change(function() {
			var consignment_type = $(this).val();
			if (consignment_type == "month") {
				$('#optClass29').hide();
				
			} else {
				$('#optClass29').show();
			}
		});
	});

	$(document).ready(function() {
		$("#customer_type").change(function() {
			var customer_type = $(this).val();
			if (customer_type == "customer") {
				$('#optClass39').show();
				$('#optClass109').show();
			} else {
				$('#optClass39').hide();
				$('#optClass109').hide();
			}
		});
	});

	$(document).ready(function() {
		$("#customer_type").change(function() {
			var customer_type = $(this).val();
			if (customer_type == "party") {
				$('#optClass49').show();
				$('#optClass99').show();
			} else {
				$('#optClass49').hide();
				$('#optClass99').hide();
			}
		});
	});
	
// 	$(document).ready(function() {
// 		$("#customer_type").change(function() {
// 			var customer_type = $(this).val();
// 			if (customer_type == "party") {
// 				$('#optClass99').show();
// 			} else {
// 				$('#optClass99').hide();
// 			}
// 		});
// 	});
	
// 		$(document).ready(function() {
// 		$("#customer_type").change(function() {
// 			var customer_type = $(this).val();
// 			if (customer_type == "customer") {
// 				$('#optClass109').show();
// 			} else {
// 				$('#optClass109').hide();
// 			}
// 		});
// 	});
	
// 	$(document).ready(function() {
// 		$("#consignment_type").change(function() {
// 			var consignment_type = $(this).val();
// 			if (consignment_type == "month") {
// 				$('#optClass59').hide();
// 			} else {
// 				$('#optClass59').show();
// 			}
// 		});
// 	});
</script>
<script>
	$(document).ready(function() {
		// $("#rate,#quantity_kg").on("keyup", function() {
		//     var quantity_kg = $("#quantity_kg").val();
		//     var rate = $("#rate").val();
		//     var bill_amount = quantity_kg * rate;

		//     $("#bill_amount").val(bill_amount);
		// });
		$("#quantity_kg_radio").on("click", function() {
			if ($('#quantity_kg_radio').prop('checked', true)) {
				var rate = $("#rate").val();
				var quantity_kg = $("#quantity_kg").val();
				var bill_amount = quantity_kg * rate;
				$("#bill_amount").val(bill_amount);
			}
		});
		$("#quantity_nos_radio").on("click", function() {
			if ($('#quantity_nos_radio').prop('checked', true)) {
				var quantity_nos = $("#quantity_nos").val();
				var rate = $("#rate").val();
				var bill_amount = rate * quantity_nos;

				$("#bill_amount").val(bill_amount);
			}
		});

		$("#bill_amount,#docket_charge").on("keyup", function() {
			// 	var cd_charge = $("#cd_charge").val();
			//   console.log(cd_charge,"cd");
			var bill_amount = $("#bill_amount").val();
			//   console.log(bill_amount,"bill");
			var docket_charge = $("#docket_charge").val();
			//   console.log(docket_charge,"dc");
			var subtotal = parseInt(bill_amount) + parseInt(docket_charge);
			//   console.log(subtotal,"total");
			$("#subtotal").val(subtotal);
			$("#total").val(subtotal);
		});

		$("#gstamount,#subtotal").on("keyup", function() {
			var subtotal = $("#subtotal").val();
			var gstamount = $("#gstamount").val();
			var gstamount_value = subtotal / 100 * gstamount;
			$("#gstamount_value").val(gstamount_value);
		});

		$("#subtotal").on("keyup", function() {
			var subtotal = $("#subtotal").val();
			var total = parseInt(subtotal);
			console.log(total, "total");
			$("#total").val(total);
		});

		$("#agent_commission,#gstamount,#subtotal").on("keyup", function() {
			var subtotal = $("#subtotal").val();
			//  console.log(subtotal)
			var agent_commission = $("#agent_commission").val();
			var gstamount = $("#gstamount_value").val();

			if (gstamount != "") {
				var total = parseFloat(subtotal) + parseInt(gstamount) - parseFloat(agent_commission);
				$("#total").val(total);
			} else if (gstamount == "") {
				var total = parseFloat(subtotal) - parseFloat(agent_commission);
				$("#total").val(total);
			}
		});

		$("#gstamount,#subtotal").on("keyup", function() {
			var subtotal = $("#subtotal").val();
			//  console.log(subtotal)
			var gstamount = $("#gstamount_value").val();

			if (gstamount != "") {
				var total = parseFloat(subtotal) + parseInt(gstamount);
				$("#total").val(total);
			} else if (gstamount == "") {
				var total = parseFloat(subtotal);
				$("#total").val(total);
			}
		});

		// 		$("#sgst,#subtotal").on("keyup", function() {
		// 			var subtotal = $("#subtotal").val();
		// 			var sgst = $("#sgst").val();
		// 			var sgst_value = subtotal / 100 * sgst;
		// 			$("#sgst_value").val(sgst_value);
		// 		});

		// 		$("#igst,#subtotal").on("keyup", function() {
		// 			var subtotal = $("#subtotal").val();
		// 			console.log(subtotal, "sub");
		// 			var igst = $("#igst").val();
		// 			console.log(igst, "igst");
		// 			var igst_value = subtotal / 100 * igst;
		// 			$("#igst_value").val(igst_value);
		// 		});

		// 		$("#agent_commission,#igst,#subtotal").on("keyup", function() {
		// 			var subtotal = $("#subtotal").val();
		// 			console.log(subtotal, "sub");
		// 			var agent_commission = $("#agent_commission").val();
		// 			console.log(agent_commission, "agent");
		// 			var igst = $("#igst").val();
		// 			console.log(igst, "igst");
		// 			var total = parseInt(subtotal) + parseInt(igst) + parseInt(agent_commission);
		// 			console.log(total, "total");
		// 			$("#total").val(total);
		// 		});

		// 			} else if (cgst == "" && sgst == "" && igst != "") {
		// 				var total = parseFloat(subtotal) + parseFloat(igst) + parseFloat(agent_commission);
		// 				$("#total").val(total);
		// 			} else if (cgst == "" && sgst == "" && igst == "") {
		// 				$("#total").val(subtotal);
		// 			}



	});
</script>

<script>
	$(document).ready(function() {
		$("#no_stop").on("change", function() {
			//alert(len)
			$("#emi_list_disp").html("");
			$("#emi_list_disp").append('<table><tr><th></th></tr>');
			var len = $(this).val();
			if (len == 1) {
				$("#emi_list_disp").append('<tr><td><input type="text" name="repayment' + len + '" class="form-control repayment" placeholder="Enter Desination"/></td><td><input type="datetime-local" name="advance_date' + len + '" class="form-control" /></td></tr>');
			} else {
				var rows = len;
				for (var i = 0; i < rows; i++) {
					$("#emi_list_disp").append('<tr><td><input type="text" name="repayment' + i + '" class="form-control repayment" placeholder="Enter Desination"/></td><td><input type="datetime-local" name="advance_date' + i + '" class="form-control" /><input type="hidden" name="balance_amount" id="repayment1' + len + '" readonly class="form-control" /></td></tr>');
				}
				// $("#emi_list_disp").append('<tr><td><input type="text" name="repayment'+len+'" id="repayment'+len+'" readonly class="form-control" /><input type="hidden" name="balance_amount" id="repayment1'+len+'" readonly class="form-control" /></td><td><input type="date" name="advance_date" id="repayment1'+len+'" class="form-control"></td></tr>');
			}
			$("#emi_list_disp").append('</table>')

			$(".repayment").on("change", function() {
				var no_stop = $("#no_stop").val();
				var advance_amount = $("#advance_amount").val();
				var installment_amount_result = 0;
				$(".repayment").each(function() {
					if ($(this).val() != "") {
						installment_amount_result += parseInt($(this).val());
					}
				});
				var result = (advance_amount - installment_amount_result);
				$("#repayment" + no_stop).val(result);
				$("#repayment1" + no_stop).val(result);
			});
		});
	});
</script>

<script>

// $(document).ready(function(){  
//     $("#from_name").keyup(function(){
//         $("#myCompanies").html(''); 
//         $.get("fetch_from_name.php", {from_name: $(this).val()}, function(response){  
             
//             $("#myCompanies").html(response);  
//         });  
//     });  
// });

// $("#from_name").on('change',function(){
//     var from_name=$(this).val();
//     alert(from_name)
//     $.ajax({
//         url:'ajax_request.php',
//         type:'POST',
//         dataType:'json',
//         data:{"action":"search_from_address","from_name":from_name},
//         success:function(result_job)
//         {
//             if(result_jon.status==1)
//             {
//                 $('#from_address').val(result_job.data[0].from_address);
// 			    $('#from_contact').val(result_job.data[0].from_contact);
//             }
//         }
//     });
    
// });

	$(document).ready(function() {
		$('#customer_type').on('change',function() {
		   
			var cus_type=$(this).val();

            if(cus_type=="party")
            {
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
						   
				
							$('#myCompanies').append('<option value="'+ result_job.data[i].from_name + '">'+result_job.data[i].from_name+'</option>');
						}


					}

				}
			});
            }
		
		});

		$('#from_name').on('input', function() {
			var from_name = $(this).val();
                
                $.ajax({
                    url:'ajax_request.php',
                    type:'POST',
                    dataType:'json',
                    data:{"action":"search_from_address","from_name":from_name},
                    success:function(result_job)
                    {
                        // alert('test')
                        if(result_job.status==1)
                        {
                            $('#from_address').val(result_job.data[0].from_address);
            			    $('#from_contact').val(result_job.data[0].from_contact);
            			    $('#from_cx_id').val(result_job.data[0].from_cx_id);
                        }
                    }
                });
		
// 			$('#from_name').val(from_name);
// 			$('#from_address').val(from_address);
// 			$('#from_contact').val(from_contact);
// 			$('#from_cx_id').val(from_cx_id);
		});
	});
	
		$(document).ready(function() {
		$('#customer_type').on('change',function() {
		   
			var cus_type=$(this).val();

            if(cus_type=="party")
            {
                	$.ajax({
				url: "ajax_request.php?branch=<?=$branch?>",
				type: "POST",
				dataType: "json",
				data: {
					"action": "search_from_name1"
				},
				success: function(result_job) {
					if (result_job.status == 1) {
			
						var length = result_job.data.length;
				
						for (var i = 0; i < length; i++) {
						   
				
							$('#myCompanies1').append('<option value="'+ result_job.data[i].from_name + '">'+result_job.data[i].from_name+'</option>');
						}


					}

				}
			});
            }
		
		});

		$('#from_name').on('input', function() {
			var from_name = $(this).val();
                
                $.ajax({
                    url:'ajax_request.php',
                    type:'POST',
                    dataType:'json',
                    data:{"action":"search_from_address","from_name":from_name},
                    success:function(result_job)
                    {
                        // alert('test')
                        if(result_job.status==1)
                        {
                            $('#from_address').val(result_job.data[0].from_address);
            			    $('#from_contact').val(result_job.data[0].from_contact);
            			    $('#from_cx_id').val(result_job.data[0].from_cx_id);
                        }
                    }
                });
		
// 			$('#from_name').val(from_name);
// 			$('#from_address').val(from_address);
// 			$('#from_contact').val(from_contact);
// 			$('#from_cx_id').val(from_cx_id);
		});
	});

	$(document).ready(function() {
		$('#customer_type').on('change',function() {
		   
			var cus_type=$(this).val();

            if(cus_type=="party")
            {
                	$.ajax({
				url: "ajax_request.php?branch=<?=$branch?>&&username=<?=$username?>",
				type: "POST",
				dataType: "json",
				data: {
					"action": "search_from_name2"
				},
				success: function(result_job) {
					if (result_job.status == 1) {
			
						var length = result_job.data.length;
				
						for (var i = 0; i < length; i++) {
						   
				
							$('#myCompanies2').append('<option value="'+ result_job.data[i].from_name + '">'+result_job.data[i].from_name+'</option>');
						}


					}

				}
			});
            }
		
		});

		$('#from_name').on('input', function() {
			var from_name = $(this).val();
                
                $.ajax({
                    url:'ajax_request.php',
                    type:'POST',
                    dataType:'json',
                    data:{"action":"search_from_address","from_name":from_name},
                    success:function(result_job)
                    {
                        // alert('test')
                        if(result_job.status==1)
                        {
                            $('#from_address').val(result_job.data[0].from_address);
            			    $('#from_contact').val(result_job.data[0].from_contact);
            			    $('#from_cx_id').val(result_job.data[0].from_cx_id);
                        }
                    }
                });
		
		});
	});
	
	
// 	$(document).ready(function() {
// 		$('#from_name').on('click',function() {
//                 // var id = $("branch").val();
//                 // alert(id)
                
// 			$.ajax({
// 				url: "ajax_request.php?branch=<?=$branch?>",
// 				type: "POST",
// 				dataType: "json",
// 				data: {
// 					"action": "search_from_name1"
// 				},
// 				success: function(result_job) {
// 					if (result_job.status == 1) {
// 						var from_detail1 = '';
						
// 						// $('#from_detail1').html('<select class="form-control" name="mode_transport" id="mode_transport" required><option selected disabled>Select</option><option value="road">Road</option><option value="train">Train</option><option value="air">Air</option></select>');

// 						var length = result_job.data.length;
// 						from_detail1 += '<datalist id="myCompanies1">';
// 						for (var i = 0; i < length; i++) {
						   
// 							from_detail1 += '<option value="'+ result_job.data[i].from_name + '">'+result_job.data[i].from_name+'</option>';
// 						}

// 						from_detail1 += '</datalist>';

// 						$('#from_detail1').append(from_detail1);
// 					}
// 				}
// 			});
// 		});

// 		$('#from_name').on('input', function() {
// 			var from_name = $(this).val();
                
//                 $.ajax({
//                     url:'ajax_request.php',
//                     type:'POST',
//                     dataType:'json',
//                     data:{"action":"search_from_address","from_name":from_name},
//                     success:function(result_job)
//                     {
//                         // alert('test')
//                         if(result_job.status==1)
//                         {
//                             $('#from_address').val(result_job.data[0].from_address);
//             			    $('#from_contact').val(result_job.data[0].from_contact);
//             			    $('#from_cx_id').val(result_job.data[0].from_cx_id);
//                         }
//                     }
//                 });
// // 			$('#from_name').val(from_name);
// // 			$('#from_address').val(from_address);
// // 			$('#from_contact').val(from_contact);
// // 			$('#from_cx_id').val(from_cx_id);
// 		});
// 	});
	
// 	$(document).ready(function() {
// 		$('#from_name').on('click',function() {
//                 // var id = $("branch").val();
//                 // alert(id)
                
// 			$.ajax({
// 				url: "ajax_request.php?branch=<?=$branch?>&&username=<?=$username?>",
// 				type: "POST",
// 				dataType: "json",
// 				data: {
// 					"action": "search_from_name2"
// 				},
// 				success: function(result_job) {
// 					if (result_job.status == 1) {
// 						var from_detail2 = '';
						
// 						// $('#from_detail2').html('<select class="form-control" name="mode_transport" id="mode_transport" required><option selected disabled>Select</option><option value="road">Road</option><option value="train">Train</option><option value="air">Air</option></select>');

// 						var length = result_job.data.length;
// 						from_detail2 += '<datalist id="myCompanies2">';
// 						for (var i = 0; i < length; i++) {
						   
// 							from_detail2 += '<option value="'+ result_job.data[i].from_name + '">'+result_job.data[i].from_name+'</option>';
// 						}

// 						from_detail2 += '</datalist>';

// 						$('#from_detail2').append(from_detail2);
// 					}
// 				}
// 			});
// 		});

// 		$('#from_name').on('input', function() {
// 			var from_name = $(this).val();
                
//                 $.ajax({
//                     url:'ajax_request.php',
//                     type:'POST',
//                     dataType:'json',
//                     data:{"action":"search_from_address","from_name":from_name},
//                     success:function(result_job)
//                     {
//                         // alert('test')
//                         if(result_job.status==1)
//                         {
//                             $('#from_address').val(result_job.data[0].from_address);
//             			    $('#from_contact').val(result_job.data[0].from_contact);
//             			    $('#from_cx_id').val(result_job.data[0].from_cx_id);
//                         }
//                     }
//                 });
// // 			$('#from_name').val(from_name);
// // 			$('#from_address').val(from_address);
// // 			$('#from_contact').val(from_contact);
// // 			$('#from_cx_id').val(from_cx_id);
// 		});
// 	});
	
	$("#customer_type").on('change',function(){
    $.ajax({
        url:'ajax_request.php',
        type:'POST',
        dataType:'json',
        data:{"action":"search_from_address"},
        success:function(result_job)
        {
            if(result_jon.status==1)
            {
                $('#from_address').val(result_job.data[0].from_address);
			    $('#from_contact').val(result_job.data[0].from_contact);
            }
        }
    });
    
});
</script>

<script>
	$(document).ready(function() {
		$('#from_companyname').click(function() {

			$.ajax({
				url: "ajax_request.php",
				type: "POST",
				dataType: "json",
				data: {
					"action": "search_from_months"
				},
				success: function(result_job) {
					if (result_job.status == 1) {
						var from_companyname = '';
						var length = result_job.data.length;
						from_companyname += '<datalist id="brow1" style="position: fixed;">';
						for (var i = 0; i < length; i++) {
							from_companyname += '<option value=' + result_job.data[i].company_name + '>';
						}
						from_companyname += '</datalist>';
						$('#from_companyname').append(from_companyname);
					}
				}
			});
		});

	});
	
	
</script>
</body>
<!--end::Body-->

</html>