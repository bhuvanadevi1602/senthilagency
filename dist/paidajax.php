<?php
require("header.php");
include("config.php");
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
if (isset($_POST['register6'])) {
    $count = $_POST["no_stop6"];
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


    $insert = "INSERT into delivery (id,delivery_status,date,time,remarks)
        values('$id','$delivery_status','$date','$time','$remarks') ";
    if (mysqli_query($conn, $insert)) {
        $sql2 = "update base set delivery_status='$delivery_status',date='$date',time='$time',remarks='$remarks' where id=$id";
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
if (isset($_POST['submit6'])) {
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
<style>
    #demobox {
        background-color: #cfc;
        padding: 1px;
    }

    .demo {
        margin-left: 3px;
        margin-bottom: -4px;
        position: relative;
        bottom: -1px;
        transform: rotate(-90deg);
    }

    .ch {
        height: 700px;
    }

    .rows {
        display: -webkit-box;
        display: -ms-flexbox;
        margin-right: -12.5px;
        margin-left: -12.5px;
    }

    .modal-height {
        width: auto !important;
    }

    .hh-grayBox {
        position: relative;
        right: 49px;
        margin-bottom: 20px;
        padding: 0px;
        margin-top: 20px;
    }

    .pt45 {
        padding-top: 45px;
    }

    .order-tracking {
        width: 20%;
        position: relative;
        bottom: -33px;
        display: block;
    }

    .order-tracking .is-complete {
        display: block;
        position: relative;
        border-radius: 50%;
        height: 30px;
        width: 30px;
        border: 0px solid #AFAFAF;
        background-color: #f7be16;
        margin: 0 auto;
        transition: background 0.25s linear;
        -webkit-transition: background 0.25s linear;
        z-index: 2;
    }

    .order-tracking .is-complete:after {
        display: block;
        position: absolute;
        content: '';
        height: 14px;
        width: 7px;
        top: -2px;
        bottom: 0;
        left: 5px;
        margin: auto 0;
        border: 0px solid #AFAFAF;
        border-width: 0px 2px 2px 0;
        transform: rotate(-43deg);
        opacity: 0;
    }

    .order-tracking.completed .is-complete {
        border-color: #27aa80;
        border-width: 0px;
        background-color: #27aa80;
    }

    .order-tracking.completed .is-complete:after {
        border-color: #fff;
        border-width: 0px 3px 3px 0;
        width: 7px;
        left: 11px;
        opacity: 1;
    }

    .order-tracking p {

        font-size: 20px;
        font-weight: 600;
        position: relative;
        bottom: 99px;
        line-height: 20px;
    }

    .order-tracking h6 {
        font-weight: 100;
        font-size: 12px;
        position: relative;
        bottom: 129px;
        left: 22px;
    }

    .order-tracking p span {
        font-size: 14px;
    }

    .order-tracking.completed p {
        color: #000;
    }

    .order-tracking::before {
        content: '';
        display: block;
        height: 2px;
        width: calc(100% - 32px);
        background-color: #f7be16;
        top: 14px;
        position: absolute;
        left: calc(-50% + 16px);
        z-index: 0;
    }

    .order-tracking:first-child:before {
        display: none;
    }

    .order-tracking.completed:before {
        background-color: #27aa80;
    }

    .tracking {
        transform: rotate(90deg);
    }

    .trackpos {
        position: absolute;
        top: -147px;
        bottom: 58px;
        transform: rotate(-90deg);
    }

    .word-position {
        transform: rotate(270deg) !important;
        color: black;
        white-space: nowrap;
    }

    .word-position span {
        transform: rotate(270deg) !important;
        color: black;
        white-space: nowrap;
    }
</style>

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
                        <div class="card-toolbar">
                            <div class="dropdown dropdown-inline mr-2">
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="navi flex-column navi-hover py-2">
                                        <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                            Choose an option:
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="la la-print"></i></span>
                                                <span class="navi-text">Print</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="la la-copy"></i></span>
                                                <span class="navi-text">Copy</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                                <span class="navi-text">Excel</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="la la-file-text-o"></i></span>
                                                <span class="navi-text">CSV</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
                                                <span class="navi-text">PDF</span>
                                            </a>
                                        </li>
                                    </ul>
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
                                            <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="submit" id="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal fade" id="deliverymonthlocation_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <input type="hiddden" name="id" id="deliverymonthloading_user_id">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class=" justify-content-center mt-5" id="monthloadingstatusupdate">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" id="modal_footer">
                                            <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="submit6" id="submit6">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

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
                                            <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="register" id="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal fade" id="deliverystatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <input type="hidden" name="id" id="deliverystatus_id">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class=" justify-content-center mt-5" id="monthtrackingstatusupdate">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" id="modal_footer">
                                            <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-light-primary font-weight-bold mr-2" name="register6" id="submit">Submit</button>
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

                        <div class="modal fade" id="deliverymonth_userphp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <input type="hidden" name="id" id="deliverymonth_userstatus_id">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="rows justify-content-center mt-5" id="deliverymonthstatusupdate">
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

                        <div class="modal fade" id="deliverymonthpayment_userphp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <input type="hidden" name="id" id="deliverymonthpayment_userstatus_id">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="rows justify-content-center mt-5" id="deliverymonthpaymentstatusupdate">
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

                    <div class="modal fade" id="deliverystatus_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-right:0px">
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
                                                    <div class="rows justify-content-center tracking mt-5" id="track_location5">
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

                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link " data-toggle="tab" href="#all">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#intransit">Intransit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#delivered">Delivered</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#paid">Paid</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#unpaid">To Pay</a>
                            </li>
                        </ul>

                        <?php
                        if ($_SESSION['role'] == "super_admin") {
                        ?>
                            <div class="tab-content">

                                <div id="paid" class="container tab-pane active"><br>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="row mt-3 text-center">
                                                <div class="col-sm-4">
                                                    <label class="form-label">From Date</label>
                                                    <input class="form-control" type="date" name="fromdate3" id="fromdate3">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label">To Date</label>
                                                    <input class="form-control" type="date" name="todate3" id="todate3">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input class="btn btn-primary m-5 pt-3" type="submit" name="filter3" value="Search" id="filter3">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <?php
                                    $fromdate3 = isset($_POST['fromdate3']) ? $_POST['fromdate3'] : "";
                                    $todate3 = isset($_POST['todate3']) ? $_POST['todate3'] : "";
                                    if ($fromdate3 == "" && $todate3 == "") {
                                    ?>
                                        <div class="table-responsive">
                                            <table class="table table-separate table-head-custom table-checkable" id="example3">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th>Total amount</th>
                                                        <th>Amount Paid</th>
                                                        <th>Balance</th>
                                                        <th>Transport Status</th>
                                                        <th>Delivery Status</th>
                                                        <th>Payment Status</th>
                                                    </tr>
                                                </thead>
 <tbody>

                                    </tbody>

                                            </table>
                                        </div><?php
                                            }
                                                ?>
                                    <?php
                                    if (isset($_POST['filter3'])) {
                                        $fromdate3 = $_POST['fromdate3'];
                                        $todate3 = $_POST['todate3'];
                                        if ($fromdate3 != "" && $todate3 != "") {
                                    ?>
                                            <div class="table-responsive">
                                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable7">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Total amount</th>
                                                            <th>Amount Paid</th>
                                                            <th>Balance</th>
                                                            <th>Transport Status</th>
                                                            <th>Delivery Status</th>
                                                            <th>Payment Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="filter_paid">
                                                        <?php
                                                        $sql7 = "SELECT * FROM base where consignment_type !='month' AND customer_type !='party' AND balance='0' AND createddate >='$fromdate3' AND createddate <='$todate3' order by id desc";
                                                        $result7 = $conn->query($sql7);
                                                        $j = 1;
                                                        while ($paid = $result7->FETCH_ASSOC()) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $j++ ?></td>
                                                                <td><a href="lrform_detail.php?id=<?php echo  $paid["id"] ?>"><?php echo $paid["from_name"] ?></a></td>
                                                                <td><?php echo $paid["createdAt"] ?></td>
                                                                <td><?php echo $paid["total"] ?></td>
                                                                <td><?php echo $paid["balanceadd"] ?></td>
                                                                <td><?php echo $paid["balance"] ?></td>
                                                                <?php
                                                                if ($paid["mode_transport"] == '') {
                                                                ?>
                                                                    <td><span class="btn btn-sm btn-light-danger font-weight-bolder">Unloaded</span></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td><span class="btn btn-sm btn-light-primary font-weight-bolder">Loaded</span></td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                if ($paid["delivery_status"] == 'delivered') {
                                                                ?>
                                                                    <td><span class="btn btn-sm btn-light-primary font-weight-bolder">Delivered</span></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td><span class="btn btn-sm btn-light-danger font-weight-bolder">Undelivered</span></td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                if ($paid["consignment_type"] == "paid" || $paid["balance"] == 0) {
                                                                ?>
                                                                    <td><span class="btn btn-sm btn-light-primary font-weight-bolder">Paid</span></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td><span class="btn btn-sm btn-light-danger font-weight-bolder">Unpaid</span></td>
                                                                <?php
                                                                }
                                                                ?>

                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>

                            </div>
                    </div>
                <?php

                        } elseif ($_SESSION['role'] == "user") {
                ?>

                    <div class="tab-content">

                        <div id="paid" class="container tab-pane active"><br>
                            <div class="card-body">
                                <form method="post">
                                    <div class="row mt-3 text-center">
                                        <div class="col-sm-4">
                                            <label class="form-label">From Date</label>
                                            <input class="form-control" type="date" name="fromdate3" id="fromdate3">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label">To Date</label>
                                            <input class="form-control" type="date" name="todate3" id="todate3">
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="btn btn-primary m-5 pt-3" type="submit" name="filter3" value="Search" id="filter3">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <?php
                            $fromdate3 = isset($_POST['fromdate3']) ? $_POST['fromdate3'] : "";
                            $todate3 = isset($_POST['todate3']) ? $_POST['todate3'] : "";
                            if ($fromdate3 == "" && $todate3 == "") {
                            ?>
                                <div class="table-responsive">
                                    <table class="table table-separate table-head-custom table-checkable" id="example3">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Total amount</th>
                                                <th>Amount Paid</th>
                                                <th>Balance</th>
                                                <th>Transport Status</th>
                                                <th>Delivery Status</th>
                                                <th>Payment Status</th>
                                            </tr>
                                        </thead>

                                        <tbody id="filter_paid">
                                            <?php
                                            $sql7 = "SELECT * FROM base where branch = '$branch' && username = '$username' && consignment_type !='month' && customer_type !='party' && ( balance='0' || consignment_type = 'paid') order by id desc";
                                            $result7 = $conn->query($sql7);
                                            $j = 1;
                                            while ($paid = $result7->FETCH_ASSOC()) {

                                            ?>
                                                <tr>
                                                    <td><?php echo $j++ ?></td>
                                                    <td><a href="lrform_detail.php?id=<?php echo  $paid["id"] ?>"><?php echo $paid["from_name"] ?></a></td>
                                                    <td><?php echo $paid["createdAt"] ?></td>
                                                    <td><?php echo $paid["total"] ?></td>
                                                    <td><?php echo $paid["balanceadd"] ?></td>
                                                    <td><?php echo $paid["balance"] ?></td>
                                                    <?php
                                                    if ($paid["mode_transport"] == '') {
                                                    ?>
                                                        <td><span class="btn btn-sm btn-light-danger font-weight-bolder">Unloaded</span></td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td><span class="btn btn-sm btn-light-primary font-weight-bolder">Loaded</span></td>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($paid["delivery_status"] == 'delivered') {
                                                    ?>
                                                        <td><span class="btn btn-sm btn-light-primary font-weight-bolder">Delivered</span></td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td><span class="btn btn-sm btn-light-danger font-weight-bolder">Undelivered</span></td>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($paid["consignment_type"] == "paid" ||  $paid["balance"] == 0) {
                                                    ?>
                                                        <td><span class="btn btn-sm btn-light-primary font-weight-bolder">Paid</span></td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td><span class="btn btn-sm btn-light-danger font-weight-bolder">Unpaid</span></td>
                                                    <?php
                                                    }
                                                    ?>

                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            if (isset($_POST['filter3'])) {
                                $fromdate3 = $_POST['fromdate3'];
                                $todate3 = $_POST['todate3'];
                                if ($fromdate3 != "" && $todate3 != "") {
                            ?>
                                    <div class="table-responsive">
                                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable7">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Total amount</th>
                                                    <th>Amount Paid</th>
                                                    <th>Balance</th>
                                                    <th>Transport Status</th>
                                                    <th>Delivery Status</th>
                                                    <th>Payment Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="filter_paid">
                                                <?php
                                                $sql7 = "SELECT * FROM base where consignment_type !='month' AND customer_type !='party' AND balance='0' AND createddate >='$fromdate3' AND createddate<='$todate3' && branch = '$branch' && username = '$username' order by id desc";
                                                $result7 = $conn->query($sql7);
                                                $j = 1;
                                                while ($paid = $result7->FETCH_ASSOC()) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $j++ ?></td>
                                                        <td><a href="lrform_detail.php?id=<?php echo  $paid["id"] ?>"><?php echo $paid["from_name"] ?></a></td>
                                                        <td><?php echo $paid["createdAt"] ?></td>
                                                        <td><?php echo $paid["total"] ?></td>
                                                        <td><?php echo $paid["balanceadd"] ?></td>
                                                        <td><?php echo $paid["balance"] ?></td>
                                                        <?php
                                                        if ($paid["mode_transport"] == '') {
                                                        ?>
                                                            <td><span class="btn btn-sm btn-light-danger font-weight-bolder">Unloaded</span></td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td><span class="btn btn-sm btn-light-primary font-weight-bolder">Loaded</span></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($paid["delivery_status"] == 'delivered') {
                                                        ?>
                                                            <td><span class="btn btn-sm btn-light-primary font-weight-bolder">Delivered</span></td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td><span class="btn btn-sm btn-light-danger font-weight-bolder">Undelivered</span></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($paid["consignment_type"] == "paid" ||  $paid["balance"] == 0) {
                                                        ?>
                                                            <td><span class="btn btn-sm btn-light-primary font-weight-bolder">Paid</span></td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td><span class="btn btn-sm btn-light-danger font-weight-bolder">Unpaid</span></td>
                                                        <?php
                                                        }
                                                        ?>

                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                            <?php
                                }
                            }
                            ?>

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

<div class="footer py-4 d-flex flex-lg-column " id="kt_footer">
    <div class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted font-weight-bold mr-2">2020&copy;</span>
            <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">APS</a>
        </div>
    </div>
</div>
</div>
</div>
</div>

<div id="kt_quick_actions" class="offcanvas offcanvas-left p-10">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-10">
        <h3 class="font-weight-bold m-0">
            Quick Actions
            <small class="text-muted font-size-sm ml-2">finance & reports</small>
        </h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_actions_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <div class="offcanvas-content pr-5 mr-n5">
        <div class="row gutter-b">
            <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
                    <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z" fill="#000000" opacity="0.3" />
                                <path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z" fill="#000000" />
                            </g>
                        </svg>
                    </span> <span class="d-block font-weight-bold font-size-h6 mt-2">Accounting</span>
                </a>
            </div>

            <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
                    <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M14.8571499,13 C14.9499122,12.7223297 15,12.4263059 15,12.1190476 L15,6.88095238 C15,5.28984632 13.6568542,4 12,4 L11.7272727,4 C10.2210416,4 9,5.17258756 9,6.61904762 L10.0909091,6.61904762 C10.0909091,5.75117158 10.823534,5.04761905 11.7272727,5.04761905 L12,5.04761905 C13.0543618,5.04761905 13.9090909,5.86843034 13.9090909,6.88095238 L13.9090909,12.1190476 C13.9090909,12.4383379 13.8240964,12.7385644 13.6746497,13 L10.3253503,13 C10.1759036,12.7385644 10.0909091,12.4383379 10.0909091,12.1190476 L10.0909091,9.5 C10.0909091,9.06606198 10.4572216,8.71428571 10.9090909,8.71428571 C11.3609602,8.71428571 11.7272727,9.06606198 11.7272727,9.5 L11.7272727,11.3333333 L12.8181818,11.3333333 L12.8181818,9.5 C12.8181818,8.48747796 11.9634527,7.66666667 10.9090909,7.66666667 C9.85472911,7.66666667 9,8.48747796 9,9.5 L9,12.1190476 C9,12.4263059 9.0500878,12.7223297 9.14285008,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L14.8571499,13 Z" fill="#000000" opacity="0.3" />
                                <path d="M9,10.3333333 L9,12.1190476 C9,13.7101537 10.3431458,15 12,15 C13.6568542,15 15,13.7101537 15,12.1190476 L15,10.3333333 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9,10.3333333 Z M10.0909091,11.1212121 L12,12.5 L13.9090909,11.1212121 L13.9090909,12.1190476 C13.9090909,13.1315697 13.0543618,13.952381 12,13.952381 C10.9456382,13.952381 10.0909091,13.1315697 10.0909091,12.1190476 L10.0909091,11.1212121 Z" fill="#000000" />
                            </g>
                        </svg>
                    </span> <span class="d-block font-weight-bold font-size-h6 mt-2">Members</span>
                </a>
            </div>
        </div>
        <div class="row gutter-b">
            <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
                    <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000" />
                                <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                    </span> <span class="d-block font-weight-bold font-size-h6 mt-2">Projects</span>
                </a>
            </div>
            <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
                    <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                    </span> <span class="d-block font-weight-bold font-size-h6 mt-2">Customers</span>
                </a>
            </div>
        </div>
        <div class="row gutter-b">
            <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
                    <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5" />
                                <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5" />
                                <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero" />
                                <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5" />
                            </g>
                        </svg>
                    </span> <span class="d-block font-weight-bold font-size-h6 mt-2">Email</span>
                </a>
            </div>
            <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
                    <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M12,10.9996338 C12.8356605,10.3719448 13.8743941,10 15,10 C17.7614237,10 20,12.2385763 20,15 C20,17.7614237 17.7614237,20 15,20 C13.8743941,20 12.8356605,19.6280552 12,19.0003662 C11.1643395,19.6280552 10.1256059,20 9,20 C6.23857625,20 4,17.7614237 4,15 C4,12.2385763 6.23857625,10 9,10 C10.1256059,10 11.1643395,10.3719448 12,10.9996338 Z M13.3336047,12.504354 C13.757474,13.2388026 14,14.0910788 14,15 C14,15.9088933 13.7574889,16.761145 13.3336438,17.4955783 C13.8188886,17.8206693 14.3938466,18 15,18 C16.6568542,18 18,16.6568542 18,15 C18,13.3431458 16.6568542,12 15,12 C14.3930587,12 13.8175971,12.18044 13.3336047,12.504354 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <circle fill="#000000" cx="12" cy="9" r="5" />
                            </g>
                        </svg>
                    </span> <span class="d-block font-weight-bold font-size-h6 mt-2">Settings</span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
                    <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z" fill="#000000" opacity="0.3" />
                                <path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z" fill="#000000" />
                            </g>
                        </svg>
                    </span> <span class="d-block font-weight-bold font-size-h6 mt-2">Orders</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="kt_quick_user" class="offcanvas offcanvas-left p-10">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">
            User Profile
        </h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <div class="offcanvas-content pr-5 mr-n5">
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label" style="background-image:url('assets/media/users/300_21.jpg')"></div>
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                    <?php echo $_SESSION['name']; ?>
                </a>
                <div class="text-muted mt-1">
                    <?php echo $_SESSION['role']; ?>
                </div>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
                                <span class="svg-icon svg-icon-lg svg-icon-primary">
                                </span> </span>
                        </span>
                    </a>
                    <a href="logout.php" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
                </div>
            </div>
        </div>
        <div class="separator separator-dashed mt-8 mb-5"></div>
        <div class="navi navi-spacer-x-0 p-0">
        </div>
        <div>
        </div>
    </div>
</div>

<div id="kt_quick_panel" class="offcanvas offcanvas-left pt-5 pb-10">
    <div class="offcanvas-header offcanvas-header-navs d-flex align-items-center justify-content-between mb-5">
        <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary flex-grow-1 px-10" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_logs">Audit Logs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_notifications">Notifications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_settings">Settings</a>
            </li>
        </ul>
        <div class="offcanvas-close mt-n1 pr-5">
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_panel_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
    </div>
    <div class="offcanvas-content px-10">
        <div class="tab-content">
            <div class="tab-pane fade show pt-3 pr-5 mr-n5 active" id="kt_quick_panel_logs" role="tabpanel">
                <div class="mb-15">
                    <h5 class="font-weight-bold mb-5">System Messages</h5>
                    <div class="d-flex align-items-center flex-wrap mb-5">
                        <div class="symbol symbol-50 symbol-light mr-5">
                            <span class="symbol-label">
                                <img src="assets/media/svg/misc/006-plurk.svg" class="h-50 align-self-center" alt="" />
                            </span>
                        </div>
                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">Top Authors</a>
                            <span class="text-muted font-weight-bold">Most Successful Fellas</span>
                        </div>
                        <span class="btn btn-sm btn-light font-weight-bolder py-1 my-lg-0 my-2 text-dark-50">+82$</span>
                    </div>
                    <div class="d-flex align-items-center flex-wrap mb-5">
                        <div class="symbol symbol-50 symbol-light mr-5">
                            <span class="symbol-label">
                                <img src="assets/media/svg/misc/015-telegram.svg" class="h-50 align-self-center" alt="" />
                            </span>
                        </div>
                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">Popular Authors</a>
                            <span class="text-muted font-weight-bold">Most Successful Fellas</span>
                        </div>
                        <span class="btn btn-sm btn-light font-weight-bolder  my-lg-0 my-2 py-1 text-dark-50">+280$</span>
                    </div>
                    <div class="d-flex align-items-center flex-wrap mb-5">
                        <div class="symbol symbol-50 symbol-light mr-5">
                            <span class="symbol-label">
                                <img src="assets/media/svg/misc/003-puzzle.svg" class="h-50 align-self-center" alt="" />
                            </span>
                        </div>
                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">New Users</a>
                            <span class="text-muted font-weight-bold">Most Successful Fellas</span>
                        </div>
                        <span class="btn btn-sm btn-light font-weight-bolder  my-lg-0 my-2 py-1 text-dark-50">+4500$</span>
                    </div>
                    <div class="d-flex align-items-center flex-wrap mb-5">
                        <div class="symbol symbol-50 symbol-light mr-5">
                            <span class="symbol-label">
                                <img src="assets/media/svg/misc/005-bebo.svg" class="h-50 align-self-center" alt="" />
                            </span>
                        </div>
                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">Active Customers</a>
                            <span class="text-muted font-weight-bold">Most Successful Fellas</span>
                        </div>
                        <span class="btn btn-sm btn-light font-weight-bolder my-lg-0 my-2 py-1 text-dark-50">+4500$</span>
                    </div>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="symbol symbol-50 symbol-light mr-5">
                            <span class="symbol-label">
                                <img src="assets/media/svg/misc/014-kickstarter.svg" class="h-50 align-self-center" alt="" />
                            </span>
                        </div>
                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">Bestseller Theme</a>
                            <span class="text-muted font-weight-bold">Most Successful Fellas</span>
                        </div>
                        <span class="btn btn-sm btn-light font-weight-bolder my-lg-0 my-2 py-1 text-dark-50">+4500$</span>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="font-weight-bold mb-5">Notifications</h5>
                    <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-5">
                        <span class="svg-icon svg-icon-warning mr-5">
                            <span class="svg-icon svg-icon-lg">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                                        <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                    </g>
                                </svg>
                            </span> </span>
                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Another purpose persuade</a>
                            <span class="text-muted font-size-sm">Due in 2 Days</span>
                        </div>
                        <span class="font-weight-bolder text-warning py-1 font-size-lg">+28%</span>
                    </div>
                    <div class="d-flex align-items-center bg-light-success rounded p-5 mb-5">
                        <span class="svg-icon svg-icon-success mr-5">
                            <span class="svg-icon svg-icon-lg">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) " />
                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    </g>
                                </svg>
                            </span> </span>
                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Would be to people</a>
                            <span class="text-muted font-size-sm">Due in 2 Days</span>
                        </div>
                        <span class="font-weight-bolder text-success py-1 font-size-lg">+50%</span>
                    </div>
                    <div class="d-flex align-items-center bg-light-danger rounded p-5 mb-5">
                        <span class="svg-icon svg-icon-danger mr-5">
                            <span class="svg-icon svg-icon-lg">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
                                        <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                            </span> </span>
                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">Purpose would be to persuade</a>
                            <span class="text-muted font-size-sm">Due in 2 Days</span>
                        </div>
                        <span class="font-weight-bolder text-danger py-1 font-size-lg">-27%</span>
                    </div>
                    <div class="d-flex align-items-center bg-light-info rounded p-5">
                        <span class="svg-icon svg-icon-info mr-5">
                            <span class="svg-icon svg-icon-lg">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Attachment2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z" fill="#000000" opacity="0.3" transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641) " />
                                        <path d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z" fill="#000000" transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359) " />
                                        <path d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z" fill="#000000" opacity="0.3" transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146) " />
                                        <path d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z" fill="#000000" opacity="0.3" transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961) " />
                                    </g>
                                </svg>
                            </span> </span>
                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">The best product</a>
                            <span class="text-muted font-size-sm">Due in 2 Days</span>
                        </div>
                        <span class="font-weight-bolder text-info py-1 font-size-lg">+8%</span>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade pt-2 pr-5 mr-n5" id="kt_quick_panel_notifications" role="tabpanel">
                <div class="navi navi-icon-circle navi-spacer-x-0">
                    <a href="#" class="navi-item">
                        <div class="navi-link rounded">
                            <div class="symbol symbol-50 mr-3">
                                <div class="symbol-label"><i class="flaticon-bell text-success icon-lg"></i></div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold font-size-lg">
                                    5 new user generated report
                                </div>
                                <div class="text-muted">
                                    Reports based on sales
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="navi-item">
                        <div class="navi-link rounded">
                            <div class="symbol symbol-50 mr-3">
                                <div class="symbol-label"><i class="flaticon2-box text-danger icon-lg"></i></div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold  font-size-lg">
                                    2 new items submited
                                </div>
                                <div class="text-muted">
                                    by Grog John
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="navi-item">
                        <div class="navi-link rounded">
                            <div class="symbol symbol-50 mr-3">
                                <div class="symbol-label"><i class="flaticon-psd text-primary icon-lg"></i></div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold  font-size-lg">
                                    79 PSD files generated
                                </div>
                                <div class="text-muted">
                                    Reports based on sales
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="navi-item">
                        <div class="navi-link rounded">
                            <div class="symbol symbol-50 mr-3">
                                <div class="symbol-label"><i class="flaticon2-supermarket text-warning icon-lg"></i></div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold  font-size-lg">
                                    $2900 worth producucts sold
                                </div>
                                <div class="text-muted">
                                    Total 234 items
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="navi-item">
                        <div class="navi-link rounded">
                            <div class="symbol symbol-50 mr-3">
                                <div class="symbol-label"><i class="flaticon-paper-plane-1 text-success icon-lg"></i></div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold  font-size-lg">
                                    4.5h-avarage response time
                                </div>
                                <div class="text-muted">
                                    Fostest is Barry
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="navi-item">
                        <div class="navi-link rounded">
                            <div class="symbol symbol-50 mr-3">
                                <div class="symbol-label"><i class="flaticon-safe-shield-protection text-danger icon-lg"></i></div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold  font-size-lg">
                                    3 Defence alerts
                                </div>
                                <div class="text-muted">
                                    40% less alerts thar last week
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="navi-item">
                        <div class="navi-link rounded">
                            <div class="symbol symbol-50 mr-3">
                                <div class="symbol-label"><i class="flaticon-notepad text-primary icon-lg"></i></div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold  font-size-lg">
                                    Avarage 4 blog posts per author
                                </div>
                                <div class="text-muted">
                                    Most posted 12 time
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="navi-item">
                        <div class="navi-link rounded">
                            <div class="symbol symbol-50 mr-3">
                                <div class="symbol-label"><i class="flaticon-users-1 text-warning icon-lg"></i></div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold  font-size-lg">
                                    16 authors joined last week
                                </div>
                                <div class="text-muted">
                                    9 photodrapehrs, 7 designer
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="navi-item">
                        <div class="navi-link rounded">
                            <div class="symbol symbol-50 mr-3">
                                <div class="symbol-label"><i class="flaticon2-box text-info icon-lg"></i></div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold  font-size-lg">
                                    2 new items have been submited
                                </div>
                                <div class="text-muted">
                                    by Grog John
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="navi-item">
                        <div class="navi-link rounded">
                            <div class="symbol symbol-50 mr-3">
                                <div class="symbol-label"><i class="flaticon2-download text-success icon-lg"></i></div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold  font-size-lg">
                                    2.8 GB-total downloads size
                                </div>
                                <div class="text-muted">
                                    Mostly PSD end AL concepts
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="navi-item">
                        <div class="navi-link rounded">
                            <div class="symbol symbol-50 mr-3">
                                <div class="symbol-label"><i class="flaticon2-supermarket text-danger icon-lg"></i></div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold  font-size-lg">
                                    $2900 worth producucts sold
                                </div>
                                <div class="text-muted">
                                    Total 234 items
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="navi-item">
                        <div class="navi-link rounded">
                            <div class="symbol symbol-50 mr-3">
                                <div class="symbol-label"><i class="flaticon-bell text-primary icon-lg"></i></div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold  font-size-lg">
                                    7 new user generated report
                                </div>
                                <div class="text-muted">
                                    Reports based on sales
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="navi-item">
                        <div class="navi-link rounded">
                            <div class="symbol symbol-50 mr-3">
                                <div class="symbol-label"><i class="flaticon-paper-plane-1 text-success icon-lg"></i></div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold  font-size-lg">
                                    4.5h-avarage response time
                                </div>
                                <div class="text-muted">
                                    Fostest is Barry
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="tab-pane fade pt-3 pr-5 mr-n5" id="kt_quick_panel_settings" role="tabpanel">
                <form class="form">
                    <div>
                        <h5 class="font-weight-bold mb-3">Customer Care</h5>
                        <div class="form-group mb-0 row align-items-center">
                            <label class="col-8 col-form-label">Enable Notifications:</label>
                            <div class="col-4 d-flex justify-content-end">
                                <span class="switch switch-success switch-sm">
                                    <label>
                                        <input type="checkbox" checked="checked" name="select" />
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group mb-0 row align-items-center">
                            <label class="col-8 col-form-label">Enable Case Tracking:</label>
                            <div class="col-4 d-flex justify-content-end">
                                <span class="switch switch-success switch-sm">
                                    <label>
                                        <input type="checkbox" name="quick_panel_notifications_2" />
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group mb-0 row align-items-center">
                            <label class="col-8 col-form-label">Support Portal:</label>
                            <div class="col-4 d-flex justify-content-end">
                                <span class="switch switch-success switch-sm">
                                    <label>
                                        <input type="checkbox" checked="checked" name="select" />
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-6"></div>
                    <div class="pt-2">
                        <h5 class="font-weight-bold mb-3">Reports</h5>
                        <div class="form-group mb-0 row align-items-center">
                            <label class="col-8 col-form-label">Generate Reports:</label>
                            <div class="col-4 d-flex justify-content-end">
                                <span class="switch switch-sm switch-danger">
                                    <label>
                                        <input type="checkbox" checked="checked" name="select" />
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group mb-0 row align-items-center">
                            <label class="col-8 col-form-label">Enable Report Export:</label>
                            <div class="col-4 d-flex justify-content-end">
                                <span class="switch switch-sm switch-danger">
                                    <label>
                                        <input type="checkbox" name="select" />
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group mb-0 row align-items-center">
                            <label class="col-8 col-form-label">Allow Data Collection:</label>
                            <div class="col-4 d-flex justify-content-end">
                                <span class="switch switch-sm switch-danger">
                                    <label>
                                        <input type="checkbox" checked="checked" name="select" />
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-6"></div>
                    <div class="pt-2">
                        <h5 class="font-weight-bold mb-3">Memebers</h5>
                        <div class="form-group mb-0 row align-items-center">
                            <label class="col-8 col-form-label">Enable Member singup:</label>
                            <div class="col-4 d-flex justify-content-end">
                                <span class="switch switch-sm switch-primary">
                                    <label>
                                        <input type="checkbox" checked="checked" name="select" />
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group mb-0 row align-items-center">
                            <label class="col-8 col-form-label">Allow User Feedbacks:</label>
                            <div class="col-4 d-flex justify-content-end">
                                <span class="switch switch-sm switch-primary">
                                    <label>
                                        <input type="checkbox" name="select" />
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group mb-0 row align-items-center">
                            <label class="col-8 col-form-label">Enable Customer Portal:</label>
                            <div class="col-4 d-flex justify-content-end">
                                <span class="switch switch-sm switch-primary">
                                    <label>
                                        <input type="checkbox" checked="checked" name="select" />
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-sticky modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-custom">
                <div class="card-header align-items-center px-4 py-3">
                    <div class="text-left flex-grow-1">
                        <div class="dropdown dropdown-inline">
                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="svg-icon svg-icon-lg">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                </span> </button>
                            <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-md">
                                <ul class="navi navi-hover py-5">
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                                            <span class="navi-text">New Group</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon"><i class="flaticon2-list-3"></i></span>
                                            <span class="navi-text">Contacts</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon"><i class="flaticon2-rocket-1"></i></span>
                                            <span class="navi-text">Groups</span>
                                            <span class="navi-link-badge">
                                                <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon"><i class="flaticon2-bell-2"></i></span>
                                            <span class="navi-text">Calls</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon"><i class="flaticon2-gear"></i></span>
                                            <span class="navi-text">Settings</span>
                                        </a>
                                    </li>

                                    <li class="navi-separator my-3"></li>

                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon"><i class="flaticon2-magnifier-tool"></i></span>
                                            <span class="navi-text">Help</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon"><i class="flaticon2-bell-2"></i></span>
                                            <span class="navi-text">Privacy</span>
                                            <span class="navi-link-badge">
                                                <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="text-center flex-grow-1">
                        <div class="text-dark-75 font-weight-bold font-size-h5">Matt Pears</div>
                        <div>
                            <span class="label label-dot label-success"></span>
                            <span class="font-weight-bold text-muted font-size-sm">Active</span>
                        </div>
                    </div>
                    <div class="text-right flex-grow-1">
                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-dismiss="modal">
                            <i class="ki ki-close icon-1x"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="scroll scroll-pull" data-height="375" data-mobile-height="300">
                        <div class="messages">
                            <div class="d-flex flex-column mb-5 align-items-start">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-40 mr-3">
                                        <img alt="Pic" src="assets/media/users/300_12.jpg" />
                                    </div>
                                    <div>
                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
                                        <span class="text-muted font-size-sm">2 Hours</span>
                                    </div>
                                </div>
                                <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                    How likely are you to recommend our company
                                    to your friends and family?
                                </div>
                            </div>
                            <div class="d-flex flex-column mb-5 align-items-end">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <span class="text-muted font-size-sm">3 minutes</span>
                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                    </div>
                                    <div class="symbol symbol-circle symbol-40 ml-3">
                                        <img alt="Pic" src="assets/media/users/300_21.jpg" />
                                    </div>
                                </div>
                                <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                    Hey there, we’re just writing to let you know
                                    that you’ve been subscribed to a repository on GitHub.
                                </div>
                            </div>
                            <div class="d-flex flex-column mb-5 align-items-start">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-40 mr-3">
                                        <img alt="Pic" src="assets/media/users/300_21.jpg" />
                                    </div>
                                    <div>
                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
                                        <span class="text-muted font-size-sm">40 seconds</span>
                                    </div>
                                </div>
                                <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                    Ok, Understood!
                                </div>
                            </div>
                            <div class="d-flex flex-column mb-5 align-items-end">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <span class="text-muted font-size-sm">Just now</span>
                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                    </div>
                                    <div class="symbol symbol-circle symbol-40 ml-3">
                                        <img alt="Pic" src="assets/media/users/300_21.jpg" />
                                    </div>
                                </div>
                                <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                    You’ll receive notifications for all issues, pull requests!
                                </div>
                            </div>
                            <div class="d-flex flex-column mb-5 align-items-start">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-40 mr-3">
                                        <img alt="Pic" src="assets/media/users/300_12.jpg" />
                                    </div>
                                    <div>
                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
                                        <span class="text-muted font-size-sm">40 seconds</span>
                                    </div>
                                </div>
                                <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                    You can unwatch this repository immediately by clicking here: <a href="#">https://github.com</a>
                                </div>
                            </div>
                            <div class="d-flex flex-column mb-5 align-items-end">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <span class="text-muted font-size-sm">Just now</span>
                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                    </div>
                                    <div class="symbol symbol-circle symbol-40 ml-3">
                                        <img alt="Pic" src="assets/media/users/300_21.jpg" />
                                    </div>
                                </div>
                                <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                    Discover what students who viewed Learn Figma - UI/UX Design. Essential Training also viewed
                                </div>
                            </div>
                            <div class="d-flex flex-column mb-5 align-items-start">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-40 mr-3">
                                        <img alt="Pic" src="assets/media/users/300_12.jpg" />
                                    </div>
                                    <div>
                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
                                        <span class="text-muted font-size-sm">40 seconds</span>
                                    </div>
                                </div>
                                <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                    Most purchased Business courses during this sale!
                                </div>
                            </div>
                            <div class="d-flex flex-column mb-5 align-items-end">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <span class="text-muted font-size-sm">Just now</span>
                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                    </div>
                                    <div class="symbol symbol-circle symbol-40 ml-3">
                                        <img alt="Pic" src="assets/media/users/300_21.jpg" />
                                    </div>
                                </div>
                                <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                    Company BBQ to celebrate the last quater achievements and goals. Food and drinks provided
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer align-items-center">
                    <textarea class="form-control border-0 p-0" rows="2" placeholder="Type a message"></textarea>
                    <div class="d-flex align-items-center justify-content-between mt-5">
                        <div class="mr-3">
                            <a href="#" class="btn btn-clean btn-icon btn-md mr-1"><i class="flaticon2-photograph icon-lg"></i></a>
                            <a href="#" class="btn btn-clean btn-icon btn-md"><i class="flaticon2-photo-camera  icon-lg"></i></a>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="kt_scrolltop" class="scrolltop">
    <span class="svg-icon">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24" />
                <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
            </g>
        </svg>
    </span>
</div>
<div id="kt_demo_panel" class="offcanvas offcanvas-right p-10">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
        <h4 class="font-weight-bold m-0">
            Select A Demo
        </h4>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_demo_panel_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
</div>

<script>
    var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!--<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="assets/js/pages/crud/datatables/advanced/footer-callback.js"></script>

    <script>
        $(document).ready(function() {
            $('#example3').DataTable({
                "processing": true,
                "responsive": true,
                "ajax": {
                    "url": "ajax_request.php?action=fetch_branch_detail3",
                    "type": "POST"
                },
                "columns": [{
                        "data": "si_no"
                    },
                    {
                        "data": "from_name"
                    },
                    {
                        "data": "createdAt"
                    },
                    {
                        "data": "total"
                    },
                    {
                        "data": "balanceadd"
                    },
                    {
                        "data": "balance"
                    },
                    {
                        "data": "mode_transport"
                    },
                    {
                        "data": "delivery_status"
                    },
                    {
                        "data": "consignment_type"
                    },
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
                            return row.from_name;
                        }
                    },
                    {
                        targets: 2,
                        render: function(data, type, row) {
                            return row.createdAt;
                        }
                    },
                    {
                        targets: 3,
                        render: function(data, type, row) {

                            return row.total;
                        }
                    },
                    {
                        targets: 4,
                        render: function(data, type, row) {
                            return row.balanceadd;
                        }
                    },
                     {
                        targets: 5,
                        render: function(data, type, row) {
                            return row.balance;
                        }
                    },
                     {
                        targets: 6,
                        render: function(data, type, row) {
                            return row.mode_transport;
                        }
                    },
                     {
                        targets: 7,
                        render: function(data, type, row) {
                            return row.delivery_status;
                        }
                    },
                     {
                        targets: 8,
                        render: function(data, type, row) {
                            return row.consignment_type;
                        }
                    },
                ]
            });


        });

    </script>



<script>
    function fnExcelReport() {
        var tab_text = "<table border='2px'><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='29'><h1>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;APS CARGOS MOVERS&ensp;&ensp;&ensp;</h1></th></tr><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='29'><h4>102,WALL TEX ROAD,CHENNAI 600003</h4></th></tr><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='29'><h2>TEL NO:- 044-42012933,MOB NO:-9382587896,E-Mail:-apscargo102@gmail.com</h2></th></tr><tr style='bgcolor='#fff82a'>";
        var textRange;

        var j = 0;
        tab = document.getElementById('kt_datatable2'); // id of table
        for (j = 0; j < tab.rows.length; j++) {
            tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
        }
        tab_text = tab_text + "</table>";

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            txtArea1.document.open("txt/html", "replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus();
            sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
        } else //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
        return (sa);
    }


    $('#example').on('click', '.de_activate', function() {
        var id = $(this).attr('id');
        $.ajax({
            url: "ajax_request.php",
            type: "POST",
            dataType: "json",
            data: {
                "action": "de_activate_state",
                "id": id
            },
            success: function(result_job) {
                $('#example').DataTable().ajax.reload();
            }
        });
    });

    $(document).ready(function() {
        $('#example').on('click', '.createuser', function() {
            var id = $(this).attr('id');
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

    $(document).ready(function() {
        $('#example').on('click', '.create_user_modal', function() {
            var id = $(this).attr('delivery-id');
            // alert(id);
            $('#unpaid_user_modal_id').val(id);
        });
    });

    $(document).ready(function() {
        $('#example').on('click', '.loading_branch', function() {
            var id = $(this).attr('id');
            $('#loading_user_id').val(id);
        });
    });


    $(document).ready(function() {
        $('.allloading_branch').on('click', function() {
            var id = $(this).attr('id');
            // alert(id)
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
                    if (result_job.data[0].mode_transport == "") {
                        $('#allloadingstatusupdate').html('<div class="form-group row"><label class="col-form-label text-left col-lg-12">Mode of Transport <span style="color:red">*</span></label><div class="col-lg-12"><select class="form-control" name="mode_transport" id="mode_transport" onchange="ShowHideDiv()" required><option selected disabled>Select</option><option value="road">Road</option><option value="train">Train</option><option value="air">Air</option></select></div></div><div class="form-group row" id="productoptClass02" style="display:none;"><label class="col-form-label text-left col-lg-12">Lorry No </label><div class="col-lg-12"><input type="text" class="form-control" name="lorry_no" id="lorry_no" placeholder="Enter your Lorry No" /></div></div><div class="form-group row" id="productoptClass102" style="display:none;"><label class="col-form-label text-left col-lg-12">Train Type </label><div class="col-lg-12"><select class="form-control" name="train_type" id="train_type"><option selected disabled>Select</option><option value="rear">Rear</option><option value="front">Front</option></select></div><label class="col-form-label text-left col-lg-12">RR No </label><div class="col-lg-12"><input type="text" class="form-control" name="RR_No" id="RR_No" placeholder="Enter your Lorry No" /></div><label class="col-form-label text-left col-lg-12">Train No </label><div class="col-lg-12"><input type="text" class="form-control" name="train_No" id="train_No" placeholder="Enter your Train No" /></div></div><div class="form-group row" id="productoptClass202" style="display:none;"><label class="col-form-label text-left col-lg-12">Flight No </label><div class="col-lg-12"><input type="text" class="form-control" name="flight_no" id="flight_no" placeholder="Enter your Flight No" /></div></div>');
                    } else {
                        $('#allloadingstatusupdate').html('<div class="form-group row"><input type="hidden" name="id" value="' + result_job.data[0].id + '"><label class="col-lg-6"><B>Mode of Transport</b> </label><div class="col-lg-6">' + result_job.data[0].mode_transport + '</div></div><div class="form-group row"><label class="col-lg-6">Lorry No </label> <div class="col-lg-6">' + result_job.data[0].lorry_no + '</div></div><div class="form-group row"> <label class="col-lg-6 col-sm-12">Train Type </label><div class="col-lg-6 col-md-6 col-sm-12"> ' + result_job.data[0].train_type + '</div><br><br><label class="col-lg-6 col-sm-12">RR No </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].RR_No + '</div><br><br><label class="col-lg-6 col-sm-12">Train No </label><div class="col-lg-6 col-md-6 col-sm-12"> ' + result_job.data[0].train_No + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Flight No </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].flight_no + '</div></div>');
                    }
                }
            });
        });
    });

    $(document).ready(function() {
        $('.deliverymonthloading_branch').on('click', function() {
            var id = $(this).attr('id');
            $('#deliverymonthloading_user_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "monthbranchstatus",
                    "id": id
                },
                success: function(result_job) {
                    if (result_job.data[0].mode_transport == "") {
                        $('#monthloadingstatusupdate').html('<div class="form-group row"><label class="col-form-label text-left col-lg-12">Mode of Transport <span style="color:red">*</span></label><div class="col-lg-12"><select class="form-control" name="mode_transport" id="mode_transport" onchange="ShowHideDiv()" required><option selected disabled>Select</option><option value="road">Road</option><option value="train">Train</option><option value="air">Air</option></select></div></div><div class="form-group row" id="productoptClass02" style="display:none;"><label class="col-form-label text-left col-lg-12">Lorry No </label><div class="col-lg-12"><input type="text" class="form-control" name="lorry_no" id="lorry_no" placeholder="Enter your Lorry No" /></div></div><div class="form-group row" id="productoptClass102" style="display:none;"><label class="col-form-label text-left col-lg-12">Train Type </label><div class="col-lg-12"><select class="form-control" name="train_type" id="train_type"><option selected disabled>Select</option><option value="rear">Rear</option><option value="front">Front</option></select></div><label class="col-form-label text-left col-lg-12">RR No </label><div class="col-lg-12"><input type="text" class="form-control" name="RR_No" id="RR_No" placeholder="Enter your Lorry No" /></div><label class="col-form-label text-left col-lg-12">Train No </label><div class="col-lg-12"><input type="text" class="form-control" name="train_No" id="train_No" placeholder="Enter your Train No" /></div></div><div class="form-group row" id="productoptClass202" style="display:none;"><label class="col-form-label text-left col-lg-12">Flight No </label><div class="col-lg-12"><input type="text" class="form-control" name="flight_no" id="flight_no" placeholder="Enter your Flight No" /></div></div>');
                    } else {
                        $('#monthloadingstatusupdate').html('<div class="form-group row"><input type="hidden" name="id" value="' + result_job.data[0].id + '"><label class="col-lg-6"><B>Mode of Transport</b> </label><div class="col-lg-6">' + result_job.data[0].mode_transport + '</div></div><div class="form-group row"><label class="col-lg-6">Lorry No </label> <div class="col-lg-6">' + result_job.data[0].lorry_no + '</div></div><div class="form-group row"> <label class="col-lg-6 col-sm-12">Train Type </label><div class="col-lg-6 col-md-6 col-sm-12"> ' + result_job.data[0].train_type + '</div><br><br><label class="col-lg-6 col-sm-12">RR No </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].RR_No + '</div><br><br><label class="col-lg-6 col-sm-12">Train No </label><div class="col-lg-6 col-md-6 col-sm-12"> ' + result_job.data[0].train_No + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Flight No </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].flight_no + '</div></div>');
                    }
                }
            });

        });
    });

    $(document).ready(function() {
        $('.alldelivery_userstatus').on('click', function() {
            var id = $(this).attr('id');
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
                    if (result_job.data[0].delivery_status !== "") {
                        $('#alldeliverystatusupdate').html('<div class="card-body"><div class="form-group row"><label class="col-lg-6 col-sm-12"><B>Delivery Status </B></label><div class="col-lg-6 col-md-6 col-sm-12" id="demobox">' + result_job.data[i].delivery_status + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12"><B>Date </B></label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[i].date + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12"><B>Time </B></label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[i].time + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12"><B>Remarks </b></label><div class="col-lg-6 col-md-6 col-sm-12"> ' + result_job.data[i].remarks + '</div></div>');
                    } else {
                        // alert(result_job.data[0].id)
                        $('#alldeliverystatusupdate').html('<div class="row"><div class="col-lg-12"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Delivery</h3></div><div class="card-body"><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Delivery Status <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><select class="form-control" name="delivery_status" id="delivery_status" required=""><option selected="" disabled="">Select</option><option value="delivered">Delivered</option><option value="returned">Returned</option></select></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Date <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="date" class="form-control" name="date" id="date" placeholder="Enter your Date" required=""></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Time <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="time" class="form-control" name="time" id="time" placeholder="Enter Contact No" required=""></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Remarks </label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="remarks" id="remarks" placeholder="Enter your Remark"></div></div></div><div class="card-footer"><div class="row"><div class="col-lg-8"></div><div class="col-lg-4"><button type="submit" class="btn btn-primary font-weight-bold mr-2" name="register11" id="submit">Submit</button></div></div></div></div></div></div>');
                    }
                }
            });
        });
    });

    $(document).ready(function() {
        $('.deliverymonth_userstatus').on('click', function() {
            var id = $(this).attr('id');
            $('#deliverymonth_userstatus_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliverymonthstatus",
                    "id": id
                },
                success: function(result_job) {
                    if (result_job.data[0].delivery_status !== "") {
                        $('#deliverymonthstatusupdate').html('<div class="card-body"><div class="form-group row"><label class="col-lg-6 col-sm-12"><B>Delivery Status </B></label><div class="col-lg-6 col-md-6 col-sm-12" id="demobox">' + result_job.data[i].delivery_status + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12"><B>Date </B></label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[i].date + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12"><B>Time </B></label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[i].time + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12"><B>Remarks </b></label><div class="col-lg-6 col-md-6 col-sm-12"> ' + result_job.data[i].remarks + '</div></div>');
                    } else {
                        // alert(result_job.data[0].id)
                        $('#deliverymonthstatusupdate').html('<div class="row"><div class="col-lg-12"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Delivery</h3></div><div class="card-body"><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Delivery Status <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><select class="form-control" name="delivery_status" id="delivery_status" required=""><option selected="" disabled="">Select</option><option value="delivered">Delivered</option><option value="returned">Returned</option></select></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Date <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="date" class="form-control" name="date" id="date" placeholder="Enter your Date" required=""></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Time <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="time" class="form-control" name="time" id="time" placeholder="Enter Contact No" required=""></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Remarks </label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="remarks" id="remarks" placeholder="Enter your Remark"></div></div></div><div class="card-footer"><div class="row"><div class="col-lg-8"></div><div class="col-lg-4"><button type="submit" class="btn btn-primary font-weight-bold mr-2" name="register11" id="submit">Submit</button></div></div></div></div></div></div>');
                    }
                }
            });
        });
    });

    $(document).ready(function() {
        $('.withdelivery_userstatus').on('click', function() {
            var id = $(this).attr('id');
            $('#withdelivery_userstatus_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliverystatus",
                    "id": id
                },
                success: function(result_job) {
                    if (result_job.data[0].delivery_status !== "") {
                        $('#withdeliverystatusupdate').html('<div class="card card-custom gutter-b example-compact"><div class="card-header"><h3 class="card-title">Delivery Details</h3></div><div class="card-body"><div class="form-group row"><label class="col-lg-6 col-sm-12">Delivery Status </label><div class="col-lg-6 col-md-6 col-sm-12" id="demobox">' + result_job.data[i].delivery_status + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Date </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[i].date + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Time </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[i].time + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Remarks </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[i].remarks + '</div></div></div></div></div>');
                    } else {
                        alert(result_job.data[0].id)
                        //  alert(<div class="form-group row"><label class="col-lg-6 col-sm-12">Delivery Status </label><div class="col-lg-6 col-md-6 col-sm-12" id="demobox">' + result_job.data[0].delivery_status</div></div>);
                    }
                }
            });
        });
    });

    $(document).ready(function() {
        $('.allpayment_userstatus').on('click', function() {
            var id = $(this).attr('id');
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

    $(document).ready(function() {
        $('.deliverymonthpayment_userstatus').on('click', function() {
            var id = $(this).attr('id');
            $('#deliverymonthpayment_userstatus_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "deliverymonthpaymentstatus",
                    "id": id
                },
                success: function(result_job) {
                    alert(result_job.data[0].id)
                    if (result_job.data[0].balance == "") {
                        // $('#withoutpaymentstatusupdate').html('	<div class="row"><div class="col-lg-12"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title">Payment</h3></div><input type="text" name="id" value="' + result_job.data[0].total + '"><div class="card-body"><div class="form-group row"><label class="col-form-label text-right col-lg-3 col-sm-12">Mode of Payment <span style="color:red">*</span></label><div class="col-lg-9 col-md-9 col-sm-12"><select class="form-control" name="mode_payment" id="mode_payment" required><option selected disabled>Select</option><option value="cash">Cash</option><option value="cheque">Cheque</option><option value="upi">UPI</option><option value="neft">NEFT</option><option value="rtgs">RTGS</option></select></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-3 col-sm-12">Amount Paid <span style="color:red">*</span></label><div class="col-lg-9 col-md-9 col-sm-12"><input type="text" class="form-control" name="amount_paid" id="amount_paid" placeholder="Enter your Amount Paid" required /></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-3 col-sm-12">Remarks <span style="color:red">*</span></label><div class="col-lg-9 col-md-9 col-sm-12"><input type="text" class="form-control" name="payment_remarks" id="payment_remarks" placeholder="Enter your Remark" /></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-3 col-sm-12">Balance <span style="color:red">*</span></label><div class="col-lg-9 col-md-9 col-sm-12"><input type="text" class="form-control" name="balance" id="balance" readonly placeholder="Enter your Balance" /></div></div></div></div><div class="card-footer"><div class="row"><div class="col-lg-12"><button type="submit" class="btn btn-primary font-weight-bold mr-2" name="paymentsubmit" id="submit">Submit</button></div></div></div></div><div class="col-lg-12"><div class="card card-custom gutter-b  example-compact"><div class="card-header"><h3 class="card-title">Payment Details</h3></div><div class="card-body"><div class="form-group row">' + result_job.data[0].id + '<label class="col-lg-6 col-sm-12">Mode Payment </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].mode_payment + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Amount Paid </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].amount_paid + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Payment Remarks </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].payment_remarks + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Balance</label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].balance + '</div></div></div></div></div></div>');					
                        $('#deliverymonthpaymentstatusupdate').html('<div class="row"><div class="col-lg-12"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Payment</h3><h1 class="card-title" style="color:green">Total: ' + result_job.data[0].total + ' </h1></div><input type="hidden"  name="total" value="' + result_job.data[0].total + '"><input type="hidden"  name="balance" value="' + result_job.data[0].balance + '"><div class="card-body"><div class="form-group row"><h6 class="col-lg-8 col-md-8 col-sm-12"></h6><h6 class="col-lg-4 col-md-4 col-sm-12" style="color:green">Balance: ' + result_job.data[0].balance + ' </h6></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Mode of Payment <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><select class="form-control" name="mode_payment" id="mode_payment" required><option selected disabled>Select</option><option value="cash">Cash</option><option value="cheque">Cheque</option><option value="upi">UPI</option><option value="neft">NEFT</option><option value="rtgs">RTGS</option></select></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Amount Paid <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="amount_paid" id="amount_paid" placeholder="Enter your Amount Paid" required /></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Remarks <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="payment_remarks" id="payment_remarks" placeholder="Enter your Remark" /></div></div><div class="form-group row"></div></div><div class="card-footer"><div class="row"><div class="col-lg-8"></div><div class="col-lg-4"><button type="submit" class="btn btn-primary font-weight-bold mr-2" name="paymentsubmit" id="paymentsubmit">Submit</button></div></div></div></div>');
                    } else if (result_job.data[0].balance == "0") {

                        $('#deliverymonthpaymentstatusupdate').html('<div class="col-lg-12"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Payment Details</h3></div><div class="card-body"><div class="form-group row"><label class="col-lg-6 col-sm-12">Mode Payment </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].mode_payment + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Amount Paid </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].amount_paid + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Payment Remarks </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].payment_remarks + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Balance</label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].balance + '</div></div></div></div></div></div>');
                    } else {
                        // $('#withoutpaymentstatusupdate').html('<div class="row"><div class="col-lg-12"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title">Payment</h3></div><input type="text" name="id" value="' + result_job.data[0].total + '"><div class="card-body"><div class="form-group row"><label class="col-form-label text-right col-lg-3 col-sm-12">Mode of Payment <span style="color:red">*</span></label><div class="col-lg-9 col-md-9 col-sm-12"><select class="form-control" name="mode_payment" id="mode_payment" required><option selected disabled>Select</option><option value="cash">Cash</option><option value="cheque">Cheque</option><option value="upi">UPI</option><option value="neft">NEFT</option><option value="rtgs">RTGS</option></select></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-3 col-sm-12">Amount Paid <span style="color:red">*</span></label><div class="col-lg-9 col-md-9 col-sm-12"><input type="text" class="form-control" name="amount_paid" id="amount_paid" placeholder="Enter your Amount Paid" required /></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-3 col-sm-12">Remarks <span style="color:red">*</span></label><div class="col-lg-9 col-md-9 col-sm-12"><input type="text" class="form-control" name="payment_remarks" id="payment_remarks" placeholder="Enter your Remark" /></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-3 col-sm-12">Balance <span style="color:red">*</span></label><div class="col-lg-9 col-md-9 col-sm-12"><input type="text" class="form-control" name="balance" id="balance" readonly placeholder="Enter your Balance" /></div></div></div></div><div class="card-footer"><div class="row"><div class="col-lg-12"><button type="submit" class="btn btn-primary font-weight-bold mr-2" name="paymentsubmit" id="submit">Submit</button></div></div></div></div>');					
                        $('#deliverymonthpaymentstatusupdate').html('<div class="row"><div class="col-lg-12"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Payment</h3><h1 class="card-title" style="color:green">Total: ' + result_job.data[0].total + ' </h1></div><input type="hidden"  name="total" value="' + result_job.data[0].total + '"><input type="hidden"  name="balance" value="' + result_job.data[0].balance + '"><div class="card-body"><div class="form-group row"><h6 class="col-lg-8 col-md-8 col-sm-12"></h6><h6 class="col-lg-4 col-md-4 col-sm-12" style="color:green">Balance: ' + result_job.data[0].balance + ' </h6></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Mode of Payment <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><select class="form-control" name="mode_payment" id="mode_payment" required><option selected disabled>Select</option><option value="cash">Cash</option><option value="cheque">Cheque</option><option value="upi">UPI</option><option value="neft">NEFT</option><option value="rtgs">RTGS</option></select></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Amount Paid <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="amount_paid" id="amount_paid" placeholder="Enter your Amount Paid" required /></div></div><div class="form-group row"><label class="col-form-label text-right col-lg-5 col-sm-12">Remarks <span style="color:red">*</span></label><div class="col-lg-7 col-md-7 col-sm-12"><input type="text" class="form-control" name="payment_remarks" id="payment_remarks" placeholder="Enter your Remark" /></div></div><div class="form-group row"></div></div><div class="card-footer"><div class="row"><div class="col-lg-8"></div><div class="col-lg-4"><button type="submit" class="btn btn-primary font-weight-bold mr-2" name="paymentsubmit" id="paymentsubmit">Submit</button></div></div></div></div></div><br><br><div class="col-lg-12"><div class="card card-custom example-compact"><div class="card-header"><h3 class="card-title" style="color: #1BC5BD;">Payment Details</h3></div><div class="card-body"><div class="form-group row"><label class="col-lg-6 col-sm-12">Mode Payment </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].mode_payment + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Amount Paid </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].amount_paid + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Payment Remarks </label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].payment_remarks + '</div></div><div class="form-group row"><label class="col-lg-6 col-sm-12">Balance</label><div class="col-lg-6 col-md-6 col-sm-12">' + result_job.data[0].balance + '</div></div></div></div></div></div>');
                    }
                }
            });
        });
    });

    $(document).ready(function() {
        $('#example').on('click', '.tracking_location', function() {
            var track_id = $(this).attr('id');
            $.ajax({
                url: "ajax_request.php?action=fetch_location&track_id=" + id,
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

    $(document).ready(function() {
        $('#example').on('click', '.delete_branch', function() {
            var id = $(this).attr('id');

            Swal.fire({

                title: 'Are you sure?',
                //   text: 'Some text.',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1BC5BD',
                confirmButtonText: 'Yes!',
                cancelButtonText: 'Cancel'
            }).then(function(e) {
                if (e.value) {
                    $.ajax({
                        url: "ajax_request.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "action": "delete_lrform",
                            "id": id
                        },
                        success: function(result_job) {
                            if (result_job.status == 1) {
                                $('#example').DataTable().ajax.reload();
                            }
                        }
                    });
                } else {}
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#example').on('click', '.all_delivery', function() {
            var id = $(this).attr('delivery-id');
            $('#alldelivery_user_id').val(id);

        });

    });

    $(document).ready(function() {
        $('#example').on('click', '.all_payment', function() {
            var id = $(this).attr('delivery-id');
            $('#all_payment_id').val(id);
        });
    });

    $(document).ready(function() {
        $('#example').on('click', '.all_delivery_tracking', function() {
            var id = $(this).attr('id');
            $('#alldelivery_user_modal_id').val(id);
        });
    });

    $(document).ready(function() {
        $('#example').on('click', '.all_delivery_tracking', function() {
            var id = $(this).attr('id');
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

    $("#Filter2").on("click", function() {
        var fromdate2 = $("#fromdate2").val();
        // alert(fromdate2);
        var fromname2 = $("#form_name2").val();
        // alert(fromname2);
        $('#filter_delivery').html('');
        $.ajax({
            url: "ajax_request.php",
            type: "POST",
            dataType: "json",
            data: {
                "action": "fetch_handle_withdelivery",
                "fromdate2": fromdate2,
                "fromname2": fromname2
            },
            success: function(result_job) {
                $('#filter_delivery').html('<tr><td>' + result_job.data[0].id + '</td><td>' + result_job.data[0].from_name + '</td><td>' + result_job.data[0].createdAt + '</td><td>' + result_job.data[0].total + '</td><td>' + result_job.data[0].amount_paid + '</td><td>' + result_job.data[0].balance + '</td> <td></td></tr>');
            }
        });
    });

    var eventFired = function(type) {
        var n = document.querySelector('#example');
        n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
        n.scrollTop = n.scrollHeight;
    }
    $(document).ready(function() {
        $('#example').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
        });
    });
</script>
<script>
    var eventFired = function(type) {
        var n = document.querySelector('#kt_datatable3');
        n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
        n.scrollTop = n.scrollHeight;
    }
    $(document).ready(function() {
        $('#kt_datatable3').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
        });
    });

    var eventFired = function(type) {
        var n = document.querySelector('#example1');
        n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
        n.scrollTop = n.scrollHeight;
    }
    $(document).ready(function() {
        $('#example1').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
        });
    });
</script>
<script>
    var eventFired = function(type) {
        var n = document.querySelector('#kt_datatable5');
        n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
        n.scrollTop = n.scrollHeight;
    }
    $(document).ready(function() {
        $('#kt_datatable5').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
        });
    });


    var eventFired = function(type) {
        var n = document.querySelector('#example2');
        n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
        n.scrollTop = n.scrollHeight;
    }
    $(document).ready(function() {
        $('#example2').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
        });
    });
</script>
<script>
    var eventFired = function(type) {
        var n = document.querySelector('#kt_datatable7');
        n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
        n.scrollTop = n.scrollHeight;
    }
    $(document).ready(function() {
        $('#kt_datatable7').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
        });
    });

   
</script>
<script>
    var eventFired = function(type) {
        var n = document.querySelector('#kt_datatable9');
        n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
        n.scrollTop = n.scrollHeight;
    }
    $(document).ready(function() {
        $('#kt_datatable9').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
        });
    });

    var eventFired = function(type) {
        var n = document.querySelector('#example4');
        n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
        n.scrollTop = n.scrollHeight;
    }
    $(document).ready(function() {
        $('#example4').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#example5').on('click', '.deliverystatus', function() {
            var id = $(this).attr('delivery-id');
            // alert(id);
            $('#deliverystatus_id').val(id);

            $.ajax({
                url: "ajax_request.php",
                type: "POST",
                dataType: "json",
                data: {
                    "action": "monthtrackingbranchstatus",
                    "id": id
                },
                success: function(result_job) {
                    // alert(result_job.data[0].id)
                    if (result_job.data[0].id !== "") {
                        $('#monthtrackingstatusupdate').html(' <div class="form-group row"><label class="col-form-label text-right col-lg-3 col-sm-12">No of Stop <span style="color:red">*</span></label><div class="col-lg-9 col-md-9 col-sm-12"><select class="form-control" aria-label="Default select example" id="no_stop6" name="no_stop6" required><option>Select</option><?php $i = 1;
                                                                                                                                                                                                                                                                                                                                                                                    while ($i <= 100) {
                                                                                                                                                                                                                                                                                                                                                                                        echo '<option>' . $i . '</option>';
                                                                                                                                                                                                                                                                                                                                                                                        $i++;
                                                                                                                                                                                                                                                                                                                                                                                    } ?> </select></div></div> <div class="row mb-3"><div id="emi_list_disp6"></div></div>');
                    } else {
                        $('#monthtrackingstatusupdate').html('<div class="form-group row"><label class="col-form-label text-right col-lg-3 col-sm-12">No of Stop</label></div>');
                    }
                }
            });
        });
    });

    $(document).ready(function() {
        $('#example5').on('click', '.deliverystatus_tracking', function() {
            var id = $(this).attr('delivery-id');
            $('#deliverystatus_user_modal_id').val(id);
        });
    });

    $(document).ready(function() {
        $('#example5').on('click', '.deliverystatus_tracking', function() {
            var id = $(this).attr('delivery-id');
            // alert(id)
            $.ajax({
                url: "ajax_request.php?action=fetch_location_example5&id=" + id,
                type: "POST",
                dataType: "json",

                success: function(result_job) {
                    $('#track_location5').html('');
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
                                $('#track_location5').append('<div class="order-tracking completed"><span class="is-complete"></span><p class="word-position">' + result_job.data[i].repayment + '</p><h6 class="word-position">Arrived on ' + result_job.data[i].repayment_date + '</h6><p class="trackpos"></p></div>');
                            } else {
                                $('#track_location5').append('<div class="order-tracking "><span class="is-complete"><svg xmlns="http://www.w3.org/2000/svg" class="demo" width="2em" height="2em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="white" d="M7.005 3.1a1 1 0 1 1 1.99 0l-.388 6.35a.61.61 0 0 1-1.214 0L7.005 3.1ZM7 12a1 1 0 1 1 2 0a1 1 0 0 1-2 0Z"/></svg></span><p class="word-position">' + result_job.data[i].repayment + '</p><h6 class="word-position">Estimate Time Arrived on ' + result_job.data[i].repayment_date + '</h6><p class="trackpos"><br></p></div>');
                            }
                            // var current_date=d.getDate()+"-"+(d.getMonth() + 1)+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
                        }
                    }
                }
            });
        });

    });

    var eventFired = function(type) {
        var n = document.querySelector('#example5');
        n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
        n.scrollTop = n.scrollHeight;
    }
    $(document).ready(function() {
        $('#example5').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
        });
    });
</script>
<script>
    var eventFired = function(type) {
        var n = document.querySelector('#example10');
        n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
        n.scrollTop = n.scrollHeight;
    }
    $(document).ready(function() {
        $('#example10').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
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


    $(document).ready(function() {
        $("#no_stop6").on("change", function() {
            // alert(len)
            $("#emi_list_disp6").html("");
            $("#emi_list_disp6").append('<table><tr><th></th></tr>');
            var len = $(this).val();
            if (len == 1) {
                $("#emi_list_disp6").append('<tr><td><input type="text" name="repayment' + len + '" class="form-control repayment" placeholder="Enter Desination"/></td><td><input type="datetime-local" name="advance_date' + len + '" class="form-control" /></td> <td><a href="lrdatatable.php" onclick="myFunction()" class="btn btn-sm btn-clean btn-icon mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a></td>   </tr>');
            } else {
                var rows = len;
                for (var i = 0; i < rows; i++) {
                    $("#emi_list_disp6").append('<tr><td><input type="text" name="repayment' + i + '" class="form-control repayment" placeholder="Enter Desination"/></td><td><input type="datetime-local" name="advance_date' + i + '" class="form-control" /><input type="hidden" name="balance_amount" id="repayment1' + len + '" readonly class="form-control" /></td> <td><a href="lrdatatable.php" onclick="myFunction()" class="btn btn-sm btn-clean btn-icon mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/></g></svg></span></a></td>   </tr>');
                }
                // $("#emi_list_disp").append('<tr><td><input type="text" name="repayment'+len+'" id="repayment'+len+'" readonly class="form-control" /><input type="hidden" name="balance_amount" id="repayment1'+len+'" readonly class="form-control" /></td><td><input type="date" name="advance_date" id="repayment1'+len+'" class="form-control"></td></tr>');
            }
            $("#emi_list_disp6").append('</table>')

            $(".repayment").on("change", function() {
                var no_stop6 = $("#no_stop6").val();
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
        App.init();
    });
    var i = 0;
    $('#add').click(function() {
        i++;
        $('#duplicate').append(
            '<div class="row mt-2" id="duplicate' + i + '">  <div class="col-sm-10"><label class="col-form-label text-right col-lg-3 col-sm-12">Destination <span style="color:red">*</span></label><div class="col-lg-4 col-md-4 col-sm-12"><input type="text" class="form-control" name="destination" id="destination" placeholder="Enter your Destination" /></div><div class="col-lg-4 col-md-4 col-sm-12"><div class="input-group input-group-solid date" id="kt_datetimepicker_3" data-target-input="nearest"><input type="text" class="form-control form-control-solid datetimepicker-input" placeholder="Select date & time" data-target="#kt_datetimepicker_3" /><div class="input-group-append" data-target="#kt_datetimepicker_3" data-toggle="datetimepicker"><span class="input-group-text"><i class="ki ki-calendar"></i></span></div></div></div></div><div class="col-sm-2" style="padding-left: 0px !important"><button style="width: 50px; height: 60px; margin: 0; position: absolute; top: 49%;" type="button" name="remove"class="btn btn-danger btn_remove" id="' + i + '">X</button></div></div>');
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#duplicate' + button_id + '').remove();
    });

    function increment(counter) {

    }
</script>
<script>
    function myFunction() {
        alert("Are you want delete this entry?");
    }
</script>
<script>
    $(document).ready(function() {
        $("#mode_transport").change(function() {
            var mode_transport = $(this).val();
            if (mode_transport == "road") {
                $('#productoptClass').show();
            } else {
                $('#productoptClass').hide();
            }
        });
    });

    $(document).ready(function() {
        $("#mode_transport").change(function() {
            var mode_transport = $(this).val();
            if (mode_transport == "train") {
                $('#productoptClass1').show();
            } else {
                $('#productoptClass1').hide();
            }
        });
    });

    $(document).ready(function() {
        $("#mode_transport").change(function() {
            var mode_transport = $(this).val();
            if (mode_transport == "air") {
                $('#productoptClass2').show();
            } else {
                $('#productoptClass2').hide();
            }
        });
    });
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
        $("#mode_transport6").change(function() {
            var mode_transport6 = $(this).val();
            if (mode_transport6 == "road") {
                $('#productoptClass6').show();
            } else {
                $('#productoptClass6').hide();
            }
        });
    });
    $(document).ready(function() {
        $("#mode_transport6").change(function() {
            var mode_transport6 = $(this).val();
            if (mode_transport6 == "train") {
                $('#productoptClass16').show();
            } else {
                $('#productoptClass16').hide();
            }
        });
    });

    $(document).ready(function() {
        $("#mode_transport6").change(function() {
            var mode_transport6 = $(this).val();
            if (mode_transport6 == "air") {
                $('#productoptClass26').show();
            } else {
                $('#productoptClass26').hide();
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
    function fnExcelReport6() {
        var tab_text = "<table border='2px'><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='8'><h1>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;APS CARGOS MOVERS&ensp;&ensp;&ensp;</h1></th></tr><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='8'><h4>102,WALL TEX ROAD,CHENNAI 600003</h4></th></tr><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='8'><h2>TEL NO:- 044-42012933,MOB NO:-9382587896,E-Mail:-apscargo102@gmail.com</h2></th></tr><tr style='bgcolor='#fff82a'>";
        var textRange;
        var j = 0;
        tab = document.getElementById('kt_datatable8'); // id of table
        for (j = 0; j < tab.rows.length; j++) {
            tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
        }
        tab_text = tab_text + "</table>";
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE");
        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            txtArea1.document.open("txt/html", "replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus();
            sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
        } else //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
        return (sa);
    }
</script>
<script>
    function fnExcelReport6() {
        var tab_text = "<table border='2px'><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='8'><h1>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;APS CARGOS MOVERS&ensp;&ensp;&ensp;</h1></th></tr><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='8'><h4>102,WALL TEX ROAD,CHENNAI 600003</h4></th></tr><tr class='col-sm-12 d-flex justify-content-center text-center'><th colspan='8'><h2>TEL NO:- 044-42012933,MOB NO:-9382587896,E-Mail:-apscargo102@gmail.com</h2></th></tr><tr style='bgcolor='#fff82a'>";
        var textRange;

        var j = 0;
        tab = document.getElementById('kt_datatable6'); // id of table
        for (j = 0; j < tab.rows.length; j++) {
            tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
        }
        tab_text = tab_text + "</table>";

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            txtArea1.document.open("txt/html", "replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus();
            sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
        } else //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

        return (sa);
    }
</script>
</body>

</html>