<?php
	include('../../includes/dbconnect.php');
	include ('../clases/productos.php');
	include ('../clases/laboratorios.php');
	include ('../clases/grupos.php');
	$obj = json_decode($_POST['json']);
	$dbc = new dbconnect();
	$pDAO = new productosDAO($dbc->getConnection());
	$lDAO = new laboratoriosDAO($dbc->getConnection());
	$gDAO = new gruposDAO($dbc->getConnection());
	
	$laboratorios = $lDAO->getLaboratorios();
	$grupos = $gDAO->getGrupos();
	
	$edit = false;
	if (isset($_GET['id']))
	{
		$id = $_GET['id']; 
		try{
			$obj = $pDAO->getProducto($id);
			$edit = true;
		}
		catch(Exception $ex)
		{
			echo $ex->Message;
		}
	}
?>
<form>
	<h1><?php if ($edit){echo 'Editar:';}else{echo 'Agregar:';} ?></h1>
	<br/>
	<input type="hidden" name="productoId" value="<?php if ($edit){echo $obj->productoId;} ?>"/>
	<table>
		<tr>
			<td>Nombre:</td>
			<td><input type="text" id="producto" name="producto" value="<?php if ($edit){echo $obj->producto;} ?>"/></td>
		</tr>
		<tr>
			<td>Laboratorio:</td>
			<td>
				<select name="laboratorio" class="chzn-select" style="width:150px;">
				<?php 
					foreach ($laboratorios as $lab)
					{
						if ($edit){
							if ($lab->nombre == $obj->laboratorio)
							{
								echo '<option selected="selected" value="'. $lab->laboratorioId  .'">'. $lab->nombre .'</option>';		
							}
							else
							{
								echo '<option value="'. $lab->laboratorioId  .'">'. $lab->nombre .'</option>';		
							}
						}else
						{
							echo '<option value="'. $lab->laboratorioId  .'">'. $lab->nombre .'</option>';
						}
					}
				 ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Grupo Farmacológico:</td>
			<td>
				<select name="grupo" class="chzn-select" style="width:150px;">
				<option value="0">Ninguno</option>
				<?php 
					foreach ($grupos as $g)
					{
						if ($edit){
							if ($g->nombre == $obj->grupo)
							{
								echo '<option selected="selected" value="'. $g->grupoId  .'">'. $g->nombre .'</option>';		
							}
							else
							{
								echo '<option value="'. $g->grupoId  .'">'. $g->nombre .'</option>';		
							}
						}else
						{
							echo '<option value="'. $g->grupoId  .'">'. $g->nombre .'</option>';
						}
					}
				 ?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="button" value="<?php if ($edit){echo 'Guardar Cambios';}else{echo 'Agregar';} ?>" id="<?php if ($edit){echo 'editar';}else{echo 'insertar';} ?>" class="especies"/></td>
		</tr>
	
	</table>
	
	



	
</form>