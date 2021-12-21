<?php
include_once "autoloader.php";
include_once "error_handler.php";


$data = json_decode(file_get_contents("php://input"), TRUE);

$data = $data["callback_query"] ?? $data["message"];

$message = mb_strtolower($data["text"] ?? $data["data"], "UTF-8");

$isResponse = isset($data["reply_to_message"]) ? true : false;

$bot = new BotManager();

if ($isResponse) {
    $bot->checkResponse($message, $data);
} else {
    $bot->executeRequest($message, $data);
}