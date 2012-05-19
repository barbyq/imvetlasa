<?php
	include('../../includes/dbconnect.php');
	include ('../clases/usuarios.php');
	$obj = json_decode($_POST['json']);
	$dbc = new dbconnect();
	$uDAO = new usuariosDAO($dbc->getConnection());
	try{
		$type = $_POST['type'];
		if ($type == 'insertar'){
			$uDAO->addUsuarios($obj);
		}
		else if ($type == 'editar')
		{
			$uDAO->editUsuarios($obj);
		}else if($type == 'borrar')
		{
			$uDAO->deleteUsuarios($obj);
		}	
	}
	catch (Exception $ex)
	{
		echo $ex->Message;
	}
?>