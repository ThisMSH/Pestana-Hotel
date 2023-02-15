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

// ===== Home form =====
