# Lumen boilerplate - Lumen 5.7 API

## Requirements

* see Lumen 5.7 requirements at: [requirements](https://lumen.laravel.com/docs/5.7)
* Docker and DockerCompose (for local development only) 
> Mac distribution https://download.docker.com/mac/stable/Docker.dmg
> Detailed instructions for setup of docker can be found [here](https://www.docker.com/community-edition).

## Initial setup of the project
### Option 1: Use script to do everything for you
We've written bash script that will do all things that you would normally have to do manually.

In order to run script all you have to do is run   
  `chmod +x init && ./init`

### Option 2: Local development reference using DockerCompose
* Edit /etc/hosts add local domain my-project.loc  
`127.0.0.1    my-project.loc`

* Copy content from **docker-compose.yml.dist** in **docker-compose.yml**

* Run docker containers in detached mode  
`docker-compose up -d`

(note. If you wish to turn it off, please execute `docker-compose stop`)

* Check all service status:  
`docker-compose ps`

* Log into PHP service container and complete Laravel installation process  
`docker exec -it lumen bash`

* Inside PHP container, switch to local user **laravel** and install Composer dependencies  
`composer install`

## Create local environments

* create .env environment file in project root
* copy content from .env.example in .env

* Configure JWT by running (read more on [jwt-auth](https://jwt-auth.readthedocs.io/en/develop/laravel-installation/))
(you should be still in PHP container. If not please login into PHP service container first (called *lumen*)!)  
`php artisan jwt:secret`

* Run the migrations to generate data tables
`php artisan migrate`  

* Visit http://my-project.loc/api/documentation and feel free to try API using Swagger UI.

## Set directory permissions

`run sudo chmod -R 777 storage bootstrap/cache` 

## php formatter for visual studio code

install [php formatter](https://marketplace.visualstudio.com/items?itemName=Sophisticode.php-formatter). More [info](https://github.com/Dickurt/vscode-php-formatter/wiki).