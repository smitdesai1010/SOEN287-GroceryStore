function edit(id) {
    productProperties = id.parentElement.parentElement.getElementsByTagName("td");
    productName = productProperties[0].innerHTML;
    categoryName = productProperties[1].innerHTML;
    loadDoc(productName, categoryName);
}

function loadDoc(productName, categoryName) {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            obtainProductData(this, productName, categoryName);
        }
    };
    xhttp.open("GET", "../../DataBase/products.xml", true);
    xhttp.send();
}

function obtainProductData(xml, productName, categoryName) {
    // console.log("The category name is: " + categoryName);
    // console.log("The product name is: " + productName);
    const category = xml.responseXML.getElementsByTagName(categoryName);
    // console.log(category[0]);
    const products = category[0].getElementsByTagName('PRODUCT');
    // console.log(products[0]);
    let i;

    for (i = 0; i < products.length; i++) {
        // console.log(products[i].getElementsByTagName("TITLE")[0].innerHTML);
        if (products[i].getElementsByTagName("TITLE")[0].innerHTML == productName) {

            let originalProductName = products[i].getElementsByTagName("TITLE")[0].innerHTML;
            let originalDescription = products[i].getElementsByTagName("DESCRIPTION")[0].innerHTML;
            let originalimageURL = products[i].getElementsByTagName("IMAGE")[0].innerHTML;
            let originalthumbnailURL = products[i].getElementsByTagName("THUMBNAIL")[0].innerHTML;
            let originalfoodType = category[0].tagName;
            let originalprice = products[i].getElementsByTagName("PRICE")[0].innerHTML;
            let originalonSpecial = products[i].getElementsByTagName("SPECIAL")[0].innerHTML;
            let originalspecialPrice = products[i].getElementsByTagName("SPECIALPRICE")[0].innerHTML;

            window.open(`AddProduct/addproduct.html?name=${originalProductName}&desc=${originalDescription}&img=${originalimageURL}&thumb=${originalthumbnailURL}
            &type=${originalfoodType}&price=${originalprice}&spc=${originalonSpecial}&spcp=${originalspecialPrice}`);
            break;
        }
        else
        console.log("Query failed");
    };
}