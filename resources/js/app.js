import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



// +--------------------------------+
// | Show/Hide navmenu on mobile    |
// +--------------------------------+

// Humburger menu toggle on mobile
const humburger = document.querySelector(".humburger")

humburger.addEventListener("click", toggle_menu)

function toggle_menu(){
    const navmenu = document.querySelector(".dashboard-navigation")
    navmenu.classList.toggle("dashboard-navigation--show")
    humburger.classList.toggle("bi-list")
    humburger.classList.toggle("bi-x")
}

// Hide navmenu when clicking on a link of navmenu
const nav_links = document.getElementsByClassName("nav-link")
for (const nav_link of nav_links){
    nav_link.addEventListener("click", toggle_menu)
}
