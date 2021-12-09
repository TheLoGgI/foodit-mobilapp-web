<?php

session_start();


if(isset($_POST['submit'])) {
    include('../../classes/DBH.php');

    if(empty($_POST['userName'])){
        header('Location:../../../views/register?error=emptyName');
        exit;
    } 
    if(empty($_POST['registerEmail'])){
        header('Location:../../../views/register?error=emptyEmail');
        exit;
    } 
    if(empty($_POST['registerPassword'])){
        header('Location:../../../views/register?error=emptyPassword');
        exit;
    } 
      if(empty($_POST['reRegisterPassword'])){
        header('Location:../../../views/register?error=emptyRePassword');
        exit;
    } 
     if($_POST['registerPassword'] !== $_POST['reRegisterPassword']){
        header('Location:../../../views/register?error=passwordNeedToMatch');
        exit;
    } 

    if(!empty($_POST['userName']) && !empty($_POST['registerEmail']) && !empty($_POST['registerPassword']) && !empty($_POST['reRegisterPassword'])) {
        // Checking valid email

        if(!filter_var($_POST['registerEmail'], FILTER_VALIDATE_EMAIL)) {
            header('Location:../../../views/register?error=invalidEmail');
            exit;
        };
    
    /*    

    */
        $userName = mysqli_real_escape_string($dbh, strip_tags($_POST['userName'])); 
        $userEmail = mysqli_real_escape_string($dbh, strip_tags($_POST['registerEmail']));
        $userPassword = password_hash(mysqli_real_escape_string($dbh,$_POST['registerPassword']), PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO bruger(navn, email, kodeord) VALUES('$userName', '$userEmail', '$userPassword')";
        
        $inserted = mysqli_query($dbh, $sql);

        if($inserted){
            $_SESSION['user_name'] = $userName;

            header('Location:../../../?success=userCreated');
            exit;
        }else {
            header('Location:../../../views/register?error=userCreateFailed');
            exit;
        }

}}
?>