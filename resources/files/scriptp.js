const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");

hamburger.addEventListener("click", () => {
navLinks.classList.toggle("open");
links.forEach(link => {
link.classList.toggle("fade");
});
});
//search
let searchform= document.querySelector('.search-form');
document.querySelector('#search-btn').onclick=() =>{
  searchform.classList.toggle('active');
}
//search
 // sign up
 var modal = document.getElementById('id01');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    //sign up
    var typed =new Typed(".auto",{
        strings:["NU GEBEYA , You're One Stop For Everything Ethiopian ","ኑ ገበያ:- የ ኢትዮጵያን ሁሉ ይሸምቱ"],
        typeSpeed:150,
        backSpeed:100,
        loop: true})

        const firstn = document.getElementById("fn");
    const lastn = document.getElementById("ln");
    const email = document.getElementById("em");
    const phone = document.getElementById("ph");
    const country = document.getElementById("co");
    const city = document.getElementById("ci");
    const birthday = document.getElementById("bd");
    const radioone = document.getElementById("rd1");
    const radiotwo= document.getElementById("rd2");
    const pass = document.getElementById("ps1");
    const password = document.getElementById("ps2");
    const checkbox= document.getElementById("ch");
    const button = document.getElementById("bt");
bt.onclick = function(){
const name1 = firstn.value;
const name2 = lastn.value;
const email1 = email.value;
const phone1 = phone.value;
const country1 = country.value;
const city1 = city.value;
const birthday1 = birthday.value;
const radioone1 = radioone.value;
const radiotwo1= radiotwo.value;
const pass1 = pass.value;
const password1 = password.value;
const checkbox1=checkbox.value; 

console.log(name1);
console.log(name2);
console.log(email1);
console.log(phone1);
console.log(country1);
console.log(city1);
console.log(birthday1);
console.log(radioone1);
console.log(radiotwo1);
console.log(pass1);
console.log(password1);
console.log(checkbox1);
    localStorage.setItem(name1, name2,email1,phone1,country1,city1,birthday1,radioone1,radiotwo1,pass1,password1,checkbox1);
    location.reload;

};


