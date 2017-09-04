<?php
$ip = $_SERVER['REMOTE_ADDR'];

$nombre     = utf8_decode($_POST['nombre']);
$correo     = utf8_decode($_POST['correo']);
$telefono   = utf8_decode($_POST['telefono']);
$asunto   = utf8_decode($_POST['asunto']);
$comentario = utf8_decode($_POST['mensaje']);
//echo $nombre;
if (($nombre == "") || ($correo == "") || ($comentario == "")) {
    echo "2";
}
else {

    require_once("conecta_formularios.php");
    $test = conectar();
    $query = "insert into `contacto`
    (nombre, correo, telefono, asunto, comentario, ip) VALUES
    ('$nombre', '$correo', '$telefono', '$asunto', '$comentario', '$ip')";
    $respuesta = mysql_query($query);
    $fecha = date("d-m-Y");
    $hora = date("H:i");
    
    //===================MAIL==================================
      
        $message = "
        Se ha recibido un correo de Feria Laboral:

        Nombre: $nombre \n
        Correo: $correo \n
        Telefono: $telefono \n
        Asunto: $asunto \n
        Comentario: $comentario \n
        
        Enviado de la web el $fecha a las $hora horas. (Fecha y hora del servidor.)
        ----------------------------- \n
        *Este mensaje es generado automaticamente por el sistema. Por Favor no responda a este mensaje.\n 
        ";
        
        $to      = "alvaro.romero@usach.cl";
        $subject = "Feria Laboral - ".$asunto;
        $message = $message;
        $headers = "From: ferialaboral@usach.cl";
     
        $subject = utf8_encode($subject);
        $message = utf8_encode($message);
        $headers = utf8_encode($headers);

        $respuesta2 = mail($to, $subject, $message, $headers);



    //==================FIN MAIL===============================

    //===================MAIL CONFIRMACION==================================

        $message = "
        Estimado/a, $nombre le informamos que sus datos se enviaron
        satisfactoriamente a Feria Laboral USACH 2017.
        Este es un resumen de los datos:
        
        Nombre: $nombre \n
        Correo: $correo \n
        Telefono: $telefono \n
        Asunto: $asunto \n
        Comentario: $comentario \n
        
        Enviado de la web el $fecha a las $hora horas. (Fecha y hora del servidor.)
        ----------------------------- \n
        *Este mensaje es generado automaticamente por el sistema.
        Por Favor no responda a este mensaje.\n
        
        ";
        
        $to      = $correo;
        $subject = "Feria Laboral - Formulario Contacto";
        $message = $message;
        $headers = "From: ferialaboral@usach.cl";
     
        $subject = utf8_encode($subject);
        $message = utf8_encode($message);
        $headers = utf8_encode($headers);
        
        $respuesta3 = mail($to, $subject, $message, $headers);

    //==================FIN MAIL===============================


    if(!$respuesta){
        echo "0";
    }
    else{
        echo "1";
    }
}
?>
