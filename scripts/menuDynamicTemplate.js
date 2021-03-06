export default function menuTemplate(isLoggedIn) {
  const name = sessionStorage.getItem("user")
    ? JSON.parse(sessionStorage.getItem("user")).name
    : "";
  const userLoggedIn = `
    <header class="menu-header">
        <img src="./images/jake-nackos-resized-squere.jpg" width="200" height="200" alt="Profil af Camille">
        <div class="menu-content">
            <p class="menu-name">${name}</p>
            <p class="menu-address">0000, Enhøjningvej 100</p>
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
            <li><a class="navigation-link" href="#">Mine tidligere køb</a></li>
            <li><a class="navigation-link" href="#">Indstillinger</a></li>
            <li><a class="navigation-link" href="#">Favoritter</a></li>
            <li><a class="navigation-link" href="/sell-product">Sælg vare</a></li>
            <li><a class="navigation-link" href="/my-products">Mine Produkter</a></li>
        </ul>
        
        <button id="signoutButton" class="navigation-logout">Log ud</button>
    </div>`;

  const userNotLoggedIn = `
    <header class="menu-header">
        <img src="./images/jake-nackos-resized-squere.jpg" width="200" height="200" alt="Profil af Camille">
        <div class="menu-content">
            <p class="menu-name">Log ind for at tilgå mere</p>        
        </div>
    </header>

    <div class="navigation-content">            
        <a href="/" class="navigation-logout">Log ind</a>
    </div>`;

  const html = isLoggedIn ? userLoggedIn : userNotLoggedIn;

  document.getElementById("navigationMenu").innerHTML = html;
}
