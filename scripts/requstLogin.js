import modal from "./modal.js";

export async function requestLogin(datapack, cb) {
  const options = {
    method: "post",
    mode: "cors",
    requestUrl: location.origin + "/server/database/processes/loginProcess.php",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },

    body: JSON.stringify(Object.fromEntries(datapack)),
  };

  const response = await fetch(options.requestUrl, options);

  if (response.ok) {
    const requestData = await response.json();

    // Callback on suscess, navigateTo
    cb?.();

    // Set sessionStorage
    sessionStorage.setItem("user", requestData.user);

    // Modal feedback to user
    modal(response.statusText, "success");
  } else {
    // Modal feedback to user, if error
    modal(response.statusText, "error");
  }
}

export async function requestSignup(datapack, cb) {
  const options = {
    method: "post",
    mode: "cors",
    requestUrl:
      "http://foodit.stensgaard-medie.dk/server/database/processes/signupProcess.php",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },

    body: JSON.stringify(Object.fromEntries(datapack)),
  };
  const response = await fetch(options.requestUrl, options);

  if (response.ok) {
    cb?.();
    modal(response.statusText, "success");
  } else {
    modal(response.statusText, "error");
  }
}

export function signout(cb) {
  sessionStorage.removeItem("user");
  cb?.();
}
