<?php

require_once("../conexionbd.php");
   	
//header("Content-Type: text/html;charset=utf-8");
//require_once("views/add_view.php");

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
            header("Location: ../admin.php");
		}
		else
		{
			echo "<script>alert('Producto añadido correctamente');</script>";
			header("Location: ../admin.php");
		}
	}
	else
	{
        echo "El producto $producto ya está registrado";
	}
}



?>

	


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
        
<form class="text-center border border-light p-5" id="form_add" method="POST">
        <p class="h4 mb-4">Añadir Producto</p>
        <!-- Name -->
        <input type="text" name="producto" class="form-control mb-4" placeholder="Producto" required>
        <!-- Codigo -->
        <input type="text" name="codigo" class="form-control mb-4" placeholder="Codigo" required >
        <!-- Precio -->
        <input type="number" name="precio" class="form-control mb-4" placeholder="Precio" required step=".01">
        <!-- Imagen -->
        <input type="text" name="img" class="form-control mb-4" placeholder="Imagen" required>
        <!-- Categoria -->
        <input type="text" name="cat" class="form-control mb-4" placeholder="Categoria" required>
        <!-- Sign in button -->
        <input class="btn btn-info btn-block" type="submit" name="add" value="Añadir">
</form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b1dabce4a7.js" crossorigin="anonymous"></script>
</body>
</html>