[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/DakukWeb/DakukWeb_BackEnd">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">DakukWeb_BackEnd</h3>

  <p align="center">
    La API que da las funcionalidades a <a href="https://github.com/EitanMohorade/DakukWeb">DakukWeb</a>
    <br />
    <a href="https://github.com/DakukWeb/DakukWeb_BackEnd"><strong>Explora el repositorio »</strong></a>
    <br />
    <br />
    <a href="https://github.com/DakukWeb/DakukWeb_BackEnd">Mira la demo</a>
    ·
    <a href="https://github.com/DakukWeb/DakukWeb_BackEnd/issues">Reporta un bug</a>
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Contenido importante</summary>
  <ol>
    <li>
      <a href="#Sobre el proyecto">Sobre el proyecto</a>
      <ul>
        <li><a href="#Hecho con">Hecho con</a></li>
      </ul>
    </li>
    <li>
      <a href="#Iniciar App">Iniciar App</a>
      <ul>
        <li><a href="#Pre-requisitos">Pre-requisitos</a></li>
        <li><a href="#Instalacion">Instalacion</a></li>
      </ul>
    </li>
    <li><a href="#Exceptions handler">Exceptions handler</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#Licencia">Licencia</a></li>
    <li><a href="#contactos">Contactos</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->
## Sobre el proyecto

Este proyecto consiste en una API desarrollada en Laravel, que tiene como objetivo principal proporcionar funcionalidades específicas y permitir la gestión y almacenamiento de datos. La API se diseño para  <a href="https://github.com/EitanMohorade/DakukWeb">Dakuk Web</a> pero sirve para cualquier E-commerce.

### Hecho con

El proyecto se realizo  con las siguientes tecnologias:

* [![Laravel][Laravel.com]][Laravel-url]

<!-- GETTING STARTED -->
## Iniciar App

Ejemplo para iniciar la app. Primero ver los prerequisitos y instalacion :).

### Pre-requisitos

Antes de utilizar esta API, hay que cumplir con los siguientes pre requisitos y realiza la configuración necesaria:

* PHP >8.2.12
* MySql
* configura las credenciales en el archivo `.env.`

### Instalacion

1. Get a free API Key at [https://example.com](https://example.com)
2. Clone the repo

   ```sh
   git clone https://github.com/DakukWeb/DakukWeb_BackEnd.git
   ```

3. Instalar dependencias del proyecto

   ```sh
   composer install
   ```

4. Aplicar migraciones y seeders

   ```sh
   php artisan migrate --seed
   ```

5. Iniciar app

    ```sh
    php artisan serve
    ```
<!-- resumen -->
## Resumen

Lo relavante del codigo son las rutas de acceso para hacer consultas mediante metodos como GET, POST, PATCH etc. Para identificar la ruta necesaria y sus restricciones se pueden dirigir a `routes/api.php` como tambien ejecutar el siguiente comando:

```sh
php artisan route:list
```

Este comando mostrará un listado de todas las rutas creadas, junto con sus nombres de acceso, es decir, el nombre de la función utilizada. Estas funciones se encuentran en la carpeta `app/Http/Controllers/`.

### Testeo:

Si queres probar el proyecto en tu entorno local, podes utilizar herramientas como Postman, que te permiten realizar pruebas en APIs.

Para hacerlo, sigue estos pasos:

* Inicia la aplicación como se mostró anteriormente.

* Copia la URL de la aplicación después de iniciarla, por ejemplo: http://127.0.0.1:8000.

* Abre Postman y pega la URL en la barra de direcciones.

* Comenzar probando la API la siguiente ruta:

#### Testeo

* **GET|HEAD** `api/test`
  * Devolvera un JSON de prueba.
    * Response:

    ```sh
    {
        "hola": "mundo"
    }
    ```

## Rutas

Aca tienen el listado de todas las rutas disponibles. tener en cuenta que las rutas que contengan algun rol como `admin` o `customer` estan utilizando el middleware `auth:sanctum`, esto se debe a que requieren autenticacion para que puedan acceder (atraves de tokens Sanctum).
Entrar al siguiente link de postman para visualizar con mas comodidad las rutas: [Rutas PostMan](https://galactic-meteor-101946.postman.co/workspace/New-Team-Workspace~83e9a81c-54b8-4335-b64c-649ab96f3a87/collection/28279829-fba08322-b36a-40cc-b59c-0e70310b2c8a?action=share&creator=28279829)

## Exceptions handler

En el archivo `App\Exceptions\Handler.php`, se ha implementado un manejador de excepciones personalizado para gestionar las excepciones que se producen en la API. Este manejador se encarga de capturar y procesar las excepciones de manera adecuada para devolver respuestas JSON coherentes a los clientes.

### Generación de la respuesta basada en el código de estado

Dependiendo del status code que salte la excepcion, estas tendran un mensaje en especifico:

* **401** `Unauthorized`: Se establece el mensaje como 'Unauthorized'.
* **403** `Forbidden`: Se establece el mensaje como 'Forbidden'.
* **404** `Not Found`: Se establece el mensaje como 'Not Found'.
* **405** `Method Not Allowed`: Se establece el mensaje como 'Method Not Allowed'.
* **422** `Unprocessable Entity`

### Otros códigos de estado

Para otros códigos de estado, se utiliza el mensaje de la excepción si el código de estado es 500, de lo contrario, se establece un mensaje genérico.

* Detalles adicionales en la respuesta (si se habilita la depuración): Si la configuración de la aplicación tiene habilitada la depuración (debug), se pueden incluir detalles adicionales en la respuesta, como la traza de la excepción (trace). Aunque por ahora lo deje comentado para que la respuesta quede mas limpia.

### Construcción de la respuesta JSON

Se construye un array $response que contiene el mensaje, los detalles de la excepción (message, file, line), y el código de estado HTTP. Luego, esta respuesta se devuelve como una respuesta JSON utilizando response()->json(). Este es un ejemplo de lo que pasaria si quisieras modificar un producto sin tener los permisos necesarios:

```sh
    {
        "message": "Whoops, looks like something went wrong",
        "details":
        {
            "message": "Unauthenticated.",
            "file": "C:\\x\\x\\x\\x\\x\\DakukWeb_backend\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Middleware\\Authenticate.php",
            "line": 95
        },
        "status": 500
    }
```

<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<!-- LICENSE -->
## Licencia

Distribuido con la licencia MIT. Mirar `LICENSE.txt` para mas info.

<!-- CONTACT -->
## Contactos

Eitan Mohorade - [@Linkedin](https://www.linkedin.com/in/eitan-mohorade-4b904826a/) - <eitanluc@gmail.com>

Project Link: [https://github.com/DakukWeb/DakukWeb_BackEnd](https://github.com/DakukWeb/DakukWeb_BackEnd)

<!-- ACKNOWLEDGMENTS -->
## Acknowledgments

Use this space to list resources you find helpful and would like to give credit to. I've included a few of my favorites to kick things off!

* [Choose an Open Source License](https://choosealicense.com)
* [GitHub Emoji Cheat Sheet](https://www.webpagefx.com/tools/emoji-cheat-sheet)
* [Malven's Flexbox Cheatsheet](https://flexbox.malven.co/)
* [Malven's Grid Cheatsheet](https://grid.malven.co/)
* [Img Shields](https://shields.io)
* [GitHub Pages](https://pages.github.com)
* [Font Awesome](https://fontawesome.com)
* [React Icons](https://react-icons.github.io/react-icons/search)

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/DakukWeb/DakukWeb_BackEnd.svg?style=for-the-badge
[contributors-url]: https://github.com/DakukWeb/DakukWeb_BackEnd/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/DakukWeb/DakukWeb_BackEnd.svg?style=for-the-badge
[forks-url]: https://github.com/DakukWeb/DakukWeb_BackEnd/network/members
[stars-shield]: https://img.shields.io/github/stars/DakukWeb/DakukWeb_BackEnd.svg?style=for-the-badge
[stars-url]: https://github.com/DakukWeb/DakukWeb_BackEnd/stargazers
[issues-shield]: https://img.shields.io/github/issues/DakukWeb/DakukWeb_BackEnd.svg?style=for-the-badge
[issues-url]: https://github.com/DakukWeb/DakukWeb_BackEnd/issues
[license-shield]: https://img.shields.io/github/license/DakukWeb/DakukWeb_BackEnd.svg?style=for-the-badge
[license-url]: https://github.com/DakukWeb/DakukWeb_BackEnd/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/eitan-mohorade-4b904826a/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
