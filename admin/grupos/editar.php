<?php
	include('../../includes/dbconnect.php');
	include ('../clases/grupos.php');
	$obj = json_decode($_POST['json']);
	$dbc = new dbconnect();
	$DAO = new gruposDAO($dbc->getConnection());

	
	$edit = false;
	if (isset($_GET['id']))
	{
		$id = $_GET['id']; 
		try{
			$obj = $DAO->getGrupo($id);
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
		<input type="hidden" name="grupoId" value="<?php if ($edit){echo $obj->grupoId;} ?>"/>
	</label>
	<input type="button" value="<?php if ($edit){echo 'Guardar Cambios';}else{echo 'Agregar';} ?>" id="<?php if ($edit){echo 'editar';}else{echo 'insertar';} ?>" class="grupos"/>
</form>