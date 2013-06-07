<?php
include("conexion.php");
$latitud= -33.4611486;
$longitud = -70.6490136;
$hora_inicio = "10:00:00";
$hora_cierre = "23:00:00";

for ($aux=22; $aux<100; $aux++)
{
$rand = rand(0,1);
$rand2 = rand(1,30);
$randomcategoria = rand(1,20);
$randomedades = rand(1,45);

if ($rand == 0)
{
	$latitud = $latitud+($rand2/10000);
	$longitud = $longitud+($rand2/10000);
}
else {
	$latitud = $latitud-($rand2/10000);
	$longitud = $longitud-($rand2/10000);
	}
$itm_direccion = 'direccion'.$aux;
$itm_nombre = 'nombre'.$aux;

$con=mysql_connect($host,$user,$pass) or die ("problemas con servidor");
mysql_select_db($db,$con) or die("problemas con bd");

mysql_query("INSERT INTO itm_item (itm_id,itm_nombre,itm_direccion,itm_latitud,itm_longitud) VALUES 
		('$aux','$itm_nombre','$itm_direccion','$latitud','$longitud')",$con);
		echo "Usuario agregado correctamente <br>"; 
}
echo "Finalizado!!";
?>