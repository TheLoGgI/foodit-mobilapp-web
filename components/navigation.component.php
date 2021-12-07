<nav class="navigation-menu">
    <div class="nav-item">
        <a href="/dashboard">
            <img src="../icons/home.svg" width="30" heigh="40" alt=""> Hjem
        </a>
    </div>
    <div class="nav-item">
        <a href="/recipes">
            <img src="../icons/recipies.svg" width="30" heigh="40" alt=""> Opskrifter
        </a>
    </div>
    <div class="nav-item">
        <a href="#">
            <img src="../icons/search.svg" width="30" heigh="40" alt=""> Søg
        </a>
    </div>
    <div class="nav-item">
        <button class="nav-menu-button" id="navigationMenuButton">
            <img src="../icons/menu.svg" width="30" heigh="40" alt=""> 
            <p>Menu</p>
        </button>
        
    </div>
</nav>

<style>
    .navigation-menu {
        --pd-inline: .5rem;
        --pd-block: 1rem;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: auto;
        justify-content: center;
        align-items: center;
        background-color: white;
        
        width: 100%;
        padding-inline-end: var(--pd-inline);
        padding-inline-start: var(--pd-inline);
        padding-block-end: var(--pd-block);
        padding-block-start: var(--pd-block);
        border-top: 2px solid black;

        position: sticky;
        z-index: 100;
        bottom: 0;
        left: 0;
        right: 0;
    }

    .nav-item a, .nav-item {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        row-gap: .5rem;
    }

    .nav-menu-button {
        font-size: 1rem;
        border: none;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        row-gap: .5rem;
        margin: 0;
        appearance: none;
        -webkit-appearance: none;
    }

</style>

<script>
    const menuBtn = document.getElementById('navigationMenuButton')
    const backdrop = document.getElementById('backdrop')

    menuBtn.addEventListener('click', (e) => {
        const menu = document.getElementById('navigationMenu')
        menu.classList.toggle('menu-open')
        backdrop.classList.toggle('backdrop-active')
    })
    
    backdrop.addEventListener('click', (e) => {
        const menu = document.getElementById('navigationMenu')
        menu.classList.toggle('menu-open')
        backdrop.classList.toggle('backdrop-active')
    })




</script>