<?php 
    session_start();
    include('config.php');

    $username = $_SESSION['user_name'];
    $userId = $_SESSION['user_id'];

    $action = $_REQUEST['action'];
    
    $type = $consignment_type = $fromdate = $todate ='';
    $data=array();
    if($action=="fetch_register_users"){
        // $row = isset($_REQUEST['start']) ? $_REQUEST['start']: '';
        // if($userId == 1){
            if(!empty($_REQUEST['fromdate'])){
                $fromdate = date('Y-m-d',strtotime($_REQUEST['fromdate']));
            }  
            if(!empty($_REQUEST['todate'])){
                $todate = date('Y-m-d',strtotime($_REQUEST['todate']));
            } 
            if(!empty($_REQUEST['consignment_type'])){
                $consignment_type = $_REQUEST['consignment_type'];
            }
            if(!empty($_REQUEST['type'])){
                $type = $_REQUEST['type'];
            }

            if($type != ''){
                switch ($type) {
                    case '1':
                        $sql="SELECT * FROM base WHERE (createdAt >='$fromdate' AND createdAt<='$todate' AND consignment_type='$consignment_type') order by id desc";
                        break;
                    case '2':
                        $sql="SELECT * FROM base WHERE (createdAt >='$fromdate' AND createdAt<='$todate') order by id desc";
                        break;
                    case '3':
                        $sql="SELECT * FROM base WHERE consignment_type='$consignment_type' order by id desc";
                        break;
                }
            }else{
                $sql="SELECT * FROM base ORDER BY id desc";
            }
        // }else{
        //     $sql="SELECT * FROM base ORDER BY id ASC";
        // }
        //  $sql="SELECT * FROM base";
        
        $result = $conn->query($sql);
        $branch_array=array();
         while($records1=mysqli_fetch_assoc($result))
         {
      
        $row_id++;
        $si_no['si_no']=$row_id;
        
	   		
        $branch_array[]=array(
                    "si_no"=>$si_no['si_no'],
                    "id"=>$records1['id'],
                    "to_name"=>$records1['to_name'],
                    "lr_no"=>$records1['lr_no'],
                    // "to_contact"=>$records1['to_contact'],
                    "consignment_type"=>$records1['consignment_type'],
                    "total"=>$records1['total'],
                    "balance"=>$records1['balance'],
                    "amount_paid"=>$records1['amount_paid'],
                       "mode_transport"=>$records1['mode_transport'],
                     "delivery_status"=>$records1['delivery_status'],
                    "balance"=>$records1['balance'],
                    "createdAt"=>$records1['createdAt']
            );
         }
         
        //  print_r($s4);die();
        // $branch_array['total_amt']=$s3;
        //  print_r($branch_array);die();
      $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

?>