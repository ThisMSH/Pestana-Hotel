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
const roomType = document.querySelector("#room-type");
const guestsNum = document.querySelector("#guests-number");
const suiteType = document.querySelector("#suite-type");

roomType.addEventListener("change", function(event) {
	guestsNum.innerHTML = "";
	suiteType.innerHTML = "";

	const selectedRoom = event.target.value;
	let guests = 0;

	if(selectedRoom == "Single") {
		guests = 1;
	}else if(selectedRoom == "Double") {
		guests = 2;
	}else if(selectedRoom == "Suite") {
		guests = 6;
		suiteType.innerHTML = `
		<h3 class="w-full font-serif text-lg mb-1">Please select the type of suite room:</h3>
		<select class="w-full col-span-3 px-6 py-3 text-lg bg-zinc-200 border border-zinc-900 rounded-lg" name="" id="">
			<option value="Standard">Standard suite</option>
			<option value="Junior">Junior suite</option>
			<option value="Presidential">Presidential suite</option>
			<option value="Penthouse">Penthouse suite</option>
			<option value="Honeymoon">Honeymoon suite</option>
			<option value="Bridal">Bridal suite</option>
		</select>`;
	}

	for(let i = 1; i <= guests; i++) {
		const options = document.createElement("option");
		options.value = i;
		options.innerHTML = i;
		guestsNum.appendChild(options);
	}
});