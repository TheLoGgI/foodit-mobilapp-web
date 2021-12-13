<?php
session_start();
include 'DBH.php';


class sellProduct extends Dbh{
private $vareTitel;
private $vareBeskrivelse;
private $vareBedstFor;
private $vareAfhentning;
private $vareAllergener;
private $varePris;
private $vareAfhentningsDag;
private $vareSaelger;
private $vareStatus;
private $tagetFolder="../../images/products/";
private $foodPic;
private $fileType;
private $fileName;
private $validFileTypes=['jpg','jpeg','png'];
private $fileLocation;


function __construct($postVar,$filesVar)
{

    
   
$this->vareTitel=$postVar['producttitle'];
$this->vareBeskrivelse=$postVar['productdescription'];
$this->vareBedstFor=$postVar['bedstbeforedate'];
$this->vareAfhentning=$postVar['pickuptime'];
$this->vareAllergener=$postVar['allergens'];
$this->varePris=$postVar['productprice'];
$this->vareAfhentningsDag=$postVar['pickupdate'];
$this->vareSaelger=$postVar['userIdVar'];
$this->vareVaegt=$postVar['goodsWeight'];
$this->vareStatus=1;
$this->foodPic=$filesVar["fileToUpload"];
$this->fileType=strtolower(pathinfo($this->foodPic["name"],PATHINFO_EXTENSION));
$this->fileName=$this->vareSaelger.time().".".$this->fileType;
$this->validFileTypes=['jpg','jpeg','png'];
$this->fileLocation=$this->tagetFolder.$this->fileName;
var_dump($postVar);
var_dump($filesVar);

$this->uploadToDatabase();

}



private function uploadToDatabase(){
    echo $this->fileType;
    $dbConnection=$this->connect();

$sql="INSERT INTO varer (titel,pris,billede,afhentningstid,saelger,beskrivelse,bedstfor,salgsStatus,afhentningsDag,allergener,vareVaegt) values('$this->vareTitel',$this->varePris,'$this->fileLocation','$this->vareAfhentning','$this->vareSaelger','$this->vareBeskrivelse','$this->vareBedstFor',$this->vareStatus,'$this->vareAfhentningsDag','$this->vareAllergener',$this->vareVaegt)";
var_dump($sql);
$result=$dbConnection->query($sql);
    

if($result){
$this->movePicture();

}
}

private function movePicture(){
    if($this->foodPic['size']<2000000&&in_array($this->filetype,$this->validFileTypes)){


move_uploaded_file($this->foodPic["tmp_name"],$this->tagetFolder.$this->fileName);
echo 'Din vare er blevet sat til salg';
}






}


}

?>