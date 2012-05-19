<?php
	include('../../includes/dbconnect.php');
	include ('../clases/usuarios.php');
	$obj = json_decode($_POST['json']);
	$dbc = new dbconnect();
	$uDAO = new usuariosDAO($dbc->getConnection());

	
	$edit = false;
	if (isset($_GET['id']))
	{
		$id = $_GET['id']; 
		try{
			$obj = $uDAO->getUsuario($id);
			$edit = true;
		}
		catch(Exception $ex)
		{
			echo $ex->Message;
		}
	}
?>
<form>
	<label>Email:
		<input type="text" id="email" name="email" value="<?php if ($edit){echo $obj->email;} ?>" class="<?php if ($edit){echo $obj->email;} ?>"/>
	</label>
	<label>Password:
		<input type="password" id="pass" name="password" value="<?php if ($edit){echo $obj->password;} ?>"/>
	</label>
	<input type="button" value="<?php if ($edit){echo 'Guardar Cambios';}else{echo 'Agregar';} ?>" id="<?php if ($edit){echo 'editar';}else{echo 'insertar';} ?>" class="usuarios"/>
</form>