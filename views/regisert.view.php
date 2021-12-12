<section data-route id="register" class="login-container">
        <header class="login-header">
            <img src="./icons/logo.svg" width="250" height="100" alt="foodit trademark">
        </header>
        <form id="signupForm" class="login-form" action="../server/database/processes/signupProcess.php" method="post">
            <div class="input-field">
                <label for="userName">Navn / Firmanavn</label>
                <input type="text" name="userName" id="companyName" autocomplete="name" required>
            </div>
            <div class="input-field">
                <label for="registerCity">Postnummer</label>
                <input type="text" name="registerCity" id="registerCity" autocomplete="address-level2" required>
            </div>
            <div class="input-field">
                <label for="registerAddress">Addresse</label>
                <input type="text" name="registerAddress" id="registerAddress" autocomplete="street-address" required>
            </div>
            <div class="input-field">
                <label for="registerEmail">Email</label>
                <input type="email" name="registerEmail" id="registerEmail" autocomplete="email" required>
            </div>
            <div class="input-field">
                <label for="registerPassword">Kodeord</label>
                <input type="password" name="registerPassword" id="registerPassword" autocomplete="new-password" required>
            </div>
            <div class="input-field">
                <label for="reRegisterPassword">Gentag kodeord</label>
                <input type="password" name="reRegisterPassword" id="reRegisterPasswordrepeat" autocomplete="new-password" required>
            </div>

        <input class="btn btn-primary" type="submit" name="submit" value="Opret bruger">

        </form>
        <img class="bg-figure" src="./images/grocery-bag.jpg" width="600" height="800" alt="indkøbs taske">
</section>
