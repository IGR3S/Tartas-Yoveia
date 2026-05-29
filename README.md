# 🎂 Tartas Yoveia — Pastelería Web
> **Trabajo de Fin de Grado · Desarrollo de Aplicaciones Web (DAW)**

Aplicación web para la pastelería **Tartas Yoveia** de Crevillent, que permite a los clientes consultar el catálogo de tartas, realizar encargos y gestionar el inventario desde un panel de administración.

---

## Índice

1. [¿Qué hace este proyecto?](#qué-hace-este-proyecto)
2. [Tecnologías](#tecnologías)
3. [Estructura de carpetas](#estructura-de-carpetas)
4. [Base de datos](#base-de-datos)
5. [Roles y acceso](#roles-y-acceso)
6. [Páginas del proyecto](#páginas-del-proyecto)
7. [Instalación](#instalación)

---

## ¿Qué hace este proyecto?

Tartas Yoveia es una aplicación web para una pastelería artesanal que permite:

- **Consultar el catálogo completo** de tartas con nombre, descripción, precio e imagen.
- **Ver las tartas más vendidas** destacadas en la página de inicio con carrusel fotográfico.
- **Realizar encargos personalizados** mediante un formulario de contacto que envía un email a la pastelería.
- **Localizar el establecimiento** con un mapa integrado de Google Maps.
- **Gestionar el inventario** desde un panel de administración (añadir, editar y borrar tartas).
- **Autenticar usuarios y administradores** con sesiones PHP y contraseñas cifradas con `password_hash`.

---

## Tecnologías

| Capa         | Tecnología              |
|--------------|-------------------------|
| Backend      | PHP 8                   |
| Base de datos| MySQL / MariaDB         |
| Frontend     | HTML5, CSS3, JavaScript |
| Iconos       | Font Awesome 6          |
| Mapas        | Google Maps Embed API   |

---

## Estructura de carpetas

```
Tartas-Yoveia/
│
├── inicio.php                   # Página principal con carrusel y tartas destacadas
├── inventario.php               # Catálogo completo de tartas
├── contacto.php                 # Formulario de encargo de tartas
├── login.php                    # Inicio de sesión
├── logout.php                   # Cierre de sesión
├── registrar.php                # Registro de nuevos usuarios
├── carousel.js                  # Lógica del carrusel de imágenes
│
├── admin/                       # Área privada de administración
│   ├── panel.php                # Panel principal con listado de tartas
│   ├── tarta_nueva.php          # Añadir nueva tarta al catálogo
│   ├── tarta_editar.php         # Editar tarta existente
│   └── tarta_borrar.php         # Eliminar tarta del catálogo
│
├── includes/
│   ├── conexion.php             # Conexión PDO a la base de datos
│   ├── config.php               # Constantes de configuración (host, BD, usuario)
│   └── funciones.php            # Funciones reutilizables (obtenerTartas, etc.)
│
├── templates/
│   ├── header.php               # Cabecera pública con navegación
│   ├── header_admin.php         # Cabecera del panel de administración
│   └── footer.php               # Pie de página con contacto y redes sociales
│
├── static/
│   ├── css/
│   │   ├── estilo_D.css         # Hoja de estilos principal (público)
│   │   └── estiloAdmin_E.css    # Hoja de estilos del panel admin
│   └── img/                     # Imágenes de tartas, logo y favicon
│
└── bd.sql                       # Script de creación de la base de datos
```

---

## Base de datos

La base de datos se llama `tartas_yoveia` y contiene las siguientes tablas:

### `usuarios`

Usuarios con acceso al sistema.

| Campo               | Tipo           | Descripción                        |
|---------------------|----------------|------------------------------------|
| `id_usuario`        | INT PK AUTO    | Identificador                      |
| `correo_usuario`    | VARCHAR(100)   | Correo electrónico                 |
| `contraseña`        | VARCHAR(100)   | Contraseña cifrada con `password_hash` |
| `nombre_usuario`    | VARCHAR(100)   | Nombre de usuario                  |
| `apellidos_usuario` | VARCHAR(100)   | Apellidos (opcional)               |
| `telefono_usuario`  | VARCHAR(13)    | Teléfono de contacto               |
| `administrador`     | BOOLEAN        | `TRUE` = admin, `FALSE` = cliente  |
| `activo`            | BOOLEAN        | `TRUE` = activo, `FALSE` = inactivo |

### `tartas`

Catálogo de tartas disponibles en la pastelería.

| Campo         | Tipo           | Descripción                          |
|---------------|----------------|--------------------------------------|
| `id_tarta`    | INT PK         | Identificador                        |
| `nombre_tarta`| VARCHAR(100)   | Nombre de la tarta                   |
| `descripcion` | TEXT           | Descripción del producto             |
| `precio`      | DECIMAL(10,2)  | Precio en euros                      |
| `sin_azucar`  | BOOLEAN        | `TRUE` = apta para diabéticos        |
| `img_entera`  | VARCHAR(200)   | Ruta de la imagen de la tarta        |

### `pedidos`

Registro de pedidos realizados por los clientes.

| Campo          | Tipo          | Descripción              |
|----------------|---------------|--------------------------|
| `id_pedido`    | INT PK AUTO   | Identificador del pedido |
| `id_usuario`   | INT FK        | Usuario que realizó el pedido |
| `fecha_pedido` | DATE          | Fecha del pedido         |
| `precio_pedido`| DECIMAL(10,2) | Precio total del pedido  |

### `linea_pedidos`

Líneas de detalle de cada pedido (relación pedidos–tartas).

| Campo       | Tipo  | Descripción                  |
|-------------|-------|------------------------------|
| `id_pedido` | INT FK | Referencia a `pedidos`      |
| `id_tarta`  | INT FK | Referencia a `tartas`       |
| `linea_pedido` | INT | Número de línea del pedido  |

---

## Roles y acceso

| Rol           | Qué puede hacer                                                       |
|---------------|-----------------------------------------------------------------------|
| `administrador` | Todo: gestionar el catálogo de tartas (añadir, editar, borrar) y ver pedidos |
| `usuario`     | Consultar el catálogo y realizar encargos a través del formulario     |
| Público       | Ver la página de inicio, catálogo y formulario de contacto            |

Las páginas del panel de administración redirigen a `login.php` si no hay una sesión de administrador activa. Las contraseñas se almacenan usando `password_hash()` de PHP y se verifican con `password_verify()`.

---

## Páginas del proyecto

| Ruta                    | Descripción                                      | Acceso        |
|-------------------------|--------------------------------------------------|---------------|
| `inicio.php`            | Inicio con carrusel, tartas destacadas y mapa    | Público       |
| `inventario.php`        | Catálogo completo de tartas con filtros           | Público       |
| `contacto.php`          | Formulario de encargo personalizado              | Público       |
| `login.php`             | Formulario de inicio de sesión                  | Público       |
| `registrar.php`         | Registro de nuevos clientes                     | Público       |
| `logout.php`            | Destruye la sesión activa                       | Autenticado   |
| `admin/panel.php`       | Listado de tartas con acciones de gestión       | Solo admin    |
| `admin/tarta_nueva.php` | Formulario para añadir una nueva tarta          | Solo admin    |
| `admin/tarta_editar.php`| Formulario para editar una tarta existente      | Solo admin    |
| `admin/tarta_borrar.php`| Elimina una tarta del catálogo                  | Solo admin    |

---

## Contacto

**Tartas Yoveia** · C/ Mariano Benlliure, 3 · Crevillent

- 📧 [tartasyoveia@gmail.com](mailto:tartasyoveia@gmail.com)
- 📞 696 634 696
- 🕐 Martes – Sábado: 8:00 a 14:00
- 📸 [Instagram](https://www.instagram.com/lastartasdeyoveia/?hl=es) · [Facebook](https://www.facebook.com/profile.php?id=100068791103201)

---

## Autor

Proyecto desarrollado como **Trabajo de Fin de Grado** del ciclo de **Desarrollo de Aplicaciones Web (DAW)** por Sergi Espinosa Belén.
