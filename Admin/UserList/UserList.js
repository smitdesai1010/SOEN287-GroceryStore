document.getElementById("filtersearchbar").setAttribute("column", "0");

function setfilter(selector) {
    document.getElementById("filtersearchbar").setAttribute("column", `${selector.id}`);
    document.getElementById("dropdownHeader").innerHTML = selector.innerHTML;
}

function filter() {
    let input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filtersearchbar");
    filter = input.value.toUpperCase();
    table = document.getElementById("userlist");
    tr = table.getElementsByTagName("tr");
    column = input.getAttribute("column");
    
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[column];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
}


function data(id) {
    const userData = id.parentElement.parentElement.getElementsByTagName("td");
    const userProperties = {
        userName: userData[0].innerHTML,
        userEmail: userData[1].innerHTML
    };
    return userProperties;
}
function edit(id) {
    const user = data(id);
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            redirectWithData(this, user.userName, user.userEmail);
        }
    };
    xhttp.open("GET", "../../DataBase/user.xml", true);
    xhttp.send();
}
function redirectWithData(xml, userName, userEmail) {
    const users = xml.responseXML.getElementsByTagName('USER');
    let i;
    for (i = 0; i < users.length; i++) {
        console.log(users[i].getElementsByTagName("NAME")[0].innerHTML);
        
        if (users[i].getElementsByTagName("NAME")[0].innerHTML == userName && users[i].getElementsByTagName("EMAIL")[0].innerHTML == userEmail) {

            let userName = users[i].getElementsByTagName("NAME")[0].innerHTML;
            let userEmail = users[i].getElementsByTagName("EMAIL")[0].innerHTML;
            let userPassword = users[i].getElementsByTagName("PASSWORD")[0].innerHTML;
            let userRole = users[i].getElementsByTagName("ROLE")[0].innerHTML;
            
            
            window.open(`EditUser/EditUser.html?name=${userName}&email=${userEmail}&password=${userPassword}&role=${userRole}`);
            break;
        }
        else
            console.log("Query failed");
    };
}
function remove(id) {
    user = data(id);
    if (confirm("Are you sure you want to delete " + user.userName.trim() + " from the store?")) {
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", `DeleteUser.php`, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`name=${user.userName}&email=${user.userEmail}`);
        alert("User deleted!");
        location.reload();
    }
    
}