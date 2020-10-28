<?php
    
    require_once("conexionbd.php");
	
    session_start();

    header("Content-Type: text/html;charset=utf-8");

	$nick = $_POST["login"];
	$password = $_POST["password"];

	$con = mysqli_connect($servidor, $usuario, $contraseña, $bd) or die(mysql_error());
	
	if (!$con)
	{
        die("No se ha podido realizar la corrección ERROR:" . mysqli_connect_error() . "<br>");
        require_once("index.html");
	}
	else
	{
		mysqli_set_charset ($con, "utf8");
		echo "Se ha conectado a la base de datos" . "<br>";
	}
	
	$sql_select = "select count(*) as rows from usuarios where nickname = '$nick'";
	$resultado = mysqli_query($con, $sql_select);
		while ($fila = $resultado->fetch_assoc()) {
		$numero=$fila["rows"];
	}
	if($numero==0){
        echo "El usuario no existe";
        require_once("index.html");
	}
	else{
        $sql_select2 = "select password as rows from usuarios where nickname = '$nick'";
        $resultado = mysqli_query($con, $sql_select2);

        while ($fila = $resultado->fetch_assoc()) {
            $password2=$fila["rows"];
        }
        

        if (!strcmp($password2 , $password) == 0){
                echo "Contraseña incorrecta";
                require_once("index.html");
        }
        
        else{
            $_SESSION["nick_logueado"]=$nick;
            $sql_admin = "select admin from usuarios where nickname = '$nick'";
            $resultado = mysqli_query($con, $sql_admin);

            while ($fila = $resultado->fetch_assoc()) {
                $admin=$fila["admin"];
            }
            if($admin == 1){
                require_once("admin.html");
            }else {
                echo "Usuari comun, vete a coger ciricoles";
            }
        
        }
    }
	
	
	





?>