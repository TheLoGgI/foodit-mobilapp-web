<?php
include '../database/creditials.php';
session_start();
$_SESSION['brugerID']=5;



$dbh = new mysqli($host, $username, $password, $database);
if(!$dbh){
    die("could not connect to the MySQL server: ".mysqli_connect_error());
}


var_dump($_POST);
var_dump($_FILES);

$vareTitel=$_POST['titel'];
$vareBeskrivelse=$_POST['beskrivelse'];
$vareBedstFor=$_POST['bedstFor'];
$vareAfhentning=$_POST['afhentning'];
$vareAllergener=$_POST['allergener'];
$varePris=$_POST['pris'];
$vareSaelger=$_SESSION['brugerID'];
$vareStatus=1;

$sql="INSERT INTO varer (titel,pris,billede,afhentningstid,saelger,beskrivelse,bedstFor,salgsStatus) 
values('$vareTitel',$varePris,'billede','$vareAfhentning',$vareSaelger,'$vareBeskrivelse','$vareBedstFor',$vareStatus)";
/*


$sql="INSERT INTO varer (titel,pris,billede,afhentningstid,saelger,beskrivelse,bedstfor,salgsStatus) values('$vareTitel',50,'billede','2020-12-24 21:21:21','lasse','beskrivelse','2021-12-25',1)";
*/

//$dbh->query($sql);
if($dbh->query($sql)){
echo "yo";

}else{
    echo"no";
    var_dump($sql);

}

var_dump($host);

?>