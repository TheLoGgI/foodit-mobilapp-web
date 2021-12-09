<?php

include_once "Model.php";



class API extends Model
{
    public function products() {
        return $this->getAllProducts();
    }


    public function users($query = null, $limit = 100) {
        if (!empty($query)) {
            return $this->queryUsers($query, $limit);
        }

        return $this->getAllUsers();
    }

    public function user($uuid) {
        return $this->getUser($uuid);
    }

    public static function getQueryParam($queryparam) {
        if (isset($_GET[$queryparam])) {
            return $_GET[$queryparam];
        }
    
        if (isset($_POST[$queryparam])) {
            return $_POST[$queryparam];
        }
        
        return null;
    }

    


}
