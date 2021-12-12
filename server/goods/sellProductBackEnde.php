<?php
session_start();
include '../classes/SellProduct.php';



$post=$_POST;
$files=$_FILES;

$sellProduct= new sellProduct($post,$files);


?>