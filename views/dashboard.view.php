<section data-route id="dashboard" class="dashboard-container">

    <article class="goods-container">

    <div class="category-dashboard">
        <h3 class="goods-h3">Varer i nærheden af dig</h3>
        <p class="show-all">Vis alle</p>
    </div>


    <div class="goods-scroll" id="dashboardCloseTo">

    </div>

</article>


<div class="bgc-position">
    <img class="bgc-fill"src="../images/baggrundsfyld.png" alt="">
    <img class="logo-position"src="../icons/logo-slogan.svg" alt="">
</div>



<article class="goods-container" >

    <div class="category-dashboard">
        <h3 class="goods-h3">Varer fra dine favoritter</h3>
        <p class="show-all">Vis alle</p>
    </div>


    <div class="goods-scroll" id="dashboardFavorites">
        
    </div>

</article>



<article class="goods-container">

    <div class="category-dashboard">
        <h3 class="goods-h3">Opskrifter</h3>
        <p class="show-all">Vis alle</p>
    </div>


    <div class="goods-scroll">
        <div class="recipes">
        <img class="recipes-image" src="../images/havregryn.png" alt="">
        <h4 class="recipes-title">Havregrynskugler - de nemme</h4>
        <div class="recipe-stars">
            <img class="star" src="../icons/filledstar.svg" alt="">
            <img class="star" src="../icons/filledstar.svg" alt="">
            <img class="star" src="../icons/filledstar.svg" alt="">
            <img class="star" src="../icons/halfstar.svg" alt="">
            <img class="star" src="../icons/unfilledstar.svg" alt="">
        </div>
        <p class="recipes-information">
           Havregrynskugler er bare standard på konfektfadet i juledagene - og så er de lækre. 
        </p>
        </div>

        <div class="recipes">
        <img class="recipes-image" src="../images/havregryn.png" alt="">
        <h4 class="recipes-title">Havregrynskugler - de nemme</h4>
        <div class="recipe-stars">
            <img class="star" src="../icons/filledstar.svg" alt="">
            <img class="star" src="../icons/filledstar.svg" alt="">
            <img class="star" src="../icons/filledstar.svg" alt="">
            <img class="star" src="../icons/halfstar.svg" alt="">
            <img class="star" src="../icons/unfilledstar.svg" alt="">
        </div>
        <p class="recipes-information">
           Havregrynskugler er bare standard på konfektfadet i juledagene - og så er de lækre. 
        </p>
        </div>

        <div class="recipes">
        <img class="recipes-image" src="../images/havregryn.png" alt="">
        <h4 class="recipes-title">Havregrynskugler - de nemme</h4>
        <div class="recipe-stars">
            <img class="star" src="../icons/filledstar.svg" alt="">
            <img class="star" src="../icons/filledstar.svg" alt="">
            <img class="star" src="../icons/filledstar.svg" alt="">
            <img class="star" src="../icons/halfstar.svg" alt="">
            <img class="star" src="../icons/unfilledstar.svg" alt="">
        </div>
        <p class="recipes-information">
           Havregrynskugler er bare standard på konfektfadet i juledagene - og så er de lækre. 
        </p>
        </div>

        <div class="recipes">
        <img class="recipes-image" src="../images/havregryn.png" alt="">
        <h4 class="recipes-title">Havregrynskugler - de nemme</h4>
        <div class="recipe-stars">
            <img class="star" src="../icons/filledstar.svg" alt="">
            <img class="star" src="../icons/filledstar.svg" alt="">
            <img class="star" src="../icons/filledstar.svg" alt="">
            <img class="star" src="../icons/halfstar.svg" alt="">
            <img class="star" src="../icons/unfilledstar.svg" alt="">
        </div>
        <p class="recipes-information">
        Havregrynskugler er bare standard på konfektfadet i juledagene - og så er de lækre. 
        </p>
        </div>

    </div>
</article>

</section>

<script>
    async function fetchProducts() {

            const options = {
                method: 'get',
                requestUrl: location.origin + '/api?action=getAllProducts',
                headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
                },
            }
            const response = await fetch(options.requestUrl, options)
            
            if (response.ok) {
                const requestData = await response.json()

                const dataLength = requestData.data.length / 2
                const closeTo = requestData.data.slice(0, Math.floor(dataLength) - 1)
                const favorites = requestData.data.slice(Math.floor(dataLength))
                window.data = requestData.data
                constructElements(closeTo, 'dashboardCloseTo')
                constructElements(favorites, 'dashboardFavorites')
            } else {
                console.warn('fetch din\'t complete as intended')
            }
        }

    function constructElements(productsArray, id) {

        const container = document.getElementById(id)

        const htmlString = productsArray.reduce((acc, curr) => {
            const {id, productImage, price, title, sellerName, address, postalcode} = curr
            return acc += `
            <a href="/product?id=${id}" >
                <div class="goods">
                    <div class="goods-image">
                        <img class="gd-image" src="${productImage}" alt="">
                        <div class="price-tag"><h5 class="price">${price} kr.</h5></div>
                    </div>
                    <div class="goods-info">
                    <h4 class="goods-title">${title}</h4>
                <p class="seller-information">
                    ${sellerName} <br>
                    ${postalcode ?? 8000}
                </p>
                    </div>
                
                </div>
            </a>`
        }, '')

        container.innerHTML = htmlString

    }

        fetchProducts()
</script>

