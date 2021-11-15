<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About Appication

Application to search and contact developers through the github platform.

## Starting Application

**Require composer and node installed on the computer**

After cloning the repository, run the commands in sequence

```
composer install
```

```
npm install && npm run dev
```

Being inside the project folder
```
cp .env.example .env
```

```
php artisan key:generate
```

```
php artisan migrate --seed
```
## License

The application and Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).