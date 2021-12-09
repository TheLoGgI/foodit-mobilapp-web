import checkSize from "./checkFileSize.js";
import { changeBack, changeForward } from "./classes/onboarding.js";
import SPA from "./classes/spa.js";
import routes from "./routes.js";

const spa = new SPA(routes);
console.log("spa: ", spa);

//evetlisteners
<<<<<<< HEAD
document
  .getElementById("sellingFormUpload")
  .addEventListener("submit", async function postForm(event) {
    event.preventDefault();
    const formElem = event.currentTarget;
    const formData = new FormData(formElem);
    const imageFile = document.querySelector("#foodUpload").files[0];
    formData.append("fileToUpload", imageFile);

    const url = "/server/goods/sellProductBackend.php";
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
=======
>>>>>>> 9873f2f7b54e61582b22fffc6bd570702c24fb31

const fileUploadFood = document.getElementById("foodUpload");

fileUploadFood.addEventListener("change", (e) => {
  checkSize(e.currentTarget);
});

document.getElementById("onboardForward").addEventListener("click", () => {
  changeForward();
});
document.getElementById("onboardBackward").addEventListener("click", () => {
  changeBack();
});
