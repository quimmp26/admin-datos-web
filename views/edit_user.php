<?php

    require_once("../conexionbd.php");

    $id = $_GET['id'];
    $qry = mysqli_query($con, "select * from usuarios where idUsuario='$id'");
    $data = mysqli_fetch_array($qry);

    if(isset($_POST['update'])) {

        $nick = $_POST['nick'];
        $pass = $_POST['pass'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $admin = $_POST['admin'];
    
        $edit = mysqli_query($con,"update usuarios set idUsuario='$id', password='$pass', fname='$fname', lname='$lname', email='$email', age='$age', phone='$phone', admin='$admin' where idUsuario=$id");
        echo $edit;
        if($edit) {
            mysqli_close($con);
            header("location: ../usuarios.php");
            exit;
            
        }else {
            echo mysqli_error();
        }
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <form class="text-center border border-light p-5" id="form_edit" method="POST">
        <p class="h4 mb-4">Editar Usuario</p>
        <!-- Nick -->
        <input type="text" name="nick" class="form-control mb-4" placeholder="Nick" required value="<?php echo $data["nickname"] ?>">
        <!-- Pass -->
        <input type="text" name="pass" class="form-control mb-4" placeholder="Contraseña" required value="<?php echo $data["password"] ?>">
        <!-- Name -->
        <input type="text" name="fname" class="form-control mb-4" placeholder="Nombre" required value="<?php echo $data["fname"] ?>">
        <!-- Last Name -->
        <input type="text" name="lname" class="form-control mb-4" placeholder="Apellido" required value="<?php echo $data["lname"] ?>">
        <!-- Email -->
        <input type="email" name="email" class="form-control mb-4" placeholder="Email" required value="<?php echo $data["email"] ?>">
        <!-- Age -->
        <input type="number" name="age" class="form-control mb-4" placeholder="Edad" required value="<?php echo $data["age"] ?>">
         <!-- Phone -->
        <input type="number" name="phone" class="form-control mb-4" placeholder="Tlf." required value="<?php echo $data["phone"] ?>">
          <!-- Admin -->
        <select class="custom-select form-control mb-4" id="inputGroupSelect01" name="admin" required value="<?php echo $data["admin"] ?>">
            <?php if($data["admin"] == 0) { ?>
            <option value="1">Admin</option>
            <option selected value="0">Estándar</option>
            <?php } else { ?>
            <option selected value="1">Admin</option>
            <option value="0">Estándar</option>
            <?php }?>
        </select>
        <!-- Sign in button -->
        <input class="btn btn-info btn-block" type="submit" name="update" value="Editar">
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>