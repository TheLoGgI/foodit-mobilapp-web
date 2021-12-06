import SPA from "./classes/spa.js";
import routes from "./routes.js";
import { changeForward, changeBack } from "./classes/onboarding.js";
const spa = new SPA(routes);
console.log("spa: ", spa);
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
