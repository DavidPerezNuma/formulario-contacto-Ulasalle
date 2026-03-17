<?php // index.php ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingeniería de Software - U La Salle</title>
    <link rel="stylesheet" href="/src/presentation/css/style.css">
    <script src="/src/presentation/js/dropdown.js" defer></script>
</head>
<body>
    <?php require_once '/var/www/src/presentation/views/partials/header.php'; ?>

    <main>
        <section class="hero">
            <span class="hero-badge">📋 Inscripciones abiertas</span>
            <h2>Ingeniería de Software</h2>
            <p>Aprende a diseñar, desarrollar y gestionar sistemas de software de calidad aplicando metodologías modernas y arquitecturas limpias.</p>

            <div class="features">
                <div class="feature-card">
                    <div class="icon">🏗️</div>
                    <strong>Clean Architecture</strong>
                    Separación clara de capas y responsabilidades
                </div>
                <div class="feature-card">
                    <div class="icon">🐳</div>
                    <strong>Docker</strong>
                    Entornos reproducibles y portables
                </div>
                <div class="feature-card">
                    <div class="icon">🧪</div>
                    <strong>Testing</strong>
                    Validación y pruebas del software
                </div>
            </div>

            <a href="contacto.php" class="btn-primary">Inscribirme ahora →</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 <span>Universidad de La Salle</span> · Proyecto académico</p>
    </footer>
</body>
</html>
