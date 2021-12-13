<?php
session_start();
include '../classes/SellProduct.php';



$post=$_POST;
$files=$_FILES;
//instances the sellProduct Class using parameters from fetch POST
$sellProduct= new sellProduct($post,$files);


?>