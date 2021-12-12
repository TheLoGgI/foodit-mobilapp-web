<?php


header("Content-Type: application/json");
header('Content-language: da');
$protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1');

$request = json_decode(file_get_contents("php://input"));

    include('../mysql.php');

    if(empty($request->userName)){
        header("$protocol 400 Intet navn indtasted");
        exit;
    } 
    if(empty($request->registerEmail)){
        header("$protocol 400 Ingen email indtasted");
        exit;
    } 
    if(empty($request->registerPassword)){
        header("$protocol 400 Intet kodeord indtasted");
        exit;
    } 
      if(empty($request->reRegisterPassword)){
        header("$protocol 400 Gengiv adgangskode");
        exit;
    } 
     if($request->registerPassword !== $request->reRegisterPassword){
        header("$protocol 400 Adgangskoder stemmer ikke overens");
        exit;
    } 

        // Checking valid email
        if(!filter_var($request->registerEmail, FILTER_VALIDATE_EMAIL)) {
            header("$protocol 400 Skriv en rigtig email");
            exit;
        };
    
        // Sanitize user input
        $userName = mysqli_real_escape_string($mySQL, strip_tags($request->userName)); 
        $userEmail = mysqli_real_escape_string($mySQL, strip_tags($request->registerEmail));
        $userPassword = password_hash(mysqli_real_escape_string($mySQL, $request->registerPassword), PASSWORD_DEFAULT);
        $postalCode = mysqli_real_escape_string($mySQL, strip_tags($request->registerCity)); 
        $vej = mysqli_real_escape_string($mySQL, strip_tags($request->registerAddress)); 
        
        // Query DB for user data
        $sql = "INSERT INTO bruger(navn, email, kodeord, postnummer, vej) VALUES('$userName', '$userEmail', '$userPassword', '$postalCode', '$vej')";
        $inserted = mysqli_query($mySQL, $sql);

        if($inserted){

            header("$protocol 200 Bruger registeret");
            exit;
        } else {
            header("$protocol 400 Fejl, Bruger blev ikke registeret");
            exit;
        }


?>