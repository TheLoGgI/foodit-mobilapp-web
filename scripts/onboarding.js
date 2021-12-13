"use strict";
//sets the initial slidenumber to 1
let slideNumber = 1;
// the text for the different slides
let texts = [
  "Velkommen til FoodIt. FoodIt gør det nemt for dig at købe og sælge vare, som har brug for at blive reddet fra skraldespanden. For at bruge appen skal du oprette en bruger på appen.",
  "På forsiden får du et overblik over hvilke madvarer der er i nærheden af dig, madvarer fra dine favorit steder og et udvalg af opskrifter.",
  "Med FoodIt er det muligt at finde nye opskrifter til inspiration direkte på din telefon.",
  "Du kan også søge på madvarer direkte i appen og filtrerer allergener fra.",
  "Når du finder den ønskede vare, reserverer du den til afhentning indenfor den tidsramme sælgeren har sat. Du kan trygt bruge appen til at fuldføre betalingen af varene.",
  "Når du køber og sælger mad, optjener du badges for mængden af den mad du redder, sælger, køber og donnerer. Du kan også vælge hvilket badgde du vil vise frem på din profil",
];
//changes the image so it fits with the slide
function changeImage() {
  let imageContainer1 = document.getElementById("onboardingImage1");
  let image = "onboarding_" + slideNumber + ".png";
  imageContainer1.src = "../images/" + image;
}
//changes the text so it fits with the slide
function changeText() {
  document.getElementById("onboardingTextP").innerHTML = texts[slideNumber - 1];
}

//changes the buttons using display:block and none
function changeButtons() {
  console.log(slideNumber);
  if (slideNumber === 1) {
  }
  if (slideNumber > 1) {
    document.getElementById("onboardBackward").style.display = "block";
    document.getElementById("onboardingButtons").style.justifyContent =
      "space-between";
  } else {
    document.getElementById("onboardBackward").style.display = "none";
    document.getElementById("onboardingButtons").style.justifyContent =
      "center";
  }
  if (slideNumber === 6) {
    document.getElementById("onboardForward").style.display = "none";
    document.getElementById("onboardEnd").style.display = "block";
  } else {
    document.getElementById("onboardForward").style.display = "block";
    document.getElementById("onboardEnd").style.display = "none";
  }
}
//changes the progress bar and slidenumber on the frontend
function changeProgress() {
  document.getElementById("progressNumberP").innerHTML = slideNumber + "/6";
  document.getElementById("innerProgress").style.width =
    16.6 * slideNumber + "%";
}

//checks slideNumber and changes it down and calls all the functions above
export function changeBack() {
  if (slideNumber >= 1 && slideNumber <= 6) {
    slideNumber -= 1;
    console.log(slideNumber);
    changeImage();
    changeText();
    changeProgress();
    changeButtons();
  }
}
//checks slideNumber and changes it up and calls all the functions above
export function changeForward() {
  console.log(slideNumber);
  if (slideNumber >= 1 && slideNumber <= 6) {
    slideNumber += 1;
    changeImage();
    changeText();
    changeProgress();
    changeButtons();
  }
}
