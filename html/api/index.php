<?php
use function UI\run;

require_once("BotApi.php");


$bot_api = new BotApi;
$json = json_decode(file_get_contents('php://input'), true);

$bot_api->run($json);