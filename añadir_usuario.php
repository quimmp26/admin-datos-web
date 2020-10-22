<?php 

    require_once("models/usuario.php");
    require_once("conexionbd.php");
    header("Content-Type: text/html;charset=utf-8");


    //Crear Objeto de la clase Usuario

    $objUsuario = new Usuario($_POST["nick"], $_POST["pass"], $_POST["fname"], $_POST["lname"], $_POST["mail"], $_POST["age"], $_POST["tlf"], $_POST["gender"]);
    
    //Comprobación de conexión
    $con=mysqli_connect($servidor,$usuario,$contraseña,$bd);
    if(!$con)
    {
	    die("No se ha podido realizar la conexión: ". mysqli_connect_error() . "<br>");
    }
    else
    {
        mysqli_set_charset($con,"utf8");
        echo "Conexion exitosa!";
    }

    //Comprobar si existe el usuario

    $sql_select = "select count(*) as rows from usuarios where nick = '".$objUsuario->getNickname()."'";
    $res = mysqli_query($con, $sql_select);
    $datos = mysqli_fetch_assoc($res);

    if($datos['rows'] == 0) 
    {
        $sql_insert = "insert into usuarios values ('".$objUsuario->getNickname()."', '".$objUsuario->getPassword()."', '".$objUsuario->getFname()."', '".$objUsuario->getLname()."', '".$objUsuario->getEmail()."',".$objUsuario->getAge().", ".$objUsuario->getTlf().", '".$objUsuario->getGender()."')";

        $consulta=mysqli_query($con,$sql_insert);
        if(!$consulta)
        {
            die("Registro fallido!");
        }
        else
        {
            echo "Usuario añadido!";
        }
    }
    else 
    {
        echo "El nick ".$objUsuario->getNickname()." no esta disponible!";
    } 

  
    
    /*$objUsuario->validarNick($_POST["nick"]);
    $objUsuario->validarPass($_POST["pass"]);
    $objUsuario->validarNombre($_POST["fname"]);
    $objUsuario->validarApellido($_POST["lname"]);
    $objUsuario->validarEmail($_POST["mail"]);
    $objUsuario->ValidarEdad($_POST["age"]);
    $objUsuario->validarTlf($_POST["tlf"]);
    $objUsuario->validarGenero($_POST["gender"]);*/

  
    

?>