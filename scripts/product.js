// Setting the global variable _currentProduct

// Listning for custom event page-change from the spa
//on event it finds the product ID and calls the fetchProduct() function using the id as parameter
document.addEventListener("page-change", (e) => {
  const productId = e.detail.id;
  const route = e.detail.route.title;
  if (route === "product") {
    window._currentProduct = window.data.find(
      (product) => Number(product.id) === productId
    );

    fetchProduct(_currentProduct.id);
  }
});

// this function creates a url using the given product ID
// It then creates options for the fetch
// then it uses fetch POST to fetch information from API.php
// if the response is .ok it will convert the data and calls the function constructElement using the data as a parameter
async function fetchProduct(productId) {
  const url =
    location.origin + "/api/?action=getSingleProduct&productId=" + productId;
  const options = {
    method: "get",
    requestUrl: url,
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
  };
  const response = await fetch(options.requestUrl, options);
  if (response.ok) {
    const requestData = await response.json();
    let productData = await requestData.data;
    constructElement(productData[0]);
  } else {
    console.warn("fetch din't complete as intended");
  }
}

//This function takes one data parameter(an object)
// it then rewrites the two dates (pickupDay and bestBefor), so it is equal to the european format
// it then uses getElementById to get the container for the product
// then it creates an HTML template using the data parameter(an object)
// it then uses innerHTML to insert the HTML string
// lastly it creates an eventListener for the 'reserveProduct' form, when it is submitted, it wil:
// - prevent the page from reloading and use display:Block to a pupup to confirm the reservation
function constructElement(data) {
  data.pickupDay =
    data.pickupDay.substr(8, 4) +
    "-" +
    data.pickupDay.substr(5, 2) +
    "-" +
    data.pickupDay.substr(0, 4);
  data.bestBefore =
    data.bestBefore.substr(8, 4) +
    "-" +
    data.bestBefore.substr(5, 2) +
    "-" +
    data.bestBefore.substr(0, 4);
  const container = document.getElementById("product-informationDetails");
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
        <div class="product-bestbefore-details">
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
  container.innerHTML = htmlString;

  document.getElementById("reserveProduct").addEventListener("submit", (e) => {
    console.log("yo");
    e.preventDefault();
    document.getElementById("popupOverlay").style.display = "block";
  });
}

// This eventlistener listens for the popup to be closed, and hides it using display:none
document.getElementById("closePopup").addEventListener("click", (e) => {
  document.getElementById("popupOverlay").style.display = "none";
});

// This function takes 3 parameters (id of the product, id of the logged in user and the weight of the product)
// this function:
// - creates an url with an action to the API
// - creates options for the fetch, where it puts the parameters og the functions as the body
// - does the fetch POST using the options and the url
// - waits for the response
// - sets 'userWeightSaved' in sessionStorage, to be used on the purchasesummary
// - if the response is .ok it wil direct the user to the purchase summary
async function sellProduct(productId, userId, productWeight) {
  const url = location.origin + "/api/?action=sellProduct";
  const options = {
    method: "post",
    requestUrl: url,
    body: JSON.stringify({
      productId: productId,
      userId: userId,
      productWeight: productWeight,
    }),
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
  };
  const response = await fetch(options.requestUrl, options);
  let responseData = await response.json();
  console.log(responseData);
  sessionStorage.setItem("userWeightSaved", responseData.data[0].vaegtReddet);
  if (response.ok) {
    spa.navigateTo("/purchase-summary");
  } else {
    console.warn("fetch din't complete as intended");
  }
}

//This eventlistener listens for 'reserveProduct' on the popup to be clicked and then:
// - creates productId and productWeight from _currentProduct
// - create userId from sessionStorage, and makes sure it's a number
// - lastly it calls the sellProduct function, using the befor mentioned variable as parameters
document.getElementById("reserveProduct").addEventListener("click", () => {
  const productId = parseInt(_currentProduct.id);
  const productWeight = parseInt(_currentProduct.weightOfGoods);
  const userId = Number(JSON.parse(sessionStorage.getItem("user")).id);
  console.log("userid: ", userId);
  sellProduct(productId, userId, productWeight);
});
