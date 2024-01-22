function validateLoginForm(pform) {
    const username = pform.username.value;
    const password = pform.password.value;
    
    let flag = true;

    const uNameErr = document.getElementById('usernameErr');
    const passErr = document.getElementById('passwordErr');
    uNameErr.innerHTML = "";
    passErr.innerHTML = "";

    if (username === "") {
        uNameErr.innerHTML = 'Please enter a username.';
        uNameErr.style.color = "red";
        flag = false;
    } else if (!/^[a-zA-Z0-9]+$/.test(username)) {
        uNameErr.innerHTML = 'Username should only contain letters and numbers.';
        uNameErr.style.color = "red";
        flag = false;
    }

    if (password === "") {
        passErr.innerHTML = 'Please enter a password.';
        passErr.style.color = "red";
        flag = false;
    }
    return flag;
}

