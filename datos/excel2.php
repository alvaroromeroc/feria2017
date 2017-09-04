<?php
require_once("conecta_formularios.php");
$test = conectar();

$record = $_GET['id'];
if (is_numeric($record)){
	$sql = "SELECT * FROM `inscripcion` WHERE `id` = ".$record.";";
	$result = mysql_query($sql);
}
else{
	echo "Error ID Invalido";
}
?>

<?php
while(
	$row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$nombreComercial = utf8_encode($row['nombreComercial']);
		$razonSocial = utf8_encode($row['razonSocial']);
		$giro = utf8_encode($row['giro']);
		$rutEmpresa = utf8_encode($row['rutEmpresa']);
		$direccion = utf8_encode($row['direccion']);
		$telefono = utf8_encode($row['telefono']);
		$sitioWeb = utf8_encode($row['sitioWeb']);
		$nombreEncargadoPago = utf8_encode($row['nombreEncargadoPago']);
		$telefonoEncargadoPago = utf8_encode($row['telefonoEncargadoPago']);
		$correoEncargadoPago = utf8_encode($row['correoEncargadoPago']);
		$participaComo = utf8_encode($row['participaComo']);
		$acepto = utf8_encode($row['acepto']);
		$nombreRepresentante = utf8_encode($row['nombreRepresentante']);
		$telefonoRepresentante = utf8_encode($row['telefonoRepresentante']);
		$celularRepresentante = utf8_encode($row['celularRepresentante']);
		$correoRepresentante = utf8_encode($row['correoRepresentante']);
		$nombreAdicional = utf8_encode($row['nombreAdicional']);
		$telefonoAdicional = utf8_encode($row['telefonoAdicional']);
		$celularAdicional = utf8_encode($row['celularAdicional']);
		$correoAdicional = utf8_encode($row['correoAdicional']);
		$charla = utf8_encode($row['charla']);
		$mobiliario = utf8_encode($row['mobiliario']);
		$cenefa = utf8_encode($row['cenefa']);
		$comentario = utf8_encode($row['comentario']);
}

mysql_free_result($result); //Libero el resultado de la consulta

mysql_close($IdConexion);  //Cierras la Conexión

?>
<html>
<head>
	<style type="text/css">
		p {font-family: Arial; font-size: 13px;}
		h3 {font-family: Arial; font-size: 15px;}
	</style>
</head>
<body>
	<center>
		<h3>Formulario Único de Postulación a Programa de MBA<br />Universidad de Santiago de Chile</h3>
	</center>
	<h3>Datos Personales</h3>
<p><strong>Nombre Comercial</strong>: <?=$nombreComercial?></p>
<p><strong>Razón Social</strong>: <?=$razonSocial?></p>
<p><strong>Giro</strong>: <?=$giro?></p>
<p><strong>RUT</strong>: <?=$rutEmpresa?></p>
<p><strong>Dirección</strong>: <?=$direccion?></p>
<p><strong>Teléfono</strong>: <?=$telefono?></p>
<p><strong>Sitio Web</strong>: <?=$sitioWeb?></p>
<hr/>
<p><strong>Encargado de Pago</strong>: <?=$nombreEncargadoPago?></p>
<p><strong>Teléfono Encargado de Pago</strong>: <?=$telefonoEncargadoPago?></p>
<p><strong>Correo Encargado de Pago</strong>: <?=$correoEncargadoPago?></p>
<p><strong>Su empresa participa como</strong>: <?=$participaComo?></p>
<p><strong>Declaro haber leído las Bases de la Feria Laboral</strong>: <?=$acepto?></p>
<hr/>
<p><strong>Representante de la Empresa</strong>: <?=$nombreRepresentante?></p>
<p><strong>Teléfono Directo Representante</strong>: <?=$telefonoRepresentante?></p>
<p><strong>Teléfono Celular Representante</strong>: <?=$celularRepresentante?></p>
<p><strong>Correo Representante</strong>: <?=$correoRepresentante?></p>
<hr/>
<p><strong>Representante Adicional de la Empresa</strong>: <?=$nombreAdicional?></p>
<p><strong>Teléfono Directo Representante Adicional</strong>: <?=$telefonoAdicional?></p>
<p><strong>Teléfono Celular Representante Adicional</strong>: <?=$celularAdicional?></p>
<p><strong>Correo Representante Adicional</strong>: <?=$correoAdicional?></p>
<hr/>
<p><strong>¿Su Empresa dictará charla?</strong>: <?=$charla?></p>
<p><strong>Cómo equipará su módulo</strong>: <?=$mobiliario?></p>
<p><strong>Nombre para Cenefa del Módulo</strong>: <?=$cenefa?></p>
<p><strong>Comentario</strong>: <?=$comentario?></p>


</body>
</html>
