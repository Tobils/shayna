# SHAYNA BACKEND LARAVEL

## DATABASE
database mysql dijalankan di atas docker dengan konfigurasi docker-compose.yml sebagai berikut :
1. docker-compose.yml
    ```yml
    version: '3.3'
    services:
    db:
        image: mysql:5.7
        restart: always
        environment:
        MYSQL_DATABASE: 'shayna-backend'
        # So you don't have to use root, but you can if you like
        MYSQL_USER: 'tobil'
        # You can use whatever password you like
        MYSQL_PASSWORD: 'manjaddawajada'
        # Password for root access
        MYSQL_ROOT_PASSWORD: 'manjaddawajada'
        ports:
        # <Port exposed> : < MySQL Port running inside container>
        - '3306:3306'
        expose:
        # Opens port 3306 on the container
        - '3306'
        # Where our data will be persisted
        volumes:
        - my-db:/var/lib/mysql
    # Names our volume
    volumes:
    my-db:
    ```

2. Entity Relationship Diagram
    - ERD menggunakan app.lucidchart.com
        <p align="center">
            <img src="ERD-SHAYNA.png" width="100%" alt="erd shayna" />
        </p>
    - Tabel Product : `php artisan make:migration create_products_table --create=products`
    - Tabel Galeri Produk : `php artisan make:migration create_product_galleries_table --create=product_galleries`
    - Tabel transaction : `php artisan make:migration create_transactions_table --create=transactions`



## REFERENSI
- [elaadmin colorlib](https://colorlib.com/polygon/elaadmin/index.html)
