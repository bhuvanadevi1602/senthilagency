<?php 
    session_start();
    include('config.php');

    $username = $_SESSION['user_name'];
    $userId = $_SESSION['user_id'];
    $branchName = $_SESSION['branch'];
    $role = $_SESSION['role'];

    $action = $_REQUEST['action'];
    
    $type = $branch = $from_name = $from = $to ='';
    $data=array();
    if($action=="fetch_cashing_hand"){
        // $row = isset($_REQUEST['start']) ? $_REQUEST['start']: '';
        if($role == "super_admin"){
            if(!empty($_REQUEST['from'])){
                $from = date('Y-m-d',strtotime($_REQUEST['from']));
                // $from = $_REQUEST['from'];
            }  
            if(!empty($_REQUEST['to'])){
                $to = date('Y-m-d',strtotime($_REQUEST['to'].' +1 day'));
                // $to = $_REQUEST['to'];
            } 
            if(!empty($_REQUEST['branch'])){
                $branch = $_REQUEST['branch'];
            } 
            if(!empty($_REQUEST['from_name'])){
                $from_name = $_REQUEST['from_name'];
            } 
            if(!empty($_REQUEST['type'])){
                $type = $_REQUEST['type'];
            }
            if(!empty($_REQUEST['v'])){
                $v = $_REQUEST['v'];
            }
            if(!empty($_REQUEST['w'])){
                $w = $_REQUEST['w'];
            }
            if(!empty($_REQUEST['x'])){
                $x = $_REQUEST['x'];
            }
            if(!empty($_REQUEST['y'])){
                $y = $_REQUEST['y'];
            }
            if(!empty($_REQUEST['z'])){
                $z = $_REQUEST['z'];
            }
            if(!empty($_REQUEST['p'])){
                $p = $_REQUEST['p'];
            }
            if(!empty($_REQUEST['m'])){
                $m = $_REQUEST['m'];
            }

            if($type != ''){
                switch ($type) {
                    case '1':
                        $sql="SELECT * FROM transaction_history WHERE (created_at >= '$from' AND created_at <= '$to' AND branch_id='$branch' AND party_name='$from_name') order by history_id desc";
                        break;
                    case '2':
                         $sql="SELECT * FROM transaction_history WHERE (created_at >= '$from' AND created_at <= '$to') order by history_id desc";
                        break;
                    case '3':
                        $sql="SELECT * FROM transaction_history WHERE branch_id='$branch' order by history_id desc";
                        break;
                    case '4':
                        $sql="SELECT * FROM transaction_history WHERE category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v' order by history_id desc";
                        break;
                    case '5':
                        $sql="SELECT * FROM transaction_history WHERE (created_at >= '$from' AND created_at <= '$to' AND branch_id='$branch' AND party_name='$from_name') AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v') order by history_id desc";
                        break;
                    case '6':
                        $sql="SELECT * FROM transaction_history WHERE (created_at >= '$from' AND created_at <= '$to') AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v') order by history_id desc";
                        // echo$sql="SELECT * FROM transaction_history WHERE (created_at >= '$from' AND created_at <= '$to') AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v' OR party_name='$p' OR party_name='$m') order by history_id desc";
                        break;
                    case '7':
                        $sql="SELECT * FROM transaction_history WHERE branch_id='$branch' AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v') order by history_id desc";
                        break;
                    case '8':
                        $sql="SELECT * FROM transaction_history WHERE party_name='$from_name' order by history_id desc";
                        break;
                    case '9':
                        $sql="SELECT * FROM transaction_history WHERE party_name='$from_name' AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v') order by history_id desc";
                        break;
                    case '10':
                          $sql="SELECT * FROM transaction_history WHERE (created_at >= '$from' AND created_at <= '$to') AND party_name='$from_name' AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v') order by history_id desc";
                        break;
                    case '11':
                         $sql="SELECT * FROM transaction_history WHERE (created_at >= '$from' AND created_at <= '$to') AND party_name='$from_name' order by history_id desc";
                        break;
                    case '12':
                         $sql="SELECT * FROM transaction_history WHERE (created_at >= '$from' AND created_at <= '$to') AND party_name != '' order by history_id desc";
                        break;
                    case '13':
                         $sql="SELECT * FROM transaction_history WHERE (created_at >= '$from' AND created_at <= '$to') AND month != ''  order by history_id desc";
                        break;
                }
            }else{
               $sql="SELECT * FROM transaction_history ORDER BY history_id desc";
            }
        }elseif($role == "admin"){
            if(!empty($_REQUEST['from'])){
                $from = date('Y-m-d',strtotime($_REQUEST['from']));
            }  
            if(!empty($_REQUEST['to'])){
                $to = date('Y-m-d',strtotime($_REQUEST['to'].' +1 day'));
                // $to = date('Y-m-d',strtotime($_REQUEST['to']));
            } 
            if(!empty($_REQUEST['branch'])){
                $branch = $_REQUEST['branch'];
            } 
            if(!empty($_REQUEST['from_name'])){
                $from_name = $_REQUEST['from_name'];
            } 
            if(!empty($_REQUEST['type'])){
                $type = $_REQUEST['type'];
            }
            if(!empty($_REQUEST['v'])){
                $v = $_REQUEST['v'];
            }
            if(!empty($_REQUEST['w'])){
                $w = $_REQUEST['w'];
            }
            if(!empty($_REQUEST['x'])){
                $x = $_REQUEST['x'];
            }
            if(!empty($_REQUEST['y'])){
                $y = $_REQUEST['y'];
            }
            if(!empty($_REQUEST['z'])){
                $z = $_REQUEST['z'];
            }

            if($type != ''){
                switch ($type) {
                    case '1':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND (created_at >= '$from' AND created_at <= '$to' AND branch_id='$branch' AND party_name='$from_name') order by history_id desc";
                        break;
                    case '2':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND (created_at >= '$from' AND created_at <= '$to') order by history_id desc";
                        break;
                    case '3':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND branch_id='$branch' order by history_id desc";
                        break;
                    case '4':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v' order by history_id desc";
                        break;
                    case '5':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND (created_at >= '$from' AND created_at <= '$to' AND branch_id='$branch' AND party_name='$from_name') AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v') order by history_id desc";
                        break;
                    case '6':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND (created_at >= '$from' AND created_at <= '$to') AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v') order by history_id desc";
                        break;
                    case '7':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND branch_id='$branch' AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v') order by history_id desc";
                        break;
                    case '8':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND party_name='$from_name' order by history_id desc";
                        break;
                    case '9':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND party_name='$from_name' AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v') order by history_id desc";
                        break;
                    case '10':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND (created_at >= '$from' AND created_at <= '$to') AND party_name='$from_name' AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v') order by history_id desc";
                        break;
                    case '11':
                          $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND (created_at >= '$from' AND created_at <= '$to') AND party_name='$from_name' order by history_id desc";
                        break;
                    case '12':
                         $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND (created_at >= '$from' AND created_at <= '$to') AND party_name != '' order by history_id desc";
                        break;
                    case '13':
                         $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND (created_at >= '$from' AND created_at <= '$to') AND month != ''  order by history_id desc";
                        break;
                }
            }else{
              $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName'  ORDER BY history_id desc";
            }
        }elseif($role == "user"){
            if(!empty($_REQUEST['from'])){
                $from = date('Y-m-d',strtotime($_REQUEST['from']));
            }  
            if(!empty($_REQUEST['to'])){
                $to = date('Y-m-d',strtotime($_REQUEST['to'].' +1 day'));
            } 
            if(!empty($_REQUEST['branch'])){
                $branch = $_REQUEST['branch'];
            } 
            if(!empty($_REQUEST['from_name'])){
                $from_name = $_REQUEST['from_name'];
            } 
            if(!empty($_REQUEST['type'])){
                $type = $_REQUEST['type'];
            }
            if(!empty($_REQUEST['v'])){
                $v = $_REQUEST['v'];
            }
            if(!empty($_REQUEST['w'])){
                $w = $_REQUEST['w'];
            }
            if(!empty($_REQUEST['x'])){
                $x = $_REQUEST['x'];
            }
            if(!empty($_REQUEST['y'])){
                $y = $_REQUEST['y'];
            }
            if(!empty($_REQUEST['z'])){
                $z = $_REQUEST['z'];
            }

            if($type != ''){
                switch ($type) {
                    case '1':
                        echo $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND user_id = '$userId' AND (created_at >= '$from' AND created_at <= '$to' AND branch_id='$branch' AND party_name='$from_name') order by history_id desc";
                        break;
                    case '2':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND user_id = '$userId' AND (created_at >= '$from' AND created_at <= '$to') order by history_id desc";
                        break;
                    case '3':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND user_id = '$userId' AND branch_id='$branch' order by history_id desc";
                        break;
                    case '4':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND user_id = '$userId' AND category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v' order by history_id desc";
                        break;
                    case '5':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND user_id = '$userId' AND (created_at >= '$from' AND created_at <= '$to' AND branch_id='$branch' AND party_name='$from_name') AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v') order by history_id desc";
                        break;
                    case '6':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND user_id = '$userId' AND (created_at >= '$from' AND created_at <= '$to') AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v') order by history_id desc";
                        break;
                    case '7':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND user_id = '$userId' AND branch_id='$branch' AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v') order by history_id desc";
                        break;
                    case '8':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND user_id = '$userId' AND party_name='$from_name' order by history_id desc";
                        break;
                    case '9':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND user_id = '$userId' AND party_name='$from_name' AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v') order by history_id desc";
                        break;
                    case '10':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND user_id = '$userId' AND (created_at >= '$from' AND created_at <= '$to') AND party_name='$from_name' AND (category='$w' OR category='$x' OR category='$y' OR category='$z' OR category='$v') order by history_id desc";
                        break;
                    case '11':
                        $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND user_id = '$userId' AND (created_at >= '$from' AND created_at <= '$to') AND party_name='$from_name' order by history_id desc";
                        break;
                    case '12':
                         $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND user_id = '$userId' AND (created_at >= '$from' AND created_at <= '$to') AND party_name != '' order by history_id desc";
                        break;
                    case '13':
                         $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND user_id = '$userId' AND (created_at >= '$from' AND created_at <= '$to') AND month != ''  order by history_id desc";
                        break;
                }
            }else{
              $sql="SELECT * FROM transaction_history WHERE branch_name='$branchName' AND user_id = '$userId' ORDER BY history_id desc";
            }
        }else{
            $sql="SELECT * FROM transaction_history ORDER BY history_id ASC";
        }
        $result = $conn->query($sql);
        $i = 1;
        
        $amt = 0;
        while($transaction = $result->fetch_assoc()){
            $branch_id = $transaction['branch_id'];
            $user_id = $transaction['user_id'];
            $sql2 = "SELECT * FROM add_branch WHERE branch_id = '$branch_id'";
            $result2 = $conn->query($sql2);
            $branchTable = $result2->fetch_assoc();
            $branch_name = $branchTable['branch_name'];

            $sql3 = "SELECT * FROM add_user WHERE user_id = '$user_id'";
            $result3 = $conn->query($sql3);
            $userTable = $result3->fetch_assoc();
            $user_name = $userTable['name'];
            
            if($transaction['category'] == "Payments" || $transaction['category'] == "Petty Cash" || $transaction['category'] == "paid"){
                $amt += $transaction['Amount'];
            }

        // while($transaction = mysqli_fetch_assoc($result)){
            $data[] = array(
                "inc"=>$i++,
                "history_id"=>$transaction['history_id'],
                "branch_id"=>$transaction['branch_id'],
                "branch_name"=>$branch_name,
                "user_id"=>$transaction['user_id'],
                "user_name"=>$user_name,
                "lr_no"=>$transaction['lr_no'],
                "customer_type"=>$transaction['customer_type'],
                "from_name"=>$transaction['from_name'],
                "category"=>$transaction['category'],
                "employee_name"=>$transaction['employee_name'],
                "description"=>$transaction['description'],
                "Amount"=>$transaction['Amount'],
                "credit"=>$transaction['credit'],
                "debit"=>$transaction['debit'],
                "balance"=>$transaction['balance'],
                "created_at"=>$transaction['created_at'],
                "party_name"=>$transaction['party_name'],
                "mode_payment"=>$transaction['mode_payment'],
                "month"=>$transaction['month'],
                "from_name"=>$transaction['from_name'],
                "totalAmt"=>$amt,
            );
        }
        
        $data_response = array(
                        "status"=>1,
                        "data"=>$data
        );
        echo json_encode($data_response);
    }

?>