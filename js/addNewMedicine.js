function check_for_insert() {
    let cat = document.getElementById('cat').value;
    let gen_name = document.getElementById('gen_name').value;
    let comm_name = document.getElementById('comm_name').value;
    let exp_date = document.getElementById('exp_date').value;
    let purch_amount = document.getElementById('purch_amount').value;
    let purch_price = document.getElementById('purch_price').value;
    let retail_price = document.getElementById('retail_price').value;

    if (gen_name == "" | comm_name == "" | exp_date == "" | purch_amount == "" | purch_price == "" | retail_price == "" | cat == "") {
        let alert_msg = "Required field cann't be empty!";
        alert(alert_msg);
        return false;
    }
    else {
        return true;
    }
}