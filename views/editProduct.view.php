<section data-route id="editProduct" class="edit-product-container">
        <h1 class="heading">Sælg en madvare</h1>

        <form action="" id="editProductForm" method="post" enctype="multipart/form-data">
            
            <div class="form-field">
                <label for="producttitle">Title på vare</label>
                <input type="text" name="producttitle" id="producttitle-edit" required>
            </div>
            <div class="form-field">
                <label for="productprice">Pris på vare</label>
                <input type="number" name="productprice" id="productprice-edit" required>
            </div>
            <div class="form-field">
                <label for="productdescription">Beskrivelse af varen</label>
                <textarea class="" rows="5" cols="33" type="text" name="productdescription" id="productdescription-edit" required></textarea>
            </div>
            <div class="form-field">
                <label for="bedstbeforedate">Bedst før dato</label>
                <input type="date" name="bedstbeforedate" id="bedstbeforedate-edit" required>
            </div>
            <div class="form-field">
                <label for="pickupday">Dag for afhenting</label>
                <input type="date" name="pickupdate" id="pickupdate-edit" required>
            </div>
            <div class="form-field">
                <label for="pickuptime">Tidsrum for afhenting</label>
                <input type="text" name="pickuptime" id="pickuptime-edit" required>
            </div>
            <div class="form-field">
            <label for="allergens">Allergener</label>
                <select name="allergens" id="allergens-edit">
                    <option value="" selected >Vælg allergener</option>
                    <option value="gluten">Gluten</option>
                    <option value="krebsdyr">Krebsdyr</option>
                    <option value="eg">æg</option>
                    <option value="fisk">Fisk</option>
                    <option value="jordnodder">Jordnødder</option>
                    <option value="soja">Soja</option>
                    <option value="milk">Mælk</option>
                    <option value="nodder">Nødder</option>
                    <option value="selleri">selleri</option>
                    <option value="seasamfro">Seasamfrø</option>
                    <option value="lupin">Lupin</option>
                    <option value="bloddyr">Bløddyr</option>
                </select>
              
            </div>
            
           

            <input type="submit" class="btn btn-primary" value="Opdater vare"> 
        </form>
</section>

<style>

    .hidden {
        display:none;
    }

    .edit-product-container {
        padding: 1rem;
        min-height: 100vh;
    }

    .edit-product-container .heading {
        font-size: 1.6rem;
        color: var(--clr-action);
        font-weight: bold;
    }

    .form-field {
        display: flex;
        flex-direction: column;
    }

    .form-field + .form-field {
        margin-top: .5rem;
    }

    .form-field label {
        font-size: .9rem;
        font-weight: bold;
    }

    .form-field input, 
    .form-field select,
    .form-field textarea {
        background-color: #f4f4f4;
        padding: 0.5em 0.6em;
    }

    .field-file img {
        width: 100%;
        height: 100%;
        aspect-ratio: 1/1;
    }

    .form-condition {
        display: flex;
        font-size: .825rem;
        flex-direction: row-reverse;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        margin: .5rem 0;
    }

    .form-condition > input[type="checkbox"] {
        width: 20px;
        height: 20px;
    }

    .picked-allergens {
        margin-top: .25rem;
        margin-bottom: 1rem;
    }
    .allergens-pick {
        padding: 0 .25rem ;
        font-size: .825rem;
        border-radius: 4px;
        display: inline-block;
        background-color: lightgray;
    }
    
    .allergens-label {
        display: inline-block;
        padding: .25rem;
    }

    .delete-pick {
        width: 20px;
        height: 20px;
        background-color: lightcyan;
        padding: .25rem;
    }


</style>



<script>


// This function creates a url variable with an action and a GET parameter for the fetch, based on the productId given to it
// it the set te options variable
// It then does a fetch GET to the API-php
// If the fetch resonse is .ok (status between 200-299) it will decode the response, and then return data from the request
// If the fetch is not .ok it will give a warning in the console
async function fetchProductInfo(productId) {
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
            return productData[0] 
        } else {
            console.warn('fetch din\'t complete as intended')
        }
}


// This function first gets 'goodsToEditId' from the sessionStorage(which is set on myProducts)
// It then calls the fetch function above with that ID as a parameter
// Lastly it sets all of the inputs values equal to the data from the fetch
async function insertProductInfo(){  
    let idInfo=sessionStorage.getItem('goodsToEditId'); 
    let dataToEdit=await fetchProductInfo(idInfo);
    document.getElementById('producttitle-edit').value=dataToEdit.title;
    document.getElementById('productprice-edit').value=dataToEdit.price;
    document.getElementById('productdescription-edit').value=dataToEdit.description;
    document.getElementById('bedstbeforedate-edit').value=dataToEdit.bestBefore;
    document.getElementById('pickupdate-edit').value=dataToEdit.pickupDay;
    document.getElementById('pickuptime-edit').value=dataToEdit.pickupTime;
    document.getElementById('allergens-edit').value=dataToEdit.allegenes;
}

//this evenetlistener listens for the custom event 'page-change'
// and if the title of the page is equal to "Edit Product" it will call insertProductInfo()
document.addEventListener('page-change', (e) => {
    console.log('e: ', e);
     
    const route = e.detail.route.title
    if (route === "Edit Product") {
            insertProductInfo()
    }
});




//This eventlistener listens for the editProductForm to be submitted
//When it is it will:
// - prevent the page from reloading
// - use FormData() to create a new form element from the form
// - grab the userId from sessionStorage and append that to formData
// - grabs the product ID from sessionStorage and appends that aswell
// - it creates the url and options parts of a fetch
// - it uses those to fetch POST all the data to the backend
// - it then waits for a response and uses spa.navigateTo() to direct the user
document.getElementById("editProductForm").addEventListener("submit", async (event) =>{
    event.preventDefault();
    const formElem = event.currentTarget;
    const formData = new FormData(formElem);
    const user=JSON.parse(sessionStorage.getItem('user'))
    const idInfo=sessionStorage.getItem('goodsToEditId'); 
    const userID=user.id;
    formData.append("userIdVar", userID)
    formData.append("productIdVar", idInfo)
    const url = 'http://localhost:3000/server/goods/editProductBackEnde.php';
    const options = {
        method: "POST",
        body: formData,
        headers: {
            "Access-Control-Allow-Headers": "Content-Type/mutipart-formdata",
        },
    };
    const response = await fetch(url, options);
    const result = await response.text();
    spa.navigateTo('/my-products')
  });


</script>