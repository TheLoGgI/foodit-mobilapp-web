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
    <!-- <div class="shadow-decoration"></div> -->
    <main class="body-wrapper">
        <section data-route id="login" class="login-container">
                <header class="login-header">
                    <img src="./icons/logo.svg" width="250" height="100" alt="foodit trademark">
                </header>
                <form class="login-form" action="" method="post">
                    <div class="input-field">
                        <label for="loginemail">Email</label>
                        <input type="email" name="loginemail" id="loginemail" autocomplete="email">
                    </div>
                    <div class="input-field">
                        <label for="loginpassword">Kodeord</label>
                        <input type="password" name="loginpassword" id="loginpassword" autocomplete="current-password">
                    </div>

                <input class="btn btn-primary" type="submit" value="Login">

                <a class="btn btn-secoundary to-front" type="button" href="/register">Opret bruger</a>
    
                </form>
                <img class="bg-figure" src="./images/grocery-bag.jpg" width="600" height="800" alt="indkøbs taske">
        </section>

        <?php include_once "./server/autoload.php" ?>


        <?php include "./components/navigation.component.php" ?>
    </main>


    <script src="scripts/main.js" type="module"></script>
</body>
</html>