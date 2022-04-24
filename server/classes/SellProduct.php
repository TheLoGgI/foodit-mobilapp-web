<?php
session_start();
include 'DBH.php';

// this class does the whole process of when a product is put up for sale
// it extends the Dbh class from DBH.php
class sellProduct extends Dbh{
//all the variables are declared
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


//the construct function is excecuted when the class is initalized
// it takes 2 parameters, the post variables and the files variable, which is given to it grom $_POST and $_FILES
// it then sets all of the variables using these parameters
function __construct($postVar,$filesVar){
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

//when all parameters are set, it calls uploadToDataBase()
$this->uploadToDatabase();

}


// this function uses the connect function from the Dbh class
// It creates the sql insert into string
// uses it to do a query to the database
// if the query is succsesfull it wil call movePicture()
private function uploadToDatabase(){
    $dbConnection=$this->connect();
    $sql="INSERT INTO varer (titel,pris,billede,afhentningstid,saelger,beskrivelse,bedstfor,salgsStatus,afhentningsDag,allergener,vareVaegt) values('$this->vareTitel',$this->varePris,'$this->fileLocation','$this->vareAfhentning','$this->vareSaelger','$this->vareBeskrivelse','$this->vareBedstFor',$this->vareStatus,'$this->vareAfhentningsDag','$this->vareAllergener',$this->vareVaegt)";
    $result=$dbConnection->query($sql);
    if($result){
        $this->movePicture();
    }
}

//This function checks the size of the file to upload and if it is a valid fileType
// If that is the case it will call ResizeImage()
private function movePicture(){
    if($this->foodPic['size']<2000000&&in_array($this->fileType,$this->validFileTypes)){
        $this->ResizeImage($this->foodPic, 800, $this->fileName, $this->tagetFolder);
    }else{
        // Filen var enten for stor eller ikke en tilladt filtype
    }
}

// this function resizes the image and uploads it to the server
private function  ResizeImage($fileToResize, $resizeDim, $newFileName, $targetFolder) {
        $file = $fileToResize['tmp_name'];
        $fileTarget = $targetFolder . $newFileName;
        // Gets the dimensions of the image file and resize it, while keeping the original aspect ratio
        $fileDim = getimagesize($file);
        $width = $fileDim[0];
        $height = $fileDim[1];
        //calculates the ratio
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

        // Creates a variable that stores the original image from the file that has been uploaded
        $originalImage = imagecreatefromstring(file_get_contents($file));

        // Creates a variable that stores a new (blank) image with the dimensions of the scaled image
        $newImage = imagecreatetruecolor($newWidth, $newHeight);

        // Copies the original image to the new image, while rescaling it accordingly
        imagecopyresampled($newImage, $originalImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height );

        // Creates and saves the new image as PNG on the computer, and return a bool if it was a success (true) or failed (false)
        $success = imagepng($newImage, $fileTarget);

        // Deletes the two images
        imagedestroy($originalImage);
        imagedestroy($newImage);
        return $success;
    }






}




?>