// 返回文档中与指定的选择器或选择器组匹配的第一个元素。如果未找到匹配项，则返回 null
let navbar=document.querySelector('.navbar');
document.querySelector('#menu-btn').onclick= () =>
{
    // toggle 是一個將元素 切換成兩個狀態：一個是 hide，一個是show。
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    carItem.classList.remove('active');
}


let searchForm=document.querySelector('.search-form');
document.querySelector('#search-btn').onclick= () =>
{
    // toggle 是一個將元素 切換成兩個狀態：一個是 hide，一個是show。
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    carItem.classList.remove('active');
}



let carItem=document.querySelector('.cart-items-container');
document.querySelector('#cart-btn').onclick= () =>
{
    // toggle 是一個將元素 切換成兩個狀態：一個是 hide，一個是show。
    carItem.classList.toggle('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');

}

window.onscroll=()=>{
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    carItem.classList.remove('active');

}