let ProductName = "",
    Description = "",
    imageURL = "",
    thumbnailURL = "",
    foodType = "",
    price = "",
    specialPrice = "";

const urlParams = new URLSearchParams(window.location.search);
urlParams.forEach(function (value, key) {
    switch (true) {
        case key == 'name': ProductName = value;
            document.getElementById("ProductName").value = ProductName;
            document.getElementById("ProductName").disabled = true;
            document.getElementsByTagName("h1")[0].innerHTML = "Edit Product";
            document.getElementById("submitproduct").innerHTML = "Save Changes";
            break;
        case key == 'desc': Description = value;
            document.getElementById("Description").value = Description;
            break;
        case key == 'img': imageURL = value;
            document.getElementById("imageURL").value = imageURL;
            break;
        case key !== 'img' && key !== 'thumb' && thumbnailURL === "": imageURL += key + "=" + value;
            break;
        case key == 'thumb': thumbnailURL = value;
            break;
        case key !== 'thumb' && key !== 'type' && foodType === "": thumbnailURL += key + "=" + value;
            document.getElementById('thumbnailURL').value = thumbnailURL;
            break;
        case key == 'type': foodType = value;
            document.getElementById('foodType').value = foodType;
            break;
        case key == 'price': price = value;
            document.getElementById('price').value = price;
            break;
        case key == 'spc':
            if (value == 1) document.getElementById("onSpecial").checked = true;
            break;
        case key == 'spcp': specialPrice = value;
            document.getElementById('specialPrice').value = specialPrice;
            break;
    }
})


function submitProduct() {
    
    document.getElementById("ProductName").disabled = false;
    let ProductName = document.getElementById('ProductName').value;
    let Description = document.getElementById('Description').value;
    let imageURL = document.getElementById('imageURL').value;
    let thumbnailURL = document.getElementById('thumbnailURL').value;
    let foodType = document.getElementById('foodType').value;
    let price = document.getElementById('price').value;
    let onSpecial = document.getElementById("onSpecial").checked ? 1 : 0;
    let specialPrice = document.getElementById('specialPrice').value;

    if (document.getElementsByTagName("h1")[0].innerHTML === "Edit Product") {
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", `../deleteproduct.php`, false);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`title=${ProductName}&category=${foodType}`);
    }
    

    // All inputs must be filled.
    if (ProductName == '' ||
        Description == '' ||
        imageURL == '' ||
        thumbnailURL == '' ||
        foodType == 'Food Type' ||
        price == '' ||
        specialPrice == '') {
        document.getElementById("ProductName").disabled = true;
            alert('You must complete the form!');
            return;
    }
    
    alert('Your product has been added!');
    document.getElementById('products').submit();
    
}

