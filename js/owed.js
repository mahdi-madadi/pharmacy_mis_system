function check_input(e) {
    let name = document.getElementById('name').value;
    let father_name = document.getElementById('father_name').value;
    let phone = document.getElementById('phone').value;
    let loan = document.getElementById('loan').value;
    let noneCharacter = /\W/g;
    let digits = /[0-9]/g;

    if (name == "") {
        document.getElementById('name').value = "Requird Field can't be empty!";
        return false;
    }
    else if (father_name == "") {
        document.getElementById('father_name').value = "Required Field can't be empty!";
        return false;
    }
    else if (phone == "") {
        document.getElementById('phone').value = "Required Field can't be empty!";
        return false;
    }
    else if (loan == "") {
        document.getElementById('loan').value = "Required Field can't be empty!";
        return false;
    }

    else if (!(digits.test(phone))) {
        document.getElementById('phone').value = "Only digits are allowed!";
        return false;
    }
    else if (!(digits.test(loan))) {
        document.getElementById('loan').value = "Only digits are allowed!";
        return false;
    }

    else {
        return true;
    }
}

function clean(e) {
    e.value = "";
}
