<?php 
    session_start();
    include('config.php');

    $username = $_SESSION['user_name'];
    $userId = $_SESSION['user_id'];

    $action = $_REQUEST['action'];
    
    $type = $consignment_type1 = $fromdate1 = $todate1 ='';
    $data=array();
    if($action=="fetch_register_users1"){
        // $row = isset($_REQUEST['start']) ? $_REQUEST['start']: '';
        // if($userId == 1){
            if(!empty($_REQUEST['fromdate1'])){
                $fromdate1= date('Y-m-d',strtotime($_REQUEST['fromdate1']));
            }  
            if(!empty($_REQUEST['todate1'])){
                $todate1 = date('Y-m-d',strtotime($_REQUEST['todate1']));
            } 
            if(!empty($_REQUEST['consignment_type1'])){
                $consignment_type1 = $_REQUEST['consignment_type1'];
            }
            if(!empty($_REQUEST['type1'])){
                $type1 = $_REQUEST['type1'];
            }

            if($type1 != ''){
                switch ($type1) {
                    case '1':
                        echo $sql="SELECT * FROM base WHERE (createdAt >='$fromdate1' AND createdAt<='$todate1' AND consignment_type='$consignment_type1') order by id desc";
                        break;
                    case '2':
                        $sql="SELECT * FROM base WHERE (createdAt >='$fromdate1' AND createdAt<='$todate1') order by id desc";
                        break;
                    case '3':
                        $sql="SELECT * FROM base WHERE consignment_type='$consignment_type1' order by id desc";
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
                    // "to_address"=>$records1['to_address'],
                    // "to_contact"=>$records1['to_contact'],
                    "consignment_type"=>$records1['consignment_type'],
                    // "total"=>$records1['total'],
                    // "balance"=>$records11['balance'],
                    // "amount_paid"=>$records11['amount_paid'],
                       "mode_transport"=>$records1['mode_transport'],
                     "delivery_status"=>$records1['delivery_status'],
                    "balance"=>$records1['balance'],
                    "createdAt"=>$records1['createdAt']
            );
         }
      $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

?>