//check if the input is empty
function validate() {
    let user = document.getElementById('user').value;
    let pass = document.getElementById('pass').value;
    let noneCharacter = /\W/g;
    let digits = /[0-9]/g;
    let capitalLetters = /[A-Z]/g;
    if (user == "" || pass == "") {
        document.getElementById('message').style.display = "block";
        document.getElementById('message').innerText = "Username or Password can't be empty!";
        return false;
    }
    else if (noneCharacter.test(user)) {
        document.getElementById('message').style.display = "block";
        document.getElementById('message').innerText = "Only digits and letters are allowed!";
        return false;
    }
    else if (!noneCharacter.test(pass)) {
        document.getElementById('message').style.display = "block";
        document.getElementById('message').innerText = "Password must contain symbols!";
        return false;
    }

    else {
        return true;
    }
}

//clean the input on focus
function clean(e) {
    e.value = "";
    if (document.getElementById('err_msg') != null) {
        document.getElementById('err_msg').style.display = "none";
    }
    if (document.getElementById('message') != null) {
        document.getElementById('message').style.display = "none";
    }
}