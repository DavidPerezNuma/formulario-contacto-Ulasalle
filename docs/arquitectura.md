# Arquitectura y estructura del proyecto

Este proyecto aplica **Clean Architecture** de Robert C. Martin y los principios **SOLID**, separando el código en capas con responsabilidades bien definidas e independientes entre sí.

---

## Distribución de carpetas

```
Formulario de contacto U La Salle/
│
├── public/                         # Puntos de entrada HTTP (Apache sirve desde aquí)
│   ├── index.php                   # Página principal / landing
│   ├── contacto.php                # Vista del formulario de contacto
│   └── admin.php                   # Orquestador del panel de administración
│
├── src/
│   ├── domain/                     # Capa de dominio — núcleo del negocio
│   │   ├── entities/
│   │   │   └── ContactMessage.php  # Entidad principal con sus atributos
│   │   └── repositories/
│   │       └── IContactRepository.php  # Contrato (interfaz) del repositorio
│   │
│   ├── application/                # Capa de aplicación — casos de uso
│   │   ├── ContactFormService.php  # Caso de uso: procesar y guardar formulario
│   │   └── AdminService.php        # Caso de uso: obtener todos los mensajes
│   │
│   ├── infrastructure/             # Capa de infraestructura — detalles técnicos
│   │   ├── config/
│   │   │   ├── db.php              # Conexión a MySQL
│   │   │   └── init.sql            # Script de inicialización de la base de datos
│   │   └── persistence/
│   │       └── MySQLContactRepository.php  # Implementación concreta del repositorio
│   │
│   ├── presentation/               # Capa de presentación — UI
│   │   ├── css/
│   │   │   └── style.css           # Estilos globales de la aplicación
│   │   ├── js/
│   │   │   ├── validate.js         # Validación del formulario en el cliente
│   │   │   └── dropdown.js         # Lógica del menú desplegable de usuario
│   │   └── views/
│   │       ├── contact.php         # Vista base del formulario (referencia)
│   │       ├── admin.php           # Vista del panel de administración
│   │       └── partials/
│   │           └── header.php      # Componente de cabecera reutilizable
│   │
│   └── tests/
│       └── ContactFormTest.php     # Pruebas de inserción y listado
│
├── docs/
│   └── arquitectura.md             # Este archivo
│
├── Dockerfile                      # Imagen PHP + Apache
├── docker-compose.yml              # Orquestación de servicios (app, db, phpMyAdmin)
├── apache.conf                     # Configuración de Apache para servir /src
└── README.md                       # Guía de instalación y uso
```

---

## Capas y responsabilidades

### Dominio `src/domain/`
Núcleo independiente de cualquier framework o tecnología. No importa nada externo.

- `ContactMessage` — entidad que representa un mensaje de contacto con sus atributos: `id`, `nombre`, `correo`, `mensaje`, `fecha`
- `IContactRepository` — interfaz que define el contrato que debe cumplir cualquier repositorio: `guardar()` y `listar()`

### Aplicación `src/application/`
Orquesta el flujo de negocio usando las entidades y contratos del dominio. No conoce detalles de base de datos ni de HTTP.

- `ContactFormService` — valida los datos POST, crea una entidad `ContactMessage` y la persiste a través del repositorio. Redirige con parámetro GET al terminar
- `AdminService` — obtiene todos los mensajes almacenados para mostrarlos en el panel

### Infraestructura `src/infrastructure/`
Implementa los contratos del dominio con tecnologías concretas.

- `db.php` — crea la conexión `mysqli` usando las variables del entorno Docker
- `init.sql` — crea la tabla `mensajes` automáticamente al iniciar el contenedor MySQL por primera vez
- `MySQLContactRepository` — implementa `IContactRepository` con consultas SQL reales (`INSERT`, `SELECT`)

### Presentación `src/presentation/`
Responsable exclusivamente de renderizar la UI y manejar interacciones del cliente.

- `style.css` — estilos globales con variables CSS, diseño responsive y componentes (hero, formulario, tabla, modal, dropdown)
- `validate.js` — validación del formulario antes de enviarlo al servidor
- `dropdown.js` — controla la apertura y cierre del menú de usuario en el header
- `views/admin.php` — tabla de registros con estados vacío y error de conexión
- `views/partials/header.php` — cabecera compartida entre todas las páginas con el menú de usuario

### Puntos de entrada `public/`
Archivos accesibles directamente por el navegador. Su única responsabilidad es conectar las capas: obtienen la conexión, instancian el servicio y delegan el render a la vista.

---

## Principios SOLID aplicados

| Principio | Aplicación |
|-----------|------------|
| **S** — Single Responsibility | Cada clase tiene una sola razón para cambiar. `ContactFormService` solo procesa el formulario; `AdminService` solo lista mensajes |
| **O** — Open/Closed | `ContactMessage` se extendió con `id` y `fecha` sin modificar el comportamiento existente |
| **L** — Liskov Substitution | `MySQLContactRepository` puede sustituirse por cualquier otra implementación de `IContactRepository` sin afectar los servicios |
| **I** — Interface Segregation | `IContactRepository` expone solo los métodos necesarios (`guardar`, `listar`), sin forzar implementaciones innecesarias |
| **D** — Dependency Inversion | Los servicios de aplicación dependen de la abstracción `IContactRepository`, no de `MySQLContactRepository` directamente. La conexión se inyecta por constructor |

---

## Entorno Docker

| Servicio | Imagen | Contenedor | Puerto externo | Puerto interno |
|----------|--------|------------|---------------|----------------|
| `lasalle_app` | `php:8.2-apache` | `lasalle_app` | `8080` | `80` |
| `lasalle_db` | `mysql:8.0` | `lasalle_db` | `3307` | `3306` |
| `lasalle_phpmyadmin` | `phpmyadmin/phpmyadmin` | `lasalle_phpmyadmin` | `8081` | `80` |

- El volumen `db_data` persiste los datos de MySQL entre reinicios
- `init.sql` se monta en `/docker-entrypoint-initdb.d/` para ejecutarse automáticamente solo la primera vez que se crea el volumen
- `apache.conf` configura un alias `/src` para que Apache sirva los archivos de `src/presentation/` (CSS, JS) desde el contenedor
