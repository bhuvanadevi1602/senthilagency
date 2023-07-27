<?php
session_start();
include("config.php");
include('header.php');
$username = $_SESSION['user_name'];
$branch = $_SESSION['branch'];
$userId = $_SESSION['user_id'];
$active = $_SESSION['name'];
$active_state = $_SESSION['active_state'];
if($username!='' && $userId!='' || $branch!=''  || $active_state!=''){

// echo "<script>alert('".$_SESSION['role']."')</script>";
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
                                        $today_date = date('Y-m-d');

                     if($_SESSION['role'] == "super_admin")
                                            {
                                                  $lr_sql = "select count(id) as lr_count from base where createdAt LIKE '$today_date%'";
                                                $lr_result = mysqli_query($conn, $lr_sql);
                                                $lr_rec = mysqli_fetch_assoc($lr_result);
                                                $all = isset($lr_rec['base_count'])?$lr_rec['base_count']:0;
                                               
                                                $deliver_query = "SELECT count(id) as undeliver_count from base where consignment_type !='month' AND customer_type !='party' AND delivery_status!='delivered' and  createdAt LIKE '$today_date%'";
                                                $undeliver_result = mysqli_query($conn, $deliver_query);
                                                $undeliver_rec = mysqli_fetch_assoc($undeliver_result);
                                                
                                            }
                                            else if($_SESSION['role'] == "user")
                                            {
                                                $today_date = date('Y-m-d');

                                                $lr_sql = "select count(id) as lr_count from base where createdAt LIKE '$today_date%' and user_id=$userId";
                                                $lr_result = mysqli_query($conn, $lr_sql);
                                                $lr_rec = mysqli_fetch_assoc($lr_result);
                                                $all = isset($lr_rec['base_count'])?$lr_rec['base_count']:0;
                                                
                                                $deliver_query = "SELECT count(id) as undeliver_count from base where consignment_type !='month' AND customer_type !='party' AND delivery_status!='delivered' and  createdAt LIKE '$today_date%' and user_id=$userId";
                                                $undeliver_result = mysqli_query($conn, $deliver_query);
                                                $undeliver_rec = mysqli_fetch_assoc($undeliver_result);
                                            }
                                            
                                             ?>
                                            <div class="font-size-sm text-muted font-weight-bold">All LR </div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo isset($lr_rec['lr_count'])?$lr_rec['lr_count']:0; ?></div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <div class="font-size-sm text-muted font-weight-bold">In-transit </div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo isset($undeliver_rec['undeliver_count'])?$undeliver_rec['undeliver_count']:0; ?></div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            if($_SESSION['role'] == "super_admin")
                                            {
                                                $today_date = date('Y-m-d');
                                                
                                                $deliver_query = "SELECT count(id) as deliver_count from base where consignment_type !='month' AND customer_type !='party' AND delivery_status='delivered' and  createdAt LIKE '$today_date%'";
                                                $deliver_result = mysqli_query($conn, $deliver_query);
                                                $deliver_rec = mysqli_fetch_assoc($deliver_result);
                                                
                                            }
                                            else if($_SESSION['role'] == "user")
                                            {
                                                $today_date = date('Y-m-d');
                                                
                                                $deliver_query = "SELECT count(id) as deliver_count from base where consignment_type !='month' AND customer_type !='party' AND delivery_status='delivered' and  createdAt LIKE '$today_date%' and user_id=$userId";
                                                $deliver_result = mysqli_query($conn, $deliver_query);
                                                $deliver_rec = mysqli_fetch_assoc($deliver_result);
                                                // echo "<script>alert('".$deliver_rec['deliver_count']."')</script>";
                                            }
                                            
                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Delivered</div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo isset($deliver_rec['deliver_count'])?$deliver_rec['deliver_count']:0; ?></div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <?php
                                            if($_SESSION['role']=="super_admin")
                                             {
                                                $paid_sql = "select count(id) as paid_count from base where consignment_type !='month' AND customer_type !='party' AND amount_paid!=0 and  createdAt LIKE '$today_date%'";
                                                $paid_result = mysqli_query($conn, $paid_sql);
                                                $paid_rec = mysqli_fetch_assoc($paid_result);
                                                $paid = isset($paid_rec['base_count'])?$paid_rec['base_count']:0;
                                               }
                                             else if($_SESSION['role'] == "user")
                                             {
                                                $paid_sql = "select count(id) as paid_count from base where consignment_type !='month' AND customer_type !='party' AND amount_paid!=0 and user_id=$userId and  createdAt LIKE '$today_date%'";
                                                $paid_result = mysqli_query($conn, $paid_sql);
                                                $paid_rec = mysqli_fetch_assoc($paid_result);
                                                $paid =isset($paid_rec['base_count'])?$paid_rec['base_count']:0;
                                               }

                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Paid </div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo isset($paid_rec['paid_count'])?$paid_rec['paid_count']:0; ?></div>
                                        </div>
                                    </div>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <?php
                                            
                                             if($_SESSION['role']=="super_admin")
                                             {
                                                $unpaid_sql = "select count(id) as unpaid_count from base where customer_type !='party' AND consignment_type !='month' AND 'paid' || balance !='0' and  createdAt LIKE '$today_date%'";
                                                $unpaid_result = mysqli_query($conn, $unpaid_sql);
                                                $unpaid_rec = mysqli_fetch_assoc($unpaid_result);
                                             }
                                             else if($_SESSION['role'] == "user")
                                             {
                                                $unpaid_sql = "select count(id) as unpaid_count from base where customer_type !='party' AND consignment_type !='month' AND 'paid' || balance !='0' and user_id=$userId and  createdAt LIKE '$today_date%'";
                                                $unpaid_result = mysqli_query($conn, $unpaid_sql);
                                                $unpaid_rec = mysqli_fetch_assoc($unpaid_result); 
                                             }

                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Unpaid </div>
                                            <!--<div class="font-size-h4 font-weight-bolder"><?php echo isset($unpaid_rec['unpaid_count'])?$unpaid_rec['unpaid_count']:0; ?></div>-->
                                            <div class="font-size-h4 font-weight-bolder"><?php echo $all - $paid ?></div>
                                            
                                        </div>
                                        <div class="col px-8 py-6">
                                            <?php
                                            if($_SESSION['role']=='super_admin')
                                            {
                                                $month_count_sql = "SELECT COUNT(id) as month_count FROM `base` where consignment_type ='month' and  createdAt LIKE '$today_date%'";
                                                $month_count_result = mysqli_query($conn, $month_count_sql);
                                                $month_count_rec = mysqli_fetch_assoc($month_count_result);
                                            }
                                            else if($_SESSION['role']=='user')
                                            {
                                                $month_count_sql = "SELECT COUNT(id) as month_count FROM `base` where consignment_type ='month' and  createdAt LIKE '$today_date%' and user_id=$userId ";
                                                $month_count_result = mysqli_query($conn, $month_count_sql);
                                                $month_count_rec = mysqli_fetch_assoc($month_count_result);
                                            }

                                            ?>
                                            <div class="font-size-sm text-muted font-weight-bold">Month Count</div>
                                            <div class="font-size-h4 font-weight-bolder"><?php echo isset($month_count_rec['month_count'])?$month_count_rec['month_count']:0; ?></div>
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
                                            if($_SESSION['role']=="super_admin")
                                            {
                                                $sql = "select sum(amountSpent) as expenses_amount from expenditure where category='Expenses' and amountSpent!=0 and createdAt LIKE '$today_date%'";
                                                $result = mysqli_query($conn, $sql);
                                                $rec = mysqli_fetch_assoc($result);
                                                
                                            }
                                            else if($_SESSION['role']=="user")
                                            {
                                                $sql = "select sum(amountSpent) as expenses_amount from expenditure where category='Expenses' and amountSpent!=0 and createdAt LIKE '$today_date%' and userId=$userId";
                                                $result = mysqli_query($conn, $sql);
                                                $rec = mysqli_fetch_assoc($result);
                                            }
                                            
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
                                            if($_SESSION['role']=='super_admin')
                                            {
                                                $sql = "select sum(amountPaid) as salary_amount from expenditure where category='Salary' and amountPaid!=0 and createdAt LIKE '$today_date%'";
                                                $result = mysqli_query($conn, $sql);
                                                $rec = mysqli_fetch_assoc($result);
                                            }
                                            else if($_SESSION['role']=='user')
                                            {
                                                $sql = "select sum(amountPaid) as salary_amount from expenditure where category='Salary' and amountPaid!=0 and createdAt LIKE '$today_date%' and userId=$userId";
                                                $result = mysqli_query($conn, $sql);
                                                $rec = mysqli_fetch_assoc($result);
                                            }
                                            
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
                                            if($_SESSION['role']=='super_admin')
                                            {
                                                $sql = "select sum(depositsAmount) as deposite_amount from expenditure where category='Deposited' and depositsAmount!=0 and createdAt LIKE '$today_date%'";
                                                $result = mysqli_query($conn, $sql);
                                                $rec = mysqli_fetch_assoc($result);
                                            }
                                            else if($_SESSION['role']=='user')
                                            {
                                                $sql = "select sum(depositsAmount) as deposite_amount from expenditure where category='Deposited' and depositsAmount!=0 and createdAt LIKE '$today_date%' and userId=$userId";
                                                $result = mysqli_query($conn, $sql);
                                                $rec = mysqli_fetch_assoc($result);
                                            }
                                            
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
                                            if($_SESSION['role']=='super_admin')
                                            {
                                                $sql = "select sum(pettyCashAmount) as pettycash_amount from expenditure where expenditure='PettyCash' and pettyCashAmount!=0 and createdAt LIKE '$today_date%'";
                                                $result = mysqli_query($conn, $sql);
                                                $rec = mysqli_fetch_assoc($result);
                                            }
                                            else if($_SESSION['role']=='user')
                                            {
                                                $sql = "select sum(pettyCashAmount) as pettycash_amount from expenditure where expenditure='PettyCash' and pettyCashAmount!=0 and createdAt LIKE '$today_date%' and userId=$userId";
                                                $result = mysqli_query($conn, $sql);
                                                $rec = mysqli_fetch_assoc($result);
                                            }
                                            
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
                                        if($_SESSION['role']=='super_admin')
                                        {
                                            $sql = "SELECT sum(Amount) as credited_amount FROM transaction_history where created_at like '$today_date%' and category in ('Petty Cash', 'Payments')";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                        }
                                        else if($_SESSION['role']=='user')
                                        {
                                            $sql = "SELECT sum(Amount) as credited_amount FROM transaction_history where created_at like '$today_date%' and user_id=$userId and category in ('Petty Cash', 'Payments')";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result); 
                                        }
                                        
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
                                        $today_date = date('Y-m-d');
                                        if($_SESSION['role']=='super_admin')
                                        {
                                            $sql = "SELECT sum(Amount) as credited_amount FROM transaction_history where created_at like '$today_date%' and category in ('Petty Cash', 'Payments')";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                            
                                            $sql1 = "SELECT sum(debit) as total_exp FROM transaction_history where created_at like '$today_date%'";
                                            $result1 = mysqli_query($conn, $sql1);
                                            $rec1 = mysqli_fetch_assoc($result1);
                                        }
                                        else if($_SESSION['role']=='user')
                                        {
                                            $sql = "SELECT sum(Amount) as credited_amount FROM transaction_history where created_at like '$today_date%' and user_id=$userId and category in ('Petty Cash', 'Payments')";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                            
                                            $sql1 = "SELECT sum(debit) as total_exp FROM transaction_history where created_at like '$today_date%' and user_id=$userId";
                                            $result1 = mysqli_query($conn, $sql1);
                                            $rec1 = mysqli_fetch_assoc($result1);
                                        }
                                        
                                        ?>
                                        <span class="text-dark-75 font-weight-bolder font-size-h3"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                            </svg><?php echo $rec['credited_amount']-$rec1['total_exp']; ?></span>
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
                                        if($_SESSION['role']=='super_admin')
                                        {
                                            $sql = "SELECT sum(debit) as total_exp FROM transaction_history where created_at like '$today_date%'";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                        }
                                        else if($_SESSION['role']=='user')
                                        {
                                            $sql = "SELECT sum(debit) as total_exp FROM transaction_history where created_at like '$today_date%' and user_id=$userId";
                                            $result = mysqli_query($conn, $sql);
                                            $rec = mysqli_fetch_assoc($result);
                                        }
                                        
                                        ?>
                                        <span class="text-dark-75 font-weight-bolder font-size-h3"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                                <path fill="currentColor" d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                            </svg>
                                            <?php
                                            if($rec['total_exp']=='')
                                            {
                                              echo '0';  
                                            }
                                            else
                                            {
                                                echo $rec['total_exp'];
                                            }
                                            
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

<?php } else { ?>
    echo "<script>window.location='sign-up.php';</script>";

<?php } ?>