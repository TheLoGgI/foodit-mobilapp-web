<section data-route id="product" class="product-container">

    <div class="product-informationdetails" id="product-informationDetails">

        <div class="product-details" id="product-details">
            <div class="product-image-container">
                <img src="images/products/carrots-200w.jpg" alt="product">
            </div>

            <div class="infomation-details">
                <h2>Banner</h2>
                <p class="seller-information">
                    <span class="link">Hanne Kofoed</span> <br>
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
                    <div class="price-tag">
                        <h5 class="price">20 kr.</h5>
                    </div>
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
                    <div class="price-tag">
                        <h5 class="price">20 kr.</h5>
                    </div>
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
                    <div class="price-tag">
                        <h5 class="price">20 kr.</h5>
                    </div>
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
                    <div class="price-tag">
                        <h5 class="price">20 kr.</h5>
                    </div>
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
                    <div class="price-tag">
                        <h5 class="price">20 kr.</h5>
                    </div>
                </div>
                <h4 class="goods-title">Bananer</h4>
                <p class="seller-information">
                    Hanne Kofoed <br>
                    8000 Aarhus C
                </p>
            </div>
        </div>
    </div>
    <div class="popup-overlay" id="popupOverlay">
        <div class="reserve-popup" id="reservePopup">
            <button class="close-popup" id="closePopup"><img src="icons/close_black_24dp.svg" alt=""></button>
            <form action=""> </form>
            <h3>Resevere vare</h3>
            <p>Ved klik på nedenstående knap, accepterer du at afhente givne varer indenfor det angivede afhentningstidspunkt.</p>
            <button class="btn btn-primary" id="reserveProduct">Jeg bekræfter min reservation</button>
            <button class="btn btn-regret">Fortyd</button>
        </div>

    </div>


</section>

<script>
    let _currentProduct;
    // Listning for custom event page-change from the spa
    document.addEventListener('page-change', (e) => {
        console.log('e: ', e);
        const productId = e.detail.id
        const route = e.detail.route.title
        if (route === 'product') {
            _currentProduct = window.data.find(product => Number(product.id) === productId)
            console.log('currentProduct: ', _currentProduct);
            fetchProduct(_currentProduct.id)
        }

    })
    async function fetchProduct(productId) {
        const url = "http://localhost:3000/api?action=getSingleProduct&productId=" + productId;
        const options = {
            method: 'get',
            requestUrl: url,
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        }
        const response = await fetch(options.requestUrl, options)

        if (response.ok) {
            const requestData = await response.json()

            productData = requestData.data
            constructElement(productData[0])
        } else {
            console.warn('fetch din\'t complete as intended')
        }
    }

    function constructElement(data) {

        data.pickupDay = data.pickupDay.substr(8, 4) + "-" + data.pickupDay.substr(5, 2) + "-" + data.pickupDay.substr(0, 4)
        data.bestBefore = data.bestBefore.substr(8, 4) + "-" + data.bestBefore.substr(5, 2) + "-" + data.bestBefore.substr(0, 4)
        const container = document.getElementById('product-informationDetails')
        const htmlString = /*html*/ `
               <div class="product-details" id="product-details">
            <div class="product-image-container">
                <img src="${data.image}" alt="product">
            </div>
            
            <div class="infomation-details">
                <h2>${data.title}</h2>
                <p class="seller-information">
                    <span class="link">${data.sellerName}</span>  <br>
                    ${data.sellerAdress} ${data.postalCode} 
                </p>
                <div class="recipe-stars">
                ${data.sellerRating}/5
                        <img class="star" src="icons/filledstar.svg" alt="">
                        <img class="star" src="icons/filledstar.svg" alt="">
                        <img class="star" src="icons/filledstar.svg" alt="">
                        <img class="star" src="icons/halfstar.svg" alt="">
                        <img class="star" src="icons/unfilledstar.svg" alt="">
                </div>
                
            </div>
    
        </div>
        
        <div class="product-description-details">
            <h3>Beskrivelse</h3>
            <p>${data.description}</p>
        </div>
        <div class="product-allergens-details">
            <h3>Allergener</h3>
            <p>${data.allegenes}</p>
        </div>
        <div class="product-bestbefore-details small-details">
            <h3>Bedst før dato:</h3>
            <p>${data.bestBefore}</p>
        </div>
        <div class="product-pickup-details">
            <h3>Kan afhentes:</h3>
            <p>D. ${data.pickupDay} mellem ${data.pickupTime}</p>
        </div>
        <form id="reserveProduct">
            <div class="form-condition">
            
                <label for="tradingterms">Jeg acceptere Foodit's handelsbetingelser</label>
                <input type="checkbox" name="tradingterms" id="tradingterms" required>
            </div>
        
            <input type="submit" value="Resevere vare" class="btn btn-primary">
        </form>
        `;
        container.innerHTML = htmlString
        document.getElementById('reserveProduct').addEventListener("submit", (e) => {
            e.preventDefault();
            document.getElementById('popupOverlay').style.display = "block";
        });
        console.log(data);

    }



    document.getElementById('closePopup').addEventListener("click", (e) => {
        document.getElementById('popupOverlay').style.display = "none";
    });

    async function sellProduct(productId, userId) {
        const url = "http://localhost:3000/api?action=sellProduct";
        const options = {
            method: 'post',
            requestUrl: url,
            body: JSON.stringify({
                'productId': productId,
                'userId': userId
            }),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        }
        const response = await fetch(options.requestUrl, options)
        console.log('response: ', response);

        if (response.ok) {
            spa.navigateTo('/purchase-summary')
            console.log("yay")
            // const requestData = await response.json()
        } else {
            console.warn('fetch din\'t complete as intended')
        }
    }


    document.getElementById('reserveProduct').addEventListener("click", () => {

        const productId = parseInt(_currentProduct.id);
        const userid = Number(JSON.parse(sessionStorage.getItem('user')).id)
        console.log('userid: ', userid);
        sellProduct(productId, userid)
    });
</script>