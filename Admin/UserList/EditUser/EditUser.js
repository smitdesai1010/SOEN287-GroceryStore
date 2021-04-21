let userName = "",
    userEmail = "",
    userPassword = "",
    userRole = "";

    const urlParams = new URLSearchParams(window.location.search);
    urlParams.forEach(function (value, key) {
        switch (true) {
            case key == 'name': userName = value;
            document.getElementById("name").value = userName;
            document.getElementById("name").disabled = true;
            document.getElementsByTagName("h1")[0].innerHTML = "Edit User";
            break;
            case key == 'email': userEmail = value;
            document.getElementById("email").value = userEmail;
            break;
            case key == 'password': userPassword = value;
            document.getElementById("password").value = userPassword;
            document.getElementById("confirm-password").value = userPassword;
            break;
            case key == 'mode': userRole = value;
            document.getElementById("mode").value = userRole;
            break;
            }
    })