<section data-route id="product" class="product-container">

    <div class="product-informationdetails">

        <div class="product-details">
            <div class="product-image-container">
                <img src="images/products/carrots-200w.jpg" alt="product">
            </div>
            
            <div class="infomation-details">
                <h2>Banner</h2>
                <p class="seller-information">
                    <span class="link">Hanne Kofoed</span>  <br>
                    8000, Aarhus C
                </p>
                <div class="recipe-stars">
                        <img class="star" src="icons/filledstar.svg" alt="">
                        <img class="star" src="icons/filledstar.svg" alt="">
                        <img class="star" src="icons/filledstar.svg" alt="">
                        <img class="star" src="icons/halfstar.svg" alt="">
                        <img class="star" src="icons/unfilledstar.svg" alt="">
                </div>
                <p class="pickup-details">
                Afhenting <br>
                Torsdag mellem 10 - 12    
            </p>
            </div>
    
        </div>
        
        <div class="product-description-details">
            <h3>Beskrivelse</h3>
            <p>Økologisk bannan jeg købte for et par dage siden. Købte en hel klase og kan ikke spise resten.</p>
        </div>
        <div class="product-allergens-details">
            <h3>Allergener</h3>
            <p>Glute​n, Krebsdyr, Æg, Fisk, Jordnødder, Soja</p>
        </div>
        <div class="product-bestbefore-details small-details">
            <h3>Bedst før dato:</h3>
            <p>12. December 2021</p>
        </div>
        <div class="product-pickup-details">
            <h3>Kan afhentes:</h3>
            <p>Hverdage mellme klokken 10 - 16</p>
        </div>
    
        <div class="form-condition">
            <label for="tradingterms">Jeg acceptere Foodit's handelsbetingelser</label>
            <input type="checkbox" name="tradingterms" id="tradingterms">
        </div>
    
        <button class="btn btn-primary">Resevere vare</button>
    </div>

    <div class="similar-products">

            <h3>Varer fra dine favoritter</h3>

        <div class="goods-scroll">
        <div class="goods">
            <div class="goods-image">
                <img class="gd-image" src="../images/banan.png" alt="">
                <div class="price-tag"><h5 class="price">20 kr.</h5></div>
            </div>
        <h4 class="goods-title">Bananer</h4>
        <p class="seller-information">
            Hanne Kofoed <br>
            8000 Aarhus C
        </p>
        </div>
        <div class="goods">
            <div class="goods-image">
                <img class="gd-image" src="../images/banan.png" alt="">
                <div class="price-tag"><h5 class="price">20 kr.</h5></div>
            </div>
        <h4 class="goods-title">Bananer</h4>
        <p class="seller-information">
            Hanne Kofoed <br>
            8000 Aarhus C
        </p>
        </div>
        <div class="goods">
            <div class="goods-image">
                <img class="gd-image" src="../images/banan.png" alt="">
                <div class="price-tag"><h5 class="price">20 kr.</h5></div>
            </div>
        <h4 class="goods-title">Bananer</h4>
        <p class="seller-information">
            Hanne Kofoed <br>
            8000 Aarhus C
        </p>
        </div>
        <div class="goods">
            <div class="goods-image">
                <img class="gd-image" src="../images/banan.png" alt="">
                <div class="price-tag"><h5 class="price">20 kr.</h5></div>
            </div>
        <h4 class="goods-title">Bananer</h4>
        <p class="seller-information">
            Hanne Kofoed <br>
            8000 Aarhus C
        </p>
        </div>
        <div class="goods">
            <div class="goods-image">
                <img class="gd-image" src="../images/banan.png" alt="">
                <div class="price-tag"><h5 class="price">20 kr.</h5></div>
            </div>
        <h4 class="goods-title">Bananer</h4>
        <p class="seller-information">
            Hanne Kofoed <br>
            8000 Aarhus C
        </p>
        </div>
        </div>
    </div>
    
</section>

<script>
    // Listning for custom event page-change from the spa
    document.addEventListener('page-change', (e) => {
        const productId = e.detail.id
        const currentProduct = window.data.find(product => Number(product.id) === productId)
        console.log('currentProduct: ', currentProduct);


    })
</script>