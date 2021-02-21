var path = document.currentScript.getAttribute('abspath') 

var link1src = "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
var link2src = path + "assets/bootstrap/css/bootstrap.min.css";
var link3src = path + "assets/img/favicon.jpg" 

var script1src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js";
var script2src = path + "assets/bootstrap/js/bootstrap.min.js";
var script3src = path + "assets/js/Advanced-NavBar---Multi-dropdown.js";

var login = path + "Login/login.html";
var signup = path + "Signup/Signup.html";

var aisle1 = path + "Aisles/Aisle1/1_Fruits.html" ;
var aisle2 = path + "Aisles/Aisle2/2_Vegetables.html" ;
var aisle3 = path + "Aisles/Aisle3/3_Meat.html" ;
var aisle4 = path + "Aisles/Aisle4/4_Dairy.html" ; 
var aisle5 = path + "Aisles/Aisle5/5_Pastry.html" ;

var cart = path + "Cart/cart.html" ;
// Inserting CSS code of header and Footer into head

var admin = path + "Admin/administration.html";
var home = path + "index.html";

var company = path + "About/company.html"
var team = path + "About/team.html"
var careers = path + "About/careers.html"

var head = document.querySelector('head');

var style = document.createElement('style')
style.innerHTML = `

  @import url("https://fonts.googleapis.com/css?family=Raleway:400,400i,700");

  .footer-dark {
    font-family: Raleway, sans-serif;
    padding: 40px 0;
    color: #f0f9ff;
    background-color: #282d32;
  }
  
  .footer-dark h3 {
    margin-top: 0;
    margin-bottom: 12px;
    font-weight: bold;
    font-size: 16px;
  }
  
  .footer-dark ul {
    padding: 0;
    list-style: none;
    line-height: 1.6;
    font-size: 14px;
    margin-bottom: 0;
  }
  
  .footer-dark ul a {
    color: inherit;
    text-decoration: none;
    opacity: 0.6;
  }
  
  .footer-dark ul a:hover {
    opacity: 0.8;
  }
  
  @media (max-width:767px) {
    .footer-dark .item:not(.social) {
      text-align: center;
      padding-bottom: 20px;
    }
  }
  
  .footer-dark .item.text {
    margin-bottom: 36px;
  }
  
  @media (max-width:767px) {
    .footer-dark .item.text {
      margin-bottom: 0;
    }
  }
  
  .footer-dark .item.text p {
    opacity: 0.6;
    margin-bottom: 0;
  }
  
  .footer-dark .item.social {
    text-align: center;
  }
  
  @media (max-width:991px) {
    .footer-dark .item.social {
      text-align: center;
      margin-top: 20px;
    }
  }
  
  .footer-dark .item.social > a {
    font-size: 20px;
    width: 36px;
    height: 36px;
    line-height: 36px;
    display: inline-block;
    text-align: center;
    border-radius: 50%;
    box-shadow: 0 0 0 1px rgba(255,255,255,0.4);
    margin: 0 8px;
    color: #fff;
    opacity: 0.75;
  }
  
  .footer-dark .item.social > a:hover {
    opacity: 0.9;
  }
  
  .footer-dark .copyright {
    text-align: center;
    padding-top: 24px;
    opacity: 0.3;
    font-size: 13px;
    margin-bottom: 0;
  }


  #cart:hover{
    color: white;
    transform: scale(1.2);
  }
  
  #cart { transition: all 0.3s ease-in-out; }
  
  
  .header2 {
    font-family: Raleway, sans-serif;
    color: #8d97ad;
    font-weight: 300;
  }
  
  .header2.bg-success-gradiant {
    background: #212529;
  }
  
  .header2 .font-12 {
    font-size: 12px;
  }
  
  .header2 .dropdown-item {
    padding: 8px 1rem;
    color: #8d97ad;
  }
  
  .header2 .h2-nav .navbar-nav .nav-item .nav-link {
    padding: 12px 0px;
    color: #ffffff;
    font-weight: 400;
  }
  
  .header2 .h2-nav .navbar-nav .nav-item .nav-link:hover {
    color: #4bda52;
  }
  
  .header2 .h2-nav .navbar-nav .nav-item {
    margin: 0 20px;
  }
  
  @media (min-width: 1024px) {
    .header2 .navbar-nav > .dropdown .dropdown-menu {
      min-width: 210px;
      margin-top: 0px;
    }
  }
  
  @media (min-width: 1024px) {
    .header2 .dropdown-submenu:hover > .dropdown-menu {
      display: block;
    }
  }
  
  .header2 .dropdown-toggle::after {
    display: none;
  }
  
  @media (min-width: 1024px) {
    .header2 .hover-dropdown .navbar-nav > .dropdown:hover > .dropdown-menu {
      display: block;
      margin-top: 0px;
    }
  }
  
  .header2 .btn-dark {
    color: #fff;
    background-color: #343a40;
    border-color: #343a40;
  }
  
  .header2 .btn-dark:hover {
    color: #fff;
    background-color: #23272b;
    border-color: #1d2124;
  }
  
  .header2 .h2-nav .navbar-nav .nav-item .btn {
    opacity: 0.5;
  }
  
  .header2 .h2-nav .navbar-nav .nav-item .btn:hover {
    opacity: 1;
  }
  
  .header2 .dropdown-submenu > .dropdown-menu {
    top: 0;
    left: 100%;
    margin-left: 0;
    border-radius: 0.25rem;
    display: none;
  }
  
` 
var link1 = document.createElement('link')
link1.rel = "stylesheet"
link1.href = link1src;

var link2 = document.createElement('link')
link2.rel = "stylesheet"
link2.href = link2src;

var link3 = document.createElement('link')
link3.rel = "shortcut icon"
link3.href = link3src;


var script1 = document.createElement('script');
script1.src = script1src;

var script2 = document.createElement('script');
script2.src = script2src;

var script3 = document.createElement('script');
script3.src = script3src;


head.appendChild(script1);

head.appendChild(link1);
head.appendChild(link2);
head.appendChild(link3)

head.appendChild(script2);
head.appendChild(script3);

head.appendChild(style)




// Inserting HTML code of header and Footer into body

var body = document.querySelector('body');

var header = document.createElement('header');
header.innerHTML = `
<div class="header2 bg-success-gradiant">
    <div class="">
    <!-- Header 1 code -->
    <nav class="navbar navbar-expand-lg h2-nav">
    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header2" aria-controls="header2" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars" style="color: white"></i>
        </button>
        <div class="collapse navbar-collapse hover-dropdown" id="header2">
        <ul class="navbar-nav">
            <li class="nav-item active">
            <a class="nav-link" href="${home}" style="font-weight: 900;">GROCERY STORE</a>
            </li>
            <li class="nav-item active"><a class="nav-link" href="${home}">Home</a></li>

            <li class="nav-item dropdown position-relative">
            <a class="nav-link dropdown-toggle" href="#" id="h2-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Product <i class="icon-arrow-down ml-1 font-12"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="${aisle1}">Fruits</a></li>
                <li><a class="dropdown-item" href="${aisle2}">Vegetables</a></li>
                <li><a class="dropdown-item" href="${aisle3}">Meat</a></li>
                <li><a class="dropdown-item" href="${aisle4}">Dairy</a></li>
                <li><a class="dropdown-item" href="${aisle5}">Pastry</a></li>
            </ul>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
            <a class="nav-link" id="cart" href=${cart}>
                <i class="fa fa-shopping-cart" style="font-size: x-large;"></i>
            </a>
            </li>
            <li class="nav-item active"><a class="nav-link" href=${login}>Login</a></li>
            <li class="nav-item"><a class="btn rounded-pill btn-dark py-2 px-4" href=${signup}>Sign up</a></li>
        </ul>
        </div>
    </nav>
    <!-- End Header 1 code -->
    </div>
</div>`

var footer = document.createElement('footer');

footer.innerHTML = 
` <div class="footer-dark" style="height: auto;">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 item">
                <h3>About</h3>
                <ul>
                    <li><a href="${company}">Company</a></li>
                    <li><a href="${team}">Team</a></li>
                    <li><a href="${careers}">Careers</a></li>
                </ul>
            </div>
            <div class="col-md-6 item text">
                <h3>The Grocery Store</h3>
                <ul>
                    <li><a href="${admin}">Administrative</a></li>
                </ul>
            </div>
        </div>
        <p class="copyright">SOEN 287© Winter-2021</p>
    </div>
</div>`




body.prepend(header);
body.appendChild(footer);



