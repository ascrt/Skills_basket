const myNav = document.querySelector("nav ul");
console.log(myNav);

const myBurger = document.querySelector("#btn-burger");
console.log(myBurger);

myBurger.addEventListener('click', function(){
    myBurger.classList.toggle('active');
    myNav.classList.toggle('active');
})