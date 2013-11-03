<?php
require 'vendor/autoload.php';
Dotenv::load(__DIR__);
SendGrid::register_autoloader();

$sendgrid_username = $_ENV['SENDGRID_USERNAME'];
$sendgrid_password = $_ENV['SENDGRID_PASSWORD'];
$to                = $_ENV['TO'];

$sendgrid = new SendGrid($sendgrid_username, $sendgrid_password);
$email    = new SendGrid\Email();
$email->addTo($to)->
       setFrom($to)->
       setSubject('[sendgrid-php-example] Owl')->
       setText('Owl are you doing?')->
       setHtml('<strong>Owl are you doing?</strong>')->
       addAttachment('./gif.gif', 'owl.gif');

$sendgrid->web->send($email);
