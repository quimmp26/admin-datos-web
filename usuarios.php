<?php

    require_once("dbcontroller.php");
    $db_handle = new DBController();
    header("Content-Type: text/html;charset=utf-8");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admininstración</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles_admin.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b1dabce4a7.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo" for="">Administración Usuarios</label>
        <ul>
            <li><a href="admin.php">Productos</a></li>
            <li><a class="active" href="usuarios.php">Usuarios</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </nav>

    <section>
        <h1>USUARIOS</h1>
        <div id="scroll">
        <table class="content-table" >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nick</th>
                    <th>Contraseña</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Edad</th>
                    <th>Tlf.</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $product_array = $db_handle->runQuery("SELECT * FROM usuarios");
                foreach($product_array as $key=>$value){
                //$result=mysqli_query($con,$sql_select);
                //while ($valores = mysqli_fetch_array($result)) {  
            ?>
                <tr>
                    <th><?php echo $product_array[$key]["idUsuario"] ?></th>
                    <th><?php echo $product_array[$key]["nickname"] ?></th>
                    <th><?php echo $product_array[$key]["password"] ?></th>
                    <th><?php echo $product_array[$key]["fname"] ?></th>
                    <th><?php echo $product_array[$key]["lname"] ?></th>
                    <th><?php echo $product_array[$key]["email"] ?></th>
                    <th><?php echo $product_array[$key]["age"] ?></th>
                    <th><?php echo $product_array[$key]["phone"] ?></th>
                    <th><a href="views/edit_user.php?id=<?php echo $product_array[$key]['idUsuario']; ?>">Editar</a></th>
                    <th><a href="delete_user.php?id=<?php echo $product_array[$key]['idUsuario']; ?>">Eliminar</a></th>
                </tr>
            <?php
                }
            ?>

            </tbody>
        </table>
        </div>
    </section>
    <button type="button" class="btn btn-success btn-lg btn-block" onclick="location.href='views/add_user.php'">
        Añadir Usuario
    </button>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>


</html>