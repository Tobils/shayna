# SHAYNA BACKEND LARAVEL

## DATABASE
database mysql dijalankan di atas docker dengan konfigurasi docker-compose.yml sebagai berikut :
1. docker-compose.yml
    ```yml
    # docker-compose.yml
    version: '3'
    services:
    database:
        image: postgres:latest # use latest official postgres version
        env_file:
        - database.env # configure postgres
        volumes:
        - ./postgres-data:/var/lib/postgresql/data
        ports:
        - 5432:5432
    ```
2. database.env
    ```js
    # database.env
    POSTGRES_USER=bwa_laravue
    POSTGRES_PASSWORD=bwa_laravue_password
    POSTGRES_DB=bwa_laravue_shayna
    ```
3. run service : `docker-compose up -d`

2. Entity Relationship Diagram
    - ERD menggunakan app.lucidchart.com
        <p align="center">
            <img src="ERD-SHAYNA.png" width="100%" alt="erd shayna" />
        </p>
    - Tabel Product : `php artisan make:migration create_products_table --create=products`
    - Tabel Galeri Produk : `php artisan make:migration create_product_galleries_table --create=product_galleries`
    - Tabel transaction : `php artisan make:migration create_transactions_table --create=transactions`
    - Tabel transaction_details : `php artisan make:migration create_transaction_details_table --create=transaction_details`

3. auth admin
    - `composer require laravel/ui --dev`
    - `php artisan ui vue --auth`
    - `npm install && npm run dev`

4. admin data product
    - `php artisan make:model Models\\Product`
    - `php artisan make:request ProductRequest`
    - `php artisan make:controller ProductController --resource`
    - ckeditor untuk nulis paragraf

5. admin gallery product
    - model     : `php artisan make:model Models\\ProductGallery`
    - storage   : `php artisan storage:link`
    - request   : `php artisan make:request ProductGalleryRequest`
    - controller: `php artisan make:controller ProductGalleryController --resource`

6. Transaksi
    - model     : `php artisan make:model Models\\Transaction`
    - controller: `php artisan make:controller TransactionController --resource`
    - transaksi detail menggunakan modal/pop up dinamis

7. API [ANTAR MUKA PEMROGRAMAN APLIKASI]
    - response formater
    - API Produk 
        - `php artisan make:controller API\\ProductController`
        - uri : `http://localhost:8000/api/products?id=2` method : GET
        - response
            ```json
            {
                "meta": {
                    "code": 200,
                    "status": "success",
                    "message": "Data produk berhasil diambil"
                },
                "data": {
                    "id": 2,
                    "name": "zara celana",
                    "slug": "zara-celana",
                    "type": "celana",
                    "description": "<p>jara adalah celana masa kini uhuy</p>",
                    "price": 20,
                    "quantity": 1000,
                    "deleted_at": null,
                    "created_at": "2020-09-19T08:52:38.000000Z",
                    "updated_at": "2020-09-19T10:20:19.000000Z",
                    "galleries": [
                    {
                        "id": 1,
                        "products_id": 2,
                        "photo": "http://localhost:8000/storage/assets/product/aHeqn1t5JZel0WYwzcFBLS0NTiCSM5gktW0MveZC.png",
                        "is_default": true,
                        "deleted_at": null,
                        "created_at": "2020-09-19T13:43:02.000000Z",
                        "updated_at": "2020-09-19T13:43:02.000000Z"
                    }
                    ]
                }
                }
            ```


## REFERENSI
- [elaadmin colorlib](https://colorlib.com/polygon/elaadmin/index.html)
