# Torrungruang

Web application for rope factory back office system

## Technologies and Libraries

* [![Laravel][Laravel.com]][Laravel-url]
* [![TailwindCSS][TailwindCSS.com]][TailwindCSS-url]

## Setup

* Clone the repo
    ```sh
    git clone https://github.com/0akkung/torrungruang.git
    ```

* Installing Composer Dependencies For Existing Applications
    ```sh
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php82-composer:latest \
        composer install --ignore-platform-reqs
    ```
  
* Copy `.env.example` to `.env`
  ```sh
  cp .env.example .env
  ```

* Running the application
    ```sh
    sail up -d
    ```
  
* Generate Application Key
    ```sh
    sail artisan key:generate
    ```
  
* Install yarn
    ```sh
    sail yarn install
    ```

* Run css with yarn
    ```sh
    sail yarn dev
    ```

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
 a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contributors
<table>
  <tbody>
    <tr>
      <td align="center"><a href="https://github.com/AmpornSaejaew"><img src="https://avatars.githubusercontent.com/u/98537729?s=500&v=4" width="150px;" style="border-radius: 100%" alt="maryne"/><br /><sub><b>maryne</b></sub></a><br /><small></small></td>
      <td align="center"><a href="https://github.com/0akkung"><img src="https://avatars.githubusercontent.com/u/98578165?s=500&v=4" width="150px;" style="border-radius: 100%" alt="0akkung"/><br /><sub><b>0akkung</b></sub></a><br /><small></small></td>
      <td align="center"><a href="https://github.com/Pompu"><img src="https://avatars.githubusercontent.com/u/98573939?v=4" width="150px;" style="border-radius: 100%" alt="pompu"/><br /><sub><b>Pompu</b></sub></a><br /><small></small></td>
      <td align="center"><a href="https://github.com/Donutto"><img src="https://avatars.githubusercontent.com/u/98575516?v=4" width="150px;" style="border-radius: 100%" alt="donuto"/><br /><sub><b>Donutto</b></sub></a><br /><small></small></td>

  </tbody>
</table>

<!-- Markdown Links & Images -->
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Spring.io]: https://img.shields.io/badge/Spring-6DB33F?style=for-the-badge&logo=spring&logoColor=white
[Spring-url]: https://spring.io
[Spring.io/spring-boot]: https://img.shields.io/badge/Spring_Boot-F2F4F9?style=for-the-badge&logo=spring-boot
[SpringBoot-url]: https://spring.io/projects/spring-boot]
[TailwindCSS.com]: https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white
[TailwindCSS-url]: https://tailwindcss.com/
