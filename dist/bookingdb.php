<?php
include('header.php');
include('config.php');
// createdAt,booking_mode,courier_mode,customer_id,username,consignee_name,booking_number,destination,weight,volume_weight,risk_charge,amount,pymt_date,paid_viya,product_id,status,out_status,In_transit,rto_status,notdev_status,des_status,updatedAt,Complaint_id

$username = $_SESSION['user_name'];
$branch = $_SESSION['courier_mode'];
// print_r($branch);die();
$userId = $_SESSION['user_id'];

if(isset($_POST['upload_excel'])){
        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
            //   $date   = $line[0];
            $createdAt=$line[0];
            $booking_mode=$line[1];
            $courier_mode=$line[2];
            $customer_id=$line[3];
            $username=$line[4];
            $consignee_name=$line[5];
            $booking_number=$line[6];
            $destination=$line[7];
            $weight=$line[8];
            $volume_weight=$line[9];
            $risk_charge=$line[10];
            $amount=$line[11];
            $pymt_date=$line[12];
            $paid_viya=$line[13];
            $product_id=$line[14];
            $status=$line[15];
            $out_status=$line[16];
            $In_transit=$line[17];
            $rto_status=$line[18];
            $notdev_status=$line[19];
            $des_status=$line[20];
            $updatedAt=$line[21];
            $Complaint_id=$line[22];
            $delivery_date=$line[23];
              $customer_type=$line[24];
            
                         // $con->query("INSERT INTO customer_analysis (customer_id,date,customer_name,contact_number,email_id,source_lead,online,board,mediator_name,mediator_number,project_name,project_location,building_type,flat_bhk,facing,budget,flat_sq_ft,flat_location,customer_contribution,villa_sq_ft,villa_location,villa_budget,plot_sq_ft,plot_location,plot_budget ) VALUES ('".$customer_id."','".$date."','".$customer_name."','".$contact_number."','".$email_id."','".$source_lead."','".$online."','".$board."','".$mediator_name."','".$mediator_number."','".$project_name."','".$project_location."','".$building_type."','".$flat_bhk."','".$facing."','".$budget."','".$flat_sq_ft."','".$flat_location."','".$customer_contribution."','".$villa_sq_ft."','".$villa_location."','".$villa_budget."',,'".$plot_sq_ft."','".$plot_location."','".$plot_budget."')");
			if($customer_type=="Customer" || $customer_type=="Party"  || $customer_type=="Company") {
				$conn->query("insert into booking_from(createdAt,booking_mode,courier_mode,customer_id,username,consignee_name,booking_number,destination,weight,volume_weight,risk_charge,amount,pymt_date,paid_viya,product_id,status,out_status,In_transit,rto_status,notdev_status,des_status,updatedAt,Complaint_id,delivery_date,customer_type,updated_by) values('".$createdAt."','".$booking_mode."','".$courier_mode."','".$customer_id."','".$username."','".$consignee_name."','".$booking_number."','".$destination."','".$weight."','".$volume_weight."','".$risk_charge."','".$amount."','".$pymt_date."','".$paid_viya."','".$product_id."','".$status."','".$out_status."','".$In_transit."','".$rto_status."','".$notdev_status."','".$des_status."','".$updatedAt."','".$Complaint_id."','$delivery_date','$customer_type','Admin')");
				// echo $conn->query;
			}
			if ($customer_type == "Company") {
			  $fromdates = date_create($createdAt);
               $monthnam = date_format($fromdates,"Y-m");
                        //   print_r("INSERT into base (createdAt,booking_mode,courier_mode,customer_id,username,consignee_name,booking_number,destination,weight,volume_weight,risk_charge,total,pymt_date,paid_viya,product_value,status,out_status,In_transit,rto_status,notdev_status,des_status,updatedAt,Complaint_id,delivery_date,customer_type,updated_by,month_name) values('".$createdAt."','".$booking_mode."','".$courier_mode."','".$customer_id."','".$username."','".$consignee_name."','".$booking_number."','".$destination."','".$weight."','".$volume_weight."','".$risk_charge."','".$amount."','".$pymt_date."','".$paid_viya."','".$product_id."','".$status."','".$out_status."','".$In_transit."','".$rto_status."','".$notdev_status."','".$des_status."','".$updatedAt."','".$Complaint_id."','$delivery_date','$customer_type','Admin','$monthnam')");die();                 
	            $conn->query("INSERT into base (createdAt,booking_mode,courier_mode,customer_id,username,consignee_name,booking_number,destination,weight,volume_weight,risk_charge,total,pymt_date,paid_viya,product_value,status,out_status,In_transit,rto_status,notdev_status,des_status,updatedAt,Complaint_id,delivery_date,customer_type,updated_by,month_name) values('".$createdAt."','".$booking_mode."','".$courier_mode."','".$customer_id."','".$username."','".$consignee_name."','".$booking_number."','".$destination."','".$weight."','".$volume_weight."','".$risk_charge."','".$amount."','".$pymt_date."','".$paid_viya."','".$product_id."','".$status."','".$out_status."','".$In_transit."','".$rto_status."','".$notdev_status."','".$des_status."','".$updatedAt."','".$Complaint_id."','$delivery_date','$customer_type','Admin','$monthnam')");
	  		}
				if($customer_type=="") {
				$conn->query("insert into booking_from(createdAt,booking_mode,courier_mode,customer_id,username,consignee_name,booking_number,destination,weight,volume_weight,risk_charge,amount,pymt_date,paid_viya,product_id,status,out_status,In_transit,rto_status,notdev_status,des_status,updatedAt,Complaint_id,delivery_date,customer_type,updated_by) values('".$createdAt."','".$booking_mode."','".$courier_mode."','".$customer_id."','".$username."','".$consignee_name."','".$booking_number."','".$destination."','".$weight."','".$volume_weight."','".$risk_charge."','".$amount."','".$pymt_date."','".$paid_viya."','".$product_id."','".$status."','".$out_status."','".$In_transit."','".$rto_status."','".$notdev_status."','".$des_status."','".$updatedAt."','".$Complaint_id."','$delivery_date','$customer_type','Admin')");
			}
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}
?>

<script>
    
$(document).on('click','#comp_id',function(e){
        e.preventDefault();
           id = $('#cid').val();
           comp_id = $('#Complaint_id').val();
// alert(id)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatecomp",
                            "cid": id,
                            "comp_id": comp_id
                        },
                        success: function(result_job) {
                         //   $('#bookingdbuser').DataTable().ajax.reload(null, false); 
                            if (result_job.status == 1) {
                           $('.modal').modal('hide'); 
                        }
                        }
                    });   
});

$(document).on('click','#compa_id',function(e){
        e.preventDefault();
           id = $('#cid').val();
           comp_id = $('#Complaint_id').val();
// alert(id)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatecomp",
                            "cid": id,
                            "comp_id": comp_id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                           $('.modal').modal('hide'); 
                            $('#bookingdb').DataTable().ajax.reload(null, false); //null, false
        
            }
                        }
                    });   
});

$(document).on('click','#compadel_id',function(e){
        e.preventDefault();
           id = $('#cida1').val();
           comp_id = $('#Complainta1_id').val();
// alert(id)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatecomp",
                            "cid": id,
                            "comp_id": comp_id
                        },
                        success: function(result_job) {
                     if (result_job.status == 1) {
                   $('.modal').modal('hide'); 
                     $('#bookingdelivered').DataTable().ajax.reload(null, false);
                
             }
                        }
                    });   
});

$(document).on('click','#compaodel_id',function(e){
        e.preventDefault();
           id = $('#cida2').val();
           comp_id = $('#Complainta2_id').val();
// alert(id)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatecomp",
                            "cid": id,
                            "comp_id": comp_id
                        },
                        success: function(result_job) {
                        if (result_job.status == 1) {
                               $('.modal').modal('hide'); 
              $('#bookingoutfordelivery').DataTable().ajax.reload(null, false); 
            }
                        }
                    });   
});

$(document).on('click','#compaint_id',function(e){
        e.preventDefault();
           id = $('#cida3').val();
           comp_id = $('#Complainta3_id').val();
// alert(id)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatecomp",
                            "cid": id,
                            "comp_id": comp_id
                        },
                        success: function(result_job) {
                      if (result_job.status == 1) {
                            $('.modal').modal('hide'); 
                 $('#bookingintrasit').DataTable().ajax.reload(null, false); 
                }
                        }
                    });   
});

$(document).on('click','#comparto_id',function(e){
        e.preventDefault();
           id = $('#cida4').val();
           comp_id = $('#Complainta4_id').val();
// alert(id)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatecomp",
                            "cid": id,
                            "comp_id": comp_id
                        },
                        success: function(result_job) {
                    if (result_job.status == 1) {
                              $('.modal').modal('hide'); 
                    $('#bookingrto').DataTable().ajax.reload(null, false); 
              }
                        }
                    });   
});

$(document).on('click','#compand_id',function(e){
        e.preventDefault();
           id = $('#cida5').val();
           comp_id = $('#Complainta5_id').val();
// alert(id)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatecomp",
                            "cid": id,
                            "comp_id": comp_id
                        },
                        success: function(result_job) {
                          if (result_job.status == 1) {
                     $('.modal').modal('hide'); 
                              $('#bookingnotdelivered').DataTable().ajax.reload(null, false);  
        }
                        }
                    });   
});

$(document).on('click','#compard_id',function(e){
        e.preventDefault();
           id = $('#cida6').val();
           comp_id = $('#Complainta6_id').val();
// alert(id)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatecomp",
                            "cid": id,
                            "comp_id": comp_id
                        },
                        success: function(result_job) {
                        if (result_job.status == 1) {
                      $('.modal').modal('hide'); 
                              $('#bookingreacheddestination').DataTable().ajax.reload(null, false); 
            }
                        }
                    });   
});

$(document).on('click','#compudel_id',function(e){
        e.preventDefault();
           id = $('#cidu1').val();
           comp_id = $('#Complaintu1_id').val();
// alert(id)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatecomp",
                            "cid": id,
                            "comp_id": comp_id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                           $('.modal').modal('hide'); 
                                 $('#bookingdelivereduser').DataTable().ajax.reload(null, false);
          }
                        }
                    });  
}); 
                    $(document).on('click','#compuodel_id',function(e){
        e.preventDefault();
           id = $('#cidu2').val();
           comp_id = $('#Complaintu2_id').val();
// alert(id)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatecomp",
                            "cid": id,
                            "comp_id": comp_id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                           $('.modal').modal('hide'); 
                              $('#bookingoutfordeliveryuser').DataTable().ajax.reload(null, false); 
            }
                        }
                    });  
});

                     $(document).on('click','#compuint_id',function(e){
        e.preventDefault();
           id = $('#cidu3').val();
           comp_id = $('#Complaintu3_id').val();
// alert(id)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatecomp",
                            "cid": id,
                            "comp_id": comp_id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                           $('.modal').modal('hide'); 
                              $('#bookingintrasituser').DataTable().ajax.reload(null, false); 
            }
                        }
                    });  
});

     $(document).on('click','#compurto_id',function(e){
        e.preventDefault();
           id = $('#cidu4').val();
           comp_id = $('#Complaintu4_id').val();
// alert(id)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatecomp",
                            "cid": id,
                            "comp_id": comp_id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                           $('.modal').modal('hide'); 
                             $('#bookingrtouser').DataTable().ajax.reload(null, false);
              }
                        }
                    });  
});
  
     $(document).on('click','#compund_id',function(e){
        e.preventDefault();
           id = $('#cidu5').val();
           comp_id = $('#Complaintu5_id').val();
// alert(id)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatecomp",
                            "cid": id,
                            "comp_id": comp_id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                           $('.modal').modal('hide'); 
                              $('#bookingnotdelivereduser').DataTable().ajax.reload(null, false); 
             }
                        }
                    });  
     });  
                       $(document).on('click','#compurd_id',function(e){
        e.preventDefault();
           id = $('#cidu6').val();
           comp_id = $('#Complaintu6_id').val();
alert(id)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatecomp",
                            "cid": id,
                            "comp_id": comp_id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                           $('.modal').modal('hide'); 
                              $('#bookingreacheddestinationuser').DataTable().ajax.reload(); //null, false
             }
                        }
               
});
  
});
  
  
$(document).on('click','#deli_id',function(e){
        e.preventDefault();
           id = $('#did').val();
           dat = $('#dat').val();
        //   delistatus = $('#delstatus').val();
           var delistatus = $('#delstatus').find(":selected").text();
// alert(delistatus)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        data: {
                            "action": "updatedelivery",
                            "did": id,
                            "dat": dat,
                            "delistatus": delistatus
                        },
                        success: function(result_job) {
                            // if (result_job.status == 1) {
                          $('.modal').modal('hide'); 
                      $('#bookingdb').DataTable().ajax.reload(null, false);
              $('#bookingdelivered').DataTable().ajax.reload(null, false);
                       $('#bookingoutfordelivery').DataTable().ajax.reload(null, false);
                      $('#bookingintrasit').DataTable().ajax.reload(null, false);
                       $('#bookingrto').DataTable().ajax.reload(null, false);
                        $('#bookingnotdelivered').DataTable().ajax.reload(null, false);
                         $('#bookingreacheddestination').DataTable().ajax.reload(null, false);
            // }
                        }
                    });   
});


$(document).on('click','#deliveryid',function(e){
        e.preventDefault();
           id = $('#did').val();
           dat = $('#dat').val();
        //   delistatus = $('#delstatus').val();
           var delistatus = $('#delstatus').find(":selected").text();
// alert(delistatus)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatedelivery",
                            "did": id,
                            "dat": dat,
                            "delistatus": delistatus
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                          $('.modal').modal('hide'); 
                     $('#bookingdb').DataTable().ajax.reload(null, false);
              $('#bookingdelivered').DataTable().ajax.reload(null, false);
                       $('#bookingoutfordelivery').DataTable().ajax.reload(null, false);
                      $('#bookingintrasit').DataTable().ajax.reload(null, false);
                       $('#bookingrto').DataTable().ajax.reload(null, false);
                        $('#bookingnotdelivered').DataTable().ajax.reload(null, false);
                         $('#bookingreacheddestination').DataTable().ajax.reload(null, false);
            }
                        }
                    });   
});


$(document).on('click','#deliveryout',function(e){
        e.preventDefault();
           id = $('#did').val();
           dat = $('#dat').val();
        //   delistatus = $('#delstatus').val();
           var delistatus = $('#delstatus').find(":selected").text();
// alert(delistatus)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatedelivery",
                            "did": id,
                            "dat": dat,
                            "delistatus": delistatus
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                          $('.modal').modal('hide'); 
                         $('#bookingdb').DataTable().ajax.reload(null, false);
              $('#bookingdelivered').DataTable().ajax.reload(null, false);
                       $('#bookingoutfordelivery').DataTable().ajax.reload(null, false);
                      $('#bookingintrasit').DataTable().ajax.reload(null, false);
                       $('#bookingrto').DataTable().ajax.reload(null, false);
                        $('#bookingnotdelivered').DataTable().ajax.reload(null, false);
                         $('#bookingreacheddestination').DataTable().ajax.reload(null, false);
            }
                        }
                    });   
});

$(document).on('click','#deliveryint',function(e){
        e.preventDefault();
           id = $('#did').val();
           dat = $('#dat').val();
        //   delistatus = $('#delstatus').val();
           var delistatus = $('#delstatus').find(":selected").text();
// alert(delistatus)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatedelivery",
                            "did": id,
                            "dat": dat,
                            "delistatus": delistatus
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                          $('.modal').modal('hide'); 
                         $('#bookingdb').DataTable().ajax.reload(null, false);
              $('#bookingdelivered').DataTable().ajax.reload(null, false);
                       $('#bookingoutfordelivery').DataTable().ajax.reload(null, false);
                      $('#bookingintrasit').DataTable().ajax.reload(null, false);
                       $('#bookingrto').DataTable().ajax.reload(null, false);
                        $('#bookingnotdelivered').DataTable().ajax.reload(null, false);
                         $('#bookingreacheddestination').DataTable().ajax.reload(null, false);
            }
                        }
                    });   
});

$(document).on('click','#deliveryrto',function(e){
        e.preventDefault();
           id = $('#did').val();
           dat = $('#dat').val();
        //   delistatus = $('#delstatus').val();
           var delistatus = $('#delstatus').find(":selected").text();
// alert(delistatus)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatedelivery",
                            "did": id,
                            "dat": dat,
                            "delistatus": delistatus
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                          $('.modal').modal('hide'); 
                         $('#bookingdb').DataTable().ajax.reload(null, false);
              $('#bookingdelivered').DataTable().ajax.reload(null, false);
                       $('#bookingoutfordelivery').DataTable().ajax.reload(null, false);
                      $('#bookingintrasit').DataTable().ajax.reload(null, false);
                       $('#bookingrto').DataTable().ajax.reload(null, false);
                        $('#bookingnotdelivered').DataTable().ajax.reload(null, false);
                         $('#bookingreacheddestination').DataTable().ajax.reload(null, false);
            }
                        }
                    });   
});

$(document).on('click','#deliverynotdel',function(e){
        e.preventDefault();
           id = $('#did').val();
           dat = $('#dat').val();
           var delistatus = $('#delstatus').find(":selected").text();
// alert(delistatus)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatedelivery",
                            "did": id,
                            "dat": dat,
                            "delistatus": delistatus
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                          $('.modal').modal('hide'); 
                         $('#bookingdb').DataTable().ajax.reload(null, false);
              $('#bookingdelivered').DataTable().ajax.reload(null, false);
                       $('#bookingoutfordelivery').DataTable().ajax.reload(null, false);
                      $('#bookingintrasit').DataTable().ajax.reload(null, false);
                       $('#bookingrto').DataTable().ajax.reload(null, false);
                        $('#bookingnotdelivered').DataTable().ajax.reload(null, false);
                         $('#bookingreacheddestination').DataTable().ajax.reload(null, false);
            }
                        }
                    });   
});

$(document).on('click','#deliveryrea',function(e){
        e.preventDefault();
           id = $('#did').val();
           dat = $('#dat').val();
        //   delistatus = $('#delstatus').val();
           var delistatus = $('#delstatus').find(":selected").text();
// alert(delistatus)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatedelivery",
                            "did": id,
                            "dat": dat,
                            "delistatus": delistatus
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                          $('.modal').modal('hide'); 
                         $('#bookingdb').DataTable().ajax.reload(null, false);
              $('#bookingdelivered').DataTable().ajax.reload(null, false);
                       $('#bookingoutfordelivery').DataTable().ajax.reload(null, false);
                      $('#bookingintrasit').DataTable().ajax.reload(null, false);
                       $('#bookingrto').DataTable().ajax.reload(null, false);
                        $('#bookingnotdelivered').DataTable().ajax.reload(null, false);
                         $('#bookingreacheddestination').DataTable().ajax.reload(null, false);
            }
                        }
                    });   
});

//doc_id


$(document).on('click','#deli_ids',function(e){
        e.preventDefault();
           id = $('#did').val();
           dat = $('#dat').val();
        //   delistatus = $('#delstatus').val();
           var delistatus = $('#delstatus').find(":selected").text();
// alert(delistatus)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatedelivery",
                            "did": id,
                            "dat": dat,
                            "delistatus": delistatus
                        },
                        success: function(result_job) {
                             $('.modal').modal('hide'); 
                          //   e.preventDefault();
         $('#bookingdbuser').DataTable().ajax.reload(null, false);
              $('#bookingdelivereduser').DataTable().ajax.reload(null, false);
                       $('#bookingoutfordeliveryuser').DataTable().ajax.reload(null, false);
                      $('#bookingintrasituser').DataTable().ajax.reload(null, false);
                       $('#bookingrtouser').DataTable().ajax.reload(null, false);
                        $('#bookingnotdelivereduser').DataTable().ajax.reload(null, false);
                         $('#bookingreacheddestinationuser').DataTable().ajax.reload(null, false);
                    //   if (result_job.status == 1) {
                    //     }
                        }
                    });   
});

$(document).on('click','#deli_idud',function(e){
        e.preventDefault();
           id = $('#did').val();
           dat = $('#dat').val();
        //   delistatus = $('#delstatus').val();
           var delistatus = $('#delstatus').find(":selected").text();
// alert(delistatus)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatedelivery",
                            "did": id,
                            "dat": dat,
                            "delistatus": delistatus
                        },
                        success: function(result_job) {
                             $('.modal').modal('hide'); 
                          //   e.preventDefault();
         $('#bookingdbuser').DataTable().ajax.reload(null, false);
              $('#bookingdelivereduser').DataTable().ajax.reload(null, false);
                       $('#bookingoutfordeliveryuser').DataTable().ajax.reload(null, false);
                      $('#bookingintrasituser').DataTable().ajax.reload(null, false);
                       $('#bookingrtouser').DataTable().ajax.reload(null, false);
                        $('#bookingnotdelivereduser').DataTable().ajax.reload(null, false);
                         $('#bookingreacheddestinationuser').DataTable().ajax.reload(null, false);
                    //   if (result_job.status == 1) {
                    //     }
                        }
                    });   
});

$(document).on('click','#deli_idus',function(e){
        e.preventDefault();
           id = $('#did').val();
           dat = $('#dat').val();
        //   delistatus = $('#delstatus').val();
           var delistatus = $('#delstatus').find(":selected").text();
// alert(delistatus)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatedelivery",
                            "did": id,
                            "dat": dat,
                            "delistatus": delistatus
                        },
                        success: function(result_job) {
                             $('.modal').modal('hide'); 
                          //   e.preventDefault();
         $('#bookingdbuser').DataTable().ajax.reload(null, false);
              $('#bookingdelivereduser').DataTable().ajax.reload(null, false);
                       $('#bookingoutfordeliveryuser').DataTable().ajax.reload(null, false);
                      $('#bookingintrasituser').DataTable().ajax.reload(null, false);
                       $('#bookingrtouser').DataTable().ajax.reload(null, false);
                        $('#bookingnotdelivereduser').DataTable().ajax.reload(null, false);
                         $('#bookingreacheddestinationuser').DataTable().ajax.reload(null, false);
                    //   if (result_job.status == 1) {
                    //     }
                        }
                    });   
});

$(document).on('click','#deli_iduod',function(e){
        e.preventDefault();
           id = $('#did').val();
           dat = $('#dat').val();
          var delistatus = $('#delstatus').find(":selected").text();
// alert(delistatus)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatedelivery",
                            "did": id,
                            "dat": dat,
                            "delistatus": delistatus
                        },
                        success: function(result_job) {
                             $('.modal').modal('hide'); 
                          //   e.preventDefault();
         $('#bookingdbuser').DataTable().ajax.reload(null, false);
              $('#bookingdelivereduser').DataTable().ajax.reload(null, false);
                       $('#bookingoutfordeliveryuser').DataTable().ajax.reload(null, false);
                      $('#bookingintrasituser').DataTable().ajax.reload(null, false);
                       $('#bookingrtouser').DataTable().ajax.reload(null, false);
                        $('#bookingnotdelivereduser').DataTable().ajax.reload(null, false);
                         $('#bookingreacheddestinationuser').DataTable().ajax.reload(null, false);
                    //   if (result_job.status == 1) {
                    //     }
                        }
                    });   
});

$(document).on('click','#deli_idurto',function(e){
        e.preventDefault();
           id = $('#did').val();
           dat = $('#dat').val();
        //   delistatus = $('#delstatus').val();
           var delistatus = $('#delstatus').find(":selected").text();
// alert(delistatus)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatedelivery",
                            "did": id,
                            "dat": dat,
                            "delistatus": delistatus
                        },
                        success: function(result_job) {
                             $('.modal').modal('hide'); 
                          //   e.preventDefault();
         $('#bookingdbuser').DataTable().ajax.reload(null, false);
              $('#bookingdelivereduser').DataTable().ajax.reload(null, false);
                       $('#bookingoutfordeliveryuser').DataTable().ajax.reload(null, false);
                      $('#bookingintrasituser').DataTable().ajax.reload(null, false);
                       $('#bookingrtouser').DataTable().ajax.reload(null, false);
                        $('#bookingnotdelivereduser').DataTable().ajax.reload(null, false);
                         $('#bookingreacheddestinationuser').DataTable().ajax.reload(null, false);
                    //   if (result_job.status == 1) {
                    //     }
                        }
                    });   
});

$(document).on('click','#deli_idund',function(e){
        e.preventDefault();
           id = $('#did').val();
           dat = $('#dat').val();
        //   delistatus = $('#delstatus').val();
           var delistatus = $('#delstatus').find(":selected").text();
// alert(delistatus)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatedelivery",
                            "did": id,
                            "dat": dat,
                            "delistatus": delistatus
                        },
                        success: function(result_job) {
                             $('.modal').modal('hide'); 
                          //   e.preventDefault();
         $('#bookingdbuser').DataTable().ajax.reload(null, false);
              $('#bookingdelivereduser').DataTable().ajax.reload(null, false);
                       $('#bookingoutfordeliveryuser').DataTable().ajax.reload(null, false);
                      $('#bookingintrasituser').DataTable().ajax.reload(null, false);
                       $('#bookingrtouser').DataTable().ajax.reload(null, false);
                        $('#bookingnotdelivereduser').DataTable().ajax.reload(null, false);
                         $('#bookingreacheddestinationuser').DataTable().ajax.reload(null, false);
                    //   if (result_job.status == 1) {
                    //     }
                        }
                    });   
});

$(document).on('click','#deli_idurd',function(e){
        e.preventDefault();
           id = $('#did').val();
           dat = $('#dat').val();
        //   delistatus = $('#delstatus').val();
           var delistatus = $('#delstatus').find(":selected").text();
// alert(delistatus)
  $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "updatedelivery",
                            "did": id,
                            "dat": dat,
                            "delistatus": delistatus
                        },
                        success: function(result_job) {
                             $('.modal').modal('hide'); 
                          //   e.preventDefault();
         $('#bookingdbuser').DataTable().ajax.reload(null, false);
              $('#bookingdelivereduser').DataTable().ajax.reload(null, false);
                       $('#bookingoutfordeliveryuser').DataTable().ajax.reload(null, false);
                      $('#bookingintrasituser').DataTable().ajax.reload(null, false);
                       $('#bookingrtouser').DataTable().ajax.reload(null, false);
                        $('#bookingnotdelivereduser').DataTable().ajax.reload(null, false);
                         $('#bookingreacheddestinationuser').DataTable().ajax.reload(null, false);
                    //   if (result_job.status == 1) {
                    //     }
                        }
                    });   
});

</script>
<style>
.wrap{
position: absolute;
  
    bottom: 0;
    }
    </style>
    
    <?php
    if(isset($_POST['doc_id'])){
        $id=$_POST['docid'];
         $docsup = $_FILES["docsid"]["name"];
      $tempname1 = $_FILES["docsid"]["tmp_name"];

       $folder1="document/".$docsup;
    //   print_r($folder1);die();
  $res1=move_uploaded_file($tempname1, $folder1);

 if($res1) {
   $sql2 = "update booking_from set document='$folder1' where id=$id";
//   print_r($sql2);die();
     $exe = mysqli_query($conn, $sql2);
    }
    else{
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
                            Booking Datatable
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
                                <input type="hidden" name="id" id="complaintdetail_id">
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
        <div class="modal fade" id="complainta_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id" id="complaintdetaila_id">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="complaintstatusupdatea">
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
         <div class="modal fade" id="complaintadel_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id" id="complaintdetail_idadel">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="complaintstatusupdateadel">
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
         <div class="modal fade" id="complaintudel_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id" id="complaintdetail_idudel">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="complaintstatusupdateudel">
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
       <div class="modal fade" id="complaintuodel_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id" id="complaintdetail_iduodel">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="complaintstatusupdateuodel">
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
       <div class="modal fade" id="complaintaodel_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id" id="complaintdetail_idaodel">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="complaintstatusupdateaodel">
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
       <div class="modal fade" id="complaintuint_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       
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
                                <input type="hidden" name="id" id="complaintdetail_iduint">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="complaintstatusupdateuint">
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
       <div class="modal fade" id="complaintaint_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       
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
                                <input type="hidden" name="id" id="complaintdetail_idaint">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="complaintstatusupdateaint">
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
      <div class="modal fade" id="complainturto_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       
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
                                <input type="hidden" name="id" id="complaintdetail_idurto">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="complaintstatusupdateurto">
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
       <div class="modal fade" id="complaintarto_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       
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
                                <input type="hidden" name="id" id="complaintdetail_idarto">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="complaintstatusupdatearto">
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
       <div class="modal fade" id="complaintund_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       
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
                                <input type="hidden" name="id" id="complaintdetail_idund">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="complaintstatusupdateund">
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
        <div class="modal fade" id="complaintand_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       
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
                                <input type="hidden" name="id" id="complaintdetail_idand">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="complaintstatusupdateand">
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
      <div class="modal fade" id="complainturd_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       
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
                                <input type="hidden" name="id" id="complaintdetail_idurd">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="complaintstatusupdateurd">
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
        <div class="modal fade" id="complaintard_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       
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
                                <input type="hidden" name="id" id="complaintdetail_idard">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="complaintstatusupdateard">
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
   
<div class="modal fade" id="delivery_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #086ad7 ;">Delivery Status</h5>
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
                                <input type="hidden" name="id" id="deliverydetail_id">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="deliverystatusupdate">
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
 
<div class="modal fade" id="docs_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #086ad7 ;">Documents Upload</h5>
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
                                <input type="hidden" name="documentid" id="documentid">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="documentupload">
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


  <div class="modal fade" id="delivery_idod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #086ad7 ;">Delivery Status</h5>
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
                                <input type="hidden" name="id" id="deliverydetail_idod">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="deliverystatusupdateod">
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
       
        <div class="modal fade" id="delivery_idu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #086ad7 ;">Delivery Status</h5>
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
                                <input type="hidden" name="id" id="deliverydetail_idu">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="deliverystatusupdateu">
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

      <div class="modal fade" id="delivery_iduint" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #086ad7 ;">Delivery Status</h5>
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
                                <input type="hidden" name="id" id="deliverydetail_iduint">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="deliverystatusupdateuint">
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


      <div class="modal fade" id="delivery_idurto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #086ad7 ;">Delivery Status</h5>
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
                                <input type="hidden" name="id" id="deliverydetail_idurto">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="deliverystatusupdateurto">
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

 <div class="modal fade" id="delivery_idund" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #086ad7 ;">Delivery Status</h5>
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
                                <input type="hidden" name="id" id="deliverydetail_idund">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="deliverystatusupdateund">
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

  <div class="modal fade" id="delivery_idurd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #086ad7 ;">Delivery Status</h5>
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
                                <input type="hidden" name="id" id="deliverydetail_idurd">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="deliverystatusupdateurd">
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


      <div class="modal fade" id="delivery_id1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #086ad7 ;">Delivery Status</h5>
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
                                <input type="hidden" name="id" id="deliverydetail_idd">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="deliverystatusupdatedel">
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
        
         <div class="modal fade" id="delivery_id2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #086ad7 ;">Delivery Status</h5>
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
                                <input type="hidden" name="id" id="deliverydetail_idout">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="deliverystatusupdateout">
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
        
          
         <div class="modal fade" id="delivery_id3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #086ad7 ;">Delivery Status</h5>
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
                                <input type="hidden" name="id" id="deliverydetail_idint">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="deliverystatusupdateint">
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
        
               
         <div class="modal fade" id="delivery_id4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #086ad7 ;">Delivery Status</h5>
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
                                <input type="hidden" name="id" id="deliverydetail_idrto">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="deliverystatusupdaterto">
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
        
               
         <div class="modal fade" id="delivery_id5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #086ad7 ;">Delivery Status</h5>
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
                                <input type="hidden" name="id" id="deliverydetail_idnd">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="deliverystatusupdatend">
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
        
         <div class="modal fade" id="delivery_id6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #086ad7 ;">Delivery Status</h5>
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
                                <input type="hidden" name="id" id="deliverydetail_idrd">
                                <div class="container">
                                    <div class="rows justify-content-center mt-5" id="deliverystatusupdaterd">
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
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#all">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#delivered">Delivered</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#outfordelivery">Out for delivery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#intransit">In transit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#rto">RTO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#notdelivered">Not delivered</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#reacheddestination">Reached destination</a>
                            </li>
                        <?php
                        if ($_SESSION['role'] == "super_admin") {
                        ?>
       <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#upload">Upload</a>
                            </li>
<?php } ?>
                        </ul>

                        <?php
                        if ($_SESSION['role'] == "super_admin") {
                        ?>

                            <div class="tab-content">

                                <div id="all" class="container tab-pane active"><br>
                                    <div class="card-body">
                                        <div class="row col-sm-12 mt-3 text-center">
                                            <div class="col-sm-2">
                                                <label class="form-label">From Date</label>
                                                <input class="form-control" type="date" name="fromdateall" id="fromdateall">
                                            </div>
                                            <div class="col-sm-2">
                                                <label class="form-label">To Date</label>
                                                <input class="form-control" type="date" name="todateall" id="todateall">
                                            </div>
                                              <div class="col-sm-2">
                                                   <label class="form-label">Role</label>
                                            <select name="role" class="form-control" id="role">
                                                    <option>Choose Role Type</option>
                                                     <option value="Customer">Customer</option>
                                                       <option value="Party">Party</option>
                                                     <option value="Company">Company</option>
                                                </select>
                                           </div>
                                              <div class="col-sm-2">
                                                   <label class="form-label"></label>
                                                  <label class="form-label">Courier Mode</label>
                                          <select name="courier" class="form-control" id="courier">
                                                    <option>Courier</option>
                                                     <option value="Delivery">Delivery</option>
                                                    <option value="DTDC">DTDC</option>
                                                        <option value="Maruti">Maruti</option>
                                                            <option value="Professional">Professional</option>
                                                                <option value="Speed">Speed post</option>
                                                                    <option value="ST">ST Courier</option>
                                                                     <option value="Blue Dart">Blue Dart</option>
                                                </select>
                                           </div>
                                           <div class="col-sm-2">
                                                   <label class="form-label">Name</label>
                                            <input list="names" class="form-control" name="namea" id="namea">

<datalist id="names">
  <?php
  $sqlname="select * from booking_from group by username";
  $exename=mysqli_query($conn,$sqlname);
  while($valname=mysqli_fetch_assoc($exename)){
      ?>
      <option value="<?=$valname['username']?>"><?=$valname['username']?></option>
      <?php
  }
  ?>
</datalist>
                                           </div>
                                              <div class="col-sm-2">
                                                <label class="form-label">Choose Delivery Status</label>
                                          <select id="delivestatus" name="delivestatus" class="form-control">
                                              <option value="" disabled selected>Choose Delivery Type</option>
                                       <option value="Delivered">Delivered</option>
<option value="New Request">New Request</option>
<option value="Out Of Delivery">Out Of Delivery</option>
<option value="In Transit">In Transit</option>
<option value="RTO">RTO</option>
<option value="Not Delivery">Not Delivery</option>
<option value="Reached Destination">Reached Destination</option>
                                          </select>
                                           </div>
                                            <div class="col-sm-5">
                                            </div>
                                            <div class="col-sm-2">
                                                <input class="btn btn-primary mt-3" type="submit" name="filterall" value="Search" id="filterall">
                                                <button class="btn btn-primary mt-3" onclick="ExportToExcel('xlsx')">Excel</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="display" id="bookingdb">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                   <th>Consignee Name</th>
                                                     <th>Entry</th>
                                                    <th>Booking Mode</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                    <th>Weight</th>
                                                    <th>Volume weight</th>
                                                    <th>Risk charge</th>
                                                    <th>Amount</th>
                                                    <th>Product value</th>
                                                    <th>Status</th>
                                                     <th>Delivery Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                         <!--class="hide" style="display:none"-->
                                       <table id="excelall"  class="hide" style="display:none">
                                            <thead>
                                                <tr>
                                                    <th colspan='22'>
                                            <h1>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<b>SENTHIL AGENCY</b>&ensp;&ensp;&ensp;</h1></th>
                                    </tr>
                                    <tr class='col-sm-12 d-flex justify-content-center text-center'>
                                        <th colspan='22'>
                                            <h4>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<b>87/134, 1st floor ,VTC go down, GNT Road, near madhavaram rountana,</b></h4></th>
                                            </tr>
                                            <tr class='col-sm-12 d-flex justify-content-center text-center'>
                                                <th colspan='22'>
                                                    <h2>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<b>MOB NO:-+91 93801 10982,E-Mail:-reachsenthilagency@gmail.com</b></h2>
                                                    </th>
                                                </tr>
                                                 <tr>
                                                       <th>S.No</th>
                                                    <th>Name</th>
                                                   <th>Consignee Name</th>
                                                     <th>Entry</th>
                                                    <th>Booking Mode</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <!--<th>Customer type</th>-->
                                                    <!--<th>From Address</th>-->
                                                    <!--<th>From Contact No</th>-->
                                                    <!--<th>To Name</th>-->
                                                    <!--<th>To Address</th>-->
                                                    <!--<th>To Contact No</th>-->
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                    <th>Weight</th>
                                                    <th>Volume weight</th>
                                                    <th>Risk charge</th>
                                                    <th>Amount</th>
                                                    <th>Product value</th>
                                                    <th>Status</th>
                                                     <th>Delivery Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div id="delivered" class="container tab-pane"><br>
                                    <div class="card-body">
                                        <div class="row mt-3 text-center">
                                            <div class="col-sm-4">
                                                <label class="form-label">From Date</label>
                                                <input class="form-control" type="date" name="fromdelivered" id="fromdelivered">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label">To Date</label>
                                                <input class="form-control" type="date" name="todelivered" id="todelivered">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="btn btn-primary m-5 pt-3" type="submit" name="filterdelivered" value="Search" id="filterdelivered">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="display" id="bookingdelivered">
                                            <thead>
                                                 <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                      <th>Consignee Name</th>
                                                   <th>Document Type</th>
                                                    <th>Booking Mode</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Customer type</th>
                                                    <th>From Address</th>
                                                    <th>From Contact No</th>
                                                    <th>To Name</th>
                                                    <th>To Address</th>
                                                    <th>To Contact No</th>
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                    <th>Weight</th>
                                                    <th>Volume weight</th>
                                                    <th>Risk charge</th>
                                                    <th>Amount</th>
                                                    <th>Product value</th>
                                                    <th>Status</th>
                                                    <th>Delivery Date</th>
                                                    <th>Action</th>
                                                 </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div id="outfordelivery" class="container tab-pane"><br>
                                    <div class="card-body">
                                        <div class="row mt-3 text-center">
                                            <div class="col-sm-4">
                                                <label class="form-label">From Date</label>
                                                <input class="form-control" type="date" name="fromdateoutfordelivery" id="fromdateoutfordelivery">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label">To Date</label>
                                                <input class="form-control" type="date" name="todateoutfordelivery" id="todateoutfordelivery">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="btn btn-primary m-5 pt-3" type="submit" name="filteroutfordelivery" value="Search" id="filteroutfordelivery">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="display" id="bookingoutfordelivery">
                                            <thead>
                                                 <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                       <th>Consignee Name</th>
                                                   <th>Document Type</th>
                                                    <th>Booking Mode</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Customer type</th>
                                                    <th>From Address</th>
                                                    <th>From Contact No</th>
                                                    <th>To Name</th>
                                                    <th>To Address</th>
                                                    <th>To Contact No</th>
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                    <th>Weight</th>
                                                    <th>Volume weight</th>
                                                    <th>Risk charge</th>
                                                    <th>Amount</th>
                                                    <th>Product value</th>
                                                    <th>Status</th>
                                                   <th>Delivery Date</th>
                                                    <th>Action</th>
                                                  </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div id="intransit" class="container tab-pane"><br>
                                    <div class="card-body">
                                        <div class="row mt-3 text-center">
                                            <div class="col-sm-4">
                                                <label class="form-label">From Date</label>
                                                <input class="form-control" type="date" name="fromdateintrasit" id="fromdateintrasit">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label">To Date</label>
                                                <input class="form-control" type="date" name="todateintrasit" id="todateintrasit">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="btn btn-primary m-5 pt-3" type="submit" name="filterintrasit" value="Search" id="filterintrasit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="display" id="bookingintrasit">
                                            <thead>
                                                 <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                       <th>Consignee Name</th>
                                                   <th>Document Type</th>
                                                    <th>Booking Mode</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Customer type</th>
                                                    <th>From Address</th>
                                                    <th>From Contact No</th>
                                                    <th>To Name</th>
                                                    <th>To Address</th>
                                                    <th>To Contact No</th>
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                    <th>Weight</th>
                                                    <th>Volume weight</th>
                                                    <th>Risk charge</th>
                                                    <th>Amount</th>
                                                    <th>Product value</th>
                                                    <th>Status</th>
                                                   <th>Delivery Date</th>
                                                      <th>Action</th>
                                                  </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div id="rto" class="container tab-pane"><br>
                                    <div class="card-body">
                                        <div class="row mt-3 text-center">
                                            <div class="col-sm-4">
                                                <label class="form-label">From Date</label>
                                                <input class="form-control" type="date" name="fromdaterto" id="fromdaterto">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label">To Date</label>
                                                <input class="form-control" type="date" name="todaterto" id="todaterto">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="btn btn-primary m-5 pt-3" type="submit" name="filterrto" value="Search" id="filterrto">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="display" id="bookingrto">
                                            <thead>
                                                 <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                      <th>Consignee Name</th>
                                                    <th>Document Type</th>
                                                    <th>Booking Mode</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Customer type</th>
                                                    <th>From Address</th>
                                                    <th>From Contact No</th>
                                                    <th>To Name</th>
                                                    <th>To Address</th>
                                                    <th>To Contact No</th>
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                    <th>Weight</th>
                                                    <th>Volume weight</th>
                                                    <th>Risk charge</th>
                                                    <th>Amount</th>
                                                    <th>Product value</th>
                                                    <th>Status</th>
                                                   <th>Delivery Date</th>
                                                      <th>Action</th>
                                                  </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div id="notdelivered" class="container tab-pane"><br>
                                    <div class="card-body">
                                        <div class="row mt-3 text-center">
                                            <div class="col-sm-4">
                                                <label class="form-label">From Date</label>
                                                <input class="form-control" type="date" name="fromdatenotdelivered" id="fromdatenotdelivered">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label">To Date</label>
                                                <input class="form-control" type="date" name="todatenotdelivered" id="todatenotdelivered">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="btn btn-primary m-5 pt-3" type="submit" name="filternotdelivered" value="Search" id="filternotdelivered">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="display" id="bookingnotdelivered">
                                            <thead>
                                                 <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                       <th>Consignee Name</th>
                                                   <th>Document Type</th>
                                                    <th>Booking Mode</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Customer type</th>
                                                    <th>From Address</th>
                                                    <th>From Contact No</th>
                                                    <th>To Name</th>
                                                    <th>To Address</th>
                                                    <th>To Contact No</th>
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                    <th>Weight</th>
                                                    <th>Volume weight</th>
                                                    <th>Risk charge</th>
                                                    <th>Amount</th>
                                                    <th>Product value</th>
                                                    <th>Status</th>
                                                    <th>Delivery Date</th>
                                                       <th>Action</th>
                                                 </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div id="reacheddestination" class="container tab-pane"><br>
                                    <div class="card-body">
                                        <div class="row mt-3 text-center">
                                            <div class="col-sm-4">
                                                <label class="form-label">From Date</label>
                                                <input class="form-control" type="date" name="fromdatereacheddestination" id="fromdatereacheddestination">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label">To Date</label>
                                                <input class="form-control" type="date" name="todatereacheddestination" id="todatereacheddestination">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="btn btn-primary m-5 pt-3" type="submit" name="filterreacheddestination" value="Search" id="filterreacheddestination">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="display" id="bookingreacheddestination">
                                            <thead>
                                                 <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                       <th>Consignee Name</th>
                                                   <th>Document Type</th>
                                                    <th>Booking Mode</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Customer type</th>
                                                    <th>From Address</th>
                                                    <th>From Contact No</th>
                                                    <th>To Name</th>
                                                    <th>To Address</th>
                                                    <th>To Contact No</th>
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                    <th>Weight</th>
                                                    <th>Volume weight</th>
                                                    <th>Risk charge</th>
                                                    <th>Amount</th>
                                                    <th>Product value</th>
                                                    <th>Status</th>
                                                   <th>Delivery Date</th>
                                                      <th>Action</th>
                                                  </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="upload" class="container tab-pane">
                                    <form method="post" enctype="multipart/form-data">
                                        <br/>
                          <div class="col">
                      <label for="inputZip">Upload File</label></label>
                      <input type="file" name="file" >
                      </div>
                      <br/>
                      <div class="col">
                          <a href="uploadexcel/upload_excel.csv" download class="p-4">Download Template Here</a>
                      </div>
                    <!--</div>-->
                  
                  <div class="card-footer text-right">
                    <input class="btn btn-primary mr-1" name="upload_excel" type="submit" value="Submit">
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div> 
                  </form>
                      </div>
                            <!--  </div>-->
                                
                            </div>

                        <?php
                        } elseif ($_SESSION['role'] == "user") {
                        ?>

                            <div class="tab-content">

                                <div id="all" class="container tab-pane active"><br>
                                    <div class="card-body">
                                        <div class="row mt-3 text-center">
                                            <div class="col-sm-3">
                                                <label class="form-label">From Date</label>
                                                <input class="form-control" type="date" name="fromdatealluser" id="fromdatealluser">
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="form-label">To Date</label>
                                                <input class="form-control" type="date" name="todatealluser" id="todatealluser">
                                            </div>
                                            <div class="col-sm-2">
                                                <label class="form-label">Choose Delivery Status</label>
                                          <select id="delivstatus" name="delivstatus" class="form-control">
                                              <option value="" disabled selected>Choose Delivery Type</option>
                                       <option value="Delivered">Delivered</option>
<option value="New Request">New Request</option>
<option value="Out Of Delivery">Out Of Delivery</option>
<option value="In Transit">In Transit</option>
<option value="RTO">RTO</option>
<option value="Not Delivery">Not Delivery</option>
<option value="Reached Destination">Reached Destination</option>
                                          </select>
                                           </div>
                                            <div class="col-sm-2">
                                                <input class="btn btn-primary m-5 pt-3" type="submit" name="filteralluser" value="Search" id="filteralluser">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary mb-3" onclick="ExportToExcel1('xlsx')">Excel</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="display" id="bookingdbuser">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                    <th>Consignee Name</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                    <th>Status</th>
                                                     <th>Delivery Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="hide" style="display:none">
                                        <table id="excelalluser">
                                            <thead>
                                                <tr>
                                                    <th colspan='20'>
                                                        <h1>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<b>Senthil Ageancy</b></h1>
                                                    </th>
                                                </tr>
                                                   <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                   <th>Consignee Name</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                       </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div id="delivered" class="container tab-pane"><br>
                                    <div class="card-body">
                                        <div class="row mt-3 text-center">
                                            <div class="col-sm-4">
                                                <label class="form-label">From Date</label>
                                                <input class="form-control" type="date" name="fromdelivereduser" id="fromdelivereduser">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label">To Date</label>
                                                <input class="form-control" type="date" name="todelivereduser" id="todelivereduser">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="btn btn-primary m-5 pt-3" type="submit" name="filterdelivereduser" value="Search" id="filterdelivereduser">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="display" id="bookingdelivereduser">
                                            <thead>
                                                 <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                    <th>Consignee Name</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                    <th>Status</th>
                                                    <th>Delivery Date</th>
                                                      <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div id="outfordelivery" class="container tab-pane"><br>
                                    <div class="card-body">
                                        <div class="row mt-3 text-center">
                                            <div class="col-sm-4">
                                                <label class="form-label">From Date</label>
                                                <input class="form-control" type="date" name="fromdateoutfordeliveryuser" id="fromdateoutfordeliveryuser">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label">To Date</label>
                                                <input class="form-control" type="date" name="todateoutfordeliveryuser" id="todateoutfordeliveryuser">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="btn btn-primary m-5 pt-3" type="submit" name="filteroutfordeliveryuser" value="Search" id="filteroutfordeliveryuser">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="display" id="bookingoutfordeliveryuser">
                                            <thead>
                                                 <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                  <th>Consignee Name</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                    <th>Status</th>
                                                    <th>Delivery Date</th>
                                                      <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div id="intransit" class="container tab-pane"><br>
                                    <div class="card-body">
                                        <div class="row mt-3 text-center">
                                            <div class="col-sm-4">
                                                <label class="form-label">From Date</label>
                                                <input class="form-control" type="date" name="fromdateintrasituser" id="fromdateintrasituser">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label">To Date</label>
                                                <input class="form-control" type="date" name="todateintrasituser" id="todateintrasituser">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="btn btn-primary m-5 pt-3" type="submit" name="filterintrasituser" value="Search" id="filterintrasituser">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="display" id="bookingintrasituser">
                                            <thead>
                                                 <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                   <th>Consignee Name</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                     <th>Status</th>
                                                         <th>Delivery Date</th>
                                                           <th>Action</th>
                                              
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div id="rto" class="container tab-pane"><br>
                                    <div class="card-body">
                                        <div class="row mt-3 text-center">
                                            <div class="col-sm-4">
                                                <label class="form-label">From Date</label>
                                                <input class="form-control" type="date" name="fromdatertouser" id="fromdatertouser">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label">To Date</label>
                                                <input class="form-control" type="date" name="todatertouser" id="todatertouser">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="btn btn-primary m-5 pt-3" type="submit" name="filterrtouser" value="Search" id="filterrtouser">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="display" id="bookingrtouser">
                                            <thead>
                                                 <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                   <th>Consignee Name</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                    <th>Status</th>
                                                         <th>Delivery Date</th>
                                                           <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div id="notdelivered" class="container tab-pane"><br>
                                    <div class="card-body">
                                        <div class="row mt-3 text-center">
                                            <div class="col-sm-4">
                                                <label class="form-label">From Date</label>
                                                <input class="form-control" type="date" name="fromdatenotdelivereduser" id="fromdatenotdelivereduser">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label">To Date</label>
                                                <input class="form-control" type="date" name="todatenotdelivereduser" id="todatenotdelivereduser">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="btn btn-primary m-5 pt-3" type="submit" name="filternotdelivereduser" value="Search" id="filternotdelivereduser">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="display" id="bookingnotdelivereduser">
                                            <thead>
                                                 <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                    <th>Consignee Name</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                    <th>Status</th>
                                                            <th>Delivery Date</th>
                                                              <th>Action</th>
                                             </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div id="reacheddestination" class="container tab-pane"><br>
                                    <div class="card-body">
                                        <div class="row mt-3 text-center">
                                            <div class="col-sm-4">
                                                <label class="form-label">From Date</label>
                                                <input class="form-control" type="date" name="fromdatereacheddestinationuser" id="fromdatereacheddestinationuser">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="form-label">To Date</label>
                                                <input class="form-control" type="date" name="todatereacheddestinationuser" id="todatereacheddestinationuser">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="btn btn-primary m-5 pt-3" type="submit" name="filterreacheddestinationuser" value="Search" id="filterreacheddestinationuser">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="display" id="bookingreacheddestinationuser">
                                            <thead>
                                                 <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                    <th>Consignee Name</th>
                                                    <th>Courier Mode</th>
                                                    <th>Date</th>
                                                    <th>Booking number</th>
                                                    <th>Customer ID</th>
                                                    <th>Destination</th>
                                                    <th>Status</th>
                                                           <th>Delivery Date</th>
                                                           <th>Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
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
<script>
    $(document).ready(function() {
        var table = $('#bookingdb').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detaildb",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "username"
                },
                {
                    "data": "consignee_name"
                },
                   {
                    "data": "updated_by"
                },
                {
                    "data": "booking_mode"
                },
                {
                    "data": "courier_mode"
                },
                {
                    "data": "createdAt"
                }, {
                    "data": "customer_type"
                },
                {
                    "data": "booking_number"
                },
                {
                    "data": "customer_id"
                },
                {
                    "data": "destination"
                },
                {
                    "data": "weight"
                },
                {
                    "data": "volume_weight"
                },
                {
                    "data": "risk_charge"
                },
                {
                    "data": "amount"
                },
                {
                    "data": "product_value"
                },
                {
                    "data": "status"
                },
                {
                    "data": "out_status"
                },
                 {
                    "data": "delivery_date"
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
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.username + '</a>';
                    }
                },
                  {
                    targets: 2,
                    render: function(data, type, row) {
                        return row.consignee_name;
                    }
                },
                  {
                    targets: 3,
                    render: function(data, type, row) {
                        // return row.updated_by;
                        if(row.updated_by=="Admin") {
                        return '<span class="btn btn-sm btn-light-info font-weight-bolder"><a href="#" id="' + row.id + '" class="deli_review text-info">Admin</a></span>';
                        }
                        else{
                        return '<span class="btn btn-sm btn-light-danger font-weight-bolder"><a href="#" id="' + row.id + '" class="deli_review text-danger">User</a></span>';
                        }
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {

                        return row.booking_mode;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.courier_mode;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.createdAt;
                    }
                },
                    {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.customer_type;
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, row) {
                        return row.booking_number;
                    }
                },
                {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.customer_id;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        return row.destination;
                    }
                },
                {
                    targets: 11,
                    render: function(data, type, row) {
                        return row.weight;
                    }
                },
                {
                    targets: 12,
                    render: function(data, type, row) {
                        return row.volume_weight;
                    }
                },
                {
                    targets: 13,
                    render: function(data, type, row) {
                        return row.risk_charge;
                    }
                },
                {
                    targets: 14,
                    render: function(data, type, row) {
                        return row.amount;
                    }
                },
                {
                    targets: 15,
                    render: function(data, type, row) {
                        return row.product_value;
                    }
                },
                {
                    targets: 16,
                    render: function(data, type, row) {
                       if (row.status == 0 && row.out_status == 0 && row.In_transit == 0 && row.rto_status == 0 && row.notdev_status == 0 && row.des_status == 0) {
                            return '<span class="btn btn-sm btn-light-warning font-weight-bolder"><a href="#" id="' + row.id + '" class="btn text-warning">New Request</a></span>';
                        } else if (row.status == 1) {
                            return '<span class="btn btn-sm btn-light-success font-weight-bolder"><a href="#" id="' + row.id + '" class="deli_review text-success">Delivered</a></span>';
                        } else if (row.out_status == 1) {
                            return '<span class="btn btn-sm btn-light-warning font-weight-bolder"><a href="#" id="' + row.id + '" class="out_review text-warning">Out of Delivery</a></span>';
                        } else if (row.In_transit == 1) {
                            return '<span class="btn btn-sm btn-light-primary font-weight-bolder"><a href="#" id="' + row.id + '" class="intra_review text-primary">In transit</a></span>';
                        } else if (row.rto_status == 1) {
                            return '<span class="btn btn-sm btn-light-info font-weight-bolder"><a href="#" id="' + row.id + '" class="rto_review text-info">RTO</a></span>';
                        } else if (row.notdev_status == 1) {
                            return '<span class="btn btn-sm btn-light-danger font-weight-bolder"><a href="#" id="' + row.id + '" class="notdeli_review text-danger">Not delivered</a></span>';
                        } else if (row.des_status == 1) {
                            return '<span class="btn btn-sm btn-light-dark font-weight-bolder"><a href="#" id="' + row.id + '" class="reachdest_review text-dark">Reached destination</a></span>';
                        }
                    }
                },
                 {
                    targets: 17,
                    render: function(data, type, row) {
                        return row.delivery_date;
                    }
                },
                {
                    targets: 18,
                    render: function(data, type, row) {
                        // alert(row.status)
                        return '<div style="display:inline-block !important;width:100px !important"><a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="delete_user mr-2" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a><a href="#" id="' + row.id + '" class="deliverydetail" title="Delivery" data-toggle="modal" data-target="#delivery_id"><i class="fa fa-cog" aria-hidden="true"></i></a>  <a href="#" id="' + row.id + '" class="complaintdetail" title="Complaint" data-toggle="modal" data-target="#complainta_id"><i class="fa fa-comments" aria-hidden="true"></i></a><a href="customerbill.php?id='+row.id+'" target="_blank" class="p-2"><i class="fa fa-print"></i></a></div>';
                        // return '<div style="display:inline-block !important;width:100px !important"><a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="delete_user mr-2" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a><div class="dropdown dropdown-inline"><a href="#" class="mr-2" data-toggle="dropdown"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/></g></svg></span></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">Choose an action:</li><li class="navi-item"><a href="#" id="' + row.id + '" class="undeli_review text-success">Delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unout_review btn text-success">Out for delivery</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unintra_review btn text-success">In transit</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unrto_review btn text-success">RTO</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unnotdeli_review btn text-success">Not delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unreachdest_review btn text-success">Reached destination</a></li></ul></div></div> <a href="#" id="' + row.id + '" class="complaintdetail" title="Complaint" data-toggle="modal" data-target="#complaint_id"><i class="fa fa-comments" aria-hidden="true"></i></a></div>';
                    }
                    //<div class="dropdown dropdown-inline"><a href="#" class="mr-2" data-toggle="dropdown"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/></g></svg></span></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">Choose an action:</li><li class="navi-item"><a href="#" id="' + row.id + '" class="undeli_review text-success">Delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unout_review btn text-success">Out for delivery</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unintra_review btn text-success">In transit</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unrto_review btn text-success">RTO</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unnotdeli_review btn text-success">Not delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unreachdest_review btn text-success">Reached destination</a></li></ul></div></div> 
                    
                }
            ]
        });

        // $("#filterall").on("click", function() {
        //     var from = $("#fromdateall").val();
        //     var to = $("#todateall").val();

        //     if (from != "" && to != "") {
        //         table.ajax.url("ajax_request.php?action=fetch_branch_detaildb&from=" + from + '&to=' + to).load();
        //         table.ajax.reload();
        //     } else {
        //         table.ajax.url("ajax_request.php?action=fetch_branch_detaildb").load();
        //         table.ajax.reload();
        //     }

        // });
        
           $("#role").on("change",function(){
            // var role=$("#role").val();
           var role=  $('#role :selected').val();
            if(role!=""){
                table.ajax.url("ajax_request.php?action=fetch_branch_detaildb&role="+role).load();
                table.ajax.reload();
            } 
            else{
               table.ajax.url("ajax_request.php?action=fetch_branch_detaildb").load();
                table.ajax.reload();
                 
            }
        });
        
           
           $("#courier").on("change",function(){
            // var courier=$("#courier").val();
               var courier=  $('#courier :selected').val();
            //   alert(courier)
        if(courier!=""){
                table.ajax.url("ajax_request.php?action=fetch_branch_detaildb&courier="+courier).load();
                table.ajax.reload();
            } 
            else{
               table.ajax.url("ajax_request.php?action=fetch_branch_detaildb").load();
                table.ajax.reload();
                 
            }
        });
        
            $("#namea").on("change",function(){
            // var courier=$("#courier").val();
               var name=  $('#namea').val();
            //   alert(courier)
        if(name!=""){
                table.ajax.url("ajax_request.php?action=fetch_branch_detaildb&name="+name).load();
                table.ajax.reload();
            } 
            else{
               table.ajax.url("ajax_request.php?action=fetch_branch_detaildb").load();
                table.ajax.reload();
                 
            }
        });
        
        $("#delivestatus").on("change",function(){
            // var courier=$("#courier").val();
               var delivestatus=  $('#delivestatus').val();
            //   alert(courier)
        if(delivestatus!=""){
                table.ajax.url("ajax_request.php?action=fetch_branch_detaildb&delstatus="+delivestatus).load();
                table.ajax.reload();
            } 
            else{
               table.ajax.url("ajax_request.php?action=fetch_branch_detaildb").load();
                table.ajax.reload();
                 
            }
        });
       
     
        
        
    });
var roles=$("#role").val();
var couriers=$("#courier").val();
var names=$("#namea").val();
   var from = $("#fromdateall").val();
            var to = $("#todateall").val();

    var tableall = $('#excelall').DataTable({
        "bInfo" : false,
    "paging": false,
    "ordering": false,
    "searching": false,
        "processing": true,
        "responsive": true,
        "ajax": {
            "url": "ajax_request.php?action=fetch_branch_detaildb",
            "type": "POST",
       },
        "columns": [
            {
                "data": "si_no"
            },
            {
                "data": "username"
            },
            {
                "data": "consignee_name"
            },
            {
                "data": "updated_by"
            },
               {
                "data": "booking_mode"
            },
            {
                "data": "courier_mode"
            },
         
            {
                "data": "createdAt"
            },
             {
                "data": "customer_type"
            },
            {
                "data": "booking_number"
            },
            {
                "data": "customer_id"
            },
            {
                "data": "destination"
            },
            {
                "data": "weight"
            },
            {
                "data": "volume_weight"
            },
            {
                "data": "risk_charge"
            },
            {
                "data": "amount"
            },
            {
                "data": "product_value"
            },
             {
                "data": "delivery_date"
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
                    return row.username;
                }
            },
            {
                targets: 2,
                render: function(data, type, row) {
                    return row.consignee_name;
                }
            },
            {
                targets: 3,
                render: function(data, type, row) {
 if(row.updated_by=="Admin") {
                        return 'Admin';
                        }
                        else{
                        return 'User';
                        }   }
            },
            {
                targets: 4,
                render: function(data, type, row) {
                    return row.booking_mode;
                }
            },
            {
                targets: 5,
                render: function(data, type, row) {
                    return row.courier_mode;
                }
            },
            {
                targets: 6,
                render: function(data, type, row) {
                    return row.createdAt;
                }
            },
            {
                targets: 7,
                render: function(data, type, row) {
                    return row.customer_type;
                }
            },
            
            {
                targets: 8,
                render: function(data, type, row) {
                    return row.booking_number;
                }
            },
            {
                targets: 9,
                render: function(data, type, row) {
                    return row.customer_id;
                }
            },
            {
                targets: 10,
                render: function(data, type, row) {
                    return row.destination;
                }
            },
            {
                targets: 11,
                render: function(data, type, row) {
                    return row.weight;
                }
            },
            {
                targets: 12,
                render: function(data, type, row) {
                    return row.volume_weight;
                }
            },
            {
                targets: 13,
                render: function(data, type, row) {
                    return row.risk_charge;
                }
            },
            {
                targets: 14,
                render: function(data, type, row) {
                    return row.amount;
                }
            },
            {
                targets: 15,
                render: function(data, type, row) {
                    return row.product_value;
                }
            },
            {
                    targets: 16,
                    render: function(data, type, row) {
                       if (row.status == 0 && row.out_status == 0 && row.In_transit == 0 && row.rto_status == 0 && row.notdev_status == 0 && row.des_status == 0) {
                            return 'New Request';
                        } else if (row.status == 1) {
                            return 'Delivered';
                        } else if (row.out_status == 1) {
                            return 'Out of Delivery';
                        } else if (row.In_transit == 1) {
                            return 'In transit';
                        } else if (row.rto_status == 1) {
                            return 'RTO';
                        } else if (row.notdev_status == 1) {
                            return 'Not delivered';
                        } else if (row.des_status == 1) {
                            return 'Reached destination';
                        }
                    }
                },
                  {
                    targets: 17,
                    render: function(data, type, row) {
                        return row.delivery_date;
                    }
                }
                  ]
    });

    $("#todateall").on("change", function() {
        var from = $("#fromdateall").val();
        var to = $("#todateall").val();
alert(from+" "+to+"hi")
        if (from != "" && to != "") {
            tableall.ajax.url("ajax_request.php?action=fetch_branch_detaildb&from=" + from + '&to=' + to).load();
            tableall.ajax.reload();
        } else {
            tableall.ajax.url("ajax_request.php?action=fetch_branch_detaildb").load();
            tableall.ajax.reload();
        }

    });

</script>
<script>
    $(document).ready(function() {
        var tabledelivered = $('#bookingdelivered').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailbookingdelivered",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "username"
                },
                 {
                    "data": "consignee_name"
                },
                {
                    "data": "document_type"
                },
                {
                    "data": "booking_mode"
                },
                {
                    "data": "courier_mode"
                },
                {
                    "data": "createdAt"
                },
                {
                    "data": "customer_type"
                },
                {
                    "data": "from_address"
                },
                {
                    "data": "from_contact"
                },
                {
                    "data": "to_name"
                },
                {
                    "data": "to_address"
                },
                {
                    "data": "to_contact"
                },
                {
                    "data": "booking_number"
                },
                {
                    "data": "customer_id"
                },
                {
                    "data": "destination"
                },
                {
                    "data": "weight"
                },
                {
                    "data": "volume_weight"
                },
                {
                    "data": "risk_charge"
                },
                {
                    "data": "amount"
                },
                {
                    "data": "product_value"
                }
                ,
                {
                    "data": "status"
                },
                 {
                    "data": "delivery_date"
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
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.username + '</a>';
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, row) {
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.consignee_name + '</a>';
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {
                        return row.document_type;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {

                        return row.booking_mode;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.courier_mode;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.createdAt;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.customer_type;
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, row) {
                        return row.from_address;
                    }
                },
                {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.from_contact;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        return row.to_name;
                    }
                },
                {
                    targets: 11,
                    render: function(data, type, row) {
                        return row.to_address;
                    }
                },
                {
                    targets: 12,
                    render: function(data, type, row) {
                        return row.to_contact;
                    }
                },
                {
                    targets: 13,
                    render: function(data, type, row) {
                        return row.booking_number;
                    }
                },
                {
                    targets: 14,
                    render: function(data, type, row) {
                        return row.customer_id;
                    }
                },
                {
                    targets: 15,
                    render: function(data, type, row) {
                        return row.destination;
                    }
                },
                {
                    targets: 16,
                    render: function(data, type, row) {
                        return row.weight;
                    }
                },
                {
                    targets: 17,
                    render: function(data, type, row) {
                        return row.volume_weight;
                    }
                },
                {
                    targets: 18,
                    render: function(data, type, row) {
                        return row.risk_charge;
                    }
                },
                {
                    targets: 19,
                    render: function(data, type, row) {
                        return row.amount;
                    }
                },
                {
                    targets: 20,
                    render: function(data, type, row) {
                        return row.product_value;
                    }
                },
                {
                    targets: 21,
                    render: function(data, type, row) {
                         if (row.status == 1) {
                            return '<span class="btn btn-sm btn-light-success font-weight-bolder"><a href="#" id="' + row.id + '" class="text-success">Delivered</a></span>';
                        }
                    }
                },
                  {
                    targets: 22,
                    render: function(data, type, row) {
                        return row.delivery_date;
                    }
                },
                   {
                    targets: 23,
                    render: function(data, type, row) {
                        return '<div style="display:inline-block !important;width:100px !important"><a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="delete_user mr-2" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a><a href="#" id="' + row.id + '" class="deliverydetail" title="Delivery" data-toggle="modal" data-target="#delivery_id1"><i class="fa fa-cog" aria-hidden="true"></i></a> <a href="#" id="' + row.id + '" class="complaintdetail" title="Complaint" data-toggle="modal" data-target="#complaintadel_id"><i class="fa fa-comments" aria-hidden="true"></i></a>  <a href="#" id="' + row.id + '" class="docs p-2" title="Document" data-toggle="modal" data-target="#docs_id"><i class="fa fa-file" aria-hidden="true"></i></a></div>';
                    }
                },
            ]
        });

        $("#filterdelivered").on("click", function() {
            var from = $("#fromdelivered").val();
            var to = $("#todelivered").val();

            if (from != "" && to != "") {
                tabledelivered.ajax.url("ajax_request.php?action=fetch_branch_detailbookingdelivered&from=" + from + '&to=' + to).load();
                tabledelivered.ajax.reload();
            } else {
                tabledelivered.ajax.url("ajax_request.php?action=fetch_branch_detailbookingdelivered").load();
                tabledelivered.ajax.reload();
            }

        });
    });
</script>
<script>
    $(document).ready(function() {
        var tableoutfordelivery = $('#bookingoutfordelivery').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailbookingoutfordelivery",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "username"
                },
                 {
                    "data": "consignee_name"
                },
                {
                    "data": "document_type"
                },
                {
                    "data": "booking_mode"
                },
                {
                    "data": "courier_mode"
                },
                {
                    "data": "createdAt"
                },
                {
                    "data": "customer_type"
                },
                {
                    "data": "from_address"
                },
                {
                    "data": "from_contact"
                },
                {
                    "data": "to_name"
                },
                {
                    "data": "to_address"
                },
                {
                    "data": "to_contact"
                },
                {
                    "data": "booking_number"
                },
                {
                    "data": "customer_id"
                },
                {
                    "data": "destination"
                },
                {
                    "data": "weight"
                },
                {
                    "data": "volume_weight"
                },
                {
                    "data": "risk_charge"
                },
                {
                    "data": "amount"
                },
                {
                    "data": "product_value"
                }
                ,
                {
                    "data": "out_status"
                },
                  {
                    "data": "delivery_date"
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
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.username + '</a>';
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, row) {
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.consignee_name + '</a>';
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {
                        return row.document_type;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {

                        return row.booking_mode;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.courier_mode;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.createdAt;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.customer_type;
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, row) {
                        return row.from_address;
                    }
                },
                {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.from_contact;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        return row.to_name;
                    }
                },
                {
                    targets: 11,
                    render: function(data, type, row) {
                        return row.to_address;
                    }
                },
                {
                    targets: 12,
                    render: function(data, type, row) {
                        return row.to_contact;
                    }
                },
                {
                    targets: 13,
                    render: function(data, type, row) {
                        return row.booking_number;
                    }
                },
                {
                    targets: 14,
                    render: function(data, type, row) {
                        return row.customer_id;
                    }
                },
                {
                    targets: 15,
                    render: function(data, type, row) {
                        return row.destination;
                    }
                },
                {
                    targets: 16,
                    render: function(data, type, row) {
                        return row.weight;
                    }
                },
                {
                    targets: 17,
                    render: function(data, type, row) {
                        return row.volume_weight;
                    }
                },
                {
                    targets: 18,
                    render: function(data, type, row) {
                        return row.risk_charge;
                    }
                },
                {
                    targets: 19,
                    render: function(data, type, row) {
                        return row.amount;
                    }
                },
                {
                    targets: 20,
                    render: function(data, type, row) {
                        return row.product_value;
                    }
                },
                {
                    targets: 21,
                    render: function(data, type, row) {
                         if (row.out_status == 1) {
                            return '<span class="btn btn-sm btn-light-warning font-weight-bolder"><a href="#" id="' + row.id + '" class="text-warning">Out For Delivery</a></span>';
                        }
                    }
                },
                  {
                    targets: 22,
                    render: function(data, type, row) {
                        return row.delivery_date;
                    }
                },
                {
                    targets: 23,
                    render: function(data, type, row) {
                 return '<div style="display:inline-block !important;width:100px !important"><a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="delete_user mr-2" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a><a href="#" id="' + row.id + '" class="deliverydetail" title="Delivery" data-toggle="modal" data-target="#delivery_id2"><i class="fa fa-cog" aria-hidden="true"></i></a> <a href="#" id="' + row.id + '" class="complaintdetail" title="Complaint" data-toggle="modal" data-target="#complaintaodel_id"><i class="fa fa-comments" aria-hidden="true"></i></a> </div>';
                          }
                },
            ]
        });

        $("#filteroutfordelivery").on("click", function() {
            var from = $("#fromdateoutfordelivery").val();
            var to = $("#todateoutfordelivery").val();

            if (from != "" && to != "") {
                tableoutfordelivery.ajax.url("ajax_request.php?action=fetch_branch_detailbookingoutfordelivery&from=" + from + '&to=' + to).load();
                tableoutfordelivery.ajax.reload();
            } else {
                tableoutfordelivery.ajax.url("ajax_request.php?action=fetch_branch_detailbookingoutfordelivery").load();
                tableoutfordelivery.ajax.reload();
            }

        });
    });
</script>
<script>
    $(document).ready(function() {
        var tableintra = $('#bookingintrasit').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailbookingintrasit",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                 {
                    "data": "consignee_name"
                },
                {
                    "data": "username"
                },
                {
                    "data": "document_type"
                },
                {
                    "data": "booking_mode"
                },
                {
                    "data": "courier_mode"
                },
                {
                    "data": "createdAt"
                },
                {
                    "data": "customer_type"
                },
                {
                    "data": "from_address"
                },
                {
                    "data": "from_contact"
                },
                {
                    "data": "to_name"
                },
                {
                    "data": "to_address"
                },
                {
                    "data": "to_contact"
                },
                {
                    "data": "booking_number"
                },
                {
                    "data": "customer_id"
                },
                {
                    "data": "destination"
                },
                {
                    "data": "weight"
                },
                {
                    "data": "volume_weight"
                },
                {
                    "data": "risk_charge"
                },
                {
                    "data": "amount"
                },
                {
                    "data": "product_value"
                }
                ,
                {
                    "data": "In_transit"
                },
                  {
                    "data": "delivery_date"
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
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.username + '</a>';
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, row) {
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.consignee_name + '</a>';
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {
                        return row.document_type;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {

                        return row.booking_mode;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.courier_mode;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.createdAt;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.customer_type;
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, row) {
                        return row.from_address;
                    }
                },
                {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.from_contact;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        return row.to_name;
                    }
                },
                {
                    targets: 11,
                    render: function(data, type, row) {
                        return row.to_address;
                    }
                },
                {
                    targets: 12,
                    render: function(data, type, row) {
                        return row.to_contact;
                    }
                },
                {
                    targets: 13,
                    render: function(data, type, row) {
                        return row.booking_number;
                    }
                },
                {
                    targets: 14,
                    render: function(data, type, row) {
                        return row.customer_id;
                    }
                },
                {
                    targets: 15,
                    render: function(data, type, row) {
                        return row.destination;
                    }
                },
                {
                    targets: 16,
                    render: function(data, type, row) {
                        return row.weight;
                    }
                },
                {
                    targets: 17,
                    render: function(data, type, row) {
                        return row.volume_weight;
                    }
                },
                {
                    targets: 18,
                    render: function(data, type, row) {
                        return row.risk_charge;
                    }
                },
                {
                    targets: 19,
                    render: function(data, type, row) {
                        return row.amount;
                    }
                },
                {
                    targets: 20,
                    render: function(data, type, row) {
                        return row.product_value;
                    }
                },
                {
                    targets: 21,
                    render: function(data, type, row) {
                         if (row.In_transit == 1) {
                            return '<span class="btn btn-sm btn-light-primary font-weight-bolder"><a href="#" id="' + row.id + '" class="text-primary">In transit</a></span>';
                        }
                    }
                },
                 {
                    targets: 22,
                    render: function(data, type, row) {
                        return row.delivery_date;
                    }
                },
                 {
                    targets: 23,
                    render: function(data, type, row) {
                   return '<div style="display:inline-block !important;width:100px !important"><a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="delete_user mr-2" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a><a href="#" id="' + row.id + '" class="deliverydetail" title="Delivery" data-toggle="modal" data-target="#delivery_id3"><i class="fa fa-cog" aria-hidden="true"></i></a>  <a href="#" id="' + row.id + '" class="complaintdetail" title="Complaint" data-toggle="modal" data-target="#complaintaint_id"><i class="fa fa-comments" aria-hidden="true"></i></a></div>';
  }
                },
            ]
        });

        $("#filterintrasit").on("click", function() {
            var from = $("#fromdateintrasit").val();
            var to = $("#todateintrasit").val();

            if (from != "" && to != "") {
                tableintra.ajax.url("ajax_request.php?action=fetch_branch_detailbookingintrasit&from=" + from + '&to=' + to).load();
                tableintra.ajax.reload();
            } else {
                tableintra.ajax.url("ajax_request.php?action=fetch_branch_detailbookingintrasit").load();
                tableintra.ajax.reload();
            }

        });
    });
</script>
 <script>
    $(document).ready(function() {
        var tablerto = $('#bookingrto').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailbookingrto",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "username"
                },
                 {
                    "data": "consignee_name"
                },
                {
                    "data": "document_type"
                },
                {
                    "data": "booking_mode"
                },
                {
                    "data": "courier_mode"
                },
                {
                    "data": "createdAt"
                },
                {
                    "data": "customer_type"
                },
                {
                    "data": "from_address"
                },
                {
                    "data": "from_contact"
                },
                {
                    "data": "to_name"
                },
                {
                    "data": "to_address"
                },
                {
                    "data": "to_contact"
                },
                {
                    "data": "booking_number"
                },
                {
                    "data": "customer_id"
                },
                {
                    "data": "destination"
                },
                {
                    "data": "weight"
                },
                {
                    "data": "volume_weight"
                },
                {
                    "data": "risk_charge"
                },
                {
                    "data": "amount"
                },
                {
                    "data": "product_value"
                }
                ,
                {
                    "data": "rto_status"
                },
                  {
                    "data": "delivery_date"
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
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.username + '</a>';
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, row) {
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.consignee_name + '</a>';
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {
                        return row.document_type;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {

                        return row.booking_mode;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.courier_mode;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.createdAt;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.customer_type;
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, row) {
                        return row.from_address;
                    }
                },
                {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.from_contact;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        return row.to_name;
                    }
                },
                {
                    targets: 11,
                    render: function(data, type, row) {
                        return row.to_address;
                    }
                },
                {
                    targets: 12,
                    render: function(data, type, row) {
                        return row.to_contact;
                    }
                },
                {
                    targets: 13,
                    render: function(data, type, row) {
                        return row.booking_number;
                    }
                },
                {
                    targets: 14,
                    render: function(data, type, row) {
                        return row.customer_id;
                    }
                },
                {
                    targets: 15,
                    render: function(data, type, row) {
                        return row.destination;
                    }
                },
                {
                    targets: 16,
                    render: function(data, type, row) {
                        return row.weight;
                    }
                },
                {
                    targets: 17,
                    render: function(data, type, row) {
                        return row.volume_weight;
                    }
                },
                {
                    targets: 18,
                    render: function(data, type, row) {
                        return row.risk_charge;
                    }
                },
                {
                    targets: 19,
                    render: function(data, type, row) {
                        return row.amount;
                    }
                },
                {
                    targets: 20,
                    render: function(data, type, row) {
                        return row.product_value;
                    }
                },
                {
                    targets: 21,
                    render: function(data, type, row) {
                         if (row.rto_status == 1) {
                            return '<span class="btn btn-sm btn-light-info font-weight-bolder"><a href="#" id="' + row.id + '" class=" text-info">RTO</a></span>';
                        }
                    }
                },
                 {
                    targets: 22,
                    render: function(data, type, row) {
                        return row.delivery_date;
                    }
                },
                 {
                    targets: 23,
                    render: function(data, type, row) {
                   return '<div style="display:inline-block !important;width:100px !important"><a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="delete_user mr-2" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a><a href="#" id="' + row.id + '" class="deliverydetail" title="Delivery" data-toggle="modal" data-target="#delivery_id4"><i class="fa fa-cog" aria-hidden="true"></i></a> <a href="#" id="' + row.id + '" class="complaintdetail" title="Complaint" data-toggle="modal" data-target="#complaintarto_id"><i class="fa fa-comments" aria-hidden="true"></i></a> </div>';
  }
                },
            ]
        });

        $("#filterrto").on("click", function() {
            var from = $("#fromdaterto").val();
            var to = $("#todaterto").val();

            if (from != "" && to != "") {
                tablerto.ajax.url("ajax_request.php?action=fetch_branch_detailbookingrto&from=" + from + '&to=' + to).load();
                tablerto.ajax.reload();
            } else {
                tablerto.ajax.url("ajax_request.php?action=fetch_branch_detailbookingrto").load();
                tablerto.ajax.reload();
            }

        });
    });
</script>
<script>
    $(document).ready(function() {
        var tablenotdelivered = $('#bookingnotdelivered').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailbookingnotdelivered",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "username"
                },
                 {
                    "data": "consignee_name"
                },
                {
                    "data": "document_type"
                },
                {
                    "data": "booking_mode"
                },
                {
                    "data": "courier_mode"
                },
                {
                    "data": "createdAt"
                },
                {
                    "data": "customer_type"
                },
                {
                    "data": "from_address"
                },
                {
                    "data": "from_contact"
                },
                {
                    "data": "to_name"
                },
                {
                    "data": "to_address"
                },
                {
                    "data": "to_contact"
                },
                {
                    "data": "booking_number"
                },
                {
                    "data": "customer_id"
                },
                {
                    "data": "destination"
                },
                {
                    "data": "weight"
                },
                {
                    "data": "volume_weight"
                },
                {
                    "data": "risk_charge"
                },
                {
                    "data": "amount"
                },
                {
                    "data": "product_value"
                },
                {
                    "data": "notdev_status"
                },
                  {
                    "data": "delivery_date"
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
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.username + '</a>';
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, row) {
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.consignee_name + '</a>';
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {
                        return row.document_type;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {

                        return row.booking_mode;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.courier_mode;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.createdAt;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.customer_type;
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, row) {
                        return row.from_address;
                    }
                },
                {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.from_contact;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        return row.to_name;
                    }
                },
                {
                    targets: 11,
                    render: function(data, type, row) {
                        return row.to_address;
                    }
                },
                {
                    targets: 12,
                    render: function(data, type, row) {
                        return row.to_contact;
                    }
                },
                {
                    targets: 13,
                    render: function(data, type, row) {
                        return row.booking_number;
                    }
                },
                {
                    targets: 14,
                    render: function(data, type, row) {
                        return row.customer_id;
                    }
                },
                {
                    targets: 15,
                    render: function(data, type, row) {
                        return row.destination;
                    }
                },
                {
                    targets: 16,
                    render: function(data, type, row) {
                        return row.weight;
                    }
                },
                {
                    targets: 17,
                    render: function(data, type, row) {
                        return row.volume_weight;
                    }
                },
                {
                    targets: 18,
                    render: function(data, type, row) {
                        return row.risk_charge;
                    }
                },
                {
                    targets: 19,
                    render: function(data, type, row) {
                        return row.amount;
                    }
                },
                {
                    targets: 20,
                    render: function(data, type, row) {
                        return row.product_value;
                    }
                },
                {
                    targets: 21,
                    render: function(data, type, row) {
                         if (row.notdev_status == 1) {
                            return '<span class="btn btn-sm btn-light-danger font-weight-bolder"><a href="#" id="' + row.id + '" class="text-danger">Not Delivered</a></span>';
                        }
                    }
                },
                   {
                    targets: 22,
                    render: function(data, type, row) {
                        return row.delivery_date;
                    }
                },
                {
                    targets: 23,
                    render: function(data, type, row) {
                   return '<div style="display:inline-block !important;width:100px !important"><a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="delete_user mr-2" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a><a href="#" id="' + row.id + '" class="deliverydetail" title="Delivery" data-toggle="modal" data-target="#delivery_id5"><i class="fa fa-cog" aria-hidden="true"></i></a> <a href="#" id="' + row.id + '" class="complaintdetail" title="Complaint" data-toggle="modal" data-target="#complaintand_id"><i class="fa fa-comments" aria-hidden="true"></i></a> </div>';
  }
                },
            ]
        });

        $("#filternotdelivered").on("click", function() {
            var from = $("#fromdatenotdelivered").val();
            var to = $("#todatenotdelivered").val();

            if (from != "" && to != "") {
                tablenotdelivered.ajax.url("ajax_request.php?action=fetch_branch_detailbookingnotdelivered&from=" + from + '&to=' + to).load();
                tablenotdelivered.ajax.reload();
            } else {
                tablenotdelivered.ajax.url("ajax_request.php?action=fetch_branch_detailbookingnotdelivered").load();
                tablenotdelivered.ajax.reload();
            }

        });
    });
</script>
<script>
    $(document).ready(function() {
        var tablereacheddestination= $('#bookingreacheddestination').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailbookingreacheddestination",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "username"
                },
                 {
                    "data": "consignee_name"
                },
                {
                    "data": "document_type"
                },
                {
                    "data": "booking_mode"
                },
                {
                    "data": "courier_mode"
                },
                {
                    "data": "createdAt"
                },
                {
                    "data": "customer_type"
                },
                {
                    "data": "from_address"
                },
                {
                    "data": "from_contact"
                },
                {
                    "data": "to_name"
                },
                {
                    "data": "to_address"
                },
                {
                    "data": "to_contact"
                },
                {
                    "data": "booking_number"
                },
                {
                    "data": "customer_id"
                },
                {
                    "data": "destination"
                },
                {
                    "data": "weight"
                },
                {
                    "data": "volume_weight"
                },
                {
                    "data": "risk_charge"
                },
                {
                    "data": "amount"
                },
                {
                    "data": "product_value"
                }
                ,
                {
                    "data": "des_status"
                },
                  {
                    "data": "delivery_date"
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
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.username + '</a>';
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, row) {
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.consignee_name + '</a>';
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {
                        return row.document_type;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {

                        return row.booking_mode;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.courier_mode;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.createdAt;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.customer_type;
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, row) {
                        return row.from_address;
                    }
                },
                {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.from_contact;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        return row.to_name;
                    }
                },
                {
                    targets: 11,
                    render: function(data, type, row) {
                        return row.to_address;
                    }
                },
                {
                    targets: 12,
                    render: function(data, type, row) {
                        return row.to_contact;
                    }
                },
                {
                    targets: 13,
                    render: function(data, type, row) {
                        return row.booking_number;
                    }
                },
                {
                    targets: 14,
                    render: function(data, type, row) {
                        return row.customer_id;
                    }
                },
                {
                    targets: 15,
                    render: function(data, type, row) {
                        return row.destination;
                    }
                },
                {
                    targets: 16,
                    render: function(data, type, row) {
                        return row.weight;
                    }
                },
                {
                    targets: 17,
                    render: function(data, type, row) {
                        return row.volume_weight;
                    }
                },
                {
                    targets: 18,
                    render: function(data, type, row) {
                        return row.risk_charge;
                    }
                },
                {
                    targets: 19,
                    render: function(data, type, row) {
                        return row.amount;
                    }
                },
                {
                    targets: 20,
                    render: function(data, type, row) {
                        return row.product_value;
                    }
                },
                {
                    targets: 21,
                    render: function(data, type, row) {
                         if (row.des_status == 1) {
                            return '<span class="btn btn-sm btn-light-dark font-weight-bolder"><a href="#" id="' + row.id + '" class="text-dark">Reach desination</a></span>';
                        }
                    }
                },
                  {
                    targets: 22,
                    render: function(data, type, row) {
                        return row.delivery_date;
                    }
                },
                {
                    targets: 23,
                    render: function(data, type, row) {
                   return '<div style="display:inline-block !important;width:100px !important"><a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="delete_user mr-2" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a><a href="#" id="' + row.id + '" class="deliverydetail" title="Delivery" data-toggle="modal" data-target="#delivery_id6"><i class="fa fa-cog" aria-hidden="true"></i></a> <a href="#" id="' + row.id + '" class="complaintdetail" title="Complaint" data-toggle="modal" data-target="#complaintard_id"><i class="fa fa-comments" aria-hidden="true"></i></a> </div>';
  }
                },
            ]
        });

        $("#filterreacheddestination").on("click", function() {
            var from = $("#fromdatereacheddestination").val();
            var to = $("#todatereacheddestination").val();

            if (from != "" && to != "") {
                tablereacheddestination.ajax.url("ajax_request.php?action=fetch_branch_detailbookingreacheddestination&from=" + from + '&to=' + to).load();
                tablereacheddestination.ajax.reload();
            } else {
                tablereacheddestination.ajax.url("ajax_request.php?action=fetch_branch_detailbookingreacheddestination").load();
                tablereacheddestination.ajax.reload();
            }

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#bookingdb').on('click', '.delete_user', function() {
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
                            "action": "delete_userdb",
                            "delete_userdb_id": id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                                $('#bookingdb').DataTable().ajax.reload();
                                $('#bookingdelivered').DataTable().ajax.reload();
                                $('#bookingoutfordelivery').DataTable().ajax.reload();
                                $('#bookingintrasit').DataTable().ajax.reload();
                                $('#bookingrto').DataTable().ajax.reload();
                                $('#bookingnotdelivered').DataTable().ajax.reload();
                                $('#bookingreacheddestination').DataTable().ajax.reload();
                            }
                        }
                    });
                } else {

                }
            });

        });
        
        $('#bookingdelivered').on('click', '.delete_user', function() {
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
                            "action": "delete_userdb",
                            "delete_userdb_id": id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                                $('#bookingdb').DataTable().ajax.reload();
                                $('#bookingdelivered').DataTable().ajax.reload();
                                $('#bookingoutfordelivery').DataTable().ajax.reload();
                                $('#bookingintrasit').DataTable().ajax.reload();
                                $('#bookingrto').DataTable().ajax.reload();
                                $('#bookingnotdelivered').DataTable().ajax.reload();
                                $('#bookingreacheddestination').DataTable().ajax.reload();
                            }
                        }
                    });
                } else {

                }
            });

        });
        
        $('#bookingoutfordelivery').on('click', '.delete_user', function() {
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
                            "action": "delete_userdb",
                            "delete_userdb_id": id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                                $('#bookingdb').DataTable().ajax.reload();
                                $('#bookingdelivered').DataTable().ajax.reload();
                                $('#bookingoutfordelivery').DataTable().ajax.reload();
                                $('#bookingintrasit').DataTable().ajax.reload();
                                $('#bookingrto').DataTable().ajax.reload();
                                $('#bookingnotdelivered').DataTable().ajax.reload();
                                $('#bookingreacheddestination').DataTable().ajax.reload();
                            }
                        }
                    });
                } else {

                }
            });

        });

   $('#bookingintrasit').on('click', '.delete_user', function() {
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
                            "action": "delete_userdb",
                            "delete_userdb_id": id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                                $('#bookingdb').DataTable().ajax.reload();
                                $('#bookingdelivered').DataTable().ajax.reload();
                                $('#bookingoutfordelivery').DataTable().ajax.reload();
                                $('#bookingintrasit').DataTable().ajax.reload();
                                $('#bookingrto').DataTable().ajax.reload();
                                $('#bookingnotdelivered').DataTable().ajax.reload();
                                $('#bookingreacheddestination').DataTable().ajax.reload();
                            }
                        }
                    });
                } else {

                }
            });

        });
  $('#bookingrto').on('click', '.delete_user', function() {
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
                            "action": "delete_userdb",
                            "delete_userdb_id": id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                                $('#bookingdb').DataTable().ajax.reload();
                                $('#bookingdelivered').DataTable().ajax.reload();
                                $('#bookingoutfordelivery').DataTable().ajax.reload();
                                $('#bookingintrasit').DataTable().ajax.reload();
                                $('#bookingrto').DataTable().ajax.reload();
                                $('#bookingnotdelivered').DataTable().ajax.reload();
                                $('#bookingreacheddestination').DataTable().ajax.reload();
                            }
                        }
                    });
                } else {

                }
            });

        });

   $('#bookingnotdelivered').on('click', '.delete_user', function() {
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
                            "action": "delete_userdb",
                            "delete_userdb_id": id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                                $('#bookingdb').DataTable().ajax.reload();
                                $('#bookingdelivered').DataTable().ajax.reload();
                                $('#bookingoutfordelivery').DataTable().ajax.reload();
                                $('#bookingintrasit').DataTable().ajax.reload();
                                $('#bookingrto').DataTable().ajax.reload();
                                $('#bookingnotdelivered').DataTable().ajax.reload();
                                $('#bookingreacheddestination').DataTable().ajax.reload();
                            }
                        }
                    });
                } else {

                }
            });

        });
  
    $('#bookingreacheddestination').on('click', '.delete_user', function() {
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
                            "action": "delete_userdb",
                            "delete_userdb_id": id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                                $('#bookingdb').DataTable().ajax.reload();
                                $('#bookingdelivered').DataTable().ajax.reload();
                                $('#bookingoutfordelivery').DataTable().ajax.reload();
                                $('#bookingintrasit').DataTable().ajax.reload();
                                $('#bookingrto').DataTable().ajax.reload();
                                $('#bookingnotdelivered').DataTable().ajax.reload();
                                $('#bookingreacheddestination').DataTable().ajax.reload();
                            }
                        }
                    });
                } else {

                }
            });

        });
    });
</script>
<?php
$dat=date('Y-m-d')."T";
$dat.=date("H:i");

?>
<script>
    $(document).ready(function() {
           $('#bookingdb').on('click', '.complaintdetail', function() {
                // e.preventDefault();
    
            var id = $(this).attr('id');
            // alert(id)
            $('#complaintdetaila_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "complaintidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].Complaint_id !== "") {
                        $('#complaintstatusupdatea').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complaint_id" id="Complaint_id" placeholder="Enter Complaint" value="'+result_job.data[0].Complaint_id+'"><input type="text" class="form-control" name="cid" id="cid" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compa_id" id="compa_id">Submit</button></div>');
                    // $('#complaintstatusupdate').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8">' + result_job.data[0].Complaint_id + '</div>');
                    } else {
                        $('#complaintstatusupdatea').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complaint_id" id="Complaint_id" placeholder="Enter Complaint" ><input type="text" class="form-control" name="cid" id="cid" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compa_id" id="compa_id">Submit</button></div>');
                    }
                }
            });

        });
        
        
        
         $('#bookingdelivered').on('click', '.complaintdetail', function() {
            var id = $(this).attr('id');
            // alert(id)
            $('#complaintdetail_idadel').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "complaintidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].Complaint_id !== "") {
                              $('#complaintstatusupdateadel').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complainta1_id" id="Complainta1_id" placeholder="Enter Complaint" value="'+result_job.data[0].Complaint_id+'"><input type="text" class="form-control" name="cida1" id="cida1" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compadel_id" id="compadel_id">Submit</button></div>');
                    } else {
                        $('#complaintstatusupdateadel').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complainta1_id" id="Complainta1_id" placeholder="Enter Complaint" ><input type="text" class="form-control" name="cida1" id="cida1" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compadel_id" id="compadel_id">Submit</button></div>');
                    }
                }
            });

        });
        
           $('#bookingdelivered').on('click', '.docs', function() {
                // alert("hello")
         var id = $(this).attr('id');
           $('#docid').val(id);
        
            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "documentidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].document != "") {
                        $('#documentupload').html('<div class="col-lg-4"><b>Document</b></div><div class="col-lg-8"><input type="file" class="form-control" name="docsid" id="docsid" placeholder="Upload Document" ><input type="hidden" class="form-control" name="docid" id="docid" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="doc_id" id="doc_id">Submit</button><a href='+result_job.data[0].document +' download target="_blank" class="btn btn-primary">Download</a><br/><br/></div></div>');
               } else {
                        $('#documentupload').html('<div class="col-lg-4"><b>Document</b></div><div class="col-lg-8"><input type="file" class="form-control" name="docsid" id="docsid" placeholder="Upload Document" ><input type="hidden" class="form-control" name="docid" id="docid" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="doc_id" id="doc_id">Submit</button></div>');
                    }
                }
            });

        });
        
        $('#bookingoutfordelivery').on('click', '.complaintdetail', function() {
            var id = $(this).attr('id');
            // alert(id)
            $('#complaintdetail_idaodel').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "complaintidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].Complaint_id !== "") {
                         $('#complaintstatusupdateaodel').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complainta2_id" id="Complainta2_id" placeholder="Enter Complaint"  value="'+result_job.data[0].Complaint_id+'"><input type="text" class="form-control" name="cida2" id="cida2" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compaodel_id" id="compaodel_id">Submit</button></div>');
                  } else {
                        $('#complaintstatusupdateaodel').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complainta2_id" id="Complainta2_id" placeholder="Enter Complaint" ><input type="text" class="form-control" name="cida2" id="cida2" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compaodel_id" id="compaodel_id">Submit</button></div>');
                    }
                }
            });

        });
        
         $('#bookingintrasit').on('click', '.complaintdetail', function() {
            var id = $(this).attr('id');
            // alert(id)
            $('#complaintdetail_idaint').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "complaintidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].Complaint_id !== "") {
                         $('#complaintstatusupdateaint').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complainta3_id" id="Complainta3_id" placeholder="Enter Complaint"  value="'+result_job.data[0].Complaint_id+'"><input type="text" class="form-control" name="cida3" id="cida3" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compaint_id" id="compaint_id">Submit</button></div>');
                  } else {
                        $('#complaintstatusupdateaint').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complainta3_id" id="Complainta3_id" placeholder="Enter Complaint" ><input type="text" class="form-control" name="cida3" id="cida3" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compaint_id" id="compaint_id">Submit</button></div>');
                    }
                }
            });

        });
        
         $('#bookingrto').on('click', '.complaintdetail', function() {
            var id = $(this).attr('id');
            // alert(id)
            $('#complaintdetail_idarto').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "complaintidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].Complaint_id !== "") {
                         $('#complaintstatusupdatearto').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complainta4_id" id="Complainta4_id" placeholder="Enter Complaint"  value="'+result_job.data[0].Complaint_id+'"><input type="text" class="form-control" name="cida4" id="cida4" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="comparto_id" id="comparto_id">Submit</button></div>');
                  } else {
                        $('#complaintstatusupdatearto').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complainta4_id" id="Complainta4_id" placeholder="Enter Complaint" ><input type="text" class="form-control" name="cida4" id="cida4" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="comparto_id" id="comparto_id">Submit</button></div>');
                    }
                }
            });

        });
    
          $('#bookingnotdelivered').on('click', '.complaintdetail', function() {
            var id = $(this).attr('id');
            // alert(id)
            $('#complaintdetail_idand').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "complaintidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].Complaint_id !== "") {
                         $('#complaintstatusupdateand').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complainta5_id" id="Complainta5_id" placeholder="Enter Complaint"  value="'+result_job.data[0].Complaint_id+'"><input type="text" class="form-control" name="cida5" id="cida5" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compand_id" id="compand_id">Submit</button></div>');
                  } else {
                        $('#complaintstatusupdateand').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complainta5_id" id="Complainta5_id" placeholder="Enter Complaint" ><input type="text" class="form-control" name="cida5" id="cida5" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compand_id" id="compand_id">Submit</button></div>');
                    }
                }
            });

        });
       
          $('#bookingreacheddestination').on('click', '.complaintdetail', function() {
            var id = $(this).attr('id');
            // alert(id)
            $('#complaintdetail_idard').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "complaintidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].Complaint_id !== "") {
                         $('#complaintstatusupdateard').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complainta6_id" id="Complainta6_id" placeholder="Enter Complaint"  value="'+result_job.data[0].Complaint_id+'"><input type="text" class="form-control" name="cida6" id="cida6" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compard_id" id="compard_id">Submit</button></div>');
                  } else {
                        $('#complaintstatusupdateard').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complainta6_id" id="Complainta6_id" placeholder="Enter Complaint" ><input type="text" class="form-control" name="cida6" id="cida6" value='+id+' placeholder="Enter Id" ></div></div><br><div class="wrap"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compard_id" id="compard_id">Submit</button></div>');
                    }
                }
            });

        });
      
    });
    
    
      $(document).ready(function() {
        $('#bookingdb').on('click', '.deliverydetail', function() {
        //  alert(dat);
         var id = $(this).attr('id');
            // alert(id)
           $('#deliverydetail_id').val(id);
           
            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliveryidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    
                  delname = result_job.data[0].delivery_statusname;
                  delstat = result_job.data[0].delivery_status;
                  deli_dat=result_job.data[0].delivery_dat;  // alert(delname+' '+delstat);
                  if(deli_dat!=''){
                       var dat1 = deli_dat;
                  }
                  else{
                       var dat1 = '<?php echo $dat ?>';
                  }
                  
                    // if (delname=="status") {
                    //   $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus"><option value="1" selected>New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'><input type="text" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="deli_id" id="submit">Submit</button></div>');
                    //  } 
                    //   else
                     if (delname=="status") {
                        $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="1" selected>Delivered</option><option value="Out of delivery">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deli_id">Submit</button></div>');
                     } 
                     else if(delname=="out_status") {
                        $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="Out of delivery" selected>Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deli_id">Submit</button></div>');
                     } 
                   else if (delname=="In_transit") {
                        $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="In Transit" selected>In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deli_id">Submit</button></div>');
                     } 
                    else if (delname=="rto_status") {
                      $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="RTO" selected>RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+' id="dat"  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deli_id">Submit</button></div>');
                     } 
                    else if (delname=="notdev_status") {
                      $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="Not Delivery" selected>Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deli_id">Submit</button></div>');
                     } 
                     else if (delname=="des_status") {
                      $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="Destination" selected>Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deli_id">Submit</button></div>');
                     } 
                     else{
                           $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="New Request" selected>New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" class="form-control mt-4" value='+dat1+' id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deli_id">Submit</button></div>');
                   
                     }
                               }
            });

        });
   
   
       $('#bookingdelivered').on('click', '.deliverydetail', function() {
        //  alert(dat);
         var id = $(this).attr('id');
            // alert(id)
           $('#deliverydetail_idd').val(id);
           
            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliveryidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    
                  delname = result_job.data[0].delivery_statusname;
                  delstat = result_job.data[0].delivery_status;
                  deli_dat=result_job.data[0].delivery_dat;  // alert(delname+' '+delstat);
                  if(deli_dat!=''){
                       var dat1 = deli_dat;
                  }
                  else{
                       var dat1 = '<?php echo $dat ?>';
                  }
                     if (delname=="status") {
                        $('#deliverystatusupdatedel').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="1" selected>Delivered</option><option value="Out of delivery">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliveryid">Submit</button></div>');
                     } 
                     else if(delname=="out_status") {
                        $('#deliverystatusupdatedel').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="Out of delivery" selected>Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliveryid">Submit</button></div>');
                     } 
                   else if (delname=="In_transit") {
                        $('#deliverystatusupdatedel').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="In Transit" selected>In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliveryid">Submit</button></div>');
                     } 
                    else if (delname=="rto_status") {
                      $('#deliverystatusupdatedel').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="RTO" selected>RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+' id="dat"  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryid">Submit</button></div>');
                     } 
                    else if (delname=="notdev_status") {
                      $('#deliverystatusupdatedel').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="Not Delivery" selected>Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryid">Submit</button></div>');
                     } 
                     else if (delname=="des_status") {
                      $('#deliverystatusupdatedel').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="Destination" selected>Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryid">Submit</button></div>');
                     } 
                     else{
                           $('#deliverystatusupdatedel').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="New Request" selected>New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" class="form-control mt-4" value='+dat1+' id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryid">Submit</button></div>');
                   
                     }
                 }
            });

        });
     
       $('#bookingoutfordelivery').on('click', '.deliverydetail', function() {
        //  alert(dat);
         var id = $(this).attr('id');
            // alert(id)
           $('#deliverydetail_idout').val(id);
           
            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliveryidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    
                  delname = result_job.data[0].delivery_statusname;
                  delstat = result_job.data[0].delivery_status;
                  deli_dat=result_job.data[0].delivery_dat;  // alert(delname+' '+delstat);
                  if(deli_dat!=''){
                       var dat1 = deli_dat;
                  }
                  else{
                       var dat1 = '<?php echo $dat ?>';
                  }
                     if (delname=="status") {
                        $('#deliverystatusupdateout').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="1" selected>Delivered</option><option value="Out of delivery">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliveryout">Submit</button></div>');
                     } 
                     else if(delname=="out_status") {
                        $('#deliverystatusupdateout').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="Out of delivery" selected>Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliveryout">Submit</button></div>');
                     } 
                   else if (delname=="In_transit") {
                        $('#deliverystatusupdateout').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="In Transit" selected>In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliveryout">Submit</button></div>');
                     } 
                    else if (delname=="rto_status") {
                      $('#deliverystatusupdateout').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="RTO" selected>RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+' id="dat"  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryout">Submit</button></div>');
                     } 
                    else if (delname=="notdev_status") {
                      $('#deliverystatusupdateout').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="Not Delivery" selected>Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryout">Submit</button></div>');
                     } 
                     else if (delname=="des_status") {
                      $('#deliverystatusupdateout').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="Destination" selected>Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryout">Submit</button></div>');
                     } 
                     else{
                           $('#deliverystatusupdateout').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="New Request" selected>New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" class="form-control mt-4" value='+dat1+' id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryout">Submit</button></div>');
                   
                     }
                                 }
            });

        });
        
         $('#bookingintrasit').on('click', '.deliverydetail', function() {
        //  alert(dat);
         var id = $(this).attr('id');
            // alert(id)
           $('#deliverydetail_idint').val(id);
           
            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliveryidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    
                  delname = result_job.data[0].delivery_statusname;
                  delstat = result_job.data[0].delivery_status;
                  deli_dat=result_job.data[0].delivery_dat;  // alert(delname+' '+delstat);
                  if(deli_dat!=''){
                       var dat1 = deli_dat;
                  }
                  else{
                       var dat1 = '<?php echo $dat ?>';
                  }
                  
                    if (delname=="status") {
                        $('#deliverystatusupdateint').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="1" selected>Delivered</option><option value="Out of delivery">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliveryint">Submit</button></div>');
                     } 
                     else if(delname=="out_status") {
                        $('#deliverystatusupdateint').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="Out of delivery" selected>Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliveryint">Submit</button></div>');
                     } 
                   else if (delname=="In_transit") {
                        $('#deliverystatusupdateint').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="In Transit" selected>In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliveryint">Submit</button></div>');
                     } 
                    else if (delname=="rto_status") {
                      $('#deliverystatusupdateint').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="RTO" selected>RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+' id="dat"  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryint">Submit</button></div>');
                     } 
                    else if (delname=="notdev_status") {
                      $('#deliverystatusupdateint').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="Not Delivery" selected>Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryint">Submit</button></div>');
                     } 
                     else if (delname=="des_status") {
                      $('#deliverystatusupdateint').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="Destination" selected>Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryint">Submit</button></div>');
                     } 
                     else{
                           $('#deliverystatusupdateint').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="New Request" selected>New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" class="form-control mt-4" value='+dat1+' id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryint">Submit</button></div>');
                   
                     }
                     }
            });

        });
      
        
          $('#bookingrto').on('click', '.deliverydetail', function() {
      
      
        //  alert(dat);
         var id = $(this).attr('id');
            // alert(id)
           $('#deliverydetail_idrto').val(id);
           
            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliveryidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    
                  delname = result_job.data[0].delivery_statusname;
                  delstat = result_job.data[0].delivery_status;
                  deli_dat=result_job.data[0].delivery_dat;  // alert(delname+' '+delstat);
                  if(deli_dat!=''){
                       var dat1 = deli_dat;
                  }
                  else{
                       var dat1 = '<?php echo $dat ?>';
                  }
                     if (delname=="status") {
                        $('#deliverystatusupdaterto').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="1" selected>Delivered</option><option value="Out of delivery">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliveryrto">Submit</button></div>');
                     } 
                     else if(delname=="out_status") {
                        $('#deliverystatusupdaterto').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="Out of delivery" selected>Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliveryrto">Submit</button></div>');
                     } 
                   else if (delname=="In_transit") {
                        $('#deliverystatusupdaterto').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="In Transit" selected>In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliveryrto">Submit</button></div>');
                     } 
                    else if (delname=="rto_status") {
                      $('#deliverystatusupdaterto').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="RTO" selected>RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+' id="dat"  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryrto">Submit</button></div>');
                     } 
                    else if (delname=="notdev_status") {
                      $('#deliverystatusupdaterto').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="Not Delivery" selected>Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryrto">Submit</button></div>');
                     } 
                     else if (delname=="des_status") {
                      $('#deliverystatusupdaterto').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="Destination" selected>Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryrto">Submit</button></div>');
                     } 
                     else{
                           $('#deliverystatusupdaterto').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="New Request" selected>New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" class="form-control mt-4" value='+dat1+' id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryrto">Submit</button></div>');
                   
                     }
                     }
            });

        });
      
            $('#bookingnotdelivered').on('click', '.deliverydetail', function() {
        //  alert(dat);
         var id = $(this).attr('id');
            // alert(id)
           $('#deliverydetail_idnd').val(id);
           
            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliveryidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    
                  delname = result_job.data[0].delivery_statusname;
                  delstat = result_job.data[0].delivery_status;
                  deli_dat=result_job.data[0].delivery_dat;  // alert(delname+' '+delstat);
                  if(deli_dat!=''){
                       var dat1 = deli_dat;
                  }
                  else{
                       var dat1 = '<?php echo $dat ?>';
                  }
                      if (delname=="status") {
                        $('#deliverystatusupdatend').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="1" selected>Delivered</option><option value="Out of delivery">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliverynotdel">Submit</button></div>');
                     } 
                     else if(delname=="out_status") {
                        $('#deliverystatusupdatend').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="Out of delivery" selected>Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliverynotdel">Submit</button></div>');
                     } 
                   else if (delname=="In_transit") {
                        $('#deliverystatusupdatend').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="In Transit" selected>In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliverynotdel">Submit</button></div>');
                     } 
                    else if (delname=="rto_status") {
                      $('#deliverystatusupdatend').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="RTO" selected>RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+' id="dat"  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliverynotdel">Submit</button></div>');
                     } 
                    else if (delname=="notdev_status") {
                      $('#deliverystatusupdatend').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="Not Delivery" selected>Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliverynotdel">Submit</button></div>');
                     } 
                     else if (delname=="des_status") {
                      $('#deliverystatusupdatend').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="Destination" selected>Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliverynotdel">Submit</button></div>');
                     } 
                     else{
                           $('#deliverystatusupdatend').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="New Request" selected>New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" class="form-control mt-4" value='+dat1+' id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliverynotdel">Submit</button></div>');
                   
                     }
                 }
            });

        });
      
                    $('#bookingreacheddestination').on('click', '.deliverydetail', function() {
        //  alert(dat);
         var id = $(this).attr('id');
            // alert(id)
           $('#deliverydetail_idrd').val(id);
           
            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliveryidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    
                  delname = result_job.data[0].delivery_statusname;
                  delstat = result_job.data[0].delivery_status;
                  deli_dat=result_job.data[0].delivery_dat;  // alert(delname+' '+delstat);
                  if(deli_dat!=''){
                       var dat1 = deli_dat;
                  }
                  else{
                       var dat1 = '<?php echo $dat ?>';
                  }
                     if (delname=="status") {
                        $('#deliverystatusupdaterd').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="1" selected>Delivered</option><option value="Out of delivery">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliveryrea">Submit</button></div>');
                     } 
                     else if(delname=="out_status") {
                        $('#deliverystatusupdaterd').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="Out of delivery" selected>Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliveryrea">Submit</button></div>');
                     } 
                   else if (delname=="In_transit") {
                        $('#deliverystatusupdaterd').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="In Transit" selected>In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deliveryrea">Submit</button></div>');
                     } 
                    else if (delname=="rto_status") {
                      $('#deliverystatusupdaterd').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="RTO" selected>RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+' id="dat"  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryrea">Submit</button></div>');
                     } 
                    else if (delname=="notdev_status") {
                      $('#deliverystatusupdaterd').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="Not Delivery" selected>Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryrea">Submit</button></div>');
                     } 
                     else if (delname=="des_status") {
                      $('#deliverystatusupdaterd').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="Destination" selected>Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryrea">Submit</button></div>');
                     } 
                     else{
                           $('#deliverystatusupdaterd').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="New Request" selected>New Request</option><option value="0">Delivered</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" class="form-control mt-4" value='+dat1+' id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_id" id="deliveryrea">Submit</button></div>');
                   
                     }
                }
            });

        });
      
    });
  

</script>
<script>
    function ExportToExcel(type, fn, dl) {
        var tab = document.getElementById('excelall'); // id of table
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





<script>
    $(document).ready(function() {
        var tableuser = $('#bookingdbuser').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detaildbuser&branch=<?= $branch ?>&&username=<?= $username ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "username"
                },
                  {
                    "data": "consignee_name"
                },
                {
                    "data": "courier_mode"
                },
                {
                    "data": "createdAt"
                },
               {
                    "data": "booking_number"
                },
                {
                    "data": "customer_id"
                },
                {
                    "data": "destination"
                },
               {
                    "data": "status"
                },
                {
                    "data": "out_status"
                },
                     {
                    "data": "delivery_date"
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
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.username + '</a>';
                    }
                },
                  {
                    targets: 2,
                    render: function(data, type, row) {
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.consignee_name + '</a>';
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {
                        return row.courier_mode;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {
                        return row.createdAt;
                    }
                },
                              {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.booking_number;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.customer_id;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.destination;
                    }
                },
                               {
                    targets: 8,
                    render: function(data, type, row) {
                        if (row.status == 0 && row.out_status == 0 && row.In_transit == 0 && row.rto_status == 0 && row.notdev_status == 0 && row.des_status == 0) {
                            return '<span class="btn btn-sm btn-light-warning font-weight-bolder"><a href="#" id="' + row.id + '" class="btn text-warning">New Request</a></span>';
                        } else if (row.status == 1) {
                            return '<span class="btn btn-sm btn-light-success font-weight-bolder"><a href="#" id="' + row.id + '" class="deli_review text-success">Delivered</a></span>';
                        } else if (row.out_status == 1) {
                            return '<span class="btn btn-sm btn-light-warning font-weight-bolder"><a href="#" id="' + row.id + '" class="out_review text-warning">Out of Delivery</a></span>';
                        } else if (row.In_transit == 1) {
                            return '<span class="btn btn-sm btn-light-primary font-weight-bolder"><a href="#" id="' + row.id + '" class="intra_review text-primary">In transit</a></span>';
                        } else if (row.rto_status == 1) {
                            return '<span class="btn btn-sm btn-light-info font-weight-bolder"><a href="#" id="' + row.id + '" class="rto_review text-info">RTO</a></span>';
                        } else if (row.notdev_status == 1) {
                            return '<span class="btn btn-sm btn-light-danger font-weight-bolder"><a href="#" id="' + row.id + '" class="notdeli_review text-danger">Not delivered</a></span>';
                        } else if (row.des_status == 1) {
                            return '<span class="btn btn-sm btn-light-dark font-weight-bolder"><a href="#" id="' + row.id + '" class="reachdest_review text-dark">Reached destination</a></span>';
                        }
                    }
                },
                
                 {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.delivery_date;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        // alert(row.status)
                        return '<a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="btn btn-sm btn-clean btn-icon mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a> <a href="#" id="' + row.id + '" class="deliverydetailuser" title="Delivery" data-toggle="modal" data-target="#delivery_id"><i class="fa fa-cog" aria-hidden="true"></i></a>  <a href="#" id="' + row.id + '" class="complaintdetailuser btn btn-sm btn-clean btn-icon" title="Complaint" data-toggle="modal" data-target="#complaint_id"><i class="fa fa-comments" aria-hidden="true"></i></a>';
                     
                    // <div class="dropdown dropdown-inline"><a href="#" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/></g></svg></span></a> <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">Choose an action:</li><li class="navi-item"><a href="#" id="' + row.id + '" class="undeli_reviewuser btn text-success">Delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unout_reviewuser btn text-success">Out for delivery</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unintra_reviewuser btn text-success">In transit</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unrto_reviewuser btn text-success">RTO</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unnotdeli_reviewuser btn text-success">Not delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unreachdest_reviewuser btn text-success">Reached destination</a></li></ul></div></div>
                        // return '<div style="display:inline-block !important;width:100px !important"><a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="delete_user mr-2" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a> <a href="#" id="' + row.id + '" class="complaintdetail" title="Complaint" data-toggle="modal" data-target="#complaint_id"><i class="fa fa-comments" aria-hidden="true"></i></a></div>';
                       }
                }
            ]
        });
        
         $("#delivstatus").on("change",function(){
           var delstatus=  $('#delivstatus').val();
            if(delstatus!=""){
                tableuser.ajax.url("ajax_request.php?action=fetch_branch_detaildbuser&delstatus="+delstatus+"&branch=<?= $branch ?>").load();
                tableuser.ajax.reload();
            } 
            else{
               tableuser.ajax.url("ajax_request.php?action=fetch_branch_detaildbuser").load();
                tableuser.ajax.reload();
                 
            }
        });
    
        $("#filteralluser").on("click", function() {
            var from = $("#fromdatealluser").val();
            var to = $("#todatealluser").val();
       if (from != "" && to != "") {
                tableuser.ajax.url("ajax_request.php?action=fetch_branch_detaildbuser&branch=<?= $branch ?>&username=<?= $username ?>&from=" + from + '&to=' + to).load();
                tableuser.ajax.reload();
            } else {
                tableuser.ajax.url("ajax_request.php?action=fetch_branch_detaildbuser&branch=<?= $branch ?>&username=<?= $username ?>").load();
                tableuser.ajax.reload();
            }

        });
    });

    var tableall = $('#excelalluser').css("display", "none").DataTable({
        "processing": true,
        "responsive": true,
        "ajax": {
            "url": "ajax_request.php?action=fetch_branch_detaildbuser&branch=<?= $branch ?>&&username=<?= $username ?>",
            "type": "POST"
        },
        "columns": [{
                "data": "si_no"
            },
            {
                "data": "username"
            },
                {
                "data": "consignee_name"
            },
            {
                "data": "courier_mode"
            },
            {
                "data": "createdAt"
            },
            {
                "data": "booking_number"
            },
            {
                "data": "customer_id"
            },
            {
                "data": "destination"
            },
            {
                "data": "delivery_date"
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
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.name + '</a>';
                    }
                },
            {
                    targets: 2,
                    render: function(data, type, row) {
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.consignee_name + '</a>';
                    }
                },
             {
                targets: 3,
                render: function(data, type, row) {
                    return row.courier_mode;
                }
            },
            {
                targets: 4,
                render: function(data, type, row) {
                    return row.createdAt;
                }
            },
           
            {
                targets: 5,
                render: function(data, type, row) {
                    return row.booking_number;
                }
            },
            {
                targets: 6,
                render: function(data, type, row) {
                    return row.customer_id;
                }
            },
            {
                targets: 7,
                render: function(data, type, row) {
                    return row.destination;
                }
            },
               {
                targets: 8,
                render: function(data, type, row) {
                    return row.delivery_date;
                }
            }
        ]
    });

    $("#filteralluser").on("click", function() {
        var from = $("#fromdatealluser").val();
        var to = $("#todatealluser").val();

        if (from != "" && to != "") {
            tableall.ajax.url("ajax_request.php?action=fetch_branch_detaildb&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to).load();
            tableall.ajax.reload();
        } else {
            tableall.ajax.url("ajax_request.php?action=fetch_branch_detaildb&branch=<?= $branch ?>&&username=<?= $username ?>").load();
            tableall.ajax.reload();
        }

    });
</script>
<script>
    $(document).ready(function() {
        var tabledelivereduser = $('#bookingdelivereduser').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailbookingdelivereduser&branch=<?= $branch ?>&&username=<?= $username ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "username"
                },
                  {
                    "data": "consignee_name"
                },
                {
                    "data": "courier_mode"
                },
                {
                    "data": "createdAt"
                },
                {
                    "data": "booking_number"
                },
                {
                    "data": "customer_id"
                },
                {
                    "data": "destination"
                },
                {
                    "data": "status"
                },
                 {
                    "data": "delivery_date"
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
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.username + '</a>';
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, row) {
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.consignee_name + '</a>';
                    }
                },
              {
                    targets: 3,
                    render: function(data, type, row) {
                        return row.courier_mode;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {
                        return row.createdAt;
                    }
                },
               {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.booking_number;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.customer_id;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.destination;
                    }
                },
             {
                    targets: 8,
                    render: function(data, type, row) {
                               return '<span class="btn btn-sm btn-light-success font-weight-bolder"><a href="#" id="' + row.id + '" class="text-success">Delivered</a></span>';
                    
                    }
                },
                  {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.delivery_date;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        // alert(row.status)
                        return '<a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="btn btn-sm btn-clean btn-icon mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a> <a href="#" id="' + row.id + '" class="deliverydetailuser" title="Delivery" data-toggle="modal" data-target="#delivery_idu"><i class="fa fa-cog" aria-hidden="true"></i></a>  <a href="#" id="' + row.id + '" class="complaintdetailuser btn btn-sm btn-clean btn-icon" title="Complaint" data-toggle="modal" data-target="#complaintudel_id"><i class="fa fa-comments" aria-hidden="true"></i></a>';
                     
                    // <div class="dropdown dropdown-inline"><a href="#" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/></g></svg></span></a> <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">Choose an action:</li><li class="navi-item"><a href="#" id="' + row.id + '" class="undeli_reviewuser btn text-success">Delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unout_reviewuser btn text-success">Out for delivery</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unintra_reviewuser btn text-success">In transit</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unrto_reviewuser btn text-success">RTO</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unnotdeli_reviewuser btn text-success">Not delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unreachdest_reviewuser btn text-success">Reached destination</a></li></ul></div></div>
                        // return '<div style="display:inline-block !important;width:100px !important"><a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="delete_user mr-2" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a> <a href="#" id="' + row.id + '" class="complaintdetail" title="Complaint" data-toggle="modal" data-target="#complaint_id"><i class="fa fa-comments" aria-hidden="true"></i></a></div>';
                       }
                }
            ]
        });

        $("#filterdelivereduser").on("click", function() {
            var from = $("#fromdelivereduser").val();
            var to = $("#todelivereduser").val();

            if (from != "" && to != "") {
                tabledelivereduser.ajax.url("ajax_request.php?action=fetch_branch_detailbookingdelivereduser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to).load();
                tabledelivereduser.ajax.reload();
            } else {
                tabledelivereduser.ajax.url("ajax_request.php?action=fetch_branch_detailbookingdelivereduser&branch=<?= $branch ?>&&username=<?= $username ?>").load();
                tabledelivereduser.ajax.reload();
            }

        });
    });
</script>
<script>
    $(document).ready(function() {
        var tableoutfordeliveryuser = $('#bookingoutfordeliveryuser').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailbookingoutfordeliveryuser&branch=<?= $branch ?>&&username=<?= $username ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "username"
                },
                {
                    "data": "consignee_name"
                },
               {
                    "data": "courier_mode"
                },
                {
                    "data": "createdAt"
                },
                   {
                    "data": "booking_number"
                },
                {
                    "data": "customer_id"
                },
                {
                    "data": "destination"
                },
                 {
                    "data": "out_status"
                },
                   {
                    "data": "delivery_date"
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
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.username + '</a>';
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, row) {
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.consignee_name + '</a>';
                    }
                },
                 {
                    targets: 3,
                    render: function(data, type, row) {
                        return row.courier_mode;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {
                        return row.createdAt;
                    }
                },
             
                {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.booking_number;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.customer_id;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.destination;
                    }
                },
                   {
                    targets: 8,
                    render: function(data, type, row) {
                        //  if (row.out_status == 1) {
                            return '<span class="btn btn-sm btn-light-warning font-weight-bolder"><a href="#" id="' + row.id + '" class="text-warning">Out For Delivery</a></span>';
                        // }
                    }
                },
                  {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.delivery_date;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        // alert(row.status)
                        return '<a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="btn btn-sm btn-clean btn-icon mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a> <a href="#" id="' + row.id + '" class="deliverydetailuser" title="Delivery" data-toggle="modal" data-target="#delivery_idod"><i class="fa fa-cog" aria-hidden="true"></i></a>  <a href="#" id="' + row.id + '" class="complaintdetailuser btn btn-sm btn-clean btn-icon" title="Complaint" data-toggle="modal" data-target="#complaintuodel_id"><i class="fa fa-comments" aria-hidden="true"></i></a>';
                     
                    // <div class="dropdown dropdown-inline"><a href="#" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/></g></svg></span></a> <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">Choose an action:</li><li class="navi-item"><a href="#" id="' + row.id + '" class="undeli_reviewuser btn text-success">Delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unout_reviewuser btn text-success">Out for delivery</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unintra_reviewuser btn text-success">In transit</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unrto_reviewuser btn text-success">RTO</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unnotdeli_reviewuser btn text-success">Not delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unreachdest_reviewuser btn text-success">Reached destination</a></li></ul></div></div>
                        // return '<div style="display:inline-block !important;width:100px !important"><a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="delete_user mr-2" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a> <a href="#" id="' + row.id + '" class="complaintdetail" title="Complaint" data-toggle="modal" data-target="#complaint_id"><i class="fa fa-comments" aria-hidden="true"></i></a></div>';
                       }
                }
            ]
        });

        $("#filteroutfordeliveryuser").on("click", function() {
            var from = $("#fromdateoutfordeliveryuser").val();
            var to = $("#todateoutfordeliveryuser").val();

            if (from != "" && to != "") {
                tableoutfordeliveryuser.ajax.url("ajax_request.php?action=fetch_branch_detailbookingoutfordeliveryuser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to).load();
                tableoutfordeliveryuser.ajax.reload();
            } else {
                tableoutfordeliveryuser.ajax.url("ajax_request.php?action=fetch_branch_detailbookingoutfordeliveryuser&branch=<?= $branch ?>&&username=<?= $username ?>").load();
                tableoutfordeliveryuser.ajax.reload();
            }

        });
    });
</script>
<script>
    $(document).ready(function() {
        var tableintrauser = $('#bookingintrasituser').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailbookingintrasituser&branch=<?= $branch ?>&&username=<?= $username ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "username"
                },
                  {
                    "data": "consignee_name"
                },
                {
                    "data": "courier_mode"
                },
                {
                    "data": "createdAt"
                },
                 {
                    "data": "booking_number"
                },
                {
                    "data": "customer_id"
                },
                {
                    "data": "destination"
                },
                {
                    "data": "In_transit"
                },
                {
                    "data": "delivery_date"
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
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.username + '</a>';
                    }
                },
                 {
                    targets: 2,
                    render: function(data, type, row) {
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.consignee_name + '</a>';
                    }
                },
               {
                    targets: 3,
                    render: function(data, type, row) {
                        return row.courier_mode;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {
                        return row.createdAt;
                    }
                },
              
                {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.booking_number;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.customer_id;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.destination;
                    }
                },
              
                {
                    targets: 8,
                    render: function(data, type, row) {
                        //  if (row.In_transit == 1) {
                            return '<span class="btn btn-sm btn-light-primary font-weight-bolder"><a href="#" id="' + row.id + '" class="text-primary">In transit</a></span>';
                        // }
                    }
                },
                   {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.delivery_date;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        // alert(row.status)
                        return '<a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="btn btn-sm btn-clean btn-icon mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a> <a href="#" id="' + row.id + '" class="deliverydetailuser" title="Delivery" data-toggle="modal" data-target="#delivery_iduint"><i class="fa fa-cog" aria-hidden="true"></i></a>  <a href="#" id="' + row.id + '" class="complaintdetailuser btn btn-sm btn-clean btn-icon" title="Complaint" data-toggle="modal" data-target="#complaintuint_id"><i class="fa fa-comments" aria-hidden="true"></i></a>';
                     
                    // <div class="dropdown dropdown-inline"><a href="#" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/></g></svg></span></a> <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">Choose an action:</li><li class="navi-item"><a href="#" id="' + row.id + '" class="undeli_reviewuser btn text-success">Delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unout_reviewuser btn text-success">Out for delivery</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unintra_reviewuser btn text-success">In transit</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unrto_reviewuser btn text-success">RTO</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unnotdeli_reviewuser btn text-success">Not delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unreachdest_reviewuser btn text-success">Reached destination</a></li></ul></div></div>
                        // return '<div style="display:inline-block !important;width:100px !important"><a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="delete_user mr-2" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a> <a href="#" id="' + row.id + '" class="complaintdetail" title="Complaint" data-toggle="modal" data-target="#complaint_id"><i class="fa fa-comments" aria-hidden="true"></i></a></div>';
                       }
                }
            ]
        });

        $("#filterintrasituser").on("click", function() {
            var from = $("#fromdateintrasituser").val();
            var to = $("#todateintrasituser").val();

            if (from != "" && to != "") {
                tableintrauser.ajax.url("ajax_request.php?action=fetch_branch_detailbookingintrasituser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to).load();
                tableintrauser.ajax.reload();
            } else {
                tableintrauser.ajax.url("ajax_request.php?action=fetch_branch_detailbookingintrasituser&branch=<?= $branch ?>&&username=<?= $username ?>").load();
                tableintrauser.ajax.reload();
            }

        });
    });
</script>
<script>
    $(document).ready(function() {
        var tablertouser = $('#bookingrtouser').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailbookingrtouser&branch=<?= $branch ?>&&username=<?= $username ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "username"
                },
                  {
                    "data": "consignee_name"
                },
               {
                    "data": "courier_mode"
                },
                {
                    "data": "createdAt"
                },
                 {
                    "data": "booking_number"
                },
                {
                    "data": "customer_id"
                },
                {
                    "data": "destination"
                },
                 {
                    "data": "rto_status"
                },
                {
                    "data": "delivery_date"
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
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.username + '</a>';
                    }
                },
                   {
                    targets: 2,
                    render: function(data, type, row) {
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.consignee_name + '</a>';
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {
                        return row.courier_mode;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {
                        return row.createdAt;
                    }
                },
                    {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.booking_number;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.customer_id;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.destination;
                    }
                },
                     {
                    targets: 8,
                    render: function(data, type, row) {
                        //  if (row.rto_status == 1) {
                            return '<span class="btn btn-sm btn-light-info font-weight-bolder"><a href="#" id="' + row.id + '" class="text-info">RTO</a></span>';
                        // }
                    }
                },
                   {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.delivery_date;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        // alert(row.status)
                        return '<a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="btn btn-sm btn-clean btn-icon mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a> <a href="#" id="' + row.id + '" class="deliverydetailuser" title="Delivery" data-toggle="modal" data-target="#delivery_idurto"><i class="fa fa-cog" aria-hidden="true"></i></a>  <a href="#" id="' + row.id + '" class="complaintdetailuser btn btn-sm btn-clean btn-icon" title="Complaint" data-toggle="modal" data-target="#complainturto_id"><i class="fa fa-comments" aria-hidden="true"></i></a>';
                     
                    // <div class="dropdown dropdown-inline"><a href="#" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/></g></svg></span></a> <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">Choose an action:</li><li class="navi-item"><a href="#" id="' + row.id + '" class="undeli_reviewuser btn text-success">Delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unout_reviewuser btn text-success">Out for delivery</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unintra_reviewuser btn text-success">In transit</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unrto_reviewuser btn text-success">RTO</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unnotdeli_reviewuser btn text-success">Not delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unreachdest_reviewuser btn text-success">Reached destination</a></li></ul></div></div>
                        // return '<div style="display:inline-block !important;width:100px !important"><a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="delete_user mr-2" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a> <a href="#" id="' + row.id + '" class="complaintdetail" title="Complaint" data-toggle="modal" data-target="#complaint_id"><i class="fa fa-comments" aria-hidden="true"></i></a></div>';
                       }
                }
            ]
        });

        $("#filterrtouser").on("click", function() {
            var from = $("#fromdatertouser").val();
            var to = $("#todatertouser").val();

            if (from != "" && to != "") {
                tablertouser.ajax.url("ajax_request.php?action=fetch_branch_detailbookingrtouser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to).load();
                tablertouser.ajax.reload();
            } else {
                tablertouser.ajax.url("ajax_request.php?action=fetch_branch_detailbookingrtouser&branch=<?= $branch ?>&&username=<?= $username ?>").load();
                tablertouser.ajax.reload();
            }

        });
    });
</script>
<script>
    $(document).ready(function() {
        var tablenotdelivereduser = $('#bookingnotdelivereduser').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailbookingnotdelivereduser&branch=<?= $branch ?>&&username=<?= $username ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "username"
                },
                 {
                    "data": "consignee_name"
                },
                 {
                    "data": "courier_mode"
                },
                {
                    "data": "createdAt"
                },
                {
                    "data": "booking_number"
                },
                {
                    "data": "customer_id"
                },
                {
                    "data": "destination"
                },
                 {
                    "data": "notdev_status"
                },
                 {
                    "data": "delivery_date"
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
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.username + '</a>';
                    }
                },
                  {
                    targets: 2,
                    render: function(data, type, row) {
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.consignee_name + '</a>';
                    }
                },
               {
                    targets: 3,
                    render: function(data, type, row) {
                        return row.courier_mode;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {
                        return row.createdAt;
                    }
                },
                              {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.booking_number;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.customer_id;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.destination;
                    }
                },
             
                {
                    targets: 8,
                    render: function(data, type, row) {
                        //  if (row.notdev_status == 1) {
                            return '<span class="btn btn-sm btn-light-danger font-weight-bolder"><a href="#" id="' + row.id + '" class="text-danger">Not Delivered</a></span>';
                        // }
                    }
                },
                    {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.delivery_date;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        // alert(row.status)
                        return '<a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="btn btn-sm btn-clean btn-icon mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a> <a href="#" id="' + row.id + '" class="deliverydetailuser" title="Delivery" data-toggle="modal" data-target="#delivery_idund"><i class="fa fa-cog" aria-hidden="true"></i></a>  <a href="#" id="' + row.id + '" class="complaintdetailuser btn btn-sm btn-clean btn-icon" title="Complaint" data-toggle="modal" data-target="#complaintund_id"><i class="fa fa-comments" aria-hidden="true"></i></a>';
                     
                    // <div class="dropdown dropdown-inline"><a href="#" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/></g></svg></span></a> <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">Choose an action:</li><li class="navi-item"><a href="#" id="' + row.id + '" class="undeli_reviewuser btn text-success">Delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unout_reviewuser btn text-success">Out for delivery</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unintra_reviewuser btn text-success">In transit</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unrto_reviewuser btn text-success">RTO</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unnotdeli_reviewuser btn text-success">Not delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unreachdest_reviewuser btn text-success">Reached destination</a></li></ul></div></div>
                        // return '<div style="display:inline-block !important;width:100px !important"><a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="delete_user mr-2" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a> <a href="#" id="' + row.id + '" class="complaintdetail" title="Complaint" data-toggle="modal" data-target="#complaint_id"><i class="fa fa-comments" aria-hidden="true"></i></a></div>';
                       }
                }
            ]
        });

        $("#filternotdelivereduser").on("click", function() {
            var from = $("#fromdatenotdelivereduser").val();
            var to = $("#todatenotdelivereduser").val();

            if (from != "" && to != "") {
                tablenotdelivereduser.ajax.url("ajax_request.php?action=fetch_branch_detailbookingnotdelivereduser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to).load();
                tablenotdelivereduser.ajax.reload();
            } else {
                tablenotdelivereduser.ajax.url("ajax_request.php?action=fetch_branch_detailbookingnotdelivereduser&branch=<?= $branch ?>&&username=<?= $username ?>").load();
                tablenotdelivereduser.ajax.reload();
            }

        });
    });
</script>
<script>
    $(document).ready(function() {
        var tablereacheddestinationuser= $('#bookingreacheddestinationuser').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailbookingreacheddestinationuser&branch=<?= $branch ?>&&username=<?= $username ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "username"
                },
                 {
                    "data": "consignee_name"
                },
                {
                    "data": "courier_mode"
                },
                {
                    "data": "createdAt"
                },
                {
                    "data": "booking_number"
                },
                {
                    "data": "customer_id"
                },
                {
                    "data": "destination"
                },
                  {
                    "data": "des_status"
                },
                 {
                    "data": "delivery_date"
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
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.username + '</a>';
                    }
                },
                  {
                    targets: 2,
                    render: function(data, type, row) {
                        return '<a href="bookingformedit.php?id=' + row.id + '">' + row.consignee_name + '</a>';
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {
                        return row.courier_mode;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {
                        return row.createdAt;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.booking_number;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.customer_id;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.destination;
                    }
                },
            {
                    targets: 8,
                    render: function(data, type, row) {
                        //  if (row.des_status == 1) {
                            return '<span class="btn btn-sm btn-light-dark font-weight-bolder"><a href="#" id="' + row.id + '" class="text-dark">Reach desination</a></span>';
                        // }
                    }
                },
                  {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.delivery_date;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, row) {
                        // alert(row.status)
                        return '<a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="btn btn-sm btn-clean btn-icon mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a> <a href="#" id="' + row.id + '" class="deliverydetailuser" title="Delivery" data-toggle="modal" data-target="#delivery_idurd"><i class="fa fa-cog" aria-hidden="true"></i></a>  <a href="#" id="' + row.id + '" class="complaintdetailuser btn btn-sm btn-clean btn-icon" title="Complaint" data-toggle="modal" data-target="#complainturd_id"><i class="fa fa-comments" aria-hidden="true"></i></a>';
                     
                    // <div class="dropdown dropdown-inline"><a href="#" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/></g></svg></span></a> <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">Choose an action:</li><li class="navi-item"><a href="#" id="' + row.id + '" class="undeli_reviewuser btn text-success">Delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unout_reviewuser btn text-success">Out for delivery</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unintra_reviewuser btn text-success">In transit</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unrto_reviewuser btn text-success">RTO</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unnotdeli_reviewuser btn text-success">Not delivered</a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="unreachdest_reviewuser btn text-success">Reached destination</a></li></ul></div></div>
                        // return '<div style="display:inline-block !important;width:100px !important"><a href="bookingformedit.php?id=' + row.id + '" id="' + row.id + '" class="mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/></g></svg></span></a><a href="#" id="' + row.id + '" class="delete_user mr-2" title="Delete"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a> <a href="#" id="' + row.id + '" class="complaintdetail" title="Complaint" data-toggle="modal" data-target="#complaint_id"><i class="fa fa-comments" aria-hidden="true"></i></a></div>';
                       }
                }
            ]
        });

        $("#filterreacheddestinationuser").on("click", function() {
            var from = $("#fromdatereacheddestinationuser").val();
            var to = $("#todatereacheddestinationuser").val();

            if (from != "" && to != "") {
                tablereacheddestinationuser.ajax.url("ajax_request.php?action=fetch_branch_detailbookingreacheddestinationuser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to).load();
                tablereacheddestinationuser.ajax.reload();
            } else {
                tablereacheddestinationuser.ajax.url("ajax_request.php?action=fetch_branch_detailbookingreacheddestinationuser&branch=<?= $branch ?>&&username=<?= $username ?>").load();
                tablereacheddestinationuser.ajax.reload();
            }

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#bookingdbuser').on('click', '.undeli_reviewuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $.ajax({
                type: "POST",
                url: "ajax_request.php",
                data: {
                    "action": "undeli_approvaluser",
                    "id": id
                },
                dataType: "json",
                success: function(result_job) {
                    if (result_job.state == 1) {
                                $('#bookingdbuser').DataTable().ajax.reload();
                                $('#bookingdelivereduser').DataTable().ajax.reload();
                                $('#bookingoutfordeliveryuser').DataTable().ajax.reload();
                                $('#bookingintrasituser').DataTable().ajax.reload();
                                $('#bookingrtouser').DataTable().ajax.reload();
                                $('#bookingnotdelivereduser').DataTable().ajax.reload();
                                $('#bookingreacheddestinationuser').DataTable().ajax.reload();
                    }
                }
            })
        });
        $('#bookingdbuser').on('click', '.deli_reviewuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $.ajax({
                type: "POST",
                url: "ajax_request.php",
                data: {
                    "action": "deli_approvaluser",
                    "id": id
                },
                dataType: "json",
                success: function(result_job) {
                    if (result_job.state == 1) {
                                $('#bookingdbuser').DataTable().ajax.reload();
                                $('#bookingdelivereduser').DataTable().ajax.reload();
                                $('#bookingoutfordeliveryuser').DataTable().ajax.reload();
                                $('#bookingintrasituser').DataTable().ajax.reload();
                                $('#bookingrtouser').DataTable().ajax.reload();
                                $('#bookingnotdelivereduser').DataTable().ajax.reload();
                                $('#bookingreacheddestinationuser').DataTable().ajax.reload();
                    }
                }
            })
        });

        $('#bookingdbuser').on('click', '.out_reviewuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $.ajax({
                type: "POST",
                url: "ajax_request.php",
                data: {
                    "action": "out_approvaluser",
                    "id": id
                },
                dataType: "json",
                success: function(result_job) {
                    if (result_job.state == 1) {
                                $('#bookingdbuser').DataTable().ajax.reload();
                                $('#bookingdelivereduser').DataTable().ajax.reload();
                                $('#bookingoutfordeliveryuser').DataTable().ajax.reload();
                                $('#bookingintrasituser').DataTable().ajax.reload();
                                $('#bookingrtouser').DataTable().ajax.reload();
                                $('#bookingnotdelivereduser').DataTable().ajax.reload();
                                $('#bookingreacheddestinationuser').DataTable().ajax.reload();
                    }
                }
            })
        });
        $('#bookingdbuser').on('click', '.unout_reviewuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $.ajax({
                type: "POST",
                url: "ajax_request.php",
                data: {
                    "action": "unout_approvaluser",
                    "id": id
                },
                dataType: "json",
                success: function(result_job) {
                    if (result_job.state == 1) {
                                $('#bookingdbuser').DataTable().ajax.reload();
                                $('#bookingdelivereduser').DataTable().ajax.reload();
                                $('#bookingoutfordeliveryuser').DataTable().ajax.reload();
                                $('#bookingintrasituser').DataTable().ajax.reload();
                                $('#bookingrtouser').DataTable().ajax.reload();
                                $('#bookingnotdelivereduser').DataTable().ajax.reload();
                                $('#bookingreacheddestinationuser').DataTable().ajax.reload();
                    }
                }
            })
        });

        $('#bookingdbuser').on('click', '.intra_reviewuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $.ajax({
                type: "POST",
                url: "ajax_request.php",
                data: {
                    "action": "intra_approvaluser",
                    "id": id
                },
                dataType: "json",
                success: function(result_job) {
                    if (result_job.state == 1) {
                                $('#bookingdbuser').DataTable().ajax.reload();
                                $('#bookingdelivereduser').DataTable().ajax.reload();
                                $('#bookingoutfordeliveryuser').DataTable().ajax.reload();
                                $('#bookingintrasituser').DataTable().ajax.reload();
                                $('#bookingrtouser').DataTable().ajax.reload();
                                $('#bookingnotdelivereduser').DataTable().ajax.reload();
                                $('#bookingreacheddestinationuser').DataTable().ajax.reload();
                    }
                }
            })
        });
        $('#bookingdbuser').on('click', '.unintra_reviewuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $.ajax({
                type: "POST",
                url: "ajax_request.php",
                data: {
                    "action": "unintra_approvaluser",
                    "id": id
                },
                dataType: "json",
                success: function(result_job) {
                    if (result_job.state == 1) {
                                $('#bookingdbuser').DataTable().ajax.reload();
                                $('#bookingdelivereduser').DataTable().ajax.reload();
                                $('#bookingoutfordeliveryuser').DataTable().ajax.reload();
                                $('#bookingintrasituser').DataTable().ajax.reload();
                                $('#bookingrtouser').DataTable().ajax.reload();
                                $('#bookingnotdelivereduser').DataTable().ajax.reload();
                                $('#bookingreacheddestinationuser').DataTable().ajax.reload();
                    }
                }
            })
        });

        $('#bookingdbuser').on('click', '.rto_reviewuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $.ajax({
                type: "POST",
                url: "ajax_request.php",
                data: {
                    "action": "rto_approvaluser",
                    "id": id
                },
                dataType: "json",
                success: function(result_job) {
                    if (result_job.state == 1) {
                                $('#bookingdbuser').DataTable().ajax.reload();
                                $('#bookingdelivereduser').DataTable().ajax.reload();
                                $('#bookingoutfordeliveryuser').DataTable().ajax.reload();
                                $('#bookingintrasituser').DataTable().ajax.reload();
                                $('#bookingrtouser').DataTable().ajax.reload();
                                $('#bookingnotdelivereduser').DataTable().ajax.reload();
                                $('#bookingreacheddestinationuser').DataTable().ajax.reload();
                    }
                }
            })
        });
        $('#bookingdbuser').on('click', '.unrto_reviewuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $.ajax({
                type: "POST",
                url: "ajax_request.php",
                data: {
                    "action": "unrto_approvaluser",
                    "id": id
                },
                dataType: "json",
                success: function(result_job) {
                    if (result_job.state == 1) {
                                $('#bookingdbuser').DataTable().ajax.reload();
                                $('#bookingdelivereduser').DataTable().ajax.reload();
                                $('#bookingoutfordeliveryuser').DataTable().ajax.reload();
                                $('#bookingintrasituser').DataTable().ajax.reload();
                                $('#bookingrtouser').DataTable().ajax.reload();
                                $('#bookingnotdelivereduser').DataTable().ajax.reload();
                                $('#bookingreacheddestinationuser').DataTable().ajax.reload();
                    }
                }
            })
        });
        
        $('#bookingdbuser').on('click', '.notdeli_reviewuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $.ajax({
                type: "POST",
                url: "ajax_request.php",
                data: {
                    "action": "notdeli_approvaluser",
                    "id": id
                },
                dataType: "json",
                success: function(result_job) {
                    if (result_job.state == 1) {
                                $('#bookingdbuser').DataTable().ajax.reload();
                                $('#bookingdelivereduser').DataTable().ajax.reload();
                                $('#bookingoutfordeliveryuser').DataTable().ajax.reload();
                                $('#bookingintrasituser').DataTable().ajax.reload();
                                $('#bookingrtouser').DataTable().ajax.reload();
                                $('#bookingnotdelivereduser').DataTable().ajax.reload();
                                $('#bookingreacheddestinationuser').DataTable().ajax.reload();
                    }
                }
            })
        });
        $('#bookingdbuser').on('click', '.unnotdeli_reviewuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $.ajax({
                type: "POST",
                url: "ajax_request.php",
                data: {
                    "action": "unnotdeli_approvaluser",
                    "id": id
                },
                dataType: "json",
                success: function(result_job) {
                    if (result_job.state == 1) {
                                $('#bookingdbuser').DataTable().ajax.reload();
                                $('#bookingdelivereduser').DataTable().ajax.reload();
                                $('#bookingoutfordeliveryuser').DataTable().ajax.reload();
                                $('#bookingintrasituser').DataTable().ajax.reload();
                                $('#bookingrtouser').DataTable().ajax.reload();
                                $('#bookingnotdelivereduser').DataTable().ajax.reload();
                                $('#bookingreacheddestinationuser').DataTable().ajax.reload();
                    }
                }
            })
        });
        
        $('#bookingdbuser').on('click', '.reachdest_reviewuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $.ajax({
                type: "POST",
                url: "ajax_request.php",
                data: {
                    "action": "reachdest_approvaluser",
                    "id": id
                },
                dataType: "json",
                success: function(result_job) {
                    if (result_job.state == 1) {
                                $('#bookingdbuser').DataTable().ajax.reload();
                                $('#bookingdelivereduser').DataTable().ajax.reload();
                                $('#bookingoutfordeliveryuser').DataTable().ajax.reload();
                                $('#bookingintrasituser').DataTable().ajax.reload();
                                $('#bookingrtouser').DataTable().ajax.reload();
                                $('#bookingnotdelivereduser').DataTable().ajax.reload();
                                $('#bookingreacheddestinationuser').DataTable().ajax.reload();
                    }
                }
            })
        });
        $('#bookingdbuser').on('click', '.unreachdest_reviewuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $.ajax({
                type: "POST",
                url: "ajax_request.php",
                data: {
                    "action": "unreachdest_approvaluser",
                    "id": id
                },
                dataType: "json",
                success: function(result_job) {
                    if (result_job.state == 1) {
                                $('#bookingdbuser').DataTable().ajax.reload();
                                $('#bookingdelivereduser').DataTable().ajax.reload();
                                $('#bookingoutfordeliveryuser').DataTable().ajax.reload();
                                $('#bookingintrasituser').DataTable().ajax.reload();
                                $('#bookingrtouser').DataTable().ajax.reload();
                                $('#bookingnotdelivereduser').DataTable().ajax.reload();
                                $('#bookingreacheddestinationuser').DataTable().ajax.reload();
                    }
                }
            })
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#bookingdbuser').on('click', '.complaintdetailuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $('#complaintdetail_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "complaintidstatususer",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].Complaint_id !== "") {
                        $('#complaintstatusupdate').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" name="Complaint_id" id="Complaint_id" class="form-control" value="' + result_job.data[0].Complaint_id + '"></div></div><br><div class="wrap"><input type="hidden" value='+id+' name="cid" id="cid"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="comp_id" id="comp_id" id="submit">Submit</button></div>');
                    } else {
                        $('#complaintstatusupdate').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complaint_id" id="Complaint_id"  placeholder="Enter Complaint" ></div></div><br><div class="wrap"><input type="hidden" value='+id+' name="cid" id="cid"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="comp_id" id="comp_id" id="submit">Submit</button></div>');
                    }
                }
            });

        });
        
        $('#bookingdelivereduser').on('click', '.complaintdetailuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $('#complaintdetail_idudel').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "complaintidstatususer",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].Complaint_id !== "") {
                        $('#complaintstatusupdateudel').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" name="Complaintu1_id" id="Complaintu1_id" class="form-control" value="' + result_job.data[0].Complaint_id + '"></div></div><br><div class="wrap"><input type="hidden" value='+id+' name="cidu1" id="cidu1"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compudel_id" id="compudel_id" id="submit">Submit</button></div>');
                    } else {
                        $('#complaintstatusupdateudel').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complaintu1_id" id="Complaintu1_id"  placeholder="Enter Complaint" ></div></div><br><div class="wrap"><input type="hidden" value='+id+' name="cidu1" id="cidu1"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compudel_id" id="compudel_id" id="submit">Submit</button></div>');
                    }
                }
            });

        });
        
                $('#bookingoutfordeliveryuser').on('click', '.complaintdetailuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $('#complaintdetail_iduodel').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "complaintidstatususer",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].Complaint_id !== "") {
                        $('#complaintstatusupdateuodel').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" name="Complaintu2_id" id="Complaintu2_id" class="form-control" value="' + result_job.data[0].Complaint_id + '"></div></div><br><div class="wrap"><input type="hidden" value='+id+' name="cidu2" id="cidu2"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compuodel_id" id="compuodel_id" id="submit">Submit</button></div>');
                    } else {
                        $('#complaintstatusupdateuodel').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complaintu2_id" id="Complaintu2_id"  placeholder="Enter Complaint" ></div></div><br><div class="wrap"><input type="hidden" value='+id+' name="cidu2" id="cidu2"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compuodel_id" id="compuodel_id" id="submit">Submit</button></div>');
                    }
                }
            });

        });
        
              $('#bookingintrasituser').on('click', '.complaintdetailuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $('#complaintdetail_iduint').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "complaintidstatususer",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].Complaint_id !== "") {
                        $('#complaintstatusupdateuint').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" name="Complaintu3_id" id="Complaintu3_id" class="form-control" value="' + result_job.data[0].Complaint_id + '"></div></div><br><div class="wrap"><input type="hidden" value='+id+' name="cidu3" id="cidu3"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compuint_id" id="compuint_id" id="submit">Submit</button></div>');
                    } else {
                        $('#complaintstatusupdateuint').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complaintu3_id" id="Complaintu3_id"  placeholder="Enter Complaint" ></div></div><br><div class="wrap"><input type="hidden" value='+id+' name="cidu3" id="cidu3"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compuint_id" id="compuint_id" id="submit">Submit</button></div>');
                    }
                }
            });

        });
        
              $('#bookingrtouser').on('click', '.complaintdetailuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $('#complaintdetail_idurto').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "complaintidstatususer",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].Complaint_id !== "") {
                        $('#complaintstatusupdateurto').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" name="Complaintu4_id" id="Complaintu4_id" class="form-control" value="' + result_job.data[0].Complaint_id + '"></div></div><br><div class="wrap"><input type="hidden" value='+id+' name="cidu4" id="cidu4"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compurto_id" id="compurto_id" id="submit">Submit</button></div>');
                    } else {
                        $('#complaintstatusupdateurto').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complaintu4_id" id="Complaintu4_id"  placeholder="Enter Complaint" ></div></div><br><div class="wrap"><input type="hidden" value='+id+' name="cidu4" id="cidu4"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compurto_id" id="compurto_id" id="submit">Submit</button></div>');
                    }
                }
            });

        });
        
                   $('#bookingnotdelivereduser').on('click', '.complaintdetailuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $('#complaintdetail_idund').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "complaintidstatususer",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].Complaint_id !== "") {
                        $('#complaintstatusupdateund').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" name="Complaintu5_id" id="Complaintu5_id" class="form-control" value="' + result_job.data[0].Complaint_id + '"></div></div><br><div class="wrap"><input type="hidden" value='+id+' name="cidu5" id="cidu5"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compund_id" id="compund_id" id="submit">Submit</button></div>');
                    } else {
                        $('#complaintstatusupdateund').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complaintu5_id" id="Complaintu5_id"  placeholder="Enter Complaint" ></div></div><br><div class="wrap"><input type="hidden" value='+id+' name="cidu5" id="cidu5"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compund_id" id="compund_id" id="submit">Submit</button></div>');
                    }
                }
            });

        });
        
          $('#bookingreacheddestinationuser').on('click', '.complaintdetailuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $('#complaintdetail_idurd').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "complaintidstatususer",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    if (result_job.data[0].Complaint_id !== "") {
                        $('#complaintstatusupdateurd').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" name="Complaintu6_id" id="Complaintu6_id" class="form-control" value="' + result_job.data[0].Complaint_id + '"></div></div><br><div class="wrap"><input type="hidden" value='+id+' name="cidu6" id="cidu6"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compurd_id" id="compurd_id" id="submit">Submit</button></div>');
                    } else {
                        $('#complaintstatusupdateurd').html('<div class="col-lg-4"><b>Complaint Id</b></div><div class="col-lg-8"><input type="text" class="form-control" name="Complaintu6_id" id="Complaintu6_id"  placeholder="Enter Complaint" ></div></div><br><div class="wrap"><input type="hidden" value='+id+' name="cidu6" id="cidu6"><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="compurd_id" id="compurd_id" id="submit">Submit</button></div>');
                    }
                }
            });

        });
        
    });
    
        $(document).ready(function() {
        $('#bookingdbuser').on('click', '.deliverydetailuser', function() {
         var dat1 = '<?php echo $dat ?>';
        //  alert(dat);
         var id = $(this).attr('id');
            // alert(id)
            $('#deliverydetail_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliveryidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    
                  delname = result_job.data[0].delivery_statusname;
                  delstat = result_job.data[0].delivery_status;
                    // alert(delname+' '+delstat);
                    
                    // if (delname=="status") {
                    //   $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus"><option value="1" selected>New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'><input type="text" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="deli_id" id="submit">Submit</button></div>');
                    //  } 
                    //   else
                     if (delname=="status") {
                        $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="1">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_ids">Submit</button></div>');
                     }   
                     else if (delname=="out_status") {
                        $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="Out of delivery" selected>Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_ids">Submit</button></div>');
                     } 
                   else if (delname=="In_transit") {
                        $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="In Transit" selected>In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_ids">Submit</button></div>');
                     } 
                    else if (delname=="rto_status") {
                      $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="RTO" selected>RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+' id="dat"  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_ids">Submit</button></div>');
                     } 
                    else if (delname=="notdev_status") {
                      $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="Not Delivery" selected>Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_ids">Submit</button></div>');
                     } 
                     else if (delname=="des_status") {
                      $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="Destination" selected>Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_ids">Submit</button></div>');
                     } 
                     else{
                           $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="New Request" selected>New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" class="form-control mt-4" value='+dat1+' id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_ids">Submit</button></div>');
                   
                     }
                     // if (result_job.data[0].delivery_status != "") {
                    //     // $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control"><option value='1n'></option><option value="1od">Out Of Delivery</option><option value="1it">In Transit</option><option value="1rto">RTO</option><option value="1nd">Not Delivery</option><option value="1des">Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'></div>');
                    //     $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control"><option value='+result_job.data[0].delivery_statusname+'>New Request</option><option value="ood">Out of delivery</option><option value="it">In Transit</option><option value="rto">RTO</option><option value="nd">Not Delivery</option><option value="des">Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'></div>');
                    //  } 
            
                }
            });

        });
        
        
                $('#bookingdelivereduser').on('click', '.deliverydetailuser', function() {
         var dat1 = '<?php echo $dat ?>';
        //  alert(dat);
         var id = $(this).attr('id');
            // alert(id)
           $('#deliverydetail_idu').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliveryidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    
                  delname = result_job.data[0].delivery_statusname;
                  delstat = result_job.data[0].delivery_status;
                    // alert(delname+' '+delstat);
                    
                    // if (delname=="status") {
                    //   $('#deliverystatusupdate').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus"><option value="1" selected>New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'><input type="text" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="deli_id" id="submit">Submit</button></div>');
                    //  } 
                    //   else
                     if (delname=="status") {
                        $('#deliverystatusupdateu').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="1" selected>Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_id" id="deli_idud">Submit</button></div>');
                     }   
                     else if (delname=="out_status") {
                        $('#deliverystatusupdateu').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="Out of delivery" selected>Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_idud">Submit</button></div>');
                     } 
                   else if (delname=="In_transit") {
                        $('#deliverystatusupdateu').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="In Transit" selected>In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_idud">Submit</button></div>');
                     } 
                    else if (delname=="rto_status") {
                      $('#deliverystatusupdateu').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="RTO" selected>RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+' id="dat"  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idud">Submit</button></div>');
                     } 
                    else if (delname=="notdev_status") {
                      $('#deliverystatusupdateu').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="Not Delivery" selected>Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idud">Submit</button></div>');
                     } 
                     else if (delname=="des_status") {
                      $('#deliverystatusupdateu').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="Destination" selected>Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idud">Submit</button></div>');
                     } 
                     else{
                           $('#deliverystatusupdateu').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="New Request" selected>New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" class="form-control mt-4" value='+dat1+' id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idud">Submit</button></div>');
                   
                     }
                  }
            });

        });
    
                   $('#bookingoutfordeliveryuser').on('click', '.deliverydetailuser', function() {
         var dat1 = '<?php echo $dat ?>';
        //  alert(dat);
         var id = $(this).attr('id');
            // alert(id)
           $('#deliverydetail_idod').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliveryidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    
                  delname = result_job.data[0].delivery_statusname;
                  delstat = result_job.data[0].delivery_status;
                    // alert(delname+' '+delstat);
                     if (delname=="status") {
                        $('#deliverystatusupdateod').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="1" selected>Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_iduod">Submit</button></div>');
                     }   
                     else if (delname=="out_status") {
                        $('#deliverystatusupdateod').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="Out of delivery" selected>Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_iduod">Submit</button></div>');
                     } 
                   else if (delname=="In_transit") {
                        $('#deliverystatusupdateod').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="In Transit" selected>In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_iduod">Submit</button></div>');
                     } 
                    else if (delname=="rto_status") {
                      $('#deliverystatusupdateod').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="RTO" selected>RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+' id="dat"  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_iduod">Submit</button></div>');
                     } 
                    else if (delname=="notdev_status") {
                      $('#deliverystatusupdateod').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="Not Delivery" selected>Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_iduod">Submit</button></div>');
                     } 
                     else if (delname=="des_status") {
                      $('#deliverystatusupdateod').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="Destination" selected>Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_iduod">Submit</button></div>');
                     } 
                     else{
                           $('#deliverystatusupdateod').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="New Request" selected>New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" class="form-control mt-4" value='+dat1+' id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_iduod">Submit</button></div>');
                   
                     }
            
                }
            });

        });
  
            
                   $('#bookingintrasituser').on('click', '.deliverydetailuser', function() {
         var dat1 = '<?php echo $dat ?>';
        //  alert(dat);
         var id = $(this).attr('id');
            // alert(id)
           $('#deliverydetail_iduint').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliveryidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    
                  delname = result_job.data[0].delivery_statusname;
                  delstat = result_job.data[0].delivery_status;
                     if (delname=="status") {
                        $('#deliverystatusupdateuint').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="1" selected>Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_idus">Submit</button></div>');
                     }   
                     else if (delname=="out_status") {
                        $('#deliverystatusupdateuint').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="Out of delivery" selected>Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_idus">Submit</button></div>');
                     } 
                   else if (delname=="In_transit") {
                        $('#deliverystatusupdateuint').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="In Transit" selected>In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_idus">Submit</button></div>');
                     } 
                    else if (delname=="rto_status") {
                      $('#deliverystatusupdateuint').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="RTO" selected>RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+' id="dat"  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idus">Submit</button></div>');
                     } 
                    else if (delname=="notdev_status") {
                      $('#deliverystatusupdateuint').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="Not Delivery" selected>Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idus">Submit</button></div>');
                     } 
                     else if (delname=="des_status") {
                      $('#deliverystatusupdateuint').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="Destination" selected>Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idus">Submit</button></div>');
                     } 
                     else{
                           $('#deliverystatusupdateuint').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="New Request" selected>New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" class="form-control mt-4" value='+dat1+' id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idus">Submit</button></div>');
                   
                     }
               
                }
            });

        });
  
                $('#bookingrtouser').on('click', '.deliverydetailuser', function() {
         var dat1 = '<?php echo $dat ?>';
        //  alert(dat);
         var id = $(this).attr('id');
            // alert(id)
           $('#deliverydetail_idurto').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliveryidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    
                  delname = result_job.data[0].delivery_statusname;
                  delstat = result_job.data[0].delivery_status;
                       if (delname=="status") {
                        $('#deliverystatusupdateurto').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="1" selected>Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_idurto">Submit</button></div>');
                     }   
                     else if (delname=="out_status") {
                        $('#deliverystatusupdateurto').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="Out of delivery" selected>Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_idurto">Submit</button></div>');
                     } 
                   else if (delname=="In_transit") {
                        $('#deliverystatusupdateurto').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="In Transit" selected>In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_idurto">Submit</button></div>');
                     } 
                    else if (delname=="rto_status") {
                      $('#deliverystatusupdateurto').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="RTO" selected>RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+' id="dat"  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idurto">Submit</button></div>');
                     } 
                    else if (delname=="notdev_status") {
                      $('#deliverystatusupdateurto').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="Not Delivery" selected>Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idurto">Submit</button></div>');
                     } 
                     else if (delname=="des_status") {
                      $('#deliverystatusupdateurto').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="Destination" selected>Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idurto">Submit</button></div>');
                     } 
                     else{
                           $('#deliverystatusupdateurto').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="New Request" selected>New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" class="form-control mt-4" value='+dat1+' id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idurto">Submit</button></div>');
                   
                     }
                
                }
            });

        });
        
        
             $('#bookingnotdelivereduser').on('click', '.deliverydetailuser', function() {
         var dat1 = '<?php echo $dat ?>';
        //  alert(dat);
         var id = $(this).attr('id');
            // alert(id)
           $('#deliverydetail_idund').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliveryidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    
                  delname = result_job.data[0].delivery_statusname;
                  delstat = result_job.data[0].delivery_status;
                     if (delname=="status") {
                        $('#deliverystatusupdateund').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="1" selected>Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_idund">Submit</button></div>');
                     }   
                     else if (delname=="out_status") {
                        $('#deliverystatusupdateund').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="Out of delivery" selected>Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_idund">Submit</button></div>');
                     } 
                   else if (delname=="In_transit") {
                        $('#deliverystatusupdateund').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="In Transit" selected>In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_idund">Submit</button></div>');
                     } 
                    else if (delname=="rto_status") {
                      $('#deliverystatusupdateund').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="RTO" selected>RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+' id="dat"  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idund">Submit</button></div>');
                     } 
                    else if (delname=="notdev_status") {
                      $('#deliverystatusupdateund').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="Not Delivery" selected>Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idund">Submit</button></div>');
                     } 
                     else if (delname=="des_status") {
                      $('#deliverystatusupdateund').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="Destination" selected>Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idund">Submit</button></div>');
                     } 
                     else{
                           $('#deliverystatusupdateund').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="New Request" selected>New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" class="form-control mt-4" value='+dat1+' id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idund">Submit</button></div>');
                   
                     }
                    }
            });

        });
  
    $('#bookingreacheddestinationuser').on('click', '.deliverydetailuser', function() {
         var dat1 = '<?php echo $dat ?>';
        //  alert(dat);
         var id = $(this).attr('id');
            // alert(id)
           $('#deliverydetail_idurd').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliveryidstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].Complaint_id)
                    
                  delname = result_job.data[0].delivery_statusname;
                  delstat = result_job.data[0].delivery_status;
                 
                     if (delname=="status") {
                        $('#deliverystatusupdateurd').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="1" selected>Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_idurd">Submit</button></div>');
                     }   
                     else if (delname=="out_status") {
                        $('#deliverystatusupdateurd').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="Out of delivery" selected>Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_idurd">Submit</button></div>');
                     } 
                   else if (delname=="In_transit") {
                        $('#deliverystatusupdateurd').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="In Transit" selected>In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" id="dat" value='+dat1+'  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary mt-3 font-weight-bold mr-2" name="deli_ids" id="deli_idurd">Submit</button></div>');
                     } 
                    else if (delname=="rto_status") {
                      $('#deliverystatusupdateurd').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="RTO" selected>RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+' id="dat"  class="form-control mt-4"><input type="hidden" name="did" id="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idurd">Submit</button></div>');
                     } 
                    else if (delname=="notdev_status") {
                      $('#deliverystatusupdateurd').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="Not Delivery" selected>Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idurd">Submit</button></div>');
                     } 
                     else if (delname=="des_status") {
                      $('#deliverystatusupdateurd').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="0">New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="Destination" selected>Reached Destination</option></select><input type="datetime-local" name="dat" value='+dat1+'  class="form-control mt-4" id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idurd">Submit</button></div>');
                     } 
                     else{
                           $('#deliverystatusupdateuds').html('<div class="col-lg-4"><b>Delivery Status</b></div><div class="col-lg-8"><select class="form-control" name="delstatus" id="delstatus"><option value="0">Delivered</option><option value="New Request" selected>New Request</option><option value="0">Out of delivery</option><option value="0">In Transit</option><option value="0">RTO</option><option value="0">Not Delivery</option><option value="0">Reached Destination</option></select><input type="datetime-local" name="dat" class="form-control mt-4" value='+dat1+' id="dat"><input type="hidden" id="did" name="did" value='+id+'><button type="submit" class="btn btn-light-primary font-weight-bold mt-3 mr-2" name="deli_ids" id="deli_idurd">Submit</button></div>');
                   
                     }
                 
                }
            });

        });
  
  
        });
    
</script>
<script>


	
    function ExportToExcel1(type, fn, dl) {
        var tab = document.getElementById('excelalluser'); // id of table
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