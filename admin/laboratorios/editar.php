<?php
	include('../../includes/dbconnect.php');
	include ('../clases/laboratorios.php');
	$obj = json_decode($_POST['json']);
	$dbc = new dbconnect();
	$eDAO = new laboratoriosDAO($dbc->getConnection());

	
	$edit = false;
	if (isset($_GET['id']))
	{
		$id = $_GET['id']; 
		try{
			$obj = $eDAO->getLaboratorio($id);
			$edit = true;
		}
		catch(Exception $ex)
		{
			echo $ex->Message;
		}
	}
?>
<form>
	<label>Nombre:
		<input type="text" id="nombre" name="nombre" value="<?php if ($edit){echo $obj->nombre;} ?>"/>
		<input type="hidden" name="laboratorioId" value="<?php if ($edit){echo $obj->laboratorioId;} ?>"/>
	</label>
	<input type="button" value="<?php if ($edit){echo 'Guardar Cambios';}else{echo 'Agregar';} ?>" id="<?php if ($edit){echo 'editar';}else{echo 'insertar';} ?>" class="laboratorios"/>
</form>