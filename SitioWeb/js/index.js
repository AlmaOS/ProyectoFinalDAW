//https://developer.mozilla.org/es/docs/Web/API/EventTarget/addEventListener
// https://www.w3schools.com/jsref/prop_element_classlist.asp
const botonBarra = document.querySelector(".botonBarra");
const navMenu = document.querySelector(".listaMenu");

botonBarra.addEventListener("click",function(){
    navMenu.classList.toggle("menuDesplegable")
})