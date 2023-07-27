<?php 
include ('header.php');
include('config.php');
date_default_timezone_set("Asia/Calcutta");


$username = $_SESSION['user_name'];
    $userId = $_SESSION['user_id'];
    $branchName = $_SESSION['branch'];
    $role = $_SESSION['role'];
?>
<style>
    /*.top-scroll {*/
    /*   width:200px;*/
    /*   height: 200px;*/
    /*   overflow-x: srcoll;*/
    /*}*/
    .wrapper1, .wrapper2 { 
        width: 100%; 
        overflow-x: scroll; 
        overflow-y: hidden; 
    }
    .wrapper1 { 
        height: 20px; 
        
    }
    .div1 { 
        height: 20px; 
    }
    .div2 { 
        overflow: none; 
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
                            Cash-in-hand
                        </h2>
                    </div>
                    <!--end::Page Heading-->
                </div>
            </div>
        </div>
        <!--end::Subheader-->

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--end::Notice-->
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title col-sm-12" style="display: grid;">
                            <div class="row">
                                <div class="col-sm-10">
                                    <h3 class="card-label">
                                    Cash-in-hand
                                    </h3>
                                </div>
                                
                                <div class="col-sm-2 ">
                                    <!-- <a href="" ><button class="btn btn-primary mb-3" onclick="printer('printPage', 1)" >Print</button></a> -->
                                    <!-- <button class="btn btn-primary mb-3" onclick="ExportToExcel('example')" >Excel</button> -->
                                    <button class="btn btn-primary mb-3" onclick="fnExcelReport()">Excel</button>
                                </div>
                                
                                <!-- <div class=" card-toolbar col-sm-2">
                                    <a href="input-group.php" class="btn btn-success">Add Expenditure</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body" >
                        <div class="table-responsives">
                            <form method="post">
                                <div class="row mt-3 text-center">
                                    <div class="col-sm-3">
                                        <label class="form-label">From date</label>
                                        <input  class="form-control" type="date" name="startDate" id="startDate">
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label">To date</label>
                                        <input  class="form-control" type="date" name="toDate" id="toDate">
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label">Select Branch</label>
                                        <select class="form-control"  name="branch" id="branch">
                                            <option selected  value=''>Select Branch</option>
                                            <?php
                                            $sql1 = "SELECT * FROM add_branch";
                                            $result1 = $conn->query($sql1);
                                            while($branchTable1 = $result1->fetch_assoc()){
                                            ?>
                                            <option value="<?= $branchTable1['branch_id'] ?>"><?= $branchTable1['branch_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label">Select Party Name</label>
                                        <select class="form-control"  name="from_name" id="from_name">
                                            <option selected  value=''>Select Party Name</option>
                                            <?php
                                            $sql1 = "SELECT * FROM party GROUP BY name";
                                            $result1 = $conn->query($sql1);
                                            while($customerTable1 = $result1->fetch_assoc()){
                                            ?>
                                            <option value="<?= $customerTable1['name'] ?>"><?= $customerTable1['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2 checkbox-inline mt-3">
                                        <label class="checkbox">
                                            <input type="checkbox" name="Expense"  id="Expense"/>
                                            <span></span>
                                            Expense
                                        </label>
                                    </div>
                                    <div class="col-sm-2 checkbox-inline mt-3">
                                        <label class="checkbox">
                                            <input type="checkbox" name="Salary"  id="Salary"/>
                                            <span></span>
                                            Salary
                                        </label>
                                    </div>
                                    <div class="col-sm-2 checkbox-inline mt-3">
                                        <label class="checkbox">
                                            <input type="checkbox" name="Deposits"  id="Deposits"/>
                                            <span></span>
                                            Deposits
                                        </label>
                                    </div>
                                    <div class="col-sm-2 checkbox-inline mt-3">
                                        <label class="checkbox">
                                            <input type="checkbox" name="PettyCash"  id="PettyCash"/>
                                            <span></span>
                                            Petty Cash
                                        </label>
                                    </div>
                                    <div class="col-sm-2 checkbox-inline mt-3">
                                        <label class="checkbox">
                                            <input type="checkbox" name="Payments"  id="Payments"/>
                                            <span></span>
                                            Payments
                                        </label>
                                    </div>
                                    <div class="col-sm-2 checkbox-inline mt-3">
                                        <label class="checkbox">
                                            <input type="checkbox" name="Month"  id="Month"/>
                                            <span></span>
                                            Month
                                        </label>
                                    </div>
                                    <div class="col-sm-2 checkbox-inline mt-3">
                                        <label class="checkbox">
                                            <input type="checkbox" name="Party"  id="Party"/>
                                            <span></span>
                                            Party
                                        </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input  class="btn btn-primary m-5 pt-3" type="button" name="search" value="Search" id="search">
                                    </div>
                                </div>
                            </form>
                            <?php // } ?>
                            <div id="printPage">
                                <div class="wrapper1">
                                	<div class="div1"></div>
                                </div>
                                <div class="wrapper2">
                                    <div class="div2">
                                       <table class="display" id="example" style="width:100%">
                                    <!-- <div id="titleName">
                                        <div class="col-sm-12 d-flex justify-content-center"><img src="assets/media/users/aps.PNG" alt="" srcset=""></div>
                                        <hr>
                                    </div> -->
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Branch Name</th>
                                            <th class="text-center">Create By</th>
                                            <th class="text-center">Date & Time</th>
                                            <th class="text-center">LR No</th>
                                            <th class="text-center">Customer</th>
                                            <th class="text-center">Month</th>
                                            <th class="text-center">Party Name</th>
                                            <th class="text-center">Mode of Payment</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Description</th>
                                            <!--<th class="textter">Name</th>-->
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Credited</th>
                                            <th class="text-center">Debited</th>
                                            <th class="text-center">Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                   </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
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
            <!--end::Separator-->
            <!--end::Notifications-->
        </div>
        <!--end::Content-->
    </div>
    <!-- end::User Panel-->

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
            <!--<div class="nav nav-dark order-1 order-md-2">-->
            <!--    <a href="#" class="nav-link pr-3 pl-0">About</a>-->
            <!--    <a href="#" class="nav-link px-3">Team</a>-->
            <!--    <a href="#" class="nav-link pl-3 pr-0">Contact</a>-->
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
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
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
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Theme Bundle-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<!--begin::Page Scripts(used by this page)-->
    <script src="assets/js/pages/crud/ktdatatable/base/data-local.js"></script>
<!--end::Page Scripts-->

<script>
    // $("#titleName").hide();
      $(function () {
    $('.wrapper1').on('scroll', function (e) {
        $('.wrapper2').scrollLeft($('.wrapper1').scrollLeft());
    }); 
    $('.wrapper2').on('scroll', function (e) {
        $('.wrapper1').scrollLeft($('.wrapper2').scrollLeft());
    });
});
$(window).on('load', function (e) {
    $('.div1').width($('table').width());
    $('.div2').width($('table').width());
});
    
    function fnExcelReport() {
        // $("#titleName").show();
        
		var tab_text = "<table border='2px'><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='8'><h1>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;SENTHIL AGENCY&ensp;&ensp;&ensp;</h1></th></tr><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='8'><h4>87/134, 1st floor ,VTC go down,GNT Road, near madhavaram rountana,</h4></th></tr><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='8'><h2>MOB NO:-+91 93801 10982,E-Mail:-reachsenthilagency@gmail.com</h2></th></tr><tr style='bgcolor='#fff82a'>";
      	var textRange;
		var j = 0;
		tab = document.getElementById('example');
		// id of table
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
	
        $(document).ready(function(){
           var table =  $('#example').DataTable({
                "processing":true,
                "responsive":true,
                "ajax":{
                    "url":"ajax_cashing_hand.php?action=fetch_cashing_hand",
                    "type":"POST"
                },
                "columns":[
                    { "data": "inc","width":"500" },
                    { "data": "branch_name" },
                    { "data": "user_name" },
                    { "data": "lr_no" },
                    { "data": "from_name" },
                    { "data": "category" },
                    { "data": "description" },
                    // { "data": "employee_name" },
                    { "data": "Amount" },
                    { "data": "credit" },
                    { "data": "debit" },
                    { "data": "balance" },
                    { "data": "party_name" },
                    { "data": "mode_payment" },
                    { "data": "month" },
                    { "data": "created_at" }
                    ],
                    columnDefs: [
                    {
                        targets: 0,
                        render: function(data, type, row) {
                            return row.inc;
                        }
                    },
                    {
                        targets: 1,
                        render: function(data, type, row) {
                            return row.branch_name;
                        }
                    },
                    {
                        targets: 2,
                        render: function(data, type, row) {
                            return row.user_name ;
                        }
                    },
                    {
                        targets: 3,
                        render: function(data, type, row) {
                            return row.created_at ;
                        }
                    },
                    {
                        targets: 4,
                        render: function(data, type, row) {
                            
                            return row.lr_no;
                        }
                    },
                    {
                        targets: 5,
                        render: function(data, type, row) {
                            
                            return row.from_name;
                        }
                    },
                    {
                        targets: 6,
                        render: function(data, type, row) {
                            
                            return row.month;
                        }
                    },
                    {
                        targets: 7,
                        render: function(data, type, row) {
                            
                            return row.party_name;
                        }
                    },
                    {
                        targets: 8,
                        render: function(data, type, row) {
                            
                            return row.mode_payment;
                        }
                    },
                    {
                        targets: 9,
                        render: function(data, type, row) {
                            
                            return row.category;
                        }
                    },
                    {
                        targets: 10,
                        render: function(data, type, row) {
                            
                            return (row.description) ? row.description : "Empty";
                        }
                    },
                    // {
                    //     targets: 8,
                    //     render: function(data, type, row) {
                            
                    //         return (row.employee_name)? row.employee_name : "Empty" ;
                    //     }
                    // },
                    {
                        targets: 11,
                        render: function(data, type, row) {
                            
                            return row.Amount;
                        }
                    },
                    {
                        targets: 12,
                        render: function(data, type, row) {
                            
                            return row.credit;
                        }
                    },
                    {
                        targets: 13,
                        render: function(data, type, row) {
                            
                            return row.debit;
                        }
                    },
                    {
                        targets: 14,
                        render: function(data, type, row) {
                            
                            return row.balance;
                        }
                    }
                    // {
                    //     targets: 4,
                    //     render: function(data, type, row) {
                    //         return '<a href="#" id="'+row.branch_id+'" class="btn btn-sm btn-clean btn-icon delete_branch" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a>';
                                    
                    //     }
                    // },
                ],
                
                "pageLength": 100,

                 "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;
                    
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
                    var size = 0;
                    var deb = 0;
                    var cred = 0;
                    data.forEach(function (x) {
                        deb += parseInt(x['debit']);
                        cred += parseInt(x['credit']);
                        size = parseInt(x['totalAmt']);
                        // size += parseInt(x['Amount']);
                    });
                    console.log(size)
                        console.log(cred+" " +deb)
                    
                    if(deb !== 0 && cred!=0){
                        
                       $("#example tfoot").empty();
                        let c = `Total Credit : ${cred}`;
                        let d = `Total Debit : ${deb}`;
                        let bal = `Balance : ${cred - deb}`;
                        let A = "Total Amount : "+size;
                        $("#d2").remove();$("#d3").remove();
                        if(this.find('tfoot').length == 0 || this.find('tfoot').length >= 1){
                            let tfoot = $('<tfoot>', {
                                'html': '<tr id="d1"><td colspan="11"></td><td class="result"></td><td class="cred"></td><td class="deb"></td><td class="bal"></td></tr>'
                            }).insertAfter($(this).find('tbody'));
                            tfoot.find('td.result').text(A);
                            tfoot.find('td.cred').text(c);
                            tfoot.find('td.deb').text(d);
                            tfoot.find('td.bal').text(bal);
                        }else{
                            let tfoot = $('<tfoot>', {
                                'html': ''
                            }).insertAfter($(this).find('tbody'));
                        }
                    }else if(cred !== 0 && deb===0){
                        $("#example tfoot").empty();
                        let Ac = `Total Amount : ${size}`;
                        let cc = `Total Credit : ${cred}`;
                        // console.log(petycash)
                        // $("#d1").hide();$("#d3").hide();
                        $("#d1").remove();$("#d3").remove();
                        let tfoot = $('<tfoot >', {
                            'html': '<tr id="d2"><td colspan="11"></td><td class="resultc"></td><td class="tc"></td><td></td><td></td></tr>'
                        }).insertAfter($(this).find('tbody'))
                        // alert(this.find('tfoot').length)
                        tfoot.find('td.resultc').text(Ac);
                        tfoot.find('td.tc').text(cc);
                    }else if(cred === 0 && deb!==0){
                       $("#example tfoot").empty();
                        let A = "Total Amount : "+size;
                        let d = `Total Debit : ${deb}`;
                        // console.log(deb)
                        // $("#d1").hide();$("#d2").hide();
                        $("#d1").remove();$("#d2").remove();
                        let tfoot = $('<tfoot >', {
                           'html': '<tr id="d3"><td colspan="11"><b></b></td><td class="result"></td><td></td><td class="bal text-center"></td><td></td></tr>'
                        }).insertAfter($(this).find('tbody'));
                        // alert(this.find('tfoot').length)
                        tfoot.find('td.result').text(A);
                        tfoot.find('td.bal').text(d);
                    }else if(cred === 0 && deb ==0)
                    {
                        $("#example tfoot").empty();
                    }
                },
            });

           $("#search").on("click",function(){
                var from=$("#startDate").val();
                var to=$("#toDate").val();
                var branch=$("#branch").val();
                var from_name=$("#from_name").val();
                console.log(from_name);
                var PettyCash=$("#PettyCash").val();
                var Payments=$("#Payments").val();
                var Expense=$("#Expense").val();
                var Salary=$("#Salary").val();
                var Deposits=$("#Deposits").val();
                var v = ($("#Payments").is(":checked")) ? "Payments" : "NULL";
                var w = ($("#Expense").is(":checked")) ? "Expense" : "NULL";
                var x = ($("#Salary").is(":checked")) ? "Salary" : "NULL" ;
                var y = ($("#Deposits").is(":checked")) ? "Deposits" : "NULL";
                var z = ($("#PettyCash").is(":checked")) ? "Petty Cash" : "NULL";
                var m = ($("#Month").is(":checked")) ? "Month" : "NULL";
                var p = ($("#Party").is(":checked")) ? "Party" : "NULL";
                // var category = "&w="+w+"&x="+x+"&y="+y+"&z="+z+"&v="+v+"&m="+m+"&p="+p;
                var category = "&w="+w+"&x="+x+"&y="+y+"&z="+z+"&v="+v;
                // console.log(category);
                
                if(from!="" && to!="" && branch!=="" && from_name!==""){
                    if(from!="" && to!="" && branch==null && from_name==null){
                        if(category == "&w=NULL&x=NULL&y=NULL&z=NULL&v=NULL"){
                            table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from="+from+'&to='+to+"&type="+2).load();
                            table.ajax.reload();
                        }else{
                            table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from="+from+'&to='+to+"&type="+61+category).load();
                            table.ajax.reload();
                        }
                    // }else if(from!="" && to!="" && from_name!=""){
                    //     if(category == "&w=NULL&x=NULL&y=NULL&z=NULL&v=NULL"){
                    //         table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from="+from+'&to='+to+'&branch='+branch+'&from_name='+from_name+"&type="+21).load();
                    //         table.ajax.reload();
                    //     }else{
                    //         table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from="+from+'&to='+to+'&branch='+branch+'&from_name='+from_name+"&type="+25+category).load();
                    //         table.ajax.reload();
                    //     }
                    }else{
                        if(category == "&w=NULL&x=NULL&y=NULL&z=NULL&v=NULL"){
                            table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from="+from+'&to='+to+'&branch='+branch+'&from_name='+from_name+"&type="+1).load();
                            table.ajax.reload();
                        }else{
                            table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from="+from+'&to='+to+'&branch='+branch+'&from_name='+from_name+"&type="+5+category).load();
                            table.ajax.reload();
                        }
                    }
                }else if(from!="" && to!="" && from_name!=""){
                    if(category == "&w=NULL&x=NULL&y=NULL&z=NULL&v=NULL"){
                       table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from="+from+'&to='+to+'&from_name='+from_name+"&type="+11).load();
                        table.ajax.reload();
                    }else{
                        table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from="+from+'&to='+to+'&from_name='+from_name+"&type="+10+category).load();
                        table.ajax.reload();
                    }
                }else if(from!="" && to!="" && p=="Party"){
                    // if(category == "&w=NULL&x=NULL&y=NULL&z=NULL&v=NULL"){
                    //   table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from="+from+'&to='+to+"&type="+12).load();
                    //     table.ajax.reload();
                    // }else{
                        table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from="+from+'&to='+to+"&type="+12+category).load();
                        table.ajax.reload();
                    // }
                }else if(from!="" && to!="" && m=="Month"){
                    // if(category == "&w=NULL&x=NULL&y=NULL&z=NULL&v=NULL"){
                    //   table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from="+from+'&to='+to+"&type="+12).load();
                    //     table.ajax.reload();
                    // }else{
                        table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from="+from+'&to='+to+"&type="+13+category).load();
                        table.ajax.reload();
                    // }
                }else if(from!="" && to!=""){
                    if(category == "&w=NULL&x=NULL&y=NULL&z=NULL&v=NULL"){
                        table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from="+from+'&to='+to+"&type="+2).load();
                        table.ajax.reload();
                    }else{
                        table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from="+from+'&to='+to+"&type="+6+category).load();
                        table.ajax.reload();
                    }
                }else if(branch!=""){
                    if(category == "&w=NULL&x=NULL&y=NULL&z=NULL&v=NULL"){
                        table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&branch="+branch+"&type="+3).load();
                        table.ajax.reload();
                    }else{
                        table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&branch="+branch+"&type="+7+category).load();
                        table.ajax.reload();
                    }
                }else if(from_name!=""){
                    if(category == "&w=NULL&x=NULL&y=NULL&z=NULL&v=NULL"){
                        table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from_name="+from_name+"&type="+8).load();
                        table.ajax.reload();
                    }else{
                        table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&from_name="+from_name+"&type="+9+category).load();
                        table.ajax.reload();
                    }
                }else if(category!=""){
                    table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand&type="+4+category).load();
                    table.ajax.reload();
                }else{
                    table.ajax.url("ajax_cashing_hand.php?action=fetch_cashing_hand").load();
                    table.ajax.reload();
                }
            });
        });
        
</script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
 
</body>
</html>