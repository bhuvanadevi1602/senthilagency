<?php
include("config.php");
require('header.php');
date_default_timezone_set("Asia/Calcutta");
//  session_start();
$username = $_SESSION['user_name'];
$branch = $_SESSION['courier_mode'];
$userId = $_SESSION['user_id'];

if (isset($_REQUEST['req']) != "") {
    $req = $_REQUEST["req"];
} else {
    $req = "";
}


if (isset($_REQUEST['id']) != "") {
    $id = $_REQUEST["id"];
} else {
    $id = "";
}

$id = $_GET['id'];


if (isset($_POST['register_booking'])) {
    $id = $_POST["id"];
    $document_type = $_POST["document_type"];
    $booking_mode = $_POST["booking_mode"];
    $courier_mode = $_POST["courier_mode"];
    $createdAt = $_POST["createdAt"];
    $customer_type = $_POST["customer_type"];
$consignee_name = $_POST["consignee_name"];

    $update = "UPDATE booking_from SET document_type='$document_type', booking_mode='$booking_mode',courier_mode='$courier_mode',createdAt='$createdAt', customer_type='$customer_type',consignee_name='$consignee_name' where id='$id'";
    $update_sql = mysqli_query($conn, $update); {
     
     
        echo "<script>window.location.href='bookingformedit.php?id=$id';</script>";
        
        
    }
}
if (isset($_POST['register_form'])) {
    $id = $_POST["id"];
    $from_name = $_POST["from_name"];
    $from_address = $_POST["from_address"];
    $from_contact = $_POST["from_contact"];

    $update = "UPDATE booking_from SET from_name='$from_name', from_address='$from_address',from_contact='$from_contact' where id='$id'";

    $update_sql = mysqli_query($conn, $update); {
        echo "<script>window.location.href='bookingformedit.php?id=$id';</script>";
    }
}
if (isset($_POST['register_to'])) {
    $id = $_POST["id"];
    $to_name = $_POST["to_name"];
    $to_address = $_POST["to_address"];
    $to_contact = $_POST["to_contact"];

    $update_otp = "UPDATE booking_from SET to_name='$to_name',to_address='$to_address',to_contact='$to_contact' where id='$id'";

    $update_otp_sql = mysqli_query($conn, $update_otp); {
        echo "<script>window.location.href='bookingformedit.php?id=$id';</script>";
    }
}
if (isset($_POST['register_detail'])) {
    $id = $_POST["id"];
    $booking_number = $_POST["booking_number"];
    $customer_id = $_POST["customer_id"];
    $destination = $_POST["destination"];
    $weight = $_POST["weight"];
    $volume_weight = $_POST["volume_weight"];
    $risk_charge = $_POST["risk_charge"];
    $amount = $_POST["amount"];
    $product_value = $_POST["product_value"];
 $paid_viya = $_POST["paid_viya"];
 $consigne_name=$_POST['consigne_name'];
   
    $update = "UPDATE booking_from SET booking_number='$booking_number', customer_id='$customer_id',destination='$destination',
    weight='$weight', volume_weight='$volume_weight',risk_charge='$risk_charge',
    amount='$amount', product_value='$product_value',paid_viya='$paid_viya' where id='$id'";
    $update_sql = mysqli_query($conn, $update); 
    
     $updateb = "UPDATE base SET  customer_id='$customer_id',weight='$weight', volume_weight='$volume_weight',risk_charge='$risk_charge',total='$amount', product_value='$product_value',paid_viya='$paid_viya' where consignee_name='$consigne_name'";
   $update_sqlb = mysqli_query($conn, $updateb); 
 
        echo "<script>window.location.href='bookingformedit.php?id=$id';</script>";
    }

?>


<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-3 py-lg-8  subheader-transparent " id="kt_subheader">
            <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                        <span></span>
                    </button>
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">
                            Booking Form Detail
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if ($_SESSION['role'] == "super_admin") {
        ?>

            <div class="d-flex flex-column-fluid">
                <div class=" container ">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM booking_from where id='$id'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        ?>

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card card-custom gutter-b  example-compact">
                                        <div class="card-header">
                                            <h3 class="card-title"><b>Booking</b></h3>
                                            <div class="card-toolbar">
                                                <div class="example-tools justify-content-center">
                                                    <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#exampleModalbooking">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                        </span>Edit
                                                    </a>
                                                    <div class="modal fade" id="exampleModalbooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelbooking" aria-hidden="true">
                                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabelbooking"><b>Booking Edit</b></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card-body">
                                                                            <div class="form-group row">
                                                                                <input type="hidden" name="id" value="<?= $id ?>"><label class="col-form-label text-right col-lg-3 col-sm-12">Document Type </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <select class="form-control" name="document_type" id="document_type">
                                                                                        <?php
                                                                                        $Non_document = $Document  = "";
                                                                                        switch ($row['document_type']) {
                                                                                            case 'Non document':
                                                                                                $Non_document = 'selected';
                                                                                                break;
                                                                                            case 'Document':
                                                                                                $Document = 'selected';
                                                                                                break;
                                                                                        }
                                                                                        ?>
                                                                                        <option value="Non document" <?php echo $Non_document; ?>>Non document</option>
                                                                                        <option value="Document" <?php echo $Document; ?>>Document</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                               <div class="form-group row">
                                                                               <label class="col-form-label text-right col-lg-3 col-sm-12">Consignee Name</label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                      <input type="text" class="form-control" name="consignee_name" id="consignee_name" value="<?php echo $row['consignee_name'] ?>" placeholder="Enter Consignee Name" />
                                                                                </div>
                                                                            </div>
                                                                             <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Booking Mode </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <select class="form-control" name="booking_mode" id="booking_mode">
                                                                                        <?php
                                                                                        $ST_Office_booking = $DTDC_Office  = $Maruti_Office = $GST_Billing  = $Cash_Booking = "";
                                                                                        switch ($row['booking_mode']) {
                                                                                            case 'ST Office booking':
                                                                                                $ST_Office_booking = 'selected';
                                                                                                break;
                                                                                            case 'DTDC Office':
                                                                                                $DTDC_Office = 'selected';
                                                                                                break;
                                                                                            case 'Maruti Office':
                                                                                                $Maruti_Office = 'selected';
                                                                                                break;
                                                                                            case 'GST Billing':
                                                                                                $GST_Billing = 'selected';
                                                                                                break;
                                                                                            case 'Cash Booking':
                                                                                                $Cash_Booking = 'selected';
                                                                                                break;
                                                                                        }
                                                                                        ?>
                                                                                        <option value="ST Office booking" <?php echo $ST_Office_booking; ?>>ST Office booking</option>
                                                                                        <option value="DTDC Office" <?php echo $DTDC_Office; ?>>DTDC Office</option>
                                                                                        <option value="Maruti Office" <?php echo $Maruti_Office; ?>>Maruti Office</option>
                                                                                        <option value="GST Billing" <?php echo $GST_Billing; ?>>GST Billing</option>
                                                                                        <option value="Cash Booking" <?php echo $Cash_Booking; ?>>Cash Booking</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Courier Mode </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <select class="form-control" name="courier_mode" id="courier_mode" required>
                                                                                        <?php
                                                                                        $Delivery = $DTDC  = $Maruti = $Professional  = $Speed_Post = $ST_Courier  = $Blue_Dart = $International  = "";
                                                                                        switch ($row['courier_mode']) {
                                                                                            case 'Delivery':
                                                                                                $Delivery = 'selected';
                                                                                                break;
                                                                                            case 'DTDC':
                                                                                                $DTDC = 'selected';
                                                                                                break;
                                                                                            case 'Maruti':
                                                                                                $Maruti = 'selected';
                                                                                                break;
                                                                                            case 'Professional':
                                                                                                $Professional = 'selected';
                                                                                                break;
                                                                                            case 'Speed Post':
                                                                                                $Speed_Post = 'selected';
                                                                                                break;
                                                                                            case 'ST Courier':
                                                                                                $ST_Courier = 'selected';
                                                                                                break;
                                                                                            case 'Blue Dart':
                                                                                                $Blue_Dart = 'selected';
                                                                                                break;
                                                                                            case 'International':
                                                                                                $International = 'selected';
                                                                                                break;
                                                                                        }
                                                                                        ?>
                                                                                        <option value="Delivery" <?php echo $Delivery; ?>>Delivery</option>
                                                                                        <option value="DTDC" <?php echo $DTDC; ?>>DTDC</option>
                                                                                        <option value="Maruti" <?php echo $Maruti; ?>>Maruti</option>
                                                                                        <option value="Professional" <?php echo $Professional; ?>>Professional</option>
                                                                                        <option value="Speed Post" <?php echo $Speed_Post; ?>>Speed Post</option>
                                                                                        <option value="ST Courier" <?php echo $ST_Courier; ?>>ST Courier</option>
                                                                                        <option value="Blue Dart" <?php echo $Blue_Dart; ?>>Blue Dart</option>
                                                                                        <option value="International" <?php echo $International; ?>>International</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Date </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="createdAt" id="createdAt" value="<?php echo $row['createdAt'] ?>" placeholder="Enter Date" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Customer Type</label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <select class="form-control" name="customer_type" id="customer_type">
                                                                                        <?php
                                                                                        $Party = $Customer  = "";
                                                                                        switch ($row['customer_type']) {
                                                                                            case 'Party':
                                                                                                $Party = 'selected';
                                                                                                break;
                                                                                            case 'Customer':
                                                                                                $Customer = 'selected';
                                                                                                break;
                                                                                        }
                                                                                        ?>
                                                                                        <option value="Party" <?php echo $Party; ?>>Party</option>
                                                                                        <option value="Customer" <?php echo $Customer; ?>>Customer</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary font-weight-bold" name="register_booking" id="submit">Save</button>
                                                                        <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Document Type </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['document_type']; ?>
                                                </div>
                                            </div>
                                              <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Consignee Name</label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['consignee_name']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Booking Mode </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['booking_mode']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Courier Mode </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['courier_mode']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Date </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['createdAt']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Customer Type </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['customer_type']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-custom gutter-b  example-compact">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <b>From</b>
                                            </h3>
                                            <div class="card-toolbar">
                                                <div class="example-tools justify-content-center">
                                                    <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#exampleModal11">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                        </span>Edit
                                                    </a>
                                                    <div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel"><b>From Edit</b></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card-body">
                                                                            <div class="form-group row">
                                                                                <input type="hidden" name="id" value="<?= $id ?>"><label class="col-form-label text-right col-lg-3 col-sm-12">Name </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="from_name" id="from_name" value="<?php echo $row['from_name'] ?>" placeholder="Enter your Name" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="from_address" id="from_address" value="<?php echo $row['from_address'] ?>" placeholder="Enter your Address" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Contact No </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="from_contact" id="from_contact" value="<?php echo $row['from_contact'] ?>" placeholder="Enter Contact No" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary font-weight-bold" name="register_form" id="submit">Save</button>
                                                                        <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Name </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['from_name']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Address </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['from_address']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Contact No </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['from_contact']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-custom gutter-b  example-compact">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <b>To</b>
                                            </h3>
                                            <div class="card-toolbar">
                                                <div class="example-tools justify-content-center">
                                                    <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#exampleModal">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                        </span>Edit
                                                    </a>
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel"><b>To Edit</b></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="card-body">
                                                                            <div class="form-group row">
                                                                                <input type="hidden" name="id" value="<?= $id ?>"><label class="col-form-label text-right col-lg-3 col-sm-12">Name </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="to_name" id="to_name" value="<?php echo $row['to_name'] ?>" placeholder="Enter your Name" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="to_address" id="to_address" value="<?php echo $row['to_address'] ?>" placeholder="Enter your Address" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Contact No</label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="flaticon2-browser"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="to_contact" id="to_contact" value="<?php echo $row['to_contact'] ?>" placeholder="Enter Contact No" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary font-weight-bold" name="register_to" id="submit">Save</button>
                                                                        <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Name </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['to_name']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Address </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['to_address']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Contact No </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['to_contact']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card card-custom gutter-b  example-compact">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <b>Detail</b>
                                            </h3>
                                            <div class="card-toolbar">
                                                <div class="example-tools justify-content-center">
                                                    <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#exampleModaldetail">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                        </span>Edit
                                                    </a>
                                                    <div class="modal fade" id="exampleModaldetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeldetail" aria-hidden="true">
                                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabeldetail"><b>Detail Edit</b></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="card-body">
                                                                            <div class="form-group row">
                                                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Booking number </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="booking_number" id="booking_number" value="<?php echo $row['booking_number'] ?>" placeholder="Enter booking_number" />
                                                                                    <input type="hidden" class="form-control" name="consigne_name" id="consigne_name" value="<?php echo $row['consignee_name'] ?>" placeholder="Enter booking_number" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Customer ID </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="customer_id" id="customer_id" value="<?php echo $row['customer_id'] ?>" placeholder="Enter Customer ID" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Destination </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="destination" id="destination" value="<?php echo $row['destination'] ?>" placeholder="Enter Destination" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Weight </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="weight" id="weight" value="<?php echo $row['weight'] ?>" placeholder="Enter weight" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Volume weight </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="volume_weight" id="volume_weight" value="<?php echo $row['volume_weight'] ?>" placeholder="Enter Volume weight" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Risk charge </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="risk_charge" id="risk_charge" value="<?php echo $row['risk_charge'] ?>" placeholder="Enter Risk charge" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Amount </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="amount" id="amount" value="<?php echo $row['amount'] ?>" placeholder="Enter Amount" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Product value </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="product_value" id="product_value" value="<?php echo $row['product_value'] ?>" placeholder="Enter Product value" />
                                                                                </div>
                                                                            </div>
                                                                              <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Paid Viya </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <!--<input type="text" class="form-control" name="paid_viya" id="paid_viya" value="<?php echo $row['paid_viya'] ?>" placeholder="Enter Paid Viya" />-->
                                                                               <select class="form-control" name="paid_viya" id="paid_viya" required>
                                                                <option value="">Select Payment Mode</option>
                                                                <option value="cash" <?=($row['paid_viya']=="cash")?'selected':''?>>Cash</option>
                                                                <option value="cheque" <?=($row['paid_viya']=="cheque")?'selected':''?>>Cheque</option>
                                                                <option value="upi" <?=($row['paid_viya']=="upi")?'selected':''?>>UPI</option>
                                                                <option value="neft" <?=($row['paid_viya']=="neft")?'selected':''?>>NEFT</option>
                                                                <option value="rtgs" <?=($row['paid_viya']=="rtgs")?'selected':''?>>RTGS</option>
                                                            </select>
                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary font-weight-bold" name="register_detail" id="submit">Save</button>
                                                                        <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Booking number </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['booking_number']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Customer ID </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['customer_id']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Destination </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['destination']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Weight </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['weight']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Volume weight </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['volume_weight']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Risk charge </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['risk_charge']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Amount </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['amount']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Product value </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['product_value']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Paid Viya </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['paid_viya']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        } else {
        ?>

            <div class="d-flex flex-column-fluid">
                <div class=" container ">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM booking_from where id='$id'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        ?>

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card card-custom gutter-b  example-compact">
                                        <div class="card-header">
                                            <h3 class="card-title"><b>Booking</b></h3>
                                            <div class="card-toolbar">
                                                <div class="example-tools justify-content-center">
                                                    <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#exampleModalbooking">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                        </span>Edit
                                                    </a>
                                                    <div class="modal fade" id="exampleModalbooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelbooking" aria-hidden="true">
                                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabelbooking"><b>Booking Edit</b></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card-body">
                                                                            <div class="form-group row">
                                                                                <input type="hidden" name="id" value="<?= $id ?>"><label class="col-form-label text-right col-lg-3 col-sm-12">Document Type </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <select class="form-control" name="document_type" id="document_type">
                                                                                        <?php
                                                                                        $Non_document = $Document  = "";
                                                                                        switch ($row['document_type']) {
                                                                                            case 'Non document':
                                                                                                $Non_document = 'selected';
                                                                                                break;
                                                                                            case 'Document':
                                                                                                $Document = 'selected';
                                                                                                break;
                                                                                        }
                                                                                        ?>
                                                                                        <option value="Non document" <?php echo $Non_document; ?>>Non document</option>
                                                                                        <option value="Document" <?php echo $Document; ?>>Document</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                             <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Booking Mode </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <select class="form-control" name="booking_mode" id="booking_mode">
                                                                                        <?php
                                                                                        $ST_Office_booking = $DTDC_Office  = $Maruti_Office = $GST_Billing  = $Cash_Booking = "";
                                                                                        switch ($row['booking_mode']) {
                                                                                            case 'ST Office booking':
                                                                                                $ST_Office_booking = 'selected';
                                                                                                break;
                                                                                            case 'DTDC Office':
                                                                                                $DTDC_Office = 'selected';
                                                                                                break;
                                                                                            case 'Maruti Office':
                                                                                                $Maruti_Office = 'selected';
                                                                                                break;
                                                                                            case 'GST Billing':
                                                                                                $GST_Billing = 'selected';
                                                                                                break;
                                                                                            case 'Cash Booking':
                                                                                                $Cash_Booking = 'selected';
                                                                                                break;
                                                                                        }
                                                                                        ?>
                                                                                        <option value="ST Office booking" <?php echo $ST_Office_booking; ?>>ST Office booking</option>
                                                                                        <option value="DTDC Office" <?php echo $DTDC_Office; ?>>DTDC Office</option>
                                                                                        <option value="Maruti Office" <?php echo $Maruti_Office; ?>>Maruti Office</option>
                                                                                        <option value="GST Billing" <?php echo $GST_Billing; ?>>GST Billing</option>
                                                                                        <option value="Cash Booking" <?php echo $Cash_Booking; ?>>Cash Booking</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                              <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Courier Mode </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <select class="form-control" name="courier_mode" id="courier_mode" required>
                                                                                        <?php
                                                                                        $Delivery = $DTDC  = $Maruti = $Professional  = $Speed_Post = $ST_Courier  = $Blue_Dart = $International  = "";
                                                                                        switch ($row['courier_mode']) {
                                                                                            case 'Delivery':
                                                                                                $Delivery = 'selected';
                                                                                                break;
                                                                                            case 'DTDC':
                                                                                                $DTDC = 'selected';
                                                                                                break;
                                                                                            case 'Maruti':
                                                                                                $Maruti = 'selected';
                                                                                                break;
                                                                                            case 'Professional':
                                                                                                $Professional = 'selected';
                                                                                                break;
                                                                                            case 'Speed Post':
                                                                                                $Speed_Post = 'selected';
                                                                                                break;
                                                                                            case 'ST Courier':
                                                                                                $ST_Courier = 'selected';
                                                                                                break;
                                                                                            case 'Blue Dart':
                                                                                                $Blue_Dart = 'selected';
                                                                                                break;
                                                                                            case 'International':
                                                                                                $International = 'selected';
                                                                                                break;
                                                                                        }
                                                                                        ?>
                                                                                        <option value="Delivery" <?php echo $Delivery; ?>>Delivery</option>
                                                                                        <option value="DTDC" <?php echo $DTDC; ?>>DTDC</option>
                                                                                        <option value="Maruti" <?php echo $Maruti; ?>>Maruti</option>
                                                                                        <option value="Professional" <?php echo $Professional; ?>>Professional</option>
                                                                                        <option value="Speed Post" <?php echo $Speed_Post; ?>>Speed Post</option>
                                                                                        <option value="ST Courier" <?php echo $ST_Courier; ?>>ST Courier</option>
                                                                                        <option value="Blue Dart" <?php echo $Blue_Dart; ?>>Blue Dart</option>
                                                                                        <option value="International" <?php echo $International; ?>>International</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Date </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="createdAt" id="createdAt" value="<?php echo $row['createdAt'] ?>" placeholder="Enter Date" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Customer Type</label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <select class="form-control" name="customer_type" id="customer_type">
                                                                                        <?php
                                                                                        $Party = $Customer  = "";
                                                                                        switch ($row['customer_type']) {
                                                                                            case 'Party':
                                                                                                $Party = 'selected';
                                                                                                break;
                                                                                            case 'Customer':
                                                                                                $Customer = 'selected';
                                                                                                break;
                                                                                        }
                                                                                        ?>
                                                                                        <option value="Party" <?php echo $Party; ?>>Party</option>
                                                                                        <option value="Customer" <?php echo $Customer; ?>>Customer</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary font-weight-bold" name="register_booking" id="submit">Save</button>
                                                                        <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Document Type </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['document_type']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Booking Mode </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['booking_mode']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Courier Mode </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['courier_mode']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Date </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['createdAt']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Customer Type </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['customer_type']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-custom gutter-b  example-compact">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <b>From</b>
                                            </h3>
                                            <div class="card-toolbar">
                                                <div class="example-tools justify-content-center">
                                                    <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#exampleModal11">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                        </span>Edit
                                                    </a>
                                                    <div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel"><b>From Edit</b></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card-body">
                                                                            <div class="form-group row">
                                                                                <input type="hidden" name="id" value="<?= $id ?>"><label class="col-form-label text-right col-lg-3 col-sm-12">Name </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="from_name" id="from_name" value="<?php echo $row['from_name'] ?>" placeholder="Enter your Name" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="from_address" id="from_address" value="<?php echo $row['from_address'] ?>" placeholder="Enter your Address" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Contact No </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="from_contact" id="from_contact" value="<?php echo $row['from_contact'] ?>" placeholder="Enter Contact No" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary font-weight-bold" name="register_form" id="submit">Save</button>
                                                                        <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Name </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['from_name']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Address </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['from_address']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Contact No </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['from_contact']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-custom gutter-b  example-compact">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <b>To</b>
                                            </h3>
                                            <div class="card-toolbar">
                                                <div class="example-tools justify-content-center">
                                                    <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#exampleModal">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                        </span>Edit
                                                    </a>
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel"><b>To Edit</b></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="card-body">
                                                                            <div class="form-group row">
                                                                                <input type="hidden" name="id" value="<?= $id ?>"><label class="col-form-label text-right col-lg-3 col-sm-12">Name </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="to_name" id="to_name" value="<?php echo $row['to_name'] ?>" placeholder="Enter your Name" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Address </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="to_address" id="to_address" value="<?php echo $row['to_address'] ?>" placeholder="Enter your Address" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Contact No</label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="flaticon2-browser"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="to_contact" id="to_contact" value="<?php echo $row['to_contact'] ?>" placeholder="Enter Contact No" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary font-weight-bold" name="register_to" id="submit">Save</button>
                                                                        <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Name </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['to_name']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Address </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['to_address']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Contact No </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['to_contact']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card card-custom gutter-b  example-compact">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <b>Detail</b>
                                            </h3>
                                            <div class="card-toolbar">
                                                <div class="example-tools justify-content-center">
                                                    <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#exampleModaldetail">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                        </span>Edit
                                                    </a>
                                                    <div class="modal fade" id="exampleModaldetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeldetail" aria-hidden="true">
                                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabeldetail"><b>Detail Edit</b></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="card-body">
                                                                            <div class="form-group row">
                                                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Booking number </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="booking_number" id="booking_number" value="<?php echo $row['booking_number'] ?>" placeholder="Enter booking_number" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Customer ID </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="customer_id" id="customer_id" value="<?php echo $row['customer_id'] ?>" placeholder="Enter Customer ID" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Destination </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="destination" id="destination" value="<?php echo $row['destination'] ?>" placeholder="Enter Destination" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Weight </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="weight" id="weight" value="<?php echo $row['weight'] ?>" placeholder="Enter weight" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Volume weight </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="volume_weight" id="volume_weight" value="<?php echo $row['volume_weight'] ?>" placeholder="Enter Volume weight" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Risk charge </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="risk_charge" id="risk_charge" value="<?php echo $row['risk_charge'] ?>" placeholder="Enter Risk charge" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Amount </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="amount" id="amount" value="<?php echo $row['amount'] ?>" placeholder="Enter Amount" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Product value </label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    <input type="text" class="form-control" name="product_value" id="product_value" value="<?php echo $row['product_value'] ?>" placeholder="Enter Product value" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary font-weight-bold" name="register_detail" id="submit">Save</button>
                                                                        <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Booking number </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['booking_number']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Customer ID </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['customer_id']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Destination </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['destination']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Weight </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['weight']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Volume weight </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['volume_weight']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Risk charge </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['risk_charge']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Amount </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['amount']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-sm-12">Product value </label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?php echo $row['product_value']; ?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </div>

    <?php
    include("footer.php");
    ?>
</div>
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<script src="assets/js/pages/widgets.js"></script>
<script src="assets/js/pages/custom/profile/profile.js"></script>