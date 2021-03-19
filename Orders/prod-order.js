
document.getElementById('add').addEventListener('click', () => {

    var orders = sessionStorage.getItem('orders');
    orders = JSON.parse(orders);
    
    if ( orders == null )   //No order has been placed
        orders = {};
    
    var name = document.querySelector('b').innerHTML;
    var price = document.getElementById('price').getAttribute('p');
    var qty = document.getElementById('demoInput').value;

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
    
    alert(`${name} * ${qty} has been added to your cart.`)
    
    sessionStorage.setItem('orders',JSON.stringify(orders))
})
