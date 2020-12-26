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
        <label class="logo" for="">Administración Productos</label>
        <ul>
            <li><a class="active" href="#">Productos</a></li>
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
                    <th>Codigo</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Imagen</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $product_array = $db_handle->runQuery("SELECT * FROM tblproduct");
                foreach($product_array as $key=>$value){
                //$result=mysqli_query($con,$sql_select);
                //while ($valores = mysqli_fetch_array($result)) {  
            ?>
                <tr>
                    <th><?php echo $product_array[$key]["id"] ?></th>
                    <th><?php echo $product_array[$key]["name"] ?></th>
                    <th><?php echo $product_array[$key]["code"] ?></th>
                    <th><?php echo $product_array[$key]["price"] ?></th>
                    <th><?php echo $product_array[$key]["category"] ?></th>
                    <th><img class="imgProd" src="<?php echo $product_array[$key]["image"] ?>"></th>
                    <th><a href="edit.php?id=<?php echo $product_array[$key]['id']; ?>">Editar</a></th>
                    <th><a href="delete.php?id=<?php echo $product_array[$key]['id']; ?>">Eliminar</a></th>
                </tr>
            <?php
                }
            ?>

            </tbody>
        </table>
        </div>
    </section>
    <button type="button" class="btn btn-success btn-lg btn-block" onclick="location.href='add.php'">
        Añadir Producto
    </button>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>


</html>