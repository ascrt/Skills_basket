const myNav = document.querySelector("nav ul");

const myBurger = document.querySelector("#btn-burger");


myBurger.addEventListener('click', function(){
    myBurger.classList.toggle('active');
    myNav.classList.toggle('active');
})


