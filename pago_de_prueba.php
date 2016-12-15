<?php
	session_start();
	$cantidad = 1;
	$titulo = $_SESSION["titulo"];
	$precio = $_SESSION["precio"];
	require_once("../sdk/lib/mercadopago.php");
 
	$mp = new MP("5690135002008429", "ZSc98AtMOIzrp6ZXnTGyah4hlQOMDpBw");

 	$preference_data = array(
		"items" => array(
			array(
				"title" => "$titulo",	
				"quantity" => 1,				 
				"currency_id" => "VEF", 
				"currency_symbol" => "Bs.",
				"unit_price" => (int)$precio,
			),
		),
	
     	"back_urls" => array(
     	   "success" => "http://pruebas.gameslords.com.ve/cuenta/index.php?proceso-completo",
	    ),
	);
 	$preference_data = $mp->create_preference($preference_data);

	?>

		<script type="text/javascript" src="https://www.mercadopago.com/org-img/jsapi/mptools/buttons/render.js"></script>

			<script type="text/javascript">
			function execute_my_onreturn (json) {
			    if (json.collection_status=='approved'){
			        console.log('Pago acreditado');      
			    } else if(json.collection_status=='pending'){
			        alert ('El pago no se completó');
			    } else if(json.collection_status=='in_process'){    
			        alert ('El pago está siendo revisado');    
			    } else if(json.collection_status=='rejected'){
			        alert ('El pago fué rechazado,intenta nuevamente el pago');
			    } else if(json.collection_status==null){
			        console.log('El usuario no completó el proceso de pago, no se ha generado ningún pago');
			    }
			}
			</script>

	   <div align="center">
         <a mp-mode="redirect"  name="MP-Checkout"  class="blue-M-Rn-VeOn"  href="<?php echo $preference_data['response']['init_point']; ?>" onreturn="execute_my_onreturn">Cancelar Con MercadoPago</a>
      </div>