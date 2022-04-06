## Inicio

Primero tienes que descargar el codigo con el boton verde que dice Code en la parte de arriba, despues el boton Download as ZIP

Descomprimes en la carpeta que quieras para tener el proyecto listo

## Instalacion

Debes tener instalado composer y node js, si no los tienes, ahi que instalarlos [composer](https://getcomposer.org/) y [nodejs](https://nodejs.org/es/).

Despues abrir el proyecto en visual studio code, abrir la terminal e instalar las dependecias de composer y node js con los siguientes comandos.

    composer install
    npm install

Una vez instalados, configurar la base de datos, primero hacer una copia del archivo .env.example con el comando

    copy .env.example .env

Despues crear una base de dattos en xammp, sin tablas

En el archivo .env configurar la base de datos en la variable DB_DATABSE, cambiar laravel por el nombre de la base de datos

Por utltimo ejecutar las migraciones de la base de datos y el usuario administrador por defecto.

    php artisan migrate
    php artisan db:seed

## Ejecucion

Una ves terminado el proceso y ver que no hay errores ejecutar

    php artisan serve

para iniciar el servidor de Laravel
Ahora e google chrome, abrir la url

    localhost:8000

Y ya estaria ejecutandose el proyecto, las credenciales de acceso son

    email: daniel@generador.com
    password: password
