<?php

require 'vendor/autoload.php';

use Telegram\Bot\Api;
$api_url = 'https://api.telegram.org/bot.6034462728:AAFTbW6mLMeD28cb9ZRHZEDAmhbyVuvY_5c';
$telegram = new Api('6034462728:AAFTbW6mLMeD28cb9ZRHZEDAmhbyVuvY_5c');

$response = $telegram->getMe();

$botId = $response->getId();
$firstName = $response->getFirstName();
$username = $response->getUsername();

echo $firstName. "<br>";
echo $username . "<br>";

$update = file_get_contents($api_url . '/getUpdates');
$update_array = json_decode($update, true);
$chats = array();
foreach ($update_array['result'] as $result) {
    $chat = $result['message']['chat'];
    if (!in_array($chat, $chats)) {
        $chats[] = $chat;
    }
}

// Выводим список чатов с их ID
foreach ($chats as $chat) {
    echo $chat['type'] . ' ' . $chat['id'] . ' ' . $chat['title'] . "\n";
}