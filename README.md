# sendgrid-php-example

This is an example of using the [SendGrid php library](https://github.com/sendgrid/sendgrid-php).

## Usage

```bash
git clone https://github.com/sendgrid/sendgrid-php-example.git 
cd sendgrid-php-example
cp .env.example .env
composer install
php -f sendgrid-php-example.php
php -f smtp-php-example.php
```
Make sure to set username, password and recipient in the `.env` file. If you're not sure why they're stored in the `.env` file you can read up on it [here](http://12factor.net/config).
