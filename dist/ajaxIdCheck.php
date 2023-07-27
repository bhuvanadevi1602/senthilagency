<?php
    include('config.php');
    
    if(!empty($_POST['cus_id'])){
        $cus_id = $_POST['cus_id'];

        // if($id != 0){
            $sql = "SELECT * FROM customer WHERE from_cx_id='$cus_id'";
        // } else{
        //     $sql = "SELECT * FROM unit WHERE from_cx_id='$cus_id'";
        // }
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo 'true';
        }else{
            echo 'false';
        }
    }

    // $conn->close();
?>