
export default function(text, status) {
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