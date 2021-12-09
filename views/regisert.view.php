<?php
/*
include('../server/database/DBH.php'); */
?>




<section data-route id="register" class="login-container">
        <header class="login-header">
            <img src="./icons/logo.svg" width="250" height="100" alt="foodit trademark">
        </header>
        <form class="login-form" action="../server/database/processes/signupProcess.php" method="post">
            <div class="input-field">
                <label for="userName">Navn / Firmanavn</label>
                <input type="text" name="userName" id="companyName" autocomplete="name">
            </div>
            <div class="input-field">
                <label for="registerEmail">Email</label>
                <input type="email" name="registerEmail" id="registerEmail" autocomplete="email">
            </div>
            <div class="input-field">
                <label for="registerPassword">Kodeord</label>
                <input type="password" name="registerPassword" id="registerPassword" autocomplete="new-password">
            </div>
            <div class="input-field">
                <label for="reRegisterPassword">Gentag kodeord</label>
                <input type="password" name="reRegisterPassword" id="reRegisterPasswordrepeat" autocomplete="new-password">
            </div>

        <input class="btn btn-primary" type="submit" name="submit" value="Login">

        <a class="btn btn-secoundary to-front" type="button" href="/">Opret bruger</a>

        </form>
        <img class="bg-figure" src="./images/grocery-bag.jpg" width="600" height="800" alt="indkøbs taske">
</section>
