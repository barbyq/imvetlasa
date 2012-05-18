<?php include('includes/header.html');?>
</div><!-- fin menuBar -->	
	<div id="wrapper">
		<div id="content">
			<div id="contactoLeft" style="float:left; width:450px;">
			<br/>
			<h1>Contacto</h1>
			<p>Boulevard Constituci&#243;n #2035 Oriente,<br/> Colonia Palmas San Isidro. Torre&#243;n, Coahuila. </p>
			<p>imvetlasa@prodigy.net.mx</p>			
			<p>Tel. 722-30-80</p>
			<p>Fax. 718-02-29</p>
			<br/>
			<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?msa=0&amp;msid=202017268799705086810.0004bf8c7caf8be6dff72&amp;ie=UTF8&amp;ll=25.571924,-103.425907&amp;spn=0,0&amp;t=m&amp;output=embed"></iframe><br /><small>Ve <a href="http://maps.google.com/maps/ms?msa=0&amp;msid=202017268799705086810.0004bf8c7caf8be6dff72&amp;ie=UTF8&amp;ll=25.571924,-103.425907&amp;spn=0,0&amp;t=m&amp;source=embed" target="_blank" style="color:#0000FF;text-align:left">Imvetlasa</a> en un mapa más grande.</small>
			
			<br class="clear"/><br/><br/><br/><br/>
			</div><!-- contactoLeft -->
			
			
			<form action="enviada.html" method="post" id="contacto" style="float:left; width:350px;"> 
			<br/><br/><br/><br/>
			<h2>Envíanos un comentario:</h2>
			<table>
				<tr>
					<td>Asunto:</td>
					<td><input type="text" name="asunto" placeholder="Asunto"/></td>
				</tr>
				<tr>
					<td>Ingresa tu email:</td>
					<td><input type="email" name="userEmail" placeholder="Email" /></td>
				</tr>
				<tr>
					<td colspan="2">
					<br/>
					<textarea name="info" cols="50" rows="15" placeholder="Comentarios, sugerencias, dudas."></textarea>
					</td>
				</tr>
			
			</table>
			<input type="submit" value="Enviar" id="btnSubmit" />	
			
			</form>
			
			<br class="clear"/>	
		</div><!-- fin de content div -->
	</div><!-- fin de wrapper div -->
	
	<?php include('includes/footer.html');?>
</body>
</html>

