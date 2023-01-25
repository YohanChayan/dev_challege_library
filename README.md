<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Acerca del proyecto

Para ejecutar este proyecto en local se debe seguir los siguientes pasos:

- composer install
- crear el archivo .env a traves del ejemplo: .env.example y configurar parametros 
- ejecutar php artisan key:generate para generar la llave unica
- ejecutar las migraciones y datos de prueba con php artisan migrate --seed

Se utilizo PHP v7.4 - Laravel 8

## Acerca del proyecto

Proyecto Desarrollado por desafío de código, en el cual se desarrollaron vistas, Programación BackEnd con Laravel, creacion y relaciones en bases de datos. Consiste en sistema administrativo para librerias en el cual se administran los libros, categorias, y usuarios que pueden hacer prestamos, asi como tambien el constante monitoreo a cada uno de los prestmos realizados.

Como usuario administrativo se tiene un metodo de autenticacion con las siguientes credenciales:
    <p align="center"> Email: creeartelo@gmail.com</p>
    <p align="center"> Pass: cre123 </p>

Los usuarios generales son aquellos usuarios publicos que pueden ver el listado de libros existentes, asi como tambien el estatus o disponibilidad, en caso de que un usuario quiera un libro que no esta disponible, este puede pedir que se le envie un mensaje de alerta (simula integracion con Apis ) cuando dicho libro se encuentre disponible nuevamente!.

Sistema personal utilizado para aprender acerca de las diferentes herramientas que existen con Laravel >= 8.
    

