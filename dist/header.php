<?php
session_start();
if ($_SESSION['user_id'] == '' && $_SESSION['user_name'] == '') {
    header('location:logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<!--begin::Head-->
<!--<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"/>  -->
<!--<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css"/>  -->
<style>
    #demobox {
        background-color: #cfc;
        padding: 1px;
    }

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
        margin-right: -12.5px;
        margin-left: -12.5px;
    }

    .modal-height {
        width: auto !important;
    }

    .hh-grayBox {
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

    .nav li {
        border-bottom: 3px solid rgba(0, 0, 0, 0);
    }

    .nav li:hover {
        border-bottom: 3px solid #eee;
    }

    .nav li.active {
        border-bottom: 3px solid #338ecf;
        background: #eee
    }

    /*a{*/
    /*    color: #E96479 !important; */
    /*}*/
    a:hover {
        color: #E96479 !important;
    }

    .btn.btn-clean:not(:disabled):not(.disabled).active .svg-icon svg g [fill] {
        color: red !important;
    }
</style>

<head>
    <meta charset="utf-8" />
    <title>Senthil Agency</title>
    <meta name="description" content="User default listing" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <!-- <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />-->
    <!--<link href="assets/css/style.css" rel="stylesheet" type="text/css" />-->
    <link href="assets/css/style2.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.4.0/css/autoFill.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css" integrity="sha512-TPigxKHbPcJHJ7ZGgdi2mjdW9XHsQsnptwE+nOUWkoviYBn0rAAt0A5y3B1WGqIHrKFItdhZRteONANT07IipA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="assets/icon-senthil.png" />
</head>

<!--<body id="kt_body" class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">-->

<body id="kt_body" class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled aside-minimize">
    <div id="kt_header_mobile" class="header-mobile ">
        <a href="index.php">
            <!--<h4>SA</h4>-->
<img src="assets/senthil-logo-footer.png" style="width:100%"/>
        </a>
        <div class="d-flex align-items-center">
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                <span></span>
            </button>
        </div>
    </div>

    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
            <div class="aside aside-left d-flex  aside-fixed " id="kt_aside">
                <div class="aside-primary d-flex flex-column align-items-center flex-row-auto">
                    <div class="aside-brand d-flex flex-column align-items-center flex-column-auto py-5 py-lg-12">
                        <a href="index.php" style="color: #086ad7 !important;">
                            <!--<h4>SA</h4>-->
                        <img src="assets/icon-senthil.png" style="width:100%"/>
</a>
                    </div>

                    <div class="aside-nav d-flex flex-column align-items-center flex-column-fluid py-5 scroll scroll-pull">
                        <ul class="nav flex-column" role="tablist">
                            <li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Latest Projects">
                                <a href="#" class="nav-link btn btn-icon btn-clean btn-lg active" data-toggle="tab" data-target="#kt_aside_tab_1" role="tab">
                                    <span class="svg-icon svg-icon-xl"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="#fff" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#fff" x="4" y="4" width="7" height="7" rx="1.5" />
                                                <path style="color:red !important;" d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#fff" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="aside-footer d-flex flex-column align-items-center flex-column-auto py-4 py-lg-10">
                        <span class="aside-toggle btn btn-icon btn-primary btn-hover-primary shadow-sm" id="kt_aside_toggle" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Toggle Aside">
                            <i class="ki ki-bold-arrow-back icon-sm"></i>
                        </span>
                        <a href="#" class="btn btn-icon btn-clean btn-lg mb-1" id="kt_quick_actions_toggle" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Quick Actions">
                        </a>

                        <!--begin::User-->
                        <a href="#" class="btn btn-icon btn-clean btn-lg w-40px h-40px" id="kt_quick_user_toggle" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="User Profile">
                            <span class="symbol symbol-30 symbol-lg-40">
                                <span class="svg-icon svg-icon-xl">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <!--<span class="symbol-label font-size-h5 font-weight-bold">S</span>-->
                            </span>
                        </a>
                        <!--end::User-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Primary-->

                <!--begin::Secondary-->
                <div class="aside-secondary d-flex flex-row-fluid">
                    <!--begin::Workspace-->
                    <div class="aside-workspace scroll scroll-push my-2">
                        <!--begin::Tab Content-->
                        <div class="tab-content">
                            <!--begin::Tab Pane-->
                            <div class="tab-pane p-3 px-lg-7 py-lg-5 fade show active" id="kt_aside_tab_1">
                                <div class="aside-menu-wrapper flex-column-fluid px-10 py-5" id="kt_aside_menu_wrapper">
                                    <!--begin::Menu Container-->
                                    <div id="kt_aside_menu" class="aside-menu  min-h-lg-800px" data-menu-vertical="1" data-menu-scroll="1">
                                        <!--begin::Menu Nav-->
                                        <ul class="menu-nav ">
                                            <li class="menu-item " aria-haspopup="true"><a href="index.php" class="menu-link "><span class="svg-icon menu-icon">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span><span class="menu-text">Dashboard</span></a></li>
                                            <li class="menu-section ">
                                                <h4 class="menu-text">Custom</h4>
                                                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                            </li>
                                            <li class="menu-item  menu-item-submenu menu-item-open menu-item-here" aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle"><span class="svg-icon menu-icon">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                                                <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                                            </g>

                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>

                                                    <span class="menu-text">Forms</span><i class="menu-arrow"></i></a>
                                                <div class="menu-submenu "><i class="menu-arrow"></i>
                                                    <ul class="menu-subnav">
                                                        <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                                            <span class="menu-link"><span class="menu-text">Forms</span></span>
                                                        </li>
                                                        <?php
                                                        if ($_SESSION['role'] == "super_admin") {
                                                        ?>

                                                            <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover"><a href="bookingform.php" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">Booking Form</span></a>
                                                            </li>
                                                            <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="bookingdb.php" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">Booking Datatable</span></a>
                                                            </li>
                                                             <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="alllrdatatable.php" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">Party Table</span></a>
                                                            </li>
                                                            <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="expenditure.php" class="menu-link "><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">Expentiture</span></a>
                                                            </li>
                                                            <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="cashing_hand.php" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">Cash-in-Hand</span></a>
                                                            </li>
                                                            <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="data-local.php" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">Create User</span></a>
                                                            </li>
                                                            <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="company.php" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">Create Company</span></a>
                                                            </li>
                                                            <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="customer_detail.php" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">Create Party</span></a>
                                                            </li>
                                                            <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="payment_detail.php" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">Payment Detail</span></a>
                                                            </li>

                                                        <?php
                                                        } else if ($_SESSION['role'] == "user") {
                                                        ?>
                                                            <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover"><a href="bookingform.php" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">Booking Form</span></a>
                                                            </li>
                                                            <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="bookingdb.php" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">Datatable</span></a>
                                                            </li>
                                                             <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="alllrdatatable.php" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">All Datatable</span></a>
                                                            </li>
                                                            <!--<li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="expenditure.php" class="menu-link "><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">Expentiture</span></a>-->
                                                            <!--</li>-->
                                                            <!--<li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="company.php" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">Create Company</span></a>-->
                                                            <!--</li>-->
                                                            <!--<li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="customer_detail.php" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">Create Party</span></a>-->
                                                            <!--</li>-->
                                                            <?php
                                                            if ($_SESSION['active_state'] == 1) {
                                                            ?>
                                                                <!--<li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="payment_detail.php" class="menu-link"><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">Payment Detail</span></a>-->
                                                                <!--</li>-->
                                                            <?php
                                                            } else if ($_SESSION['active_state'] == 0) {
                                                            ?>
                                                            <?php
                                                            } ?>

                                                        <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle"><span class="svg-icon menu-icon">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-left-panel-2.svg-->
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z" fill="#000000" />
                                                            <rect fill="#000000" opacity="0.3" x="2" y="4" width="5" height="16" rx="1" />
                                                        </g>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </li>

                                        </ul>
                                        <!--end::Menu Nav-->
                                    </div>
                                    <!--end::Menu Container-->
                                </div>
                                <!--end::Aside Menu-->
                            </div>
                            <!--end::Tab Pane-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".nav a").on("click", function() {
            $(".nav").find(".active").removeClass("active");
            $(this).parent().addClass("active");
        });
    </script>
</body>