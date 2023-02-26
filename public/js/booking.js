// Checking if there is guests or not
const bookBtn = document.querySelector("#book-btn");
const guestsAmount = document.querySelector("#guests-num").value;

// Toggling the guests form where the user can fill in the informations of his guests
const closeGuestsForm = document.querySelector("#close-guests-form");
const guestsForm = document.querySelector(".guests-form");
const bluredBG = document.querySelector(".blured-bg");

bookBtn.addEventListener("click", function() {
    guestsForm.classList.remove("hidden");
    guestsForm.classList.add("fixed");
    bluredBG.classList.remove("hidden");
    bluredBG.classList.add("fixed");
});
closeGuestsForm.onclick = function() {
    guestsForm.classList.add("hidden");
    guestsForm.classList.remove("fixed");
    bluredBG.classList.add("hidden");
    bluredBG.classList.remove("fixed");
}

// Generating the forms needed for the user
const guestsContainer = document.querySelector("#guest-info-cont");
// <div class="flex flex-col justify-center items-center gap-5"></div>

for(let i = 2; i <= guestsAmount; i++) {
    let guestsTemplate = `
    <h4 class="text-2xl font-semibold text-center">Your guest number <span class="text-amber-400 font-bold">${i}</span></h4>
    <div class="input-container relative w-80">
        <input class="w-full p-4 border border-solid border-zinc-100 rounded-lg text-zinc-100 bg-zinc-800 outline-none" type="text" name="first-name[]" required>
        <span class="absolute left-0 p-4 pointer-events-none text-zinc-100 transition-all duration-300 ease-in-out">First Name</span>
    </div>
    <div class="input-container relative w-80">
        <input class="w-full p-4 border border-solid border-zinc-100 rounded-lg text-zinc-100 bg-zinc-800 outline-none" type="text" name="family-name[]" required>
        <span class="absolute left-0 p-4 pointer-events-none text-zinc-100 transition-all duration-300 ease-in-out">Family Name</span>
    </div>
    <div class="input-container relative w-80">
        <input class="w-full p-4 border border-solid border-zinc-100 rounded-lg text-zinc-800 bg-zinc-800 outline-none transition duration-300 focus:text-zinc-100 valid:text-zinc-100" type="date" name="bday[]" required>
        <span class="absolute left-0 p-4 pointer-events-none text-zinc-100 transition-all duration-300 ease-in-out">Birthday</span>
    </div>`;
    let guestTemplate = document.createElement("div");
    guestTemplate.classList.add("flex", "flex-col", "justify-center", "items-center", "gap-5");
    guestTemplate.innerHTML = guestsTemplate;
    guestsContainer.appendChild(guestTemplate);
}
