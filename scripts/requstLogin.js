import modal from './modal.js'

export async function requestLogin(datapack) {
    // const msg = document.getElementById('errMsg')
    // msg.textContent = ""
    const options = {
        method: 'post',
        mode: 'cors',
        requestUrl: location.origin + '/server/database/processes/loginProcess.php',
        headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
        },
        
        body: JSON.stringify(Object.fromEntries(datapack))
    }
    const response = await fetch(options.requestUrl, options)
    console.log('response: ', response);
    if (response.ok) {
        const requestData = await response.text()
        console.log('requestData: ', requestData);
        modal(response.statusText, 'success')
    } else {
        modal(response.statusText, 'error')
        // const msg = document.getElementById('errMsg')
        // msg.textContent = "Password or email was wrong, try again"
    }
}

export async function requestSignup(datapack) {
    const options = {
        method: 'post',
        mode: 'cors',
        requestUrl: 'http://localhost:3000/server/login.php',
        headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
        },
        
        body: JSON.stringify(Object.fromEntries(datapack))
    }
    const response = await fetch(options.requestUrl, options)
    
    return response;
}
