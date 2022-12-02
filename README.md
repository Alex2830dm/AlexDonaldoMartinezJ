-Para la instalacion del sistema, es necesario tener descargado previamente el programa xampp y el programa visual studio code al igual que la dependencia composer.

-Links para las descargas de las aplicaciones:

*Xampp: https://www.apachefriends.org/es/index.html

*Visual Studio Code: https://code.visualstudio.com/

*Composer: https://getcomposer.org/

-Para inicializar el proyecto sera requerido que se inicie el programa xampp con la caracteristicas apache y mysql activado.

-Para la base de datos, en el proyecto se encuentra el archivo 'Frefrigel.sql', este archivo se importara en el gestor de base de datos de su preferencia.

-Abriremos el proyecto en Visual Studio Code, así que desde el explorador de Windows nos ubicaremos en la carpeta del proyecto y la abrimos con Visual Studio Code

-El archivo .env.example lo renombraremos como .env posteriormente cambiaremos las variables como el nombre de la base de datos y usuario, en caso de no existir alguna contraseña con xampp o mysql se dejara como se encuentra actualmente el archivo.

-Para inicar la aplicacion abriremos una terminal dentro de la carpeta en visual studio code 
    *Si solo queremos abrirla solo en la computadora, el comando sera: php artisan serve.
    *Si queremos abrir la aplicación desde cualquier dispositivo, verificaremos cual es la ipv4 de nuestra computadora y en la consola de visual 
        escribiremos: php artisan serve --host=ipv4 de nuestra computadora

-Asi podremos ingresar a la aplicacion proporcionada desde el link que nos indique la consola, o desde la url por defecto de laravel que es: http://127.0.0.1:8000, en caso de haberle puesto ip, será http:// + ipv4

-En este sistema se cuenta conun control de ventas de productos la cual es administrada con paypal y cuenta con roles como usuarios y administradores los cuales nos permiten realizar diversas funciones.

-Para realizar una venta, en la opción del menú se seleccionara la opción 'Ventas' y despues en el boton 'Nueva venta'
    Se seleccionara el cliente al que se le hará la venta y se seleccionaran los productos que se requieran vender.
    Para PayPal, se seleccionara el metodo de pago 'PayPal'

-Las credenciales para administrador son:
    email: admin@utvt.com
    password: 123admin

-Las credenciales para usuario son:
    email: usuario@utvt.com
    password: 123usuario