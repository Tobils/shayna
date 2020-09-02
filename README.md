# shayna
Projek aplikasi bahan belajar full stack laravel vue [toko online] kelas bwa

## Get Started
- run vue ui : `vue ui`
- convert dari html ke vue
    - header
    - hero carousel
    - woman banner
    - insta
    - partner
    - footer

## CARA INSTALL LARAVEL DI MACOS
1. install composer
2.  jalankan : `composer require global "laravel/installer`
3. agar laravel dapat diguanakns ecara global, atur sebagai berikut :
    ```bash
    # tambahkan file  ~/.bash_profile
    vi ~/.bash_profile

    # tambahkan path pada file tsb
    export PATH=~/.composer/vendor/bin:$PATH  

    # source file
    source ~/.bash_profile
    ```
4. buat project : `laravel new shayna-backend`
5. ref : (javatpoint)[https://www.javatpoint.com/how-to-install-laravel-on-mac]

## DATABASE MENGGUNAAKN ADMINER
```bash
$ brew install docker docker-machine$ brew cask install virtualbox
-> need password
-> possibly need to address System Preference setting$ docker-machine create --driver virtualbox default
$ docker-machine env default
$ eval "$(docker-machine env default)"$ docker run hello-world
$ docker-machine stop default
```