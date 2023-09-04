<?php

  namespace Classes;

  use Dotenv\Dotenv;
  use PHPMailer\PHPMailer\PHPMailer;

  require_once __DIR__ . '/../vendor/autoload.php';
  $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
  $dotenv->safeLoad();

  class Email
  {
    public $email;
    public $name;
    public $token;

    public function __construct($email, $name, $token)
    {
      $this->email = $email;
      $this->name = $name;
      $this->token = $token;
    }

    public function sendForgotPasswordEmail()
    {
      $mail = new PHPMailer(true);

      $mail->isSMTP();
      $mail->Host = $_ENV['EMAIL_HOST'];
      $mail->SMTPAuth = $_ENV['EMAIL_SMTPAUTH'];
      $mail->Port = $_ENV['EMAIL_PORT'];
      $mail->Username = $_ENV['EMAIL_USERNAME'];
      $mail->Password = $_ENV['EMAIL_PASSWORD'];
      $mail->setFrom($_ENV['EMAIL_FROM_ADDRESS'], 'Sistema de Incidencias de Capital Humano');
      $mail->addAddress($this->email);
      $mail->Subject = 'Restablece tu contraseña';
      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';

      $mailContent = '
        <html lang="es">
          <p>Hola <strong>' . $this->name . '</strong>, has solicitado restablecer tu contraseña,para hacerlo sigue el siguiente enlace:</p>
          <p><a href="http://10.7.31.222:8080/sicah-web/restablecer_contrasena.php?token=' . $this->token . '">Restablece tu contraseña</a></p>
          <p>Si no has solicitado este cambio, puedes ignorar este mensaje.</p>
        </html>
      ';

      $mail->Body = $mailContent;
      $mail->send();
    }
  }