<?php include_once ('dbConnect.php'); ?>
<h1>Laboratorios</h1>
<ul>
<?php 
	$dbConnect = new dbconnect();
	$dbConnect->todosLab(); ?>
</ul>
<br/>


