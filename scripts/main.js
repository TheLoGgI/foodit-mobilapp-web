import checkSize from "./checkFileSize.js";
import { changeBack, changeForward } from "./classes/onboarding.js";
import SPA from "./classes/spa.js";
import menuTemplate from "./menuDynamicTemplate.js";
import { requestLogin, requestSignup, signout } from "./requstLogin.js";
import routes from "./routes.js";

const spa = new SPA(routes);
window.spa = spa;
console.log("spa: ", spa);

const isUserLoggedIn = sessionStorage.getItem("user") !== null;
menuTemplate(isUserLoggedIn);

//evetlisteners
/*document
  .getElementById("sellingFormUpload")
  .addEventListener("submit", async function postForm(event) {
    event.preventDefault()
    const formElem = event.currentTarget
    const formData = new FormData(formElem)
    const imageFile = document.querySelector("#foodUpload").files[0]
    formData.append("fileToUpload", imageFile)

    const url = "/server/goods/sellProductBackend.php"
    const options = {
      method: "POST",
      body: formData,
      headers: {
        "Access-Control-Allow-Headers": "Content-Type/mutipart-formdata",
      },
    }

    const response = await fetch(url, options)
    const result = await response.text()
    console.log(result)
  })
*/
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

document.getElementById("loginform").addEventListener("submit", (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  requestLogin(formData, () => {
    // Swich menu
    menuTemplate(true); // change menu navigation for logged in user
    const signoutButton = document.getElementById("signoutButton");
    signoutButton.addEventListener("click", () => {
      signout(spa.navigateTo("/"));
      menuTemplate(false);
    });

    spa.navigateTo("/dashboard"); // change view
  });
  e.target.reset();
});

document.getElementById("signupForm").addEventListener("submit", (e) => {
  e.preventDefault();
  const form = e.target;
  const formData = new FormData(form);

  // login side
  requestSignup(formData, () => spa.navigateTo("/"));

  form.reset();
});
