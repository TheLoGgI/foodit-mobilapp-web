"use strict";

let slideNumber = 1;
let texts = [
  "Velkommen til FoodIt. FoodIt gør det nemt for dig at købe og sælge vare, som har brug for at blive reddet fra skraldespanden. For at bruge appen skal du oprette en bruger på appen.",
  "På forsiden får du et overblik over hvilke madvarer der er i nærheden af dig, madvarer fra dine favorit steder og et udvalg af opskrifter.",
  "Med FoodIt er det muligt at finde nye opskrifter til inspiration direkte på din telefon.",
  "Du kan også søge på madvarer direkte i appen og filtrerer allergener fra.",
  "Når du finder den ønskede vare, reserverer du den til afhentning indenfor den tidsramme sælgeren har sat. Du kan trygt bruge appen til at fuldføre betalingen af varene.",
  "Når du køber og sælger mad, optjener du badges for mængden af den mad du redder, sælger, køber og donnerer. Du kan også vælge hvilket badgde du vil vise frem på din profil",
];

function changeImage() {
  let imageContainer1 = document.getElementById("onboardingImage1");
  let imageContainer2 = document.getElementById("onboardingImage2");
  if (slideNumber != 5) {
    let image = "onboarding_" + slideNumber + ".png";
    imageContainer1.src = "../images/" + image;
  } else {
    let image1 = "onboarding_" + slideNumber + ".png";
    let image2 = "onboarding_" + slideNumber + ".png";
    imageContainer1.src = "../images/" + image1;
    imageContainer2.src = "../images/" + image2;
  }
}

function changeText() {
  document.getElementById("onboardingTextP").innerHTML = texts[slideNumber - 1];
}

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

function changeProgress() {
  console.log("yo");
  document.getElementById("progressNumberP").innerHTML = slideNumber + "/6";
  document.getElementById("innerProgress").style.width =
    16.6 * slideNumber + "%";
}

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

/*
class Onboarding {



    constructor() {
this.slideNumber = 1;
this.texts = [
    "Velkommen til FoodIt. FoodIt gør det nemt for dig at købe og sælge vare, som har brug for at blive reddet fra skraldespanden. For at bruge appen skal du oprette en bruger på appen.",
    "På forsiden får du et overblik over hvilke madvarer der er i nærheden af dig, madvarer fra dine favorit steder og et udvalg af opskrifter.",
    "Med FoodIt er det muligt at finde nye opskrifter til inspiration direkte på din telefon.",
    "Du kan også søge på madvarer direkte i appen og filtrerer allergener fra.",
    "Når du finder den ønskede vare, reserverer du den til afhentning indenfor den tidsramme sælgeren har sat. Du kan trygt bruge appen til at fuldføre betalingen af varene.",
    "Når du køber og sælger mad, optjener du badges for mængden af den mad du redder, sælger, køber og donnerer. Du kan også vælge hvilket badgde du vil vise frem på din profil"
];
        document.getElementById('onboardForward').addEventListener("click", this.changeForward);

        console.log(this.slideNumber)
    }


  changeImage() {
    let imageContainer1 = document.getElementById("onboardingImage1");
    let imageContainer2 = document.getElementById("onboardingImage2");
    if (this.slideNumber != 5) {
      let image = "onboarding_" + this.slideNumber + ".png";
      imageContainer1.src = "../images/" + image;
    } else {
        let image1 = "onboarding_" + this.slideNumber + ".png";
        let image2 = "onboarding_" + this.slideNumber + ".png";
        imageContainer1.src = "../images/" + image1;
        imageContainer2.src = "../images/" + image2;

    }
  }
    
    changeText() {
        document.getElementById("onboardingTextP").innerHTML=this.texts[this.slideNumber];
    }

    changeProgress() {
        document.getElementById('progressIdP') = this.slideNumber + "/6";
        document.getElementById('innerProgress').style.witdth = (100 / 6) * this.slideNumber;

    }


    changeBack() {
        this.slideNumber - 1;
        this.changeImage();
        this.changeText();
        this.changeProgress();
       

    }

 changeForward() {
     this.slideNumber + 1;
     console.log(this.slideNumber);
        this.changeImage();
        this.changeText();
        this.changeProgress();
       

    }


}*/
