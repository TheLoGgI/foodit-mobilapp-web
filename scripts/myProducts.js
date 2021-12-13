//this function sets a session storage element base on the id its given
function saveGoodsId(id){
    const goodToEditId=id;
    sessionStorage.setItem('goodsToEditId', goodToEditId);
}

//this function grabs the userID from sessionStorage
//Sets the url and options for the fetch
// then it uses fetch POST to send the userID to the server
// it then checks if the response is .ok (status between 200-299)
// if that is the case, it converts the data and uses it to call the constructMyElements function
 async function fetchMyProducts() {
    const user = JSON.parse(sessionStorage.getItem('user'))
    const userId = user.id;
    const url='http://localhost:3000/api?action=getMyProducts'
    const options = {
        method: 'POST',
        requestUrl: url,
        body:JSON.stringify({"userId":userId}),
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
    }
    const response = await fetch(options.requestUrl, options)
    if (response.ok) {
        const requestData = await response.json()
        const data=requestData.data
        constructMyElements(data)
    } else {
        console.warn('fetch din\'t complete as intended')
    }
        }

// This function uses the data given to it, to visualize all of the products using a forof loop 
// and adding them to the template, lastly it uses .innerHTML to show the tempalte on the frontend
function constructMyElements(data){
    let temp='';
let container =document.getElementById('allMyProducts');

for (const product of data) {
    temp+=`<a onclick="saveGoodsId(${product.id})" class="goods-to-edit" href="/edit-product" >
                <div class="goods">
                    <div class="goods-image">
                        <img class="gd-image" src="${product.productImage}" alt="">
                        <div class="price-tag"><h5 class="price">${product.price} kr.</h5></div>
                    </div>
                    <div class="goods-info">
                    <h4 class="goods-title">${product.title}</h4>
                <p class="seller-information">
                    ${product.sellerName} <br>
                    ${product.postalcode ?? 8000}
                </p>
                    </div>
                
                </div>
            </a>`;
}
container.innerHTML = temp;
}
 
//this evenetlistener listens for the custom event 'page-change'
// and if the title of the page is equal to "My Products" it will call fetchMyProducts()
document.addEventListener('page-change', (e) => {
    const route = e.detail.route.title
    if (route === "My Products") {       
        fetchMyProducts()
    }
})