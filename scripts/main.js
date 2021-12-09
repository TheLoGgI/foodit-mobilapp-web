import checkSize from "./checkFileSize.js";
import { changeBack, changeForward } from "./classes/onboarding.js";
import SPA from "./classes/spa.js";
import routes from "./routes.js";

const spa = new SPA(routes);
console.log("spa: ", spa);

//evetlisteners

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
