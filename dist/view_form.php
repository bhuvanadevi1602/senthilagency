<?php
include("config.php");
require('header.php');

session_start();

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

if ($req == "delete") {
    $delete = "DELETE FROM `postjob` WHERE id=:id";
    $delete_sql = $connect->prepare($delete);
    $delete_sql->execute(array(':id' => $id));
    header("location:dashboard_job_post_view.php");
}

?>

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
                            View Details
                        </h2>
                        <!--end::Page Title-->

                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">
                                    KTDatatable </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">
                                    View Detail </a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->

                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <!--begin::Button-->
                    <a href="#" class="btn btn-fixed-height btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
                        <span class="svg-icon svg-icon-success svg-icon-lg">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span> New Member
                    </a>
                    <!--end::Button-->

                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                        <a href="#" class="btn btn-fixed-height btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="svg-icon svg-icon-success svg-icon-lg">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1" />
                                        <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span> New Report
                        </a>
                        <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                            <!--begin::Navigation-->
                            <ul class="navi navi-hover">
                                <li class="navi-header font-weight-bold py-4">
                                    <span class="font-size-lg">Choose Label:</span>
                                    <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                                </li>
                                <li class="navi-separator mb-3 opacity-70"></li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <span class="navi-text">
                                            <span class="label label-xl label-inline label-light-success">Customer</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <span class="navi-text">
                                            <span class="label label-xl label-inline label-light-danger">Partner</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <span class="navi-text">
                                            <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <span class="navi-text">
                                            <span class="label label-xl label-inline label-light-primary">Member</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <span class="navi-text">
                                            <span class="label label-xl label-inline label-light-dark">Staff</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="navi-separator mt-3 opacity-70"></li>
                                <li class="navi-footer py-4">
                                    <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                        <i class="ki ki-plus icon-sm"></i>
                                        Add new
                                    </a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                    </div>
                    <!--end::Dropdown-->

                    <!--begin::Button-->
                    <a href="#" class="btn btn-success btn-icon font-weight-bold" data-toggle="modal" data-target="#kt_chat_modal">
                        <span class="svg-icon svg-icon-lg">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
                                    <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span> </a>
                    <!--end::Button-->
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->

        <!--begin::Entry-->
        <!--end::Entry-->
    </div>
    <!--end::Content-->

    <div class="invoice-table table-responsive">
        <div class="row">
            <div class="col-12">
                <?php
                echo $sql = "SELECT * FROM base";
                $result = $conn->query($sql);
                $count = 0;
                while ($row = $result->fetch_assoc()) {
                ?>
                    <input type="hidden" name="id" value="<?= $id ?>">

                    <div class="card">
                        <div class="card-body  met-pro-bg">
                            <div class="met-profile">
                                <div class="row">
                                    <table class="table table=responsive">
                                        <tr>
                                            <th>Booking type:</th>
                                            <td>
                                                <?= $row['booking_type'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>LR No:</th>
                                            <td>
                                                <?= $row['lr_no'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Railway no:</th>
                                            <td>
                                                <?= $row['railway_no'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Consignment Type:</th>
                                            <td>
                                                <?= $row['consignment_type'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Invoice Type:</th>
                                            <td>
                                                <?= $row['invoice_type'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Mode of Transport:</th>
                                            <td>
                                                <?= $row['mode_transport'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Train Type:</th>
                                            <td>
                                                <?= $row['train_type'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>RR No:</th>
                                            <td>
                                                <?= $row['RR_No'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Train No:</th>
                                            <td>
                                                <?= $row['train_No'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Flight No:</th>
                                            <td>
                                                <?= $row['flight_no'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Internal Info:</th>
                                            <td>
                                                <?= $row['internal_info'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Eway Bill No:</th>
                                            <td>
                                                <?= $row['eway_bill'] ?>
                                            </td>
                                        </tr><tr>
                                            <th>No of Stop</th>
                                            <td>
                                                <?= $row['no_stop'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Destination:</th>
                                            <td>
                                                <?= $row['destination'] ?>
                                            </td>
                                        </tr><tr>
                                            <th>Material Name:</th>
                                            <td>
                                                <?= $row['material_name'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Quantity in KG:</th>
                                            <td>
                                                <?= $row['quantity_kg'] ?>
                                            </td>
                                        </tr><tr>
                                            <th>Quantity in Nos:</th>
                                            <td>
                                                <?= $row['quantity_nos'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Rate per unit:</th>
                                            <td>
                                                <?= $row['rate'] ?>
                                            </td>
                                        </tr><tr>
                                            <th>Docket Charge:</th>
                                            <td>
                                                <?= $row['docket_charge'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>CD Charge:</th>
                                            <td>
                                                <?= $row['cd_charge'] ?>
                                            </td>
                                        </tr><tr>
                                            <th>GST:</th>
                                            <td>
                                                <?= $row['gst'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>CGST%:</th>
                                            <td>
                                                <?= $row['cgst'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>SGST%:</th>
                                            <td>
                                                <?= $row['sgst'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>IGST%:</th>
                                            <td>
                                                <?= $row['igst'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Agent's Commission:</th>
                                            <td>
                                                <?= $row['agent_commission'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Name:</th>
                                            <td>
                                                <?= $row['to_name'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td>
                                                <?= $row['to_address'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Contact No:</th>
                                            <td>
                                                <?= $row['to_contact'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Name:</th>
                                            <td>
                                                <?= $row['from_name'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td>
                                                <?= $row['from_address'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Contact No:</th>
                                            <td>
                                                <?= $row['from_contact'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Agent:</th>
                                            <td>
                                                <?= $row['agent'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Name:</th>
                                            <td>
                                                <?= $row['agent_name'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Contact No:</th>
                                            <td>
                                                <?= $row['agent_contact'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>City:</th>
                                            <td>
                                                <?= $row['agent_city'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Delivery Message:</th>
                                            <td>
                                                <?= $row['delivery_message'] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!--end row-->
                            </div>
                            <!--end f_profile-->
                        </div>
                        <!--end card-body-->
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include("footer1.php");
?>
</div>

<!--begin::Footer-->
<!--doc: add "bg-white" class to have footer with solod background color-->
<div class="footer py-4 d-flex flex-lg-column " id="kt_footer">
    <!--begin::Container-->
    <div class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted font-weight-bold mr-2">2022&copy;</span>
            <a href="#" target="_blank" class="text-dark-75 text-hover-primary">APS</a>
        </div>
        <!--end::Copyright-->

        <!--begin::Nav-->
        <div class="nav nav-dark order-1 order-md-2">
            <a href="#" class="nav-link pr-3 pl-0">About</a>
            <a href="#" class="nav-link px-3">Team</a>
            <a href="#" class="nav-link pl-3 pr-0">Contact</a>
        </div>
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
<script>
    function checkDelete() {
        return confirm('Are you sure you want to delete?');
    }
</script>
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
<!--<script src="assets/js/pages/crud/ktdatatable/base/data-local.js"></script>-->
<!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>