<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div>
	<?php
		session_start(); 
		$categoria = utf8_decode($_GET['categoria']);
		require_once '../loginDatabase.php';
       	$sql = "SELECT idCategoria FROM categorias where Tipo = '$categoria'";
       	$resultado = $conn->query($sql);
       	if($resultado->num_rows>0){
       		$row=$resultado->fetch_assoc();
       		$idCategoria = $row['idCategoria'];
       }
		
	?>
  
  <div class="row">
    <div class="col-md-2">
    <div class="col-xs-12 col-sm-6 col-md-4">
       <div class="container">
      <div class="row center-block">
      <?php 
      require_once '../loginDatabase.php';
      $sql ="SELECT nombre,imagen,costo,l.idlibro FROM libro l,lcae s WHERE s.idcategoria = '$idCategoria' AND 
      l.idlibro = s.idlibro";
      $resultado = $conn->query($sql);
      if($resultado->num_rows>0){
       	while ($row=$resultado->fetch_assoc()) {
       	?>	

				<div class="w3-container col-xs-12 col-sm-6 col-md-4 center-block">
					  <h2 class="name" ><?php echo utf8_encode($row['nombre']); ?></h2>

						  <div class="w3-card-4">
						    <img class="imgCat" src="<?php echo $row['imagen']; ?>" style="width:100%">
						    <div class="w3-container">
						    	<div class="row">
						    		<div class="col-md-4 ">
						    			<div>$ <span class="costo"><?php echo $row['costo']; ?></span></div>			
						    		</div>
						    		<div class="col-md-6 col-lg-offset-2">
						    			<button  class="agregarCarrito btn btn-warning" id="<?php echo $row['idlibro']; ?>">
						    				<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
						    			</button>
						    		</div>
						    	</div>
						      
						      
						   </div>
		
					  </div>
				</div>

	   <?php
         }
       }

	?>
      
</div>
</div>
    </div>
  </div>
</div>
