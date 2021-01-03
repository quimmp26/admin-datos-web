<?php

header("Content-disposition: attachment; filename=report.xml");
header("Content-type: application/xml");
readfile("report.xml");

session_start();
require_once("dbcontroller.php");
$usuario = $_SESSION["nick_logueado"];
$db_handle = new DBController();
$filtrar = false;
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"], 'category'=>$productByCode[0]['category']));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}

?>
<HTML>
<HEAD>
<TITLE>Tienda TechIt</TITLE>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles_shop.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
		<a class="navbar-brand" href="#">Tech It</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Tienda
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="perfil.php?user=<?php echo $usuario; ?>">Mi perfil</a>
			</li>
			<li class="nav-item">
				<!-- <a class="nav-link" href="logout.php">Desconectarse</a> -->
				<a class="nav-link" href="logout.php" onclick="return confirm('Seguro que quieres desconectarte?');">Desconectarse</a>
			</li>
			</ul>
		</div>
		</div>
		
	</nav>

<div id="shopping-cart" class="pt-5">
<h6 class="text-center" style="color: #FF9882; font-weight: bold; text-align: end;"><?php echo "Bienvenido ". $usuario . "!"; ?></h6>
	<div class="txt-heading">Tu carrito</div>

	<a id="btnEmpty" href="catalogo2.php?action=empty">Vaciar carrito</a>
	<?php
	if(isset($_SESSION["cart_item"])){
		$total_quantity = 0;
		$total_price = 0;
	?>	
	<table class="tbl-cart" cellpadding="10" cellspacing="1">
	<tbody>
	<tr>
	<th style="text-align:left;">Producto</th>
	<th style="text-align:left;">Codigo</th>
	<th style="text-align:right;" width="5%">Cantidad</th>
	<th style="text-align:right;" width="10%">Precio Unidad</th>
	<th style="text-align:right;" width="10%">Precio</th>
	<th style="text-align:right;" width="10%">Categoria</th>
	<th style="text-align:center;" width="5%">Eliminar</th>
	</tr>	
	<?php		
		foreach ($_SESSION["cart_item"] as $item){
			$item_price = $item["quantity"]*$item["price"];
			?>
					<tr>
					<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
					<td><?php echo $item["code"]; ?></td>
					<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
					<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
					<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
					<td  style="text-align:right;"><?php echo $item["category"]; ?></td>
					<td style="text-align:center;"><a href="catalogo2.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="img/icon-delete.png" alt="Remove Item" /></a></td>
					</tr>
					<?php
					$total_quantity += $item["quantity"];
					$total_price += ($item["price"]*$item["quantity"]);
			}
			?>

	<tr>
	<td colspan="2" align="right">Total:</td>
	<td align="right"><?php echo $total_quantity; ?></td>
	<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
	<td></td>
	<td></td>
	</tr>
	</tbody>
	</table>		
	<?php
	} else {
	?>
	<div class="no-records">Tu carrito esta vacio.</div>
	<?php 
	}
?>
</div>


<form method="POST" class="pt-5">
    <div class="list-group">
    	<button type="submit" class="list-group-item" name="all">Todas las categorias</button>
        <button type="submit" class="list-group-item" name="smartphones">Smartphones</button>
        <button type="submit" class="list-group-item" name="portatiles">Portátiles</button>
        <button type="submit" class="list-group-item" name="monitores">Monitores</button>
		<button type="submit" class="list-group-item" name="fotografia">Fotografía</button>
		<button type="submit" class="list-group-item" name="componentes">Componentes</button>
		<button type="submit" class="list-group-item" name="relojes">Relojes</button>
    </div>
</form>

<div id="product-grid">
	<div class="txt-heading">Productos</div>
	<br>
		<form method="post" >
		<div class="btn-group" role="group">
			<div class="dropdown mr-3 ">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Ordenar Por
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<input type="submit" name="precio+" value="Precio: Mas caros primero" class="dropdown-item"/>
					<input type="submit" name="precio-" value="Precio: Mas baratos primero" class="dropdown-item"/>
				</div>
			</div>
			<div class="dropdown ">
				<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Exportar
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<input type="submit" name="xml" value="XML" class="dropdown-item"/>
					<input type="submit" name="excel" value="Excel" class="dropdown-item"/>
				</div>
			</div>
		</div>
		</form>
	<?php
        if(isset($_POST['all'])){
            $filtrar = false;
        }
        if(isset($_POST['smartphones'])){
        	$filtrar = true;
			$product_array = $db_handle->runQuery("SELECT * FROM tblproduct WHERE category='Smartphones'");
        }
        if(isset($_POST['portatiles'])){
            $filtrar = true;
			$product_array = $db_handle->runQuery("SELECT * FROM tblproduct WHERE category='Portatiles'");
        }
        if(isset($_POST['monitores'])){
            $filtrar = true;
			$product_array = $db_handle->runQuery("SELECT * FROM tblproduct WHERE category='Monitores'");
        }
        if(isset($_POST['fotografia'])){
            $filtrar = true;
			$product_array = $db_handle->runQuery("SELECT * FROM tblproduct WHERE category='Fotografia'");
		}
		if(isset($_POST['componentes'])){
            $filtrar = true;
			$product_array = $db_handle->runQuery("SELECT * FROM tblproduct WHERE category='Componentes'");
		}
		if(isset($_POST['relojes'])){
            $filtrar = true;
			$product_array = $db_handle->runQuery("SELECT * FROM tblproduct WHERE category='Relojes'");
		}
		if(isset($_POST['precio-'])) { 
			$filtrar = true;
			$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY price ASC");
		}
		if(isset($_POST['precio+'])) { 
			$filtrar = true;
			$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY price DESC");
		}
		if($filtrar === false) {
			$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
		}	
	//$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="catalogo2.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" style="max-width: 100%"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Añadir al carrito" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}

	if(isset($_POST['xml'])){
		$xml = new DOMDocument("1.0"); 
  
		$xml->formatOutput=true;  
		$fitness=$xml->createElement("productos"); 
		$xml->appendChild($fitness); 
		foreach($product_array as $key=>$value){ 
			$product=$xml->createElement("product"); 
			$fitness->appendChild($product); 
			
			$name=$xml->createElement("nombre", $product_array[$key]["name"]); 
			$product->appendChild($name); 
			
			$code=$xml->createElement("codigo", $product_array[$key]["code"]); 
			$product->appendChild($code); 
			
			$image=$xml->createElement("imagen", $product_array[$key]["image"]); 
			$product->appendChild($image); 
			
			$price=$xml->createElement("precio", $product_array[$key]["price"]); 
			$product->appendChild($price); 
			
			$category=$xml->createElement("categoria", $product_array[$key]["category"]); 
			$product->appendChild($category); 
			
		} 
		$xml->save("report.xml"); 

	}
	if(isset($_POST['excel'])){
		
	}
	?>
	
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</BODY>

  <!-- Footer -->
  <footer class="bg-dark fixed-bottom mt-5">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Quim Martínez Shop 2020</p>
    </div>
  </footer>
</HTML>