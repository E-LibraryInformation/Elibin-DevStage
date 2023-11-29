## Installation First

**WARNING:** If you haven't installed Git, please install it first from [Download GIT](https://git-scm.com/)


**WARNING:** If you haven't installed Composer, please install it first from [Download Composer](https://getcomposer.org/)

1. Buka terminal.
2. cd ke folder yang menyimpan project Laravel kalian.
3. Jalankan perintah berikut untuk cloning repository ke direktori kalian:
    ```
    git clone https://github.com/E-LibraryInformation/Elibin-DevStage.git`
    ```
4. Jalankan perintah berikut untuk menginstall dependensi laravel:
    ```
    composer install
    ```
5. Jalankan perintah berikut untuk menginstall paket-paket yang diperlukan:
    ```
    npm install
    ```
6. Jalankan perintah berikut untuk membuat file env:
    ```
    cp .env.example .env
    ```
7. Jalankan perintah berikut untuk mengenerate key laravel yang baru:
    ```
    php artisan key:generate
    ```
8. Jalankan perintah berikut untuk membuat database(apabila sudah ada database nya boleh di skip):
    ```
    php artisan migrate
    ```
9. Jalankan perintah berikut untuk membuat data-data didalam database:
    ```
    php artisan migrate:fresh --seed
    ```

**WARNING:** Untuk langkah ke 8 dan 9 pastikan koneksi mysql sudah terhubung.

## Documentation

This project uses Laravel for the backend and TailwindCSS for the frontend so that application development applies OOP, MVC, and uses independent styles and referenced styles.

![git](https://cdn.icon-icons.com/icons2/2699/PNG/512/laravel_logo_icon_170314.png) ![git](https://cdn.icon-icons.com/icons2/2699/PNG/512/tailwindcss_logo_icon_170649.png)

