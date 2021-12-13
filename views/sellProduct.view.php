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
