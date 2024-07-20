const pass = document.getElementById("pass"),
    icon = document.querySelector(".bi");

icon.addEventListener("click", e => {
    if (pass.type === "password") {
        pass.type = "text";
        icon.classList.remove('bi-eye-fill')
        icon.classList.add('bi-eye-slash-fill')
    } else {
        pass.type = "password";
        icon.classList.remove('bi-eye-slash-fill')
        icon.classList.add('bi-eye-fill')
    }
})