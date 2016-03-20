 
<?php
$fp=$_GET['fp'];
$wsqli2="SELECT * from productos WHERE idproducto = '$fp'";
$result = $linki->query($wsqli2);
if($linki->errno) die($linki->error);
if($row = $result->fetch_array()){

?>
 
<div style="margin-top: 70px;"><br> 
	 
 
	<div class="col-md-12">
	 <div style="border-radius:6px" class="panel panel-default">	         
          <div class="panel-body">
          
              <div style="background: rgba(224, 224, 224, 0.81); border-radius:15px"  class="col-md-12">

          		<div align="center" class="col-md-6">
          			<img class="img-responsive"   src="img/mp.png">
          		</div>

          		<br>

          		<div align="center" class="col-md-6">
          			<img class="img-responsive" style="height: 100px;margin-top:10px " src="img/games_lords.png">
          		</div>

          		<br>
          	</div>

          	   <?php
}
		$ubicacion="SELECT * FROM ubicacion";
		$result = $linki->query($ubicacion);
		if($linki->errno) die($linki->error);
		if($row = $result->fetch_array()){
		$ubi=$row['nombre'];
		}


		$wsqli="SELECT * FROM `productos` INNER JOIN usuarios ON (usuarios.idusuario = productos.idusuario)
		WHERE idproducto = '$fp'";
			$result = $linki->query($wsqli);			
			if($row = $result->fetch_array()){
		?>


    
    		<div class="col-md-12">
          	  <br>
          		<h2 align="center">Datos de la compra</h2>	
          	  <br>		   	
			</div>

			
					<div align="right" class="col-md-12">
							
					     <div class="list-group">
							   <?php 

							        	if(isset($fp)){ 
										// Creamos la cadena aletoria 
										$str = "1234567890"; 
										$cad = ""; 
										for($i=0;$i<7;$i++) { 
										$cad .= substr($str,rand(0,7),1); 
										} 


							    ?>
							    <h4 style="margin-right:26px" class="list-group-item-heading">Codigo: <small><?php echo $cad; }?></small></h4> 
							  
						 </div>

					</div>	

			           <div class="col-md-12">          

			                       <div class="col-md-2">
			                         <div align="center" class="list-group">
							           <a class="list-group-item">
							         		<img style="height:155px"  src="<?php echo $row['productofoto']?>" class="img-responsive">
					                   </a>
					                </div>
          						  </div>
          					


                        <div class="col-md-6">	           
						  <div class="list-group">
							  <a class="list-group-item">
							    <h4 class="list-group-item-heading">Titulo: <small><?php echo $row['titulo']; ?></small></h4> 
							  </a>


							<a class="list-group-item">	
							<?php 
					 $consultas="SELECT * FROM `productos` INNER JOIN categorias ON (categorias.idcategoria = productos.idcategoria)
						WHERE idproducto = '$fp'";
							$resultados = $linki->query($consultas);			
							 if($rows = $resultados->fetch_array()){
							  ?>				           
							    <h4 class="list-group-item-heading">Categoria: <small><?php echo $rows['nombre']; ?></small></h4> 
						    <?php }; ?>
						     </a>

					           <a class="list-group-item">
					 <?php 
					 $consulta1="SELECT * FROM `productos` INNER JOIN consolas ON (consolas.idconsola = productos.idconsola)
						WHERE idproducto = '$fp'";
							$resultados1 = $linki->query($consulta1);			
							 if($row1 = $resultados1->fetch_array()){
							  ?>
							    <h4 class="list-group-item-heading">Plataforma: <small><?php echo $row1['nombre']; ?></small></h4> 
							 <?php }; ?>
							  </a>
						   </div>			 
		               </div>



		            <div class="col-md-4">
	
		            		 <div class="list-group">
							  <a class="list-group-item">
							    <h4 class="list-group-item-heading">Vendedor: <small><?php echo $row['nombre']; ?></small></h4>							    
							  </a>
							  
						      <a class="list-group-item">
							    <h4 class="list-group-item-heading">Comprador: <small><?php echo $_SESSION['nombre']; ?></small></h4>							   
							  </a>

					           <a class="list-group-item">
							    <h4 class="list-group-item-heading">Precio: <span class="badge"><?php echo $row['precio']; ?> Bs</span></h4>							    
							  </a>

						   </div>	

		            </div>

		            </div>
			<?php
					}
			  
					?>

          </div>
        </div>      
 
        	<div align="right" class="col-md-12"> 	
        	 <a  href='<?php echo $index ?>?c=<?php echo $row['idproducto']; ?>&code=<?php echo $cad; ?>'>
        	    <button  value="concretar" type="submit" class="btn btn-success btn-lg">
				  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Concretear Compra			 
				</button>
			 </a> 
				</div>
        </div>
     	
</div>
 
 </form>

<div class="col-md-12"> 
<div class="container">
      <hr class="featurette-divider">
      <!-- FOOTER -->
      <footer style="margin-top: 60px;">
        <p class="pull-right"><a href="#">Volver Arriba</a></p>        
        <p>&copy; 2016 GamesLords. &middot; <a href="#">Privacidad</a> &middot; <a href="#">Terminos</a></p>
      </footer><br>
</div>
</div>
 