<?php
$ip = $_SERVER['REMOTE_ADDR'];

$empresa    = utf8_decode($_POST['empresa']);
$rut        = utf8_decode($_POST['rut']);
$nombre     = utf8_decode($_POST['nombre']);
$correo     = utf8_decode($_POST['correo']);
$telefono   = utf8_decode($_POST['telefono']);
$comentario = utf8_decode($_POST['mensaje']);
//echo $nombre;
if (($nombre == "") || ($correo == "") || ($telefono == "")) {
    echo "2";
}
else {

    require_once("conecta_formularios.php");
    $test = conectar();
    $query = "insert into `consulta_empresa`
    (empresa, rut, nombre, correo, telefono, comentario, ip) VALUES
    ('$empresa', '$rut', '$nombre', '$correo', '$telefono', '$comentario', '$ip')";
    $respuesta = mysql_query($query);
    $fecha = date("d-m-Y");
    $hora = date("H:i");
    
    //===================MAIL==================================
      
        $message = "
        Se ha recibido un correo de Feria Laboral:

        Empresa: $empresa \n
        RUT: $rut \n
        Nombre: $nombre \n        
        Correo: $correo \n
        Telefono: $telefono \n
        Comentario: $comentario \n
        
        Enviado de la web el $fecha a las $hora horas. (Fecha y hora del servidor.)
        ----------------------------- \n
        *Este mensaje es generado automaticamente por el sistema. Por Favor no responda a este mensaje.\n 
        ";
        
        //$to  = 'formacion.ejecutiva@usach.cl, alvaro.gonzalezmo@usach.cl, programas.fae@usach.cl';
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
        
        Empresa: $empresa \n
        Rut: $rut \n
        Nombre: $nombre \n
        Correo: $correo \n
        Telefono: $telefono \n
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
        
        //$respuesta3 = mail($to, $subject, $message, $headers);

    //==================FIN MAIL===============================


    if(!$respuesta){
        echo "0";
    }
    else{
        echo "1";
    }
}
?>
