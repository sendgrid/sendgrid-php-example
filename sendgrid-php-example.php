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
       setHtml('<strong>%how% are you doing?</strong>')->
       addSubstitution("%how%", array("Owl"))->
       addMessageHeader('X-Sent-Using', 'SendGrid-API')->
       addMessageHeader('X-Transport', 'web')->
       addAttachment('./gif.gif', 'owl.gif');

$response = $sendgrid->web->send($email);
var_dump($response);
