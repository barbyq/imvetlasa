<?php
	include('../../includes/dbconnect.php');
	include ('../clases/especies.php');
	$obj = json_decode($_POST['json']);
	$dbc = new dbconnect();
	$eDAO = new especiesDAO($dbc->getConnection());
	try{
		$type = $_POST['type'];
		if ($type == 'insertar'){
			$eDAO->addEspecies($obj);
		}
		else if ($type == 'editar')
		{
			$eDAO->editEspecies($obj);
		}else if($type == 'borrar')
		{
			$eDAO->deleteEspecies($obj);
		}	
	}
	catch (Exception $ex)
	{
		echo $ex->Message;
	}
?>