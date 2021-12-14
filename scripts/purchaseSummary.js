//This function wil:
// - grabs the container 'purchaseSummary' using getElementById
// - Create a template using _currentproduct and 'userWeightSaved' from sessionStorage
// - Uses innerHTML to show to the template on the frontEnd
// - changes the background from the top element to the product image
function showPurchaseInfo() {
  const container = document.getElementById("purchaseSummary");
  console.log(window._currentProduct);
  let temp = `
         <div class="purchase-info" id="purchaseInfo">
              <div class="purchase-head" id="purchaseBackground">
              <h3>Tak for dit køb</h3>
              </div>
              <div class="purchase-summary-body">
              <div class="purchase-info-text">
              <p>Du har denne gang reddet <b> ${
                _currentProduct.weightOfGoods
              }</b> gram mad, som ellers ville være gået til spilde! 
              <br>
              Du har nu i alt reddet <b> ${sessionStorage.getItem(
                "userWeightSaved"
              )} gram</b> mad.</p>
              </div>
              <div class="purchase-seller-text">
              <h4>Du har købt ${_currentProduct.title} af ${
    _currentProduct.sellerName
  }</h4>
              <p>${
                _currentProduct.sellerName
              } kan kontaktes på telefon:  <ahref="tel:12345678">+45_______</a>
              Hvis spørgsmål skulle opstå</p>
              </div>
              <div class="purchase-location-info"><h4>Afhentningsadresse:</h4>
              <iframe src="https://www.google.com/maps/embed/v1/search?q=${
                _currentProduct.address
              },${
    _currentProduct.postalcode
  }&key=AIzaSyBvacwKIyHqgx32xPttBwlqWXfkVvPva6Y" 
                   width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
         </div>`;
  container.innerHTML = temp;
  document.getElementById(
    "purchaseBackground"
  ).style.background = `linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),url(${_currentProduct.productImage})`;
  document.getElementById("purchaseBackground").style.backgroundSize = "cover";
}

//this evenetlistener listens for the custom event 'page-change'
// and if the title of the page is equal to "Purchase Summary" it will call showPurchaseInfo()
document.addEventListener("page-change", (e) => {
  const route = e.detail.route.title;
  if (route === "Purchase Summary") {
    showPurchaseInfo();
  }
});
