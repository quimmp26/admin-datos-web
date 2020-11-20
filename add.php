<?php

require_once("conexionbd.php");
   	
//header("Content-Type: text/html;charset=utf-8");
require_once("views/add_view.php");

if(isset($_POST['add'])) {


	$producto = $_POST["producto"];
    $descripcion = $_POST["descrip"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $imagen = $_POST["img"];

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
}



?>

	



