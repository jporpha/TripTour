<?php
session_start();
include("conexion.php");

if( isset($_POST['Email']) && !empty($_POST['Email']) &&
	isset($_POST['Password']) && !empty($_POST['Password']))
	{
		$con=mysql_connect($host,$user,$pass) or die ("problemas con servidor");
		mysql_select_db($db,$con) or die("problemas con bd");
		
		//Consutla si es que los datos del usuario son validos
		$sel=mysql_query("SELECT usr_mail,usr_pass FROM usr_usuarios WHERE usr_mail='$_POST[Email]'",$con);
	
		$sesion=mysql_fetch_array($sel);

		if($_POST['Password'] == $sesion['usr_pass'])
			{
				$_SESSION['usr_mail']=$_POST['Email'];
				echo "sesion exitosa";
?>
				<script type='text/javascript'>
				window.onload=function()
					{
						parent.window.location='home.html';
						return true;
					};
				</script>
<?php
			}else
			{
?>
				<script type='text/javascript'>
				window.onload=function()
					{
						parent.window.location='index.html';
						alert ('Combinacion erronea');
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
						parent.window.location='index.html';
						alert ('Debes llenar ambos campos');
						return true;
					};
				</script>
<?php
	}
?>
