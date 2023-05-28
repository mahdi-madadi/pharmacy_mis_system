function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}

// set time and update it after one second
function showTime() {
    let time = new Date();
    document.getElementById('time').innerText = time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds();
}
setInterval(showTime, 1000);

// Submit when the user pressed the enter in the search input
document.getElementById("search_query").addEventListener("keyup", function(event){
    event.preventDefault();
    if(event.keyCode === 13){
        document.getElementById("search-form").onsubmit();
    }
})

// celar table
function clearTable(){
    document.getElementById("myTable").innerHTML = "";
}

// // filter the view of the table after searching
// function searchMedicine() {
//     let input, filter, table, tr, td, i;
//     input = document.getElementById("search");
//     filter = input.value.toUpperCase();
//     table = document.getElementById("myTable");
//     tr = table.getElementsByTagName("tr");

//     for (i = 1; i < tr.length; i++) {
//         td = tr[i].getElementsByTagName("td")[1];
//         if (td) {
//             let txtValue = td.textContent || td.innerText || td.value;
//             if (txtValue.toUpperCase().indexOf(filter) > -1) {
//                 tr[i].style.display = "";
//             } else {
//                 tr[i].style.display = "none";
//             }
//         }
//     }
// }