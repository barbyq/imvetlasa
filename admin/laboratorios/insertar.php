<?php
	include('../../includes/dbconnect.php');
	include ('../clases/laboratorios.php');
	$obj = json_decode($_POST['json']);
	$dbc = new dbconnect();
	$DAO = new laboratoriosDAO($dbc->getConnection());
	try{
		$type = $_POST['type'];
		if ($type == 'insertar'){
			$DAO->addLaboratorios($obj);
		}
		else if ($type == 'editar')
		{
			$DAO->editLaboratorios($obj);
		}else if($type == 'borrar')
		{
			$DAO->deleteLaboratorios($obj);
		}	
	}
	catch (Exception $ex)
	{
		echo $ex->Message;
	}
?>