<?php
	include('../../includes/dbconnect.php');
	include ('../clases/especies.php');
	$obj = json_decode($_POST['json']);
	$dbc = new dbconnect();
	$eDAO = new especiesDAO($dbc->getConnection());

	
	$edit = false;
	if (isset($_GET['id']))
	{
		$id = $_GET['id']; 
		try{
			$obj = $eDAO->getEspecie($id);
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
	<label>Nombre:
		<input type="text" id="nombre" name="nombre" value="<?php if ($edit){echo $obj->nombre;} ?>"/>
		<input type="hidden" name="especieId" value="<?php if ($edit){echo $obj->especieId;} ?>"/>
	</label>
	<input type="button" value="<?php if ($edit){echo 'Guardar Cambios';}else{echo 'Agregar';} ?>" id="<?php if ($edit){echo 'editar';}else{echo 'insertar';} ?>" class="especies"/>
</form>