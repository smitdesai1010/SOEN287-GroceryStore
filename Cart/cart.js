//-------------------------------Getting order data from sessionStorage----------------
var obj = JSON.parse( sessionStorage.getItem('orders') );
var price;
var qty;

//-------------------------------Generate Order List------------------------------------

var cart = document.querySelector('.cartWrap');

var even = "odd";
var totprice;
var html;


for ( var key in obj ) 
{ 
  price = obj[key].price;
  qty = obj[key].qty;

  totprice = parseInt(qty) * parseFloat(price);
  
  html = `  <li class="items ${even}"> 
              <div class="infoWrap"> 
                <div class="cartSection">
                    <h3>${key}</h3>

                    <p price="${price}"> <input type="text" class="qty" min="0" placeholder="${qty}"/> x ${price}</p>
                  
                </div>  
                <div class="prodTotal cartSection">
                  <p>$${totprice}</p>
                </div>
                <div class="cartSection removeWrap">
                  <a href="#" name=${key} class="remove">x</a>
                </div>
              </div>
            </li>
          `
  
      even = even == "even" ? 'odd' : 'even';    

      cart.innerHTML += html;
}

setGrandtotal();

//-------------------------------------Change qty while in cart page---------------------------

var inputtags = document.querySelectorAll('input');

inputtags.forEach( ele => ele.addEventListener('input',event => {

      var price = event.target.parentElement.getAttribute('price');
      var qty = event.target.value;
      var name = event.target.parentElement.previousElementSibling.innerHTML;

      obj[name].qty = qty;

      var newtotalprice = parseInt(qty) * parseFloat(price);
      newtotalprice = parseFloat(newtotalprice.toPrecision(4));

      event.target.parentElement.parentElement.nextElementSibling.firstElementChild.innerHTML = "$"+newtotalprice;
     
      sessionStorage.setItem('orders',JSON.stringify(obj));
      setGrandtotal();
}))


//------------------------------------Delete--------------------------------

var deletebtns = document.querySelectorAll('a.remove');

deletebtns.forEach( 
  element => element.addEventListener( 
    'click', e =>  {
      e.target.parentElement.parentElement.parentElement.remove() 
      
      var name = e.target.getAttribute('name')
      delete obj[name];

      sessionStorage.setItem('orders',JSON.stringify(obj));

      setGrandtotal();
    }));

//---------------------------------Update Grandtotal---------------------------

function setGrandtotal(){
    
  var subtot = 0;

    for ( var key in obj ) 
    { 
      price = obj[key].price;
      qty = obj[key].qty;
      subtot += parseInt(qty) * parseFloat(price)
    }

    subtot = parseFloat(subtot.toPrecision(4));

    var grandtot = subtot + 9;
    document.getElementById('subtotal').innerHTML = '$'+subtot;
    document.getElementById('grandtotal').innerHTML = '$'+grandtot;
}