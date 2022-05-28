// document.querySelector('') 是用於 返回文档中与指定的选择器
let menu = document.querySelector('#menu-btn');
let navbar=document.querySelector('.header .navbar')

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}
