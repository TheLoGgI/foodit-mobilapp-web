<?php

include_once "Model.php";



class API extends Model
{
    public function products() {
        return $this->getAllProducts();
    }
    public function singleProduct($productId) {
        return $this->getSingleProduct($productId);
    }
    public function sellProduct($productId,$userid,$weightOfGoods) {
      return $this->doSellProduct($productId,$userid,$weightOfGoods);
    }
    public function getMyProducts($userId) {
        return $this->getAllMyProducts($userId);
    }

}
