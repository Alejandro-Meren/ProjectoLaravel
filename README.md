<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Para cargar la aplicacion

Primero hacer el php artisan serve

Segundo hacer el npm run dev

Hacer que se relacionen usuarios y citas


# Proyecto Laravel - Peluquería

Este proyecto es una aplicación de gestión de citas para una peluquería, desarrollada con Laravel y Vue.js.

## Requisitos

- PHP >= 7.3
- Composer
- Node.js & npm
- MySQL

## Instalación

1. Clonar el repositorio:
    ```sh
    git clone https://github.com/tu-usuario/proyecto-laravel-peluqueria.git
    cd proyecto-laravel-peluqueria
    ```

2. Instalar dependencias de PHP:
    ```sh
    composer install
    ```

3. Instalar dependencias de Node.js:
    ```sh
    npm install
    ```

4. Configurar el archivo [.env](http://_vscodecontentref_/0):
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

5. Configurar la base de datos en el archivo [.env](http://_vscodecontentref_/1) y luego ejecutar las migraciones:
    ```sh
    php artisan migrate --seed
    ```

## Ejecución

1. Iniciar el servidor de desarrollo de Laravel:
    ```sh
    php artisan serve
    ```

2. Compilar los assets de Vue.js:
    ```sh
    npm run dev
    ```

3. Asegurarse de que los usuarios y las citas estén correctamente relacionados en la base de datos.

## Funcionalidades

- Gestión de clientes
- Gestión de servicios
- Gestión de citas
- Relación entre usuarios y citas

## Seguridad

Si descubres una vulnerabilidad de seguridad en Laravel, por favor envía un correo electrónico a Taylor Otwell a través de [taylor@laravel.com](mailto:taylor@laravel.com). Todas las vulnerabilidades de seguridad serán abordadas de inmediato.

## Licencia

El framework Laravel es un software de código abierto licenciado bajo la [licencia MIT](https://opensource.org/licenses/MIT).

## Código de Conducta

Para asegurar que la comunidad de Laravel sea acogedora para todos, por favor revisa y cumple con el [Código de Conducta](https://laravel.com/docs/contributions#code-of-conduct).

## Página de Citas

La página de citas permite gestionar las citas de la peluquería. A continuación se describen las funcionalidades y componentes principales de esta página.

### Componentes Importados

- **AppLayout**: Layout principal de la aplicación.
- **FontAwesomeIcon**: Componente para mostrar iconos de FontAwesome.
- **axios**: Librería para realizar peticiones HTTP.
- **date-fns**: Librería para formatear fechas.

### Variables Reactivas

- **citas**: Lista de citas.
- **servicios**: Lista de servicios disponibles.
- **usuarios**: Lista de usuarios (peluqueros).
- **newCita**: Objeto para crear o editar una cita.
- **editingCita**: Objeto para almacenar la cita que se está editando.

### Métodos

- **fetchCitas**: Obtiene la lista de citas desde la API.
- **fetchServicios**: Obtiene la lista de servicios desde la API.
- **fetchUsuarios**: Obtiene la lista de usuarios desde la API.
- **saveCita**: Guarda una nueva cita o actualiza una cita existente.
- **editCita**: Carga los datos de una cita en el formulario para editarla.
- **deleteCita**: Elimina una cita.
- **updatePrecio**: Actualiza el precio en el formulario basado en el servicio seleccionado.
- **formatDateTime**: Formatea una fecha y hora.
- **formatPhoneNumber**: Formatea un número de teléfono.

### Watchers

- **newCita.servicio_id**: Observa cambios en el servicio seleccionado y actualiza el precio.

### Hooks

- **onMounted**: Ejecuta las funciones `fetchCitas`, `fetchServicios` y `fetchUsuarios` cuando el componente se monta.

### Template

El template está dividido en dos secciones principales:

1. **Formulario de Creación/Edición de Citas**:
    - Contiene campos para ingresar el nombre del cliente, teléfono, servicio, precio, peluquero, y fecha y hora.
    - Botón para guardar o actualizar la cita.

2. **Listado de Citas**:
    - Muestra una tabla con las citas existentes.
    - Cada fila de la tabla muestra los detalles de una cita y botones para editar o eliminar la cita.


## Sacar estadisticas

- 