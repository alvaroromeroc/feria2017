<?php
function conectar(){
$host = "localhost"; //host donde est� alojada la base de datos, generalmente es localhost
$mysql_user = "ferialaboral_usr"; //nombre de usuario de la base de datos, no es recomendable usar el root.
$mysql_password = "2mk5lDvjdsf423lvkf"; //password del usuario elegido anteriormente
$mysql_nombre = "ferialaboral"; //nombre de la base de datos actual


$link = mysql_connect($host, $mysql_user, $mysql_password); //conectamos a la base de datos, y guardamos la conexi�n 
  if (!$link) { //si da false, entonces decimos que no pudo conectar, sino no hace nada m�s.
      die('No se pudo conectar por el siguiente motivo: ' . mysql_error()); //detenemos el script con un mensaje, la funci�n mysql_error() muestra el error de la conexi�n
  }
 // else {echo"well done!";}
  
mysql_select_db($mysql_nombre, $link);
  
}

function desconectar(){ //falta poner la funci�n para obtener la conexi�n actual.
mysql_close($link);
}
?> 