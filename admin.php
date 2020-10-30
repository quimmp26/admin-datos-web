<?php

    require_once("conexionbd.php");
    header("Content-Type: text/html;charset=utf-8");

    $con = mysqli_connect($servidor, $usuario, $contraseña, $bd) or die(mysql_error());

    if (!$con)
    {
        die("No se ha podido realizar la corrección ERROR:" . mysqli_connect_error() . "<br>");
        require_once("index.html");
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles_admin.css">
    <script src="https://kit.fontawesome.com/b1dabce4a7.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo" for="">Administración Productos</label>
        <ul>
            <li><a class="active" href="#">ADMIN</a></li>
            <li><a href="#">PEFIL</a></li>
            <li><a href="#">CONFIGURACIÓN</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </nav>
    <section>
        <h1>Productos</h1>
        <table class="content-table">
            <thead>
                <tr>
                    <th>IdProducto</th>
                    <th>Producto</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql_select = "select * from productos";
                $result=mysqli_query($con,$sql_select);
                while ($valores = mysqli_fetch_array($result)) {  
            ?>

                <tr>
                    <th><?php echo $valores["idProducto"] ?></th>
                    <th><?php echo $valores["producto"] ?></th>
                    <th><?php echo $valores["descripcion"] ?></th>
                    <th><?php echo $valores["precio"] ?></th>
                    <th><?php echo $valores["stock"] ?></th>
                    <th><img class="imgProd" src="<?php echo $valores["imagen"] ?>"></th>
                </tr>
            <?php
                }
            ?>

            </tbody>
        </table>
    </section>
    <div class="main-container">
        <h2>¿Que accion desea realizar?</h2>
        <div class="radio-buttons">
            <label class="custom-radio" onclick="location.href='añadir_usuario.html'">
                <input type="radio" name="radio" >
                <span class="radio-btn"><i class="fas fa-check"></i>
                    <div class="options-icon">
                        <i class="fas fa-user-plus"></i>
                        <h3>Añadir Producto</h3>
                    </div> 
                </span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="radio">
                <span class="radio-btn"><i class="fas fa-check"></i>
                    <div class="options-icon">
                        <i class="fas fa-user-edit"></i>
                        <h3>Editar Producto</h3>
                    </div> 
                </span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="radio">
                <span class="radio-btn"><i class="fas fa-check"></i>
                    <div class="options-icon">
                        <i class="fas fa-user-times"></i>
                        <h3>Eliminar Producto</h3>
                    </div> 
                </span>
            </label>

        </div>
    </div>
</body>
</html>