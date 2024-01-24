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
  <a href="https://github.com/EitanMohorade/DakukWeb_back-end">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">DakukWeb_back-end</h3>

  <p align="center">
    La API que da las funcionalidades a <a href="https://github.com/EitanMohorade/DakukWeb">DakukWeb</a>
    <br />
    <a href="https://github.com/EitanMohorade/DakukWeb_back-end"><strong>Explora el repositorio »</strong></a>
    <br />
    <br />
    <a href="https://github.com/EitanMohorade/DakukWeb_back-end">Mira la demo</a>
    ·
    <a href="https://github.com/EitanMohorade/DakukWeb_back-end/issues">Reporta un bug</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Contenido importante</summary>
  <ol>
    <li>
      <a href="#about-the-project">Sobre el proyecto</a>
      <ul>
        <li><a href="#built-with">Hecho con</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Iniciar App</a>
      <ul>
        <li><a href="#prerequisites">Prerequisitos</a></li>
        <li><a href="#installation">Instalacion</a></li>
      </ul>
    </li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

Este proyecto consiste en una API desarrollada en Laravel, que tiene como objetivo principal proporcionar funcionalidades específicas y permitir la gestión y almacenamiento de datos. La API se diseño para  <a href="https://github.com/EitanMohorade/DakukWeb">Dakuk Web</a> pero sirve para cualquier E-commerce.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With

El proyecto se realizo  con las siguientes tecnologias:

* [![Laravel][Laravel.com]][Laravel-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

This is an example of how you may give instructions on setting up your project locally.
To get a local copy up and running follow these simple example steps.

### Prerequisites

Antes de utilizar esta API, hay que cumplir con los siguientes pre requisitos y realiza la configuración necesaria:

* PHP >8.2.12
* MySql
* configura las credenciales en el archivo `.env.`


### Installation

1. Get a free API Key at [https://example.com](https://example.com)
2. Clone the repo
   ```sh
   git clone https://github.com/EitanMohorade/DakukWeb_back-end.git
   ```
3. Instalar dependencias del proyecto
   ```sh
   composer install
   ```
4. Aplicar migraciones y seeders
   ```sh
   php artisan migrate --seed
   ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- resumen -->
## Resumen

Antes que nada, me interesaria que tengan en cuenta algunas cositas basicas. Luego de leerlo, van a tener en el apartado de  <a href="#Corroboracion">Corroboracion</a> hacia abajo las reales formas de uso de la API.

### Base de Datos:

Al realizar la migración de la base de datos, tene en cuenta los seeders crados en `database\seeders` que creara datos ficticio/de prueba en la BD. También se incluye la creación de un usuario admin.

### Rutas y Controladores:

Los controladores, que contienen el código para las funcionalidades de cada tabla de la base de datos, se encuentran en `app\Http\Controllers`. En `routes\api`, encontrarás las rutas que permiten que los controladores sean utilizados. Estas rutas varían según los permisos del usuario (`customer` / `admin` / `guest`).

### Corroboracion:

Si no cuentas con una aplicación específica, puedes probar la API utilizando herramientas como Postman. Asegúrate de iniciar la API con el siguiente comando:

```sh
php artisan serve
```
luego copiar y pegar la url por la cual la app este corriendo, por ejemplo: http://127.0.0.1:8000.

## Rutas de la API

Para ver las rutas existentes utilizar el comando :
```sh
php artisan route:list
```
Debajo estaran casi todas las rutas con su respectiva descripcion: 

### Rol de Administrador (`admin`)

#### Dashboard
- **GET|HEAD** `api/admin`
  - Acceso al dashboard del administrador.

#### Categorías
- **GET|HEAD** `api/admin/categories`
  - Listado de categorías en el panel de administración.
- **POST** `api/admin/categories`
  - Crear una nueva categoría en el panel de administración.
- **GET|HEAD** `api/admin/categories/{category}`
  - Ver detalles específicos de una categoría en el panel de administración.
- **PUT|PATCH** `api/admin/categories/{category}`
  - Actualizar información de una categoría en el panel de administración.
- **DELETE** `api/admin/categories/{category}`
  - Eliminar una categoría en el panel de administración.
- **PATCH** `api/admin/categories/{category}/restore`
  - Restaurar una categoría previamente eliminada.

#### Órdenes
- **GET|HEAD** `api/admin/orders`
  - Listado de órdenes en el panel de administración.
- **POST** `api/admin/orders`
  - Crear una nueva orden en el panel de administración.
- **GET|HEAD** `api/admin/orders/{order}`
  - Ver detalles específicos de una orden en el panel de administración.
- **PUT|PATCH** `api/admin/orders/{order}`
  - Actualizar información de una orden en el panel de administración.
- **DELETE** `api/admin/orders/{order}`
  - Eliminar una orden en el panel de administración.
- **PATCH** `api/admin/orders/{order}/restore`
  - Restaurar una orden previamente eliminada.

#### Productos
- **GET|HEAD** `api/admin/products`
  - Listado de productos en el panel de administración.
- **POST** `api/admin/products`
  - Crear un nuevo producto en el panel de administración.
- **GET|HEAD** `api/admin/products/{product}`
  - Ver detalles específicos de un producto en el panel de administración.
- **PUT|PATCH** `api/admin/products/{product}`
  - Actualizar información de un producto en el panel de administración.
- **DELETE** `api/admin/products/{product}`
  - Eliminar un producto en el panel de administración.
- **PATCH** `api/admin/products/{product}/restore`
  - Restaurar un producto previamente eliminado.

#### Usuarios
- **GET|HEAD** `api/admin/users`
  - Listado de usuarios en el panel de administración.
- **POST** `api/admin/users`
  - Crear un nuevo usuario en el panel de administración.
- **GET|HEAD** `api/admin/users/{user}`
  - Ver detalles específicos de un usuario en el panel de administración.
- **PUT|PATCH** `api/admin/users/{user}`
  - Actualizar información de un usuario en el panel de administración.
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
- **POST** `api/customer/categories` REVISAR
  - Crear una nueva categoría desde la perspectiva del cliente.
- **GET|HEAD** `api/customer/categories/{category}`
  - Ver detalles específicos de una categoría desde la perspectiva del cliente.
- **DELETE** `api/customer/categories/{category}` REVISAR
  - Eliminar una categoría desde la perspectiva del cliente.

#### Órdenes Cliente
- **GET|HEAD** `api/customer/orders`
  - Listado de órdenes para clientes.
- **POST** `api/customer/orders`
  - Crear una nueva orden desde la perspectiva del cliente.
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
## License

Distribuido con la licencia MIT. Mirar `LICENSE.txt` para mas info.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Eitan Mohorade - [@Linkedin](https://www.linkedin.com/in/eitan-mohorade-4b904826a/) - eitanluc@gmail.com

Project Link: [https://github.com/EitanMohorade/DakukWeb_back-end](https://github.com/EitanMohorade/DakukWeb_back-end)

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
[contributors-shield]: https://img.shields.io/github/contributors/EitanMohorade/DakukWeb_back-end.svg?style=for-the-badge
[contributors-url]: https://github.com/EitanMohorade/DakukWeb_back-end/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/EitanMohorade/DakukWeb_back-end.svg?style=for-the-badge
[forks-url]: https://github.com/EitanMohorade/DakukWeb_back-end/network/members
[stars-shield]: https://img.shields.io/github/stars/EitanMohorade/DakukWeb_back-end.svg?style=for-the-badge
[stars-url]: https://github.com/EitanMohorade/DakukWeb_back-end/stargazers
[issues-shield]: https://img.shields.io/github/issues/EitanMohorade/DakukWeb_back-end.svg?style=for-the-badge
[issues-url]: https://github.com/EitanMohorade/DakukWeb_back-end/issues
[license-shield]: https://img.shields.io/github/license/EitanMohorade/DakukWeb_back-end.svg?style=for-the-badge
[license-url]: https://github.com/EitanMohorade/DakukWeb_back-end/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/eitan-mohorade-4b904826a/
[product-screenshot]: images/screenshot.png
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
