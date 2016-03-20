



	 <?php
	require_once "lib/mercadopago.php"; /* libreria de Mercado de Pago. SDK */
	/* Variable en las que se van a recoger el precio y la cantidad de articulos */  
 
	  $precio  =  2;
	  $cantidad = 2;
 
	$mp = new MP('742191649350372', 'Iy2c3NgxxlG7N9gwIiOGasspYIzL5x3m');

 	$preference_data = array(
		"items" => array(
			array(
				"title" => "Pago de Articulo",	
				"quantity" => $cantidad,				 
				"currency_id" => "VEF", // Available currencies at: https://api.mercadopago.com/currencies
				"currency_symbol" => "Bs.",
				"unit_price" => $precio
			)
		)
	);
 
	$preference = $mp->create_preference($preference_data);
 
	?>

   		<!DOCTYPE html>
	<html>
		<head>
			<title>Realizar Pago de Producto</title>
			<!--/*Script para Boton y modal*/-->
			<script type="text/javascript" src="https://www.mercadopago.com/org-img/jsapi/mptools/buttons/render.js"></script>
		</head>
			<div align="right" class="col-md-12">
                       <a mp-mode="modal"  name="MP-Checkout" class="blue-Rn-VeOn"  href="<?php echo $preference['response']['init_point']; ?>">Concretar Compra</a>
          </div>
	</html>