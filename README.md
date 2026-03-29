# Laravel13Vue3_template
Template for Laravel 13 + Vue3

________________________________________________________

### Clone this project
```sh
git clone --recursive https://github.com/gc120978levelup1/Laravel13Vue3_template.git
```

________________________________________________________

### Run Docker Container Servers
Run Docker Desktop first before running the command below
```sh
cd Serverss
./ss up
cd ..
```

________________________________________________________

### Install Project Dependencies, Fix Env Variable and Migrate
```sh
composer install
npm install
copy .env.example .env
php artisan migrate
```

________________________________________________________

### Launch Development Server
```sh
composer run dev
```

### Goto web browser and open site
[http://127.0.0.1:8000]

### All Done




