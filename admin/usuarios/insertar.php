<?php
	include('../../includes/dbconnect.php');
	include ('../clases/usuarios.php');
	$obj = json_decode($_POST['json']);
	$dbc = new dbconnect();
	$uDAO = new usuariosDAO($dbc->getConnection());
	try{
		if ($_POST['type'] == 'insertar'){
			$uDAO->addUsuarios($obj);
		}
		else if ($_POST['type'] == 'editar')
		{
			$uDAO->editUsuarios($obj);
		}
	}
	catch (Exception $ex)
	{
		echo $ex->Message;
	}
?>