
## Task

instruction for install

- git clone this
- composer install
- set your .env file
- php artisan key:generate
- add this to your .env file
- MAIL_DRIVER = smtp
  MAIL_HOST = smtp.gmail.com
  MAIL_PORT = 465
  MAIL_USERNAME = jal99ol3bek11@gmail.com
  MAIL_PASSWORD = mczltbozeijdfexx
  MAIL_ENCRYPTION=tsl
  MAIL_FROM_NAME="${APP_NAME}"
- php artisan migrate:  to your database
- php artisan serve
