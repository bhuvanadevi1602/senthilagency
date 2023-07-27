<?php
require("header.php");
include("config.php");
$username = $_SESSION['user_name'];
$branch = $_SESSION['courier_mode'];
$userId = $_SESSION['user_id'];

if (isset($_POST['comp_id'])) {
    $id = $_POST["id"];
    $Complaint_id = $_POST["Complaint_id"];

    $sql2 = "update user_booking set Complaint_id='$Complaint_id' where id=$id";
    if (mysqli_query($conn, $sql2)) {
        echo "<script type='text/javascript'>
                     $(document).ready(function() {
                      Swal.fire({
                  text: 'Complaint Data Save Successfully',
                  icon: 'success',
                  confirmButtonColor: '#1BC5BD',
                  button: 'Dashboard!',
                            })
                     });
                </script>";
    }
}
?>

<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="subheader py-3 py-lg-8  subheader-transparent " id="kt_subheader">
            <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">
                             Datatable
                        </h2>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                </div>
            </div>
        </div>

        <div class="modal fade" id="complaint_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #086ad7 ;">Complaints</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
                                    <div class="alert-icon"><i class="flaticon2-information"></i></div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span><i class="ki ki-close "></i></span>
                                        </button>
                                    </div>
                                </div>
                                <input type="text" name="id" id="complaintdetail_id">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="complaintstatusupdate">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" id="modal_footer">
                            <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <div class="d-flex flex-column-fluid">
            <div class=" container ">
                <div class="card card-custom">

                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link active" data-toggle="tab" href="#booking">Booking</a>-->
                            <!--</li>-->
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#month">Month</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#party">Party</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#partyexcel">Party Excel</a>
                            </li>
                        </ul>

                        <?php
                        if ($_SESSION['role'] == "super_admin") {
                        ?>
                            <div class="tab-content">
                                
                                <!--<div id="booking" class="container tab-pane active"><br>-->
                                <!--    <div class="card-body">-->
                                <!--        <div class="row mt-3 text-center">-->
                                <!--            <div class="col-sm-3">-->
                                <!--                <label class="form-label">From Date</label>-->
                                <!--                <input class="form-control" type="date" name="fromdatebooking" id="fromdatebooking">-->
                                <!--            </div>-->
                                <!--            <div class="col-sm-3">-->
                                <!--                <label class="form-label">To Date</label>-->
                                <!--                <input class="form-control" type="date" name="todatebooking" id="todatebooking">-->
                                <!--            </div>-->
                                <!--            <div class="col-sm-3">-->
                                <!--                <input class="btn btn-primary m-5 pt-3" type="submit" name="filterbooking" value="Search" id="filterbooking">-->
                                <!--            </div>-->
                                <!--            <div class="col-sm-3">-->
                                <!--                <button class="btn btn-primary mb-3" onclick="ExportToExcel('xlsx')">Excel</button>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="table-responsive">-->
                                <!--        <table class="display" id="bookingdbbooking">-->
                                <!--            <thead>-->
                                <!--                <tr>-->
                                <!--                    <th>S.No</th>-->
                                <!--                    <th>Date</th>-->
                                <!--                    <th>Booking Id</th>-->
                                <!--                    <th>Product Name</th>-->
                                <!--                    <th>Volume</th>-->
                                <!--                    <th>Height</th>-->
                                <!--                    <th>Width</th>-->
                                <!--                    <th>Address</th>-->
                                <!--                    <th>Pincode</th>-->
                                <!--                    <th>Approximate Prize</th>-->
                                <!--                    <th>Receiver Name</th>-->
                                <!--                    <th>Receiver Address</th>-->
                                <!--                    <th>Receiver Pincode</th>-->
                                <!--                    <th>Status</th>-->
                                <!--                    <th>Action</th>-->
                                <!--                </tr>-->
                                <!--            </thead>-->
                                <!--            <tbody>-->

                                <!--            </tbody>-->
                                <!--        </table>-->
                                <!--    </div>-->
                                <!--    <div class="hide">-->
                                <!--        <table id="excelallbooking">-->
                                <!--            <thead>-->
                                <!--                <tr>-->
                                <!--                    <th colspan='20'>-->
                                <!--                        <h1>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<b>Senthil Ageancy</b></h1>-->
                                <!--                    </th>-->
                                <!--                </tr>-->
                                <!--                <tr>-->
                                <!--                    <th>S.No</th>-->
                                <!--                    <th>Booking Id</th>-->
                                <!--                    <th>Product Name</th>-->
                                <!--                    <th>Volume</th>-->
                                <!--                    <th>Height</th>-->
                                <!--                    <th>Width</th>-->
                                <!--                    <th>Address</th>-->
                                <!--                    <th>Pincode</th>-->
                                <!--                    <th>Approximate Prize</th>-->
                                <!--                    <th>Receiver Name</th>-->
                                <!--                    <th>Receiver Address</th>-->
                                <!--                    <th>Receiver Pincode</th>-->
                                <!--                    <th>Status</th>-->
                                <!--                </tr>-->
                                <!--            </thead>-->
                                <!--            <tbody>-->

                                <!--            </tbody>-->
                                <!--        </table>-->
                                <!--    </div>-->
                                <!--</div>-->

                                <div id="month" class="container tab-pane active"><br>
                                    <div class="table-responsive">
                                        <table class="table table-separate table-head-custom table-checkable" id="example5">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Company Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div id="party" class="container tab-pane"><br>
                                    <div class="table-responsive">
                                        <table class="table table-separate table-head-custom table-checkable" id="example6">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Customer Type</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div id="partyexcel" class="container tab-pane"><br>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="row mt-3 text-center">
                                                <div class="col-sm-2">
                                                    <label class="form-label">From Date</label>
                                                    <input class="form-control" type="date" name="fromdate6" id="fromdate6">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="form-label">To Date</label>
                                                    <input class="form-control" type="date" name="todate6" id="todate6">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label">Select Transport</label>
                                                    <select class="form-control" name="partyexcel11" id="partyexcel11" required>
                                                        <option selected disabled>Select</option>
                                                        <!--<option value="amt">Amount</option>-->
                                                        <option value="bal">Balance</option>
                                                        <option value="paym">Payment</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <!--<input class="btn btn-primary m-5 pt-3" type="submit" name="filter6" value="Search" id="filter6" >-->
                                                    <input class="btn btn-primary m-5 pt-3" type="submit" name="filter6" value="Search" id="filter6" onClick=“reload(false)”>
                                                </div>
                                                <div class="col-sm-8"></div>
                                                <div class="col-sm-4">
                                                    <button class="btn btn-primary mb-3" onclick="fnExcelReport6()">Excel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                    $fromdate6 = isset($_POST['fromdate6']) ? $_POST['fromdate6'] : "";
                                    $todate6 = isset($_POST['todate6']) ? $_POST['todate6'] : "";
                                    $partyexcel11 = isset($_POST['partyexcel11']) ? $_POST['partyexcel11'] : "";
                                    if ($fromdate6 == "" && $todate6 == "" && $partyexcel11 == "") {
                                    ?>
                                        <div class="table-responsive">
                                            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable5">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Customer iD</th>
                                                        <th>Party Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Mode of Payment</th>
                                                        <!--<th>Station</th>-->
                                                        <th>Payment Date</th>
                                                        <!--<th>Amount</th>-->
                                                        <th>Payment</th>
                                                        <th>Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql9 = "SELECT * FROM partyexcel order by partyexcel_id  desc";
                                                    $result9 = $conn->query($sql9);
                                                    $j = 1;
                                                    while ($allfilter = $result9->FETCH_ASSOC()) {
                                                        $balance11 = $allfilter["balance"];
                                                        $name = $allfilter["name"];
                                                        $id = $allfilter["id"];

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $j++ ?></td>
                                                            <td><?php echo $allfilter["from_cx_id"] ?></td>
                                                            <?php
                                                            if ($balance <= 100000) {
                                                            ?>
                                                                <td><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <td><?php echo $allfilter["from_contact"] ?></td>
                                                            <td><?php echo $allfilter["mode_payment"] ?></td>
                                                            <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                            <td><?php echo $allfilter["createddate1"] ?></td>
                                                            <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                            <td><?php echo $allfilter["amount_enter"] ?></td>
                                                            <td><?php echo $allfilter["balance"] ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable6">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Customer Id</th>
                                                    <th>Party Name</th>
                                                    <th>Phone Number</th>
                                                    <th>Mode of Payment</th>
                                                    <th>Date</th>
                                                    <th>Payment</th>
                                                    <th>Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql9 = "SELECT * FROM partyexcel";
                                                $result9 = $conn->query($sql9);
                                                $j = 1;
                                                while ($allfilter = $result9->FETCH_ASSOC()) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $j++ ?></td>
                                                        <td><?php echo $allfilter["from_cx_id"] ?></td>
                                                        <?php
                                                        if ($balance <= 100000) {
                                                        ?>
                                                            <td><?php echo $allfilter["name"] ?></a></td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <td><?php echo $allfilter["from_contact"] ?></td>
                                                        <td><?php echo $allfilter["mode_payment"] ?></td>
                                                        <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                        <td><?php echo $allfilter["createddate1"] ?></td>
                                                        <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                        <td><?php echo $allfilter["amount_enter"] ?></td>
                                                        <td><?php echo $allfilter["balance"] ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (isset($_POST['filter6'])) {
                                        $fromdate6 = $_POST['fromdate6'];
                                        $todate6 = $_POST['todate6'];
                                        $partyexcel11 = $_POST['partyexcel11'];
                                        if ($fromdate6 != "" && $todate6 != "" && $partyexcel11 == "") {
                                    ?>
                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Customer Id</th>
                                                            <th>Party Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Mode of Payment</th>
                                                            <!--<th>Station</th>-->
                                                            <th>Date</th>
                                                            <!--<th>Amount</th>-->
                                                            <th>Payment</th>
                                                            <th>Balance</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql9 = "SELECT * FROM partyexcel WHERE createddate1 >='$fromdate6' AND createddate1<='$todate6'";
                                                        $result9 = $conn->query($sql9);
                                                        $j = 1;
                                                        while ($allfilter = $result9->FETCH_ASSOC()) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $j++ ?></td>
                                                                <td><?php echo $allfilter["from_cx_id"] ?></td>
                                                                <?php
                                                                if ($balance11 <= 100000) {
                                                                ?>
                                                                    <td><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <td><?php echo $allfilter["from_contact"] ?></td>
                                                                <td><?php echo $allfilter["mode_payment"] ?></td>
                                                                <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                                <td><?php echo $allfilter["createddate1"] ?></td>
                                                                <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                                <td><?php echo $allfilter["amount_enter"] ?></td>
                                                                <td><?php echo $allfilter["balance"] ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable6">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Customer Id</th>
                                                        <th>Party Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Mode of Payment</th>
                                                        <!--<th>Station</th>-->
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                        <th>Payment</th>
                                                        <th>Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql9 = "SELECT * FROM partyexcel WHERE createddate1 >='$fromdate6' AND createddate1<='$todate6'";
                                                    $result9 = $conn->query($sql9);
                                                    $j = 1;
                                                    while ($allfilter = $result9->FETCH_ASSOC()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $j++ ?></td>
                                                            <td><?php echo $allfilter["from_cx_id"] ?></td>
                                                            <?php
                                                            if ($balance <= 100000) {
                                                            ?>
                                                                <td><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td><?php echo $allfilter["from_contact"] ?></td>
                                                            <td><?php echo $allfilter["mode_payment"] ?></td>
                                                            <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                            <td><?php echo $allfilter["createddate1"] ?></td>
                                                            <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                            <td><?php echo $allfilter["amount_enter"] ?></td>
                                                            <td><?php echo $allfilter["balance"] ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        <?php
                                        } else if ($fromdate6 != "" && $todate6 != "" && $partyexcel11 == "bal") {
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Customer Id</th>
                                                            <th>Party Name</th>
                                                            <th>Phone Number</th>
                                                            <!--<th>Mode of Payment</th>-->
                                                            <!--<th>Station</th>-->
                                                            <th>Date</th>
                                                            <th>Balance</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql9 = "SELECT partyexcel_id,username,branch,user_id,from_cx_id,name,from_contact,SUM(total) as total,SUM(paymnent) as paymnent, balance
													,amount_enter,mode_payment,createddate1 FROM partyexcel WHERE createddate1 >='$fromdate6' AND createddate1<='$todate6' GROUP BY name ";
                                                        $result9 = $conn->query($sql9);
                                                        $j = 1;
                                                        while ($allfilter = $result9->FETCH_ASSOC()) {
                                                            $name = $allfilter["name"];

                                                            $sql91 = "SELECT SUM(balance) as balance FROM party where name='$name'";
                                                            $result91 = $conn->query($sql91);
                                                            while ($allfilter1 = $result91->FETCH_ASSOC()) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $j++ ?></td>
                                                                    <td><?php echo $allfilter["from_cx_id"] ?></a></td>
                                                                    <?php
                                                                    if ($balance <= 100000) {
                                                                    ?>
                                                                        <td><?php echo $allfilter["name"] ?></a></td>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <td><?php echo $allfilter["from_contact"] ?></td>
                                                                    <!--<td><?php echo $allfilter["mode_payment"] ?></td>-->
                                                                    <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                                    <td><?php echo $allfilter["createddate1"] ?></td>
                                                                    <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                                    <!--<td><?php echo $allfilter["amount_enter"] ?></td>-->
                                                                    <td><?php echo $allfilter1["balance"] ?></td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable6">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Customer Id</th>
                                                        <th>Party Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Date</th>
                                                        <th>Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql9 = "SELECT partyexcel_id,username,branch,user_id,from_cx_id,name,from_contact,SUM(total) as total,SUM(paymnent) as paymnent, balance
													,amount_enter,mode_payment,createddate1 FROM partyexcel WHERE createddate1 >='$fromdate6' AND createddate1<='$todate6' GROUP BY name ";
                                                    $result9 = $conn->query($sql9);
                                                    $j = 1;
                                                    while ($allfilter = $result9->FETCH_ASSOC()) {
                                                        $name = $allfilter["name"];
                                                        $sql91 = "SELECT SUM(balance) as balance FROM party where name='$name'";
                                                        $result91 = $conn->query($sql91);
                                                        while ($allfilter1 = $result91->FETCH_ASSOC()) {
                                                            $sql911 = "SELECT SUM(balance) as balance FROM party WHERE createddate1 >='$fromdate6' AND createddate1<='$todate6'";
                                                            $result911 = $conn->query($sql911);
                                                            $allfilter11 = $result911->FETCH_ASSOC();
                                                            $s = 0;
                                                            $string =  (int) $allfilter11["balance"];
                                                            $s = $s + $string;
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $j++ ?></td>
                                                                <td><?php echo $allfilter["from_cx_id"] ?></a></td>
                                                                <?php
                                                                if ($balance <= 100000) {
                                                                ?>
                                                                    <td><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <td><?php echo $allfilter["from_contact"] ?></td>
                                                                <td><?php echo $allfilter["createddate1"] ?></td>
                                                                <td><?php echo $allfilter1["balance"] ?></td>
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
                                                            <b>Balance:</b><?php echo $s ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php
                                        } else if ($fromdate6 != "" && $todate6 != "" && $partyexcel11 == "paym") {
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Customer Id</th>
                                                            <th>Party Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Mode of Payment</th>
                                                            <th>Date</th>
                                                            <th>Payment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql9 = "SELECT * FROM partyexcel WHERE createddate1 >='$fromdate6' AND createddate1<='$todate6'";
                                                        $result9 = $conn->query($sql9);
                                                        $j = 1;
                                                        while ($allfilter = $result9->FETCH_ASSOC()) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $j++ ?></td>
                                                                <td><?php echo $allfilter["from_cx_id"] ?></a></td>
                                                                <?php
                                                                if ($balance <= 100000) {
                                                                ?>
                                                                    <td><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <td><?php echo $allfilter["from_contact"] ?></td>
                                                                <td><?php echo $allfilter["mode_payment"] ?></td>
                                                                <td><?php echo $allfilter["createddate1"] ?></td>
                                                                <td><?php echo $allfilter["amount_enter"] ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable6">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Customer Id</th>
                                                        <th>Party Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Mode of Payment</th>
                                                        <th>Date</th>
                                                        <th>Paymnent</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql9 = "SELECT * FROM partyexcel WHERE createddate1 >='$fromdate6' AND createddate1<='$todate6'";
                                                    $result9 = $conn->query($sql9);
                                                    $j = 1;
                                                    while ($allfilter = $result9->FETCH_ASSOC()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $j++ ?></td>
                                                            <td><?php echo $allfilter["from_cx_id"] ?></a></td>
                                                            <?php
                                                            if ($balance <= 100000) {
                                                            ?>
                                                                <td><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td><?php echo $allfilter["from_contact"] ?></td>
                                                            <td><?php echo $allfilter["mode_payment"] ?></td>
                                                            <td><?php echo $allfilter["createddate1"] ?></td>
                                                            <td><?php echo $allfilter["amount_enter"] ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        <?php
                                        } else if ($fromdate6 == "" && $todate6 == "" && $partyexcel11 == "bal") {
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Customer Id</th>
                                                            <th>Party Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Date</th>
                                                            <th>Balance</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql91 = "SELECT id,bill_id,username1,branch1,from_cx_id,name,from_contact,from_address,to_address,mode_payment,
														SUM(total1) as total,SUM(paymnent) as paymnent,SUM(balance) as balance
													,amount_enter,from_date,to_date,payment_date,createdAt11,createddate1,partyend_time FROM party GROUP BY name";
                                                        $result91 = $conn->query($sql91);
                                                        $j = 1;
                                                        while ($allfilter1 = $result91->FETCH_ASSOC()) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $j++ ?></td>
                                                                <td><?php echo $allfilter1["from_cx_id"] ?></a></td>
                                                                <?php
                                                                if ($balance <= 100000) {
                                                                ?>
                                                                    <td><?php echo $allfilter1["name"] ?></a></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td style="color:red"><?php echo $allfilter1["name"] ?></a></td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <td><?php echo $allfilter1["from_contact"] ?></td>
                                                                <td><?php echo $allfilter1["createddate1"] ?></td>
                                                                <td><?php echo $allfilter1["balance"] ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable6">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Customer Id</th>
                                                        <th>Party Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Date</th>
                                                        <th>Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql91 = "SELECT id,bill_id,username1,branch1,from_cx_id,name,from_contact,from_address,to_address,mode_payment,
														SUM(total1) as total,SUM(paymnent) as paymnent,SUM(balance) as balance
													,amount_enter,from_date,to_date,payment_date,createdAt11,createddate1,partyend_time FROM party GROUP BY name";
                                                    $result91 = $conn->query($sql91);
                                                    $j = 1;
                                                    $s = 0;
                                                    while ($allfilter1 = $result91->FETCH_ASSOC()) {
                                                        $string =  (int) $allfilter1["balance"];
                                                        $s = $s + $string;
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $j++ ?></td>
                                                            <td><?php echo $allfilter1["from_cx_id"] ?></a></td>
                                                            <?php
                                                            if ($balance <= 100000) {
                                                            ?>
                                                                <td><?php echo $allfilter1["name"] ?></a></td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td style="color:red"><?php echo $allfilter1["name"] ?></a></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td><?php echo $allfilter1["from_contact"] ?></td>
                                                            <td><?php echo $allfilter1["createddate1"] ?></td>
                                                            <td><?php echo $allfilter1["balance"] ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <b>Balance:</b><?php echo $s ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php
                                        } else if ($fromdate6 == "" && $todate6 == "" && $partyexcel11 == "paym") {
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Customer Id</th>
                                                            <th>Party Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Mode of Payment</th>
                                                            <th>Date</th>
                                                            <th>Payment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql9 = "SELECT * FROM partyexcel";
                                                        $result9 = $conn->query($sql9);
                                                        $j = 1;
                                                        while ($allfilter = $result9->FETCH_ASSOC()) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $j++ ?></td>
                                                                <td><?php echo $allfilter["from_cx_id"] ?></a></td>
                                                                <?php
                                                                if ($balance <= 100000) {
                                                                ?>
                                                                    <td><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <td><?php echo $allfilter["from_contact"] ?></td>
                                                                <td><?php echo $allfilter["mode_payment"] ?></td>
                                                                <td><?php echo $allfilter["createddate1"] ?></td>
                                                                <td><?php echo $allfilter["amount_enter"] ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable6">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Customer Id</th>
                                                        <th>Party Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Mode of Payment</th>
                                                        <th>Date</th>
                                                        <th>Paymnent</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql9 = "SELECT * FROM partyexcel ";
                                                    $result9 = $conn->query($sql9);
                                                    $j = 1;
                                                    while ($allfilter = $result9->FETCH_ASSOC()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $j++ ?></td>
                                                            <td><?php echo $allfilter["from_cx_id"] ?></a></td>
                                                            <?php
                                                            if ($balance <= 100000) {
                                                            ?>
                                                                <td><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td><?php echo $allfilter["from_contact"] ?></td>
                                                            <td><?php echo $allfilter["mode_payment"] ?></td>
                                                            <td><?php echo $allfilter["createddate1"] ?></td>
                                                            <td><?php echo $allfilter["amount_enter"] ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                </div>
                        <?php
                                        }
                                    }
                        ?>
                            </div>

                        <?php

                        } elseif ($_SESSION['role'] == "user") {
                        ?>

                            <div class="tab-content">

                                <div id="month" class="container tab-pane active"><br>
                                    <div class="table-responsive">
                                        <table class="table table-separate table-head-custom table-checkable" id="example51">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Company Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                                <div id="party" class="container tab-pane"><br>
                                    <div class="table-responsive">
                                        <table class="table table-separate table-head-custom table-checkable" id="example61">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Customer Type</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div id="partyexcel" class="container tab-pane"><br>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="row mt-3 text-center">
                                                <div class="col-sm-2">
                                                    <label class="form-label">From Date</label>
                                                    <input class="form-control" type="date" name="fromdate6" id="fromdate6">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="form-label">To Date</label>
                                                    <input class="form-control" type="date" name="todate6" id="todate6">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label">Select Transport</label>
                                                    <select class="form-control" name="partyexcel11" id="partyexcel11" required>
                                                        <option selected disabled>Select</option>
                                                        <!--<option value="amt">Amount</option>-->
                                                        <option value="bal">Balance</option>
                                                        <option value="paym">Payment</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input class="btn btn-primary m-5 pt-3" type="submit" name="filter6" value="Search" id="filter6" onClick=“reload(false)”>
                                                </div>
                                                <div class="col-sm-8"></div>
                                                <div class="col-sm-4">
                                                    <button class="btn btn-primary mb-3" onclick="fnExcelReport6()">Excel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                    $fromdate6 = isset($_POST['fromdate6']) ? $_POST['fromdate6'] : "";
                                    $todate6 = isset($_POST['todate6']) ? $_POST['todate6'] : "";
                                    $partyexcel11 = isset($_POST['partyexcel11']) ? $_POST['partyexcel11'] : "";
                                    if ($fromdate6 == "" && $todate6 == "" && $partyexcel11 == "") {
                                    ?>
                                        <div class="table-responsive">
                                            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable5">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Customer iD</th>
                                                        <th>Party Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Mode of Payment</th>
                                                        <!--<th>Station</th>-->
                                                        <th>Payment Date</th>
                                                        <!--<th>Amount</th>-->
                                                        <th>Payment</th>
                                                        <th>Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql9 = "SELECT * FROM partyexcel where branch = '$branch' && username = '$username' order by partyexcel_id desc";
                                                    $result9 = $conn->query($sql9);
                                                    $j = 1;
                                                    while ($allfilter = $result9->FETCH_ASSOC()) {
                                                        $balance11 = $allfilter["balance"];
                                                        $name = $allfilter["name"];
                                                        $id = $allfilter["id"];
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $j++ ?></td>
                                                            <td><?php echo $allfilter["from_cx_id"] ?></td>
                                                            <?php
                                                            if ($balance <= 100000) {
                                                            ?>
                                                                <td><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td><?php echo $allfilter["from_contact"] ?></td>
                                                            <td><?php echo $allfilter["mode_payment"] ?></td>
                                                            <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                            <td><?php echo $allfilter["createddate1"] ?></td>
                                                            <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                            <td><?php echo $allfilter["amount_enter"] ?></td>
                                                            <td><?php echo $allfilter["balance"] ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable6">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Customer Id</th>
                                                    <th>Party Name</th>
                                                    <th>Phone Number</th>
                                                    <th>Mode of Payment</th>
                                                    <!--<th>Station</th>-->
                                                    <th>Date</th>
                                                    <!--<th>Amount</th>-->
                                                    <th>Payment</th>
                                                    <th>Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql9 = "SELECT * FROM partyexcel where branch = '$branch' && username = '$username'";
                                                $result9 = $conn->query($sql9);
                                                $j = 1;
                                                while ($allfilter = $result9->FETCH_ASSOC()) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $j++ ?></td>
                                                        <td><?php echo $allfilter["from_cx_id"] ?></td>
                                                        <?php
                                                        if ($balance <= 100000) {
                                                        ?>
                                                            <td><?php echo $allfilter["name"] ?></a></td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <td><?php echo $allfilter["from_contact"] ?></td>
                                                        <td><?php echo $allfilter["mode_payment"] ?></td>
                                                        <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                        <td><?php echo $allfilter["createddate1"] ?></td>
                                                        <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                        <td><?php echo $allfilter["amount_enter"] ?></td>
                                                        <td><?php echo $allfilter["balance"] ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (isset($_POST['filter6'])) {
                                        $fromdate6 = $_POST['fromdate6'];
                                        $todate6 = $_POST['todate6'];
                                        $partyexcel11 = $_POST['partyexcel11'];
                                        if ($fromdate6 != "" && $todate6 != "" && $partyexcel11 == "") {
                                    ?>
                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Customer Id</th>
                                                            <th>Party Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Mode of Payment</th>
                                                            <!--<th>Station</th>-->
                                                            <th>Date</th>
                                                            <!--<th>Amount</th>-->
                                                            <th>Payment</th>
                                                            <th>Balance</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql9 = "SELECT * FROM partyexcel WHERE branch = '$branch' && username = '$username' and createddate1 >='$fromdate6' AND createddate1<='$todate6'";
                                                        $result9 = $conn->query($sql9);
                                                        $j = 1;
                                                        while ($allfilter = $result9->FETCH_ASSOC()) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $j++ ?></td>
                                                                <td><?php echo $allfilter["from_cx_id"] ?></td>
                                                                <?php
                                                                if ($balance <= 100000) {
                                                                ?>
                                                                    <td><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <td><?php echo $allfilter["from_contact"] ?></td>
                                                                <td><?php echo $allfilter["mode_payment"] ?></td>
                                                                <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                                <td><?php echo $allfilter["createddate1"] ?></td>
                                                                <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                                <td><?php echo $allfilter["amount_enter"] ?></td>
                                                                <td><?php echo $allfilter["balance"] ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable6">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Customer Id</th>
                                                        <th>Party Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Mode of Payment</th>
                                                        <!--<th>Station</th>-->
                                                        <th>Date</th>
                                                        <!-- <th>Amount</th> -->
                                                        <th>Payment</th>
                                                        <th>Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql9 = "SELECT * FROM partyexcel WHERE branch = '$branch' && username = '$username' and createddate1 >='$fromdate6' AND createddate1<='$todate6'";
                                                    $result9 = $conn->query($sql9);
                                                    $j = 1;
                                                    while ($allfilter = $result9->FETCH_ASSOC()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $j++ ?></td>
                                                            <td><?php echo $allfilter["from_cx_id"] ?></td>
                                                            <?php
                                                            if ($balance <= 100000) {
                                                            ?>
                                                                <td><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td><?php echo $allfilter["from_contact"] ?></td>
                                                            <td><?php echo $allfilter["mode_payment"] ?></td>
                                                            <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                            <td><?php echo $allfilter["createddate1"] ?></td>
                                                            <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                            <td><?php echo $allfilter["amount_enter"] ?></td>
                                                            <td><?php echo $allfilter["balance"] ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        <?php
                                        } else if ($fromdate6 != "" && $todate6 != "" && $partyexcel11 == "bal") {
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Customer Id</th>
                                                            <th>Party Name</th>
                                                            <th>Phone Number</th>
                                                            <!--<th>Mode of Payment</th>-->
                                                            <!--<th>Station</th>-->
                                                            <th>Date</th>
                                                            <th>Balance</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // $sql9 = "SELECT * FROM partyexcel WHERE branch = '$branch' && username = '$username' && createddate1 >='$fromdate6' AND createddate1<='$todate6'";
                                                        $sql9 = "SELECT partyexcel_id,username,branch,user_id,from_cx_id,name,from_contact,SUM(total) as total,SUM(paymnent) as paymnent,SUM(balance) as balance
													,amount_enter,mode_payment,createddate1 FROM partyexcel WHERE branch = '$branch' && username = '$username' && createddate1 >='$fromdate6' AND createddate1<='$todate6' GROUP BY name ";
                                                        $result9 = $conn->query($sql9);
                                                        $j = 1;
                                                        while ($allfilter = $result9->FETCH_ASSOC()) {
                                                            $name = $allfilter["name"];

                                                            $sql91 = "SELECT SUM(balance) as balance FROM party where name='$name' && branch1 = '$branch' && username1 = '$username' ";
                                                            $result91 = $conn->query($sql91);
                                                            while ($allfilter1 = $result91->FETCH_ASSOC()) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $j++ ?></td>
                                                                    <td><?php echo $allfilter["from_cx_id"] ?></td>
                                                                    <?php
                                                                    if ($balance <= 100000) {
                                                                    ?>
                                                                        <td><?php echo $allfilter["name"] ?></a></td>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                                        <?php
                                                                    }
                                                                        ?>>
                                                                        <td><?php echo $allfilter["from_contact"] ?></td>
                                                                        <!--<td><?php echo $allfilter["mode_payment"] ?></td>-->
                                                                        <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                                        <td><?php echo $allfilter["createddate1"] ?></td>
                                                                        <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                                        <!--<td><?php echo $allfilter["amount_enter"] ?></td>-->
                                                                        <td><?php echo $allfilter1["balance"] ?></td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable6">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Customer id</th>
                                                        <th>Party Name</th>
                                                        <th>Phone Number</th>
                                                        <!--<th>Mode of Payment</th>-->
                                                        <!--<th>Station</th>-->
                                                        <th>Date</th>
                                                        <th>Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql9 = "SELECT partyexcel_id,username,branch,user_id,from_cx_id,name,from_contact,SUM(total) as total,SUM(paymnent) as paymnent,SUM(balance) as balance
													,amount_enter,mode_payment,createddate1 FROM partyexcel WHERE branch = '$branch' && username = '$username' && createddate1 >='$fromdate6' AND createddate1<='$todate6' GROUP BY name ";
                                                    $result9 = $conn->query($sql9);
                                                    $j = 1;
                                                    while ($allfilter = $result9->FETCH_ASSOC()) {
                                                        $name = $allfilter["name"];

                                                        $sql91 = "SELECT SUM(balance) as balance FROM party where name='$name' && branch1 = '$branch' && username1 = '$username'";
                                                        $result91 = $conn->query($sql91);
                                                        while ($allfilter1 = $result91->FETCH_ASSOC()) {

                                                            $sql911 = "SELECT SUM(balance) as balance FROM party WHERE createddate1 >='$fromdate6' AND createddate1<='$todate6' && branch1 = '$branch' && username1 = '$username'";
                                                            $result911 = $conn->query($sql911);
                                                            $allfilter11 = $result911->FETCH_ASSOC();
                                                            $s = 0;
                                                            $string =  (int) $allfilter11["balance"];
                                                            $s = $s + $string;
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $j++ ?></td>
                                                                <td><?php echo $allfilter["from_cx_id"] ?></td>
                                                                <?php
                                                                if ($balance <= 100000) {
                                                                ?>
                                                                    <td><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <td><?php echo $allfilter["from_contact"] ?></td>
                                                                <!--<td><?php echo $allfilter["mode_payment"] ?></td>-->
                                                                <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                                <td><?php echo $allfilter["createddate1"] ?></td>
                                                                <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                                <!--<td><?php echo $allfilter["amount_enter"] ?></td>-->
                                                                <td><?php echo $allfilter1["balance"] ?></td>
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
                                                            <b>Balance:</b><?php echo $s ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php
                                        } else if ($fromdate6 != "" && $todate6 != "" && $partyexcel11 == "paym") {
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Customer id</th>
                                                            <th>Party Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Mode of Payment</th>
                                                            <!--<th>Station</th>-->
                                                            <th>Date</th>
                                                            <th>Payment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql9 = "SELECT * FROM partyexcel WHERE branch = '$branch' && username = '$username' && createddate1 >='$fromdate6' AND createddate1<='$todate6'";
                                                        $result9 = $conn->query($sql9);
                                                        $j = 1;
                                                        while ($allfilter = $result9->FETCH_ASSOC()) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $j++ ?></td>
                                                                <td><?php echo $allfilter["from_cx_id"] ?></td>
                                                                <?php
                                                                if ($balance <= 100000) {
                                                                ?>
                                                                    <td><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <td><?php echo $allfilter["from_contact"] ?></td>
                                                                <td><?php echo $allfilter["mode_payment"] ?></td>
                                                                <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                                <td><?php echo $allfilter["createddate1"] ?></td>
                                                                <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                                <td><?php echo $allfilter["amount_enter"] ?></td>
                                                                <!--<td><?php echo $allfilter["balance"] ?></td>-->
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable6">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Customer id</th>
                                                        <th>Party Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Mode of Payment</th>
                                                        <!--<th>Station</th>-->
                                                        <th>Date</th>
                                                        <th>Paymnent</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql9 = "SELECT * FROM partyexcel WHERE branch = '$branch' && username = '$username' && createddate1 >='$fromdate6' AND createddate1<='$todate6'";
                                                    $result9 = $conn->query($sql9);
                                                    $j = 1;
                                                    while ($allfilter = $result9->FETCH_ASSOC()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $j++ ?></td>
                                                            <td><?php echo $allfilter["from_cx_id"] ?></td>
                                                            <?php
                                                            if ($balance <= 100000) {
                                                            ?>
                                                                <td><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td><?php echo $allfilter["from_contact"] ?></td>
                                                            <td><?php echo $allfilter["mode_payment"] ?></td>
                                                            <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                            <td><?php echo $allfilter["createddate1"] ?></td>
                                                            <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                            <td><?php echo $allfilter["amount_enter"] ?></td>
                                                            <!--<td><?php echo $allfilter["balance"] ?></td>-->
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        <?php
                                        } else if ($fromdate6 == "" && $todate6 == "" && $partyexcel11 == "bal") {
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Customer Id</th>
                                                            <th>Party Name</th>
                                                            <th>Phone Number</th>
                                                            <!--<th>Mode of Payment</th>-->
                                                            <!--<th>Station</th>-->
                                                            <th>Date</th>
                                                            <th>Balance</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        $sql91 = "SELECT id,bill_id,username1,branch1,from_cx_id,name,from_contact,from_address,to_address,mode_payment,
														SUM(total1) as total,SUM(paymnent) as paymnent,SUM(balance) as balance
													,amount_enter,from_date,to_date,payment_date,createdAt11,createddate1,partyend_time FROM party where branch1 = '$branch' && username1 = '$username' GROUP BY name";
                                                        $result91 = $conn->query($sql91);
                                                        $j = 1;
                                                        while ($allfilter1 = $result91->FETCH_ASSOC()) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $j++ ?></td>
                                                                <td><?php echo $allfilter1["from_cx_id"] ?></a></td>
                                                                <?php
                                                                if ($balance <= 100000) {
                                                                ?>
                                                                    <td><?php echo $allfilter1["name"] ?></a></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td style="color:red"><?php echo $allfilter1["name"] ?></a></td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <td><?php echo $allfilter1["from_contact"] ?></td>
                                                                <!--<td><?php echo $allfilter["mode_payment"] ?></td>-->
                                                                <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                                <td><?php echo $allfilter1["createddate1"] ?></td>
                                                                <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                                <!--<td><?php echo $allfilter["amount_enter"] ?></td>-->
                                                                <td><?php echo $allfilter1["balance"] ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable6">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Customer Id</th>
                                                        <th>Party Name</th>
                                                        <th>Phone Number</th>
                                                        <!--<th>Mode of Payment</th>-->
                                                        <!--<th>Station</th>-->
                                                        <th>Date</th>
                                                        <th>Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql91 = "SELECT id,bill_id,username1,branch1,from_cx_id,name,from_contact,from_address,to_address,mode_payment,
														SUM(total1) as total,SUM(paymnent) as paymnent,SUM(balance) as balance
													,amount_enter,from_date,to_date,payment_date,createdAt11,createddate1,partyend_time FROM party where branch1 = '$branch' && username1 = '$username' GROUP BY name";
                                                    $result91 = $conn->query($sql91);
                                                    $j = 1;
                                                    $s = 0;
                                                    while ($allfilter1 = $result91->FETCH_ASSOC()) {
                                                        $string =  (int) $allfilter1["balance"];
                                                        $s = $s + $string;
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $j++ ?></td>
                                                            <td><?php echo $allfilter1["from_cx_id"] ?></a></td>
                                                            <?php
                                                            if ($balance <= 100000) {
                                                            ?>
                                                                <td><?php echo $allfilter1["name"] ?></a></td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td style="color:red"><?php echo $allfilter1["name"] ?></a></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td><?php echo $allfilter1["from_contact"] ?></td>
                                                            <!--<td><?php echo $allfilter["mode_payment"] ?></td>-->
                                                            <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                            <td><?php echo $allfilter1["createddate1"] ?></td>
                                                            <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                            <!--<td><?php echo $allfilter["amount_enter"] ?></td>-->
                                                            <td><?php echo $allfilter1["balance"] ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <b>Balance:</b><?php echo $s ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php
                                        } else if ($fromdate6 == "" && $todate6 == "" && $partyexcel11 == "paym") {
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Customer id</th>
                                                            <th>Party Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Mode of Payment</th>
                                                            <!--<th>Station</th>-->
                                                            <th>Date</th>
                                                            <th>Payment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql9 = "SELECT * FROM partyexcel where branch = '$branch' && username = '$username'";
                                                        $result9 = $conn->query($sql9);
                                                        $j = 1;
                                                        while ($allfilter = $result9->FETCH_ASSOC()) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $j++ ?></td>
                                                                <td><?php echo $allfilter["from_cx_id"] ?></td>
                                                                <?php
                                                                if ($balance <= 100000) {
                                                                ?>
                                                                    <td><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <td><?php echo $allfilter["from_contact"] ?></td>
                                                                <td><?php echo $allfilter["mode_payment"] ?></td>
                                                                <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                                <td><?php echo $allfilter["createddate1"] ?></td>
                                                                <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                                <td><?php echo $allfilter["amount_enter"] ?></td>
                                                                <!--<td><?php echo $allfilter["balance"] ?></td>-->
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <table style="display:none" class="table table-separate table-head-custom table-checkable" id="kt_datatable6">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Customer id</th>
                                                        <th>Party Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Mode of Payment</th>
                                                        <!--<th>station</th>-->
                                                        <th>Date</th>
                                                        <th>Paymnent</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql9 = "SELECT * FROM partyexcel where branch = '$branch' && username = '$username'";
                                                    $result9 = $conn->query($sql9);
                                                    $j = 1;
                                                    while ($allfilter = $result9->FETCH_ASSOC()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $j++ ?></td>
                                                            <td><?php echo $allfilter["from_cx_id"] ?></td>
                                                            <?php
                                                            if ($balance <= 100000) {
                                                            ?>
                                                                <td><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td style="color:red"><?php echo $allfilter["name"] ?></a></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td><?php echo $allfilter["from_contact"] ?></td>
                                                            <td><?php echo $allfilter["mode_payment"] ?></td>
                                                            <!--<td><?php echo $allfilter["to_address"] ?></a></td>-->
                                                            <td><?php echo $allfilter["createddate1"] ?></td>
                                                            <!--<td><?php echo $allfilter["total"] ?></td>-->
                                                            <td><?php echo $allfilter["amount_enter"] ?></td>
                                                            <!--<td><?php echo $allfilter["balance"] ?></td>-->
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>

                                </div>
                        <?php
                                        }
                                    }
                        ?>

                            </div>

                    </div>
                <?php

                        }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include("footer.php");
?>

<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<!--<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
<!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
<!--<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>-->
<!--<script src="assets/plugins/global/plugins.bundle.js"></script>-->
<!--<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>-->
<!--<script src="assets/js/scripts.bundle.js"></script>-->
<!--<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>-->
<!--<script src="assets/js/pages/crud/datatables/advanced/footer-callback.js"></script>-->

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>-->
<!--<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>-->


<script>
    $(document).ready(function() {
        $('#example5').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detail5",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "company_name"
                }
            ],
            columnDefs: [{
                    targets: 0,
                    render: function(data, type, row) {
                        return row.si_no;
                    }
                },
                {
                    targets: 1,
                    render: function(data, type, row) {
                        return '<a href="month_detail.php?id=' + row.id + ' &company_name=' + row.company_name + '">' + row.company_name + '</a>';
                    }
                }
            ]
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#example51').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detail50&branch=<?= $branch ?>&&username=<?= $username ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "company_name"
                }
            ],
            columnDefs: [{
                    targets: 0,
                    render: function(data, type, row) {
                        return row.si_no;
                    }
                },
                {
                    targets: 1,
                    render: function(data, type, row) {
                        return '<a href="month_detail.php?id=' + row.id + ' &company_name=' + row.company_name + '">' + row.company_name + '</a>';
                    }
                }
            ]
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#example6').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detail6",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "from_name"
                }
            ],
            columnDefs: [{
                    targets: 0,
                    render: function(data, type, row) {
                        return row.si_no;
                    }
                },
                {
                    targets: 1,
                    render: function(data, type, row) {
                        return '<a href="party_detail.php?id=' + row.id + ' &from_name=' + row.from_name + '&from_contact=' + row.from_contact + '&from_cx_id=' + row.from_cx_id + '">' + row.from_name + '</a>';
                    }
                }
            ]
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#example61').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detail60&branch=<?= $branch ?>&&username=<?= $username ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "from_name"
                }
            ],
            columnDefs: [{
                    targets: 0,
                    render: function(data, type, row) {
                        return row.si_no;
                    }
                },
                {
                    targets: 1,
                    render: function(data, type, row) {
                        return '<a href="party_detail.php?id=' + row.id + ' &from_name=' + row.from_name + '&from_contact=' + row.from_contact + '&from_cx_id=' + row.from_cx_id + '">' + row.from_name + '</a>';
                    }
                }
            ]
        });
    });
</script>
<script>
    var eventFired = function(type) {
        var n = document.querySelector('#kt_datatable5');
        n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
        n.scrollTop = n.scrollHeight;
    }
    $(document).ready(function() {
        $('#kt_datatable5').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
        });
    });
</script>
<script>
    function fnExcelReport6() {
        var tab_text = "<table border='2px'><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='8'><h1>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;SENTHIL AGENCY&ensp;&ensp;&ensp;</h1></th></tr><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='8'><h4>87/134, 1st floor ,VTC go down,GNT Road, near madhavaram rountana,</h4></th></tr><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='8'><h2>MOB NO:-+91 93801 10982,E-Mail:-reachsenthilagency@gmail.com</h2></th></tr><tr style='bgcolor='#fff82a'>";
        var textRange;

        var j = 0;
        tab = document.getElementById('kt_datatable6'); // id of table
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
    function myFunction() {
        alert("Are you want delete this entry?");
    }
</script>



<script>
    $(document).ready(function() {
        var tablebooking = $('#bookingdbbooking').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detaildbbooking",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "date_only"
                },
                {
                    "data": "booking_id"
                },
                {
                    "data": "product_name"
                },
                {
                    "data": "volume"
                },
                {
                    "data": "height"
                },
                {
                    "data": "width"
                },
                {
                    "data": "address"
                },
                {
                    "data": "pincode"
                },
                {
                    "data": "approximate_prize"
                },
                {
                    "data": "receiver_name"
                },
                {
                    "data": "receiver_address"
                },
                {
                    "data": "receiver_pincode"
                },
                {
                    "data": "status"
                }
            ],
            columnDefs: [{
                    targets: 0,
                    render: function(data, type, row) {
                        return row.si_no;
                    }
                },
                  {
                    targets: 1,
                    render: function(data, type, row) {
                        return row.date_only;
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, row) {
                        return row.booking_id;
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {
                        return row.	product_name;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {

                        return row.volume;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.height;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.width;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.address;
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, row) {
                        return row.pincode;
                    }
                },
                {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.approximate_prize;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        return row.receiver_name;
                    }
                },
                {
                    targets: 11,
                    render: function(data, type, row) {
                        return row.receiver_address;
                    }
                },
                {
                    targets: 12,
                    render: function(data, type, row) {
                        return row.receiver_pincode;
                    }
                },
                {
                    targets: 13,
                    render: function(data, type, row) {
                        return row.status;
                    }
                },
                {
                    targets: 14,
                    render: function(data, type, row) {
                        // alert(row.status)
                        return '<a href="#" id="' + row.id + '" class="btn btn-sm btn-clean btn-icon delete_userbooking" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a><div class="dropdown dropdown-inline"><a href="#" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/></g></svg></span></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">Choose an action:</li><li class="navi-item"><a href="#" id="' + row.id + '" class="undeli_review text-success action_class" status_val="Delivered">Delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unout_review btn text-success action_class" status_val="Out for delivery">Out for delivery</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unintra_review btn text-success action_class" status_val="In transit">In transit</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unrto_review btn text-success action_class" status_val="RTO">RTO</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unnotdeli_review btn text-success action_class" status_val="Not delivered">Not delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unreachdest_review btn text-success action_class" status_val="Reached destination">Reached destination</a></li></ul></div></div> <a href="#" id="' + row.id + '" class="complaintdetail btn btn-sm btn-clean btn-icon" title="Complaint" data-toggle="modal" data-target="#complaint_idbooking"><i class="fa fa-comments" aria-hidden="true"></i></a>';
                        // return '<a href="" class="btn btn-sm btn-clean btn-icon mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="btn btn-sm btn-clean btn-icon delete_userbooking" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a><div class="dropdown dropdown-inline"><a href="#" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/></g></svg></span></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">Choose an action:</li><li class="navi-item"><a href="#" id="' + row.id + '" class="undeli_review text-success action_class" status_val="Delivered">Delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unout_review btn text-success action_class" status_val="Out for delivery">Out for delivery</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unintra_review btn text-success action_class" status_val="In transit">In transit</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unrto_review btn text-success action_class" status_val="RTO">RTO</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unnotdeli_review btn text-success action_class" status_val="Not delivered">Not delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unreachdest_review btn text-success action_class" status_val="Reached destination">Reached destination</a></li></ul></div></div> <a href="#" id="' + row.id + '" class="complaintdetail btn btn-sm btn-clean btn-icon" title="Complaint" data-toggle="modal" data-target="#complaint_idbooking"><i class="fa fa-comments" aria-hidden="true"></i></a>';
                    }
                }
            ]
        });

        $("#filterbooking").on("click", function() {
            var from = $("#fromdatebooking").val();
            var to = $("#todatebooking").val();

            if (from != "" && to != "") {
                tablebooking.ajax.url("ajax_request.php?action=fetch_branch_detaildbbooking&from=" + from + '&to=' + to).load();
                tablebooking.ajax.reload();
            } else {
                tablebooking.ajax.url("ajax_request.php?action=fetch_branch_detaildbbooking").load();
                tablebooking.ajax.reload();
            }

        });
    });
    
    // on click of booking status
    $("#bookingdbbooking").on("click",".action_class", function() {
        var val=$(this).attr("status_val");
        var id=$(this).attr("id");
        // alert(id)
        $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "update_status",
                    "id": id,
                    "val":val
                },
                success: function(result_status) {
                    
                    if(result_status.status == 1)
                    {
                        Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Status Updated....', 
                        });
                        $('#bookingdbbooking').DataTable().ajax.reload();
                        // .then(function(){
                        //   window.location.href='user_dashboard.php';
                        // });
                    }else{
                        Swal.fire({
                        icon: 'success',
                        title: 'Failed',
                        text: 'Status Update Failed....', 
                        });
                        $('#bookingdbbooking').DataTable().ajax.reload();
                    }
                }
            });
    });

    var tableallbooking = $('#excelallbooking').css("display", "none").DataTable({
        "processing": true,
        "responsive": true,
        "ajax": {
            "url": "ajax_request.php?action=fetch_branch_detaildbbooking",
            "type": "POST"
        },
        "columns": [{
                "data": "si_no"
                },
                {
                    "data": "booking_id"
                },
                {
                    "data": "product_name"
                },
                {
                    "data": "volume"
                },
                {
                    "data": "height"
                },
                {
                    "data": "width"
                },
                {
                    "data": "address"
                },
                {
                    "data": "pincode"
                },
                {
                    "data": "approximate_prize"
                },
                {
                    "data": "receiver_name"
                },
                {
                    "data": "receiver_address"
                },
                {
                    "data": "receiver_pincode"
                },
                {
                    "data": "status"
                }
        ],
        columnDefs: [{
                targets: 0,
                render: function(data, type, row) {
                    return row.si_no;
                   }
                },
                {
                    targets: 1,
                    render: function(data, type, row) {
                        return row.booking_id;
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, row) {
                        return row.	product_name;
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {
                        return row.volume;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {
                        return row.height;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.width;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.address;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.pincode;
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, row) {
                        return row.approximate_prize;
                    }
                },
                {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.receiver_name;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        return row.receiver_address;
                    }
                },
                {
                    targets: 11,
                    render: function(data, type, row) {
                        return row.receiver_pincode;
                    }
                },
                {
                    targets: 12,
                    render: function(data, type, row) {
                        return row.status;
                    }
                }
        ]
    });

    $("#filterbooking").on("click", function() {
        var from = $("#fromdatebooking").val();
        var to = $("#todatebooking").val();

        if (from != "" && to != "") {
            tableallbooking.ajax.url("ajax_request.php?action=fetch_branch_detaildbbooking&from=" + from + '&to=' + to).load();
            tableallbooking.ajax.reload();
        } else {
            tableallbooking.ajax.url("ajax_request.php?action=fetch_branch_detaildbbooking").load();
            tableallbooking.ajax.reload();
        }

    });
</script>
<script>
    $(document).ready(function() {
        $('#bookingdbbooking').on('click', '.delete_userbooking', function() {
            var id = $(this).attr('id');
            Swal.fire({
                title: "Are you sure?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#1BC5BD',
                confirmButtonText: 'Yes!',
                cancelButtonText: 'Cancel.'
            }).then(function(e) {
                if (e.value) {
                    $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "delete_userdbbooking",
                            "delete_userdb_id": id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                                $('#bookingdbbooking').DataTable().ajax.reload();
                            }
                        }
                    });
                } else {

                }
            });

        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#bookingdbbooking').on('click', '.complaintdetail', function() {
            var id = $(this).attr('id');
            // alert(id)
            $('#complaintdetail_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "complaintidstatusbooking",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].Complaint_id !== "") {
                        $('#complaintstatusupdate').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8">' + result_job.data[0].Complaint_id + '</div>');
                    } else {
                        $('#complaintstatusupdate').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complaint_id" id="Complaint_id" placeholder="Enter Complaint" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="comp_id" id="submit">Submit</button></div>');
                    }
                }
            });

        });
    });
</script>
<script>
    function ExportToExcel(type, fn, dl) {
        var tab = document.getElementById('excelallbooking'); // id of table
        var wb = XLSX.utils.table_to_book(tab, {
            sheet: "Senthil_Agency"
        });
        return dl ?
            XLSX.write(wb, {
                bookType: type,
                bookSST: true,
                type: 'base64'
            }) : XLSX.writeFile(wb, fn || ('Senthil_Agency.' + (type || 'xlsx')));
    }
</script>