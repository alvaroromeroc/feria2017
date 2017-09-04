<?php
$ip = $_SERVER['REMOTE_ADDR'];


$nombreComercial = utf8_decode($_POST['nombreComercial']);
$razonSocial = utf8_decode($_POST['razonSocial']);
$giro = utf8_decode($_POST['giro']);
$rutEmpresa = utf8_decode($_POST['rutEmpresa']);
$direccion = utf8_decode($_POST['direccion']);
$telefono = utf8_decode($_POST['telefono']);
$sitioWeb = utf8_decode($_POST['sitioWeb']);
$nombreEncargadoPago = utf8_decode($_POST['nombreEncargadoPago']);
$telefonoEncargadoPago = utf8_decode($_POST['telefonoEncargadoPago']);
$correoEncargadoPago = utf8_decode($_POST['correoEncargadoPago']);
$participaComo = utf8_decode($_POST['participaComo']);
$acepto = utf8_decode($_POST['acepto']);
$nombreRepresentante = utf8_decode($_POST['nombreRepresentante']);
$telefonoRepresentante = utf8_decode($_POST['telefonoRepresentante']);
$celularRepresentante = utf8_decode($_POST['celularRepresentante']);
$correoRepresentante = utf8_decode($_POST['correoRepresentante']);
$nombreAdicional = utf8_decode($_POST['nombreAdicional']);
$telefonoAdicional = utf8_decode($_POST['telefonoAdicional']);
$celularAdicional = utf8_decode($_POST['celularAdicional']);
$correoAdicional = utf8_decode($_POST['correoAdicional']);
$charla = utf8_decode($_POST['charla']);
$mobiliario = utf8_decode($_POST['mobiliario']);
$cenefa = utf8_decode($_POST['cenefa']);
$comentario = utf8_decode($_POST['comentario']);


//echo $nombre;
if (($nombreComercial == "") || ($razonSocial == "") || ($giro == "")) {
    echo "2";
}
else {

    require_once("conecta_formularios.php");
    $test = conectar();

    $query = "INSERT INTO `inscripcion`
    (`nombreComercial`, `razonSocial`, `giro`, `rutEmpresa`, `direccion`, `telefono`, `sitioWeb`, `nombreEncargadoPago`, `telefonoEncargadoPago`, `correoEncargadoPago`, `participaComo`, `acepto`, `nombreRepresentante`, `telefonoRepresentante`, `celularRepresentante`, `correoRepresentante`, `nombreAdicional`, `telefonoAdicional`, `celularAdicional`, `correoAdicional`, `charla`, `mobiliario`, `cenefa`, `comentario`, `ip`) VALUES
    ('$nombreComercial', '$razonSocial', '$giro', '$rutEmpresa', '$direccion', '$telefono', '$sitioWeb', '$nombreEncargadoPago', '$telefonoEncargadoPago', '$correoEncargadoPago', '$participaComo', '$acepto', '$nombreRepresentante', '$telefonoRepresentante', '$celularRepresentante', '$correoRepresentante', '$nombreAdicional', '$telefonoAdicional', '$celularAdicional', '$correoAdicional', '$charla', '$mobiliario', '$cenefa', '$comentario', '$ip');";

    $respuesta = mysql_query($query);
    $fecha = date("d-m-Y");
    $hora = date("H:i");
    
    //===================MAIL==================================
      
        $message = "
        Se ha recibido un correo de Feria Laboral:

        \n";

        foreach ($_POST as $key => $value) {
                if (($value!="")&&($key!="g-recaptcha-response")) $message = $message.$key.": ".$value."\n";
        }

        $message = $message."

        Enviado de la web el $fecha a las $hora horas. (Fecha y hora del servidor.)
        ----------------------------- \n
        *Este mensaje es generado automaticamente por el sistema. Por Favor no responda a este mensaje.\n 
        ";
        
        $to      = "alvaro.romero@usach.cl";
        $subject = "Feria Laboral - Inscripción de Empresa";
        $message = $message;
        $headers = "From: ferialaboral@usach.cl";
     
        $subject = utf8_encode($subject);
        $message = $message;
        $headers = utf8_encode($headers);

        $respuesta2 = mail($to, $subject, $message, $headers);



    //==================FIN MAIL===============================

    //===================MAIL CONFIRMACION==================================

        $message = "
        Estimado/a, le informamos que sus datos se enviaron
        satisfactoriamente a Feria Laboral USACH 2017.
        Este es un resumen de los datos:
        \n";
        
        foreach ($_POST as $key => $value) {
                if (($value!="")&&($key!="g-recaptcha-response")) $message = $message.$key.": ".$value."\n";
        }
        
        $message = $message."

        Enviado de la web el $fecha a las $hora horas. (Fecha y hora del servidor.)
        ----------------------------- \n
        *Este mensaje es generado automaticamente por el sistema.
        Por Favor no responda a este mensaje.\n
        
        ";
        
        $to      = $correoRepresentante;
        $subject = "Feria Laboral - Inscripción de Empresa";
        $message = $message;
        $headers = "From: ferialaboral@usach.cl";
     
        $subject = utf8_encode($subject);
        $message = $message;
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
