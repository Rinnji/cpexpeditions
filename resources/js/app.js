import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

console.log("Hello, world!");
function toggleDrawer() {
    const drawer = document.getElementById("main-drawer");
    document.getElementById("main-drawer").classList.toggle("main-drawer-show");
}

//di ine-export ng vite pag di to gawin
window.toggleDrawer = toggleDrawer;

function toggleNavDropdown() {
    document
        .getElementById("nav-dropdown")
        .classList.toggle("nav-dropdown-show");
}

function onClose(id) {
    document.getElementById(id).classList.add("hidden");
}

window.onClose = onClose;
window.toggleNavDropdown = toggleNavDropdown;
document.addEventListener("click", function (event) {
    const drawer = document.getElementById("main-drawer");
    const navDropdown = document.getElementById("nav-dropdown");
    const navDropdownToggle = document.getElementById("nav-dropdown-toggle");
    const drawerToggle = document.getElementById("drawer-toggle");

    // if click event is outside the drawer and the drawer is open and the clicked element is not the drawer toggle
    if (
        !drawer.contains(event.target) &&
        drawer.classList.contains("main-drawer-show") &&
        !drawerToggle.contains(event.target)
    ) {
        drawer.classList.remove("main-drawer-show");
    }

    // if click event is outside the nav dropdown and the nav dropdown is open and the clicked element is not the nav dropdown toggle
    if (
        !navDropdown.contains(event.target) &&
        navDropdown.classList.contains("nav-dropdown-show") &&
        !navDropdownToggle.contains(event.target)
    ) {
        navDropdown.classList.remove("nav-dropdown-show");
    }
});
let searchDropdown = document.getElementById("search-dropdown");
async function searchThesis(id) {
    const userInput = document.getElementById(id).value;
    console.log(document.getElementById(id).value);
    const searchDropdown = document.getElementById("search-dropdown");
    const searchItemSample = document.getElementById("search-item");
    const response = await fetch(`/thesis/json_search?search=${userInput}`, {
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
        },
    });
    searchDropdown.innerHTML = "";
    const data = await response.json();
    if (data) {
        searchDropdown.classList.remove("hidden");
        data.map((item) => {
            const searchItem = searchItemSample.cloneNode(true);
            const a = searchItem.querySelector("a");
            a.href = `/thesis/${item.id}`;
            a.textContent = item.title;
            searchDropdown.appendChild(searchItem);
        });
    }
}
window.searchThesis = searchThesis;
