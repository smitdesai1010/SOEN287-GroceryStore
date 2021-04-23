let orderData = "",
    ID = "",
    Name = "",
    Email = "",
    ProductName = "",
    Price = "",
    Tax = "";
    Total="";

const urlParams = new URLSearchParams(window.location.search);
urlParams.forEach(function (value, key) {
    switch (true) {
        case key == 'name': orderData = value;
            document.getElementById("orderData").value = orderData;
            document.getElementById("orderData").disabled = true;
            document.getElementsByTagName("h1")[0].innerHTML = "Edit Order";
            break;
        case key == 'ID': ID = value;
            document.getElementById("ID").value = ID;
            break;
        case key == 'email': Name = value;
            document.getElementById("Email").value = Name;
         break;
        case key == 'price': price = value;
            document.getElementById('price').value = price;
            break;
        case key == 'tax':
            if (value == 1) document.getElementById("Tax").checked = true;
            break;
        case key == 'tot': Total = value;
            document.getElementById('Total').value = Total;
            break;
    }
})



function submitProduct() {
    let orderData = document.getElementById('orderData').value;
    let ID = document.getElementById('ID').value;
    let Name = document.getElementById('Name').value;
    let Email = document.getElementById('Email').value;
    let ProductName = document.getElementById('ProductName').value;
    let Price = document.getElementById('price').value;
    let Tax = document.getElementById("Tax").value;
    let Total = document.getElementById('Total').value

    // All inputs must be filled.
    if (orderData == '' ||
        ID == '' ||
        Name == '' ||
        Email == '' ||
        ProductName == '' ||
        Price == '' ||
        Tax == '' ||
        Total == '') {
        alert('You must complete the form!');
        return;
    }

    document.getElementById('order').submit();
    alert('Your order has been added!');
}

