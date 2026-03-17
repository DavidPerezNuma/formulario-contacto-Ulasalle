// src/presentation/js/dropdown.js
document.addEventListener('DOMContentLoaded', () => {
    const btn      = document.getElementById('userMenuBtn');
    const dropdown = document.getElementById('userDropdown');

    btn.addEventListener('click', (e) => {
        e.stopPropagation();
        const open = dropdown.classList.toggle('open');
        btn.setAttribute('aria-expanded', open);
    });

    document.addEventListener('click', () => {
        dropdown.classList.remove('open');
        btn.setAttribute('aria-expanded', false);
    });
});
