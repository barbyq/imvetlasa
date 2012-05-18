<?php include('includes/header.html');?>
</div><!-- fin menuBar -->
	<div id="wrapper">
		<div id="content">
			<div id="pedido">
				<h1>Hacer Cotización:</h1>
				<br/>
				<h2>Agregar Productos:</h2>
				<div id="agregarProducto">
				<p>Elige un producto:</p>
				<select data-placeholder="Elige un producto…" class="chzn-select" style="width:350px;" id="cotizacion">
					<option value=""></option> 
		          	<option value="Amino-Lite 34 X">Amino-Lite 34 X</option> 
		          	<option value="Buscapina Compostium">Buscapina Compostium</option> 
		          	<option value="Bisolvon Veterinario">Bisolvon Veterinario</option> 
		          	<option value="Ventipulmin">Ventipulmin</option> 
		          	<option value="Vitamina K">Vitamina K</option> 
		          	<option value="L-Histamin">L-Histamin</option> 
		          	<option value="Gastroprazol Equino">Gastroprazol Equino</option> 
		          	<option value="Fercobón">Fercobón</option> 
		          	<option value="Vitamina B1">Vitamina B1</option> 
		          	<option value="Amoxirol">Amoxirol</option> 
		          	<option value="Florkem">Florkem</option> 
		          	<option value="Antimamitica Lactación">Antimamitica Lactación</option> 
		          	<option value="Clindamicina">Clindamicina</option> 
		          	<option value="Aminotonic">Aminotonic</option> 
		          	<option value="Biocef 4g">Biocef 4g</option> 
		          	<option value="Caltonic">Caltonic</option> 
		          	<option value="Difluxina">Difluxina</option> 
		          	<option value="Biodipirona">Biodipirona</option> 
				</select>
				<br/>
				<table>
				<tr class="presentacion">
					<td>Indica la presentación:</td>
					<td><input type="text" /></td>
					<td class="check"></td>
				</tr>
				<tr class="cantidad">
					<td>Indica la cantidad:</td>
					<td><input type="text"/></td>
					<td class="check"></td>
				</tr>
				</table>
				<input type="button" value="Agregar a Pedido" id="agregarPedido" class="cantidad"/>
				</div><!-- agregarProducto -->
				
				
				<div id="right">			
				<h1 style="margin-top:20px;">Pedido:</h1>
				<table>
				<tr>
					<td>Nombre: </td>
					<td><input type="text" id="nombre"/></td>
					<td class="check"></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="text" id="email" /></td>
					<td class="check"></td>
				</tr>
				</table>
				<table class="pedido" style="display:none;">
					<tr>
						<td>Cantidad</td>
						<td>Producto</td>
						<td>Presentacion</td>
						<td></td>
					</tr>
				</table>
				
				<ul>
				</ul>
				<input type="button" value="Enviar Pedido" style="display:none;" id="enviarPedido"/>
				</div>
			<br class="clear"/>
			</div><!-- pedido -->
			
			<div id="howto" style="float:right; width:400px;">
				<h1>Para Hacer un Pedido</h1>
				<ol>
					<li>Elige un Producto.</li>
					<li>Indica la presentación y cantidad de productos que deseas ordenar.</li>
					<li>Da click en Agregar Pedido.</li>
					<li>Si deseas agregar otro producto, sigue de nuevo los pasos 1 a 3.</li>
					<li>Cuando tu pedido este listo ingresa tu nombre y email.</li>
					<li>Da click en Enviar Pedido. Te contestaremos tan pronto sea posible.</li>
				</ol>
			</div><!-- fin howto -->
		</div><!-- fin de content div -->
		<br class="clear"/>
		<br/><br/>
	</div><!-- fin de wrapper div -->
	
	<?php include('includes/footer.html');?>
</body>
</html>
<script type="text/javascript" src="scripts/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>
