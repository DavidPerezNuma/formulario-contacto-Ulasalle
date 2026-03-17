<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto - U La Salle</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/validate.js" defer></script>
</head>
<body>
    <header>
        <h1>Formulario de Contacto</h1>
    </header>

    <main>
        <form action="../../application/ContactFormService.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required></textarea>

            <button type="submit">Enviar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2026 Universidad de La Salle</p>
    </footer>
</body>
</html>