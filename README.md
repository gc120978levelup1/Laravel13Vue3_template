# Laravel13Vue3_template
Template for Laravel 13 + Vue3
Note: Run the CLI command in a Bash Shell like git bash shell

________________________________________________________

### Install Docker Desktop
[https://docs.docker.com/desktop/setup/install/windows-install/]

________________________________________________________

### Clone this project
```sh
git clone --recursive https://github.com/gc120978levelup1/Laravel13Vue3_template.git
```

________________________________________________________

### Run Docker Container Servers
Run Docker Desktop first before running the command below
```sh
cd Laravel13Vue3_template
docker ps -aq | xargs docker stop | xargs docker rm
docker system prune -f
cd Serverss
cp -r -a ./.env ../
./ss up
cd ..
```

________________________________________________________

### Install Project Dependencies, Fix Env Variable and Migrate
```sh
composer install
npm install
npm run build
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




