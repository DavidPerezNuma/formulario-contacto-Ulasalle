# Formulario de Contacto — U La Salle

Canal de inscripción y contacto para la materia de **Ingeniería de Software** de la Universidad de La Salle. Construido con PHP, MySQL y Docker, siguiendo Clean Architecture y principios SOLID.

> Para información detallada sobre la estructura de carpetas, capas y decisiones de diseño, consulta [docs/arquitectura.md](docs/arquitectura.md).

---

## Requisitos

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) instalado y corriendo
- No se necesita PHP, MySQL ni XAMPP instalados localmente

---

## Levantar el proyecto

### Primera vez

```bash
docker-compose up --build
```

### Veces siguientes

```bash
docker-compose up
```

### Detener el proyecto

```bash
docker-compose down
```

> Si necesitas reiniciar la base de datos desde cero (recrear tablas):
> ```bash
> docker-compose down -v
> docker-compose up --build
> ```
> El flag `-v` elimina el volumen de datos de MySQL.

---

## URLs disponibles

| URL | Descripción |
|-----|-------------|
| `http://localhost:8080` | Página principal |
| `http://localhost:8080/contacto.php` | Formulario de contacto |
| `http://localhost:8080/admin.php` | Panel de administración |
| `http://localhost:8081` | phpMyAdmin |

### Credenciales phpMyAdmin

| Campo | Valor |
|-------|-------|
| Servidor | `lasalle_db` |
| Usuario | `user` |
| Contraseña | `password` |
| Base de datos | `contacto_db` |

---

## Flujo de uso

1. El usuario accede a la página principal y hace clic en **Inscribirme ahora**
2. Completa el formulario con nombre, correo y mensaje
3. Al enviar, recibe una confirmación en pantalla (modal)
4. Los datos quedan guardados en la tabla `mensajes` de `contacto_db`
5. Desde el ícono de usuario (esquina superior derecha) se accede al **Panel Admin** para ver todos los registros

---

## 👥 Integrantes del grupo 7

- JUAN CAMILO BARACALDO FERRUCCIO
- ANNER ALEXIS CARABALI BANGUERA
- JULIAN ESTEBAN MEDINA TRIANA
- JUAN DAVID PEREZ NUMA
- DANNA SOFIA SANDOVAL BUSTACARA