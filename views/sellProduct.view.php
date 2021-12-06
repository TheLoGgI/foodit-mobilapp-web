<section data-route id="sellProduct" class="sell-product-container">
        <h1 class="heading">Sælg en madvare</h1>

        <form action=""  method="post" enctype="multipart/form-data">
            <div class="form-field field-file">
                    <label for="foodUpload" class="">
                        <div class="">Tilføj billede</div>
                        <img id="userprofilimage" src="./images/default-food-image.jpg" alt="food" width="200" height="200">
                    </label>
                <input class="sell-filupload hidden" type="file" id="foodUpload">
            </div>
            <div class="form-field">
                <label for="fileupload">Title på vare</label>
                <input type="text">
            </div>
            <div class="form-field">
                <label for="fileupload">Beskrivelse af varen</label>
                <textarea class="" rows="5" cols="33" type="text" name="editdescription" id="editdescription"></textarea>
            </div>
            <div class="form-field">
                <label for="fileupload">Bedst før dato</label>
                <input type="text">
            </div>
            <div class="form-field">
                <label for="fileupload">Tidsrum for afhenting</label>
                <input type="text">
            </div>
            <div class="form-field">
                <select name="cars" id="cars">
                    <option value="gluten">gluten</option>
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
                    <option value="bløddyr">Bløddyr</option>
                </select>
                <input type="text">
            </div>
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

    .form-field label {
        font-size: .9rem;
        font-weight: bold;
    }

    .field-file img {
        width: 100%;
        height: 100%;
        aspect-ratio: 1/1;
    }

</style>

<script>
        const userprofilimage = document.getElementById('userprofilimage')
        document.getElementById('foodUpload')?.addEventListener('change', (e) => {
            const file = e.target.files[0]
            userprofilimage.src = URL.createObjectURL(file);
        })
    </script>