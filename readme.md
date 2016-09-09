# Ecommerce Test

Installation
-----------

```
clone this repository
```
Run composer
```
php composer.phar install
```
Fix permissions
```
sudo chmod -R 777 storage/ && sudo chmod -R 777 bootstrap/
```
Create Schema
```
create schema homestead
```
Update .env file with your mysql credencials


Let artisan do the hard work for you
```
php artisan migrate
php artisan db:seed
```

