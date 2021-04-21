// let userName = "",
//     userEmail = "",
//     userPassword = "",
//     userRole = "";
// document.getElementById("name").disabled = false;
const urlParams = new URLSearchParams(window.location.search);
let variable = urlParams.get('name');
document.getElementById("name").value = urlParams.get('name');
document.getElementById("email").value = urlParams.get('email');
document.getElementById("password").value = urlParams.get('password');
document.getElementById("confirm-password").value = urlParams.get('password');
document.getElementById("mode").value = urlParams.get('role');

console.log(variable);
if (variable != null)
{
    document.getElementById("name").disabled = true;
}

document.getElementsByTagName("h3")[0].innerHTML = "Edit User";

    // urlParams.forEach(function (value, key) {



    //     switch (true) {
    //         case key == 'name': userName = value;
    //         document.getElementById("name").value = userName;
    //         document.getElementById("name").disabled = true;
    //         document.getElementsByTagName("h1")[0].innerHTML = "Edit User";
    //         break;
    //         case key == 'email': userEmail = value;
    //         document.getElementById("email").value = userEmail;
    //         break;
    //         case key == 'password': userPassword = value;
    //         document.getElementById("password").value = userPassword;
    //         document.getElementById("confirm-password").value = userPassword;
    //         break;
    //         case key == 'mode': userRole = value;
    //         document.getElementById("mode").value = userRole;
    //         break;
    //         }
    // })