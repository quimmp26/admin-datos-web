<?php

require_once("conexionbd.php");
   	
header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["nick"]))
{
	$nick = $_POST["nick"];
    $password = $_POST["password"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];

	$con = mysqli_connect($servidor, $usuario, $contraseña, $bd) or die(mysql_error());
	
	if (!$con)
	{
		die("No se ha podido realizar la corrección ERROR:" . mysqli_connect_error() . "<br>");
	}
	
	else
	{
		mysqli_set_charset ($con, "utf8");
		echo "Se ha conectado a la base de datos"."<br>";
	}
	
	//Inserción de datos
	
	//Primero compruebo si el nick existe
	$instruccion = "select count(*) as 'rows' from usuarios where nickname = '$nick'";
	$res = mysqli_query($con, $instruccion);
	$datos = mysqli_fetch_assoc($res);
	
	if ($datos['rows'] == 0)
	{
		$instruccion = "insert into usuarios (nickname, password, fname, lname, email, age, phone, admin) values ('$nick','$password','$fname', '$lname', '$email', $age, $phone, 0)";
		$res = mysqli_query($con, $instruccion);
		if (!$res) 
		{
			die("No se ha podido crear el usuario");
		}
		else
		{
			echo "Usuario creado";
			//me lleva al login para que pruebe mi contraseña
			echo "<script>alert('Usuario creado correctamente');</script>";
			
			$_SESSION["nick_logueado"]=$nick;
            $sql_admin = "select admin from usuarios where nickname = '$nick'";
            $resultado = mysqli_query($con, $sql_admin);

            while ($fila = $resultado->fetch_assoc()) {
                $admin=$fila["admin"];
            }
            if($admin == 1){
                require_once("admin.php");
            }else {
                echo "Usuari comun, vete a coger ciricoles";
            }
		}
	}
	else
	{
        echo "El nick $nick no está disponible";
        include_once("registro.html");
	}

}
else 
{
	echo ("ERROR: No se puede introducir un nick en blanco");
}
?>