<?php
session_start();
include '../classes/editProduct.php';



$post=$_POST;

//instances the editProduct Class using parameters from fetch POST
$sellProduct= new editProduct($post);


?>