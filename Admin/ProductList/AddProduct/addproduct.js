function submitProduct(){
    var ProductName = document.getElementById('ProductName').value;
    var Description = document.getElementById('Description').value;
    var imageURL = document.getElementById('imageURL').value;
    var foodType = document.getElementById('foodType').value;
    var productVendor = document.getElementById('productVendor').value;

    // All inputs must be filled.
    if ( ProductName == '' || 
    Description == '' || 
    imageURL == '' || 
    foodType == 'Food Type' || 
    productVendor == '')
    {
        alert('You must complete the form!');
        return;
    }

    document.getElementById('products').submit();
    alert('Your product has been added!');
}
