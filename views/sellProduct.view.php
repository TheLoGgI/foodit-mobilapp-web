<section data-route id="sellProduct" class="sell-product-container">
        <h1 class="heading">Sælg en madvare</h1>

        <form action="" id="sellingFormUpload" method="post" enctype="multipart/form-data">
            <div class="form-field field-file">
                    <label for="foodUpload" class="">
                        <div class="">Tilføj billede</div>
                        <img id="foodUploadImage" src="./images/default-food-image.jpg" alt="food" width="200" height="200">
                    </label>
                <input class="sell-filupload hidden" name="fileToUpload" type="file" id="foodUpload" required>
            </div>
            <div class="form-field">
                <label for="producttitle">Title på vare</label>
                <input type="text" name="producttitle" id="producttitle" required>
            </div>
            <div class="form-field">
                <label for="productprice">Pris på vare</label>
                <input type="number" name="productprice" id="productprice" required>
            </div>
            <div class="form-field">
                <label for="productdescription">Beskrivelse af varen</label>
                <textarea class="" rows="5" cols="33" type="text" name="productdescription" id="productdescription" required></textarea>
            </div>
            <div class="form-field">
                <label for="bedstbeforedate">Varens vægt i gram</label>
                <input type="number" name="goodsWeight" id="goodsWeight" required>
            </div>
            <div class="form-field">
                <label for="bedstbeforedate">Bedst før dato</label>
                <input type="date" name="bedstbeforedate" id="bedstbeforedate" required>
            </div>
            <div class="form-field">
                <label for="pickupday">Dag for afhenting</label>
                <input type="date" name="pickupdate" id="pickupdate" required>
            </div>
            <div class="form-field">
                <label for="pickuptime">Tidsrum for afhenting</label>
                <input type="text" name="pickuptime" id="pickuptime" required>
            </div>
            <div class="form-field">
            <label for="allergens">Allergener</label>
                <select name="allergens" id="allergens">
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
            
            <div class="form-condition">
                <label for="tradingterms">Jeg acceptere hermed Foodit's handelsbetingelser</label>
                <input type="checkbox" name="tradingterms" id="tradingterms" required>
            </div>

            <input type="submit" class="btn btn-primary" value="Sælg vare"> 
        </form>
</section>

<style>

    .hidden {
        display:none;
    }

    .sell-product-container {
        padding: 1rem;
    }

    .sell-product-container .heading {
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


//The inputelement 'foodupload' has an eventlistener tied to it
//it listens for a change on the input
//When there is a change:
// - the function will check the size of the file input
// - if the file is over 2 Mb's it wil throw an alert and prevent the change
// - if the file isn't over 2 Mb's it will change the src of foodUploadImage IMG tag to show the file
document.getElementById('foodUpload')?.addEventListener('change', (e) => {
    const foodUploadImage = document.getElementById('foodUploadImage')
    const file = e.target.files[0]
    const fileSize = file.size / 1024 / 1024;          
    if (fileSize > 2) {
        alert("Den valgte fil er for stor."); 
        e.preventDefault();
    } else {
        foodUploadImage.src = URL.createObjectURL(file); 
    }       
});


// This eventlistener listens to the whole sellingFormUpload form, for when it is submitted
//when it is submitted the function will:
// - preveent the page from reloading
// - use FormData() to create a new form element from the form
// - grad the file from the file input field and append it to the formData
// - grab the userId from sessionStorage and append that aswell
// - it creates the url and optins parts of a fetch
// - it uses those to fetch POST all the data to the backend
// - it then waits for a response and uses spa.navigateTo() to direct the user
// - if the resonse is false or NULL it wil throw an alert
    document
  .getElementById("sellingFormUpload")
  .addEventListener("submit", async (event) =>{
    event.preventDefault();
    const formElem = event.currentTarget;
    const formData = new FormData(formElem);
    const imageFile = document.querySelector("#foodUpload").files[0];
    const user=JSON.parse(sessionStorage.getItem('user'))
    const userID=user.id;
    formData.append("fileToUpload", imageFile);
    formData.append("userIdVar", userID)
    const url = 'http://localhost:3000/server/goods/sellProductBackEnde.php';
    const options = {
      method: "POST",
      body: formData,
      headers: {
        "Access-Control-Allow-Headers": "Content-Type/mutipart-formdata",
      },
    };

    const response = await fetch(url, options);
    const result = await response.text();
    if(result){
    spa.navigateTo('/my-products')

    } else{
        alert('Noget gik galt')
    }
  });

</script>
