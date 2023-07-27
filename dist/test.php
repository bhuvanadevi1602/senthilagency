<?php
$apiKey =urlencode('1ObuTC6o9EuZGWWeqhWAeA');
$numbers = 9159684938;
$stext =  rawurlencode("Dear {#var#}, A consignment bearing LR No. {#var#}, RR No. {#var#} is booked for your destination under {#var#} in the {#var#} part of the train. Consignee’s contact No. is {#var#}. For more details contact us on {#var#}. Regards, APS Cargo Movers");
$sender =urlencode('APSCAR');
// $templateid="1207166159890887687";
$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender);

        // $otp_no = rand(1000,9999);
    
        //  //$message1 = " DEAR USER YOUR OTP FOR TECSOCKET  VERIFICATION IS '$otp_no' USE THIS PASSCODE TO COMPLETE YOUR LOGIN PROCESS Powered by NEXTGEN BUSINESS DEVELOPERS PVT LTD.";
        //  $message1 = "Dear user Your OTP for Tecsocket verification is $otp_no. use the passcode to complete your login process.TECSOCKET (Powered by Nextgen business developers private limited)";
    
        $postData = array("messages" => $sms_template);
        $type_msg = rawurlencode($postData["messages"]);
        $postData = array("template_id" => $template_id_sms);
    	
    	$msg_template = rawurlencode($postData["template_id"]);
    	
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender);
        // if($data["numbers"]!=""){
          $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey='.$data["apikey"].'&senderid='.$data["sender"].'&channel=2&DCS=0&flashsms=0&number=919159684938,919003352710&text='.$stext.'&route=31&EntityId=1201161889896722595&dlttemplateid=1207166159890887687';
           echo $url;exit;
            $ch = curl_init($url);
        	curl_setopt($ch, CURLOPT_POST, true);
        	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	$response = curl_exec($ch);
        	curl_close($ch);
        	$response0 = $response;
        	$result0=json_decode($response0,true);
    	    $msg_id = $result0["MessageData"][0]['MessageId'];
    	    $ErrorMessage = $result0["ErrorMessage"];
    	    $JobId = $result0["JobId"];
        // }
?>