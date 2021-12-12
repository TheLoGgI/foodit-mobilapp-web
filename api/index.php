<?php
include_once "../server/classes/Api.php";

header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');
$protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1');

// $request = json_decode(file_get_contents("php://input"));

$API = new API();
if ($_GET['action'] == "getAllProducts") {
    $res = array(
        "statusText" => 'Success',
        "status" => 200,
        "data" => $API->products()
    );
}

if ($_GET['action'] == "getSingleProduct") {
    $res = array(
        "statusText" => 'Success',
        "status" => 200,
        "data" => $API->singleProduct($_GET['productId'])
    );
}

if ($_GET['action'] == "sellProduct") {
    $data = file_get_contents('php://input');
    $jsonData = json_decode($data);

    $API->sellProduct($jsonData->productId, $jsonData->userId);
    header("$protocol 200 Success");
    exit;
}



http_response_code(200);
exit(json_encode($res));
