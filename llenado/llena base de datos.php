<?php
include("conexion.php");

$con=mysql_connect($host,$user,$pass) or die ("problemas con servidor");
mysql_select_db($db,$con) or die("problemas con bd");

$consulta_id = mysql_query("SELECT * FROM usr_usuarios",$con);

while ($fila_id=mysql_fetch_array($consulta_id)) {

$fila=mysql_fetch_array($consulta_id);
$usr_id = $fila['usr_id'];

$rand_NumCalificaciones = rand(1,10);

for($aux_for=1; $aux_for <= $rand_NumCalificaciones; $aux_for++)
{
	$rand_califica = rand(0,1);
	

	if($rand_califica == 1)
		{
			$rand_item = rand(1,99);
			$rand_nota = rand(0,5);
			
			mysql_query("INSERT INTO itm_calificacion (usr_id,itm_id,cal_nota) VALUES 
				('$usr_id','$rand_item','$rand_nota')",$con);

			echo "Usuario agregado correctamente <br>"; 
		}
}
}

?>