//The inputelement 'foodupload' has an eventlistener tied to it
//it listens for a change on the input
//When there is a change:
// - the function will check the size of the file input
// - if the file is over 2 Mb's it wil throw an alert and prevent the change
// - if the file isn't over 2 Mb's it will change the src of foodUploadImage IMG tag to show the file
document.getElementById("foodUpload")?.addEventListener("change", (e) => {
  const foodUploadImage = document.getElementById("foodUploadImage");
  const file = e.target.files[0];
  const fileSize = file.size / 1024 / 1024;
  if (fileSize > 2) {
    alert("Den valgte fil er for stor.");
    e.preventDefault();
  } else {
    foodUploadImage.src = URL.createObjectURL(file);
  }
});

// This eventlistener listens to the whole sellingFormUpload form, for when it is submitted
//when it is submitted the function will:
// - preveent the page from reloading
// - use FormData() to create a new form element from the form
// - grad the file from the file input field and append it to the formData
// - grab the userId from sessionStorage and append that aswell
// - it creates the url and optins parts of a fetch
// - it uses those to fetch POST all the data to the backend
// - it then waits for a response and uses spa.navigateTo() to direct the user
// - if the resonse is false or NULL it wil throw an alert
document
  .getElementById("sellingFormUpload")
  .addEventListener("submit", async (event) => {
    event.preventDefault();
    const formElem = event.currentTarget;
    const formData = new FormData(formElem);
    const imageFile = document.querySelector("#foodUpload").files[0];
    const user = JSON.parse(sessionStorage.getItem("user"));
    const userID = user.id;
    formData.append("fileToUpload", imageFile);
    formData.append("userIdVar", userID);
    const url = location.origin + "/server/goods/sellProductBackEnde.php";
    const options = {
      method: "POST",
      body: formData,
      headers: {
        "Access-Control-Allow-Headers": "Content-Type/mutipart-formdata",
      },
    };

    const response = await fetch(url, options);
    const result = await response.text();
    if (result) {
      spa.navigateTo("/my-products");
    } else {
      alert("Noget gik galt");
    }
  });
