<?php
session_start();
include '../classes/editProduct.php';



$post=$_POST;


$sellProduct= new editProduct($post);


?>