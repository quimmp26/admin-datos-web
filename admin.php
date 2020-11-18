<?php

    require_once("conexionbd.php");
    header("Content-Type: text/html;charset=utf-8");
    require_once("header.php");
?>

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
                    <th>Editar</th>
                    <th>Eliminar</th>
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
                    <th><a href="edit.php?id=<?php echo $valores['idProducto']; ?>">Editar</a></th>
                    <th><a href="delete.php?id=<?php echo $valores['idProducto']; ?>">Eliminar</a></th>
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