<?php

include_once "Model.php";



class API extends Model
{
    public function products() {
        return $this->getAllProducts();
    }

}
