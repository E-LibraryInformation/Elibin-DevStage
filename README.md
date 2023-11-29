## Installation First

**WARNING:** If you haven't installed Git, please install it first from [Download GIT](https://git-scm.com/)

![git](https://git-scm.com/images/logo@2x.png)

Note: Pastikan PHP, Composer, NodeJS, dan koneksi MySql sudah terinstall dan terkoneksi ke perangkat.
1. Buka terminal.
2. cd ke folder yang menyimpan project Laravel kalian.
3. Jalankan perintah berikut:
    ```
    git clone https://github.com/elylialya/Elibin.git
    ```
4. Jalankan perintah berikut:
    ```
    composer install
    ```
5. Jalankan perintah berikut:
    ```
    npm install
    ```
6. Jalankan perintah berikut:
    ```
    cp .env.example .env
    ```
7. Jalankan perintah berikut:
    ```
    php artisan key:generate
    ```
8. Jalankan perintah berikut:
    ```
    php artisan migrate
    ```
9. Jalankan perintah berikut:
    ```
    php artisan migrate:fresh --seed
    ```

## Documentation

This project uses Laravel for the backend and TailwindCSS for the frontend so that application development applies OOP, MVC, and uses independent styles and referenced styles.

![git](https://cdn.icon-icons.com/icons2/2699/PNG/512/laravel_logo_icon_170314.png) ![git](https://cdn.icon-icons.com/icons2/2699/PNG/512/tailwindcss_logo_icon_170649.png)

