const cancelBtn = document.querySelectorAll(".cancel-btn");
const bluredBg = document.querySelector(".blured-bg");
const cancelPopUp = document.querySelectorAll(".cancel-popup");
const undoBtn = document.querySelectorAll(".undo-btn");

for(let i = 0; i < cancelBtn.length; i++) {
    cancelBtn[i].addEventListener("click", function() {
        bluredBg.classList.remove("hidden");
        cancelPopUp[i].classList.remove("hidden");
    });
    undoBtn[i].addEventListener("click", function() {
        bluredBg.classList.add("hidden");
        cancelPopUp[i].classList.add("hidden");
    });
    bluredBg.addEventListener("click", function() {
        bluredBg.classList.add("hidden");
        cancelPopUp[i].classList.add("hidden");
    });
}

// ===== Bookers pop-up =====
const bookersPop = document.querySelectorAll(".bookers-pop");
const bookersCnt = document.querySelectorAll(".bookers");
const bookersClose = document.querySelectorAll(".bookers-btn");

for(let i = 0; i < bookersPop.length; i++) {
    bookersPop[i].addEventListener("click", function() {
        bookersCnt[i].classList.remove("hidden");
        bluredBg.classList.remove("hidden");
    });
    bookersClose[i].addEventListener("click", function() {
        bookersCnt[i].classList.add("hidden");
        bluredBg.classList.add("hidden");
    });
    bluredBg.addEventListener("click", function() {
        bookersCnt[i].classList.add("hidden");
    })
}

// ===== Update pop-up =====
const updateBtn = document.querySelectorAll(".update-btn");
const updateCnt = document.querySelectorAll(".update-bookers");
const updateClose = document.querySelectorAll(".close-update");

for(let i = 0; i < updateBtn.length; i++) {
    updateBtn[i].addEventListener("click", function() {
        updateCnt[i].classList.remove("hidden");
        bluredBg.classList.remove("hidden");
    });
    updateClose[i].addEventListener("click", function() {
        updateCnt[i].classList.add("hidden");
        bluredBg.classList.add("hidden");
    });
    bluredBg.addEventListener("click", function() {
        updateCnt[i].classList.add("hidden");
    })
}

// ===== Alert =====
const alertContainer = document.querySelector("#alert");

document.addEventListener("click", function(event) {
    if(event.target.id == "close-alert") {
        alertContainer.classList.remove("fixed");
        alertContainer.classList.add("hidden");
    }
});
