const cancelBtn = document.querySelectorAll(".cancel-btn");
const bluredBg = document.querySelector(".blured-bg");
const cancelPopUp = document.querySelectorAll(".cancel-popup");
const undoBtn = document.querySelectorAll(".undo-btn");

for(let i = 0; i < cancelBtn.length; i++) {
    cancelBtn[i].addEventListener("click", function() {
        bluredBg.classList.remove("hidden");
        bluredBg.classList.add("fixed");
        cancelPopUp[i].classList.remove("hidden");
        cancelPopUp[i].classList.add("fixed");
    });
    undoBtn[i].addEventListener("click", function() {
        bluredBg.classList.add("hidden");
        bluredBg.classList.remove("fixed");
        cancelPopUp[i].classList.add("hidden");
        cancelPopUp[i].classList.remove("fixed");
    });
    bluredBg.addEventListener("click", function() {
        bluredBg.classList.add("hidden");
        bluredBg.classList.remove("fixed");
        cancelPopUp[i].classList.add("hidden");
        cancelPopUp[i].classList.remove("fixed");
    });
}
