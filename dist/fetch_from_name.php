<?php
include('config.php');

$keyword=$_GET['from_name'];
    
    $sql="select from_name from customer where from_name like '%$keyword%' ";
    $result=mysqli_query($conn,$sql);
    
    $from_array=array();
    
    while($rec=mysqli_fetch_assoc($result))
    {
    //     $from_array[]=array(
           
    //                 "from_name"=>$rec['from_name']
                   
    //         );
    
        echo "<option value='". $rec['from_name'] ."'>".$rec['from_name']."</option>";
    }
    
    // $from_address_response=array("status"=>1,"data"=>$from_array);
    
    // echo json_encode($from_address_response);
    
?>