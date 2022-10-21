let input = document.querySelector('.input');
let text = document.querySelector('.text');
let butn = document.querySelector('.btsn');

input.setAttribute("type", "hidden");

function change(){
    input.setAttribute("type", "text");
    text.style.display = "none"
   
}