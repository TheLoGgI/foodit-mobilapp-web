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

}