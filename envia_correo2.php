<?php

error_reporting(E_PARSE);
require('PHPMailer/class.phpmailer.php');

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "secure.emailsrvr.com";
$mail->Port = 465;
$mail->SMTPSecure = "ssl";
$mail->Username = "diaconia-frif@abrenet.com"; //$regEm[1];
$mail->Password = "abrenet.2016";
$mail->From = "reportes@abrenet.com"; //$regEm[1];
$mail->FromName = "DIACONIA I.F.D.";

$mail->Subject = "pruebas";
$mail->CharSet = "UTF-8";
$mail->IsHTML(true);
$mail->Body = "<html>
				<head>
				<meta charset=utf-8>
				<title>CONTACTO PAGINA COBOSER :</title>
				<style>
				texto{
				font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;
				color:#377CC8;
					}
				</style>
				</head>
				<body>
				<texto>ss</texto><br>
                                <texto>sasasa</texto>    
				</body>
				</html>";
//        $mail->AddAddress("mariela.alberto@uruguayasistencia.com.uy"); 
//	$mail->AddAddress("darriaza@coboser.com"); 
//	$mail->AddAddress("cbonilla@coboser.com");
//        $mail->AddAddress("emontano@sudseguros.com"); 
//	$mail->AddAddress("jvera@coboser.com");
$mail->AddAddress("sguzman@sudseguros.com");
$mail->AddAddress("cmacchiavelli@coboser.com");
//	$mail->AddAddress("jhurtadod@baneco.com.bo");
if ($mail->Send()) {
    echo "enviado";
} else {
    echo "no enviado";
}





?>