// validate.js
document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");

    form.addEventListener("submit", (event) => {
        const nombre = document.getElementById("nombre").value.trim();
        const correo = document.getElementById("correo").value.trim();
        const mensaje = document.getElementById("mensaje").value.trim();

        if (!nombre || !correo || !mensaje) {
            alert("Por favor, completa todos los campos.");
            event.preventDefault();
        } else if (!/\S+@\S+\.\S+/.test(correo)) {
            alert("Por favor, ingresa un correo válido.");
            event.preventDefault();
        }
    });
});