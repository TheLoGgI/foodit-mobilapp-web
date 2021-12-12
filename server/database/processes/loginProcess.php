<?php
header("Content-Type: application/json");
header('Content-language: da');
$protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1');

include('../mysql.php');

$request = json_decode(file_get_contents("php://input"));

if (empty($request->loginEmail)) {

    header("$protocol 400 Ingen email indtasted");
    exit;
}
if (empty($request->loginPassword)) {

    header("$protocol 400 Ingen kodeord indtasted");
    exit;
}


if (!empty($request->loginEmail) && !empty($request->loginPassword)) {

    //Checking valid email
    if (!filter_var($request->loginEmail, FILTER_VALIDATE_EMAIL)) {
        header('Location:/?error=invalidEmail');
        exit;
    }

    // Sanitize user input
    $userEmail = mysqli_real_escape_string($mySQL, strip_tags($request->loginEmail));
    $userPassword = mysqli_real_escape_string($mySQL, $request->loginPassword);

    // Query DB for user data
    $sql = "SELECT * FROM `bruger` WHERE email='$userEmail'";
    $userFound = mysqli_query($mySQL, $sql);

    // If email match, try login else sent "bad request" feedback
    if ($userFound) {

        if (mysqli_num_rows($userFound) > 0) {

            $user = mysqli_fetch_assoc($userFound);
            // Verify password is correct
            if (password_verify($userPassword, $user['kodeord'])) {

                exit(json_encode(
                        array(
                            "statusText" => 'login success',
                            "status" => 200,
                            "user" => json_encode( array(
                                "id" => $user['PK_id'],
                                "email" => $user['email'],
                                "name" => $user['navn'],
                                "userType" => $user['brugerType'],
                                "image" => $user['billede'],
                                "address" => $user['vej'],
                                "postalcode" => $user['postnummer'],
                                "rating" => $user['rating'],
                            ))
                        )
                    ));
            } else {
                // If password wrong, give feedback
                header("$protocol 401 Forkert adgangskode");
                exit;
            }
        } else {

            // If password wrong, give feedback
            header("$protocol 404 Login fejlede, ingen bruger finedes med den email");
            exit;
        }
    }
}
