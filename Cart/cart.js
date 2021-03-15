var deletebtns = document.querySelectorAll('a.remove');

deletebtns.forEach( 
  element => element.addEventListener( 
    'click', e =>  e.target.parentElement.parentElement.parentElement.remove() ));


    