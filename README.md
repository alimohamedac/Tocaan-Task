* Install Laravel & Dependencies
```
git clone <repository_url>
cd <project_directory>
composer install
cp .env.example .env
php artisan key:generate
```

* Configure Database
1 - Update the .env file:
  ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=root
    DB_PASSWORD=
    ```
2 - Run migrations:
  ```
  php artisan migrate
  ```
  
* Configure JWT Authentication
  1 - Install JWT package:
  ```
  composer require tymon/jwt-auth
  ```
  2 - Publish the JWT config:
  ```
  php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
  ```
  3 - Generate JWT secret key:
  ```
  php artisan jwt:secret
  ```
* Configure Payment Gateway
  - Update .env
```
PAYMENT_GATEWAY=stripe
STRIPE_SECRET=sk_test_xxx
```

* Run the Application
  ```
  php artisan serve
  ```

* Adding a New Payment Gateway
 - Create a new class in app/Services/Payment/
 - Add it to PaymentGatewayFactory
 - Update .env
