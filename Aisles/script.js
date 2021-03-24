function increment() 
{
    document.getElementById('demoInput').stepUp();

    var price = document.getElementById('price').getAttribute('p');
    var qty = document.getElementById('demoInput').value;
    var subtotal = document.getElementById('subtot');
    subtotal.innerHTML = qty * parseFloat(price);
}

function decrement() 
{
    document.getElementById('demoInput').stepDown();

    var price = document.getElementById('price').getAttribute('p');
    var qty = document.getElementById('demoInput').value;
    var subtotal = document.getElementById('subtot');
    subtotal.innerHTML =  qty * parseFloat(price);
}



function toggle(event) 
{
    var e = event.target;
    var x = document.getElementById("info");
    
    if (x.style.display === "none") 
    {
        x.style.display = "block";
        e.innerHTML = "Less Info";
    }    
    else
    { 
        x.style.display = "none"; 
        e.innerHTML = "More Info";
    }
}