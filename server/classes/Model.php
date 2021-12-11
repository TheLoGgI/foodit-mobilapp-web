<?php

include "Dbh.php";


abstract class Model extends Dbh
{
    // Get products
    protected function getAllProducts(){
        $dbConnection = $this->connect();
        
        $sql = "SELECT * FROM productDetailView";
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
    protected function sellProduct($productId,$userid){
        $dbConnection = $this->connect();
        
        $sql = "CALL sellProduct($productId,$userid)";
        $dbConnection->query($sql);
       
        
    }


}