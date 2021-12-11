import checkSize from "./checkFileSize.js"
import { changeBack, changeForward } from "./classes/onboarding.js"
import SPA from "./classes/spa.js"
import {requestLogin, requestSignup} from "./requstLogin.js"
import routes from "./routes.js"

const spa = new SPA(routes)
console.log("spa: ", spa)

//evetlisteners
document
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

const fileUploadFood = document.getElementById("foodUpload")

fileUploadFood.addEventListener("change", (e) => {
  checkSize(e.currentTarget)
})

document.getElementById("onboardForward").addEventListener("click", () => {
  changeForward()
})
document.getElementById("onboardBackward").addEventListener("click", () => {
  changeBack()
})


export function modal(text, status) {
  const model = document.getElementById("infoModel")
  const modelContent = document.getElementById("modalText")
  model.style.transition = "transform 300ms ease-in-out 1s";

  modelContent.textContent = text
  model.classList.add("modal-active")
  const DOMTokenList = model.classList.length

  switch (status) {
    case "success":
      if (DOMTokenList > 1) {
        model.classList.replace("modal-error", "modal-success")
      } else model.classList.add("modal-success")
      break
    case "error":
      if (DOMTokenList > 1) {
        model.classList.replace("modal-success", "modal-error")
      } else model.classList.add("modal-error")
      break
    default: 
      model.classList.remove("modal-error")
      model.classList.remove("modal-success")
      break
  }

  setTimeout(() => {
    model.classList.remove("modal-active")
  }, 2500)

}



document.getElementById('loginform').addEventListener('submit', (e) => {
  e.preventDefault()
  const formData = new FormData(e.target) 
  requestLogin(formData)
})

document.getElementById('signupForm').addEventListener('submit', (e) => {
  e.preventDefault()
  const form = e.target
  const formData = new FormData(form) 
  const response = requestSignup(formData)
  console.log('response: ', response);
  
  form.reset()
  
})