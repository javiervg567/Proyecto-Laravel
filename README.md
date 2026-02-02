# CRMVALLE - Sistema de Gestión Empresarial

CRMVALLE es una aplicación de gestión de relaciones con clientes (CRM) desarrollada con el framework **Laravel**. El objetivo del proyecto es centralizar la gestión de los pilares fundamentales de una empresa: clientes, productos, proveedores, empleados y pedidos.

## Características Principales

El sistema incluye 5 módulos CRUD completos con una interfaz minimalista y profesional:

1.  **Clientes (Obligatorio):** Gestión completa de la cartera de clientes (Nombre, Email, Teléfono, Dirección).
2.  **Productos:** Control de inventario y stock disponible.
3.  **Proveedores:** Directorio de entidades suministradoras y categorías.
4.  **Empleados:** Registro de la plantilla de trabajo.
5.  **Pedidos:** Seguimiento de transacciones y ventas.

## Requisitos Técnicos

Para ejecutar este proyecto, necesitas tener instalado:
* PHP 8.2 o superior
* Composer
* Servidor local (XAMPP)
* Base de datos MySQL

## Instalación y Configuración

Sigue estos pasos para poner en marcha el proyecto en tu entorno local:

1. **Clonar el repositorio:**
   git clone [https://github.com/javiervg567/Proyecto-Laravel.git]
2. **Instalar dependencias PHP**
    composer install
3. **Configurar el entorno**
    Renombra el archivo .env.example a .env.
    Configura las credenciales de tu base de datos en el archivo .env:
        DB_DATABASE=crm-proyecto
        DB_USERNAME=root
        DB_PASSWORD= ""
4. **Generar la clave de la aplicación:**
    php artisan key:generate
5. **Ejecutar migraciones**
    php artisan migrate
6. **Iniciar el servidor**
    php artisan serve