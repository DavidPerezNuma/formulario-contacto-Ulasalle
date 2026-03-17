<?php // src/presentation/views/admin.php ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - U La Salle</title>
    <link rel="stylesheet" href="/src/presentation/css/style.css">
    <script src="/src/presentation/js/dropdown.js" defer></script>
</head>
<body>
    <?php require_once __DIR__ . '/partials/header.php'; ?>

    <main class="main-wide">
        <div class="admin-card">
            <div class="admin-header">
                <div>
                    <a href="/index.php" class="btn-back">← Inicio</a>
                    <h2>Panel de Administración</h2>
                </div>
                <span class="badge"><?= count($mensajes) ?> registro(s)</span>
            </div>

            <?php if ($dbError): ?>
                <div class="empty-state">
                    <div class="empty-icon">🔌</div>
                    <p>No hay conexión con la base de datos.</p>
                    <span>Asegúrate de que el servicio esté corriendo.</span>
                </div>
            <?php elseif (empty($mensajes)): ?>
                <div class="empty-state">
                    <div class="empty-icon">📭</div>
                    <p>Aún no hay mensajes registrados.</p>
                    <span>Cuando alguien envíe el formulario, aparecerá aquí.</span>
                </div>
            <?php else: ?>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Mensaje</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mensajes as $m): ?>
                            <tr>
                                <td><?= htmlspecialchars($m->id) ?></td>
                                <td><?= htmlspecialchars($m->nombre) ?></td>
                                <td><?= htmlspecialchars($m->correo) ?></td>
                                <td><?= htmlspecialchars($m->mensaje) ?></td>
                                <td><?= htmlspecialchars($m->fecha) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 <span>Universidad de La Salle</span> · Proyecto académico</p>
    </footer>
</body>
</html>
