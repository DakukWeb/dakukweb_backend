<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->
<a name="readme-top"></a>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
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
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#Licencia">Licencia</a></li>
    <li><a href="#contactos">Contactos</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## Sobre el proyecto

Este proyecto consiste en una API desarrollada en Laravel, que tiene como objetivo principal proporcionar funcionalidades específicas y permitir la gestión y almacenamiento de datos. La API se diseño para  <a href="https://github.com/EitanMohorade/DakukWeb">Dakuk Web</a> pero sirve para cualquier E-commerce.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Hecho con

El proyecto se realizo  con las siguientes tecnologias:

* [![Laravel][Laravel.com]][Laravel-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>



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

<p align="right">(<a href="#readme-top">back to top</a>)</p>



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
- **GET|HEAD** `api/test`
    - Devolvera un JSON de prueba.

## Rutas

Aca tienen el listado de todas las rutas disponibles. tener en cuenta que las rutas que contengan algun rol como `admin` o `customer` estan utilizando el middleware `auth:sanctum`, esto se debe a que requieren autenticacion para que puedan acceder (atraves de tokens Sanctum). 

### Rol de Administrador (`admin`)

#### Dashboard
- **GET|HEAD** `api/admin`
  - Acceso al dashboard del administrador.

#### Categorías
- **GET|HEAD** `api/admin/categories`
  - Listado de categorías en el panel de administración.
- **POST** `api/admin/categories`
  - Crear una nueva categoría en el panel de administración.
    - Json:
    ```sh
    {
        "name": "string",
        "category_id": "father category id"
    }
    ```  
- **GET|HEAD** `api/admin/categories/{category}`
  - Ver detalles específicos de una categoría en el panel de administración.
- **PUT|PATCH** `api/admin/categories/{category}`
  - Actualizar información de una categoría en el panel de administración.
    - Json(optional):
    ```sh
    {
        "name": "string",
        "category_id": "father category id"
    }
    ```  
- **DELETE** `api/admin/categories/{category}`
  - Eliminar una categoría en el panel de administración.
- **PATCH** `api/admin/categories/{category}/restore`
  - Restaurar una categoría previamente eliminada.

#### Ordenes
- **GET|HEAD** `api/admin/orders`
  - Listado de órdenes en el panel de administración.
- **POST** `api/admin/orders`
  - Crear una nueva orden en el panel de administración.
    - Json:
    ```sh
    {
        "comments": "string"
    }
    ```  
- **GET|HEAD** `api/admin/orders/{order}`
  - Ver detalles específicos de una orden en el panel de administración.
- **PUT|PATCH** `api/admin/orders/{order}`
  - Actualizar información de una orden en el panel de administración.
    - Json(optional):
    ```sh
    {
        "comments": "string"
    }
    ```  
- **DELETE** `api/admin/orders/{order}`
  - Eliminar una orden en el panel de administración.
- **PATCH** `api/admin/orders/{order}/restore`
  - Restaurar una orden previamente eliminada.

#### Productos
- **GET|HEAD** `api/admin/products`
  - Listado de productos en el panel de administración.
- **POST** `api/admin/products`
  - Crear un nuevo producto en el panel de administración.
    - Json:
    ```sh
    {
        "name": "string",
        "description": "string",
        "price": "int",
        "stock": "int",
        "image": "string"
    }
    ```  
- **GET|HEAD** `api/admin/products/{product}`
  - Ver detalles específicos de un producto en el panel de administración.
- **PUT|PATCH** `api/admin/products/{product}`
  - Actualizar información de un producto en el panel de administración.
    - Json(optional):
    ```sh
    {
        "name": "string",
        "description": "string",
        "price": "int",
        "stock": "int",
        "image": "string"
    }
    ```  
- **DELETE** `api/admin/products/{product}`
  - Eliminar un producto en el panel de administración.
- **PATCH** `api/admin/products/{product}/restore`
  - Restaurar un producto previamente eliminado.

#### Usuarios
- **GET|HEAD** `api/admin/users`
  - Listado de usuarios en el panel de administración.
- **POST** `api/admin/users`
  - Crear un nuevo usuario en el panel de administración.
    - Json:
    ```sh
    {
        "name": "string",
        "email": "string",
        "password": "string",
        "phone": "int",
    }
    ```  
- **GET|HEAD** `api/admin/users/{user}`
  - Ver detalles específicos de un usuario en el panel de administración.
- **PUT|PATCH** `api/admin/users/{user}`
  - Actualizar información de un usuario en el panel de administración.
    - Json(optional):
    ```sh
    {
        "name": "string",
        "email": "string",
        "password": "string",
        "phone": "int",
    }
    ```  
- **DELETE** `api/admin/users/{user}`
  - Eliminar un usuario en el panel de administración.
- **PATCH** `api/admin/users/{user}/restore`
  - Restaurar un usuario previamente eliminado.

### Rol de Cliente (`customer`)

#### Dashboard Cliente
- **GET|HEAD** `api/customer`
  - Acceso al dashboard del cliente.

#### Categorías Cliente
- **GET|HEAD** `api/customer/categories`
  - Listado de categorías para clientes.
- **GET|HEAD** `api/customer/categories/{category}`
  - Ver detalles específicos de una categoría desde la perspectiva del cliente.

#### Órdenes Cliente
- **GET|HEAD** `api/customer/orders`
  - Listado de órdenes para clientes.
- **POST** `api/customer/orders`
  - Crear una nueva orden desde la perspectiva del cliente.
      - Json:
    ```sh
    {
        "comments": "string"
    }
    ```  
- **GET|HEAD** `api/customer/orders/{order}`
  - Ver detalles específicos de una orden desde la perspectiva del cliente.
- **DELETE** `api/customer/orders/{order}`
  - Eliminar una orden desde la perspectiva del cliente.

#### Productos Cliente
- **GET|HEAD** `api/customer/products`
  - Listado de productos para clientes.
- **GET|HEAD** `api/customer/products/{product}`
  - Ver detalles específicos de un producto desde la perspectiva del cliente.

#### Usuario Actual
- **GET|HEAD** `api/user`
  - Obtener detalles del usuario actual.

### Usuarios sin rol

#### log in
- **POST** `api/login`
  - Iniciar sesion al rol customer o admin
      - Json:
    ```sh
    {
        "email": "string",
        "password": "string"
    }
    ```

#### log out
- **POST** `api/logout`
  - Cerrar sesion de customer o admin y revocar token
      - Requiere token
    
#### sign up
- **POST** `api/signup`
  - Agregar usuario nuevo y asignar rol customer
      - Json:
    ```sh
    {
        "name": "string",
        "email": "string",
        "password": "string",
        "phone": "int"
    }
    ``` 

#### Categorías 
- **GET|HEAD** `api/categories`
  - Listado de categorías.
- **GET|HEAD** `api/categories/{category}`
  - Ver detalles específicos de una categoría.

#### Productos Cliente
- **GET|HEAD** `api/products`
  - Listado de productos.
- **GET|HEAD** `api/products/{product}`
  - Ver detalles específicos de un producto.

                             



<p align="right">(<a href="#readme-top">back to top</a>)</p>


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

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- LICENSE -->
## Licencia

Distribuido con la licencia MIT. Mirar `LICENSE.txt` para mas info.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTACT -->
## Contactos

Eitan Mohorade - [@Linkedin](https://www.linkedin.com/in/eitan-mohorade-4b904826a/) - eitanluc@gmail.com

Project Link: [https://github.com/DakukWeb/DakukWeb_BackEnd](https://github.com/DakukWeb/DakukWeb_BackEnd)

<p align="right">(<a href="#readme-top">back to top</a>)</p>



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

<p align="right">(<a href="#readme-top">back to top</a>)</p>



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
[product-screenshot]: images/screenshot.png
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
