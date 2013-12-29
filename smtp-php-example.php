<?php
require 'vendor/autoload.php';
Dotenv::load(__DIR__);

$sendgrid_username = $_ENV['SENDGRID_USERNAME'];
$sendgrid_password = $_ENV['SENDGRID_PASSWORD'];
$to                = $_ENV['TO'];

$transport  = Swift_SmtpTransport::newInstance('smtp.sendgrid.net', 587);
$transport->setUsername($sendgrid_username);
$transport->setPassword($sendgrid_password);

$mailer     = Swift_Mailer::newInstance($transport);

$message    = new Swift_Message();
$message->setTo($to);
$message->setFrom($to);
$message->setSubject("[smtp-php-example] Owl");
$message->setBody("%how% are you doing?");

$header           = new Smtpapi\Header();
$header->addSubVal("%how%", array("Owl"));

$message_headers  = $message->getHeaders();
$message_headers->addTextHeader("x-smtpapi", $header->toJsonString());

try {
  $response = $mailer->send($message);
  print_r($response);
} catch(\Swift_TransportException $e) {
  print_r($e);
  print_r('Bad username / password');
}
