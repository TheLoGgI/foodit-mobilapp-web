


     <?php
    if(!isset($_SESSION['navn'])) {
  ?>

     <div class="menu" id="navigationMenu">
        <header class="menu-header">
            <img src="./images/jake-nackos-resized-squere.jpg" width="200" height="200" alt="Profil af Camille">
            <div class="menu-content">
                <p class="menu-name">Log ind for at tilgå mere</p>
                
        
            </div>
        </header>

        <div class="navigation-content">            
            <a href="/" class="navigation-logout">Log ind</a>
        </div>

    </div>


  <?php
    } else {
      ?>



      <div class="menu" id="navigationMenu">
        <header class="menu-header">
            <img src="./images/jake-nackos-resized-squere.jpg" width="200" height="200" alt="Profil af Camille">
            <div class="menu-content">
                <p class="menu-name"><?php echo ucfirst($_SESSION['userName']);?></p>
                <p class="menu-address">8900, Randers</p>
                <div class="rating" title="3 ud af 5 stjerner">
                    <img src="./icons/star-fill.svg" width="10" height="10" alt="star rating">
                    <img src="./icons/star-fill.svg" width="10" height="10" alt="star rating">
                    <img src="./icons/star-fill.svg" width="10" height="10" alt="star rating">
                    <img src="./icons/star-fill.svg" width="10" height="10" alt="star rating">
                    <img src="./icons/star-nofill.svg" width="10" height="10" alt="star rating">
                </div>
                
                <a href="/profil" class="menu-profil">Se min profil</a>
            </div>
        </header>

        <div class="navigation-content">
            <ul class="navigation-list">
                <li><a class="navigation-link" href="#">Mine tidliger køb</a></li>
                <li><a class="navigation-link" href="#">Indstillinger</a></li>
                <li><a class="navigation-link" href="#">Favoritter</a></li>
                <li><a class="navigation-link" href="/sell-product">Sælg vare</a></li>
            </ul>
            
            <a class="navigation-logout" href="../server/database/processes/logoutProcess.php">Log ud</a>
        </div>

    </div>
     
  <?php
    }
  ?>