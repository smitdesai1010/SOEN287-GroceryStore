
document.querySelectorAll('#add').forEach(ele => ele.addEventListener('click', e => {

    var orders = sessionStorage.getItem('orders');
    orders = JSON.parse(orders);
    
    if ( orders == null )   //No order has been placed
        orders = {};
    
    var name = e.target.parentNode.firstElementChild.innerHTML;
    var price = e.target.previousElementSibling.firstElementChild.nextElementSibling.getAttribute('price');
    var qty = e.target.previousElementSibling.firstElementChild.nextElementSibling.value;

    if (qty == '' || qty == 0)
    {
        alert('Select a valid quantity');
        return;
    }

    if ( orders[name] == null )
    {
        orders[name] = {}
        orders[name].price = price;
        orders[name].qty = qty;
    }

    else        //Order of this item already exists, only update the qty
    {
        orders[name].qty = parseInt(orders[name].qty) + parseInt(qty);
    }
    
    sessionStorage.setItem('orders',JSON.stringify(orders))
}))