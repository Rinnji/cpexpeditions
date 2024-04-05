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
let timeoutId;

function debounce(func, delay) {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(func, delay);
}

async function searchThesis(id) {
    const userInput = document.getElementById(id).value;

    const searchDropdown = document.getElementById("search-dropdown");
    const searchItemSample = document.getElementById("search-item");

    debounce(async () => {
        const response = await fetch(
            `/thesis/json_searchbar?search=${userInput}`,
            {
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                },
            }
        );
        searchDropdown.innerHTML = "";
        const data = await response.json();
        const results = [];
        if (data) {
            searchDropdown.classList.remove("hidden");
            data.map((item) => {
                const keys = Object.keys(item);

                for (let key of keys) {
                    if (
                        typeof item[key] === "string" &&
                        item[key].includes(userInput)
                    ) {
                        const index = item[key].indexOf(userInput);
                        const strResult = item[key].slice(index);

                        // Splitting the string into parts before and after userInput
                        const beforeUserInput = item[key].substring(
                            index - 10 > 0 ? index - 10 : 0,
                            index
                        );
                        const afterUserInput = item[key].substring(
                            index + userInput.length
                        );

                        // Creating a span to highlight userInput
                        const highlightedUserInput =
                            document.createElement("span");
                        highlightedUserInput.classList.add("bg-primary-blue");
                        highlightedUserInput.classList.add("text-white");
                        highlightedUserInput.textContent = userInput;

                        // Creating a container to hold the highlighted userInput
                        const resultContainer = document.createElement("p");

                        resultContainer.classList.add(
                            "overflow-hidden",
                            "whitespace-nowrap",
                            "text-clip"
                        );

                        resultContainer.appendChild(
                            document.createTextNode(beforeUserInput)
                        );
                        resultContainer.appendChild(highlightedUserInput);
                        resultContainer.appendChild(
                            document.createTextNode(afterUserInput)
                        );

                        const searchItem = searchItemSample.cloneNode(true);
                        searchItem.classList.remove("hidden");
                        const a = searchItem.querySelector("a");
                        a.innerHTML = "";
                        a.href = `/thesis/${item.id}`;

                        // Appending the result container to the searchItem
                        a.appendChild(resultContainer);
                        searchDropdown.appendChild(searchItem);
                    }
                }
            });
        }
    }, 300); // Adjust the delay as needed (in milliseconds)
}

window.searchThesis = searchThesis;
