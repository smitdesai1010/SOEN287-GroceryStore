function submitProduct(){
    var ProductName = document.getElementById('ProductName').value;
    var Description = document.getElementById('Descriptio').value;
    var imageURL = document.getElementById('imageURL').value;
    var foodType = document.querySelector("option[selected]").value;
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

    document.getElementById('form').submit();
}
