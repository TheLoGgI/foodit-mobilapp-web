<?php
include_once "../server/classes/Api.php";

header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');

$API = new API();
if($_GET['action']=="getAllProducts"){
$res = array(
    "statusText" => 'Success', 
    "status" => 200,
    "data" => $API->products()
);

}

if($_GET['action']=="getSingleProduct"){
$res = array(
    "statusText" => 'Success', 
    "status" => 200,
    "data" => $API->singleProduct($_GET['productId'])
);
}

if($_GET['action']=="sellProduct"){
     $data=file_get_contents('php://input');
    $jsonData=json_decode($data);
   
$res = array(
    "statusText" => 'Success', 
    "status" => 200,
    "data" => $API->sellProduct($jsonData->productId,$jsonData->userId,$jsonData->productWeight)
);

    

}

if($_GET['action']=="getMyProducts"){
    $data=file_get_contents('php://input');
    $jsonData=json_decode($data);
    $userId=intval($jsonData->userId);

$res = array(
    "statusText" => 'Success', 
    "status" => 200,
    "data" => $API->getMyProducts($userId),
    "userid" => $userId

);


}





http_response_code(200);
exit(json_encode($res));