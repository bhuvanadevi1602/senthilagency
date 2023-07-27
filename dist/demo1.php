<?php

 $lr_no=2144;
        $agents="yes";
        $from_name="helan";
        $from_contact=9159684938;
        $to_name="regies";
        $to_contact=8072126961;
        $agent_name="aakash";
        $agent_contact=8754329449;
        if($agents=='yes')
        {
            $sender="sender";
            $receiver="receiver";
            $agent="agent";
            if($sender=="sender")
            {
                $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                $stext =  rawurlencode("Dear $from_name, Your consignment bearing LR No. $lr_no has been successfully delivered. For more details contact us on 93825 86897. Regards, APS Cargo Movers");
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
            if($receiver=="receiver")
            {
                $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                $stext =  rawurlencode("Dear $to_name, Your consignment bearing LR No. $lr_no has been successfully delivered. For more details contact us on 93825 86897. Regards, APS Cargo Movers");
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
            if($agent=="agent")
            {
                $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                $stext =  rawurlencode("Dear $agent_name, Your consignment bearing LR No. $lr_no has been successfully delivered. For more details contact us on 93825 86897. Regards, APS Cargo Movers");
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
        }
        else if($agents=='no')
        {
            $sender="sender";
            $receiver="receiver";
            if($sender=="sender")
            {
                $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                $stext =  rawurlencode("Dear $from_name, Your consignment bearing LR No. $lr_no has been successfully delivered. For more details contact us on 93825 86897. Regards, APS Cargo Movers");
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
            if($receiver=="receiver")
            {
                $apiKey = urlencode('1ObuTC6o9EuZGWWeqhWAeA');
                $stext =  rawurlencode("Dear $to_name, Your consignment bearing LR No. $lr_no has been successfully delivered. For more details contact us on 93825 86897. Regards, APS Cargo Movers");
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
?>