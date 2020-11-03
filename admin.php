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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
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
        <div id="scroll">
        <table class="content-table" >
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
        </div>
    </section>
    <div class="main-container">
        <h2>¿Que accion desea realizar?</h2>
        <div class="radio-buttons">
             <label class="custom-radio" onclick="mostrarFormAdd()">  <!-- onclick="location.href='añadir_usuario.html' -->
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

    <!-- Add form -->
    <form class="text-center border border-light p-5" action="anadir_producto.php" id="form_add" method="POST">

    <p class="h4 mb-4">Añadir Producto</p>

    <!-- Name -->
    <input type="text" name="producto" id="" class="form-control mb-4" placeholder="Producto" required>

    <!-- Descripcion -->
    <textarea name="descrip" class="form-control mb-4" cols="30" rows="10" placeholder="Introduce una descripcion del producto..." required></textarea>
   
    <!-- Precio -->
    
    <input type="number" name="precio" id="" class="form-control mb-4" placeholder="Precio" required>

     <!-- Precio -->
    
    <input type="number" name="stock" id="" class="form-control mb-4" placeholder="Stock" required>

    <!-- Imagen -->

    <input type="text" name="img" id="" class="form-control mb-4" placeholder="Imagen" required>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block" type="submit">AÑADIR</button>


    </form>

    <script src="js/actions.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>


</html>