<?php
include('config.php');

$action=$_REQUEST['action'];

if($action=="fetch_user_detail")
{
  $sql="select * from add_user where role!='Party' and role!='Company'";
  $result=mysqli_query($conn,$sql);
   
  $user_detail=array();
  while($user_data=mysqli_fetch_assoc($result))
  {
      $user_detail[]=array(
                    "user_id"=>$user_data['user_id'],
                    "name"=>$user_data['name'],
                    "role"=>$user_data['role'],
                    "courier_mode"=>$user_data['courier_mode'],
                    "active_state"=>$user_data['active_state'],
                    "user_name"=>$user_data['user_name'],
                    "password"=>$user_data['password']
          );
  }
   
  $user_data_response=array(
                    "status"=>1,
                    "data"=>$user_detail
      );
  echo json_encode($user_data_response);
}

if($action=="edit_company")
{
    $id=$_REQUEST['edit_id'];
    
    $sql12="select * from company where id=$id";
    $result12=mysqli_query($conn,$sql12);
//   print_r($sql12);die();
$role="company";
    $user_detail=array();
   while($user_data=mysqli_fetch_assoc($result12))
  {
      $company=$user_data['company_name'];
        $sqlpass="select * from user_login where from_cx_id=$id and name='$company'";
       $resultpass=mysqli_query($conn,$sqlpass);
  $user_datas=mysqli_fetch_assoc($resultpass);
  
      $user_detail[]=array(
          "company_name"=>$user_data['company_name'],
          "address"=>$user_data['address'],
          "role"=>$role,
                          "gst"=>$user_data['gst'],
            "username"=>$user_data['user_name'],
             "mobile"=>$user_data['mobile'],
              "email"=>$user_data['email'],
         "password"=>$user_datas['password']
          );
  $user_data_response=array(
                    "status"=>1,
                    "data"=>$user_detail
      );
  echo json_encode($user_data_response);
  }
    
}

if($action=="update_company")
{
    $id=$_REQUEST['edit_id'];
    $companyname=$_REQUEST['companyname'];
    $addrss=$_REQUEST['address'];
    $gst=$_REQUEST['gst'];
    $mobile=$_REQUEST['mobile'];
    $email=$_REQUEST['email'];
    $username=$_REQUEST['username'];
    $pasword=$_REQUEST['password'];
    		
		 $sql="update company set company_name='$companyname',address='$addrss',gst='$gst',mobile='$mobile',email='$email',username='$username',password='$pasword' where id=$edit_id ";
    $result=mysqli_query($conn,$sql);

  $user_data_response=array(
                    "status"=>1,
);
  echo json_encode($user_data_response);
    
}


if($action=="edit_user")
{
    $id=$_REQUEST['edit_id'];
    
    $sql="select * from add_user where user_id=$id";
    $result=mysqli_query($conn,$sql);
    
    $edit_data=array();
    while($edit_row=mysqli_fetch_assoc($result))
    {
        
        
        
        $edit_data[]=array(
                        "user_id"=>$edit_row['user_id'],
                        "name"=>$edit_row['name'],
                        "role"=>$edit_row['role'],
                        "courier_mode"=>$edit_row['courier_mode'],
                        "user_name"=>$edit_row['user_name'],
                        "password"=>$edit_row['password'],
                        "active_state"=>$edit_row['active_state'],
                );
    }
    
    $edit_data_response=array(
                        "status"=>1,
                        "data"=>$edit_data
        );
    echo json_encode($edit_data_response);
}

 if($action=="usernameCheck") {
     $username = $_REQUEST['username'];

        // if($id != 0){
            $sql = "SELECT * FROM add_user WHERE user_name='$username'";
            // print_r($sql);die();
        // } else{
        //     $sql = "SELECT * FROM unit WHERE from_cx_id='$username'";
        // }
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo 'true';
        }else{
            echo 'false';
        }
    }

if($action=="delete_user")
{
    $id=$_REQUEST['delete_user_id'];
    
    $sql=" delete from add_user where user_id=$id";
    $result=mysqli_query($conn,$sql);
    
    $user_delete_response=array("status"=>1);
    
    echo json_encode($user_delete_response);
}
if($action=="activate_state")
{
    $id=$_REQUEST['id'];
    
    $sql="update add_user set active_state=1 where user_id=$id";
    $result=mysqli_query($conn,$sql);
    
    $activate_response=array("status"=>1);
    echo json_encode($activate_response);
}
if($action=="de_activate_state")
{
    $id=$_REQUEST['id'];
    
    $sql="update add_user set active_state=0 where user_id=$id";
    $result=mysqli_query($conn,$sql);
    
    $de_activate_response=array("status"=>1);
    echo json_encode($de_activate_response);
}

// if($action=="updatedocs")
// {
//     $id=$_REQUEST['did'];
  
//     $docsup = $_FILES["docsup"]["name"];
//       $tempname1 = $_FILES["docsup"]["tmp_name"];

//       $folder1="document/".$docsup;
//  print_r($folder1);die();
//  $res1=move_uploaded_file($tempname1, $folder1);

// if($res1) {
//   $sql2 = "update booking_from set document='$docsup' where id=$id";
//     $exe = mysqli_query($conn, $sql2);
// }
//     $de_activate_response=array("status"=>1);
//     echo json_encode($de_activate_response);
// }

if($action=="updatecomp")
{
    $id=$_REQUEST['cid'];
    $comp_id=$_REQUEST['comp_id'];
  
   $sql2 = "update booking_from set Complaint_id='$comp_id' where id=$id";
//   print_r($sql2);die();
    $exe = mysqli_query($conn, $sql2);
    
    $de_activate_response=array("status"=>1);
    echo json_encode($de_activate_response);
}
if($action=="updatedelivery")
{
    $id=$_REQUEST["id"];
    $dat=$_REQUEST["dat"];
      $did=$_REQUEST["did"];
      $delistatus=$_REQUEST["delistatus"];
    //   print_r($delistatus);die();
    if($delistatus=="New Request"){
      $sql2 = "update booking_from set delivery_date='$dat',status=0,out_status=0,In_transit=0,rto_status=0,notdev_status=0,des_status=0 where id=$did";
         $exe = mysqli_query($conn, $sql2);
    }
 else if($delistatus=="Delivered"){
      $sql2 = "update booking_from set delivery_date='$dat',status=1,out_status=0,In_transit=0,rto_status=0,notdev_status=0,des_status=0 where id=$did";
         $exe = mysqli_query($conn, $sql2);
    }
   else if($delistatus=="Out of delivery"){
       $sql2 = "update booking_from set delivery_date='$dat',status=0,out_status=1,In_transit=0,rto_status=0,notdev_status=0,des_status=0 where id=$did";
        $exe = mysqli_query($conn, $sql2);
    }
    else if($delistatus=="In Transit"){
       $sql2 = "update booking_from set delivery_date='$dat',status=0,out_status=0,In_transit=1,rto_status=0,notdev_status=0,des_status=0 where id=$did";
        $exe = mysqli_query($conn, $sql2);
    }
     else if($delistatus=="RTO"){
      $sql2 = "update booking_from set delivery_date='$dat',status=0,out_status=0,In_transit=0,rto_status=1,notdev_status=0,des_status=0 where id=$did";
        $exe = mysqli_query($conn, $sql2);
    }

  else if($delistatus=="Not Delivery"){
     $sql2 = "update booking_from set delivery_date='$dat',status=0,out_status=0,In_transit=0,rto_status=0,notdev_status=1,des_status=0 where id=$did";
       $exe = mysqli_query($conn, $sql2);
    }
     else if($delistatus=="Reached Destination"){
      $sql2 = "update booking_from set delivery_date='$dat',status=0,out_status=0,In_transit=0,rto_status=0,notdev_status=0,des_status=1 where id=$did";
       $exe = mysqli_query($conn, $sql2);
    }
     
    $de_activate_response=array("status"=>1);
    echo json_encode($de_activate_response);
}

if($action=="delete_userdb")
{
    $id=$_REQUEST['delete_userdb_id'];
    
    $sql=" Delete from booking_from where id=$id";
    $result=mysqli_query($conn,$sql);
    
    $user_delete_response=array("status"=>1);
    
    echo json_encode($user_delete_response);
}
if($action=="complaintidstatus")
{
    $id=$_REQUEST["id"];
    
    $sql1 = "SELECT * FROM booking_from where id='$id'";
	$result1 = $conn->query($sql1);
		$branch_array=array();
	   while ($alldelivery = $result1->FETCH_ASSOC())
	   {

        $branch_array[]=array(
                   "id"=>$alldelivery['id'],
                    "Complaint_id"=>$alldelivery['Complaint_id']
            );
       }
    // print_r($branch_array);die();
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="documentidstatus")
{
    $id=$_REQUEST["id"];
    
    $sql1 = "SELECT * FROM booking_from where id='$id'";
	$result1 = $conn->query($sql1);
		$branch_array=array();
	   while ($alldelivery = $result1->FETCH_ASSOC())
	   {

        $branch_array[]=array(
                   "id"=>$alldelivery['id'],
                    "document"=>$alldelivery['document']
            );
       }
    // print_r($branch_array);die();
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="deliveryidstatus")
{
    $id=$_REQUEST["id"];
    $dat=$_REQUEST["dat"];
      $did=$_REQUEST["did"];
    
    $sql1 = "SELECT * FROM booking_from where id='$id'";
	$result1 = $conn->query($sql1);
	$alldeliver1y = $result1->FETCH_ASSOC();
	
	
$status1=0;
$out_status1=0;
$In_transit1=0;
$rto_status1=0;
$notdev_status1=0;
$des_status1=0;

$statusname='';
$stat=0;

	  $sql2 = "SELECT * FROM booking_from where id='$id'";
	$result2 = $conn->query($sql2);
	$branch_array=array();
	   while ($alldelivery = $result2->FETCH_ASSOC())
	   {
$status=$alldelivery['status'];
$out_status=$alldelivery['out_status'];
$In_transit=$alldelivery['In_transit'];
$rto_status=$alldelivery['rto_status'];
$notdev_status=$alldelivery['notdev_status'];
$des_status=$alldelivery['des_status'];

if($status==0 && $out_status==0 && $In_transit==0 && $rto_status==0 && $notdev_status==0 && $des_status==0){
    $stat=1;
    $statusname="new";
}
else if($status==1 && $out_status==0 && $In_transit==0 && $rto_status==0 && $notdev_status==0 && $des_status==0){
    $stat=1;
    $statusname="status";
}
else if($status==0 && $out_status==1 && $In_transit==0 && $rto_status==0 && $notdev_status==0 && $des_status==0){
     $stat=1;
    $statusname="out_status";
}
else if($status==0 && $out_status==0 && $In_transit==1 && $rto_status==0 && $notdev_status==0 && $des_status==0){
     $stat=1;
    $statusname="In_transit";
}
else if($status==0 && $out_status==0 && $In_transit==0 && $rto_status==1 && $notdev_status==0 && $des_status==0){
     $stat=1;
    $statusname="rto_status";
}
else if($status==0 && $out_status==0 && $In_transit==0 && $rto_status==0 && $notdev_status==1 && $des_status==0){
     $stat=1;
    $statusname="notdev_status";
}
else if($status==0 && $out_status==0 && $In_transit==0 && $rto_status==0 && $notdev_status==0 && $des_status==1){
     $stat=1;
    $statusname="des_status";
}


        $branch_array[]=array(
                   "id"=>$alldelivery['id'],
                    "delivery_status"=>$stat,
                      "delivery_statusname"=>$statusname,
                       "delivery_dat"=>$alldeliver1y['delivery_date'],
            );
       }
    // print_r($branch_array);die();
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        // print_r($branch_array);die();
    echo json_encode($branch_data_response);
}

if($action=="undeli_approval")
{
    $id=$_REQUEST['id'];
    
    $sql="update booking_from set status=1,out_status=0,In_transit=0,rto_status=0,notdev_status=0,des_status=0 where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
          $status_change_response=array("state"=>1);
          echo json_encode($status_change_response);
    }
}
if($action=="deli_approval")
{
    $id=$_REQUEST['id'];
    
    $sql1="update booking_from set status=0 where id=$id";
    $result1=mysqli_query($conn,$sql1);
    if($result1)
    {
          $status_change_response1=array("state"=>1);
          echo json_encode($status_change_response1);
    }
}
if($action=="unout_approval")
{
    $id=$_REQUEST['id'];
    
    $sql3="update booking_from set status=0,out_status=1,In_transit=0,rto_status=0,notdev_status=0,des_status=0 where id=$id";
    $result3=mysqli_query($conn,$sql3);
    if($result3)
    {
          $status_change_response3=array("state"=>1);
          echo json_encode($status_change_response3);
    }
}
if($action=="out_approval")
{
    $id=$_REQUEST['id'];
    
    $sql4="update booking_from set out_status=0 where id=$id";
    $result4=mysqli_query($conn,$sql4);
    if($result4)
    {
          $status_change_response4=array("state"=>1);
          echo json_encode($status_change_response4);
    }
}
if($action=="unintra_approval")
{
    $id=$_REQUEST['id'];
    
    $sql5="update booking_from set status=0,out_status=0,In_transit=1,rto_status=0,notdev_status=0,des_status=0 where id=$id";
    $result5=mysqli_query($conn,$sql5);
    if($result5)
    {
          $status_change_response5=array("state"=>1);
          echo json_encode($status_change_response5);
    }
}
if($action=="intra_approval")
{
    $id=$_REQUEST['id'];
    
    $sql6="update booking_from set In_transit=0 where id=$id";
    $result6=mysqli_query($conn,$sql6);
    if($result6)
    {
          $status_change_response6=array("state"=>1);
          echo json_encode($status_change_response6);
    }
}
if($action=="unrto_approval")
{
    $id=$_REQUEST['id'];
    
    $sql7="update booking_from set status=0,out_status=0,In_transit=0,rto_status=1,notdev_status=0,des_status=0 where id=$id";
    $result7=mysqli_query($conn,$sql7);
    if($result7)
    {
          $status_change_response7=array("state"=>1);
          echo json_encode($status_change_response7);
    }
}
if($action=="rto_approval")
{
    $id=$_REQUEST['id'];
    
    $sql8="update booking_from set rto_status=0 where id=$id";
    $result8=mysqli_query($conn,$sql8);
    if($result8)
    {
          $status_change_response8=array("state"=>1);
          echo json_encode($status_change_response8);
    }
}
if($action=="unnotdeli_approval")
{
    $id=$_REQUEST['id'];
    
    $sql9="update booking_from set status=0,out_status=0,In_transit=0,rto_status=0,notdev_status=1,des_status=0 where id=$id";
    $result9=mysqli_query($conn,$sql9);
    if($result9)
    {
          $status_change_response9=array("state"=>1);
          echo json_encode($status_change_response9);
    }
}
if($action=="notdeli_approval")
{
    $id=$_REQUEST['id'];
    
    $sql10="update booking_from set notdev_status=0 where id=$id";
    $result10=mysqli_query($conn,$sql10);
    if($result10)
    {
          $status_change_response10=array("state"=>1);
          echo json_encode($status_change_response10);
    }
}
if($action=="unreachdest_approval")
{
    $id=$_REQUEST['id'];
    
    $sql11="update booking_from set status=0,out_status=0,In_transit=0,rto_status=0,notdev_status=0,des_status=1 where id=$id";
    $result11=mysqli_query($conn,$sql11);
    if($result11)
    {
          $status_change_response11=array("state"=>1);
          echo json_encode($status_change_response11);
    }
}
if($action=="reachdest_approval")
{
    $id=$_REQUEST['id'];
    
    $sql12="update booking_from set des_status=0 where id=$id";
    $result12=mysqli_query($conn,$sql12);
    if($result12)
    {
          $status_change_response12=array("state"=>1);
          echo json_encode($status_change_response12);
    }
}



if($action=="fetch_branch_detaildb")
{
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	$role=$_REQUEST["role"];
	$courier=$_REQUEST["courier"];
		$name=$_REQUEST["name"];
 $delstatus=$_REQUEST['delstatus'];
   
if($role=="Company"){
$sql="select * from booking_from where customer_type='Company'";
}
else if($role=="Party"){
$sql="select * from booking_from where customer_type='Party'";
}
else if($role=="Customer"){
$sql="select * from booking_from where customer_type='Customer'";
}
else{
    $sql="select * from booking_from"; //where customer_type ='Party' or customer_type ='Company' or customer_type ='Customer' or customer_type =''
}

    if($from!="" && $to!="")
    {
               $from=date('d-m-Y',strtotime($from));
 $to=date('d-m-Y',strtotime($to));
  
    $sql .=" where (createdAt >='$from' AND createdAt<='$to')";   //AND  
     }
    //  print_r($sql);die();
       
       if($name!=""){
      $sql .=" AND username='$name'";   
     }
     
     if($courier!=""){
      $sql .=" AND courier_mode='$courier'";   
     }
  
   if($delstatus=="New Request"){
       $sql .=" AND status=0 && out_status!=1 AND In_transit!=1 && rto_status!=1 && notdev_status!=1 && des_status!=1";   
   }
   if($delstatus=="Delivered"){
       $sql .=" AND status=1 && out_status!=1 AND In_transit!=1 && rto_status!=1 && notdev_status!=1 && des_status!=1";   
   }
   
 if($delstatus=="Out Of Delivery"){
       $sql .=" AND status!=1 && out_status=1 AND In_transit!=1 && rto_status!=1 && notdev_status!=1 && des_status!=1";   
   }
  if($delstatus=="In Transit"){
       $sql .=" AND status!=1 && out_status!=1 AND In_transit=1 && rto_status!=1 && notdev_status!=1 && des_status!=1";   
   }
  if($delstatus=="RTO"){
       $sql .=" AND status!=1 && out_status!=1 AND In_transit!=1 && rto_status=1 && notdev_status!=1 && des_status!=1";   
   }
 if($delstatus=="Not Delivery"){
       $sql .=" AND status!=1 && out_status!=1 AND In_transit!=1 && rto_status!=1 && notdev_status=1 && des_status!=1";   
   }
  if($delstatus=="Reached Destination"){
       $sql .=" AND status!=1 && out_status==1 AND In_transit!=1 && rto_status!=1 && notdev_status!=1 && des_status=1";   
   }
   
     $sql .=" order by id asc";   
    // print_r($sql);die(); 
   $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        if($records['delivery_date']!="") {
                 $delivery_date=date('d-m-Y h:i:s', strtotime($records['delivery_date']));
        }
        else{
                 $delivery_date='';
        }
        
      
         $branch_array[]=array(
                     "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                        "username"=>$records['username'],
                "document_type"=>$records['document_type'],
                    "booking_mode"=>$records['booking_mode'],
                    "courier_mode"=>$records['courier_mode'],
                    "createdAt"=>$records['createdAt'],
                    "customer_type"=>$records['customer_type'],
                     "username"=>$records['username'],
                     "consignee_name"=>$records['consignee_name'],
                   
                    "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_name"=>$records['to_name'],
                    "to_address"=>$records['to_address'],
                    "to_contact"=>$records['to_contact'],
                    "customer_type"=>$records['customer_type'],
                    
                    "booking_number"=>$records['booking_number'],
                    "customer_id"=>$records['customer_id'],
                    "destination"=>$records['destination'],
                    "weight"=>$records['weight'],
                    "volume_weight"=>$records['volume_weight'],
                    "risk_charge"=>$records['risk_charge'],
                    "amount"=>$records['amount'],
                    "product_value"=>$records['product_value'],
                    
                    "status"=>$records['status'],
                    "out_status"=>$records['out_status'],
                    "In_transit"=>$records['In_transit'],
                    "rto_status"=>$records['rto_status'],
                    "notdev_status"=>$records['notdev_status'],
                    "des_status"=>$records['des_status'],
                       "delivery_date"=>$delivery_date,
                   "updated_by"=>$records['updated_by'],
                    "action"=>$records['action']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

// if($action=="fetch_branch_detaildbdummy")
// {
//     $from=$_REQUEST["from"];
// 	$to=$_REQUEST["to"];
// 	$role=$_REQUEST["role"];
// 	$courier=$_REQUEST["courier"];
// 		$name=$_REQUEST["name"];

// $sql="select * from booking_from where delete_status=0";
// // / and customer_type!='Party' and customer_type!='Company'
// // print_r($sql);die();
//     if($from!="" && $to!="")
//     {
//               $from=date('d-m-Y',strtotime($from));
//  $to=date('d-m-Y',strtotime($to));
  
//     $sql .=" AND (createdAt >='$from' AND createdAt<='$to')";   
//      }
       
//       if($name!=""){
//       $sql .=" AND username='$name'";   
//      }
     
//      if($courier!=""){
//       $sql .=" AND courier_mode='$courier'";   
//      }
  
//      $sql .=" order by id asc";   
//     // print_r($sql);die(); 
//   $result=mysqli_query($conn,$sql);
    
//     $branch_array=array();
//     while($records=mysqli_fetch_assoc($result))
//     {
//         $row_id++;
//         $si_no['si_no']=$row_id;
//         if($records['delivery_date']!="") {
//                  $delivery_date=date('d-m-Y h:i:s', strtotime($records['delivery_date']));
//         }
//         else{
//                  $delivery_date='';
//         }
        
      
//          $branch_array[]=array(
//                      "si_no"=>$si_no['si_no'],
//                     "id"=>$records['id'],
//                         "username"=>$records['username'],
//                 "document_type"=>$records['document_type'],
//                     "booking_mode"=>$records['booking_mode'],
//                     "courier_mode"=>$records['courier_mode'],
//                     "createdAt"=>$records['createdAt'],
//                     "customer_type"=>$records['customer_type'],
//                      "username"=>$records['username'],
//                      "consignee_name"=>$records['consignee_name'],
                   
//                     "from_name"=>$records['from_name'],
//                     "from_address"=>$records['from_address'],
//                     "from_contact"=>$records['from_contact'],
//                     "to_name"=>$records['to_name'],
//                     "to_address"=>$records['to_address'],
//                     "to_contact"=>$records['to_contact'],
//                     "customer_type"=>$records['customer_type'],
                    
//                     "booking_number"=>$records['booking_number'],
//                     "customer_id"=>$records['customer_id'],
//                     "destination"=>$records['destination'],
//                     "weight"=>$records['weight'],
//                     "volume_weight"=>$records['volume_weight'],
//                     "risk_charge"=>$records['risk_charge'],
//                     "amount"=>$records['amount'],
//                     "product_value"=>$records['product_value'],
                    
//                     "status"=>$records['status'],
//                     "out_status"=>$records['out_status'],
//                     "In_transit"=>$records['In_transit'],
//                     "rto_status"=>$records['rto_status'],
//                     "notdev_status"=>$records['notdev_status'],
//                     "des_status"=>$records['des_status'],
//                       "delivery_date"=>$delivery_date,
//                   "updated_by"=>$records['updated_by'],
//                     "action"=>$records['action']
//             );
//     }
//     $branch_data_response=array(
//                         "status"=>1,
//                         "data"=>$branch_array
//         );
        
//     echo json_encode($branch_data_response);
// }
if($action=="fetch_branch_detailbookingdelivered")
{
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	
       
       $sql="select * from booking_from where delete_status=0 AND status=1";
    if($from!="" && $to!="")
    {
         $from=date('d-m-Y',strtotime($from));
 $to=date('d-m-Y',strtotime($to));
  
   $sql .=" AND (createdAt >='$from' AND createdAt<='$to')";   
      }
   $sql .=" order by id desc";   
  
   $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
         if($records['delivery_date']!="") {
                 $delivery_date=date('d-m-Y h:i:s', strtotime($records['delivery_date']));
        }
        else{
                 $delivery_date='';
        }
        
   
    $row_id++;
        $si_no['si_no']=$row_id;
         $branch_array[]=array(
                     "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                        "username"=>$records['username'],
                      "document_type"=>$records['document_type'],
                      "consignee_name"=>$records['consignee_name'],
                    "booking_mode"=>$records['booking_mode'],
                    "courier_mode"=>$records['courier_mode'],
                    "createdAt"=>$records['createdAt'],
                    "customer_type"=>$records['customer_type'],
                    
                    "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_name"=>$records['to_name'],
                    "to_address"=>$records['to_address'],
                    "to_contact"=>$records['to_contact'],
                    
                    "booking_number"=>$records['booking_number'],
                    "customer_id"=>$records['customer_id'],
                    "destination"=>$records['destination'],
                    "weight"=>$records['weight'],
                    "volume_weight"=>$records['volume_weight'],
                    "risk_charge"=>$records['risk_charge'],
                    "amount"=>$records['amount'],
                    "product_value"=>$records['product_value'],
                     "delivery_date"=>$delivery_date,
                   
                    "status"=>$records['status']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detailbookingoutfordelivery")
{
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	
    
        $sql="select * from booking_from where delete_status=0 AND out_status=1";
    if($from!="" && $to!="")
    {
         $from=date('d-m-Y',strtotime($from));
 $to=date('d-m-Y',strtotime($to));
  
   $sql .=" AND (createdAt >='$from' AND createdAt<='$to')";   
      }
   $sql .=" order by id desc";   
    $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
      if($records['delivery_date']!="") {
                 $delivery_date=date('d-m-Y h:i:s', strtotime($records['delivery_date']));
        }
        else{
                 $delivery_date='';
        }
        
         $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                     "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                        "consignee_name"=>$records['consignee_name'],
                   "document_type"=>$records['document_type'],
                    "booking_mode"=>$records['booking_mode'],
                    "courier_mode"=>$records['courier_mode'],
                    "createdAt"=>$records['createdAt'],
                    "customer_type"=>$records['customer_type'],
                    
                            "username"=>$records['username'],
                "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_name"=>$records['to_name'],
                    "to_address"=>$records['to_address'],
                    "to_contact"=>$records['to_contact'],
                    
                    "booking_number"=>$records['booking_number'],
                    "customer_id"=>$records['customer_id'],
                    "destination"=>$records['destination'],
                    "weight"=>$records['weight'],
                    "volume_weight"=>$records['volume_weight'],
                    "risk_charge"=>$records['risk_charge'],
                    "amount"=>$records['amount'],
                    "product_value"=>$records['product_value'],
                          "delivery_date"=>$delivery_date,
                 
                    "out_status"=>$records['out_status']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detailbookingintrasit")
{
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];

         $sql="select * from booking_from where delete_status=0 AND In_transit=1";
    if($from!="" && $to!="")
    {
         $from=date('d-m-Y',strtotime($from));
 $to=date('d-m-Y',strtotime($to));
  
    $sql .=" AND (createdAt >='$from' AND createdAt<='$to')";   
     }
   $sql .=" order by id desc";   
     $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
   	
    if($records['delivery_date']!="") {
                 $delivery_date=date('d-m-Y h:i:s', strtotime($records['delivery_date']));
        }
        else{
                 $delivery_date='';
        }
        
           $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                     "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "document_type"=>$records['document_type'],
                        "consignee_name"=>$records['consignee_name'],
                   "booking_mode"=>$records['booking_mode'],
                    "courier_mode"=>$records['courier_mode'],
                    "createdAt"=>$records['createdAt'],
                    "customer_type"=>$records['customer_type'],
                    
                           "username"=>$records['username'],
                 "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_name"=>$records['to_name'],
                    "to_address"=>$records['to_address'],
                    "to_contact"=>$records['to_contact'],
                    
                    "booking_number"=>$records['booking_number'],
                    "customer_id"=>$records['customer_id'],
                    "destination"=>$records['destination'],
                    "weight"=>$records['weight'],
                    "volume_weight"=>$records['volume_weight'],
                    "risk_charge"=>$records['risk_charge'],
                    "amount"=>$records['amount'],
                    "product_value"=>$records['product_value'],
                          "delivery_date"=>$delivery_date,
                 
                    "In_transit"=>$records['In_transit']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detailbookingrto")
{
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	
       $sql="select * from booking_from where delete_status=0 AND rto_status=1";
    if($from!="" && $to!="")
    {
         $from=date('d-m-Y',strtotime($from));
 $to=date('d-m-Y',strtotime($to));
  
    $sql .=" AND (createdAt >='$from' AND createdAt<='$to')";   
     }
    $sql .=" order by id desc";   
     $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
      if($records['delivery_date']!="") {
                 $delivery_date=date('d-m-Y h:i:s', strtotime($records['delivery_date']));
        }
        else{
                 $delivery_date='';
        }
        
      
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                     "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "document_type"=>$records['document_type'],
                       "consignee_name"=>$records['consignee_name'],
                    "booking_mode"=>$records['booking_mode'],
                    "courier_mode"=>$records['courier_mode'],
                    "createdAt"=>$records['createdAt'],
                    "customer_type"=>$records['customer_type'],
                    
                             "username"=>$records['username'],
               "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_name"=>$records['to_name'],
                    "to_address"=>$records['to_address'],
                    "to_contact"=>$records['to_contact'],
                    
                    "booking_number"=>$records['booking_number'],
                    "customer_id"=>$records['customer_id'],
                    "destination"=>$records['destination'],
                    "weight"=>$records['weight'],
                    "volume_weight"=>$records['volume_weight'],
                    "risk_charge"=>$records['risk_charge'],
                    "amount"=>$records['amount'],
                    "product_value"=>$records['product_value'],
                    
                         "delivery_date"=>$delivery_date,
                  "rto_status"=>$records['rto_status']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detailbookingnotdelivered")
{
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	
      
       $sql="select * from booking_from where delete_status=0 AND notdev_status=1";
    if($from!="" && $to!="")
    {
         $from=date('d-m-Y',strtotime($from));
 $to=date('d-m-Y',strtotime($to));
  
    $sql .=" AND (createdAt >='$from' AND createdAt<='$to')";   
     }
      $sql .=" order by id desc";   
   $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
      if($records['delivery_date']!="") {
                 $delivery_date=date('d-m-Y h:i:s', strtotime($records['delivery_date']));
        }
        else{
                 $delivery_date='';
        }
        
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                     "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "document_type"=>$records['document_type'],
                         "consignee_name"=>$records['consignee_name'],
                  "booking_mode"=>$records['booking_mode'],
                    "courier_mode"=>$records['courier_mode'],
                    "createdAt"=>$records['createdAt'],
                    "customer_type"=>$records['customer_type'],
                    
                    "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_name"=>$records['to_name'],
                    "to_address"=>$records['to_address'],
                    "to_contact"=>$records['to_contact'],
                             "username"=>$records['username'],
               
                    "booking_number"=>$records['booking_number'],
                    "customer_id"=>$records['customer_id'],
                    "destination"=>$records['destination'],
                    "weight"=>$records['weight'],
                    "volume_weight"=>$records['volume_weight'],
                    "risk_charge"=>$records['risk_charge'],
                    "amount"=>$records['amount'],
                    "product_value"=>$records['product_value'],
                    
                          "delivery_date"=>$delivery_date,
                 "notdev_status"=>$records['notdev_status']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detailbookingreacheddestination")
{
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	
       
       $sql="select * from booking_from where delete_status=0 AND des_status=1";
    if($from!="" && $to!="")
    {
         $from=date('d-m-Y',strtotime($from));
 $to=date('d-m-Y',strtotime($to));
  
  
     $sql .=" AND (createdAt >='$from' AND createdAt<='$to')";   
    }
     $sql .=" order by id desc";   
    $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
      if($records['delivery_date']!="") {
                 $delivery_date=date('d-m-Y h:i:s', strtotime($records['delivery_date']));
        }
        else{
                 $delivery_date='';
        }
         $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                     "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "document_type"=>$records['document_type'],
                        "consignee_name"=>$records['consignee_name'],
                   "booking_mode"=>$records['booking_mode'],
                    "courier_mode"=>$records['courier_mode'],
                    "createdAt"=>$records['createdAt'],
                    "customer_type"=>$records['customer_type'],
                             "username"=>$records['username'],
               
                    "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_address"=>$records['to_address'],
                    "to_name"=>$records['to_name'],
                    "to_contact"=>$records['to_contact'],
                    
                    "booking_number"=>$records['booking_number'],
                    "customer_id"=>$records['customer_id'],
                    "destination"=>$records['destination'],
                    "weight"=>$records['weight'],
                    "volume_weight"=>$records['volume_weight'],
                    "risk_charge"=>$records['risk_charge'],
                    "amount"=>$records['amount'],
                    "product_value"=>$records['product_value'],
                    
                           "delivery_date"=>$delivery_date,
                "des_status"=>$records['des_status']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detaildbbooking")
{
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	
    $sql="select * from user_booking  where delete_status='0' ";
    if($from!="" && $to!="")
    {
        
     $sql .="AND (date_only >='$from' AND date_only<='$to')";   
    }
    $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                     "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "booking_id"=>$records['booking_id'],
                     "date_only"=>$records['date_only'],
                    "product_name"=>$records['product_name'],
                    "volume"=>$records['volume'],
                    "height"=>$records['height'],
                    "width"=>$records['width'],
                    "address"=>$records['address'],
                    "pincode"=>$records['pincode'],
                    "approximate_prize"=>$records['approximate_prize'],
                    "receiver_name"=>$records['receiver_name'],
                    "receiver_address"=>$records['receiver_address'],
                    "receiver_pincode"=>$records['receiver_pincode'],
                    "status"=>$records['status']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="delete_userdbbooking")
{
    $id=$_REQUEST['delete_userdb_id'];
    
    $sql=" Delete from user_booking where id=$id";
    $result=mysqli_query($conn,$sql);
    
    $user_delete_response=array("status"=>1);
    
    echo json_encode($user_delete_response);
}
if($action=="complaintidstatusbooking")
{
    $id=$_REQUEST["id"];
    
    $sql1 = "SELECT * FROM user_booking where id='$id'";
	$result1 = $conn->query($sql1);
		$branch_array=array();
	   while ($alldelivery = $result1->FETCH_ASSOC())
	   {

        $branch_array[]=array(
                   "id"=>$alldelivery['id'],
                    "Complaint_id"=>$alldelivery['Complaint_id']
            );
       }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="fetch_branch_detaildbuser")
{
    $branch=$_REQUEST['branch'];
    $username=$_REQUEST['username'];
    $from=$_REQUEST["from"];
 	$to=$_REQUEST["to"];
    $delstatus=$_REQUEST['delstatus'];
   
// print_r($_POST);die();
// print_r($from. $to);die();
$sql="";

$bran=explode(",",$branch);
$co = count($bran);
$cot=0;

if($co > 1) { 
foreach($bran as $br) {
    $cot++;
    if($cot==1){
   $sql .="select * from booking_from where (courier_mode='$br'";
 }
 else{
    $sql .=" Or courier_mode='$br')";
   }
   
 if($co==$cot){
  $sql .="";
    }
    }
}
else{
   $sql .="select * from booking_from where courier_mode='$branch'";
}
    //branch='$branch' && username='$username' AND customer_type !='party'
    if($from!="" && $to!="")
    {
        	
  $from=date('d-m-Y',strtotime($from));
 $to=date('d-m-Y',strtotime($to));
     $sql .=" AND (createdAt>='$from' AND createdAt<='$to')";   
    }
    
  if($delstatus=="New Request"){
       $sql .=" AND status=0 AND out_status!=1 AND In_transit!=1 AND rto_status!=1 AND notdev_status!=1 AND des_status!=1";   
   }
  else if($delstatus=="Delivered"){
       $sql .=" AND status=1";   
   }
   
 else if($delstatus=="Out Of Delivery"){
       $sql .=" AND out_status=1";   
   }
  else if($delstatus=="In Transit"){
       $sql .=" AND In_transit=1";   
   }
  else if($delstatus=="RTO"){
       $sql .=" AND rto_status=1";   
   }
 else if($delstatus=="Not Delivery"){
       $sql .=" AND notdev_status=1";   
   }
  else if($delstatus=="Reached Destination"){
       $sql .=" AND des_status=1";   
   }
    //  print_r($sql);die();
  
    $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
        
          if($records['delivery_date']!="") {
                 $delivery_date=date('d-m-Y h:i:s', strtotime($records['delivery_date']));
        }
        else{
                 $delivery_date='';
        }
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                     "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "username"=>$records['username'],
                     "document_type"=>$records['document_type'],
                  "consignee_name"=>$records['consignee_name'],
                    "booking_mode"=>$records['booking_mode'],
                    "courier_mode"=>$records['courier_mode'],
                    "createdAt"=>$records['createdAt'],
                    "customer_type"=>$records['customer_type'],
                    
                    "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_name"=>$records['to_name'],
                    "to_address"=>$records['to_address'],
                    "to_contact"=>$records['to_contact'],
                    
                    "booking_number"=>$records['booking_number'],
                    "customer_id"=>$records['customer_id'],
                    "destination"=>$records['destination'],
                    "weight"=>$records['weight'],
                    "volume_weight"=>$records['volume_weight'],
                    "risk_charge"=>$records['risk_charge'],
                    "amount"=>$records['amount'],
                    "product_value"=>$records['product_value'],
                    
                    "status"=>$records['status'],
                    "out_status"=>$records['out_status'],
                    "In_transit"=>$records['In_transit'],
                    "rto_status"=>$records['rto_status'],
                    "notdev_status"=>$records['notdev_status'],
                    "des_status"=>$records['des_status'],
                      "delivery_date"=>$delivery_date,
                    "action"=>$records['action']
            );
    }
    
    // print_r($branch_array);die();
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detailbookingdelivereduser")
{
    $branch=$_REQUEST['branch'];
    $username=$_REQUEST['username'];
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	
    // $sql="select * from booking_from where courier_mode='$branch' and status=1"; //branch='$branch' && username='$username' AND customer_type !='party' AND 
   
   $sql="";

$bran=explode(",",$branch);
$co = count($bran);
$cot=0;

if($co > 1) { 
foreach($bran as $br) {
    $cot++;
    if($cot==1){
   $sql .="select * from booking_from where courier_mode='$br'";
 }
 else{
    $sql .=" Or courier_mode='$br'";
   }
   
 if($co==$cot){
  $sql .="";
    }
    }
}
else{
   $sql .="select * from booking_from where courier_mode='$branch'";
}
   $sql .="AND status=1";
    if($from!="" && $to!="")
    {
          $from=date('d-m-Y',strtotime($from));
 $to=date('d-m-Y',strtotime($to));
  
     $sql .=" AND (createdAt >='$from' AND createdAt<='$to')";   
    }
      $sql .=" AND status=1";   
  $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
          if($records['delivery_date']!="") {
                 $delivery_date=date('d-m-Y h:i:s', strtotime($records['delivery_date']));
        }
        else{
                 $delivery_date='';
        }
        
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                     "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "document_type"=>$records['document_type'],
                    "booking_mode"=>$records['booking_mode'],
                    "courier_mode"=>$records['courier_mode'],
                    "createdAt"=>$records['createdAt'],
                            "username"=>$records['username'],
                "customer_type"=>$records['customer_type'],
                  "consignee_name"=>$records['consignee_name'],
                   
                    "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_name"=>$records['to_name'],
                    "to_address"=>$records['to_address'],
                    "to_contact"=>$records['to_contact'],
                    
                    "booking_number"=>$records['booking_number'],
                    "customer_id"=>$records['customer_id'],
                    "destination"=>$records['destination'],
                    "weight"=>$records['weight'],
                    "volume_weight"=>$records['volume_weight'],
                    "risk_charge"=>$records['risk_charge'],
                    "amount"=>$records['amount'],
                    "product_value"=>$records['product_value'],
                     "delivery_date"=>$delivery_date,
                    "status"=>$records['status']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detailbookingoutfordeliveryuser")
{
    $branch=$_REQUEST['branch'];
    $username=$_REQUEST['username'];
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	
    // $sql="select * from booking_from where courier_mode='$branch' and out_status=1"; //username='$username' AND customer_type !='party' AND
  
  $sql="";

$bran=explode(",",$branch);
$co = count($bran);
$cot=0;

if($co > 1) { 
foreach($bran as $br) {
    $cot++;
    if($cot==1){
   $sql .="select * from booking_from where courier_mode='$br'";
 }
 else{
    $sql .=" Or courier_mode='$br'";
   }
   
 if($co==$cot){
  $sql .="";
    }
    }
}
else{
   $sql .="select * from booking_from where courier_mode='$branch'";
}
$sql.=" AND out_status=1";

if($from!="" && $to!="")
    {
          $from=date('d-m-Y',strtotime($from));
 $to=date('d-m-Y',strtotime($to));
  
     $sql .=" AND (createdAt >='$from' AND createdAt<='$to')";   
    }
    $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
          if($records['delivery_date']!="") {
                 $delivery_date=date('d-m-Y h:i:s', strtotime($records['delivery_date']));
        }
        else{
                 $delivery_date='';
        }
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                     "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "document_type"=>$records['document_type'],
                 "consignee_name"=>$records['consignee_name'],
                     "booking_mode"=>$records['booking_mode'],
                    "courier_mode"=>$records['courier_mode'],
                    "createdAt"=>$records['createdAt'],
                    "customer_type"=>$records['customer_type'],
                           "username"=>$records['username'],
                 
                    "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_name"=>$records['to_name'],
                    "to_address"=>$records['to_address'],
                    "to_contact"=>$records['to_contact'],
                    
                    "booking_number"=>$records['booking_number'],
                    "customer_id"=>$records['customer_id'],
                    "destination"=>$records['destination'],
                    "weight"=>$records['weight'],
                    "volume_weight"=>$records['volume_weight'],
                    "risk_charge"=>$records['risk_charge'],
                    "amount"=>$records['amount'],
                    "product_value"=>$records['product_value'],
                      "delivery_date"=>$delivery_date,
                    "out_status"=>$records['out_status']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detailbookingintrasituser")
{
    $branch=$_REQUEST['branch'];
    $username=$_REQUEST['username'];
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	
    // $sql="select * from booking_from where courier_mode='$branch' AND In_transit=1"; //&& username='$username' AND customer_type !='party'
    
    $sql="";

$bran=explode(",",$branch);
$co = count($bran);
$cot=0;

if($co > 1) { 
foreach($bran as $br) {
    $cot++;
    if($cot==1){
   $sql .="select * from booking_from where courier_mode='$br'";
 }
 else{
    $sql .=" Or courier_mode='$br'";
   }
   
 if($co==$cot){
  $sql .="";
    }
    }
}
else{
   $sql .="select * from booking_from where courier_mode='$branch'";
}
$sql.=" AND In_transit=1";

    if($from!="" && $to!="")
    {
          $from=date('d-m-Y',strtotime($from));
 $to=date('d-m-Y',strtotime($to));
  
     $sql .=" AND (createdAt >='$from' AND createdAt<='$to')";   
    }
    $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
          if($records['delivery_date']!="") {
                 $delivery_date=date('d-m-Y h:i:s', strtotime($records['delivery_date']));
        }
        else{
                 $delivery_date='';
        }
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                     "si_no"=>$si_no['si_no'],
              "consignee_name"=>$records['consignee_name'],
                        "id"=>$records['id'],
                    "document_type"=>$records['document_type'],
                    "booking_mode"=>$records['booking_mode'],
                    "courier_mode"=>$records['courier_mode'],
                    "createdAt"=>$records['createdAt'],
                    "customer_type"=>$records['customer_type'],
                             "username"=>$records['username'],
               
                    "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_name"=>$records['to_name'],
                    "to_address"=>$records['to_address'],
                    "to_contact"=>$records['to_contact'],
                    
                    "booking_number"=>$records['booking_number'],
                    "customer_id"=>$records['customer_id'],
                    "destination"=>$records['destination'],
                    "weight"=>$records['weight'],
                    "volume_weight"=>$records['volume_weight'],
                    "risk_charge"=>$records['risk_charge'],
                    "amount"=>$records['amount'],
                    "product_value"=>$records['product_value'],
                      "delivery_date"=>$delivery_date,
                    "In_transit"=>$records['In_transit']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detailbookingrtouser")
{
    $branch=$_REQUEST['branch'];
    $username=$_REQUEST['username'];
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	
    // $sql="select * from booking_from where courier_mode='$branch' AND rto_status=1"; //&& username='$username' AND customer_type !='party' 
   $sql="";

$bran=explode(",",$branch);
$co = count($bran);
$cot=0;

if($co > 1) { 
foreach($bran as $br) {
    $cot++;
    if($cot==1){
   $sql .="select * from booking_from where courier_mode='$br'";
 }
 else{
    $sql .=" Or courier_mode='$br'";
   }
   
 if($co==$cot){
  $sql .="";
    }
    }
}
else{
   $sql .="select * from booking_from where courier_mode='$branch'";
}
$sql.=" AND rto_status=1";

if($from!="" && $to!="")
    {
          $from=date('d-m-Y',strtotime($from));
 $to=date('d-m-Y',strtotime($to));
  
     $sql .=" AND (createdAt >='$from' AND createdAt<='$to')";   
    }
    $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
          if($records['delivery_date']!="") {
                 $delivery_date=date('d-m-Y h:i:s', strtotime($records['delivery_date']));
        }
        else{
                 $delivery_date='';
        }
        
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                     "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
               "consignee_name"=>$records['consignee_name'],
                       "document_type"=>$records['document_type'],
                    "booking_mode"=>$records['booking_mode'],
                    "courier_mode"=>$records['courier_mode'],
                    "createdAt"=>$records['createdAt'],
                    "customer_type"=>$records['customer_type'],
                             "username"=>$records['username'],
               
                    "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_name"=>$records['to_name'],
                    "to_address"=>$records['to_address'],
                    "to_contact"=>$records['to_contact'],
                    
                    "booking_number"=>$records['booking_number'],
                    "customer_id"=>$records['customer_id'],
                    "destination"=>$records['destination'],
                    "weight"=>$records['weight'],
                    "volume_weight"=>$records['volume_weight'],
                    "risk_charge"=>$records['risk_charge'],
                    "amount"=>$records['amount'],
                    "product_value"=>$records['product_value'],
                    "delivery_date"=>$delivery_date,
                    "rto_status"=>$records['rto_status']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detailbookingnotdelivereduser")
{
    $branch=$_REQUEST['branch'];
    $username=$_REQUEST['username'];
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	
    // $sql="select * from booking_from where courier_mode='$branch' AND notdev_status=1"; //customer_type !='party' 
   
   $sql="";

$bran=explode(",",$branch);
$co = count($bran);
$cot=0;

if($co > 1) { 
foreach($bran as $br) {
    $cot++;
    if($cot==1){
   $sql .="select * from booking_from where courier_mode='$br'";
 }
 else{
    $sql .=" Or courier_mode='$br'";
   }
   
 if($co==$cot){
  $sql .="";
    }
    }
}
else{
   $sql .="select * from booking_from where courier_mode='$branch'";
}
$sql.=" AND notdev_status=1";

if($from!="" && $to!="")
    {
          $from=date('d-m-Y',strtotime($from));
 $to=date('d-m-Y',strtotime($to));
  
     $sql .=" AND (createdAt >='$from' AND createdAt<='$to')";   
    }
    $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
        if($records['delivery_date']!="") {
                 $delivery_date=date('d-m-Y h:i:s', strtotime($records['delivery_date']));
        }
        else{
                 $delivery_date='';
        }
        
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                     "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "document_type"=>$records['document_type'],
                   "consignee_name"=>$records['consignee_name'],
                   "booking_mode"=>$records['booking_mode'],
                    "courier_mode"=>$records['courier_mode'],
                    "createdAt"=>$records['createdAt'],
                    "customer_type"=>$records['customer_type'],
                             "username"=>$records['username'],
               
                    "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_name"=>$records['to_name'],
                    "to_address"=>$records['to_address'],
                    "to_contact"=>$records['to_contact'],
                    
                    "booking_number"=>$records['booking_number'],
                    "customer_id"=>$records['customer_id'],
                    "destination"=>$records['destination'],
                    "weight"=>$records['weight'],
                    "volume_weight"=>$records['volume_weight'],
                    "risk_charge"=>$records['risk_charge'],
                    "amount"=>$records['amount'],
                    "product_value"=>$records['product_value'],
                       
        "delivery_date"=>$delivery_date,
                    "notdev_status"=>$records['notdev_status']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detailbookingreacheddestinationuser")
{
    $branch=$_REQUEST['branch'];
    $username=$_REQUEST['username'];
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	
    // $sql="select * from booking_from where courier_mode='$branch' AND des_status=1"; //='$branch' && username='$username' AND customer_type !='party'
    
    $sql="";

$bran=explode(",",$branch);
$co = count($bran);
$cot=0;

if($co > 1) { 
foreach($bran as $br) {
    $cot++;
    if($cot==1){
   $sql .="select * from booking_from where courier_mode='$br'";
 }
 else{
    $sql .=" Or courier_mode='$br'";
   }
   
 if($co==$cot){
  $sql .="";
    }
    }
}
else{
   $sql .="select * from booking_from where courier_mode='$branch'";
}
$sql.=" AND des_status=1";

    if($from!="" && $to!="")
    {
          $from=date('d-m-Y',strtotime($from));
 $to=date('d-m-Y',strtotime($to));
  
     $sql .=" AND (createdAt >='$from' AND createdAt<='$to')";   
    }
    $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
          if($records['delivery_date']!="") {
                 $delivery_date=date('d-m-Y h:i:s', strtotime($records['delivery_date']));
        }
        else{
                 $delivery_date='';
        }
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                     "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "document_type"=>$records['document_type'],
             "consignee_name"=>$records['consignee_name'],
                         "booking_mode"=>$records['booking_mode'],
                    "courier_mode"=>$records['courier_mode'],
                    "createdAt"=>$records['createdAt'],
                    "customer_type"=>$records['customer_type'],
                           "username"=>$records['username'],
                 
                    "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_name"=>$records['to_name'],
                    "to_address"=>$records['to_address'],
                    "to_contact"=>$records['to_contact'],
                    
                    "booking_number"=>$records['booking_number'],
                    "customer_id"=>$records['customer_id'],
                    "destination"=>$records['destination'],
                    "weight"=>$records['weight'],
                    "volume_weight"=>$records['volume_weight'],
                    "risk_charge"=>$records['risk_charge'],
                    "amount"=>$records['amount'],
                    "product_value"=>$records['product_value'],
                       "delivery_date"=>$delivery_date,
                    "des_status"=>$records['des_status']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="complaintidstatususer")
{
    $id=$_REQUEST["id"];
    
    $sql1 = "SELECT * FROM booking_from where id='$id'";
	$result1 = $conn->query($sql1);
		$branch_array=array();
	   while ($alldelivery = $result1->FETCH_ASSOC())
	   {

        $branch_array[]=array(
                   "id"=>$alldelivery['id'],
                    "Complaint_id"=>$alldelivery['Complaint_id']
            );
       }
    // print_r($branch_array);die();
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="undeli_approvaluser")
{
    $id=$_REQUEST['id'];
    
    $sql="update booking_from set status=1,out_status=0,In_transit=0,rto_status=0,notdev_status=0,des_status=0 where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
          $status_change_response=array("state"=>1);
          echo json_encode($status_change_response);
    }
}
if($action=="deli_approvaluser")
{
    $id=$_REQUEST['id'];
    
    $sql1="update booking_from set status=0 where id=$id";
    $result1=mysqli_query($conn,$sql1);
    if($result1)
    {
          $status_change_response1=array("state"=>1);
          echo json_encode($status_change_response1);
    }
}
if($action=="unout_approvaluser")
{
    $id=$_REQUEST['id'];
    
    $sql3="update booking_from set status=0,out_status=1,In_transit=0,rto_status=0,notdev_status=0,des_status=0 where id=$id";
    $result3=mysqli_query($conn,$sql3);
    if($result3)
    {
          $status_change_response3=array("state"=>1);
          echo json_encode($status_change_response3);
    }
}
if($action=="out_approvaluser")
{
    $id=$_REQUEST['id'];
    
    $sql4="update booking_from set out_status=0 where id=$id";
    $result4=mysqli_query($conn,$sql4);
    if($result4)
    {
          $status_change_response4=array("state"=>1);
          echo json_encode($status_change_response4);
    }
}
if($action=="unintra_approvaluser")
{
    $id=$_REQUEST['id'];
    
    $sql5="update booking_from set status=0,out_status=0,In_transit=1,rto_status=0,notdev_status=0,des_status=0 where id=$id";
    $result5=mysqli_query($conn,$sql5);
    if($result5)
    {
          $status_change_response5=array("state"=>1);
          echo json_encode($status_change_response5);
    }
}
if($action=="intra_approvaluser")
{
    $id=$_REQUEST['id'];
    
    $sql6="update booking_from set In_transit=0 where id=$id";
    $result6=mysqli_query($conn,$sql6);
    if($result6)
    {
          $status_change_response6=array("state"=>1);
          echo json_encode($status_change_response6);
    }
}
if($action=="unrto_approvaluser")
{
    $id=$_REQUEST['id'];
    
    $sql7="update booking_from set status=0,out_status=0,In_transit=0,rto_status=1,notdev_status=0,des_status=0 where id=$id";
    $result7=mysqli_query($conn,$sql7);
    if($result7)
    {
          $status_change_response7=array("state"=>1);
          echo json_encode($status_change_response7);
    }
}
if($action=="rto_approvaluser")
{
    $id=$_REQUEST['id'];
    
    $sql8="update booking_from set rto_status=0 where id=$id";
    $result8=mysqli_query($conn,$sql8);
    if($result8)
    {
          $status_change_response8=array("state"=>1);
          echo json_encode($status_change_response8);
    }
}
if($action=="unnotdeli_approvaluser")
{
    $id=$_REQUEST['id'];
    
    $sql9="update booking_from set status=0,out_status=0,In_transit=0,rto_status=0,notdev_status=1,des_status=0 where id=$id";
    $result9=mysqli_query($conn,$sql9);
    if($result9)
    {
          $status_change_response9=array("state"=>1);
          echo json_encode($status_change_response9);
    }
}
if($action=="notdeli_approvaluser")
{
    $id=$_REQUEST['id'];
    
    $sql10="update booking_from set notdev_status=0 where id=$id";
    $result10=mysqli_query($conn,$sql10);
    if($result10)
    {
          $status_change_response10=array("state"=>1);
          echo json_encode($status_change_response10);
    }
}
if($action=="unreachdest_approvaluser")
{
    $id=$_REQUEST['id'];
    
    $sql11="update booking_from set status=0,out_status=0,In_transit=0,rto_status=0,notdev_status=0,des_status=1 where id=$id";
    $result11=mysqli_query($conn,$sql11);
    if($result11)
    {
          $status_change_response11=array("state"=>1);
          echo json_encode($status_change_response11);
    }
}
if($action=="reachdest_approvaluser")
{
    $id=$_REQUEST['id'];
    
    $sql12="update booking_from set des_status=0 where id=$id";
    $result12=mysqli_query($conn,$sql12);
    if($result12)
    {
          $status_change_response12=array("state"=>1);
          echo json_encode($status_change_response12);
    }
}


if($action=="cxdetailstatus")
{
    $id=$_REQUEST["id"];
    
    $sql2 = "SELECT * FROM customer where id='$id'";
	$result99 = $conn->query($sql2);
		$payment_array=array();
	   while ($row99 = $result99->fetch_assoc())
	   {
$cxid=$row99['from_cx_id'];
        $sqluse = "SELECT * FROM user_login where from_cx_id='$cxid' and role='party'";
	$resultus = $conn->query($sqluse);
$rowus = $resultus->fetch_assoc();

  $payment_array[]=array(
                  "id"=>$row99['id'],
                    "from_cx_id"=>$row99['from_cx_id'],
                    "from_name"=>$row99['from_name'],
                    "from_address"=>$row99['from_address'],
                    "from_active"=>$row99['from_active'],
                    "from_contact"=>$row99['from_contact'],
                     "username"=>$row99['username'],
                     "password"=>$rowus['password'],
                          "email"=>$rowus['email']
                  
            );
    }
    // print_r($payment_array);die();
  $branch_data_response=array(
                        "status"=>1,
                        "data"=>$payment_array
        );
        
    echo json_encode($branch_data_response);
}



if($action=="fetch_branch_detail5")
{
    $sql="select * from company GROUP BY company_name order by id desc";
    $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                    "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "company_name"=>$records['company_name']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detail50")
{
	$username=$_REQUEST["username"];
	$branch=$_REQUEST["branch"];
	
    $sql="select * from company where branch = '$branch' && username = '$username' GROUP BY company_name order by id desc";
    $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                    "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "company_name"=>$records['company_name']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="fetch_branch_detail6")
{
    $sql="select * from customer GROUP BY from_name order by id desc";
    $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                    "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "from_name"=>$records['from_name'],
                    "from_contact"=>$records['from_contact'],
                    "from_cx_id"=>$records['from_cx_id']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detail60")
{
	$username=$_REQUEST["username"];
	$branch=$_REQUEST["branch"];
	
    $sql="select * from customer where branch = '$branch' && username = '$username' GROUP BY from_name  order by id desc";
    $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                    "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "from_name"=>$records['from_name'],
                    "from_contact"=>$records['from_contact'],
                    "from_cx_id"=>$records['from_cx_id']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}


if($action=="search_from_name")
{
    
    $sql="select * from customer";
    $result=mysqli_query($conn,$sql);
    
    $from_array=array();
    
    while($rec=mysqli_fetch_assoc($result))
    {
        $from_array[]=array(
            "from_name"=>$rec['from_name']
            );
    }
    
    $from_address_response=array("status"=>1,"data"=>$from_array);
    
    echo json_encode($from_address_response);
}

if($action=="search_from_name1")
{
    
    $sql="select * from company";
    $result=mysqli_query($conn,$sql);
    
    $from_array=array();
    
    while($rec=mysqli_fetch_assoc($result))
    {
        $from_array[]=array(
            "company_name"=>$rec['company_name']
            );
    }
    
    $from_address_response=array("status"=>1,"data"=>$from_array);
    
    echo json_encode($from_address_response);
}

if($action=="search_from_name2")
{
    $branch=$_REQUEST['branch'];
    $username=$_REQUEST['username'];

    $sql1="select * from customer where branch='$branch' && username='$username'";
    $result1=mysqli_query($conn,$sql1);
    
    $from_array1=array();
    
    while($rec1=mysqli_fetch_assoc($result1))
    {
        $from_array1[]=array(
            "from_name"=>$rec1['from_name']
            );
    }
    
    $from_address_response1=array("status"=>1,"data"=>$from_array1);
    
    echo json_encode($from_address_response1);
}

if($action=="search_from_address")
{
    $from_name=$_REQUEST['from_name'];
     $sql="select * from customer where from_name='$from_name'";
   $result=mysqli_query($conn,$sql);
   $rec=mysqli_fetch_assoc($result);
   
    $from_array=array();
     if($rec==""){
    $sql="select * from company where company_name='$from_name'";
//   print_r($sql);die();
   $result=mysqli_query($conn,$sql);
   
    while($rec=mysqli_fetch_assoc($result))
    {
        $from_array[]=array(
            "from_address"=>$rec['address'],
            "from_contact"=>$rec['mobile']
               );
    }
     }
    else{
    $sql="select * from customer where from_name='$from_name'";
   $result=mysqli_query($conn,$sql);
  
    while($rec=mysqli_fetch_assoc($result))
    {
        $from_array[]=array(
            "from_cx_id"=>$rec['from_cx_id'],
            "from_active"=>$rec['from_active'],
                    "from_name"=>$rec['from_name'],
                    "from_address"=>$rec['from_address'],
                    "from_contact"=>$rec['from_contact']
            );
    }
    
    }
    
  
    $from_address_response=array("status"=>1,"data"=>$from_array);
    
    echo json_encode($from_address_response);
}


if($action=="payment_from_detail10")
{
    $name = $_REQUEST["name"];
    $sql1 = "SELECT id,from_cx_id,from_active,name,from_contact,to_address,mode_payment,amount_enter,createdAt11,SUM(total1) as total1,SUM(paymnent) as paymnent,SUM(balance) as balance FROM party where name='$name' GROUP BY name";

    // $sql1 = "SELECT id,from_cx_id,name,from_contact,to_address,mode_payment,createdAt11,SUM(total1) as total1,SUM(paymnent) as paymnent FROM party where name='$name'";
	$result1 = $conn->query($sql1);
	
		$branch_array=array();
// 		$balance=$monthloading['total1']-$amount_enter;
	   while ($monthloading = $result1->FETCH_ASSOC())
{
        $branch_array[]=array(
                    "id"=>$monthloading['id'],
                    "bill_id"=>$monthloading['bill_id'],
                     "total1"=>$monthloading['total1'],
                    "paymnent"=>$monthloading['paymnent'],
                     "amount_enter"=>$monthloading['amount_enter'],
                    // "balance"=>$balance,
                    "balance"=>$monthloading['balance'],
                    "from_date"=>$monthloading['from_date'],
                    "to_date"=>$monthloading['to_date']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="payment_from_detail12")
{
    $name = $_REQUEST["name"];
     $branch = $_REQUEST["branch"];
    $username = $_REQUEST["username"];
    
        $sql1 = "SELECT id,from_cx_id,from_active,name,from_contact,to_address,mode_payment,amount_enter,createdAt11,SUM(total1) as total1,SUM(paymnent) as paymnent,SUM(balance) as balance FROM party where name='$name' && branch1='$branch' && username1='$username' GROUP BY name";
	$result1 = $conn->query($sql1);
	
		$branch_array=array();
	   while ($monthloading = $result1->FETCH_ASSOC())
{
        $branch_array[]=array(
            "id"=>$monthloading['id'],
                    "bill_id"=>$monthloading['bill_id'],
                     "total1"=>$monthloading['total1'],
                    "paymnent"=>$monthloading['paymnent'],
                     "amount_enter"=>$monthloading['amount_enter'],
                    // "balance"=>$balance,
                    "balance"=>$monthloading['balance'],
                    "from_date"=>$monthloading['from_date'],
                    "to_date"=>$monthloading['to_date']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action == "update_status")
{
    $id=$_REQUEST['id'];
    $val=$_REQUEST['val'];
    $date_up=date("d-m-Y h:i:s");
    
    if($val == "In transit")
    {
    $update_status="update user_booking set status='$val',in_transit_date='$date_up' where id='$id' ";    
    }else if($val == "Delivered")
    {
    $update_status="update user_booking set status='$val',delivered_date='$date_up' where id='$id' ";
    }else if($val == "Out for delivery")
    {
    $update_status="update user_booking set status='$val',out_of_delivery_date='$date_up' where id='$id' ";
    }else if($val == "RTO")
    {
    $update_status="update user_booking set status='$val',rto_date='$date_up' where id='$id' ";
    }else if($val == "Not delivered")
    {
    $update_status="update user_booking set status='$val',not_delivered_date='$date_up' where id='$id' ";
    }else //if($val == "Reached destination")
    {
    $update_status="update user_booking set status='$val',reached_desti_date='$date_up' where id='$id' ";
    }
    // $update_status="update user_booking set status='$val' where id='$id' ";
    $update_status_sql=$conn->query($update_status);
    
    if($update_status_sql)
    {
        $status_response=array(
                        "status"=>1
        );
    }else{
        $status_response=array(
                        "status"=>0
        );
    }
    echo json_encode($status_response);
}

if($action=="monthpaid")
{
    

$id=$_REQUEST['id'];
$monthbill_id=$_REQUEST['monthbill_id'];
$paymnent=$_REQUEST['paymnent'];
$balance=$_REQUEST['balance'];
$total=$_REQUEST['total'];
$branch=$_REQUEST['branch'];
$username=$_REQUEST['username'];
$userId=$_REQUEST['userId'];
$from_name=$_REQUEST['from_name'];
    
  $sql99 = "SELECT * FROM monthpaid where id='$id'";
	$result99 = $conn->query($sql99);
		$payment_array=array();
	   while ($row99 = $result99->fetch_assoc())
	   {

        $payment_array[]=array(
                  "id"=>$row99['id'],
                    "monthbill_id"=>$row99['monthbill_id'],
                    "paymnent"=>$row99['paymnent'],
                    "balance"=>$row99['balance'],
                    "total1"=>$row99['total1'],
                    "from_name"=>$row99['company_name1'],
                    // "branch1"=>$row99['branch1'],
                    // "pymtdate"=>$row99['pymtdate'],
                    "mode_payment"=>$row99['mode_payment'],
                    "company_name1"=>$row99['company_name1'],
                    "from_name"=>$row99['from_name']
            );
    }
    // print_r($payment_array);die();
  $branch_data_response=array(
                        "status"=>1,
                        "data"=>$payment_array
        );
        
    echo json_encode($branch_data_response);
}