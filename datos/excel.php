<?php
$pass = $_GET['pass'];
if ($pass==1983){
//Exportar datos de php a Excel
if(isset($_GET['bajar'])){
  header("Content-Type: application/vnd.ms-excel");
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("content-disposition: attachment;filename=Reportes.xls");
}
?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
<meta charset="utf-8">
<style>
table{
  font-family: Arial;
  font-size: 13px;
}
td{
  padding: 1px 3px;
}
.head {
  text-align: center;
  font-weight: 700;
}
</style>
</head>
<body>
<?php
    require_once("conecta_formularios.php");
    $test = conectar();

$sql = "SELECT * FROM `inscripcion`";
$result = mysql_query($sql);

?>

<table border="1" align="center" cellpadding=0 cellspacing=0>
<tr class="head">
  <td>Id</td><td>&nbsp;</td><td>Empresa</td><td>Encargado pago</td><td>Teléfono encargado pago</td><td>Correo encargado pago</td><td>Fecha</td>
</tr>

<?php

while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
  $cadena = "<tr><td><a href=\"excel2.php?id=".$row['id']."\">".$row['id']."</a></td><td>".utf8_encode($row['participaComo'])."</td><td><a href=\"excel2.php?id=".$row['id']."\">".utf8_encode($row['nombreComercial'])."</a></td><td>".utf8_encode($row['nombreEncargadoPago'])."</td><td>+56 ".utf8_encode($row['telefonoEncargadoPago'])."</td><td>".utf8_encode($row['correoEncargadoPago'])."</td><td>".utf8_encode($row["hora"])."</td></tr>";
  echo $cadena;
}

mysql_free_result($result); //Libero el resultado de la consulta

mysql_close($IdConexion);  //Cierras la Conexión
?>
</table>
</body>
</html>
<?php
}
?>