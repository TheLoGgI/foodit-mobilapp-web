<section data-route id="purchaseSummary" class="purchase-summary-container">


<div class="purchase-info" id="purchaseInfo">
<div class="purchase-head">
<h3>Tak for dit køb</h3>
</div>

<div class="purchase-summary-body">
<div class="purchase-info-text">
<p>Du har denne gang reddet 500gram mad, som ellers ville være gået til spilde! 
<br>
Du har nu i alt reddet 35kg mad.</p>
</div>

<div class="purchase-seller-text">
<h4>Du har købt Banaer af Hanne Kofoed</h4>
<p>Hanne kan kontaktes på telefon: +45 12 34 56 78
Hvis spørgsmål skulle opstå</p>
</div>

<div class="purchase-location-info"><h4>Afhentningsadresse:</h4>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8882.897969996346!2d10.190487868520032!3d56.17915526649517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464c3fceb4abd5d3%3A0x9e1229d038920089!2sRandersvej%20113%2C%208200%20Aarhus!5e0!3m2!1sda!2sdk!4v1639304617965!5m2!1sda!2sdk"
     width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>




</div>





</div>


</section>
<script>
function showPurchaseInfo(){
const container=document.getElementById('purchaseSummary');
let temp=`
<div class="purchase-info" id="purchaseInfo">
<div class="purchase-head" id="purchaseBackground">
<h3>Tak for dit køb</h3>
</div>

<div class="purchase-summary-body">
<div class="purchase-info-text">
<p>Du har denne gang reddet __gram mad, som ellers ville være gået til spilde! 
<br>
Du har nu i alt reddet __kg mad.</p>
</div>

<div class="purchase-seller-text">
<h4>Du har købt ${_currentProduct.title} af ${_currentProduct.sellerName}</h4>
<p>${_currentProduct.sellerName} kan kontaktes på telefon:  <ahref="tel:12345678">+45123456</a>
Hvis spørgsmål skulle opstå</p>
</div>

<div class="purchase-location-info"><h4>Afhentningsadresse:</h4>
<iframe src="https://www.google.com/maps/embed/v1/search?q=${_currentProduct.address},${_currentProduct.postalcode}&key=AIzaSyDTwcBlbubVZd--iFIScvw8r51YeRg-rWw"
     width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>




</div>
`

container.innerHTML=temp;
document.getElementById('purchaseBackground').style.background=`linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),url(${_currentProduct.productImage})`;
document.getElementById('purchaseBackground').style.backgroundSize="cover"

}


document.addEventListener('page-change', (e) => {
     const route = e.detail.route.title
         if (route === 'Purchase Summary') {
               showPurchaseInfo();
        }


     

    })




</script>

