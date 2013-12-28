<?php
require 'vendor/autoload.php';
Dotenv::load(__DIR__);

$sendgrid_username = $_ENV['SENDGRID_USERNAME'];
$sendgrid_password = $_ENV['SENDGRID_PASSWORD'];
$to                = $_ENV['TO'];

$transport  = Swift_SmtpTransport::newInstance('smtp.sendgrid.net', 25);
$transport->setUsername($sendgrid_username);
$transport->setPassword($sendgrid_password);

$mailer     = Swift_Mailer::newInstance($transport);

$message    = new Swift_Message("[smtp-php-example]");
$message->setTo($to);
$message->setFrom($to);
$message->setSubject("Owl are you doing?");
$message->setBody("Owl are you doing?");

try {
  $response = $mailer->send($message);
  print_r($response);
} catch(\Swift_TransportException $e) {
  print_r('Bad username / password');
}
