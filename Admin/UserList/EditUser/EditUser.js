
const urlParams = new URLSearchParams(window.location.search);
let variable = urlParams.get('name');
document.getElementById("name").value = urlParams.get('name');
document.getElementById("email").value = urlParams.get('email');
document.getElementById("password").value = urlParams.get('password');
document.getElementById("confirm-password").value = urlParams.get('password');
document.getElementById("mode").value = urlParams.get('role');

console.log(variable);
document.getElementsByTagName("h3")[0].innerHTML = "Add User";
if (variable != null)
{
    document.getElementById("email").disabled = true;
    document.getElementsByTagName("h3")[0].innerHTML = "Edit User";
    // document.getElementById("form").setAttribute("action", "EditUser.php")
}


// if (urlParams.get('name') === null)
// {
    
// }
