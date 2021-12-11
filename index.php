<!DOCTYPE html>
<html lang="da">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <title>Login Page</title>
    <link href="styles/main.style.css" rel="stylesheet"/>
</head>
<body>
    <div id="infoModel" class="modal modal-error">
        <p id="modalText" class="modal-content">Forkert kodeord</p>
    </div>
    <div class="backdrop" id="backdrop"></div>
    <!-- <div class="shadow-decoration"></div> -->
    <main class="body-wrapper">
        <section data-route id="login" class="login-container">
                <header class="login-header">
                    <img src="./icons/logo.svg" width="250" height="100" alt="foodit trademark">
                </header>
                <form id="loginform" class="login-form" action="server/database/processes/loginProcess.php" method="post">
                    <div class="input-field">
                        <label for="loginEmail">Email</label>
                        <input type="email" name="loginEmail" id="loginEmail" autocomplete="email">
                    </div>
                    <div class="input-field">
                        <label for="loginPassword">Kodeord</label>
                        <input type="password" name="loginPassword" id="loginPassword" autocomplete="current-password">
                    </div>

                <input class="btn btn-primary" type="submit" name="submit" value="Login">

                <a class="btn btn-secoundary to-front" type="button" href="/register">Opret bruger</a>
    
                </form>
                <img class="bg-figure" src="./images/grocery-bag.jpg" width="600" height="800" alt="indkøbs taske">
        </section>

        <?php include_once "./server/autoload.php" ?>


        <?php include "./components/navigation.component.php" ?>
    </main>
 
    <?php include "./components/menu.component.php" ?>


    <script src="scripts/main.js" type="module"></script>
</body>
</html>