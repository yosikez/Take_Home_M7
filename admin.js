const checkBox = document.querySelector(".menu-toggle input");
const nav = document.querySelector("nav ul");


checkBox.addEventListener("click", () => {
    nav.classList.toggle("slide");
})