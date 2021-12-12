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



idInfo=sessionStorage.getItem('goodsToEditId');
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


    async function insertProductInfo(){   

let dataToEdit=await fetchProductInfo(idInfo);
console.log(dataToEdit);


document.getElementById('producttitle-edit').value=dataToEdit.title;
document.getElementById('productprice-edit').value=dataToEdit.price;
document.getElementById('productdescription-edit').value=dataToEdit.description;
document.getElementById('bedstbeforedate-edit').value=dataToEdit.bestBefore;
document.getElementById('pickupdate-edit').value=dataToEdit.pickupDay;
document.getElementById('pickuptime-edit').value=dataToEdit.pickupTime;
document.getElementById('allergens-edit').value=dataToEdit.allegenes;

    }

document.addEventListener('page-change', (e) => {
        console.log('e: ', e);
     
        const route = e.detail.route.title
        if (route === "Edit Product") {
            insertProductInfo()
        }

    });





      document
  .getElementById("editProductForm")
  .addEventListener("submit", async (event) =>{
    event.preventDefault();
    const formElem = event.currentTarget;
    const formData = new FormData(formElem);
    const user=JSON.parse(sessionStorage.getItem('user'))
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
    console.log(result);
  });


</script>