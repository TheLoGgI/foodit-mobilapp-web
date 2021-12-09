import SPA from "./classes/spa.js";
import routes from "./routes.js";
import checkSize from "./checkFileSize.js";
import { changeForward, changeBack } from "./classes/onboarding.js";

const spa = new SPA(routes);
console.log("spa: ", spa);

//evetlisteners
document
  .getElementById("sellingFormUpload")
  .addEventListener("submit", async function postForm(event) {
    event.preventDefault();
    const formElem = event.currentTarget;
    const formData = new FormData(formElem);
    const imageFile = document.querySelector("#foodUpload").files[0];
    formData.append("fileToUpload", imageFile);
    //  const formData = new FormData(formElem);
    //  console.log(formData);
    const url = "/server/goods/sellProductBackend.php";
    const options = {
      method: "POST",
      body: formData,
      headers: {
        "Access-Control-Allow-Headers": "Content-Type/mutipart-formdata",
      },
    };

    const response = await fetch(url, options);
    const result = response;
    console.log(result);
  });

const fileUploadFood = document.getElementById("foodUpload");

fileUploadFood.addEventListener("change", function change(e) {
  checkSize(e.currentTarget);
});

document
  .getElementById("onboardForward")
  .addEventListener("click", function click() {
    changeForward();
  });
document
  .getElementById("onboardBackward")
  .addEventListener("click", function click() {
    changeBack();
  });
