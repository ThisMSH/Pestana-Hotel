// ===== Form Validation =====
const signupInputs = document.querySelectorAll(".input-container input");
const guide = document.querySelector(".guide");
const validation = {
    firstname: /^(?=.{3,32}$)[a-z]+(?: [a-z]+)?$/i,
    familyname: /^(?=.{3,32}$)[a-z]+(?: [a-z]+){0,2}$/i,
    bday: /^(?:19|20)\d{2}-(?:0[1-9]|1[012])-(?:0[1-9]|[12]\d|3[01])$/,
    phone: /^(0|\+212|00212)\d{9}$/,
    username: /^[a-z\d]{5,16}$/i,
    email: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
    password: /^(?=.*[\d])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d!@#$%^&*]{8,36}$/
};

function validate(field, regex) {
    if(regex.test(field.value)) {
        field.classList.remove("border-zinc-100");
        field.classList.remove("border-red-0");
        field.classList.add("border-green-400");
    }else {
        field.classList.remove("border-zinc-100");
        field.classList.add("border-red-0");
        field.classList.remove("border-green-400");
    }
}

for(var i = 0; i < signupInputs.length; i++) {
    let input = signupInputs[i];
    let para = guide.children[i + 1];
    let firstPara = guide.children[0];

    if(i < (signupInputs.length - 1)) {
        input.addEventListener('keyup', function (evt) {
            let inputName = evt.target.attributes.name.value;
    
            validate(evt.target, validation[inputName]);
        });
    }
    input.addEventListener('focus', function () {
        para.classList.add("block");
        para.classList.remove("hidden");
        firstPara.classList.add("hidden");
        firstPara.classList.remove("block");
    });
    input.addEventListener('blur', function () {
        para.classList.remove("block");
        para.classList.add("hidden");
        firstPara.classList.remove("hidden");
        firstPara.classList.add("block");
    });
}

const pwd = signupInputs[signupInputs.length - 2];
const cPwd = signupInputs[signupInputs.length - 1];
cPwd.addEventListener('keyup', function () {
    if(cPwd.value.length > 0) {
        if(cPwd.value === pwd.value) {
            cPwd.classList.remove("border-zinc-100");
            cPwd.classList.remove("border-red-0");
            cPwd.classList.add("border-green-400");
        }else {
            cPwd.classList.remove("border-zinc-100");
            cPwd.classList.add("border-red-0");
            cPwd.classList.remove("border-green-400");
        }
    }else {
        cPwd.classList.remove("border-zinc-100");
        cPwd.classList.add("border-red-0");
        cPwd.classList.remove("border-green-400");
    }
})

// ============= Alert =============
const alertContainer = document.querySelector("#alert");

document.addEventListener("click", function(event) {
    if(event.target.id == "close-alert") {
        alertContainer.classList.remove("fixed");
        alertContainer.classList.add("hidden");
    }
});
