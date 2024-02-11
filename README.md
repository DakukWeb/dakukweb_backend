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

### Rol de Administrador (`admin`)

#### Dashboard

* **GET|HEAD** `api/admin`
  * Acceso al dashboard del administrador.
    * Response:

    ```sh
    {
        "hola": "mundo"
    }
    ```

#### Categorías

* **GET|HEAD** `api/admin/categories`
  * Listado de categorías en el panel de administración.
    * Response:

    ```sh
    {
        "data": {
            "1": {
                "id": int,
                "category_id": null,
                "name": "Noah Renner I",
                "created_at": "2024-02-10T16:41:33.000000Z",
                "updated_at": "2024-02-10T16:41:33.000000Z",
                "deleted_at": null
            }
        },
        "links": {
                "self": "link-value"
            }
    }
    ```

* **POST** `api/admin/categories`
  * Crear una nueva categoría en el panel de administración.
    * Json:

    ```sh
    {
        "name": "string",
        "category_id": "father category id"
    }
    ```

    * Response:

    ```sh
    {
        "Result": "Data has been stored",
        "data": {
            "category"
        }
    }
    ```

* **GET|HEAD** `api/admin/categories/{category}`
  * Ver detalles específicos de una categoría en el panel de administración.
    * Response:

    ```sh
    {
        "data": [
        {
            "id": 1,
            "category_id": null,
            "name": "Noah Renner I",
            "created_at": "2024-02-10T16:41:33.000000Z",
            "updated_at": "2024-02-10T16:41:33.000000Z",
            "deleted_at": null
        }
    ],
    "links": {
        "self": "link-value"
    }
    }
    ```

* **PUT|PATCH** `api/admin/categories/{category}`
  * Actualizar información de una categoría en el panel de administración.
    * Json(optional):

    ```sh
    {
        "name": "string",
        "category_id": "father category id"
    }
    ```

    * Response:

    ```sh
    {
        "Result": "Data has been updated",
        "data": {
            "category"
        }
    }
    ```

* **DELETE** `api/admin/categories/{category}`
  * Eliminar una categoría en el panel de administración.
    * Response:

    ```sh
    {
        "Result": "Data has been deleted",
        "data": {
            "category"
        }
    }
    ```

* **PATCH** `api/admin/categories/{category}/restore`
  * Restaurar una categoría previamente eliminada.
    * Response:

    ```sh
    {
        "Result": "Data has been restored",
        "data": {
            "category"
        }
    }
    ```

#### Ordenes

* **GET|HEAD** `api/admin/orders`
  * Listado de órdenes en el panel de administración.
    * Response:

    ```sh
    {
        "data": {
            "1": {
                "id": 1,
                "user_id": 6,
                "status": "cancelled",
                "comments": null,
                "created_at": "2024-02-10T16:41:33.000000Z",
                "updated_at": "2024-02-10T16:41:33.000000Z",
                "deleted_at": null
            }
        },
        "links": {
            "self": "link-value"
        }
    }
    ```

* **POST** `api/admin/orders`
  * Crear una nueva orden en el panel de administración.
    * Json:

    ```sh
    {
    "user_id": "user id",
    "status": "in:pending,confirmed,delivered,cancelled,denied",
    "comments": "string"
    }
    ```

    * Response:

    ```sh
    {
        "Result": "Data has been stored",
        "data": {
            "order"
        }
    }
    ```

* **GET|HEAD** `api/admin/orders/{order}`
  * Ver detalles específicos de una orden en el panel de administración.
    * Response:

    ```sh
    {
        "data": [
        {
            "id": 1,
            "user_id": 6,
            "status": "cancelled",
            "comments": null,
            "created_at": "2024-02-10T16:41:33.000000Z",
            "updated_at": "2024-02-10T16:41:33.000000Z",
            "deleted_at": null
        }
    ],
    "links": {
        "self": "link-value"
    }
    }
    ```

* **PUT|PATCH** `api/admin/orders/{order}`
  * Actualizar información de una orden en el panel de administración.
    * Json(optional):

    ```sh
    {
        "comments": "string"
    }
    ```

    * Response:

    ```sh
    {
        "Result": "Data has been updated",
        "data": {
            "order"
        }
    }
    ```

* **DELETE** `api/admin/orders/{order}`
  * Eliminar una orden en el panel de administración.
    * Response:

    ```sh
    {
        "Result": "Data has been deleted",
        "data": {
            "order"
        }
    }
    ```

* **PATCH** `api/admin/orders/{order}/restore`
  * Restaurar una orden previamente eliminada.
    * Response:

    ```sh
    {
        "Result": "Data has been restored",
        "data": {
            "order"
        }
    }
    ```

#### Productos

* **GET|HEAD** `api/admin/products`
  * Listado de productos en el panel de administración.
    * Response:

    ```sh
    {
        "data": {
            "1": {
                "id": 1,
                "name": "Otilia O'Connell",
                "category_id": 6,
                "image": "https://via.placeholder.com/400x400.png/007777?text=et",
                "description": "Earum saepe repellat autem et expedita odio maxime. Ea dolore labore ea. Consequuntur et saepe quia qui sit quia. Voluptatem veniam fugiat velit vel nobis a ipsum.",
                "stock": 1034,
                "price": 29696.84,
                "created_at": "2024-02-10T16:41:33.000000Z",
                "updated_at": "2024-02-10T16:41:33.000000Z",
                "deleted_at": null
            }
        },
        "links": {
            "self": "link-value"
        }
    }
    ```

* **POST** `api/admin/products`
  * Crear un nuevo producto en el panel de administración.
    * Json:

    ```sh
    {
        "name": "string",
        "description": "string",
        "price": "int",
        "stock": "int",
        "image": "string"
    }
    ```

    * Response:

    ```sh
    {
        "Result": "Data has been stored",
        "data": {
            "product"
        }
    }
    ```

* **GET|HEAD** `api/admin/products/{product}`
  * Ver detalles específicos de un producto en el panel de administración.
    * Response:

    ```sh
    {
        "data": [
        {
            "id": 1,
            "name": "Otilia O'Connell",
            "category_id": 6,
            "image": "https://via.placeholder.com/400x400.png/007777?text=et",
            "description": "Earum saepe repellat autem et expedita odio maxime. Ea dolore labore ea. Consequuntur et saepe quia qui sit quia. Voluptatem veniam fugiat velit vel nobis a ipsum.",
            "stock": 1034,
            "price": 29696.84,
            "created_at": "2024-02-10T16:41:33.000000Z",
            "updated_at": "2024-02-10T16:41:33.000000Z",
            "deleted_at": null
        }
    ],
    "links": {
        "self": "link-value"
    }
    }
    ```

* **PUT|PATCH** `api/admin/products/{product}`
  * Actualizar información de un producto en el panel de administración.
    * Json(optional):

    ```sh
    {
        "name": "string",
        "description": "string",
        "price": "int",
        "stock": "int",
        "image": "string"
    }
    ```

    * Response:

    ```sh
    {
        "Result": "Data has been updated",
        "data": {
            "product"
        }
    }
    ```

* **DELETE** `api/admin/products/{product}`
  * Eliminar un producto en el panel de administración.
    * Response:

    ```sh
    {
        "Result": "Data has been deleted",
        "data": {
            "product"
        }
    }
    ```

* **PATCH** `api/admin/products/{product}/restore`
  * Restaurar un producto previamente eliminado.
    * Response:

    ```sh
    {
        "Result": "Data has been restored",
        "data": {
            "product"
        }
    }
    ```

#### Usuarios

* **GET|HEAD** `api/admin/users`
  * Listado de usuarios en el panel de administración.
    * Response:

    ```sh
    {
        "hola": "mundo"
    }
    ```

* **POST** `api/admin/users`
  * Crear un nuevo usuario en el panel de administración.
    * Json:

    ```sh
    {
        "name": "string",
        "email": "string",
        "password": "string",
        "phone": "int",
    }
    ```

    * Response:

    ```sh
    {
        "data": {
            "1": {
                "user_id": 1,
                "name": "Holden Becker",
                "email": "vrath@example.net",
                "token": "2|ScFFnFbdQ7c7z90x3PyJ7g4oNKSoGbLXpZXTvNAH2ffe2526",
                "roles": [
                    {
                        "id": 2,
                        "name": "customer",
                        "guard_name": "web",
                        "created_at": "2024-02-10T16:41:29.000000Z",
                        "updated_at": "2024-02-10T16:41:29.000000Z",
                        "pivot": {
                            "model_type": "App\\Models\\User",
                            "model_id": 1,
                            "role_id": 2
                        }
                    }
                ],
                "permissions": []
            }
        },
        "links": {
            "self": "link-value"
        }
    }
    ```

* **GET|HEAD** `api/admin/users/{user}`
  * Ver detalles específicos de un usuario en el panel de administración.
    * Response:

    ```sh
    {
        "data": {
            "user_id": 1,
            "name": "Holden Becker",
            "email": "vrath@example.net",
            "token": "23|e5jIAQITQUKaFrvNUecnmMlEJU5vHUAfy013AbWuc3383f29",
            "roles": [
                {
                    "id": 2,
                    "name": "customer",
                    "guard_name": "web",
                    "created_at": "2024-02-10T16:41:29.000000Z",
                    "updated_at": "2024-02-10T16:41:29.000000Z",
                    "pivot": {
                        "model_type": "App\\Models\\User",
                        "model_id": 1,
                        "role_id": 2
                    }
                }
            ],
            "permissions": []
        }
    }
    ```

* **PUT|PATCH** `api/admin/users/{user}`
  * Actualizar información de un usuario en el panel de administración.
    * Json(optional):

    ```sh
    {
        "name": "string",
        "email": "string",
        "password": "string",
        "phone": "int",
    }
    ```

    * Response:

    ```sh
    {
        "Result": "Data has been updated",
        "data": {
            "user"
        }
    }
    ```

* **DELETE** `api/admin/users/{user}`
  * Eliminar un usuario en el panel de administración.
    * Response:

    ```sh
    {
        "Result": "Data has been deleted",
        "data": {
            "user"
        }
    }
    ```

* **PATCH** `api/admin/users/{user}/restore`
  * Restaurar un usuario previamente eliminado.
    * Response:

    ```sh
    {
        "Result": "Data has been restored",
        "data": {
            "user"
        }
    }
    ```

### Rol de Cliente (`customer`)

#### Dashboard Cliente

* **GET|HEAD** `api/customer`
  * Acceso al dashboard del cliente.

#### Órdenes Cliente

* **GET|HEAD** `api/customer/orders`
  * Listado de órdenes para clientes.
    * Response:

    ```sh
    {
        "data": {
            "1": {
                "id": 1,
                "user_id": 6,
                "status": "cancelled",
                "comments": null,
                "created_at": "2024-02-10T16:41:33.000000Z",
                "updated_at": "2024-02-10T16:41:33.000000Z",
                "deleted_at": null
            }
        },
        "links": {
            "self": "link-value"
        }
    }
    ```

* **POST** `api/customer/orders`
  * Crear una nueva orden desde la perspectiva del cliente.
    * Json:

    ```sh
    {
    "user_id": "user id",
    "status": "in:pending,confirmed,delivered,cancelled,denied",
    "comments": "string"
    }
    ```

    * Response:

    ```sh
    {
        "Result": "Data has been stored",
        "data": {
            "order"
        }
    }
    ```

* **GET|HEAD** `api/customer/orders/{order}`
  * Ver detalles específicos de una orden desde la perspectiva del cliente.
    * Response:

    ```sh
    {
        "data": [
        {
            "id": 1,
            "user_id": 6,
            "status": "cancelled",
            "comments": null,
            "created_at": "2024-02-10T16:41:33.000000Z",
            "updated_at": "2024-02-10T16:41:33.000000Z",
            "deleted_at": null
        }
    ],
    "links": {
        "self": "link-value"
    }
    }
    ```

* **DELETE** `api/customer/orders/{order}`
  * Eliminar una orden desde la perspectiva del cliente.
    * Response:

    ```sh
    {
        "Result": "Data has been deleted",
        "data": {
            "order"
        }
    }
    ```

#### Detalles de Ordenes Cliente

* **GET|HEAD** `api/customer/orderdetails`
  * Listado de los detalles de ordenes para clientes.
    * Response:

    ```sh
    {
        "data": {
            "1": {
                "id": 1,
                "order_id": 1,
                "product_id": 41,
                "quantity": 2,
                "amount": 56402.3,
                "created_at": "2024-02-10T16:41:34.000000Z",
                "updated_at": "2024-02-10T16:41:34.000000Z",
                "deleted_at": null
            }
        },
        "links": {
            "self": "link-value"
        }
    }
    ```

* **POST** `api/customer/orderdetails`
  * Crear un nuevo detalle de orden desde la perspectiva del cliente.
    * Json:

    ```sh
    {
        "order_id": "int",
        "product_id": "int",
        "quantity": "int",
        "amount": "int"
    }
    ```

    * Response:

    ```sh
    {
        "Result": "Data has been stored",
        "data": {
            "orderdetail"
        }
    }
    ```

* **GET|HEAD** `api/customer/orderdetails/{orderdetail}`
  * Ver detalles específicos de un detalle de orden desde la perspectiva del cliente.
    * Response:

    ```sh
    {
        "data": {
            "1": {
                "id": 1,
                "order_id": 1,
                "product_id": 41,
                "quantity": 2,
                "amount": 56402.3,
                "created_at": "2024-02-10T16:41:34.000000Z",
                "updated_at": "2024-02-10T16:41:34.000000Z",
                "deleted_at": null
            }
        },
        "links": {
            "self": "link-value"
        }
    }
    ```

* **DELETE** `api/customer/orderdetails/{orderdetail}`
  * Eliminar una orden desde la perspectiva del cliente.
    * Response:

    ```sh
    {
        "Result": "Data has been deleted",
        "data": {
            "orderdetail"
        }
    }
    ```

#### Usuario Actual

* **GET|HEAD** `api/user`
  * Obtener detalles del usuario actual.
    * Response:

    ```sh
    {
        "id": 1,
        "old_id": null,
        "name": "Holden Becker",
        "email": "vrath@example.net",
        "phone": "1-225-449-9520",
        "email_verified_at": "2024-02-10T16:41:29.000000Z",
        "two_factor_secret": null,
        "two_factor_recovery_codes": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "created_at": "2024-02-10T16:41:33.000000Z",
        "updated_at": "2024-02-10T16:41:33.000000Z",
        "deleted_at": null
    }
    ```

### Usuarios sin rol

#### log in

* **POST** `api/login`
  * Iniciar sesion al rol customer o admin
    * Json:

    ```sh
    {
        "email": "string",
        "password": "string"
    }
    ```

    * Response:

    ```sh
    {
        "data": {
            "user_id": 1,
            "name": "Holden Becker",
            "email": "vrath@example.net",
            "token": "25|aIL8MYq5Irg4sL9ggcktPfoCqZlRFAMLYDpGRfPz0f0786a6",
            "roles": [
                {
                    "id": 2,
                    "name": "customer",
                    "guard_name": "web",
                    "created_at": "2024-02-10T16:41:29.000000Z",
                    "updated_at": "2024-02-10T16:41:29.000000Z",
                    "pivot": {
                        "model_type": "App\\Models\\User",
                        "model_id": 1,
                        "role_id": 2
                    }
                }
            ],
            "permissions": []
        }
    }
    ```

#### log out

* **POST** `api/logout`
  * Cerrar sesion de customer o admin y revocar token
    * Requiere token
    * Response:

    ```sh
    {
        "Result": "User logged out",
        "data": {
            "user"
        }
    }
    ```

#### sign up

* **POST** `api/signup`
  * Agregar usuario nuevo y asignar rol customer
    * Json:

    ```sh
    {
        "name": "string",
        "email": "string",
        "password": "string",
        "phone": "int"
    }
    ```

    * Response:

    ```sh
    {
        "Result": "Data has been stored",
        "data": {
            "user"
        }
    }
    ```

  * Listado de categorías.
    * Response:

    ```sh
    {
        "data": {
            "1": {
                "id": int,
                "category_id": null,
                "name": "Noah Renner I",
                "created_at": "2024-02-10T16:41:33.000000Z",
                "updated_at": "2024-02-10T16:41:33.000000Z",
                "deleted_at": null
            }
        },
        "links": {
                "self": "link-value"
            }
    }
    ```

* **GET|HEAD** `api/categories/{category}`
  * Ver detalles específicos de una categoría.
    * Response:

    ```sh
    {
        "data": [
        {
            "id": 1,
            "category_id": null,
            "name": "Noah Renner I",
            "created_at": "2024-02-10T16:41:33.000000Z",
            "updated_at": "2024-02-10T16:41:33.000000Z",
            "deleted_at": null
        }
    ],
    "links": {
        "self": "link-value"
    }
    }
    ```

#### Productos

* **GET|HEAD** `api/products`
  * Listado de productos.
    * Response:

    ```sh
    {
        "data": {
            "1": {
                "id": 1,
                "name": "Otilia O'Connell",
                "category_id": 6,
                "image": "https://via.placeholder.com/400x400.png/007777?text=et",
                "description": "Earum saepe repellat autem et expedita odio maxime. Ea dolore labore ea. Consequuntur et saepe quia qui sit quia. Voluptatem veniam fugiat velit vel nobis a ipsum.",
                "stock": 1034,
                "price": 29696.84,
                "created_at": "2024-02-10T16:41:33.000000Z",
                "updated_at": "2024-02-10T16:41:33.000000Z",
                "deleted_at": null
            }
        },
        "links": {
            "self": "link-value"
        }
    }
    ```

* **GET|HEAD** `api/products/{product}`
  * Ver detalles específicos de un producto.
    * Response:

    ```sh
    {
        "data": [
        {
            "id": 1,
            "name": "Otilia O'Connell",
            "category_id": 6,
            "image": "https://via.placeholder.com/400x400.png/007777?text=et",
            "description": "Earum saepe repellat autem et expedita odio maxime. Ea dolore labore ea. Consequuntur et saepe quia qui sit quia. Voluptatem veniam fugiat velit vel nobis a ipsum.",
            "stock": 1034,
            "price": 29696.84,
            "created_at": "2024-02-10T16:41:33.000000Z",
            "updated_at": "2024-02-10T16:41:33.000000Z",
            "deleted_at": null
        }
    ],
    "links": {
        "self": "link-value"
    }
    }
    ```

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
