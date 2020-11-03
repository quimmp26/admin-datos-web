<?php

require_once("conexionbd.php");
   	
header("Content-Type: text/html;charset=utf-8");

	$producto = $_POST["producto"];
    $descripcion = $_POST["descrip"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $imagen = $_POST["img"];


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
	$instruccion = "select count(*) as 'rows' from productos where producto = '$producto'";
	$res = mysqli_query($con, $instruccion);
	$datos = mysqli_fetch_assoc($res);
	
	if ($datos['rows'] == 0)
	{
        $instruccion = "insert into productos (producto, descripcion, precio, stock, imagen) values ('$producto','$descripcion',$precio, $stock, '$imagen')";
		$res = mysqli_query($con, $instruccion);
		if (!$res) 
		{
			die("No se ha podido añadir el producto");
		}
		else
		{
			echo "<script>alert('Producto añadido correctamente');</script>";
			include("admin.php");
		}
	}
	else
	{
        echo "El producto $producto ya está registrado";
	}



?>