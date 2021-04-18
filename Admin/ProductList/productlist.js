document.getElementById("filtersearchbar").setAttribute("column", "0");

function setfilter(selector) {
    document.getElementById("filtersearchbar").setAttribute("column", `${selector.id}`);
    document.getElementById("dropdownHeader").innerHTML = selector.innerHTML;
}

function filter() {
    let input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filtersearchbar");
    filter = input.value.toUpperCase();
    table = document.getElementById("product-list");
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

function remove(id) {
    product = data(id);
    if (confirm("Are you sure you want to delete " + product.productName + " from the store?")) {
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", `deleteproduct.php`, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`title=${product.productName}&category=${product.categoryName}`);
        alert("Product deleted!");
        location.reload();
    }
    
}

function edit(id) {
    const product = data(id);
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            redirectWithData(this, product.productName, product.categoryName);
        }
    };
    xhttp.open("GET", "../../DataBase/products.xml", true);
    xhttp.send();
}

function data(id) {
    const productData = id.parentElement.parentElement.getElementsByTagName("td");
    const productProperties = {
        productName: productData[0].innerHTML,
        categoryName: productData[1].innerHTML
    };
    return productProperties;
}

function redirectWithData(xml, productName, categoryName) {
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



