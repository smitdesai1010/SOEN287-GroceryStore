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
            console.log("name: " + ProductName)
            document.getElementById("ProductName").value = ProductName;
            break;
        case key == 'desc': Description = value;
            console.log("desc: " + Description)
            document.getElementById("Description").value = Description;
            break;
        case key == 'img': imageURL = value;
            console.log("img: " + imageURL)
            document.getElementById("imageURL").value = imageURL;
            break;
        case key !== 'img' && key !== 'thumb' && thumbnailURL === "": imageURL += key + "=" + value;
            console.log("img extended: " + imageURL)
            break;
        case key == 'thumb': thumbnailURL = value;
            console.log("thumb: " + thumbnailURL)
            break;
        case key !== 'thumb' && key !== 'type' && foodType === "": thumbnailURL += key + "=" + value;
            console.log("thumb extended: " + thumbnailURL)
            document.getElementById('thumbnailURL').value = thumbnailURL;
            break;
        case key == 'type': foodType = value;
            console.log("type: " + foodType)
            document.getElementById('foodType').value = foodType;
            break;
        case key == 'price': price = value;
            console.log("price: " + price)
            document.getElementById('price').value = price;
            break;
        case key == 'spc':
            if (value == 1) document.getElementById("onSpecial").checked = true;
            console.log(value);
            break;
        case key == 'spcp': specialPrice = value;
            document.getElementById('specialPrice').value = specialPrice;
            console.log("special price: " + specialPrice)
            break;
    }
})


function submitProduct() {
    ProductName = document.getElementById('ProductName').value;
    Description = document.getElementById('Description').value;
    imageURL = document.getElementById('imageURL').value;
    thumbnailURL = document.getElementById('thumbnailURL').value;
    foodType = document.getElementById('foodType').value;
    price = document.getElementById('price').value;
    onSpecial = document.getElementById("onSpecial").checked ? 1 : 0;
    specialPrice = document.getElementById('specialPrice').value

    // All inputs must be filled.
    if (ProductName == '' ||
        Description == '' ||
        imageURL == '' ||
        thumbnailURL == '' ||
        foodType == 'Food Type' ||
        price == '' ||
        specialPrice == '') {
        alert('You must complete the form!');
        return;
    }

    document.getElementById('products').submit();
    alert('Your product has been added!');
}

