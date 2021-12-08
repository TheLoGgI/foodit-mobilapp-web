<?php
include_once "../server/classes/Api.php";

header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');

$API = new API();

$res = array(
    "statusText" => 'Success', 
    "status" => 200,
    "data" => $API->products()
);

http_response_code(200);
exit(json_encode($res));