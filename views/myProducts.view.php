<section data-route id="myProducts" class="my-products">
<h3>Mine produkter</h3>
<p class="sub-heading">Tryk på et produkt for at redigere det</p>
<div class="all-my-products" id="allMyProducts">




</div>



</section>

<script>
 function saveGoodsId(id){
const goodToEditId=id;
console.log(goodToEditId)
sessionStorage.setItem('goodsToEditId', goodToEditId);

 }
    
 async function fetchMyProducts() {
    const user = JSON.parse(sessionStorage.getItem('user'))
    userId=user.id;


            const options = {
                method: 'POST',
                requestUrl: 'http://localhost:3000/api?action=getMyProducts',
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
                console.log(data)
               constructMyElements(data)
            } else {
                console.warn('fetch din\'t complete as intended')
            }
        }

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
            </a>`
}

 container.innerHTML = temp;




}
 fetchMyProducts()


</script>