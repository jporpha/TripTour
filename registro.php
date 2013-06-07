<?php
include ("conexion.php");

//Para recivir los datos por post
$mail = $_POST['mail'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$sexo = $_POST['sexo'];
$fecha = $_POST['fecha'];
$edad = $_POST['edad'];
$password = $_POST['pass'];
$conf_pass = $_POST['conf_pass'];
$nacionalidad = $_POST['nacionalidad'];

//Rango de edad
if (12<=$edad && $edad<=14)
{
	$id_grupo = 1;
	}
elseif (15<=$edad && $edad<=18)
{
	$id_grupo = 2;
	}
elseif (19<=$edad && $edad<=22)
{
	$id_grupo = 3;
	}
elseif (23<=$edad && $edad<=26)
{
	$id_grupo = 4;
	}
elseif (27<=$edad && $edad<=30)
{
	$id_grupo = 5;
	}
elseif (31<=$edad && $edad<=34)
{
	$id_grupo = 6;
	}
elseif (35<=$edad && $edad<=38)
{
	$id_grupo = 7;
	}
elseif (39<=$edad && $edad<=42)
{
	$id_grupo = 8;
	}
elseif (43<=$edad && $edad<=46)
{
	$id_grupo = 9;
	}
elseif (47<=$edad && $edad<=50)
{
	$id_grupo = 10;
	}
elseif (51<=$edad && $edad<=54)
{
	$id_grupo = 11;
	}
elseif (55<=$edad && $edad<=58)
{
	$id_grupo = 12;
	}
elseif (59<=$edad && $edad<=62)
{
	$id_grupo = 13;
	}
elseif (63<=$edad && $edad<=66)
{
	$id_grupo = 14;
	}
elseif (67<=$edad && $edad<=70)
{
	$id_grupo = 15;
	}
elseif (71<=$edad && $edad<=74)
{
	$id_grupo = 16;
	}
elseif (75<=$edad && $edad<=78)
{
	$id_grupo = 17;
	}

//Hombre Mujer
if ($sexo == "mujer")
	{
		$id_grupo=$id_grupo+17;
		$sexo = "F";
	}else 
	{
		$sexo = "M";
	}

//if comprueba que todos los campos sean llenados	
if( isset($_POST['mail']) && !empty($_POST['mail']) && 
	isset($_POST['nombre']) && !empty($_POST['nombre']) && 
	isset($_POST['apellido']) && !empty($_POST['apellido']) && 
	isset($_POST['fecha']) && !empty($_POST['fecha']) && 
	isset($_POST['edad']) && !empty($_POST['edad'])&&
	isset($_POST['nacionalidad']) && !empty($_POST['nacionalidad']))
	{
		if ($password != $conf_pass) {
	?>
				<script type='text/javascript'>
				window.onload=function()
					{
						parent.window.location='registrarme.html';
						alert ('Password no coinciden');
						return true;
					};
				</script>
<?php
	
}else{
	$con=mysql_connect($host,$user,$pass,$db) or die ("problemas coneccion");
		mysql_select_db($db,$con)or die("problemas coneccion bd");
		
		//Guardo los datos del nuevo usuario
		mysql_query("INSERT INTO usr_usuarios (usr_mail,usr_nombre,usr_apellido,usr_sexo,usr_fecha_nacimiento,usr_edad,usr_nacionalidad,usr_pass,usr_grupo) VALUES 
		('$mail','$nombre','$apellido','$sexo','$fecha','$edad','$nacionalidad','$password','$id_grupo')",$con);
		
		?>
				<script type='text/javascript'>
				window.onload=function()
					{
						parent.window.location='index.html';
						alert ('Usuario agregado exitosamente');
						return true;
					};
				</script>
<?php
}

		
	}else
	{
		?>
				<script type='text/javascript'>
				window.onload=function()
					{
						parent.window.location='registrarme.html';
						alert ('Llene todos los campos');
						return true;
					};
				</script>
<?php
	}

?>