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
private $uploadFolder="images/products/";
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
$this->fileLocation=$this->uploadFolder.$this->fileName;
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
    if($this->foodPic['size']<2000000&&in_array($this->fileType,$this->validFileTypes)){
        var_dump($this->ResizeImage($this->foodPic, 800, $this->fileName, $this->tagetFolder));
var_dump("det virker");

}else{
    var_dump("Filen var enten for stor eller ikke en tilladt filtype");
}
}

private function  ResizeImage($fileToResize, $resizeDim, $newFileName, $targetFolder) {
        $file = $fileToResize['tmp_name'];
        $fileTarget = $targetFolder . $newFileName;

        // Get the dimensions of the image file and resize it, while keeping the original aspect ratio
        $fileDim = getimagesize($file);
        $width = $fileDim[0];
        $height = $fileDim[1];

        $ratio = $width / $height;

        if($ratio > 1) {
            // Width is larger than height
            $newWidth = $resizeDim;
            $newHeight = $resizeDim / $ratio;
        } else {
            // Height is larger than width
            $newWidth = $resizeDim * $ratio;
            $newHeight = $resizeDim;
        }

        // Create a variable that stores the original image from the file that has been uploaded
        $originalImage = imagecreatefromstring(file_get_contents($file));

        // Create a variable that stores a new (blank) image with the dimensions of the scaled image
        $newImage = imagecreatetruecolor($newWidth, $newHeight);

        // Copy the original image to the new image, while rescaling it accordingly
        imagecopyresampled($newImage, $originalImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height );

        // Create and save the new image as PNG on the computer, and return a bool if it was a success (true) or failed (false)
        $success = imagepng($newImage, $fileTarget);

        // Delete the two images
        imagedestroy($originalImage);
        imagedestroy($newImage);
        return $success;
    }






}




?>