<?php

//BOT
function processMessage($message) {
    $kanal = '@channel-name'; //channel id
    $admins = array(123456, 034); // admins id
    // process incoming message
    $message_id = $message['message_id'];
    $chat_id = $message['chat']['id'];
    if (isset($message['text'])) {
        // incoming text message
        $text = $message['text'];

        if (strpos($text, "/start") === 0) {
            apiRequestJson("sendMessage", array('chat_id' => $chat_id, "text" => 'Hello! Welcome to TX Checker Bot! Send your TX to see some info about your transaction. Just Bitcoin TX.'));
        } else if (strpos($text, "$text") === 0) {
            $url = "https://chain.so/api/v2/tx/BTC/$text";
$json = json_decode(file_get_contents($url), true);
$txid = $json["data"]["txid"];
$fee = $json["data"]["fee"];
$sentvalue = $json["data"]["sent_value"];
$confirmation = $json["data"]["confirmations"];
$block = $json["data"]["block_no"];
$info = "TX ID: $txid \n Sent Value: $sentvalue \n Fee: $fee \n Block Number: $block \n Confimations: $confirmation";
            apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => "$info"));
        } elseif (strpos($text, "/kanal") === 0){
//            apiRequestWebhook("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "HTML", "reply_to_message_id" => $message_id, "text" => $text));
            if (in_array($message['chat']['id'], $admins)) {
                
              
            } 
        } 
    } 
}

?>

