<?php
include('header.php');
include('config.php');

$username = $_SESSION['user_name'];
$branch = $_SESSION['branch'];
$userId = $_SESSION['user_id'];
if (isset($_REQUEST['req']) != "") {
    $req = $_REQUEST["req"];
} else {
    $req = "";
}
if (isset($_REQUEST['id']) != "") {
    $id = $_REQUEST["id"];
} else {
    $id = "";
}
if (isset($_REQUEST['del']) != "") {
    $del = $_REQUEST['del'];
    $sql = "DELETE FROM base WHERE id='$del'";
    if ($conn->query($sql)) {
        header("Location: lrdatatable.php?&msg= Deleted!");
    }
}
if (isset($_POST['register'])) {
    $count = $_POST["no_stop"];
    $repay_date = $_POST["advance_date"];
    $repayment = $_POST["repayment"];
    for ($i = 0; $i < $count; $i++) {
        $id = $_POST["id"];
        $repay_date = $_POST["advance_date$i"];
        $repayment = $_POST["repayment$i"];
        $insert = "INSERT into tracking (id,repayment_date,repayment) 
            values('$id','$repay_date','$repayment') ";
        if (mysqli_query($conn, $insert)) {
            echo "<script type='text/javascript'>
                     $(document).ready(function() {
                      Swal.fire({
                  text: 'Data Save Successfully',
                  icon: 'success',
                  confirmButtonColor: '#1BC5BD',
                  button: 'Dashboard!',
                            })
                     });
                </script>";
        }
    }
}
if (isset($_POST['register11'])) {
    $from_contact = $_POST['from_contact'];
    $agent_contact = $_POST['agent_contact'];
    $delivery_status = $_POST["delivery_status"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $remarks = $_POST["remarks"];

    $select_query = "select * from base where id=$id";
    $res = mysqli_query($conn, $select_query);
    $rec = mysqli_fetch_assoc($res);
    $lr_no = $rec['lr_no'];
    $from_name = $rec['from_name'];
    $agent_name = $rec['agent_name'];
    $to_number = $rec['to_contact'];


    echo $insert = "INSERT into delivery (id,delivery_status,date,time,remarks)
        values('$id','$delivery_status','$date','$time','$remarks') ";
    if (mysqli_query($conn, $insert)) {
        echo $sql2 = "update base set delivery_status='$delivery_status',date='$date',time='$time',remarks='$remarks' where id=$id";
        if ($conn->query($sql2)) {

            $sql1 = "SELECT * FROM base where id=$id";
            $result1 = $conn->query($sql1);
            $alldelivery = $result1->FETCH_ASSOC();
            $lr_no = $alldelivery['lr_no'];
            $agents = $alldelivery['agent'];
            $from_name = $alldelivery['from_name'];
            $from_contact = $alldelivery['from_contact'];
            $to_name = $alldelivery['to_name'];
            $to_contact = $alldelivery['to_contact'];
            $agent_name = $alldelivery['agent_name'];
            $agent_contact = $alldelivery['agent_contact'];

            if ($agents == 'yes') {
                $sender = "sender";
                $receiver = "receiver";
                $agent = "agent";
                if ($sender == "sender") {
                    $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                    $stext =  rawurlencode("Dear $from_name, Your consignment bearing LR No. $lr_no has been successfully delivered. For more details contact us on 93825 87897. Regards, APS Cargo Movers");
                    $sender = urlencode('APSCAR');

                    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                    $postData = array("messages" => $sms_template);
                    $type_msg = rawurlencode($postData["messages"]);
                    $postData = array("template_id" => $template_id_sms);

                    $msg_template = rawurlencode($postData["template_id"]);

                    $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                    $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $from_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166158876293756';

                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    $response0 = $response;
                    $result0 = json_decode($response0, true);
                    $msg_id = $result0["MessageData"][0]['MessageId'];
                    $ErrorMessage = $result0["ErrorMessage"];
                    $JobId = $result0["JobId"];
                }
                if ($receiver == "receiver") {
                    $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                    $stext =  rawurlencode("Dear $to_name, Your consignment bearing LR No. $lr_no has been successfully delivered. For more details contact us on 93825 87897. Regards, APS Cargo Movers");
                    $sender = urlencode('APSCAR');

                    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                    $postData = array("messages" => $sms_template);
                    $type_msg = rawurlencode($postData["messages"]);
                    $postData = array("template_id" => $template_id_sms);

                    $msg_template = rawurlencode($postData["template_id"]);

                    $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                    $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $to_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166158876293756';

                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    $response0 = $response;
                    $result0 = json_decode($response0, true);
                    $msg_id = $result0["MessageData"][0]['MessageId'];
                    $ErrorMessage = $result0["ErrorMessage"];
                    $JobId = $result0["JobId"];
                }
                if ($agent == "agent") {
                    $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                    $stext =  rawurlencode("Dear $agent_name, Your consignment bearing LR No. $lr_no has been successfully delivered. For more details contact us on 93825 87897. Regards, APS Cargo Movers");
                    $sender = urlencode('APSCAR');

                    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                    $postData = array("messages" => $sms_template);
                    $type_msg = rawurlencode($postData["messages"]);
                    $postData = array("template_id" => $template_id_sms);

                    $msg_template = rawurlencode($postData["template_id"]);

                    $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                    $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $agent_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166158876293756';

                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    $response0 = $response;
                    $result0 = json_decode($response0, true);
                    $msg_id = $result0["MessageData"][0]['MessageId'];
                    $ErrorMessage = $result0["ErrorMessage"];
                    $JobId = $result0["JobId"];
                }
            } else if ($agents == 'no') {
                $sender = "sender";
                $receiver = "receiver";
                if ($sender == "sender") {
                    $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                    $stext =  rawurlencode("Dear $from_name, Your consignment bearing LR No. $lr_no has been successfully delivered. For more details contact us on 93825 87897. Regards, APS Cargo Movers");
                    $sender = urlencode('APSCAR');

                    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                    $postData = array("messages" => $sms_template);
                    $type_msg = rawurlencode($postData["messages"]);
                    $postData = array("template_id" => $template_id_sms);

                    $msg_template = rawurlencode($postData["template_id"]);

                    $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                    $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $from_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166158876293756';

                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    $response0 = $response;
                    $result0 = json_decode($response0, true);
                    $msg_id = $result0["MessageData"][0]['MessageId'];
                    $ErrorMessage = $result0["ErrorMessage"];
                    $JobId = $result0["JobId"];
                }
                if ($receiver == "receiver") {
                    $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                    $stext =  rawurlencode("Dear $to_name, Your consignment bearing LR No. $lr_no has been successfully delivered. For more details contact us on 93825 87897. Regards, APS Cargo Movers");
                    $sender = urlencode('APSCAR');

                    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                    $postData = array("messages" => $sms_template);
                    $type_msg = rawurlencode($postData["messages"]);
                    $postData = array("template_id" => $template_id_sms);

                    $msg_template = rawurlencode($postData["template_id"]);

                    $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                    $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $to_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166158876293756';

                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    $response0 = $response;
                    $result0 = json_decode($response0, true);
                    $msg_id = $result0["MessageData"][0]['MessageId'];
                    $ErrorMessage = $result0["ErrorMessage"];
                    $JobId = $result0["JobId"];
                }
            }

            echo "<script type='text/javascript'>
                     $(document).ready(function() {
                      Swal.fire({
                  text: 'Data Save Successfully',
                  icon: 'success',
                  confirmButtonColor: '#1BC5BD',
                  button: 'Dashboard!',
                            })
                     });
                </script>";
        }
    }
}
if (isset($_POST['paymentsubmit'])) {
    $id = $_POST['id'];
    $lr_no = $_POST["lr_no"];
    $from_name = $_POST["from_name"];
    $mode_payment = $_POST["mode_payment"];
    $amount_paid = $_POST["amount_paid"];
    $already_paid = $_POST["already_paid"];
    $paybalanceadd = $_POST["paybalanceadd"];
    $payment_remarks = $_POST["payment_remarks"];
    $balanceadd = $_POST["balanceadd"];
    $total = $_POST["total"];
    $balance = $_POST["balance"];

    if ($mode_payment == "cash") {
        $sql1 = "select id,from_cx_id,name,from_contact,to_address,mode_payment,createdAt11,payment_date,SUM(total1) as total1,SUM(paymnent) as paymnent1,SUM(balance) as balance1 from party where name='$name' GROUP BY name";
        $result1 = $conn->query($sql1);
        while ($branchTable = $result1->FETCH_ASSOC()) {
            $balance =  $branchTable['balance1'];
            $payment =  $branchTable['paymnent1'];
            $from_cx_id =  $branchTable['from_cx_id'];
            $from_contact =  $branchTable['from_contact'];
            $total =  $branchTable['total1'];
            $id =  $branchTable['id'];
            // 	echo $from_contact =  $branchTable['from_contact'];s
        }

        if ($balance == "") {
            $balance = $_POST["total"] - $amount_paid;

            $insert = "INSERT into payment (id,mode_payment,amount_paid,payment_remarks,balance) 
                            values('$id','$mode_payment','$amount_paid','$payment_remarks','$balance') ";
            if (mysqli_query($conn, $insert)) {

                $sql2 = "update base set mode_payment='$mode_payment',lr_no='$lr_no',payment_remarks='$payment_remarks',amount_paid='$amount_paid',
			balanceadd='$amount_paid',already_paid='$amount_paid',
            balance='$balance' where id=$id";
                if ($conn->query($sql2)) {

                    $sql2 = "UPDATE add_branch SET branch_balance = (branch_balance+'$amount_paid') WHERE branch_name= '$branch'";
                    if ($conn->query($sql2)) {
                        $sql21 = "SELECT branch_id,branch_balance FROM add_branch WHERE branch_name= '$branch' ORDER BY branch_id DESC LIMIT 1";
                        $result2 = $conn->query($sql21);
                        $branchTable = $result2->fetch_assoc();
                        $branch_balance1 = $branchTable['branch_balance'];
                        $branch_id = $branchTable['branch_id'];
                        $sql3 = "INSERT INTO transaction_history (branch_name,branch_id,username,user_id,lr_no,from_name,category,description,Amount,credit,debit,balance,mode_payment) 
                    VALUES ('$branch','$branch_id','$username','$userId','$lr_no','$from_name','Payments','','$amount_paid','$amount_paid',0,'$branch_balance1','$mode_payment')";
                        $conn->query($sql3);
                    }
                    echo "<script type='text/javascript'>

                     $(document).ready(function() {
                      Swal.fire({
                  
                  text: 'Data Save Successfully',
                  icon: 'success',
                  confirmButtonColor: '#1BC5BD',
                  button: 'Dashboard!',
                            })
                     });

                </script>";
                }
            }
        } else {
            $balance = $balance - $amount_paid;
            $balance1 = $amount_paid + $already_paid;
            $balanceadd = $already_paid +  $amount_paid;
            $paybalanceadd = $amount_paid;

            $insert = "INSERT into payment (id,mode_payment,amount_paid,payment_remarks,balance) 
                            values('$id','$mode_payment','$amount_paid','$payment_remarks','$balance') ";
            if (mysqli_query($conn, $insert)) {
                $sql2 = "update base set mode_payment='$mode_payment',lr_no='$lr_no',payment_remarks='$payment_remarks',amount_paid='$amount_paid',
          balanceadd='$balanceadd',balance='$balance',paybalanceadd='$paybalanceadd' where id=$id";
                if ($conn->query($sql2)) {

                    $sql2 = "UPDATE add_branch SET branch_balance = (branch_balance+'$amount_paid') WHERE branch_name= '$branch'";
                    if ($conn->query($sql2)) {
                        $sql21 = "SELECT branch_id,branch_balance FROM add_branch WHERE branch_name= '$branch' ORDER BY branch_id DESC LIMIT 1";
                        $result2 = $conn->query($sql21);
                        $branchTable = $result2->fetch_assoc();
                        $branch_balance1 = $branchTable['branch_balance'];
                        $branch_id = $branchTable['branch_id'];
                        $sql3 = "INSERT INTO transaction_history (branch_name,branch_id,username,user_id,lr_no,from_name,category,description,Amount,credit,debit,balance,mode_payment) 
                    VALUES ('$branch','$branch_id','$username','$userId','$lr_no','$from_name','Payments','','$amount_paid','$amount_paid',0,'$branch_balance1','$mode_payment')";
                        $conn->query($sql3);
                    }
                    echo "<script type='text/javascript'>
                     $(document).ready(function() {
                      Swal.fire({
                  text: 'Data Save Successfully',
                  icon: 'success',
                  confirmButtonColor: '#1BC5BD',
                  button: 'Dashboard!',
                            })
                     });
                </script>";
                }
            }
        }
    } else {
        $sql1 = "select id,from_cx_id,name,from_contact,to_address,mode_payment,createdAt11,payment_date,SUM(total1) as total1,SUM(paymnent) as paymnent1,SUM(balance) as balance1 from party where name='$name' GROUP BY name";
        $result1 = $conn->query($sql1);
        while ($branchTable = $result1->FETCH_ASSOC()) {
            $balance =  $branchTable['balance1'];
            $payment =  $branchTable['paymnent1'];
            $from_cx_id =  $branchTable['from_cx_id'];
            $from_contact =  $branchTable['from_contact'];
            $total =  $branchTable['total1'];
            $id =  $branchTable['id'];
        }

        if ($balance == "") {
            $balance = $_POST["total"] - $amount_paid;

            $insert = "INSERT into payment (id,mode_payment,amount_paid,payment_remarks,balance) 
                            values('$id','$mode_payment','$amount_paid','$payment_remarks','$balance') ";
            if (mysqli_query($conn, $insert)) {

                $sql2 = "update base set mode_payment='$mode_payment',lr_no='$lr_no',payment_remarks='$payment_remarks',amount_paid='$amount_paid',
			balanceadd='$amount_paid',already_paid='$amount_paid',
            balance='$balance' where id=$id";
                if ($conn->query($sql2)) {

                    $sql2 = "UPDATE add_branch SET branch_balance = (branch_balance) WHERE branch_name= '$branch'";
                    if ($conn->query($sql2)) {
                        $sql21 = "SELECT branch_id,branch_balance FROM add_branch WHERE branch_name= '$branch' ORDER BY branch_id DESC LIMIT 1";
                        $result2 = $conn->query($sql21);
                        $branchTable = $result2->fetch_assoc();
                        $branch_balance1 = $branchTable['branch_balance'];
                        $branch_id = $branchTable['branch_id'];
                        $sql3 = "INSERT INTO transaction_history (branch_name,branch_id,user_id,username,lr_no,from_name,category,description,Amount,credit,debit,balance,mode_payment) 
                    VALUES ('$branch','$branch_id','$userId','$username','$lr_no','$from_name','Payments','','$amount_paid',0,0,'$branch_balance1','$mode_payment')";
                        $conn->query($sql3);
                    }
                    echo "<script type='text/javascript'>
                     $(document).ready(function() {
                      Swal.fire({
                  text: 'Data Save Successfully',
                  icon: 'success',
                  confirmButtonColor: '#1BC5BD',
                  button: 'Dashboard!',
                            })
                     });
                </script>";
                }
            }
        } else {
            $balance = $balance - $amount_paid;
            $balance1 = $amount_paid + $already_paid;
            $balanceadd = $already_paid +  $amount_paid;
            $paybalanceadd = $amount_paid;

            $insert = "INSERT into payment (id,mode_payment,amount_paid,payment_remarks,balance) 
                            values('$id','$mode_payment','$amount_paid','$payment_remarks','$balance') ";
            if (mysqli_query($conn, $insert)) {
                $sql2 = "update base set mode_payment='$mode_payment',lr_no='$lr_no',payment_remarks='$payment_remarks',amount_paid='$amount_paid',
          balanceadd='$balanceadd',balance='$balance',paybalanceadd='$paybalanceadd' where id=$id";
                if ($conn->query($sql2)) {

                    $sql2 = "UPDATE add_branch SET branch_balance = (branch_balance) WHERE branch_name= '$branch'";
                    if ($conn->query($sql2)) {
                        $sql21 = "SELECT branch_id,branch_balance FROM add_branch WHERE branch_name= '$branch' ORDER BY branch_id DESC LIMIT 1";
                        $result2 = $conn->query($sql21);
                        $branchTable = $result2->fetch_assoc();
                        $branch_balance1 = $branchTable['branch_balance'];
                        $branch_id = $branchTable['branch_id'];
                        $sql3 = "INSERT INTO transaction_history (branch_name,branch_id,user_id,username,lr_no,from_name,category,description,Amount,credit,debit,balance,mode_payment) 
                    VALUES ('$branch','$branch_id','$userId','$username','$lr_no','$from_name','Payments','','$amount_paid',0,0,'$branch_balance1','$mode_payment')";
                        $conn->query($sql3);
                    }
                    echo "<script type='text/javascript'>
                     $(document).ready(function() {
                      Swal.fire({
                  text: 'Data Save Successfully',
                  icon: 'success',
                  confirmButtonColor: '#1BC5BD',
                  button: 'Dashboard!',
                            })
                     });
 </script>";
                }
            }
        }
    }
}
if (isset($_POST['submit'])) {
    $id = $_POST["id"];
    $mode_transport = $_POST["mode_transport"];
    $lorry_no = $_POST["lorry_no"];
    $train_type = $_POST["train_type"];
    $RR_No = $_POST["RR_No"];
    $train_No = $_POST["train_No"];
    $flight_no = $_POST["flight_no"];

    $insert11 = "INSERT into Transport (id,mode_transport,lorry_no,train_type,RR_No,train_No,flight_no) 
            values('$id','$mode_transport','$lorry_no','$train_type','$RR_No','$train_No','$flight_no') ";
    if (mysqli_query($conn, $insert11)) {
        $sql2 = "update base set mode_transport='$mode_transport',lorry_no='$lorry_no',train_type='$train_type',RR_No='$RR_No',train_No='$train_No',flight_no='$flight_no' where id=$id";
        if ($conn->query($sql2)) {
            $sql = "select * from base where id=$id";
            $result = $conn->query($sql);
            $loading_detail = $result->fetch_assoc();

            $lr_no = $loading_detail['lr_no'];
            $RR_NO = $loading_detail['RR_NO'];
            $lorry_no = $loading_detail['lorry_no'];
            $flight_no = $loading_detail['flight_no'];
            $mode_transport = $loading_detail['mode_transport'];
            $train_type = $loading_detail['train_type'];
            echo "<script>alert('" . $RR_NO . "')</script>";
            $train_No = $loading_detail['train_No'];
            $to_name = $loading_detail['to_name'];
            $to_contact = $loading_detail['to_contact'];
            $from_name = $loading_detail['from_name'];
            $from_contact = $loading_detail['from_contact'];
            $agents = $loading_detail['agent'];

            $agent_name = $loading_detail['agent_name'];
            $agent_contact = $loading_detail['agent_contact'];

            if ($agents == "yes") {

                if ($mode_transport == "train") {
                    $sender = "sender";
                    $receiver = "receiver";
                    $is_agent = "agent";

                    if ($sender == "sender") {
                        $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                        $stext =  rawurlencode("Dear $from_name, Your consignment bearing LR No. $lr_no, RR No. $RR_NO has been loaded successfully in Train no. $train_No in the $train_type part of the train. For more details, contact us on 93825 87897. Regards, APS Cargo Movers");
                        $sender = urlencode('APSCAR');

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                        $postData = array("messages" => $sms_template);
                        $type_msg = rawurlencode($postData["messages"]);
                        $postData = array("template_id" => $template_id_sms);

                        $msg_template = rawurlencode($postData["template_id"]);

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $from_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166365171264552';

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $response0 = $response;
                        $result0 = json_decode($response0, true);
                        $msg_id = $result0["MessageData"][0]['MessageId'];
                        $ErrorMessage = $result0["ErrorMessage"];
                        $JobId = $result0["JobId"];
                    }
                    if ($receiver == "receiver") {
                        $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                        $stext =  rawurlencode("Dear $to_name, A consignment bearing LR No. $lr_no, RR No. $RR_NO has been loaded successfully in Train no. $train_No in the $train_type part of the train. our Agent's contact no. is $agent_contact. For more details, contact us on 93825 87897. Regards, APS Cargo Movers");
                        $sender = urlencode('APSCAR');

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                        $postData = array("messages" => $sms_template);
                        $type_msg = rawurlencode($postData["messages"]);
                        $postData = array("template_id" => $template_id_sms);

                        $msg_template = rawurlencode($postData["template_id"]);

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $to_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166365175773131';

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $response0 = $response;
                        $result0 = json_decode($response0, true);
                        $msg_id = $result0["MessageData"][0]['MessageId'];
                        $ErrorMessage = $result0["ErrorMessage"];
                        $JobId = $result0["JobId"];
                    }
                    if ($is_agent == "agent") {
                        $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                        $stext =  rawurlencode("Dear $agent_name, The consignment bearing LR No. $lr_no, RR No. $RR_NO has been loaded successfully for your destination in Train no. $train_No in the $train_type part of the train. Consignees contact no. is $to_contact. For more details, contact us on 93825 87897. Regards, APS Cargo Movers");
                        $sender = urlencode('APSCAR');

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                        $postData = array("messages" => $sms_template);
                        $type_msg = rawurlencode($postData["messages"]);
                        $postData = array("template_id" => $template_id_sms);

                        $msg_template = rawurlencode($postData["template_id"]);

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $agent_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166365179667602';

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $response0 = $response;
                        $result0 = json_decode($response0, true);
                        $msg_id = $result0["MessageData"][0]['MessageId'];
                        $ErrorMessage = $result0["ErrorMessage"];
                        $JobId = $result0["JobId"];
                    }
                } else if ($mode_transport == "road") {
                    $sender = "sender";
                    $receiver = "receiver";
                    $is_agent = "agent";

                    if ($sender == "sender") {
                        $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                        $stext =  rawurlencode("Dear $from_name, Your consignment bearing LR No. $lr_no has been loaded successfully in Vehicle no. $lorry_no. For more details contact us on 93825 87897. Regards, APS Cargo Movers");
                        $sender = urlencode('APSCAR');

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                        $postData = array("messages" => $sms_template);
                        $type_msg = rawurlencode($postData["messages"]);
                        $postData = array("template_id" => $template_id_sms);

                        $msg_template = rawurlencode($postData["template_id"]);

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $from_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166365183535818';

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $response0 = $response;
                        $result0 = json_decode($response0, true);
                        $msg_id = $result0["MessageData"][0]['MessageId'];
                        $ErrorMessage = $result0["ErrorMessage"];
                        $JobId = $result0["JobId"];
                    }
                    if ($receiver == "receiver") {
                        $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                        $stext =  rawurlencode("Dear $to_name, A consignment bearing LR No. $lr_no has been loaded successfully in Vehicle no. $lorry_no. our Agent's contact no. is $agent_contact. For more details contact us on 93825 87897. Regards, APS Cargo Movers");
                        $sender = urlencode('APSCAR');

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                        $postData = array("messages" => $sms_template);
                        $type_msg = rawurlencode($postData["messages"]);
                        $postData = array("template_id" => $template_id_sms);

                        $msg_template = rawurlencode($postData["template_id"]);

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $to_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166365187273832';

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $response0 = $response;
                        $result0 = json_decode($response0, true);
                        $msg_id = $result0["MessageData"][0]['MessageId'];
                        $ErrorMessage = $result0["ErrorMessage"];
                        $JobId = $result0["JobId"];
                    }
                    if ($is_agent == "agent") {
                        $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                        $stext =  rawurlencode("Dear $agent_name, The consignment bearing LR No. $lr_no has been loaded successfully for your destination in Vehicle no. $lorry_no. Consignees contact no. is $to_contact. For more details contact us on 93825 87897. Regards, APS Cargo Movers");
                        $sender = urlencode('APSCAR');

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                        $postData = array("messages" => $sms_template);
                        $type_msg = rawurlencode($postData["messages"]);
                        $postData = array("template_id" => $template_id_sms);

                        $msg_template = rawurlencode($postData["template_id"]);

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $agent_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166365192304353';

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $response0 = $response;
                        $result0 = json_decode($response0, true);
                        $msg_id = $result0["MessageData"][0]['MessageId'];
                        $ErrorMessage = $result0["ErrorMessage"];
                        $JobId = $result0["JobId"];
                    }
                } else if ($mode_transport == "air") {
                    $sender = "sender";
                    $receiver = "receiver";
                    $is_agent = "agent";

                    if ($sender == "sender") {
                        $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                        $stext =  rawurlencode("Dear $from_name, Your consignment bearing LR No. $lr_no has been loaded successfully in-flight no. $flight_no. For more details contact us on 93825 87897. Regards, APS Cargo Movers");
                        $sender = urlencode('APSCAR');

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                        $postData = array("messages" => $sms_template);
                        $type_msg = rawurlencode($postData["messages"]);
                        $postData = array("template_id" => $template_id_sms);

                        $msg_template = rawurlencode($postData["template_id"]);

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $from_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166365198726174';

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $response0 = $response;
                        $result0 = json_decode($response0, true);
                        $msg_id = $result0["MessageData"][0]['MessageId'];
                        $ErrorMessage = $result0["ErrorMessage"];
                        $JobId = $result0["JobId"];
                    }
                    if ($receiver == "receiver") {
                        $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                        $stext =  rawurlencode("Dear $to_name, A consignment bearing LR No. $lr_no has been loaded successfully in-flight no. $flight_no. our Agent's contact no. is $agent_name. For more details contact us on 93825 87897. Regards, APS Cargo Movers");
                        $sender = urlencode('APSCAR');

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                        $postData = array("messages" => $sms_template);
                        $type_msg = rawurlencode($postData["messages"]);
                        $postData = array("template_id" => $template_id_sms);

                        $msg_template = rawurlencode($postData["template_id"]);

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $to_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166365203405540';

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $response0 = $response;
                        $result0 = json_decode($response0, true);
                        $msg_id = $result0["MessageData"][0]['MessageId'];
                        $ErrorMessage = $result0["ErrorMessage"];
                        $JobId = $result0["JobId"];
                    }
                    if ($is_agent == "agent") {
                        $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                        $stext =  rawurlencode("Dear $agent_name, The consignment bearing LR No. $lr_no has been loaded successfully for your destination in-flight no. $flight_no. Consignees contact no. is $to_contact. For more details contact us on 93825 87897. Regards, APS Cargo Movers");
                        $sender = urlencode('APSCAR');

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                        $postData = array("messages" => $sms_template);
                        $type_msg = rawurlencode($postData["messages"]);
                        $postData = array("template_id" => $template_id_sms);

                        $msg_template = rawurlencode($postData["template_id"]);

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $agent_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166365208237217';

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $response0 = $response;
                        $result0 = json_decode($response0, true);
                        $msg_id = $result0["MessageData"][0]['MessageId'];
                        $ErrorMessage = $result0["ErrorMessage"];
                        $JobId = $result0["JobId"];
                    }
                }
            } else if ($agents == "no") {
                if ($mode_transport == "train") {
                    $sender = "sender";
                    $receiver = "receiver";

                    if ($sender == "sender") {
                        $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                        $stext =  rawurlencode("Dear $from_name, Your consignment bearing LR No. $lr_no, RR No. $RR_NO has been loaded successfully in Train no. $train_No in the $train_type part of the train. For more details, contact us on 93825 87897. Regards, APS Cargo Movers");
                        $sender = urlencode('APSCAR');

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                        $postData = array("messages" => $sms_template);
                        $type_msg = rawurlencode($postData["messages"]);
                        $postData = array("template_id" => $template_id_sms);

                        $msg_template = rawurlencode($postData["template_id"]);

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $from_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166365171264552';

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $response0 = $response;
                        $result0 = json_decode($response0, true);
                        $msg_id = $result0["MessageData"][0]['MessageId'];
                        $ErrorMessage = $result0["ErrorMessage"];
                        $JobId = $result0["JobId"];
                    }
                    if ($receiver == "receiver") {
                        $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                        $stext =  rawurlencode("Dear $to_name, A consignment bearing LR No. $lr_no, RR No. $RR_NO has been loaded successfully in Train no. $train_No in the $train_type part of the train. our Agent's contact no. is $agent_contact. For more details, contact us on 93825 87897. Regards, APS Cargo Movers");
                        $sender = urlencode('APSCAR');

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                        $postData = array("messages" => $sms_template);
                        $type_msg = rawurlencode($postData["messages"]);
                        $postData = array("template_id" => $template_id_sms);

                        $msg_template = rawurlencode($postData["template_id"]);

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $to_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166365175773131';

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $response0 = $response;
                        $result0 = json_decode($response0, true);
                        $msg_id = $result0["MessageData"][0]['MessageId'];
                        $ErrorMessage = $result0["ErrorMessage"];
                        $JobId = $result0["JobId"];
                    }
                } else if ($mode_transport == "road") {
                    $sender = "sender";
                    $receiver = "receiver";

                    if ($sender == "sender") {
                        $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                        $stext =  rawurlencode("Dear $from_name, Your consignment bearing LR No. $lr_no has been loaded successfully in Vehicle no. $lorry_no. For more details contact us on 93825 87897. Regards, APS Cargo Movers");
                        $sender = urlencode('APSCAR');

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                        $postData = array("messages" => $sms_template);
                        $type_msg = rawurlencode($postData["messages"]);
                        $postData = array("template_id" => $template_id_sms);

                        $msg_template = rawurlencode($postData["template_id"]);

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $from_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166365183535818';

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $response0 = $response;
                        $result0 = json_decode($response0, true);
                        $msg_id = $result0["MessageData"][0]['MessageId'];
                        $ErrorMessage = $result0["ErrorMessage"];
                        $JobId = $result0["JobId"];
                    }
                    if ($receiver == "receiver") {
                        $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                        $stext =  rawurlencode("Dear $to_name, A consignment bearing LR No. $lr_no has been loaded successfully in Vehicle no. $lorry_no. our Agent's contact no. is $agent_contact. For more details contact us on 93825 87897. Regards, APS Cargo Movers");
                        $sender = urlencode('APSCAR');

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                        $postData = array("messages" => $sms_template);
                        $type_msg = rawurlencode($postData["messages"]);
                        $postData = array("template_id" => $template_id_sms);

                        $msg_template = rawurlencode($postData["template_id"]);

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $to_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166365187273832';

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $response0 = $response;
                        $result0 = json_decode($response0, true);
                        $msg_id = $result0["MessageData"][0]['MessageId'];
                        $ErrorMessage = $result0["ErrorMessage"];
                        $JobId = $result0["JobId"];
                    }
                } else if ($mode_transport == "air") {
                    $sender = "sender";
                    $receiver = "receiver";

                    if ($sender == "sender") {
                        $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                        $stext =  rawurlencode("Dear $from_name, Your consignment bearing LR No. $lr_no has been loaded successfully in-flight no. $flight_no. For more details contact us on 93825 87897. Regards, APS Cargo Movers");
                        $sender = urlencode('APSCAR');

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                        $postData = array("messages" => $sms_template);
                        $type_msg = rawurlencode($postData["messages"]);
                        $postData = array("template_id" => $template_id_sms);

                        $msg_template = rawurlencode($postData["template_id"]);

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $from_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166365198726174';

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $response0 = $response;
                        $result0 = json_decode($response0, true);
                        $msg_id = $result0["MessageData"][0]['MessageId'];
                        $ErrorMessage = $result0["ErrorMessage"];
                        $JobId = $result0["JobId"];
                    }
                    if ($receiver == "receiver") {
                        $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                        $stext =  rawurlencode("Dear $to_name, A consignment bearing LR No. $lr_no has been loaded successfully in-flight no. $flight_no. our Agent's contact no. is $agent_name. For more details contact us on 93825 87897. Regards, APS Cargo Movers");
                        $sender = urlencode('APSCAR');

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

                        $postData = array("messages" => $sms_template);
                        $type_msg = rawurlencode($postData["messages"]);
                        $postData = array("template_id" => $template_id_sms);

                        $msg_template = rawurlencode($postData["template_id"]);

                        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);

                        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $data["apikey"] . '&senderid=' . $data["sender"] . '&channel=2&DCS=0&flashsms=0&number=' . $to_contact . '&text=' . $stext . '&route=31&EntityId=1201161889896722595&dlttemplateid=1207166365203405540';

                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $response0 = $response;
                        $result0 = json_decode($response0, true);
                        $msg_id = $result0["MessageData"][0]['MessageId'];
                        $ErrorMessage = $result0["ErrorMessage"];
                        $JobId = $result0["JobId"];
                    }
                }
            }

            echo "<script type='text/javascript'>

                     $(document).ready(function() {
                      Swal.fire({
                  
                  text: 'Data Save Successfully',
                  icon: 'success',
                  confirmButtonColor: '#1BC5BD',
                  button: 'Dashboard!',
                            })
                            
                     });

                </script>";
        }
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
                            LR Datatable
                        </h2>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                </div>
            </div>
        </div>

        <div class="d-flex flex-column-fluid">
            <div class=" container ">
                <div class="card card-custom">

                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="modal fade" id="create_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="color: #1BC5BD;">Tracking</h5>
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
                                                <input type="hidden" name="id" id="create_user_id">
                                                <div class="form-group row">
                                                    <label class="col-form-label text-right col-lg-3 col-sm-12">No of Stop <span style="color:red">*</span></label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                                        <select class="form-control" aria-label="Default select example" id="no_stop" name="no_stop" required>
                                                            <option>Select</option>
                                                            <?php
                                                            $i = 1;
                                                            while ($i <= 100) {
                                                                echo '<option>' . $i . '</option>';
                                                                $i++;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div id="emi_list_disp"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" id="modal_footer">
                                            <button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="register" id="submit">Submit</button>
                                            <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal fade" id="create_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-right:0px">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ch">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="color: #1BC5BD;">Tracking Location</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body modal-height" style="overflow:auto;">
                                        <div class="card-body">
                                            <div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
                                                <div class="alert-icon"><i class="flaticon2-information"></i></div>

                                                <div class="alert-close">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span><i class="ki ki-close "></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12 col-md-10 hh-grayBox pt45 pb20">
                                                        <div class="rows justify-content-center tracking mt-5" id="track_location">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" id="modal_footer">
                                        <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="alllocation_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="color: #1BC5BD;">Transport</h5>
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
                                                <input type="hidden" name="id" id="allloading_user_id">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class=" justify-content-center mt-5" id="allloadingstatusupdate">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" id="modal_footer">
                                            <button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="submit" id="submit">Submit</button>
                                            <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal fade" id="alldeliverys_userphp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="color: #1BC5BD;">Delivery</h5>
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
                                                <input type="hidden" name="id" id="delivery_user_id">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="rows justify-content-center mt-5" id="alldeliverystatusupdate">
                                                        </div>
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

                        <div class="modal fade" id="allpayment_userphp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form class="login-form" id="register_form" method="post" enctype="multipart/form-data">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="color: #1BC5BD;">Payment</h5>
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
                                                <input type="hidden" name="id" id="allpayment_userstatus_id">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="rows justify-content-center mt-5" id="allpaymentstatusupdate">
                                                        </div>
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
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#all">All</a>
                            </li>
                        </ul>

                        <?php
                        if ($_SESSION['role'] == "super_admin") {
                        ?>

                            <div class="tab-content">

                                <div id="all" class="container tab-pane active"><br>
                                    <div class="table-responsive">
                                        <div class="card-body">
                                            <div class="row mt-3 text-center">
                                                <div class="col-sm-2">
                                                    <label class="form-label">From Date</label>
                                                    <input class="form-control" type="date" name="fromdateall" id="fromdateall">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="form-label">To Date</label>
                                                    <input class="form-control" type="date" name="todateall" id="todateall">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="form-label">Select User</label>
                                                    <select class="form-control" name="consignment_typeall" id="consignment_typeall">
                                                        <option selected disabled>Select</option>
                                                        <option value="tbb">TBB</option>
                                                        <option value="to_pay">To Pay</option>
                                                        <option value="month">Month</option>
                                                        <option value="paid">Paid</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="form-label">Select Transport</label>
                                                    <select class="form-control" name="mode_transportall" id="mode_transportall">
                                                        <option selected disabled>Select</option>
                                                        <option value="road">Road</option>
                                                        <option value="train">Train</option>
                                                        <option value="air">Air</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="form-label">Select Branch</label>
                                                    <select class="form-control" name="branchall" id="branchall">
                                                        <option selected disabled>Select branch</option>
                                                        <?php
                                                        $sql1 = "SELECT * FROM add_branch";
                                                        $result1 = $conn->query($sql1);
                                                        while ($branchTable1 = $result1->fetch_assoc()) {
                                                        ?>
                                                            <option value="<?= $branchTable1['branch_name'] ?> "><?= $branchTable1['branch_name']  ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="form-label">Select Payment</label>
                                                    <select class="form-control" name="mode_paymentall" id="mode_paymentall">
                                                        <option selected disabled>Select Mode</option>
                                                        <option value="cash">Cash</option>
                                                        <option value="cheque">Cheque</option>
                                                        <option value="upi">UPI</option>
                                                        <option value="neft">NEFT</option>
                                                        <option value="rtgs">RTGS</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-10"></div>
                                                <div class="col-sm-2">
                                                    <input class="btn btn-primary m-5 pt-3" type="submit" name="filterall" value="Filter" id="filterall">
                                                </div>
                                                <div class="col-sm-10"></div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-primary mb-3" onclick="ExportToExcel('xlsx')">Excel</button>
                                                    <!--<button class="btn btn-primary mb-3" onclick="fnExcelReport()">Excel</button>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="display" id="exampleall">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Name</th>
                                                        <th>Lr No</th>
                                                        <th>Date</th>
                                                        <th>Branch</th>
                                                        <th>Consignment Type</th>
                                                        <th>Transport Status</th>
                                                        <th>Delivery Status</th>
                                                        <th>Payment Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="hide">
                                            <table id="exampleallexcel">
                                                <thead>
                                                    <tr>
                                                        <th colspan='29'>
                                                            <h1>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<span style="font-weight:bold;">APS CARGOS MOVERS</span></h1>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan='29'>
                                                            <h4>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<strong>102,WALL TEX ROAD,CHENNAI 600003</strong></h4>
                                                        </th>
                                                    </tr>
                                                    <!--<tr>-->
                                                    <th colspan='29'>
                                                        <h2>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<span class="bolded">TEL NO:- 044-42012933,MOB NO:-9382587896,E-Mail:-apscargo102@gmail.com</span></h2>
                                                    </th>
                                                    </tr>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Date</th>
                                                        <th>Customer type</th>
                                                        <th>Booking type</th>
                                                        <th>LR No</th>
                                                        <th>Consignment Type</th>
                                                        <th>Invoice Type</th>
                                                        <th>Internal Info</th>
                                                        <th>Eway Bill No</th>
                                                        <th>Material Name</th>
                                                        <th>Quantity in KG</th>
                                                        <th>Quantity in Nos</th>
                                                        <th>Rate per unit</th>
                                                        <th>Docket Charge</th>
                                                        <th>Agent's Commission</th>
                                                        <th>GST</th>
                                                        <th>From Name</th>
                                                        <th>From Address</th>
                                                        <th>From Contact</th>
                                                        <th>To Name</th>
                                                        <th>To Address</th>
                                                        <th>To Contact</th>
                                                        <th>Agent Name</th>
                                                        <th>Agent Address</th>
                                                        <th>Agent Contact</th>
                                                        <th>Delivery Message</th>
                                                        <th>Total</th>
                                                        <th>Amount Paid</th>
                                                        <th>Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th class="text-center" colspan="25"></th>
                                                        <th class="text-center"><b>OVER ALL TOTAL</b></th>
                                                        <th class="text-center" id="total"><b>Total: 0.0</b></th>
                                                        <th class="text-center" id="amount_paid"><b>AmountPaid: 0.0</b></th>
                                                        <th class="text-center" id="balance"><b>Balance: 0.0</b></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        <?php

                        } elseif ($_SESSION['role'] == "user") {
                        ?>

                            <div class="tab-content">

                                <div id="all" class="container tab-pane active"><br>
                                    <div class="table-responsive">
                                        <div class="card-body">
                                            <div class="row mt-3 text-center">
                                                <div class="col-sm-2">
                                                    <label class="form-label">From Date</label>
                                                    <input class="form-control" type="date" name="fromdatealluser" id="fromdatealluser">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="form-label">To Date</label>
                                                    <input class="form-control" type="date" name="todatealluser" id="todatealluser">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="form-label">Select User</label>
                                                    <select class="form-control" name="consignment_typealluser" id="consignment_typealluser">
                                                        <option selected disabled>Select User</option>
                                                        <option value="tbb">TBB</option>
                                                        <option value="to_pay">To Pay</option>
                                                        <option value="month">Month</option>
                                                        <option value="paid">Paid</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="form-label">Select Transport</label>
                                                    <select class="form-control" name="mode_transportalluser" id="mode_transportalluser">
                                                        <option selected disabled>Select Transport</option>
                                                        <option value="road">Road</option>
                                                        <option value="train">Train</option>
                                                        <option value="air">Air</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="form-label">Select Branch</label>
                                                    <select class="form-control" name="branchalluser" id="branchalluser">
                                                        <option selected disabled>Select branch</option>
                                                        <?php
                                                        $sql1 = "SELECT * FROM add_branch";
                                                        $result1 = $conn->query($sql1);
                                                        while ($branchTable1 = $result1->fetch_assoc()) {
                                                        ?>
                                                            <option value="<?= $branchTable1['branch_name'] ?> "><?= $branchTable1['branch_name']  ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="form-label">Select Payment</label>
                                                    <select class="form-control" name="mode_paymentalluser" id="mode_paymentalluser">
                                                        <option selected disabled>Select Mode</option>
                                                        <option value="cash">Cash</option>
                                                        <option value="cheque">Cheque</option>
                                                        <option value="upi">UPI</option>
                                                        <option value="neft">NEFT</option>
                                                        <option value="rtgs">RTGS</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-10"></div>
                                                <div class="col-sm-2">
                                                    <input class="btn btn-primary m-5 pt-3" type="submit" name="filteralluser" value="Filter" id="filteralluser">
                                                </div>
                                                <div class="col-sm-10"></div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-primary mb-3" onclick="ExportToExceluser('xlsx')">Excel</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="display" id="examplealluser">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Name</th>
                                                        <th>Lr No</th>
                                                        <th>Date</th>
                                                        <th>Branch</th>
                                                        <th>Consignment Type</th>
                                                        <th>Transport Status</th>
                                                        <th>Delivery Status</th>
                                                        <th>Payment Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="hide">
                                            <table id="exampleallexceluser">
                                                <thead>
                                                    <tr>
                                                        <th colspan='29'>
                                                            <h1>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<span style="font-weight:bold;">APS CARGOS MOVERS</span></h1>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan='29'>
                                                            <h4>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<strong>102,WALL TEX ROAD,CHENNAI 600003</strong></h4>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan='29'>
                                                            <h2>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<span class="bolded">TEL NO:- 044-42012933,MOB NO:-9382587896,E-Mail:-apscargo102@gmail.com</span></h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Date</th>
                                                        <th>Customer type</th>
                                                        <th>Booking type</th>
                                                        <th>LR No</th>
                                                        <th>Consignment Type</th>
                                                        <th>Invoice Type</th>
                                                        <th>Internal Info</th>
                                                        <th>Eway Bill No</th>
                                                        <th>Material Name</th>
                                                        <th>Quantity in KG</th>
                                                        <th>Quantity in Nos</th>
                                                        <th>Rate per unit</th>
                                                        <th>Docket Charge</th>
                                                        <th>Agent's Commission</th>
                                                        <th>GST</th>
                                                        <th>From Name</th>
                                                        <th>From Address</th>
                                                        <th>From Contact</th>
                                                        <th>To Name</th>
                                                        <th>To Address</th>
                                                        <th>To Contact</th>
                                                        <th>Agent Name</th>
                                                        <th>Agent Address</th>
                                                        <th>Agent Contact</th>
                                                        <th>Delivery Message</th>
                                                        <th>Total</th>
                                                        <th>Amount Paid</th>
                                                        <th>Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th class="text-center" colspan="25"></th>
                                                        <th class="text-center"><b>OVER ALL TOTAL</b></th>
                                                        <th class="text-center" id="total"><b>Total: 0.0</b></th>
                                                        <th class="text-center" id="amount_paid"><b>AmountPaid: 0.0</b></th>
                                                        <th class="text-center" id="balance"><b>Balance: 0.0</b></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
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

<script type="text/javascript">
    function ShowHideDiv() {
        var mode_transport = document.getElementById("mode_transport");
        var productoptClass02 = document.getElementById("productoptClass02");
        var productoptClass102 = document.getElementById("productoptClass102");
        var productoptClass202 = document.getElementById("productoptClass202");
        productoptClass02.style.display = mode_transport.value == "road" ? "block" : "none";
        productoptClass102.style.display = mode_transport.value == "train" ? "block" : "none";
        productoptClass202.style.display = mode_transport.value == "air" ? "block" : "none";
    }
</script>
<script>
    $(document).ready(function() {
        $("#mode_transport2").change(function() {
            let mode_transport2 = $(this).val();
            // alert(mode_transport2)
            // console.log(mode_transport2);
            if (mode_transport2 == "road") {
                $('#productoptClass02').show();
                $('#productoptClass102').hide();
                $('#productoptClass202').hide();
            } else if (mode_transport2 == "train") {
                $('#productoptClass02').hide();
                $('#productoptClass102').show();
                $('#productoptClass202').hide();
            } else if (category == "air") {
                $('#productoptClass02').hide();
                $('#productoptClass102').hide();
                $('#productoptClass202').show();
            } else {

            }

        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#amount_paid").on("keyup", function() {
            var total = $("#total").val();
            console.log(total, "total");
            var amount_paid = $("#amount_paid").val();
            console.log(amount_paid, "amount_paid");
            var balance = total - amount_paid;

            $("#balance").val(balance);
        });
    });
</script>
<script>
    $(document).ready(function() {
        var tableall = $('#exampleall').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailall",
                "type": "POST"
            },
            //      "dom": 'lBfrtip',
            //     "buttons":  [
            //     'excel'
            // ],
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "from_name"
                },
                {
                    "data": "lr_no"
                },
                {
                    "data": "createdAt"
                },
                {
                    "data": "branch"
                },
                {
                    "data": "consignment_type"
                },
                {
                    "data": "mode_transport"
                },
                {
                    "data": "delivery_status"
                },
                {
                    "data": "balance"
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
                        return '<a href="lrform_detail.php?id=' + row.id + '">' + row.from_name + '</a>';
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, row) {
                        return row.lr_no;
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {

                        return row.createdAt;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {
                        return row.branch;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.consignment_type;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        if (row.mode_transport == '') {
                            return '<span class="btn btn-sm btn-light-danger font-weight-bolder">Unloaded</span>';
                        } else {
                            return '<span class="btn btn-sm btn-light-primary font-weight-bolder">Loaded</span>';
                        }
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        if (row.delivery_status == 'delivered') {
                            return '<span class="btn btn-sm btn-light-primary font-weight-bolder">Delivered</span>';
                        } else {
                            return '<span class="btn btn-sm btn-light-danger font-weight-bolder">Undelivered</span>';
                        }
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, row) {
                        if (row.consignment_type == "paid" || row.balance == 0) {
                            return '<span class="btn btn-sm btn-light-primary font-weight-bolder">Paid</span>';
                        } else {
                            return '<span class="btn btn-sm btn-light-danger font-weight-bolder">Unpaid</span>';
                        }
                    }
                },
                {
                    targets: 9,
                    render: function(data, type, row) {
                        //  return row.branch;
                        return '<a href="lrdatatable.php?id=' + row.id + '" id="' + row.id + '" class="createuser btn btn-sm btn-clean btn-icon mr-2 " title="Tracking" data-toggle="modal" data-target="#create_user"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" \ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " /><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" /></g></svg></span></a><a href="lrdatatable.php?id=' + row.id + '" id="' + row.id + '" class="all_delivery_tracking btn btn-sm btn-clean btn-icon" title="View Tracking Location" data-toggle="modal" data-target="#create_user_modal"><i class="fa fa-map-marker"></i></a><div class="dropdown dropdown-inline"><a href="#" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"></path></g></svg></span></a><a href="lrdatatable.php?del=' + row.id + '" onclick="myFunction()" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2"></li><li class="navi-item"><a href="#" id="' + row.id + '" class="navi-link onclick_load" data-toggle="modal" data-target="#alllocation_user"><i class="fa fa-spinner"></i>&ensp;Loading</a></li><li class="navi-item"><a href="lrdatatable.php?id=' + row.id + '" id="' + row.id + '" class="navi-link alldelivery_userstatus" data-toggle="modal" data-target="#alldeliverys_userphp"><input type="hidden" name="id" value=' + row.id + '><i class="fa fa-truck"></i>&ensp;Delivery</span></a></li><li class="navi-item"><a href="lrdatatable.php?id=' + row.id + '" id="' + row.id + '" class="navi-link allpayment_userstatus" data-toggle="modal" data-target="#allpayment_userphp"><i class="fa fa-credit-card"></i>&ensp;Payment</a></li></ul></div></div>';
                        // return '<a href="lrdatatable.php?id=' + row.id + '" id="' + row.id + '" class="createuser btn btn-sm btn-clean btn-icon mr-2" title="Tracking" data-toggle="modal" data-target="#create_user"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" \ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " /><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" /></g></svg></span></a><a href="lrdatatable.php?id=' + row.id + '" id="' + row.id + '" class="all_delivery_tracking btn btn-sm btn-clean btn-icon" title="View Tracking Location" data-toggle="modal" data-target="#create_user_modal"><i class="fa fa-map-marker"></i></a><div class="dropdown dropdown-inline"><a href="#" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"></path></g></svg></span></a><a href="lrdatatable.php?del=' + row.id + '" onclick="myFunction()" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a></div>       <a id="' + row.id + '" class="btn btn-sm btn-clean btn-icon onclick_load" data-toggle="modal" data-target="#alllocation_user"><i class="fa fa-map-marker"></i></a>         <a  id="' + row.id + '" class="btn btn-sm btn-clean btn-icon alldelivery_userstatus" data-toggle="modal" data-target="#alldeliverys_userphp"><i class="fa fa-truck"></i></a> <a id="' + row.id + '" class="btn btn-sm btn-clean btn-icon allpayment_userstatus" data-toggle="modal" data-target="#allpayment_userphp"><i class="fa fa-credit-card"></i></a>';
                        // return '<div class="dropdown dropdown-inline"><a href="#" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/></g></svg></span></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">Choose an action:</li><li class="navi-item"><a href="#" id="' + row.id + '" class="navi-link activate"><span class="navi-icon"><i class="fas fa-user-alt"></i></span><span class="navi-text">Active</span></a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="navi-link de_activate"><span class="navi-icon"><i class="fas fa-user-alt-slash"></i></span><span class="navi-text">De-Active</span></a></li><li class="navi-item"><a href="#" id="' + row.id + '" class="navi-link change_password"><span class="navi-icon"><i class="fas fa-edit"></i></span><span class="navi-text">Change Password</span></a></li></ul></div></div>';
                    }
                }
            ]
        });

        $("#filterall").on("click", function() {
            var from = $("#fromdateall").val();
            var to = $("#todateall").val();
            var consignment_type = $("#consignment_typeall").val();
            var mode_transport = $("#mode_transportall").val();
            var branch = $("#branchall").val();
            var mode_payment = $("#mode_paymentall").val();

            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branch == null && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type).load();
                tableall.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branch != "" && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport + '&branch=' + branch + '&mode_payment=' + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branch != "" && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport + '&branch=' + branch).load();
                tableall.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branch == null && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport + '&mode_payment=' + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branch != "" && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&branch=' + branch + '&mode_payment=' + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branch != "" && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport + '&branch=' + branch + '&mode_payment=' + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branch == null && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport).load();
                tableall.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branch != "" && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&branch=' + branch + '&mode_payment=' + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branch == null && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport + '&mode_payment=' + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branch != "" && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport + '&branch=' + branch).load();
                tableall.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branch == null && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_payment=' + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branch != "" && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&branch=' + branch).load();
                tableall.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branch == null && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&mode_payment=' + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branch == null && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport).load();
                tableall.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branch != "" && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&branch=' + branch).load();
                tableall.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branch == null && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branch == null && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branch != "" && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport + '&branch=' + branch + '&mode_payment=' + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branch != "" && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport + '&branch=' + branch).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branch == null && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport + '&mode_payment=' + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branch != "" && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type + '&branch=' + branch + '&mode_payment=' + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branch != "" && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&mode_transport=" + mode_transport + '&branch=' + branch + '&mode_payment=' + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branch == null && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branch != "" && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&branch=" + branch + '&mode_payment=' + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branch == null && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&mode_transport=" + mode_transport + '&mode_payment=' + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branch != "" && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&mode_transport=" + mode_transport + '&branch=' + branch).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branch == null && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type + '&mode_payment=' + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branch != "" && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type + '&branch=' + branch).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branch == null && mode_payment != "") {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&mode_payment=" + mode_payment).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branch == null && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&mode_transport=" + mode_transport).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branch != "" && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall&branch=" + branch).load();
                tableall.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branch == null && mode_payment == null) {
                tableall.ajax.url("ajax_request.php?action=fetch_branch_detailall").load();
                tableall.ajax.reload();
            }

        });

        var tableallexcel = $('#exampleallexcel').css("display", "none").DataTable({
            // var tableallexcel = $('#exampleallexcel').DataTable({
            "processing": true,
            "responsive": true,
            "bFilter": false,
            "bPaginate": false,
            "type": 'excel',
            "escape": 'false',
            "ignoreColumn": [1],
            "bold": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailall",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "createdAt"
                },
                {
                    "data": "customer_type"
                },
                {
                    "data": "booking_type"
                },
                {
                    "data": "lr_no"
                },
                {
                    "data": "consignment_type"
                },
                {
                    "data": "invoice_type"
                },
                {
                    "data": "internal_info"
                },
                {
                    "data": "eway_bill"
                },
                {
                    "data": "material_name"
                },
                {
                    "data": "quantity_kg"
                },
                {
                    "data": "quantity_nos"
                },
                {
                    "data": "rate"
                },
                {
                    "data": "docket_charge"
                },
                {
                    "data": "agent_commission"
                },
                {
                    "data": "gstamount"
                },
                {
                    "data": "from_name"
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
                    "data": "agent_name"
                },
                {
                    "data": "agent_contact"
                },
                {
                    "data": "agent_city"
                },
                {
                    "data": "delivery_message"
                },
                {
                    "data": "total"
                },
                {
                    "data": "balanceadd"
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
                        return row.createdAt;
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, row) {
                        return row.customer_type;
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {

                        return row.booking_type;
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
                        return row.consignment_type;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.invoice_type;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.internal_info;
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, row) {
                        return row.eway_bill;
                    }
                },
                {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.material_name;
                    }
                }, {
                    targets: 10,
                    render: function(data, type, row) {
                        return row.quantity_kg;
                    }
                },
                {
                    targets: 11,
                    render: function(data, type, row) {
                        return row.quantity_nos;
                    }
                },
                {
                    targets: 12,
                    render: function(data, type, row) {
                        return row.rate;
                    }
                },
                {
                    targets: 13,
                    render: function(data, type, row) {

                        return row.docket_charge;
                    }
                },
                {
                    targets: 14,
                    render: function(data, type, row) {
                        return row.agent_commission;
                    }
                },
                {
                    targets: 15,
                    render: function(data, type, row) {
                        return row.gstamount;
                    }
                },
                {
                    targets: 16,
                    render: function(data, type, row) {
                        return row.from_name;
                    }
                },
                {
                    targets: 17,
                    render: function(data, type, row) {
                        return row.from_address;
                    }
                },
                {
                    targets: 18,
                    render: function(data, type, row) {
                        return row.from_contact;
                    }
                },
                {
                    targets: 19,
                    render: function(data, type, row) {
                        return row.to_name;

                    }
                },
                {
                    targets: 20,
                    render: function(data, type, row) {
                        return row.to_address;
                    }
                },
                {
                    targets: 21,
                    render: function(data, type, row) {
                        return row.to_contact;
                    }
                },
                {
                    targets: 22,
                    render: function(data, type, row) {
                        return row.agent_name;
                    }
                },
                {
                    targets: 23,
                    render: function(data, type, row) {

                        return row.agent_contact;
                    }
                },
                {
                    targets: 24,
                    render: function(data, type, row) {
                        return row.agent_city;
                    }
                },
                {
                    targets: 25,
                    render: function(data, type, row) {
                        return row.delivery_message;
                    }
                },
                {
                    targets: 26,
                    render: function(data, type, row) {
                        return row.total;
                    }
                },
                {
                    targets: 27,
                    render: function(data, type, row) {
                        return row.balanceadd;
                    }
                },
                {
                    targets: 28,
                    render: function(data, type, row) {
                        return row.total - row.balanceadd;
                    }
                }
            ]
        });

        $("#filterall").on("click", function() {
            var from = $("#fromdateall").val();
            var to = $("#todateall").val();
            var consignment_type = $("#consignment_typeall").val();
            var mode_transport = $("#mode_transportall").val();
            var branch = $("#branchall").val();
            var mode_payment = $("#mode_paymentall").val();

            $.ajax({
                url: 'ajax_request.php?action=fetch_branch_detailall_bill',
                type: 'POST',
                dataType: 'json',
                data: {
                    'from': from,
                    'to': to,
                    'consignment_type': consignment_type,
                    'mode_transport': mode_transport,
                    'branch': branch,
                    'mode_payment': mode_payment
                },
                success: function(result_job) {
                    $('#total').html(result_job.data.total);
                    $('#amount_paid').html(result_job.data.balanceadd);
                    $('#balance').html(result_job.data.total - result_job.data.balanceadd);
                }
            });

            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branch != "" && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport + '&branch=' + branch + '&mode_payment=' + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branch != "" && mode_payment == null) {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport + '&branch=' + branch).load();
                tableallexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branch == null && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport + '&mode_payment=' + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branch != "" && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&branch=' + branch + '&mode_payment=' + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branch != "" && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport + '&branch=' + branch + '&mode_payment=' + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branch == null && mode_payment == null) {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type).load();
                tableallexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branch == null && mode_payment == null) {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport).load();
                tableallexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branch != "" && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&branch=' + branch + '&mode_payment=' + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branch == null && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport + '&mode_payment=' + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branch != "" && mode_payment == null) {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport + '&branch=' + branch).load();
                tableallexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branch == null && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_payment=' + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branch != "" && mode_payment == null) {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&branch=' + branch).load();
                tableallexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branch == null && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&mode_payment=' + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branch == null && mode_payment == null) {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport).load();
                tableallexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branch != "" && mode_payment == null) {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&branch=' + branch).load();
                tableallexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branch == null && mode_payment == null) {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branch != "" && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport + '&branch=' + branch + '&mode_payment=' + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branch != "" && mode_payment == null) {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport + '&branch=' + branch).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branch == null && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport + '&mode_payment=' + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branch != "" && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type + '&branch=' + branch + '&mode_payment=' + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branch != "" && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport + '&branch=' + branch + '&mode_payment=' + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branch == null && mode_payment == null) {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branch == null && mode_payment == null) {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branch != "" && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&branch=" + branch + '&mode_payment=' + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branch == null && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&mode_transport=" + mode_transport + '&mode_payment=' + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branch != "" && mode_payment == null) {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&mode_transport=" + mode_transport + '&branch=' + branch).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branch == null && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type + '&mode_payment=' + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branch != "" && mode_payment == null) {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&consignment_type=" + consignment_type + '&branch=' + branch).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branch == null && mode_payment != "") {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&mode_payment=" + mode_payment).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branch == null && mode_payment == null) {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&mode_transport=" + mode_transport).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branch != "" && mode_payment == null) {
                tableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall&branch=" + branch).load();
                tableallexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branch == null && mode_payment == null) {
                tableallexceltableallexcel.ajax.url("ajax_request.php?action=fetch_branch_detailall").load();
                tableallexcel.ajax.reload();
            }

        });

        $('#exampleall').on('click', '.onclick_load', function() {
            var id = $(this).attr('id');
            // alert(id);
            $('#allloading_user_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "withoutbranchstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].mode_transport);
                    if (result_job.data[0].mode_transport == "") {
                        $('#allloadingstatusupdate').html('<div class="form-group row"><label class="col-form-label text-left col-lg-12">Mode of Transport <span style="color:red">*</span></label><div class="col-lg-12"><select class="form-control" name="mode_transport" id="mode_transport" onchange="ShowHideDiv()" required><option selected disabled>Select</option><option value="road">Road</option><option value="train">Train</option><option value="air">Air</option></select></div></div><div class="form-group row" id="productoptClass02" style="display:none;"><label class="col-form-label text-left col-lg-12">Lorry No </label><div class="col-lg-12"><input type="text" class="form-control" name="lorry_no" id="lorry_no" placeholder="Enter your Lorry No" /></div></div><div class="form-group row" id="productoptClass102" style="display:none;"><label class="col-form-label text-left col-lg-12">Train Type </label><div class="col-lg-12"><select class="form-control" name="train_type" id="train_type"><option selected disabled>Select</option><option value="rear">Rear</option><option value="front">Front</option></select></div><label class="col-form-label text-left col-lg-12">RR No </label><div class="col-lg-12"><input type="text" class="form-control" name="RR_No" id="RR_No" placeholder="Enter your Lorry No" /></div><label class="col-form-label text-left col-lg-12">Train No </label><div class="col-lg-12"><input type="text" class="form-control" name="train_No" id="train_No" placeholder="Enter your Train No" /></div></div><div class="form-group row" id="productoptClass202" style="display:none;"><label class="col-form-label text-left col-lg-12">Flight No </label><div class="col-lg-12"><input type="text" class="form-control" name="flight_no" id="flight_no" placeholder="Enter your Flight No" /></div></div>');
                    } else {
                        $('#allloadingstatusupdate').html('<div class="form-group row"><input type="hidden" name="id" value="' + result_job.data[0].id + '"><label class="col-lg-6"><B>Mode of Transport</b> </label><div class="col-lg-6">' + result_job.data[0].mode_transport + '</div></div><div class="form-group row"><label class="col-lg-6">Lorry No </label> <div class="col-lg-6">' + result_job.data[0].lorry_no + '</div></div><div class="form-group row"> <label class="col-lg-6 col-sm-12">Train Type </label><div class="col-lg-6 col-md-6 col-sm-12"> ' + result_job.data[0].train_type + '</div><br><br><label class="col-lg-6 col-sm-12">RR No </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].RR_No + '</div><br><br><label class="col-lg-6 col-sm-12">Train No </label><div class="col-lg-6 col-md-6 col-sm-12"> ' + result_job.data[0].train_No + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Flight No </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].flight_no + '</div></div>');
                    }
                }
            });
        });

        $('#exampleall').on('click', '.alldelivery_userstatus', function() {
            var id = $(this).attr('id');
            // alert(id);
            $('#delivery_user_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "alldeliverystatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].delivery_status)
                    if (result_job.data[0].delivery_status !== "") {
                        $('#alldeliverystatusupdate').html('<div class="row"><label class="col-lg-6 col-sm-12"><B>Delivery Status </B></label><div class="col-lg-6 col-md-6 col-sm-12" id="demobox">' + result_job.data[i].delivery_status + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12"><B>Date </B></label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[i].date + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12"><B>Time </B></label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[i].time + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12"><B>Remarks </b></label><div class="col-lg-6 col-md-6 col-sm-12"> ' + result_job.data[i].remarks + '</div></div>');
                    } else {
                        $('#alldeliverystatusupdate').html('<div class="row"><div class="col-lg-12"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Delivery</h3></div><div class="card-body"><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Delivery Status <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><select class="form-control" name="delivery_status" id="delivery_status" required=""><option selected="" disabled="">Select</option><option value="delivered">Delivered</option><option value="returned">Returned</option></select></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Date <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="date" class="form-control" name="date" id="date" placeholder="Enter your Date" required=""></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Time <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="time" class="form-control" name="time" id="time" placeholder="Enter Contact No" required=""></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Remarks </label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="remarks" id="remarks" placeholder="Enter your Remark"></div></div></div><div class="card-footer"><div class="row"><div class="col-lg-8"></div><div class="col-lg-4"><button type="submit" class="btn btn-primary font-weight-bold mr-2" name="register11" id="submit">Submit</button></div></div></div></div></div></div>');
                    }
                }
            });
        });

        $('#exampleall').on('click', '.allpayment_userstatus', function() {
            var id = $(this).attr('id');
            // alert(id);
            $('#allpayment_userstatus_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "allpaymentstatus",
                    "id": id
                },
                success: function(result_job) {
                    if (result_job.data[0].balance == "") {
                        $('#allpaymentstatusupdate').html('<div class="row"><div class="col-lg-12"><input type="hidden" name="lr_no" value="' + result_job.data[0].lr_no + '"><input type="hidden" name="from_name" value="' + result_job.data[0].from_name + '"><input type="hidden" name="lr_no" value="' + result_job.data[0].lr_no + '"><input type="hidden" name="already_paid" value="' + result_job.data[0].already_paid + '"><input type="hidden" name="paybalanceadd" value="' + result_job.data[0].paybalanceadd + '"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Payment</h3><h1 class="card-title" style="color:green">Total: ' + result_job.data[0].total + ' </h1></div><input type="hidden"  name="total" value="' + result_job.data[0].total + '"><input type="hidden"  name="balance" value="' + result_job.data[0].balance + '"><div class="card-body"><div class="form-group row"><h6 class="col-lg-8 col-md-8 col-sm-12"></h6><h6 class="col-lg-4 col-md-4 col-sm-12" style="color:green">Balance: ' + result_job.data[0].balance + ' </h6></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Mode of Payment <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><select class="form-control" name="mode_payment" id="mode_payment" required><option selected disabled>Select</option><option value="cash">Cash</option><option value="cheque">Cheque</option><option value="upi">UPI</option><option value="neft">NEFT</option><option value="rtgs">RTGS</option></select></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Amount Paid <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="amount_paid" id="amount_paid" placeholder="Enter your Amount Paid" required /></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Remarks <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="payment_remarks" id="payment_remarks" placeholder="Enter your Remark" /></div></div><div class="form-group row"></div></div><div class="card-footer"><div class="row"><div class="col-lg-8"></div><div class="col-lg-4"><button type="submit" class="btn btn-primary font-weight-bold mr-2" name="paymentsubmit" id="paymentsubmit">Submit</button></div></div></div></div>');
                    } else if (result_job.data[0].balance == "0") {
                        $('#allpaymentstatusupdate').html('<div class="col-lg-12"><input type="hidden" name="lr_no" value="' + result_job.data[0].lr_no + '"><input type="hidden" name="from_name" value="' + result_job.data[0].from_name + '"><input type="hidden" name="lr_no" value="' + result_job.data[0].lr_no + '"><input type="hidden" name="already_paid" value="' + result_job.data[0].already_paid + '"><input type="hidden" name="paybalanceadd" value="' + result_job.data[0].paybalanceadd + '"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Payment Details</h3></div><div class="card-body"><div class="form-group row"><label class="col-lg-6 col-sm-12">Mode Payment </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].mode_payment + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Amount Paid </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].amount_paid + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Payment Remarks </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].payment_remarks + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Balance</label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].balance + '</div></div></div></div></div></div>');
                    } else {
                        $('#allpaymentstatusupdate').html('<div class="row"><input type="hidden" name="lr_no" value="' + result_job.data[0].lr_no + '"><input type="hidden" name="from_name" value="' + result_job.data[0].from_name + '"><input type="hidden" name="lr_no" value="' + result_job.data[0].lr_no + '"><input type="hidden" name="already_paid" value="' + result_job.data[0].already_paid + '"><input type="hidden" name="paybalanceadd" value="' + result_job.data[0].paybalanceadd + '"><div class="col-lg-12"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Payment</h3><h1 class="card-title" style="color:green">Total: ' + result_job.data[0].total + ' </h1></div><input type="hidden"  name="total" value="' + result_job.data[0].total + '"><input type="hidden"  name="balance" value="' + result_job.data[0].balance + '"><div class="card-body"><div class="form-group row"><h6 class="col-lg-8 col-md-8 col-sm-12"></h6><h6 class="col-lg-4 col-md-4 col-sm-12" style="color:green">Balance: ' + result_job.data[0].balance + ' </h6></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Mode of Payment <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><select class="form-control" name="mode_payment" id="mode_payment" required><option selected disabled>Select</option><option value="cash">Cash</option><option value="cheque">Cheque</option><option value="upi">UPI</option><option value="neft">NEFT</option><option value="rtgs">RTGS</option></select></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Amount Paid <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="amount_paid" id="amount_paid" placeholder="Enter your Amount Paid" required /></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Remarks <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="payment_remarks" id="payment_remarks" placeholder="Enter your Remark" /></div></div><div class="form-group row"></div></div><div class="card-footer"><div class="row"><div class="col-lg-8"></div><div class="col-lg-4"><button type="submit" class="btn btn-primary font-weight-bold mr-2" name="paymentsubmit" id="paymentsubmit">Submit</button></div></div></div></div></div><br><br><div class="col-lg-12"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Payment Details</h3></div><div class="card-body"><div class="form-group row"><label class="col-lg-6 col-sm-12">Mode Payment </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].mode_payment + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Amount Paid </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].amount_paid + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Payment Remarks </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].payment_remarks + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Balance</label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].balance + '</div></div></div></div></div></div>');
                    }
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#no_stop").on("change", function() {
            //alert(len)
            $("#emi_list_disp").html("");
            $("#emi_list_disp").append('<table><tr><th></th></tr>');
            var len = $(this).val();
            if (len == 1) {
                $("#emi_list_disp").append('<tr><td><input type="text" name="repayment' + len + '" class="form-control repayment" placeholder="Enter Desination"/></td><td><input type="datetime-local" name="advance_date' + len + '" class="form-control" /></td> <td><a href="lrdatatable.php" onclick="myFunction()" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a></td>   </tr>');
            } else {
                var rows = len;
                for (var i = 0; i < rows; i++) {
                    $("#emi_list_disp").append('<tr><td><input type="text" name="repayment' + i + '" class="form-control repayment" placeholder="Enter Desination"/></td><td><input type="datetime-local" name="advance_date' + i + '" class="form-control" /><input type="hidden" name="balance_amount" id="repayment1' + len + '" readonly class="form-control" /></td> <td><a href="lrdatatable.php" onclick="myFunction()" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a></td>   </tr>');
                }
                // $("#emi_list_disp").append('<tr><td><input type="text" name="repayment'+len+'" id="repayment'+len+'" readonly class="form-control" /><input type="hidden" name="balance_amount" id="repayment1'+len+'" readonly class="form-control" /></td><td><input type="date" name="advance_date" id="repayment1'+len+'" class="form-control"></td></tr>');
            }
            $("#emi_list_disp").append('</table>')

            $(".repayment").on("change", function() {
                var no_stop = $("#no_stop").val();
                var advance_amount = $("#advance_amount").val();
                var installment_amount_result = 0;
                $(".repayment").each(function() {
                    if ($(this).val() != "") {
                        installment_amount_result += parseInt($(this).val());
                    }
                });
                var result = (advance_amount - installment_amount_result);
                $("#repayment" + no_stop).val(result);
                $("#repayment1" + no_stop).val(result);
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#exampleall').on('click', '.createuser', function() {
            var id = $(this).attr('id');
            alert(id)
            $('#create_user_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "trackingbranchstatus",
                    "id": id
                },
                success: function(result_job) {
                    if (result_job.data[0].id !== "") {
                        $('#alltrackingstatusupdate').html(' <div class="form-group row"><label class="col-form-label text-right col-lg-3 col-sm-12">No of Stop <span style="color:red">*</span></label><div class="col-lg-9 col-md-9 col-sm-12"><select class="form-control" aria-label="Default select example" id="no_stop" name="no_stop" onchange = "ShowHideDiv1()"required><option>Select</option><option value="N"><?php $i = 1;
                                                                                                                                                                                                                                                                                                                                                                                                                            while ($i <= 100) {
                                                                                                                                                                                                                                                                                                                                                                                                                                echo '<option>' . $i . '</option>';
                                                                                                                                                                                                                                                                                                                                                                                                                                $i++;
                                                                                                                                                                                                                                                                                                                                                                                                                            } ?> </option></select></div></div> <div class="row mb-3"><div id="emi_list_disp" style="display: none"></div></div>');
                    }
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#exampleall').on('click', '.all_delivery_tracking', function() {
            var id = $(this).attr('id');
            alert(id);
            $.ajax({
                url: "ajax_request.php?action=fetch_location_all&id=" + id,
                type: "POST",
                dataType: "json",

                success: function(result_job) {
                    $('#track_location').html('');
                    if (result_job.status == 1) {
                        var length = result_job.data.length;
                        var d = new Date();
                        var curr_date = d.getDate();
                        var curr_month = d.getMonth() + 1;

                        if (curr_month.toString.length == 1 && curr_date.toString.length == 1) {
                            var current_date = d.getFullYear() + "-0" + (d.getMonth() + 1) + "-0" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
                        } else {
                            var current_date = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
                        }

                        for (var i = 0; i < length; i++) {

                            if (current_date > result_job.data[i].repayment_date) {
                                $('#track_location').append('<div class="order-tracking completed"><span class="is-complete"></span><p class="word-position">' + result_job.data[i].repayment + '</p><h6 class="word-position">Arrived on ' + result_job.data[i].repayment_date + '</h6><p class="trackpos"></p></div>');
                            } else {
                                $('#track_location').append('<div class="order-tracking "><span class="is-complete"><svg xmlns="http://www.w3.org/2000/svg" class="demo" width="2em" height="2em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="white" d="M7.005 3.1a1 1 0 1 1 1.99 0l-.388 6.35a.61.61 0 0 1-1.214 0L7.005 3.1ZM7 12a1 1 0 1 1 2 0a1 1 0 0 1-2 0Z"/></svg></span><p class="word-position">' + result_job.data[i].repayment + '</p><h6 class="word-position">Estimate Time Arrived on ' + result_job.data[i].repayment_date + '</h6><p class="trackpos"><br></p></div>');
                            }
                        }
                    }
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        var tablealluser = $('#examplealluser').DataTable({
            "processing": true,
            "responsive": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "from_name"
                },
                {
                    "data": "lr_no"
                },
                {
                    "data": "createdAt"
                },
                {
                    "data": "branch"
                },
                {
                    "data": "consignment_type"
                },
                {
                    "data": "mode_transport"
                },
                {
                    "data": "delivery_status"
                },
                {
                    "data": "balance"
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
                        return '<a href="lrform_detail.php?id=' + row.id + '">' + row.from_name + '</a>';
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, row) {
                        return row.lr_no;
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {

                        return row.createdAt;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {
                        return row.branch;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, row) {
                        return row.consignment_type;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        if (row.mode_transport == '') {
                            return '<span class="btn btn-sm btn-light-danger font-weight-bolder">Unloaded</span>';
                        } else {
                            return '<span class="btn btn-sm btn-light-primary font-weight-bolder">Loaded</span>';
                        }
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        if (row.delivery_status == 'delivered') {
                            return '<span class="btn btn-sm btn-light-primary font-weight-bolder">Delivered</span>';
                        } else {
                            return '<span class="btn btn-sm btn-light-danger font-weight-bolder">Undelivered</span>';
                        }
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, row) {
                        if (row.consignment_type == "paid" || row.balance == 0) {
                            return '<span class="btn btn-sm btn-light-primary font-weight-bolder">Paid</span>';
                        } else {
                            return '<span class="btn btn-sm btn-light-danger font-weight-bolder">Unpaid</span>';
                        }
                    }
                },
                {
                    targets: 9,
                    render: function(data, type, row) {
                        return '<a href="lrdatatable.php?id=' + row.id + '" id="' + row.id + '" class="createuser btn btn-sm btn-clean btn-icon mr-2 " title="Tracking" data-toggle="modal" data-target="#create_user"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" \ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " /><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" /></g></svg></span></a><a href="lrdatatable.php?id=' + row.id + '" id="' + row.id + '" class="all_delivery_tracking btn btn-sm btn-clean btn-icon" title="View Tracking Location" data-toggle="modal" data-target="#create_user_modal"><i class="fa fa-map-marker"></i></a><div class="dropdown dropdown-inline"><a href="#" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"></path></g></svg></span></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi flex-column navi-hover py-2"><li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2"></li><li class="navi-item"><a href="#" id="' + row.id + '" class="navi-link onclick_load" data-toggle="modal" data-target="#alllocation_user"><i class="fa fa-spinner"></i>&ensp;Loading</a></li><li class="navi-item"><a href="lrdatatable.php?id=' + row.id + '" id="' + row.id + '" class="navi-link alldelivery_userstatus" data-toggle="modal" data-target="#alldeliverys_userphp"><input type="hidden" name="id" value=' + row.id + '><i class="fa fa-truck"></i>&ensp;Delivery</span></a></li><li class="navi-item"><a href="lrdatatable.php?id=' + row.id + '" id="' + row.id + '" class="navi-link allpayment_userstatus" data-toggle="modal" data-target="#allpayment_userphp"><i class="fa fa-credit-card"></i>&ensp;Payment</a></li></ul></div></div>';
                    }
                }
            ]
        });

        $("#filteralluser").on("click", function() {
            var from = $("#fromdatealluser").val();
            var to = $("#todatealluser").val();
            var consignment_type = $("#consignment_typealluser").val();
            var mode_transport = $("#mode_transportalluser").val();
            var branchuser = $("#branchalluser").val();
            var mode_payment = $("#mode_paymentalluser").val();

            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branchuser == null && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type).load();
                tablealluser.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branchuser != "" && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport + '&branchuser=' + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branchuser != "" && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport + '&branchuser=' + branchuser).load();
                tablealluser.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branchuser == null && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport + '&mode_payment=' + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branchuser != "" && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&branchuser=' + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branchuser != "" && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport + '&branchuser=' + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branchuser == null && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport).load();
                tablealluser.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branchuser != "" && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&branchuser=' + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branchuser == null && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport + '&mode_payment=' + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branchuser != "" && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport + '&branchuser=' + branchuser).load();
                tablealluser.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branchuser == null && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_payment=' + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branchuser != "" && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&branchuser=' + branchuser).load();
                tablealluser.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branchuser == null && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&mode_payment=' + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branchuser == null && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport).load();
                tablealluser.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branchuser != "" && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&branchuser=' + branchuser).load();
                tablealluser.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branchuser == null && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branchuser == null && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branchuser != "" && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport + '&branchuser=' + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branchuser != "" && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport + '&branchuser=' + branchuser).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branchuser == null && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport + '&mode_payment=' + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branchuser != "" && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type + '&branchuser=' + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branchuser != "" && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&mode_transport=" + mode_transport + '&branchuser=' + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branchuser == null && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branchuser != "" && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&branchuser=" + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branchuser == null && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&mode_transport=" + mode_transport + '&mode_payment=' + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branchuser != "" && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&mode_transport=" + mode_transport + '&branchuser=' + branchuser).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branchuser == null && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type + '&mode_payment=' + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branchuser != "" && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type + '&branchuser=' + branchuser).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branchuser == null && mode_payment != "") {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&mode_payment=" + mode_payment).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branchuser == null && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&mode_transport=" + mode_transport).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branchuser != "" && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&branchuser=" + branchuser).load();
                tablealluser.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branchuser == null && mode_payment == null) {
                tablealluser.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>").load();
                tablealluser.ajax.reload();
            }

        });

        var tablealluserexcel = $('#exampleallexceluser').css("display", "none").DataTable({
            "processing": true,
            "responsive": true,
            "bFilter": false,
            "bPaginate": false,
            "type": 'excel',
            "escape": 'false',
            "ignoreColumn": [1],
            "bold": true,
            "ajax": {
                "url": "ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&branch=<?= $branch ?>&&username=<?= $username ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "si_no"
                },
                {
                    "data": "createdAt"
                },
                {
                    "data": "customer_type"
                },
                {
                    "data": "booking_type"
                },
                {
                    "data": "lr_no"
                },
                {
                    "data": "consignment_type"
                },
                {
                    "data": "invoice_type"
                },
                {
                    "data": "internal_info"
                },
                {
                    "data": "eway_bill"
                },
                {
                    "data": "material_name"
                },
                {
                    "data": "quantity_kg"
                },
                {
                    "data": "quantity_nos"
                },
                {
                    "data": "rate"
                },
                {
                    "data": "docket_charge"
                },
                {
                    "data": "agent_commission"
                },
                {
                    "data": "gstamount"
                },
                {
                    "data": "from_name"
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
                    "data": "agent_name"
                },
                {
                    "data": "agent_contact"
                },
                {
                    "data": "agent_city"
                },
                {
                    "data": "delivery_message"
                },
                {
                    "data": "total"
                },
                {
                    "data": "balanceadd"
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
                        return row.createdAt;
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, row) {
                        return row.customer_type;
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {

                        return row.booking_type;
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
                        return row.consignment_type;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return row.invoice_type;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return row.internal_info;
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, row) {
                        return row.eway_bill;
                    }
                },
                {
                    targets: 9,
                    render: function(data, type, row) {
                        return row.material_name;
                    }
                }, {
                    targets: 10,
                    render: function(data, type, row) {
                        return row.quantity_kg;
                    }
                },
                {
                    targets: 11,
                    render: function(data, type, row) {
                        return row.quantity_nos;
                    }
                },
                {
                    targets: 12,
                    render: function(data, type, row) {
                        return row.rate;
                    }
                },
                {
                    targets: 13,
                    render: function(data, type, row) {

                        return row.docket_charge;
                    }
                },
                {
                    targets: 14,
                    render: function(data, type, row) {
                        return row.agent_commission;
                    }
                },
                {
                    targets: 15,
                    render: function(data, type, row) {
                        return row.gstamount;
                    }
                },
                {
                    targets: 16,
                    render: function(data, type, row) {
                        return row.from_name;
                    }
                },
                {
                    targets: 17,
                    render: function(data, type, row) {
                        return row.from_address;
                    }
                },
                {
                    targets: 18,
                    render: function(data, type, row) {
                        return row.from_contact;
                    }
                },
                {
                    targets: 19,
                    render: function(data, type, row) {
                        return row.to_name;

                    }
                },
                {
                    targets: 20,
                    render: function(data, type, row) {
                        return row.to_address;
                    }
                },
                {
                    targets: 21,
                    render: function(data, type, row) {
                        return row.to_contact;
                    }
                },
                {
                    targets: 22,
                    render: function(data, type, row) {
                        return row.agent_name;
                    }
                },
                {
                    targets: 23,
                    render: function(data, type, row) {

                        return row.agent_contact;
                    }
                },
                {
                    targets: 24,
                    render: function(data, type, row) {
                        return row.agent_city;
                    }
                },
                {
                    targets: 25,
                    render: function(data, type, row) {
                        return row.delivery_message;
                    }
                },
                {
                    targets: 26,
                    render: function(data, type, row) {
                        return row.total;
                    }
                },
                {
                    targets: 27,
                    render: function(data, type, row) {
                        return row.balanceadd;
                    }
                },
                {
                    targets: 28,
                    render: function(data, type, row) {
                        return row.total - row.balanceadd;
                    }
                }
            ]
        });

        $("#filteralluser").on("click", function() {
            var from = $("#fromdatealluser").val();
            var to = $("#todatealluser").val();
            var consignment_type = $("#consignment_typealluser").val();
            var mode_transport = $("#mode_transportalluser").val();
            var branchuser = $("#branchalluser").val();
            var mode_payment = $("#mode_paymentalluser").val();

            $.ajax({
                url: 'ajax_request.php?action=fetch_branch_detailall_billuser&branch=<?= $branch ?>&&username=<?= $username ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    'from': from,
                    'to': to,
                    'consignment_type': consignment_type,
                    'mode_transport': mode_transport,
                    'branchuser': branchuser,
                    'mode_payment': mode_payment
                },
                success: function(result_job) {
                    $('#total').html(result_job.data.total);
                    $('#amount_paid').html(result_job.data.balanceadd);
                    $('#balance').html(result_job.data.total - result_job.data.balanceadd);
                }
            });

            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branchuser != "" && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport + '&branchuser=' + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branchuser != "" && mode_payment == null) {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport + '&branchuser=' + branchuser).load();
                tablealluserexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branchuser == null && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport + '&mode_payment=' + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branchuser != "" && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&branchuser=' + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branchuser != "" && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport + '&branchuser=' + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branchuser == null && mode_payment == null) {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type).load();
                tablealluserexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport != "" && branchuser == null && mode_payment == null) {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_transport=' + mode_transport).load();
                tablealluserexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branchuser != "" && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&branchuser=' + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branchuser == null && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport + '&mode_payment=' + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branchuser != "" && mode_payment == null) {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport + '&branchuser=' + branchuser).load();
                tablealluserexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branchuser == null && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&mode_payment=' + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type != "" && mode_transport == null && branchuser != "" && mode_payment == null) {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&consignment_type=' + consignment_type + '&branchuser=' + branchuser).load();
                tablealluserexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branchuser == null && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&mode_payment=' + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport != "" && branchuser == null && mode_payment == null) {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport).load();
                tablealluserexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branchuser != "" && mode_payment == null) {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&branchuser=' + branchuser).load();
                tablealluserexcel.ajax.reload();
            }
            if (from != "" && to != "" && consignment_type == null && mode_transport == null && branchuser == null && mode_payment == null) {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branchuser != "" && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport + '&branchuser=' + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branchuser != "" && mode_payment == null) {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport + '&branchuser=' + branchuser).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branchuser == null && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport + '&mode_payment=' + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branchuser != "" && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type + '&branchuser=' + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branchuser != "" && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&from=" + from + '&to=' + to + '&mode_transport=' + mode_transport + '&branchuser=' + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branchuser == null && mode_payment == null) {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport != "" && branchuser == null && mode_payment == null) {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type + '&mode_transport=' + mode_transport).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branchuser != "" && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&branchuser=" + branchuser + '&mode_payment=' + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branchuser == null && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&mode_transport=" + mode_transport + '&mode_payment=' + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branchuser != "" && mode_payment == null) {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&mode_transport=" + mode_transport + '&branchuser=' + branchuser).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branchuser == null && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type + '&mode_payment=' + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type != "" && mode_transport == null && branchuser != "" && mode_payment == null) {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&consignment_type=" + consignment_type + '&branchuser=' + branchuser).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branchuser == null && mode_payment != "") {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&mode_payment=" + mode_payment).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport != "" && branchuser == null && mode_payment == null) {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&mode_transport=" + mode_transport).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branchuser != "" && mode_payment == null) {
                tablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>&branchuser=" + branchuser).load();
                tablealluserexcel.ajax.reload();
            }
            if (from == "" && to == "" && consignment_type == null && mode_transport == null && branchuser == null && mode_payment == null) {
                tablealluserexceltablealluserexcel.ajax.url("ajax_request.php?action=fetch_branch_detailalluser&branch=<?= $branch ?>&&username=<?= $username ?>").load();
                tablealluserexcel.ajax.reload();
            }

        });

        $('#examplealluser').on('click', '.onclick_load', function() {
            var id = $(this).attr('id');
            // alert(id);
            $('#allloading_user_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "withoutbranchstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].mode_transport);
                    if (result_job.data[0].mode_transport == "") {
                        $('#allloadingstatusupdate').html('<div class="form-group row"><label class="col-form-label text-left col-lg-12">Mode of Transport <span style="color:red">*</span></label><div class="col-lg-12"><select class="form-control" name="mode_transport" id="mode_transport" onchange="ShowHideDiv()" required><option selected disabled>Select</option><option value="road">Road</option><option value="train">Train</option><option value="air">Air</option></select></div></div><div class="form-group row" id="productoptClass02" style="display:none;"><label class="col-form-label text-left col-lg-12">Lorry No </label><div class="col-lg-12"><input type="text" class="form-control" name="lorry_no" id="lorry_no" placeholder="Enter your Lorry No" /></div></div><div class="form-group row" id="productoptClass102" style="display:none;"><label class="col-form-label text-left col-lg-12">Train Type </label><div class="col-lg-12"><select class="form-control" name="train_type" id="train_type"><option selected disabled>Select</option><option value="rear">Rear</option><option value="front">Front</option></select></div><label class="col-form-label text-left col-lg-12">RR No </label><div class="col-lg-12"><input type="text" class="form-control" name="RR_No" id="RR_No" placeholder="Enter your Lorry No" /></div><label class="col-form-label text-left col-lg-12">Train No </label><div class="col-lg-12"><input type="text" class="form-control" name="train_No" id="train_No" placeholder="Enter your Train No" /></div></div><div class="form-group row" id="productoptClass202" style="display:none;"><label class="col-form-label text-left col-lg-12">Flight No </label><div class="col-lg-12"><input type="text" class="form-control" name="flight_no" id="flight_no" placeholder="Enter your Flight No" /></div></div>');
                    } else {
                        $('#allloadingstatusupdate').html('<div class="form-group row"><input type="hidden" name="id" value="' + result_job.data[0].id + '"><label class="col-lg-6"><B>Mode of Transport</b> </label><div class="col-lg-6">' + result_job.data[0].mode_transport + '</div></div><div class="form-group row"><label class="col-lg-6">Lorry No </label> <div class="col-lg-6">' + result_job.data[0].lorry_no + '</div></div><div class="form-group row"> <label class="col-lg-6 col-sm-12">Train Type </label><div class="col-lg-6 col-md-6 col-sm-12"> ' + result_job.data[0].train_type + '</div><br><br><label class="col-lg-6 col-sm-12">RR No </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].RR_No + '</div><br><br><label class="col-lg-6 col-sm-12">Train No </label><div class="col-lg-6 col-md-6 col-sm-12"> ' + result_job.data[0].train_No + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Flight No </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].flight_no + '</div></div>');
                    }
                }
            });
        });

        $('#examplealluser').on('click', '.alldelivery_userstatus', function() {
            var id = $(this).attr('id');
            // alert(id);
            $('#delivery_user_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "alldeliverystatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].delivery_status)
                    if (result_job.data[0].delivery_status !== "") {
                        $('#alldeliverystatusupdate').html('<div class="row"><label class="col-lg-6 col-sm-12"><B>Delivery Status </B></label><div class="col-lg-6 col-md-6 col-sm-12" id="demobox">' + result_job.data[i].delivery_status + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12"><B>Date </B></label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[i].date + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12"><B>Time </B></label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[i].time + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12"><B>Remarks </b></label><div class="col-lg-6 col-md-6 col-sm-12"> ' + result_job.data[i].remarks + '</div></div>');
                    } else {
                        $('#alldeliverystatusupdate').html('<div class="row"><div class="col-lg-12"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Delivery</h3></div><div class="card-body"><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Delivery Status <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><select class="form-control" name="delivery_status" id="delivery_status" required=""><option selected="" disabled="">Select</option><option value="delivered">Delivered</option><option value="returned">Returned</option></select></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Date <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="date" class="form-control" name="date" id="date" placeholder="Enter your Date" required=""></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Time <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="time" class="form-control" name="time" id="time" placeholder="Enter Contact No" required=""></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Remarks </label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="remarks" id="remarks" placeholder="Enter your Remark"></div></div></div><div class="card-footer"><div class="row"><div class="col-lg-8"></div><div class="col-lg-4"><button type="submit" class="btn btn-primary font-weight-bold mr-2" name="register11" id="submit">Submit</button></div></div></div></div></div></div>');
                    }
                }
            });
        });

        $('#examplealluser').on('click', '.allpayment_userstatus', function() {
            var id = $(this).attr('id');
            // alert(id);
            $('#allpayment_userstatus_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "allpaymentstatus",
                    "id": id
                },
                success: function(result_job) {
                    if (result_job.data[0].balance == "") {
                        $('#allpaymentstatusupdate').html('<div class="row"><div class="col-lg-12"><input type="hidden" name="lr_no" value="' + result_job.data[0].lr_no + '"><input type="hidden" name="from_name" value="' + result_job.data[0].from_name + '"><input type="hidden" name="lr_no" value="' + result_job.data[0].lr_no + '"><input type="hidden" name="already_paid" value="' + result_job.data[0].already_paid + '"><input type="hidden" name="paybalanceadd" value="' + result_job.data[0].paybalanceadd + '"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Payment</h3><h1 class="card-title" style="color:green">Total: ' + result_job.data[0].total + ' </h1></div><input type="hidden"  name="total" value="' + result_job.data[0].total + '"><input type="hidden"  name="balance" value="' + result_job.data[0].balance + '"><div class="card-body"><div class="form-group row"><h6 class="col-lg-8 col-md-8 col-sm-12"></h6><h6 class="col-lg-4 col-md-4 col-sm-12" style="color:green">Balance: ' + result_job.data[0].balance + ' </h6></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Mode of Payment <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><select class="form-control" name="mode_payment" id="mode_payment" required><option selected disabled>Select</option><option value="cash">Cash</option><option value="cheque">Cheque</option><option value="upi">UPI</option><option value="neft">NEFT</option><option value="rtgs">RTGS</option></select></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Amount Paid <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="amount_paid" id="amount_paid" placeholder="Enter your Amount Paid" required /></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Remarks <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="payment_remarks" id="payment_remarks" placeholder="Enter your Remark" /></div></div><div class="form-group row"></div></div><div class="card-footer"><div class="row"><div class="col-lg-8"></div><div class="col-lg-4"><button type="submit" class="btn btn-primary font-weight-bold mr-2" name="paymentsubmit" id="paymentsubmit">Submit</button></div></div></div></div>');
                    } else if (result_job.data[0].balance == "0") {
                        $('#allpaymentstatusupdate').html('<div class="col-lg-12"><input type="hidden" name="lr_no" value="' + result_job.data[0].lr_no + '"><input type="hidden" name="from_name" value="' + result_job.data[0].from_name + '"><input type="hidden" name="lr_no" value="' + result_job.data[0].lr_no + '"><input type="hidden" name="already_paid" value="' + result_job.data[0].already_paid + '"><input type="hidden" name="paybalanceadd" value="' + result_job.data[0].paybalanceadd + '"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Payment Details</h3></div><div class="card-body"><div class="form-group row"><label class="col-lg-6 col-sm-12">Mode Payment </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].mode_payment + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Amount Paid </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].amount_paid + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Payment Remarks </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].payment_remarks + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Balance</label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].balance + '</div></div></div></div></div></div>');
                    } else {
                        $('#allpaymentstatusupdate').html('<div class="row"><input type="hidden" name="lr_no" value="' + result_job.data[0].lr_no + '"><input type="hidden" name="from_name" value="' + result_job.data[0].from_name + '"><input type="hidden" name="lr_no" value="' + result_job.data[0].lr_no + '"><input type="hidden" name="already_paid" value="' + result_job.data[0].already_paid + '"><input type="hidden" name="paybalanceadd" value="' + result_job.data[0].paybalanceadd + '"><div class="col-lg-12"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Payment</h3><h1 class="card-title" style="color:green">Total: ' + result_job.data[0].total + ' </h1></div><input type="hidden"  name="total" value="' + result_job.data[0].total + '"><input type="hidden"  name="balance" value="' + result_job.data[0].balance + '"><div class="card-body"><div class="form-group row"><h6 class="col-lg-8 col-md-8 col-sm-12"></h6><h6 class="col-lg-4 col-md-4 col-sm-12" style="color:green">Balance: ' + result_job.data[0].balance + ' </h6></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Mode of Payment <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><select class="form-control" name="mode_payment" id="mode_payment" required><option selected disabled>Select</option><option value="cash">Cash</option><option value="cheque">Cheque</option><option value="upi">UPI</option><option value="neft">NEFT</option><option value="rtgs">RTGS</option></select></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Amount Paid <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="amount_paid" id="amount_paid" placeholder="Enter your Amount Paid" required /></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Remarks <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="payment_remarks" id="payment_remarks" placeholder="Enter your Remark" /></div></div><div class="form-group row"></div></div><div class="card-footer"><div class="row"><div class="col-lg-8"></div><div class="col-lg-4"><button type="submit" class="btn btn-primary font-weight-bold mr-2" name="paymentsubmit" id="paymentsubmit">Submit</button></div></div></div></div></div><br><br><div class="col-lg-12"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Payment Details</h3></div><div class="card-body"><div class="form-group row"><label class="col-lg-6 col-sm-12">Mode Payment </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].mode_payment + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Amount Paid </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].amount_paid + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Payment Remarks </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].payment_remarks + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Balance</label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].balance + '</div></div></div></div></div></div>');
                    }
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#examplealluser').on('click', '.createuser', function() {
            var id = $(this).attr('id');
            // alert(id)
            $('#create_user_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "trackingbranchstatus",
                    "id": id
                },
                success: function(result_job) {
                    if (result_job.data[0].id !== "") {
                        $('#alltrackingstatusupdate').html(' <div class="form-group row"><label class="col-form-label text-right col-lg-3 col-sm-12">No of Stop <span style="color:red">*</span></label><div class="col-lg-9 col-md-9 col-sm-12"><select class="form-control" aria-label="Default select example" id="no_stop" name="no_stop" onchange = "ShowHideDiv1()"required><option>Select</option><option value="N"><?php $i = 1;
                                                                                                                                                                                                                                                                                                                                                                                                                            //                                                                                                                                                                                                                                                                                                                                                                                                                             while ($i <= 100) {
                                                                                                                                                                                                                                                                                                                                                                                                                            //                                                                                                                                                                                                                                                                                                                                                                                                                                 echo '<option>' . $i . '</option>';
                                                                                                                                                                                                                                                                                                                                                                                                                            //                                                                                                                                                                                                                                                                                                                                                                                                                                 $i++;
                                                                                                                                                                                                                                                                                                                                                                                                                            //                                                                                                                                                                                                                                                                                                                                                                                                                             } 
                                                                                                                                                                                                                                                                                                                                                                                                                            ?> </option></select></div></div> <div class="row mb-3"><div id="emi_list_disp" style="display: none"></div></div>');
                    }
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#examplealluser').on('click', '.all_delivery_tracking', function() {
            var id = $(this).attr('id');
            // alert(id);
            $.ajax({
                url: "ajax_request.php?action=fetch_location_all&id=" + id,
                type: "POST",
                dataType: "json",

                success: function(result_job) {
                    $('#track_location').html('');
                    if (result_job.status == 1) {
                        var length = result_job.data.length;
                        var d = new Date();
                        var curr_date = d.getDate();
                        var curr_month = d.getMonth() + 1;

                        if (curr_month.toString.length == 1 && curr_date.toString.length == 1) {
                            var current_date = d.getFullYear() + "-0" + (d.getMonth() + 1) + "-0" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
                        } else {
                            var current_date = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
                        }

                        for (var i = 0; i < length; i++) {

                            if (current_date > result_job.data[i].repayment_date) {
                                $('#track_location').append('<div class="order-tracking completed"><span class="is-complete"></span><p class="word-position">' + result_job.data[i].repayment + '</p><h6 class="word-position">Arrived on ' + result_job.data[i].repayment_date + '</h6><p class="trackpos"></p></div>');
                            } else {
                                $('#track_location').append('<div class="order-tracking "><span class="is-complete"><svg xmlns="http://www.w3.org/2000/svg" class="demo" width="2em" height="2em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="white" d="M7.005 3.1a1 1 0 1 1 1.99 0l-.388 6.35a.61.61 0 0 1-1.214 0L7.005 3.1ZM7 12a1 1 0 1 1 2 0a1 1 0 0 1-2 0Z"/></svg></span><p class="word-position">' + result_job.data[i].repayment + '</p><h6 class="word-position">Estimate Time Arrived on ' + result_job.data[i].repayment_date + '</h6><p class="trackpos"><br></p></div>');
                            }
                        }
                    }
                }
            });
        });
    });
</script>
<script>
    function myFunction() {
        alert("Are you want delete this entry?");
    }
</script>
<script>
    function ExportToExcel(type, fn, dl) {
        var tab = document.getElementById('exampleallexcel'); // id of table
        // alert(document.getElementById("exampleallexcel").style.font = "italic bold 20px arial,serif");
        var wb = XLSX.utils.table_to_book(tab, {
            sheet: "sheet"
        });
        return dl ?
            XLSX.write(wb, {
                bookType: type,
                bookSST: true,
                type: 'base64'
            }) : XLSX.writeFile(wb, fn || ('APS.' + (type || 'xlsx')));
    }
</script>
<script>
    function ExportToExceluser(type, fn, dl) {
        var tab = document.getElementById('exampleallexceluser'); // id of table
        var wb = XLSX.utils.table_to_book(tab, {
            sheet: "sheet"
        });
        return dl ?
            XLSX.write(wb, {
                bookType: type,
                bookSST: true,
                type: 'base64'
            }) : XLSX.writeFile(wb, fn || ('APS.' + (type || 'xlsx')));
    }
</script>
<script>
    // function fnExcelReport() {
    //     var tab_text = "<table border='2px'><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='29'><h1>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;APS CARGOS MOVERS&ensp;&ensp;&ensp;</h1></th></tr><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='29'><h4>102,WALL TEX ROAD,CHENNAI 600003</h4></th></tr><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='29'><h2>TEL NO:- 044-42012933,MOB NO:-9382587896,E-Mail:-apscargo102@gmail.com</h2></th></tr><tr style='bgcolor='#fff82a'>";
    //     var textRange;
    //     var j = 0;
    //     // a = document.createElement("a");
    //     var tab = document.getElementById(''); // id of table
    //     for (j = 0; j < tab.rows.length; j++) {
    //         tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
    //     }
    //     // tab.getRange("A").hidden("false");
    //     // tab.getRange("C:D").hidden("true");
    //     // tab.setRowColumnHeadersVisible(false);
    //     // tab.setColumnVisible(1, false);
    //     // tab_text.EntireRow.Hidden = False;
    //     tab_text = tab_text + "</table>";
    //     var ua = window.navigator.userAgent;
    //     var msie = ua.indexOf("MSIE");
    //     if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
    //         txtArea1.document.open("txt/html", "replace");
    //         txtArea1.document.write(tab_text);
    //         txtArea1.document.close();
    //         txtArea1.focus();
    //         sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
    //     } else //other browser not tested on IE 11
    //         sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
    //     return (sa);
    //     // try
    //     // {
    //     //     var blob = new Blob([tab_text], { type: "application/vnd.ms-excel" });
    //     //     window.URL = window.URL || window.webkitURL;
    //     //     link = window.URL.createObjectURL(blob);
    //     //     a = document.createElement("a");
    //     //     if (document.getElementById("")!=null) {
    //     //         a.download=document.getElementById("").innerText;
    //     //     }else
    //     //     {
    //     //         a.download = 'download';
    //     //     }
    //     //     a.href = link;
    //     //     document.body.appendChild(a);
    //     //     a.click();
    //     //     document.body.removeChild(a);
    //     // }catch(e)
    //     // {
    //     // }
    //     // return false;
    // }
</script>
<script>
    //     function fnExcelReport() {
    // 	var location = 'data:application/vnd.ms-excel;base64,';
    // 	var tab_text = "<table border='2px'><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='8'><h1>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;APS CARGOS MOVERS&ensp;&ensp;&ensp;</h1></th></tr><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='8'><h4>102,WALL TEX ROAD,CHENNAI 600003</h4></th></tr><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='8'><h2>TEL NO:- 044-42012933,MOB NO:-9382587896,E-Mail:-apscargo102@gmail.com</h2></th></tr><tr style='bgcolor='#fff82a'>";
    //     var j = 0;
    //     echo a = document.createElement("a");
    //     alert(a);
    //         tab = document.getElementById('');

    //         for (j = 0; j < tab.rows.length; j++) {
    //             tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
    //         }
    //         a.tab_text = tab_text + "</table>";
    // // 	var excelTemplate = '<html> ' +
    // // 		'<head> ' +
    // // 		'<meta http-equiv="content-type" content="text/plain; charset=UTF-8"/> ' +
    // // 		'</head> ' +
    // // 		'<body> ' +
    // // 		document.getElementById("").innerHTML +
    // // 		'</body> ' +
    // // 		'</html>'
    // 	window.location.href = location + window.btoa(a.tab_text);
    // }
</script>