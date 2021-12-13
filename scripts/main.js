import { changeBack, changeForward } from "./onboarding.js";
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
/*
const fileUploadFood = document.getElementById("foodUpload");

fileUploadFood.addEventListener("change", (e) => {
  checkSize(e.currentTarget);
});*/

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
    
    spa.refrech()

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

const signoutButton = document.getElementById("signoutButton");
signoutButton?.addEventListener("click", () => {
  signout(spa.navigateTo("/"));
  menuTemplate(false);
  spa.refrech()
});
spa.refrech()