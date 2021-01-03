<?php

require_once("../conexionbd.php");
   	
//header("Content-Type: text/html;charset=utf-8");
//require_once("views/add_view.php");

if(isset($_POST['add'])) {

	$nick = $_POST['nick'];
	$pass = $_POST['pass'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $admin = $_POST['admin'];

		//Inserción de datos
	
	//Primero compruebo si el nick existe
	$instruccion = "select count(*) as 'rows' from usuarios where nickname = '$nick'";
	$res = mysqli_query($con, $instruccion);
	$datos = mysqli_fetch_assoc($res);
	
	if ($datos['rows'] == 0)
	{
        $instruccion = "insert into usuarios (nickname, password, fname, lname, email, age, phone, admin) values ('$nick','$pass','$fname', '$lname', '$email', $age, $phone, $admin)";
		$res = mysqli_query($con, $instruccion);
		if (!$res) 
		{
            die("No se ha podido añadir el usuario");
            header("Location: ../usuarios.php");
		}
		else
		{
			echo "<script>alert('Usuario añadido correctamente');</script>";
			header("Location: ../usuarios.php");
		}
	}
	else
	{
        echo "El usuario $nick ya está registrado";
	}
}



?>

	


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
        
<form class="text-center border border-light p-5" id="form_add" method="POST">
        <p class="h4 mb-4">Añadir Usuario</p>
        <!-- Nick -->
        <input type="text" name="nick" class="form-control mb-4" placeholder="Nick" required>
        <!-- Pass -->
        <input type="text" name="pass" class="form-control mb-4" placeholder="Contraseña" required >
        <!-- Name -->
        <input type="text" name="fname" class="form-control mb-4" placeholder="Nombre" required>
        <!-- Last Name -->
        <input type="text" name="lname" class="form-control mb-4" placeholder="Apellido" required>
        <!-- Email -->
        <input type="email" name="email" class="form-control mb-4" placeholder="Email" required>
        <!-- Age -->
        <input type="number" name="age" class="form-control mb-4" placeholder="Edad" required>
         <!-- Phone -->
        <input type="number" name="phone" class="form-control mb-4" placeholder="Tlf." required>
          <!-- Admin -->
        <select class="custom-select form-control mb-4" id="inputGroupSelect01" name="admin" required>
            <option value="1">Admin</option>
            <option selected value="0">Estándar</option>
        </select>
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