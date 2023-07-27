<?php
include('header.php');
include("config.php");

$username = $_SESSION['user_name'];
$branch = $_SESSION['branch'];
$userId = $_SESSION['user_id'];

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
                            Dashboard
                        </h2>
                        <!--end::Page Title-->

                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::Dashboard-->
                <!--begin::Row-->
                
                <?php
                        if ($_SESSION['role'] == "super_admin") {
                        ?>
                        
                <div class="row">
                    <div class="col-xl-6">
                        <!--begin::Mixed Widget 4-->
                        <div class="card card-custom bg-radial-gradient-danger gutter-b card-stretch">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5" style="background-color:#3699FF;">
                                <h3 class="card-title font-weight-bolder text-white">LR Progress</h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <!--<a href="#" class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                        <!--    <i class="ki ki-bold-more-hor"></i>-->
                                        <!--</a>-->
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-header pb-1">
                                                    <span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>
                                                        <span class="navi-text">Order</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-calendar-8"></i></span>
                                                        <span class="navi-text">Event</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-graph-1"></i></span>
                                                        <span class="navi-text">Report</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-rocket-1"></i></span>
                                                        <span class="navi-text">Post</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-writing"></i></span>
                                                        <span class="navi-text">File</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column p-0">
                                <!--begin::Chart-->
                                <div id="kt_mixed_widget_4_chart"></div>
                                <!--end::Chart-->

                                <!--begin::Stats-->
                                <div class="card-spacer bg-white card-rounded flex-grow-1">
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            $sql1 = "SELECT COUNT(id) as base_count FROM `base`where  consignment_type !='month' AND customer_type !='party' ";
                                            $result1 = mysqli_query($conn, $sql1);
                                            $rec1 = mysqli_fetch_assoc($result1);
$all = $rec1['base_count'];
                                            
                                            $deliver_query = "SELECT COUNT(id) as base_count FROM `base` where  consignment_type !='month' AND customer_type !='party' AND  delivery_status!='delivered'";
                                            $deliver_result = mysqli_query($conn, $deliver_query);
                                            $deliver_rec = mysqli_fetch_assoc($deliver_result);
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">All LR </div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $rec1['base_count']; ?></div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <div class="font-size-sm text-muted font-weight-bold">In-transit </div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $deliver_rec['base_count']; ?></div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            $sql2 = "SELECT COUNT(id) as base_count FROM `base` where  consignment_type !='month' AND customer_type !='party' AND delivery_status='delivered'";
                                            $result2 = mysqli_query($conn, $sql2);
                                            $rec2 = mysqli_fetch_assoc($result2);

                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Delivered</div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $rec2['base_count']; ?></div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <?php
                                            $sql3 = "SELECT COUNT(id) as base_count FROM `base` where consignment_type !='month' AND customer_type !='party' AND ( balance='0' || consignment_type = 'paid' )";
                                            $result3 = mysqli_query($conn, $sql3);
                                            $rec3 = mysqli_fetch_assoc($result3);
$paid = $rec3['base_count'];
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Paid </div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $rec3['base_count']; ?></div>
                                        </div>
                                    </div>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            $sql4 = "SELECT COUNT(id) as base_count FROM `base` where customer_type !='party' AND consignment_type !='month' AND 'paid' || balance !='0'";
                                            $result4 = mysqli_query($conn, $sql4);
                                            $rec4 = mysqli_fetch_assoc($result4);

                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Unpaid </div>
                                            <!--<div class="font-size-h4 font-weight-bolder"><?php echo $rec4['base_count']; ?></div>-->
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $all - $paid ?></div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <?php
                                            $sql5 = "SELECT COUNT(id) as base_count FROM `base` where consignment_type ='month' ";
                                            $result5 = mysqli_query($conn, $sql5);
                                            $rec5 = mysqli_fetch_assoc($result5);

                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Month Count</div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $rec5['base_count']; ?></div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Stats-->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <!--begin::Mixed Widget 4-->
                        <div class="card card-custom bg-radial-gradient-danger gutter-b card-stretch">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title font-weight-bolder text-white">Expentiture Progress</h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <!--<a href="#" class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                        <!--    <i class="ki ki-bold-more-hor"></i>-->
                                        <!--</a>-->
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-header pb-1">
                                                    <span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>
                                                        <span class="navi-text">Order</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-calendar-8"></i></span>
                                                        <span class="navi-text">Event</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-graph-1"></i></span>
                                                        <span class="navi-text">Report</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-rocket-1"></i></span>
                                                        <span class="navi-text">Post</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-writing"></i></span>
                                                        <span class="navi-text">File</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column p-0">
                                <!--begin::Chart-->
                                <div id="kt_mixed_widget_4_chart"></div>
                                <!--end::Chart-->

                                <!--begin::Stats-->
                                <div class="card-spacer bg-white card-rounded flex-grow-1">
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            $today_date = date('Y-m-d');

                                            $sql = "select sum(amountSpent) as expenses_amount from expenditure where category='Expenses' and amountSpent!=0 and createdAt LIKE '$today_date%'";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Expenses</div>
                                            <div class="font-size-h4 font-weight-bolder"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                    <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                                </svg>
                                                <?php
                                                if ($rec['expenses_amount'] == '') {
                                                    echo '0';
                                                } else {
                                                    echo $rec['expenses_amount'];
                                                }

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <?php
                                            $today_date = date('Y-m-d');

                                            $sql = "select sum(amountPaid) as salary_amount from expenditure where category='Salary' and amountPaid!=0 and createdAt LIKE '$today_date%'";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Salary</div>
                                            <div class="font-size-h4 font-weight-bolder"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                    <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                                </svg>
                                                <?php
                                                if ($rec['salary_amount'] == '') {
                                                    echo '0';
                                                } else {
                                                    echo $rec['salary_amount'];
                                                }

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            $today_date = date('Y-m-d');

                                            $sql = "select sum(depositsAmount) as deposite_amount from expenditure where category='Deposited' and depositsAmount!=0 and createdAt LIKE '$today_date%'";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Deposited</div>
                                            <div class="font-size-h4 font-weight-bolder"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                    <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                                </svg>
                                                <?php
                                                if ($rec['deposite_amount'] == '') {
                                                    echo '0';
                                                } else {
                                                    echo $rec['deposite_amount'];
                                                }

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <?php
                                            $today_date = date('Y-m-d');

                                            $sql = "select sum(pettyCashAmount) as pettycash_amount from expenditure where expenditure='PettyCash' and pettyCashAmount!=0 and createdAt LIKE '$today_date%'";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Petty Cash</div>
                                            <div class="font-size-h4 font-weight-bolder"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                    <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                                </svg>
                                                <?php
                                                if ($rec['pettycash_amount'] == '') {
                                                    echo '0';
                                                } else {
                                                    echo $rec['pettycash_amount'];
                                                }

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 4-->
                    </div>
                    <div class="col-xl-4">
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                    <span class="symbol symbol-circle symbol-50 symbol-light-danger mr-2">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-xl svg-icon-danger">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </span>
                                    </span>
                                    <div class="d-flex flex-column text-right">
                                        <?php
                                        $today_date = date('Y-m-d');
                                        $sql = "SELECT sum(credit) as credited_amount FROM transaction_history where created_at like '$today_date%'";
                                        $result = mysqli_query($conn, $sql);
                                        $rec = mysqli_fetch_assoc($result);
                                        ?>
                                        <span class="text-dark-75 font-weight-bolder font-size-h3"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                            </svg>
                                            <?php
                                            if ($rec['credited_amount'] == '') {
                                                echo '0';
                                            } else {
                                                echo $rec['credited_amount'];
                                            }

                                            ?>
                                        </span>
                                        <span class="text-muted font-weight-bold mt-2">Today Income</span>
                                    </div>
                                </div>
                                <div id="kt_stats_widget_11_chart" class="card-rounded-bottom" data-color="danger"></div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 11-->
                    </div>
                    <div class="col-xl-4">
                        <!--begin::Stats Widget 10-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                    <span class="symbol symbol-circle symbol-50 symbol-light-info mr-2">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-xl svg-icon-info">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </span>
                                    </span>
                                    <div class="d-flex flex-column text-right">
                                        <?php
                                        $sql = "SELECT * FROM transaction_history ORDER BY history_id DESC LIMIT 1";
                                        $result = mysqli_query($conn, $sql);
                                        $rec = mysqli_fetch_assoc($result);
                                        ?>
                                        <span class="text-dark-75 font-weight-bolder font-size-h3"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                            </svg><?php echo $rec['balance']; ?></span>
                                        <span class="text-muted font-weight-bold mt-2">Cash In Hand</span>
                                    </div>
                                </div>
                                <div id="kt_stats_widget_10_chart" class="card-rounded-bottom" data-color="info"></div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 10-->
                    </div>
                    <div class="col-xl-4">
                        <!--begin::Stats Widget 10-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                    <span class="symbol symbol-circle symbol-50 symbol-light-info mr-2">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-xl svg-icon-info">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </span>
                                    </span>
                                    <div class="d-flex flex-column text-right">
                                        <?php
                                        $today_date = date('Y-m-d');
                                        $sql = "SELECT sum(debit) as total_exp FROM transaction_history where created_at like '$today_date%'";
                                        $result = mysqli_query($conn, $sql);
                                        $rec = mysqli_fetch_assoc($result);
                                        ?>
                                        <span class="text-dark-75 font-weight-bolder font-size-h3"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                            </svg>
                                            <?php
                                            echo $rec['total_exp'];
                                            ?>
                                        </span>
                                        <span class="text-muted font-weight-bold mt-2">Total Expenditure Cost</span>
                                    </div>
                                </div>
                                <div id="kt_stats_widget_10_chart" class="card-rounded-bottom" data-color="info"></div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 10-->
                    </div>
                </div>
                
                 <?php
                        } else if ($_SESSION['role'] == "admin") {
                        ?>
                        
                        <div class="row">
                    <div class="col-xl-6">
                        <!--begin::Mixed Widget 4-->
                        <div class="card card-custom bg-radial-gradient-danger gutter-b card-stretch">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5" style="background-color:#3699FF;">
                                <h3 class="card-title font-weight-bolder text-white">LR Progress</h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <!--<a href="#" class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                        <!--    <i class="ki ki-bold-more-hor"></i>-->
                                        <!--</a>-->
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-header pb-1">
                                                    <span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>
                                                        <span class="navi-text">Order</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-calendar-8"></i></span>
                                                        <span class="navi-text">Event</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-graph-1"></i></span>
                                                        <span class="navi-text">Report</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-rocket-1"></i></span>
                                                        <span class="navi-text">Post</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-writing"></i></span>
                                                        <span class="navi-text">File</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column p-0">
                                <!--begin::Chart-->
                                <div id="kt_mixed_widget_4_chart"></div>
                                <!--end::Chart-->

                                <!--begin::Stats-->
                                <div class="card-spacer bg-white card-rounded flex-grow-1">
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            $sql1 = "SELECT COUNT(id) as base_count FROM `base`where  consignment_type !='month' AND customer_type !='party' ";
                                            $result1 = mysqli_query($conn, $sql1);
                                            $rec1 = mysqli_fetch_assoc($result1);

                                            $deliver_query = "SELECT COUNT(id) as base_count FROM `base` where  consignment_type !='month' AND customer_type !='party' AND  delivery_status!='delivered'";
                                            $deliver_result = mysqli_query($conn, $deliver_query);
                                            $deliver_rec = mysqli_fetch_assoc($deliver_result);
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">All LR </div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $rec1['base_count']; ?></div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <div class="font-size-sm text-muted font-weight-bold">In-transit </div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $deliver_rec['base_count']; ?></div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            $sql2 = "SELECT COUNT(id) as base_count FROM `base` where  consignment_type !='month' AND customer_type !='party' AND delivery_status='delivered'";
                                            $result2 = mysqli_query($conn, $sql2);
                                            $rec2 = mysqli_fetch_assoc($result2);

                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Delivered</div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $rec2['base_count']; ?></div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <?php
                                            $sql3 = "SELECT COUNT(id) as base_count FROM `base` where  consignment_type !='month' AND customer_type !='party' AND (consignment_type='paid' || balance='0')";
                                            $result3 = mysqli_query($conn, $sql3);
                                            $rec3 = mysqli_fetch_assoc($result3);

                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Paid </div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $rec3['base_count']; ?></div>
                                        </div>
                                    </div>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            $sql4 = "SELECT COUNT(id) as base_count FROM `base` where consignment_type !='month' AND customer_type !='party' AND (consignment_type!='paid' || balance!=0)";
                                            $result4 = mysqli_query($conn, $sql4);
                                            $rec4 = mysqli_fetch_assoc($result4);

                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Unpaid </div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $rec4['base_count']; ?></div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <?php
                                            $sql5 = "SELECT COUNT(id) as base_count FROM `base` where consignment_type='month'";
                                            $result5 = mysqli_query($conn, $sql5);
                                            $rec5 = mysqli_fetch_assoc($result5);

                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Month Count</div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $rec5['base_count']; ?></div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Stats-->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <!--begin::Mixed Widget 4-->
                        <div class="card card-custom bg-radial-gradient-danger gutter-b card-stretch">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title font-weight-bolder text-white">Expentiture Progress</h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <!--<a href="#" class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                        <!--    <i class="ki ki-bold-more-hor"></i>-->
                                        <!--</a>-->
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-header pb-1">
                                                    <span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>
                                                        <span class="navi-text">Order</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-calendar-8"></i></span>
                                                        <span class="navi-text">Event</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-graph-1"></i></span>
                                                        <span class="navi-text">Report</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-rocket-1"></i></span>
                                                        <span class="navi-text">Post</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-writing"></i></span>
                                                        <span class="navi-text">File</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column p-0">
                                <!--begin::Chart-->
                                <div id="kt_mixed_widget_4_chart"></div>
                                <!--end::Chart-->

                                <!--begin::Stats-->
                                <div class="card-spacer bg-white card-rounded flex-grow-1">
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            $today_date = date('Y-m-d');

                                            $sql = "select sum(amountSpent) as expenses_amount from expenditure where category='Expenses' and amountSpent!=0 and createdAt LIKE '$today_date%'";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Expenses</div>
                                            <div class="font-size-h4 font-weight-bolder"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                    <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                                </svg>
                                                <?php
                                                if ($rec['expenses_amount'] == '') {
                                                    echo '0';
                                                } else {
                                                    echo $rec['expenses_amount'];
                                                }

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <?php
                                            $today_date = date('Y-m-d');

                                            $sql = "select sum(amountPaid) as salary_amount from expenditure where category='Salary' and amountPaid!=0 and createdAt LIKE '$today_date%'";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Salary</div>
                                            <div class="font-size-h4 font-weight-bolder"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                    <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                                </svg>
                                                <?php
                                                if ($rec['salary_amount'] == '') {
                                                    echo '0';
                                                } else {
                                                    echo $rec['salary_amount'];
                                                }

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            $today_date = date('Y-m-d');

                                            $sql = "select sum(depositsAmount) as deposite_amount from expenditure where category='Deposited' and depositsAmount!=0 and createdAt LIKE '$today_date%'";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Deposited</div>
                                            <div class="font-size-h4 font-weight-bolder"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                    <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                                </svg>
                                                <?php
                                                if ($rec['deposite_amount'] == '') {
                                                    echo '0';
                                                } else {
                                                    echo $rec['deposite_amount'];
                                                }

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <?php
                                            $today_date = date('Y-m-d');

                                            $sql = "select sum(pettyCashAmount) as pettycash_amount from expenditure where expenditure='PettyCash' and pettyCashAmount!=0 and createdAt LIKE '$today_date%'";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Petty Cash</div>
                                            <div class="font-size-h4 font-weight-bolder"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                    <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                                </svg>
                                                <?php
                                                if ($rec['pettycash_amount'] == '') {
                                                    echo '0';
                                                } else {
                                                    echo $rec['pettycash_amount'];
                                                }

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 4-->
                    </div>
                    <div class="col-xl-4">
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                    <span class="symbol symbol-circle symbol-50 symbol-light-danger mr-2">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-xl svg-icon-danger">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </span>
                                    </span>
                                    <div class="d-flex flex-column text-right">
                                        <?php
                                        $today_date = date('Y-m-d');
                                        $sql = "SELECT sum(credit) as credited_amount FROM transaction_history where created_at like '$today_date%'";
                                        $result = mysqli_query($conn, $sql);
                                        $rec = mysqli_fetch_assoc($result);
                                        ?>
                                        <span class="text-dark-75 font-weight-bolder font-size-h3"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                            </svg>
                                            <?php
                                            if ($rec['credited_amount'] == '') {
                                                echo '0';
                                            } else {
                                                echo $rec['credited_amount'];
                                            }

                                            ?>
                                        </span>
                                        <span class="text-muted font-weight-bold mt-2">Today Income</span>
                                    </div>
                                </div>
                                <div id="kt_stats_widget_11_chart" class="card-rounded-bottom" data-color="danger"></div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 11-->
                    </div>
                    <div class="col-xl-4">
                        <!--begin::Stats Widget 10-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                    <span class="symbol symbol-circle symbol-50 symbol-light-info mr-2">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-xl svg-icon-info">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </span>
                                    </span>
                                    <div class="d-flex flex-column text-right">
                                        <?php
                                        // $sql = "SELECT * FROM transaction_history ORDER BY history_id DESC LIMIT 1";
                                         $sql = "SELECT * FROM transaction_history WHERE branch = '$branch'  ORDER BY history_id DESC LIMIT 1";
                                        $result = mysqli_query($conn, $sql);
                                        $rec = mysqli_fetch_assoc($result);
                                        ?>
                                        <span class="text-dark-75 font-weight-bolder font-size-h3"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                            </svg><?php echo $rec['balance']; ?></span>
                                        <span class="text-muted font-weight-bold mt-2">Cash In Hand</span>
                                    </div>
                                </div>
                                <div id="kt_stats_widget_10_chart" class="card-rounded-bottom" data-color="info"></div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 10-->
                    </div>
                    <div class="col-xl-4">
                        <!--begin::Stats Widget 10-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                    <span class="symbol symbol-circle symbol-50 symbol-light-info mr-2">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-xl svg-icon-info">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </span>
                                    </span>
                                    <div class="d-flex flex-column text-right">
                                        <?php
                                        $today_date = date('Y-m-d');
                                        $sql = "SELECT sum(debit) as total_exp FROM transaction_history where created_at like '$today_date%'";
                                        $result = mysqli_query($conn, $sql);
                                        $rec = mysqli_fetch_assoc($result);
                                        ?>
                                        <span class="text-dark-75 font-weight-bolder font-size-h3"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                            </svg>
                                            <?php
                                            echo $rec['total_exp'];
                                            ?>
                                        </span>
                                        <span class="text-muted font-weight-bold mt-2">Total Expenditure Cost</span>
                                    </div>
                                </div>
                                <div id="kt_stats_widget_10_chart" class="card-rounded-bottom" data-color="info"></div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 10-->
                    </div>
                </div>
                
                        <?php
                        } else if ($_SESSION['role'] == "user") {
                        ?>
                        
                        <div class="row">
                     <div class="col-xl-6">
                        <!--begin::Mixed Widget 4-->
                        <div class="card card-custom bg-radial-gradient-danger gutter-b card-stretch">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5" style="background-color:#3699FF;">
                                <h3 class="card-title font-weight-bolder text-white">LR Progress</h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <!--<a href="#" class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                        <!--    <i class="ki ki-bold-more-hor"></i>-->
                                        <!--</a>-->
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-header pb-1">
                                                    <span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>
                                                        <span class="navi-text">Order</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-calendar-8"></i></span>
                                                        <span class="navi-text">Event</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-graph-1"></i></span>
                                                        <span class="navi-text">Report</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-rocket-1"></i></span>
                                                        <span class="navi-text">Post</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-writing"></i></span>
                                                        <span class="navi-text">File</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column p-0">
                                <!--begin::Chart-->
                                <div id="kt_mixed_widget_4_chart"></div>
                                <!--end::Chart-->

                                <!--begin::Stats-->
                                <div class="card-spacer bg-white card-rounded flex-grow-1">
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            $sql1 = "SELECT COUNT(id) as base_count FROM `base`where  consignment_type !='month' AND customer_type !='party' AND branch = '$branch' && username = '$username'";
                                            $result1 = mysqli_query($conn, $sql1);
                                            $rec1 = mysqli_fetch_assoc($result1);
$all = $rec1['base_count'];
                                            
                                            $deliver_query = "SELECT COUNT(id) as base_count FROM `base` where  consignment_type !='month' AND customer_type !='party' AND delivery_status!='delivered' AND branch = '$branch' && username = '$username'";
                                            $deliver_result = mysqli_query($conn, $deliver_query);
                                            $deliver_rec = mysqli_fetch_assoc($deliver_result);
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">All LR </div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $rec1['base_count']; ?></div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <div class="font-size-sm text-muted font-weight-bold">In-transit </div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $deliver_rec['base_count']; ?></div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            $sql2 = "SELECT COUNT(id) as base_count FROM `base` where  consignment_type !='month' AND customer_type !='party' AND delivery_status='delivered' AND branch = '$branch' && username = '$username'";
                                            $result2 = mysqli_query($conn, $sql2);
                                            $rec2 = mysqli_fetch_assoc($result2);

                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Delivered</div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $rec2['base_count']; ?></div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <?php
                                            $sql3 = "SELECT COUNT(id) as base_count FROM `base` where consignment_type !='month' AND customer_type !='party' AND ( balance='0' || consignment_type = 'paid' ) AND branch = '$branch' && username = '$username'";
                                            $result3 = mysqli_query($conn, $sql3);
                                            $rec3 = mysqli_fetch_assoc($result3);
$paid = $rec3['base_count'];
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Paid </div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $rec3['base_count']; ?></div>
                                        </div>
                                    </div>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            $sql4 = "SELECT COUNT(id) as base_count FROM `base` where customer_type !='party' AND consignment_type !='month' AND 'paid' || balance !='0' AND branch = '$branch' && username = '$username'";
                                            $result4 = mysqli_query($conn, $sql4);
                                            $rec4 = mysqli_fetch_assoc($result4);

                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Unpaid </div>
                                            <!--<div class="font-size-h4 font-weight-bolder"><?php echo $rec4['base_count']; ?></div>-->
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $all - $paid ?></div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <?php
                                            $sql5 = "SELECT COUNT(id) as base_count FROM `base` where consignment_type ='month' AND branch = '$branch' && username = '$username'";
                                            $result5 = mysqli_query($conn, $sql5);
                                            $rec5 = mysqli_fetch_assoc($result5);

                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Month Count</div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $rec5['base_count']; ?></div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Stats-->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <!--begin::Mixed Widget 4-->
                        <div class="card card-custom bg-radial-gradient-danger gutter-b card-stretch">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title font-weight-bolder text-white">Expentiture Progress</h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <!--<a href="#" class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                        <!--    <i class="ki ki-bold-more-hor"></i>-->
                                        <!--</a>-->
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-header pb-1">
                                                    <span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>
                                                        <span class="navi-text">Order</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-calendar-8"></i></span>
                                                        <span class="navi-text">Event</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-graph-1"></i></span>
                                                        <span class="navi-text">Report</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-rocket-1"></i></span>
                                                        <span class="navi-text">Post</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon"><i class="flaticon2-writing"></i></span>
                                                        <span class="navi-text">File</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column p-0">
                                <!--begin::Chart-->
                                <div id="kt_mixed_widget_4_chart"></div>
                                <!--end::Chart-->

                                <!--begin::Stats-->
                                <div class="card-spacer bg-white card-rounded flex-grow-1">
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            $today_date = date('Y-m-d');

                                            $sql = "select sum(amountSpent) as expenses_amount from expenditure where category='Expenses' and amountSpent!=0 and createdAt LIKE '$today_date%'";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Expenses</div>
                                            <div class="font-size-h4 font-weight-bolder"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                    <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                                </svg>
                                                <?php
                                                if ($rec['expenses_amount'] == '') {
                                                    echo '0';
                                                } else {
                                                    echo $rec['expenses_amount'];
                                                }

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <?php
                                            $today_date = date('Y-m-d');

                                            $sql = "select sum(amountPaid) as salary_amount from expenditure where category='Salary' and amountPaid!=0 and createdAt LIKE '$today_date%'";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Salary</div>
                                            <div class="font-size-h4 font-weight-bolder"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                    <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                                </svg>
                                                <?php
                                                if ($rec['salary_amount'] == '') {
                                                    echo '0';
                                                } else {
                                                    echo $rec['salary_amount'];
                                                }

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            $today_date = date('Y-m-d');

                                            $sql = "select sum(depositsAmount) as deposite_amount from expenditure where category='Deposited' and depositsAmount!=0 and createdAt LIKE '$today_date%'";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Deposited</div>
                                            <div class="font-size-h4 font-weight-bolder"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                    <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                                </svg>
                                                <?php
                                                if ($rec['deposite_amount'] == '') {
                                                    echo '0';
                                                } else {
                                                    echo $rec['deposite_amount'];
                                                }

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <?php
                                            $today_date = date('Y-m-d');

                                            $sql = "select sum(pettyCashAmount) as pettycash_amount from expenditure where expenditure='PettyCash' and pettyCashAmount!=0 and createdAt LIKE '$today_date%'";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Petty Cash</div>
                                            <div class="font-size-h4 font-weight-bolder"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                    <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                                </svg>
                                                <?php
                                                if ($rec['pettycash_amount'] == '') {
                                                    echo '0';
                                                } else {
                                                    echo $rec['pettycash_amount'];
                                                }

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 4-->
                    </div>
                    <div class="col-xl-4">
                        <!--begin::Stats Widget 11-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                    <span class="symbol symbol-circle symbol-50 symbol-light-danger mr-2">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-xl svg-icon-danger">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </span>
                                    </span>
                                    <div class="d-flex flex-column text-right">
                                        <?php
                                        $today_date = date('Y-m-d');
                                        $sql = "SELECT sum(credit) as credited_amount FROM transaction_history where created_at like '$today_date%'";
                                        $result = mysqli_query($conn, $sql);
                                        $rec = mysqli_fetch_assoc($result);
                                        ?>
                                        <span class="text-dark-75 font-weight-bolder font-size-h3"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                            </svg>
                                            <?php
                                            if ($rec['credited_amount'] == '') {
                                                echo '0';
                                            } else {
                                                echo $rec['credited_amount'];
                                            }

                                            ?>
                                        </span>
                                        <span class="text-muted font-weight-bold mt-2">Today Income</span>
                                    </div>
                                </div>
                                <div id="kt_stats_widget_11_chart" class="card-rounded-bottom" data-color="danger"></div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 11-->
                    </div>
                    <div class="col-xl-4">
                        <!--begin::Stats Widget 10-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                    <span class="symbol symbol-circle symbol-50 symbol-light-info mr-2">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-xl svg-icon-info">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </span>
                                    </span>
                                    <div class="d-flex flex-column text-right">
                                        <?php
                                        // $sql = "SELECT * FROM transaction_history ORDER BY history_id DESC LIMIT 1";
                                        $sql = "SELECT * FROM transaction_history WHERE branch_name = '$branch' && username = '$username' ORDER BY history_id DESC LIMIT 1";
                                        $result = mysqli_query($conn, $sql);
                                        $rec = mysqli_fetch_assoc($result);
                                        ?>
                                        <span class="text-dark-75 font-weight-bolder font-size-h3"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                            </svg><?php echo $rec['balance']; ?></span>
                                        <span class="text-muted font-weight-bold mt-2">Cash In Hand</span>
                                    </div>
                                </div>
                                <div id="kt_stats_widget_10_chart" class="card-rounded-bottom" data-color="info"></div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 10-->
                    </div>
                    <div class="col-xl-4">
                        <!--begin::Stats Widget 10-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                    <span class="symbol symbol-circle symbol-50 symbol-light-info mr-2">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-xl svg-icon-info">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </span>
                                    </span>
                                    <div class="d-flex flex-column text-right">
                                        <?php
                                        $today_date = date('Y-m-d');
                                        $sql = "SELECT sum(debit) as total_exp FROM transaction_history where created_at like '$today_date%'";
                                        $result = mysqli_query($conn, $sql);
                                        $rec = mysqli_fetch_assoc($result);
                                        ?>
                                        <span class="text-dark-75 font-weight-bolder font-size-h3"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                            </svg>
                                            <?php
                                            echo $rec['total_exp'];
                                            ?>
                                        </span>
                                        <span class="text-muted font-weight-bold mt-2">Total Expenditure Cost</span>
                                    </div>
                                </div>
                                <div id="kt_stats_widget_10_chart" class="card-rounded-bottom" data-color="info"></div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 10-->
                    </div>
                </div>
                
                        <?php 
                        }
                        ?>
                <!--end::Row-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

    <?php
    include('footer.php');
    ?>