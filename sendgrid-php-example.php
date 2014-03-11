<?php
require 'vendor/autoload.php';
Dotenv::load(__DIR__);

$sendgrid_username = $_ENV['SENDGRID_USERNAME'];
$sendgrid_password = $_ENV['SENDGRID_PASSWORD'];
$to                = $_ENV['TO'];

$sendgrid = new SendGrid($sendgrid_username, $sendgrid_password, array("turn_off_ssl_verification" => true));
$email    = new SendGrid\Email();
$email->addTo($to)->
       setFrom($to)->
       setSubject('[sendgrid-php-example] Owl named %yourname%')->
       setText('Owl are you doing?')->
       setHtml('<strong>%how% are you doing?</strong>')->
       addSubstitution("%yourname%", array("Mr. Owl"))->
       addSubstitution("%how%", array("Owl"))->
       addHeader('X-Sent-Using', 'SendGrid-API')->
       addHeader('X-Transport', 'web')->
       addAttachment('./gif.gif', 'owl.gif');

$response = $sendgrid->send($email);
var_dump($response);
