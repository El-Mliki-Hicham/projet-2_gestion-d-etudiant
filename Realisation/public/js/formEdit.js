let input = document.querySelector('.input');
let text = document.querySelector('.text');
let btn = document.querySelector('.btn_update');
let div = document.querySelector('.search-box');

input.setAttribute("type", "hidden");
btn.setAttribute("type", "hidden");

function change(){
    input.setAttribute("type", "text");
    btn.setAttribute("type", "submit");
    div.style.display = ""
    text.style.display = "none"
   
}