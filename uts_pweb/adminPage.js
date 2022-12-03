
// INI STICKY HEADER
const header = document.querySelector("header");
window.addEventListener ("scroll", function(){
    header.classList.toggle ("sticky", window.scrollY > 0);
});

// INI MENU NAVBAR
let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');
menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
};
window.onscroll = () => {
    menu.classList.remove('bx-x');
    navbar.classList.remove('open');
};

// INI DARK
var content = document.getElementsByTagName('body')[0];
var atas = document.getElementsByTagName('header')[0];
var tengah = document.getElementsByTagName('section')[0];
var judul = document.getElementsByClassName('text')[0];
var darkMode = document.getElementById('dark');
darkMode.addEventListener('click',function(){
    darkMode.classList.toggle('active');
    content.classList.toggle('night');
    atas.classList.toggle('night');
    tengah.classList.toggle('night');
    judul.classList.toggle('night');
});