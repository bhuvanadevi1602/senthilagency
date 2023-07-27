<?php
include('config.php');

$action=$_REQUEST['action'];


if($action=="fetch_handle1")
{
    $date=$_REQUEST['date'];
    $from=$_REQUEST['from'];

    $sql111="SELECT * FROM base where consignment_type='month' && company_name='$from' && createdAt LIKE '$date%'";
    $result111=mysqli_query($conn,$sql111);
    
    $branch_array=array();
    while($records111=mysqli_fetch_assoc($result111))
    {
      $dateMonth = date('Y-m',strtotime($records111['createdAt']));
        
        $branch_array[]=array(
                   "id"=>$records111['id'],
                    "company_name"=>$records111['company_name'],
                    "to_name"=>$records111['to_name'],
                    "quantity_kg"=>$records111['quantity_kg'],
                    "rate"=>$records111['rate'],
                    "createdAt"=>$records111['createdAt'],
                    "amount_paid"=>$records111['amount_paid'],
                    "balance"=>$records111['balance'],
                     "total"=>$records111['total']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="fetch_handle")
{
    $date=$_REQUEST['date'];
    $from=$_REQUEST['from'];

    $sql111="SELECT * FROM base where consignment_type='month' && company_name='$from' && createdAt LIKE '$date%'";
    $result111=mysqli_query($conn,$sql111);
    
    $branch_array=array();
    while($records111=mysqli_fetch_assoc($result111))
    {
      $dateMonth = date('Y-m',strtotime($records111['createdAt']));
        
        $branch_array[]=array(
                   "id"=>$records111['id'],
                    "company_name"=>$records111['company_name'],
                    "to_name"=>$records111['to_name'],
                    "quantity_kg"=>$records111['quantity_kg'],
                    "rate"=>$records111['rate'],
                    "createdAt"=>$records111['createdAt'],
                    "amount_paid"=>$records111['amount_paid'],
                    "balance"=>$records111['balance'],
                     "total"=>$records111['total']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="fetch_handleall")
{
   $fromdate = date('Y-m-d',strtotime($_REQUEST['fromdate']));
    $todate = date('Y-m-d',strtotime($_REQUEST['todate']));
      $consignment_type=$_REQUEST['consignment_type'];

    $sql111="SELECT * FROM base WHERE createdAt >='$fromdate' AND createdAt<='$todate' AND consignment_type='$consignment_type'";
    $result111=mysqli_query($conn,$sql111);
    
    $branch_array=array();
    while($records111=mysqli_fetch_assoc($result111))
    {
    //   $dateMonth = date('Y-m',strtotime($records111['createdAt']));
        
        $branch_array[]=array(
                   "id"=>$records111['id'],
                    "company_name"=>$records111['company_name'],
                    "to_name"=>$records111['to_name'],
                    "quantity_kg"=>$records111['quantity_kg'],
                    "rate"=>$records111['rate'],
                    "createdAt"=>$records111['createdAt'],
                    "amount_paid"=>$records111['amount_paid'],
                    "balance"=>$records111['balance'],
                     "total"=>$records111['total']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="fetch_handle_withdelivery")
{
    $fromdate2=$_REQUEST['fromdate2'];
    $fromname2=$_REQUEST['fromname2'];

    $sql1="SELECT * FROM base where delivery_status='delivered' && to_name='$fromname2' && createdAt LIKE '$fromdate2%'";
    $result1=mysqli_query($conn,$sql1);
    
    $branch_array=array();
    while($records1=mysqli_fetch_assoc($result1))
    {
      $dateMonth = date('Y-m',strtotime($records1['createdAt']));
        
        $branch_array[]=array(
                  "si_no"=>$si_no['si_no'],
                   "id"=>$records1['id'],
                    "to_name"=>$records1['to_name'],
                    "total"=>$records1['total'],
                    "createdAt"=>$records1['createdAt'],
                    "amount_paid"=>$records1['amount_paid'],
                    "balance"=>$records1['balance'],
                    "mode_transport"=>$records1['mode_transport'],
                    "delivery_status"=>$records1['delivery_status']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="fetch_handle_withoutdelivery")
{
    $fromdate1=$_REQUEST['fromdate1'];
    $form_name1=$_REQUEST['form_name1'];

    $sql1="SELECT * FROM base where delivery_status!='delivered' && to_name='$form_name1' && createdAt LIKE '$fromdate1%'";
    $result1=mysqli_query($conn,$sql1);
    
    $branch_array=array();
    while($records1=mysqli_fetch_assoc($result1))
    {
      $dateMonth = date('Y-m',strtotime($records1['createdAt']));
        
        $branch_array[]=array(
            "si_no"=>$si_no['si_no'],
                   "id"=>$records1['id'],
                    "to_name"=>$records1['to_name'],
                    "total"=>$records1['total'],
                    "createdAt"=>$records1['createdAt'],
                    "delivery_status"=>$records1['delivery_status']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="fetch_handle_paid")
{
    $fromdate3=$_REQUEST['fromdate3'];
    $fromname3=$_REQUEST['fromname3'];

    $sql1="SELECT * FROM base where balance=0 && to_name='$fromname3' && createdAt LIKE '$fromdate3%'";
    $result1=mysqli_query($conn,$sql1);
    
    $branch_array=array();
    while($records1=mysqli_fetch_assoc($result1))
    {
      $dateMonth = date('Y-m',strtotime($records1['createdAt']));
        
        $branch_array[]=array(
                   "id"=>$records1['id'],
                    "to_name"=>$records1['to_name'],
                    "createdAt"=>$records1['createdAt'],
                    "amount_paid"=>$records1['amount_paid'],
                    "total"=>$records1['total'],
                    "balance"=>$records1['balance'],
                    "mode_transport"=>$records1['mode_transport']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="fetch_handle_unpaid")
{
    $fromdate4=$_REQUEST['fromdate4'];
    $fromname4=$_REQUEST['fromname4'];

    $sql1="SELECT * FROM base where balance!=0 && to_name='$fromname4' && createdAt LIKE '$fromdate4%'";
    $result1=mysqli_query($conn,$sql1);
    
    $branch_array=array();
    while($records1=mysqli_fetch_assoc($result1))
    {
      $dateMonth = date('Y-m',strtotime($records1['createdAt']));
        
        $branch_array[]=array(
                   "id"=>$records1['id'],
                    "to_name"=>$records1['to_name'],
                    "booking_type"=>$records1['booking_type'],
                    "createdAt"=>$records1['createdAt'],
                    "balance"=>$records1['balance']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}




if($action=="deliverybranchstatus")
{
    $id=$_REQUEST["id"];
    
    $sql1 = "SELECT * FROM base where id='$id'";
	$result1 = $conn->query($sql1);
		$branch_array=array();
	   while ($withdelivery = $result1->FETCH_ASSOC())
	   {
        $dateMonth = date('Y-m',strtotime($withdelivery['createdAt']));
        
        $branch_array[]=array(
                   "id"=>$withdelivery['id'],
                    "delivery_status"=>$withdelivery['delivery_status'],
                    "date"=>$withdelivery['date'],
                    "time"=>$withdelivery['time'],
                    "remarks"=>$withdelivery['remarks']
            );
    }
    // print_r($branch_array);die();
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}



if($action=="trackingbranchstatus")
{
    $id=$_REQUEST["id"];
    
    $sql1 = "SELECT * FROM tracking where id='$id'";
	$result1 = $conn->query($sql1);
		$branch_array=array();
	   while ($alltracking = $result1->FETCH_ASSOC())
	   {
        $dateMonth = date('Y-m',strtotime($alltracking['createdAt']));
        
        $branch_array[]=array(
                   "id"=>$alltracking['id'],
                    "repayment_date"=>$alltracking['repayment_date'],
                    "repayment"=>$alltracking['repayment']
            );
    }
    // print_r($branch_array);die();
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="monthtrackingbranchstatus")
{
    $id=$_REQUEST["id"];
    
    $sql51 = "SELECT * FROM tracking where id='$id'";
	$result51 = $conn->query($sql51);
		$branch_array51=array();
	   while ($monthtracking = $result51->FETCH_ASSOC())
	   {
	       
        $branch_array51[]=array(
                   "id"=>$monthtracking['id'],
                    "repayment_date"=>$monthtracking['repayment_date'],
                    "repayment"=>$monthtracking['repayment']
            );
    }
    // print_r($branch_array);die();
    $branch_data_response51=array(
                        "status"=>1,
                        "data"=>$branch_array51
        );
        
    echo json_encode($branch_data_response51);
}

if($action=="nameCheck"){
    
    $name = $_REQUEST["name"];
    
    $sql = "SELECT * FROM `customer` WHERE from_name ='$name'";
    $resultCustomer = $conn->query($sql);
    // $resultCustomer->num_rows;
    $cusTable = $resultCustomer->fetch_assoc();
	$emp_check = $cusTable["from_name"];
    if($emp_check==""){
        $response = array(
            "status" => 1,
            "msg" => "available"
    	);
    } else {
        $response = array(
            "status" => 1,
            "msg" => "alreadyexist"
    	);
    }
	echo json_encode($response);    	
        	
}






if($action == "fetch_register_users")
{
    $row = isset($_REQUEST['start']) ? $_REQUEST['start']: '';
    if($user_role=="admin"){
         $fromdate = date('Y-m-d',strtotime($_REQUEST['fromdate']));
         $todate = date('Y-m-d',strtotime($_REQUEST['todate']));
         $user = $_REQUEST['user'];
         $type = $_REQUEST['type'];

        if($type){
            switch ($type) {
                case '1':
                    echo $user_qry="SELECT * FROM base WHERE (createdAt >='$fromdate' AND createdAt<='$todate' AND booking_type='$user') order by id desc";
                    break;
                case '2':
                    echo $user_qry="SELECT * FROM base WHERE (createdAt >='$fromdate' AND createdAt<='$todate') order by id desc";
                    break;
                case '3':
                    echo $user_qry="SELECT * FROM base WHERE booking_type='$user' order by id desc";
                    break;
            }
        }else{
            $user_qry="SELECT * FROM base order by id desc";
        }

        // if($from!="" && $to!="" && $user != ""){
        //     if($from!="" && $to!="" && is_null($user) == false){
        //       $user_qry="SELECT * FROM nextgen_register WHERE (register_time >='$from' AND register_time<='$to') order by id desc";
        //     }else{
        //         $user_qry="SELECT * FROM nextgen_register WHERE (register_time >='$from' AND register_time<='$to' AND referred_user_id='$user') order by id desc";
        //     }
        // // }elseif($from!="" && $to!=""){
        // //     $user_qry="SELECT * FROM nextgen_register WHERE (register_time >='$from' AND register_time<='$to') order by id desc";
        // }elseif($user!=""){
        //     $user_qry="SELECT * FROM nextgen_register WHERE referred_user_id='$user' order by id desc";
        // }else{
        //     $user_qry="SELECT * FROM nextgen_register order by id desc";
        // }
    }
    // else{
    //     $user_qry="SELECT * FROM base WHERE referred_user='$backendUserName' order by id desc";
    // }
    
    $user_qry_qry_sql=$connect->prepare($user_qry);
    $user_qry_qry_sql->execute();
    $fetch_users=array();
    $row_index=$row;
    while($row_user = $user_qry_qry_sql->fetch(PDO::FETCH_ASSOC)){
        $row_index++;
        $article_row["row_index"]=$row_index;
        $fetch_users[]=array(
            "id"=>$row_user["id"],
            "to_name"=>$article_row["to_name"],
            "to_address"=>$row_user["to_address"],
            "to_contact"=>$row_user["to_contact"],
            "booking_type"=>$row_user["booking_type"],
            // "email_id"=>$row_user["email_id"],
            // "expiry_date"=>$row_user["expiry_date"],
            // "is_active"=>$row_user["is_active"],
            // "package_purchased"=>$row_user["package_purchased"],
            // "referred_user"=>$row_user["referred_user"],
            // "role"=>$row_user["role"],
            // "register_time"=>$row_user["register_time"]
            
        );
     }
     
     $response_users=array(
		"status"=> 1,
		"data" => $fetch_users
	);
	echo json_encode($response_users);
}





if($action=="fetch_all")
{
    //  $fromdate=$_REQUEST['fromdate'];
    //  $todate=$_REQUEST['todate'];
     
       $fromdate = date('Y-m-d',strtotime($_REQUEST['fromdate']));
       $todate = date('Y-m-d',strtotime($_REQUEST['todate']));

    $sql11="SELECT * FROM base where createdAt";
    $result11=mysqli_query($conn,$sql11);
    
    $branch_array=array();
    while($records11=mysqli_fetch_assoc($result11))
    {
        
        $branch_array[]=array(
                   "id"=>$records11['id'],
                    "to_name"=>$records11['to_name'],
                    "to_address"=>$records11['to_address'],
                    "to_contact"=>$records11['to_contact'],
                    "booking_type"=>$records11['booking_type'],
                    "createdAt"=>$records11['createdAt']
            );
    }
    
    $branch_data_response11=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response11);
}

if($action=="fetch_branch_detail")
{
    $sql="select * from add_branch";
    $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                    "si_no"=>$si_no['si_no'],
                    "branch_id"=>$records['branch_id'],
                    "branch_name"=>$records['branch_name'],
                    "created_date"=>$records['created_date']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="fetch_completed_project")
{
    $id=$_REQUEST['id'];
    $sql="select id from tracking where id=$id";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        $completed_data=array();
        while($data=mysqli_fetch_assoc($result))
        {
            $completed_data[]=array(
                "id"=>$data['id']
            );
        }
        
        $file_response=array("status"=>1);
        echo json_encode($file_response);
    }
    
}

if($action=="view_detail")
{
    $sql="SELECT * FROM base ";
        // $sql="SELECT * FROM base join delivery ON base.id = delivery.id where delivery_status=''"";
    $result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records1=mysqli_fetch_assoc($result))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                    "si_no"=>$si_no['si_no'],
                    "id"=>$records1['id'],
                    "to_name"=>$records1['to_name'],
                    "to_address"=>$records1['to_address'],
                    "to_contact"=>$records1['to_contact'],
                    "booking_type"=>$records1['booking_type'],
                    "createdAt"=>$records1['createdAt']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}


if($action == "fetch_register_users")
{
    $row = isset($_REQUEST['start']) ? $_REQUEST['start']: '';
    
         $fromdate = date('Y-m-d',strtotime($_REQUEST['fromdate']));
         $todate = date('Y-m-d',strtotime($_REQUEST['todate']));
         $booking_type = $_REQUEST['booking_type'];
         $type = $_REQUEST['type'];

        if($type){
            switch ($type) {
                 case '1':
                       echo $user_qry="SELECT * FROM base WHERE (createdAt >='$fromdate' AND createdAt<='$todate' AND booking_type='$booking_type') order by id desc";
                        break;
                    case '2':
                       echo $user_qry="SELECT * FROM base WHERE (createdAt >='$fromdate' AND createdAt<='$todate') order by id desc";
                        break;
                    case '3':
                        $user_qry="SELECT * FROM base WHERE booking_type='$booking_type' order by id desc";
                        break;
            }
        }else{
             $user_qry="SELECT * FROM base ORDER BY id ASC";
        }
     
    $result=mysqli_query($conn,$user_qry);
    
    $branch_array=array();
    while($records1=mysqli_fetch_assoc($result))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                    "si_no"=>$si_no['si_no'],
                    "id"=>$records1['id'],
                    "to_name"=>$records1['to_name'],
                    "to_address"=>$records1['to_address'],
                    "to_contact"=>$records1['to_contact'],
                    "booking_type"=>$records1['booking_type'],
                    "createdAt"=>$records1['createdAt']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}


// if($action=="fetch_location_example3")
// {
//     $sql16="SELECT * FROM base";
//     $result16=mysqli_query($conn,$sql16);
    
//     $branch_array=array();
//     while($records16=mysqli_fetch_assoc($result16))
//     {
//         $row_id++;
//         $si_no['si_no']=$row_id;
//         $branch_array[]=array(
//                     "si_no"=>$si_no['si_no'],
//                     "id"=>$records16['id'],
//                     "to_name"=>$records16['to_name'],
//                     "to_address"=>$records16['to_address'],
//                     "to_contact"=>$records16['to_contact'],
//                     "booking_type"=>$records16['booking_type'],
//                     "lr_no"=>$records16['lr_no']
//                     //  "delivery_status"=>$records1['delivery_status']
//             );
//     }
    
//     $branch_data_response16=array(
//                         "status"=>1,
//                         "data"=>$branch_array
//         );
        
//     echo json_encode($branch_data_response16);
// }

if($action=="view_detail1")
{
    $sql11="SELECT * FROM delivery ORDER BY delivery_id DESC";
    $result11=mysqli_query($conn,$sql11);
    
    $branch_array=array();
    while($records111=mysqli_fetch_assoc($result11))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                    "si_no"=>$si_no['si_no'],
                    "delivery_id"=>$records111['delivery_id'],
                    "delivery_status"=>$records111['delivery_status']
                    // "to_address"=>$records111['to_address'],
                    // "to_contact"=>$records111['to_contact'],
                    // "booking_type"=>$records1['booking_type'],
                    // "lr_no"=>$records1['lr_no']
            );
    }
    
    $branch_data_response=array(
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="fetch_services")
{
    $id=$_REQUEST['id'];
    $sql="SELECT * FROM tracking WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    
    $services_data=array();
    while($services=mysqli_fetch_assoc($result))
    {
        $services_data[]=array(
                    "id"=>$services['id'],
                    "repayment_date"=>$services['repayment_date'],
                    "repayment"=>$services['repayment'],
            );
    }
    
    $services_response=array(
		"status"=> 1,
		"data" => $services_data
	);
    echo json_encode($services_response);
}

if($action=="delete_branch")
{
    $id=$_REQUEST['branch_id'];
    
    $sql="delete from add_branch where branch_id=$id";
    $result=mysqli_query($conn,$sql);
    
    $delete_response=array("status"=>1);
    
    echo json_encode($delete_response);
}

if($action=="delete_lrform")
{
    $id=$_REQUEST['id'];
    
    $sql="delete from base where id=$id";
    $result=mysqli_query($conn,$sql);
    
    $delete_response=array("status"=>1);
    
    echo json_encode($delete_response);
}

if($action=="fetch_user_detail")
{
  $sql="select * from add_user";
  $result=mysqli_query($conn,$sql);
   
  $user_detail=array();
  while($user_data=mysqli_fetch_assoc($result))
  {
      $user_detail[]=array(
                    "user_id"=>$user_data['user_id'],
                    "name"=>$user_data['name'],
                    "role"=>$user_data['role'],
                    "branch"=>$user_data['branch'],
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
                        "branch"=>$edit_row['branch'],
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


if($action=="fetch_location")
{
    $id=$_REQUEST['track_id'];
    
    $sql="select * from tracking where id=$id";
    $result=mysqli_query($conn,$sql);
    
    $location_array=array();
    
    while($rec=mysqli_fetch_assoc($result))
    {
        $location_array[]=array(
                    "tracking_id"=>$rec['tracking_id'],
                    "id"=>$rec['id'],
                    "repayment_date"=>$rec['repayment_date'],
                    "repayment"=>$rec['repayment']
            );
    }
    
    $location_response=array("status"=>1,"data"=>$location_array);
    echo json_encode($location_response);
}
if($action=="fetch_location_all")
{
    $id=$_REQUEST['id'];
    
    $sql="select * from tracking where id=$id";
    $result=mysqli_query($conn,$sql);
    
    $location_array=array();
    
    while($rec=mysqli_fetch_assoc($result))
    {
        $location_array[]=array(
                    "tracking_id"=>$rec['tracking_id'],
                    "id"=>$rec['id'],
                    "repayment_date"=>$rec['repayment_date'],
                    "repayment"=>$rec['repayment']
            );
    }
    
    $location_response=array("status"=>1,"data"=>$location_array);
    echo json_encode($location_response);
}
if($action=="fetch_location_example1")
{
    $id=$_REQUEST['id'];
    
    $sql11="select * from tracking where id=$id";
    $result11=mysqli_query($conn,$sql11);
    
    $location_array=array();
    
    while($rec11=mysqli_fetch_assoc($result11))
    {
        $location_array[]=array(
                    "tracking_id"=>$rec11['tracking_id'],
                    "id"=>$rec11['id'],
                    "repayment_date"=>$rec11['repayment_date'],
                    "repayment"=>$rec11['repayment']
            );
    }
    
    $location_response11=array("status"=>1,"data"=>$location_array);
    echo json_encode($location_response11);
}
if($action=="fetch_location_example2")
{
    $id=$_REQUEST['id'];
    
    $sql12="select * from tracking where id=$id";
    $result12=mysqli_query($conn,$sql12);
    
    $location_array=array();
    
    while($rec12=mysqli_fetch_assoc($result12))
    {
        $location_array[]=array(
                    "tracking_id"=>$rec12['tracking_id'],
                    "id"=>$rec12['id'],
                    "repayment_date"=>$rec12['repayment_date'],
                    "repayment"=>$rec12['repayment']
            );
    }
    
    $location_response12=array("status"=>1,"data"=>$location_array);
    echo json_encode($location_response12);
}
if($action=="fetch_location_example3")
{
    $id=$_REQUEST['id'];
    
    $sql13="select * from tracking where id=$id";
    $result13=mysqli_query($conn,$sql13);
    
    $location_array=array();
    
    while($rec13=mysqli_fetch_assoc($result13))
    {
        $location_array[]=array(
                    "tracking_id"=>$rec13['tracking_id'],
                    "id"=>$rec13['id'],
                    "repayment_date"=>$rec13['repayment_date'],
                    "repayment"=>$rec13['repayment']
            );
    }
    
    $location_response13=array("status"=>1,"data"=>$location_array);
    echo json_encode($location_response13);
}
if($action=="fetch_location_example4")
{
    $id=$_REQUEST['id'];
    
    $sql14="select * from tracking where id=$id";
    $result14=mysqli_query($conn,$sql14);
    
    $location_array=array();
    
    while($rec14=mysqli_fetch_assoc($result14))
    {
        $location_array[]=array(
                    "tracking_id"=>$rec14['tracking_id'],
                    "id"=>$rec14['id'],
                    "repayment_date"=>$rec14['repayment_date'],
                    "repayment"=>$rec14['repayment']
            );
    }
    
    $location_response14=array("status"=>1,"data"=>$location_array);
    echo json_encode($location_response14);
}
if($action=="fetch_location_example5")
{
    $id=$_REQUEST['id'];
    
    $sql15="select * from tracking where id=$id ORDER BY repayment_date";
    $result15=mysqli_query($conn,$sql15);
    
    $location_array=array();
    
    while($rec15=mysqli_fetch_assoc($result15))
    {
        $location_array[]=array(
                    "tracking_id"=>$rec15['tracking_id'],
                    "id"=>$rec15['id'],
                    "repayment_date"=>$rec15['repayment_date'],
                    "repayment"=>$rec15['repayment']
            );
    }
    
    $location_response15=array("status"=>1,"data"=>$location_array);
    echo json_encode($location_response15);
}




if($action=="fetch_customer_detail")
{
    $sql="select * from customer";
    $result=mysqli_query($conn,$sql);
    
    $customer_array=array();
    while($rec=mysqli_fetch_assoc($result))
    {
        $customer_array[]=array(
                        "id"=>$rec['id'],
                        "from_cx_id"=>$rec['from_cx_id'],
                        "from_active"=>$rec['from_active'],
                        "from_name"=>$rec['from_name'],
                        "from_address"=>$rec['from_address'],
                        "from_contact"=>$rec['from_contact']
            );
    }
    
    $customer_response=array("status"=>1,"data"=>$customer_array);
    
    echo json_encode($customer_response);
}
if($action=="fetch_customer_detail11")
{
$username=$_REQUEST['username'];

    $sql="select * from customer where username='$username'";
    $result=mysqli_query($conn,$sql);
    
    $customer_array=array();
    while($rec=mysqli_fetch_assoc($result))
    {
        $customer_array[]=array(
                        "id"=>$rec['id'],
                        "from_cx_id"=>$rec['from_cx_id'],
                        "from_active"=>$rec['from_active'],
                        "from_name"=>$rec['from_name'],
                        "from_address"=>$rec['from_address'],
                        "from_contact"=>$rec['from_contact']
            );
    }
    
    $customer_response=array("status"=>1,"data"=>$customer_array);
    
    echo json_encode($customer_response);
}


if($action=="delete_customer")
{
    $id=$_REQUEST['delete_customer_id'];
    
    $sql="delete from customer where id=$id";
    $result=mysqli_query($conn,$sql);
    
    $delete_customer_response=array("status"=>1);
    
    echo json_encode($delete_customer_response);
}

if($action=="search_from_name")
{
    
    echo $sql="select * from customer";
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
    // $sql="select * from customer";
    $result=mysqli_query($conn,$sql);
    
    $from_array=array();
    
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
    
    $from_address_response=array("status"=>1,"data"=>$from_array);
    
    echo json_encode($from_address_response);
}

if($action=="search_from_months")
{
    $keyword=$_REQUEST['keyword'];
    
    $sql="select distinct company_name from company";
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


if($action=="auto_fetch")
{
    $from_name=$_REQUEST['from_name'];
    
    $sql="select from_address,from_contact from base where from_name='$from_name'";
    $result=mysqli_query($conn,$sql);
    
    $auto_data_array=array();
    
    while($rec=mysqli_fetch_assoc($result))
    {
        $auto_data_array[]=array(
                        "from_address"=>$rec['from_address'],
                        "from_contact"=>$rec['from_contact']
            );
    }
    
    $auto_data_response=array('status'=>1,"data"=>$auto_data_array);
    echo json_encode($auto_data_response);
}

if($action=="fetch_company_detail")
{
    
    $sql="select * from company";
    $result=mysqli_query($conn,$sql);
    
    
    $company_array=array();
    
    while($rec=mysqli_fetch_assoc($result))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $company_array[]=array(
                        'si_no'=>$si_no['si_no'],
                        'id'=>$rec['id'],
                        'company_name'=>$rec['company_name'],
                        'address'=>$rec['address'],
                        'gst'=>$rec['gst']
                        // 'itc'=>$rec['itc'],
                        // 'ideal'=>$rec['ideal'],
                        // 'ff'=>$rec['ff'],
                        // 'link'=>$rec['link'],
                        // 'mark'=>$rec['mark']
            );
    }
    
    $company_response=array('status'=>1,'data'=>$company_array);
    
    echo json_encode($company_response);
}

if($action=="fetch_company_detail11")
{
    
$branch=$_REQUEST['branch'];
$username=$_REQUEST['username'];

    echo $sql="select * from company where branch = '$branch' && username = '$username' ";
    $result=mysqli_query($conn,$sql);
    
    
    $company_array=array();
    
    while($rec=mysqli_fetch_assoc($result))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $company_array[]=array(
                        'si_no'=>$si_no['si_no'],
                        'id'=>$rec['id'],
                        'company_name'=>$rec['company_name'],
                        'address'=>$rec['address'],
                        'gst'=>$rec['gst']
                        // 'itc'=>$rec['itc'],
                        // 'ideal'=>$rec['ideal'],
                        // 'ff'=>$rec['ff'],
                        // 'link'=>$rec['link'],
                        // 'mark'=>$rec['mark']
            );
    }
    
    $company_response=array('status'=>1,'data'=>$company_array);
    
    echo json_encode($company_response);
}

if($action=="edit_customer")
{
    $id=$_REQUEST['edit_customer_id'];
    
    $sql="select * from customer where id=$id";
    $result=mysqli_query($conn,$sql);
    
    $edit_customer=array();
    while($edit_row=mysqli_fetch_assoc($result))
    {
        $edit_customer[]=array(
                        "id"=>$edit_row['id'],
                        "from_cx_id"=>$edit_row['from_cx_id'],
                        "from_active"=>$rec['from_active'],
                        "from_name"=>$edit_row['from_name'],
                        "from_address"=>$edit_row['from_address'],
                        "from_contact"=>$edit_row['from_contact']
                        
                );
    }
    
    $edit_customer_response=array(
                        "status"=>1,
                        "data"=>$edit_customer
        );
    echo json_encode($edit_customer_response);
}
if($action=="edit_company")
{
    $id=$_REQUEST['edit_id'];
    
    $sql="select * from company where id=$id";
    $result=mysqli_query($conn,$sql);
    
    $edit_data=array();
    while($edit_row=mysqli_fetch_assoc($result))
    {
        $edit_data[]=array(
                        "id"=>$edit_row['id'],
                        "company_name"=>$edit_row['company_name'],
                        "itc"=>$edit_row['itc'],
                        "ideal"=>$edit_row['ideal'],
                        "ff"=>$edit_row['ff'],
                        "link"=>$edit_row['link'],
                        "mark"=>$edit_row['mark'],
                );
    }
    
    $edit_data_response=array(
                        "status"=>1,
                        "data"=>$edit_data
        );
    echo json_encode($edit_data_response);
}
if($action=="delete_company")
{
    $id=$_REQUEST['delete_company_id'];
    
    $sql="delete from company where id=$id";
    $result=mysqli_query($conn,$sql);
    
    $delete_company_response=array("status"=>1);
    
    echo json_encode($delete_company_response);
}




if($action=="allpaymentstatus")
{
    $id=$_REQUEST["id"];
    
    $sql99 = "SELECT * FROM base where id='$id'";
	$result99 = $conn->query($sql99);
		$payment_array=array();
	   while ($row99 = $result99->fetch_assoc())
	   {

        $payment_array[]=array(
                  "id"=>$row99['id'],
                    "mode_payment"=>$row99['mode_payment'],
                    "amount_paid"=>$row99['amount_paid'],
                    "payment_remarks"=>$row99['payment_remarks'],
                    "balance"=>$row99['balance'],
                    "balance1"=>$row99['balance1'],
                    "already_paid"=>$row99['already_paid'],
                    "lr_no"=>$row99['lr_no'],
                    "from_name"=>$row99['from_name'],
                    "total"=>$row99['total']
            );
    }
    // print_r($payment_array);die();
  $branch_data_response=array(
                        "status"=>1,
                        "data"=>$payment_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="withoutpaymentstatus")
{
    $id=$_REQUEST["id"];
    
    $sql99 = "SELECT * FROM base where id='$id'";
	$result99 = $conn->query($sql99);
		$payment_array=array();
	   while ($row99 = $result99->fetch_assoc())
	   {

        $payment_array[]=array(
                  "id"=>$row99['id'],
                    "mode_payment"=>$row99['mode_payment'],
                    "amount_paid"=>$row99['amount_paid'],
                    "payment_remarks"=>$row99['payment_remarks'],
                    "balance"=>$row99['balance'],
                    "total"=>$row99['total']
            );
    }
    // print_r($payment_array);die();
  $branch_data_response=array(
                        "status"=>1,
                        "data"=>$payment_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="withpaymentstatus")
{
    $id=$_REQUEST["id"];
    
    $sql99 = "SELECT * FROM base where id='$id'";
	$result99 = $conn->query($sql99);
		$payment_array=array();
	   while ($row99 = $result99->fetch_assoc())
	   {

        $payment_array[]=array(
                  "id"=>$row99['id'],
                    "mode_payment"=>$row99['mode_payment'],
                    "amount_paid"=>$row99['amount_paid'],
                    "payment_remarks"=>$row99['payment_remarks'],
                    "balance"=>$row99['balance'],
                    "total"=>$row99['total']
            );
    }
    // print_r($payment_array);die();
  $branch_data_response=array(
                        "status"=>1,
                        "data"=>$payment_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="paidpaymentstatus")
{
    $id=$_REQUEST["id"];
    
    $sql99 = "SELECT * FROM base where id='$id'";
	$result99 = $conn->query($sql99);
		$payment_array=array();
	   while ($row99 = $result99->fetch_assoc())
	   {

        $payment_array[]=array(
                  "id"=>$row99['id'],
                    "mode_payment"=>$row99['mode_payment'],
                    "amount_paid"=>$row99['amount_paid'],
                    "payment_remarks"=>$row99['payment_remarks'],
                    "balance"=>$row99['balance'],
                    "total"=>$row99['total']
            );
    }
    // print_r($payment_array);die();
  $branch_data_response=array(
                        "status"=>1,
                        "data"=>$payment_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="unpaidpaymentstatus")
{
    $id=$_REQUEST["id"];
    
    $sql99 = "SELECT * FROM base where id='$id'";
	$result99 = $conn->query($sql99);
		$payment_array=array();
	   while ($row99 = $result99->fetch_assoc())
	   {

        $payment_array[]=array(
                  "id"=>$row99['id'],
                    "mode_payment"=>$row99['mode_payment'],
                    "amount_paid"=>$row99['amount_paid'],
                    "payment_remarks"=>$row99['payment_remarks'],
                    "balance"=>$row99['balance'],
                    "total"=>$row99['total']
            );
    }
    // print_r($payment_array);die();
  $branch_data_response=array(
                        "status"=>1,
                        "data"=>$payment_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="deliverymonthpaymentstatus")
{
    $id=$_REQUEST["id"];
    
    $sql99 = "SELECT * FROM base where id='$id'";
    // $echo sql99 = "SELECT * FROM base join payment ON base.id = payment.id where base.id=13";
	$result99 = $conn->query($sql99);
		$payment_array=array();
	   while ($row99 = $result99->fetch_assoc())
	   {

        $payment_array[]=array(
                  "id"=>$row99['id'],
                    "mode_payment"=>$row99['mode_payment'],
                    "amount_paid"=>$row99['amount_paid'],
                    "payment_remarks"=>$row99['payment_remarks'],
                    "balance"=>$row99['balance'],
                    "total"=>$row99['total']
            );
    }
    // print_r($payment_array);die();
  $branch_data_response=array(
                        "status"=>1,
                        "data"=>$payment_array
        );
        
    echo json_encode($branch_data_response);
}






if($action=="alldeliverystatus")
{
    $id=$_REQUEST["id"];
    
    $sql1 = "SELECT * FROM base where id='$id'";
	$result1 = $conn->query($sql1);
		$branch_array=array();
	   while ($alldelivery = $result1->FETCH_ASSOC())
	   {
        $dateMonth = date('Y-m',strtotime($withoutdelivery['createdAt']));
        
        $branch_array[]=array(
                   "id"=>$alldelivery['id'],
                    "delivery_status"=>$alldelivery['delivery_status'],
                    "date"=>$alldelivery['date'],
                    "time"=>$alldelivery['time'],
                    
                    "remarks"=>$alldelivery['remarks']
            );
    }
    // print_r($branch_array);die();
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="deliverystatus")
{
    $id=$_REQUEST["id"];
    
    $sql1 = "SELECT * FROM base where id='$id'";
	$result1 = $conn->query($sql1);
		$branch_array=array();
	   while ($withdelivery = $result1->FETCH_ASSOC())
	   {
        $dateMonth = date('Y-m',strtotime($withdelivery['createdAt']));
        
        $branch_array[]=array(
                   "id"=>$withdelivery['id'],
                    "delivery_status"=>$withdelivery['delivery_status'],
                    "date"=>$withdelivery['date'],
                    "time"=>$withdelivery['time'],
                    "remarks"=>$withdelivery['remarks']
            );
    }
    // print_r($branch_array);die();
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="withoutdeliverystatus")
{
    $id=$_REQUEST["id"];
    
    $sql1 = "SELECT * FROM base where id='$id'";
	$result1 = $conn->query($sql1);
		$branch_array=array();
	   while ($withoutdelivery = $result1->FETCH_ASSOC())
	   {
        $dateMonth = date('Y-m',strtotime($withoutdelivery['createdAt']));
        
        $branch_array[]=array(
                   "id"=>$withoutdelivery['id'],
                    "delivery_status"=>$withoutdelivery['delivery_status'],
                    "date"=>$withoutdelivery['date'],
                    "time"=>$withoutdelivery['time'],
                    "remarks"=>$withoutdelivery['remarks']
            );
    }
    // print_r($branch_array);die();
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="paidstatus")
{
    $id=$_REQUEST["id"];
    
    $sql1 = "SELECT * FROM base where id='$id'";
	$result1 = $conn->query($sql1);
		$branch_array=array();
	   while ($paid = $result1->FETCH_ASSOC())
	   {
        $dateMonth = date('Y-m',strtotime($paid['createdAt']));
        
        $branch_array[]=array(
                   "id"=>$paid['id'],
                    "delivery_status"=>$paid['delivery_status'],
                    "date"=>$paid['date'],
                    "time"=>$paid['time'],
                    "remarks"=>$paid['remarks']
            );
    }
    // print_r($branch_array);die();
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="unpaidstatus")
{
    $id=$_REQUEST["id"];
    
    $sql1 = "SELECT * FROM base where id='$id'";
	$result1 = $conn->query($sql1);
		$branch_array=array();
	   while ($unpaid = $result1->FETCH_ASSOC())
	   {
        $dateMonth = date('Y-m',strtotime($unpaid['createdAt']));
        
        $branch_array[]=array(
                   "id"=>$unpaid['id'],
                    "delivery_status"=>$unpaid['delivery_status'],
                    "date"=>$unpaid['date'],
                    "time"=>$unpaid['time'],
                    "remarks"=>$unpaid['remarks']
            );
    }
    // print_r($branch_array);die();
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="deliverymonthstatus")
{
    $id=$_REQUEST["id"];
    
    $sql1 = "SELECT * FROM base where id='$id'";
	$result1 = $conn->query($sql1);
		$branch_array=array();
	   while ($unpaid = $result1->FETCH_ASSOC())
	   {
        $dateMonth = date('Y-m',strtotime($unpaid['createdAt']));
        
        $branch_array[]=array(
                   "id"=>$unpaid['id'],
                    "delivery_status"=>$unpaid['delivery_status'],
                    "date"=>$unpaid['date'],
                    "time"=>$unpaid['time'],
                    "remarks"=>$unpaid['remarks']
            );
    }
    // print_r($branch_array);die();
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}




if($action=="partybranchstatus")
{
     $id=$_REQUEST["id"];
    
    $sql5 = "SELECT * FROM base where bill_id='$id'";
    $result5 = $conn->query($sql5);
    while ($delivery11 = $result5->FETCH_ASSOC()) {
        $branch_array[]=array(
                   "id"=>$delivery11['id'],
                    "bill_id"=>$delivery11['bill_id'],
                     "from_name"=>$delivery11['from_name'],
                      "createdAt"=>$delivery11['createdAt'],
                       "total"=>$delivery11['total'],
                        "amount_paid"=>$delivery11['amount_paid']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
    );
    // print_r($branch_array);
    echo json_encode($branch_data_response);
}






if($action=="withoutbranchstatus")
{
    $id=$_REQUEST["id"];
    
    $sql1 = "SELECT * FROM base where id='$id'";
	$result1 = $conn->query($sql1);
	
		$branch_array=array();
	   while ($withoutloading = $result1->FETCH_ASSOC())
{
        $branch_array[]=array(
                   "id"=>$withoutloading['id'],
                    "mode_transport"=>$withoutloading['mode_transport'],
                    "lorry_no"=>$withoutloading['lorry_no'],
                    "train_type"=>$withoutloading['train_type'],
                    "RR_No"=>$withoutloading['RR_No'],
                    "train_No"=>$withoutloading['train_No'],
                    "flight_no"=>$withoutloading['flight_no']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="monthbranchstatus")
{
    $id=$_REQUEST["id"];
    
    $sql1 = "SELECT * FROM base where id='$id'";
	$result1 = $conn->query($sql1);
	
		$branch_array=array();
	   while ($monthloading = $result1->FETCH_ASSOC())
{
        $branch_array[]=array(
                   "id"=>$monthloading['id'],
                    "mode_transport"=>$monthloading['mode_transport'],
                    "lorry_no"=>$monthloading['lorry_no'],
                    "train_type"=>$monthloading['train_type'],
                    "RR_No"=>$monthloading['RR_No'],
                    "train_No"=>$monthloading['train_No'],
                    "flight_no"=>$monthloading['flight_no']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}





if($action=="withoutrackbranchstatus")
{
    $id=$_REQUEST["id"];
    
    $sql1 = "SELECT * FROM tracking where id='$id'";
	$result1 = $conn->query($sql1);
	
		$branch_array=array();
	   while ($withouttracking = $result1->FETCH_ASSOC())
{
        $branch_array[]=array(
                   "id"=>$withouttracking['id'],
                    "no_stop2"=>$withouttracking['no_stop2'],
                    "repay_date"=>$withouttracking['advance_date'],
                    "repayment"=>$withouttracking['repayment']
            );
    }
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}



if($action=="payment_from_detail10")
{
    $name = $_REQUEST["name"];
    // $amount_enter = $_REQUEST["amount_enter"];
    // $amountbill =$_REQUEST["amountbill"];
    // $totalbill =$_REQUEST["totalbill"];
    // $total_amount=$totalbill-$amountbill;
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
// if($action=="payment_from_detail11")
// {
//     $name = $_REQUEST["name"];
//     $branch = $_REQUEST["branch"];
    
//         $sql1 = "SELECT id,from_cx_id,name,from_contact,to_address,mode_payment,amount_enter,createdAt11,SUM(total1) as total1,SUM(paymnent) as paymnent,SUM(balance) as balance FROM party where name='$name' && branch1='$branch' GROUP BY name";
// 	$result1 = $conn->query($sql1);
	
// 		$branch_array=array();
// 	   while ($monthloading = $result1->FETCH_ASSOC())
// {
//         $branch_array[]=array(
//                   "id"=>$monthloading['id'],
//                     "bill_id"=>$monthloading['bill_id'],
//                      "total1"=>$monthloading['total1'],
//                     "paymnent"=>$monthloading['paymnent'],
//                      "amount_enter"=>$monthloading['amount_enter'],
//                     // "balance"=>$balance,
//                     "balance"=>$monthloading['balance'],
//                     "from_date"=>$monthloading['from_date'],
//                     "to_date"=>$monthloading['to_date']
//             );
//     }
//     $branch_data_response=array(
//                         "status"=>1,
//                         "data"=>$branch_array
//         );
        
//     echo json_encode($branch_data_response);
// }
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


if($action=="payment_from_detail")
{
    $name = $_REQUEST["name"];
    
    $sql1 = "SELECT * FROM party where name='$name'";
	$result1 = $conn->query($sql1);
	
		$branch_array=array();
	   while ($monthloading = $result1->FETCH_ASSOC())
{
        $branch_array[]=array(
                    "bill_id"=>$monthloading['bill_id'],
                     "total1"=>$monthloading['total1'],
                    "paymnent"=>$monthloading['paymnent'],
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

if($action=="payment_from_detail1")
{
    $name = $_REQUEST["name"];
    $branch = $_REQUEST["branch"];
    
    $sql1 = "SELECT * FROM party where name='$name' && branch1 ='$branch'";
	$result1 = $conn->query($sql1);
	
		$branch_array=array();
	   while ($monthloading = $result1->FETCH_ASSOC())
{
        $branch_array[]=array(
                    "bill_id"=>$monthloading['bill_id'],
                     "total1"=>$monthloading['total1'],
                    "paymnent"=>$monthloading['paymnent'],
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

if($action=="payment_from_detail2")
{
    $name = $_REQUEST["name"];
    $branch = $_REQUEST["branch"];
    $username = $_REQUEST["username"];
    
    $sql1 = "SELECT * FROM party where name='$name' && branch1='$branch' && username1='$username'";
	$result1 = $conn->query($sql1);
	
		$branch_array=array();
	   while ($monthloading = $result1->FETCH_ASSOC())
{
        $branch_array[]=array(
                    "bill_id"=>$monthloading['bill_id'],
                     "total1"=>$monthloading['total1'],
                    "paymnent"=>$monthloading['paymnent'],
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

// if($action=="payment_amount_detail")
// {
//      $name = $_REQUEST["name"];
    
//     echo $sql11 = "SELECT * FROM party where name='$name'";
// 		$result =$conn->query($sql11);
// 												// $rec = mysqli_fetch_assoc($result);
// 												// $auto_total = $rec['total'];
// 												// $auto_payment = $rec['paymnent'];
// 												// $auto_balance = $rec['balance'];
	
// 			$branch_array=array();
// 	   while ($rec = $result->FETCH_ASSOC())
// {
//         $branch_array[]=array(
//                     "total"=>$rec['total'],
//                     "paymnent"=>$rec['paymnent'],
//                     "balance"=>$rec['balance']
//                      );
// }
//     $branch_data_response=array(
//                         "status"=>1,
//                         "data"=>$branch_array
//         );
        
//     echo json_encode($branch_data_response);
// }
    
if($action=="order_approval")
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

$sql1 = "SELECT * FROM base where monthbill_id='$monthbill_id'";
$result1 = $conn->query($sql1);
while ($monthloading = $result1->FETCH_ASSOC())
{
    $balance2 = $monthloading['balance2']; 
    $amount_paid2 = $monthloading['amount_paid2'];
    $month_name = $monthloading['month_name'];
    // $customer_type = $monthloading['customer_type'];
	   
// $sql2 = "update base set amount_paid2='$balance2',balance2='$amount_paid2',monthpymt_date='$pymtdate' WHERE monthbill_id='$monthbill_id'";
$sql2 = "update base set amount_paid2='$balance2',balance2='$amount_paid2' WHERE monthbill_id='$monthbill_id'";
if ($conn->query($sql2))
 {                                                          
$sql="update monthpaid set paymnent='$balance',balance='$paymnent',monthpaid_detail=1 WHERE id=$id";
if ($conn->query($sql))
{
$sql17 = "SELECT * FROM add_user WHERE user_name='$username'";
$result17 = $conn->query($sql17);
$userTable = $result17->fetch_assoc();
 $userBranch = $userTable['branch'];

$sql217 = "SELECT branch_id,branch_balance FROM add_branch WHERE branch_name='$userBranch' ORDER BY branch_id DESC LIMIT 1";
$result27 = $conn->query($sql217);
$branchTable = $result27->fetch_assoc();
$branch_balance = $branchTable['branch_balance'] +  $total;
$branch_id = $branchTable['branch_id'];

$sql37 = "INSERT INTO transaction_history (branch_id,user_id,username,from_name,category,description,Amount,credit,debit,balance,branch_name,month) 
VALUES ('$branch_id','$userId','$username','$from_name','Payments','Month Paid','$total','$total',0,'$branch_balance','$userBranch','$month_name')";
$conn->query($sql37);
}
  }
}

    $order_res=array(
      "state"=> 1
  );
    echo json_encode($order_res);
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

if($action=="cxdetailstatus")
{
    $id=$_REQUEST["id"];
    
    $sql2 = "SELECT * FROM customer where id='$id'";
	$result99 = $conn->query($sql2);
		$payment_array=array();
	   while ($row99 = $result99->fetch_assoc())
	   {

        $payment_array[]=array(
                  "id"=>$row99['id'],
                    "from_cx_id"=>$row99['from_cx_id'],
                    "from_name"=>$row99['from_name'],
                    "from_address"=>$row99['from_address'],
                    "from_active"=>$row99['from_active'],
                    "from_contact"=>$row99['from_contact']
            );
    }
    // print_r($payment_array);die();
  $branch_data_response=array(
                        "status"=>1,
                        "data"=>$payment_array
        );
        
    echo json_encode($branch_data_response);
}



if($action=="fetch_branch_detailall_bill")
{
    $from=$_REQUEST["from"];
    $to=$_REQUEST["to"];
    $consignment_type=$_REQUEST["consignment_type"];
	$mode_transport=$_REQUEST["mode_transport"];
	$branch=$_REQUEST["branch"];
	$mode_payment=$_REQUEST["mode_payment"];
    
	$sql2="SELECT sum(balanceadd) as balanceAdd, sum(balance) as balance, sum(total) as total FROM base where consignment_type !='month' AND customer_type !='party'";
    if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branch==null && $mode_payment==null)
    {
     $sql2;   
    }
    if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branch!="" && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branch' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branch!="" && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branch'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branch==null && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null && $branch!="" && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND branch='$branch' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport!="" && $branch!="" && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to') AND mode_transport='$mode_transport' AND branch='$branch' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null && $branch==null && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branch==null && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND consignment_type='$consignment_type' AND mode_transport='$mode_transport'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branch!="" && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND branch='$branch' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport!="" && $branch==null && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to') AND mode_transport='$mode_transport' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport!="" && $branch!="" && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND mode_transport='$mode_transport' AND branch='$branch'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null && $branch==null && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND consignment_type='$consignment_type' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null && $branch!="" && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND consignment_type='$consignment_type' AND branch='$branch'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branch==null && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport!="" && $branch==null && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND mode_transport='$mode_transport'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branch!="" && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND branch='$branch'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branch==null && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branch!="" && $mode_payment!="")
    {
     $sql2 .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branch' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branch!="" && $mode_payment==null)
    {
     $sql2 .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branch')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branch==null && $mode_payment!="")
    {
     $sql2 .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null && $branch!="" && $mode_payment!="")
    {
     $sql2 .=" AND (consignment_type='$consignment_type' AND branch='$branch' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branch!="" && $mode_payment!="")
    {
     $sql2 .=" AND (mode_transport='$mode_transport' AND branch='$branch' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null && $branch==null && $mode_payment==null)
    {
     $sql2 .=" AND (consignment_type='$consignment_type')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branch==null && $mode_payment==null)
    {
     $sql2 .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branch!="" && $mode_payment!="")
    {
     $sql2 .=" AND (branch='$branch' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branch==null && $mode_payment!="")
    {
     $sql2 .=" AND (mode_transport='$mode_transport' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branch!="" && $mode_payment==null)
    {
     $sql2 .=" AND (mode_transport='$mode_transport' AND branch='$branch')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null && $branch==null && $mode_payment!="")
    {
     $sql2 .=" AND (consignment_type='$consignment_type' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null && $branch!="" && $mode_payment==null)
    {
     $sql2 .=" AND (consignment_type='$consignment_type' AND branch='$branch')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branch==null && $mode_payment!="")
    {
     $sql2 .=" AND (mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branch==null && $mode_payment==null)
    {
     $sql2 .=" AND (mode_transport='$mode_transport')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branch!="" && $mode_payment==null)
    {
     $sql .=" AND (branch='$branch')";   
    }
	
	$result99 = $conn->query($sql2);
	$row99 = $result99->fetch_assoc();
	$payment_array=array(
	    "balanceadd"=>$row99['balanceAdd'],
	    "balance"=>$row99['balance'],
	    "total"=>$row99['total'
	    ]);
	   //while ($row99 = $result99->fetch_assoc())
	   //{

    //     $payment_array[]=array(
    //               "id"=>$row99['id'],
    //                 "balanceadd"=>$row99['balanceadd'],
    //                 "balance"=>$row99['balance'],
    //                 "total"=>$row99['total']
    //         );
    // }
    // print_r($payment_array);die();
  $branch_data_response=array(
                        "status"=>1,
                        "data"=>$payment_array
                        // "vino"=>$sql2
        );
        
    echo json_encode($branch_data_response);
}

if($action=="fetch_branch_detailall")
{
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	$consignment_type=$_REQUEST["consignment_type"];
	$mode_transport=$_REQUEST["mode_transport"];
	$branch=$_REQUEST["branch"];
	$mode_payment=$_REQUEST["mode_payment"];
	
    $sql="SELECT * FROM base where consignment_type !='month' AND customer_type !='party'";
    
    if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branch!="" && $mode_payment!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branch' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branch!="" && $mode_payment==null)
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branch'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branch==null && $mode_payment!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null  && $branch!="" && $mode_payment!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND branch='$branch' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null  && $mode_transport!=""  && $branch!=""  && $mode_payment!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to') AND mode_transport='$mode_transport' AND branch='$branch' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null && $branch==null && $mode_payment==null)
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branch==null && $mode_payment==null)
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to' ) AND consignment_type='$consignment_type' AND mode_transport='$mode_transport'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branch!="" && $mode_payment!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to' ) AND branch='$branch' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport!="" && $branch==null && $mode_payment!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to') AND mode_transport='$mode_transport' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport!="" && $branch!="" && $mode_payment==null)
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to' ) AND mode_transport='$mode_transport' AND branch='$branch'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null && $branch==null && $mode_payment!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to' ) AND consignment_type='$consignment_type' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null && $branch!="" && $mode_payment==null)
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to' ) AND consignment_type='$consignment_type' AND branch='$branch'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branch==null && $mode_payment!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to' ) AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport!="" && $branch==null && $mode_payment==null)
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to' ) AND mode_transport='$mode_transport'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branch!="" && $mode_payment==null)
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to' ) AND branch='$branch'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branch==null && $mode_payment==null)
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branch!="" && $mode_payment!="")
    {
     $sql .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branch' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branch!="" && $mode_payment==null)
    {
     $sql .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branch')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branch==null && $mode_payment!="")
    {
     $sql .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null  && $branch!="" && $mode_payment!="")
    {
     $sql .=" AND (consignment_type)='$consignment_type' AND branch='$branch' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branch!="" && $mode_payment!="")
    {
     $sql .=" AND (mode_transport='$mode_transport' AND branch='$branch' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null && $branch==null && $mode_payment==null)
    {
     $sql .=" AND (consignment_type='$consignment_type')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branch==null && $mode_payment==null)
    {
     $sql .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branch!="" && $mode_payment!="")
    {
     $sql .=" AND (branch='$branch' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branch==null && $mode_payment!="")
    {
     $sql .=" AND (mode_transport='$mode_transport' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branch!="" && $mode_payment==null)
    {
     $sql .=" AND (mode_transport='$mode_transport' AND branch='$branch')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null && $branch==null && $mode_payment!="")
    {
     $sql .=" AND (consignment_type='$consignment_type' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null && $branch!="" && $mode_payment==null)
    {
     $sql .=" AND (consignment_type='$consignment_type' AND branch='$branch')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branch==null && $mode_payment!="")
    {
     $sql .=" AND (mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branch==null && $mode_payment==null)
    {
     $sql .=" AND (mode_transport='$mode_transport')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branch!="" && $mode_payment==null)
    {
     $sql .=" AND (branch='$branch')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branch==null && $mode_payment==null)
    {
     $sql;   
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
                    "lr_no"=>$records['lr_no'],
                    "createdAt"=>$records['createdAt'],
                    "branch"=>$records['branch'],
                    "consignment_type"=>$records['consignment_type'],
                    "mode_transport"=>$records['mode_transport'],
                    "delivery_status"=>$records['delivery_status'],
                    "balance"=>$records['balance'],
                    "total"=>$records['total'],
                    "customer_type"=>$records['customer_type'],
                    "booking_type"=>$records['booking_type'],
                    "invoice_type"=>$records['invoice_type'],
                    "internal_info"=>$records['internal_info'],
                    "eway_bill"=>$records['eway_bill'],
                    "material_name"=>$records['material_name'],
                    "quantity_kg"=>$records['quantity_kg'],
                    "quantity_nos"=>$records['quantity_nos'],
                    "rate"=>$records['rate'],
                    "docket_charge"=>$records['docket_charge'],
                    "agent_commission"=>$records['agent_commission'],
                    "gstamount"=>$records['gstamount'],
                    "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_name"=>$records['to_name'],
                    "to_address"=>$records['to_address'],
                    "to_contact"=>$records['to_contact'],
                    "agent_name"=>$records['agent_name'],
                    "agent_contact"=>$records['agent_contact'],
                    "agent_city"=>$records['agent_city'],
                    "delivery_message"=>$records['delivery_message'],
                    "balanceadd"=>$records['balanceadd']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
                        // "qry1"=>$sql
        );
        
    echo json_encode($branch_data_response);
}


if($action=="fetch_branch_detailall_billuser")
{
	$username=$_REQUEST["username"];
	$branch=$_REQUEST["branch"];
	
    $from=$_REQUEST["from"];
    $to=$_REQUEST["to"];
    $consignment_type=$_REQUEST["consignment_type"];
	$mode_transport=$_REQUEST["mode_transport"];
	$branchuser=$_REQUEST["branchuser"];
	$mode_payment=$_REQUEST["mode_payment"];
    
	$sql2="SELECT sum(balanceadd) as balanceAdd, sum(balance) as balance, sum(total) as total FROM base where consignment_type !='month' AND customer_type !='party' && branch = '$branch' && username = '$username'";
    if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branch==null && $mode_payment==null)
    {
     $sql2;   
    }
    if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branchuser!="" && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branchuser' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branchuser!="" && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branchuser'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branchuser==null && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null && $branchuser!="" && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND branch='$branchuser' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport!="" && $branchuser!="" && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to') AND mode_transport='$mode_transport' AND branch='$branchuser' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null && $branchuser==null && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branchuser==null && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND consignment_type='$consignment_type' AND mode_transport='$mode_transport'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branchuser!="" && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND branch='$branchuser' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport!="" && $branchuser==null && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to') AND mode_transport='$mode_transport' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport!="" && $branchuser!="" && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND mode_transport='$mode_transport' AND branch='$branchuser'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null && $branchuser==null && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND consignment_type='$consignment_type' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null && $branchuser!="" && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND consignment_type='$consignment_type' AND branch='$branchuser'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branchuser==null && $mode_payment!="")
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport!="" && $branchuser==null && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND mode_transport='$mode_transport'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branchuser!="" && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to' ) AND branch='$branchuser'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branchuser==null && $mode_payment==null)
    {
     $sql2 .=" AND (createddate >='$from' AND createddate<='$to')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branchuser!="" && $mode_payment!="")
    {
     $sql2 .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branchuser' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branchuser!="" && $mode_payment==null)
    {
     $sql2 .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branchuser')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branchuser==null && $mode_payment!="")
    {
     $sql2 .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null && $branchuser!="" && $mode_payment!="")
    {
     $sql2 .=" AND (consignment_type='$consignment_type' AND branch='$branchuser' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branchuser!="" && $mode_payment!="")
    {
     $sql2 .=" AND (mode_transport='$mode_transport' AND branch='$branchuser' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null && $branchuser==null && $mode_payment==null)
    {
     $sql2 .=" AND (consignment_type='$consignment_type')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branchuser==null && $mode_payment==null)
    {
     $sql2 .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branchuser!="" && $mode_payment!="")
    {
     $sql2 .=" AND (branch='$branchuser' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branchuser==null && $mode_payment!="")
    {
     $sql2 .=" AND (mode_transport='$mode_transport' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branchuser!="" && $mode_payment==null)
    {
     $sql2 .=" AND (mode_transport='$mode_transport' AND branch='$branchuser')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null && $branchuser==null && $mode_payment!="")
    {
     $sql2 .=" AND (consignment_type='$consignment_type' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null && $branchuser!="" && $mode_payment==null)
    {
     $sql2 .=" AND (consignment_type='$consignment_type' AND branch='$branchuser')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branchuser==null && $mode_payment!="")
    {
     $sql2 .=" AND (mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branchuser==null && $mode_payment==null)
    {
     $sql2 .=" AND (mode_transport='$mode_transport')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branchuser!="" && $mode_payment==null)
    {
     $sql .=" AND (branch='$branchuser')";   
    }
	
	$result99 = $conn->query($sql2);
	$row99 = $result99->fetch_assoc();
	$payment_array=array(
	    "balanceadd"=>$row99['balanceAdd'],
	    "balance"=>$row99['balance'],
	    "total"=>$row99['total'
	    ]);
  $branch_data_response=array(
                        "status"=>1,
                        "data"=>$payment_array
                        // "vino"=>$sql2
        );
        
    echo json_encode($branch_data_response);
}

if($action=="fetch_branch_detailalluser")
{
    $username=$_REQUEST["username"];
	$branch=$_REQUEST["branch"];
	
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	$consignment_type=$_REQUEST["consignment_type"];
	$branchuser=$_REQUEST["branchuser"];
	$mode_transport=$_REQUEST["mode_transport"];
	$mode_payment=$_REQUEST["mode_payment"];
	
    $sql3="SELECT * FROM base where consignment_type !='month' AND customer_type !='party' && branch = '$branch' && username = '$username'";
    
    if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branchuser!="" && $mode_payment!="")
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branchuser' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branchuser!="" && $mode_payment==null)
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branchuser'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branchuser==null && $mode_payment!="")
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null  && $branchuser!="" && $mode_payment!="")
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type' AND branch='$branchuser' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null  && $mode_transport!=""  && $branchuser!=""  && $mode_payment!="")
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to') AND mode_transport='$mode_transport' AND branch='$branchuser' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null && $branchuser==null && $mode_payment==null)
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to') AND consignment_type='$consignment_type'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport!="" && $branchuser==null && $mode_payment==null)
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to' ) AND consignment_type='$consignment_type' AND mode_transport='$mode_transport'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branchuser!="" && $mode_payment!="")
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to' ) AND branch='$branchuser' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport!="" && $branchuser==null && $mode_payment!="")
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to') AND mode_transport='$mode_transport' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport!="" && $branchuser!="" && $mode_payment==null)
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to' ) AND mode_transport='$mode_transport' AND branch='$branchuser'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null && $branchuser==null && $mode_payment!="")
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to' ) AND consignment_type='$consignment_type' AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type!="" && $mode_transport==null && $branchuser!="" && $mode_payment==null)
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to' ) AND consignment_type='$consignment_type' AND branch='$branchuser'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branchuser==null && $mode_payment!="")
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to' ) AND mode_payment='$mode_payment'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport!="" && $branchuser==null && $mode_payment==null)
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to' ) AND mode_transport='$mode_transport'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branchuser!="" && $mode_payment==null)
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to' ) AND branch='$branchuser'";   
    }
    else if($from!="" && $to!="" && $consignment_type==null && $mode_transport==null && $branchuser==null && $mode_payment==null)
    {
     $sql3 .=" AND (createddate >='$from' AND createddate<='$to')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branchuser!="" && $mode_payment!="")
    {
     $sql3 .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branchuser' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branchuser!="" && $mode_payment==null)
    {
     $sql3 .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND branch='$branchuser')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branchuser==null && $mode_payment!="")
    {
     $sql3 .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null  && $branchuser!="" && $mode_payment!="")
    {
     $sql3 .=" AND (consignment_type)='$consignment_type' AND branch='$branchuser' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branchuser!="" && $mode_payment!="")
    {
     $sql3 .=" AND (mode_transport='$mode_transport' AND branch='$branchuser' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null && $branchuser==null && $mode_payment==null)
    {
     $sql3 .=" AND (consignment_type='$consignment_type')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport!="" && $branchuser==null && $mode_payment==null)
    {
     $sql3 .=" AND (consignment_type='$consignment_type' AND mode_transport='$mode_transport')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branchuser!="" && $mode_payment!="")
    {
     $sql3 .=" AND (branch='$branchuser' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branchuser==null && $mode_payment!="")
    {
     $sql3 .=" AND (mode_transport='$mode_transport' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branchuser!="" && $mode_payment==null)
    {
     $sql3 .=" AND (mode_transport='$mode_transport' AND branch='$branchuser')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null && $branchuser==null && $mode_payment!="")
    {
     $sql3 .=" AND (consignment_type='$consignment_type' AND mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type!="" && $mode_transport==null && $branchuser!="" && $mode_payment==null)
    {
     $sql3 .=" AND (consignment_type='$consignment_type' AND branch='$branchuser')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branchuser==null && $mode_payment!="")
    {
     $sql3 .=" AND (mode_payment='$mode_payment')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport!="" && $branchuser==null && $mode_payment==null)
    {
     $sql3 .=" AND (mode_transport='$mode_transport')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branchuser!="" && $mode_payment==null)
    {
     $sql3 .=" AND (branch='$branchuser')";   
    }
    else if($from=="" && $to=="" && $consignment_type==null && $mode_transport==null && $branchuser==null && $mode_payment==null)
    {
     $sql3;   
    }
    
    $result=mysqli_query($conn,$sql3);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                    "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "lr_no"=>$records['lr_no'],
                    "createdAt"=>$records['createdAt'],
                    "branch"=>$records['branch'],
                    "consignment_type"=>$records['consignment_type'],
                    "mode_transport"=>$records['mode_transport'],
                    "delivery_status"=>$records['delivery_status'],
                    "balance"=>$records['balance'],
                    "total"=>$records['total'],
                    "customer_type"=>$records['customer_type'],
                    "booking_type"=>$records['booking_type'],
                    "invoice_type"=>$records['invoice_type'],
                    "internal_info"=>$records['internal_info'],
                    "eway_bill"=>$records['eway_bill'],
                    "material_name"=>$records['material_name'],
                    "quantity_kg"=>$records['quantity_kg'],
                    "quantity_nos"=>$records['quantity_nos'],
                    "rate"=>$records['rate'],
                    "docket_charge"=>$records['docket_charge'],
                    "agent_commission"=>$records['agent_commission'],
                    "gstamount"=>$records['gstamount'],
                    "from_name"=>$records['from_name'],
                    "from_address"=>$records['from_address'],
                    "from_contact"=>$records['from_contact'],
                    "to_name"=>$records['to_name'],
                    "to_address"=>$records['to_address'],
                    "to_contact"=>$records['to_contact'],
                    "agent_name"=>$records['agent_name'],
                    "agent_contact"=>$records['agent_contact'],
                    "agent_city"=>$records['agent_city'],
                    "delivery_message"=>$records['delivery_message'],
                    "balanceadd"=>$records['balanceadd']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
                        // "qry1"=>$sql3
        );
        
    echo json_encode($branch_data_response);
}


if($action=="fetch_branch_detail1")
{
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
    $sql="select * from base where consignment_type !='month' AND customer_type !='party' AND delivery_status !='delivered'";
    if($from!="" && $to!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to')";   
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
                    "from_name"=>$records['from_name'],
                    "createdAt"=>$records['createdAt'],
                    "total"=>$records['total'],
                    "balanceadd"=>$records['balanceadd'],
                    "balance"=>$records['balance'],
                    "mode_transport"=>$records['mode_transport'],
                    "delivery_status"=>$records['delivery_status'],
                    "consignment_type"=>$records['consignment_type']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detail1user")
{
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	$username=$_REQUEST["username"];
	$branch=$_REQUEST["branch"];
    $sql="SELECT * FROM base where delivery_status !='delivered' && branch = '$branch' && username = '$username' AND consignment_type !='month' AND customer_type !='party' ";
    if($from!="" && $to!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to')";   
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
                    "from_name"=>$records['from_name'],
                    "createdAt"=>$records['createdAt'],
                    "total"=>$records['total'],
                    "balanceadd"=>$records['balanceadd'],
                    "balance"=>$records['balance'],
                    "mode_transport"=>$records['mode_transport'],
                    "delivery_status"=>$records['delivery_status'],
                    "consignment_type"=>$records['consignment_type']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array,
                        "vino"=>$sql
        );
        
    echo json_encode($branch_data_response);
}

if($action=="fetch_branch_detail2")
{
     $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
    $sql="select * from base where consignment_type !='month' AND customer_type !='party' AND delivery_status='delivered'";
     if($from!="" && $to!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to')";   
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
                    "from_name"=>$records['from_name'],
                    "createdAt"=>$records['createdAt'],
                    "total"=>$records['total'],
                    "balanceadd"=>$records['balanceadd'],
                    "balance"=>$records['balance'],
                    "mode_transport"=>$records['mode_transport'],
                    "delivery_status"=>$records['delivery_status'],
                    "consignment_type"=>$records['consignment_type']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detail2user")
{
     $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	$username=$_REQUEST["username"];
	$branch=$_REQUEST["branch"];
    $sql="select * from base where consignment_type !='month' AND customer_type !='party' AND delivery_status='delivered' AND branch = '$branch' AND username = '$username'";
     if($from!="" && $to!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to')";   
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
                    "from_name"=>$records['from_name'],
                    "createdAt"=>$records['createdAt'],
                    "total"=>$records['total'],
                    "balanceadd"=>$records['balanceadd'],
                    "balance"=>$records['balance'],
                    "mode_transport"=>$records['mode_transport'],
                    "delivery_status"=>$records['delivery_status'],
                    "consignment_type"=>$records['consignment_type']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="fetch_branch_detail3")
{
     $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
    $sql="select * from base where consignment_type !='month' AND customer_type !='party' AND ( balance='0' || consignment_type = 'paid' )";
     if($from!="" && $to!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to')";   
    }$result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                    "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "from_name"=>$records['from_name'],
                    "createdAt"=>$records['createdAt'],
                    "total"=>$records['total'],
                    "balanceadd"=>$records['balanceadd'],
                    "balance"=>$records['balance'],
                    "mode_transport"=>$records['mode_transport'],
                    "delivery_status"=>$records['delivery_status'],
                    "consignment_type"=>$records['consignment_type']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detail3user")
{
     $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	$username=$_REQUEST["username"];
	$branch=$_REQUEST["branch"];
    $sql="select * from base where consignment_type !='month' AND customer_type !='party' AND ( balance='0' || consignment_type = 'paid' ) AND branch = '$branch' AND username = '$username'";
     if($from!="" && $to!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to')";   
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
                    "from_name"=>$records['from_name'],
                    "createdAt"=>$records['createdAt'],
                    "total"=>$records['total'],
                    "balanceadd"=>$records['balanceadd'],
                    "balance"=>$records['balance'],
                    "mode_transport"=>$records['mode_transport'],
                    "delivery_status"=>$records['delivery_status'],
                    "consignment_type"=>$records['consignment_type']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

if($action=="fetch_branch_detail4")
{
     $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
    $sql="select * from base where customer_type !='party' AND consignment_type !='month' AND 'paid' || balance !='0'";
     if($from!="" && $to!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to')";   
    }$result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                    "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "from_name"=>$records['from_name'],
                    "createdAt"=>$records['createdAt'],
                    "total"=>$records['total'],
                    "balanceadd"=>$records['balanceadd'],
                    "balance"=>$records['balance'],
                    "mode_transport"=>$records['mode_transport'],
                    "delivery_status"=>$records['delivery_status'],
                    "consignment_type"=>$records['consignment_type']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}
if($action=="fetch_branch_detail4user")
{
     $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	$username=$_REQUEST["username"];
	$branch=$_REQUEST["branch"];
    $sql="select * from base where customer_type !='party' AND consignment_type !='month' AND 'paid' || balance !='0' AND branch = '$branch' AND username = '$username'";
     if($from!="" && $to!="")
    {
     $sql .=" AND (createddate >='$from' AND createddate<='$to')";   
    }$result=mysqli_query($conn,$sql);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                    "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "from_name"=>$records['from_name'],
                    "createdAt"=>$records['createdAt'],
                    "total"=>$records['total'],
                    "balanceadd"=>$records['balanceadd'],
                    "balance"=>$records['balance'],
                    "mode_transport"=>$records['mode_transport'],
                    "delivery_status"=>$records['delivery_status'],
                    "consignment_type"=>$records['consignment_type']
            );
    }
    
    $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
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

if($action=="fetch_branch_detail7")
{
    $from=$_REQUEST["from"];
	$to=$_REQUEST["to"];
	$partyexcel11=$_REQUEST["partyexcel11"];
	
    $sql1="select * from partyexcel";
    if($from!="" && $to!="")
    {
     $sql .=" AND (createddate1 >='$from' AND createddate1<='$to')";   
    }elseif($partyexcel11 !=""){
        $sql .=" AND (createddate1 >='$from' AND createddate1<='$to')";  
    }
    $result1=mysqli_query($conn,$sql1);
    
    $branch_array=array();
    while($records=mysqli_fetch_assoc($result1))
    {
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                    "si_no"=>$si_no['si_no'],
                    "id"=>$records['id'],
                    "from_cx_id"=>$records['from_cx_id'],
                    "name"=>$records['name'],
                    "from_contact"=>$records['from_contact'],
                    "mode_payment"=>$records['mode_payment'],
                    "createddate1"=>$records['createddate1'],
                    "amount_enter"=>$records['amount_enter'],
                    "balance"=>$records['balance']
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