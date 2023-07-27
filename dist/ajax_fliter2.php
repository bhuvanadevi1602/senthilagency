<?php 
    session_start();
    include('config.php');

    $username = $_SESSION['user_name'];
    $userId = $_SESSION['user_id'];

    $action = $_REQUEST['action'];
    
    $type = $booking_typeuser2 = $fromdate2 = $todate2 ='';
    $data=array();
    if($action=="fetch_register_example2"){
        // $row = isset($_REQUEST['start']) ? $_REQUEST['start']: '';
        // if($userId == 1){
            if(!empty($_REQUEST['fromdate2'])){
                $fromdate2 = date('Y-m-d',strtotime($_REQUEST['fromdate2']));
            }  
            if(!empty($_REQUEST['todate2'])){
                $todate2 = date('Y-m-d',strtotime($_REQUEST['todate2']));
            } 
            if(!empty($_REQUEST['booking_typeuser2'])){
                $booking_typeuser2 = $_REQUEST['booking_typeuser2'];
            }
            if(!empty($_REQUEST['type'])){
                $type = $_REQUEST['type'];
            }

            if($type != ''){
                switch ($type) {
                    case '1':
                        $sql="SELECT * FROM base WHERE (createdAt >='$fromdate2' AND createdAt<='$todate2' AND booking_type='$booking_typeuser2') order by id desc";
                        break;
                    case '2':
                        $sql="SELECT * FROM base WHERE (createdAt >='$fromdate'2 AND createdAt<='$todate2') order by id desc";
                        break;
                    case '3':
                        $sql="SELECT * FROM base WHERE booking_type='$booking_typeuser2' order by id desc";
                        break;
                }
            }else{
                $sql="SELECT * FROM base ORDER BY id ASC";
            }
        // }else{
        //     $sql="SELECT * FROM base ORDER BY id ASC";
        // }
        //  $sql="SELECT * FROM base";
        $result = $conn->query($sql);
        // $i = 1;
        $branch_array=array();
         while($records1=mysqli_fetch_assoc($result))
         {
        $row_id++;
        $si_no['si_no']=$row_id;
        $branch_array[]=array(
                    "si_no"=>$si_no['si_no'],
                    "id"=>$records1['id'],
                    "to_name"=>$records1['to_name'],
                    "booking_type"=>$records1['booking_type'],
                    "createdAt"=>$records1['createdAt'],
                    "delivery_status"=>$records1['delivery_status']
                    // "createdAt"=>$records1['createdAt']
            );
         }
      $branch_data_response=array(
                        "status"=>1,
                        "data"=>$branch_array
        );
        
    echo json_encode($branch_data_response);
}

?>