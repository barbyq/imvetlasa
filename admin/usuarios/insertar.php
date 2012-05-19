<?php
	include('../../includes/dbconnect.php');
	include ('usuarios.php');
	$obj = json_decode($_POST['json']);
	$dbc = new dbconnect();
	$uDAO = new usuariosDAO($dbc->getConnection());
	try{
		$uDAO->addUsuarios($obj);
	}
	catch (Exception $ex)
	{
		echo $ex->Message;
	}
?>