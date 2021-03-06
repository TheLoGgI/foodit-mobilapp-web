<?php

include "DBH.php";


abstract class Model extends Dbh
{
    // Get products
    protected function getAllProducts(){
        $dbConnection = $this->connect();
        
        $sql = "SELECT * FROM productDetailView WHERE salesStatus !=0";
        $result = $dbConnection->query($sql);

        if ($result->num_rows !== 0) {
        
            $userDataCollection = [];   
            while ($obj = $result->fetch_object("stdClass")) {
                $userDataCollection[] = $obj;
            }
            return $userDataCollection;
        }
    }
    protected function getSingleProduct($productId){
        $dbConnection = $this->connect();
        
        $sql = "SELECT * FROM singleProduct WHERE vareId=$productId";
        $result = $dbConnection->query($sql);

        if ($result->num_rows !== 0) {
        
            $userDataCollection = [];   
            while ($obj = $result->fetch_object("stdClass")) {
                $userDataCollection[] = $obj;
            }
            return $userDataCollection;
        }
    }
    protected function doSellProduct($productId,$userid,$weightOfGoods){
        $dbConnection = $this->connect();
        
        $sql = "CALL sellProduct($productId,$userid,$weightOfGoods)";
        $dbConnection->query($sql);
        $sql2="SELECT vaegtReddet FROM bruger WHERE PK_id=$userid";

 $result = $dbConnection->query($sql2);

        if ($result->num_rows !== 0) {
        
            $userDataCollection = [];   
            while ($obj = $result->fetch_object("stdClass")) {
                $userDataCollection[] = $obj;
            }
            return $userDataCollection;
        } 



    }
protected function getAllMyProducts($userId){
        $dbConnection = $this->connect();
        
        $sql = "SELECT * FROM productDetailView where seller=$userId";
        $result = $dbConnection->query($sql);
        

        if ($result->num_rows !== 0) {
        
            $userDataCollection = [];   
            while ($obj = $result->fetch_object("stdClass")) {
                $userDataCollection[] = $obj;
            }
            return $userDataCollection;
        } 
        
    }


    


}