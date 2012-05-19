<?php
	include('../../includes/dbconnect.php');
	include ('../clases/grupos.php');
	$obj = json_decode($_POST['json']);
	$dbc = new dbconnect();
	$DAO = new gruposDAO($dbc->getConnection());
	try{
		$type = $_POST['type'];
		if ($type == 'insertar'){
			$DAO->addGrupos($obj);
		}
		else if ($type == 'editar')
		{
			echo $DAO->editGrupos($obj);
		}else if($type == 'borrar')
		{
			$DAO->deleteGrupos($obj);
		}	
	}
	catch (Exception $ex)
	{
		echo $ex->Message;
	}
?>