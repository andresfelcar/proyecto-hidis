<?php

require_once "Modelo/Conexion.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

class Login_Controller
{

    private function __construct()
    {
    }

    public static function Main($option, $array = [])
    {

        $login = new Login_Controller();
        switch ($option) {

            case 0:
                $result = $login->Consult($array);
                break;

            case 1:
                $result = $login->Insert($array);
                break;

            case 2:
                $result = $login->Send_token($array);
                break;

            case 3:
                $result = $login->Consult_token($array);
                break;
            case 4:
                $result = $login->Restartpass($array);
                break;
        }
        return $result;
    }
    public function Consult($array)
    {

        $conexion = Conexion::connection();
        $sql = "SELECT * FROM paciente WHERE correo=? AND contrasena=MD5(?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $array[0], $array[1]);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_row();
    }
    public function Insert($array)
    {

        $Conexion = Conexion::connection();

        $sql = "SELECT * FROM paciente WHERE correo = '$array[2]'";
        $result = $Conexion->query($sql);
        $filas = $result->num_rows;

         $Usuario=$array[4];

         if($Usuario=="Paciente"){
             $Usuario=1;
         }
         if($Usuario=="Medico"){
            $Usuario=3;
        }
        if($Usuario=="Familiar"){
            $Usuario=2;
        }


        if ($filas > 0) {
            echo  "<script> alert('Ya existe una cuenta con ese correo ');</script>";
        } else {
            $stmt = $Conexion->prepare("INSERT INTO paciente (nombres,apellidos,correo,contrasena,tipoUsuario) VALUES (?,?,?,MD5(?),'$Usuario')");
            $stmt->bind_param("ssss", $array[0], $array[1], $array[2], $array[3]);
            $stmt->execute();
            echo "<script>alert('Usuario registrado con exito');</script>";
            return $stmt;
        }
    }
    public function Restartpass($array)
    {
        $conexion = Conexion::connection();
        $sql = "UPDATE paciente SET contrasena=MD5(?) WHERE tokens=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $array[0], $array[1]);

        if ($stmt->execute()) {
            $sql = "UPDATE paciente SET tokens=null WHERE tokens=?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $array[1]);
            $stmt->execute();
            echo "<script>
            alert('Contraseña se cambió con exito');
            window.location='index.php?view=';
            </script>";
        }
    }
    public function Consult_token($array)
    {
        $conexion = Conexion::connection();
        $sql = "SELECT * FROM paciente WHERE tokens= ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $array[0]);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_row();
    }
    public function Send_token($array)
    {

        $conexion = Conexion::connection();
        $sql = "SELECT correo FROM paciente WHERE correo= '$array[1]'";
        $result = $conexion->query($sql);
        $filas = $result->num_rows;

        if ($filas === 1) {

            $sql = "UPDATE paciente SET tokens=? WHERE correo=?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ss", $array[0], $array[1]);
            $stmt->execute();

            $mail = new PHPMailer(true);
            $window_restart = "<html><head>";
            $window_restart .= "<style type='text/css'>";
            $window_restart .= "
            .container-msg{
              width: 100%;
              background: #ccc;
              text-align: center;
            }
            .boton{
              margin: 20px auto;
              padding: 10px;
              border-radius: 8px;
              border-style: none;
              border: 1px solid gray;
              box-shadow: 2px 2px 4px 0 black;
              background: orange;
              cursor: pointer;
            }
            a{
              text-decoration: none;
              cursor: pointer;
              color: black;
            }
            a:hover > .boton{
              color: white;
              box-shadow: 1px 1px 2px 0 black;
            }
            ";
            $window_restart .= "</style></head><body>";
            $window_restart .= "
            <div class='container-msg'>
                <h1>Restablecer contraseña</h1>
                <p>Para restablecer su contraseña haga click en el siguiente boton: </p>

                <a href='http://localhost/proyecto-hidis/index.php?view=recuperacion&tokens=" . $array[0] . "'><button class='boton'>Restablecer Contraseña</button></a>
              </div>
            ";
            $window_restart .= "</body></html>";


            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->CharSet = 'UTF-8';
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'spamyrecuperacion@gmail.com';                     // SMTP username
            $mail->Password   = 'blacksuede';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('spamyrecuperacion@gmail.com', 'HIDIS');
            $mail->addAddress($array[1]);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Cambio de contraseña';
            $mail->Body    = $window_restart;

            if ($mail->send()) {
                echo "<script>alert('Se envió a su correo')</script>";
            } else {
                echo "<script>alert('No se pudo hacer el envio')</script>";
            }
        } else {
            echo "<script>alert('No se encontró el correo')</script>";
        }
    }
}
