<!DOCTYPE html>
<html lang="da">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <title>Login Page</title>
    <link href="styles/login.style.css" rel="stylesheet"/>
    <link href="styles/onboarding.style.css" rel="stylesheet"/>
</head>
<body>
    <div class="modal modal-error" data-background-color="#0561b8">
        <p id="modalText" class="modal-content">Forkert kodeord</p>
    </div>
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

    <div class="menu" data-background-color="#0561b8">
        <header class="menu-header">
            <img src="./images/jake-nackos-resized-squere.jpg" width="200" height="200" alt="Profil af Camille">
            <div class="menu-content">
                <p class="menu-name">Camille Henriksen</p>
                <p class="menu-address">8900, Randers</p>
                
                <a href="/profil" class="menu-profil">Se min profil</a>
            </div>
        </header>

        <div class="menu-content">
            <a href="#">Mine tidliger køb</a>
            <a href="#">Indstillinger</a>
            <a href="#">Favoritter</a>
            <a href="#">Sælg vare</a>
            
            <button>Logud</button>
        </div>

    </div>


    <script src="scripts/main.js" type="module"></script>
</body>
</html>