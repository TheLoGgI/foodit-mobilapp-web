<?php


$dbh = new mysqli($host, $username, $password, $database);
if(!$dbh){
    die("could not connect to the MySQL server: ".mysqli_connect_error());
}



$vareTitel=$_POST['producttitle'];
$vareBeskrivelse=$_POST['productdescription'];
$vareBedstFor=$_POST['bedstbeforedate'];
$vareAfhentning=$_POST['pickuptime'];
$vareAllergener=$_POST['allergens'];
$varePris=$_POST['productprice'];
$vareAfhentningsDag=$_POST['pickupdate'];
$vareSaelger=$_SESSION['user_name'];
$vareStatus=1;

$foodPic=$_FILES["fileToUpload"];
$tagetFolder="../../images/products/";
$fileType=strtolower(pathinfo($foodPic["name"],PATHINFO_EXTENSION));
$fileName=$vareSaelger.time().".".$fileType;
$validFileTypes=['jpg','jpeg','png'];
$fileLocation=$tagetFolder.$fileName;
echo $tagetFolder.$fileName;


$sql="INSERT INTO varer (titel,pris,billede,afhentningstid,saelger,beskrivelse,bedstfor,salgsStatus,afhentningsDag) values('$vareTitel',$varePris,'$fileLocation','$vareAfhentning','$vareSaelger','$vareBeskrivelse','$vareBedstFor',$vareStatus,'$vareAfhentningsDag')";


//if(!empty($vareTitel)&&!empty($vareBeskrivelse)&&!empty($varePris)&&!empty($vareAfhentning)&&!empty($vareBedstFor)&&!empty($vareStatus)){
    if($dbh->query($sql)===TRUE){

  if(move_uploaded_file($foodPic["tmp_name"],$tagetFolder.$fileName)){

    //   if(filesize($foodPic)<2000000){
        
        echo "yo";
        // }else{
//header("location: createUser.php?error=fileToBig");
       
       // }

//var_dump($fileName);
    /*}else{
         header("location: createUser.php?error=wronfFileType");
         exit;
    }
    */
      //header("location: welcome.php?signup=success");

      // exit;
   //    }else{
           //header("location: createUser.php?signup=failed");
       
      // exit;
     //  }
       
   }
}
//else{
//echo "no";

//}
//}









?>