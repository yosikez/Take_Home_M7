// sidebar
const barToggle = document.querySelector(".sidebar-toggle input");
const menuBar = document.querySelectorAll(".menu-sidebar a");
const sidebar = document.querySelector(".sidebar");


['mouseover', 'mouseout'].forEach(evnt => 
    sidebar.addEventListener(evnt, ()=>{
        menuBar.forEach((bar)=>{
            bar.classList.toggle("show");
        })
        sidebar.classList.toggle("expand");
    })
)
barToggle.addEventListener('click', ()=> {
    menuBar.forEach((bar)=>{
        bar.classList.toggle("show");
    })
    sidebar.classList.toggle("expand");
})