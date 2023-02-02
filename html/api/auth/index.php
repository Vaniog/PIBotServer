<?php
session_start();

require_once("AuthApi.php");

$bot_api = new AuthApi();

$json = json_decode(file_get_contents('php://input'), true);

if ($json == null) {
    $bot_api->Run($_POST);
} else {
    $bot_api->Run($json);
}

print_r($_SESSION);

