// ===== navbar =====
let header = document.querySelector("header");

window.addEventListener("scroll", function() {
	header.classList.toggle("fix", window.scrollY > 0);
});

// ===== Burger menu =====
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const sideBar = document.querySelector("#side-bar");

menuBtn.addEventListener("click", function() {
	sideBar.classList.remove("-right-60");
	sideBar.classList.add("right-0");
});

closeBtn.addEventListener("click", function() {
	sideBar.classList.add("-right-60");
	sideBar.classList.remove("right-0");
});

// ===== Alert =====
const alertContainer = document.querySelector("#alert");

document.addEventListener("click", function(event) {
    if(event.target.id == "close-alert") {
        alertContainer.classList.remove("fixed");
        alertContainer.classList.add("hidden");
    }
});
