// Toggle add room form
const addRoomBtn = document.querySelector("#add-new-room");
const roomCnt = document.querySelector("#add-room");
const closeRoomCntBtn = document.querySelector("#close-btn");
const bgBlured = document.querySelector(".blured-bg");

addRoomBtn.addEventListener("click", function() {
    roomCnt.classList.remove("hidden");
    bgBlured.classList.remove("hidden");
});

closeRoomCntBtn.addEventListener("click", function() {
    roomCnt.classList.add("hidden");
    bgBlured.classList.add("hidden");
});

bgBlured.addEventListener("click", function() {
    roomCnt.classList.add("hidden");
    bgBlured.classList.add("hidden");
});

// Toogle update room form
const updateRoomBtn = document.querySelectorAll(".edit-btn");
const updateRoomCnt = document.querySelectorAll(".update-room");
const closeUpdateBtn = document.querySelectorAll(".close-update-btn");

for(let i = 0; i < updateRoomBtn.length; i++) {
    updateRoomBtn[i].addEventListener("click", function() {
        updateRoomCnt[i].classList.remove("hidden");
        bgBlured.classList.remove("hidden");
    });
    
    closeUpdateBtn[i].addEventListener("click", function() {
        updateRoomCnt[i].classList.add("hidden");
        bgBlured.classList.add("hidden");
    });

    bgBlured.addEventListener("click", function() {
        updateRoomCnt[i].classList.add("hidden");
    });
}

// Toogle delete room pop-up
const deleteRoomBtn = document.querySelectorAll(".delete-btn");
const deleteRoomCnt = document.querySelectorAll(".delete-popup");
const closeDeleteBtn = document.querySelectorAll(".close-delete-btn");

for(let i = 0; i < deleteRoomBtn.length; i++) {
    deleteRoomBtn[i].addEventListener("click", function() {
        deleteRoomCnt[i].classList.remove("hidden");
        bgBlured.classList.remove("hidden");
    });
    
    closeDeleteBtn[i].addEventListener("click", function() {
        deleteRoomCnt[i].classList.add("hidden");
        bgBlured.classList.add("hidden");
    });

    bgBlured.addEventListener("click", function() {
        deleteRoomCnt[i].classList.add("hidden");
    });
}

// ===== Alert =====
const alertContainer = document.querySelector("#alert");

document.addEventListener("click", function(event) {
    if(event.target.id == "close-alert") {
        alertContainer.classList.remove("fixed");
        alertContainer.classList.add("hidden");
    }
});
