<?php 
session_start();


if(isset($_POST['submit'])) {
    include('../mysql.php');


    if(empty($_POST['loginEmail'])){
        header('Location:/?error=emptyEmail');
        exit;
    }
    if(empty($_POST['loginPassword'])){
        header('Location:/?error=emptyPassword');
        exit;
    }


    if(!empty($_POST['loginEmail']) && !empty($_POST['loginPassword'])){

        //Checking valid email
        if(!filter_var($_POST['loginEmail'],FILTER_VALIDATE_EMAIL)){
            header('Location:/?error=invalidEmail');
            exit;
        }

        $userEmail = mysqli_real_escape_string($mySQL,strip_tags($_POST['loginEmail']));
        $userPassword = mysqli_real_escape_string($mySQL ,$_POST['loginPassword']);

        $sql = "SELECT * FROM `bruger` WHERE email='$userEmail'";
        // AND password='$userPassword'
        $userFound = mysqli_query($mySQL,$sql);

        if($userFound){

            if(mysqli_num_rows($userFound) > 0){
                while($row = mysqli_fetch_assoc($userFound)){
                    if(password_verify($userPassword,$row['kodeord'])){
                        $_SESSION['navn'] = $row['navn'];
                    }
                    if(!password_verify($userPassword,$row['kodeord'])){
                        header('Location:/?error=passwordWrong');
                        exit;
                    }
                }
            header('Location:/dashboard?success=loggedIn');
            exit;
            } else{
            header('Location:/?error=userloginFailed');
            exit;

            
        }
        }


    }

}


?>