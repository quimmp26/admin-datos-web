<?php

require_once("conexionbd.php");
   	
//header("Content-Type: text/html;charset=utf-8");
require_once("views/add_view.php");

if(isset($_POST['add'])) {
	
	$producto = $_POST['producto'];
	$codigo = $_POST['codigo'];
	$precio = $_POST['precio'];
	$img = $_POST['img'];
	$categoria = $_POST['cat'];

		//Inserción de datos
	
	//Primero compruebo si el nick existe
	$instruccion = "select count(*) as 'rows' from tblproduct where name = '$producto'";
	$res = mysqli_query($con, $instruccion);
	$datos = mysqli_fetch_assoc($res);
	
	if ($datos['rows'] == 0)
	{
        $instruccion = "insert into tblproduct (name, code, image, price, category) values ('$producto','$codigo','$img', $precio, '$categoria')";
		$res = mysqli_query($con, $instruccion);
		if (!$res) 
		{
			die("No se ha podido añadir el producto");
		}
		else
		{
			echo "<script>alert('Producto añadido correctamente');</script>";
			header("Location: admin.php");
		}
	}
	else
	{
        echo "El producto $producto ya está registrado";
	}
}



?>

	



