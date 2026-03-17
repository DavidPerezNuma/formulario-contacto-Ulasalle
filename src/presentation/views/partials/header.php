<?php // src/presentation/views/partials/header.php ?>
<header>
    <div class="header-inner">
        <div class="header-logo">🎓</div>
        <div class="header-text">
            <h1>Universidad de La Salle</h1>
            <p>Facultad de Ingeniería · Ingeniería de Software</p>
        </div>
        <div class="user-menu">
            <button class="user-btn" id="userMenuBtn" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                </svg>
            </button>
            <div class="user-dropdown" id="userDropdown">
                <a href="/admin.php">⚙️ Admin</a>
            </div>
        </div>
    </div>
</header>
