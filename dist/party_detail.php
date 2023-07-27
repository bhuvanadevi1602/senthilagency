<?php
require('header.php');
include("config.php");

$exp_qry = "SELECT id FROM party ORDER BY id DESC LIMIT 1 ";
$result2 = $conn->query($exp_qry);
$branchTable = $result2->fetch_assoc();
$Last_id = $branchTable["id"] + 1;
$bill_id = "BILLNO" .  $Last_id;

if (isset($_REQUEST['req']) != "") {
    $req = $_REQUEST["req"];
} else {
    $req = "";
}
if (isset($_REQUEST['del']) != "") {
    $del = $_REQUEST["del"];
} else {
    $del = "";
}
$created_at = date("Y-m-d h:i:s");

$username = $_SESSION['user_name'];
$branch = $_SESSION['courier_mode'];
$userId = $_SESSION['user_id'];

$createddate = date("Y-m-d");
$partytime = 10 * 60;
$partyend_time = date('Y-m-d h:i:s', time() + $partytime);

// session_start();
// $id = $_GET['id'];
$from_name = $_GET['from_name'];
$from_cx_id = $_GET['from_cx_id'];
$from_contact = $_GET['from_contact'];


if (isset($_POST['deletebill'])) {
    $bill_id = $_POST['bill_id'];

    $sql = "DELETE FROM party WHERE bill_id='$bill_id'";
    $exe = $conn->query($sql);
    if ($exe) {

        $sql217 = "SELECT * FROM booking_from WHERE bill_id='$bill_id'";
        $result27 = $conn->query($sql217);
        $branchTable = $result27->fetch_assoc();
        $bill_id = $branchTable['bill_id'];
        $status1 = $branchTable['status1'];

        $sql22 = "update booking_from set bill_id='',status1='0',amount_paid1='',already_paid1='',pymt_date='' WHERE bill_id='$bill_id'";
        if ($conn->query($sql22)) {
        }

        header("Location: alllrdatatable.php?msg= Deleted!");
    }
}

if (isset($_POST['deletepartydetail'])) {
    $bill_id = $_POST['bill_id'];
    $id = $_POST['id'];

    $delete1 = "DELETE FROM party WHERE bill_id='$bill_id'";
    if ($conn->query($delete1)) {
        $delete = "DELETE FROM booking_from WHERE bill_id='$bill_id'";
        if ($conn->query($delete)) {
            header("Location: alllrdatatable.php?&msg= Deleted!");
        }
    }
}
?>
<style>
    #demobox {
        background-color: #cfc;
        padding: 1px;
    }
</style>
<style>
    .demo {
        margin-left: 3px;
        margin-bottom: -4px;
        position: relative;
        bottom: -1px;
        transform: rotate(-90deg);
    }


    .ch {
        height: 700px;

    }

    .rows {
        display: -webkit-box;
        display: -ms-flexbox;
        /* display: flex; */
        /*-ms-flex-wrap: wrap;*/
        /* flex-wrap: wrap; */
        margin-right: -12.5px;
        margin-left: -12.5px;
    }

    .modal-height {
        width: auto !important;
    }

    .hh-grayBox {
        /*background-color: #F8F8F8;*/
        position: relative;
        right: 49px;
        margin-bottom: 20px;
        padding: 0px;
        margin-top: 20px;
    }

    .pt45 {
        padding-top: 45px;
    }

    .order-tracking {
        /*text-align: center;*/
        /*width: 27.33%;*/
        width: 20%;
        position: relative;
        bottom: -33px;
        display: block;
    }

    .order-tracking .is-complete {
        display: block;
        position: relative;
        border-radius: 50%;
        height: 30px;
        width: 30px;
        border: 0px solid #AFAFAF;
        background-color: #f7be16;
        margin: 0 auto;
        transition: background 0.25s linear;
        -webkit-transition: background 0.25s linear;
        z-index: 2;
    }

    .order-tracking .is-complete:after {
        display: block;
        position: absolute;
        content: '';
        height: 14px;
        width: 7px;
        top: -2px;
        bottom: 0;
        left: 5px;
        margin: auto 0;
        border: 0px solid #AFAFAF;
        border-width: 0px 2px 2px 0;
        transform: rotate(-43deg);
        opacity: 0;
    }

    .order-tracking.completed .is-complete {
        border-color: #27aa80;
        border-width: 0px;
        background-color: #27aa80;
    }

    .order-tracking.completed .is-complete:after {
        border-color: #fff;
        border-width: 0px 3px 3px 0;
        width: 7px;
        left: 11px;
        opacity: 1;
    }

    .order-tracking p {

        font-size: 20px;
        font-weight: 600;
        position: relative;
        bottom: 99px;
        line-height: 20px;
    }

    .order-tracking h6 {
        font-weight: 100;
        font-size: 12px;
        position: relative;
        bottom: 129px;
        left: 22px;
    }

    .order-tracking p span {
        font-size: 14px;
    }

    .order-tracking.completed p {
        color: #000;
    }

    /*.order-tracking::before {*/
    /*    content: '';*/
    /*    display: block;*/
    /*    height: 3px;*/
    /*    width: calc(100% - 40px);*/
    /*    background-color: #f7be16;*/
    /*    top: 13px;*/
    /*    position: absolute;*/
    /*    left: calc(-50% + 20px);*/
    /*    z-index: 0;*/
    /*}*/
    .order-tracking::before {
        content: '';
        display: block;
        height: 2px;
        width: calc(100% - 32px);
        background-color: #f7be16;
        top: 14px;
        position: absolute;
        left: calc(-50% + 16px);
        z-index: 0;
    }

    .order-tracking:first-child:before {
        display: none;
    }

    .order-tracking.completed:before {
        background-color: #27aa80;
    }

    .tracking {
        /*position:relative ;*/
        transform: rotate(90deg);
    }

    .trackpos {
        position: absolute;
        top: -147px;
        bottom: 58px;
        transform: rotate(-90deg);
    }

    .word-position {
        transform: rotate(270deg) !important;
        color: black;
        white-space: nowrap;
    }

    .word-position span {
        transform: rotate(270deg) !important;
        color: black;
        white-space: nowrap;
    }
</style>

<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-3 py-lg-8  subheader-transparent " id="kt_subheader">
            <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">

                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">
                            Party Datatable
                        </h2>
                        <!--end::Page Title-->

                        <!--begin::Breadcrumb-->
                        <!--          <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">-->
                        <!--              							<li class="breadcrumb-item">-->
                        <!--                  	<a href="" class="text-muted">-->
                        <!--                      	KTDatatable	                        	</a>-->
                        <!--</li>-->
                        <!--              							<li class="breadcrumb-item">-->
                        <!--                  	<a href="" class="text-muted">-->
                        <!--                      	Base	                        	</a>-->
                        <!--</li>-->
                        <!--              							<li class="breadcrumb-item">-->
                        <!--                  	<a href="" class="text-muted">-->
                        <!--                      	Local Data	                        	</a>-->
                        <!--</li>-->
                        <!--              	                </ul>-->
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->

                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">

                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-toolbar">
                            <!--begin::Dropdown-->
                            <div class="dropdown dropdown-inline mr-2">

                                <!--begin::Dropdown Menu-->
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="navi flex-column navi-hover py-2">
                                        <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                            Choose an option:
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="la la-print"></i></span>
                                                <span class="navi-text">Print</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="la la-copy"></i></span>
                                                <span class="navi-text">Copy</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                                <span class="navi-text">Excel</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="la la-file-text-o"></i></span>
                                                <span class="navi-text">CSV</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
                                                <span class="navi-text">PDF</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                                <!--end::Dropdown Menu-->
                            </div>
                        </div>

                    </div>
                    <!--end::Dropdown-->

                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#party">Party</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#partybill">Party Bill</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#partydetail">Party Detail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#allparty">Party Download</a>
                            </li>
                        </ul>

                        <?php
                        if ($_SESSION['role'] == "super_admin") {
                        ?>

                            <div class="tab-content">
                                <div id="party" class="container tab-pane active"><br>
                                    <div class="table-responsive">
                                        <div class="card-body">
                                            <form method="post">
                                                <div class="row mt-3 text-center">
                                                    <div class="col-sm-4">
                                                        <label class="form-label">From Date</label>
                                                        <input class="form-control" type="date" name="fromdate" id="fromdate">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label">To Date</label>
                                                        <input class="form-control" type="date" name="todate" id="todate">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="btn btn-primary m-5 pt-3" type="submit" name="filter" value="Search" id="filter">
                                                    </div>
                                                    <div class="col-sm-9"></div>
                                                    <div class="col-sm-3">
                                                        <button class="btn btn-primary mb-3" name="export" id="export" value="Reload Page" onClick="window.location.reload(true)">Bill Generate</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <?php
                                        $fromdate = isset($_POST['fromdate']) ? $_POST['fromdate'] : "";
                                        $todate = isset($_POST['todate']) ? $_POST['todate'] : "";
                                        if ($fromdate == "" && $todate == "") {
                                        ?>

                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="example5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>C id</th>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Booking number</th>
                                                            <th>Customer ID </th>
                                                            <th>Amount</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && status1=0 order by id desc";
                                                        // from_cx_id='$from_cx_id
                                                        // print_r($sql5);die();
                                                       $result5 = $conn->query($sql5);
                                                        $j = 1;
                                                        while ($delivery = $result5->FETCH_ASSOC()) {
                                                        ?>
                                                            <tr>
                                                                <td id="filter_id">
                                                                    <?php echo $j++ ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["from_cx_id"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["consignee_name"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["createdAt"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["booking_number"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["customer_id"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["amount"] ?>
                                                                </td>
                                                                <td>
                                                                    <a href="alllrdatatable.php?del=<?php echo $delivery["id"] ?>" onclick="myFunction()" class="btn btn-sm btn-clean btn-icon" title="Delete">
                                                                        <i class="la la-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>

                                                </table>
                                            </div>

                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if (isset($_POST['filter'])) {
                                            $fromdate = $_POST['fromdate'];
                                            $todate = $_POST['todate'];
                                            if ($fromdate != "" && $todate != "") {
                                                $_SESSION['fromdate'] = $fromdate;
                                                $_SESSION['todate'] = $todate;
                                        ?>

                                                <div class="table-responsive" id="productoptClass26">
                                                    <table class="table table-separate table-head-custom table-checkable" id="example5">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>C id</th>
                                                                <th>Name</th>
                                                                <th>Date</th>
                                                                <th>Booking number</th>
                                                                <th>Customer ID </th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sql9 = "SELECT * FROM booking_from where customer_type='party' && from_cx_id='$from_cx_id' AND status1=0 AND createddate >='$fromdate' AND createddate <='$todate' ";
                                                            $result5 = $conn->query($sql9);
                                                            $j = 1;
                                                            while ($delivery = $result5->FETCH_ASSOC()) {
                                                                $from_address = $delivery["from_address"];
                                                                $from_active = $delivery["from_active"];
                                                                $to_address = $delivery["to_address"];
                                                            ?>
                                                                <tr>
                                                                    <td id="filter_id">
                                                                        <?php echo $j++ ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_cx_id"] ?>
                                                                    </td>
                                                                    <td><?php echo $delivery["from_name"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["createdAt"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["booking_number"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["customer_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["amount"] ?>
                                                                    </td>
                                                                </tr>

                                                            <?php
                                                            }
                                                            $sql2 = "update booking_from set status1=0 where from_cx_id='$from_cx_id' AND createddate >='$fromdate' AND createddate <='$todate' AND customer_type='Party' AND status1!=1 ";
                                                            if (mysqli_query($conn, $sql2)) {
                                                            }
                                                            ?>
                                                        </tbody>

                                                    </table>
                                                </div>

                                        <?php
                                            }
                                        }
                                        ?>

                                        <?php
                                        if (isset($_POST['export'])) {
                                            $fromdates = date_create($_POST['fromdate']);
                                            $fromdate = date_format($fromdates,"d-m-Y");
                                            $todates = date_create($_POST['todate']);
 $todate = date_format($todates,"d-m-Y");
                                           
                                        ?>

                                            <div class="table-responsive">
                                                <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>C id</th>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Booking number</th>
                                                            <th>Customer ID </th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql9 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' AND status1=0 AND createdAt>='$fromdate' AND createdAt <='$todate' ";
                                            //   print_r($sql9);die();
                                                           $result9 = $conn->query($sql9);
                                                        $j = 1;
                                                        $s = 0;
                                                        $s1 = 0;
                                                        $s2 = 0;
                                                        $from_address='';
                                                        $from_active='';
                                                        $to_address='';
                                                        
                                                        while ($allfilter = $result9->FETCH_ASSOC()) {
                                                            $from_address = $allfilter["from_address"];
                                                            $from_active = $allfilter["from_active"];
                                                            $to_address = $allfilter["to_address"];

                                                            $string =  (int) $allfilter["amount"];
                                                            $s = $s + $string;

                                                            $string1 =  (int) $allfilter["amount_enter"];
                                                            $s1 = $s1 + $string1;

                                                            $string2 =  (int) $allfilter["amount"] - (int) $allfilter["amount_enter"];
                                                            $s2 = $s2 + $string2;
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $j++ ?></td>
                                                                <td><?php echo $allfilter["from_cx_id"] ?></a></td>
                                                                <td><?php echo $allfilter["from_name"] ?></a></td>
                                                                <td><?php echo $allfilter["createdAt"] ?></td>
                                                                <td><?php echo $allfilter["booking_number"] ?></td>
                                                                <td><?php echo $allfilter["customer_id"] ?></td>
                                                                <td><?php echo $allfilter["amount"] ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        $insert = "INSERT into party (id,bill_id,from_cx_id,from_active,name,from_contact,from_address,to_address,total1,paymnent,balance,from_date,to_date,branch1,username1,createddate1,partyend_time) values('$id','$bill_id','$from_cx_id','$from_active','$from_name','$from_contact','$from_address','$to_address','$s','$s1','$s2','$fromdate','$todate','$branch','$username','$createddate','$partyend_time')";
                                                    // print_r($insert);die();
                                                        if (mysqli_query($conn, $insert)) {
                                                            $sql2 = "update booking_from set status1=1,bill_id='$bill_id' where from_cx_id='$from_cx_id' AND createddate >='$fromdate' AND createddate <='$todate' AND customer_type='Party' AND status1!=1 ";
                                                            if (mysqli_query($conn, $sql2)) {
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <b>Total:</b>
                                                                <?php echo $s ?>
                                                            </td>
                                                            <td>
                                                                <b>Amount Paid:</b>
                                                                <?php echo $s1 ?>
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div id="partybill" class="container tab-pane">
                                    <div class="table-responsive">
                                        <table class="table table-separate table-head-custom table-checkable" id="example2">
                                            <thead>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>Bill Id</th>
                                                    <th>Name</th>
                                                    <th>Total</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql5 = "SELECT * FROM party where from_cx_id='$from_cx_id' order by bill_id asc";
                                                $result5 = $conn->query($sql5);
                                                $j = 1;
                                                $s = 0;
                                                $s1 = 0;
                                                $s2 = 0;
                                                while ($delivery = $result5->FETCH_ASSOC()) {
                                                    $bill_id = $delivery["bill_id"];

                                                    $sql51 = "SELECT * FROM booking_from where from_cx_id='$from_cx_id' and bill_id='$bill_id'";
                                                    $result51 = $conn->query($sql51);
                                                    $delivery51 = $result51->FETCH_ASSOC();
                                                    $amount_paid1 = $delivery51["amount_paid1"];

                                                    $sql50 = "SELECT id,from_cx_id,name,from_contact,to_address,mode_payment,amount_enter,payment_date,createdAt11,SUM(total1) as total1,SUM(paymnent) as paymnent,SUM(balance) as balance FROM party where from_cx_id='$from_cx_id'  GROUP BY name";
                                                    $result50 = $conn->query($sql50);
                                                    while ($delivery50 = $result50->FETCH_ASSOC()) {

                                                        $s = 0;
                                                        $s1 = 0;
                                                        $s2 = 0;

                                                        $string =  (int) $delivery50["total1"];
                                                        $s = $s + $string;

                                                        $string1 =  (int) $delivery50["balance"];
                                                        $s1 = $s1 + $string1;
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $j++ ?>
                                                            </td>
                                                            <td>
                                                                <a href="partybillno.php?bill_id=<?php echo $delivery["bill_id"] ?>&from_name=<?php echo $from_name ?>"><?php echo $delivery["bill_id"] ?> </a>
                                                            </td>
                                                            <td>
                                                                <?php echo $delivery["name"] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $delivery["total1"] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $delivery["createdAt11"] ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($delivery['partyend_time'] > date('Y-m-d h:i:s')) {
                                                                ?>
                                                                    <form method="POST">
                                                                        <input type="hidden" value="<?= $delivery["bill_id"] ?>" name="bill_id" />
                                                                        <button type="submit" name="deletebill" style="border: none; background: transparent"><i class="la la-trash"></i></button>
                                                                    </form>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>

                                                <?php
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <b>Total:</b>
                                                        <?php echo $s ?>
                                                    </td>
                                                    <td>
                                                        <b>Balance:</b>
                                                        <?php echo $s1 ?>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                                <div id="partydetail" class="container tab-pane">
                                    <div class="table-responsive">
                                        <div class="card-body">
                                            <form method="post">
                                                <div class="row mt-3 text-center">
                                                    <div class="col-sm-4">
                                                        <label class="form-label">From Date</label>
                                                        <input class="form-control" type="date" name="fromdate1" id="fromdate1">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label">To Date</label>
                                                        <input class="form-control" type="date" name="todate1" id="todate1">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="btn btn-primary m-5 pt-3" type="submit" name="filter1" value="Search" id="filter1">
                                                    </div>
                                                    <div class="col-sm-9"></div>
                                                    <div class="col-sm-3">
                                                        <button class="btn btn-primary mb-3" onclick="fnExcelReport3()">Excel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <?php
                                        $fromdate1 = isset($_POST['fromdate1']) ? $_POST['fromdate1'] : "";
                                        $todate1 = isset($_POST['todate1']) ? $_POST['todate1'] : "";
                                        if ($fromdate1 == "" && $todate1 == "") {
                                        ?>

                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="example3">
                                                    <thead>
                                                        <tr>
                                                            <th>S.NO</th>
                                                            <th>C id</th>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Booking number</th>
                                                            <th>Customer ID </th>
                                                            <th>Amount</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && status1=1";
                                                        $result5 = $conn->query($sql5);
                                                        $j = 1;
                                                        while ($delivery = $result5->FETCH_ASSOC()) {

                                                            $sql50 = "SELECT id,from_cx_id,name,from_contact,to_address,mode_payment,amount_enter,payment_date,createdAt11,SUM(total1) as total1,SUM(paymnent) as paymnent,SUM(balance) as balance FROM party where from_cx_id='$from_cx_id' GROUP BY name";
                                                            $result50 = $conn->query($sql50);
                                                            while ($delivery50 = $result50->FETCH_ASSOC()) {
                                                                $s = 0;
                                                                $s1 = 0;

                                                                $string =  (int) $delivery50["total1"];
                                                                $s = $s + $string;

                                                                $string1 =  (int) $delivery50["balance"];
                                                                $s1 = $s1 + $string1;
                                                        ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $j++ ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_cx_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_name"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["createdAt"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["booking_number"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["customer_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["amount"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <form method="POST">
                                                                            <input type="hidden" value="<?= $delivery["bill_id"] ?>" name="bill_id" />
                                                                            <input type="hidden" value="<?= $delivery["id"] ?>" name="id" />
                                                                            <button type="submit" name="deletepartydetail" style="border: none; background: transparent"><i class="la la-trash"></i></button>
                                                                        </form>
                                                                    </td>
                                                                </tr>

                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <b>Total:</b>
                                                                <?php echo $s ?>
                                                            </td>
                                                            <td>
                                                                <b>Balance:</b>
                                                                <?php echo $s1 ?>
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable3">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>C id</th>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Booking number</th>
                                                            <th>Customer ID </th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && status1=1";
                                                        $result5 = $conn->query($sql5);
                                                        $j = 1;
                                                        while ($delivery = $result5->FETCH_ASSOC()) {

                                                            // $sql51 = "SELECT * FROM party where from_cx_id='$from_cx_id' ";
                                                            // $result51 = $conn->query($sql51);
                                                            // $delivery1 = $result51->FETCH_ASSOC();

                                                            $sql50 = "SELECT id,from_cx_id,name,from_contact,to_address,mode_payment,amount_enter,payment_date,createdAt11,SUM(total1) as total1,SUM(paymnent) as paymnent,SUM(balance) as balance FROM party where from_cx_id='$from_cx_id' GROUP BY name";
                                                            $result50 = $conn->query($sql50);
                                                            while ($delivery50 = $result50->FETCH_ASSOC()) {
                                                                $s = 0;
                                                                $s1 = 0;

                                                                $string =  (int) $delivery50["total1"];
                                                                $s = $s + $string;

                                                                $string1 =  (int) $delivery50["balance"];
                                                                $s1 = $s1 + $string1;
                                                        ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $j++ ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_cx_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_name"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["createdAt"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["booking_number"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["customer_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["amount"] ?>
                                                                    </td>
                                                                </tr>

                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <b>Total:</b>
                                                                <?php echo $s ?>
                                                            </td>
                                                            <td>
                                                                <b>Balance:</b>
                                                                <?php echo $s1 ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                            </div>

                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if (isset($_POST['filter1'])) {
                                            $fromdate1 = $_POST['fromdate1'];
                                            $todate1 = $_POST['todate1'];
                                            if ($fromdate1 != "" && $todate1 != "") {
                                        ?>

                                                <div class="table-responsive">
                                                    <table class="table table-separate table-head-custom table-checkable" id="example3">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>C id</th>
                                                                <th>Name</th>
                                                                <th>Date</th>
                                                                <th>Booking number</th>
                                                                <th>Customer ID </th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && createddate >='$fromdate1' && createddate <='$todate1'  && status1=1";
                                                            $result5 = $conn->query($sql5);
                                                            $j = 1;
                                                            while ($delivery = $result5->FETCH_ASSOC()) {

                                                                $sql50 = "SELECT id,from_cx_id,name,from_contact,to_address,mode_payment,amount_enter,payment_date,payment_date,payment_date,createdAt11,SUM(total1) as total1,SUM(paymnent) as paymnent,SUM(balance) as balance FROM party where from_cx_id='$from_cx_id' GROUP BY name";
                                                                $result50 = $conn->query($sql50);
                                                                while ($delivery50 = $result50->FETCH_ASSOC()) {

                                                            ?>
                                                                    <tr>
                                                                        <td id="filter_id">
                                                                            <?php echo $j++ ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["from_cx_id"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["from_name"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["createdAt"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["booking_number"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["customer_id"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["amount"] ?>
                                                                        </td>
                                                                    </tr>

                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>

                                                    </table>
                                                </div>
                                                <div class="table-responsive">
                                                    <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable3">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>C id</th>
                                                                <th>Name</th>
                                                                <th>Date</th>
                                                                <th>Booking number</th>
                                                                <th>Customer ID </th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && createddate >='$fromdate1' && createddate <='$todate1' && status1=1";
                                                            $result5 = $conn->query($sql5);
                                                            $j = 1;
                                                            $s = 0;
                                                            $s1 = 0;
                                                            $s2 = 0;
                                                            while ($delivery = $result5->FETCH_ASSOC()) {

                                                                $sql50 = "SELECT id,from_cx_id,name,from_contact,to_address,mode_payment,amount_enter,payment_date,createdAt11,SUM(total1) as total1,SUM(paymnent) as paymnent,SUM(balance) as balance FROM party where from_cx_id='$from_cx_id' GROUP BY name";
                                                                $result50 = $conn->query($sql50);
                                                                while ($delivery50 = $result50->FETCH_ASSOC()) {

                                                                    $string =  (int) $delivery["amount"];
                                                                    $s = $s + $string;

                                                                    $string1 =  (int) $delivery["amount"] - (int) $delivery["amount_paid1"];
                                                                    $s1 = $s1 + $string1;
                                                            ?>
                                                                    <tr>
                                                                        <td id="filter_id">
                                                                            <?php echo $j++ ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["from_cx_id"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["from_name"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["createdAt"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["booking_number"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["customer_id"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["amount"] ?>
                                                                        </td>
                                                                    </tr>

                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <b>Total:</b>
                                                                    <?php echo $s ?>
                                                                </td>
                                                                <td>
                                                                    <b>Balance:</b>
                                                                    <?php echo $s1 ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </div>

                                        <?php
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>

                                <div id="allparty" class="container tab-pane">
                                    <div class="table-responsive">
                                        <div class="card-body">
                                            <form method="post">
                                                <div class="row mt-3 text-center">
                                                    <div class="col-sm-4">
                                                        <label class="form-label">From Date</label>
                                                        <input class="form-control" type="date" name="fromdate3" id="fromdate3">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label">To Date</label>
                                                        <input class="form-control" type="date" name="todate3" id="todate3">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="btn btn-primary m-5 pt-3" type="submit" name="filter3" value="Search" id="filter3">
                                                    </div>
                                                    <div class="col-sm-9"></div>
                                                    <div class="col-sm-3">
                                                        <button class="btn btn-primary mb-3" onclick="fnExcelReport4()">Excel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <?php
                                        $fromdate3 = isset($_POST['fromdate3']) ? $_POST['fromdate3'] : "";
                                        $todate3 = isset($_POST['todate3']) ? $_POST['todate3'] : "";
                                        if ($fromdate3 == "" && $todate3 == "") {
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="example4">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>C id</th>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Booking number</th>
                                                            <th>Customer ID </th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id'";
                                                        $result5 = $conn->query($sql5);
                                                        $j = 1;
                                                        while ($delivery = $result5->FETCH_ASSOC()) {
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $j++ ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["from_cx_id"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["from_name"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["createdAt"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["booking_number"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["customer_id"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["amount"] ?>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="table-responsive">
                                                <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable4">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>C id</th>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Booking number</th>
                                                            <th>Customer ID </th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id'";
                                                        $result5 = $conn->query($sql5);
                                                        $j = 1;
                                                        while ($delivery = $result5->FETCH_ASSOC()) {

                                                            $sql50 = "SELECT SUM(amount) as amount FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id'";
                                                            $result50 = $conn->query($sql50);
                                                            while ($delivery50 = $result50->FETCH_ASSOC()) {
                                                                $s = 0;

                                                                $string =  (int) $delivery50["amount"];
                                                                $s = $s + $string;
                                                        ?>
                                                                <tr>
                                                                    <td id="filter_id">
                                                                        <?php echo $j++ ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_cx_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_name"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["createdAt"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["booking_number"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["customer_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["amount"] ?>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <b>Total:</b>
                                                                <?php echo $s ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if (isset($_POST['filter3'])) {
                                            $fromdate3 = $_POST['fromdate3'];
                                            $todate3 = $_POST['todate3'];
                                            if ($fromdate3 != "" && $todate3 != "") {
                                        ?>

                                                <div class="table-responsive">
                                                    <table class="table table-separate table-head-custom table-checkable" id="example4">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>C id</th>
                                                                <th>Name</th>
                                                                <th>Date</th>
                                                                <th>Booking number</th>
                                                                <th>Customer ID </th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && createddate >='$fromdate3' AND createddate <='$todate3'";
                                                            $result5 = $conn->query($sql5);
                                                            $j = 1;
                                                            while ($delivery = $result5->FETCH_ASSOC()) {
                                                            ?>
                                                                <tr>
                                                                    <td id="filter_id">
                                                                        <?php echo $j++ ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_cx_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_name"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["createdAt"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["booking_number"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["customer_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["amount"] ?>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>

                                                    </table>
                                                </div>

                                                <div class="table-responsive">
                                                    <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable4">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>C id</th>
                                                                <th>Name</th>
                                                                <th>Date</th>
                                                                <th>Booking number</th>
                                                                <th>Customer ID </th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && createddate >='$fromdate3' AND createddate <='$todate3'";
                                                            $result5 = $conn->query($sql5);
                                                            $j = 1;
                                                            while ($delivery = $result5->FETCH_ASSOC()) {
                                                                $sql50 = "SELECT SUM(amount) as amount FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && createddate >='$fromdate3' AND createddate <='$todate3'";
                                                                $result50 = $conn->query($sql50);
                                                                while ($delivery50 = $result50->FETCH_ASSOC()) {
                                                                    $s = 0;

                                                                    $string =  (int) $delivery50["amount"];
                                                                    $s = $s + $string;
                                                            ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $j++ ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["from_cx_id"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["from_name"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["createdAt"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["booking_number"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["customer_id"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["amount"] ?>
                                                                        </td>
                                                                    </tr>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <b>Total:</b>
                                                                    <?php echo $s ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </div>

                                        <?php
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>

                            </div>

                        <?php

                        } elseif ($_SESSION['role'] == "user") {
                        ?>

                            <div class="tab-content">
                                <div id="party" class="container tab-pane active"><br>
                                    <div class="table-responsive">
                                        <div class="card-body">
                                            <form method="post">
                                                <div class="row mt-3 text-center">
                                                    <div class="col-sm-4">
                                                        <label class="form-label">From Date</label>
                                                        <input class="form-control" type="date" name="fromdate" id="fromdate">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label">To Date</label>
                                                        <input class="form-control" type="date" name="todate" id="todate">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="btn btn-primary m-5 pt-3" type="submit" name="filter" value="Search" id="filter">
                                                    </div>
                                                    <div class="col-sm-9"></div>
                                                    <div class="col-sm-3">
                                                        <!--<button class="btn btn-primary mb-3" onclick="fnExcelReport5()" name="export" id="export">Bill Generate</button>-->
                                                        <button class="btn btn-primary mb-3" name="export" value="Reload Page" onClick="window.location.reload(true)">Bill Generate</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <?php
                                        $fromdate = isset($_POST['fromdate']) ? $_POST['fromdate'] : "";
                                        $todate = isset($_POST['todate']) ? $_POST['todate'] : "";
                                        if ($fromdate == "" && $todate == "") {
                                        ?>

                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="example5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>C id</th>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Booking number</th>
                                                            <th>Customer ID </th>
                                                            <th>Amount</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && status1=0 && branch = '$branch' && username = '$username' order by id desc";
                                                        $result5 = $conn->query($sql5);
                                                        $j = 1;
                                                        $s = 0;
                                                        $s1 = 0;
                                                        $s2 = 0;
                                                        while ($delivery = $result5->FETCH_ASSOC()) {
                                                            $string =  (int) $delivery["amount"];
                                                            $s = $s + $string;

                                                            $string1 =  (int) $delivery["amount_enter"];
                                                            $s1 = $s1 + $string1;

                                                            $string2 =  (int) $delivery["amount"]  - (int) $delivery["amount_enter"];
                                                            $s2 = $s2 + $string2;

                                                        ?>
                                                            <tr>
                                                                <td id="filter_id">
                                                                    <?php echo $j++ ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["from_cx_id"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["from_name"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["createdAt"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["booking_number"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["customer_id"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["amount"] ?>
                                                                </td>
                                                                <td>
                                                                    <a href="alllrdatatable.php?del=<?php echo $delivery["id"] ?>" onclick="myFunction()" class="btn btn-sm btn-clean btn-icon" title="Delete">
                                                                        <i class="la la-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>

                                                </table>
                                            </div>

                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if (isset($_POST['filter'])) {
                                            $fromdate = $_POST['fromdate'];
                                            $todate = $_POST['todate'];
                                            if ($fromdate != "" && $todate != "") {
                                                $_SESSION['fromdate'] = $fromdate;
                                                $_SESSION['todate'] = $todate;
                                        ?>

                                                <div class="table-responsive" id="productoptClass26">
                                                    <table class="table table-separate table-head-custom table-checkable" id="example5">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>C id</th>
                                                                <th>Name</th>
                                                                <th>Date</th>
                                                                <th>Booking number</th>
                                                                <th>Customer ID </th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sql9 = "SELECT * FROM booking_from where customer_type='party' && from_cx_id='$from_cx_id' AND status1=0 AND createddate >='$fromdate' AND createddate <='$todate' && branch = '$branch' && username = '$username'";
                                                            $result5 = $conn->query($sql9);
                                                            $j = 1;
                                                            while ($delivery = $result5->FETCH_ASSOC()) {
                                                                //$from_contact=$delivery["from_contact"];
                                                                $from_active = $allfilter["from_active"];
                                                                $from_address = $delivery["from_address"];
                                                                $to_address = $delivery["to_address"];
                                                                //   $from_cx_id=$delivery["from_cx_id"];
                                                            ?>
                                                                <tr>
                                                                    <td id="filter_id">
                                                                        <?php echo $j++ ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_cx_id"] ?>
                                                                    </td>
                                                                    <td><?php echo $delivery["from_name"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["createdAt"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["booking_number"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["customer_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["amount"] ?>
                                                                    </td>
                                                                </tr>

                                                            <?php
                                                            }
                                                            $sql2 = "update booking_from set status1=0 where from_cx_id='$from_cx_id' AND createddate >='$fromdate' AND createddate <='$todate' AND customer_type='party' AND status1!=1 && branch = '$branch' && username = '$username'";
                                                            if (mysqli_query($conn, $sql2)) {
                                                            }
                                                            ?>
                                                        </tbody>

                                                    </table>
                                                </div>

                                        <?php
                                            }
                                        }
                                        ?>

                                        <?php
                                        if (isset($_POST['export'])) {
                                            $fromdate = $_SESSION['fromdate'];
                                            $todate = $_SESSION['todate'];

                                        ?>

                                            <div class="table-responsive">
                                                <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>C id</th>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Booking number</th>
                                                            <th>Customer ID </th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql9 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' AND status1=0 AND createddate >='$fromdate' AND createddate <='$todate' && branch = '$branch' && username = '$username'";
                                                        $result9 = $conn->query($sql9);
                                                        $j = 1;
                                                        $s = 0;
                                                        $s1 = 0;
                                                        $s2 = 0;
                                                        while ($allfilter = $result9->FETCH_ASSOC()) {
                                                            $from_active = $allfilter["from_active"];
                                                            $from_address = $allfilter["from_address"];
                                                            $to_address = $allfilter["to_address"];

                                                            $string =  (int) $allfilter["amount"];
                                                            $s = $s + $string;

                                                            $string1 =  (int) $allfilter["amount_enter"];
                                                            $s1 = $s1 + $string1;

                                                            $string2 =  (int) $allfilter["amount"] - (int) $allfilter["amount_enter"];
                                                            $s2 = $s2 + $string2;
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $j++ ?></td>
                                                                <td><?php echo $allfilter["from_cx_id"] ?></a></td>
                                                                <td><?php echo $allfilter["from_name"] ?></a></td>
                                                                <td><?php echo $allfilter["createdAt"] ?></td>
                                                                <td><?php echo $allfilter["booking_number"] ?></td>
                                                                <td><?php echo $allfilter["customer_id"] ?></td>
                                                                <td><?php echo $allfilter["amount"] ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        $insert = "INSERT into party (id,bill_id,from_cx_id,from_active,name,from_contact,from_address,to_address,total1,paymnent,balance,from_date,to_date,branch1,username1,createddate1,partyend_time) 
                                                          values('$id','$bill_id','$from_cx_id','$from_active','$from_name','$from_contact','$from_address','$to_address','$s','$s1','$s2','$fromdate','$todate','$branch','$username','$createddate','$partyend_time')";
                                                        if (mysqli_query($conn, $insert)) {
                                                            $sql2 = "update booking_from set status1=1,bill_id='$bill_id' where from_cx_id='$from_cx_id' AND createddate >='$fromdate' AND createddate <='$todate' AND customer_type='Party' AND status1!=1 && branch = '$branch' && username = '$username'";
                                                            if (mysqli_query($conn, $sql2)) {
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <b>Total:</b>
                                                                <?php echo $s ?>
                                                            </td>
                                                            <td>
                                                                <b>Amount Paid:</b>
                                                                <?php echo $s1 ?>
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div id="partybill" class="container tab-pane">
                                    <div class="table-responsive">
                                        <table class="table table-separate table-head-custom table-checkable" id="example2">
                                            <thead>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>Bill Id</th>
                                                    <th>Name</th>
                                                    <th>Total</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql5 = "SELECT * FROM party where from_cx_id='$from_cx_id' && branch1 = '$branch' && username1 = '$username' order by bill_id desc";
                                                $result5 = $conn->query($sql5);
                                                $j = 1;
                                                $s = 0;
                                                $s1 = 0;
                                                $s2 = 0;
                                                while ($delivery = $result5->FETCH_ASSOC()) {
                                                    $bill_id = $delivery["bill_id"];

                                                    $sql51 = "SELECT * FROM booking_from where from_cx_id='$from_cx_id' and bill_id='$bill_id' && branch = '$branch' && username = '$username'";
                                                    $result51 = $conn->query($sql51);
                                                    $delivery51 = $result51->FETCH_ASSOC();
                                                    $amount_paid1 = $delivery51["amount_paid1"];

                                                    $sql50 = "SELECT id,from_cx_id,name,from_contact,to_address,mode_payment,amount_enter,payment_date,createdAt11,SUM(total1) as total1,SUM(paymnent) as paymnent,SUM(balance) as balance FROM party where from_cx_id='$from_cx_id' && branch1 = '$branch' && username1 = '$username'GROUP BY name";
                                                    $result50 = $conn->query($sql50);
                                                    while ($delivery50 = $result50->FETCH_ASSOC()) {

                                                        $s = 0;
                                                        $s1 = 0;
                                                        $s2 = 0;

                                                        $string =  (int) $delivery50["total1"];
                                                        $s = $s + $string;

                                                        $string1 =  (int) $delivery50["balance"];
                                                        $s1 = $s1 + $string1;
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $j++ ?>
                                                            </td>
                                                            <td>
                                                                <a href="partybillno.php?bill_id=<?php echo $delivery["bill_id"] ?>&from_name=<?php echo $from_name ?>"><?php echo $delivery["bill_id"] ?> </a>
                                                            </td>
                                                            <td>
                                                                <?php echo $delivery["name"] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $delivery["total1"] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $delivery["createdAt11"] ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($delivery['partyend_time'] > date('Y-m-d h:i:s')) {
                                                                ?>
                                                                    <form method="POST">
                                                                        <input type="hidden" value="<?= $delivery["bill_id"] ?>" name="bill_id" />
                                                                        <button type="submit" name="deletebill" style="border: none; background: transparent"><i class="la la-trash"></i></button>
                                                                    </form>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>

                                                <?php
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <b>Total:</b>
                                                        <?php echo $s ?>
                                                    </td>
                                                    <td>
                                                        <b>Balance:</b>
                                                        <?php echo $s1 ?>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                                <div id="partydetail" class="container tab-pane">
                                    <div class="table-responsive">
                                        <div class="card-body">
                                            <form method="post">
                                                <div class="row mt-3 text-center">
                                                    <div class="col-sm-4">
                                                        <label class="form-label">From Date</label>
                                                        <input class="form-control" type="date" name="fromdate1" id="fromdate1">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label">To Date</label>
                                                        <input class="form-control" type="date" name="todate1" id="todate1">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="btn btn-primary m-5 pt-3" type="submit" name="filter1" value="Search" id="filter1">
                                                    </div>
                                                    <div class="col-sm-9"></div>
                                                    <div class="col-sm-3">
                                                        <button class="btn btn-primary mb-3" onclick="fnExcelReport3()">Excel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <?php
                                        $fromdate1 = isset($_POST['fromdate1']) ? $_POST['fromdate1'] : "";
                                        $todate1 = isset($_POST['todate1']) ? $_POST['todate1'] : "";
                                        if ($fromdate1 == "" && $todate1 == "") {
                                        ?>

                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="example3">
                                                    <thead>
                                                        <tr>
                                                            <th>S.NO</th>
                                                            <th>C id</th>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Booking number</th>
                                                            <th>Customer ID </th>
                                                            <th>Amount</th>
                                                            <!--<th>Action</th>-->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && branch = '$branch' && username = '$username' and status1=1";
                                                        $result5 = $conn->query($sql5);
                                                        $j = 1;

                                                        while ($delivery = $result5->FETCH_ASSOC()) {

                                                            $sql51 = "SELECT * FROM party where from_cx_id='$from_cx_id' && branch1 = '$branch' && username1 = '$username'";
                                                            $result51 = $conn->query($sql51);
                                                            $delivery1 = $result51->FETCH_ASSOC();

                                                            $sql50 = "SELECT id,from_cx_id,name,from_contact,to_address,mode_payment,amount_enter,payment_date,createdAt11,SUM(total1) as total1,SUM(paymnent) as paymnent,SUM(balance) as balance FROM party where from_cx_id='$from_cx_id' GROUP BY name";
                                                            $result50 = $conn->query($sql50);
                                                            while ($delivery50 = $result50->FETCH_ASSOC()) {
                                                                $s = 0;
                                                                $s1 = 0;
                                                                $s2 = 0;

                                                                $string =  (int) $delivery50["total1"];
                                                                $s = $s + $string;

                                                                $string1 =  (int) $delivery50["balance"];
                                                                $s1 = $s1 + $string1;
                                                        ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $j++ ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_cx_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_name"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["createdAt"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["booking_number"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["customer_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["amount"] ?>
                                                                    </td>
                                                                </tr>

                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <b>Total:</b>
                                                                <?php echo $s ?>
                                                            </td>
                                                            <td>
                                                                <b>Balance:</b>
                                                                <?php echo $s1 ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable3">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>C id</th>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Booking number</th>
                                                            <th>Customer ID </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && branch = '$branch' && username = '$username' and status1=1";
                                                        $result5 = $conn->query($sql5);
                                                        $j = 1;
                                                        while ($delivery = $result5->FETCH_ASSOC()) {

                                                            $sql50 = "SELECT id,from_cx_id,name,from_contact,to_address,mode_payment,amount_enter,payment_date,createdAt11,SUM(total1) as total1,SUM(paymnent) as paymnent,SUM(balance) as balance FROM party where from_cx_id='$from_cx_id' GROUP BY name";
                                                            $result50 = $conn->query($sql50);
                                                            while ($delivery50 = $result50->FETCH_ASSOC()) {
                                                                $s = 0;
                                                                $s1 = 0;

                                                                $string =  (int) $delivery50["total1"];
                                                                $s = $s + $string;

                                                                $string1 =  (int) $delivery50["balance"];
                                                                $s1 = $s1 + $string1;
                                                        ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $j++ ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_cx_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_name"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["createdAt"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["booking_number"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["customer_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["amount"] ?>
                                                                    </td>
                                                                </tr>

                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <b>Total:</b>
                                                                <?php echo $s ?>
                                                            </td>
                                                            <td>
                                                                <b>Balance:</b>
                                                                <?php echo $s1 ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if (isset($_POST['filter1'])) {
                                            $fromdate1 = $_POST['fromdate1'];
                                            $todate1 = $_POST['todate1'];
                                            if ($fromdate1 != "" && $todate1 != "") {
                                        ?>

                                                <div class="table-responsive">
                                                    <table class="table table-separate table-head-custom table-checkable" id="example3">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>C id</th>
                                                                <th>Name</th>
                                                                <th>Date</th>
                                                                <th>Booking number</th>
                                                                <th>Customer ID </th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && branch = '$branch' && username = '$username' && createddate >='$fromdate1' AND createddate <='$todate1' and status1=1";
                                                            $result5 = $conn->query($sql5);
                                                            $j = 1;
                                                            while ($delivery = $result5->FETCH_ASSOC()) {

                                                                $sql51 = "SELECT * FROM party where from_cx_id='$from_cx_id' && branch1 = '$branch' && username1 = '$username'";
                                                                $result51 = $conn->query($sql51);
                                                                $delivery1 = $result51->FETCH_ASSOC();

                                                                $sql50 = "SELECT id,from_cx_id,name,from_contact,to_address,mode_payment,amount_enter,payment_date,payment_date,payment_date,createdAt11,SUM(total1) as total1,SUM(paymnent) as paymnent,SUM(balance) as balance FROM party where from_cx_id='$from_cx_id' GROUP BY name";
                                                                $result50 = $conn->query($sql50);
                                                                while ($delivery50 = $result50->FETCH_ASSOC()) {
                                                                    $s = 0;
                                                                    $s1 = 0;
                                                                    $s2 = 0;

                                                                    $string =  (int) $delivery50["total1"];
                                                                    $s = $s + $string;

                                                                    $string1 =  (int) $delivery50["balance"];
                                                                    $s1 = $s1 + $string1;
                                                            ?>
                                                                    <tr>
                                                                        <td id="filter_id">
                                                                            <?php echo $j++ ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["from_cx_id"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["from_name"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["createdAt"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["booking_number"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["customer_id"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["amount"] ?>
                                                                        </td>
                                                                    </tr>

                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>

                                                    </table>
                                                </div>
                                                <div class="table-responsive">
                                                    <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable3">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>C id</th>
                                                                <th>Name</th>
                                                                <th>Date</th>
                                                                <th>Booking number</th>
                                                                <th>Customer ID </th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && branch = '$branch' && username = '$username' && createddate >='$fromdate1' AND createddate <='$todate1' and status1=1";
                                                            $result5 = $conn->query($sql5);
                                                            $j = 1;
                                                            $s = 0;
                                                            $s1 = 0;
                                                            $s2 = 0;
                                                            while ($delivery = $result5->FETCH_ASSOC()) {

                                                                $sql50 = "SELECT id,from_cx_id,name,from_contact,to_address,mode_payment,amount_enter,payment_date,createdAt11,SUM(total1) as total1,SUM(paymnent) as paymnent,SUM(balance) as balance FROM party where from_cx_id='$from_cx_id'  GROUP BY name";
                                                                $result50 = $conn->query($sql50);
                                                                while ($delivery50 = $result50->FETCH_ASSOC()) {

                                                                    $string =  (int) $delivery["amount"];
                                                                    $s = $s + $string;

                                                                    $string1 =  (int) $delivery["amount"] - (int) $delivery["amount_paid1"];
                                                                    $s1 = $s1 + $string1;
                                                            ?>
                                                                    <tr>
                                                                        <td id="filter_id">
                                                                            <?php echo $j++ ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["from_cx_id"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["from_name"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["createdAt"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["booking_number"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["customer_id"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["amount"] ?>
                                                                        </td>
                                                                    </tr>

                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <b>Total:</b>
                                                                    <?php echo $s ?>
                                                                </td>
                                                                <td>
                                                                    <b>Balance:</b>
                                                                    <?php echo $s1 ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </div>

                                        <?php
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>

                                <div id="allparty" class="container tab-pane">
                                    <div class="table-responsive">
                                        <div class="card-body">
                                            <form method="post">
                                                <div class="row mt-3 text-center">
                                                    <div class="col-sm-4">
                                                        <label class="form-label">From Date</label>
                                                        <input class="form-control" type="date" name="fromdate3" id="fromdate3">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label">To Date</label>
                                                        <input class="form-control" type="date" name="todate3" id="todate3">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="btn btn-primary m-5 pt-3" type="submit" name="filter3" value="Search" id="filter3">
                                                    </div>
                                                    <div class="col-sm-9"></div>
                                                    <div class="col-sm-3">
                                                        <button class="btn btn-primary mb-3" onclick="fnExcelReport4()">Excel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <?php
                                        $fromdate3 = isset($_POST['fromdate3']) ? $_POST['fromdate3'] : "";
                                        $todate3 = isset($_POST['todate3']) ? $_POST['todate3'] : "";
                                        if ($fromdate3 == "" && $todate3 == "") {
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="example4">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>C id</th>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Booking number</th>
                                                            <th>Customer ID </th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && branch = '$branch' && username = '$username'";
                                                        $result5 = $conn->query($sql5);
                                                        $j = 1;
                                                        while ($delivery = $result5->FETCH_ASSOC()) {
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $j++ ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["from_cx_id"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["from_name"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["createdAt"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["booking_number"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["customer_id"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $delivery["amount"] ?>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="table-responsive">
                                                <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable4">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>C id</th>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Booking number</th>
                                                            <th>Customer ID </th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && branch = '$branch' && username = '$username'";
                                                        $result5 = $conn->query($sql5);
                                                        $j = 1;
                                                        while ($delivery = $result5->FETCH_ASSOC()) {
                                                            $sql50 = "SELECT SUM(amount) as amount FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id'";
                                                            $result50 = $conn->query($sql50);
                                                            while ($delivery50 = $result50->FETCH_ASSOC()) {
                                                                $s = 0;

                                                                $string =  (int) $delivery50["amount"];
                                                                $s = $s + $string;
                                                        ?>
                                                                <tr>
                                                                    <td id="filter_id">
                                                                        <?php echo $j++ ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_cx_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_name"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["createdAt"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["booking_number"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["customer_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["amount"] ?>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <b>Total:</b>
                                                                <?php echo $s ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if (isset($_POST['filter3'])) {
                                            $fromdate3 = $_POST['fromdate3'];
                                            $todate3 = $_POST['todate3'];
                                            if ($fromdate3 != "" && $todate3 != "") {
                                        ?>

                                                <div class="table-responsive">
                                                    <table class="table table-separate table-head-custom table-checkable" id="example4">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>C id</th>
                                                                <th>Name</th>
                                                                <th>Date</th>
                                                                <th>Booking number</th>
                                                                <th>Customer ID </th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && createddate >='$fromdate3' AND createddate <='$todate3' && branch = '$branch' && username = '$username'";
                                                            $result5 = $conn->query($sql5);
                                                            $j = 1;
                                                            while ($delivery = $result5->FETCH_ASSOC()) {
                                                            ?>
                                                                <tr>
                                                                    <td id="filter_id">
                                                                        <?php echo $j++ ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_cx_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["from_name"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["createdAt"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["booking_number"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["customer_id"] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $delivery["amount"] ?>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>

                                                    </table>
                                                </div>

                                                <div class="table-responsive">
                                                    <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable4">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>C id</th>
                                                                <th>Name</th>
                                                                <th>Date</th>
                                                                <th>Booking number</th>
                                                                <th>Customer ID </th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sql5 = "SELECT * FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && createddate >='$fromdate3' AND createddate <='$todate3' && branch = '$branch' && username = '$username'";
                                                            $result5 = $conn->query($sql5);
                                                            $j = 1;
                                                            while ($delivery = $result5->FETCH_ASSOC()) {
                                                                $sql50 = "SELECT SUM(amount) as amount FROM booking_from where customer_type='Party' && from_cx_id='$from_cx_id' && createddate >='$fromdate3' AND createddate <='$todate3'";
                                                                $result50 = $conn->query($sql50);
                                                                while ($delivery50 = $result50->FETCH_ASSOC()) {
                                                                    $s = 0;

                                                                    $string =  (int) $delivery50["amount"];
                                                                    $s = $s + $string;
                                                            ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $j++ ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["from_cx_id"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["from_name"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["createdAt"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["booking_number"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["customer_id"] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $delivery["amount"] ?>
                                                                        </td>
                                                                    </tr>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <b>Total:</b>
                                                                    <?php echo $s ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </div>

                                        <?php
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>


                        <?php
                        }
                        ?>

                    </div>
                </div>
                <!--end::Card-->


            </div>
            <!--end::Container-->
        </div>

    </div>
    <!--end::Entry-->
</div>
<!--end::Wrapper-->


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<!--begin::Global Theme Bundle(used by all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Theme Bundle-->

<!--begin::Page Vendors(used by this page)-->
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors-->

<!--begin::Page Scripts(used by this page)-->
<script src="assets/js/pages/crud/datatables/advanced/footer-callback.js"></script>
<script>
    function myFunction1() {
        alert("Are you want delete this entry?");
    }
</script>
<script>
    function fnExcelReport5() {
        var tab_text = "<table border='2px'><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='7'><h1>Senthil Agency</h1></th></tr><tr style='bgcolor='#fff82a'>";
        var textRange;

        var j = 0;
        tab = document.getElementById('kt_datatable2'); // id of table
        for (j = 0; j < tab.rows.length; j++) {
            tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
        }
        tab_text = tab_text + "</table>";
        // tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
        // tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
        // tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            txtArea1.document.open("txt/html", "replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus();
            sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
        } else //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

        return (sa);
    }
</script>
<script>
    function fnExcelReport3() {
        var tab_text = "<table border='2px'><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='7'><h1>Senthil Agency</h1></th></tr><tr style='bgcolor='#fff82a'>";
        var textRange;

        var j = 0;
        tab = document.getElementById('kt_datatable3'); // id of table
        for (j = 0; j < tab.rows.length; j++) {
            tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
        }
        tab_text = tab_text + "</table>";
        // tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
        // tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
        // tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            txtArea1.document.open("txt/html", "replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus();
            sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
        } else //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

        return (sa);
    }
</script>
<script>
    function fnExcelReport4() {
        var tab_text = "<table border='2px'><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='7'><h1>Senthil Agency</h1></th></tr><tr style='bgcolor='#fff82a'>";
        var textRange;

        var j = 0;
        tab = document.getElementById('kt_datatable4'); // id of table
        for (j = 0; j < tab.rows.length; j++) {
            tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
        }
        tab_text = tab_text + "</table>";
        // tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
        // tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
        // tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            txtArea1.document.open("txt/html", "replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus();
            sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
        } else //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

        return (sa);
    }
</script>
<script>
    var eventFired = function(type) {
        var n = document.querySelector('#example3');
        n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
        n.scrollTop = n.scrollHeight;
    }
    $(document).ready(function() {
        $('#example3').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
        });
    });
</script>
<script>
    var eventFired = function(type) {
        var n = document.querySelector('#example4');
        n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
        n.scrollTop = n.scrollHeight;
    }
    $(document).ready(function() {
        $('#example4').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
        });
    });
</script>
<script>
    var eventFired = function(type) {
        var n = document.querySelector('#example5');
        n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
        n.scrollTop = n.scrollHeight;
    }
    $(document).ready(function() {
        $('#example5').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
        });
    });
</script>

</body>

</html>