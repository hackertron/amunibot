<?php

/*

*/
require 'vendor/autoload.php';
require 'faq.php';
require 'puns.php';

$client = new Zelenin\Telegram\Bot\Api(''); // Set your access token
$url = ''; // URL RSS feed
$update = json_decode(file_get_contents('php://input'));

//your app
try {

    if($update->message->text == '/author')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
        	'chat_id' => $update->message->chat->id,
        	'text' => "This bot is created by Jayaditya Gupta and Mayank Mishra."
     	]);
    }
    else if($update->message->text == '/help')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "List of commands :\n /author -> bot author info \n /puns -> Get the puns \n /faq -> get ans for FAQ \n 
    		/help -> Shows list of available commands"
    		]);

    }
    else if($update->message->text == '/puns')
    {
    		$pun = get_puns();
			$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
			$response = $client->sendMessage([
					'chat_id' => $update->message->chat->id,
					'text' => $pun
				]);

    }
    else if(preg_match('/^\/faq .*/', $update->message->text))
    {
        $query = str_replace('/faq','', $update->message->text);
    	$ans = get_ans($query);

    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
			$response = $client->sendMessage([
					'chat_id' => $update->message->chat->id,
					'text' => $ans
				]);
    }
    else
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "Invalid command, please use /help to get list of available commands"
    		]);
    }

} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}
