<?php
session_start();
include 'DBH.php';


// this class does the same as the sellProduct Class, except handling the image
class editProduct extends Dbh{
    private $vareTitel;
    private $vareBeskrivelse;
    private $vareBedstFor;
    private $vareAfhentning;
    private $vareAllergener;
    private $varePris;
    private $vareAfhentningsDag;
    private $vareSaelger;

    function __construct($postVar)
    {
        $this->vareTitel=$postVar['producttitle'];
        $this->vareBeskrivelse=$postVar['productdescription'];
        $this->vareBedstFor=$postVar['bedstbeforedate'];
        $this->vareAfhentning=$postVar['pickuptime'];
        $this->vareAllergener=$postVar['allergens'];
        $this->varePris=$postVar['productprice'];
        $this->vareAfhentningsDag=$postVar['pickupdate'];
        $this->vareSaelger=$postVar['userIdVar'];
        $this->vareId=$postVar['productIdVar'];
        $this->vareStatus=1;
        var_dump($postVar);
        $this->uploadToDatabase();
    }



    private function uploadToDatabase(){
        $dbConnection=$this->connect();

        $sql="UPDATE varer SET pris = $this->varePris, titel = '$this->vareTitel', afhentningstid = '$this->vareAfhentning', beskrivelse = '$this->vareBeskrivelse', bedstFor = '$this->vareBedstFor', afhentningsDag = '$this->vareAfhentningsDag', allergener = '$this->vareAllergener' WHERE PK_id=$this->vareId AND saelger=$this->vareSaelger";
        var_dump($sql);
        $result=$dbConnection->query($sql);
        if($result){
            var_dump(" Det virker");
        }
    }



}

?>