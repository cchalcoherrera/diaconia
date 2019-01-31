<?php

require('PHPMailer/class.phpmailer.php');
$mail = new PHPMailer();
$mail->Host = "info@sudseguros.com";
                                $mail->From = "info@sudseguros.com";
                                $mail->FromName = "Sistema Exportacion";

                                $mail->Subject = 'Generacion de BD exitosa' . date('d_m_Y');

                                $mail->addAddress("sguzman@sudseguros.com", "Sergio Guzman");
                                $mail->addCC("ccmacchiavelli@coboser.com", "Ernesto Montano");

                                $body  = 'Se genero correctamente el Backup de';

                                $mail->Body = $body;
                                $mail->AltBody = $body;
                                if($mail->send()){
                                        echo "se envio el mail";
                                }else{
                                        echo "no se envio el mail";
                                }      
?>
