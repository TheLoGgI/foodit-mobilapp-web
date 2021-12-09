<section data-route id="sellProduct" class="sell-product-container">
        <h1 class="heading">Sælg en madvare</h1>

        <form action="" id="sellingFormUpload" method="post" enctype="multipart/form-data">
            <div class="form-field field-file">
                    <label for="foodUpload" class="">
                        <div class="">Tilføj billede</div>
                        <img id="userprofilimage" src="./images/default-food-image.jpg" alt="food" width="200" height="200">
                    </label>
                <input class="sell-filupload hidden" name="fileToUpload" type="file" id="foodUpload">
            </div>
            <div class="form-field">
                <label for="producttitle">Title på vare</label>
                <input type="text" name="producttitle" id="producttitle">
            </div>
            <div class="form-field">
                <label for="productdescription">Beskrivelse af varen</label>
                <textarea class="" rows="5" cols="33" type="text" name="productdescription" id="productdescription"></textarea>
            </div>
            <div class="form-field">
                <label for="bedstbeforedate">Bedst før dato</label>
                <input type="text" name="bedstbeforedate" id="bedstbeforedate">
            </div>
            <div class="form-field">
                <label for="pickuptime">Tidsrum for afhenting</label>
                <input type="text" name="pickuptime" id="pickuptime">
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
                <!-- <div class="picked-allergens" id="pickedAllergens">
                    <div class="allergens-pick">
                        <p class="allergens-label">Lupin</p>
                        <button type="button" class="delete-pick" data-label="lupin">X</button>
                    </div>
                    <div class="allergens-pick">
                        <p class="allergens-label">Lupin</p>
                        <button type="button" class="delete-pick">X</button>
                    </div>
                    <div class="allergens-pick">
                        <p class="allergens-label">Lupin</p>
                        <button type="button" class="delete-pick">X</button>
                    </div>

                </div> -->
            </div>
            
            <div class="form-condition">
                <label for="tradingterms">Jeg acceptere hermed Foodit's handelsbetingelser</label>
                <input type="checkbox" name="tradingterms" id="tradingterms">
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
    const userprofilimage = document.getElementById('userprofilimage')
    document.getElementById('foodUpload')?.addEventListener('change', (e) => {
        
const file = e.target.files[0]
        userprofilimage.src = URL.createObjectURL(file);

       
        
    })
</script>

<!-- <script>
    const selectMenu = document.getElementById('allergens') 
    console.log('selectMenu: ', selectMenu);
    
    const allergensArray = []
    selectMenu.addEventListener('change', (e) => {
        console.log(e.target.value);
        allergensArray.push(e.target.value)
        e.target.value = ''
        
    })

function displayAllergens(allergnesArray) {
    const allergensContainer = document.getElementById('pickedAllergens')
    const template = `
        <div class="allergens-pick">
            <p class="allergens-label">${allergen}</p>
            <button type="button" class="delete-pick" data-label="${allergen}">X</button>
        </div>`

    const templateString = allergnesArray.reduce((acc, current) => {
        acc += template('')
    }, '')
}

displayAllergens(allergensArray)


</script> -->