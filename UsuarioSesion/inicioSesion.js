//Cambio de Inicio y Registro
const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

//Ocultar y mostrar contraseña
document.querySelectorAll('.togglePass').forEach(function (icon) {
    icon.addEventListener('click', function () {
        const pass = document.getElementById(icon.getAttribute('data-pass'));
        if (pass.type === 'password') {
            pass.type = 'text';
            icon.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
        } else {
            pass.type = 'password';
            icon.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
        }
    });
});

