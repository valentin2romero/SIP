# SIP
 Sistema Previsional Inteligente

# Pasos para instalar proyecto
```
 1- composer install
 2- crear y configurar el .env
 3- php artisan key:generate
 4- php artisan cache:clear
 5- php artisan config:cache
 6- npm run production
 7- php artisan serve
```

# Ayudas
```
   En caso de dar problema el npm run production.
   Entonces ejecutar comando: npm rebuild node-sass.
```
```
   En caso de querer modificar el .env una vez ya compilado.
   Debemos modificar el .env y despues ejecutar el comando "composer dump-autoload"
```

# Updates
 [Update 6]
 ```
    Añadimos el menu de herramientas.
    Se pueden manipular los elementos de TextoSentencias.
 ``` 
 [09/07/2021]
 ```
    Instalacion del FontAwesome - 5.15
    Correccion del "alert" al eliminar elementos de las tablas
 ```
 [10/07/2021]
 ```
   Correccion de letra "o", al generar fecha adquisicion en el word.
 ```
