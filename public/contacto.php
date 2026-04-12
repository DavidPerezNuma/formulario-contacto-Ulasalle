<?php // contacto.php ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto - U La Salle</title>
    <link rel="stylesheet" href="/src/presentation/css/style.css">
    <script src="/src/presentation/js/validate.js" defer></script>
    <script src="/src/presentation/js/dropdown.js" defer></script>
</head>
<body>
    <?php require_once '/var/www/src/presentation/views/partials/header.php'; ?>

    <main>
        <div class="form-card">
            <h2>Formulario de Contacto</h2>
            <p class="subtitle">Completa tus datos y nos pondremos en contacto contigo.</p>

            <form action="/src/application/ContactFormService.php" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre completo</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" placeholder="tu@correo.com" required>
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje o consulta</label>
                    <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje aquí..." required></textarea>
                </div>
                <button type="submit">Enviar mensaje →</button>
            </form>

            <div style="text-align:center; margin-top:1.2rem;">
                <a href="index.php" class="btn-secondary">← Volver al inicio</a>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <?php if (isset($_GET['enviado'])): ?>
    <div class="modal-overlay" id="modal">
        <div class="modal">
            <div class="modal-icon success">✅</div>
            <h3>¡Mensaje enviado!</h3>
            <p>Tu mensaje fue recibido correctamente. Pronto nos pondremos en contacto contigo.</p>
            <button class="modal-close" onclick="document.getElementById('modal').remove()">Cerrar</button>
        </div>
    </div>
    <?php elseif (isset($_GET['error'])): ?>
    <div class="modal-overlay" id="modal">
        <div class="modal">
            <div class="modal-icon error">❌</div>
            <h3>Error al enviar</h3>
            <p>Ocurrió un problema al enviar tu mensaje. Por favor intenta de nuevo.</p>
            <button class="modal-close" onclick="document.getElementById('modal').remove()">Cerrar</button>
        </div>
    </div>
    <?php endif; ?>

<footer style="margin-top: 3rem; padding: 2rem; background-color: #f4f4f4; border-top: 2px solid #004b87; text-align: center;">
        <p style="font-weight: bold; color: #004b87; margin-bottom: 0.5rem;">Soporte Técnico - Universidad de La Salle</p>
        <p style="margin: 0.2rem 0;">📧 Contacto: <a href="mailto:ju-medina@correo.com">ju-medina@correo.com</a></p>
        <p style="margin: 0.2rem 0;">🕒 Horario: Lunes a Viernes (8:00 AM - 6:00 PM)</p>
        <hr style="width: 50%; margin: 1rem auto; border: 0; border-top: 1px solid #ccc;">
        <p>&copy; 2026 <span>Universidad de La Salle</span> · Proyecto académico</p>
    </footer>
</body>
</html>
